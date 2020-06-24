<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Realization extends Model
{
    protected $table = 'realization';
    protected $primaryKey = 'id_realization';

    protected $guarded = ['id_realization'];
    protected $fillable = ['realization_title', 'realization_lead', 'realization_text', 'realization_status'];

    public function seo() {
        return $this->hasOne(Seo::class, 'id_seo', 'id_seo');
    }
}
