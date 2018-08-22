<?php

use Afiqiqmal\LaraHashSlug\HashService;

if (! function_exists('hash_service')) {
    function hash_service($salt = null, $length = null,  $alphabet = null)
    {
        return HashService::make($salt, $length, $alphabet);
    }
}