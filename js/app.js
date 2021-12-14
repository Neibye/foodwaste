let _products = [];

async function initApp(value) {
  _products = await fetchData(value);
  appendProducts(_products);
}

function appendProducts(products) {
  let htmlTemplate = "";
  for (let product of products) {
    htmlTemplate += /*html*/ `
      <article class="product">
        <div class="product_content flex spaceBtwn">
            <p>${product.foodName}</p>
            <p>Pris: ${product.newPrice}</p>
        </div>
        <div class="product_btns flex spaceBtwn">
            <a class="editBtn" href="#/edit" onclick="goToEdit(${product.id})">Rediger</a>
            <a class="deleteBtn" href="backend/deleteProdukt.php?product=${product.id}">Fjern</a>
            <!-- href="#/edit?product=${product.id}" -->
        </div>
      </article>
    `;
  }
  document.querySelector("#product-grid").innerHTML = htmlTemplate;
}

async function fetchData(value) {
  const response = await fetch(
    `/backend/products_backend.php?partnerId=${value}`
  );
  const data = await response.json();
  console.log(data);
  return data;
}

function search(value) {
  let searchQuery = value.toLowerCase();
  console.log(searchQuery);
  let filteredProducts = [];
  for (let product of _products) {
    let produktNavn = product.foodName.toLowerCase();
    if (produktNavn.includes(searchQuery)) {
      filteredProducts.push(product);
    }
  }
  appendProducts(filteredProducts);
}

function goToEdit(value) {
  let updateForm = document.querySelector(".updateForm");
  updateForm.action = `/backend/updateProdukt.php?product=${value}`;
}
