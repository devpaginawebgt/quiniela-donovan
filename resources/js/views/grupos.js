import { initTeamGroupCardAccordion, buildTeamGroupCard } from '../components/team-group-card.js';

document.addEventListener('DOMContentLoaded', () => {

    initTeamGroupCardAccordion();

    // --- Group selector ---

    const selectorGrupo = document.getElementById('selector-grupo');
    const listaEquipos  = document.getElementById('equipos-grupo-list');
    const tituloGrupo   = document.getElementById('titulo-grupo');
    const spinner       = document.getElementById('grupos-spinner');

    if (selectorGrupo) {
        selectorGrupo.addEventListener('change', async function () {
            const grupoId     = this.value;
            const grupoNombre = this.options[this.selectedIndex].text;

            spinner?.classList.remove('hidden');
            listaEquipos.innerHTML = '';
            tituloGrupo.textContent = `Grupo ${grupoNombre}`;

            try {
                const res     = await window.axios.get(`/grupos/${grupoId}/equipos`);
                const equipos = res.data.data.equipos;

                listaEquipos.innerHTML = equipos.map(buildTeamGroupCard).join('');
                initTeamGroupCardAccordion(listaEquipos);

                const searchInput = document.getElementById('buscar-equipos');
                if (searchInput?.value.trim()) {
                    filterTeams(searchInput.value.toLowerCase().trim());
                }
            } catch (e) {
                console.error(e);
            } finally {
                spinner?.classList.add('hidden');
            }
        });
    }

    // --- Search filter ---

    const filterTeams = (term) => {
        document.querySelectorAll('.team-group-card').forEach(card => {
            card.style.display = card.dataset.nombre.toLowerCase().includes(term) ? '' : 'none';
        });
    };

    const searchInput = document.getElementById('buscar-equipos');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            filterTeams(this.value.toLowerCase().trim());
        });
    }

    // --- Ver Jornadas toggle ---

    const btnVerJornadas  = document.getElementById('btn-ver-jornadas');
    const jornadasSection = document.getElementById('jornadas-section');

    if (btnVerJornadas && jornadasSection) {
        btnVerJornadas.addEventListener('click', () => {
            jornadasSection.classList.toggle('hidden');
            if (!jornadasSection.classList.contains('hidden')) {
                jornadasSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

});
