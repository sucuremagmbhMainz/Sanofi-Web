<?php

class PageController extends \BaseController
{

    public function unsubscribe()
    {
        $meta_data = array(
            'CID' => Input::get('CID'),
            'page_title' => trans('content.meta_title_1'),
            'meta_description' => '',
            'meta_robots' => 'noindex,nofollow',
            'keywords' => '',
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
            ),
        );
        return View::make('pages.unsubscribe', $meta_data);
    }

    public function registration_thank_you()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_2'),
            'meta_description' => '',
            'meta_robots' => 'noindex,nofollow',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
            ),
        );
        return View::make('pages.registrationThankYou', $meta_data);
    }

    public function treatmentoptions()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_3'),
            'meta_description' => trans('content.meta_description_3'),
            'keywords' => trans('content.meta_keywords_3'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
            ),
        );
        return View::make('pages.treatmentoptions', $meta_data);
    }

    public function travelconstipation()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_4'),
            'meta_description' => trans('content.meta_description_4'),
            'keywords' => trans('content.meta_keywords_4'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'travelconstipation', 'title' => trans('content.common_75')),
            ),
        );
        return View::make('pages.travelconstipation', $meta_data);
    }

    public function talktoyourdoctor()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_5'),
            'meta_description' => trans('content.meta_description_5'),
            'keywords' => trans('content.meta_keywords_5'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
            ),
        );
        return View::make('pages.talktoyourdoctor', $meta_data);
    }

    public function stoolsoftener()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_11a'),
            'meta_description' => trans('content.meta_description_11a'),
            'keywords' => trans('content.meta_keywords_11a'),
            'MenuActive' => 'StoolSoftener',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'stoolsoftener', 'title' => '<span class="blue">Stuhlweichmacher</span>'),
            ),
        );
        return View::make('pages.stoolsoftener', $meta_data);
    }

    public function dulcosoft()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_11b'),
            'meta_description' => trans('content.meta_description_11b'),
            'keywords' => trans('content.meta_keywords_11b'),
            'MenuActive' => 'StoolSoftener',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'stoolsoftener', 'title' => '<span class="blue">Stuhlweichmacher</span>'),
                array('page' => 'dulcosoft', 'title' => '<span class="blue">DulcoSoft<sup>®</sup> Lösung & Pulver</span>'),
            ),
        );
        return View::make('pages.dulcosoft', $meta_data);
    }

    public function dulcosoftpregnancy()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_11c'),
            'meta_description' => trans('content.meta_description_11c'),
            'keywords' => trans('content.meta_keywords_11c'),
            'MenuActive' => 'StoolSoftener',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'stoolsoftener', 'title' => '<span class="blue">Stuhlweichmacher</span>'),
                array('page' => 'dulcosoft', 'title' => '<span class="blue">DulcoSoft<sup>®</sup> in der Schwangerschaft & Stillzeit</span>'),
            ),
        );
        return View::make('pages.dulcosoftpregnancy', $meta_data);
    }

    public function zapfchen()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_10'),
            'meta_description' => trans('content.meta_description_10'),
            'keywords' => trans('content.meta_keywords_10'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'zapfchen', 'title' => trans('content.meta_breadcrumb_10')),
            ),
        );
        return View::make('pages.zapfchen', $meta_data);
    }

    public function preventconstipation()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_7'),
            'meta_description' => trans('content.meta_description_7'),
            'keywords' => trans('content.meta_keywords_7'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
            ),
        );
        return View::make('pages.preventconstipation', $meta_data);
    }

    public function pregnancybreastfeeding()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_8'),
            'meta_description' => trans('content.meta_description_8'),
            'keywords' => trans('content.meta_keywords_8'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
            ),
        );
        return View::make('pages.pregnancybreastfeeding', $meta_data);
    }

    public function laxatives()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_9'),
            'meta_description' => trans('content.meta_description_9'),
            'keywords' => trans('content.meta_keywords_9'),
            'MenuActive' => 'AllProducts',
            'body_class' => 'laxatives',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'laxatives', 'title' => trans('content.meta_breadcrumb_9_1')),
            ),
        );
        return View::make('pages.laxatives', $meta_data);
    }

    public function dragees()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_9'),
            'meta_description' => trans('content.meta_description_9'),
            'keywords' => trans('content.meta_keywords_9'),
            'MenuActive' => 'AllProducts',
            'body_class' => 'laxatives',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'dragees', 'title' => trans('content.meta_breadcrumb_9_1')),
            ),
        );
        return View::make('pages.dragees', $meta_data);
    }

    public function DulcolaxSuppository()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_10'),
            'meta_description' => trans('content.meta_description_10'),
            'keywords' => trans('content.meta_keywords_10'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'DulcolaxSuppository', 'title' => trans('content.meta_breadcrumb_10')),
            ),
        );
        return View::make('pages.DulcolaxSuppository', $meta_data);
    }

    /* public function mbalance(){
      $meta_data = array(
      'page_title' => trans('content.meta_title_11'),
      'meta_description' => trans('content.meta_description_11'),
      'keywords' => trans('content.meta_keywords_11'),
      'MenuActive' => 'AllProducts',
      'BreadCrumblist' => array(
      array('page' => 'home', 'title'=>trans('content.meta_breadcrumb_1') ),
      array('page' => 'constipationandgasrelief', 'title'=>trans('content.common_23') ),
      array('page' => 'mbalance', 'title'=>trans('content.header_213') ),
      ),
      );
      return View::make('pages.mbalance', $meta_data);

      } */

    public function dulcosoftloesung()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_11a'),
            'meta_description' => trans('content.meta_description_11a'),
            'keywords' => trans('content.meta_keywords_11a'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'dulcosoftloesung', 'title' => trans('content.header_80')),
            ),
        );
        return View::make('pages.dulcosoftloesung', $meta_data);
    }

    public function dulcosoftpulver()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_11a'),
            'meta_description' => trans('content.meta_description_11a'),
            'keywords' => trans('content.meta_keywords_11a'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'dulcosoftpulver', 'title' => trans('content.header_81')),
            ),
        );
        return View::make('pages.dulcosoftpulver', $meta_data);
    }

    public function dulcolaxlaxativeforwomen()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_11'),
            'meta_description' => trans('content.meta_description_11'),
            'keywords' => trans('content.meta_keywords_11'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'dulcolaxlaxativeforwomen', 'title' => trans('content.meta_breadcrumb_11')),
            ),
        );
        return View::make('pages.dulcolaxlaxativeforwomen', $meta_data);
    }

    public function Dulcolaxcoupon()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_12'),
            'meta_description' => trans('content.meta_description_12'),
            'keywords' => trans('content.meta_keywords_12'),
            'MenuActive' => 'SpecialOffers',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'Dulcolaxcoupon', 'title' => trans('content.common_54')),
            ),
        );
        return View::make('pages.Dulcolaxcoupon', $meta_data);
    }

    public function DulcolaxSpecialOffer()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_13'),
            'meta_description' => trans('content.meta_description_13'),
            'keywords' => trans('content.meta_keywords_13'),
            'MenuActive' => 'SpecialOffers',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'Dulcolaxcoupon', 'title' => trans('content.meta_breadcrumb_13')),
            ),
        );
        return View::make('pages.DulcolaxSpecialOffer', $meta_data);
    }

    public function dulcoglideapplicators()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_14'),
            'meta_description' => trans('content.meta_description_14'),
            'keywords' => trans('content.meta_keywords_14'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'dulcoglideapplicators', 'title' => trans('content.meta_breadcrumb_14')),
            ),
        );
        return View::make('pages.dulcoglideapplicators', $meta_data);
    }

    public function DulcoEase()
    {
        $meta_data = array(
            'page_title' => trans('content.common_40'),
            'meta_description' => trans('content.meta_description_15'),
            'keywords' => trans('content.meta_keywords_15'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'DulcoEase', 'title' => trans('content.meta_breadcrumb_15')),
            ),
        );
        return View::make('pages.DulcoEase', $meta_data);
    }

    public function countryselector()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_16'),
            'meta_description' => trans('content.meta_description_16'),
            'keywords' => trans('content.meta_keywords_16'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'countryselector', 'title' => trans('content.common_74')),
            ),
        );
        return View::make('pages.countryselector', $meta_data);
    }

    public function constipationandgasrelief()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_17'),
            'meta_description' => trans('content.meta_description_17'),
            'keywords' => trans('content.meta_keywords_17'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
            ),
        );
        return View::make('pages.constipationandgasrelief', $meta_data);
    }

    public function alleprodukte()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_18'),
            'meta_description' => trans('content.meta_description_17'),
            'keywords' => trans('content.meta_keywords_17'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
            ),
        );
        return View::make('pages.alleprodukte', $meta_data);
    }

    public function constipationandgasreliefcomparison()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_18'),
            'meta_description' => trans('content.meta_description_18'),
            'keywords' => trans('content.meta_keywords_18'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
            ),
        );
        return View::make('pages.constipationandgasreliefcomparison', $meta_data);
    }

    public function constipationcausessymptoms()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_19'),
            'meta_description' => trans('content.meta_description_19'),
            'keywords' => trans('content.meta_keywords_19'),
            'MenuActive' => 'AboutConstipation',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
            ),
        );
        return View::make('pages.constipationcausessymptoms', $meta_data);
    }

    public function commonsymptoms()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_20'),
            'meta_description' => trans('content.meta_description_20'),
            'keywords' => trans('content.meta_keywords_20'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
            ),
        );
        return View::make('pages.commonsymptoms', $meta_data);
    }

    public function commoncauses()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_21'),
            'meta_description' => trans('content.meta_description_21'),
            'keywords' => trans('content.meta_keywords_21'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
            ),
        );
        return View::make('pages.commoncauses', $meta_data);
    }

    public function colonoscopyprep()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_22'),
            'meta_description' => trans('content.meta_description_22'),
            'keywords' => trans('content.meta_keywords_22'),
            'MenuActive' => 'ProudSponsor',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'colonoscopyprep', 'title' => trans('content.meta_breadcrumb_22')),
            ),
        );
        return View::make('pages.colonoscopyprep', $meta_data);
    }

    public function sitemap()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_23'),
            'meta_description' => trans('content.meta_description_23'),
            'keywords' => '',
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'sitemap', 'title' => trans('content.meta_breadcrumb_23')),
            ),
        );
        return View::make('pages.sitemap', $meta_data);
    }

    public function kontakt()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_33'),
            'meta_description' => trans('content.meta_description_33'),
            'keywords' => trans('content.meta_keywords_33'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'sitemap', 'title' => 'Kontakt'),
            ),
        );
        return View::make('pages.kontakt', $meta_data);
    }

    public function bestatigung()
    {
        $meta_data = array(
            'page_title' => "Bestätigung",
            'meta_description' => "Kontakt",
            'keywords' => '',
            'MenuActive' => 'None',
            /* 'BreadCrumblist' => array(
              array('page' => 'home', 'title'=>trans('content.meta_breadcrumb_1') ),
              array('page' => 'sitemap', 'title'=>trans('content.meta_breadcrumb_23') ),
              ), */
        );
        return View::make('pages.bestatigung', $meta_data);
    }

    public function impressum()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_34'),
            'meta_description' => trans('content.meta_description_34'),
            'keywords' => trans('content.meta_keywords_34'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'sitemap', 'title' => 'Impressum'),
            ),
        );
        return View::make('pages.impressum', $meta_data);
    }

    public function privacy()
    {
        $meta_data = array(
            'page_title' => "Dulcolax® Datenschutz",
            'meta_description' => "Datenschutz",
            'keywords' => '',
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'sitemap', 'title' => 'Datenschutz'),
            ),
        );
        /* return View::make('pages.privacy', $meta_data); */
        return Redirect::to('https://mein.sanofi.de/Footer/Datenschutz', 301);
    }

    public function terms()
    {
        $meta_data = array(
            'page_title' => "Dulcolax® Nutzungsbedingungen",
            'meta_description' => "Nutzungsbedingungen",
            'keywords' => '',
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'sitemap', 'title' => 'Nutzungsbedingungen'),
            ),
        );
        return View::make('pages.terms', $meta_data);
    }

    public function FAQ()
    {
        $meta_data = array(
            'page_title' => trans('content.common_63'),
            'meta_description' => trans('content.meta_description_24'),
            'keywords' => trans('content.meta_keywords_24'),
            'MenuActive' => 'Advice',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'FAQ', 'title' => 'Wissenswertes'),
            ),
        );
        return View::make('pages.FAQ', $meta_data);
    }

    public function kaufen()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_24'),
            'meta_description' => trans('content.meta_description_24'),
            'keywords' => trans('content.meta_keywords_24'),
            'MenuActive' => 'Buy',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'kaufen', 'title' => trans('content.common_2')),
            ),
        );
        return View::make('pages.kaufen', $meta_data);
    }

    public function kaufendulcosoft()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_24_a'),
            'meta_description' => trans('content.meta_description_24_a'),
            'keywords' => trans('content.meta_keywords_24_a'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'kaufendulcosoft', 'title' => '<span class="blue">DulcoSoft<sup>®</sup> kaufen</span>'),
            ),
        );
        return View::make('pages.kaufendulcosoft', $meta_data);
    }

    public function onlineshops()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_27'),
            'meta_description' => trans('content.meta_description_27'),
            'keywords' => trans('content.content.meta_keywords_27'),
            'MenuActive' => 'OnlineShops',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'kaufen', 'title' => trans('content.common_2')),
                array('page' => 'onlineshops', 'title' => trans('content.common_103b')),
            ),
        );
        return View::make('pages.onlineshops', $meta_data);
    }

    public function pharmacyfinder()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_26'),
            'meta_description' => trans('content.meta_description_26'),
            'keywords' => trans('content.meta_keywords_26'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'kaufen', 'title' => trans('content.common_2')),
                array('page' => 'pharmacyfinder', 'title' => trans('content.common_102b')),
            ),
        );
        return View::make('pages.pharmacyfinder', $meta_data);
    }

    public function home()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_25'),
            'meta_description' => trans('content.meta_description_25'),
            'keywords' => trans('content.meta_keywords_25'),
            'MenuActive' => 'None',
            'BreadCrumblist' => array(),
        );
        return View::make('pages.home', $meta_data);
    }

    public function DulcoGasgasrelief()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_26'),
            'meta_description' => trans('content.meta_description_26'),
            'keywords' => trans('content.meta_keywords_26'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'DulcoGasgasrelief', 'title' => trans('content.common_6')),
            ),
        );
        return View::make('pages.DulcoGasgasrelief', $meta_data);
    }

    public function nptropfen()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_12'),
            'meta_description' => trans('content.meta_description_12'),
            'keywords' => trans('content.meta_keywords_12'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'nptropfen', 'title' => trans('content.header_214')),
            ),
        );
        return View::make('pages.nptropfen', $meta_data);
    }

    public function kinder()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_12a'),
            'meta_description' => trans('content.meta_description_12a'),
            'keywords' => trans('content.meta_keywords_12a'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'kinder', 'title' => trans('content.header_214b')),
            ),
        );
        return View::make('pages.kinder', $meta_data);
    }

    public function npperlen()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_14'),
            'meta_description' => trans('content.meta_description_14'),
            'keywords' => trans('content.meta_keywords_14'),
            'MenuActive' => 'AllProducts',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'npperlen', 'title' => trans('content.header_206')),
            ),
        );
        return View::make('pages.npperlen', $meta_data);
    }

    public function aboutgas()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_27'),
            'meta_description' => trans('content.meta_description_27'),
            'keywords' => trans('content.meta_keywords_27'),
            'MenuActive' => 'AboutGas',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'aboutgas', 'title' => trans('content.common_49')),
            ),
        );
        return View::make('pages.AboutGas', $meta_data);
    }

    public function container()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_28'),
            'meta_description' => trans('content.meta_description_28'),
            'keywords' => trans('content.meta_keywords_28'),
            'MenuActive' => 'AboutGas',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_49')),
            ),
        );
        return View::make('pages.container', $meta_data);
    }

    public function advice()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_29'),
            'meta_description' => trans('content.meta_description_29'),
            'keywords' => trans('content.meta_keywords_29'),
            'MenuActive' => 'Advice',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'advice', 'title' => 'Wissenswertes'),
                array('page' => 'advice', 'title' => trans('content.common_63')),
            ),
        );
        return View::make('pages.FAQ', $meta_data);
        return $this->FAQ();
    }

    /* Route::get('pico-liquid.html', 'PageController@pico-liquid');
      Route::get('dulcolax-perles.html', 'PageController@dulcolax_perles');
      Route::get('drops.html', 'PageController@drops');
      Route::get('dulcolax-enema.html', 'PageController@dulcolax_enema'); */

    public function pico_liquid()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_30'),
            'meta_description' => trans('content.common_72'),
            'keywords' => '',
            'MenuActive' => 'AllProducts',
            'body_class' => '',
            'product_name' => 'Pico Liquid',
            'product_img' => 'pc_dulcolax-pico-liquid_blackwhite.png',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'pico_liquid', 'title' => trans('content.meta_breadcrumb_30')),
            ),
        );
        return View::make('pages.dulcolaxpicoliquid', $meta_data);
    }

    public function historie()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_13'),
            'meta_description' => trans('content.meta_description_13'),
            'keywords' => trans('content.meta_keywords_13'),
            'MenuActive' => 'Advice',
            'body_class' => '',
            'product_name' => 'Pico Liquid',
            'product_img' => 'pc_dulcolax-pico-liquid_blackwhite.png',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'advice', 'title' => 'Wissenswertes'),
                array('page' => 'historie', 'title' => trans('content.header_215')),
            ),
        );
        return View::make('pages.historie', $meta_data);
    }

    public function brochure()
    {
        $meta_data = array(
            'page_title' => 'Dulcolax® Info-Broschüre',
            'meta_description' => trans('content.meta_description_13'),
            'keywords' => trans('content.meta_keywords_13'),
            'MenuActive' => 'Advice',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'advice', 'title' => 'Wissenswertes'),
                array('page' => 'brochure', 'title' => 'Info-Broschüre'),
            ),
        );
        return View::make('pages.brochure', $meta_data);
    }

    public function packshot()
    {
        $meta_data = array(
            'page_title' => 'Dulcolax® Produktabbildungen',
            'meta_description' => trans('content.common_72b'),
            'keywords' => trans('content.common_72a'),
            'MenuActive' => 'AllProducts',
            'body_class' => '',
            'product_name' => 'Pico Liquid',
            'product_img' => 'pc_dulcolax-pico-liquid_blackwhite.png',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'packshot', 'title' => 'Packshot'),
            ),
        );
        return View::make('pages.packshot', $meta_data);
    }

    public function pflichttext()
    {
        $meta_data = array(
            'page_title' => trans('content.header_216'),
            'meta_description' => trans('content.common_72'),
            'keywords' => '',
            'MenuActive' => 'AllProducts',
            'body_class' => '',
            'product_name' => 'Perles',
            'product_img' => 'pc_dulcolax-perles_blackwhite.png',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'pflichttext', 'title' => trans('content.header_216')),
            ),
        );
        return View::make('pages.pflichttext', $meta_data);
    }

    public function dulcolax_perles()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_31'),
            'meta_description' => trans('content.common_72'),
            'keywords' => '',
            'MenuActive' => 'AllProducts',
            'body_class' => '',
            'product_name' => 'Perles',
            'product_img' => 'pc_dulcolax-perles_blackwhite.png',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'dulcolax_perles', 'title' => trans('content.meta_breadcrumb_31')),
            ),
        );
        return View::make('pages.dulcolaxperles', $meta_data);
    }

    public function drops()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_32'),
            'meta_description' => trans('content.common_72'),
            'keywords' => '',
            'MenuActive' => 'AllProducts',
            'body_class' => '',
            'product_name' => 'Drops',
            'product_img' => 'pc_dulcolax-drops_blackwhite.png',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'drops', 'title' => trans('content.meta_breadcrumb_32')),
            ),
        );
        return View::make('pages.dulcolaxdrops', $meta_data);
    }

    public function dulcolax_enema()
    {
        $meta_data = array(
            'page_title' => trans('content.meta_title_33'),
            'meta_description' => trans('content.common_72'),
            'keywords' => '',
            'MenuActive' => 'AllProducts',
            'body_class' => '',
            'product_name' => 'Enema',
            'product_img' => 'pc_dulcolax-enema_blackwhite_2.png',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationandgasrelief', 'title' => trans('content.common_23')),
                array('page' => 'dulcolax_enema', 'title' => 'Dulcolax<sup class="reg">&reg;</sup> Enema'),
            ),
        );
        return View::make('pages.blankproduct', $meta_data);
    }

    public function tv_spot()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_35'),
            'meta_description' => trans('content.meta_description_35'),
            'keywords' => trans('content.meta_keywords_35'),
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'tv_spot', 'title' => 'Dulcolax<sup>&reg;</sup> TV Spot'),
            ),
        );
        return View::make('pages.tv_spot', $meta_data);
    }

    public function tv_spot_dulcosoft()
    {

        $meta_data = array(
            'page_title' => trans('content.meta_title_36'),
            'meta_description' => trans('content.meta_description_36'),
            'keywords' => trans('content.meta_keywords_36'),
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'tv_spot', 'title' => 'DulcoSoft<sup>&reg;</sup> TV Spot'),
            ),
        );
        return View::make('pages.tv_spot_dulcosoft', $meta_data);
    }

    public function selbsttest()
    {

        $meta_data = array(
            'page_title' => 'Selbst Test',
            'meta_description' => 'Dieser Selbst – Test liefert Anhaltspunkte, ob man von einer Verstopfung betroffen ist.',
            'keywords' => 'Verstopfung, Verdauung, Verdauungsprobleme, Ursachen',
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'selbsttest', 'title' => 'Dulcolax<sup>&reg;</sup> Selbst &ndash; Test'),
            ),
        );
        return View::make('pages.selbsttest', $meta_data);
    }







    public function verstopung_perlen()
    {

        $meta_data = array(
            'MenuActive' => 'Verstopfung',
            'page_title' => trans('Was hilft bei Darmträgheit und Verstopfung ?'),
            'meta_description' => trans('Wenn Darmträgheit und Blähbauch den Alltag beschweren – Dulcolax® NP Perlen befreien gut verträglich von Verstopfung. Hier mehr erfahren!'),
            'keywords' => trans('Verstopfung, Dulcolax<sup>&reg;</sup> NP Perlen, Ich kann wieder, aufgeblähter Bauch, Blähbauch, Verdauungsprobleme, Darmträgheit, träger Darm, Stuhlgang, Obstipation, Abführmittel, Verstopfung lösen, Flohsamen, Blähungen, Luft im Bauch, Hausmittel, Hausmittel gegen Verstopfung, natürliche Abführmittel, Verdauung anregen'),
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
                array('page' => 'verstopung_perlen', 'title' => 'Allgemein'),
            ),
        );
        return View::make('pages.perlen', $meta_data);
    }

    public function verstopung_perlen_stress()
    {

        $meta_data = array(
            'MenuActive' => 'Verstopfung',
            'page_title' => trans('Wenn der Darm streikt: Das hilft bei Verstopfung durch Stress!'),
            'meta_description' => trans('Stress im Alltag, Stillstand auf der Toilette? Verstopfung und Blähungen durch Stress sind keine Seltenheit! Hier helfen Dulcolax® NP Perlen. '),
            'keywords' => trans('Verstopfung, Dulcolax<sup>&reg;</sup> NP Perlen, Ich kann wieder, aufgeblähter Bauch, Blähbauch, Verdauungsprobleme, Darmträgheit, träger Darm, Stuhlgang, Obstipation, Abführmittel, Verstopfung lösen, Blähungen, Blähungen durch Stress, Luft im Bauch, Stress, Blähungen durch Stress, Verstopfung durch Stress, Meteorismus, aufgeblähter Bauch, Stress abbauen'),
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
                array('page' => 'verstopung_perlen_stress', 'title' => 'Stress'),
            ),
        );
        return View::make('pages.perlenstress', $meta_data);
    }


    public function verstopung_perlen_ernaehrung()
    {

        $meta_data = array(
            'MenuActive' => 'Verstopfung',
            'page_title' => trans('Verstopfung und Blähungen trotz gesundem Speiseplan?'),
            'meta_description' => trans('Warum es trotz ausgewogener Ernährung zu Darmträgheit, Völlegefühl und Verstopfung kommen kann. Hier mehr erfahren!'),
            'keywords' => trans('Verstopfung, Dulcolax<sup>&reg;</sup> NP Perlen, Ich kann wieder, aufgeblähter Bauch, Blähbauch, Verdauungsprobleme, Darmträgheit, träger Darm, Stuhlgang, Obstipation, Abführmittel, Verstopfung lösen, Blähungen, Luft im Bauch, Völlegefühl, Flohsamen, Leinsamen, Ballaststoffe, Luft im Bauch, Verstopfung Ernährung, Blähungen Ernährung'),
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
                array('page' => 'verstopung_perlen_ernaehrung', 'title' => 'Ernährung'),
            ),
        );
        return View::make('pages.perlenernaehrung', $meta_data);
    }

    public function verstopung_perlen_hormone()
    {

        $meta_data = array(
            'MenuActive' => 'Verstopfung',
            'page_title' => trans('Was hilft bei Verstopfung nach der Schwangerschaft?'),
            'meta_description' => trans('Frauensache: Träger Darm und Verstopfung nach der Schwangerschaft? Damit sind Sie in der Stillzeit nicht allein! Dulcolax® NP Perlen befreien gut verträglich.'),
            'keywords' => trans('Verstopfung, Dulcolax<sup>&reg;</sup> NP Perlen, Ich kann wieder, aufgeblähter Bauch, Blähbauch, Verdauungsprobleme, Darmträgheit, träger Darm, Stuhlgang, Obstipation, Abführmittel, Verstopfung lösen, Blähungen, Luft im Bauch, Mütter, Stillzeit, Schwangerschaft, Menstruation, Wechseljahre, hormonelle Veränderungen, Hormone, Hausmittel'),
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
                array('page' => 'verstopung_perlen_hormone', 'title' => 'Hormone'),
            ),
        );
        return View::make('pages.perlenhormone', $meta_data);
    }


    public function verstopung_perlen_reise()
    {

        $meta_data = array(
            'MenuActive' => 'Verstopfung',
            'page_title' => trans('Verstopfung und träger Darm auf Reisen – nein danke! '),
            'meta_description' => trans('Reiseapotheke: Mit Dulcolax® NP Perlen im Gepäck die Reise unbeschwert genießen. Hier mehr erfahren!.'),
            'keywords' => trans('Verstopfung, Dulcolax<sup>&reg;</sup> NP Perlen, Ich kann wieder, aufgeblähter Bauch, Blähbauch, Verdauungsprobleme, Darmträgheit, träger Darm, Stuhlgang, Obstipation, Abführmittel, Verstopfung lösen, Blähungen, Luft im Bauch, Mütter, Stillzeit, Schwangerschaft, Menstruation, Wechseljahre, hormonelle Veränderungen, Hormone, Hausmittel'),
            'BreadCrumblist' => array(
                array('page' => 'home', 'title' => trans('content.meta_breadcrumb_1')),
                array('page' => 'constipationcausessymptoms', 'title' => trans('content.common_10')),
                array('page' => 'verstopung_perlen_reise', 'title' => 'Reise'),
            ),
        );
        return View::make('pages.perlenreise', $meta_data);
    }

}
