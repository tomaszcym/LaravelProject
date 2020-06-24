<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use App\Model\GalleryItem;
use App\Model\Page;
use App\Model\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use function foo\func;

class GalleryItemController extends Controller
{

    public function Add($id_gallery) {
        if(request()->method() == 'POST') {
            $form_post = request()->all();
            $files = request()->file('gallery_item_src');

            $gallery_item_rules = [
                'gallery_item_src' => ['required', 'min:1'],
                'gallery_item_title' => ['max:255'],
            ];

            Validator::make($form_post, $gallery_item_rules)->validate();

            DB::transaction(function () use($files, $form_post, $id_gallery) {
                foreach ($files as $file) {
                    $gallery_item = new GalleryItem();
                    $gallery_item->gallery_item_title = $form_post['gallery_item_title'];


                    $file_name = strtolower('gallery/gallery_'.$id_gallery.'/'.time(). rand(0, 100).'.'.$file->getClientOriginalExtension());
                    $gallery_item->gallery_item_src = $file_name;
                    $gallery_item->id_gallery = $id_gallery;

                    if(isset($form_post['gallery_item_status']))
                        $gallery_item->gallery_item_status = 1;
                    else
                        $gallery_item->gallery_item_status = 0;

                    $gallery_item->save();


                    $file = Image::make($file);

                    $width = 1920;
                    $height = null;
                    if($file->getHeight() > $file->getWidth()) {
                        $height = 1920;
                        $width = null;
                    }

                    $file->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    Storage::disk('local')->put('public/image/'.$file_name, $file->encode());
                }

            });

            $gallery = Gallery::find($id_gallery);
            return redirect(route('administrator.gallery.index', [
                'source_table' => $gallery->source_table,
                'source_id' => $gallery->source_id,
            ]));
        }

        return view('administrator.gallery_item.edit', ['item' => null]);
    }


    public function Edit($id_gallery_item) {

        if(request()->method() == 'POST') {

            $form_post = request()->all();
            $file = null;
            if(request()->file('gallery_item_src'))
                $file = request()->file('gallery_item_src')[0];


            $gallery_item_rules = [
                'gallery_item_title' => ['max:255'],
            ];



            Validator::make($form_post, $gallery_item_rules)->validate();


            $gallery_item = GalleryItem::find($id_gallery_item);

            DB::transaction(function() use ($gallery_item, $form_post, $file){

                $file_name = $gallery_item->gallery_item_src;
                if($file) {
                    Storage::disk('local')->delete('public/image/'.$gallery_item->gallery_item_src);
                    $file_name = strtolower('gallery/gallery_'.$gallery_item->id_gallery.'/'.time().'.'.$file->getClientOriginalExtension());

                    $file = Image::make($file);

                    $width = 1920;
                    $height = null;
                    if($file->getHeight() > $file->getWidth()) {
                        $height = 1920;
                        $width = null;
                    }

                    $file->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    Storage::disk('local')->put('public/image/'.$file_name, $file->encode());
                }

                $gallery_item->fill($form_post);
                $gallery_item->gallery_item_src = $file_name;


                if(isset($form_post['gallery_item_status']))
                    $gallery_item->gallery_item_status = 1;
                else
                    $gallery_item->gallery_item_status = 0;

                $gallery_item->save();



            });

            $gallery = Gallery::find($gallery_item->id_gallery);
            return redirect(route('administrator.gallery.index', [
                'source_table' => $gallery->source_table,
                'source_id' => $gallery->source_id,
            ]));
        }
        else {

            $item = GalleryItem::find($id_gallery_item);

            return view('administrator.gallery_item.edit', ['item' => $item]);
        }
    }


    function Delete($id_gallery_item) {
        $gallery_item = GalleryItem::find($id_gallery_item);
        $gallery = Gallery::find($gallery_item->id_gallery);

        DB::transaction(function () use ($gallery_item) {
            Storage::delete('public/image/'.$gallery_item->gallery_item_src);
            $gallery_item->delete();
        });

        return redirect(route('administrator.gallery.index', [
            'source_table' => $gallery->source_table,
            'source_id' => $gallery->source_id,
        ]));
    }
}
