<?php
namespace App\Model;

class Task
{
    /** @var string */
    private $date;

    /** @var User */
    private $user;

    /** @var Status */
    private $status;

    /** @var string */
    private $title;

    public function __construct(string $date, User $user, Status $status, string $title)
    {
        $this->date = $date;
        $this->user = $user;
        $this->status = $status;
        $this->title = $title;
    }

    public function getDate() : string
    {
        return $this->date;
    }

    public function getStatus() : string
    {
        return $this->status->getName();
    }

    public function getUser() : string
    {
        return $this->user->getName();
    }

    public function getTitle() : string
    {
        return $this->title;
    }
}