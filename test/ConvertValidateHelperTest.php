<?php

namespace Likedo\Helpers\Test;

use Likedo\Helpers\ConvertValidateHelper;

class ConvertValidateHelperTest extends \PHPUnit_Framework_TestCase {

    use \Likedo\Helpers\Test\DataProviders\ConvertValidateHelperDataProvider;

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
     * @dataProvider isIntegerUnsignedNoFloatingValidateProvider
     */
    public function isIntegerUnsignedNoFloatingTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isInteger($val);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isInteger($val, true));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider isDoubleUnSigned2DecProvider
     */
    public function isDoubleUnSigned2DecTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isDouble($val, 2, true);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isDouble($val, 2, true));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider dateItaValidateProvider
     */
    public function isDateItaTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isDateIta($val);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isDateIta($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider dateIsoValidateProvider
     */
    public function isDateIsoTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isDateIso($val);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isDateIso($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider dateTimeIsoValidateProvider
     */
    public function isDateTimeIsoTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isDateTimeIso($val);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isDateTimeIso($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider dateTimeItaValidateProvider
     */
    public function isDateTimeItaTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isDateTimeIta($val);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isDateTimeIta($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider timeIsoValidateProvider
     */
    public function isTimeIsoTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isTimeIso($val);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isTimeIso($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider mailValidateProvider
     */
    public function isMailTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isMail($val);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isMail($val));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider mailMxValidateProvider
     */
    public function isMailMxTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isMail($val, true);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isMail($val, true));
        }
    }


    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider arrayValidateProvider
     */
    public function isArrayTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isArray($val, false);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isArray($val, false));
        }
    }

    /**
     * @test
     * @param $val
     * @param $expected
     * @dataProvider arrayEmptyValidateProvider
     */
    public function isEmptyArrayTest($val, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isArray($val, true);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isArray($val, true));
        }
    }

    /**
     * @test
     * @param $value
     * @param $leftRange
     * @param $rightRange
     * @param $expected
     * @dataProvider isInRangeProvider
     */
    public function isInRangeTest($value, $leftRange, $rightRange, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isInRange($value, $leftRange, $rightRange);
        } else {
                $this->assertEquals($expected, ConvertValidateHelper::isInRange($value, $leftRange, $rightRange));
        }
    }

    /**
     * @test
     * @param $value
     * @param $expected
     * @dataProvider isStringNumberStartsWithMoreThanOneZeroValidateProvider
     */
    public function isStringNumberStartsWithMoreThanOneZeroTest($value, $expected)
    {
        if ($this->expectedIsAnException($expected)) {
            $this->expectException($expected);
            ConvertValidateHelper::isStringNumberStartsWithMoreThanOneZero($value);
        } else {
            $this->assertEquals($expected, ConvertValidateHelper::isStringNumberStartsWithMoreThanOneZero($value));
        }
    }


}
