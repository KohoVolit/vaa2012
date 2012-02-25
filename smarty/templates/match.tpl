<!DOCTYPE html>
<html>
  <head>
    <title>Predvolebný názorový test 2012 | KohoVolit.eu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
    <link type="image/x-icon" href="../../images/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
	<link rel="stylesheet" href="/css/vaa.css" />
  </head>
  
  <body>
  <div data-role="page" data-title="Predvolebný názorový test 2012 | KohoVolit.eu" data-theme="b">
  
	<div data-role="header">
	  <a href="/" data-role="button" data-icon="home" data-iconpos="notext">Domov</a>
	  <a href="/info" data-role="button" data-icon="info" data-iconpos="notext">Info</a>
	  <h3 class="h1">Názorový test - voľby do Národnej rady SR 2012</h3>
	</div><!-- /header -->
	
	<div data-role="content" class="question-background">
	  <div class="ui-overlay-shadow ui-corner-top ui-corner-bottom question" data-role="content">	
	    <ul data-role="listview" data-theme="e">
	      <li class="result-header">Strana <span class="right">Moja zhoda</span></li>
	      {foreach $results as $result}
	        <li><a href="../compare?{$query_string}&type=n"><img src="/images/{$result.friendly_name}.png" alt="{$result.short_name}" class="ui-li-icon"><span class="result-number
	          {if $result.result >= .6} result-very-positive
	          {elseif $result.result >= .2} result-positive
	          {elseif $result.result >= -.2} result-neutral
	          {elseif $result.result >= -.6} result-negative
	          {else} result-very-negative
	          {/if}	    	    
	        ">{$result.result_percent} %</span>{$result.name|truncate:25:"...":true} ({$result.short_name})</a></li>
	      {/foreach}
	    </ul>
	  </div>
	
	<!-- include "bar_chart.tpl" -->
	
	</div><!-- /content -->
	
	<div data-role="footer">
	  {include "social.tpl"}
	</div><!-- /footer -->
	
	{include "google_analytics.tpl"}
  </body>
</html>
