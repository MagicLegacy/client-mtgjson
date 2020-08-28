<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Client;

use MagicLegacy\Component\MtgJson\Exception\MtgJsonClientException;
use MagicLegacy\Component\MtgJson\Formatter\FormatterInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Log\LoggerInterface;
use Safe\Exceptions\JsonException;

use function Safe\json_decode;

/**
 * Class AbstractClient
 *
 * Exception code range: 1000-1049
 *
 *
 * @author Romain Cottard
 */
class AbstractClient
{
    /** @var string BASE_URL */
    private const BASE_URL = 'https://mtgjson.com/api/v5';

    /** @var ClientInterface $client */
    private $client;

    /** @var RequestFactoryInterface $requestFactory */
    private $requestFactory;

    /** @var UriFactoryInterface $uriFactory */
    private $uriFactory;

    /** @var StreamFactoryInterface $streamFactory */
    private $streamFactory;

    /** @var LoggerInterface $logger */
    private $logger;

    /**
     * AbstractClient constructor.
     *
     * @param ClientInterface $client
     * @param RequestFactoryInterface $requestFactory
     * @param UriFactoryInterface $uriFactory
     * @param StreamFactoryInterface $streamFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        ClientInterface $client,
        RequestFactoryInterface $requestFactory,
        UriFactoryInterface $uriFactory,
        StreamFactoryInterface $streamFactory,
        LoggerInterface $logger
    ) {
        $this->client         = $client;
        $this->logger         = $logger;
        $this->requestFactory = $requestFactory;
        $this->uriFactory     = $uriFactory;
        $this->streamFactory  = $streamFactory;
    }

    /**
     * @param string $path
     * @param FormatterInterface $formatter
     * @return mixed
     * @throws MtgJsonClientException
     */
    final protected function fetchResult(string $path, FormatterInterface $formatter)
    {
        $response    = null;
        $data        = null;
        $decodedData = null;

        try {
            $request  = $this->getRequest($path);
            $response = $this->client->sendRequest($request);

            $data = $response->getBody()->getContents();

            if (!empty($data)) {
                $decodedData = json_decode($data);
            }

            if ($response->getStatusCode() >= 400) {
                throw new MtgJsonClientException();
            }
        } catch (MtgJsonClientException $exception) {
            $code    = $this->getErrorCode($decodedData, $response);
            $message = $this->getErrorMessage($decodedData, $response, $code);

            throw new MtgJsonClientException($message, $code, $exception);
        } catch (JsonException $exception) {
            throw new MtgJsonClientException('[CLI-1001] Unable to decode json response!', 1001, $exception);
        } catch (ClientExceptionInterface $exception) {
            throw new MtgJsonClientException('[CLI-1000] ' . $exception->getMessage(), 1000, $exception);
        } finally {
            if (!empty($exception) && $exception instanceof \Exception) {
                $this->getLogger()->notice($exception->getMessage(), [
                    'type'      => 'component.mtgjson.client.fetch',
                    'exception' => $exception,
                ]);
            }
        }

        return $decodedData !== null ? $formatter->format($decodedData) : $decodedData;
    }

    /**
     * @param string $path
     * @return RequestInterface
     */
    protected function getRequest(string $path): RequestInterface
    {
        $uri     = $this->uriFactory->createUri(self::BASE_URL . $path);
        $request = $this->requestFactory->createRequest('GET', $uri);

        //~ Add header
        return $request
            ->withAddedHeader('Accept', 'application/json')
            ;
    }

    /**
     * @return LoggerInterface
     */
    final protected function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param mixed $data
     * @param ResponseInterface|null $response
     * @return int
     */
    private function getErrorCode($data, ?ResponseInterface $response): int
    {
        $code = 1002;

        if (!empty($data->errors)) {
            $code = 1004;
        } elseif ($response !== null && $response->getStatusCode() >= 400) {
            $code = 1003;
        }

        return $code;
    }

    /**
     * @param $data
     * @param ResponseInterface $response
     * @param int $internalCode
     * @return string
     */
    private function getErrorMessage($data, ResponseInterface $response, int $internalCode): string
    {
        $error = !empty($data->errors) && is_array($data->errors) ? reset($data->errors) : null;

        $prefix = '[CLI-' . $internalCode . '] ';

        //~ Override default prefix
        if (!empty($error->code)) {
            $prefix = '[API-' . $error->code . '] ';
        } elseif ($response->getStatusCode() >= 400) {
            $prefix = '[HTTP-' . $response->getStatusCode() . '] ';
        }

        if (is_string($data)) {
            $message = $data;
        } else {
            $message = $error->title ?? 'An error as occurred!';
        }

        return $prefix . $message;
    }
}
