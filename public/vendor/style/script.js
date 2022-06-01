/*function readImage() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
        };       
        file.readAsDataURL(this.files[0]);
    }
}

document.getElementById("img-input").addEventListener("change", readImage, false);*/

/*(function(win, doc){
    'use strict';
    
    //Delete
    function confirmDel(event){
        event.preventDefault();
        //console.log(event.target.parentNode.href);
        let token = doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar o cliente?")){
            //console.log("Apagou!");
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange = function(){
                if(ajax.readyState === 4 && ajax.status === 200){
                    console.log("Deu Certo!");
                }
                
            }
            
            ajax.send();
            
        }else{
            return false;
        }
    }

    if(doc.querySelector('.js-del')){
        let btn = doc.querySelectorAll('.js-del');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click', confirmDel, false);
        }
    }

})(window, document);*/

//MASCARA
(function($){
	$('#cep').mask('00000-000');
	$('#telefone').mask('(81)0000-0000');
})(jQuery);

//VIACEP
(function($){

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
    }
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#estado").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#estado").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

})(jQuery);

