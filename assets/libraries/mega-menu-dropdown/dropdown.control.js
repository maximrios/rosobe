function megaHoverOverDropDown(){
	$(this).find(".sub").stop().fadeTo('fast', 1).show();

	//Calculate width of all ul's
	(function($) {
		jQuery.fn.calcSubWidth = function() {
			rowWidth = 0;
			//Calculate row
			$(this).find("ul").each(function() {
				rowWidth += $(this).width();
			});
		};
	})(jQuery);

	if ( $(this).find(".row").length > 0 ) { //If row exists...
		var biggestRow = 0;
		//Calculate each row
		$(this).find(".row").each(function() {
			$(this).calcSubWidth();
			//Find biggest row
			if(rowWidth > biggestRow) {
				biggestRow = rowWidth;
			}
		});
		//Set width
		$(this).find(".sub").css({'width' :biggestRow});
		$(this).find(".row:last").css({'margin':'0'});

	} else { //If row does not exist...

		$(this).calcSubWidth();
		//Set Width
		$(this).find(".sub").css({'width' : rowWidth});

	}
}

function megaHoverOutDropDown(){
  $(this).find(".sub").stop().fadeTo('fast', 0, function() {
	  $(this).hide();
  });
}

var configDropDown = {
	 sensitivity: 2, // number = sensitivity threshold (must be 1 or higher)
	 interval: 100, // number = milliseconds for onMouseOver polling interval
	 over: megaHoverOverDropDown, // function = onMouseOver callback (REQUIRED)
	 timeout: 300, // number = milliseconds delay before onMouseOut
	 out: megaHoverOutDropDown // function = onMouseOut callback (REQUIRED)
};

// Iniciar el Control DropDown personalizado
//$('ul.dropdown li').hoverIntent(configDropDown);
// Replicar la linea anterior cuando se llama de Ajax