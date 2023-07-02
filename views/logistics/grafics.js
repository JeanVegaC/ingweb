// Obtener los datos de ventas utilizando la función getSales importada
fetch("../../services/getSales.php")
    .then(response => response.json())
    .then(data => {
        // Obtener los datos de ventas utilizando la función getSales importada
        var ventas = data; // Asegúrate de que esta función devuelva un array con los datos de ventas

        // Crear un objeto para almacenar las ventas por mes
        var ventasPorMes = {};

        // Recorrer las ventas y separarlas por mes
        ventas.forEach(function(venta) {
            var fechaParts = venta.currentDate.split(' ')[0].split('/'); // Dividir la fecha en partes
            var mes = parseInt(fechaParts[1]); // Obtener el mes (1-12)

            // Si el mes no existe en el objeto, crear un nuevo arreglo para almacenar las ventas
            if (!ventasPorMes[mes]) {
                ventasPorMes[mes] = [];
            }

            // Agregar la venta al arreglo correspondiente al mes
            ventasPorMes[mes].push(venta);
        });

        // Obtener los valores de ventas por mes y etiquetas de meses
        var valoresVentas = [];
        var etiquetasMeses = [];

        // Array de nombres de meses
        var nombresMeses = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];

        for (var mes in ventasPorMes) {
            var cantidadVentas = ventasPorMes[mes].length;
            valoresVentas.push(cantidadVentas);
            etiquetasMeses.push(nombresMeses[parseInt(mes) - 1]); // Obtener el nombre del mes utilizando el número de mes como índice
        }

        // Crear el primer gráfico de barras
        var ctx1 = document.getElementById('myChart1').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: etiquetasMeses,
                datasets: [{
                    label: 'Ventas por mes',
                    data: valoresVentas,
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

        // Crear el segundo gráfico de barras
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: etiquetasMeses,
                datasets: [{
                    label: 'Ventas por mes',
                    data: valoresVentas,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
