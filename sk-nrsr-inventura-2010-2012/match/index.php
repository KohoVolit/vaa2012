<?php
// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('../../smarty/templates');
$smarty->setCompileDir('../../smarty/templates_c');
$smarty->setCacheDir('../../smarty/cache');
$smarty->setConfigDir('../../smarty/configs');

$input_file[0] = '../inventura_parties_candidate2012.json';
$input_file[1] = '../inventura_votes_candidates.json';

//extract user values
$user = get_user_values();

//read parties and mps
$parties_0 = json_decode(file_get_contents($input_file[0]));
$mps = json_decode(file_get_contents($input_file[1]));

//calculate match
$results_2010 = calc_match($user,$parties_0,'party');
$results_mps = calc_match($user,$mps,'mp');

//create additional link for comparison
$additional_string = create_additional_string($results_2010);

$smarty->assign('query_string', $_SERVER['QUERY_STRING'] . '&' . $additional_string);
$smarty->assign('results_2010', $results_2010);
$smarty->assign('results_mps', $results_mps);
$smarty->display('match2.tpl');

/**
* creates additional string with order of parties
*/
function create_additional_string($results) {
  $out = 'order=';
  foreach ($results as $row) {
    $out .= $row['id'] . '|' . $row['result_percent'] . ',';
  }
  return rtrim($out,',');
}

/**
* calculates results for one set
*/
function calc_match($user,$set,$what,$extra=2) {
  $results = array();
  foreach ($set as $s) {
    $sum = 0;
    $count = 0;
    if (count($user['vote']) > 0) {
      foreach($user['vote'] as $key => $uv) {
        //weight
        if (isset($user['weight'][$key])) $w = $extra;
        else $w = 1;
        //existing divisions only:
        if ((property_exists($s,'vote')) and (property_exists($s->vote,$key))) {
          $sum = $sum + $w*$s->vote->$key*$uv;
        }
        $count = $count + $w;
      }
    }
    if ($count == 0) $count = 1; // to allow match = 0/1 = 0;
    if ($what == 'party') {
		$results[] = array(
		  'id' => $s->id,
		  'name' => $s->name,
	  	  'short_name' => $s->short_name,
	  	  'friendly_name' => $s->friendly_name,
	  	  'result' => $sum/$count,
	  	  'result_percent' => round(100*$sum/$count),
		);
	} else {
	    $c2010 = party2party($s->candidate2010);
		$tmp = array(
		  'last_name' => $s->last_name,
		  'first_name' => $s->first_name,
		  'id' => $s->id,
		  'name_2010' => $c2010['name'],
	  	  'short_name_2010' => $c2010['short_name'],
	  	  'friendly_name_2010' => $c2010['friendly_name'],
	  	  'result' => $sum/$count,
	  	  'result_percent' => round(100*$sum/$count),
		);
		if (property_exists($s,'candidate2012')) {
		  $c2012 = party2party($s->candidate2012);
		  $tmp['name_2012'] = $c2012['name'];
	  	  $tmp['short_name_2012'] = $c2012['short_name'];
	  	  $tmp['friendly_name_2012'] = $c2012['friendly_name'];
		} else {
		  $tmp['name_2012'] = 'Nekandiduje';
	  	  $tmp['short_name_2012'] = '-';
	  	  $tmp['friendly_name_2012'] = 'n';
		}
		$results[] = $tmp;
	}
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

/**
* add party information
*/
function party2party($party) {
  $ar = array(
    'MOST-HÍD' => array(
        'name' => 'Most-Híd',
        'short_name' => 'M-H',
        'friendly_name' => 'most-hid'
      ),
	'KDH' => array(
        'name' => 'Kresťansko-demokratické hnutie',
        'short_name' => 'KDH',
        'friendly_name' => 'kdh'
      ), 
    'SNS' => array(
        'name' => 'Slovenská národná strana',
        'short_name' => 'SNS',
        'friendly_name' => 'sns'
      ),
    'SDKÚ – DS' => array(
        'name' => 'Slovenská demokratická a kresťanská únia – Demokratická strana',
        'short_name' => 'SDKÚ-DS',
        'friendly_name' => 'sdku-ds'
      ),
    'SMER – SD' => array(
        'name' => 'Smer – sociálna demokracia',
        'short_name' => 'SMER-SD',
        'friendly_name' => 'smer-sd'
      ),
    'SaS' => array(
        'name' => 'Sľoboda a solidarita',
        'short_name' => 'SaS',
        'friendly_name' => 'sas'
      ),
    'OĽaNO' => array(
        'name' => 'Obyčajní ľudia a nezávislé osobnosti',
        'short_name' => 'OĽaNO',
        'friendly_name' => 'ol'
      ),
    'NAS'=> array(
        'name' => 'Národ a spravodlivosť',
        'short_name' => 'NAS',
        'friendly_name' => 'nas'
      )
  );
  return $ar[$party];
}

?>
