<h1>Responder questionario</h1>
<?php
echo $this->Form->create('Docentesresposta');
foreach ($perguntas as $key=>$pergunta) {
    echo $this->Form->input('Docentesresposta.'.$key.'.resposta', array('label' => $pergunta['Docentespergunta']['pergunta']));
    echo $this->Form->hidden('Docentesresposta.'.$key.'.docente_id', array('value' => $docente['Docente']['id']));
    echo $this->Form->hidden('Docentesresposta.'.$key.'.docentespergunta_id', array('value' => $pergunta['Docentespergunta']['id']));
}
echo $this->Form->end('Salvar');
