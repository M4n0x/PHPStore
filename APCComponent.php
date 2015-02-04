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
    const KEYSTORE = "bluestorm_apc";
    
    public function getKeyStoreName() {
        return $this->_keystore;
    }
    
    public function getInstance() {
        $store = apc_fetch($this->getKeyStoreName());
        
        return $store;
    }
    
    public function setInstance($store) {
        if (!empty($store)) {
            apc_store($this->getKeyStoreName(), serialize($store));
        } else {
            throw new StoreException("The store can't be empty, otherwise no need to be stored");
        }
    }
    
    public function saveData(\DataInterface $data) {
        ;
    }
    
    public function existData(\DataInterface $data) {
        ;
    }
    
    public function getFromCache($dataId) {
        ;
    }
    
    public function deleteData(\DataInterface $data) {
        ;
    }
}
