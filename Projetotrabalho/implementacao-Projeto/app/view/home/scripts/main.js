function abrir_nav(){

    document.getElementById("menu_oculto").style.width="250px";
    document.getElementById("principal").style.width="250px";

}
function fechar_nav(){

    document.getElementById("menu_oculto").style.width="0";
    document.getElementById("menu_oculto").style.width="0";

}

const modoEscuro = document.getElementById('modo-escuro');
const body = document.body;

modoEscuro.addEventListener('click', () => {
  body.classList.toggle('dark-mode');
});
