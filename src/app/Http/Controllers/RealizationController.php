<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use App\Model\Realization;
use App\Model\Seo;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class RealizationController extends Controller
{

    public function Index() {
        $path = request()->path();
        $seo = DB::table('seo')
            ->select('*')
            ->where('seo.url', '=', $path)
            ->first();


        $items = Realization::where('realization_status', 1)->get();

        SEOMeta::setTitleSeparator(' - ');
        SEOMeta::setTitleDefault(GetConstField('page_name'));
        SEOMeta::setTitle($seo->seo_title);
        SEOMeta::setDescription($seo->seo_description);
        SEOMeta::setKeywords($seo->seo_tags);
        SEOMeta::setRobots('index, follow');

        return view('default.realization.index', ['items' => $items]);
    }


    public function Show() {
        $path = request()->path();

        $item = DB::table('realization')
            ->select('realization.*')
            ->join('seo', 'seo.id_seo', '=', 'realization.id_seo')
            ->where('seo.url', '=', $path)
            ->first();


        $db_galleries = DB::table('gallery')
            ->select('*')
            ->where('source_table', '=', 'realization')
            ->where('source_id', '=', $item->id_realization)
            ->get();

        foreach ($db_galleries as $gallery) {
            $name = $gallery->gallery_name;
            $name = strtolower($name);
            $name = str_replace(' ', '_', $name);
            $name = trim($name);
            $item->$name = Gallery::find($gallery->id_gallery);
        }


        SEOMeta::setTitleSeparator(' - ');
        SEOMeta::setTitleDefault(GetConstField('page_name'));
        SEOMeta::setTitle($item->realization_title);
        SEOMeta::setDescription($item->realization_lead);
        SEOMeta::setKeywords($item->realization_lead);
        SEOMeta::setRobots('index, follow');

        return view('default.realization.show', ['item' => $item]);
    }


    public function Home($view) {

        $items = DB::table('realization')
            ->where('realization_status', '=', 1)
            ->get();

        $view->items = $items;
    }
}
