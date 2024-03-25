<?php

// Definition of the Consumer class
class Consumer {
    public $name;
    public $age;
    public $email;
    public $phone;
    public $address;
    public $state;
}

// Definition of the ServiceProvider class
class ServiceProvider {
    public $name;
    public $email;
    public $phone;
    public $address;
    public $state;
    public $service_type;
}

// Definition of the Service class
class Service {
    public $detailing;
    public $date;
    public $price;
}

// Constants
define('MAX_CONSUMERS', 50);
define('MAX_PROVIDERS', 50);
define('MAX_SERVICES', 7);

// Function to list all types of services
function listServiceTypes() {
    echo "Listing all types of services:\n";
    echo "1. Online Courses\n";
    echo "2. Online Tutoring\n";
    echo "3. Certification and Recognition\n";
    echo "4. Live Classes\n";
    echo "5. Development of Socioemotional Skills\n";
    echo "6. Performance Assessments and Reports\n";
    echo "7. Reference Materials\n";
    // ... (add other services)
}

// Function to list all consumers
function listConsumers($consumers) {
    echo "Listing all consumers:\n";
    foreach ($consumers as $consumer) {
        echo "Name: {$consumer['name']}, 
        Age: {$consumer['age']}, 
        Email: {$consumer['email']}, 
        Phone: {$consumer['phone']}, 
        Address: {$consumer['address']}, 
        State: {$consumer['state']}\n";
    }
}

// Function to list all service providers
function listServiceProviders($providers) {
    echo "Listing all service providers:\n";
    foreach ($providers as $provider) {
        $service_type = isset($provider['service_type']) ? $provider['service_type'] : 'N/A';
        echo "Name: {$provider['name']}, 
        Email: {$provider['email']}, 
        Phone: {$provider['phone']}, 
        Address: {$provider['address']}, 
        State: {$provider['state']}, 
        Service Type: {$service_type}\n";
    }
}

// Function to list consumers from a certain state
function listConsumersByState($consumers, $state) {
    echo "Listing consumers from state $state:\n";
    foreach ($consumers as $consumer) {
        if ($consumer['state'] == $state) {
            echo "Name: {$consumer['name']}, 
            Age: {$consumer['age']}, 
            Email: {$consumer['email']}, 
            Phone: {$consumer['phone']}, 
            Address: {$consumer['address']}, 
            State: {$consumer['state']}\n";
        }
    }
}

// Function to list service providers of a certain type
function listProvidersByType($providers, $type) {
    echo "Listing service providers of type $type:\n";
    foreach ($providers as $provider) {
        if (isset($provider['service_type']) && $provider['service_type'] == $type) {
            echo "Name: {$provider['name']}, 
            Email: {$provider['email']}, 
            Phone: {$provider['phone']}, 
            Address: {$provider['address']}, 
            State: {$provider['state']}\n";
        }
    }
}

// Function to present the state(s) where the most expensive service is registered
function stateMostExpensiveService($services) {
    echo "Presenting state(s) where the most expensive service is registered:\n";
    $highestValue = -1.0; // Initialized with an impossible value
    foreach ($services as $service) {
        if ($service['price'] > $highestValue) {
            $highestValue = $service['price'];
        }
    }
    foreach ($services as $service) {
        if ($service['price'] == $highestValue) {
            // Logic to get the state related to this service
            echo "State(s) of the most expensive service: SP, RJ, PA)\n";
        }
    }
}

// Function to list all services in ascending order of value
function listServicesByValue(&$services) {
    echo "Listing all services in ascending order of value:\n";

    // Sort services by value (you can use sorting algorithm)
    $numServices = count($services);
    for ($i = 0; $i < $numServices - 1; $i++) {
        for ($j = 0; $j < $numServices - $i - 1; $j++) {
            if ($services[$j]['price'] > $services[$j + 1]['price']) {
                // Swap positions if necessary
                $temp = $services[$j];
                $services[$j] = $services[$j + 1];
                $services[$j + 1] = $temp;
            }
        }
    }

    // Display the sorted services
    for ($i = 0; $i < $numServices; $i++) {
        $detailing = isset($services[$i]['detailing']) ? $services[$i]['detailing'] : 'N/A';
        echo "Detailing: {$detailing}, 
        Date: {$services[$i]['date']}, 
        Price: ".number_format($services[$i]['price'], 2) . PHP_EOL;
    }
}

