jQuery(document).ready(function () {

});


function MoRESTAPIdivVisibility( divId, allMethodDivID, disabled ) {
	if(disabled == 0){
		document.getElementById("mo_api_auth_save_config_button").disabled = true;
	} else {
		document.getElementById("mo_api_auth_save_config_button").disabled = false;
	}
	MoRESTAPIhideVisibility( allMethodDivID );
	div = document.getElementById( divId + "_div" );
	div.style.display = "block";
}

function MoRESTAPIhideVisibility ( allMethodDivID ) {
	var MethodsDivArray = allMethodDivID.split(",");
	MethodsDivArray.forEach(element => {
		div = document.getElementById( element + "_div" );
		if( div )
			div.style.display = "none";
	});
}

function MoProtectedrestapiNamespaceClick ( namespace, id ) {
	if (jQuery('#' + id).is(":checked")) {
		jQuery("input[data-namespace='" + namespace + "']").prop('checked', true);
	} else {
		jQuery("input[data-namespace='" + namespace + "']").prop('checked', false);
	}
}