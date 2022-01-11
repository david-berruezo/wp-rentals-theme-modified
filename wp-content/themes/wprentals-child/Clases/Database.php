<?php

class Database {

    protected static $instance;

    private static $credential = "automocion";

    # server
    private static $vector_configuration_database = array(
        
    );



    public function __construct() {
        // empty constructor
    }


    public static function getInstance() {

        if(empty(self::$instance)) {

            $db_index = self::$credential;
            $db_info = self::$vector_configuration_database[$db_index];
            //echo "crdencial " .$db_index. "<br>";
            //p_($db_info);

            try {
                self::$instance = new wpdb($db_info['db_user'],$db_info['db_pass'],$db_info['db_name'],'localhost');
            } catch(PDOException $error) {
                echo $error->getMessage();
            }

        }

        return self::$instance;

    }// end function


    private function connectPDO()
    {

        $db_index = self::$credential;
        $db_info = self::$vector_configuration_database[$db_index];

        self::$instance = new PDO("mysql:host=".$db_info['db_host'].';port='.$db_info['db_port'].';dbname='.$db_info['db_name'], $db_info['db_user'], $db_info['db_pass']);
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        self::$instance->query('SET NAMES utf8');
        self::$instance->query('SET CHARACTER SET utf8');

    } // end function


    /**
     * @return string
     */
    public function getCredential()
    {
        return self::getStaticCredential();
    }


    /**
     * @param string $credential
     */
    public function setCredential($credential)
    {
        //$this->credential = $credential;
        self::setStaticCredential($credential);
    }


    /**
     * @return string
     */
    public function getStaticCredential()
    {
        return self::$credential;
    }


    /**
     * @param string $credential
     */
    public function setStaticCredential($credential)
    {
        self::$credential = $credential;
    }


    public static function setCharsetEncoding() {

        if (self::$instance == null) {
            self::connect();
        }

        self::$instance->exec(
            "SET NAMES 'utf8';
            SET character_set_connection=utf8;
            SET character_set_client=utf8;
            SET character_set_results=utf8"
        );

    }// end function

}// end class
?>
