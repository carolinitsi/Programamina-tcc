window.onload = function(){ 
  var span  = document.querySelector(".session_mensagem");
  var input_senha_atual = document.querySelector("#senha_atual");
  var input_nova_senha = document.querySelector("#nova_senha");
  const label = document.querySelector("#label-senha_atual");
  const bt = document.querySelector("#alterar");
  const bt_edita_foto = document.querySelector(".label_edita_file");

  bt_edita_foto.addEventListener("hover", exibeBtEditaFoto);
  inputError();

  function exibeBtEditaFoto(){
    bt_edita_foto.style.opacity ="100%"
  }
  function inputError(){

    if(span.children[0].id == "error"){
      input_senha_atual.style.border="red solid 1px";
      label.style.color = "red";
    }
  }
  
  



}

