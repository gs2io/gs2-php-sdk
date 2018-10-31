<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Core;

use Gs2\Core\Exception\BadGatewayException;
use Gs2\Core\Exception\BadRequestException;
use Gs2\Core\Exception\ConflictException;
use Gs2\Core\Exception\InternalServerErrorException;
use Gs2\Core\Exception\NotFoundException;
use Gs2\Core\Exception\QuotaExceedException;
use Gs2\Core\Exception\RequestTimeoutException;
use Gs2\Core\Exception\ServiceUnavailableException;
use Gs2\Core\Exception\UnauthorizedException;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Core\Model\Region;
use GuzzleHttp\Client as Client;
use GuzzleHttp\Exception\RequestException as RequestException;
use GuzzleHttp\Message\ResponseInterface;

/**
 * APIクライアントの基底クラス
 * 
 * @author Game Server Services, inc. <contact@gs2.io>
 * @copyright Game Server Services, Inc.
 */
abstract class AbstractGs2Client {
	
	const ENDPOINT_HOST = 'https://{service}.{region}.gs2io.com';

    /**
     * @var IGs2Credential
     */
	private $credentials;

    /**
     * @var Region
     */
    private $region;

	/**
	 * コンストラクタ。
	 *
	 * @param IGs2Credential $credentials 認証情報
     * @param Region $region リージョン
	 */
	public function __construct(IGs2Credential $credentials, Region $region) {
		$this->credentials = $credentials;
        $this->region = $region;
	}

    /**
     * GET リクエストを発行
     *
     * @param string $url アクセス先URL
     * @param string $service アクセス先サービス
     * @param string $module アクセス先モジュール
     * @param string $function アクセス先ファンクション
     * @param array $queryString クエリストリング
     * @param array $header リクエストヘッダ
     * @return array 応答内容
     *
     * @throws BadGatewayException
     * @throws BadRequestException
     * @throws ConflictException
     * @throws InternalServerErrorException
     * @throws NotFoundException
     * @throws QuotaExceedException
     * @throws RequestTimeoutException
     * @throws ServiceUnavailableException
     * @throws UnauthorizedException
     */
	protected function doGet(string $url, string $service, string $module, string $function, array $queryString, array $header) {
        $url = str_replace('{service}', $service, str_replace('{region}', $this->region, $url));
        $protocol = substr($url, 0, strpos($url, '://'));
        $urlWithoutProtocol = substr($url, strpos($url, '://') + strlen('://'));
        if(strpos($urlWithoutProtocol, '/') === false) {
            $host = $urlWithoutProtocol;
            $path = '/';
        } else {
            $host = substr($urlWithoutProtocol, 0, strpos($urlWithoutProtocol, '/'));
            $path = '/'. substr($urlWithoutProtocol, strpos($urlWithoutProtocol, '/') + strlen('/'));
        }
        $timestamp = time();
        $this->credentials->authorized($header, $service, $module, $function, $timestamp);
		$params = [
            'timeout' => 60,
            'query' => $queryString,
            'headers' => $header,
        ];
		$client = new Client(['base_uri' => $protocol. '://'. $host]);
		try {
			return $this->doHandling($client->get($protocol. '://'. $host. $path, $params));
		} catch(RequestException $e) {
		    if(is_null($e->getResponse())) {
		        throw new \RuntimeException($e->getMessage());
            } else {
                return $this->doHandling($e->getResponse());
            }
		}
	}

    /**
     * POST リクエストを発行
     *
     * @param string $url アクセス先URL
     * @param string $service アクセス先サービス
     * @param string $module アクセス先モジュール
     * @param string $function アクセス先ファンクション
     * @param array $body リクエストボディ
     * @param array $header リクエストヘッダ
     * @return array 応答内容
     *
     * @throws BadGatewayException
     * @throws BadRequestException
     * @throws ConflictException
     * @throws InternalServerErrorException
     * @throws NotFoundException
     * @throws QuotaExceedException
     * @throws RequestTimeoutException
     * @throws ServiceUnavailableException
     * @throws UnauthorizedException
     */
	protected function doPost(string $url, string $service, string $module, string $function, array $body, array $header) {
        $url = str_replace('{service}', $service, str_replace('{region}', $this->region, $url));
        $protocol = substr($url, 0, strpos($url, '://'));
        $urlWithoutProtocol = substr($url, strpos($url, '://') + strlen('://'));
        if(strpos($urlWithoutProtocol, '/') === false) {
            $host = $urlWithoutProtocol;
            $path = '/';
        } else {
            $host = substr($urlWithoutProtocol, 0, strpos($urlWithoutProtocol, '/'));
            $path = '/'. substr($urlWithoutProtocol, strpos($urlWithoutProtocol, '/') + strlen('/'));
        }
        $timestamp = time();
        $this->credentials->authorized($header, $service, $module, $function, $timestamp);
        $params = [
            'timeout' => 60,
            'json' => $body,
            'headers' => $header,
        ];
        $client = new Client(['base_uri' => $protocol. '://'. $host]);
        try {
            return $this->doHandling($client->post($protocol. '://'. $host. $path, $params));
        } catch(RequestException $e) {
            if(is_null($e->getResponse())) {
                throw new \RuntimeException($e->getMessage());
            } else {
                return $this->doHandling($e->getResponse());
            }
        }
	}

