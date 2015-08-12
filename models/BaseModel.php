<?php

require_once '../bootstrap.php';

class Model {

    protected static $dbc;
    protected static $table;

    public $attributes = array();

    /*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    protected static function dbConnect()
    {

        if (!self::$dbc)
        {
            self::$dbc = new PDO('mysql:host=' . $_ENV['DB_HOST'] .
                ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);

            // Tell PDO to throw exceptions on error
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    /*
     * Get a value from attributes based on name
     */
    public function __get($name)
    {
        // Return the value from attributes with a matching $name, if it exists
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        return null;
    }

    /*
     * Set a new attribute for the object
     */
    public function __set($name, $value)
    {
        // Store name/value pair in attributes array
        $this->attributes[$name] = $value;
    }

}
