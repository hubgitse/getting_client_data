<?php

namespace app\Model;

class Customer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $company;

    /**
     * Customer constructor.
     * @param int $id
     * @param string $name
     * @param string $company
     */
    public function __construct($id, $name, $company)
    {
        $this->id = $id;
        $this->name = $name;
        $this->company = $company;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }
}