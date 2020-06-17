<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'vueCrudData';
    public $timestamps = false;
    const NAME ='name';
    const AGE ='age';
    const PROFESSION ='profession';

    protected $fillable = [
        self::NAME,
        self::AGE,
        self::PROFESSION
    ];
    public $ownFields = [

        self::NAME,
        self::AGE,
        self::PROFESSION
    ];
}
