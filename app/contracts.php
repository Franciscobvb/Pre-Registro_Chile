<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class contracts extends Authenticatable{
    protected $connection = 'mysqlsrv';
    protected $table = 'contracts';

    public $incrementing = false;
    public $timestamps = false;
}