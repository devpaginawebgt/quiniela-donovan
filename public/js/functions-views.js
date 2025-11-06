
const slideToggle = (id) => {
    const contenidoSeleccion = document.querySelector(`.container-${id}`);
    contenidoSeleccion.classList.toggle('block');
    contenidoSeleccion.classList.toggle('hidden');
}

const increaseBookmar = (btn) => {
    let marcador = btn.parentElement.parentElement.querySelector('.marcador-equipo');
    marcador.value++;
}

const decreaseBookmar = (btn) => {
    let marcador = btn.parentElement.parentElement.querySelector('.marcador-equipo');
    (marcador.value > 0 ? marcador.value-- : marcador = marcador);
    console.log(marcador.value)
}


const obtenerUsuariosParticipantes = async () => {
    const options = {method: 'GET'};

    let datos = await fetch(`http://127.0.0.1:8000/api/obtener-tabla-participantes/${user_id.value}`, options)
      .then(response => {return response.json()})
      .catch(err => console.error(err));

    console.log(datos);
    return datos;
}

const guardarMarcadoresPartidos = async (user_id) => {
    let partidosAGuardar = [];
    let contenedoresPartidos = document.querySelectorAll(".partido-modulo-pronosticos");

    contenedoresPartidos.forEach(container => {
        let partido = {
            partido_id : container.querySelector('.partido-jornada-quiniela').value,
            marcador_equipo_1 : container.querySelector('.marcador-equipo-1').value,
            marcador_equipo_2 : container.querySelector('.marcador-equipo-2').value
        }

        partidosAGuardar.push(partido);
    });

    let responseSavePrediccions = await enviarPrediccionesPartidos(user_id,partidosAGuardar);
    console.log(responseSavePrediccions);
    if(responseSavePrediccions == "1OK"){
        savedAlert('Listo!','Se guardaron tus marcadores.','success');
    }else{
        if(responseSavePrediccions == "2OK"){
            savedAlert('Oh!','Algunos marcadores no fueron guardados, un partido iniciara pronto.','warning');
        }else{
            savedAlert('Oh!','Hubo un problema al guardar tus datos, intentalo mas tarde.','warning');
        }
    }
}

const pintarMarcadoresPartidos = async (partidosAMostrar) => {
    partidosAMostrar.forEach(partido => {
        let partidoContainer = document.querySelector(`.partido-${partido.partido_id}`);
        partidoContainer.querySelector('.marcador-equipo-1').value = partido.goles_equipo_1;
        partidoContainer.querySelector('.marcador-equipo-2').value = partido.goles_equipo_2;
    });
}

const savedAlert = (titulo, mensaje, icono, response) => {

    Swal.fire(
        {
            title: titulo,
            text: mensaje,
            icon: icono,
            showConfirmButton: false,
            showCancelButton: false,
            timer:1200
        }
    )
}