<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\ConstField;
use App\Model\Page;
use App\Model\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class ConstFieldController extends Controller
{

    public function Edit() {

        if(request()->method() == 'POST') {

            $form_post = request()->all();

//            dd($form_post);

            DB::transaction(function() use ($form_post){
                foreach ($form_post as $key => $value) {

                    if($key == '_token')
                        continue;
                    ConstField::where('const_field_name', $key)->update(['const_field_text' => $value]);
                }
            });
        }


        $db_items = ConstField::all()->toArray();

        $items = [];
        foreach ($db_items as $item) {
            $items[$item['const_field_name']] = $item['const_field_text'];
        }

        return view('administrator.const_field.edit', $items);

    }

}
