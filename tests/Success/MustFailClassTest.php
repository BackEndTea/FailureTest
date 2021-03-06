<?php

namespace FailureTest\Test\Success;

use FailureTest\AllowFailure;

/**
 * @mustFail
 */
class MustFailClassTest extends \FailureTest\Test\TestCase
{
    use AllowFailure;

    public function test_failure()
    {
        $this->assertTrue(false);
    }

    public function test_exception()
    {
        throw new \Exception();
    }

    /**
     * @allowedFailure
     */
    public function test_allowed_is_more_important()
    {
        $this->assertTrue(true);
    }
}
