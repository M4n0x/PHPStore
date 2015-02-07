<?php
/*
 * TODO: Define header
 */

/**
 * Implement this interface to be able to store your data.
 *
 * @author Steve Reis <stevereis@bluewin.ch>
 * @version 5.2.3
 * @link http://stormbox.ch/store website for more informations about this store
 */
interface DataInterface extends \SplObserver, \SplSubject {
    CONST DATA_CREATED = 0;
    CONST DATA_UPDATED = 1;
    CONST DATA_OK      = 2;
    CONST DATA_DELETED = 3;

    
    /**
     * @return String return a signature (originally a MD5 of current object) to check if object changed
     */
    public function getSignature();
    
    /**
     * return unique identifier
     * @return String 
     */
    public function getId();
    
    /**
     * Set unique Identifier
     * @param String $string
     */
    public function setId($string);
    
    /**
     * Allow to get current operation on data >_ update, create, delete (you have to implement an attribut type int)
     */
    public function getState();
    
    /**
     * Allow to set state of data (you have to implement an attribut type int (same attribut as above))
     * @param int $data_state use CONST in DataInterface
     */
    public function setState($data_state);
 
}
