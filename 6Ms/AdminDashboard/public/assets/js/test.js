// OPEN & CLOSE CART
const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const closeCart = document.querySelector("#cart-close");
cartIcon.addEventListener("click", () => {
    cart.classList.add("active");
  });
  
  closeCart.addEventListener("click", () => {
    cart.classList.remove("active");
  });
 let card= []; // Initialize the itemsAdded array

  // Start when the document is ready
if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", start);
  } else {
    start();
  }

  function start() {
    // Load cart items from localStorage
    loadCartFromStorage();
    addEvents();
  
    // Reset the quantity values to 1 when leaving the page
    window.addEventListener("beforeunload", function(event) {
      const cartQuantity_inputs = document.querySelectorAll(".cart-quantity");
      cartQuantity_inputs.forEach((input) => {
        input.value = 1;
      });
    });
}

  
function update() {
    addEvents();
    updateTotal();
  }
  function handle_sizeChange() {
    let index = Array.from(this.parentElement.parentElement.children).indexOf(this.parentElement);
    itemsAdded[index].size = this.value;
    saveCartToStorage();
  }
  // =============== ADD EVENTS ===============
  function addEvents() {
    // Remove items from cart
    let cartRemove_btns = document.querySelectorAll(".cart-remove");
    console.log(cartRemove_btns);
    cartRemove_btns.forEach((btn) => {
      btn.addEventListener("click", handle_removeCartItem);
    });

    // Change item quantity
  let cartQuantity_inputs = document.querySelectorAll(".cart-quantity");
  cartQuantity_inputs.forEach((input) => {
    input.addEventListener("change", handle_changeItemQuantity);
  });

  // Add item to cart
  let addCart_btns = document.querySelectorAll(".add-cart");
  addCart_btns.forEach((btn) => {
    btn.addEventListener("click", handle_addCartItem);
  });
  // Size change event
  let cartSize_selects = document.querySelectorAll(".cart-size");
  cartSize_selects.forEach((select) => {
    select.addEventListener("change", handle_sizeChange);
  });

  // Buy Order
  const buy_btn = document.querySelector(".btn-buy");
  buy_btn.addEventListener("click", handle_buyOrder);
}
// ============= HANDLE EVENTS FUNCTIONS =============
let itemsAdded = [];

function handle_addCartItem() {
  let product = this.parentElement;
  let title = product.querySelector(".product-title").innerHTML;
  let price = product.querySelector(".product-price").innerHTML;
  let imgSrc = product.querySelector(".product-img").src;

  let newToAdd = {
    title,
    price,
    imgSrc,
    size: null, // Initialize size as null
    quantity: 1, // Set quantity to 1
  };

  // handle item is already exist
  if (itemsAdded.find((el) => el.title == newToAdd.title)) {
    alert("This Item Is Already Exist!");
    return;
  } else {
    itemsAdded.push(newToAdd);
  }

  // Update the cart count in the span element
  const cartCountSpan = document.querySelector("span");
  cartCountSpan.textContent = itemsAdded.length;

  // Add product to cart
  let cartBoxElement = CartBoxComponent(title, price, imgSrc);
  let newNode = document.createElement("div");
  newNode.innerHTML = cartBoxElement;
  const cartContent = cart.querySelector(".cart-content");
  cartContent.appendChild(newNode);

  saveCartToStorage();
  update();
}

function handle_removeCartItem() {
  this.parentElement.remove();
  itemsAdded = itemsAdded.filter(
    (el) =>
      el.title !=
      this.parentElement.querySelector(".cart-product-title").innerHTML
  );
  const cartCountSpan = document.querySelector("span");
  cartCountSpan.textContent = itemsAdded.length;
  saveCartToStorage();

  update();
}
function loadCartFromStorage() {
  let storedItems = localStorage.getItem("cartItems");

  if (storedItems) {
    itemsAdded = JSON.parse(storedItems);

    // Reset the quantity value to 1 for each item
    itemsAdded.forEach((item) => {
      item.quantity = 1;
    });

    // Update the cart count in the span element
    const cartCountSpan = document.querySelector("span");
    cartCountSpan.textContent = itemsAdded.length;

    // Render cart items
    renderCartItems();
  }
}



function saveCartToStorage() {
  localStorage.setItem("cartItems", JSON.stringify(itemsAdded));
}

function renderCartItems() {
  const cartContent = document.querySelector(".cart-content");
  cartContent.innerHTML = "";

  itemsAdded.forEach((item) => {
    let cartBoxElement = CartBoxComponent(
      item.title,
      item.price,
      item.imgSrc,
      item.size,
      1 // Set quantity to 1
    );
    let newNode = document.createElement("div");
    newNode.innerHTML = cartBoxElement;
    cartContent.appendChild(newNode);
  });

  updateTotal();
}


function handle_changeItemQuantity() {
  if (isNaN(this.value) || this.value < 1) {
    this.value = 1;
  }
  this.value = Math.floor(this.value); // to keep it integer

  update();
}
function handle_buyOrder() {
    if (itemsAdded.length <= 0) {
      alert("There is No Order to Place Yet! \nPlease Make an Order first.");
      return;
    }
    const cartContent = cart.querySelector(".cart-content");
    cartContent.innerHTML = "";
    alert("Your Order is Placed Successfully :)");
    itemsAdded = [];
    const cartCountSpan = document.querySelector("span");
    cartCountSpan.textContent = itemsAdded.length;
     saveCartToStorage();
  
    update();
  }
  // =========== UPDATE & RERENDER FUNCTIONS =========
  function updateTotal() {
    let cartBoxes = document.querySelectorAll(".cart-box");
    const totalElement = cart.querySelector(".total-price");
    let total = 0;
    cartBoxes.forEach((cartBox) => {
      let priceElement = cartBox.querySelector(".cart-price");
      let price = parseFloat(priceElement.innerHTML.replace("$", ""));
      let quantity = cartBox.querySelector(".cart-quantity").value;
      total += price * quantity;
    });
  
    // keep 2 digits after the decimal point
    total = total.toFixed(2);
    // or you can use also
    // total = Math.round(total * 100) / 100;
  
    totalElement.innerHTML = "$" + total;
  }
  
  // ============= HTML COMPONENTS =============
  function CartBoxComponent(title, price, imgSrc, size, quantity) {
    let sizeOptions = "";
    let sizeSelection = "";
    let labelSize = ""; // Added a variable to handle label-size visibility
  
    // Check if the title is "cotton" or "wool"
    if (title.toLowerCase() === "cotton" || title.toLowerCase() === "wool") {
        // Don't show the size selection and options
        sizeSelection = "";
        sizeOptions = "";
        labelSize = ""; // Don't show label-size
    } else {
        // Show the size selection and options
        sizeSelection = `
            <select class="cart-size">
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
            </select>
        `;
        sizeOptions = sizeSelection;
        labelSize = '<label class="label-size">Size: </label>'; // Show label-size
    }
  
    return `
        <div class="cart-box">
            <img src=${imgSrc} alt="" class="cart-img">
            <div class="detail-box">
                <div class="cart-product-title">${title}</div>
                <div class="cart-price">${price}</div>
                <input type="number" value="1" class="cart-quantity">
                ${labelSize} <!-- Conditional inclusion of label-size -->
                ${sizeOptions}
            </div>
            <!-- REMOVE CART  -->
            <a class="cart-remove"><i class="fa-solid fa-trash"></i></a>
        </div>`;
}
