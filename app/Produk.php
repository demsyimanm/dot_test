<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'name',
		'description',
		'stock',
		'image',
		'users_id',
	);


	public function users()
	{
		return $this->belongsTo('App\User');
	}
}
