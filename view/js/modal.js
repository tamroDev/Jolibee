const container = document.querySelectorAll(".order");
const modalContainer = document.querySelector(".modal-container");
const modal = document.querySelector(".modal");
const outModal =modalContainer.querySelector(".outModal");
const cancelModal =modalContainer.querySelector(".cancelModal");
container.forEach((item) => {
const statusOD = item.querySelector(".statusOD");
const cancel =item.querySelector(".cancel")
const statusTrim =statusOD.textContent;
if(statusTrim.trim() == 'Đang giao') {
    cancel.classList.add("noCancel");
    cancel.setAttribute("href","#");
    cancel.addEventListener("click", () => {
        modalContainer.classList.toggle("is-show");

        outModal.addEventListener("click",() => {
            modalContainer.classList.remove("is-show");
        })

        cancelModal.addEventListener("click", () => {
            modalContainer.classList.remove("is-show")
        })
    })
}
})

document.addEventListener("click" , function (e){
if(modalContainer.contains(e.target) && !modal.contains(e.target)) {
    modalContainer.classList.remove("is-show");
}
})
{/* <div class="modal-container">
    <div class="modal">
        <div class="title-modal">
            Chú Ý
        </div>
        <div class="content-modal">
            Khi đơn hàng đang ở trạng thái "<h2>GIAO HÀNG</h2>" bạn không thể hủy đơn hàng.
            <h3>Xin cảm ơn.</h3>
        </div>
        <div class="action-modal">
            <a href="index.php?act=lienhe">Liên Hệ Người Bán</a>
            <a class="cancelModal" href="#">Hủy</a>
        </div>
        <div class="outModal">
            x
        </div>
    </div>
</div> */}

const statusOrder =document.querySelectorAll("tr td:nth-child(5)")

statusOrder.forEach( function (item) {
    if(item.textContent == "Hoàn Thành") {
        item.style.color = "green";
    }
    if(item.textContent == "Đang giao") {
        item.style.color = "#ffc522";
    }
    if(item.textContent == "Hoàn Thành") {
        item.style.color = "green";
    }
    if(item.textContent == "Đang chờ") {
        item.style.color = "red";
    }
});