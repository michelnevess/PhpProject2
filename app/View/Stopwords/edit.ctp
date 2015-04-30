<h1>Alterar registro</h1>
<?php
echo $this->Form->create('Stopword', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('termo', array('label' => 'Termo'));
echo $this->form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');
