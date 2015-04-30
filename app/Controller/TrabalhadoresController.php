<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TrabalhadoresController extends AppController {

    public $helpers = array('Html', 'Form');
    public $uses = array('Trabalhador', 'Trabalhadorespergunta', 'Trabalhadoresresposta');

    public function index() {
        $this->set('perguntas', $this->Trabalhadorespergunta->find('all'));
        $this->set('trabalhadores', $this->Trabalhador->find('all'));
    }

    public function telaQuestionarioIndex($trabalhadorId = null) {
        if (!$trabalhadorId) {
            throw new NotFoundException(__('Invalid'));
        }
        $this->telaQuestionarioUpdate($trabalhadorId);

        $this->set('trabalhadorId', $trabalhadorId);

        $respostas = $this->Trabalhadoresresposta->find('all', array(
            'conditions' => array('trabalhador_id' => $trabalhadorId), 
            'order' => array('Trabalhadoresresposta.trabalhadorespergunta_id ASC')));
        if (!$respostas) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('respostas', $respostas);

        $perguntas = $this->Trabalhadorespergunta->find('all', array('order' => 'Trabalhadorespergunta.id ASC'));
        if (!$perguntas) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('perguntas', $perguntas);
    }

    public function telaQuestionarioView($respostaId = null, $perguntaId = null) {

        $resposta = $this->Trabalhadoresresposta->findById($respostaId);
        if (!$resposta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('resposta', $resposta);

        $pergunta = $this->Trabalhadorespergunta->findById($perguntaId);
        if (!$pergunta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('pergunta', $pergunta);
    }

    public function telaQuestionarioAdd($trabalhadorId = null) {
        if (!$trabalhadorId) {
            throw new NotFoundException(__('Invalid'));
        }

        $trabalhador = $this->Trabalhador->findById($trabalhadorId);
        if (!$trabalhador) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('trabalhador', $trabalhador);

        $perguntas = $this->Trabalhadorespergunta->find('all');
        if (!$perguntas) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('perguntas', $perguntas);

        if ($this->request->is('post')) {
            foreach ($this->request->data['Trabalhadoresresposta'] as $values) {
                $this->Trabalhadoresresposta->create();
                $this->Trabalhadoresresposta->save($values);
            }
            $this->Session->setFlash(__('Questionario respondido'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function telaQuestionarioEdit($trabalhadorId = null, $respostaId = null) {
        if (!$respostaId) {
            throw new NotFoundException(__('Invalid'));
        }

        $resposta = $this->Trabalhadoresresposta->findById($respostaId);
        if (!$resposta) {
            throw new NotFoundException(__('Invalid'));
        }

        $pergunta = $this->Trabalhadorespergunta->findById($resposta['Trabalhadoresresposta']['trabalhadorespergunta_id']);
        if (!$pergunta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('pergunta', $pergunta);

        if ($this->request->is(array('post', 'put'))) {
            $this->Trabalhadoresresposta->id = $respostaId;
            if ($this->Trabalhadoresresposta->save($this->request->data)) {
                $this->Session->setFlash(__('Registro alterado'));
                return $this->redirect(array('action' => 'telaQuestionarioIndex', $trabalhadorId));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $resposta;
        }
    }

    public function telaQuestionarioUpdate($trabalhadorId = null) {
        if (!$trabalhadorId) {
            throw new NotFoundException(__('Invalid'));
        }

        $respostas = $this->Trabalhadoresresposta->find('all', array('conditions' => array('trabalhador_id' => $trabalhadorId)));

        $perguntas = $this->Trabalhadorespergunta->find('all');
        if (!$perguntas) {
            throw new NotFoundException(__('Invalid'));
        }

        $test = array();
        $test2 = array();

        foreach ($respostas as $resposta) {
            $test[] = $resposta['Trabalhadoresresposta']['trabalhadorespergunta_id'];
        }
        foreach ($perguntas as $pergunta) {
            $test2[] = $pergunta['Trabalhadorespergunta']['id'];
        }

        $diff = array_diff($test2, $test);

        foreach ($diff as $value) {
            $values = array('resposta' => '', 'trabalhador_id' => $trabalhadorId, 'trabalhadorespergunta_id' => $value);
            $this->Trabalhadoresresposta->create();
            $this->Trabalhadoresresposta->save($values);
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $trabalhador = $this->Trabalhador->findById($id);
        if (!$trabalhador) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('trabalhador', $trabalhador);
    }

    public function add() {
        $perguntas = $this->Trabalhadorespergunta->find('all');

        if ($this->request->is('post')) {
            $this->Trabalhador->create();
            if ($this->Trabalhador->save($this->request->data)) {
                $this->Session->setFlash(__('Trabalhador cadastrado'));
                if (!$perguntas) {
                    $this->Session->setFlash(__('Não foi possivel responder questionario'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    return $this->redirect(array('action' => 'telaQuestionarioAdd', $this->Trabalhador->id));
                }
            } else {
                $this->Session->setFlash(__('Não foi possivel cadastrar trabalhador'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $trabalhador = $this->Trabalhador->findById($id);
        if (!$trabalhador) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Trabalhador->id = $id;
            if ($this->Trabalhador->save($this->request->data)) {
                $this->Session->setFlash(__('Registro alterado'));
                return $this->redirect(array('action' => 'index'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $trabalhador;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new NotAllowedException(__('Not allowed'));
        }

        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $trabalhador = $this->Trabalhador->findById($id);
        if (!$trabalhador) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->Trabalhador->delete($id)) {
            $this->Session->setFlash(__('Trabalhador removido'));
        } else {
            $this->Session->setFlash(__('Não foi possivel remover trabalhador'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
