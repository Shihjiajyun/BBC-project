// document.addEventListener("DOMContentLoaded", function () {
//     const toggleButton = document.getElementById("toggleButton");
//     const hiddenBlock = document.getElementById("hiddenBlock");
//     const scrollContainer = document.getElementById("scrollContainer");
//     let isHiddenBlockVisible = false;


//     toggleButton.addEventListener("click", function () {
//         isHiddenBlockVisible = !isHiddenBlockVisible;
//         hiddenBlock.style.display = isHiddenBlockVisible ? "block" : "none";

//         if (isHiddenBlockVisible) {
//             scrollContainer.style.width = "calc(100vw - 140px)";
//             // console.log("1");
//         } else {
//             scrollContainer.style.width = "calc(100vw - 50px)";
//             console.log("2");
//         }
//     });
//     if (!isHiddenBlockVisible) {
//         scrollContainer.style.width = "calc(100vw - 50px)";
//     }
// });

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
                return;
            }
        });
    });

    // Activate SimpleLightbox plugin for portfolio items
    new SimpleLightbox({
        elements: '#portfolio a.portfolio-box'
    });

});

