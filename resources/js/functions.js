const getEquiposGrupo = async (grupo) => {

    let datos = await axios.get(`/ver-grupo/${grupo}`)
        .then(data => data.data)
        .catch(console.error);

    return datos;

}



const getPartidosGruposJornadas = async (grupo, jornada) => {

    const body = { 'grupo': grupo, 'jornada': jornada };

    let datos = await axios.post('/partidos-grupo/', body)
        .then(data => data.data)
        .catch(console.error);

    return datos;

}



document.addEventListener('DOMContentLoaded', async () => {

    try {

        let equipos = await getEquiposGrupo(1);

        pintarTablaEquipos(equipos);



        pintarJornadas(1);

    } catch (error) {

        console.error(error);

    }



    try {

        let equiposJornada = await getPartidosJornadaGeneral(1);

        pintarPartidosJornadaGeneral(equiposJornada);

    } catch (error) {

        console.error(error);

    }



    try {

        let participantes = await obtenerUsuariosParticipantes();

        pintarParticipantes(participantes);   

    } catch (error) {

        console.error(error);

    }


    const spinnerLoad = document.querySelector(".spinner-load");

    if (spinnerLoad) {
        spinnerLoad.classList.toggle('hidden');
    }

});



const verEquiposGrupo = async (element) => {

    const spinnerLoad = document.querySelector(".spinner-load");
    
    if (spinnerLoad) {
        spinnerLoad.classList.toggle('hidden');
    }

    let equipos = await getEquiposGrupo(element.value);

    pintarTablaEquipos(equipos);



    pintarJornadas(element.value);

    if (spinnerLoad) {
        spinnerLoad.classList.toggle('hidden');
    }

}

window.verEquiposGrupo = verEquiposGrupo;




const pintarJornadas = async (grupo) => {

    let partidosJornada1 = await getPartidosGruposJornadas(grupo, 1);

    pintarPartidosJornada(partidosJornada1, 1);



    let partidosJornada2 = await getPartidosGruposJornadas(grupo, 2);

    pintarPartidosJornada(partidosJornada2, 2);



    let partidosJornada3 = await getPartidosGruposJornadas(grupo, 3);

    pintarPartidosJornada(partidosJornada3, 3);

}







const pintarTablaEquipos = (equipos) => {

    let tablaEquipos = document.querySelector('#body-equipos-grupo');

    let rowEquipos = [];



    equipos.forEach(element => {

        let row = `<tr class="bg-white border-b">

        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap flex items-center justify-between">

            <img src="${element.imagen}" alt="SELECCION" class="h-10 w-14 mx-4 border rounded-md shadow-md">

            ${element.nombre}

        </th>

        <td class="py-4 px-6">

            ${element.partidos_jugados}

        </td>

        <td class="py-4 px-6">

            ${element.partidos_ganados}

        </td>

        <td class="py-4 px-6">

            ${element.partidos_empatados}

        </td>

        <td class="py-4 px-6">

            ${element.partidos_perdidos}

        </td>

        <td class="py-4 px-6">

            ${element.goles_favor}

        </td>

        <td class="py-4 px-6">

            ${element.goles_contra}

        </td>

        <td class="py-4 px-6">

            ${element.puntos}

        </td>

    </tr>`;



        rowEquipos.push(row);

    });



    tablaEquipos.innerHTML = rowEquipos;

}



const pintarPartidosJornada = (equipos, jornadaAPintar) => {

    let espacioJornada = document.querySelector(`#partidos-jornada-${jornadaAPintar}`);

    let partidos = [];

    let rowPartidos = [];



    partidos.push(equipos.slice(0, 2))

    partidos.push(equipos.slice(2, 4))



    partidos.forEach(element => {

        if (element[0].partido_id == element[1].partido_id) {

            const opcionesFecha = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };

            let row = `<li class="flex justify-around lg:py-2 pb-28 my-4 xl:my-2 border-b border-gray-300 items-center">

            <div class="w-1/2 flex-col lg:flex-row xl:w-1/4 flex items-center justify-between">

                <img src="${element[0].imagen}" alt="SELECCION" class="h-10 w-14 mx-4 border rounded-md shadow-md">

                <p class="font-semibold">${element[0].nombre}</p>

            </div>

            <div class="w-full xl:w-1/3 my-4 mt-44 lg:my-0 absolute lg:relative">

                <p class="text-center">${new Date(element[0].fecha_partido).toLocaleDateString('es-ES', opcionesFecha)}</p>

                <p class="text-center">${new Date(element[0].fecha_partido).toLocaleTimeString("es-GT", { hour12: true })}</p>

            </div>

            <div class="w-1/2 flex-col lg:flex-row xl:w-1/4 flex items-center justify-between">

                <img src="${element[1].imagen}" alt="SELECCION" class="h-10 w-14 mx-4 border rounded-md shadow-md">

                <p class="font-semibold">${element[1].nombre}</p>

            </div>

        </li>`;

            rowPartidos.push(row);

        } else {

            

        }

    });



    espacioJornada.innerHTML = rowPartidos;


}



