<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use CrudTrait;
    // use HasFactory;
    protected $table = 'docs';
    public $timestamps=true;

    protected $fillable=[
        'id',
        'name',
        'path',
        'workId',

    ];
    public function work(){
        return $this->belongsTo(Work::class, 'workId');
    }
}
