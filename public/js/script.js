
updateClass = function updateClass(object,removeClass,addClass) {
	object.classList.remove(removeClass)
	object.classList.add(addClass)
}

const linksScroll = document.querySelectorAll('a[href*="#"]');

linksScroll.forEach((elem) => {
    elem.addEventListener('click', (event) => {
        event.preventDefault()
        
        document.getElementById(elem.getAttribute('href').substr(1)).scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        })
    })
})

const scrollToAnimate = document.querySelectorAll(".animate_scroll");

Element.prototype.offsetScroll = function() {
  const rect = this.getBoundingClientRect(),
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  
  return {
    top: rect.top + scrollTop,
    left: rect.left + scrollLeft
  }
}

window.addEventListener("scroll", animateElementsToScroll);
animateElementsToScroll()


function animateElementsToScroll(){
  scrollToAnimate.forEach((elem,index) => {
    const offsetHeight = elem.offsetHeight;
    const elemOffset = elem.offsetScroll().top;
    const animStart = 3;

    const elemPoint = window.innerHeight - (offsetHeight > window.innerHeight ? window.innerHeight : offsetHeight) / animStart;
    if((pageYOffset > elemOffset - elemPoint) && pageYOffset < (elemOffset + offsetHeight)){
      elem.classList.add("animate_scroll-active");
    }else{
      !elem.classList.contains("animate_scroll_no_hide") && elem.classList.remove("animate_scroll-active");
    }
  })
}

const collapse_controler = [...document.getElementsByClassName("collapse_control")];

if(collapse_controler){
  collapse_controler.forEach((elem,index) => {
    const collapse = document.querySelector(elem.dataset.collapse);
    elem.addEventListener("click",()=>{
      if(collapse.classList.contains("collapse_hide"))
        updateClass(collapse,"collapse_hide","collapse_show")
      else
        updateClass(collapse,"collapse_show","collapse_hide")
        document.querySelector(elem.dataset.collapseTarget).classList.toggle("active");
    })
  })

}

