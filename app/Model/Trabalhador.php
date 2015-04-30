<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Trabalhador extends AppModel {

    public $validate = array(
        'nome' => array('rule' => 'notEmpty'),
        'formacao' => array('rule' => 'notEmpty')
    );
    
    public $hasMany = array('Trabalhadoresresposta' => array('dependent' => true));

}
