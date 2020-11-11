<?php


class View
{
    protected $_file;
    protected $_data = array();

    /**
     * Az átadott template fájl.
     *
     * View constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->_file = $file;
    }

    /**
     * Az átadott modell adatai:
     *
     * @param $key --> amit a template fájlba írunk bele
     * @param $value --> ebben van a betöltött adat ami a template majd használni fog a key-el
     */
    public function set($key, $value)
    {
        $this->_data[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->_data[$key];
    }

    /**
     * Ha nem létezik a template fájl akkor hiba dobása.
     *
     * Ha létezik akkor az adatokat a tömbben átadjuk és ezért tudjuk használni az include rész által behozott template fájlban.
     *
     * @throws Exception
     */
    public function output()
    {
        if (!file_exists($this->_file)) {
            throw new Exception("Template " . $this->_file . " doesn't exist.");
        }

        extract($this->_data);
        ob_start();
        include($this->_file);
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
}