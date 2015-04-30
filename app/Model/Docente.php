<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Docente extends AppModel {

    public $validate = array(
        'nome' => array('rule' => 'notEmpty'),
        'area' => array('rule' => 'notEmpty'),
        'formacao' => array('rule' => 'notEmpty'),
        'tempo_atuacao' => array(
            array('rule' => 'notEmpty'),
            array('rule' => 'numeric', 'message' => 'Campo numérico'))
    );
    
    public $hasMany = array('Docentesresposta' => array('dependent' => true));

}
