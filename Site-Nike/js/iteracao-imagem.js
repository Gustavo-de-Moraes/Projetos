const wrapper = document.querySelector('.wrapper'),
    carousel = document.querySelector('.carousel'),
    imagem = document.querySelectorAll('.img'),
    buttons = document.querySelectorAll('.button');



let  imageIndex = 1,
    intervalId;

const autoSlide = () => {
    intervalId = setInterval(() => slideimage(++imageIndex), 2000);
};

autoSlide();





const slideimage = () => {

        imageIndex = imageIndex === imagem.length ? 0 : imageIndex < 0 ? imagem.length - 1 : imageIndex;

    carousel.style.transform = `translate(-${imageIndex * 100}%)`;
};

const updateClick = (e) => {

    clearInterval(intervalId);
    imageIndex += e.target.id === "next" ? 1 : -1;
    slideimage(imageIndex);
    autoSlide();

    console.log("clicked");

};

buttons.forEach((button) => button.addEventListener('click', updateClick));

wrapper.addEventListener('mouseover', () => clearInterval(intervalId));

wrapper.addEventListener('mouseleave', autoSlide);
