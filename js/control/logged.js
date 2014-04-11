$( document ).ready(function() {
	
	createEvents();
});

function createEvents(){
	$("#create").click(function (){
		showDiv();
			
	});
	$("#list").click(function (){
		listRepositories();
			
	});

	
	$("#createRepository").click(function(){
		var repo = $("#repository").val();
		createRepo(repo);
	});
}

function showDiv(){
var divContent=$("#repositoryForm");
divContent.show();
}

function createRepo(repoName){
var outPutData = new Array();
	
	$.ajax({
		  url: '../php/control/control.php',
		  type: 'POST',
		  async: false,
		  data: 'action=10020&repositoryName='+repoName+'',
		  dataType: "json",
		  success: function (response) { 
			  outPutData = response;
		  },
		  error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status+"\n"+thrownError);
		  }	
    }); 
	
	if(!outPutData[0]) {
		alert("ok");
	} else {
		alert("no ok");	
	}
}
function logout(){

}
/*
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
}*/
