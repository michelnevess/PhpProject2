<h1>Docentesresposta</h1>

<table>
    <thead>
        <th>Id</th>
        <th colspan='2'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($respostas as $resposta): ?>
        <tr>
            <td><?php echo $resposta['Docentesresposta']['id']; ?></td>        
            <td>
                <?php 
                echo $this->Html->link('Visualizar', 
                    array('action' => 'view', 
                            $resposta['Docentesresposta']['id'], 
                            $resposta['Docentesresposta']['docentespergunta_id']
                    )
                ); 
                ?>
            </td>        
        </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>

    