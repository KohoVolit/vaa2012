<?php
// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('./smarty/templates');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');
$smarty->setConfigDir('./smarty/configs');

//$input_file[0] = './inventura_parties_candidate2012.json';	//**
$input_file[1] = './inventura_votes_candidates.json';

$qfile = 'questions_inventura.json';	//**

//extract user values
$user = get_user_values();

//read parties
//$parties_0 = json_decode(file_get_contents($input_file[0]));

//read mps
$mps = json_decode(file_get_contents($input_file[1]));

//get mp
$mp = $mps->$_GET['mp_id'];

//reorder parties
/*foreach ($parties_0 as $party)
  $party->i = $user['order'][$party->id]['i'];
usort($parties_0,'cmp');*/

//rename order
/*$order2 = array();
foreach ($user['order'] as $row)
  $order2[] = $row;*/

//read questions
$questions = json_decode(file_get_contents($qfile));


/*print_r($user);
print_r($mp);
print_r($questions);
die();*/

$smarty->assignByRef('questions', $questions);
/*$smarty->assignByRef('parties', $parties_0);*/
$smarty->assignByRef('mp', $mp);
$smarty->assign('user', $user);
//$smarty->assign('order', $order2);
$smarty->display('compare_mp.tpl');


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
    if (isset($_GET['order'])) {
      $tmp = explode(',',$_GET['order']);
      $i = 1;
      foreach ($tmp as $item) {
        $tmp2 = explode('|',$item);
        $user['order'][$tmp2[0]]['id'] = $tmp2[0];
        $user['order'][$tmp2[0]]['result_percent'] = $tmp2[1];
        $user['order'][$tmp2[0]]['i'] = $i;
        $i++;
      }
    }
  } else
    return false;
  
  return $user;
}
/*
function cmp( $a, $b )
{ 
  if(  $a->i ==  $b->i ){ return 0 ; } 
  return ($a->i < $b->i) ? -1 : 1;
} */


?>
