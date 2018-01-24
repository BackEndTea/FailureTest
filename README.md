# FailureTest

Allow failing PHPUnit tests and keep a close eye on issues until they are fixed.

## Installation

* Using [Composer](https://getcomposer.org/): `composer require backendtea/failuretest`

Or simply copy the FailureTestCase.php into your project and include it yourself.

## Requirements

* phpunit version 6.0 or higher.

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

Any test that has failed will show up as incomplete, with its original failure message attached.
Once a test actually passes all its criteria, it will be marked as a failure, with an error message explaining you can move it to the normal tests.

## Why

Instead of just creating an issue when finding a bug, someone can also contribute a failing test case.
This makes sure the issue won't be forgotten, and it also allows another developer to better make sure they fixed the issue.

It can also serve as a nice 'todo' list, which can move with your code to another VCS if you so desire.
