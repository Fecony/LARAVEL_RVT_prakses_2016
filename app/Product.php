<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */

    protected $fillable = [
		'invoice_nr',
		'provider',
		'delivered_at',
		'product_name',
		'amount',
		'choices',
		'note',
    ];

    public function product() {
		return $this->belongsTo('Product');
	}
}
