<?php

require 'vendor/autoload.php';

$openstack = new OpenStack\OpenStack([
    'authUrl' => '{authUrl}',
    'region'  => '{region}',
    'user'    => [
        'id'       => '{userId}',
        'password' => '{password}'
    ],
    'scope' => ['project' => ['id' => '{projectId}']]
]);

$networking = $openstack->networkingV2();

$options = [
    'name'      => '{subnetName}',
    'networkId' => '{networkId}',
    'ipVersion' => 4,
    'cidr'      => '192.168.199.0/24'
];

// Create the subnet
$subnet = $networking->createSubnet($options);