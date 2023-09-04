"use strict";

$(function() {
	
	$("[data-copy]").on('click', function() {
		var el = $(this.dataset.copy).get(0);
		if( !el ) return;
		el.select();
		if( document.execCommand('copy') ) alert("Copied Text: " + (el.value));
	});
	
	$('table.table').each(function() {
		var option = { "responsive": false };
		var table = $(this).DataTable(option);    
	});
	
});