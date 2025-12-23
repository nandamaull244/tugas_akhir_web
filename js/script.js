let swiper = null;

function enableSwiper() {
    if (window.innerWidth < 768) {

        if (!swiper) {
            swiper = new Swiper("#feature-swiper", {
                slidesPerView: 1.2,
                spaceBetween: 12,
            });
        }

    } else {
        if (swiper) {
            swiper.destroy(true, true);
            swiper = null;
        }
    }
}

enableSwiper();
window.addEventListener("resize", enableSwiper);

const carousel = document.querySelector('#reviewCarousel');
let touchStartX = 0;

carousel.addEventListener('touchstart', e => {
    touchStartX = e.changedTouches[0].screenX;
});

carousel.addEventListener('touchend', e => {
    let diff = e.changedTouches[0].screenX - touchStartX;
    if (diff > 50) {
        bootstrap.Carousel.getInstance(carousel).prev();
    } else if (diff < -50) {
        bootstrap.Carousel.getInstance(carousel).next();
    }
});