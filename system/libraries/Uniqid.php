<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * iCodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2016 - 2021, iCurbe Development Group
 **/

class CI_Uniqid
{
    public function uniq($longitude)
    {
        $id="";
        $str = 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVxXyYzZ0123456789';
        for( $i=0; $i< $longitude; $i++ )
        {
            $id.= $str[mt_rand(0,59)];
        }
        return $id;
    }
}