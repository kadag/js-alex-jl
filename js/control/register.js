$( document ).ready(function() {
	
	createEvents();
});

function createEvents(){
	$("#registerUser").click(function (){
			var name = $("#name").val();
			var surnames = $("#surnames").val();
			var email = $("#email").val();
			var user = $("#user").val();
			var pass = $("#password").val();
			var pass_conf = $("#conf_password").val();
			
		registerUser('10010',name,surnames,email,user,pass);	
			
	});
}

function registerUser(action, name, surnames, email, user, password){
	
	var outPutData = new Array();
	var destinations = new Array();
	
	$.ajax({
		  url: '../php/control/control.php',
		  type: 'POST',
		  async: false,
		  data: 'action='+action+'&name='+name+'&surnames='+surnames+'&email='+email+'&user='+user+'&password='+password,
		  dataType: "json",
		  success: function (response) { 
			  outPutData = response;
		  },
		  error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status+"\n"+thrownError);
		  }	
    }); 
	
	if(!outPutData[0]) {
		
		alert("registrat");
	} else {
		alert("no registrat");	
	}
}
