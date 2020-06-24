<?php

use Illuminate\Support\Facades\DB;

$items = DB::table('offer')
    ->select('*')
    ->leftJoin('seo', 'seo.id_seo', '=', 'offer.id_seo')
    ->where('offer_status', '=', 1)
    ->get();



foreach ($items as $item) {
    Route::get('/'.str_replace('/', '/', $item->url), 'OfferController@Show')
        ->name('offer.show.'.$item->id_offer);
}

