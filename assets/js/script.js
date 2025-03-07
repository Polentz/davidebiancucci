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
    const body = document.querySelector("body")
    const section = document.querySelector(".section");
    document.addEventListener("mousemove", (event) => {
        let x = event.pageX;
        let w = document.body.clientWidth;
        const xP = x / w * 100;
        const xX = xP.toFixed(0);
    
        if (xX >= 0 && xX <= 50) {
            body.style.cursor = "w-resize";
            section.classList.remove("right");
            section.classList.add("left");
        } else {
            body.style.cursor = "e-resize";
            section.classList.remove("left");
            section.classList.add("right");
        };
    });
}

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


window.addEventListener("load", () => {
    documentHeight();
    toggleMenu();
});

window.addEventListener("resize", () => {
    documentHeight();
});