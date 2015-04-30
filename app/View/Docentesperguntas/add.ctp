<h1>Cadastrar pergunta</h1>
<?php
echo $this->Form->create('Docentespergunta', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('pergunta', array('label' => 'Pergunta', 'rows' => 3));
echo $this->Form->end('Salvar');
