<h1>Docentes</h1>

<table>
    <thead>
        <th>Id</th>
        <th>Nome</th>
        <th>Area</th>
        <th>Formação</th>
        <th>Tempo de atuação</th>
        <th colspan='3'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($docentes as $docente): ?>
        <tr>
            <td><?php echo $docente['Docente']['id']; ?></td>        
            <td>
                <?php 
                echo $this->Html->link($docente['Docente']['nome'], 
                        array('action' => 'view', $docente['Docente']['id'])); 
                ?>
            </td>              
            <td><?php echo $docente['Docente']['area']; ?></td>
            <td><?php echo $docente['Docente']['formacao']; ?></td>
            <td><?php echo $docente['Docente']['tempo_atuacao']; ?></td>
            <td>
                <?php
                echo $this->Html->link('Alterar', 
                        array('action' => 'edit', $docente['Docente']['id'])); 
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->postLink('Remover', 
                        array('action' => 'delete', $docente['Docente']['id']),
                        array('confirm' => 'Você tem certeza?')
                );
                ?>
            </td>
            <td>
                <?php
                if ($perguntas) {
                    echo $this->Html->link('Ver questionario', 
                        array('action' => 'telaQuestionarioIndex', $docente['Docente']['id'])); 
                }
                ?>
            </td>
        </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->Html->link('Adicionar docente', array('action' => 'add')); ?>
    