const showNavbar = () => {
    document.querySelector(".nav-menu").classList.toggle("open-nav");
}

document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.accordion-button');

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            const targetId = button.getAttribute('data-toggle');
            const targetContent = document.getElementById(targetId);
            const accordionIcon = button.querySelector('.fa-plus');

            if (targetContent.classList.contains('hidden')) {
                targetContent.classList.remove('hidden');
                button.setAttribute('aria-expanded', 'true');
                accordionIcon.classList.replace('fa-plus', 'fa-minus');
            } else {
                targetContent.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
                button.querySelector('.fa-minus').classList.remove('fa-minus');
                button.querySelector('.fa-solid').classList.add('fa-plus');
            }
        });
    });
});

window.addEventListener('scroll', function () {
    var navbar = document.querySelector('.navbar');
    var sections = document.querySelectorAll('section');
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    sections.forEach(function (section) {
        var sectionTop = section.offsetTop;
        var sectionHeight = section.offsetHeight;
        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            var sectionId = section.getAttribute('id');
            var correspondingLink = document.querySelector('.navbar a[href="#' + sectionId + '"]');
            var defaultLink = document.querySelector('.navbar a[href="#"]');
            if (correspondingLink) {
                document.querySelectorAll('.navbar li').forEach(function (li) {
                    li.classList.remove('active');
                });
                correspondingLink.querySelector("li").classList.add('active');
            } else if (defaultLink) {
                document.querySelectorAll('.navbar li').forEach(function (li) {
                    li.classList.remove('active');
                });
                defaultLink.classList.add("active");
            }
        }
    });
});