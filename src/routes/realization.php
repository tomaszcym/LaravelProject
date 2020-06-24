<?php

use Illuminate\Support\Facades\DB;

$items = DB::table('realization')
    ->select('*')
    ->leftJoin('seo', 'seo.id_seo', '=', 'realization.id_seo')
    ->where('realization_status', '=', 1)
    ->get();



foreach ($items as $item) {
    Route::get('/'.str_replace('/', '/', $item->url), 'RealizationController@Show')
        ->name('realization.show.'.$item->id_realization);
}

