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

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider dateIsoToExtendedFormatProvider
     */
    public function dateIsoExtendedTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            DateTimeHelper::dateIsoToExtendedFormat($val);
        } else {
            $this->assertEquals($expected, DateTimeHelper::dateIsoToExtendedFormat($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider dateTimeIsoToItaProvider
     */
    public function dateTimeIsoToItaTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            DateTimeHelper::dateTimeIsoToIta($val);
        } else {
            $this->assertEquals($expected, DateTimeHelper::dateTimeIsoToIta($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider dateTimeItaToIsoProvider
     */
    public function dateTimeItaToIsoTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            DateTimeHelper::dateTimeItaToIso($val);
        } else {
            $this->assertEquals($expected, DateTimeHelper::dateTimeItaToIso($val));
        }
    }

    /**
     * @test
     * @param $val1
     * @param $val2
     * @param $expected
     * @dataProvider dateTimeIsoDifferenceInMinutesProvider
     */
    public function dateTimeIsoDifferenceInMinutesTest($val1, $val2, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            DateTimeHelper::dateTimeIsoDifferenceInMinutes($val1, $val2);
        } else {
            $this->assertEquals($expected, DateTimeHelper::dateTimeIsoDifferenceInMinutes($val1, $val2));
        }
    }


}
