<?php

namespace FailureTest\Test\Failure;

use FailureTest\AllowFailure;

/**
 * @mustFail
 */
class MustFailClassTest extends \PHPUnit\Framework\TestCase
{
    use AllowFailure;

    public function test_failure()
    {
        $this->assertTrue(true);
    }
}
