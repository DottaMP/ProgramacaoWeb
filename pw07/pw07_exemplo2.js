//Programação de frontend (99%) | Validação de formulários | Interações locais com o cliente | Controle de navegação
//Case Sensitive | Toda linha termina com ponto e vírgula execto bloco de comandos.

function validar(){
    if(nome.value.length <=3){
        alert("Digite seu nome completo !");
        nome.value="";
        nome.focus();
        return false;
    }
    if(senha1.value.length<6 || 
        !isNaN(senha1.value)  ){
        alert("Digite uma senha alfanumerica de 6 posições");
        senha1.value="";
        senha1.focus();
        return false;    
    }
    if(senha1.value!=senha2.value){
        alert("Senha e confirmação são diferentes!");
        senha2.focus();
        senha2.value="";
        return false;        
    }
    // a@a.co
    if(email.value.length<6 || 
      email.value.indexOf("@")<=0 ||
      email.value.lastIndexOf(".")<=
      email.value.indexOf("@")){
        alert("email invalido!");
        email.focus();
        email.value="";
        return false;        
      }
 
      if(opS.checked==false && opN.checked==false){
        alert("Escolha uma confirmação!");
        return false;
      }
 
    alert("tudo certo !");
    frm1.submit();

}