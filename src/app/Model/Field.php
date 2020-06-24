<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'field';
    protected $primaryKey = 'id_field';

    protected $guarded = ['id_field'];
    protected $fillable = ['field_name', 'field_value', 'field_type'];

    public function page() {
        return $this->hasOne(Page::class, 'id_page', 'id_page');
    }
}
