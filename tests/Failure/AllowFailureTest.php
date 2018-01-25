<?php

namespace FailureTest\Test\Failure;

use FailureTest\AllowFailure;

class AllowFailureTest extends \PHPUnit\Framework\TestCase
{
    use AllowFailure;

    public function test_no_annotations()
    {
        $this->assertTrue(false);
    }

    /**
     * @mustFail
     */
    public function test_should_fail()
    {
        $this->assertTrue(true);
    }
}