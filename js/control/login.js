$( document ).ready(function() {
	
	createEvents();
});

function createEvents(){
	$("#loginButton").click(function (){
			var user = $("#user").val();
			var password = $("#pass").val();
			
		var login = checkLogin(user,password);	
			
	});
}



function checkLogin(user, password){
	
	var outPutData = new Array();
	
	$.ajax({
		  url: 'php/control/control.php',
		  type: 'POST',
		  async: false,
		  data: 'action=10000&user='+user+'&password='+password+'',
		  dataType: "json",
		  success: function (response) { 
			  outPutData = response;
		  },
		  error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status+"\n"+thrownError);
		  }	
    }); 
	
	if(!outPutData[0]) {
		window.location.replace("html/loggedUser.html");
	} else {
		alert("no ok");	
	}
}
