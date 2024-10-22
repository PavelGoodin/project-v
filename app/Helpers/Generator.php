<?php

namespace App\Helpers;

class Generator
{
/**
     * Generate key function.
     * */
    function generate_key(int $length):string
    {
        $chars = 'ABСDEFGHIGKLNPQRSTYWZ123456789';
        $numChars = strlen($chars);
        $key = '';
        for ($i = 0; $i < $length; $i++) {
        $key .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $key;
    }

}