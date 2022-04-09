function somar(){
        if(num1.value == "" || isNaN(num1.value)){
            alert ("Informe somente números!")
            num1.focus()
            num1.value = "";
            return false;
        }
    
        if(num2.value == "" || isNaN(num2.value)){
            alert ("Informe somente números!")
            num2.focus()
            num2.value = "";
            return false;
        }
    
        var a = parseFloat(num1.value);
        var b = parseFloat(num2.value);
        var c = a + b;
        resultado.value = c;
}

function subtrair(){
    if(num1.value == "" || isNaN(num1.value)){
        alert ("Informe somente números!")
        num1.focus()
        num1.value = "";
        return false;
    }

    if(num2.value == "" || isNaN(num2.value)){
        alert ("Informe somente números!")
        num2.focus()
        num2.value = "";
        return false;
    }

    var a = parseFloat(num1.value);
    var b = parseFloat(num2.value);
    var c = a - b;
    resultado.value = c;
}

function multiplicar(){
    if(num1.value == "" || isNaN(num1.value)){
        alert ("Informe somente números!")
        num1.focus()
        num1.value = "";
        return false;
    }

    if(num2.value == "" || isNaN(num2.value)){
        alert ("Informe somente números!")
        num2.focus()
        num2.value = "";
        return false;
    }

    var a = parseFloat(num1.value);
    var b = parseFloat(num2.value);
    var c = a * b;
    resultado.value = c;
}

function dividir(){
    if(num1.value == "" || isNaN(num1.value)){
        alert ("Informe somente números!")
        num1.focus()
        num1.value = "";
        return false;
    }

    if(num2.value == "" || isNaN(num2.value)){
        alert ("Informe somente números!")
        num2.focus()
        num2.value = "";
        return false;
    }

    if(num2.value == 0){
        alert ("Não é possível dividir por 0!")
        num2.focus()
        num2.value = "";
        return false;
    }


    var a = parseFloat(num1.value);
    var b = parseFloat(num2.value);
    var c = a / b;
    resultado.value = c;
}