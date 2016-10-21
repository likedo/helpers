<?php

namespace Likedo\Helpers\Test\DataProviders;


trait StringHelperDataProvider
{
    /**
     * @return array
     */
    public function findStringIntoStringProvider()
    {
        return [
            'All Empty string' => ['', '' , false],
            'First Empty string' => ['', 'hello world' , false],
            'Second Empty string' => ['hello world', '' , false],
            'String exists' => ['hello world', 'world' , true],
            'String exists 2' => ['hello world', 'hello' , true],
            'String exists 3' => ['hello world', 'lo' , true],
            'String not exists' => ['hello world', 'bla' , false],
        ];
    }

    /**
     * @return array
     */
    public function truncateProvider()
    {
        return [
            'All Empty string' => ['', '' , '', '', ''],
            'Truncate 1' => ['Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 10 , ' ', '...', 'Lorem ipsum...'],
            'Truncate 2' => ['Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 10 , ',', '...', 'Lorem ipsum dolor sit amet...'],
        ];
    }

    /**
     * @return array
     */

    public function randomStringProvider()
    {
        return [
            '0, 0' => [0, 0, true],
            '1, 0' => [1, 0, true],
            '10, 0' => [10, 0, true],
            '10, 1' => [10, 1, true],
            '10, 2' => [10, 2, true],
            '10, 3' => [10, 3, true],
            '10, 4' => [10, 4, true],
        ];
    }




}
