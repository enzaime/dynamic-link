<?php

namespace Enzaime\DynamicLink\Tests\Unit;

use Enzaime\DynamicLink\Facades\EnzDynamicLink;
use Enzaime\DynamicLink\Tests\TestCase;

class DynamicLinkTest extends TestCase
{
    /** @test */
    public function it_test_generate_method_is_called()
    {
        EnzDynamicLink::fake();
        $link = 'https://enzaime.com';

        EnzDynamicLink::generate($link);
        
        EnzDynamicLink::assertGenerateMethodCalled();

        EnzDynamicLink::assertGenerated($link);
        
        EnzDynamicLink::assertNotGenerated("$link?test=not-generated");
    }
}
