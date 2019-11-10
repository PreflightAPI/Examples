<?php
/**
 * DefaultApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * PreflightAPI
 *
 * Preflighting in printing is the process of checking a design file for inefficiencies/errors and making sure it’s set-up correctly before before sending it to print or final production. Preparation for printed jobs ranges according to the complexity of a project, but there are some fundamental things to check before send each print job to ensure that you are producing the intended outcome.
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.9
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * DefaultApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DefaultApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation doPreflightFormatPagesModeGet
     *
     * Basic method
     *
     * @param  string $authorization BASIC autorization (required)
     * @param  \SplFileObject $content_type File (required)
     * @param  string $format dismensions of printing. We will add trim and bleed boxes and cut sended file to this size (+trim). So basically if You set 90x50 we will cut it to 92x50 milimeters (required)
     * @param  string $pages Max page number. All additional pages will be removed. Default \&quot;1\&quot; (required)
     * @param  string $mode Mode - default \&quot;1\&quot; (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse200
     */
    public function doPreflightFormatPagesModeGet($authorization, $content_type, $format, $pages, $mode)
    {
        list($response) = $this->doPreflightFormatPagesModeGetWithHttpInfo($authorization, $content_type, $format, $pages, $mode);
        return $response;
    }

    /**
     * Operation doPreflightFormatPagesModeGetWithHttpInfo
     *
     * Basic method
     *
     * @param  string $authorization BASIC autorization (required)
     * @param  \SplFileObject $content_type File (required)
     * @param  string $format dismensions of printing. We will add trim and bleed boxes and cut sended file to this size (+trim). So basically if You set 90x50 we will cut it to 92x50 milimeters (required)
     * @param  string $pages Max page number. All additional pages will be removed. Default \&quot;1\&quot; (required)
     * @param  string $mode Mode - default \&quot;1\&quot; (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     */
    public function doPreflightFormatPagesModeGetWithHttpInfo($authorization, $content_type, $format, $pages, $mode)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse200';
        $request = $this->doPreflightFormatPagesModeGetRequest($authorization, $content_type, $format, $pages, $mode);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse200',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse400',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation doPreflightFormatPagesModeGetAsync
     *
     * Basic method
     *
     * @param  string $authorization BASIC autorization (required)
     * @param  \SplFileObject $content_type File (required)
     * @param  string $format dismensions of printing. We will add trim and bleed boxes and cut sended file to this size (+trim). So basically if You set 90x50 we will cut it to 92x50 milimeters (required)
     * @param  string $pages Max page number. All additional pages will be removed. Default \&quot;1\&quot; (required)
     * @param  string $mode Mode - default \&quot;1\&quot; (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function doPreflightFormatPagesModeGetAsync($authorization, $content_type, $format, $pages, $mode)
    {
        return $this->doPreflightFormatPagesModeGetAsyncWithHttpInfo($authorization, $content_type, $format, $pages, $mode)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation doPreflightFormatPagesModeGetAsyncWithHttpInfo
     *
     * Basic method
     *
     * @param  string $authorization BASIC autorization (required)
     * @param  \SplFileObject $content_type File (required)
     * @param  string $format dismensions of printing. We will add trim and bleed boxes and cut sended file to this size (+trim). So basically if You set 90x50 we will cut it to 92x50 milimeters (required)
     * @param  string $pages Max page number. All additional pages will be removed. Default \&quot;1\&quot; (required)
     * @param  string $mode Mode - default \&quot;1\&quot; (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function doPreflightFormatPagesModeGetAsyncWithHttpInfo($authorization, $content_type, $format, $pages, $mode)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse200';
        $request = $this->doPreflightFormatPagesModeGetRequest($authorization, $content_type, $format, $pages, $mode);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'doPreflightFormatPagesModeGet'
     *
     * @param  string $authorization BASIC autorization (required)
     * @param  \SplFileObject $content_type File (required)
     * @param  string $format dismensions of printing. We will add trim and bleed boxes and cut sended file to this size (+trim). So basically if You set 90x50 we will cut it to 92x50 milimeters (required)
     * @param  string $pages Max page number. All additional pages will be removed. Default \&quot;1\&quot; (required)
     * @param  string $mode Mode - default \&quot;1\&quot; (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function doPreflightFormatPagesModeGetRequest($authorization, $content_type, $format, $pages, $mode)
    {
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling doPreflightFormatPagesModeGet'
            );
        }
        // verify the required parameter 'content_type' is set
        if ($content_type === null || (is_array($content_type) && count($content_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $content_type when calling doPreflightFormatPagesModeGet'
            );
        }
        // verify the required parameter 'format' is set
        if ($format === null || (is_array($format) && count($format) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $format when calling doPreflightFormatPagesModeGet'
            );
        }
        // verify the required parameter 'pages' is set
        if ($pages === null || (is_array($pages) && count($pages) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pages when calling doPreflightFormatPagesModeGet'
            );
        }
        // verify the required parameter 'mode' is set
        if ($mode === null || (is_array($mode) && count($mode) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $mode when calling doPreflightFormatPagesModeGet'
            );
        }

        $resourcePath = '/DoPreflight/{format}/{pages}/{mode}/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($format !== null) {
            $resourcePath = str_replace(
                '{' . 'format' . '}',
                ObjectSerializer::toPathValue($format),
                $resourcePath
            );
        }
        // path params
        if ($pages !== null) {
            $resourcePath = str_replace(
                '{' . 'pages' . '}',
                ObjectSerializer::toPathValue($pages),
                $resourcePath
            );
        }
        // path params
        if ($mode !== null) {
            $resourcePath = str_replace(
                '{' . 'mode' . '}',
                ObjectSerializer::toPathValue($mode),
                $resourcePath
            );
        }

        // form params
        if ($content_type !== null) {
            $multipart = true;
            $formParams['content-type'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($content_type), 'rb');
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            
            if($headers['Content-Type'] === 'application/json') {
                // \stdClass has no __toString(), so we should encode it manually
                if ($httpBody instanceof \stdClass) {
                    $httpBody = \GuzzleHttp\json_encode($httpBody);
                }
                // array has no __toString(), so we should encode it manually
                if(is_array($httpBody)) {
                    $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($httpBody));
                }
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
