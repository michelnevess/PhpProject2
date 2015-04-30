<h1>Alterar registro</h1>
<?php
echo $this->Form->create('Docentespergunta', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('pergunta', array('label' => 'Pergunta', 'rows' => 3));
echo $this->form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');