/**************JORNADA SELECT */



const getPartidosJornadaGeneral = async (jornada) => {

    let datos = await axios.get(`/partidos-jornada/${jornada}`)
        .then(data => data.data)
        .catch(console.error);

    return datos;

}



const pintarPartidosJornadaGeneral = (equipos) => {

    let espacioJornada = document.querySelector(`#partidos-jornada-general`);

    let partidos = [];

    let partidosAPintar = [];



    for (let index = 0; index < equipos.length; index++) {

        partidos.push(equipos.slice(index, index + 2));

        index++;

    }



    partidos.forEach(element => {

        if (element[0].partido_id == element[1].partido_id) {

            const opcionesFecha = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };

            let row = `<li class="flex justify-around lg:py-2 pb-28 my-4 xl:my-2 border-b border-gray-300 items-center">

            <div class="w-1/2 flex-col lg:flex-row xl:w-1/4 flex items-center justify-between">

                <img src="${element[0].imagen}" alt="SELECCION" class="h-10 w-14 mx-4 border rounded-md shadow-md">

                <p class="font-semibold">${element[0].nombre}</p>

            </div>

            <div class="w-full xl:w-1/3 my-4 mt-44 lg:my-0 absolute lg:relative">

                <p class="text-center">${new Date(element[0].fecha_partido).toLocaleDateString('es-ES', opcionesFecha)}</p>

                <p class="text-center">${new Date(element[0].fecha_partido).toLocaleTimeString("es-GT", { hour12: true })}</p>

            </div>

            <div class="w-1/2 flex-col lg:flex-row xl:w-1/4 flex items-center justify-between">

                <img src="${element[1].imagen}" alt="SELECCION" class="h-10 w-14 mx-4 border rounded-md shadow-md">

                <p class="font-semibold">${element[1].nombre}</p>

            </div>

        </li>`;

            partidosAPintar.push(row);

        } else {

            

        }

    });



    espacioJornada.innerHTML = partidosAPintar;

}



const verPartidosJornada = async (element) => {

    const spinnerLoad = document.querySelector(".spinner-load");
    
    if (spinnerLoad) {
        spinnerLoad.classList.toggle('hidden');
    }

    let equiposJornada = await getPartidosJornadaGeneral(element.value);

    pintarPartidosJornadaGeneral(equiposJornada);

    if (spinnerLoad) {
        spinnerLoad.classList.toggle('hidden');
    }

}

window.verPartidosJornada = verPartidosJornada;


/**************QUINIELA SELECT */



