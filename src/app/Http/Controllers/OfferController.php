<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use App\Model\Offer;
use App\Model\Seo;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class OfferController extends Controller
{

    public function Index() {
        $path = request()->path();
        $seo = DB::table('seo')
            ->select('*')
            ->where('seo.url', '=', $path)
            ->first();

        $page = DB::table('page')
            ->select('*')
            ->where('id_seo', '=', $seo->id_seo)
            ->first();


        $items = Offer::where('offer_status', 1)->get();

        $db_items = DB::table('field')
            ->select('field_name', 'field_value')
            ->where('id_page', '=', $page->id_page)
            ->get()->toArray();

        $fields = [];
        foreach ($db_items as $item) {
            $fields[$item->field_name] = $item->field_value;
        }

        SEOMeta::setTitleSeparator(' - ');
        SEOMeta::setTitleDefault(GetConstField('page_name'));
        SEOMeta::setTitle($seo->seo_title);
        SEOMeta::setDescription($seo->seo_description);
        SEOMeta::setKeywords($seo->seo_tags);
        SEOMeta::setRobots('index, follow');

        return view('default.offer.index', ['items' => $items, 'fields' => $fields]);
    }

    public function Home($view) {
        $limit = null;
        if($view->max_items)
            $limit = $view->max_items;


        $items = DB::table('offer')
            ->where('offer_status', '=', 1)
            ->limit($limit)
            ->get();




        foreach ($items as $item) {
            $gallery = DB::table('gallery')
                ->select('*')
                ->where('source_table', '=', 'offer')
                ->where('source_id', '=', $item->id_offer)
                ->first();

            if($gallery) {
                $gallery = Gallery::find($gallery->id_gallery);
                $item->image = '';
                if(isset($gallery->items[0]))
                    $item->image = $gallery->items[0]->gallery_item_src;
            }
        }

        $view->items = $items;
    }

    public function Show() {
        $path = request()->path();

        $item = DB::table('offer')
            ->select('offer.*')
            ->join('seo', 'seo.id_seo', '=', 'offer.id_seo')
            ->where('seo.url', '=', $path)
            ->first();


        $db_galleries = DB::table('gallery')
            ->select('*')
            ->where('source_table', '=', 'offer')
            ->where('source_id', '=', $item->id_offer)
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
        SEOMeta::setTitle($item->offer_title);
        SEOMeta::setDescription($item->offer_lead);
        SEOMeta::setKeywords($item->offer_lead);
        SEOMeta::setRobots('index, follow');

        return view('default.offer.show', ['item' => $item]);
    }
}
