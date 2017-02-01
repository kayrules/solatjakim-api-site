<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WaktuSolat extends Model
{
    protected $table = 'waktu_solat';

	public function scopeLastUpdate($query)
	{
		return $query->orderBy('created_at', 'desc')->first();
	}

	public function getCreatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}

	public function getUpdatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}
}
