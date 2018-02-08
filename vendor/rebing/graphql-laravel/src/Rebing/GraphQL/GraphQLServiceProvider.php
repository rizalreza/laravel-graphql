<?php namespace Rebing\GraphQL;

use Illuminate\Support\ServiceProvider;
use Rebing\GraphQL\Console\MutationMakeCommand;
use Rebing\GraphQL\Console\QueryMakeCommand;
use Rebing\GraphQL\Console\TypeMakeCommand;

class GraphQLServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootPublishes();

        $this->bootTypes();

        $this->bootSchemas();

        $this->bootRouter();
    }

    /**
     * Bootstrap router
     *
     * @return void
     */
    protected function bootRouter()
    {
        if(config('graphql.routes'))
        {
            include __DIR__.'/routes.php';
        }
    }

    /**
     * Bootstrap publishes
     *
     * @return void
     */
    protected function bootPublishes()
    {
        $configPath = __DIR__.'/../../config';

        $this->mergeConfigFrom($configPath.'/config.php', 'graphql');

        $this->publishes([
            $configPath.'/config.php' => config_path('graphql.php'),
        ], 'config');
    }

    /**
     * Bootstrap publishes
     *
     * @return void
     */
    protected function bootTypes()
    {
        $configTypes = config('graphql.types');
        foreach($configTypes as $name => $type)
        {
            if(is_numeric($name))
            {
                $this->app['graphql']->addType($type);
            }
            else
            {
                $this->app['graphql']->addType($type, $name);
            }
        }
    }

    /**
     * Add schemas from config
     *
     * @return void
     */
    protected function bootSchemas()
    {
        $configSchemas = config('graphql.schemas');
        foreach ($configSchemas as $name => $schema) {
            $this->app['graphql']->addSchema($name, $schema);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerGraphQL();

        $this->registerConsole();
    }

    public function registerGraphQL()
    {
        $this->app->singleton('graphql', function($app)
        {
            return new GraphQL($app);
        });
    }

    /**
     * Register console commands
     *
     * @return void
     */
    public function registerConsole()
    {
        $this->commands(TypeMakeCommand::class);
        $this->commands(QueryMakeCommand::class);
        $this->commands(MutationMakeCommand::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['graphql'];
    }

}
