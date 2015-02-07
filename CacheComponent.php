<?php

/**
 * Manage your cache component here 
 *
 * @author Steve Reis <stevereis@bluewin.ch>
 * @version 5.2.3
 * @link http://stormbox.ch/store website for the store NoSQL
 */
interface CacheComponent {
    
    /**
     * Method used to store data in cache
     * @param String $keyName data id --> keyname
     * @param DataInterface $data
     */
    public function save($keyName, DataInterface $data);
    
    /**
     * Method used to retrieve data from cache store
     * @param String $keyName data id --> keyname
     */
    public function get($keyName);
    
    /**
     * Method used to check if a ref exist before writing down
     * @param String $keyName data id --> keyname
     */
    public function exist($keyName);
    
    /**
     * Method use to delete reference in cache
     * @param String $keyName
     */
    public function delete($keyName);
}
