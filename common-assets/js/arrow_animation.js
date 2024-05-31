document.addEventListener('DOMContentLoaded', function () {
    var accordions = document.querySelectorAll('.accordion-item');

    accordions.forEach(function (accordion) {
        var checkbox = accordion.querySelector('input[type="checkbox"]');
        var arrow = accordion.querySelector('.arrow');

        checkbox.addEventListener('change', function () {
            if (checkbox.checked) {
                arrow.style.transform = 'rotate(180deg)';
            } else {
                arrow.style.transform = 'rotate(0deg)';
            }
        });
    });
});