<?php

namespace Enzaime\DynamicLink;

use Exception;
use PHPUnit\Framework\Assert as PHPUnit;

class DynamicLinkFake
{
    protected $calledMethods = [];
    
    /**
     * Generate firebase dynamic link
     *
     * @param string $link
     * @param string $domainUriPrefix
     * @param string $suffixOption
     *
     * @return string
     */
    public function generate(string $link, ?string $domainUriPrefix = null, $suffixOption = "SHORT")
    {
        $this->calledMethods['generate'] = ($this->calledMethods['generate'] ?? 0) + 1;
    }

    /**
    * Assert if the generate method was called a number of times.
    * 
    * @param  int $count
    * @return void
    */
    public function assertGenerateMethodCalled(int $count = 1)
    {
        $actualCounter = $this->calledMethods['generate'] ?? 0;

        PHPUnit::assertSame(
            $count,
            $actualCounter,
            "EnzDynamicLink::generate method was called $actualCounter times but expected $count."
        );
    }
}
