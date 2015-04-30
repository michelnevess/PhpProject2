<h1>Alterar registro</h1>
<?php
echo $this->Form->create('Trabalhador', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('nome', array('label' => 'Nome'));
echo $this->Form->input('formacao', array('label' => 'Formação'));
echo $this->form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');
