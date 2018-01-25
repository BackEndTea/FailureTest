<?php

namespace FailureTest\Test\Failure;

use FailureTest\AllowFailure;

/**
 * @mustFail
 */
class MustFailClassTest extends \FailureTest\Test\TestCase
{
    use AllowFailure;

    public function test_failure()
    {
        $this->assertTrue(true);
    }
}
