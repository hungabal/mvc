<?php


class AdvertismentListModel extends Model
{
    /**
     * A hirdetés adatait szedi össze a felhasználók táblával összekötött névvel együtt.
     *
     * @return array|false
     * @throws Exception
     */
    public function getAdvertismentList()
    {
        $sql = "SELECT `advertisements`.`id`, `advertisements`.`userid`, `advertisements`.`title`, `users`.`name` 
                FROM `advertisements` 
                LEFT JOIN `users` ON `advertisements`.`userid` = `users`.`id`";
        $this->_setSql($sql);
        $advertisment = $this->getAll();

        if (empty($advertisment)) {
            return false;
        }

        return $advertisment;
    }
}