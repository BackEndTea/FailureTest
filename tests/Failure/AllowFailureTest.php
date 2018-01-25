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

    public function test_exception()
    {
        throw new \Exception();
    }

    /**
     * @mustFail
     */
    public function test_should_fail()
    {
        $this->assertTrue(true);
    }
}
