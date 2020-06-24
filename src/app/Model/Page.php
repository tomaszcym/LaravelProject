<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    protected $primaryKey = 'id_page';

    protected $guarded = ['id_page'];
    protected $fillable = ['page_name', 'page_module', 'page_status'];

    public function seo() {
        return $this->hasOne(Seo::class, 'id_seo', 'id_seo');
    }
}
