<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Field;
use App\Model\Page;
use App\Model\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class FieldController extends Controller
{
    public function Items($id_page)
    {
        $items = DB::table('field')
            ->select('*')
            ->where('id_page', '=', $id_page)
            ->get();

        return view('administrator.field.edit', ['items', $items]);
    }

    public function Edit($id_page)
    {

        if (request()->method() == 'POST') {

            $form_post = request()->all();

            $field_rules = [
//                'fields.*.field_name' => ['required', 'max:255'],
            ];

            Validator::make($form_post, $field_rules)->validate();

            if ($id_page != 0) {
                DB::transaction(function () use ($form_post) {
                    foreach ($form_post['fields'] as $key => $field) {
                        $item = Field::find($key);
                        $item->fill($field);
                        $item->save();
                    }
                });
            }

        }

        $items = DB::table('field')
            ->select('*')
            ->where('id_page', '=', $id_page)
            ->get();

        return view('administrator.field.edit', ['items' => $items, 'id_page' => $id_page]);
    }


    function Delete($id_field)
    {
        $field = Field::find($id_field);
        $id_page = $field->id_page;

        DB::transaction(function () use ($field) {
            $field->delete();
        });

        return redirect(route('administrator.field.edit', ['id_page' => $id_page]));
    }

    function AddField($id_page, $type = 'text') {
        DB::transaction(function () use ($id_page, $type) {
            $field = new Field;
            $field->id_page = $id_page;
            $field->field_name = 'Nowe pole';
            $field->field_type = $type;
            $field->save();

            $field->field_name = 'text'.$field->id_field;
            $field->save();
        });

        return redirect(route('administrator.field.edit', ['id_page' => $id_page]));
    }
}
