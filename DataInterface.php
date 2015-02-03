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
    
    /**
     * Method call when Subject notifying observers. you can cast multiple updater like update(StoreManager) {//do this } or update(MemberData){//update related content}
     * @param \SplSubject $subject
     */
    //public function update(\SplSubject $subject);
    
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
     * Return a boolean. TRUE each change store directly on the store, FALSE you have to use StoreManager->store() to manually store data.
     * @return boolean
     */
    public function canBeUpdateOnChange();
    
    /**
     * When changes are made on data, call all referenced types.
     * @return boolean TRUE Notify reference objects, FALSE referenced object is not called.
     */
    public function canNotifyRelations();
    
    /**
     * Return a boolean. TRUE each change store directly on the store, FALSE you have to use StoreManager->store() to manually store data.
     * @param boolean $canBeUpdateOnChange
     */
    public function setCanBeUpdateOnChange($canBeUpdateOnChange);
    
    /**
     * When changes are made on data, call all referenced types.
     * @param boolean $canNotifyRelations
     */
    public function setCanNotifyRelations($canNotifyRelations);
    
}
