<h1>Responder questionario</h1>
<?php
echo $this->Form->create('Trabalhadoresresposta');
foreach ($perguntas as $key=>$pergunta) {
    echo $this->Form->input('Trabalhadoresresposta.'.$key.'.resposta', array('label' => $pergunta['Trabalhadorespergunta']['pergunta']));
    echo $this->Form->hidden('Trabalhadoresresposta.'.$key.'.trabalhador_id', array('value' => $trabalhador['Trabalhador']['id']));
    echo $this->Form->hidden('Trabalhadoresresposta.'.$key.'.trabalhadorespergunta_id', array('value' => $pergunta['Trabalhadorespergunta']['id']));
}
echo $this->Form->end('Salvar');
