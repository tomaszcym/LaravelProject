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

class HelperController extends Controller
{

    public function ToggleStatus($table, $id) {
        $item = DB::table($table)->where('id_'.$table, '=', $id);
        $column_name = $table.'_status';
        if($item->get()) {
            if($item->value($column_name) == 1)
                $item->update([$column_name => 0]);
            else
                $item->update([$column_name => 1]);
        }

    }
}
