// var chamamodal = [...document.querySelectorAll('.bt_modal_user')];
// var modal = document.querySelector('.container_modal_user');

// for(x=0; x<chamamodal.length; x++){
//     chamamodal[x].addEventListener('click', function(){
//         console.log('modal user');
//         modal.style.display="block";
//     });
// }

// var modal_user_close = document.querySelector(".modal_user_close");

function modal_user_close(){
    var modal = document.querySelector('.modal_user_background');
    modal.style.display="none";
}

function carrega_modal_user(event) {
    if(this.status == 200 && this.readyState==4) {

       var dados = this.responseText;
        if (dados) {
        let texto=document.getElementById('modal_user');
        texto.innerHTML = dados;
    }
        } else {
        console.log('Somthing wrong happen:',this.status);
            } 
    }
    
    function modal_user(id){
        console.log(id);
        console.log('modal user');
        var modal = document.querySelector('.modal_user_background');
        modal.style.display="block";


        const ajax = new XMLHttpRequest();
        ajax.addEventListener('load', carrega_modal_user);
        ajax.open('GET', '../php/modal_user.php?id=' + id);
        ajax.send(); 
    }
   