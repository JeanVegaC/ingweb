// Obtener los datos de ventas
fetch("../../services/getSales.php")
    .then(response => response.json())
    .then(data => {
        // Obtener los datos de ventas
        var ventas = data; // Asegúrate de que esta función devuelva un array con los datos de ventas

        // Crear un objeto para almacenar las ventas por día y por mes
        var ventasPorDia = {};
        var ventasPorMes = {};

        // Recorrer las ventas y separarlas por día y por mes
        ventas.forEach(function(venta) {
            var fechaParts = venta.currentDate.split(' ')[0].split('/'); // Dividir la fecha en partes
            var dia = parseInt(fechaParts[0]); // Obtener el día del mes (1-31)
            var mes = parseInt(fechaParts[1]); // Obtener el mes (1-12)

            // Ventas por día
            if (!ventasPorDia[dia]) {
                ventasPorDia[dia] = [];
            }
            ventasPorDia[dia].push(venta);

            // Ventas por mes
            if (!ventasPorMes[mes]) {
                ventasPorMes[mes] = [];
            }
            ventasPorMes[mes].push(venta);
        });

        // Obtener los valores de ventas por día y etiquetas de días
        var valoresVentasDiarias = [];
        var etiquetasDias = [];

        for (var dia in ventasPorDia) {
            var cantidadVentas = ventasPorDia[dia].length;
            valoresVentasDiarias.push(cantidadVentas);
            etiquetasDias.push(dia.toString()); // Utilizar el día como etiqueta directamente (sin convertir a nombre de mes)
        }

        // Obtener los valores de ventas por mes y etiquetas de meses
        var valoresVentasMensuales = [];
        var etiquetasMeses = [];

        for (var mes in ventasPorMes) {
            var cantidadVentas = ventasPorMes[mes].length;
            valoresVentasMensuales.push(cantidadVentas);
            etiquetasMeses.push(mes.toString()); // Utilizar el número de mes como etiqueta directamente
        }

        // Crear el gráfico de barras para ventas diarias
        var ctx1 = document.getElementById('myChart1').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: etiquetasDias,
                datasets: [{
                    label: 'Ventas por día',
                    data: valoresVentasDiarias,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        stepSize: 1
                    }
                }
            }
        });

        // Crear el gráfico de barras para ventas mensuales
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: etiquetasMeses,
                datasets: [{
                    label: 'Ventas por mes',
                    data: valoresVentasMensuales,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        stepSize: 1
                    }
                }
            }
        });
    });