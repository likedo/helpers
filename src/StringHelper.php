<?php

namespace Likedo\Helpers;

/**
 * String helper class
 */
class StringHelper
{
    /**
     * Return true or false if string exists (or not) in the string
     * @method findStringIntoString
     * @param  string $str
     * @param  string $strToSearch
     * @return bool
     */
    public static function findStringIntoString($str, $strToSearch)
    {
        if(is_null($str) || empty($str) || is_null($strToSearch) || empty($strToSearch)) {
            return false;
        }

        if(strpos($str, $strToSearch) !== false) {
            return true;
        }

        return false;
    }

    /**
     * Truncate text
     * @method truncate
     * @param  string  $string
     * @param  integer  $length
     * @param  string   $append
     * @return string
     */
    public static function truncate($string, $limit, $break = '.', $append = '...')
    {
        // return with no change if string is shorter than $limit
        if(strlen($string) <= $limit) {
            return $string;
        }
        // is $break present between $limit and the end of the string?
        if(false !== ($breakpoint = strpos($string, $break, $limit)))
        {
            if($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $append;
            }
        }

        return $string;
    }


    // Funzione per la generazione casuale di una stringa alphanumerica
    public static function randomString($lunghezza = 6, $securityLevel = 1)
    {
        if($securityLevel == 0) {
            $chars ="abcdefghijklmnopqrstuvwxyz";
        }
        else if($securityLevel == 1) {
            $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        }
        else if($securityLevel == 2) {
            $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        }
        else if($securityLevel == 3) {
            $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-_$!+&%?=*#@";
        }

        $password = '';
        for($i = 0; $i<$lunghezza; $i++){
            $password = $password.substr($chars, rand(0, strlen($chars) - 1), 1);
        }

        echo $password;

        return $password;
    }

}
?>
