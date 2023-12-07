
document.addEventListener('DOMContentLoaded', function() {
  let formulario = document.querySelector("form");

  var calendarEl = document.getElementById('agenda');
  var calendar = new FullCalendar.Calendar(calendarEl, {

    initialView: 'dayGridMonth',
    locale:"es",

    displayEventTime:false,
    headerToolbar:{
        left: 'prev,next today',
        center:'title',
        right:'dayGridMonth,listWeek'

    },

    events: "http://127.0.0.1:8000/agenda/mostrar",

    dateClick:function(info){
        formulario.reset();
        formulario.start.value=info.dateStr;
        formulario.end.value=info.dateStr;
        $("#evento").modal("show");


    },
    eventClick:function(info){
        var evento= info.event;
        console.log(evento);

        axios.post(baseURL+"/agenda/editar/"+info.event.id).
    then(
        (respuesta) =>{

            formulario.id.value= respuesta.data.id;
            formulario.title.value= respuesta.data.title;
            formulario.descripcion.value= respuesta.data.descripcion;
            formulario.start.value= respuesta.data.start;
            formulario.end.value= respuesta.data.end;

            $("#evento").modal("show");
        }
        ).catch(
            error=>{
                if(error.reponse){
                    console.log(error.response.data);
                }
            }
        )



    }



  });

  calendar.render();

  document.getElementById("btnGuardar").addEventListener("click",function(){
    enviarDatos("/agenda/agregar");

  });
  document.getElementById("btnEliminar").addEventListener("click",function(){
    enviarDatos("/agenda/borrar/"+formulario.id.value);
  });

  document.getElementById("btnModificar").addEventListener("click",function(){
    enviarDatos("/agenda/actualizar/"+formulario.id.value);
  })

  function enviarDatos(url){
    const datos= new FormData(formulario);

    const nuevaURL= baseURL+url;

    axios.post(nuevaURL, datos).
    then(
        (respuesta) =>{
            calendar.refetchEvents();
            $("#evento").modal("hide");
        }
        ).catch(
            error=>{if(error.reponse){console.log(error.response.data);}
            }
        )
  }



});

