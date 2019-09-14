<?php

namespace Qlick\LaravelRating\Tests;

use Illuminate\Support\Facades\Artisan;
use Qlick\LaravelRating\Tests\Models\User;
use Orchestra\Testbench\TestCase as Orchestra;
use Qlick\LaravelRating\LaravelRatingServiceProvider;

abstract class TestCase extends Orchestra
{

    public function setUp()
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
        
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['config']->set('app.key', env('APP_KEY'));
    }

    public function setUpDatabase($app)
    {
        include_once __DIR__."/database/migrations/create_users_table.php";
        include_once __DIR__."/database/migrations/create_ratings_table.php";
        include_once __DIR__."/database/migrations/create_posts_table.php";

        (new \CreateUsersTable())->up();
        (new \CreateRatingsTable())->up();
        (new \CreatePostsTable())->up();
    }
    
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Qlick\LaravelRating\LaravelRatingServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            "LaravelRating" =>  \Qlick\LaravelRating\LaravelRatingFacade::class,
        ];
    }
}