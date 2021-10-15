const header_image =document.querySelectorAll(".header_image")[0];
const header = document.querySelectorAll(".header")[0];

window.addEventListener("scroll",()=>{
	header_image.style.top = (header.offsetHeight/2) + (window.pageYOffset * 1) +"px";
})