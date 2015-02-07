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
     * Contains all observers
     * @var array 
     */
    private $_observers = array();
    
    /**
     * State of data
     * @var int State of data
     */
    private $_state = DataInterface::DATA_CREATE;

    //add observer
    public function attach(\SplObserver $observer) {
        $this->_observers[] = $observer;
    }

    //remove observer
    public function detach(\SplObserver $observer) {

        $key = array_search($observer, $this->_observers, true);
        if ($key) {
            unset($this->_observers[$key]);
        }
    }

    //notify observers(or some of them)
    public function notify() {
        foreach ($this->_observers as $value) {
            $value->update($this);
        }
    }

    //abstract public function update(\SplSubject $subject);

    public function getSignature() {
        return md5(serialize($this));
    }

    public function getId() {
        return $this->_Id;
    }

    public function setId($string) {
        $this->_Id = $string;
    }
    
    function getState() {
        return $this->_state;
    }

    function setState($state) {
        $this->_state = $state;
    }
    
}
