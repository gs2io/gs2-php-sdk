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

namespace Gs2\Identifier;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Identifier\Control\CreateIdentifierRequest;
use Gs2\Identifier\Control\CreateIdentifierResult;
use Gs2\Identifier\Control\DeleteIdentifierRequest;
use Gs2\Identifier\Control\DescribeIdentifierRequest;
use Gs2\Identifier\Control\DescribeIdentifierResult;
use Gs2\Identifier\Control\GetIdentifierRequest;
use Gs2\Identifier\Control\GetIdentifierResult;
use Gs2\Identifier\Control\CreateSecurityPolicyRequest;
use Gs2\Identifier\Control\CreateSecurityPolicyResult;
use Gs2\Identifier\Control\DeleteSecurityPolicyRequest;
use Gs2\Identifier\Control\DescribeCommonSecurityPolicyRequest;
use Gs2\Identifier\Control\DescribeCommonSecurityPolicyResult;
use Gs2\Identifier\Control\DescribeSecurityPolicyRequest;
use Gs2\Identifier\Control\DescribeSecurityPolicyResult;
use Gs2\Identifier\Control\GetSecurityPolicyRequest;
use Gs2\Identifier\Control\GetSecurityPolicyResult;
use Gs2\Identifier\Control\UpdateSecurityPolicyRequest;
use Gs2\Identifier\Control\UpdateSecurityPolicyResult;
use Gs2\Identifier\Control\AttachSecurityPolicyRequest;
use Gs2\Identifier\Control\CreateUserRequest;
use Gs2\Identifier\Control\CreateUserResult;
use Gs2\Identifier\Control\DeleteUserRequest;
use Gs2\Identifier\Control\DescribeUserRequest;
use Gs2\Identifier\Control\DescribeUserResult;
use Gs2\Identifier\Control\DetachSecurityPolicyRequest;
use Gs2\Identifier\Control\GetHasSecurityPolicyRequest;
use Gs2\Identifier\Control\GetHasSecurityPolicyResult;
use Gs2\Identifier\Control\GetUserRequest;
use Gs2\Identifier\Control\GetUserResult;

