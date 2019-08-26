<?php


namespace App\Event;


use Symfony\Contracts\EventDispatcher\Event;
use App\Entity\User;


final class RegisterEvent extends Event
{
    public const NAME = 'user.register';
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}