<?php

namespace ProductFeeder\Factory;

use ProductFeeder\Adapter\PlatformAdapter\Cimri;
use ProductFeeder\Adapter\PlatformAdapter\Facebook;
use ProductFeeder\Adapter\PlatformAdapter\Google;
use ProductFeeder\Adapter\PlatformAdapter\IPlatform;
use ProductFeeder\Type\ProviderType;

class PlatformFactory
{
    /**
     * @throws \Exception
     */
    public static function instance($provider): IPlatform {
        switch ($provider) {
            case ProviderType::GOOGLE: return new Google();
            case ProviderType::FACEBOOK: return new Facebook();
            case ProviderType::CIMRI: return new Cimri();
            default: throw new \Exception("Unsupported Platform! $provider");
        }
    }
}