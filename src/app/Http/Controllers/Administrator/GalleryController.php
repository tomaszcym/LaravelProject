<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use App\Model\Page;
use App\Model\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class GalleryController extends Controller
{
    public function Index($source_table, $source_id) {
        $galleries = DB::table('gallery')
            ->select('*')
            ->where('source_id', '=', $source_id)
            ->where('source_table', '=', $source_table)
            ->get();


        $items = [];
        foreach ($galleries as $gallery) {
            $items[] = Gallery::find($gallery->id_gallery);
        }

        $page = DB::table($source_table)->where('id_'.$source_table, '=', $source_id)->first();
        return view('administrator.gallery.index', [
            'items' => $items,
            'source_table' => $source_table,
            'source_id' => $source_id
        ]);
    }

    public function Edit($source_table, $source_id = 0, $id_gallery = 0) {

        if(request()->method() == 'POST') {

            $form_post = request()->all();

            $gallery_rules = [
                'gallery_name' => ['required', 'max:255'],
            ];

            Validator::make(request()->all(), $gallery_rules)->validate();


            DB::transaction(function() use ($id_gallery, $source_table, $source_id, $form_post){
                if($id_gallery != 0) {
                    $gallery = Gallery::find($id_gallery);
                    $gallery->fill($form_post);

                    $gallery->save();
                } else {
                    $gallery = new Gallery($form_post);
                    $gallery->source_table = $source_table;
                    $gallery->source_id = $source_id;

                    $gallery->save();
                }
            });

            return redirect(route('administrator.gallery.index', [
                'source_table' => $source_table,
                'source_id' =>$source_id
            ]));
        }
        else {

            $item = null;
            if($id_gallery != 0)
                $item = Gallery::find($id_gallery);

            return view('administrator.gallery.edit', ['item' => $item]);
        }
    }


    function Delete($id_gallery) {
        $gallery = Gallery::find($id_gallery);
        $source_table = $gallery->source_table;
        $source_id = $gallery->source_id;


        DB::transaction(function () use ($gallery) {
            $gallery->items()->delete();
            Storage::deleteDirectory('public/image/gallery/gallery_'.$gallery->id_gallery);
            $gallery->delete();
        });


        return redirect(route('administrator.gallery.index', [
            'source_table' => $source_table,
            'source_id' => $source_id,
        ]));
    }
}
