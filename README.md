# Description of Data Structure Project

```php
class ServiceType {
    public $name = 'e-learning platform';
    public $consumer = 'any potential customer';
    public $serviceValue = 'depends on the service provided';
    public $parametersUsed = 'type of service';
    public $serviceProvider;

    public function __construct($providerName, $electronicAddress, $email, $phone, $address, $state) {
        $this->serviceProvider = new ServiceProvider($providerName, $electronicAddress, $email, $phone, $address, $state);
    }
}

class ServiceProvider {
    public $name;
    public $electronicAddress;
    public $email;
    public $phone;
    public $address;
    public $state;

    public function __construct($name, $electronicAddress, $email, $phone, $address, $state) {
        $this->name = $name;
        $this->electronicAddress = $electronicAddress;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->state = $state;
    }
}

class ServiceDetail {
    public $serviceProvidedDate = 'any date';
    public $chargedPrice = 'will depend on the type of service';
}

$operationsMenu = [
    'List all types of services.',
    'List all customers.',
    'List all service providers.',
    'List customers from a certain state.',
    'List service providers of a certain type.',
    'Show the states where the most expensive service is registered.',
    'List all services in ascending order of value.',
    'List all customers in ascending order of name.'
];

// Usage example:
$serviceType = new ServiceType('Provider Name', 'Electronic Address', 'E-mail', 'Phone', 'Address', 'State');
$serviceDetail = new ServiceDetail();
