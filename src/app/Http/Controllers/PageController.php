<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use App\Model\Page;
use App\Model\Seo;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class PageController extends Controller
{
    public function Show() {
        $url = request()->path();

        if($url == '')
            $url = '/';

        $page = DB::table('seo')
            ->select('*')
            ->leftJoin('page', 'page.id_seo', '=', 'seo.id_seo')
            ->where('url', '=', $url)
            ->first();

        if($url == '/')
            $url = 'home';


        $db_items = DB::table('field')
            ->select('field_name', 'field_value')
            ->where('id_page', '=', $page->id_page)
            ->get()->toArray();

        $items = [];
        foreach ($db_items as $item) {
            $items[$item->field_name] = $item->field_value;
        }


        $db_galleries = DB::table('gallery')
            ->select('*')
            ->where('source_table', '=', 'page')
            ->where('source_id', '=', $page->id_page)
            ->get();

        foreach ($db_galleries as $gallery) {
            $name = $gallery->gallery_name;
            $name = strtolower($name);
            $name = str_replace(' ', '_', $name);
            $name = trim($name);
            $items[$name] = Gallery::find($gallery->id_gallery);
        }




        $items['page'] = $page;


        SEOMeta::setTitleSeparator(' - ');
        SEOMeta::setTitleDefault(GetConstField('page_name'));
        SEOMeta::setTitle($page->seo_title);
        SEOMeta::setDescription($page->seo_description);
        SEOMeta::setKeywords($page->seo_tags);
        SEOMeta::setRobots('index, follow');



        $url = str_replace('/', '_', $url);

        if(view()->exists('default.page.'.$url))
            return view('default.page.'. $url, $items);
        else
            return view('default.page.default', $items);

    }
}
