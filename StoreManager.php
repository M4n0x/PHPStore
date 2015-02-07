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
    
    /**
     *
     * @var String 
     */
    private $_storeId;
    
    /**
     * 
     * @param String $storeId storeid to retrieve the storeData
     */
    function __construct($storeId) {
        $this->_storeId = $storeId;
    }

    
    protected function initStore(CacheComponent $cacheObj) {
        $this->cacheObj = $cacheObj;
        $store = $this->cacheObj->get($this->_storeId);
        
        if ($store) {
            $this->_index = $store;
        } else {
            $this->_index = new StoreIndex();
            $this->cacheObj->save($this->_storeId,$this->_index);
        }
        
        $this->_index->attach($this);
    }
    
    protected function existId($id, $type = null) {
        //check if the data is in the store and his state is ok, push it in store in
    }
    
    public function store(DataInterface $data) {
        if (empty($data->getId())) {
            $this->createData($data);
        }else if ($this->existId($data->getId())) {
            $this->updateData($data);
        } else {
            throw new StoreException("data has an id but not exist in store ??  What we have to do ? -> " + var_export($data));
        }
    }
    
    public function writeStory(DataInterface $data) {
        
    }
    
    public function deleteData(DataInterface $data) {
        if ($this->cacheObj->exist($data->getId())) {
            $this->_store->removeData($data);
            $this->cacheObj->delete($data->getId());
            return true;
        }
        return false;
    }
    
    public function getData($dataId) {
        //rebuild dependencies ??
        if (!empty($dataId) && $this->existId($dataId)) {
            //TODO: check existance in store to detecting conflict
            $this->cacheObj->get($dataId);
        } else {
            return false;
        }
    }
    
    protected function updateData(DataInterface $data) {
        //check valid id + go to cache + update indexer
        if (!empty($data) &&!empty($data->getId())) {
            throw new StoreException("Trying to update a data that was not created.");
        }
        
        if ($this->existId($data->getId())) {
            
        }
        
    }
    
    protected function createData(DataInterface $data) {
        $data->setId($this->_index->getNewId());
        
        $this->cacheObj->save($data->getId(), $data);
        $this->_index->addData($data);
    }
    
    
    /**
     * Method will return a fresh id not used in store
     * @return String composed id with the store name and an increment number
     */
    public function getNewId() {
        $newId = &$this->_index->getLastId();
        $newId++;
        $this->_index->setLastId($newId);
        
        $dataId = $this->_storeId . "_" . $newId;
        
        if (!$this->existId($dataId)) {
            //CAUTION CAN CAUSE INFINITY LOOP
            $dataId = $this->getNewId();
        }
        
        return $dataId;
    }
    
    private function saveStore(){
        //merging current store and cache stored
    }
    
    public function __destruct() {
        $this->saveStore();
    }
    

}
