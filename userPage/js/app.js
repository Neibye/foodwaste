// "use strict";

// /* ---------- Global Variables ---------- */

// let _products = [];
// let _selectedProductId;

// /* -------------------------------------- */

// async function initApp() {
//   _products = await fetchData();
//   appendProducts(_products);
//   showLoader(false);
// }

// initApp();

// /**
//  * Getting product data from JSON file
//  */
// async function fetchData() {
//   const response = await fetch('json/products.json');
//   const data = await response.json();
//   return data;
// }

let _products = [];

async function initApp() {
  _products = await fetchData();
  appendProducts(_products);
  productStatus(_products);
}

function appendProducts(products) {
  let htmlTemplate = "";
  for (let product of products) {
    let quantity = parseInt(product.quantity);
    let produktDiv = document.querySelector(`#productId${product.id}`);
    htmlTemplate += /*html*/ `
      <article class="product">
        <div class="product_content flex spaceBtwn">
          <div class="product_name">
            <p>${product.foodName}</p>
            <p class="product_partner">${product.navn}</p>
          </div>
          <div class="product_price">
            <p class="oldPrice">Før: ${product.oldPrice}kr</p>
            <p class="newPrice">Nu: ${product.newPrice}kr</p>
          </div>
        </div>
        <div id="productId${product.id}" class="product_status"></div>
      </article>
    `;
  }
  document.querySelector("#product-grid").innerHTML = htmlTemplate;
}

function productStatus(products) {
  for (let product of products) {
    let quantity = parseInt(product.quantity);
    let produktDiv = document.querySelector(`#productId${product.id}`);
    if (quantity <= 3) {
      produktDiv.classList.add("redStatus");
    } else if (quantity > 3 && product.quantity <= 8) {
      produktDiv.classList.add("yellowStatus");
    } else {
      produktDiv.classList.add("greenStatus");
    }
  }
}

async function fetchData() {
  const response = await fetch(`/userPage/backend/products_users.php`);
  const data = await response.json();
  console.log(data);
  return data;
}

function search(value) {
  let searchQuery = value.toLowerCase();
  console.log(searchQuery);
  let filteredProducts = [];
  for (let product of _products) {
    let produktPostNr = product.postNr;
    let produktPartnerNavn = product.navn.toLowerCase();
    if (
      produktPostNr.includes(searchQuery) ||
      produktPartnerNavn.includes(searchQuery)
    ) {
      filteredProducts.push(product);
    }
  }
  appendProducts(filteredProducts);
  console.log(filteredProducts);
}

// function addNewProduct() {
//   showLoader(true);

//   let brand = document.querySelector('#brand').value;
//   let model = document.querySelector('#model').value;
//   let price = document.querySelector('#price').value;
//   let img = document.querySelector('#img').value;
//   const id = Date.now(); // dummy generated user id

//   if (brand && model && price && img) {
//     let newProduct = {
//       brand: brand,
//       model: model,
//       price: price,
//       img: img,
//       status: "inStock",
//       id: id
//     }
//     _products.push(newProduct);

//     appendProducts(_products);
//     navigateTo('#/products');
//   } else {
//     alert('Please fill out all fields');
//   }
//   showLoader(false);
// }

// function search(value) {
//   let searchQuery = value.toLowerCase();
//   let filteredProducts = [];
//   for (let product of _products) {
//     let model = product.model.toLowerCase();
//     let brand = product.brand.toLowerCase();
//     if (model.includes(searchQuery) || brand.includes(searchQuery)) {
//       filteredProducts.push(product);
//     }
//   }
//   appendProducts(filteredProducts);
// }

// // function showHideOfStock(checked) {
// //   const items = document.querySelectorAll('.outOfStock'); //grabbing all the products in the DOM
// //   for (let item of items) {
// //     if (checked) {
// //       item.style.display = "block";
// //     } else {
// //       item.style.display = "none";
// //     }
// //   }
// // }

// function showHideOfStock(checked) {
//   if (checked) {
//     appendProducts(_products);
//   } else {
//     const inStockProducts = _products.filter(product => product.status === "inStock");
//     appendProducts(inStockProducts);
//   }
// }

// function orderBy(option) {
//   if (option === "brand") {
//     orderByBrand();
//   } else if (option === "model") {
//     orderByModel();
//   } else if (option === "price") {
//     orderByPrice();
//   }
// }

// function orderByBrand() {
//   _products.sort((product1, product2) => {
//     return product1.brand.localeCompare(product2.brand);
//   });
//   appendProducts(_products);
// }

// function orderByModel() {
//   _products.sort((product1, product2) => {
//     return product1.model.localeCompare(product2.model);
//   });
//   appendProducts(_products);
// }

// function orderByPrice() {
//   _products.sort((product1, product2) => {
//     return product1.price - product2.price;
//   });
//   appendProducts(_products);
// }

// function goToEdit(id) {
//   // save id in global variable
//   _selectedProductId = id;
//   // find product to edit by using array.find and id
//   const productToEdit = _products.find(product => product.id === _selectedProductId);
//   // set input field values with the productToEdit properties
//   document.querySelector('#brandEdit').value = productToEdit.brand;
//   document.querySelector('#modelEdit').value = productToEdit.model;
//   document.querySelector('#priceEdit').value = productToEdit.price;
//   document.querySelector('#imgEdit').value = productToEdit.img;
//   //navigate to edit view
//   navigateTo("#/edit");
// }

// function saveProduct() {
//   // find index of the product to update in _products
//   let index = _products.findIndex(product => product.id === _selectedProductId);
//   // update values of user in array
//   _products[index].brand = document.querySelector('#brandEdit').value;
//   _products[index].model = document.querySelector('#modelEdit').value;
//   _products[index].price = document.querySelector('#priceEdit').value;
//   _products[index].img = document.querySelector('#imgEdit').value;
//   // update dom usind appendProducts()
//   appendProducts(_products);
//   //navigating back
//   navigateTo("#/products");
// }

// function deleteProduct(id) {
//   const deleteProduct = confirm("Would you like to delete product?");
//   if (deleteProduct) {
//     // filter _products - all products that doesnt have the id
//     _products = _products.filter(product => product.id !== id);
//     appendProducts(_products);
//   }
// }

// function showDetailView(id) {
//   const productToShow = _products.find(product => product.id === id);
//   navigateTo("#/detail-view");
//   document.querySelector("#detail-view .title").innerHTML = productToShow.model;
//   document.querySelector("#detail-view-container").innerHTML = /*html*/`
//     <img src="${productToShow.img}">
//     <article>
//       <h2>${productToShow.model}</h2>
//       <h3>${productToShow.brand}</h3>
//       <p>Price: ${productToShow.price} kr.</p>
//       <p>Status: ${productToShow.status}</p>
//       <p>ID: ${productToShow.id}</p>
//     </article>
//   `;
// }

// // ========== Loader ==========
// /**
//  * Shows or hides loader by giden parameter: true/false
//  */
// function showLoader(show) {
//   const loader = document.querySelector('#loader');
//   if (show) {
//     loader.classList.remove("hide");
//   } else {
//     loader.classList.add("hide");
//   }
// }