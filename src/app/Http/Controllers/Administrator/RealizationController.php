<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use App\Model\Realization;
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

class RealizationController extends Controller
{

    public function Index() {
        $items = DB::table('realization')
            ->select('*')
            ->leftJoin('seo', 'seo.id_seo', '=', 'realization.id_seo')
            ->get();
        return view('administrator.realization.index', ['items' => $items]);
    }


    public function Edit($id_realization = 0) {

        if(request()->method() == 'POST') {

            $form_post = request()->all();
            $file = request()->file('realization_img');

            $realization_rules = [
                'realization_title' => ['required', 'max:255'],
                'realization_lead' => ['max:255'],
                'realization_price' => ['max:255'],
                'realization_external_url' => ['max:255'],
            ];

            $realization = Realization::find($id_realization);
            $seo_rules = [
                'url' => ['required', 'max:255', Rule::unique('seo')->ignore($realization ? $realization->seo->id_seo : 0, 'id_seo')],
                'seo_title' => 'required|max:255',
                'seo_description' => 'max:255',
                'seo_tags' => 'max:255',
            ];

            Validator::make(request()->all(), array_merge($realization_rules, $seo_rules))->validate();


            DB::transaction(function() use ($id_realization, $form_post, $file){
                if($id_realization != 0) {
                    $realization = Realization::find($id_realization);
                    $seo = $realization->seo;

                    if($realization->realization_img) {
                        Storage::disk('local')->delete('public/image/'.$realization->realization_img);
                    }

                    if($file) {
                        $file_name = strtolower('realization/'.$id_realization.'/'.time().'.'.$file->getClientOriginalExtension());
                        $realization->realization_img = $file_name;

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

                    $realization->fill($form_post);
                    $seo->fill($form_post);

                    if(isset($form_post['realization_status']))
                        $realization->realization_status = 1;
                    else
                        $realization->realization_status = 0;

                    $realization->save();
                    $seo->save();

                    request()->session()->flash('status', 'Realizacja została zaktualizowana!');
                    request()->session()->flash('alert-class', 'success');
                } else {
                    $seo = new Seo($form_post);
                    $realization = new Realization($form_post);

                    if(isset($form_post['realization_status']))
                        $realization->realization_status = 1;
                    else
                        $realization->realization_status = 0;

                    $seo->save();
                    $realization->id_seo = $seo->id_seo;
                    $realization->save();

                    if($file) {
                        $file_name = strtolower('realization/'.$realization->id_realization.'/'.time().'.'.$file->getClientOriginalExtension());

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

                        $realization->realization_img = $file_name;
                        $realization->save();
                    }



                    $gallery = new Gallery;
                    $gallery->source_table = 'realization';
                    $gallery->source_id = $realization->id_realization;
                    $gallery->gallery_name = 'gallery1';
                    $gallery->save();


                    request()->session()->flash('status', 'Realizacja została dodana!');
                    request()->session()->flash('alert-class', 'success');
                }
            });

            return redirect(route('administrator.realization.index'));
        }
        else {

            $item = null;
            $seo = null;

            if($id_realization != 0) {
                $item = Realization::find($id_realization);
                $seo = $item->seo;
            }

            return view('administrator.realization.edit', [
                'item' => $item,
                'seo' => $seo
            ]);
        }
    }


    function Delete($id_realization) {
        DB::transaction(function () use ($id_realization) {
            $realization = Realization::find($id_realization);
            $realization->seo->delete();
            $realization->delete();
        });

        return redirect(route('administrator.realization.index'));
    }
}
