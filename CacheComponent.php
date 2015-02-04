<?php

/**
 * Manage your cache component here 
 *
 * @author Steve Reis <stevereis@bluewin.ch>
 * @version 5.2.3
 * @link http://stormbox.ch/store website for the store NoSQL
 */
interface CacheComponent {
    
    public function getKeyStoreName();
    
    /**
     * @return StoreData|false StoreData to play with, or false if not set
     */
    public function getInstance();
    
    /**
     * This method will only manage saving the StoreData on the cache (by serializing by exemple)
     * @param StoreData $store
     */
    public function setInstance(StoreData $store);
    
    
    /**
     * Method used to store data in cache
     * @param DataInterface $data
     */
    public function saveData(DataInterface $data);
    
    
    /**
     * Method used to retrieve data from cache store
     * @param String $dataId key used to store data
     */
    public function getFromCache($dataId);
    
    /**
     * Method used to check if a ref exist before writing down
     * @param String $data id
     */
    public function existData(DataInterface $data);
    
    /**
     * Method use to delete reference in cache
     * @param DataInterface $data
     */
    public function deleteData(DataInterface $data);
}
