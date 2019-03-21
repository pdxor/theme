<?php
namespace App;

$data = apply_filters('sage/template/app-data/data', []);
echo template('partials.algolia.algolia', $data);

// $data = apply_filters('sage/template/app-data/data', []);
// echo template('template', $data);
//
// echo template('partials.header');
?>
