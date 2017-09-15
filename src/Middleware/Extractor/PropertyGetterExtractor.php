<?php

namespace Reliv\PipeRat\Middleware\Extractor;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Reliv\PipeRat\Extractor\Extractor;
use Reliv\PipeRat\Http\DataResponse;
use Reliv\PipeRat\Middleware\Middleware;

/**
 * Class PropertyGetterExtractor
 *
 * PHP version 5
 *
 * @category  Reliv
 * @copyright 2016 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class PropertyGetterExtractor extends AbstractExtractor implements Middleware
{
    /**
     * @var Extractor
     */
    protected $extractor;

    /**
     * getExtractor
     *
     * @return \Reliv\PipeRat\Extractor\PropertyGetterExtractor
     */
    public function getExtractor()
    {
        if (empty($this->extractor)) {
            $this->extractor = new \Reliv\PipeRat\Extractor\PropertyGetterExtractor();
        }

        return $this->extractor;
    }

    /**
     * __invoke
     *
     * @param Request|DataResponse $request
     * @param Response $response
     * @param callable|null $next
     *
     * @return static
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $response = $next($request);

        $dataModel = $this->getDataModel($response);

        if (!is_array($dataModel) && !is_object($dataModel)) {
            return $response;
        }

        return parent::__invoke(
            $request,
            $response,
            function ($request) use ($response) {
                return $response;
            }
        );
    }
}
