<?php

return [
    'salt'     => env('HASHID_SALT', 'lara-hash-slug'),
    'length'   => env('HASHID_LENGTH', 12),
    'alphabet' => env('HASHID_ALPHABET', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),
    'unique'   => env('HASHID_UNIQUE', true),
];
