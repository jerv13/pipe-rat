<?php
/**
 * example.config.php
 */
[
    'resources' => [
        'example-path' => [
            /**
             * === Resource Controller ===
             */
            // '{serviceName}'
            'controllerServiceName' => 'Reliv\PipeRat\ResourceController\DoctrineResourceController',
            // '{optionKey}' => '{optionValue}'
            'controllerServiceOptions' => [
                'entity' => null,
                // Security is best when 'allowDeepWheres' is false
                'allowDeepWheres' => false,
            ],
            /**
             * === Extend an existing config ===
             */
            // '{serviceName}'
            'extendsConfig' => 'default:doctrineApi',

            /**
             * === DEFAULT: Resource Controller Method Definitions ===
             *
             * NOTE: Default priority is LAST wins
             */
            'methods' => [
                'exampleFindOne' => [
                    'description' => 'Example find resources',
                    'httpVerb' => 'GET',
                    'name' => 'exampleFindOne',
                    'path' => '/exampleFindOne',
                    'preServiceNames' => [
                        'WhereFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Where',
                        'PropertyFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Fields',
                    ],
                    'preServiceOptions' => [
                        'WhereFilterParam' => [
                            // Security is best when 'allowDeepWheres' is false
                            'allowDeepWheres' => false,
                        ]
                    ],
                    'preServicePriority' => [],
                    'postServiceNames' => [
                        'extractor' => 'Reliv\PipeRat\Middleware\Extractor\PropertyGetterExtractor',
                    ],
                    'postServiceOptions' => [
                        'extractor' => [
                            'propertyList' => [
                                'exampleProperty' => true,
                                'exampleCollectionProperty' => ['exampleSubProperty' => true],
                                'exmpleBlacklistProperty' => false,
                            ],
                            // Security is best when 'deepPropertyLimit' is 1
                            'propertyDepthLimit' => 1,
                        ],
                    ],
                    'postServicePriority' => [],
                ],
                'exampleFind' => [
                    'description' => 'Find resources',
                    'httpVerb' => 'GET',
                    'name' => 'exampleFind',
                    'path' => '/exampleFind',
                    'preServiceNames' => [
                        'WhereFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Where',
                        'PropertyFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Fields',
                        'OrderByFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Order',
                        'SkipFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Skip',
                        'LimitFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Limit',
                    ],
                    'preServiceOptions' => [
                        'WhereFilterParam' => [
                            // Security is best when 'allowDeepWheres' is false
                            'allowDeepWheres' => false,
                        ]
                    ],
                    'preServicePriority' => [],
                    'postServiceNames' => [
                        'extractor' => 'Reliv\PipeRat\Middleware\Extractor\CollectionPropertyGetterExtractor',
                    ],
                    'postServiceOptions' => [
                        'extractor' => [
                            'propertyList' => [
                                'exampleProperty' => true,
                                'exampleCollectionProperty' => ['exampleSubProperty' => true],
                                'exmpleBlacklistProperty' => false,
                            ],
                            // Security is best when 'deepPropertyLimit' is 1
                            'propertyDepthLimit' => 1,
                        ],
                    ],
                    'postServicePriority' => [],
                ],
            ],
            /* Methods White-list */
            'methodsAllowed' => [
                //Reads
                'count',
                'exists',
                'findById',
                'findOne',
                'find',
                //Writes
                'upsert',
                'create',
                'deleteById',
                'updateProperties',
                'example',
            ],
            'methodPriority' => [
                //Reads
                'count' => 1000,
                'exists' => 900,
                'findById' => 800,
                'findOne'=> 700,
                'find' => 600,
                //Writes
                'upsert' => 500,
                'create' => 400,
                'deleteById' => 300,
                'updateProperties' => 200,
                'example'
            ],
            /* Path */
            'path' => 'example-path',
            /* Pre Controller Middleware */
            'preServiceNames' => [
                'RcmUserAcl' => 'Reliv\PipeRat\Middleware\Acl\RcmUserAcl',
                'ZfInputFilterClass' => 'Reliv\PipeRat\Middleware\InputFilter\ZfInputFilterClass',
                'ZfInputFilterConfig' => 'Reliv\PipeRat\Middleware\InputFilter\ZfInputFilterConfig',
                'ZfInputFilterService' => 'Reliv\PipeRat\Middleware\InputFilter\ZfInputFilterService',
            ],
            'preServiceOptions' => [
                'RcmUserAcl' => [
                    'resourceId' => '{resourceId}',
                    'privilege' => null,
                    'notAllowedStatus' => 401, // optional
                    'notAllowedReason' => 'Access Denied' // optional
                ],
                'ZfInputFilterClass' => [
                    'class' => '',
                ],
                'ZfInputFilterService' => [
                    'serviceName' => '',
                ],
                'ZfInputFilterConfig' => [
                    'config' => [],
                ],
            ],
            /**
             * '{serviceAlias}' => {priority},
             */
            'preServicePriority' => [
                'JsonRequestFormat' => 1000,
            ],
            'postServiceNames' => [
                'JsonResponseFormat' => 'Reliv\PipeRat\Middleware\ResponseFormat\JsonResponseFormat',
                'XmlResponseFormat' => 'Reliv\PipeRat\Middleware\ResponseFormat\XmlResponseFormat',
                'DefaultResponseFormat' => 'Reliv\PipeRat\Middleware\ResponseFormat\JsonResponseFormat',
            ],
            /**
             * '{serviceAlias}' => [ '{optionKey}' => '{optionValue}' ],
             */
            'postServiceOptions' => [
                'JsonResponseFormat' => [
                    'accepts' => [
                        'application/json'
                    ],
                ],
                'XmlResponseFormat' => [
                    'accepts' => [
                        'application/xml'
                    ],
                ],
                'DefaultResponseFormat' => [
                    'accepts' => [
                        '*/*'
                    ],
                ],
            ],
        ],
    ]
];
