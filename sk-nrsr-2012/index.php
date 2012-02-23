<?php
/**
* VAA
* reads questions from json
*/

$qfile = 'questions.json';

// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('../smarty/templates');
$smarty->setCompileDir('../smarty/templates_c');
$smarty->setCacheDir('../smarty/cache');
$smarty->setConfigDir('../smarty/configs');

//read questions
$questions = json_decode(file_get_contents($qfile));



$smarty->assignByRef('questions', $questions);
$smarty->display('test.tpl');


?>
