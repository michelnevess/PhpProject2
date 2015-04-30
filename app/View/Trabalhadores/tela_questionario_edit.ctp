<h1>Alterar registro</h1>
<?php
echo $this->Form->create('Trabalhadoresresposta');
echo $this->Form->input('resposta', array('label' => $pergunta['Trabalhadorespergunta']['pergunta']));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');
