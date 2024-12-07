<?php

/**
 * Master Composer
 *
 * Contains the processing logic used to build
 * the master.blade.php template.
 */

class MasterComposer {

    /**
     * Current locale manual override
     *
     * The locale used by this view composer can be set manually
     * via this public property to allow for better testability
     * of this view composer. It is not necessary to set this
     * property during regular use as this view composer will use
     * Laravel's current locale automatically.
     *
     * @var string    (xx-xx, xx_xx, or xx)
     */
    public $current_locale;

    public function compose($view)
    {

        /**
         * Current Locale
         *
         * Gets Laravel's current locale.
         * However, if the $this->current_locale property is set,
         * it will be used instead.
         * Lowercase and dashes are enforced for consistency
         * in both class names and lang direction detection.
         *
         * @var string    (xx-xx, xx_xx, or xx)
         */

        if (empty($this->current_locale))
        {
            $this->current_locale = 'en-us'; // TODO Lang::get('app.language'); after L4 is fixed.
        }

        $this->current_locale = strtolower($this->current_locale);

        $this->current_locale = str_replace('_', '-', $this->current_locale);

        $view['current_locale'] = $this->current_locale;


        /**
         * ISO Language
         *
         * Creates a two-letter, ISO 639-1 language code.
         * This is used as a body class and for determining
         * the HTML language direction.
         *
         * @var string    (xx)
         */

        $iso_language = substr($this->current_locale, 0, 2);


        /**
         * Language direction
         *
         * Returns 'ltr' or 'rtl' based on the current language.
         * This is for use within the master template's HTML tag.
         *
         * @var string    (ltr or rtl)
         */

        $rtl_languages = array('ar', 'dv', 'fa', 'ha', 'he', 'ps', 'ur', 'yi');

        if (in_array($iso_language, $rtl_languages))
        {
            $view['language_direction'] = 'rtl';
        }
        else
        {
            $view['language_direction'] = 'ltr';
        }


        /**
         * Meta Description
         *
         * Must return at least a blank string to prevent
         * undefined variable error on the master template.
         *
         * @var Arrives as a string or unset
         * @var Returns a string
         */

        if ( ! isset($view['meta_description']))
        {
           $view['meta_description'] = '';
        }


        /**
         * Meta Keywords
         *
         * Must return at least a blank string to prevent
         * undefined variable error on the master template.
         *
         * @var Arrives as a string or unset
         * @var Returns a string
         */

        if ( ! isset($view['keywords']))
        {
           $view['keywords'] = '';
        }


        /**
         * Meta Robots
         *
         * Defaults to allow indexing by search engines.
         * The user can set "noindex,nofollow", etc.
         *
         * @var Arrives as a string or unset
         * @var Returns as a string
         */

        if (empty($view['meta_robots']))
        {
            $view['meta_robots'] = 'index,follow';
        }


        /**
         * Page Title
         *
         * Must return at least a blank string to prevent
         * undefined variable error on the master template.
         *
         * @var Arrives as a string or unset
         * @var Returns a string
         */

        if ( ! empty($view['page_title']))
        {
            $view['page_title'] .= '';
        }
        else
        {
            $view['page_title'] = '';
        }


        /**
         * Body class
         *
         * Adds the ISO language code (xx), current locale (xx-xx),
         * a 'home' body class for the root URL, and any user-specified
         * custom body classes. The locale is not added if it is
         * two characters like the language code, to avoid a duplicate class.
         *
         * @var arrives as a string, an array, or unset
         * @var returns as a string
         */

        if (empty($view['body_class']))
        {
            $view['body_class'] = '';
        }
        else if (is_array($view['body_class']))
        {
            $custom_classes = implode(' ', $view['body_class']);
        }
        else
        {
            $custom_classes = $view['body_class'];
        }

        $view['body_class'] = $iso_language;

        if (strlen($this->current_locale) == 5)
        {
            $view['body_class'] .= ' '.$this->current_locale;
        }

        if ($_SERVER['REQUEST_URI'] == '/')
        {
            $view['body_class'] .= ' home';
        }

        if ( ! empty($custom_classes))
        {
            $view['body_class'] .= ' '.$custom_classes;
        }

        if (Auth::check())
        {
            $view['body_class'] .= ' logged-in';
        }

        /**
         * Canonical URL
         *
         * Allows the user to manually set the canonical URL.
         * Otherwise, sets it to the non-trailing slash version
         * of the current URL.
         *
         * @var arrives as a string or unset
         * @var returns as a string
         */

        if (empty($view['canonical']))
        {
            $url   = strip_tags($_SERVER['REQUEST_URI']);

            $parts = parse_url($url);

            if ($url == '/')
            {
                $view['canonical'] = '/';
            }
            else if (substr_compare($parts['path'], '/', -1, 1) == 0) // a trailing slash exists
            {
                $view['canonical'] = rtrim($parts['path'], '/');

                if (isset($parts['query']))
                {
                    $view['canonical'] .= '?'.$parts['query'];
                }

                if (isset($parts['fragment']))
                {
                    $view['canonical'] .= '#'.$parts['fragment'];
                }
            }
            else
            {
                $view['canonical'] = $url;
            }
        }
				
				
        /**
         * Menu Active
         *
         * Must return at least a blank string to prevent
         * undefined variable error on the master template.
         *
         * @var Arrives as a string or unset
         * @var Returns a string
         */

        if ( ! isset($view['MenuActive']))
        {
           $view['MenuActive'] = 'None';
        }

        /**
         * BreadCrumblist
         *
         * Must return at least a blank string to prevent
         * undefined variable error on the master template.
         *
         * @var Arrives as a string or unset
         * @var Returns a string
         */

        if ( ! isset($view['BreadCrumblist']))
        {
           $view['BreadCrumblist'] = array(
							array('page' => 'home', 'title'=>'Home' ),
					);
        }


        return $view;
    }

}
