window.addEventListener("scroll", function () {
    const imageHome = document.querySelector(".image-home");
    let scrollTop = document.documentElement.scrollTop;
    imageHome.style.opacity = 1 - scrollTop / 500;
});
