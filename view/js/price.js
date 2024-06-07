// Lấy tất cả các phần tử .priceDot span
const priceElements = document.querySelectorAll(".priceDot span");

// Lặp qua từng phần tử và định dạng giá trị
priceElements.forEach((priceElement) => {
    // Lấy giá trị số từ nội dung của span
    const price = parseFloat(priceElement.textContent);

    // Làm tròn số và định dạng
    const roundedPrice = Math.round(price); // Làm tròn số

    // Định dạng theo ngôn ngữ Việt Nam với chữ số hàng ngàn
    const formattedPrice = roundedPrice.toLocaleString('vi-VN', { minimumFractionDigits: 0 });
    const textPrice = formattedPrice + " ₫";

    // Gán lại giá trị đã định dạng vào nội dung của span
    priceElement.textContent = textPrice;
});
