<div class="container">
    <h1>Listagem de Categorias</h1>
    <hr>
    
    <table class= "table table-hover">
        <thread>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thread>
        <tbody>
            <?php foreach($categorias as $categoria):?>
            <tr>
                <td> <?= $categoria['nome']?> </td>
                <td> <a href="http;//" class="btn-danger' title="excluir"
                <i class= "fa-solid fa-trash-can">
                </a>
            
                <a href="http;//" class="btn-danger' title="excluir"
                <i class= "fa-solid fa-trash-can">
            </a>
            </td>
            </tr>
            <?php endforeach:?>

        </tbody>
    </table>
</div