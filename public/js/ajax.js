$(document).ready(function(){
    datos();

    /*$(document).on('click','.pagination a',function(e){
    	e.preventDefault();
        $("td").remove();
    	$('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        var url_page = window.location+'/create?page='+page;
        $.ajax({
            url: url_page,
            type: "get",
            dataType:"html",
            success: function(data){
                $("tbody").html(data);
            }
        });
    });*/

    $("#update").submit(function(e){
        e.preventDefault();
        var validate = validateModify();
        if (validate == true) {
        var id = $("#id_update").val();
        var form = $(this);
        var url = form.attr("action");
        var url_update = url.slice(0,-1);
        url_update = url_update+id;
        $.ajax({
            url: url_update,
            data: form.serialize(),
            type: "POST",
            dataType: "json",
            beforeSend: function(){
                $("#btn_update").html("Actualizando...");
            },
            success: function(data){
                if (data == "success") {
                    datos();
                    $("#modal_edit").modal("toggle");
                    Swal.fire('Registro modificado!','','success');
                    $("#btn_update").html("Guardar");
                }else{
                    $("#modal_edit").modal("toggle");
                    Swal.fire('Registro no modificado!','','error');
                    $("#btn_update").html("Guardar");
                }
                removeClasses();
            }
        }).fail(function(){
            $("#modal_edit").modal("toggle");
            Swal.fire('Registro no modificado!','','error');
            $("#btn_update").html("Guardar");
            removeClasses();
        });
        }else{
            swal.fire('Error','No se aceptan campos vacíos','error');
        }
    });

    $(document).on("click",".edit_marca",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=edit_marca]").val(html.data.marca);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_banner",function(e){
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data[0].id);
                $("#idNewFormato option[value="+html.data[0].id_formato+"]").attr('selected',true);
            }
        });
    });

    $(document).on("click",".edit_detalle",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=edit_detalle]").val(html.data.detalle);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_estado",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=edit_estado]").val(html.data.estado);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_Fichero",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $('#id_update').val(html.data[0].id);
                $('#newName').val(html.data[0].nombre);
                $('#modal_edit').modal('toggle');
            }
        });
    });

    $(document).on("click",".edit_desc",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=edit_descripcion]").val(html.data.descripcion);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_submarca",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=edit_submarca]").val(html.data.submarca);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_modelo",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=edit_modelo]").val(html.data.modelo);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_municipio",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=edit_municipio]").val(html.data.municipio);
                $("select[name=edit_estado]").val(html.data.id_estado);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_aseguradora",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=edit_aseguradora]").val(html.data.aseguradora);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_poliza",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=po]").val(html.data.poliza);
                $("select[name=as]").val(html.data.aseguradora);
                $("input[name=im]").val(html.data.importe);
                $("select[name=mo]").val(html.data.moneda);
                $("select[name=fp]").val(html.data.forma_pago);
                $("select[name=cli]").val(html.data.id_cli);
                $("input[name=fr]").val(html.data.fecha_registro);
                $("input[name=fv]").val(html.data.fecha_vigencia);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_auto",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("select[name=edit_id_marca]").val(html.data.id_marca);
                $("select[name=edit_id_modelo]").val(html.data.id_modelo);
                $("select[name=edit_id_submarca]").val(html.data.id_submarca);
                $("select[name=edit_id_detalle]").val(html.data.id_detalle);
                $("select[name=edit_id_descripcion]").val(html.data.id_descripcion);
                $("input[name=edit_monto]").val(html.data.monto);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $(document).on("click",".edit_cli",function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var url_edit = window.location+'/'+id+'/edit';
        $.ajax({
            url: url_edit,
            dataType: 'json',
            success: function(html){
                $("#id_update").val(html.data.id);
                $("input[name=edit_nombre]").val(html.data.nombre);
                $("input[name=edit_ap_paterno]").val(html.data.ap_paterno);
                $("input[name=edit_ap_materno]").val(html.data.ap_materno);
                $("input[name=edit_genero][value="+html.data.genero+"]").prop("checked","checked");
                $("input[name=edit_edad]").val(html.data.edad);
                $("input[name=edit_telefono]").val(html.data.telefono);
                $("input[name=edit_correo]").val(html.data.correo);
                $("select[name=edit_id_estado]").val(html.data.id_estado);
                $("select[name=edit_id_municipio]").val(html.data.id_municipio);
                $("input[name=edit_calle]").val(html.data.calle);
                $("input[name=edit_no_int]").val(html.data.no_int);
                $("input[name=edit_no_ext]").val(html.data.no_ext);
                $("input[name=edit_c_p]").val(html.data.c_p);
                $("#modal_edit").modal("toggle");
            }
        });
    });

    $("#form").submit(function(e){
    	e.preventDefault();
        var validate = validateCreate();
        if (validate == true) {
    	var form = $(this);
        var url = form.attr("action");
        $.ajax({
    		url: url,
    		type: "POST",
    		data: form.serialize(),
    		dataType: "json",
            beforeSend: function(){
                $("#send").html("Guardando...");
            },
    		success: function(data){
                if (data == "success") {
                    datos();
                    $("form").trigger("reset");
                    $("#create").modal("toggle");
                    reset();
                    Swal.fire('Registro guardado!','','success');
                    $("#send").html("Guardar");
                }else{
                    $("#create").modal("toggle");
                    Swal.fire('Registro no guardado!','','error');
                    $("#send").html("Guardar");
                    reset();
                }
                removeClasses();
      		}
    	}).fail(function(){
            $("#create").modal("toggle");
            Swal.fire('Registro no guardado!','','error');
            $("#send").html("Guardar");
            removeClasses();
        });
        }else{
            Swal.fire('No debe haber campos vacíos!','','error');
        }
    });

    $(document).on('click','.btn-danger',function(e){
        e.preventDefault();
        var id = $(this).attr("id");
        $("input[name=id_delete]").val(id);
        $("#modal_delete").modal("toggle");
    });

    $("#delete").submit(function(e){
        e.preventDefault();
        var id = $("input[name=id_delete]").val();
        var form = $(this);
        var url = form.attr("action");
        var url_delete = url.slice(0,-1);
        url_delete = url_delete+id;
        $.ajax({
            url: url_delete,
            type: "get",
            dataType: "json",
            beforeSend: function(){
                $("#btn_delete").html("Eliminando...");
            },
            success: function(data){
                if (data == "success") {
                    datos();
                    Swal.fire('Registro eliminado!','','success');
                    $("#modal_delete").modal("toggle");
                    $("#btn_delete").html("Aceptar")
                }else{
                    $("#modal_delete").modal("toggle");
                    Swal.fire('Registro no eliminado!','','error');
                    $("#btn_delete").html("Aceptar")
                }
            }
        }).fail(function(){
            $("#modal_delete").modal("toggle");
            Swal.fire('Registro no eliminado!','','error');
            $("#btn_delete").html("Aceptar")
        });
    });

    $("#search").keyup(function(){
        var criterio = $(this).val();
        datos(criterio);
    });

    numeros("input[name=poliza]");
    numeros("input[name=po]");
    monedas("input[name=importe]");
    monedas("input[name=im]");
    numeros("input[name=edit_no_int]");
    numeros("input[name=edit_no_ext]");
    numeros("input[name=edit_c_p]");
    numeros("input[name=no_int]");
    numeros("input[name=no_ext]");
    numeros("input[name=c_p]");
    numeros("input[name=edit_edad]");
    numeros("input[name=edad]");
    letras("input[name=edit_nombre]");
    letras("input[name=edit_ap_paterno]");
    letras("input[name=edit_ap_materno]");
    letras("input[name=nombre]");
    letras("input[name=ap_paterno]");
    letras("input[name=ap_materno]");
    numeros("input[name=telefono]");
    numeros("input[name=edit_telefono]");
});

