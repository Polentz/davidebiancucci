const documentHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--doc-height", `${window.innerHeight}px`);
};

const toggleMenu = () => { 
    const menuButton = document.querySelector(".menu-button");
    const menuButtonSvg = document.querySelector(".menu-button svg");
    const dropdwonMenu = document.querySelector(".dropdown-menu");
    menuButton.addEventListener("click", () => {
        menuButtonSvg.classList.toggle("--open");
        dropdwonMenu.classList.toggle("--open");
    });
};

const mouseMovement = () => {
    const main = document.querySelector(".main");
    document.addEventListener("mousemove", (event) => {
        let x = event.pageX;
        let w = document.body.clientWidth;
        const xP = x / w * 100;
        const xX = xP.toFixed(0);
    
        if (xX >= 0 && xX <= 50) {
            main.classList.remove("right");
            main.classList.add("left");
        } else {
            main.classList.remove("left");
            main.classList.add("right");
        };
    });
};

// goes with object.php
const slideshow = () => {
    const section = document.querySelector(".section");
    const carouselElements = document.querySelectorAll(".carousel-element");
    const carouselNav = document.querySelector(".carousel-counter");
    const carouselButton = document.querySelector(".carousel-nav");
    const textElement = document.querySelector(".carousel-element.text");

    for (let index = 0; index < carouselElements.length; index++) {
        const arrayCounter = document.createElement("span");
        arrayCounter.classList.add("index");
        arrayCounter.innerHTML = index + 1
        if (carouselElements.length > 1) {
            carouselNav.appendChild(arrayCounter);
        };
    };

    const arrayLenght = document.createElement("span");
    arrayLenght.classList.add("lenght");
    arrayLenght.innerHTML = " / " + carouselElements.length;
    if (carouselElements.length > 1) {
        carouselNav.appendChild(arrayLenght);
    };
    
    const counters = document.querySelectorAll(".index");
    for (let index = 0; index < counters.length; index++) {
        counters[0].classList.add("--active");
    };

    let slideIndex = 1;

    const plusSlides = (n) => {
        showSlides(slideIndex += n);
    };

    const showSlides = (n) => {
        let i;
        if (n > carouselElements.length) {
            slideIndex = 1;
        };
        if (n < 1) {
            slideIndex = carouselElements.length;
        };
        for (i = 0; i < carouselElements.length; i++) {
            carouselElements[i].style.display = "none";
            carouselElements[i].classList.remove("--show");
        };
        for (i = 0; i < counters.length; i++) {
            counters[i].className = counters[i].className.replace(" --active", "");
        }
        carouselElements[slideIndex - 1].style.display = "flex";
        carouselElements[slideIndex - 1].classList.add("--show");
        counters[slideIndex - 1].className += " --active";
    };

    section.addEventListener("click", () => {
        if (section.classList.contains("left")) {
            plusSlides(-1);
        } else if (section.classList.contains("right")) {
            plusSlides(1);
        };
        if (textElement) {
            carouselElements.forEach(element => {
                if(element.classList.contains("--show") && element.classList.contains("text")) {
                    carouselButton.innerHTML = "Photos";
                } else if (element.classList.contains("--show") && element.classList.contains("image")) {
                    carouselButton.innerHTML = "Information";
                };
            });
        };
    });
};

// goes with main.php
const handleSlides = () => {
    const main = document.querySelector(".main");
    const sections = document.querySelectorAll(".section-slider");
    sections.forEach(section => {
        const slides = section.querySelectorAll(".slide");
        const slideContents = section.querySelectorAll(".section-content");

        document.addEventListener("mousemove", () => {
            if (main.classList.contains("left")) {
                slideContents.forEach(content => {
                    content.style.cursor = "w-resize";
                });
            } else if (main.classList.contains("right")) {
                slideContents.forEach(content => {
                    content.style.cursor = "e-resize";
                });
            };
        });
    
        let slideIndex = 1;
    
        const plusSlides = (n) => {
            showSlides(slideIndex += n);
        };
    
        const showSlides = (n) => {
            let i;
            if (n > slides.length) {
                slideIndex = 1;
            };
            if (n < 1) {
                slideIndex = slides.length;
            };
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                slides[i].classList.remove("--show");
            };
            slides[slideIndex - 1].style.display = "flex";
            slides[slideIndex - 1].classList.add("--show");
        };
    
        slideContents.forEach(content => {
            content.addEventListener("click", () => {
                if (main.classList.contains("left")) {
                    plusSlides(-1);
                } else if (main.classList.contains("right")) {
                    plusSlides(1);
                };
            });
        });

        slides.forEach(slide => {
            const slideId = slide.id;
            const slideNavs = section.querySelectorAll(".slides-nav");
            slideNavs.forEach(slideNav => {
                if (slideNav) {
                    const slideNavData = slideNav.getAttribute("data-uuid");
                    slideNav.addEventListener("click", () => {
                        if (slideId === slideNavData) {
                            slide.style.display = "flex";
                            slide.classList.add("--show");
                        } else {
                            slide.style.display = "none";
                            slide.classList.remove("--show");
                        };
                    });
                };
            });
        });
    });
}; 

handleItems = () => {
    const gridItems = document.querySelectorAll(".grid-item");
    gridItems.forEach(gridItem => {
        gridItem.addEventListener("click", () => {
            const itemId = gridItem.getAttribute("data-id");
            const relatedItems = document.querySelectorAll(".section-slider");
            relatedItems.forEach(relatedItem => {
                const relatedId = relatedItem.id;
                if (itemId === relatedId) {
                    [...relatedItems].filter(i => i !== relatedItem).forEach(i => {
                        i.classList.add("--show");
                    });
                    relatedItem.classList.add("--active");
                    gridItem.classList.add("--inactive");
                } else {
                    relatedItem.classList.remove("--active");
                };
            });
        });
    });
};

window.addEventListener("load", () => {
    documentHeight();
    toggleMenu();
    mouseMovement();
    handleSlides();
});

window.addEventListener("resize", () => {
    documentHeight();
});