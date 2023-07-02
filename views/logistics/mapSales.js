const generatePDF = (data) => {
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  }
  fetch('../../services/generatePdf.php', options)
    .then(response => {
      if (response.ok) {
        return response.blob();
      }
      throw new Error('Error en la generación del PDF');
    })
    .then(blob => {
      // La respuesta del servidor es el archivo PDF generado
      // Puedes manipularlo o mostrarlo al usuario según tus necesidades
      console.log('PDF generado:', blob);

      // Crear un enlace de descarga para el PDF
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'venta.pdf';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

const getSaleById = (id) => {
  const options={
    method: 'POST',
    body: JSON.stringify({id})
  }
  fetch('../../services/getSaleById.php', options)
    .then(e => e.json())
    .then(e => {
      // Llamar a la función generatePDF con los detalles de la venta
      generatePDF(e);
    });
};

const getSales = () => {
  fetch("../../services/getSales.php")
    .then(response => response.json())
    .then(data => {
      const ventasTable = document.getElementById("ventasTable");
      const tbody = ventasTable.querySelector("tbody");

      // Limpiar la tabla antes de agregar las nuevas filas
      while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
      }

      data.forEach(venta => {
        const row = document.createElement("tr");

        const idCell = document.createElement("td");
        idCell.textContent = venta.id;
        idCell.classList.add("venta-id");
        row.appendChild(idCell);

        const detalleCell = document.createElement("td");
        detalleCell.textContent = venta.detail;
        detalleCell.classList.add("venta-detalle"); 
        row.appendChild(detalleCell);

        const totalCell = document.createElement("td");
        const totalText = document.createTextNode(`S/. ${venta.total}`);
        totalCell.appendChild(totalText);
        totalCell.classList.add("venta-total");
        row.appendChild(totalCell);

        const fechaCell = document.createElement("td");
        fechaCell.textContent = venta.currentDate;
        fechaCell.classList.add("venta-fecha");
        row.appendChild(fechaCell);

        const accionesCell = document.createElement("td"); // Nueva celda para los botones
        const verButton = document.createElement("button"); // Botón "Ver"
        verButton.textContent = "Ver";
        verButton.addEventListener("click", () => {
          // Lógica para ver detalles de la venta
          getSaleById(venta.id);
        });
        accionesCell.appendChild(verButton);
        accionesCell.classList.add("venta-acciones");
        row.appendChild(accionesCell);

        tbody.appendChild(row);
      });
    })
    .catch(error => {
      console.error("Error al obtener las ventas:", error);
    });
}

getSales();
