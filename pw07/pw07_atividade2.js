function validar() {
    if (nome.value.length <= 3) {
        alert("Digite seu nome completo!");
        nome.value = "";
        nome.focus();
        return false;
    }

    if (email.value.length < 6 || email.value.indexOf("@") <= 0 || email.value.lastIndexOf(".") <= email.value.indexOf("@")) {
        alert("Email invalido!");
        email.focus();
        email.value = "";
        return false;
    }

    if (phone.value == "" || isNaN(phone.value)) {
        alert("Digite seu telefone! Apenas Números!");
        phone.value = "";
        phone.focus();
        return false;
    } else if (phone.value.length < 11 || phone.value.length > 11) {
        alert("Seu telefone precisa ter 11 números no formato 99999999999");
        phone.value = "";
        phone.focus();
        return false;
    }

    alert("Dados Enviado com Sucesso!");
    frm1.submit();

}