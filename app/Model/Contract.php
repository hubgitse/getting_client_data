<?php

namespace app\Model;

class Contract
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var string
     */
    private $number;

    /**
     * @var \DateTime
     */
    private $dateSign;

    /**
     * @var string
     */
    private $staffNumber;

    /**
     * Contract constructor.
     * @param int $id
     * @param int $customerId
     * @param string $number
     * @param \DateTime $dateSign
     * @param string $staffNumber
     */
    public function __construct($id, $customerId, $number, \DateTime $dateSign, $staffNumber)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->number = $number;
        $this->dateSign = $dateSign;
        $this->staffNumber = $staffNumber;
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
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return \DateTime
     */
    public function getDateSign()
    {
        return $this->dateSign;
    }

    /**
     * @return string
     */
    public function getStaffNumber()
    {
        return $this->staffNumber;
    }
}