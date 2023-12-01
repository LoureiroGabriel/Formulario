//Validação Jquery
$(document).ready(function () {
    $("#formValidation").validate({
        rules: {
            nome: {
                minlength: 2,
                required: true
            },
            telefone: {
                required: true,
                digits: true 
            },
            email: {
                required: true,
                email: true 
            },
            mensagem: {
                required: true
            }
        },
        messages: {
            nome: {
                required: "Por favor, digite seu nome.",
                minlength: jQuery.validator.format("O nome precisa ter pelo menos {0} letras.")
            },
            telefone: {
                required: "Por favor, digite seu telefone.",
                digits: "Por favor, digite apenas números."
            },
            email: {
                required: "Por favor, digite seu e-mail.",
                email: "Por favor, digite um e-mail válido."
            },
            mensagem: {
                required: "Por favor, digite sua mensagem."
            }
        },
        submitHandler: function (form) {
            form.submit();   
        }
    });
});