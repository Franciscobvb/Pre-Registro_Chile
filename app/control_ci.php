<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class control_ci extends Authenticatable{
    protected $connection = 'status';
    protected $table = 'control_ci';

    public $incrementing = false;
    public $timestamps = false;
}