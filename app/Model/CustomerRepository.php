<?php

namespace app\Model;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var \mysqli
     */
    private $connection;

    /**
     * @var Customer[]
     */
    private $identityMap = [];

    /**
     * CustomerRepository constructor.
     * @param \mysqli $connection
     */
    public function __construct(\mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function findById($id)
    {
        // Safe parameter.
        $id = (int) $id;

        if (array_key_exists($id, $this->identityMap)) {
            return $this->identityMap[$id];
        }

        $result = $this->connection->query("SELECT * FROM customer WHERE id = {$id}");
        if ($result) {
            /** @var array $row */
            $row = $result->fetch_row();

            return $this->createCustomer($row);
        }

        return null;
    }

    /**
     * @param string $name
     * @return Customer[]
     */
    public function findByName($name)
    {
        $customers = [];
        // Safe parameter.
        $name = mysql_real_escape_string($name);

        $result = $this->connection->query("SELECT * FROM customer WHERE name = '{$name}''");
        if ($result) {
            $rows = $result->fetch_all();
            foreach ($rows as $row) {
                $customers[] = $this->createCustomer($row);
            }
        }

        return $customers;
    }

    /**
     * Data Mapping.
     *
     * @param array $row
     * @return Customer
     */
    private function createCustomer(array $row)
    {
        $id = $row['id'];

        if (array_key_exists($id, $this->identityMap)) {
            return $this->identityMap[$id];
        }

        $customer = new Customer($id, $row['name'], $row['company']);

        $this->identityMap[$id] = $customer;

        return $customer;
    }
}