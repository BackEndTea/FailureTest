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
        $this->hasFailed = true;
        parent::tearDown();
    }

    protected function onNotSuccessfulTest(\Throwable $t)
    {
        if(!$this->hasFailed) {
            parent::onNotSuccessfulTest($t);
        }

        $this->markTestIncomplete(
            'This test has failed. Be sure to fix this in the next release.'.
            ' The failure message was: ' . $t->getMessage()
        );
    }
}
