<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scope extends Model
{
    //
    use SoftDeletes;
    protected $table = "iso_scope";
    protected $guarded = ['id'];
}
