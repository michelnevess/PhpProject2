<h1>Respostas docente <?php echo '[Id = '.$docenteId.']';?></h1>

<table>
    <thead>
        <th>Id</th>
        <th>Pergunta</th>
        <th colspan='2'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($respostas as $key=>$resposta): ?>
        <tr>
            <td><?php echo $resposta['Docentesresposta']['id']; ?></td>        
            <td>
                <?php
                $pergunta = $perguntas[$key];
                $value = $pergunta['Docentespergunta']['pergunta'];
                if (strlen($value) > 50) $value = substr($value, 0, 50) . "...";
                echo $this->Html->link($value,  
                    array('action' => 'telaQuestionarioView', 
                        $resposta['Docentesresposta']['id'],
                        $pergunta['Docentespergunta']['id'])); 
                ?>
            </td>
            <td>
                <?php
                if (!empty($resposta['Docentesresposta']['resposta'])) {
                    echo $this->Html->Link('Editar resposta', array('action' => 'telaQuestionarioEdit', $docenteId,
                        $resposta['Docentesresposta']['id']));
                } else {
                    echo $this->Html->Link('Responder', array('action' => 'telaQuestionarioEdit', $docenteId, $resposta['Docentesresposta']['id']));
                }
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    
    </tbody>
</table>

<?php echo $this->Html->link('Voltar', array('action' => 'index')) ?>

    