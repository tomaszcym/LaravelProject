<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index() {
        return view('administrator.home.index', ['items' => 'items!']);
    }
}
