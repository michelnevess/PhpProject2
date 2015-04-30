
<p><strong>Pergunta:</strong> <?php echo h($pergunta['Trabalhadorespergunta']['pergunta']) ?></p>
<p><strong>Resposta:</strong> 
    <?php
    if (empty($resposta['Trabalhadoresresposta']['resposta'])) {
        echo h('N/A');
    } else {
        echo h($resposta['Trabalhadoresresposta']['resposta']); 
    }
    ?>
</p>