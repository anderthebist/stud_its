
const mediaSlider = document.querySelectorAll(".media_slider");

mediaSlider.forEach((elem,index) => {
    new Swiper("#media_slider"+index,{
        lazy:true,
        speed:500,
        calculateHeight:true,
        watchOverflow: true,
        watchSlidesVisibility: true,
        slidesPerView: 1,
         pagination: {
            el: '#pagin_slide'+index,
            clickable: true,
            renderBullet: function (index, className) {
                return `<div class="news_dot swiper-pagination-bullet"></div>`;
            },
        },
    })
})