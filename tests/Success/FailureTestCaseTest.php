<?php

namespace FailureTest\Test\Success;

use FailureTest\FailureTestCase;

class FailureTestCaseTest extends \PHPUnit\Framework\TestCase
{
    use FailureTestCase;

    public function test_it_handles_a_failure()
    {
        $this->assertTrue(false);
    }

    public function test_it_handles_a_failure_twice()
    {
        $this->assertTrue(false);
    }

    public function test_exception()
    {
        throw new \Exception();
    }
}