//Funcion  de busqueda con criterio
function datos(criterio){
    //obtenemos la url y le concatenamos /create ,
    //esta es la funcion del controlador donde retornamos los datos
    var url = window.location+'/create';
    if (url.indexOf('showBanner') > 1) {
        $.ajax({
            url: url,//en el elemento url colocamos la variable antes definida
            type: "get",//usamos el metodo get
            dataType:"html",//el tipo de dato de respuesta es html ya que en  el conrtolador estamos c
                        //concatenando etiquetas html 
            data: {criterio:criterio},//aqui enviamos los datos a la url, ejemplo nombreVariable:variable
            success: function(data){//Si el envio de datos fue satisfactorio utilizamos la variable de respuesta
                                //en este caso data
                $("tbody").html(data);//imprimimos en  el cuerpo de las tablas la varible de respuesta
                $(".mensajes").html(data);//Este caso es especial ya que no es una tabla,este elemento es un div
            }
        });
        return false;
    }
    //comenzamos ajax
    $.ajax({
        url: url,//en el elemento url colocamos la variable antes definida
        type: "get",//usamos el metodo get
        dataType:"html",//el tipo de dato de respuesta es html ya que en  el conrtolador estamos c
                        //concatenando etiquetas html 
        data: {criterio:criterio},//aqui enviamos los datos a la url, ejemplo nombreVariable:variable
        success: function(data){//Si el envio de datos fue satisfactorio utilizamos la variable de respuesta
                                //en este caso data
            $("tbody").html(data);//imprimimos en  el cuerpo de las tablas la varible de respuesta
            $(".mensajes").html(data);//Este caso es especial ya que no es una tabla,este elemento es un div
        }
    });
}