// Function to list all consumers in ascending order of name
function listConsumersByName(&$consumers) {
    echo "Listing all consumers in ascending order of name:\n";

    // Sort consumers by name (you can use sorting algorithm)
    $numConsumers = count($consumers);
    for ($i = 0; $i < $numConsumers - 1; $i++) {
        for ($j = 0; $j < $numConsumers - $i - 1; $j++) {
            if (strcmp($consumers[$j]['name'], $consumers[$j + 1]['name']) > 0) {
                // Swap positions if necessary
                $temp = $consumers[$j];
                $consumers[$j] = $consumers[$j + 1];
                $consumers[$j + 1] = $temp;
            }
        }
    }

    // Display the sorted consumers
    for ($i = 0; $i < $numConsumers; $i++) {
        echo "Name: {$consumers[$i]['name']}, 
        Age: {$consumers[$i]['age']}, 
        Email: {$consumers[$i]['email']}, 
        Phone: {$consumers[$i]['phone']}, 
        Address: {$consumers[$i]['address']}, 
        State: {$consumers[$i]['state']}\n";
    }
}

// Main function
// Initialization of fictitious data
$consumers = [
    [   
        "name" => "jonas",
        "age" => 25,
        "email" => "jonas@email.com",
        "phone" => "123456789", 
        "address" => "Address1", 
        "state" => "SP"
    ],
    // ...
    // Add all other consumers here
    // ...
    [   
        "name" => "daniel", 
        "age" => 30, 
        "email" => "daniel@email.com", 
        "phone" => "8686868686", 
        "address" => "Address50", 
        "state" => "PA"
    ]
];

$providers = [
    [   
        "name" => "Provider1", 
        "email" => "provider1@email.com", 
        "phone" => "987654321", 
        "address" => "ProviderAddress1", 
        "state" => "RJ", 
        "service" => "Online courses"
    ],
    // ...
    // Add all other providers here
    // ...
    [   
        "name" => "Provider50", 
        "email" => "provider50@email.com", 
        "phone" => "901234567", 
        "address" => "ProviderAddress50", 
        "state" => "SE", 
        "service" => "Service X"
    ]
];

$services = [
    [   
        "name" => "1. Online courses", 
        "date" => "01/08/2023", 
        "price" => 100.0
    ]
    // ...
    // Add all other services here
    // ...
];

$numConsumers = count($consumers);
$numProviders = count($providers);

function main() {
    // Initialization of fictitious data
    global $consumers, $providers, $numConsumers, $numProviders;

    // Rest of the code...
}
        $numServices = count($services);
    

    do {
        echo "\nOperations Menu:\n";
        echo "1. List all types of services\n";
        echo "2. List all consumers\n";
        echo "3. List all service providers\n";
        echo "4. List consumers from a certain state\n";
        echo "5. List service providers of a certain type\n";
        echo "6. Present the state(s) where the most expensive service is registered\n";
        echo "7. List all services in ascending order of value\n";
        echo "8. List all consumers in ascending order of name\n";
        echo "0. Exit\n";

        $option = readline("Choose an option: ");

        switch ($option) {
            case 1:
                listServiceTypes();
                break;
            case 2:
                listConsumers($consumers);
                break;
            case 3:
                listServiceProviders($providers);
                break;
            case 4:
                $state = readline("Enter the state: ");
                listConsumersByState($consumers, $state);
                break;
            case 5:
                $type = readline("Enter the service type: ");
                listProvidersByType($providers, $type);
                break;
            case 6:
                stateMostExpensiveService($services);
                break;
            case 7:
                listServicesByValue($services);
                break;
            case 8:
                listConsumersByName($consumers);
                break;
            case 0:
                echo "Bye!\n";
                break;
            default:
                echo "Something went wrong!\n";
        }
    } while ($option != 0);