<?php

namespace Likedo\Helpers;

/**
 * Validator class common parameter
 */
class ConvertValidateHelper
{
    /**
     * Check if value is integer, unsigned or not
     * @method isInteger
     * @param  $value
     * @param  boolean
     * @return boolean
     */
    public static function isInteger($value, $unsigned=true)
    {
        if(self::isStringNumberStartsWithMoreThanOneZero($value)) {
            return false;
        }

        if ($unsigned) {
            if(preg_match("/^[0-9]{1,}$/", $value)>0) {
                return true;
            }
        } elseif(preg_match("/^-{0,1}[0-9]{1,}/", $value)>0) {
            return true;
        }

        return false;
    }

    /**
     * Check if value is double
     * @method isDouble
     * @param  $value
     * @param  integer  $dec
     * @param  boolean  $unsigned
     * @return boolean
     */
    public static function isDouble($value, $dec=2, $unsigned=true)
    {
        if(self::isStringNumberStartsWithMoreThanOneZero($value)) {
            return false;
        }

        if (!ConvertValidateHelper::isInteger($dec)) {
            $dec="";
        }
        if ($unsigned) {
            if(preg_match("/^[0-9]{1,}(\.{1}[0-9]{1,$dec}){0,1}$/", $value)>0) {
                return true;
            }
        }
        elseif(preg_match("/^-{0,1}[0-9]{1,}(\.{1}[0-9]{1,$dec}){0,1}$/", $value)>0) {
            return true;
        }

        return false;
    }

    /**
     * Check if date is italian format
     * @method isDateIta
     * @param  $value
     * @return boolean
     */
    public static function isDateIta($value)
    {
        if (is_null($value) || empty($value) || strlen($value) != 10 || strpos($value, '/') === false) {
            return false;
        }

        $value = str_replace(' ', '', $value);
        if (is_null($value) || empty($value) || strlen($value) != 10 || strpos($value, '/') === false) {
            return false;
        }

        list($dd, $mm, $yyyy) = explode('/', $value);
        try {
            return checkdate($mm, $dd, $yyyy);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Check if data is iso format
     * @method isDateIso
     * @param  $value
     * @return boolean
     */
    public static function isDateIso($value)
    {
        if (is_null($value) || empty($value) || strlen($value) != 10 || strpos($value, '-') === false) {
            return false;
        }

        $value = str_replace(' ', '', $value);
        if (is_null($value) || empty($value) || strlen($value) != 10 || strpos($value, '-') === false) {
            return false;
        }

        list($yyyy, $mm, $dd) = explode('-', $value);
        try {
            return checkdate($mm, $dd, $yyyy);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Check if datetime is iso format
     * @method isDateTimeIso
     * @param  $value
     * @return boolean
     */
    public static function isDateTimeIso($value)
    {
        if (!self::isDateIso(substr($value, 0, 10))) {
            return false;
        }
        return self::isTimeIso(substr($value, 11));
    }

    /**
     * Check if datetime is italian format
     * @method isDateTimeIta
     * @param  $value
     * @return boolean
     */
    public static function isDateTimeIta($value)
    {
        if (!self::isDateIta(substr($value, 0, 10))) {
            return false;
        }

        return self::isTimeIso(substr($value, 11));
    }

    /**
     * Check if time is iso format
     * @method isTimeIso
     * @param  $value
     * @return boolean
     */
    public static function isTimeIso($value)
    {
        $strRegExp = '/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/';
        if(!(preg_match($strRegExp, $value) === 1)){
            return false;
        }
        list($HH, $ii, $ss) = explode(':', $value);
        return self::isInRange((int)$HH, 0, 23) && self::isInRange((int)$ii, 0, 59) && self::isInRange((int)$ss, 0, 59);
    }

    /**
     * Check if email is correct format
     * @method isMail
     * @param  $value
     * @param  boolean $checkMx
     * @return boolean
     */
    public static function isMail($value, $checkMx = false)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        }
        if ($checkMx) {
            list($mailDomain) = explode('@', $value);
            if (!checkdnsrr($mailDomain, 'MX')) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check if is array
     * @method isArray
     * @param  $value
     * @param  boolean $checkEmpty
     * @return boolean
     */
    public static function isArray($value, $checkEmpty = false)
    {
        if(!is_array($value)) {
            return false;
        }

        if($checkEmpty && count($value) == 0) {
            return true;
        }

        if(!$checkEmpty && count($value) > 0) {
            return true;
        }

        return false;
    }

    /**
     * Check if number into range
     * @method isInRange
     * @param  $value
     * @param  integer   $leftRange
     * @param  integer   $rightRange
     * @return boolean
     */
    public static function isInRange($value, $leftRange = 0, $rightRange = 0)
    {
        if(!is_int($value) || !is_int($leftRange) || !is_int($rightRange)) {
            return false;
        }

        if(self::isInteger($value, false) && self::isInteger($leftRange, false) && self::isInteger($rightRange, false))
        {
            return ($value >= $leftRange && $value <= $rightRange);
        }

        return false;
    }

    /**
     * Check if a string number starts with one ore more zero
     * i.e.: 00...000 or 000...0Xxxx.x  with X an int
     * @method isStringNumberStartsWithMoreThanOneZero
     * @param  [type] $value
     * @return boolean
     */
    public static function isStringNumberStartsWithMoreThanOneZero($value)
    {
        return preg_match('/^[0]{2,}$/', $value) === 1 || preg_match('/^0{1,}[1-9]{1,}$/', $value) === 1;
    }

}
