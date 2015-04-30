<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Docentesresposta extends AppModel {
    
    public $belongsTo = array('Docente', 'Docentespergunta');
    
}

