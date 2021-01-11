$(document).ready(function(){
	var x = $(".btn").position();
	var count = 0;
	$("input[type=text].form-control,select,input[type=radio]").each(function(){
		$(this).blur(function(){
    		var x = $(this).val();
			if(x == null || x == "" || !x){
				$(this).css({"border":"2px solid red"});
				$(this).attr("placeholder","Este campo no debe quedar vacio!");
				var x = $(this).attr('id');
				var y = ".fas.fa-exclamation-triangle#"+x+"";
				var z = ".fas.fa-check#"+x+"";
				$(y).show();
				$(z).hide();
			}else{
				$(this).css({"border":"2px solid green"});
				var x = $(this).attr('id');
				var y = ".fas.fa-exclamation-triangle#"+x+"";
				var z = ".fas.fa-check#"+x+"";
				$(y).hide();
				$(z).show();
			}			
  		});
	});
	if ($("input[type=file").length >= 1) {
		$("input[type=file").change(function(){
			var file = $(this).val();
			if (file) {
				$(".form-control-file").css({"border":"2px solid green"});
				var y = ".fas.fa-exclamation-triangle#file";
				var z = ".fas.fa-check#file";
				$(z).show();
				$(y).hide();
			}else{
				count = count + 1;
			}
		});
	}
	if ($("input[type=password").length >= 1) {
		$("input[type=password").blur(function(){
			var file = $(this).val();
			if (file) {
				$(this).css({"border":"2px solid green"});
			}else{
				$(this).css({"border":"2px solid red"});
				count = count + 1;
			}
		});
	}
	if ($("input[type=date").length >= 1) {
		$("input[type=date").blur(function(){
			var file = $(this).val();
			if (file) {
				$(this).css({"border":"2px solid green"});
			}else{
				$(this).css({"border":"2px solid red"});
				count = count + 1;
			}
		});
	}
	if ($("input[type=date]").length >= 1) {
			$("input[type=date]").blur(function(){
				var val = $(this).val();
				if (val != "") {
					$(this).css({"border":"2px solid green"});
					var x = $(this).attr('id');
					var y = ".fas.fa-exclamation-triangle#"+x+"";
					var z = ".fas.fa-check#"+x+"";
					$(y).hide();
					$(z).show();
				}else{
					$(this).css({"border":"2px solid red"});
					var x = $(this).attr('id');
					var y = ".fas.fa-exclamation-triangle#"+x+"";
					var z = ".fas.fa-check#"+x+"";
					$(z).hide();
					$(y).show();
					count = count + 1;
				}
			});
		}	
  	if ($("input[type=email]").length >= 1) {
  		$("input[type=email]").blur(function(){
			var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    		if (regex.test($(this).val().trim())) {
        		var y = ".fas.fa-exclamation-triangle#correo";
				var z = ".fas.fa-check#correo";
				$(y).hide();
				$(z).show();
				$("#correo").css({"border":"2px solid green"});
    		} else {
        		var y = ".fas.fa-exclamation-triangle#correo";
				var z = ".fas.fa-check#correo";
				$(z).hide();
				$(y).show();
				$("#correo").css({"border":"2px solid red"});
    		}
    	});
	}
	$(".btn.btn-default").click(function(e){
		$("input[type=text].form-control,select,input[type=radio],input[type=password],input[type=date]").each(function(){
			var x = $(this).val();
			if(x == null || x == "" || !x){
				$(this).css({"border":"2px solid red"});
				$(this).attr("placeholder","Este campo no debe estar vacio!!");
				var x = $(this).attr('id');
				var y = ".fas.fa-exclamation-triangle#"+x+"";
				var z = ".fas.fa-check#"+x+"";
				$(y).show();
				$(z).hide();
				count = count+1;
			}else{
				$(this).css({"border":"2px solid green"});
				var x = $(this).attr('id');
				var y = ".fas.fa-exclamation-triangle#"+x+"";
				var z = ".fas.fa-check#"+x+"";
				$(y).hide();
				$(z).show();
			}	
		});
		if ($(".form-control-file").length >= 1) {
			$(".form-control-file").each(function(){
				if ($(this).val() == null || $(this).val() == "" || !$(this).val()) {
					$(this).css({"border":"2px solid red"});
					var y = ".fas.fa-exclamation-triangle#file";
					var z = ".fas.fa-check#file";
					count = count + 1;
					$(y).show();
					$(z).hide();
				}else{
					var y = ".fas.fa-exclamation-triangle#file";
					var z = ".fas.fa-check#file";
					$(z).show();
					$(y).hide();
					$(this).css({"border":"2px solid green"});
				}
			});
		}
		if ($("input[type=email]").length >= 1) {
			$("input[type=email]").each(function(){
    			var email = $(this).val();
				if (email != "") {
					$(this).css({"border":"2px solid green"});
					var x = $(this).attr('id');
					var y = ".fas.fa-exclamation-triangle#"+x+"";
					var z = ".fas.fa-check#"+x+"";
					$(y).hide();
					$(z).show();
					var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    				if (regex.test($(this).val().trim())) {
    					var x = $(this).attr('id');
						var y = ".fas.fa-exclamation-triangle#"+x+"";
						var z = ".fas.fa-check#"+x+"";
						$(y).hide();
						$(z).show();
						$(this).css({"border":"2px solid green"});
    				} else {
        				var x = $(this).attr('id');
						var y = ".fas.fa-exclamation-triangle#"+x+"";
						var z = ".fas.fa-check#"+x+"";
						$(z).hide();
						$(y).show();
						$(this).css({"border":"2px solid red"});
						count = count + 1;
    				}
    			} else {
        			var x = $(this).attr('id');
        			$(this).css({"border":"2px solid red"});
        			$(this).attr("placeholder","Este campo no debe estar vacio!!");
					var y = ".fas.fa-exclamation-triangle#"+x+"";
					var z = ".fas.fa-check#"+x+"";
					$(z).hide();
					$(y).show();
					count = count + 1;
    			}
    		});
		}
		if ($("input[type=date]").length >= 1) {
			$("input[type=date]").each(function(){
				var val = $(this).val();
				if (val != "") {
					$(this).css({"border":"2px solid green"});
					var x = $(this).attr('id');
					var y = ".fas.fa-exclamation-triangle#"+x+"";
					var z = ".fas.fa-check#"+x+"";
					$(y).hide();
					$(z).show();
				}else{
					$(this).css({"border":"2px solid red"});
					var x = $(this).attr('id');
					var y = ".fas.fa-exclamation-triangle#"+x+"";
					var z = ".fas.fa-check#"+x+"";
					$(z).hide();
					$(y).show();
					count = count + 1;
				}
			});
		}
		if (count >= 1) {
			e.preventDefault();
			count = 0;
		}else{
			if (confirm("Esta seguro de continuar?")) {
				return true;
				var liga = $("#new-reg").attr("href");
				$("#content-window").load(liga);
			}else{
				return false;
			}
		}
	});
	$("#eliminar,#editar").click(function(e){
		e.preventDefault();
		if ($(window).width() <= 450) {
            $(".contenedor-menu .menu").slideToggle();
        }
        if (!confirm("Continuar?")) {
        	return false;
        }
        $('#content-window').html('<div class="loading"><center><img src="http://localhost/descuentos/public/panel/imagenes/loading.gif" style="margin-top: 15%;z-index -999;" alt="loading" /><br/>Un momento, por favor...</center></div>');
        var liga = $(this).attr("href");
        $("#content-window").load(liga);
	});
	/*Productos*/
	numeros("#precio");
	numeros("#descuentontw");
	numeros("#descuentouni");
	letras("#categoria");
	alfa("#producto");
	descripcion("#descripcion");
	/*Categorias*/
	alfa("#categoria");
	/*Empresas*/
	numeros('#cp');
	letras("#personacontacto");
	noSpace("#correo");
	noSpace("#cuentaban");
	mayusculas("#cuentaban");
	mayusculas("#rfc");
	noSpace("#rfc");
	alfa("#rfc");
	numeros("#telefonofijo");
	numeros("#numext");
	numeros("#numint");
	numeros("#telefono");
	alfa("#condiciones");
	alfa("#calle");
	alfa("#colonia");
	alfa("#entrecalle");
	/*Usuarios*/
	numeros("#telefono");
	alfa("#referencias");
	letras("#nombre,#ap_paterno,#ap_materno")
	/*Giros*/
	alfa("#giro");
	/*Membresias*/
	alfa("#membresia");
	numeros("#edad");
	numeros("#modelo");
	$(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();  

            $('li').removeClass('active');

            $(this).parent('li').addClass('active');  

            var myurl = $(this).attr('href');

            var page=$(this).attr('href').split('page=')[1];  

            getData(page);
        });
});
function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
function numeros(selector){
	$(selector).keypress(function(tecla) {
        if((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode != 46)) return false;
    });
}
function letras(selector){
	$(selector).keypress(function(tecla) {
		if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 32)) return false;
	});
}
function alfa(selector){
	$(selector).keypress(function(tecla) {
		if((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 32)) return false;
	});
}
function noSpace(selector){
	$(selector).keypress(function(tecla) {
		if((tecla.charCode == 32)) return false;
	});
}
function mayusculas(selector){
	$(selector).keyup(function(){
		var x = $(this).val().toUpperCase();
		$(selector).val(x);
	});
}
function descripcion(selector){
	$(selector).keypress(function(tecla) {
		if((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 32) && (tecla.charCode != 46) && (tecla.charCode != 42)) return false;
	});
}