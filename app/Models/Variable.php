<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    use CrudTrait;
    // use HasFactory;
    protected $table='variables';
    public $timestamps=true;

    protected $fillable= [
        'id',
        'title',
        'desc',
        'image',
    ];
}
