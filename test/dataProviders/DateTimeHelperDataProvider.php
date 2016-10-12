<?php

namespace Likedo\Helpers\Test\DataProviders;


trait DateTimeHelperDataProvider
{
    /**
     * @return array
     */
    public function dateIsoToItaProvider()
    {
        return [
            '2016-04-05' => ['2016-04-05', '05/04/2016'],
            'Empty date' => ['', '00/00/0000'],
            'No iso date' => ['05/04/2016', '00/00/0000'],
            'String' => ['abcde', '00/00/0000'],
        ];

    }

    /**
     * @return array
     */
    public function dateItaToIsoProvider()
    {
        return [
            '05/04/2016' => ['05/04/2016', '2016-04-05'],
            'Empty date' => ['', '0000-00-00'],
            'No ita date' => ['2016-04-05', '0000-00-00'],
            'String' => ['abcde', '0000-00-00'],
        ];

    }

    /**
     * @return array
     */
    public function dateItaToExtendedFormatProvider()
    {
        return [
            'Empty string' => ['', ''],
            'No date' => ['blabla', 'blabla'],
            '16/10/2016' => ['16/10/2016', 'Domenica 16 Ottobre 2016'],
        ];

    }

    /**
     * @return array
     */
    public function dateIsoToExtendedFormatProvider()
    {
        return [
            'Empty string' => ['', ''],
            'No date' => ['blabla', 'blabla'],
            '2016-10-16' => ['2016-10-16', 'Domenica 16 Ottobre 2016'],
        ];

    }

    /**
     * @return array
     */
    public function dateTimeIsoToItaProvider()
    {
        return [
            'Empty string' => ['', '00/00/0000 00:00:00'],
            'No date' => ['blabla', '00/00/0000 00:00:00'],
            'IsoDate 2016-10-16 ' => ['2016-10-16', '00/00/0000 00:00:00'],
            'DateTimeIso 2016-10-16 12:30:00' => ['2016-10-16 12:30:00', '16/10/2016 12:30:00'],
        ];

    }

    /**
     * @return array
     */
    public function dateTimeItaToIsoProvider()
    {
        return [
            'Empty string' => ['', '0000-00-00 00:00:00'],
            'No date' => ['blabla', '0000-00-00 00:00:00'],
            'ItaDate 16/10/2016' => ['16/10/2016', '0000-00-00 00:00:00'],
            'DateTimeIta 16/10/2016 12:30:00' => ['16/10/2016 12:30:00', '2016-10-16 12:30:00'],
        ];

    }

    /**
     * @return array
     */
    public function dateTimeIsoDifferenceInMinutesProvider()
    {
        return [
            'Empty string' => ['', '', 0],
            'Empty string val 1' => ['', '2016-10-12 00:00:00', 0],
            'Empty string val 2' => ['2016-10-12 00:00:00', '', 0],
            'No date' => ['blabla', 'blabla', 0],
            'No date val 1' => ['blabla', '2016-10-12 00:00:00', 0],
            'No date val 2' => ['2016-10-12 00:00:00', 'blabla', 0],
            'Difference today yesterday' => ['2016-10-12 00:00:00', '2016-10-11 00:00:00', 1440],
            'Difference today yesterday 30 minutes' => ['2016-10-12 12:00:00', '2016-10-11 12:30:00', 1410],
        ];

    }


}