function reset(){
	$("input[type=text]").val("");
	$("textarea").val("");
	$("select").val(1);
}

function validateCreate(){
    var count = 0;
    $(".alta").each(function(){
        var val = $(this).val();
        if (val == "") {
            count++;
        }else{
        }
    });
    $('select.alta').each(function(){
        var val = $(this).val();
        if (val > 0) {            
        }else{
            count++;
        }
    });
    if (count == 0) {
        return true;
    }else{
        return false;
        Swal.fire('No debe haber campos vacíos!','','error');
        count = 0;
    }
}

function validateModify(){
    var count = 0;
    $(".modify").each(function(){
        var val = $(this).val();
        if (val == "") {
            count++;
            $(this).attr('required');
        }else{
        }
    });
    if (count == 0) {
        return true;
    }else{
        return false;
        Swal.fire('No debe haber campos vacíos!','','error');
        count = 0;
    }
}

function removeClasses(){
    $(".form-control").removeClass("success");
    $(".form-control").removeClass("error");
}

function numeros(selector){
    $(selector).keypress(function(tecla) {
        if((tecla.charCode < 48 || tecla.charCode > 57)) return false;
    });
}

function monedas(selector){
    $(selector).keypress(function(tecla) {
        if((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode != 46)) return false;
    });
}

function letras(selector){
    $(selector).keypress(function(tecla) {
        if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 32)) return false;
    });
}

