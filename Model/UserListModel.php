<?php


class UserListModel extends Model
{
    /**
     * A felhasználókat adja vissza.
     *
     * @return array|false
     * @throws Exception
     */
    public function getUserList()
    {
        $sql = "SELECT `id`, `name` FROM `users`";
        $this->_setSql($sql);
        $users = $this->getAll();

        if (empty($users)) {
            return false;
        }

        return $users;
    }
}