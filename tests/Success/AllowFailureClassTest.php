<?php

namespace FailureTest\Test\Success;

use FailureTest\AllowFailure;

/**
 * @allowedFailure
 */
class AllowFailureClassTest extends \PHPUnit\Framework\TestCase
{
    use AllowFailure;

    public function test_failure()
    {
        $this->assertTrue(false);
    }

    public function test_success()
    {
        $this->assertTrue(true);
    }

    public function test_exception()
    {
        throw new \Exception();
    }

}
