<?php

use Illuminate\Support\Facades\DB;

$items = DB::table('page')
    ->select('*')
    ->leftJoin('seo', 'seo.id_seo', '=', 'page.id_seo')
    ->where('page_status', '=', 1)
    ->get();



foreach ($items as $item) {
    $url = $item->url;
    if($url == '/')
        $url = 'home';
    $url = str_replace('/', '.', $url);

    if($item->page_module == 'offer') {
        Route::get('/'.str_replace('/', '/', $item->url), 'OfferController@Index')->name('offer.index');
        continue;
    }

    if($item->page_module == 'realization') {
        Route::get('/'.str_replace('/', '/', $item->url), 'RealizationController@Index')->name('realization.index');
        continue;
    }

    Route::get('/'.str_replace('/', '/', $item->url), 'PageController@Show')
        ->name('page.show.'.$url);
}

