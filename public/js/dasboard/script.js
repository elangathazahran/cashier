const checkbox = document.querySelector('#checkbox')
const sidebar = document.querySelector('.sidebar')

checkbox.addEventListener('change', function() {
    checkbox.checked 
        ? sidebar.classList.add('active')
        : sidebar.classList.remove('active')
})