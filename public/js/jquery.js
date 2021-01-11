$(document).ready(function(){
	$('.banner').click(function(){
		var img = $(this).prop('src');
		$('#showBanner').prop('src',img);
	});
	$(".input,.textarea").focus(function(){
		var label = $("label[for="+$(this).attr("id")+"]");
		label.removeClass("label");
		label.addClass("active");
	});
	$(".input,.textarea").blur(function(){
		if ($(this).val()=="") {
			var label = $("label[for="+$(this).attr("id")+"]");
			label.addClass("label");
			label.removeClass("active");
		}
	});
	var menu_responsive = 0;
	$('.hamburger').click(function () {
    	$('.hamburger').toggleClass('open');
    	if (menu_responsive == 0) {
    		$(".overlay").fadeIn(1000);
    		$(".menu-responsive").fadeIn(1000);
    		menu_responsive = 1;
    	}else{
    		$(".overlay").fadeOut(1000);
    		$(".menu-responsive").fadeOut(1000);
    		menu_responsive = 0;
    	}
	});
	$(".menu-responsive p a").click(function(){
		$(".hamburger").trigger("click");
	});
	$(window).resize(function(){
		$("#new-body").css({"margin-top":""});
		if ($(window).height() < 550) {
			$("#new-body").css({"margin-top":100});
		}
		if ($(window).height() > 576) {
			//$(".overlay").fadeOut(1000);
    		$(".menu-responsive").fadeOut(1000);
    		menu_responsive = 0;
		}
	});
	if ($(window).height() < 550) {
		$("#new-body").css({"margin-top":100});
	}
	$(".login").click(function(e){
		e.preventDefault();
		$("#login").fadeIn(1000);
		$(".overlay").fadeIn(1000);
	});
	$("#close-login").click(function(){
		$("#login").fadeOut(1000);
		$(".overlay").fadeOut(1000);
	});
	$("#aviso-privacidad").click(function(e){
		e.preventDefault();
	});
	$("#cotizar-btn").prop("disabled",true);
	$("input[name=accept]").click(function(){
		if ($(this).is(":checked")) {
			$("#cotizar-btn").attr("disabled", false);
		}else{
			$("#cotizar-btn").attr("disabled","disabled");
		}		
	});
	$("#logged").click(function(e){
		var u = $("#user").val();
		var p = $("#pass").val();
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		if (regex.test(u.trim())) {
			if (p == "") {
				e.preventDefault();
				$("#pass").addClass(" error");
			}	
		}else{
			alert("El correo debe contener un @ y un punto");
			$("#user").addClass(" error");
			e.preventDefault();
		}
	});
	$(".log").blur(function(){
		var x = $(this).val();
		if(x == ""){
			$(this).addClass(" error");
		}else{
			$(this).addClass(" success");
		}
	});
	$(".enviar").click(function(){
		$(".modal").modal("toggle");
	});
});
