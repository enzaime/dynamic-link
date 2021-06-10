<?php

namespace Enzaime\DynamicLink\Facades;

use Enzaime\DynamicLink\DynamicLinkFake;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void assertGenerateMethodCalled(?int $count = 0)
 * @method static void assertGenerated(string $link)
 * @method static void assertNotGenerated(string $link)
 * @method static string generate(string $link, ?string $domainUriPrefix = null, $suffixOption = "SHORT")
 *
 * @see \Enzaime\DynamicLink\DynamicLink
 */
class EnzDynamicLink extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @param  array|string  $eventsToFake
     * @return \Illuminate\Support\Testing\Fakes\EventFake
     */
    public static function fake($eventsToFake = [])
    {
        static::swap($fake = new DynamicLinkFake());

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return  'enz_dynamic_link';
    }
}
