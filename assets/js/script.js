document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("form[id^='form-']").forEach(form => {

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            let dados = new FormData(this);
            let refeicao = this.dataset.refeicao;

            fetch("refeicao/salvar_refeicao.php", {
                method: "POST",
                body: dados
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "ok") {

                    fetch("refeicao/tabela.php?tipo=" + refeicao)
                        .then(r => r.text())
                        .then(html => {
                            document.getElementById("tabela-" + refeicao).innerHTML = html;
                        });

                    let modal = bootstrap.Modal.getInstance(document.getElementById("modal" + data.modal));
                    modal.hide();
                }
            });
        });
    });
});
