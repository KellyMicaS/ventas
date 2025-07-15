//Creo una variable tabla 
var tabla;

//Creo una función int que se ejecuta al inicio de la aplicación
function init(){
    mostrarform(false);
}

//Llamamos a la función guardar y editar

//Creo una función para limpiar el formulario
function limpiar(){
    $("#idcategoria").val("");
    $("#nombre").val("");
    $("#descripcion").val("");

}

//Función para mostrar el formulario
function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistro").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    }else{
        $("#listadoregistro").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Función para cancelar el formulario
function cancelarform(){
    limpiar();
    mostrarform(false);
}

//Función para guardar y editar los datos
function guardaryeditar(e){
    //No se activa la acción predeterminada del evento
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData ($("#formulario")[0]);

    $.ajax({
        url:"../controladores/categoria.php?op=guardaryeditar", 
        type: "POST",
        data: formData, 
        contentType: false,
        processData: false,

        succes: function(daatos)
        {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}

//Ejecutamos la función init
init();