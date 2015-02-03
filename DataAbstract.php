<?php

/*
 * TODO: Define header
 */

/**
 * Basic data structure.
 *
 * @author Steve Reis <stevereis@bluewin.ch>
 * @version 5.2.3
 * @link http://stormbox.ch/store website for the store NoSQL
 */
abstract class DataAbstract implements DataInterface {
    /*
     * Id of the data, the most important part !
     * @var String
     */
    private $_Id;

    /**
     * The value determine if the data can be update when an attribute is modified
     * @var boolean 
     */
    private $_UpdateOnChange = false;

    /**
     * This attribute determine if observers can be notified on change
     * @var boolean 
     */
    private $_NotifyRelations = false;

    /**
     * Contains all observers
     * @var array 
     */
    private $observers = array();

    //add observer
    public function attach(\SplObserver $observer) {
        $this->observers[] = $observer;
    }

    //remove observer
    public function detach(\SplObserver $observer) {

        $key = array_search($observer, $this->observers, true);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    //notify observers(or some of them)
    public function notify() {
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }

    abstract public function update(\SplSubject $subject);

    public function getSignature() {
        return md5(serialize($this));
    }

    public function getId() {
        return $this->_Id;
    }

    public function setId($string) {
        $this->_Id = $string;
    }

    public function canBeUpdateOnChange() {
        return $this->_UpdateOnChange;
    }

    
    public function canNotifyRelations() {
        return $this->_NotifyRelations;
    }

    function setCanBeUpdateOnChange($canBeUpdateOnChange) {
        $this->_UpdateOnChange = $canBeUpdateOnChange;
    }

    function setCanNotifyRelations($canNotifyRelations) {
        $this->_NotifyRelations = $canNotifyRelations;
    }


}
