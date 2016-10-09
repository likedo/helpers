<?php

namespace Likedo\Helpers;

/**
* Date Time Helper class
*/
class DateTimeHelper
{
    /**
     * Transform date iso 2016-04-05 to ita format 05/04/2016
     * @method dateIsoToIta
     * @param  [type]       $date [description]
     * @return [type]             [description]
     */
    public static function dateIsoToIta($date)
    {
        if (is_null($date) || empty($date) || !ConvertValidateHelper::isDateIso($date)) {
            return '00/00/0000';
        }
        $arr_data = preg_split('[-]', $date);
        return $arr_data[2] . "/" . $arr_data[1] . "/" . $arr_data[0];
    }

    //funzione per trasformare la data da italiano a Iso
    public static function dateItaToIso($date)
    {
        if (is_null($date) || empty($date) || !ConvertValidateHelper::isDateIta($date)) {
            return '0000-00-00';
        }
        $arr_data = preg_split('/[\/.-]/', $date);
        return $arr_data[2] . '-' . $arr_data[1] . '-' . $arr_data[0];
    }


}



    /*
    public static function dateItaSpec()
    {
        $mese = array ("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
        $giorno = array ("Domenica", "Lunedi", "Martedi", "Mercoledi", "Giovedi", "Venerdi", "Sabato");
        $data = $giorno[date("w")]." ".date("j")." ".$mese[(date("n")-1)]." ".date("Y");
        return $data;
    }

    //funzione per scrivere la data estesa in italiano
    public static function dateItaSpecHour()
    {
        $mese = array ("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
        $giorno = array ("domenica", "lunedi", "martedi", "mercoledi", "giovedi", "venerdi", "sabato");
        $data = $giorno[date("w")]." ".date("j")." ".$mese[(date("n")-1)]." ".date("Y")." ore ".date("H:i");
        return $data;
    }

    //funzione per trasformare la data da Iso a italiano
    public static function dateIsoToIta($data="")
    {
        if ($data=="")
        {
            return '00/00/0000';
        }
        else
        {
            $arr_data = preg_split('[-]',$data);
            return $arr_data[2]."/".$arr_data[1]."/".$arr_data[0];
        }
    }

    //funzione per trasformare la data da Iso a italiano specifata
    public static function dateIsoToItaSpec($data="",$ShowDayName=false,$ShortDayName=false)
    {
        if ($data=="")
        {
            return "00/00/0000";
        }
        else
        {
            $arr_data = @split('[-]',$data);

            $days = array ("Domenica", "Luned&igrave;", "Marted&igrave;", "Mercoled&igrave;", "Gioved&igrave;", "Venerd&igrave;", "Sabato");
            $mese = array ("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
            if (substr($arr_data[2],0,1)==0)
            {
                $arr_data[2] = substr($arr_data[2],1,1);
            }
            if (!$ShowDayName)
            {
                return $arr_data[2]." ".$mese[(($arr_data[1])-1)]." ".$arr_data[0];
            }else{
                $dayName=$days[date("w",mktime(0,0,0,$arr_data[1],$arr_data[2],$arr_data[0]))];
                if ($ShortDayName) {
                    $dayName=substr($dayName,0,3);
                }
                return $dayName." ".$arr_data[2]." ".$mese[(($arr_data[1])-1)]." ".$arr_data[0];
            }

        }
    }

    public static function dateItaToItaSpec($data="")
    {
        if ($data=="")
        {
            return "00/00/0000";
        }
        else
        {
            $arr_data = split('[/.-]',$data);
            $mese = array ("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
            if (substr($arr_data[2],0,1)==0)
            {
                $arr_data[2] = substr($arr_data[2],1,1);
            }
            return $arr_data[0]." ".$mese[(($arr_data[1])-1)]." ".$arr_data[2];
        }
    }

    public static function dateTimeItaToItaSpec($data="")
    {
        if ($data=="")
        {
            return "00/00/0000";
        }
        else
        {
            $arr_data = split('[/.-]',substr($data,0,10));
            $mese = array ("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
            if (substr($arr_data[2],0,1)==0)
            {
                $arr_data[2] = substr($arr_data[2],1,1);
            }
            return $arr_data[0]." ".$mese[(($arr_data[1])-1)]." ".$arr_data[2].substr($data,10,6);
        }
    }

    //funzione per trasformare la data da italiano a Iso
    public static function dateItaToIso($data="")
    {
        if ($data=="")
        {
            return "0000-00-00";
        }
        else
        {
            $arr_data = explode('/',$data);
            return $arr_data[2]."-".$arr_data[1]."-".$arr_data[0];
        }
    }

    //funzione per trasformare la data da italiano a Iso
    public static function dateTimeItaToIso($data="")
    {
        if ($data=="")
        {
            return "0001-01-01 00:00:00";
        }
        else
        {
            $arr_data = explode('/',substr($data,0,10));
            return $arr_data[2]."-".$arr_data[1]."-".$arr_data[0].substr($data,10);
        }
    }

    //funzione per trasformare la data da italiano a Iso
    public static function dateTimeIsoToIta($data="")
    {
        if ($data=="")
        {
            return "00/00/0000 00:00:00";
        }
        else
        {
            $arr_data = explode('-',substr($data,0,10));
            return $arr_data[2]."/".$arr_data[1]."/".$arr_data[0].substr($data,10);
        }
    }

    //Funzione per calcolare il tempo di caricamento della pagina
    public static function getTime()
    {
        $tempo = microtime();
        $tempo = explode(" ", $tempo);
        $tempo[0] = floatval($tempo[0]);
        $tempo[1] = floatval($tempo[1]);
        return ($tempo[0] + $tempo[1]);
    }

    //return a floating point that represent a query execution time in seconds.
    public static function getexectime($time_start, $time_end)
    {
        return ($time_end - $time_start);
    }

    //print a formatted string floating point that represent a query execution time in seconds.
    public static function printexectime($time_start, $time_end, $precision=6){
        echo number_format(getexectime($time_start, $time_end),$precision);
    }

    public static function getmicrotime()
    {
        list($usec, $sec) = explode(" ",microtime());
        return ((float)$usec + (float)$sec);
    }

    public static function formatDateIta($date,$format)
    {
        return FormatDateTimeIso(DateItaToIso($date),$format);
    }

    public static function formatDateIso($date,$format)
    {
        $H = "0";
        $i = "0";
        $s = "0";
        $Y = substr($date,0,4);
        $m = substr($date,5,2);
        $d = substr($date,8,2);
        return FormatTimeStampUnix(mktime($H,$i,$s,$m,$d,$Y),$format);

    }

    public static function formatDateTimeIta($date,$format)
    {
        return FormatDateTimeIso(DateTimeItaToIso($date),$format);
    }

    public static function formatDateTimeIso($date,$format)
    {
        $H = substr($date,11,2);
        $i = substr($date,14,2);
        $s = substr($date,17,2);
        $Y = substr($date,0,4);
        $m = substr($date,5,2);
        $d = substr($date,8,2);
        return date($format,mktime($H,$i,$s,$m,$d,$Y));

    }

    public static function formatTimeStampIso($date,$format)
    {
        if (MYSQL_INT_VERSION >= 50000)
        {
            $date = str_replace(array("-",":"," "),"",$date);
        }

        $H = substr($date,8,2);
        $i = substr($date,10,2);
        $s = substr($date,12,2);
        $Y = substr($date,0,4);
        $m = substr($date,4,2);
        $d = substr($date,6,2);
        return FormatTimeStampUnix(mktime($H,$i,$s,$m,$d,$Y),$format);
    }

    public static function formatTimeStampUnix($date,$format)
    {
        return strftime($format,$date);
    }

    public static function dateTimeItaToTimeStampIso($data="")
    {
        if ($data=="")
        {
            return "00000000000000";
        }
        else
        {
            $arr_data = split('[/.-]',substr($data,0,10));
            if (MYSQL_INT_VERSION >= 50000)
            {
                $sep1 ="-";
                $sep2 ="";
                $space=" ";
            }else{
                $sep1 ="";
                $sep2 =":";
                $space="";
            }
            return $arr_data[2].$sep1.$arr_data[1].$sep1.$arr_data[0].$space.str_replace($sep2,"",substr($data,10));
        }
    }

    public static function timeStampIsoToDateTimeIta($data="")
    {
        if (MYSQL_INT_VERSION >= 50000)
        {
            $data = str_replace(array("-",":"," "),array("","",""),$data);
        }
        if ($data=="")
        {
            return "0000/00/00 00:00:00";
        }
        else
        {
            //$arr_data = split('[/.-]',$data);
            //return substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4)." ore  ".substr($data,11,2).":".substr($data,14,2).":".substr($data,17,2);
            return substr($data,6,2)."/".substr($data,4,2)."/".substr($data,0,4)." ".substr($data,8,2).":".substr($data,10,2).":".substr($data,12,2);
        }
    }

    public static function getArraySettimanaCorrente($dateIta)
    {
        // Assuming $date is in format DD/MM/YYYY
        list($day, $month, $year) = explode("/", $dateIta);

        // Get the weekday of the given date
        $wkday = date('l',mktime('0','0','0', $month, $day, $year));

        switch($wkday) {
            case 'Monday': $numDaysToMon = 0; break;
            case 'Tuesday': $numDaysToMon = 1; break;
            case 'Wednesday': $numDaysToMon = 2; break;
            case 'Thursday': $numDaysToMon = 3; break;
            case 'Friday': $numDaysToMon = 4; break;
            case 'Saturday': $numDaysToMon = 5; break;
            case 'Sunday': $numDaysToMon = 6; break;
        }

        // Timestamp of the monday for that week
        $monday = mktime('0','0','0', $month, $day-$numDaysToMon, $year);

        $seconds_in_a_day = 86400;

        // Get date for 7 days from Monday (inclusive)
        for($i=0; $i<7; $i++)
        {
            $arrSettimana[$i] = date('Y-m-d',$monday+($seconds_in_a_day*$i));
        }

        return $arrSettimana;
    }

    public static function getEtaFromDateIso($dateIso)
    {
        $g = substr($dateIso,8,2);
        $m = substr($dateIso,5,2);
        $a = substr($dateIso,0,4);

        $year_diff = '';
        $time = mktime(0,0,0,(int)$m,(int)$g,$a);
        if (FALSE === $time) return 'err';
        $date = date('d-m-Y', $time);
        list ($day,$month,$year) = explode("-",$date);
        $year_diff = (date("Y") - $year);
        $month_diff = (date("m") - $month);
        $day_diff = (date("d") - $day);
        if ($day_diff < 0 || $month_diff < 0) $year_diff--;

        return $year_diff;

    }

    public static function dateDifferenceInMinutes($dataInizio, $dataFine)
    {
        $to_time = strtotime($dataInizio);
        $from_time = strtotime($dataFine);
        return round(abs($to_time - $from_time) / 60);
    }
    */
