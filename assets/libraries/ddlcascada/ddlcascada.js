/*
 * Clase ddlCascada 
 *
 * Copyright(c) 2011, Ivan Soliz
 * 
 * Permite la implementación de DropDownList en cascada.-
 * Dependencias:  
 * Licensed under the MIT License
 */
jQuery.ddlCascada = {
	obtProvincias:function(base_url,divDestino,ctrl) {
		var inIdPais = $('#'+ctrl+' option:selected').val();
		$('#'+divDestino).viaAjax({'url': base_url+'sistema/localizacion/ddlProvincias/'+inIdPais});
		$.ddlCascada.limpiar(ctrl);
	}
	,obtDepartamentos:function(base_url,divDestino,ctrl) {
		var inIdProvincia = $('#'+ctrl+' option:selected').val();
		$('#'+divDestino).viaAjax({'url': base_url+'/'+inIdProvincia});
		$.ddlCascada.limpiar(ctrl);
	}
	,obtLocalidades:function(base_url,divDestino,ctrl) {
		var inIdDepartamento = $('#'+ctrl+' option:selected').val();
		$('#'+divDestino).viaAjax({'url': base_url+'sistema/localizacion/ddlLocalidades/'+inIdDepartamento});
	}
	,limpiar:function(ctrl) {
		switch(ctrl) {
			case 'inIdPais':
			  	$("#inIdDepartamento").html('');
			  	$("#inIdLocalidad").html('');
			  	$("#inIdDepartamento").append("<option value=''>Seleccione...</option>");
				$("#inIdLocalidad").append("<option value=''>Seleccione...</option>");
			  	$('#inIdDepartamento').val("");
			  	$('#inIdLocalidad').val(""); 				
			  break;
			case 'inIdProvincia':
			  	$("#inIdLocalidad").html("");
			  	$("#inIdLocalidad").append("<option value=''>Seleccione...</option>");
			  	$('#inIdLocalidad').val(""); 
			  break;
		}		
	}	
};