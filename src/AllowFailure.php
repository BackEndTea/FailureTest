<?php

namespace FailureTest;

/**
 * @mixin \PHPUnit\Framework\TestCase
 */
trait AllowFailure
{
    private $mustFailButPassed = false;

    protected function tearDown()
    {
        $annotations = $this->getAnnotations();
        if (!$this->hasFailed()) {
            $this->mustFailButPassed = isset($annotations['method']['mustFail']) || isset($annotations['class']['mustFail']);

            if ($this->mustFailButPassed) {
                $this->fail('This test is supposed to fail.');
            }
        }

        parent::tearDown();
    }

    protected function onNotSuccessfulTest(\Throwable $t)
    {
        $annotations = $this->getAnnotations();
        $allowedFailure = isset($annotations['method']['allowedFailure']) || isset($annotations['class']['allowedFailure']);
        $mustFail = isset($annotations['method']['mustFail']) || isset($annotations['class']['mustFail']);

        if($allowedFailure ||($mustFail && !$this->mustFailButPassed)) {
            $this->markTestIncomplete(
                'This test has failed but is allowed to do so.'.
                ' The original failure message was: ' . $t->getMessage()
            );
        }

        parent::onNotSuccessfulTest($t);
    }
}