<?php

namespace Sanofi\Pdb\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Winter\Storm\Support\Facades\Input;

class PDBDocCheck
{
    const DOCCHECK_VERIFY_REFERER = 'https://login.doccheck.com/';
    const DOCCHECK_LOGIN_PAGE_REF = '/login/check';
    const DOCCHECK_LOGIN_FINISH_PAGE_REF = '/login/process';

    const DOCCHECK_COOKIE_LOGIN_KEY = 'dc_nop';
    const DOCCHECK_COOKIE_PAGE_KEY = 'mv_hop';

    const COOKIE_LIFE_TIME = 30;

    public static function showDocCheckLogin()
    {
        return Redirect::to(self::DOCCHECK_LOGIN_PAGE_REF);
    }

    public static function showLastDocCheckPageRef()
    {
        if (self::hasDocCheckPageRef()) {
            return Redirect::to(self::getDocCheckPageRef());
        } else {
            return self::showDocCheckLogin();
        }
    }

    public static function storePageForLogin($pageObj)
    {
        if ($pageObj != null) {
            if (($pageUrl = $pageObj->url) != null) {
                if (Input::get('preview', false) !== false) {
                    $pageUrl = $pageUrl . '?preview=1';
                }

                Cookie::queue(self::DOCCHECK_COOKIE_PAGE_KEY, $pageUrl, self::COOKIE_LIFE_TIME);

                return true;
            }
        }

        return false;
    }

    public static function hasDocCheckPageRef()
    {
        return Cookie::get(self::DOCCHECK_COOKIE_PAGE_KEY) ?? false;
    }

    public static function getDocCheckPageRef()
    {
        return Cookie::get(self::DOCCHECK_COOKIE_PAGE_KEY);
    }

    public static function hasDocCheckLogin()
    {
        return (Cookie::get(self::DOCCHECK_COOKIE_LOGIN_KEY) ?? false) == 1;
    }

    public static function verifyDocCheckLogin()
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? false;
        if ($referer !== false) {
            $hasProperDocCheckReferer = ($referer === self::DOCCHECK_VERIFY_REFERER);

            // fetch the basic params, which appear with every login
            $dcParam = Input::get('dc', false);
            $timeStampParam = Input::get('dc_timestamp', false);

            if ($dcParam !== false && $timeStampParam !== false) {
                if ($hasProperDocCheckReferer && self::hasDocCheckPageRef()) {
                    self::storeDocCheckLogin();

                    return true;
                }
            }
        }

        return false;
    }

    private static function storeDocCheckLogin()
    {
        Cookie::queue(self::DOCCHECK_COOKIE_LOGIN_KEY, 1, self::COOKIE_LIFE_TIME);
    }
}
