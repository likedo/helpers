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
    /*
    public function randomStringProvider()
    {
        return [
            'All Empty string' => [6, 1, '123456'],
        ];
    }
    */



}
