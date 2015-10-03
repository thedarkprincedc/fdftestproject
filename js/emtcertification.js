
function displayUserInfo(id,endpoint){
	$.get(endpoint, function(msg){
		
	}).always(function(){
		$(id).html("<table><thead><tr><th>Name</th><th>Value</th></tr></thead></table>");
	});
}
