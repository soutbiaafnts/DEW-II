document.addEventListener("DOMContentLoaded", function () {
  let form = document.getElementById("f");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    let name = document.getElementById("nome");
    let pf = document.getElementById("pfisica");
    let pj = document.getElementById("pjuridica");
    let cpf_cnpj = document.getElementById("cpf_cnpj");
  });

  function verifyName(name) {
    if (name.value.length < 1) {
      return false;
    } else {
      return true;
    }
    }
    
    function verifyPersonType(radio1, radio2) {
        if (radio1.value.che) {
            
        }
    }
});
