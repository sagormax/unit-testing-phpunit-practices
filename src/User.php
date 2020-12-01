<?php


namespace Code;


class User
{
    protected $firstName;
    protected $lastName;
    public $email;
    protected $mailer;

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param mixed $mailer
     */
    public function setMailer($mailer): void
    {
        $this->mailer = $mailer;
    }

    public function showUser()
    {
        return trim("$this->firstName $this->lastName");
    }

    /**
     * Notify a user
     * @param $message
     * @return bool
     */
    public function notify($message)
    {
        return $this->mailer->send($this->email, $message);
    }
}