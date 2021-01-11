$(document).ready(function(){	
    $('#id-marca').change(function(){
        var id = $(this).val();
        $.ajax({
        	url:"/modelos_cotizador",
        	data: {marca:id},
        	type:'get',
        	dataType:'JSON',
        	success:function(html){
        		var count = html.modelo.length;
        		var options = '<option selected="" disabled="">Modelos</option>';
        		for (var i = 0; i < count; i++) {
        			options = options+'<option value="'+html.modelo[i].id_modelo+'">'+html.modelo[i].modelo+'</option>';
        		}        		
        		$('#id-modelo').html(options)
        	}
        });
    });
    $('#id-modelo').change(function(){
        var marca = $('#id-marca').val();
        var modelo = $(this).val();
        $.ajax({
        	url:"/submarcas_cotizador",
        	data: {modelo,marca},
        	type:'get',
        	dataType:'JSON',
        	success:function(html){
        		var count = html.submarca.length;
        		var options = '<option selected="" disabled="">Submarca</option>';
        		for (var i = 0; i < count; i++) {
        			options = options+'<option value="'+html.submarca[i].id_submarca+'">'+html.submarca[i].submarca+'</option>';
        		}        		
        		$('#id-submarca').html(options)
        	}
        });
    });
});