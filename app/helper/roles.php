<?php

use Illuminate\Support\Facades\DB;

function roles()
{
    $roles = DB::table('roles')->select('id', 'name')->get();
    return $roles;
}
