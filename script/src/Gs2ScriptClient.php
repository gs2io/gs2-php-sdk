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

namespace Gs2\Script;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Script\Control\CreateScriptRequest;
use Gs2\Script\Control\CreateScriptResult;
use Gs2\Script\Control\DeleteScriptRequest;
use Gs2\Script\Control\DescribeScriptRequest;
use Gs2\Script\Control\DescribeScriptResult;
use Gs2\Script\Control\GetScriptRequest;
use Gs2\Script\Control\GetScriptResult;
use Gs2\Script\Control\UpdateScriptRequest;
use Gs2\Script\Control\UpdateScriptResult;

/**
 * GS2 Script API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ScriptClient extends AbstractGs2Client {

	public static $ENDPOINT = "script";

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
	 * スクリプトを新規作成します<br>
	 * <br>
	 *
	 * @param CreateScriptRequest $request リクエストパラメータ
	 * @return CreateScriptResult 結果
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
	public function createScript(CreateScriptRequest $request): CreateScriptResult
	{
	    $url = self::ENDPOINT_HOST. "/script";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['script'] = $request->getScript();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Script::MODULE,
            CreateScriptRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateScriptResult($result);
    }

	/**
	 * スクリプトを削除します<br>
	 * <br>
	 *
	 * @param DeleteScriptRequest $request リクエストパラメータ
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
	public function deleteScript(DeleteScriptRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/script/". ($request->getScriptName() === null || $request->getScriptName() === "" ? "null" : $request->getScriptName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Script::MODULE,
            DeleteScriptRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * スクリプトの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeScriptRequest $request リクエストパラメータ
	 * @return DescribeScriptResult 結果
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
	public function describeScript(DescribeScriptRequest $request): DescribeScriptResult
	{
	    $url = self::ENDPOINT_HOST. "/script";

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
            Gs2Script::MODULE,
            DescribeScriptRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeScriptResult($result);
    }

	/**
	 * スクリプトを取得します<br>
	 * <br>
	 *
	 * @param GetScriptRequest $request リクエストパラメータ
	 * @return GetScriptResult 結果
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
	public function getScript(GetScriptRequest $request): GetScriptResult
	{
	    $url = self::ENDPOINT_HOST. "/script/". ($request->getScriptName() === null || $request->getScriptName() === "" ? "null" : $request->getScriptName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Script::MODULE,
            GetScriptRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetScriptResult($result);
    }

	/**
	 * スクリプトを更新します<br>
	 * <br>
	 *
	 * @param UpdateScriptRequest $request リクエストパラメータ
	 * @return UpdateScriptResult 結果
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
	public function updateScript(UpdateScriptRequest $request): UpdateScriptResult
	{
	    $url = self::ENDPOINT_HOST. "/script/". ($request->getScriptName() === null || $request->getScriptName() === "" ? "null" : $request->getScriptName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getScript() !== null) $body['script'] = $request->getScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Script::MODULE,
            UpdateScriptRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateScriptResult($result);
    }
}