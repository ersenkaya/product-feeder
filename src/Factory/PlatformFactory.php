<?php

namespace ProductFeeder\Factory;

use ProductFeeder\Adapter\PlatformAdapter\Cimri;
use ProductFeeder\Adapter\PlatformAdapter\Facebook;
use ProductFeeder\Adapter\PlatformAdapter\Google;
use ProductFeeder\Adapter\PlatformAdapter\IPlatform;

class PlatformFactory
{
    public function provide($provider): ?IPlatform
    {
        $response = null;

        if($provider == 'Google') {
            $response = new Google();
        }

        if($provider == 'Facebook') {
            $response = new Facebook();
        }

        if($provider == 'Cimri') {
            $response = new Cimri();
        }

        return $response;
    }
}