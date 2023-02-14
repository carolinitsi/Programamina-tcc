function mostraOnline(){ 
    var bt_online = document.querySelector(".lista_usuarias-online");
    var online = document.querySelector(".lista_usuarias");
    var bt_mensagens = document.querySelector(".lista_usuarias-mensagens");
    var mensagens = document.querySelector(".lista_mensagens");

    // if (localStorage.ativaDarkMode === "true") {
    //     darckmode();
    //     console.log("carrega darkmode");
    // }

    bt_online.addEventListener("click", exibeOnline);
    bt_mensagens.addEventListener("click", exibeMsg);

    function exibeOnline() {
        console.log("mostra online")
        online.style.display = "flex";
        mensagens.style.display = "none";
        bt_online.style.borderBottom = "#a35da2 solid 3px";
        bt_mensagens.style.borderBottom = "none";

    }

    function exibeMsg() {
        online.style.display = "none";
        mensagens.style.display = "block";
        online.style.borderBottom = "none";
        bt_mensagens.style.borderBottom = "#a35da2 solid 3px";
        bt_online.style.borderBottom = "none";
    }
}

	