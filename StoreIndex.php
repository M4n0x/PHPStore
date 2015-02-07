<?php

/*
 * TODO: Define header
 */

/**
 * Used to keep track on all objects
 *
 * @author Steve Reis <stevereis@bluewin.ch>
 * @version 5.2.3
 * @link http://stormbox.ch/store website for more informations about this store
 */
class StoreIndex {
    private $_lastId = 0;
    private $_store = array();
    
    function &getLastId() {
        return $this->_lastId;
    }

    function &getStore() {
        return $this->_store;
    }
    
    function removeData(DataInterface $data) {
        unset($this->_store[get_class($data)][$data->getId()]);
    }
    
    public function addData(DataInterface $data) {
        //Fabric metadata
        if (empty($data) || empty($data->getId()) || $this->existData($data)) {
            return false;
        }
        return $this->_store[get_class($data)][$data->getId()] = $data->getSignature();
    }
    
    public function updateData(DataInterface $data) {
        //Fabric metadata
        if (!empty($data) && !empty($data->getId()) && $this->existData($data)) {
            return $this->_store[get_class($data)][$data->getId()] = $data->getSignature();
        }
        return false;
    }
    
    function existData(DataInterface $data) {
        return array_key_exists($this->_store, $data->getId());
    }

    function setLastId($lastId) {
        $this->_lastId = $lastId;
    }

    function setStore($store) {
        $this->_store = $store;
    }

}
