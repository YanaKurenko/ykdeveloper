<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CrudTrait;
    // use HasFactory;
    protected $table = 'category';
    public $timestamps= true;
    protected $fillable=[
        'id',
        'name'
    ];

    public function work(){
        return $this->hasMany(Work::class);
    }
}
