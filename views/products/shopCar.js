const productSection = document.querySelector('.products-section');
let total = 0;
productSection.querySelector('.shop-car').addEventListener('click', ()=>{
    document.querySelector('body').classList.add('disable-scroll');
    productSection.querySelector('.modal-overlay').classList.toggle('show-overlay');
    document.getElementById('list-shop').classList.toggle('show-shoppingModal');
    const shoppingList = document.getElementById('shopping-list');

    while (shoppingList.firstChild) {
        shoppingList.removeChild(shoppingList.firstChild);
      }

    productsPurchased.forEach((producto) => {
        total += parseInt(producto.precio);
    const productHTML = `
      <div class="product">
          <h3 class="product-model">${producto.modelo}</h3>
          <p class="product-brand">${producto.marca}</p>
          <p class="product-year">${producto.año}</p>
          <p class="product-price">S/. ${producto.precio}</p>
    </div>
      `;
        shoppingList.appendChild(
          document.createRange().createContextualFragment(productHTML)
        );
        calculateTotal(productsPurchased);
      });
});

const closeShoppingModal = ()=>{
    document.querySelector('body').classList.remove('disable-scroll');
    productSection.querySelector('.modal-overlay').classList.remove('show-overlay');
    document.getElementById('list-shop').classList.remove('show-shoppingModal');
}

document.getElementById('close-shoppingModal').addEventListener('click', closeShoppingModal);

const calculateTotal = (e)=>{
    total = 0;
    e.forEach(e=>{
        total += parseInt(e.precio);
    })
    document.querySelector('.price-total').innerHTML = 'S/. ' + total;
}


document.querySelector('.send-order').addEventListener('click', e=>{
  let detail = [];
  let message = "Cotización de productos:\n\n";
  productsPurchased.forEach(function(producto) {

    const obj = {
      model: producto.modelo,
      brand: producto.marca,
      year: producto.año,
      price: producto.precio
    }

    detail.push(obj);

    message += "Modelo: " + producto.modelo + "\n";
    message += "Marca: " + producto.marca + "\n";
    message += "Año: " + producto.año + "\n";
    message += "Precio: S/." + producto.precio + "\n\n";
  });

  const sale = {
    detail,
    message,
    total,
    currentDate: getCurrentDate(),
  }
  saveSale(sale);

  message += "Precio total: S/." + total;
  
  
  var url = "https://wa.me/" + 967216577 + "?text=" + encodeURIComponent(message);
  setTimeout(() => {
    window.open(url);
  }, 1000);
  productsPurchased = [];
  closeShoppingModal();
  countShopping = 0;
  document.querySelector(".count-shopping").innerHTML = countShopping;
})

// CREAR COTIZACIÓN Y DIRIGIRLA A LA BASE DE DATOS
const saveSale = (sale)=>{
  console.log('sale', sale);
  const options = {
    method: 'POST',
    body: JSON.stringify(sale),
  }


  fetch('../../services/postSale.php',options)
  .catch(e=>{
    {
      console.log('Hubo un error al guardar la venta', e);
    };
  })
}

const getCurrentDate = ()=>{
  function agregarCero(valor) {
    if (valor < 10) {
      return "0" + valor;
    }
    return valor;
  }

  let now = new Date();
  let day = agregarCero(now.getDate());
  let month = agregarCero(now.getMonth() + 1);
  let year = now.getFullYear();
  let hour = agregarCero(now.getHours());
  let minutes = agregarCero(now.getMinutes());

  return day + "/" + month + "/" + year + " " + hour + ":" + minutes;
}