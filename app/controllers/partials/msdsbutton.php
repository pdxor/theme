<?php
namespace App;

use Sober\Controller\Controller;

trait MSDSButton
{
    public static function sdssheets($id)
    {
        $sheets = \MICRO\PostTypes\Init::sdssheets($id);

        foreach ($sheets as $key => $value) {
            foreach ($value as $sheet => $s) {
                if ($s['exists'] != 1) {
                    unset($sheets[$key][$sheet]);
                }
            }
        };

        return $sheets;
    }
}
