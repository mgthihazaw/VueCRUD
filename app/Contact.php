<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Contact extends Model
{
    protected $fillable=[
    	'name','phone','user_id'];
    	public function user(){
    		return $this->belongsTo(User::class);
    	}
}
