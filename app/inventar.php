<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventar extends Model
{
	public function inventar() {
		return $this->hasMany('inventar');
	}

	protected $fillable = ['product_id', 'inventar_nr','status','user_id'];
}
