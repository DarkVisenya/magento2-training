<?php
require __DIR__.'/../_tools/init.php';

// Initialize the client
$client = new \SmileCoreTest\RestClient();
$client->setDebug(true);
$client->setMagentoParams($params);
$client->connect();

$object = [
    'object' => [
        'identifier' => 'Aperture',
        'name'       => 'GLaDOS',
    ]
];

$search = [
    'searchCriteria' => [
        'filterGroups' => [
            [
                'filters' => [
                    [
                        'field'          => 'identifier',
                        'condition_type' => 'like',
                        'value'          => '%pert%'
                    ]
                ]
            ]
        ]
    ],
];

$client->get('rest/V1/seller/id/1');
$client->get('rest/V1/seller/identifier/main');
$client->get('rest/V1/seller/');

$client->post('rest/V1/seller/', $object);
$client->get('rest/V1/seller/identifier/'.$object['object']['identifier']);
$client->delete('rest/V1/seller/identifier/'.$object['object']['identifier']);

$ps = $client->post('rest/V1/seller/', $object);
$client->get('rest/V1/seller/id/'.$ps['seller_id']);
$client->get('rest/V1/seller/?'.http_build_query($search));
$client->delete('rest/V1/seller/id/'.$ps['seller_id']);
