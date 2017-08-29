<?php

namespace app\Model;

interface ContractRepositoryInterface
{
    /**
     * @param int $customerId
     * @param string $status
     * @return Contract[]
     */
    public function findByCustomerIdAndStatus($customerId, $status = []);
}