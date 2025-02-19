let cartCount = 0;
let cartItems = [];

function updateCartCount() {
  const cartCountElement = document.getElementById("cart-count");
  if (cartCountElement) {
    cartCountElement.textContent = cartCount;
  }
}

function addToCart(productName, productPrice) {
  cartItems.push({ name: productName, price: productPrice });
  cartCount++;
  updateCartCount();

  localStorage.setItem("cartItems", JSON.stringify(cartItems));
  localStorage.setItem("cartCount", cartCount);
}

function removeFromCart(index) {
  cartItems.splice(index, 1);
  cartCount--;
  updateCartCount();

  localStorage.setItem("cartItems", JSON.stringify(cartItems));
  localStorage.setItem("cartCount", cartCount);

  viewCart();
}

function viewCart() {
  const cartSection = document.getElementById("cart");
  const cartItemsList = document.getElementById("cart-items-list");
  const cartTotal = document.getElementById("cart-total");

  cartItemsList.innerHTML = "";
  let total = 0;

  cartItems.forEach((item, index) => {
    const listItem = document.createElement("li");
    listItem.textContent = `${item.name} - Rp${item.price.toLocaleString(
      "id-ID"
    )}`;

    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.onclick = function () {
      removeFromCart(index);
    };

    listItem.appendChild(removeButton);
    cartItemsList.appendChild(listItem);

    total += item.price;
  });

  cartTotal.textContent = `Total: Rp${total.toLocaleString("id-ID")}`;
  cartSection.style.display = "block";
}

function handleMainPage() {
  const storedCartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
  cartItems = storedCartItems;
  cartCount = storedCartItems.length;
  updateCartCount();

  const addToCartButtons = document.querySelectorAll(".btn");
  addToCartButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const productName =
        this.closest(".product-card").querySelector("h3").textContent;
      const productPrice = parseInt(
        this.closest(".product-card")
          .querySelector(".price")
          .textContent.replace("Rp", "")
          .replace(".", "")
      );
      addToCart(productName, productPrice);
    });
  });

  const viewCartButton = document.querySelector(".view-cart-btn");
  if (viewCartButton) {
    viewCartButton.addEventListener("click", function () {
      window.location.href = "cartpages.html";
    });
  }
}

function handleCartPage() {
  const storedCartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
  cartItems = storedCartItems;
  cartCount = storedCartItems.length;
  updateCartCount();
  viewCart();
}

document.addEventListener("DOMContentLoaded", function () {
  if (window.location.pathname.includes("cartpages.html")) {
    handleCartPage();
  } else {
    handleMainPage();
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".slide");
  const carouselSlides = document.querySelector(".carousel-slides");
  const prevButton = document.getElementById("prev-slide");
  const nextButton = document.getElementById("next-slide");

  let currentIndex = 0;
  const totalSlides = slides.length;

  function updateSlidePosition() {
    const offset = -currentIndex * 100;
    carouselSlides.style.transform = `translateX(${offset}%)`;
  }

  function showNextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlidePosition();
  }

  function showPrevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateSlidePosition();
  }

  nextButton.addEventListener("click", showNextSlide);
  prevButton.addEventListener("click", showPrevSlide);

  setInterval(showNextSlide, 5000);
});
