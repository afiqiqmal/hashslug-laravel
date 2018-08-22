<?php
/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 20/08/2018
 * Time: 8:05 PM
 */

namespace Afiqiqmal\LaraHashSlug;

use Hashids\Hashids;
use Illuminate\Support\Facades\Hash;

class HashService
{
    protected $hashids;

    public function __construct($salt, $length, $alphabet)
    {
        $this->hashids = new Hashids($salt, $length, $alphabet);
    }

    /**
     * Create an instance of HashService.
     *
     * @param $salt
     * @param $length
     * @param $alphabet
     * @return static
     */
    public static function make($salt, $length, $alphabet)
    {
        $str_salt     = is_null($salt) ? config('hashslug.salt') : config('hashslug.salt') . $salt;
        $length       = $length ? $length : config('hashslug.length');
        $alphabet     = $alphabet ? $alphabet : config('hashslug.alphabet');
        $str_salt     = Hash::make($str_salt);

        return new self($str_salt, $length, $alphabet);
    }

    /**
     * Encode.
     *
     * @param int $value
     *
     * @return string
     */
    public function encode($value)
    {
        return $this->hashids->encode($value);
    }

    /**
     * Decode.
     *
     * @param $value
     * @return int|null
     */
    public function decode($value)
    {
        $value = $this->hashids->decode($value);

        if (is_array($value) && sizeof($value) > 0) {
            return $value[0];
        } else {
            return null;
        }
    }
}