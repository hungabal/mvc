<?php


class AdvertismentListController extends Controller
{
    public function __construct($model, $action)
    {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }

    /**
     * A hirdetés adatokat szedi össze.
     *
     * Összegyűjti az adatokat a modelből (getAdvertismentList) és átadja a template fájlnak.
     *
     * A hibakezelésnél figyelni kell hogy a felhasználóhoz vagy a fejlesztőhöz megy-e a hiba és úgy lekezelni. Ez jelenleg egy és ugyan az a személy.
     */
    public function advertisment_list()
    {
        try {

            $advertisment = $this->_model->getAdvertismentList();
            $this->_view->set('advertisment', $advertisment);
            $this->_view->set('title', 'Hirdetések listája');

            return $this->_view->output();

        } catch (Exception $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}