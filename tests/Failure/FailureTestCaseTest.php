<?php

namespace FailureTest\Test\Failure;

use FailureTest\FailureTestCase;

class FailureTestCaseTest extends \PHPUnit\Framework\TestCase
{
    use FailureTestCase;

    public function test_success_is_not_allowed()
    {
        $this->assertTrue(true);
    }
}