const pintarPartidosJornadaQuiniela = (equipos) => {

    let espacioQuiniela = document.querySelector(`#partidos-jornada-quiniela`);

    let partidos = [];

    let partidosAPintar = [];

    const opcionesFecha = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };



    for (let index = 0; index < equipos.length; index++) {

        partidos.push(equipos.slice(index, index + 2));

        index++;

    }



    partidos.forEach(element => {

        if (element[0].partido_id == element[1].partido_id) {

            let row = `<li class="flex justify-around lg:py-2 pb-28 my-4 xl:my-2 border-b border-gray-400 items-center ${element[0].estado == 0 ? 'partido-modulo-pronosticos' : '' } partido-${element[0].partido_id}">

            <input type="number" value="${element[0].partido_id}" hidden class="hidden partido-jornada-quiniela" disabled>

            <div class="w-1/2 xl:w-1/3 flex items-center justify-between px-1">

                <div class="flex flex-col justify-center items-center xl:flex-row w-1/3 md:w-auto ml-2">

                    <img src="${element[0].imagen}" alt="SELECCION" class="h-10 w-14 mx-4 border rounded-md shadow-md">

                    <p class="font-semibold text-xs xs:text-md lg:text-xl m-4">${element[0].nombre}</p>

                </div>

                <div class="flex flex-col justify-center items-center w-auto">

                    <div>

                        <button class="" onclick="increaseBookmar(this)"><i><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-up-circle-fill text-rose-600 hover:text-rose-900" viewBox="0 0 16 16">

                            <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>

                          </svg></i>

                        </button>

                    </div>

                    <div class="my-2">

                        <input type="number" name="" min="0" max="10" value="0" class="marcador-equipo-1 marcador-equipo bg-gray-50 border border-gray-100 text-gray-900 text-center lg:text-right text-lg rounded-md focus:ring-blue-500 focus:border-blue-500 block w-8 md:w-14 p-2">

                    </div>

                    <div>

                        <button class="" onclick="decreaseBookmar(this)"><i>

                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-down-circle-fill text-rose-600 hover:text-rose-900" viewBox="0 0 16 16">

                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>

                            </svg></i> 

                        </button>

                    </div>

                </div>

            </div>

            <div class="w-full xl:w-1/3 flex flex-col justify-center items-center mt-56 lg:my-0 absolute lg:relative">

                ${partidoJugado(element[0].fecha_partido,element[0].estado)}

            </div>

            <div class="w-1/2 xl:w-1/3 flex items-center justify-between px-1">

                <div class="flex flex-col justify-center items-center w-auto">

                    <div>

                        <button class="" onclick="increaseBookmar(this)"><i><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-up-circle-fill text-rose-600 hover:text-rose-900" viewBox="0 0 16 16">

                            <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>

                          </svg></i>

                        </button>

                    </div>

                    <div class="my-2">

                        <input type="number" name="" min="0" max="10" value="0" class="marcador-equipo-2 marcador-equipo bg-gray-50 border border-gray-100 text-gray-900 text-center lg:text-right text-lg rounded-md focus:ring-blue-500 focus:border-blue-500 block w-8 md:w-14 p-2">

                    </div>

                    <div>

                        <button class="" onclick="decreaseBookmar(this)"><i>

                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-down-circle-fill text-rose-600 hover:text-rose-900" viewBox="0 0 16 16">

                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>

                            </svg></i>

                        </button>

                    </div>

                </div>

                <div class="flex flex-col-reverse justify-center items-center xl:flex-row w-1/3 md:w-auto mr-2">

                    <p class="font-semibold text-xs xs:text-md lg:text-xl m-4">${element[1].nombre}</p>

                    <img src="${element[1].imagen}" alt="SELECCION" class="h-10 w-14 mx-4 border rounded-md shadow-md">

                </div>

            </div>

        </li>`;

            partidosAPintar.push(row);

        } else {


        }

    });



    espacioQuiniela.innerHTML = partidosAPintar;

}



const verPartidosJornadaQuiniela = async (element, user_id) => {

    

    let formu = document.querySelector('#verPartidosQuinielaSelect');



    formu.action += '/' + element.value



    formu.submit();

    

    // document.querySelector(".spinner-load").classList.toggle('hidden');

    // let equiposJornadaQuiniela = await getPartidosJornadaGeneral(element.value);

    // pintarPartidosJornadaQuiniela(equiposJornadaQuiniela);



    // let partidosAMostrar = await obtenerPrediccionesPartidos(user_id, element.value);

    // pintarMarcadoresPartidos(partidosAMostrar);

    // document.querySelector(".spinner-load").classList.toggle('hidden');

}

window.verPartidosJornadaQuiniela = verPartidosJornadaQuiniela;



const partidoJugado = (fecha_partido,estado) => {

    let returnData = ``;

    if(estado == 0){

        const opcionesFecha = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };

        returnData = `<i class="resultIcon">

                    

        </i>

        <p class="text-lg text-center">Fecha de encuentro</p>

        <p class="text-lg text-center font-semibold">${new Date(fecha_partido.replace(/-/g, "/")).toLocaleDateString('es-ES', opcionesFecha)}</p>

        <p class="text-md text-center font-semibold">${new Date(fecha_partido.replace(/-/g, "/")).toLocaleTimeString("es-GT", { hour12: true })}</p>`;

    }else{

        returnData = `<div class="resultadoPartido flex justify-between items-center text-3xl font-bold"></div><div class="puntosGenerados font-semibold text-center"></div>`;

    }



    return returnData;

}



/**********PARTICIPANTES QUINIELA */



const pintarParticipantes = (usuariosParticipantes) => {

    let tablaParticipantes = document.querySelector('#body-participantes-quiniela');

    let rowParticipantes = [];

    const opcionesFecha = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };



    usuariosParticipantes.forEach((element,index) => {

        let row = `<tr class="bg-white border-b">

        <th scope="row" class="py-4 px-6 font-bold text-lg text-gray-800 whitespace-nowrap">

            ${++index}

        </th>

        <td class="py-4 px-6">

            ${new Date(element.name).toLocaleDateString('es-GT', opcionesFecha)}

        </td>

        <td class="py-4 px-6">

            ${element.nombres}

        </td>

        <td class="py-4 px-6">

            ${element.apellidos}

        </td>
        <td class="py-4 px-6">

            ${element.numero_documento}

        </td>
        <td class="py-4 px-6">

            ${element.email}

        </td>
        <td class="py-4 px-6">

            ${element.telefono}

        </td>
        <td class="py-4 px-6">

            ${element.puntos}

        </td>

        </tr>`;



        rowParticipantes.push(row);

    });



    tablaParticipantes.innerHTML = rowParticipantes;

}