// note: Primeira forma de garantir que o Javascript vai rodar só depois que a página estiver toda carregada
/* window.onload = function () {
  alert("A página foi carregada com todos os seus recursos.");
}; */

document.addEventListener("DOMContentLoaded", function () {
  var f = document.getElementById("f");
  f.addEventListener("submit", function (event) {
    // todo: localizar o input nome
      let name = document.getElementById("nome");
      let pass = document.getElementById("senha");
      let confirmacao = document.getElementById("confirmacao");
      let

    if (name.value.length < 3) {
      alert("O nome deve ter pelo menos 3 caracteres");
      name.focus();
      event.preventDefault();
      return;
      }
      
      if () {
        
      }

    alert("Enviando os dados...");
    return;
  });
});
