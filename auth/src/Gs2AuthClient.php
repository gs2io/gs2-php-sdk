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

namespace Gs2\Auth;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Auth\Control\CreateOnceOnetimeTokenRequest;
use Gs2\Auth\Control\CreateOnceOnetimeTokenResult;
use Gs2\Auth\Control\CreateTimeOnetimeTokenRequest;
use Gs2\Auth\Control\CreateTimeOnetimeTokenResult;
use Gs2\Auth\Control\LoginRequest;
use Gs2\Auth\Control\LoginResult;
use Gs2\Auth\Control\LoginWithSignRequest;
use Gs2\Auth\Control\LoginWithSignResult;

/**
 * GS2 Auth API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2AuthClient extends AbstractGs2Client {

	public static $ENDPOINT = "auth";

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
	 * 実行回数制限付きワンタイムトークンを発行します<br>
	 * <br>
	 *
	 * @param CreateOnceOnetimeTokenRequest $request リクエストパラメータ
	 * @return CreateOnceOnetimeTokenResult 結果
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
	public function createOnceOnetimeToken(CreateOnceOnetimeTokenRequest $request): CreateOnceOnetimeTokenResult
	{
	    $url = self::ENDPOINT_HOST. "/onetime/once/token";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['scriptName'] = $request->getScriptName();
        $body['grant'] = $request->getGrant();
        $body['args'] = $request->getArgs();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Auth::MODULE,
            CreateOnceOnetimeTokenRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateOnceOnetimeTokenResult($result);
    }

	/**
	 * 1回のみ実行を許可するワンタイムトークンを発行します<br>
	 * このトークンはスタミナの回復処理など、有効期間内だからといって何度も実行されたくない処理を1度だけ許可したい場合に発行します。<br>
	 * <br>
	 *
	 * @param CreateTimeOnetimeTokenRequest $request リクエストパラメータ
	 * @return CreateTimeOnetimeTokenResult 結果
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
	public function createTimeOnetimeToken(CreateTimeOnetimeTokenRequest $request): CreateTimeOnetimeTokenResult
	{
	    $url = self::ENDPOINT_HOST. "/onetime/time/token";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['scriptName'] = $request->getScriptName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Auth::MODULE,
            CreateTimeOnetimeTokenRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateTimeOnetimeTokenResult($result);
    }

	/**
	 * ログイン処理を実行します<br>
	 * <br>
	 *
	 * @param LoginRequest $request リクエストパラメータ
	 * @return LoginResult 結果
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
	public function login(LoginRequest $request): LoginResult
	{
	    $url = self::ENDPOINT_HOST. "/login";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceId'] = $request->getServiceId();
        $body['userId'] = $request->getUserId();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Auth::MODULE,
            LoginRequest::FUNCTION,
            $body,
            $headers
        );
        return new LoginResult($result);
    }

	/**
	 * GS2-Accountの認証署名付きログイン処理を実行します<br>
	 * <br>
	 *
	 * @param LoginWithSignRequest $request リクエストパラメータ
	 * @return LoginWithSignResult 結果
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
	public function loginWithSign(LoginWithSignRequest $request): LoginWithSignResult
	{
	    $url = self::ENDPOINT_HOST. "/login/signed";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceId'] = $request->getServiceId();
        $body['userId'] = $request->getUserId();
        $body['keyName'] = $request->getKeyName();
        $body['sign'] = $request->getSign();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Auth::MODULE,
            LoginWithSignRequest::FUNCTION,
            $body,
            $headers
        );
        return new LoginWithSignResult($result);
    }
}