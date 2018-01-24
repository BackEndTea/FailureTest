<?php

namespace FailureTest\Test;

use FailureTest\FailureTestCase;

class FailureTestCaseTest extends \PHPUnit\Framework\TestCase
{
    use FailureTestCase;

    public function test_it_handles_a_failure()
    {
        $this->assertTrue(false);
    }
}