function fone(obj, prox) {
    switch (obj.value.length) {
        case 1:
            obj.value = "(" + obj.value;
            break;
        case 3:
            obj.value = obj.value + ")";
            break;
        case 8:
            obj.value = obj.value + "-";
            break;
        case 13:
            prox.focus();
            break;
    }
}

function formata_data(obj, prox) {
    switch (obj.value.length) {
        case 2:
            obj.value = obj.value + "/";
            break;
        case 5:
            obj.value = obj.value + "/";
            break;
        case 9:
            prox.focus();
            break;
    }
}

function Apenas_Numeros(caracter) {
    var nTecla = 0;
    if (document.all) {
        nTecla = caracter.keyCode;
    } else {
        nTecla = caracter.which;
    }
    if ((nTecla > 47 && nTecla < 58) ||
        nTecla == 8 || nTecla == 127 ||
        nTecla == 0 || nTecla == 9 ||
        nTecla == 13) {
        return true;
    } else {
        return false;
    }
}

function validaCPF(cpf) {
    erro = new String;

    if (cpf.value.length == 11) {
        cpf.value = cpf.value.replace('.', '');
        cpf.value = cpf.value.replace('.', '');
        cpf.value = cpf.value.replace('-', '');

        var nonNumbers = /\D/;

        if (nonNumbers.test(cpf.value)) {
            erro = "A verificacao de CPF suporta apenas números!";
        } else {
            if (cpf.value == "00000000000" ||
                cpf.value == "11111111111" ||
                cpf.value == "22222222222" ||
                cpf.value == "33333333333" ||
                cpf.value == "44444444444" ||
                cpf.value == "55555555555" ||
                cpf.value == "66666666666" ||
                cpf.value == "77777777777" ||
                cpf.value == "88888888888" ||
                cpf.value == "99999999999") {

                erro = "Número de CPF inválido!"
            }

            var a = [];
            var b = new Number;
            var c = 11;

            for (i = 0; i < 11; i++) {
                a[i] = cpf.value.charAt(i);
                if (i < 9) b += (a[i] * --c);
            }

            if ((x = b % 11) < 2) {
                a[9] = 0
            } else {
                a[9] = 11 - x
            }
            b = 0;
            c = 11;

            for (y = 0; y < 10; y++) b += (a[y] * c--);

            if ((x = b % 11) < 2) {
                a[10] = 0;
            } else {
                a[10] = 11 - x;
            }

            if ((cpf.value.charAt(9) != a[9]) || (cpf.value.charAt(10) != a[10])) {
                erro = "Número de CPF inválido.";

            }
        }
    } else {
        if (cpf.value.length == 0)
            return false
        else
            erro = "Número de CPF inválido.";
    }
    if (erro.length > 0) {
        alert(erro).click(erro);
        cpf.focus();
        return false;
    }
    return true;
}


function maskCPF(CPF) {
    var evt = window.event;
    kcode = evt.keyCode;
    if (kcode == 8) return;
    if (CPF.value.length == 3) {
        CPF.value = CPF.value + '.';
    }
    if (CPF.value.length == 7) {
        CPF.value = CPF.value + '.';
    }
    if (CPF.value.length == 11) {
        CPF.value = CPF.value + '-';
    }
}


function formataCPF(CPF) {
    with(CPF) {
        value = value.substr(0, 3) + '.' +
            value.substr(3, 3) + '.' +
            value.substr(6, 3) + '-' +
            value.substr(9, 2);
    }
}

function retiraFormatacao(CPF) {
    with(CPF) {
        value = value.replace(".", "");
        value = value.replace(".", "");
        value = value.replace("-", "");
        value = value.replace("/", "");
    }
}