<h1>Alterar registro</h1>
<?php
echo $this->Form->create('Palavraschave', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('palavra', array('label' => 'Palavra'));
echo $this->form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');
