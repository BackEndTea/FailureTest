<?php

namespace FailureTest\Test\Success;

use FailureTest\AllowFailure;

/**
 * @allowedFailure
 */
class AllowFailureClassTest extends \PHPUnit\Framework\TestCase
{
    use AllowFailure;

    public function test_failure()
    {
        $this->assertTrue(false);
    }

    public function test_success()
    {
        $this->assertTrue(true);
    }

    public function test_exception()
    {
        throw new \Exception();
    }

    /**
     * @dataProvider providesThings
     */
    public function test_with_dataProvider($input)
    {
        $this->assertTrue(is_numeric($input));
    }

    public function providesThings()
    {
        return [
            [1],
            ['b'],
            [new \stdClass()],
            [null],
            [0.7],
            ['1'],
            ['7'],
        ];
    }
}
