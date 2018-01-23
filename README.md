# FailureTest

Allow failing PHPUnit tests, to more easily manage your TODO's.

## Installation

* Using [Composer](https://getcomposer.org/): `composer require backendtea/failuretest`

Or simply copy the FailureTestCase.php into your project and include it yourself.

## Usage

```php
<?php 

use FailureTest\FailureTestCase;

class FailureTestCaseTest extends \PHPUnit\Framework\TestCase
{
    use FailureTestCase;

    public function test_it_handles_a_failure()
    {
        $this->assertTrue(false);
    }
}
```

Any test that has failed will show up as incomplete, with its failure message attached.
Once a test actually passes all its criteria, it will be marked as a failure, which means you can move it to your normal tests.

## Why

An issue on page 3 of your github issues is easily forgotten. But these tests allow you to commit a failing test to your VCS, and serve as a reminder every time you run your tests.

## TODO

Find out exactly what phpunit versions this package 'can' support.
