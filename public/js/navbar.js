const navbar = document.querySelector("#navbar");
const menu_button = document.querySelectorAll(".menu_button")[0];
const aside = document.querySelector("#aside");
const model = document.querySelectorAll(".model_place")[0];

menu_button.addEventListener("click",()=>{
	if(aside.classList.contains("aside_active")){
		updateClass(aside,"aside_active","aside_hide");
		navbar.style.opacity = "1"
		updateClass(model,"modal_show","modal_hide")
	}else {
		updateClass(aside,"aside_hide","aside_active");
		navbar.style.opacity = "0"
		updateClass(model,"modal_hide","modal_show")
	}
})


const closeBar = () => {
	updateClass(aside,"aside_active","aside_hide");
	updateClass(model,"modal_show","modal_hide")
	navbar.style.opacity = "1"
	menu_button.classList.remove("active");
}

model.addEventListener("click",closeBar)
const collapseItem = document.querySelectorAll(".collapse_item");
collapseItem.forEach((elem) => { elem.addEventListener("click",closeBar) })

menu_button.addEventListener("click",()=>{
	menu_button.classList.toggle("active");
})

