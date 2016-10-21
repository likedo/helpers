# Help classes commonly used in projects

Classes of common use for some routine tasks such as validations, conversions, operations on arrays, and more

**NOTE:** classes always used the whole of the projects developed by the likedo team. Constantly updated.

## Overview

helper files:

* **Constants.php**
  - ACTIVE_LANG
  - MONTHS_ITA_ARR
  - MONTHS_SHORT_ITA_ARR
  - MONTHS_ENG_ARR
  - MONTHS_SHORT_ENG_ARR
  - DAYS_ITA_ARR
  - DAYS_ENG_ARR


* **ConvertValidateHelper.php**
  - isInteger
  - isDouble
  - isDateIta
  - isDateIso
  - isDateIta
  - isTimeIso
  - isMail
  - isArray
  - isInRange
  - isStringNumberStartsWithMoreThanOneZero


* **DateTimeHelper.php**
  - dateIsoToIta
  - dateItaToIso
  - dateItaToExtendedFormat
  - dateIsoToExtendedFormat
  - dateTimeIsoToIta
  - dateTimeItaToIso
  - dateTimeIsoDifferenceInMinutes


* **StringHelper.php**
    - findStringIntoString
    - truncate
    - randomString

## Requires

* php: >=5.4.5

## Installation

You can install the package via composer:

```
$ composer require likedo/helpers
```

## Usage

Create new php file, add composer autoload and start using functions.

```
<?php

require "vendor/autoload.php";

$dateIso = '2016-05-06';
$dateIta = ConvertValidateHelper::dateIsoToIta($dateIso); // Convert to ita format: 06/05/2016

```

## Example

```
<?php

/*
 * Constants
 */

echo MONTHS_ENG_ARR[0] // January

/*
 * ConvertValidateHelper
 */

// Check integer value
if(!ConvertValidateHelper::isInteger(1)) {
    echo 'Invalid';
}

/*
 * DateTimeHelper
 */

// Convert date iso format to ita
echo DateTimeHelper::dateIsoToIta('2016-05-06'); // 06/05/2016

/*
 * StringHelper
 */

// Generate random string
echo StringHelper::randomString(); // 3FYBJ7

```

NOTE: for full list of helpers functions, see the code in /src.

## Credits

* [Francesco Guidotti](https://github.com/likedo)

## About Likedo

Likedo ([www.likedo.it](https://www.likedo.it)) is a software house based in Florence, Italy. Specializing in web application development. With :heart:

## License

The MIT License (MIT). Please see ([License File](https://github.com/likedo/helpers/blob/master/LICENSE)) for more information.
