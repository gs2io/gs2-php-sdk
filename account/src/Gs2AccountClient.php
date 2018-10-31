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

namespace Gs2\Account;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Account\Control\AuthenticationRequest;
use Gs2\Account\Control\AuthenticationResult;
use Gs2\Account\Control\CreateAccountRequest;
use Gs2\Account\Control\CreateAccountResult;
use Gs2\Account\Control\DeleteAccountRequest;
use Gs2\Account\Control\DescribeAccountRequest;
use Gs2\Account\Control\DescribeAccountResult;
use Gs2\Account\Control\CreateGameRequest;
use Gs2\Account\Control\CreateGameResult;
use Gs2\Account\Control\DeleteGameRequest;
use Gs2\Account\Control\DescribeGameRequest;
use Gs2\Account\Control\DescribeGameResult;
use Gs2\Account\Control\DescribeServiceClassRequest;
use Gs2\Account\Control\DescribeServiceClassResult;
use Gs2\Account\Control\GetGameRequest;
use Gs2\Account\Control\GetGameResult;
use Gs2\Account\Control\GetGameStatusRequest;
use Gs2\Account\Control\GetGameStatusResult;
use Gs2\Account\Control\UpdateGameRequest;
use Gs2\Account\Control\UpdateGameResult;
use Gs2\Account\Control\CreateTakeOverRequest;
use Gs2\Account\Control\CreateTakeOverResult;
use Gs2\Account\Control\DeleteTakeOverRequest;
use Gs2\Account\Control\DescribeTakeOverRequest;
use Gs2\Account\Control\DescribeTakeOverResult;
use Gs2\Account\Control\DoTakeOverRequest;
use Gs2\Account\Control\DoTakeOverResult;
use Gs2\Account\Control\GetTakeOverRequest;
use Gs2\Account\Control\GetTakeOverResult;
use Gs2\Account\Control\UpdateTakeOverRequest;
use Gs2\Account\Control\UpdateTakeOverResult;

