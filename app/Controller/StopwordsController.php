<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StopwordsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('stopwords', $this->Stopword->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $stopword = $this->Stopword->findById($id);
        if (!$stopword) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('stopword', $stopword);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Stopword->create();
            if ($this->Stopword->save($this->request->data)) {
                $this->Session->setFlash('Stop word cadastrada');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Não foi possivel cadastrar stop word');
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $stopword = $this->Stopword->findById($id);
        if (!$stopword) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Stopword->id = $id;
            if ($this->Stopword->save($this->request->data)) {
                $this->Session->setFlash('Registro alterado');
                return $this->redirect(array('action' => 'index'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $stopword;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new NotAllowedException(__('Not allowed'));
        }

        if (!$id) {
            throw new NotFoundException(__('Invalid id'));
        }

        $stopword = $this->Stopword->findById($id);
        if (!$stopword) {
            throw new NotFoundException(__('Invalid id'));
        }
        
        if($this->Stopword->delete($id)){
            $this->Session->setFlash('Stop word removida');
        } else {
            $this->Session->setFlash('Não foi possivel remover stop word');
        }
        return $this->redirect(array('action' => 'index'));
    }
}
