<?php

namespace app\Model;

class ContractRepository implements ContractRepositoryInterface
{
    /**
     * @var \mysqli
     */
    private $connection;

    /**
     * ContractRepository constructor.
     * @param \mysqli $connection
     */
    public function __construct(\mysqli $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param int $customerId
     * @param array $statuses
     * @return Contract[]
     */
    public function findByCustomerIdAndStatus($customerId, $statuses = [])
    {
        // SELECT * FROM contract WHERE customer_id = ?
        //
        // SELECT c.* FROM contract c
        // INNER JOIN service s ON s.contract_id = c.id
        // WHERE customer_id = ? AND s.status IN (work,connecting')
        // GROUP BY c.id

        $contracts = [];

        if ($statuses === []) {
            $sql = "SELECT * FROM contract WHERE customer_id = {$customerId}";
        } else {
            $statusesString = $this->getStatusesString($statuses);

            $sql = "SELECT c.* FROM contract c
            INNER JOIN service s ON s.contract_id = c.id
            WHERE customer_id = {$customerId} AND s.status IN ({$statusesString})
            GROUP BY c.id
            ";
        }

        $result = $this->connection->query($sql);

        if ($result) {
            $rows = $result->fetch_all();
            foreach ($rows as $row) {
                $contracts[] = $this->createContract($row);
            }
        }

        return $contracts;
    }

    /**
     * @param array $row
     * @return Contract
     */
    private function createContract(array $row)
    {
        return new Contract(
            $row['id'],
            $row['customer_id'],
            $row['number'],
            new \DateTime($row['date_sign']),
            $row['staff_number']
        );
    }

    /**
     * @param $statuses
     * @return string
     */
    private function getStatusesString($statuses)
    {
        return implode(',', array_map(function ($status) {
            return "'{$status}'";
        }, $statuses));
    }
}