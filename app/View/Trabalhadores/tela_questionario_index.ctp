<h1>Respostas trabalhador <?php echo '[Id = '.$trabalhadorId.']';?></h1>

<table>
    <thead>
        <th>Id</th>
        <th>Pergunta</th>
        <th colspan='2'>Ação</th>
    </thead>
    <tbody>
        <?php foreach ($respostas as $key=>$resposta): ?>
        <tr>
            <td><?php echo $resposta['Trabalhadoresresposta']['id']; ?></td>        
            <td>
                <?php
                $pergunta = $perguntas[$key];
                $value = $pergunta['Trabalhadorespergunta']['pergunta'];
                if (strlen($value) > 50) $value = substr($value, 0, 50) . "...";
                echo $this->Html->link($value,  
                    array('action' => 'telaQuestionarioView', 
                        $resposta['Trabalhadoresresposta']['id'],
                        $pergunta['Trabalhadorespergunta']['id'])); 
                ?>
            </td>
            <td>
                <?php
                if (!empty($resposta['Trabalhadoresresposta']['resposta'])) {
                    echo $this->Html->Link('Editar resposta', array('action' => 'telaQuestionarioEdit', $trabalhadorId,
                        $resposta['Trabalhadoresresposta']['id']));
                } else {
                    echo $this->Html->Link('Responder', array('action' => 'telaQuestionarioEdit', $trabalhadorId, $resposta['Trabalhadoresresposta']['id']));
                }
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    
    </tbody>
</table>

<?php 
echo $this->Html->Link('Responder questionario em bloco', array('action' => 'telaQuestionarioAdd', $trabalhadorId));
echo '<br/>';
echo $this->Html->Link('Voltar', array('action' => 'index'));
?>


    