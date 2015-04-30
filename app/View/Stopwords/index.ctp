<h1>Stopwords</h1>

<table>
    <thead>
        <th>Id</th>
        <th>Termo</th>
        <th colspan='2'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($stopwords as $stopword): ?>
        <tr>
            <td><?php echo $stopword['Stopword']['id']; ?></td>        
            <td>
                <?php 
                echo $this->Html->link($stopword['Stopword']['termo'], 
                        array('action' => 'view', $stopword['Stopword']['id'])); 
                ?>
            </td>        
            <td>
                <?php
                echo $this->Html->link('Alterar', 
                        array('action' => 'edit', $stopword['Stopword']['id'])); 
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->postLink('Remover', 
                        array('action' => 'delete', $stopword['Stopword']['id']), 
                        array('confirm' => 'Você tem certeza?')
                );
                ?>
            </td>
        </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->Html->link('Adicionar stop word', array('action' => 'add')); ?>
    