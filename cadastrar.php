<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamado Técnico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/0twxncg2v4datum66gr5gp57zcehgr86j4hjfbov8aogftni/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylessheet" type="text/css" href="_css/estilo.css"/>
    <style>
       input[type=number]::-webkit-inner-spin-button { 
    -webkit-appearance: none;
    
}
input[type=number] { 
   -moz-appearance: textfield;
   appearance: textfield;

}
    </style>
</head>
<body>


<div class="container">
        <div class="card mt-3">
            <div class="card-header bg-info">
                <ul class="nav nav-pills card-header-pills">
                    <h2 class="mx-auto text-white">Formulário de abertura de chamado</h2>
                </ul>
            </div>
            
            <div class="card-body">
            <div class="row" >
        <div class="col">
            <form class="needs-validation" method="POST" action="func_cadastrar.php" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Acionador</label>
                        <select class="custom-select" name="nome" id="inputGroupSelect01">
                            <option value="Cintia">Cintia</option>
                            <option value="Felipe A">Felipe Anjos</option>
                            <option value="Felipe M">Felipe Messias</option>
                            <option value="Joelson">Joelson</option>
                            <option value="Jorge">Jorge</option>
                            <option value="Leticia">Leticia</option>
                            <option value="Matheus">Matheus</option>
                            <option value="Samuel">Samuel</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="validationCustom02">CFC</label>
                        <input type="text" name="cfc" class="form-control" id="validationCustom02" required>
                        <div class="invalid-feedback">
                            Informe o nome do CFC.
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustomUsername">Estado</label>
                        <select class="custom-select" name="estado" id="inputGroupSelect01">
                            <option value="GO" selected>GO</option>
                            <option value="PR">PR</option>
                            <option value="PR">RJ</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">Contato</label>
                        <input type="tel" class="form-control" name="contato" id="validationCustom03" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" required>
                        <script type="text/javascript">$("#validationCustom03").mask("(00) 0000-00009");</script>

                        <div class="invalid-feedback">
                            Informe um número para contato do CFC.
                        </div>
                    </div>
                    <div class="col">
                        <label for="validationCustom04">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="validationCustom04" required>
                        <div class="invalid-feedback">
                            Insira uma descrição para o chamado técnico.
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="validationCustom05"></label>
                        <textarea name="conteudo" class="form-control" id="validationCustom05" required>
                        </textarea>
                    </div>
                </div>               

        </div>
    </div>
            </div>
            
            <div class="card-footer text-muted">
                <div class="form-row float-sm-right">
                    <div class="col">
                        <a href="index.php" class="btn btn-secondary">Voltar</a>
                        <button class="btn btn-success" name="botao_enviar" type="submit" data-confirm="Tem certeza que deseja que inseriou os dados corretamente?">Enviar Chamado</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    

        <script>
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();

            tinymce.init({
                selector: 'textarea',
                plugins: 'linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
                toolbar: 'a11ycheck casechange checklist code formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Joelson'
            });
        </script>

</body>
</html>
</body>
</html>