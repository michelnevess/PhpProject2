<h1>Cadastrar Stop word</h1>
<?php
echo $this->Form->create('Stopword', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('termo', array('label' => 'Termo'));
echo $this->Form->end('Salvar');
