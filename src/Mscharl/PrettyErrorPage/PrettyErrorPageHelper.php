<?php
/**
 * Created by PhpStorm.
 * User: michaelscharl
 * Date: 18.02.16
 * Time: 08:08
 */

namespace Mscharl\PrettyErrorPage;


use App;
use Illuminate\View\Factory;
use Lang;
use Config;
use View;

class PrettyErrorPageHelper
{
    /**
     * Get a translated string for an error page.
     * Either a specific one if defined or a generic if not.
     *
     * @param $key
     * @param $code
     * @param array $options
     * @return string
     */
    public static function getPageText($key, $code, $options = []) {
        $specificKey = "pretty-error-page::$code.$key";
        $genericKey = "pretty-error-page::generic.$key";

        return Lang::has($specificKey) ? Lang::get($specificKey, $options) : Lang::get($genericKey, $options);
    }

    public static function getEmailBugLink(\Exception $exception, $message) {
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

        return "mailto:your@e.mail?body=$mailBody";
    }
}
