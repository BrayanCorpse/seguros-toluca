$(document).ready(function(){
	/*Menu*/
    $("#sistema").click(function(e){
        e.preventDefault();
        if (!$(this).hasClass("active")) {
           $("#enlaces").slideDown();
           $(this).addClass("active") 
        }else{
            $("#enlaces").slideUp();
            $(this).removeClass("active")
        }
    });

    $("#sistema-responsive").click(function(e){
        e.preventDefault();
        if (!$(this).hasClass("active")) {
        	$("#enlaces-responsive").slideDown();
           	$(this).addClass("active");
        }else{
            $("#enlaces-responsive").slideUp();
            $(this).removeClass("active"); 
        }
    });
    /*Menu*/
    $('.hamburger').click(function () {
    	$('.hamburger').toggleClass('open');
	});
	$(".menu-responsive p a").click(function(){
		$(".hamburger").trigger("click");
	});

	$(".hamburger").click(function(){
		$("#menu-responsive").toggle();
        $("#enlaces-responsive").slideUp();
	});

    $("#create input,#create select").addClass(" alta");
    $("#modal_edit input[type=text],#modal_edit select").addClass(" modify");
});