/**
 * GS2 Identifier API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2IdentifierClient extends AbstractGs2Client {

	public static $ENDPOINT = "identifier";

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
	 * GSIを新規作成します<br>
	 * <br>
	 *
	 * @param CreateIdentifierRequest $request リクエストパラメータ
	 * @return CreateIdentifierResult 結果
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
	public function createIdentifier(CreateIdentifierRequest $request): CreateIdentifierResult
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserName() === null || $request->getUserName() === "" ? "null" : $request->getUserName()). "/identifier";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            CreateIdentifierRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateIdentifierResult($result);
    }

	/**
	 * GSIを削除します<br>
	 * <br>
	 *
	 * @param DeleteIdentifierRequest $request リクエストパラメータ
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
	public function deleteIdentifier(DeleteIdentifierRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserName() === null || $request->getUserName() === "" ? "null" : $request->getUserName()). "/identifier/". ($request->getIdentifierId() === null || $request->getIdentifierId() === "" ? "null" : $request->getIdentifierId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            DeleteIdentifierRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * GSIの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeIdentifierRequest $request リクエストパラメータ
	 * @return DescribeIdentifierResult 結果
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
	public function describeIdentifier(DescribeIdentifierRequest $request): DescribeIdentifierResult
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserName() === null || $request->getUserName() === "" ? "null" : $request->getUserName()). "/identifier";

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
            Gs2Identifier::MODULE,
            DescribeIdentifierRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeIdentifierResult($result);
    }

	/**
	 * GSIを取得します。<br>
	 * <br>
	 *
	 * @param GetIdentifierRequest $request リクエストパラメータ
	 * @return GetIdentifierResult 結果
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
	public function getIdentifier(GetIdentifierRequest $request): GetIdentifierResult
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserName() === null || $request->getUserName() === "" ? "null" : $request->getUserName()). "/identifier/". ($request->getIdentifierId() === null || $request->getIdentifierId() === "" ? "null" : $request->getIdentifierId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            GetIdentifierRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetIdentifierResult($result);
    }

	/**
	 * セキュリティポリシーを新規作成します<br>
	 * <br>
	 *
	 * @param CreateSecurityPolicyRequest $request リクエストパラメータ
	 * @return CreateSecurityPolicyResult 結果
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
	public function createSecurityPolicy(CreateSecurityPolicyRequest $request): CreateSecurityPolicyResult
	{
	    $url = self::ENDPOINT_HOST. "/securityPolicy";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['policy'] = $request->getPolicy();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            CreateSecurityPolicyRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateSecurityPolicyResult($result);
    }

	/**
	 * セキュリティポリシーを削除します<br>
	 * <br>
	 *
	 * @param DeleteSecurityPolicyRequest $request リクエストパラメータ
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
	public function deleteSecurityPolicy(DeleteSecurityPolicyRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/securityPolicy/". ($request->getSecurityPolicyName() === null || $request->getSecurityPolicyName() === "" ? "null" : $request->getSecurityPolicyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            DeleteSecurityPolicyRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 共用セキュリティポリシーの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeCommonSecurityPolicyRequest $request リクエストパラメータ
	 * @return DescribeCommonSecurityPolicyResult 結果
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
	public function describeCommonSecurityPolicy(DescribeCommonSecurityPolicyRequest $request): DescribeCommonSecurityPolicyResult
	{
	    $url = self::ENDPOINT_HOST. "/securityPolicy/common";

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
            Gs2Identifier::MODULE,
            DescribeCommonSecurityPolicyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeCommonSecurityPolicyResult($result);
    }

	/**
	 * セキュリティポリシーの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeSecurityPolicyRequest $request リクエストパラメータ
	 * @return DescribeSecurityPolicyResult 結果
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
	public function describeSecurityPolicy(DescribeSecurityPolicyRequest $request): DescribeSecurityPolicyResult
	{
	    $url = self::ENDPOINT_HOST. "/securityPolicy";

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
            Gs2Identifier::MODULE,
            DescribeSecurityPolicyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeSecurityPolicyResult($result);
    }

	/**
	 * セキュリティポリシーを取得します<br>
	 * <br>
	 *
	 * @param GetSecurityPolicyRequest $request リクエストパラメータ
	 * @return GetSecurityPolicyResult 結果
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
	public function getSecurityPolicy(GetSecurityPolicyRequest $request): GetSecurityPolicyResult
	{
	    $url = self::ENDPOINT_HOST. "/securityPolicy/". ($request->getSecurityPolicyName() === null || $request->getSecurityPolicyName() === "" ? "null" : $request->getSecurityPolicyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            GetSecurityPolicyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetSecurityPolicyResult($result);
    }

	/**
	 * セキュリティポリシーを更新します<br>
	 * <br>
	 *
	 * @param UpdateSecurityPolicyRequest $request リクエストパラメータ
	 * @return UpdateSecurityPolicyResult 結果
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
	public function updateSecurityPolicy(UpdateSecurityPolicyRequest $request): UpdateSecurityPolicyResult
	{
	    $url = self::ENDPOINT_HOST. "/securityPolicy/". ($request->getSecurityPolicyName() === null || $request->getSecurityPolicyName() === "" ? "null" : $request->getSecurityPolicyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['policy'] = $request->getPolicy();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            UpdateSecurityPolicyRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateSecurityPolicyResult($result);
    }

	/**
	 * ユーザにセキュリティポリシーを割り当てます<br>
	 * <br>
	 *
	 * @param AttachSecurityPolicyRequest $request リクエストパラメータ
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
	public function attachSecurityPolicy(AttachSecurityPolicyRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserName() === null || $request->getUserName() === "" ? "null" : $request->getUserName()). "/securityPolicy";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['securityPolicyId'] = $request->getSecurityPolicyId();
        $this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            AttachSecurityPolicyRequest::FUNCTION,
            $body,
            $headers
        );
    }

	/**
	 * ユーザを新規作成します<br>
	 * <br>
	 *
	 * @param CreateUserRequest $request リクエストパラメータ
	 * @return CreateUserResult 結果
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
	public function createUser(CreateUserRequest $request): CreateUserResult
	{
	    $url = self::ENDPOINT_HOST. "/user";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            CreateUserRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateUserResult($result);
    }

	/**
	 * ユーザを削除します<br>
	 * <br>
	 *
	 * @param DeleteUserRequest $request リクエストパラメータ
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
	public function deleteUser(DeleteUserRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserName() === null || $request->getUserName() === "" ? "null" : $request->getUserName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            DeleteUserRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ユーザの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeUserRequest $request リクエストパラメータ
	 * @return DescribeUserResult 結果
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
	public function describeUser(DescribeUserRequest $request): DescribeUserResult
	{
	    $url = self::ENDPOINT_HOST. "/user";

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
            Gs2Identifier::MODULE,
            DescribeUserRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeUserResult($result);
    }

	/**
	 * ユーザに割り当てられたセキュリティポリシーを解除します<br>
	 * <br>
	 *
	 * @param DetachSecurityPolicyRequest $request リクエストパラメータ
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
	public function detachSecurityPolicy(DetachSecurityPolicyRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserName() === null || $request->getUserName() === "" ? "null" : $request->getUserName()). "/securityPolicy/". ($request->getSecurityPolicyId() === null || $request->getSecurityPolicyId() === "" ? "null" : $request->getSecurityPolicyId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            DetachSecurityPolicyRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ユーザが保持しているセキュリティポリシー一覧を取得します<br>
	 * <br>
	 *
	 * @param GetHasSecurityPolicyRequest $request リクエストパラメータ
	 * @return GetHasSecurityPolicyResult 結果
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
	public function getHasSecurityPolicy(GetHasSecurityPolicyRequest $request): GetHasSecurityPolicyResult
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserName() === null || $request->getUserName() === "" ? "null" : $request->getUserName()). "/securityPolicy";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            GetHasSecurityPolicyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetHasSecurityPolicyResult($result);
    }

	/**
	 * ユーザを取得します。<br>
	 * <br>
	 *
	 * @param GetUserRequest $request リクエストパラメータ
	 * @return GetUserResult 結果
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
	public function getUser(GetUserRequest $request): GetUserResult
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserName() === null || $request->getUserName() === "" ? "null" : $request->getUserName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Identifier::MODULE,
            GetUserRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetUserResult($result);
    }
}