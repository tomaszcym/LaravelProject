<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $table = 'gallery_item';
    protected $primaryKey = 'id_gallery_item';

    protected $guarded = ['id_gallery_item'];
    protected $fillable = ['gallery_item_src', 'gallery_item_title', 'gallery_item_status'];
}
