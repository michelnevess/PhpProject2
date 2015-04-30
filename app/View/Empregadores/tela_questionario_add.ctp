<h1>Responder questionario</h1>
<?php
echo $this->Form->create('Empregadoresresposta');
foreach ($perguntas as $key=>$pergunta) {
    echo $this->Form->input('Empregadoresresposta.'.$key.'.resposta', array('label' => $pergunta['Empregadorespergunta']['pergunta']));
    echo $this->Form->hidden('Empregadoresresposta.'.$key.'.empregador_id', array('value' => $empregador['Empregador']['id']));
    echo $this->Form->hidden('Empregadoresresposta.'.$key.'.empregadorespergunta_id', array('value' => $pergunta['Empregadorespergunta']['id']));
}
echo $this->Form->end('Salvar');
