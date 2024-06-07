function agregarGol(equipo) {
    const numGoles = document.getElementById(`num-goles-${equipo}`).value;
    const jugadorResponsable = document.getElementById(`jugador-responsable-${equipo}`).value;

    if (numGoles && jugadorResponsable) {
        const golesContainer = document.getElementById('goles-container');
        const nuevoGol = document.createElement('div');
        nuevoGol.classList.add('row', 'justify-content-center', 'align-items-center', 'mt-2');
        nuevoGol.innerHTML = `
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <p class="fw-bold">Equipo ${equipo} - ${jugadorResponsable}: ${numGoles} gol(es)</p>
            </div>
        `;

        golesContainer.appendChild(nuevoGol);
    } else {
        alert('Por favor, complete todos los campos.');
    }
}