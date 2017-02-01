<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WaktuSolat extends Model
{
    protected $table = 'waktu_solat';
	protected $dateFormat = 'Y-m-d H:i:s';
	protected $dates = [
        'created_at',
        'updated_at',
    ];

	public function scopeLastUpdate($query)
	{
		return $query->orderBy('created_at', 'desc')->first();
	}

	public function getCreatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:ia');
	}

	public function getUpdatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:ia');
	}
}
