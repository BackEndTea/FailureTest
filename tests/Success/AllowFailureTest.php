<?php

namespace FailureTest\Test\Success;

use FailureTest\AllowFailure;

class AllowFailureTest extends \PHPUnit\Framework\TestCase
{
    use AllowFailure;

    /**
     * @allowedFailure
     */
    public function test_failure()
    {
        $this->assertTrue(false);
    }

    /**
     * @allowedFailure
     */
    public function test_success()
    {
        $this->assertTrue(true);
    }

    /**
     * @allowedFailure
     */
    public function test_exception()
    {
        throw new \Exception();
    }

    /**
     * @mustFail
     */
    public function test_it_should_fail()
    {
        $this->assertTrue(false);
    }

    /**
     * @mustFail
     */
    public function test_must_exception()
    {
        throw new \Exception();
    }
}
