const listImage = document.querySelector('.list-imgs');
const imgs = document.querySelectorAll(".slide_show .list-imgs .list-img img");
const dot = document.querySelectorAll(".list-dot .dot");
const next = document.querySelector(".next");
const back = document.querySelector(".back");
let length = imgs.length -1 ;
console.log(dot.length)
let current = 0;

console.log(listImage.offsetWidth);

 var clear = setInterval( () => {
    if(current === length){
        current = 0;
    }else{
        current++;
    }
    let width = imgs[0].offsetWidth;
    listImage.style.transform = `translateX(${width *-1 * current}px)`;

    dot.forEach((dotItem, index) => {
        if (index === current) {
            dotItem.style.backgroundColor = "black";
        } else {
            dotItem.style.backgroundColor = " rgba(0, 0, 0, 0)";
        }
    });
}, 3500);

next.addEventListener("click", () => {
    if (current === length) {
        current = 0;
        let width = imgs[0].offsetWidth;
        listImage.style.transform = `translateX(${width * current}px)`;
    } else {
        current = current + 1;
        let width = imgs[0].offsetWidth;
        listImage.style.transform = `translateX(${width * -1 * current}px)`;
    }
    
    // Đặt màu nền của các điểm chỉ số dựa trên chỉ số hiện tại
    dot.forEach((dotItem, index) => {
        if (index === current) {
            dotItem.style.backgroundColor = "black";
        } else {
            dotItem.style.backgroundColor = " rgba(0, 0, 0, 0)";
        }
    });
    clearInterval(clear);
})

back.addEventListener("click", () => {
    if (current === 0) {
        current = length;
        let width = imgs[0].offsetWidth;
        listImage.style.transform = `translateX(${width * -1 * current}px)`;
    } else {
        current = current - 1;
        let width = imgs[0].offsetWidth;
        listImage.style.transform = `translateX(${width * -1 * current}px)`;
    }
    
    // Đặt màu nền của các điểm chỉ số dựa trên chỉ số hiện tại
    dot.forEach((dotItem, index) => {
        if (index === current) {
            dotItem.style.backgroundColor = "white";
        } else {
            dotItem.style.backgroundColor = " rgba(0, 0, 0, 0)";
        }
    });
    clearInterval(clear);
})
