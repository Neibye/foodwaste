// let _products = [];

// const _baseUrl = "https://api.jsonbin.io/v3/b/61a884bd01558c731cccae4e";
// const _headers = {
//   "X-Master-Key":
//     "$2b$10$FRFUWTy9PcyES8o1eHAakuUZYiOoBRFcC769QBuKIiAF4kbZp28TW",
//   "Content-Type": "application/json",
// };

// async function loadProducts() {
//   const url = _baseUrl + "/latest";
//   const response = await fetch(url, {
//     headers: _headers,
//   });
//   const data = await response.json();
//   console.log(data);
//   _products = data.record;
//   appendProducts(_products);
// }
// loadProducts();

// function appendProducts(products) {
//   let htmlTemplate = "";
//   for (let product of products) {
//     htmlTemplate += /*html*/ `
//         <article class="tools-grid">
//             <div class="container">
//                 <div class="nameBox"><p>${product.name}</p><p>${product.newPrice}</p></div>
//                 <div class="editBox">Rediger</div>
//                 <div class="deleteBox">Fjern</div>
//             </div>
//         </article>
//         `;
//   }
//   document.querySelector("#product-grid").innerHTML = htmlTemplate;
// }

// let _newProducts = [];

// async function createProduct(
//   partnerId,
//   foodName,
//   foodGroup,
//   quantity,
//   expDate,
//   oldPrice,
//   newPrice
// ) {
//   let partnerIdInput = partnerId;
//   let foodNameInput = foodName;
//   let foodGroupInput = foodGroup;
//   let quantityInput = quantity;
//   let expDateInput = expDate;
//   let oldPriceInput = oldPrice;
//   let newPriceInput = newPrice;

//   const newProduct = {
//     partnerId: partnerIdInput.value,
//     foodName: foodNameInput.value,
//     foodGroup: foodGroupInput.value,
//     quantity: quantityInput.value,
//     expDate: expDateInput.value,
//     oldPrice: oldPriceInput.value,
//     newPrice: newPriceInput.value,
//   };

//   _newProducts.push(newProduct);

//   await updateJSONBIN(_newProducts);
// }

// async function updateJSONBIN(products) {
//   const response = await fetch(_baseUrl, {
//     method: "PUT",
//     header: _headers,
//     body: JSON.stringify(products),
//   });

//   const result = await response.json();

//   appendProducts(result);
// }
