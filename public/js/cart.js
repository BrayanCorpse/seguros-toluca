$(document).ready(function(){
	$('.addItem').click(function(e){
		e.preventDefault();
		var index = $('#cart').html();
		var href = $(this).attr('href');
		$.ajax({
			url: href,
			type:'GET',
			success:function(response){
				if (response > index) {
					$('#cart').html(response);
					swal("producto agregado!", {
					  buttons: false,
					  timer: 1000,
					});
				}
			}
		});
	});

	$('.itemUpdate').click(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		var valor = $('#item'+id+'').val();
		window.location.href = 'updateItem/'+id+'/'+valor;
	});
});