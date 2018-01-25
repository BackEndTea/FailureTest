# FailureTest

Allow failing PHPUnit tests and keep a close eye on issues until they are fixed.

## Installation

* Using [Composer](https://getcomposer.org/): `composer require backendtea/failuretest`

Or simply copy the AllowFailure.php into your project and include it yourself.

## Requirements

* PHP version 5.6 or higher
* PHPUnit version 5.0 or higher.

## Usage

**These traits make us of PHPUnits `tearDown()` function. If you override it, don't forget to call `parent::tearDown();`**

Any test that has failed will show up as incomplete, with its original failure message attached.
Once a test actually passes all its criteria, it will be marked as a failure, with an error message explaining you can move it to the normal tests.

### AllowFailure

```php
<?php 

use FailureTest\AllowFailure;

class AllowFailureTest extends \PHPUnit\Framework\TestCase
{
    use AllowFailure;

    /** 
     * @allowedFailure
     */
    public function test_it_handles_a_failure()
    {
        //This doesn't cause errors
        $this->assertTrue(false);
    }
    
    /** 
     * @allowedFailure
     */
    public function test_a_success_is_allowed()
    {
        //This doesn't cause errors
        $this->assertTrue(true);
    }
    
    /** 
     * @mustFail
     */
    public function test_it_checks_out()
    {
        //This doesn't cause errors
        $this->assertTrue(false);
    }
    
    /**
     * @mustFail
     */
    public function test_it_goes_wrong()
    {
        //This will give a failed test
        $this->assertTrue(true);
    }
}
```

The `AllowFailure` trait gives you access to two annotations: `@allowedFailure` and `@mustFail`. Both work on method or class level.

 * `@allowedFailure` Will simply mark a test as incomplete if it 'fails', and if it passes it does nothing.
 * `@mustFail` works the same as the `FailureTestCase`. Except you can configure it on function level.

## Why

Instead of just creating an issue when finding a bug, someone can also contribute a failing test case.
This makes sure the issue won't be forgotten, and it also allows another developer to better make sure they fixed the issue.

It can also serve as a nice 'todo' list, which can move with your code to another VCS if you so desire.
