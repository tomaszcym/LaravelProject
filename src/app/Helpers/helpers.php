<?php

use App\Model\ConstField;
use Intervention\Image\Facades\Image;

function GetConstField($name) {
    $field = ConstField::where('const_field_name', $name)->first();
    return $field->const_field_text;
}


function RenderImage($url, $width = null, $height = null, $fit = null) {
    try {
        $img = Image::make('storage/image/'.$url)->resize(300, null);
        return asset($img->dirname.'/'.$img->basename);
    }
    catch (Exception $e) {
//        dd($e);
        return asset('image/default.jpg');
    }
}

