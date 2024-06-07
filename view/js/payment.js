let currentCheckbox = null;
const accordionHeader = document.querySelectorAll(".accordion-header");
const active = "is-active";

[...accordionHeader].forEach(item => item.addEventListener("click", handleClick));
function handleClick (e) {
    const content = e.target.nextElementSibling;
    content.classList.toggle(active)
    content.style.height = `${content.scrollHeight}px`;
    if(!content.classList.contains("is-active")){
        content.style.height = "0px";
    }
    

    const icon = e.target.querySelector(".icon");
    icon.classList.toggle("fa-angle-down");
    icon.classList.toggle("fa-angle-up");
}

function toggleCheckbox(checkboxId) {
    const clickedCheckbox = document.getElementById(checkboxId);

    // Nếu có checkbox trước đó và khác với checkbox hiện tại, tắt nó
    if (currentCheckbox && currentCheckbox !== clickedCheckbox) {
        currentCheckbox.checked = false;
    }

    // Lưu trữ checkbox hiện tại
    currentCheckbox = clickedCheckbox;
}

accordionHeader.forEach(item => {
    item.addEventListener("click", () => {
        const round = item.querySelector(".round input");
        // Đảo ngược trạng thái của checkbox khi click
        round.checked = !round.checked;
        // Thực hiện các hành động khác tùy thuộc vào trạng thái checkbox
        if (round.checked) {
            // Checkbox đã được tích
            console.log("Checkbox đã được tích");
            // Thêm các hành động khác nếu cần
        } else {
            // Checkbox không được tích
            console.log("Checkbox không được tích");
            // Thêm các hành động khác nếu cần
        }
    });
});