<?php
/**
 * config.php
 *
 * PHP version 5
 *
 * @category  Reliv
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 * @link      https://github.com/reliv
 */
return [
    'defaultResourceConfig' => [
        'default:empty' => [

            /**
             * === DEFAULT: Resource Controller ===
             */
            // '{serviceName}'
            'controllerServiceName' => null,
            // '{optionKey}' => '{optionValue}'
            'controllerServiceOptions' => [],

            /**
             * === DEFAULT: Resource Controller Method Definitions ===
             * Methods:
             * '{name}' => [
             *   'description' => 'Create new resource',
             *   'httpVerb' => 'POST',
             *   'name' => 'create',
             *   // '{optionKey}' => '{optionValue}'
             *   'options' => [],
             *   'path' => '{path}',
             *   // '{serviceAlias}' => '{serviceName}'
             *   'preServiceNames' => [],
             *   // '{serviceAlias}' => [ '{optionKey}' => '{optionValue}' ]
             *   'preServiceOptions' => [],
             *   // '{serviceAlias}' => {priority}
             *   'preServicePriority' => [],
             *   // '{serviceAlias}' => '{serviceName}'
             *   'postServiceNames' => [],
             *   // '{serviceAlias}' => [ '{optionKey}' => '{optionValue}' ]
             *   'postServiceOptions' => [],
             *   // '{serviceAlias}' => {priority}
             *   'postServicePriority' => [],
             * ]
             *
             */
            'methods' => [],
            // '{method}' => {priority}
            'methodPriority' => [],

            /**
             * === DEFAULT: Resource Options ===
             */
            'options' => [],

            /**
             * === DEFAULT: Resource Pre-Services ===
             */
            // '{serviceAlias}' => '{serviceName}'
            'preServiceNames' => [],
            // '{serviceAlias}' => [ '{optionKey}' => '{optionValue}' ]
            'preServiceOptions' => [],
            // '{serviceAlias}' => {priority}
            'preServicePriority' => [],

            /**
             * === DEFAULT: Resource Post-Services ===
             */
            //'{serviceAlias}' => '{serviceName}'
            'postServiceNames' => [],
            // '{serviceAlias}' => [ '{optionKey}' => '{optionValue}' ]
            'postServiceOptions' => [],
            // '{serviceAlias}' => {priority}
            'postServicePriority' => [],
        ],
        /**
         * === Example of a Default Doctrine API ==
         */
        'doctrine-api' => [
            'controllerServiceName' => 'Reliv\PipeRat\ResourceController\DoctrineResourceController',
            'controllerServiceOptions' => [
                'entity' => null,
            ],
            'methods' => [
                'create' => [
                    'description' => 'Create new resource',
                    'httpVerb' => 'POST',
                    'name' => 'create',
                    'path' => '',
                    'preServiceNames' => [
                        'PropertyFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Fields',
                    ],
                    'preServiceOptions' => [],
                    'preServicePriority' => [],
                    'postServiceNames' => [
                        'extractor' => 'Reliv\PipeRat\Middleware\Extractor\PropertyGetterExtractor',
                    ],
                    'postServiceOptions' => [],
                    'postServicePriority' => [],
                ],
                'upsert' => [
                    'description' => 'Update or create a resource',
                    'httpVerb' => 'PUT',
                    'name' => 'upsert',
                    'path' => '',
                    'preServiceNames' => [
                        'PropertyFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Fields',
                    ],
                    'preServiceOptions' => [],
                    'preServicePriority' => [],
                    'postServiceNames' => [
                        'extractor' => 'Reliv\PipeRat\Middleware\Extractor\PropertyGetterExtractor',
                    ],
                    'postServiceOptions' => [],
                    'postServicePriority' => [],
                ],
                'exists' => [
                    'description' => 'Check if a resource exists',
                    'httpVerb' => 'GET',
                    'name' => 'exists',
                    'path' => '/{id}/exists',
                    'preServiceNames' => [],
                    'preServiceOptions' => [],
                    'preServicePriority' => [],
                    'postServiceNames' => [],
                    'postServiceOptions' => [],
                    'postServicePriority' => [],
                ],
                'count' => [
                    'description' => 'Return number of resources',
                    'httpVerb' => 'GET',
                    'name' => 'count',
                    'path' => '/count',
                    'preServiceNames' => [
                        'WhereFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Where',
                    ],
                    'preServiceOptions' => [
                        'WhereFilterParam' => [
                            // Security is best when 'allowDeepWheres' is false
                            'allowDeepWheres' => false,
                        ]
                    ],
                    'preServicePriority' => [],
                    'postServiceNames' => [],
                    'postServiceOptions' => [],
                    'postServicePriority' => [],
                ],
                'findOne' => [
                    'description' => 'Find resources',
                    'httpVerb' => 'GET',
                    'name' => 'findOne',
                    'path' => '/findOne',
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
                    'postServiceOptions' => [],
                    'postServicePriority' => [],
                ],
                'find' => [
                    'description' => 'Find resources',
                    'httpVerb' => 'GET',
                    'name' => 'find',
                    'path' => '',
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
                    'postServiceOptions' => [],
                    'postServicePriority' => [],
                ],
                'deleteById' => [
                    'description' => 'Delete resource by ID',
                    'httpVerb' => 'DELETE',
                    'name' => 'deleteById',
                    'path' => '/{id}',
                    'preServiceNames' => [],
                    'preServiceOptions' => [],
                    'preServicePriority' => [],
                    'postServiceNames' => [],
                    'postServiceOptions' => [],
                    'postServicePriority' => [],
                ],
                'updateProperties' => [
                    'description' => 'Update resource properties by ID',
                    'httpVerb' => 'PUT',
                    'name' => 'updateProperties',
                    'path' => '/{id}',
                    'preServiceNames' => [
                        'PropertyFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Fields',
                    ],
                    'preServiceOptions' => [],
                    'preServicePriority' => [],
                    'postServiceNames' => [
                        'extractor' => 'Reliv\PipeRat\Middleware\Extractor\PropertyGetterExtractor',
                    ],
                    'postServiceOptions' => [],
                    'postServicePriority' => [],
                ],
                'findById' => [
                    'description' => 'Find resource by ID',
                    'httpVerb' => 'GET',
                    'name' => 'findById',
                    'path' => '/{id}',
                    'preServiceNames' => [
                        'PropertyFilterParam' => 'Reliv\PipeRat\Middleware\RequestFormat\UrlEncodedCombinedFilter\Fields',
                    ],
                    'preServiceOptions' => [],
                    'preServicePriority' => [],
                    'postServiceNames' => [
                        'extractor' => 'Reliv\PipeRat\Middleware\Extractor\PropertyGetterExtractor',
                    ],
                    'postServiceOptions' => [],
                    'postServicePriority' => [],
                ],
            ],
            'methodPriority' => [
            ],
            'preServiceNames' => [
//                'JsonRequestFormat' => 'Reliv\PipeRat\Middleware\RequestFormat\JsonRequestFormat',
            ],
            'preServiceOptions' => [
            ],
            'preServicePriority' => [
//                'JsonRequestFormat' => 1000,
            ],
            'postServiceNames' => [
                'JsonResponseFormat' => 'Reliv\PipeRat\Middleware\ResponseFormat\JsonResponseFormat',
                'XmlResponseFormat' => 'Reliv\PipeRat\Middleware\ResponseFormat\XmlResponseFormat',
                'DefaultResponseFormat' => 'Reliv\PipeRat\Middleware\ResponseFormat\JsonResponseFormat',
            ],
            'postServiceOptions' => [
                'DefaultResponseFormat' => [
                    'accepts' => [
                        '*/*'
                    ],
                ],
            ],
            'postServicePriority' => [
//                'JsonRequestFormat' => 1000,
                'XmlResponseFormat' => 900,
                'DefaultResponseFormat' => 800
            ],
        ],
    ],
    /**
     * === DEFAULT: Resources Config ===
     * These should be defined by the application
     */
    'resources' => [
    ],

    /**
     * === Router ===
     */
    // '{serviceAlias}' => '{serviceName}'
    'routeServiceNames' => [
        'baseRouter' => 'Reliv\PipeRat\Middleware\Router',
    ],
    // '{serviceAlias}' => [ '{optionKey}' => '{optionValue}' ]
    'routeServiceOptions' => [],
    // '{serviceAlias}' => {priority}
    'routeServicePriority' => [],

    /**
     * === Error Handlers ===
     */
    'errorServiceNames' => [
        //'errorHandler' => 'Reliv\PipeRat\Middleware\Error\TriggerErrorHandler',
    ],
    // '{serviceAlias}' => {priority}
    'errorServicePriority' => [],
];
