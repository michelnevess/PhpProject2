<h1>Empregadoresresposta</h1>

<table>
    <thead>
        <th>Id</th>
        <th colspan='2'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($respostas as $resposta): ?>
        <tr>
            <td><?php echo $resposta['Empregadoresresposta']['id']; ?></td>        
            <td>
                <?php 
                echo $this->Html->link('Visualizar', 
                    array('action' => 'view', 
                            $resposta['Empregadoresresposta']['id'], 
                            $resposta['Empregadoresresposta']['empregadorespergunta_id']
                    )
                ); 
                ?>
            </td>        
        </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>

    