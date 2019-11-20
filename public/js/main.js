$(document).ready(function(){
    consultarBaseDatos();
    $('#frmFormulario').on('submit',prepararFormulario);
    $('#table-content').on('click',consultarPersonaId);
    $('#frmModificar').on('submit',modificarUsuario);
    $('#btnEliminarr').on('click',eliminarUsuario);

    function prepararFormulario(e){
        e.preventDefault();
        let txtNombre = document.querySelector('#txtNombre').value,
        txtApellido = document.querySelector('#txtApellido').value,
        txtTelefono = document.querySelector('#txtTelefono').value,
        txtCorreo = document.querySelector('#txtCorreo').value,
        txtIdScope = document.querySelector('#txtIdScope').value,
        formulario = document.querySelector('#frmFormulario');

        if(txtNombre.trim() ===''||txtApellido.trim()===''||txtTelefono.trim() ===''||txtCorreo.trim() ===''||txtIdScope.trim() ==='0'){
            alert('campos obligatorios')
        }
        else{
            let form = new FormData();
            form.append('txtNombre',txtNombre);
            form.append('txtApellido',txtApellido);
            form.append('txtTelefono',txtTelefono);
            form.append('txtCorreo',txtCorreo);
            form.append('txtIdScope',txtIdScope);
            form.append('accion','insertar');

            insertarBaseDatos(form,formulario);
        }
    }
    function insertarBaseDatos(datos,formulario){
        const xhr = new XMLHttpRequest();
        xhr.open('POST','app/controllers/persona.controller.php',true);

        xhr.onload = function(){
            if(this.status===200){
                console.log(JSON.parse(xhr.responseText));
                consultarBaseDatos();
                formulario.reset();
            }
        }
        xhr.send(datos);
    }
    function consultarBaseDatos(){
        let form = new FormData();
        form.append('accion','consultar');
        const xhr = new XMLHttpRequest();
        xhr.open('POST','app/controllers/persona.controller.php',true);

        xhr.onload = function(){
            if(this.status===200){
                let respuesta = JSON.parse(xhr.responseText);
                cargarTabla(respuesta);
            }
        }
        xhr.send(form);
    } 
    function consultarPersonaId(e){
        if(e.target.classList.contains('btn-Editar')){
            e.preventDefault();
            const xhr = new XMLHttpRequest();
            xhr.open('POST','app/controllers/persona.controller.php', true);
            let idPersona = e.target.getAttribute('idedit');
            const accion = new FormData();
            accion.append('accion','consultarId');
            accion.append('idPersona',idPersona);
            xhr.onload = function(){
                if(this.status === 200){
                    const respuesta = JSON.parse(xhr.responseText);
                    $('#txtNombreMo').val(respuesta.nombreUsuario);
                    $('#txtApellidoMo').val(respuesta.apellidoUsuario);
                    $('#txtTelefonoMo').val(respuesta.telefonoUsuario);
                    $('#txtCorreoMo').val(respuesta.correoUsuario);
                    $('#txtIdScopeMo').val(respuesta.nombreScope);
                    $('#hidenMo').val(respuesta.idUsuario);
                    $('#hidenMo').attr('name', "idUsu");
                    $('#idUsuElimi').val(respuesta.idUsuario);
                }
            }
            xhr.send(accion);
            
        } else if(e.target.classList.contains('btn-Eliminar')){
            let idPersona = e.target.getAttribute('idelim');
            console.log(idPersona);
            $('#idUsuElimi').val(idPersona);
        }
    }
    function eliminarUsuario(){
        let idUsuario = document.querySelector('#idUsuElimi').value;
        $.ajax({
            type: "POST",
            url: "app/controllers/persona.controller.php",
            data: "&accion=eliminar&id="+idUsuario,
            dataType: "JSON",
            success: function (response) {
                consultarBaseDatos();
            }
        });
    }
    function cargarTabla(datos){
        tabla = document.querySelector('#table-content');
        let item='';
        i=1;
        for(let persona of datos){
            item += `<tr>`
                item += `<td> ${i++} </td>`
                item += `<td>${persona.nombreUsuario}</td>`
                item += `<td>${persona.apellidoUsuario}</td>`
                item += `<td>${persona.telefonoUsuario}</td>`
                item += `<td>${persona.correoUsuario}</td>`
                item += `<td> ${persona.nombreScope}</td>`
                item += `<td class="text-center">`
                    item += `<a idedit="${persona.idUsuario}" class='btn-Editar  btn btn-info m-2' data-target='#fm-modal-grid' data-toggle="modal" >Modificar</a>`;
                    item += `<button idelim="${persona.idUsuario}" class='btn-Eliminar btn btn-danger m-2' data-target="#modelId"  data-toggle="modal">Eliminar</button>`;
                item += `</td>`
            item += `</tr>`
        }
        tabla.innerHTML =item;
    }   

    function modificarUsuario(e){
        e.preventDefault();
        let txtNombreMo = document.querySelector('#txtNombreMo').value,
        txtApellidoMo = document.querySelector('#txtApellidoMo').value,
        txtCorreoMo = document.querySelector('#txtCorreoMo').value,
        txtIdScopeMo = document.querySelector('#txtIdScopeMo').value,
        txtTelefonoMo = document.querySelector('#txtTelefonoMo').value
        if(txtNombreMo.trim() === '' || txtCorreoMo.trim() ==='' || txtIdScopeMo.trim()==='0'|| txtIdScopeMo.trim()===''|| txtTelefonoMo.trim()===''|| txtApellidoMo.trim()===''){
            alert('campos obligatorios')
        } else{
            $.ajax({
                type: "POST",
                url: "app/controllers/persona.controller.php",
                data: $('#frmModificar').serialize()+'&accion=modificar',
                dataType: "JSON",
                success: function (response) {
                    consultarBaseDatos();
                    alert('Datos actualizados correctamente')
                }
            });
        }

    }





})