<?php 
$title = "Gerar bilhetes";
?><div>
<form action="#" method="POST" id="frm_gerar_bilhetes">
    <h1>Gerar bilhetes</h1>
    <p>
        Informe a quantidade de bilhetes e as dezenas desejadas para gerar os bilhetes.
    </p>
    <div class="df">
        <div class="df-1 mr-1">
            <input class="form-input" type="number" min="1" max="50" name="quantidade" placeholder="Quantidade de bilhetes">
        </div>
        <div class="df-1 mr-1">
            <select class="form-input" name="dezenas">
                <option value="6" selected>6 dezenas</option>
                <option value="7">7 dezenas</option>
                <option value="8">8 dezenas</option>
                <option value="9">9 dezenas</option>
                <option value="10">10 dezenas</option>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Gerar</button>
        </div>
    </div>
</form>
</div>

<div id="response-gerar-bilhetes">

</div>

<script>
    document.getElementById('frm_gerar_bilhetes').addEventListener('submit', function(e) {
        e.preventDefault();

        fetch('/api/gerar-bilhetes', {
            method: 'POST',
            body: new FormData(this)
        }).then((response) => {
            return response.text().then(text => {
                return {response, text};
            });
        }).then(({response, text}) => {
            if(!response.ok) {
                throw new Error(text);
            }
            document.getElementById('response-gerar-bilhetes').innerHTML = text;
        }).catch((reason) => {
            console.error(reason);
            let htmlError = '<h3 class="text-error">Erro ao gerar bilhetes</h3>';
            if(reason instanceof Error) {
                htmlError += '<p>' + String(reason.message) + '</p>';
            } else {
                htmlError += '<p>' + String(reason) + '</p>';
            }

            document.getElementById('response-gerar-bilhetes').innerHTML = htmlError;
        });
    });
</script>