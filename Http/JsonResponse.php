<?php
/**
 * @copyright 2014 Integ S.A.
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @author Javier Lorenzana <javier.lorenzana@gointegro.com>
 */

namespace GoIntegro\Bundle\HateoasBundle\Http;

// HTTP.
use Symfony\Component\HttpFoundation\JsonResponse as SymfonyJsonResponse;
// JSON-API.
use GoIntegro\Bundle\HateoasBundle\JsonApi\JsonApiSpec;

class JsonResponse extends SymfonyJsonResponse
{
    /**
     * @see SymfonyHttpResponse::__construct
     */
    public function __construct($data = NULL, $status = 200, $headers = [])
    {
        parent::__construct($data, $status, $headers);
        $this->headers->set('Content-Type', JsonApiSpec::HATEOAS_CONTENT_TYPE);

        // Keeps the data NULL if NULL it is.
        $this->setData($data);
    }
}
