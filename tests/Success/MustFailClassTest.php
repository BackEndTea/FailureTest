<?php

namespace FailureTest\Test\Success;

use FailureTest\AllowFailure;

/**
 * @mustFail
 */
class MustFailClassTest extends \PHPUnit\Framework\TestCase
{
    use AllowFailure;

    public function test_failure()
    {
        $this->assertTrue(false);
    }
}