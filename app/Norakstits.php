<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Norakstits extends Model
{
    protected $fillable = [
		'product_name',
		'amount',
		'choices',
    ];
}
