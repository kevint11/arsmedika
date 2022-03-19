$(function() {
	var postFile='index.php';
		$("#formbase").mouseup(function() {
		$("#loginform").mouseup(function() {
			return false
		});
		
		$("a.close").click(function(e){
			e.preventDefault();
			$("#loginform").hide();
			$(".lock").fadeIn();
		});
		
		if ($("#loginform").is(":hidden"))
		{
			$(".lock").fadeOut();
			
		} else {
			$(".lock").fadeIn();
			
		}				
		$("#loginform").toggle();
		$("input#username").focus();
	});
				
	
	$("form#signin").submit(function() {
		var username = $("input#username").val();
		if (username == "") {
			$('#message').html("Please enter email");
			$("#message").css({color:"red"});
			$("#message").hide().fadeIn(1500);
			$("input#username").focus();
			return false;
		}
		
		var password = $("input#password").val();
		if (password == "") {
			$('#message').html("Please enter password");
			$("#message").css({color:"red"});
			$("#message").hide().fadeIn(1500);
			$("input#password").focus();
			return false;
		}
					
		$.post(postFile, { usernamePost: username, passwordPost: password, log: 1 }, function(data) {
			if(data.status==true){
				var distance = 10;
				var time = 500;
				var myTimer = {};
				$("#loginform").animate({
					marginTop: '-='+ distance +'px',
					opacity: 0
				}, time, 'swing', function () {
					$("#loginform").hide();
				});		
				myTimer = $.timer(1000,function() {
					window.location=data.url;
				});
			} else {
				$("#message").html("Wrong email and password");
				$("#message").css({color:"red"});
				$("#message").hide().fadeIn(1500);
				$("input#username").focus();
			}
		}, "json");
						
		return false;
	});
	$("input#cancel_submit").click(function(e) {
		$("#loginform").hide();
		   $(".lock").fadeIn();
	});
});
