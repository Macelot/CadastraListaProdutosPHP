/*-------------------------------------------------------------------- 
 * JQuery Plugin: "EqualHeights" & "EqualWidths"
 * by:	Scott Jehl, Todd Parker, Maggie Costello Wachs (http://www.filamentgroup.com)
 *
 * Copyright (c) 2007 Filament Group
 * Licensed under GPL (http://www.opensource.org/licenses/gpl-license.php)
 *
 * Description: Compares the heights or widths of the top-level children of a provided element 
 		and sets their min-height to the tallest height (or width to widest width). Sets in em units 
 		by default if pxToEm() method is available.
 * Dependencies: jQuery library, pxToEm method	(article: http://www.filamentgroup.com/lab/retaining_scalable_interfaces_with_pixel_to_em_conversion/)							  
 * Usage Example: $(element).equalHeights();
   						      Optional: to set min-height in px, pass a true argument: $(element).equalHeights(true);
 * Version: 2.0, 07.24.2008
 * Changelog:
 *  08.02.2007 initial Version 1.0
 *  07.24.2008 v 2.0 - added support for widths
--------------------------------------------------------------------*/

$.fn.equalHeights = function(px) {
	$(this).each(function(){
		var currentTallest = 0;
		$(this).children().each(function(i){
			if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
		});
    if (!px && Number.prototype.pxToEm) currentTallest = currentTallest.pxToEm(); //use ems unless px is specified
		// for ie6, set height since min-height isn't supported
		if (typeof(document.body.style.minHeight) === "undefined") { $(this).children().css({'height': currentTallest}); }
		$(this).children().css({'min-height': currentTallest}); 
		//console.log(currentTallest);
	});
	return this;
};
$.fn.equalHeights2 = function(px) {
	var currentWidest = 0;
	$(this).each(function(){
		var kk=0;
		$(this).children().each(function(i){
			//var childDivs = document.getElementById('directions-panelVERDE').getElementsByTagName('div.box');
			//const childDivs2 = document.querySelectorAll('.box').childDivs2[i].clientHeight;
			//var aBoxVerde    = document.getElementById("directions-panelVERDE").getElementsByClassName("box")[i].height;
			//var aBoxVermelho = document.getElementById("directions-panelVERMELHO").getElementsByClassName("boxVERMELHO")[i].height;
			console.log($(this));
			console.log("i"+i);
			console.log($(this).get(0).className);
			if($(this).get(0).className=='box'){
				//console.log($(this));
				console.log("EEE "+kk);
				console.log("a"+$(this).height());
				console.log("b"+document.getElementById("directions-panelVERMELHO").getElementsByClassName("boxVERMELHO")[kk].clientHeight);
				var aBoxVerde    = $(this).height();
				var aBoxVermelho = document.getElementById("directions-panelVERMELHO").getElementsByClassName("boxVERMELHO")[kk].clientHeight;
				if (aBoxVerde > aBoxVermelho) { 
					document.getElementById("directions-panelVERMELHO").getElementsByClassName("boxVERMELHO")[kk].style.height=aBoxVerde;
				}else { 
					document.getElementById("directions-panelVERDE").getElementsByClassName("box")[kk].style.height=aBoxVermelho;
				}
				kk++;
			}
		});
	});
	return this;
};

$.fn.equalHeightsAzul = function(px) {
	var currentWidest = 0;
	$(this).each(function(){
		var kk=0;
		$(this).children().each(function(i){
			if($(this).get(0).className=='box'){
				var aBoxAzul     = $(this).height();
				var aBoxVerde    = document.getElementById("directions-panelVERDE").getElementsByClassName("boxVERDE")[kk].clientHeight;
				var aBoxVermelho = document.getElementById("directions-panelVERMELHO").getElementsByClassName("boxVERMELHO")[kk].clientHeight;
				
				if ((aBoxAzul > aBoxVermelho)&&(aBoxAzul > aBoxVerde)) { 
					document.getElementById("directions-panelVERMELHO").getElementsByClassName("boxVERMELHO")[kk].style.height=aBoxAzul;
					document.getElementById("directions-panelVERDE").getElementsByClassName("boxVERDE")[kk].style.height=aBoxAzul;
				}
				
				if ((aBoxVerde > aBoxVermelho)&&(aBoxVerde > aBoxAzul)) { 
					document.getElementById("directions-panelVERMELHO").getElementsByClassName("boxVERMELHO")[kk].style.height=aBoxVerde;
					document.getElementById("directions-panelAZUL").getElementsByClassName("boxAZUL")[kk].style.height=aBoxVerde;
				}
				
				if ((aBoxVermelho > aBoxVerde)&&(aBoxVermelho > aBoxAzul)) { 
					document.getElementById("directions-panelAZUL").getElementsByClassName("boxAZUL")[kk].style.height=aBoxVermelho;
					document.getElementById("directions-panelVERDE").getElementsByClassName("boxVERDE")[kk].style.height=aBoxVermelho;
				}
				
				kk++;
			}
		});
	});
	return this;
};

// just in case you need it...
$.fn.equalWidths = function(px) {
	$(this).each(function(){
		var currentWidest = 0;
		$(this).children().each(function(i){
				if($(this).width() > currentWidest) { currentWidest = $(this).width(); }
		});
		if(!px && Number.prototype.pxToEm) currentWidest = currentWidest.pxToEm(); //use ems unless px is specified
		// for ie6, set width since min-width isn't supported
		if (typeof(document.body.style.minHeight) === "undefined") { $(this).children().css({'width': currentWidest}); }
		$(this).children().css({'min-width': currentWidest}); 
	});
	return this;
};
