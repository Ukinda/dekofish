// Get the modals
var loginModal = document.getElementById("loginModal");
var addProductModal = document.getElementById("addProductModal");

// Get the buttons that open the modals
var loginBtn = document.getElementById("loginBtn");
var addProductBtn = document.getElementById("addProductBtn");

// Get the <span> elements that close the modals
var closeLogin = document.getElementById("closeLogin");
var closeAddProduct = document.getElementById("closeAddProduct");

// When the user clicks the button, open the respective modal
loginBtn.onclick = function () {
  loginModal.style.display = "block";
};

addProductBtn.onclick = function () {
  addProductModal.style.display = "block";
};

// When the user clicks on <span> (x), close the respective modal
closeLogin.onclick = function () {
  loginModal.style.display = "none";
};

closeAddProduct.onclick = function () {
  addProductModal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == loginModal) {
    loginModal.style.display = "none";
  }
  if (event.target == addProductModal) {
    addProductModal.style.display = "none";
  }
};
