
document.addEventListener("DOMContentLoaded", function() {
    var quantityInput = document.getElementById('productQuantity');
    var addToCartBtn = document.getElementById('addToCartBtn');
    addToCartBtn.addEventListener('click', function() {
        var quantity = quantityInput.value;
        addToCartBtn.href = addToCartBtn.href + quantity;
    });
});
document.getElementById('increase').addEventListener('click', function () {
    increaseQuantity();
});

document.getElementById('decrease').addEventListener('click', function () {
    decreaseQuantity();
});
function increaseQuantity() {
    var quantityInput = document.getElementById('productQuantity');
    var currentQuantity = parseInt(quantityInput.value, 10);
    quantityInput.value = currentQuantity + 1;
}
function decreaseQuantity() {
    var quantityInput = document.getElementById('productQuantity');
    var currentQuantity = parseInt(quantityInput.value, 10);
    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }
}