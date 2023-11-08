/*
    Aqui serão criados alguns scripts funcionais para a aplicação
*/

//Ao clicar no botão 'VER VAGAS', rola a página.
document.body.addEventListener('click', function(event) {
    if (event.target.classList.contains('ver-vagas')) {
        // Calcula a posição para rolar 30% da tela
        const screenHeight = window.innerHeight;
        const scrollDistance = screenHeight * 1;
        
        // Obtém a posição atual de rolagem
        const currentScroll = window.scrollY;
        
        // Calcula a posição final
        const targetScroll = currentScroll + scrollDistance;
        
        // Rola a página suavemente para a posição desejada
        window.scrollTo({
            top: targetScroll,
            behavior: 'smooth'
        });
    }

});