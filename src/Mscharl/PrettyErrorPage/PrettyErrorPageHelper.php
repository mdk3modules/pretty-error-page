<?php
/**
 * Created by PhpStorm.
 * User: michaelscharl
 * Date: 18.02.16
 * Time: 08:08
 */

namespace Mscharl\PrettyErrorPage;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class PrettyErrorPageHelper
{
    /**
     * Get a translated string for an error page.
     * Either a specific one if defined or a generic if not.
     *
     * @param       $key
     * @param       $code
     * @param array $options
     *
     * @return string
     */
    public static function getPageText($key, $code, $options = [])
    {
        $cSpecificKey = "pretty-error-page-customized::$code.$key";
        $cGenericKey = "pretty-error-page-customized::generic.$key";
        $specificKey = "pretty-error-page::$code.$key";
        $genericKey = "pretty-error-page::generic.$key";

        if(Lang::has($cSpecificKey))
        {
            return Lang::get($cSpecificKey, $options);
        }
        else if(Lang::has($cGenericKey))
        {
            return Lang::get($cGenericKey, $options);
        }
        else if(Lang::has($specificKey))
        {
            return Lang::get($specificKey, $options);
        }

        return Lang::get($genericKey, $options);
    }

    public static function getEmailBugLink(\Exception $exception, $message)
    {
        $lang = App::getLocale();
        $fallbackLang = Config::get('app.fallback_locale');
        $emergencyLang = 'en';

        $translatedMail = "pretty-error-page::mail.$lang";
        $fallbackMail = "pretty-error-page::mail.$fallbackLang";
        $emergencyMail = "pretty-error-page::mail.$emergencyLang";

        $mailView = View::exists($translatedMail) ? $translatedMail : (View::exists($fallbackMail) ? $fallbackMail : $emergencyMail);

        View::share('exception', $exception);
        View::share('message', $message);

        $mailBody = rawurlencode(View::make($mailView)->render());
        $mailRecipient = Config::get('pretty-error-page::recipient');

        return "mailto:$mailRecipient?body=$mailBody";
    }
}
