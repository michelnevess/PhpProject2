<h1>Cadastrar palavra chave</h1>
<?php
echo $this->Form->create('Palavraschave', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('palavra', array('label' => 'Palavra'));
echo $this->Form->end('Salvar');
