<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class consecutiveCodesTest extends Authenticatable{
    protected $connection = 'mysqlsrv';
    protected $table = 'consecutive_codes';

    public $incrementing = false;
    public $timestamps = false;
}