/**
 * GS2 Account API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2AccountClient extends AbstractGs2Client {

	public static $ENDPOINT = "account";

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
	 * 認証処理を行います<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param AuthenticationRequest $request リクエストパラメータ
	 * @return AuthenticationResult 結果
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
	public function authentication(AuthenticationRequest $request): AuthenticationResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/account/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['keyName'] = $request->getKeyName();
        $body['password'] = $request->getPassword();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            AuthenticationRequest::FUNCTION,
            $body,
            $headers
        );
        return new AuthenticationResult($result);
    }

	/**
	 * アカウントを登録します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param CreateAccountRequest $request リクエストパラメータ
	 * @return CreateAccountResult 結果
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
	public function createAccount(CreateAccountRequest $request): CreateAccountResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/account";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            CreateAccountRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateAccountResult($result);
    }

	/**
	 * アカウントを削除します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param DeleteAccountRequest $request リクエストパラメータ
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
	public function deleteAccount(DeleteAccountRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/account/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            DeleteAccountRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * アカウントを取得します<br>
	 * <br>
	 * - 消費クオータ: 50件あたり5<br>
	 * <br>
	 *
	 * @param DescribeAccountRequest $request リクエストパラメータ
	 * @return DescribeAccountResult 結果
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
	public function describeAccount(DescribeAccountRequest $request): DescribeAccountResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/account";

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
            Gs2Account::MODULE,
            DescribeAccountRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeAccountResult($result);
    }

	/**
	 * ゲームを新規作成します<br>
	 * <br>
	 *
	 * @param CreateGameRequest $request リクエストパラメータ
	 * @return CreateGameResult 結果
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
	public function createGame(CreateGameRequest $request): CreateGameResult
	{
	    $url = self::ENDPOINT_HOST. "/game";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getChangePasswordIfTakeOver() !== null) $body['changePasswordIfTakeOver'] = $request->getChangePasswordIfTakeOver();
        if($request->getCreateAccountTriggerScript() !== null) $body['createAccountTriggerScript'] = $request->getCreateAccountTriggerScript();
        if($request->getCreateAccountDoneTriggerScript() !== null) $body['createAccountDoneTriggerScript'] = $request->getCreateAccountDoneTriggerScript();
        if($request->getAuthenticationTriggerScript() !== null) $body['authenticationTriggerScript'] = $request->getAuthenticationTriggerScript();
        if($request->getAuthenticationDoneTriggerScript() !== null) $body['authenticationDoneTriggerScript'] = $request->getAuthenticationDoneTriggerScript();
        if($request->getCreateTakeOverTriggerScript() !== null) $body['createTakeOverTriggerScript'] = $request->getCreateTakeOverTriggerScript();
        if($request->getCreateTakeOverDoneTriggerScript() !== null) $body['createTakeOverDoneTriggerScript'] = $request->getCreateTakeOverDoneTriggerScript();
        if($request->getDoTakeOverTriggerScript() !== null) $body['doTakeOverTriggerScript'] = $request->getDoTakeOverTriggerScript();
        if($request->getDoTakeOverDoneTriggerScript() !== null) $body['doTakeOverDoneTriggerScript'] = $request->getDoTakeOverDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            CreateGameRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateGameResult($result);
    }

	/**
	 * ゲームを削除します<br>
	 * <br>
	 *
	 * @param DeleteGameRequest $request リクエストパラメータ
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
	public function deleteGame(DeleteGameRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            DeleteGameRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ゲームの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeGameRequest $request リクエストパラメータ
	 * @return DescribeGameResult 結果
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
	public function describeGame(DescribeGameRequest $request): DescribeGameResult
	{
	    $url = self::ENDPOINT_HOST. "/game";

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
            Gs2Account::MODULE,
            DescribeGameRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeGameResult($result);
    }

	/**
	 * サービスクラスの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeServiceClassRequest $request リクエストパラメータ
	 * @return DescribeServiceClassResult 結果
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
	public function describeServiceClass(DescribeServiceClassRequest $request): DescribeServiceClassResult
	{
	    $url = self::ENDPOINT_HOST. "/game/serviceClass";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            DescribeServiceClassRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeServiceClassResult($result);
    }

	/**
	 * ゲームを取得します<br>
	 * <br>
	 *
	 * @param GetGameRequest $request リクエストパラメータ
	 * @return GetGameResult 結果
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
	public function getGame(GetGameRequest $request): GetGameResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            GetGameRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGameResult($result);
    }

	/**
	 * ゲームのステータスを取得します<br>
	 * <br>
	 *
	 * @param GetGameStatusRequest $request リクエストパラメータ
	 * @return GetGameStatusResult 結果
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
	public function getGameStatus(GetGameStatusRequest $request): GetGameStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            GetGameStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGameStatusResult($result);
    }

	/**
	 * ゲームを更新します<br>
	 * <br>
	 *
	 * @param UpdateGameRequest $request リクエストパラメータ
	 * @return UpdateGameResult 結果
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
	public function updateGame(UpdateGameRequest $request): UpdateGameResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceClass'] = $request->getServiceClass();
        $body['changePasswordIfTakeOver'] = $request->getChangePasswordIfTakeOver();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getCreateAccountTriggerScript() !== null) $body['createAccountTriggerScript'] = $request->getCreateAccountTriggerScript();
        if($request->getCreateAccountDoneTriggerScript() !== null) $body['createAccountDoneTriggerScript'] = $request->getCreateAccountDoneTriggerScript();
        if($request->getAuthenticationTriggerScript() !== null) $body['authenticationTriggerScript'] = $request->getAuthenticationTriggerScript();
        if($request->getAuthenticationDoneTriggerScript() !== null) $body['authenticationDoneTriggerScript'] = $request->getAuthenticationDoneTriggerScript();
        if($request->getCreateTakeOverTriggerScript() !== null) $body['createTakeOverTriggerScript'] = $request->getCreateTakeOverTriggerScript();
        if($request->getCreateTakeOverDoneTriggerScript() !== null) $body['createTakeOverDoneTriggerScript'] = $request->getCreateTakeOverDoneTriggerScript();
        if($request->getDoTakeOverTriggerScript() !== null) $body['doTakeOverTriggerScript'] = $request->getDoTakeOverTriggerScript();
        if($request->getDoTakeOverDoneTriggerScript() !== null) $body['doTakeOverDoneTriggerScript'] = $request->getDoTakeOverDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            UpdateGameRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateGameResult($result);
    }

	/**
	 * 引き継ぎ情報を登録します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param CreateTakeOverRequest $request リクエストパラメータ
	 * @return CreateTakeOverResult 結果
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
	public function createTakeOver(CreateTakeOverRequest $request): CreateTakeOverResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/takeover";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['type'] = $request->getType();
        $body['userIdentifier'] = $request->getUserIdentifier();
        $body['password'] = $request->getPassword();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            CreateTakeOverRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateTakeOverResult($result);
    }

	/**
	 * 引き継ぎ情報を削除します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param DeleteTakeOverRequest $request リクエストパラメータ
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
	public function deleteTakeOver(DeleteTakeOverRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/takeover/". ($request->getType() === null || $request->getType() === "" ? "null" : $request->getType()). "/". ($request->getUserIdentifier() === null || $request->getUserIdentifier() === "" ? "null" : $request->getUserIdentifier()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            DeleteTakeOverRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 引き継ぎ情報を取得します<br>
	 * <br>
	 * - 消費クオータ: 50件あたり5<br>
	 * <br>
	 *
	 * @param DescribeTakeOverRequest $request リクエストパラメータ
	 * @return DescribeTakeOverResult 結果
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
	public function describeTakeOver(DescribeTakeOverRequest $request): DescribeTakeOverResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/takeover";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            DescribeTakeOverRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeTakeOverResult($result);
    }

	/**
	 * 引き継ぎを実行します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param DoTakeOverRequest $request リクエストパラメータ
	 * @return DoTakeOverResult 結果
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
	public function doTakeOver(DoTakeOverRequest $request): DoTakeOverResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/takeover/". ($request->getType() === null || $request->getType() === "" ? "null" : $request->getType()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['userIdentifier'] = $request->getUserIdentifier();
        $body['password'] = $request->getPassword();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            DoTakeOverRequest::FUNCTION,
            $body,
            $headers
        );
        return new DoTakeOverResult($result);
    }

	/**
	 * 引き継ぎ情報を取得します<br>
	 * <br>
	 * - 消費クオータ: 5<br>
	 * <br>
	 *
	 * @param GetTakeOverRequest $request リクエストパラメータ
	 * @return GetTakeOverResult 結果
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
	public function getTakeOver(GetTakeOverRequest $request): GetTakeOverResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/takeover/". ($request->getType() === null || $request->getType() === "" ? "null" : $request->getType()). "/". ($request->getUserIdentifier() === null || $request->getUserIdentifier() === "" ? "null" : $request->getUserIdentifier()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            GetTakeOverRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetTakeOverResult($result);
    }

	/**
	 * 引き継ぎ情報を更新します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param UpdateTakeOverRequest $request リクエストパラメータ
	 * @return UpdateTakeOverResult 結果
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
	public function updateTakeOver(UpdateTakeOverRequest $request): UpdateTakeOverResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/takeover/". ($request->getType() === null || $request->getType() === "" ? "null" : $request->getType()). "/". ($request->getUserIdentifier() === null || $request->getUserIdentifier() === "" ? "null" : $request->getUserIdentifier()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['oldPassword'] = $request->getOldPassword();
        $body['password'] = $request->getPassword();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Account::MODULE,
            UpdateTakeOverRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateTakeOverResult($result);
    }
}