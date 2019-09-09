$(function(){
	// For Registration
	$("#regsubmit").click(function(){
		var name 		= $("#name").val();
		var username 	= $("#username").val();
		var password 	= $("#password").val();
		var email 		= $("#email").val();
		var dataString 	= 'name='+name+'&username='+username+'&password='+password+'&email='+email;
		$.ajax({
			type: 'POST',
			url: 'getregister.php',
			data: dataString,
			success: function(data){
				$("#show").html(data);
				// setTimeout(function(){
				// 	$("#show").fadeOut();
				// }, 4000);
			}
		});
		return false;
	});

		// For User Login
	$("#loginsubmit").click(function(){
		var email 		= $("#email").val();
		var password 	= $("#password").val();
		var dataString 	= 'email='+email+'&password='+password;
		$.ajax({
			type: 'POST',
			url: 'getlogin.php',
			data: dataString,
			success: function(data){
				if ($.trim(data) == "empty") {
					$(".empty").show();
					setTimeout(function(){
						$(".empty").fadeOut();
					}, 4000);
				} else if($.trim(data) == "disable") {
					$(".disable").show();
					setTimeout(function(){
						$(".disable").fadeOut();
					}, 4000);
				} else if($.trim(data) == "error") {
					$(".error").show();
					setTimeout(function(){
						$(".error").fadeOut();
					}, 4000);
				} else {
					window.location = "exam.php";
				}
			}
		});
		return false;
	});

	// For User Profile Update
	/*
	$("#proUpdateSubmit").click(function(){
		var name 		= $("#name").val();
		var username 	= $("#username").val();
		var email 		= $("#email").val();
		var dataString 	= 'name='+name+'&username='+username+'&email='+email;
		$.ajax({
			type: 'POST',
			url: 'userproupdate.php',
			data: dataString,
			success: function(data){
				$("#state").html(data);
				setTimeout(function(){
						$("#state").fadeOut();
				}, 4000);
			}
		});
		return false;
	});
	*/

	//Notification hide
	setTimeout(function(){
		$("#state").fadeOut();
	}, 4000);

});