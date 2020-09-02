<?php

declare(strict_types=1);

namespace HyperfExt\Hashing;

use HyperfExt\Hashing\Contract\DriverInterface;
use HyperfExt\Hashing\Contract\HashInterface;
use Hyperf\Utils\ApplicationContext;

abstract class Hash
{
    public static function getDriver(?string $name = null): DriverInterface
    {
        return ApplicationContext::getContainer()->get(HashInterface::class)->getDriver($name);
    }

    public static function info(string $hashedValue, ?string $driverName = null): array
    {
        return static::getDriver($driverName)->info($hashedValue);
    }

    public static function make(string $value, array $options = [], ?string $driverName = null): string
    {
        return static::getDriver($driverName)->make($value, $options);
    }

    public static function check(string $value, string $hashedValue, array $options = [], ?string $driverName = null): bool
    {
        return static::getDriver($driverName)->check($value, $hashedValue, $options);
    }

    public static function needsRehash(string $hashedValue, array $options = [], ?string $driverName = null): bool
    {
        return static::getDriver($driverName)->needsRehash($hashedValue. $options);
    }
}