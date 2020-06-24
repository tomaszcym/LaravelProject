<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seo';
    protected $primaryKey = 'id_seo';

    protected $guarded = ['id_seo'];
    protected $fillable = ['url', 'seo_title', 'seo_description', 'seo_tags'];
}
