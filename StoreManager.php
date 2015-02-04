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
   
    /**
     * 
     * @var CacheComponent 
     */
    protected $cacheObj;
    
    /**
     *
     * @var StoreIndex 
     */
    protected $_index;
       
    protected function initStore(CacheComponent $cacheObj) {
        $this->cacheObj = $cacheObj;
        $store = $this->cacheObj->getInstance();
        
        if ($store) {
            $this->_index = $store;
        } else {
            $this->_index = new StoreIndex();
            $this->cacheObj->setInstance($this->_index);
        }
    }
    
    protected function existId($id, $type = null) {
        
    }
    
    public function store(DataInterface $data) {
        if (empty($data->getId())) {
            $this->create($data);
        }else if ($this->existId($data->getId())) {
            $this->update($data);
        } else {
            throw new StoreException("data has an id but not exist in store ?? -> " + var_export($data));
        }
    }
    
    public function writeStory(DataInterface $data) {
        
    }
    
    public function delete(DataInterface $data) {
        if ($this->cacheObj->exist($data->getId())) {
            $this->_store->removeData($data);
            $this->cacheObj->delete($data->getId());
            return true;
        }
        return false;
    }
    
    public function getData($dataId) {
        //rebuild dependencies
        if (!empty($dataId) && $this->cacheObj->exist($dataId)) {
            $this->cacheObj->get($dataId);
        } else {
            return false;
        }
    }
    
    protected function update(DataInterface $data) {
        //check valid id + go to cache + update indexer
    }
    
    protected function create(DataInterface $data) {
        $data->setId($this->_index->getNewId());
        
        $this->cacheObj->save($data->getId(), $data);
        $this->_index->addData($data);
    }
    
    public function getNewId() {
        $newId = &$this->_index->getLastId();
        $newId++;
        
        $this->_index->setLastId($newId);
        return $newId;
    }
    

}
