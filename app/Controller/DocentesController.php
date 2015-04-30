<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DocentesController extends AppController {

    public $helpers = array('Html', 'Form');
    public $uses = array('Docente', 'Docentespergunta', 'Docentesresposta');

    public function index() {
        $this->set('perguntas', $this->Docentespergunta->find('all'));
        $this->set('docentes', $this->Docente->find('all'));
    }

    public function telaQuestionarioIndex($docenteId = null) {
        if (!$docenteId) {
            throw new NotFoundException(__('Invalid'));
        }
        $this->telaQuestionarioUpdate($docenteId);

        $this->set('docenteId', $docenteId);

        $respostas = $this->Docentesresposta->find('all', array(
            'conditions' => array('docente_id' => $docenteId), 
            'order' => array('Docentesresposta.docentespergunta_id ASC')));
        if (!$respostas) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('respostas', $respostas);

        $perguntas = $this->Docentespergunta->find('all', array('order' => 'Docentespergunta.id ASC'));
        if (!$perguntas) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('perguntas', $perguntas);
    }

    public function telaQuestionarioView($respostaId = null, $perguntaId = null) {

        $resposta = $this->Docentesresposta->findById($respostaId);
        if (!$resposta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('resposta', $resposta);

        $pergunta = $this->Docentespergunta->findById($perguntaId);
        if (!$pergunta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('pergunta', $pergunta);
    }

    public function telaQuestionarioAdd($docenteId = null) {
        if (!$docenteId) {
            throw new NotFoundException(__('Invalid'));
        }

        $docente = $this->Docente->findById($docenteId);
        if (!$docente) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('docente', $docente);

        $perguntas = $this->Docentespergunta->find('all');
        if (!$perguntas) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('perguntas', $perguntas);

        if ($this->request->is('post')) {
            foreach ($this->request->data['Docentesresposta'] as $values) {
                $this->Docentesresposta->create();
                $this->Docentesresposta->save($values);
            }
            $this->Session->setFlash(__('Questionario respondido'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function telaQuestionarioEdit($docenteId = null, $respostaId = null) {
        if (!$respostaId) {
            throw new NotFoundException(__('Invalid'));
        }

        $resposta = $this->Docentesresposta->findById($respostaId);
        if (!$resposta) {
            throw new NotFoundException(__('Invalid'));
        }

        $pergunta = $this->Docentespergunta->findById($resposta['Docentesresposta']['docentespergunta_id']);
        if (!$pergunta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('pergunta', $pergunta);

        if ($this->request->is(array('post', 'put'))) {
            $this->Docentesresposta->id = $respostaId;
            if ($this->Docentesresposta->save($this->request->data)) {
                $this->Session->setFlash(__('Registro alterado'));
                return $this->redirect(array('action' => 'telaQuestionarioIndex', $docenteId));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $resposta;
        }
    }

    public function telaQuestionarioUpdate($docenteId = null) {
        if (!$docenteId) {
            throw new NotFoundException(__('Invalid'));
        }

        $respostas = $this->Docentesresposta->find('all', array('conditions' => array('docente_id' => $docenteId)));

        $perguntas = $this->Docentespergunta->find('all');
        if (!$perguntas) {
            throw new NotFoundException(__('Invalid'));
        }

        $test = array();
        $test2 = array();

        foreach ($respostas as $resposta) {
            $test[] = $resposta['Docentesresposta']['docentespergunta_id'];
        }
        foreach ($perguntas as $pergunta) {
            $test2[] = $pergunta['Docentespergunta']['id'];
        }

        $diff = array_diff($test2, $test);

        foreach ($diff as $value) {
            $values = array('resposta' => '', 'docente_id' => $docenteId, 'docentespergunta_id' => $value);
            $this->Docentesresposta->create();
            $this->Docentesresposta->save($values);
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $docente = $this->Docente->findById($id);
        if (!$docente) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('docente', $docente);
    }

    public function add() {
        $perguntas = $this->Docentespergunta->find('all');

        if ($this->request->is('post')) {
            $this->Docente->create();
            if ($this->Docente->save($this->request->data)) {
                $this->Session->setFlash(__('Docente cadastrado'));
                if (!$perguntas) {
                    $this->Session->setFlash(__('Não foi possivel responder questionario'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    return $this->redirect(array('action' => 'telaQuestionarioAdd', $this->Docente->id));
                }
            } else {
                $this->Session->setFlash(__('Não foi possivel cadastrar docente'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $docente = $this->Docente->findById($id);
        if (!$docente) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Docente->id = $id;
            if ($this->Docente->save($this->request->data)) {
                $this->Session->setFlash(__('Registro alterado'));
                return $this->redirect(array('action' => 'index'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $docente;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new NotAllowedException(__('Not allowed'));
        }

        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $docente = $this->Docente->findById($id);
        if (!$docente) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->Docente->delete($id)) {
            $this->Session->setFlash(__('Docente removido'));
        } else {
            $this->Session->setFlash(__('Não foi possivel remover docente'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}