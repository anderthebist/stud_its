
new Swiper(".open_galery",{
    speed:500,
    slidesPerView: 1,
    pagination: {
        el: '.pagin_slide',
        clickable: true,
        renderBullet: function (index, className) {
            return `<div class="news_dot swiper-pagination-bullet"></div>`;
        },
    },
})