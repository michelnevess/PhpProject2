<h1>Trabalhadoresperguntas</h1>

<table>
    <thead>
        <th>Id</th>
        <th>Pergunta</th>
        <th colspan='2'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($perguntas as $pergunta): ?>
        <tr>
            <td><?php echo $pergunta['Trabalhadorespergunta']['id']; ?></td>        
            <td>
                <?php 
                $value = $pergunta['Trabalhadorespergunta']['pergunta'];
                if (strlen($value) > 50) $value = substr($value, 0, 50) . "...";
                echo $this->Html->link($value, 
                        array('action' => 'view', $pergunta['Trabalhadorespergunta']['id'])); 
                ?>
            </td>
            <td>
                <?php
                echo $this->Html->link('Alterar', 
                        array('action' => 'edit', $pergunta['Trabalhadorespergunta']['id'])); 
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->postLink('Remover', 
                        array('action' => 'delete', $pergunta['Trabalhadorespergunta']['id']), 
                        array('confirm' => 'Você tem certeza?')
                );
                ?>
            </td>
        </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->Html->link('Adicionar pergunta', array('action' => 'add')); ?>
    