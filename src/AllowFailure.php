<?php

namespace FailureTest;

use FailureTest\Util\VersionHelper;

if (VersionHelper::getPHPUnitMajorVersion() === '6') {
    /**
     * @mixin \PHPUnit\Framework\TestCase | \PHPUnit_Framework_TestCase
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

            if ($allowedFailure || ($mustFail && !$this->mustFailButPassed)) {
                $this->markTestIncomplete(
                    'This test has failed but is allowed to do so.'.
                    ' The original failure message was: ' . $t->getMessage()
                );
            }

            parent::onNotSuccessfulTest($t);
        }
    }
} elseif (VersionHelper::getPHPUnitMajorVersion() === '5') {
    /**
     * @mixin \PHPUnit_Framework_TestCase | \PHPUnit_Framework_TestCase
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

        /**
         * @param \Throwable $t
         */
        protected function onNotSuccessfulTest($t)
        {
            $annotations = $this->getAnnotations();
            $allowedFailure = isset($annotations['method']['allowedFailure']) || isset($annotations['class']['allowedFailure']);
            $mustFail = isset($annotations['method']['mustFail']) || isset($annotations['class']['mustFail']);

            if ($allowedFailure || ($mustFail && !$this->mustFailButPassed)) {
                $message = $allowedFailure ?
                    'This test has failed but is allowed to do so. ' :
                    'This test has failed but is expected to do so. ';
                $this->markTestIncomplete(
                    $message .
                    ' The original failure message was: ' . $t->getMessage()
                );
            }

            parent::onNotSuccessfulTest($t);
        }
    }
}
