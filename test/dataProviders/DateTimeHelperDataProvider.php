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


}
