<h1>Respostas empregador <?php echo '[Id = '.$empregadorId.']';?></h1>

<table>
    <thead>
        <th>Id</th>
        <th>Pergunta</th>
        <th colspan='2'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($respostas as $key=>$resposta): ?>
        <tr>
            <td><?php echo $resposta['Empregadoresresposta']['id']; ?></td>        
            <td>
                <?php
                $pergunta = $perguntas[$key];
                $value = $pergunta['Empregadorespergunta']['pergunta'];
                if (strlen($value) > 50) $value = substr($value, 0, 50) . "...";
                echo $this->Html->link($value,  
                    array('action' => 'telaQuestionarioView', 
                        $resposta['Empregadoresresposta']['id'],
                        $pergunta['Empregadorespergunta']['id'])); 
                ?>
            </td>
            <td>
                <?php
                if (!empty($resposta['Empregadoresresposta']['resposta'])) {
                    echo $this->Html->Link('Editar resposta', array('action' => 'telaQuestionarioEdit', $empregadorId,
                        $resposta['Empregadoresresposta']['id']));
                } else {
                    echo $this->Html->Link('Responder', array('action' => 'telaQuestionarioEdit', $empregadorId, $resposta['Empregadoresresposta']['id']));
                }
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    
    </tbody>
</table>

<?php echo $this->Html->link('Voltar', array('action' => 'index')) ?>

    