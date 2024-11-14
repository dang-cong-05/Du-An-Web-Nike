function updateQuantity(button, change) {
    const quantityInput = button.parentElement.querySelector(".quantity");
    let quantity = parseInt(quantityInput.value) + change;
    quantity = quantity < 1 ? 1 : quantity;
    quantityInput.value = quantity;
    updateTotal(quantityInput);
    updateTotalItems(); // Cập nhật tổng số sản phẩm sau khi thay đổi số lượng
}

function updateTotal(input) {
    const row = input.closest("tr");
    const price = parseInt(row.querySelector(".price").textContent);
    const quantity = parseInt(input.value);
    const total = price * quantity;
    row.querySelector(".product-total").textContent = total.toLocaleString() + "đ";
    updateGrandTotal();
}

function updateGrandTotal() {
    const totals = document.querySelectorAll(".product-total");
    let grandTotal = 0;
    totals.forEach((total) => {
        grandTotal += parseInt(total.textContent.replace("đ", "").replace(/,/g, ""), 10);
    });
    document.getElementById("grand-total").textContent = "Tổng Cộng: " + grandTotal.toLocaleString() + "đ";
}

function removeProduct(button) {
    const row = button.closest("tr");
    row.remove();
    updateGrandTotal();
    updateTotalItems(); 
}
function updateTotalItems() {
    const quantities = document.querySelectorAll(".quantity");
    let totalItems = 0;
    quantities.forEach((input) => {
        totalItems += parseInt(input.value, 10);
    });
    document.getElementById("total-items").textContent = totalItems; // Cập nhật số sản phẩm tổng
}

// Khởi tạo số tổng sản phẩm và tổng giá trị lúc đầu
document.querySelectorAll(".quantity").forEach((input) => updateTotal(input));
updateTotalItems();
