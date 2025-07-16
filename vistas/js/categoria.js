//Creo una variable tabla 
var tabla;

//Creo una función int que se ejecuta al inicio de la aplicación
function init(){
    mostrarform(false);
    listar();
    
    //Llamamos a la función guardar y editar
    $("#formulario").on("submit", function(e){
    guardaryeditar(e);
    });
}

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

//Creamos una función para listar los datos de la base de datos
function listar(){
    tabla=$('#tbllistado').dataTable(
        {
            "aProcessing":true, //Activamos el procesamiento del dataTable
            "aServerSide": true, //Paginación y filytado realizadis por el servidor
            dom: 'Bfrtip', //Defibinos los elementos del control de la tabla
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "ajax":
            {
                url:"../controladores/categoria.php?op=listar",
                type: "get",
                dataType: "json",
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "bDestroy":true,
            "iDisplayLength":5, //Paginación= cuantos datos va a mostrar
            "order":[[0, "desc"]] //Ordenar (columna, orden)

        }).DataTable();
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

        success: function(datos)
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