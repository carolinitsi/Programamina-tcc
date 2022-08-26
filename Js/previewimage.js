function previewimage(){
    var imagem = document.querySelector("#bt_edita_file").files[0];
    var preview = document.querySelector("#preview");
    var bt_salvar = document.querySelector(".bt_salvar_foto");

    bt_salvar.style.display = "block";
    preview.style.display = "block";

    var reader = new FileReader();
				
    reader.onloadend = function () {
        preview.src = reader.result;
    }
    
    if(imagem){
        reader.readAsDataURL(imagem);
    }else{
        preview.src = "";
    }
}

function previewimagePost(){
    console.log("Chama preview img post")
    var imagem = document.querySelector("#bt__file").files[0];
    var preview = document.querySelector("#preview");

    preview.style.display = "block";

    var reader = new FileReader();
				
    reader.onloadend = function () {
        preview.src = reader.result;
    }
    
    if(imagem){
        reader.readAsDataURL(imagem);
    }else{
        preview.src = "";
    }
}