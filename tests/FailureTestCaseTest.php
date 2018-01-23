<?php

namespace FailureTest\Test;

use FailureTest\FailureTestCase;

class FailureTestCaseTest extends TestCase
{
    use FailureTestCase;

    public function test_it_handles_a_failure()
    {
        $this->assertTrue(false);
    }
}