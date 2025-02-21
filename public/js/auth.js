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

document.addEventListener("DOMContentLoaded", function () {
    const transitionOverlay = document.querySelector(".page-transition");
    const loaderContainer = document.querySelector(".loader-container");

    // Tampilkan loader sebelum halaman berpindah
    window.addEventListener("beforeunload", function () {
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
    });
});


// check strength password
document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.querySelector("input[name='password']");
    const passwordStrengthBar = document.querySelector(".bar__password-value .value");
    const passwordStatusText = document.querySelector(".description__status");
    const passwordPercentage = document.querySelector("#password-percentage");
    const submitBtn = document.querySelector(".btn.reg");

    passwordInput.addEventListener("input", function () {
        const password = passwordInput.value;
        let strength = 0;
        let color = "red";
        let text = "Weak (10%)";
        let guideline = "🔴 Password harus memiliki minimal 8 karakter, mengandung angka, dan simbol (_ - .) untuk mencapai kekuatan maksimal.";

        if (password.length >= 1 && password.length <= 3) {
            strength = 10;
            color = "red";
            text = "Weak (10%)";
            guideline = "❌ Password terlalu pendek! Tambahkan lebih banyak karakter.";
        }

        if ((password.length >= 4 && password.length <= 6) || (password.length > 6 && !/\d/.test(password))) {
            strength = 50;
            color = "orange";
            text = "Medium (50%)";
            guideline = "⚠️ Password harus memiliki minimal 8 karakter dan mengandung angka.";
        }

        if (password.length >= 8 && /\d/.test(password)) {
            strength = 75;
            color = "blue";
            text = "Strong (75%)";
            guideline = "✅ Password sudah cukup kuat! Tambahkan simbol (_ - .) untuk keamanan maksimal.";
        }

        if (password.length >= 8 && /\d/.test(password) && /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
            strength = 100;
            color = "green";
            text = "Strongest (100%)";
            guideline = "🟢 Password sangat kuat! Siap digunakan.";
        }

        passwordPercentage.textContent = strength + "%";

        passwordStrengthBar.style.width = strength + "%";
        passwordStrengthBar.style.backgroundColor = color;
        passwordStatusText.textContent = guideline;

        if (strength >= 75) {
            submitBtn.classList.add("enabled");
            submitBtn.disabled = false;
        } else {
            submitBtn.classList.remove("enabled");
            submitBtn.disabled = true;
        }
    });
});