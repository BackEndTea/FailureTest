<?php

namespace FailureTest\Test;
/**
 * We use this set-up to be able to test against php unit versions without the new namespace uses.
 */
if (class_exists(\PHPUnit\Framework\TestCase::class)) {
    class TestCase extends \PHPUnit\Framework\TestCase
    {
    }
}else {
    class TestCase extends \PHPUnit_Framework_TestCase
    {
    }
}