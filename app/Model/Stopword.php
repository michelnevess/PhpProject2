<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Stopword extends AppModel {
    
    public $validate = array(
        'termo' => array('rule' => 'notEmpty'));
    
}
