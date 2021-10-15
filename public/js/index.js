setTimeout(() => {
	document.body.style.overflowY = "scroll";
},2000)

new Swiper(".stud_curators", {
	lazy: true,
	lazy:{
        loadOnTransitionStart: true,
        loadPrevNext: true
    },
	speed:500,
	effect: "coverflow",
	grabCursor: true,
	watchOverflow: true,
    watchSlidesVisibility: true,
	slidesPerView: 3,
    spaceBetween: 30,
	//centeredSlides: true,
	coverflowEffect: {
	  rotate: 0,
	  stretch: -10,
	  depth: 100,
	  modifier: 1,
	  slideShadows: true,
	},
	navigation: {
        nextEl: '.slider_of_stud .arrows.right',
        prevEl: '.slider_of_stud .arrows.left'
    },
	breakpoints : {
		770 : {
			slidesPerView:3,
			centeredSlides: false
		},
		460:{
			slidesPerView:2,
			centeredSlides: true
		},
		0:{
			slidesPerView:1
		}
	}
  });
