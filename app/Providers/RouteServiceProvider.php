<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapCorporateRoutes();

        $this->mapTeacherRoutes();

        $this->mapAcademiaRoutes();

        $this->mapUndergradRoutes();

        $this->mapEditorRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

     /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('admin')
             ->namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "corporate" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapCorporateRoutes()
    {
        Route::middleware('corporate')
             ->namespace($this->namespace)
             ->group(base_path('routes/corporate.php'));
    }

     /**
     * Define the "teacher" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapTeacherRoutes()
    {
        Route::middleware('teacher')
             ->namespace($this->namespace)
             ->group(base_path('routes/teacher.php'));
    }

    /**
     * Define the "academia" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAcademiaRoutes()
    {
        Route::middleware('academia')
             ->namespace($this->namespace)
             ->group(base_path('routes/academia.php'));
    }

     /**
     * Define the "undergrad" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapUndergradRoutes()
    {
        Route::middleware('undergrad')
             ->namespace($this->namespace)
             ->group(base_path('routes/undergrad.php'));
    }

    /**
     * Define the "editor" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapEditorRoutes()
    {
        Route::middleware('editor')
             ->namespace($this->namespace)
             ->group(base_path('routes/editor.php'));
    }
}
