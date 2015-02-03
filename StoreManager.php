<?php

/*
 * TODO: Define header
 */

/**
 * Ressource Manager
 *
 * @author Steve Reis <stevereis@bluewin.ch>
 * @version 5.2.3
 * @link http://stormbox.ch/store website for more informations about this store
 */
class StoreManager {
    protected $_store;
    protected $_cacheObj;
    
    protected function initStore(CacheComponent $cacheObj) {
        $this->_cacheObj = $cacheObj;
        $store = $this->_cacheObj->getInstance();
        
        if ($store) {
            $this->_store = $store;
        } else {
            $this->_store = new StoreData();
            $this->_cacheObj->setInstance($this->_store);
        }
    }
    
    protected function existId($id, $type = null) {
        
    }
}
