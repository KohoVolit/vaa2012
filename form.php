<?php
// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('./smarty/templates');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');
$smarty->setConfigDir('./smarty/configs');

$results = array(
  array(
  	'name' => 'Kresťanské demokratické hnutie',
  	'short_name' => 'KDH',
  	'friendly_name' => 'kdh',
  	'result' => '.65486',
  	'result_percent' => '65',
  ),
    array(
  	'name' => 'Kresťanské demokratické hnutie',
  	'short_name' => 'KDH',
  	'friendly_name' => 'kdh',
  	'result' => '.48123',
  	'result_percent' => '48',
  ),
    array(
  	'name' => 'Kresťanské demokratické hnutie',
  	'short_name' => 'KDH',
  	'friendly_name' => 'kdh',
  	'result' => '.1010',
  	'result_percent' => '10',
  ),
    array(
  	'name' => 'Kresťanské demokratické hnutie',
  	'short_name' => 'KDH',
  	'friendly_name' => 'kdh',
  	'result' => '-.199',
  	'result_percent' => '-20',
  ),
    array(
  	'name' => 'Kresťanské demokratické hnutie',
  	'short_name' => 'KDH',
  	'friendly_name' => 'kdh',
  	'result' => '-.41',
  	'result_percent' => '-41',
  ),
    array(
  	'name' => 'Kresťanské demokratické hnutie',
  	'short_name' => 'KDH',
  	'friendly_name' => 'kdh',
  	'result' => '-.90',
  	'result_percent' => '-90',
  ),
);

$smarty->assign('results', $results);
$smarty->display('form.tpl');
?>
