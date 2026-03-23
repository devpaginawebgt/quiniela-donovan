import { initMarcadorButtons } from '../components/marcador.js';

initMarcadorButtons();

document.addEventListener('DOMContentLoaded', () => {

    // Logica para cambiar de jornada 

    const select = document.getElementById('select-proximos-partidos');

    if (!select) return;

    select.addEventListener('change', () => {
        document.getElementById('form-proximos-partidos').submit();
    });

    // Logica para filtrar los registros de predicciones en la vista

    const buscar = document.getElementById('buscar-partidos');
    const lista  = document.getElementById('partidos-jornada-general');

    if (buscar && lista) {
        buscar.addEventListener('input', function () {
            const term = this.value.toLowerCase().trim();
            lista.querySelectorAll('li[data-equipos]').forEach(card => {
                card.style.display = (card.dataset.equipos ?? '').includes(term) ? '' : 'none';
            });
        });
    }

    // Logica para guardar predicciones via AJAX

    const formPredicciones = document.getElementById('formPredicionesWeb');

    if (formPredicciones) {
        formPredicciones.addEventListener('submit', function (e) {
            e.preventDefault();

            const partidoInputs = document.querySelectorAll('.partido-jornada-quiniela');
            const predicciones = [];

            partidoInputs.forEach(function (input) {
                const idPartido = parseInt(input.value);

                const inputEquipo1 = document.querySelector(`[name="prediccion_equipo1_${idPartido}"]`);
                const inputEquipo2 = document.querySelector(`[name="prediccion_equipo2_${idPartido}"]`);

                const prediccionEquipoUno = inputEquipo1 && inputEquipo1.value !== '' ? parseInt(inputEquipo1.value) : null;
                const prediccionEquipoDos = inputEquipo2 && inputEquipo2.value !== '' ? parseInt(inputEquipo2.value) : null;

                predicciones.push({
                    idPartido,
                    prediccionEquipoUno,
                    prediccionEquipoDos,
                });
            });

            const url = formPredicciones.dataset.urlPredicciones;

            axios.post(url, { predicciones })
                .then(response => console.log(response.data))
                .catch(error => console.error(error.response?.data || error));
        });
    }
});
