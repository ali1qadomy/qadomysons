<?php

use App\Models\branche;

function branch()
{
    $branch = branche::all();
    return $branch;
}
?>
