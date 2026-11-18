
/*
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
*/


const carousel = document.querySelector(".carousel");
const imagens = document.querySelectorAll(".carousel img");

const prev = document.getElementById("prev");
const next = document.getElementById("next");

let indiceAtual = 0;

function atualizarCarrossel() {

    const container = document.querySelector(".imagem-conteiner");

    const larguraContainer = container.clientWidth;
    const larguraImagem = imagens[0].offsetWidth;

    const estilo = getComputedStyle(carousel);
    const espacamento = parseFloat(estilo.gap) || 0;

    const deslocamento =
        (larguraImagem + espacamento) * indiceAtual
        - (larguraContainer - larguraImagem) / 2;

    carousel.style.transform = `translateX(-${deslocamento}px)`;
}

// Avançar imagem
next.addEventListener("click", () => {

    indiceAtual++;

    if (indiceAtual >= imagens.length) {
        indiceAtual = 0;
    }

    atualizarCarrossel();

});

// Voltar imagem
prev.addEventListener("click", () => {

    indiceAtual--;

    if (indiceAtual < 0) {
        indiceAtual = imagens.length - 1;
    }

    atualizarCarrossel();

});

// Centralizar primeira imagem ao carregar
window.addEventListener("load", atualizarCarrossel);

window.addEventListener("resize", atualizarCarrossel);

