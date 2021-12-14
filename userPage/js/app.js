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
