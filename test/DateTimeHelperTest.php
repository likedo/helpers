<?php

namespace Likedo\Helpers\Test;

use Likedo\Helpers\DateTimeHelper;

class DateTimeHelperTest extends \PHPUnit_Framework_TestCase {

     use \Likedo\Helpers\Test\DataProviders\DateTimeHelperDataProvider;

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
     * @param $val
     * @param $expected
     * @dataProvider dateIsoToItaProvider
     */
    public function dateIsoToItaTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            DateTimeHelper::dateIsoToIta($val);
        } else {
            $this->assertEquals($expected, DateTimeHelper::dateIsoToIta($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider dateItaToIsoProvider
     */
    public function dateItaToIsoTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            DateTimeHelper::dateItaToIso($val);
        } else {
            $this->assertEquals($expected, DateTimeHelper::dateItaToIso($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider dateItaToExtendedFormatProvider
     */
    public function dateItaExtendedTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            DateTimeHelper::dateItaToExtendedFormat($val);
        } else {
            $this->assertEquals($expected, DateTimeHelper::dateItaToExtendedFormat($val));
        }
    }

}
