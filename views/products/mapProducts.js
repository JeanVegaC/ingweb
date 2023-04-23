let allProducts = [];

const getProducts = async () => {
    try {
      const res = await fetch('../../services/getProducts.php');
      const json = await res.json();
     
    const productsContainer = document.getElementById('products-container');
    if(json) allProducts = json;

  json.forEach(producto => {
    const productHTML = `
    <div class="product">
    <img src="https://images.genius.com/ab10b91c63d5dcad0e35e6669113eab9.1000x1000x1.png" alt="Nombre del producto">
    <div class="product-info">
        <h3>${producto.modelo}</h3>
        <p>${producto.marca}</p>
        <p>S/. ${producto.precio}</p>
        <p>${producto.año}</p>
        <button>Comprar</button>
    </div>
  </div>
    `;
    productsContainer.appendChild(document.createRange().createContextualFragment(productHTML));
  });


    } catch (error) {
      console.error('Error al obtener los datos:', error);
    }
  };
  
  getProducts();

const getProductsFiltered = (e) =>{
    const productsContainer = document.getElementById('products-container');
    let category = e.toLowerCase();
    let fragment = document.createDocumentFragment();
    if(category == 'all'){
        productsContainer.innerHTML = "";

        allProducts.forEach(producto => {
            const productHTML = `
            <div class="product">
            <img src="https://images.genius.com/ab10b91c63d5dcad0e35e6669113eab9.1000x1000x1.png" alt="Nombre del producto">
            <div class="product-info">
                <h3>${producto.modelo}</h3>
                <p>${producto.marca}</p>
                <p>S/. ${producto.precio}</p>
                <p>${producto.año}</p>
                <button>Comprar</button>
            </div>
          </div>
            `;
            productsContainer.appendChild(document.createRange().createContextualFragment(productHTML));
          });
    }else{
        fragment = document.createDocumentFragment();
        let productFiltered = allProducts.filter(producto => producto.categoria == category);
        productFiltered.forEach(producto=>{
            const productHTML = `
    <div class="product">
    <img src="https://images.genius.com/ab10b91c63d5dcad0e35e6669113eab9.1000x1000x1.png" alt="Nombre del producto">
    <div class="product-info">
        <h3>${producto.modelo}</h3>
        <p>${producto.marca}</p>
        <p>S/. ${producto.precio}</p>
        <p>${producto.año}</p>
        <button>Comprar</button>
    </div>
    </div>
    `;
    productsContainer.innerHTML = "";
    productsContainer.appendChild(document.createRange().createContextualFragment(productHTML));
    
        });
    }

       
    }

  const filters = document.querySelectorAll('.li-filter');  
  filters.forEach(e=>{
    e.addEventListener('click',(e)=>{
        getProductsFiltered(e.target.innerText);
      })
  })