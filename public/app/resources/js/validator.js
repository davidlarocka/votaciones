var check_media = '';
//validar combo regiones
$("#region").change(function(){
    if($(this).val() == ''){
        $('#comuna').html("");
        return
    }
    $.get( "/app/index.php?region=" + $(this).val(), function( data ) {
        
        var obj = JSON.parse(data)
        $('#comuna').html("");
        $.each(obj, function(key, value) {
            $('#comuna')
                 .append($('<option>', { value : value.id })
                 .text(value.name));
       });
    });
});


$("#bnt-votar").click(function(){
    if(validar()){
        var name = $("#name").val();
        var last_name = $("#last_name").val();
        var alias = $("#alias").val();
        var rut = $("#rut").val();
        var email = $("#email").val();
        var region = $("#region").val();
        var comuna = $("#comuna").val();
        var candidato = $("#candidato").val();
        var media = check_media;

        $.post("/app/index.php?send=1", {name: name, last_name: last_name, alias: alias , email: email , rut: rut , region: region , region: region, comuna: comuna, candidato: candidato, media: media }, function(result){
            $(".container").html(result);
        });
    }
  
});

function validar(){

    if($("#name").val() == "" ||  $("#last_name").val() == ""){
        alert("Nombre y apellido son obligatorios")
        return false
    }

    if($("#alias").val().length <= 5){
        alert("Alias debe tener más de 5 caracteres")
        return false
    }

    if($("#alias").val().length <= 5){
        alert("Alias debe tener más de 5 caracteres")
        return false
    }

    var pattern = new RegExp('^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$');
    var testResult = pattern.test($("#alias").val());
    
    if (!testResult) {
        alert("alias debe contener al menos un caracter numérico y uno alfanumérico");
        return false
    }

    if($("#rut").val() == "" ){
        alert("RUT es obligatorio")
        return false
    }

    if (!Fn.validaRut( $("#rut").val() )){
		alert("El Rut no es válido :'( ");
        return false
	}

    if($("#email").val() == "" ){
        alert("email es obligatorio")
        return false
    }

    var regExpEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test($("#email").val())
    if (!regExpEmail){
        alert("email incorrecto");
        return false
    }

    if($("#region").val() == "" ){
        alert("Region y comuna es obligatorio")
        return false
    }
    
    var check_media_nro = 0;
    $(".check_media").each(function() {
        if($(this).is(':checked')){
            check_media += $(this).val() + ","
            check_media_nro++;
        }
        
    });

    if(check_media_nro < 2 ){
        alert("debe elegir más de un medio")
        check_media = '';
        return false
    }

    return true

}