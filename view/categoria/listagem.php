<div class="container">
    <h1>Listagem de Categorias</h1>
    <hr>
    
    <table class= "table table-hover table-responsive">
        <thread>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thread>
        <tbody>
            <?php foreach($categorias as $categoria):?>
            <tr>
                <td><?php echo $categoria['nome'];?></td>
                <td>
                    s<a href = "<?= base_url() = ?>?c=categoria&m=excluir&id=<?= $categoria['idcategoria'];?>" class="btn btn-danger" ><i class="fa-solid fa-trash-can"></i>Excluir</a>
                    <a href = "" class="btn btn-primary"><i class="fa-solid fa-pencil"></i>Atualizar</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div