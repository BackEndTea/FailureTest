<?php

namespace FailureTest\Test;

if (class_exists(\PHPUnit\Framework\TestCase::class)) {
    class TestCase extends \PHPUnit\Framework\TestCase
    {
    }
}else {
    class TestCase extends \PHPUnit_Framework_TestCase
    {
    }
}