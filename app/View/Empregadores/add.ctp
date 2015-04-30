<h1>Cadastrar trabalhador</h1>
<?php
echo $this->Form->create('Empregador', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('nome', array('label' => 'Nome'));
echo $this->Form->input('cargo', array('label' => 'Cargo'));
echo $this->Form->input('formacao', array('label' => 'Formação'));
echo $this->Form->end('Salvar');
