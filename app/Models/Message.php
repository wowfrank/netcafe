<?php

namespace Netcafe\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $fillable = [
		'msg_content', 'msg_ip', 'cafe_service', 'cafe_hardware', 'cafe_hygiene', 
		'cafe_environment', 'cafe_price', 'msg_agreement', 'msg_uid',
	];

	/**
     * Get the message for the user.
     */
    public function user()
    {
        return $this->belongsTo('Netcafe\User', 'msg_uid');
    }

    /*
     * Calculate the percentage of pros and cons
     *
     */
    public function getPercentage($name) 
    {
        $sumColumnPro = Message::where($name, 1)->count();
        $sumColumn = Message::count();

        return number_format($sumColumnPro*100/$sumColumn, 2);
    }
}
