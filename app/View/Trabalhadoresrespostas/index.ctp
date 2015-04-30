<h1>Trabalhadoresresposta</h1>

<table>
    <thead>
        <th>Id</th>
        <th colspan='2'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($respostas as $resposta): ?>
        <tr>
            <td><?php echo $resposta['Trabalhadoresresposta']['id']; ?></td>        
            <td>
                <?php 
                echo $this->Html->link('Visualizar', 
                    array('action' => 'view', 
                            $resposta['Trabalhadoresresposta']['id'], 
                            $resposta['Trabalhadoresresposta']['trabalhadorespergunta_id']
                    )
                ); 
                ?>
            </td>        
        </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>

    