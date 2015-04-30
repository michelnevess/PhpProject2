
<p><strong>Pergunta:</strong> <?php echo h($pergunta['Empregadorespergunta']['pergunta']) ?></p>
<p><strong>Resposta:</strong> 
    <?php
    if (empty($resposta['Empregadoresresposta']['resposta'])) {
        echo h('N/A');
    } else {
        echo h($resposta['Empregadoresresposta']['resposta']); 
    }
    ?>
</p>