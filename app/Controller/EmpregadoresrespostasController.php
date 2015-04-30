<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EmpregadoresrespostasController extends AppController {
    
    public $helpers = array('Html', 'Form');
    
    public function index() {
        $this->set('respostas', $this->Empregadoresresposta->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $resposta = $this->Empregadoresresposta->findById($id);
        if (!$resposta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('resposta', $resposta);
    }

    /*public function add() {
        if ($this->request->is('post')) {
            $this->Empregadoresresposta->create();
            if ($this->Empregadoresresposta->save($this->request->data)) {
                $this->Session->setFlash(__('Resposta cadastrada'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possivel cadastrar Resposta'));
            }
        }
    }*/

    /*public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $empregador = $this->Empregadoresresposta->findById($id);
        if (!$empregador) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Empregadoresresposta->id = $id;
            if ($this->Empregadoresresposta->save($this->request->data)) {
                $this->Session->setFlash(__('Registro alterado'));
                return $this->redirect(array('action' => 'index'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $empregador;
        }
    }*/

    /*public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new NotAllowedException(__('Not allowed'));
        }

        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $empregador = $this->Empregadoresresposta->findById($id);
        if (!$empregador) {
            throw new NotFoundException(__('Invalid'));
        }
        
        if($this->Empregadoresresposta->delete($id)){
            $this->Session->setFlash(__('Resposta removida'));
        } else {
            $this->Session->setFlash(__('Não foi possivel remover Resposta'));
        }
        return $this->redirect(array('action' => 'index'));
    }*/
}