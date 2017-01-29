<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuSolat extends Model
{
    protected $table = 'waktu_solat';

	public function scopeLastUpdate($query)
	{
		return $query->orderBy('created_at', 'desc')->first();
	}
}
