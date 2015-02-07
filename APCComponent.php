<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Basic layer, only to crud fonction with a cache mechanism (can simply be a text file by exemple)
 *
 * @author Steve
 */
class APCComponent implements CacheComponent {
    
    public function save($keyName, DataInterface $data) {
        apc_store($keyName, $data);
    }
    
    public function exist($keyName) {
        return !empty(apc_fetch($keyName));
    }
    
    public function get($keyName) {
        return apc_fetch($keyName);
    }
    
    public function delete($keyName) {
        return apc_delete($keyName);
    }
}
