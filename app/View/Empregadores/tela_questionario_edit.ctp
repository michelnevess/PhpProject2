<h1>Alterar registro</h1>
<?php
echo $this->Form->create('Empregadoresresposta');
echo $this->Form->input('resposta', array('label' => $pergunta['Empregadorespergunta']['pergunta']));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');
