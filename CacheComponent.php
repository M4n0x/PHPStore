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
}
