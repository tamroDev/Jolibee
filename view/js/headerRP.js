const loginForm = document.querySelector(".login-container");
const openLogin = document.querySelectorAll(".openLogin");
const closeIcon =document.querySelector(".icon-close");


if(openLogin) {
    openLogin.forEach(item => {
         item.addEventListener("click", (e) => {
            e.preventDefault();
            loginForm.classList.toggle("activeLogin")
        })
    
        closeIcon.addEventListener("click",() => {
            loginForm.classList.remove("activeLogin");
        })

    })

}

const iconMenu = document.querySelector(".menu-toggle");
const menu = document.querySelector(".menu-item-rp");

iconMenu.addEventListener("click",handleClickMenu);
function handleClickMenu (e) {
    e.target.classList.toggle("fa-bars");
    e.target.classList.toggle("fa-times");
    menu.classList.toggle("is-show");
}

document.addEventListener("click" , function (e){
    if(!menu.contains(e.target) && !e.target.matches(".menu-toggle")) {
        menu.classList.remove("is-show");
        iconMenu.classList.add("fa-bars");
        iconMenu.classList.remove("fa-times");
    }
})


const userIcon = document.querySelector(".user-toggle");
const menu2 = document.querySelector(".user-item-rp");
 console.log(userIcon,menu2);

userIcon.addEventListener("click",handleClickMenu2);
function handleClickMenu2 (e) {
    e.target.classList.toggle("fa-user");
    e.target.classList.toggle("fa-times");
    menu2.classList.toggle("is-show");
}

document.addEventListener("click" , function (e){
    if(!menu2.contains(e.target) && !e.target.matches(".user-toggle")) {
        menu2.classList.remove("is-show");
        userIcon.classList.add("fa-user");
        userIcon.classList.remove("fa-times");
    }
})