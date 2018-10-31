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

namespace Gs2\Key;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Key\Control\CreateKeyRequest;
use Gs2\Key\Control\CreateKeyResult;
use Gs2\Key\Control\DecryptRequest;
use Gs2\Key\Control\DecryptResult;
use Gs2\Key\Control\DeleteKeyRequest;
use Gs2\Key\Control\DescribeKeyRequest;
use Gs2\Key\Control\DescribeKeyResult;
use Gs2\Key\Control\EncryptRequest;
use Gs2\Key\Control\EncryptResult;
use Gs2\Key\Control\GetKeyRequest;
use Gs2\Key\Control\GetKeyResult;

/**
 * GS2 Key API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2KeyClient extends AbstractGs2Client {

	public static $ENDPOINT = "key";

	/**
	 * コンストラクタ。
	 *
	 * @param IGs2Credential $credential 認証情報
	 * @param Region $region リージョン
	 */
	public function __construct(IGs2Credential $credential, $region=null)
	{
	    if(is_string($region)) {
	        $region = new Region($region);
        }
	    if(is_null($region)) {
	        $region = new Region(Region::AP_NORTHEAST_1);
	    }
		parent::__construct($credential, $region);
	}

	/**
	 * 暗号鍵を新規作成します<br>
	 * <br>
	 *
	 * @param CreateKeyRequest $request リクエストパラメータ
	 * @return CreateKeyResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function createKey(CreateKeyRequest $request): CreateKeyResult
	{
	    $url = self::ENDPOINT_HOST. "/key";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Key::MODULE,
            CreateKeyRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateKeyResult($result);
    }

	/**
	 * 復号化処理を実行します<br>
	 * <br>
	 *
	 * @param DecryptRequest $request リクエストパラメータ
	 * @return DecryptResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function decrypt(DecryptRequest $request): DecryptResult
	{
	    $url = self::ENDPOINT_HOST. "/key/". ($request->getKeyName() === null || $request->getKeyName() === "" ? "null" : $request->getKeyName()). "/decrypt";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['data'] = $request->getData();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Key::MODULE,
            DecryptRequest::FUNCTION,
            $body,
            $headers
        );
        return new DecryptResult($result);
    }

	/**
	 * 暗号鍵を削除します<br>
	 * <br>
	 *
	 * @param DeleteKeyRequest $request リクエストパラメータ
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function deleteKey(DeleteKeyRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/key/". ($request->getKeyName() === null || $request->getKeyName() === "" ? "null" : $request->getKeyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Key::MODULE,
            DeleteKeyRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 暗号鍵の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeKeyRequest $request リクエストパラメータ
	 * @return DescribeKeyResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function describeKey(DescribeKeyRequest $request): DescribeKeyResult
	{
	    $url = self::ENDPOINT_HOST. "/key";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Key::MODULE,
            DescribeKeyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeKeyResult($result);
    }

	/**
	 * 暗号化処理を実行します<br>
	 * <br>
	 *
	 * @param EncryptRequest $request リクエストパラメータ
	 * @return EncryptResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function encrypt(EncryptRequest $request): EncryptResult
	{
	    $url = self::ENDPOINT_HOST. "/key/". ($request->getKeyName() === null || $request->getKeyName() === "" ? "null" : $request->getKeyName()). "/encrypt";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['data'] = $request->getData();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Key::MODULE,
            EncryptRequest::FUNCTION,
            $body,
            $headers
        );
        return new EncryptResult($result);
    }

	/**
	 * 暗号鍵を取得します<br>
	 * <br>
	 *
	 * @param GetKeyRequest $request リクエストパラメータ
	 * @return GetKeyResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function getKey(GetKeyRequest $request): GetKeyResult
	{
	    $url = self::ENDPOINT_HOST. "/key/". ($request->getKeyName() === null || $request->getKeyName() === "" ? "null" : $request->getKeyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Key::MODULE,
            GetKeyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetKeyResult($result);
    }
}