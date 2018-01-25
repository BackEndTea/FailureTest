<?php

namespace FailureTest\Util;

final class VersionHelper
{
    public static function getPHPUnitMajorVersion()
    {
        if (class_exists(\PHPUnit_Runner_Version::class)) {
            $version = substr(\PHPUnit_Runner_Version::id(), 0, 1);
        } elseif (class_exists(\PHPUnit\Runner\Version::class)) {
            $version = substr(\PHPUnit\Runner\Version::id(), 0, 1);
        } else {
            throw  new \Exception('Unable to find PHPUnit Version class');
        }
        if ($version === '5' || $version === '6') {
            return $version;
        }

        return self::getFunctionType();
    }

    private static function getFunctionType()
    {
        if (class_exists(\PHPUnit\Framework\TestCase::class)) {
            $testCase = new \ReflectionClass(\PHPUnit\Framework\TestCase::class);
        } elseif (class_exists(\PHPUnit_Framework_TestCase::class)){
            $testCase = new \ReflectionClass(\PHPUnit_Framework_TestCase::class);
        } else {
            throw  new \Exception('Unable to find PHPUnit TestCase');
        }

        $param = $testCase->getMethod('onNotSuccessfulTest')->getParameters()[0]->getClass();

        if ($param === null) {
            $type = '';
        } else {
            $type = $param->getName();
        }

        switch ($type) {
            case 'Throwable':
                return '6';
            case '':
                return '5';
            default:
                throw  new \Exception('Unable to determine PHPUnit version');
        }
    }
}