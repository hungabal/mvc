<?php


class IndexLinkController extends Controller
{
    public function __construct($model, $action)
    {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }

    /**
     * Köszönő szöveget kérdezi le.
     *
     * Összegyűjti az adatokat a modelből és átadja a template fájlnak.
     *
     * A hibakezelésnél figyelni kell hogy a felhasználóhoz vagy a fejlesztőhöz megy-e a hiba és úgy lekezelni. Ez jelenleg egy és ugyan az a személy.
     */
    public function index_links()
    {
        try {

            $greetings = $this->_model->getIndexSiteMessage();
            $this->_view->set('greetings', $greetings);
            $this->_view->set('title', 'Főoldal');

            return $this->_view->output();

        } catch (Exception $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}