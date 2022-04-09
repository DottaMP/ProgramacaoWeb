//Programação de frontend (99%) | Validação de formulários | Interações locais com o cliente | Controle de navegação
//Case Sensitive | Toda linha termina com ponto e vírgula execto bloco de comandos.

function media(){
    //valição para se caso não tenha sido digitado nado ou tenha entrada com algo diferente de números.
    if(n1.value == "" || isNaN(n1.value)){ //isNaN = se não for um número
        alert ("Informe somente números!")
        n1.focus() //posiciona o cursor no n1
        n1.value = ""; //limpa o campo
        return false; //interrompe a execução
    }

    if(n2.value == "" || isNaN(n2.value)){ //isNaN = se não for um número
        alert ("Informe somente números!")
        n2.focus() //posiciona o cursor no n1
        n2.value = ""; //limpa o campo
        return false; //interrompe a execução
    }

    var a = parseFloat(n1.value);
    var b = parseFloat(n2.value);
    var c = (a+b)/2;
    //alert ("O resultado da média = "+ c);
    resultado.value = c;
}
