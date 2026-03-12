// --- HTTP ---
const getPartidosJornadaGeneral = async (jornada) =>
    window.axios.get(`/jornadas/partidos-jornada/${jornada}`);

// --- Renderizado ---
const renderMatchCard = (partido) => {
    const opcionesFecha = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const fechaPartido  = new Date(partido.fechaPartido).toLocaleDateString('es-GT', opcionesFecha);
    const horaPartido   = new Date(partido.fechaPartido).toLocaleTimeString('es-GT', { hour: '2-digit', minute: '2-digit', hour12: true });

    const brandHtml = partido.marca
        ? `<div class="flex">
            <div class="bg-red-700/80 flex items-center py-2 px-3 shrink-0">
                <span class="text-light text-sm font-medium whitespace-nowrap">Patrocinado por</span>
            </div>
            <div class="flex-1 flex items-center justify-center p-2 bg-green-700">
                <img src="${partido.marca.image}" alt="${partido.marca.name}" class="w-full max-w-28 object-contain">
            </div>
        </div>`
        : '';

    const iconCalendar = `<svg class="w-4 h-4 shrink-0 inline -mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" /></svg>`;
    const iconClock    = `<svg class="w-4 h-4 shrink-0 inline -mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>`;
    const iconInfo     = `<svg class="w-3.5 h-3.5 shrink-0 inline -mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" /></svg>`;

    const equipos = `${partido.equipoUno.nombre} ${partido.equipoDos.nombre}`.toLowerCase();

    return `<li
        class="match-card bg-complementary-primary border border-secondary rounded-3xl flex flex-col overflow-hidden"
        data-equipos="${equipos}"
    >
        ${brandHtml}
        <div class="flex flex-col flex-1 pt-6 px-6 pb-6 gap-4">
            <div class="flex items-center justify-between w-full gap-2">
                <div class="flex flex-col items-center gap-2 flex-1">
                    <img src="${partido.equipoUno.imagen}" alt="${partido.equipoUno.nombre}" class="w-full max-w-20 lg:max-w-24 aspect-6/4 object-cover rounded-xl shadow-md">
                    <p class="font-semibold text-sm text-center leading-tight">${partido.equipoUno.nombre}</p>
                </div>
                <span class="font-bold text-2xl shrink-0">VS</span>
                <div class="flex flex-col items-center gap-2 flex-1">
                    <img src="${partido.equipoDos.imagen}" alt="${partido.equipoDos.nombre}" class="w-full max-w-20 lg:max-w-24 aspect-6/4 object-cover rounded-xl shadow-md">
                    <p class="font-semibold text-sm text-center leading-tight">${partido.equipoDos.nombre}</p>
                </div>
            </div>
            <div class="flex flex-col items-center gap-1 text-complementary-light text-sm">
                <p class="flex items-center gap-1.5">${iconCalendar} ${fechaPartido}</p>
                <p class="flex items-center gap-1.5">${iconClock} ${horaPartido}</p>
            </div>
            <hr class="border-complementary-light/30">
            <div class="flex flex-col items-center gap-1">
                <p class="flex items-center gap-1 text-complementary-light text-xs uppercase tracking-wide">${iconInfo} Estado</p>
                <p class="font-bold text-base">${partido.estado}</p>
            </div>
        </div>
    </li>`;
};

const filtrarMatchCards = (query) => {
    const cards = document.querySelectorAll('#partidos-jornada-general .match-card');
    const term  = query.toLowerCase().trim();
    cards.forEach(card => {
        const equipos = card.getAttribute('data-equipos') ?? '';
        card.style.display = equipos.includes(term) ? '' : 'none';
    });
};

const pintarPartidosJornadaGeneral = (partidos) => {
    const espacioJornada = document.querySelector('#partidos-jornada-general');

    if (!partidos.length) {
        espacioJornada.innerHTML = `<p class="text-2xl text-complementary-light w-full text-center py-12 col-span-2">No hay partidos en esta jornada</p>`;
        return;
    }

    espacioJornada.innerHTML = partidos.map(renderMatchCard).join('');

    const buscar = document.getElementById('buscar-partidos');
    if (buscar && buscar.value.trim()) {
        filtrarMatchCards(buscar.value.trim());
    }
};

const verPartidosJornada = async (idJornada) => {
    try {
        const respuestaPartidos = await getPartidosJornadaGeneral(idJornada);
        const partidos = respuestaPartidos.data.data;
        pintarPartidosJornadaGeneral(partidos);
    } catch (err) {
        alert('Ocurrió un error al obtener los partidos de la jornada.');
        console.error(err);
    }
};

// --- Inicialización ---
document.addEventListener('DOMContentLoaded', () => {
    const inputCalendario = document.getElementById('jornadas');
    if (!inputCalendario) return;

    verPartidosJornada(inputCalendario.value);

    inputCalendario.addEventListener('change', function () {
        if (!this.value) return;
        verPartidosJornada(this.value);
    });

    const buscar = document.getElementById('buscar-partidos');
    if (buscar) {
        buscar.addEventListener('input', function () {
            filtrarMatchCards(this.value);
        });
    }
});
