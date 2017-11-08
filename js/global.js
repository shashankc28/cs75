$(document).ready(function(){
	var q=new Bloodhound({
	datumTokenizer: Bloodhound.tokenizers.obj.whitespace('title'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
	remote:{
	    url: 'suggest.php?query=%QUERY',
	    wildcard: '%QUERY'
	  }﻿
	  });
		
	q.initialize();	
	
	$('#q').typeahead({
		hint: true,
		highlight: true
		
		},{
			name: 'q' ,
			displayKey: 'title',
			source: q.ttAdapter(),
			limit: 7
	});
	$('.tt-hint').addClass('form-control');
	$('.tt-dropdown-menu').addClass('form-control');
});