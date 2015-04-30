
<p><strong>Pergunta:</strong> <?php echo h($pergunta['Docentespergunta']['pergunta']) ?></p>
<p><strong>Resposta:</strong> 
    <?php
    if (empty($resposta['Docentesresposta']['resposta'])) {
        echo h('N/A');
    } else {
        echo h($resposta['Docentesresposta']['resposta']); 
    }
    ?>
</p>