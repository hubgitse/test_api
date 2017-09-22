<?php

namespace app\Domain\Model;

/**
 * Class User.
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $passwordHash;

    /**
     * User constructor.
     * @param int    $id
     * @param string $login
     * @param string $passwordHash
     */
    public function __construct($id, $login, $passwordHash)
    {
        $this->id = $id;
        $this->login = $login;
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return int
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }
}
