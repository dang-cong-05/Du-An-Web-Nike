function filterProducts() {
    // Lấy tất cả các bộ lọc đã chọn
    const selectedFilters = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.dataset.filter);

    products.forEach(product => {
        const productCategories = product.dataset.category.split(" ");
        // Nếu không có bộ lọc nào được chọn, hiển thị tất cả sản phẩm
        const isVisible = selectedFilters.length === 0 || selectedFilters.every(filter => productCategories.includes(filter));
        product.style.display = isVisible ? "block" : "none";
    });
}
const searchInput = document.querySelector(".search-input");
searchInput.addEventListener("input", () => {
    const searchValue = searchInput.value.toLowerCase();
    products.forEach(product => {
        const productName = product.querySelector("h2").textContent.toLowerCase();
        product.style.display = productName.includes(searchValue) ? "block" : "none";
    });
});
