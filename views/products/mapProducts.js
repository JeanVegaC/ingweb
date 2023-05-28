let allProducts = [];
const productsContainer = document.getElementById("products-container");
let buttonsAddToCar = [];
let countShopping = 0;
const productsPurchased = [];

const getProducts = async () => {
  try {
    const res = await fetch("../../services/getProducts.php");
    const json = await res.json();

    if (json) allProducts = json;

    json.forEach((producto) => {
      let url = "";
      if (producto.categoria == "pastillas")
        url = "../../assets/example-pastilla.png";
      if (producto.categoria == "discos")
        url = "../../assets/example-disco.png";
      if (producto.categoria == "tamboras")
        url = "../../assets/example-tambora.png";
      const productHTML = `
    <div class="product">
    <img src=${url}>
    <div class="product-info">
        <h3 class="product-model">${producto.modelo}</h3>
        <p class="product-brand">${producto.marca}</p>
        <p class="product-price">S/. ${producto.precio}</p>
        <p class="product-year">${producto.año}</p>
        <button class="addToCar">Agregar al carrito</button>
    </div>
  </div>
    `;
      productsContainer.appendChild(
        document.createRange().createContextualFragment(productHTML)
      );
    });
  } catch (error) {
    console.error("Error al obtener los datos:", error);
  }
  buttonsAddToCar = document.querySelectorAll(".addToCar");
  buttonsAddToCar.forEach((e) => {
    e.addEventListener("click", (e) => {
      const node = e.target.parentNode;
      countShopping += 1;
      const modelo = node.querySelector(".product-model").innerHTML,
        marca = node.querySelector(".product-brand").innerHTML,
        año = node.querySelector(".product-year").innerHTML,
        precio = node.querySelector(".product-price").innerHTML;
      const product = {
        id: countShopping,
        modelo,
        marca,
        año,
        precio: precio.replace('S/. ', ""),
      };
      productsPurchased.push(product);
      document.querySelector(".count-shopping").innerHTML = countShopping;
    });
  });
};

getProducts();

const getProductsFiltered = (e) => {
  let category = e.toLowerCase();
  let fragment = document.createDocumentFragment();

  cleanListProducts();

  if (category == "all") {
    productsContainer.innerHTML = "";
    allProducts.forEach((producto) => {
      let url = "";
      if (producto.categoria == "pastillas")
        url = "../../assets/example-pastilla.png";
      if (producto.categoria == "discos")
        url = "../../assets/example-disco.png";
      if (producto.categoria == "tamboras")
        url = "../../assets/example-tambora.png";
      const productHTML = `
            <div class="product">
            <img src=${url}>
            <div class="product-info">
                <h3 class="product-model">${producto.modelo}</h3>
                <p class="product-brand">${producto.marca}</p>
                <p class="product-price">S/. ${producto.precio}</p>
                <p class="product-year">${producto.año}</p>
                <button class="addToCar">Agregar al carrito</button>
            </div>
          </div>
            `;
      productsContainer.appendChild(
        document.createRange().createContextualFragment(productHTML)
      );
    });
    buttonsAddToCar = document.querySelectorAll(".addToCar");
    buttonsAddToCar.forEach((e) => {
      e.addEventListener("click", (e) => {
        const node = e.target.parentNode;
        countShopping += 1;
        const modelo = node.querySelector(".product-model").innerHTML,
          marca = node.querySelector(".product-brand").innerHTML,
          año = node.querySelector(".product-year").innerHTML,
          precio = node.querySelector(".product-price").innerHTML;
        const product = {
          id: countShopping,
          modelo,
          marca,
          año,
          precio: precio.replace('S/. ', ""),
        };
        productsPurchased.push(product);
        document.querySelector(".count-shopping").innerHTML = countShopping;
      });
    });
  } else {
    fragment = document.createDocumentFragment();
    let productFiltered = allProducts.filter(
      (producto) => producto.categoria == category
    );

    productFiltered.forEach((producto) => {
      let url = "";
      if (producto.categoria == "pastillas")
        url = "../../assets/example-pastilla.png";
      if (producto.categoria == "discos")
        url = "../../assets/example-disco.png";
      if (producto.categoria == "tamboras")
        url = "../../assets/example-tambora.png";
      const productHTML = `
            <div class="product">
            <img src=${url}>
            <div class="product-info">
                <h3 class="product-model">${producto.modelo}</h3>
                <p class="product-brand">${producto.marca}</p>
                <p class="product-price">S/. ${producto.precio}</p>
                <p class="product-year">${producto.año}</p>
                <button class="addToCar">Agregar al carrito</button>
            </div>
          </div>
            `;
      productsContainer.appendChild(
        document.createRange().createContextualFragment(productHTML)
      );
    });
  }
  buttonsAddToCar = document.querySelectorAll(".addToCar");
  buttonsAddToCar.forEach((e) => {
    e.addEventListener("click", (e) => {
      const node = e.target.parentNode;
      countShopping += 1;
      const modelo = node.querySelector(".product-model").innerHTML,
        marca = node.querySelector(".product-brand").innerHTML,
        año = node.querySelector(".product-year").innerHTML,
        precio = node.querySelector(".product-price").innerHTML;
      const product = {
        id: countShopping,
        modelo,
        marca,
        año,
        precio: precio.replace('S/. ', ""),
      };
      productsPurchased.push(product);
      document.querySelector(".count-shopping").innerHTML = countShopping;
    });
  });
};

const cleanListProducts = () => {
  while (productsContainer.firstChild) {
    productsContainer.removeChild(productsContainer.firstChild);
  }
};

const filters = document.querySelectorAll(".li-filter");

filters.forEach((e) => {
  e.addEventListener("click", (e) => {
    filters.forEach((e) => {
      e.classList.remove("filter-active");
    });
    e.target.parentNode.classList.add("filter-active");
    getProductsFiltered(e.target.innerText);
  });
});
