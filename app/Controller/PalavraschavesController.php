<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PalavraschavesController extends AppController {
    
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('palavraschaves', $this->Palavraschave->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $palavraschave = $this->Palavraschave->findById($id);
        if (!$palavraschave) {
            throw new NotFoundException(__('Invalid'));
        }
        
        $this->set('palavraschave', $palavraschave);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Palavraschave->create();
            if ($this->Palavraschave->save($this->request->data)) {
                $this->Session->setFlash('Palavraschave cadastrado');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Não foi possivel cadastrar palavra chave');
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $palavraschave = $this->Palavraschave->findById($id);
        if (!$palavraschave) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Palavraschave->id = $id;
            if ($this->Palavraschave->save($this->request->data)) {
                $this->Session->setFlash('Registro Alterado');
                return $this->redirect(array('action' => 'index'));
            }
        }
        if (!$this->request->data) {
            $this->request->data = $palavraschave;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new NotAllowedException(__('Not allowed'));
        }

        if (!$id) {
            throw new NotFoundException(__('Invalid id'));
        }

        $palavraschave = $this->Palavraschave->findById($id);
        if (!$palavraschave) {
            throw new NotFoundException(__('Invalid id'));
        }
        
        if($this->Palavraschave->delete($id)){
            $this->Session->setFlash('Palavra chave removida');
        } else {
            $this->Session->setFlash('Não foi possivel remover palavra chave');
        }
        return $this->redirect(array('action' => 'index'));
        
    }

}
