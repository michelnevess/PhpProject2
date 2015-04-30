<h1>Trabalhadores</h1>

<table>
    <thead>
        <th>Id</th>
        <th>Nome</th>
        <th>Formação</th>
        <th colspan='3'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($trabalhadores as $trabalhador): ?>
        <tr>
            <td><?php echo $trabalhador['Trabalhador']['id']; ?></td>        
            <td>
                <?php 
                echo $this->Html->link($trabalhador['Trabalhador']['nome'], 
                        array('action' => 'view', $trabalhador['Trabalhador']['id'])); 
                ?>
            </td>              
            <td><?php echo $trabalhador['Trabalhador']['formacao']; ?></td>
            <td>
                <?php
                echo $this->Html->link('Alterar', 
                        array('action' => 'edit', $trabalhador['Trabalhador']['id'])); 
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->postLink('Remover', 
                        array('action' => 'delete', $trabalhador['Trabalhador']['id']),
                        array('confirm' => 'Você tem certeza?')
                );
                ?>
            </td>
            <td>
                <?php
                if ($perguntas) {
                    echo $this->Html->link('Ver questionario', 
                        array('action' => 'telaQuestionarioIndex', $trabalhador['Trabalhador']['id'])); 
                }
                ?>
            </td>
        </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->Html->link('Adicionar trabalhador', array('action' => 'add')); ?>
    