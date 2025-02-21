<div class="page-transition">
    <div class="loader-container">
        <div class="loading-text">LOADING</div>
        <div class="loader"></div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const links = document.querySelectorAll("a");
        const transitionOverlay = document.querySelector(".page-transition");
        const loaderContainer = document.querySelector(".loader-container");

        links.forEach(link => {
            link.addEventListener("click", function(e) {
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

    document.addEventListener("DOMContentLoaded", function() {
        const transitionOverlay = document.querySelector(".page-transition");
        const loaderContainer = document.querySelector(".loader-container");

        // Tampilkan loader sebelum halaman berpindah
        window.addEventListener("beforeunload", function() {
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
</script>
