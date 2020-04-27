<?php
namespace App\Model;

class Status
{
    const NEW = "new";

    const DONE = "done";

    /** @var string */
    private $name;

    /** @var array */
    private $types = [
        Status::NEW,
        Status::DONE,
    ];

    public function __construct(string $name)
    {
        if (!$this->validate($name)) {
            throw new \InvalidArgumentException("Wrong status name");
        }

        $this->name = $name;
    }

    public function validate(string $name) : bool
    {
        return in_array($name, $this->types);
    }
    
    public function getName() : string
    {
        return $this->name;
    }
}