<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id_gallery';

    protected $guarded = ['id_gallery'];
    protected $fillable = ['gallery_name', 'source_table', 'source_id'];

    public function items() {
        return $this->hasMany(GalleryItem::class, 'id_gallery', 'id_gallery');
    }
}
