<?php

namespace app\helpers;

/**
 * Class BaseHelper
 *
 * @package app\helpers
 */
class BaseHelper
{
    /**
     * @param string $date
     * @param string $format
     *
     * @return string
     */
    public static function getDateAt(string $date, string $format = 'd.m.Y H:i:s'): string
    {
        $inDateTime = new \DateTime($date);

        return date($format, $inDateTime->getTimestamp());
    }

    /**
     * @return string
     */
    public static function ip_address()
    {
        $fields = array('HTTP_CLIENT_IP', 'HTTP_X_REAL_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR');

        $ip = "0.0.0.0";
        foreach($fields as $k)
        {
            if(!empty($_SERVER[$k]) && ip2long($_SERVER[$k]) != false)
            {
                $ip = $_SERVER[$k];
            }
        }

        return $ip;
    }
}
