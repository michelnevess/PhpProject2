<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Trabalhadorespergunta extends AppModel {
    
    public $validate = array(
        'pergunta' => array('rule' => 'notEmpty')
    );
    
    public $hasMany = array('Trabalhadoresresposta' => array('dependent' => true));
    
}