<?php

namespace FailureTest\Test\Success;

use FailureTest\AllowFailure;

class AllowFailureTest extends \FailureTest\Test\TestCase
{
    use AllowFailure;

    /**
     * @allowedFailure
     */
    public function test_failure()
    {
        $this->assertTrue(false);
    }

    /**
     * @allowedFailure
     */
    public function test_success()
    {
        $this->assertTrue(true);
    }

    /**
     * @allowedFailure
     */
    public function test_exception()
    {
        throw new \Exception();
    }

    /**
     * @mustFail
     */
    public function test_it_should_fail()
    {
        $this->assertTrue(false);
    }

    /**
     * @mustFail
     */
    public function test_must_exception()
    {
        throw new \Exception();
    }

    /**
     * @allowedFailure
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

    /**
     * @mustFail
     * @dataProvider providesNonNumerics
     */
    public function test_must_fail_with_data_provider($input)
    {
        $this->assertTrue(is_numeric($input));
    }

    public function providesNonNumerics()
    {
        return array(
            array('b'),
            array(new \stdClass()),
            array(null),
            array('a sentence'),
            array(array())
        );
    }

    /**
     * @allowedFailure
     * @mustFail
     */
    public function test_allowed_is_more_important()
    {
        $this->assertTrue(true);
    }
}
