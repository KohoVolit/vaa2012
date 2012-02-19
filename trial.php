<?php
// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('./smarty/templates');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');
$smarty->setConfigDir('./smarty/configs');

$questions = array(
  array(
    'id' => 1,
    'name' => 'Počet volebních obvodů',
    'question' => 'Počet volebných obvodov pre voľby do NR SR by sa mal zvýšiť.',
    'description' => 'Na Slovensku je pre voľby do NR SR len jeden volebný obvod so 150 mandátmi. Napríklad v ČR sa do Snemovne volí po krajoch (5-25 mandátových) a do Senátu v jednomandátových obvodoch. Menšie obvody všeobecne uprednostňujú veľké strany, ale tiež zvyšujú väzbu medzi voličom a poslancom.',
  ),
  array(
    'id' => 2,
    'name' => 'Zjednodušenie vypísania referenda',
    'question' => 'Počet podpisov pre vypísanie celoštátneho referenda na základe zhromaždenia podpisov od ľudí by sa mal znížiť',
    'description' => 'Na Slovensku je možné vyhlásiť celoštátne referendum po zhromaždení 350 000 podpisov, v "referendovom" Švajčiarsku je treba 50 000 podpisov. Referendum je možné žiadať aj v spolkových krajinách v Nemecku, v celom Nemecku prakticky nie. V ČR to nie je vôbec na základe žiadosti ľudí možné.',
  ),
  array(
    'id' => 3,
    'name' => 'Štátne inštitúcie po celom Slovensku',
    'question' => '(Nové) štátne inštitúcie by mali byť rozmiestnené rovnomerne po celom území Slovenska. ',
    'description' => 'Na Slovensku je veľké množstvo štátnych a štátom platených inštitúcií v Bratislave. Oproti tomu v Nemecku existuje pravidlo, že takéto orgány sa musia rozmiestniť rovnomerne po celej krajine.',
  ),
  array(
    'id' => 4,
    'name' => 'Volebné právo občanov EÚ',
    'question' => 'Právo voliť do NR SR by mali mať aj občania EÚ s trvalým pobytom na Slovensku. ',
    'description' => 'Občania EÚ s trvalým pobytom na Slovensku tú môžu voliť pri komunálnych a európskych voľbách. Nemajú však právo voliť do NR SR.',
  ),
  array(
    'id' => 5,
    'name' => 'Rozšírenie garancií v druhom pilíri',
    'question' => 'Garancie vkladov proti strate v "druhom pilieri" dôchodkového systému by mali byť posilnene.',
    'description' => 'Bolo schválené, že vkladová garancia oproti strate v "druhom pilieri" dôchodkového systému by mala zostať už iba v jednom, a to v dlhopisovom fonde. Zástancovia tvrdia, že to umožní vyšší výnos. Naopak odporcovia upozorňujú na vyššie riziko straty, nikto nie je schopný odhadnúť pohyb trhov na mnoho rokov dopredu.',
  ),
  array(
    'id' => 6,
    'name' => 'Mýto za km',
    'question' => 'Mýt na diaľniciach pre osobné automobily by sa malo platiť za prejazdenú vzdialenosť.',
    'description' => 'Mýto na diaľniciach sa vyberá dvoma základnými spôsobmi - so zreteľom na prejdenú vzdialenosť (napr. Francúzsko alebo kamióny na Slovensku) alebo paušálom (osobné autá na Slovensku). Mýto za km sa berie ako spravodlivejšie ("kto viac jazdí, viac platí"), ale jeho výber je drahší.',
  ),
  array(
    'id' => 7,
    'name' => 'Počet volebních obvodů',
    'question' => 'Prídavky na deti by mali dostávať len deti v rodinách s nižšími príjmami. ',
    'description' => 'Na Slovensku platí, že všetky deti majú nárok na prídavky asi 20 € mesačne. Rovnako v Nemecku ich dostávajú všetky deti. Naopak v ČR platí, že príspevky na deti dostávajú len rodiny s príjmom nižším ako 2,4 násobok životného minima.',
  ),
);

$smarty->assign('questions', $questions);
$smarty->display('trial.tpl');


?>
