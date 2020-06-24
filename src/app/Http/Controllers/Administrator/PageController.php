<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Page;
use App\Model\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class PageController extends Controller
{
    public function Index() {
        $items = DB::table('page')
            ->select('*')
            ->leftJoin('seo', 'seo.id_seo', '=', 'page.id_seo')
            ->get();
        return view('administrator.page.index', ['items' => $items]);
    }

    public function Edit($id_page = 0) {

        if(request()->method() == 'POST') {

            $form_post = request()->all();

            $page_rules = [
                'page_name' => ['required', 'max:255'],
                'page_module' => ['required'],
            ];

            $page = Page::find($id_page);
            $seo_rules = [
                'url' => ['required', 'max:255', Rule::unique('seo')->ignore($page ? $page->seo->id_seo : 0, 'id_seo')],
                'seo_title' => 'required|max:255',
                'seo_description' => 'max:255',
                'seo_tags' => 'max:255',
            ];

            Validator::make(request()->all(), array_merge($page_rules, $seo_rules))->validate();


            DB::transaction(function() use ($id_page, $form_post){
                if($id_page != 0) {
                    $page = Page::find($id_page);
                    $seo = $page->seo;

                    $page->fill($form_post);
                    $seo->fill($form_post);

                    if(isset($form_post['page_status']))
                        $page->page_status = 1;
                    else
                        $page->page_status = 0;

                    $page->save();
                    $seo->save();

                    request()->session()->flash('status', 'Strona została zaktualizowana!');
                    request()->session()->flash('alert-class', 'success');
                } else {
                    $seo = new Seo($form_post);
                    $page = new Page($form_post);

                    if(isset($form_post['page_status']))
                        $page->page_status = 1;
                    else
                        $page->page_status = 0;

                    $seo->save();
                    $page->id_seo = $seo->id_seo;
                    $page->save();

                    request()->session()->flash('status', 'Strona została dodana!');
                    request()->session()->flash('alert-class', 'success');
                }
            });

            return redirect(route('administrator.page.index'));
        }
        else {

            $item = null;
            $seo = null;

            if($id_page != 0) {
                $item = Page::find($id_page);
                $seo = $item->seo;
            }

            $page_modules = config('modules');

            return view('administrator.page.edit', [
                'item' => $item,
                'seo' => $seo,
                'page_modules' => $page_modules,
            ]);
        }
    }


    function Delete($id_page) {
        DB::transaction(function () use ($id_page) {
            $page = Page::find($id_page);
            $page->seo->delete();
            $page->delete();
        });

        return redirect(route('administrator.page.index'));
    }
}
