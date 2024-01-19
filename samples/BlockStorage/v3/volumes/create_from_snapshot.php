<?php

require 'vendor/autoload.php';

$openstack = new OpenStack\OpenStack([
    'authUrl' => '{authUrl}',
    'region'  => '{region}',
    'user'    => [
        'id'       => '{userId}',
        'password' => '{password}',
    ],
]);

$service = $openstack->blockStorageV3();

$volume = $service->createVolume([
    'description' => '{description}',
    'size'        => '{size}',
    'name'        => '{name}',
    'snapshotId'  => '{snapshotId}',
]);
