<?php

namespace Reliv\PipeRat\Provider;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Reliv\PipeRat\Middleware\MiddlewarePipe;

/**
 * Class MiddlewareProvider
 *
 * PHP version 5
 *
 * @category  Reliv
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
interface MiddlewareProvider
{
    /**
     * buildPipe
     *
     * @param MiddlewarePipe $middlewarePipe
     * @param Request        $request
     *
     * @return Request
     */
    public function buildPipe(
        MiddlewarePipe $middlewarePipe,
        Request $request
    );
}
