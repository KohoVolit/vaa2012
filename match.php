<?php
// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('./smarty/templates');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');
$smarty->setConfigDir('./smarty/configs');

$parties_file = './nazorova_votes.json';

//extract user values
$user = get_user_values();

//read parties
$parties = json_decode(file_get_contents($parties_file));

//calculate match
$results = calc_match($user,$parties);

$smarty->assign('results', $results);
$smarty->display('match.tpl');

/**
* calculates results for one set
*/
function calc_match($user,$set,$extra=2) {
  $results = array();
  foreach ($set as $s) {
    $sum = 0;
    $count = 0;
    if (count($user['vote']) > 0) {
      foreach($user['vote'] as $key => $uv) {
        //weight
        if (isset($user['weight'][$key])) $w = $extra;
        else $w = 1;
        //
        $sum = $sum + $w*$s->vote->$key*$uv;
        $count = $count + $w;
      }
    } else
        $count = 1; // to allow match = 0/1 = 0;
    $results[] = array(
      'name' => $s->name,
  	  'short_name' => $s->short_name,
  	  'friendly_name' => $s->friendly_name,
  	  'result' => $sum/$count,
  	  'result_percent' => round(100*$sum/$count),
    );
  }
  //sort by result
  foreach ($results as $key => $row) {
    $result[$key]  = $row['result'];
  }
  array_multisort($result, SORT_DESC, $results);
  
  return $results;
}


/**
* extracts user's answers
*/
function get_user_values() {
  $user = array();
  if (count($_GET) > 0) {
    foreach ($_GET as $key => $param) {
      //votes
      if (substr($key,0,2) == 'q-')
        $user['vote'][substr($key,2)] = $param;
      else if (substr($key,0,2) == 'c-')
        $user['weight'][substr($key,2)] = true;
    }
  } else
    return false;
  
  return $user;

}

?>
