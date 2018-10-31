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

namespace Gs2\Variable;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Variable\Control\DeleteMyVariableRequest;
use Gs2\Variable\Control\DeleteVariableRequest;
use Gs2\Variable\Control\GetMyVariableRequest;
use Gs2\Variable\Control\GetMyVariableResult;
use Gs2\Variable\Control\GetVariableRequest;
use Gs2\Variable\Control\GetVariableResult;
use Gs2\Variable\Control\SetMyVariableRequest;
use Gs2\Variable\Control\SetMyVariableResult;
use Gs2\Variable\Control\SetVariableRequest;
use Gs2\Variable\Control\SetVariableResult;

/**
 * GS2 Variable API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2VariableClient extends AbstractGs2Client {

	public static $ENDPOINT = "variable";

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
	 * 変数を削除する<br>
	 * <br>
	 *
	 * @param DeleteMyVariableRequest $request リクエストパラメータ
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
	public function deleteMyVariable(DeleteMyVariableRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/variable/". ($request->getVariableName() === null || $request->getVariableName() === "" ? "null" : $request->getVariableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Variable::MODULE,
            DeleteMyVariableRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 変数を削除する<br>
	 * <br>
	 *
	 * @param DeleteVariableRequest $request リクエストパラメータ
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
	public function deleteVariable(DeleteVariableRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/variable/". ($request->getVariableName() === null || $request->getVariableName() === "" ? "null" : $request->getVariableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Variable::MODULE,
            DeleteVariableRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 変数を取得します<br>
	 * <br>
	 *
	 * @param GetMyVariableRequest $request リクエストパラメータ
	 * @return GetMyVariableResult 結果
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
	public function getMyVariable(GetMyVariableRequest $request): GetMyVariableResult
	{
	    $url = self::ENDPOINT_HOST. "/variable/". ($request->getVariableName() === null || $request->getVariableName() === "" ? "null" : $request->getVariableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Variable::MODULE,
            GetMyVariableRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMyVariableResult($result);
    }

	/**
	 * 変数を取得します<br>
	 * <br>
	 *
	 * @param GetVariableRequest $request リクエストパラメータ
	 * @return GetVariableResult 結果
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
	public function getVariable(GetVariableRequest $request): GetVariableResult
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/variable/". ($request->getVariableName() === null || $request->getVariableName() === "" ? "null" : $request->getVariableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Variable::MODULE,
            GetVariableRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetVariableResult($result);
    }

	/**
	 * 変数を格納する<br>
	 * <br>
	 *
	 * @param SetMyVariableRequest $request リクエストパラメータ
	 * @return SetMyVariableResult 結果
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
	public function setMyVariable(SetMyVariableRequest $request): SetMyVariableResult
	{
	    $url = self::ENDPOINT_HOST. "/variable/". ($request->getVariableName() === null || $request->getVariableName() === "" ? "null" : $request->getVariableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['value'] = $request->getValue();
        $body['ttl'] = $request->getTtl();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Variable::MODULE,
            SetMyVariableRequest::FUNCTION,
            $body,
            $headers
        );
        return new SetMyVariableResult($result);
    }

	/**
	 * 変数を格納する<br>
	 * <br>
	 *
	 * @param SetVariableRequest $request リクエストパラメータ
	 * @return SetVariableResult 結果
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
	public function setVariable(SetVariableRequest $request): SetVariableResult
	{
	    $url = self::ENDPOINT_HOST. "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/variable/". ($request->getVariableName() === null || $request->getVariableName() === "" ? "null" : $request->getVariableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['value'] = $request->getValue();
        $body['ttl'] = $request->getTtl();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Variable::MODULE,
            SetVariableRequest::FUNCTION,
            $body,
            $headers
        );
        return new SetVariableResult($result);
    }
}