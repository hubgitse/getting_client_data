<?php

namespace app\Model;

interface CustomerRepositoryInterface
{
    /**
     * @param int $id
     * @return Customer|null
     */
    public function findById($id);

    /**
     * @param string $name
     * @return Customer[]
     */
    public function findByName($name);
}