<h1>Cadastrar docente</h1>
<?php
echo $this->Form->create('Docente', array('inputDefaults' => array('type' => 'text')));
echo $this->Form->input('nome', array('label' => 'Nome'));
echo $this->Form->input('area', array('label' => 'Area'));
echo $this->Form->input('formacao', array('label' => 'Formação'));
echo $this->Form->input('tempo_atuacao', array('label' => 'Tempo de atuação'));
echo $this->Form->end('Salvar');
