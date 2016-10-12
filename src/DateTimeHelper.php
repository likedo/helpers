<?php

namespace Likedo\Helpers;
use Likedo\Helpers\ConvertValidateHelper;

/**
* Date Time Helper class
*/
class DateTimeHelper
{
    /**
     * Transform date iso 2016-04-05 to ita format 05/04/2016
     * @method dateIsoToIta
     * @param  string iso date
     * @return string ita date
     */
    public static function dateIsoToIta($dateIso)
    {
        if (is_null($dateIso) || empty($dateIso) || !ConvertValidateHelper::isDateIso($dateIso)) {
            return '00/00/0000';
        }
        $arrData = preg_split('[-]', $dateIso);
        return $arrData[2] . "/" . $arrData[1] . "/" . $arrData[0];
    }

    /**
     * Transform date iso 2016/05/04 to iso format 2016-05-04
     * @method dateItaToIso
     * @param  string ita date
     * @return string iso date
     */
    public static function dateItaToIso($dateIta)
    {
        if (is_null($dateIta) || empty($dateIta) || !ConvertValidateHelper::isDateIta($dateIta)) {
            return '0000-00-00';
        }
        $arrData = preg_split('/[\/.-]/', $dateIta);
        return $arrData[2] . '-' . $arrData[1] . '-' . $arrData[0];
    }

    /**
     * Transform date ita 11/10/2016 to extended date ita es. martedi 11 Ottobre 2016
     * @method dateItaToExtendedFormat
     * @param  string ita date
     * @return string extended ita date
     */
    public static function dateItaToExtendedFormat($dateIta)
    {
        if(!ConvertValidateHelper::isDateIta($dateIta)) {
            return $dateIta;
        }

        $arrData = explode('/', $dateIta);
        $giorno = $arrData[0];

        $dateIso = self::dateItaToIso($dateIta);
        $timestamp = strtotime($dateIso);
        $giornoIndex = date('w', $timestamp);
        $mese = date('n', $timestamp);
        $anno = date('Y', $timestamp);

        return DAYS_ARR[$giornoIndex].' '.$giorno.' '.MONTHS_ARR[$mese - 1].' '.$anno;
    }

    /**
     * Transform date iso 2016-10-11 to extended date ita es. martedi 11 Ottobre 2016
     * @method dateIsoToExtendedFormat
     * @param  string iso date
     * @return string extended iso date
     */
    public static function dateIsoToExtendedFormat($dateIso)
    {
        if(!ConvertValidateHelper::isDateIso($dateIso)) {
            return $dateIso;
        }

        $arrData = explode('-', $dateIso);
        $giorno = $arrData[2];
        $timestamp = strtotime($dateIso);
        $giornoIndex = date('w', $timestamp);
        $mese = date('n', $timestamp);
        $anno = date('Y', $timestamp);

        return DAYS_ARR[$giornoIndex].' '.$giorno.' '.MONTHS_ARR[$mese - 1].' '.$anno;

    }

    /**
     * Transform datetime iso 2016-10-11 12:30:00 to ita format 11/10/2016 12:30:00
     * @method dateTimeIsoToIta
     * @param  string iso datetime
     * @return string datetime ita format
     */
    public static function dateTimeIsoToIta($dateTimeIso)
    {
        if (is_null($dateTimeIso) || empty($dateTimeIso) || !ConvertValidateHelper::isDateTimeIso($dateTimeIso)) {
            return '00/00/0000 00:00:00';
        }
        $isoDate = substr($dateTimeIso, 0, 10);
        $arrData = preg_split('[-]', $isoDate);
        $time = substr($dateTimeIso, 11);
        return $arrData[2] . "/" . $arrData[1] . "/" . $arrData[0].' '.$time;
    }

    /**
     * Transform datetime ita 11/10/2016 12:30:00 to iso format 2016-10-11 12:30:00
     * @method dateTimeItaToIso
     * @param  string ita datetime
     * @return string datetime iso format
     */
    public static function dateTimeItaToIso($dateTimeIta)
    {
        if (is_null($dateTimeIta) || empty($dateTimeIta) || !ConvertValidateHelper::isDateTimeIta($dateTimeIta)) {
            return '0000-00-00 00:00:00';
        }
        $itaDate = substr($dateTimeIta, 0, 10);
        $arrData = preg_split('[/]', $itaDate);
        $time = substr($dateTimeIta, 11);
        return $arrData[2] . "-" . $arrData[1] . "-" . $arrData[0].' '.$time;
    }

    /**
     * Transform datetime ita 11/10/2016 12:30:00 to iso format 2016-10-11 12:30:00
     * @method dateTimeIsoDifferenceInMinutes
     * @param  string iso datetime
     * @param  string iso datetime
     * @return string minutes difference
     */
    public static function dateTimeIsoDifferenceInMinutes($isoDateTimeTo, $isoDateTimeFrom)
    {
        if (is_null($isoDateTimeTo) || empty($isoDateTimeTo) || !ConvertValidateHelper::isDateTimeIso($isoDateTimeTo)) {
            return 0;
        }

        if (is_null($isoDateTimeFrom) || empty($isoDateTimeFrom) || !ConvertValidateHelper::isDateTimeIso($isoDateTimeFrom)) {
            return 0;
        }

        $toTime = strtotime($isoDateTimeTo);
        $fromTime = strtotime($isoDateTimeFrom);

        return round(abs($toTime - $fromTime) / 60,2);
    }

}
