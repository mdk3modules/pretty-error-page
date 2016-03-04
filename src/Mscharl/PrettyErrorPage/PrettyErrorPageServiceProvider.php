<?php namespace Mscharl\PrettyErrorPage;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PrettyErrorPageServiceProvider extends ServiceProvider
{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        //Add a pretty error output for 404-Errors
        App::missing(function ($exception)
        {
            return $this->printPrettyError($exception, 404);
        });

        //Add pretty maintenance output
        App::down(function ()
        {
            return $this->printPrettyError(new \Exception('Page is in maintenance mode'), 503);
        });

        //Add a pretty error output for any error
        App::error(function (\Exception $exception, $code)
        {
            //Log…
            Log::error($exception);
            //…and Return
            return $this->printPrettyError($exception, $code);
        });
    }

    /**
     * Boot the service provider
     *
     * @return void
     */
    public function boot()
    {
        //Register the packages assets
        $this->package('mscharl/pretty-error-page');

        //add a language namespace to allow customizing of translations
        Lang::addNamespace('pretty-error-page-customized', app_path('lang/packages/mscharl/pretty-error-page'));
    }

    /**
     * Return a pretty error page when not in debug mode and request doesn't require JSON
     *
     * @param \Exception $exception
     * @param int        $code
     *
     * @return \Illuminate\View\View|void
     */
    private function printPrettyError($exception, $code)
    {
        $showPretty = Config::get('pretty-error-page::always_pretty') === true || (Config::get('pretty-error-page::always_pretty') !== false && !Config::get('app.debug'));

        if($showPretty && !Request::wantsJson())
        {

            //Get the corrcet error message from the exception
            $message = $exception->getMessage();
            $message = (!empty($message) ? $message : ($code == 404 ? 'Route not found' : 'An unknown Error occured'));

            View::share('message', $message);
            View::share('exception', $exception);
            View::share('code', $code);

            return View::make($this->getErrorView($code));
        }
    }

    /**
     * Get the correct error view.
     *
     * @description
     * If a specific view (eg. 404) exists it will be used. If not it will look
     * for a generic error view (eg. 4xx). If both are not available a fallback
     * will be used.
     *
     * @param int|string $code
     * @param string     $fallbackView
     *
     * @return string
     */
    private function getErrorView($code, $fallbackView = 'pretty-error-page::pages.any')
    {
        $fallbackCode = substr("$code", 0, 1) . "xx";

        if(View::exists("pretty-error-page::pages.$code"))
        {
            return "pretty-error-page::pages.$code";
        }
        else if(View::exists("pretty-error-page::pages.$fallbackCode"))
        {
            return "pretty-error-page::pages.$fallbackCode";
        }
        else
        {
            return $fallbackView;
        }
    }
}
