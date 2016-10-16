<?php

class Auth
{
    private $session;
    private $userRepo;
    private $encrypt;

    public function __construct($session, $userRepo, $encrypt)
    {
        $this->session = $session;
        $this->userRepo = $userRepo;
        $this->encrypt = $encrypt;
    }

    private function appandUserData($userArray)
    {
        return [
            'email' => !empty($userArray['email']) ? $userArray['email'] : ''
        ];
    }

    /**
     * @return boolean
     */
    public function check()
    {
        return $this->session->userdata('login');
    }

    /**
     * @param string $password
     * @return string
     */
    public function encodePassword($password)
    {
        return $this->encrypt->encode($password);
    }

    /**
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public function checkPassword($password, $hash)
    {
        return $this->encrypt->decode($hash) == $password;
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function signin( $email, $password)
    {
        if( null === $user = $this->userRepo->fetchUserToAuth($email) ){
            return false;
        }

        if( !$this->checkPassword($password, $user->password) ) return false;

        $this->session->set_userdata([
            'user' => $this->appandUserData((array)$user),
            'login' => true
        ]);

        return true;
    }

    public function logout()
    {
        $this->session->set_userdata([
            'user' => null,
            'login' => false
        ]);
    }

}