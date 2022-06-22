<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar CNPJ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

   <div class="container-search">
    <h1>Consultar CNPJ</h1>
        <form action="consultar.php" method="POST">
                <input type="text" name="cnpj" class="search-input" placeholder="Digite o CNPJ">
                <input type="submit" value="Buscar" class="button-search">
        </form>
   <p style="font-style: italic;padding-top:10px;">Você só pode requisitar 50 CNPJ</p>

   <?php if(isset($dados['CNPJ'])):?>
        <table class="table">
        <thead>
            <th>Nome da Empresa</th>
            <th>CNPJ</th>
            <th>STATUS</th>
            <th>DESCRIÇÃO</th>
        </thead>
        <tbody>
            <tr>
                <td><?=$dados['RAZAO SOCIAL']?></td>
                <td><?=$dados['CNPJ']?></td>
                <td><?=$dados['STATUS']?></td>
                <td><?=$dados['CNAE PRINCIPAL DESCRICAO']?></td>
            </tr>
        </tbody>
        
        </table>

    <?php elseif(isset($dados)):?>
        <h2 style="color:red;margin-top: 13px;font-style:italic;"> <?=$dados?> </h2>
        
    
    <?php endif;?>
    </div>

    <script src="https://unpkg.com/imask"></script>
    <script>
        var element = document.querySelector('.search-input');
        var maskOptions = {
            mask: '00.000.000/0000-00'
        };
        var mask = IMask(element, maskOptions);
    </script>
</body>
</html>