$(document).ready(function(){
    var w = $('.banner-item').attr('width');
    var h = $('.banner-item').attr('heigth');
    $('.banner-content').css({width:w,heigth:h});
    $(document).on('click','.add-Banner',function(e){
        e.preventDefault();
        var id = $(this).attr('id')
        var td = $(this).closest('tr').find('td');
        var format = td.eq(0).text();
        var descri = td.eq(1).text();
        var width = td.eq(2).text();
        var height = td.eq(3).text();
        var position = td.eq(4).text();
        $("#Formato").text(format);
        $("#Descripción").text(descri);
        $("#Ancho").text(width);
        $("#Alto").text(height);
        $('input[name=idFormato]').val(id);
    });
     /*Imagen*/
    $("#form-file").submit(function(e){
        e.preventDefault(); 
        var validate = validateCreate();
        var package = new FormData(this);
        package.append('_token', $('input[name=_token]').val());
        package.append('banner',$('input[name=banner]').val());
        package.append('idFormat',$('select[name=idFormato]').val());
        if (validate == true) {
        var archivo = $('input[name=banner]').val();
        var extension = archivo.substring(archivo.lastIndexOf('.'));
        extension = extension.toUpperCase();
        if (extension != '.PNG' && extension != '.JPG' && extension != '.JPEG' && extension != '.GIF' && extension != '.TIFF' && extension != '.TIF' && extension != '.PSD') {
            swal.fire('Error','verifique que el archivo sea imagen','error');
            return false;
        }
        var form = $(this);
        var url = form.attr("action");
        $.ajax({
            url: url,
            type: "POST",
            data:package,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#send").html("Guardando...");
            },
            success: function(data){
                if (data == "success") {
                    datos();
                    $("form").trigger("reset");
                    $("#create").modal("toggle");
                    reset();
                    Swal.fire('Registro guardado!','','success');
                    $("#send").html("Guardar");
                }else{
                    $("#create").modal("toggle");
                    Swal.fire('Registro no guardado!','','error');
                    $("#send").html("Guardar");
                    reset();
                }
                removeClasses();
            }
        }).fail(function(){
            $("#create").modal("toggle");
            Swal.fire('Registro no guardado!','','error');
            $("#send").html("Guardar");
            removeClasses();
        });
        }else{
            Swal.fire('No debe haber campos vacíos!','','error');
        }
    });

    $("#form_file").submit(function(e){
        e.preventDefault(); 
        var validate = validateCreate();
        var package = new FormData(this);
        package.append('_token', $('input[name=_token]').val());
        package.append('file',$('input[name=file]').val());
        if (validate == true) {
        var archivo = $('input[name=file]').val();
        var extension = archivo.substring(archivo.lastIndexOf('.'));
        extension = extension.toUpperCase();
        if (extension != '.PDF' && extension != '.XLSX' && extension != '.XLSM' && extension != '.XLSB' && extension != '.DOCX' && extension != '.DOCM' && extension != '.DOTX') {
            swal.fire('Error','verifique que el archivo sea pdf, word o excel','error');
            return false;
        }
        var form = $(this);
        var url = form.attr("action");
        $.ajax({
            url: url,
            type: "POST",
            data:package,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#sendFile").html("Guardando...");
            },
            success: function(data){
                if (data == "success") {
                    datos();
                    $("form").trigger("reset");
                    $("#create").modal("toggle");
                    reset();
                    Swal.fire('Registro guardado!','','success');
                    $("#sendFile").html("Guardar");
                }else{
                    $("#create").modal("toggle");
                    Swal.fire('Registro no guardado!','','error');
                    $("#sendFile").html("Guardar");
                    reset();
                }
                removeClasses();
            }
        }).fail(function(){
            $("#create").modal("toggle");
            Swal.fire('Registro no guardado!','','error');
            $("#sendFile").html("Guardar");
            removeClasses();
        });
        }else{
            Swal.fire('No debe haber campos vacíos!','','error');
        }
    });
    /**/
    $("#update_file").submit(function(e){
        e.preventDefault(); 
        var validate = validateModify();
        var package = new FormData(this);
        package.append('_token', $('input[name=_token]').val());
        package.append('id', $('input[name=id_update]').val());
        package.append('banner',$('input[name=newBanner]').val());
        package.append('idFormat',$('select[name=idNewFormato]').val());
        if (validate == true) {
        var archivo = $('input[name=newBanner]').val();
        var extension = archivo.substring(archivo.lastIndexOf('.'));
        extension = extension.toUpperCase();
        if (extension != '.PNG' && extension != '.JPG' && extension != '.JPEG' && extension != '.GIF' && extension != '.TIFF' && extension != '.TIF' && extension != '.PSD') {
            swal.fire('Error','verifique que el archivo sea imagen','error');
            return false;
        }
        var form = $(this);
        var url = form.attr("action");
        $.ajax({
            url: url,
            type: "POST",
            data:package,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $("#sendUpdate").html("Guardando...");
            },
            success: function(data){
                if (data == "success") {
                    datos();
                    $("form").trigger("reset");
                    $("#modal_edit").modal("toggle");
                    reset();
                    Swal.fire('Registro guardado!','','success');
                    $("#sendUpdate").html("Guardar");
                }else{
                    $("#modal_edit").modal("toggle");
                    Swal.fire('Registro no guardado!','','error');
                    $("#sendUpdate").html("Guardar");
                    reset();
                }
                removeClasses();
            }
        }).fail(function(){
            $("#modal_edit").modal("toggle");
            Swal.fire('Registro no guardado!','','error');
            $("#sendUpdate").html("Guardar");
            removeClasses();
        });
        }else{
            Swal.fire('No debe haber campos vacíos!','','error');
        }
    });
    $('.close-item').click(function(e){
        e.preventDefault();
        $("#modal_delete").modal("toggle");
        var id = $(this).attr("id");
        $("input[name=id_delete]").val(id)
    });
    $(document).on('click','.edit-banner',function(){
        var id = $(this).attr('id');
        $.ajax({
            url:'/datosBanner',
            type:'GET',
            dataType:'json',
            data:{id},
            beforeSend:function(){
                $('#width').html('Cargando...');
                $('#height').html('Cargando...');

            },
            success:function(html){
                $('#imb').val(html.data[0].id);
                $('#for').val(html.data[0].Formato);
                $('#desc').val(html.data[0].Descripcion);
                $('#anc').val(html.data[0].Ancho);
                $('#alt').val(html.data[0].Alto);
                $('#send').html('Guardar');
            }
        });
    });
    $('select[name=idFormato]').change(function(){
        var id = $(this).val();
        var _token = $('input[name=_token]').val();
        $.ajax({
            url:'dataTableBanner',
            type: 'POST',
            dataType: 'JSON',
            data:{id,_token},
            beforeSend:function(){
                $('#dataBanner').html('<td colspan="3" class="text-danger">Cargando...</td>');
            },
            success: function(html){
                $('#width').html(html.data[0].Ancho+'px');
                $('#height').html(html.data[0].Alto+'px');
            }
        });
    });
    $(document).on('click','.btnShowBanner',function(){
        var img = $(this).attr('id');
        $('#img_banner').attr('src','/banners/'+img);
    });
});