<?php
use Timelinetimo\Api\V1\Rest\Timeline as ApiTimeline;

return [
    'doctrine' => [
        'driver' => [
            Timelinetimo::class => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__."/../src/Api/V1/Rest",
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    Timelinetimo::class => Timelinetimo::class,
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            ApiTimeline\Controller::class => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/timelines[/:timelines_id]',
                    'defaults' => [
                        'controller' => ApiTimeline\Controller::class,
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            ApiTimeline\Controller::class,
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            ApiTimeline\Entity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => ApiTimeline\Controller::class,
                'route_identifier_name' => 'timelines_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            ApiTimeline\Collection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => ApiTimeline\Controller::class,
                'route_identifier_name' => 'timelines_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-rest' => [
        ApiTimeline\Controller::class => [
            'listener' => ApiTimeline\Resource::class,
            'route_name' => ApiTimeline\Controller::class,
            'route_identifier_name' => 'timelines_id',
            'collection_name' => 'timelines',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => '50',
            'entity_class' => ApiTimeline\Entity::class,
            'collection_class' => ApiTimeline\Collection::class,
            'service_name' => 'timelines',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            ApiTimeline\Controller::class => 'HalJson',
        ],
        'accept_whitelist' => [
            ApiTimeline\Controller::class => [
                0 => 'application/vnd.user.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            ApiTimeline\Controller::class => [
                0 => 'application/vnd.user.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-content-validation' => [
        ApiTimeline\Controller::class => [
            'input_filter' => ApiTimeline\Validator::class,
        ],
    ],
    'input_filter_specs' => [
        ApiTimeline\Validator::class => [
            0 => [
                'name' => 'id',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'name',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'note',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'status',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'dateCreated',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            5 => [
                'name' => 'ref',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            6 => [
                'name' => 'class',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            7 => [
                'name' => 'money_price',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            8 => [
                'name' => 'money_currency',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            9 => [
                'name' => 'owned_id',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            10 => [
                'name' => 'owned_class',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            11 => [
                'name' => 'target_id',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            12 => [
                'name' => 'target_class',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            ApiTimeline\Controller::class => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
    'api-tools' => [
        'db-connected' => [
            ApiTimeline\Resource::class => [
                'adapter_name' => 'sqlite',
                'table_name' => 'timelines',
                'hydrator_name' => \Doctrine\Laminas\Hydrator\DoctrineObject::class,
                'controller_service_name' => ApiTimeline\Controller::class,
                'entity_identifier_name' => 'id',
                'table_service' => ApiTimeline\Resource::class."\\Table",
            ],
        ],
    ],
];