<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DocentesperguntasController extends AppController {
    
    public $helpers = array('Html', 'Form');
    
    public function index() {
        $this->set('perguntas', $this->Docentespergunta->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $pergunta = $this->Docentespergunta->findById($id);
        if (!$pergunta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('pergunta', $pergunta);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Docentespergunta->create();
            if ($this->Docentespergunta->save($this->request->data)) {
                $this->Session->setFlash(__('Pergunta cadastrada'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possivel cadastrar Pergunta'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $pergunta = $this->Docentespergunta->findById($id);
        if (!$pergunta) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Docentespergunta->id = $id;
            if ($this->Docentespergunta->save($this->request->data)) {
                $this->Session->setFlash(__('Registro alterado'));
                return $this->redirect(array('action' => 'index'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $pergunta;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new NotAllowedException(__('Not allowed'));
        }

        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $pergunta = $this->Docentespergunta->findById($id);
        if (!$pergunta) {
            throw new NotFoundException(__('Invalid'));
        }
        
        if($this->Docentespergunta->delete($id)){
            $this->Session->setFlash(__('Pergunta removida'));
        } else {
            $this->Session->setFlash(__('Não foi possivel remover Pergunta'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
}
