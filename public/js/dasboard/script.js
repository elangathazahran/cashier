const checkbox = document.querySelector('#checkbox')
const sidebar = document.querySelector('.sidebar')

checkbox.addEventListener('change', function() {
    checkbox.checked 
        ? sidebar.classList.add('active')
        : sidebar.classList.remove('active')
})


// search bar
function updatePlaceholder() {
    const input = document.querySelector(".form__search");
    if (window.innerWidth <= 768) {
        input.placeholder = "Search..";
    } else {
        input.placeholder = "What are you looking for ?";
    }
}

window.addEventListener("load", updatePlaceholder);
window.addEventListener("resize", updatePlaceholder);



// form 
document.addEventListener("DOMContentLoaded", function () {
    const priceInput = document.querySelector(".price-input");
    const hiddenInput = document.getElementById("price_hidden");

    priceInput.addEventListener("input", function () {
        let value = this.value.replace(/\D/g, "");
        if (!value) {
            this.value = "";
            hiddenInput.value = "";
            return;
        }

        let formattedValue = new Intl.NumberFormat("id-ID").format(value);
        this.value = `Rp. ${formattedValue}`;
        hiddenInput.value = value;
    });

    priceInput.addEventListener("keypress", function (e) {
        if (!/\d/.test(e.key)) {
            e.preventDefault();
        }
    });
});
