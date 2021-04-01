<?php

namespace Enzaime\DynamicLink\Tests;

use Enzaime\DynamicLink\Facades\EnzDynamicLink;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Foundation\Testing\WithFaker;

class TestCase extends OrchestraTestCase
{
    use WithFaker;

    /**
     * @var \Virtunus\Todo\Models\User
     */
    protected $user;

    /** @var string */
    protected $userPassword = 'password';
    
    /**
    * Setup the test environment.
    */
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations();
        $this->artisan('migrate')->run();

        // $this->setUser();
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {

        // $config = $app->make(Repository::class);

        // $config->set('auth.defaults.provider', 'users');

        $app['config']->set('auth.providers.users.model', User::class);

        // $config->set('auth.guards.api', ['driver' => 'passport', 'provider' => 'users']);
    }

    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Enzaime\DynamicLink\ServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.  In a normal app environment these would be added to
     * the 'aliases' array in the config/app.php file.  If your package exposes an
     * aliased facade, you should add the alias here, along with aliases for
     * facades upon which your package depends, e.g. Cartalyst/Sentry.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'EnzDynamicLink' => EnzDynamicLink::class,
        ];
    }
}
