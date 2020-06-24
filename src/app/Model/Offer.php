<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offer';
    protected $primaryKey = 'id_offer';

    protected $guarded = ['id_offer'];
    protected $fillable = ['offer_title', 'offer_lead', 'offer_text', 'offer_price', 'offer_external_url', 'offer_status'];

    public function seo() {
        return $this->hasOne(Seo::class, 'id_seo', 'id_seo');
    }
}
