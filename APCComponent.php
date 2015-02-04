<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APCComponent
 *
 * @author Steve
 */
class APCComponent implements CacheComponent {
    
    
    public function getInstance($storeName) {
        $store = apc_fetch($storeName);
        
        return $store;
    }
    
    public function setInstance($storeName, $store) {
        if (!empty($store)) {
            apc_store($storeName, serialize($store));
        } else {
            throw new StoreException("The store can't be empty, otherwise no need to be stored");
        }
    }
    
    public function save($keyName, DataInterface $data) {
        apc_store($keyName, $data);
    }
    
    public function exist($keyName) {
        return !empty(apc_fetch($keyName));
    }
    
    public function get($keyName) {
        return apc_fetch($keyName);
    }
    
    public function deleteKey($keyName) {
        return apc_delete($keyName);
    }
}
