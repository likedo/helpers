<?php

/**
 * Common costants array
 */

// Define active language
if (!defined('ACTIVE_LANG')) {
    define('ACTIVE_LANG', 'it');
}

/**
 * The costants month full text
 */
const MONTHS_ITA_ARR = [
    0 => 'Gennaio',
    1 => 'Febbraio',
    2 => 'Marzo',
    3 => 'Aprile',
    4 => 'Maggio',
    5 => 'Giugno',
    6 => 'Luglio',
    7 => 'Agosto',
    8 => 'Settembre',
    9 => 'Ottobre',
    10 => 'Novembre',
    11 => 'Dicembre',
];

/**
 * The costants month short text
 */
const MONTHS_SHORT_ITA_ARR = [
    0 => 'Gen',
    1 => 'Feb',
    2 => 'Mar',
    3 => 'Apr',
    4 => 'Mag',
    5 => 'Giu',
    6 => 'Lug',
    7 => 'Ago',
    8 => 'Set',
    9 => 'Ott',
    10 => 'Nov',
    11 => 'Dic',
];

/**
 * The costants month full text eng
 */
const MONTHS_ENG_ARR = [
    0 => 'January',
    1 => 'February',
    2 => 'March',
    3 => 'April',
    4 => 'May',
    5 => 'June',
    6 => 'July',
    7 => 'August',
    8 => 'September',
    9 => 'October',
    10 => 'November',
    11 => 'December',
];

/**
 * The costants month short text eng
 */
const MONTHS_SHORT_ENG_ARR = [
    0 => 'Jan',
    1 => 'Feb',
    2 => 'Mar',
    3 => 'Apr',
    4 => 'May',
    5 => 'Jun',
    6 => 'Jul',
    7 => 'Aug',
    8 => 'Sep',
    9 => 'Oct',
    10 => 'Nov',
    11 => 'Dec',
];

/**
 * The days month
 */
const DAYS_ITA_ARR = [
    0 => 'Domenica',
    1 => 'lunedi',
    2 => 'martedi',
    3 => 'mercoledi',
    4 => 'giovedi',
    5 => 'venerdi',
    6 => 'sabato',
];

/**
 * The days month eng
 */
const DAYS_ENG_ARR = [
    0 => 'Sunday',
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday',
    5 => 'Friday',
    6 => 'Saturday',
];


switch (ACTIVE_LANG) {
    case 'it':
        if (!defined('MONTHS_ARR')) {
            define('MONTHS_ARR', MONTHS_ITA_ARR);
        }
        if (!defined('DAYS_ARR')) {
            define('DAYS_ARR', DAYS_ITA_ARR);
        }
        if (!defined('MONTHS_SHORT_ARR')) {
            define('MONTHS_SHORT_ARR', MONTHS_SHORT_ITA_ARR);
        }
        break;
    case 'en':
        if (!defined('MONTHS_ARR')) {
            define('MONTHS_ARR', MONTHS_ENG_ARR);
        }
        if (!defined('DAYS_ARR')) {
            define('DAYS_ARR', DAYS_ENG_ARR);
        }
        if (!defined('MONTHS_SHORT_ARR')) {
            define('MONTHS_SHORT_ARR', MONTHS_SHORT_ENG_ARR);
        }
        break;
    default:
        if (!defined('MONTHS_ARR')) {
            define('MONTHS_ARR', MONTHS_ITA_ARR);
        }
        if (!defined('DAYS_ARR')) {
            define('DAYS_ARR', DAYS_ITA_ARR);
        }
        if (!defined('MONTHS_SHORT_ARR')) {
            define('MONTHS_SHORT_ARR', MONTHS_SHORT_ITA_ARR);
        }
        break;
}
