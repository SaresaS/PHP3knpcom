<?php

/**
 * Created by PhpStorm.
 * User: saresa
 * Date: 7/6/16
 * Time: 9:16 AM
 */
class Address
{
    //public properties
    public $street_address_1;
    public $street_address_2;
    public $city;
    public $subdivision;
    //changed to protected to practice magic __get and __set
    protected $_postal_code;
    public $country;

    //protected ... not able to access in demo unless accessed correctly
    protected $_address_id;
    protected $_time_created;
    protected $_time_updated;

   

    /**
     * @param $name
     * @return mixed|null
     */
    function __get ($name)
    {
        //Postal code look up unset
        if (!$this->_postal_code)
        {
            $this->_postal_code = $this-> _postal_code_guess();
        }

        //attempt return postal code by name
        $protected_property_name = '_' . $name;
        if (property_exists($this, $protected_property_name))
        {
            return $this->$protected_property_name;
        }

        //if unable to set postal code return error
        trigger_error('Undefined property via __get' . $name);
        return NULL;
    }

    /**
     * @param $name
     * @param $value
     */
    function __set($name, $value)
    {
        //allow anything to set postal code
        if('postal_code' == $name)
        {
            $this->$name = $value;
            return;
        }
        //unable to access property: trigger error
        trigger_error('Undefined of unallowed property via --set()' . $name);
    }


    /**
     * Guess postal code umber if missing
     * @todo replace with DB lookup code
     * @return string
     */
    protected function _postal_code_guess()
    {
        return 'LOOKUP';
    }

    /** method to display address in html
     * @return string
     */
    function display()
    {
        $output = '';

        //street address
        $output .= $this->street_address_1;
        if ($this->street_address_2){
            $output .= $this->street_address_2;
            }
        $output .= '</br>';

        //city, state and postal
        $output .= $this->city . ", " . $this->subdivision . " ". $this->postal_code;
        $output .= '</br>';

        //country
        $output .= $this-> country;
        $output .= '</br>';

        return $output;
    }
}