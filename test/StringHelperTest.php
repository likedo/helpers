<?php

namespace Likedo\Helpers\Test;

use Likedo\Helpers\StringHelper;

class StringHelperTest extends \PHPUnit_Framework_TestCase {

     use \Likedo\Helpers\Test\DataProviders\StringHelperDataProvider;

    /**
     * @param $expected
     * @return bool
     */
    protected function expectedIsAnException($expected)
    {
        if (is_array($expected)) {
            return false;
        }
        return strpos($expected, 'Exception') !== false
        || strpos($expected, 'PHPUnit_Framework_') !== false
        || strpos($expected, 'TypeError') !== false;
    }

    /**
     * @test
     * @param $val1
     * @param $val2
     * @param $expected
     * @dataProvider findStringIntoStringProvider
     */
    public function findStringIntoStringTest($val1, $val2, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            StringHelper::findStringIntoString($val1, $val2);
        } else {
            $this->assertEquals($expected, StringHelper::findStringIntoString($val1, $val2));
        }
    }

    /**
     * @test
     * @param $val1
     * @param $val2
     * @param $val3
     * @param $val4
     * @param $expected
     * @dataProvider truncateProvider
     */
    public function truncateTest($val1, $val2, $val3, $val4, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            StringHelper::truncate($val1, $val2, $val3, $val4);
        } else {
            $this->assertEquals($expected, StringHelper::truncate($val1, $val2, $val3, $val4));
        }
    }

    /**
     * @test
     * @param $val1
     * @param $val2
     * @param $expected
     * @dataProvider randomStringProvider
     */
    /*
    public function randomStringTest($val1, $val2, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            echo count(StringHelper::randomString($val1, $val2));
        } else {
            $this->assertEquals($expected, count(StringHelper::randomString($val1, $val2)));
        }
    }
    */

}
