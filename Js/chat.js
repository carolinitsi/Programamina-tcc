$(document).ready(function(){
	comeca();
})

	var timerI = null;
	var timerR = false;

	function para(){
		if(timerR)
			clearTimeout(timerI);
			timerR = false;
	}

	function comeca(){
		para();
		lista();
		lista_mensagens();
		lista_online();
	}

	function lista(){
		$.ajax({
			url:"../php/chat_mensagens.php",
			success: function(textStatus){
				$("#batepapo_chat").html(textStatus); //Mostra o resultado da página lista.php
			}
		})
		timerI = setTimeout("lista()", 3000); //Tempo de espera para atualizar novamente
		timerR = true;
	}

	function lista_mensagens(){
		$.ajax({
			url:"../php/mensagens.php",
			success: function(textStatus){
				$("#lista_mensagens").html(textStatus); //Mostra o resultado da página lista.php
			}
		})
		timerI = setTimeout("lista_mensagens()", 3000); //Tempo de espera para atualizar novamente
		timerR = true;
	}

	function lista_online(){
		$.ajax({
			url:"../php/users.php",
			success: function(textStatus){
				$("#lista_usuarias").html(textStatus); //Mostra o resultado da página lista.php
			}
		})
		timerI = setTimeout("lista_online()", 3000); //Tempo de espera para atualizar novamente
		timerR = true;
	}
