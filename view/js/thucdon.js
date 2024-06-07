    window.addEventListener("scroll",() => {
        var scrollY = window.scrollY;
        const header =document.querySelector("#header");
        const menuFixed =document.querySelector(".MenuFixed");
        const menuFixedItem =document.querySelector(".menuFixed-list-item");
        const mainContent =document.querySelector(".mainContent");

        const total = header.offsetHeight;

        if(scrollY > total) {
            menuFixedItem.style.width = "100%"
            menuFixedItem.style.backgroundColor = "#fff"
            menuFixedItem.style.boxShadow = "0 10px 10px #2f2d2d6f"
            menuFixedItem.style.borderRadius = "0px"
            menuFixed.style.position = "fixed";
            menuFixed.style.zIndex = "10";
            menuFixed.style.top = "0";
            menuFixed.style.left = "0";
            menuFixed.style.right = "0";
            mainContent.style.marginTop = "175px"
        }else {
            menuFixed.style.position = "";
            menuFixed.style.top = "";
            menuFixed.style.left = "";
            menuFixed.style.right = "";
            menuFixedItem.style.width = "80%"
            menuFixedItem.style.backgroundColor = "#f4d2d6"
            menuFixedItem.style.boxShadow = ""
            menuFixedItem.style.borderRadius = "0 0 40px 40px"
            mainContent.style.marginTop = "0px"
        }
        
        
    })
    const cartOpenFocus = document.querySelector(".cartOpen")
    const icon = document.querySelector(".cartOpen i")
    const span = document.querySelector(".cartOpen span")

    cartOpenFocus.addEventListener("click", (e) => {
    // Kiểm tra xem e.target có phải là phần tử <i> hoặc <span> hay không
    if (e.target === icon ) {
        e.stopPropagation();
    }

    if (e.target === span) {
        e.stopPropagation();
    }
});
    const cartOpen = document.querySelector(".cartOpen")
    const cartContainer = document.querySelector(".cartContainer")
    const iconClose =document.querySelector(".close-icon-absolute");
    const cartFL = document.querySelector(".cart-follower")
    
    
    cartOpen.addEventListener("click", (e) => {
        cartContainer.classList.toggle("active")
        cartOpen.style.display = "none";
    })


    iconClose.addEventListener("click" , () => {
        cartContainer.classList.remove("active")
        cartOpen.style.display = "flex";
    })

    window.addEventListener("scroll",function () {
        var scrollY = window.scrollY;
        var totalHeight = 1250;

        
        if(scrollY > totalHeight ) {
            cartOpen.style.position = "absolute"
            cartOpen.style.bottom = "0"
            cartOpen.style.right = "0"
            cartContainer.style.position = "absolute"
            cartContainer.style.bottom = "0"
            cartContainer.style.right = "0"
            cartFL.style.position = "absolute"
            cartFL.style.bottom = "20px"
            cartFL.style.left = "5%"
        }else {
            cartOpen.style.position = "fixed"
            cartOpen.style.bottom = "0"
            cartOpen.style.right = "0"
            cartContainer.style.position = "fixed"
            cartContainer.style.bottom = "0"
            cartContainer.style.right = "0"
            cartContainer.style.zIndex = "9"
            cartFL.style.position = "fixed"
            cartFL.style.bottom = "20px"
            cartFL.style.left = "5%"
            cartFL.style.zIndex = "9"

        }
    })

    const items = document.querySelectorAll(".quantity");
    const totalCart = document.querySelector(".btn-payAction h1 span");
    let totalCartPrice = 0;
    let cartProducts;

    // Lấy giá trị cho biến cartProducts (đảm bảo giá trị này có từ trước)
    cartProducts = document.querySelectorAll(".cart-item");

    items.forEach((item) => {
        const minus = item.querySelector(".minus");
        const plus = item.querySelector(".plus");
        const total = item.querySelector(".total");
        let totalOld =parseInt(total.value);
        let totalElement = totalOld;

        plus.addEventListener("click", () => {
            totalElement = totalElement + 1;
            total.value = totalElement;
            updateTotalCartPrice();
        });

        minus.addEventListener("click", () => {
            if (totalElement > 1) {
                totalElement = totalElement - 1;
                total.value = totalElement;
                updateTotalCartPrice();
            }
        });
    });

    function updateTotalCartPrice() {
        totalCartPrice = 0;

        // Kiểm tra nếu cartProducts đã được định nghĩa và có giá trị
        if (cartProducts && cartProducts.length > 0) {
            cartProducts.forEach((item) => {
                const priceElement = item.querySelector(".content-item span");
                const quantityElement = item.querySelector(".quantity .total");
                
                // Lấy giá và số lượng từ các phần tử
                const price = parseInt(priceElement.textContent);
                const quantity = parseInt(quantityElement.value);

                // Tính giá mới cho từng item
                const newPrice = price * quantity;

                // Thêm vào tổng giá của giỏ hàng
                totalCartPrice += newPrice;
            });
        }
        const priceItem = parseInt(totalCartPrice) * 1000;
        const formattedPrice = priceItem.toLocaleString('vi-VN', { minimumFractionDigits: 0 });
        const textPrice = formattedPrice + " ₫";


        // Cập nhật nội dung của phần tử hiển thị tổng giá
        totalCart.textContent = textPrice;
        const updatePrice =document.querySelector(".updatePrice");
        updatePrice.textContent = textPrice;
    }
