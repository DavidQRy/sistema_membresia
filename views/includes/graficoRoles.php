
<label for="tipoGrafico">Selecciona el tipo de gráfico:</label>
<select id="tipoGrafico">
    <option value="bar">Barras</option>
    <option value="pie">Pastel</option>
    <option value="line">Líneas</option>
    <option value="doughnut">Dona</option>
</select>

<h2 style="text-align: center;">Roles de Usuarios</h2>

<div class="chart-container">
    <canvas id="miGrafico"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('miGrafico').getContext('2d');
    
    // Datos reales desde PHP
    const datos = {
        labels: ['SuperAdministrador', 'Administrador', 'Miembro'],
        datasets: [{
            label: 'Roles de Usuarios',
            data: [
                <?= $datosRoles['SuperAdministrador'] ?? 0 ?>,
                <?= $datosRoles['Administrador'] ?? 0 ?>,
                <?= $datosRoles['Miembro'] ?? 0 ?>
            ],
            backgroundColor: [
                'rgba(255, 206, 86, 0.7)',  
                'rgba(255, 99, 132, 0.7)',   
                'rgba(75, 192, 192, 0.7)'    
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 2
        }]
    };

    // Configuración inicial
    let config = {
        type: 'bar', // Tipo inicial
        data: datos,
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} usuarios`;
                        }
                    }
                }
            }
        }
    };

    // Creación inicial del gráfico
    let miGrafico = new Chart(ctx, config);

    // Cambio dinámico de tipo de gráfico
    document.getElementById('tipoGrafico').addEventListener('change', function() {
        let nuevoTipo = this.value;
        
        miGrafico.destroy(); // Destruir gráfico anterior
        config.type = nuevoTipo; // Actualizar tipo
        miGrafico = new Chart(ctx, config); // Crear nuevo gráfico
        if (nuevoTipo = 'pie') {
           document.getElementById('miGrafico').style.maxHeight = "500px";
            
        }else if(nuevoTipo = 'doughnut'){
            document.getElementById('miGrafico').style.maxHeight = "500px";
            
        }
 
    });
</script>
