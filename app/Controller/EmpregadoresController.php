<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EmpregadoresController extends AppController { // Sou o Victor

    public $helpers = array('Html', 'Form');
    public $uses = array('Empregador', 'Empregadorespergunta', 'Empregadoresresposta');

    public function index() {
        $this->set('perguntas', $this->Empregadorespergunta->find('all'));
        $this->set('empregadores', $this->Empregador->find('all'));
    }

    public function telaQuestionarioIndex($empregadorId = null) {
        if (!$empregadorId) {
            throw new NotFoundException(__('Invalid'));
        }
        $this->telaQuestionarioUpdate($empregadorId);

        $this->set('empregadorId', $empregadorId);

        $respostas = $this->Empregadoresresposta->find('all', array(
            'conditions' => array('empregador_id' => $empregadorId), 
            'order' => array('Empregadoresresposta.empregadorespergunta_id ASC')));
        if (!$respostas) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('respostas', $respostas);

        $perguntas = $this->Empregadorespergunta->find('all', array('order' => 'Empregadorespergunta.id ASC'));
        if (!$perguntas) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('perguntas', $perguntas);
    }

    public function telaQuestionarioView($respostaId = null, $perguntaId = null) {

        $resposta = $this->Empregadoresresposta->findById($respostaId);
        if (!$resposta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('resposta', $resposta);

        $pergunta = $this->Empregadorespergunta->findById($perguntaId);
        if (!$pergunta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('pergunta', $pergunta);
    }

    public function telaQuestionarioAdd($empregadorId = null) {
        if (!$empregadorId) {
            throw new NotFoundException(__('Invalid'));
        }

        $empregador = $this->Empregador->findById($empregadorId);
        if (!$empregador) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('empregador', $empregador);

        $perguntas = $this->Empregadorespergunta->find('all');
        if (!$perguntas) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('perguntas', $perguntas);

        if ($this->request->is('post')) {
            foreach ($this->request->data['Empregadoresresposta'] as $values) {
                $this->Empregadoresresposta->create();
                $this->Empregadoresresposta->save($values);
            }
            $this->Session->setFlash(__('Questionario respondido'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function telaQuestionarioEdit($empregadorId = null, $respostaId = null) {
        if (!$respostaId) {
            throw new NotFoundException(__('Invalid'));
        }

        $resposta = $this->Empregadoresresposta->findById($respostaId);
        if (!$resposta) {
            throw new NotFoundException(__('Invalid'));
        }

        $pergunta = $this->Empregadorespergunta->findById($resposta['Empregadoresresposta']['empregadorespergunta_id']);
        if (!$pergunta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('pergunta', $pergunta);

        if ($this->request->is(array('post', 'put'))) {
            $this->Empregadoresresposta->id = $respostaId;
            if ($this->Empregadoresresposta->save($this->request->data)) {
                $this->Session->setFlash(__('Registro alterado'));
                return $this->redirect(array('action' => 'telaQuestionarioIndex', $empregadorId));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $resposta;
        }
    }

    public function telaQuestionarioUpdate($empregadorId = null) {
        if (!$empregadorId) {
            throw new NotFoundException(__('Invalid'));
        }

        $respostas = $this->Empregadoresresposta->find('all', array('conditions' => array('empregador_id' => $empregadorId)));

        $perguntas = $this->Empregadorespergunta->find('all');
        if (!$perguntas) {
            throw new NotFoundException(__('Invalid'));
        }

        $test = array();
        $test2 = array();

        foreach ($respostas as $resposta) {
            $test[] = $resposta['Empregadoresresposta']['empregadorespergunta_id'];
        }
        foreach ($perguntas as $pergunta) {
            $test2[] = $pergunta['Empregadorespergunta']['id'];
        }

        $diff = array_diff($test2, $test);

        foreach ($diff as $value) {
            $values = array('resposta' => '', 'empregador_id' => $empregadorId, 'empregadorespergunta_id' => $value);
            $this->Empregadoresresposta->create();
            $this->Empregadoresresposta->save($values);
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $empregador = $this->Empregador->findById($id);
        if (!$empregador) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('empregador', $empregador);
    }

    public function add() {
        $perguntas = $this->Empregadorespergunta->find('all');

        if ($this->request->is('post')) {
            $this->Empregador->create();
            if ($this->Empregador->save($this->request->data)) {
                $this->Session->setFlash(__('Empregador cadastrado'));
                if (!$perguntas) {
                    $this->Session->setFlash(__('Não foi possivel responder questionario'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    return $this->redirect(array('action' => 'telaQuestionarioAdd', $this->Empregador->id));
                }
            } else {
                $this->Session->setFlash(__('Não foi possivel cadastrar empregador'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $empregador = $this->Empregador->findById($id);
        if (!$empregador) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Empregador->id = $id;
            if ($this->Empregador->save($this->request->data)) {
                $this->Session->setFlash(__('Registro alterado'));
                return $this->redirect(array('action' => 'index'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $empregador;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new NotAllowedException(__('Not allowed'));
        }

        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $empregador = $this->Empregador->findById($id);
        if (!$empregador) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->Empregador->delete($id)) {
            $this->Session->setFlash(__('Empregador removido'));
        } else {
            $this->Session->setFlash(__('Não foi possivel remover empregador'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}

