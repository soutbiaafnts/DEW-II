/**
 * 
 * Ao carregar a página, o JavaScript faz uma requisição AJAX para o endpoint /estados, que retorna a lista de estados em formato JSON. O JavaScript então popula o dropdown de estados com os dados recebidos.
 */

document.addEventListener('DOMContentLoaded', function() {

    alert(BASE_URL);

    const estadoSelect = document.getElementById('estado');
    const municipioSelect = document.getElementById('municipio');

    estadoSelect.addEventListener('change', function () {
        const estadoId = this.value;

        if (estadoId) {
            fetch(
                `${BASE_URL}/municipios/estado/${estadoId}`, {
                    'headers': {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }
            )
                .then(response => response.json())
                .then(data => {
                    municipioSelect.innerHTML = '<option value="">Selecione um município</option>';
                    
                    const status = data.status;
                    const municipios = data.data;

                    for (municipio of municipios) {
                        const option = document.createElement('option');
                        option.value = municipio.id;
                        option.textContent = municipio.nome;
                        municipioSelect.appendChild(option);
                    }
                })
                .catch(error => console.log('Erro ao carregar municípios:'));
        }
    });
});