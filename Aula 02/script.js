document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("f");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let txt = document.getElementById("txt");
        let msg = document.getElementById("msg");

        // note: primeira forma de colocar o texto dentro da div
        msg.innerHTML = txt.value;
    })
});