	/**
	 * PUT リクエストを発行
	 *
     * @param string $url アクセス先URL
     * @param string $service アクセス先サービス
     * @param string $module アクセス先モジュール
     * @param string $function アクセス先ファンクション
     * @param array $body リクエストボディ
     * @param array $header リクエストヘッダ
     * @return array 応答内容
	 *
     * @throws BadGatewayException
     * @throws BadRequestException
     * @throws ConflictException
     * @throws InternalServerErrorException
     * @throws NotFoundException
     * @throws QuotaExceedException
     * @throws RequestTimeoutException
     * @throws ServiceUnavailableException
     * @throws UnauthorizedException
	 */
	protected function doPut(string $url, string $service, string $module, string $function, array $body, array $header) {
        $url = str_replace('{service}', $service, str_replace('{region}', $this->region, $url));
        $protocol = substr($url, 0, strpos($url, '://'));
        $urlWithoutProtocol = substr($url, strpos($url, '://') + strlen('://'));
        if(strpos($urlWithoutProtocol, '/') === false) {
            $host = $urlWithoutProtocol;
            $path = '/';
        } else {
            $host = substr($urlWithoutProtocol, 0, strpos($urlWithoutProtocol, '/'));
            $path = '/'. substr($urlWithoutProtocol, strpos($urlWithoutProtocol, '/') + strlen('/'));
        }
        $timestamp = time();
        $this->credentials->authorized($header, $service, $module, $function, $timestamp);
        $params = [
            'timeout' => 60,
            'json' => $body,
            'headers' => $header,
        ];
        $client = new Client(['base_uri' => $protocol. '://'. $host]);
        try {
            return $this->doHandling($client->put($protocol. '://'. $host. $path, $params));
        } catch(RequestException $e) {
            if(is_null($e->getResponse())) {
                throw new \RuntimeException($e->getMessage());
            } else {
                return $this->doHandling($e->getResponse());
            }
        }
	}
	
	/**
	 * DELETE リクエストを発行
	 *
     * @param string $url アクセス先URL
     * @param string $service アクセス先サービス
     * @param string $module アクセス先モジュール
     * @param string $function アクセス先ファンクション
     * @param array $queryString クエリストリング
     * @param array $header リクエストヘッダ
     * @return array 応答内容
	 *
     * @throws BadGatewayException
     * @throws BadRequestException
     * @throws ConflictException
     * @throws InternalServerErrorException
     * @throws NotFoundException
     * @throws QuotaExceedException
     * @throws RequestTimeoutException
     * @throws ServiceUnavailableException
     * @throws UnauthorizedException
	 */
	protected function doDelete(string $url, string $service, string $module, string $function, array $queryString, array $header) {
        $url = str_replace('{service}', $service, str_replace('{region}', $this->region, $url));
        $protocol = substr($url, 0, strpos($url, '://'));
        $urlWithoutProtocol = substr($url, strpos($url, '://') + strlen('://'));
        if(strpos($urlWithoutProtocol, '/') === false) {
            $host = $urlWithoutProtocol;
            $path = '/';
        } else {
            $host = substr($urlWithoutProtocol, 0, strpos($urlWithoutProtocol, '/'));
            $path = '/'. substr($urlWithoutProtocol, strpos($urlWithoutProtocol, '/') + strlen('/'));
        }
        $timestamp = time();
        $this->credentials->authorized($header, $service, $module, $function, $timestamp);
        $params = [
            'timeout' => 60,
            'query' => $queryString,
            'headers' => $header,
        ];
        $client = new Client(['base_uri' => $protocol. '://'. $host]);
        try {
            return $this->doHandling($client->delete($protocol. '://'. $host. $path, $params));
        } catch(RequestException $e) {
            if(is_null($e->getResponse())) {
                throw new \RuntimeException($e->getMessage());
            } else {
                return $this->doHandling($e->getResponse());
            }
        }
	}

    /**
     * レスポンスをパースする
     *
     * @param ResponseInterface $response レスポンス
     * @return array 応答内容(JSON)
     *
     * @throws BadGatewayException
     * @throws BadRequestException
     * @throws ConflictException
     * @throws InternalServerErrorException
     * @throws NotFoundException
     * @throws QuotaExceedException
     * @throws RequestTimeoutException
     * @throws ServiceUnavailableException
     * @throws UnauthorizedException
     */
	private function doHandling($response) {
		$statusCode = $response->getStatusCode();
		$body = $response->getBody()->getContents();
		switch($statusCode) {
			case 200: return json_decode($body, true);
			case 400: throw new BadRequestException(json_decode(json_decode($body, true)['message'], true));
			case 401: throw new UnauthorizedException(json_decode(json_decode($body, true)['message'], true));
			case 402: throw new QuotaExceedException(json_decode(json_decode($body, true)['message'], true));
			case 404: throw new NotFoundException(json_decode(json_decode($body, true)['message'], true));
			case 409: throw new ConflictException(json_decode(json_decode($body, true)['message'], true));
			case 500: throw new InternalServerErrorException(json_decode(json_decode($body, true)['message'], true));
			case 502: throw new BadGatewayException(json_decode(json_decode($body, true)['message'], true));
			case 503: throw new ServiceUnavailableException(json_decode(json_decode($body, true)['message'], true));
			case 504: throw new RequestTimeoutException(json_decode(json_decode($body, true)['message'], true));
		}
	}
}