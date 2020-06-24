<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ConstField extends Model
{
    protected $table = 'const_field';
    protected $primaryKey = 'id_const_field';

    protected $guarded = ['id_const_field'];
    protected $fillable = ['const_field_name', 'const_field_text'];
}
