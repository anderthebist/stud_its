
const abitVideoItems = document.querySelectorAll(".abit_video_item");
const playVideo = document.querySelectorAll(".play_video")[0];
let activeElem = 0;

abitVideoItems.forEach((elem,index) =>{
    elem.addEventListener("click",() => {
        if(!elem.classList.contains("abit_video_item-active") && elem.dataset.video){
            abitVideoItems[activeElem].classList.remove("abit_video_item-active");
            elem.classList.add("abit_video_item-active");
            activeElem = index;
            playVideo.src = elem.dataset.video;
        }
    })
})