<?php

namespace app\Model;

class Service
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $contractId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $status;

    /**
     * Service constructor.
     * @param int $id
     * @param int $contractId
     * @param string $title
     * @param string $status
     */
    public function __construct($id, $contractId, $title, $status)
    {
        $this->id = $id;
        $this->contractId = $contractId;
        $this->title = $title;
        $this->status = $status;
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
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}