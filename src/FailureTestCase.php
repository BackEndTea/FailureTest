<?php

namespace FailureTest;

/**
 * @mixin \PHPUnit\Framework\TestCase
 */
trait FailureTestCase
{
    private $hasFailed = true;

    protected function tearDown()
    {
        if (!$this->hasFailed()) {
            $this->hasFailed = false;
            $this->fail('This test has passed all checks, move it to the successful tests');
        }
        parent::tearDown();
    }

    protected function onNotSuccessfulTest(\Throwable $t)
    {
        if(!$this->hasFailed) {
            parent::onNotSuccessfulTest($t);
        }

        $this->markTestIncomplete(
            'This test has failed as expected.'.
            ' The original failure message was: ' . $t->getMessage()
        );
    }
}
