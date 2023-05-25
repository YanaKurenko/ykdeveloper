<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use CrudTrait;
    //use HasFactory;
    protected $table= 'gallery';

    public $timestamps=true;

    protected $guarded=[];

    public function work(){
        return $this->belongsTo(Work::class,'workId');
    }
}
