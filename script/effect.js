
window.addEventListener("scroll", () => {
    const footer = document.getElementById("footer");
    const scrollPosition = window.scrollY + window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;
  
    if (scrollPosition >= documentHeight) {
      footer.style.bottom = "0"; // Hiện footer
    } else {
      footer.style.bottom = "-100px"; // Ẩn footer
    }
  });


  const header = document.getElementById("header");
  let lastScroll = 0; // Lưu vị trí cuộn trước đó
  
  window.addEventListener("scroll", () => {
    const currentScroll = window.scrollY;
  
    if (currentScroll > lastScroll && currentScroll > 50) {
      // Cuộn xuống và vượt qua 50px
      header.classList.add("hidden");
    } else {
      // Cuộn lên hoặc trở về đầu trang
      header.classList.remove("hidden");
    }
  
    lastScroll = currentScroll; // Cập nhật vị trí cuộn
  });