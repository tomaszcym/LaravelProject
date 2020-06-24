<?php

use Illuminate\Http\Request;

Route::middleware('auth')->group(function() {
    Route::group(['namespace' => 'Administrator', 'prefix' => 'administrator', 'as' => 'administrator.'], function () {


        Route::get('/toggle-status/{table}/{id}', 'HelperController@ToggleStatus')->name('toggle-status');


        Route::get('/', 'HomeController@Index')->name('index');




        // === USER =================================================
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::match(['GET', 'POST'], 'edit/', 'UserController@Edit')->name('edit');
        });



        // === PAGE =================================================
        Route::group(['prefix' => 'page', 'as' => 'page.'], function () {
            Route::get('/', 'PageController@Index')->name('index');
            Route::match(['GET', 'POST'], 'edit/{id_page?}', 'PageController@Edit')->name('edit');
            Route::get('delete/{id_page}', 'PageController@Delete')->name('delete');
        });

        // === FIELD =================================================
        Route::group(['prefix' => 'field', 'as' => 'field.'], function () {
//        Route::get('page/', 'FieldController@Items')->name('items');
            Route::match(['GET', 'POST'], 'edit/{id_page}', 'FieldController@Edit')->name('edit');
            Route::get('add/{id_page}/{type}', 'FieldController@AddField')->name('add-field');
            Route::get('delete/{id_field}', 'FieldController@Delete')->name('delete');
        });

        // === CONST FIELD ===========================================
        Route::group(['prefix' => 'const-field', 'as' => 'const-field.'], function () {
            Route::match(['GET', 'POST'], 'edit/', 'ConstFieldController@Edit')->name('edit');
        });

        // === GALLERY ===============================================
        Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
            Route::get('/{source_table}/{source_id}', 'GalleryController@Index')->where('id_page', '[0-9]+')->name('index');
            Route::match(['GET', 'POST'], '/edit/{source_table}/{source_id}', 'GalleryController@Edit')->name('edit');
            Route::get('/edit/{source_table}/{source_id}', 'GalleryController@Edit')->name('edit');
            Route::get('/gallery/delete/{id_gallery}', 'GalleryController@Delete')->name('delete');
        });


        // === GALLERY ITEM ===========================================
        Route::group(['prefix' => 'gallery_item', 'as' => 'gallery_item.'], function () {
            Route::match(['GET', 'POST'],'/add/{id_gallery}', 'GalleryItemController@Add')->name('add');
            Route::match(['GET', 'POST'],'/edit/{id_gallery_item}', 'GalleryItemController@Edit')->name('edit');
            Route::get('delete/{id_gallery_item}', 'GalleryItemController@Delete')->name('delete');
        });



        // === OFFER =================================================
        Route::group(['prefix' => 'offer', 'as' => 'offer.'], function () {
            Route::get('/', 'OfferController@Index')->name('index');
            Route::match(['GET', 'POST'], 'edit/{id_offer?}', 'OfferController@Edit')->name('edit');
            Route::get('delete/{id_offer}', 'OfferController@Delete')->name('delete');
        });



        // === REALIZATION ===========================================
        Route::group(['prefix' => 'realization', 'as' => 'realization.'], function () {
            Route::get('/', 'RealizationController@Index')->name('index');
            Route::match(['GET', 'POST'], 'edit/{id_realization?}', 'RealizationController@Edit')->name('edit');
            Route::get('delete/{id_realization}', 'RealizationController@Delete')->name('delete');
        });
    });
});




