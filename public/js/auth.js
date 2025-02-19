const inputPassword = document.querySelectorAll('.form__control.password')
const checkbox = document.querySelector('#checkbox')

checkbox.addEventListener('change', function () {
    if (checkbox.checked) {
        inputPassword.forEach((inp) => {
            inp.type = 'text'
        })
    } else {
        inputPassword.forEach((inp) => {
            inp.type = 'password'
        })
    }
})

// loader
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("a");
    const transitionOverlay = document.querySelector(".page-transition");
    const loaderContainer = document.querySelector(".loader-container");

    links.forEach(link => {
        link.addEventListener("click", function (e) {
            const href = this.getAttribute("href");

            if (href && !href.startsWith("#") && !href.startsWith("javascript")) {
                e.preventDefault(); 

                transitionOverlay.style.opacity = "1";
                transitionOverlay.style.width = "10px";
                transitionOverlay.style.height = "10px";

                setTimeout(() => {
                    transitionOverlay.style.width = "100%";
                }, 100); 

                setTimeout(() => {
                    transitionOverlay.style.height = "100%";
                }, 1700);

                setTimeout(() => {
                    loaderContainer.style.opacity = "1";
                }, 3500);

                setTimeout(() => {
                    window.location.href = href;
                }, 5500);
            }
        });
    });
});