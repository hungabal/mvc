<?php


class UserListController extends Controller
{
    public function __construct($model, $action)
    {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }

    /**
     * A felhasználókat szedi össsze.
     *
     * Összegyűjti az adatokat a modelből és átadja a template fájlnak.
     *
     * A hibakezelésnél figyelni kell hogy a felhasználóhoz vagy a fejlesztőhöz megy-e a hiba és úgy lekezelni. Ez jelenleg egy és ugyan az a személy.
     */
    public function user_list()
    {
        try {

            $users = $this->_model->getUserList();
            $this->_view->set('users', $users);
            $this->_view->set('title', 'Felhasználó listázó');

            return $this->_view->output();

        } catch (Exception $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}