<!DOCTYPE html>
<html>
  <head>
    <title>Predvolebný názorový test 2012 | KohoVolit.eu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
	<link rel="stylesheet" href="css/trial.css" />
  </head>
  <body>
  <form action="./form.php" method="get" data-ajax="false">  

<!-- Start of 0th page page -->  
<div data-role="page" id="p0" data-title="Predvolebný názorový test 2012 | KohoVolit.eu"  data-theme="b">
	<div data-role="header">
	  <a href="./" data-role="button" data-icon="home" data-iconpos="notext">Domov</a>
	  <h3 class="h1">Názorový test - voľby do Národnej rady SR 2012</h3>
	</div><!-- /header -->
	<div data-role="content" class="question-background">
	<div class="ui-overlay-shadow ui-corner-top ui-corner-bottom question" data-role="content">	
	<div class="question-content">
		<h2 class="question-name question-name-0">Odpovedzte na otázky, ktoré sa môžu riešiť behom nasledujúceho volebného obdobia. Zistíte, <b>kto chce najlepšie zastupovať práve Vás.</b></h2>
		<div class="question-description question-description-0">&nbsp;</div>
		<div class="question-question question-question-0">
		  <p><b>Nemusíte hlasovať o všetkom</b> – otázky, ktoré vynecháte, sa do výpočtu nezahrnú.</p>
		  <p>
Test je vytvorený na základe odpovedí jednotlivých strán. Vo výsledkoch sú zobrazené tie, ktoré nám odpovedali.
		  </p>
		</div>
	</div>
		<div data-role="fieldcontain">
		  <fieldset data-role="controlgroup" data-type="horizontal">
		    <a href="#p1">
		      <input type="radio" name="q-0" id="q-0-0" value="1"  style="visibility:hidden;" />
         	  <label for="q-0-0" data-theme="c" style="visibility:hidden;">ÁNO</label>
         	</a>
         	<a href="#p1">
         	<input type="radio" name="q-0" id="q-0-1" value="-1"  style="visibility:hidden;"/>
         	<label for="q-0-1" data-theme="c" style="visibility:hidden;">NIE</label>
         	</a>
		  </fieldset>
		</div>
		<a href="#p1" data-role="button" data-icon="arrow-r" data-inline="true" data-iconpos="right" style="float:right">Spustiť test</a>
	</div>
	</div><!-- /content -->
	
	<div data-role="footer">
	  {include "social.tpl"}
	</div><!-- /footer -->
</div><!-- / 0th page -->
	
  
  
{foreach $questions as $question}
<!-- Start of {$question.i} page -->
<div data-role="page" id="p{$question.id}" data-title="{$question.name} | KohoVolit.eu"  data-theme="b">

	<div data-role="header">
	  <a href="./" data-role="button" data-icon="home" data-iconpos="notext">Domov</a>
	  <h3 class="h1">Otázka {$question.id} / {$questions|@count}</h3>
	</div><!-- /header -->

	<div data-role="content" class="question-background">
	  <div class="ui-overlay-shadow ui-corner-top ui-corner-bottom question" data-role="content">	
	  <div class="question-content">
		<h2 class="question-name">{$question.name}</h2>
		<div class="question-description">{$question.description}</div>
		<div class="question-question">{$question.question}</div>
	  </div>	

		<div data-role="fieldcontain">
		  <fieldset data-role="controlgroup" data-type="horizontal">
		    <a href="#p{$question.id+1}">
		      <input type="radio" name="q-{$question.id}" id="q-{$question.id}-0" value="1"  style="visibility:hidden;" />
         	  <label for="q-{$question.id}-0" data-theme="c">ÁNO</label>
         	</a>
         	<a href="#p{$question.id+1}">
         	<input type="radio" name="q-{$question.id}" id="q-{$question.id}-1" value="-1"  style="visibility:hidden;"/>
         	<label for="q-{$question.id}-1" data-theme="c">NIE</label>
         	</a>
		  </fieldset>
		</div>
		<fieldset class="ui-grid-a">
		<div class="ui-block-a"><a href="#p{$question.id-1}" data-direction="reverse" data-role="button" data-icon="arrow-l" data-inline="true">&nbsp;</a></div>
		<div class="ui-block-b">
		<a href="#p{$question.id+1}" data-role="button" data-icon="arrow-r" data-inline="true" data-iconpos="right" style="float:right">Preskočiť</a>
		</div>
		</fieldset>
	  </div>
	</div><!-- /content -->

	<div data-role="footer">
	  {include "social.tpl"}
	</div><!-- /footer -->
</div><!-- /page -->
{/foreach}

<!-- Start of the last page page -->  
<div data-role="page" id="p{$questions|@count+1}" data-title="Predvolebný názorový test 2012 | KohoVolit.eu"  data-theme="b">
	<div data-role="header">
	  <a href="./" data-role="button" data-icon="home" data-iconpos="notext">Domov</a>
	  <h3 class="h1">Důležité otázky</h3>
	</div><!-- /header -->
	<div data-role="content" class="question-background">
	<div class="ui-overlay-shadow ui-corner-top ui-corner-bottom question" data-role="content">	
	<div data-role="fieldcontain">
    <fieldset data-role="controlgroup">
	   <legend><p>Nyní ještě vyberte otázky, kterým přikládáte velkou váhu.</p><p> Potom již jen dejte <b>Hlasovať</b></p></legend>
{foreach $questions as $question}
	   <input type="checkbox" name="c-{$question.id}" id="c-{$question.id}" class="custom" />
	   <label for="c-{$question.id}">{$question.name}</label>
{/foreach}
    </fieldset>
	</div>

	<fieldset class="ui-grid-a">
		<div class="ui-block-a"><a href="#p{$questions|@count}" data-direction="reverse" data-role="button" data-icon="arrow-l" data-inline="true">&nbsp;</a></div>
		<div class="ui-block-b">
		<button type="submit" data-theme="b" name="submit" value="submit-value" data-icon="check" data-iconpos="right">Hlasovať</button>
		</div>
		</fieldset>
	</div>
	</div>
	<div data-role="footer">
	  {include "social.tpl"}
	</div><!-- /footer -->
</div><!-- /page -->

</form>

  </body>
</html>