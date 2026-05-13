document.addEventListener("DOMContentLoaded", function () {
  let form = document.getElementById("f");

  form.addEventListener("submit", function (event) {
    clearErrors();

    if (!verifyName()) {
      event.preventDefault();
      return;
    }

    if (!verifyPersonType()) {
      event.preventDefault();
      return;
    }

    if (!verifyCpfCnpj()) {
      event.preventDefault();
      return;
    }
  });

  function clearErrors(params) {
    document.getElementById("erro_nome").textContent = "";
    document.getElementById("erro_tipo").textContent = "";
    document.getElementById("erro_cpf_cnpj").textContent = "";
  }

  function verifyName() {
    let name = document.getElementById("nome");

    if (name.value.trim() === "") {
      document.getElementById("erro_nome").textContent =
        "O nome é obrigatório.";
      name.focus();
      return false;
    }

    return true;
  }

  function verifyPersonType() {
    let pf = document.getElementById("pfisica");
    let pj = document.getElementById("pjuridica");

    if (!pf.checked && !pj.checked) {
      document.getElementById("erro_tipo").textContent =
        "Selecione o tipo de pessoa.";
      return false;
    }

    return true;
  }

  function verifyCpfCnpj() {
    let cpf_cnpj = document.getElementById("cpf_cnpj").value;
    let pf = document.getElementById("pfisica");
    let pj = document.getElementById("pjuridica");

    if (cpf_cnpj.trim() === "") {
      document.getElementById("erro_cpf_cnpj").textContent =
        "O CPF/CNPJ é obrigatório.";
      document.getElementById("cpf_cnpj").focus();
      return false;
    }

    if (pf.checked) {
      if (!verifyCpf(cpf_cnpj)) {
        document.getElementById("erro_cpf_cnpj").textContent = "CPF inválido.";
        document.getElementById("cpf_cnpj").focus();
        return false;
      }
    }

    if (pj.checked) {
      if (!verifyCnpj(cpf_cnpj)) {
        document.getElementById("erro_cpf_cnpj").textContent = "CNPJ inválido.";
        document.getElementById("cpf_cnpj").focus();
        return false;
      }
    }

    return true;
  }

  function verifyCpf(cpf) {
    let numbers, digits, sum, i, result, equalDigits;
    equalDigits = 1;
    if (cpf.length < 11) {
      return false;
    }
    for (i = 0; i < cpf.length - 1; i++) {
      if (cpf.charAt(i) != cpf.charAt(i + 1)) {
        equalDigits = 0;
        break;
      }
    }

    if (!equalDigits) {
      numbers = cpf.substring(0, 9);
      digits = cpf.substring(9);
      sum = 0;

      for (i = 10; i > 1; i--) {
        sum += numbers.charAt(10 - i) * i;
      }

      result = sum % 11 < 2 ? 0 : 11 - (sum % 11);

      if (result != digits.charAt(0)) {
        return false;
      }

      numbers = cpf.substring(0, 10);
      sum = 0;

      for (i = 11; i > 1; i--) {
        sum += numbers.charAt(11 - i) * i;
      }

      result = sum % 11 < 2 ? 0 : 11 - (sum % 11);

      if (result != digits.charAt(1)) {
        return false;
      }

      return true;
    } else {
      return false;
    }
  }

  function verifyCnpj(cnpj) {
    let numbers, digits, sum, i, result, position, size, equalDigits;
    equalDigits = 1;

    if (cnpj.length < 14 || cnpj.length > 15) {
      return false;
    }

    for (i = 0; i < cnpj.length - 1; i++) {
      if (cnpj.charAt(i) != cnpj.charAt(i + 1)) {
        equalDigits = 0;
        break;
      }
    }

    if (!equalDigits) {
      size = cnpj.length - 2;
      numbers = cnpj.substring(0, size);
      digits = cnpj.substring(size);
      sum = 0;
      position = size - 7;

      for (i = size; i >= 1; i--) {
        sum += numbers.charAt(size - i) * position--;
        if (position < 2) {
          position = 9;
        }
      }

      result = sum % 11 < 2 ? 0 : 11 - (sum % 11);

      if (result != digits.charAt(0)) {
        return false;
      }

      size = size + 1;
      numbers = cnpj.substring(0, size);
      sum = 0;
      position = size - 7;

      for (i = size; i >= 1; i--) {
        sum += numbers.charAt(size - i) * position--;
        if (position < 2) {
          position = 9;
        }
      }

      result = sum % 11 < 2 ? 0 : 11 - (sum % 11);

      if (result != digits.charAt(1)) {
        return false;
      }

      return true;
    } else {
      return false;
    }
  }
});
