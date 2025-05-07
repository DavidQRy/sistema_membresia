<?php

?>


<label for="tipoGrafico">Selecciona el tipo de gráfico:</label>
<select id="tipoGrafico">
    <option value="bar">Barras</option>
    <option value="pie">Pastel</option>
    <option value="line">Líneas</option>
    <option value="doughnut">Dona</option>
</select>
<h2 style="text-align: center;">Estados de Usuarios</h2>
<div class="chart-container">
    <canvas id="miGrafico"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('miGrafico').getContext('2d');
    
    // Datos reales desde PHP
    const datos = {
        labels: ['Pendientes', 'Rechazados', 'Aceptados'],
        datasets: [{
            label: 'Estados de los Usuarios',
            data: [
                <?= $datosEstados['Pendiente'] ?? 0 ?>,
                <?= $datosEstados['Rechazado'] ?? 0 ?>,
                <?= $datosEstados['Aprobado'] ?? 0 ?>
            ],
            backgroundColor: [
                'rgba(255, 206, 86, 0.7)',  // Amarillo para Pendiente
                'rgba(255, 99, 132, 0.7)',   // Rojo para Rechazado
                'rgba(75, 192, 192, 0.7)'    // Verde para Aprobado
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 2
        }]
    };
    
    const config = {
        type: 'bar',
        data: datos,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} usuarios`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            }
        }
    };
    
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