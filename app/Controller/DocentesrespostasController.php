<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DocentesrespostasController extends AppController {
    
    public $helpers = array('Html', 'Form');
    
    public function index() {
        $this->set('respostas', $this->Docentesresposta->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $resposta = $this->Docentesresposta->findById($id);
        if (!$resposta) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('resposta', $resposta);
    }

}


