<?php

require 'autoloader.php';

// Bootstrap of application
$connection = new mysqli('localhost', 'root', null, 'test');

$customerRepository = new \app\Model\CustomerRepository($connection);
$contractRepository = new \app\Model\ContractRepository($connection);


// Logic
//$id = (int) $_POST['id'];
$name = $_POST['name'];
$statuses = $_POST['status'];

// Customer by id
$customers = $customerRepository->findByName($name);

if ($customers) {
    /** @var \app\Model\Contract[] $contracts */
    $contracts = [];

    foreach ($customers as $customer) {
        // Contracts
        $contracts = array_merge(
            $contracts,
            $contractRepository->findByCustomerIdAndStatus($customer->getId(), $statuses)
        );
    }

    $data = [];

    foreach ($contracts as $contract) {
        $data[] = [
            'id' => $contract->getId(),
            'customer_id' => $contract->getCustomerId(),
            'number' => $contract->getNumber(),
            'date' => $contract->getDateSign()->format('Y-m-d'),
        ];
    }

    echo json_encode($data);
}


