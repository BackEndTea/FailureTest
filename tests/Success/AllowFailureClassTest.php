<?php

namespace FailureTest\Test\Success;

use FailureTest\AllowFailure;

/**
 * @allowedFailure
 */
class AllowFailureClassTest extends \FailureTest\Test\TestCase
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
        return array(
            array(1),
            array('b'),
            array(new \stdClass()),
            array(null),
            array(0.7),
            array('1'),
            array('8')
        );
    }
}
