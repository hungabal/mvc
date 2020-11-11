<?php


class IndexLinkModel extends Model
{
    /**
     * Visszaadja a köszöntő szöveget. (Ebben a formában nem sok értelme van ezt elég lett volna közvetlenül az átadásnál csak a string szöveget átadni, de szerettem volna követni az mvc szabályokat ennél is.)
     * @return string
     */
    public function getIndexSiteMessage()
    {
        return "Üdvözöllek a teszt feladatban!";
    }
}