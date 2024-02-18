var radioBtns = document.querySelectorAll('.manual-btn');
var cont = 1;

// Inicializa o primeiro botão de rádio como verificado
document.getElementById('radio1').checked = true;

// Configura um intervalo para trocar automaticamente os slides a cada 5 segundos
setInterval(() => {
    proximaImg();
}, 5000);

// Adiciona eventos de clique aos botões manuais
radioBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        cont = index + 1;
        trocarSlide();
    });
});

// Função para avançar para o próximo slide
function proximaImg() {
    cont++;

    if (cont > 3) {
        cont = 1;
    }

    trocarSlide();
}

// Função para trocar o slide com base no valor de cont
function trocarSlide() {
    document.getElementById('radio' + cont).checked = true;
}