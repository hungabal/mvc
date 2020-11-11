<?php


class Controller
{
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_view;
    protected $_modelBaseName;

    public function __construct($model, $action)
    {
        $this->_controller = ucwords(__CLASS__);
        $this->_action = $action;
        $this->_modelBaseName = $model;

        /**
         * A győkér könyvtár --> View mappa --> kis betűvel a controller neve --> függvény neve + a phtml kiterjesztés.
         */
        $this->_view = new View(HOME . DS . 'View' . DS . strtolower($this->_modelBaseName) . DS . $action . '.phtml');
    }

    protected function _setModel($modelName)
    {
        $modelName .= 'Model';
        $this->_model = new $modelName();
    }

    protected function _setView($viewName)
    {
        $this->_view = new View(HOME . DS . 'View' . DS . strtolower($this->_modelBaseName) . DS . $viewName . '.phtml');
    }
}