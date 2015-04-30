<h1>Empregadores</h1>

<table>
    <thead>
        <th>Id</th>
        <th>Nome</th>
        <th>Cargo</th>
        <th>Formação</th>
        <th colspan='3'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($empregadores as $empregador): ?>
        <tr>
            <td><?php echo $empregador['Empregador']['id']; ?></td>        
            <td>
                <?php 
                echo $this->Html->link($empregador['Empregador']['nome'], 
                        array('action' => 'view', $empregador['Empregador']['id'])); 
                ?>
            </td>              
            <td><?php echo $empregador['Empregador']['formacao']; ?></td>
            <td><?php echo $empregador['Empregador']['cargo']; ?></td>
            <td>
                <?php
                echo $this->Html->link('Alterar', 
                        array('action' => 'edit', $empregador['Empregador']['id'])); 
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->postLink('Remover', 
                        array('action' => 'delete', $empregador['Empregador']['id']),
                        array('confirm' => 'Você tem certeza?')
                );
                ?>
            </td>
            <td>
                <?php
                if ($perguntas) {
                    echo $this->Html->link('Ver questionario', 
                        array('action' => 'telaQuestionarioIndex', $empregador['Empregador']['id'])); 
                }
                ?>
            </td>
        </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->Html->link('Adicionar empregador', array('action' => 'add')); ?>
    