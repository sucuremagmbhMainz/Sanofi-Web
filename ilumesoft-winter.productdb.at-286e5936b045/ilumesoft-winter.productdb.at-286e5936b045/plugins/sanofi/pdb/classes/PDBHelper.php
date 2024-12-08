<?php

namespace Sanofi\Pdb\Classes;

class PDBHelper
{
    private function __construct()
    {
    }

    public static function cleanupSubSupHtml($str)
    {
        $finalStr = preg_replace('/[\r\n]/', '', $str);
        $finalStr = str_replace('<sub>', '_SUB_', $finalStr);
        $finalStr = str_replace('</sub>', '_ESUB_', $finalStr);
        $finalStr = str_replace('<sup>', '_SUP_', $finalStr);
        $finalStr = str_replace('</sup>', '_ESUP_', $finalStr);
        $finalStr = preg_replace('/<(.*?)>/', '', $finalStr);
        $finalStr = str_replace('_SUB_', '<sub>', $finalStr);
        $finalStr = str_replace('_ESUB_', '</sub>', $finalStr);
        $finalStr = str_replace('_SUP_', '<sup>', $finalStr);
        $finalStr = str_replace('_ESUP_', '</sup>', $finalStr);

        return $finalStr;
    }
}
