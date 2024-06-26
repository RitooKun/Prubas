// creando modal 

var myModal = new bootstrap.Modal(document.getElementById('mymodal'));

// obteniendo id del formulario

let frm = document.getElementById('formulario');
let eliminar = document.getElementById('btnEliminar');

// haciendo funcion del calendario

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'es',
      headerToolbar: {
        left : 'prev next today',
        center: 'title',
        right:'dayGridMonth timeGridWeek listWeek' 
      },

      // creando lugar donde se van a alistar las funciones del calendario

      events: base_url + 'Home/listar',
      editable: true,

      // funcion para registrar un sala desde el calendario

      dateClick: function (info){
        //console.log(info)
        frm.reset();
        document.getElementById('id').value = '';
        eliminar.classList.add('d-none');
        document.getElementById('start').value = info.dateStr;
        document.getElementById('btnAccion').textContent = 'Registrar';
        document.getElementById('titulo').textContent = 'Registro de Salas';
        myModal.show();
          },

          // modificar con el click de al registro de sala

          eventClick : function (info){
            console.log(info)
            
            eliminar.classList.remove('d-none');
            document.getElementById('titulo').textContent = 'Modificar Salas';
            document.getElementById('btnAccion').textContent = 'Modificar';
            document.getElementById('id').value = info.event.id;
            document.getElementById('title').value = info.event.title;
            document.getElementById('start').value = info.event.startStr;
            document.getElementById('time_start').value = info.event.extendedProps.time_start;
            document.getElementById('time_end').value = info.event.extendedProps.time_end;
            document.getElementById('color').value = info.event.backgroundColor;
            myModal.show();
           },

           //funcion de arrastre de registro de sala

           eventDrop: function (info){
            const id = info.event.id;
            const fecha = info.event.startStr;
            const inicio = info.event.extendedProps.time_start;
            const fin = info.event.extendedProps.time_end;
            const url = base_url + 'Home/drop';
            const http = new XMLHttpRequest();

            // creacion de nuevo formulario para enviar datos 

            const data = new FormData();
            data.append('id', id);
            data.append('fecha', fecha);
            data.append('time_start', inicio);
            data.append('time_end', fin);
            http.open('POST', url, true);
            http.send(data);
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    //console.log(this.responseText);
                    const respuesta = JSON.parse(this.responseText);
                    console.log(respuesta);
                    if (respuesta.estado){
                        
                    };
                    calendar.refetchEvents();
                    Swal.fire(
                        'Aviso',
                        respuesta.msg,
                        respuesta.tipo
                    )
                }
                
            }
           }
    });

    //Validacion de los campos antes de enviar los datos a la base de datos

    calendar.render();
    frm.addEventListener('submit', function(e){
        e.preventDefault();
        const title = document.getElementById('title').value;
        const fecha = document.getElementById('start').value;
        const time_start = document.getElementById('time_start').value;
        const time_end = document.getElementById('time_end').value;
        const color = document.getElementById('color').value;
        if(title == '' || fecha == '' || time_start == '' || time_end == '' || color == ''){
            Swal.fire(
                'Aviso',
                'Todo los campos son rqueridos',
                'Warning'
            )
        }else{
            const url = base_url + 'Home/registrar';
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    //console.log(this.responseText);
                    const respuesta = JSON.parse(this.responseText);
                    console.log(respuesta);
                    if (respuesta.estado){
                       
                    };
                    calendar.refetchEvents();
                    myModal.hide()
                    Swal.fire(
                        'Aviso',
                        respuesta.msg,
                        respuesta.tipo
                    )
                }
                
            }
        } 
    })

    // Eliminar salas

    eliminar.addEventListener('click', function(){
        myModal.hide();
        Swal.fire({
            title: "Advertencia!",
            text: "Estas seguro de eliminar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminar",
            cancelButtonText: "Cancelar"
          }).then((result) => {
            if (result.isConfirmed) {
                const id = document.getElementById('id').value;
                const url = base_url + 'Home/eliminar/' + id;
                const http = new XMLHttpRequest();
                http.open('GET', url, true);
                http.send(new FormData(frm));
                http.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        //console.log(this.responseText);
                        const respuesta = JSON.parse(this.responseText);
                        console.log(respuesta);
                        if (respuesta.estado){
                           
                        };
                        calendar.refetchEvents();
                        Swal.fire(
                            'Aviso',
                            respuesta.msg,
                            respuesta.tipo
                        )
                    }
                    
                }
            }
          });
    })
 });


