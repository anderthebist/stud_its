
const studInfoContent = document.querySelectorAll('.stud_info_content');

if(screen.width < 470){
    studInfoContent.forEach((elem) => {
        elem.classList.remove("collapse_show");
        elem.classList.add("collapse_hide");
    })
}