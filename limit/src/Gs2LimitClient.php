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

namespace Gs2\Limit;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Limit\Control\CreateCounterMasterRequest;
use Gs2\Limit\Control\CreateCounterMasterResult;
use Gs2\Limit\Control\DeleteCounterMasterRequest;
use Gs2\Limit\Control\DescribeCounterMasterRequest;
use Gs2\Limit\Control\DescribeCounterMasterResult;
use Gs2\Limit\Control\GetCounterMasterRequest;
use Gs2\Limit\Control\GetCounterMasterResult;
use Gs2\Limit\Control\UpdateCounterMasterRequest;
use Gs2\Limit\Control\UpdateCounterMasterResult;
use Gs2\Limit\Control\DeleteCounterRequest;
use Gs2\Limit\Control\DescribeCounterRequest;
use Gs2\Limit\Control\DescribeCounterResult;
use Gs2\Limit\Control\DescribeCounterByUserIdRequest;
use Gs2\Limit\Control\DescribeCounterByUserIdResult;
use Gs2\Limit\Control\GetCounterRequest;
use Gs2\Limit\Control\GetCounterResult;
use Gs2\Limit\Control\GetMyCounterRequest;
use Gs2\Limit\Control\GetMyCounterResult;
use Gs2\Limit\Control\UpCounterRequest;
use Gs2\Limit\Control\UpCounterResult;
use Gs2\Limit\Control\UpCounterByStampTaskRequest;
use Gs2\Limit\Control\UpCounterByStampTaskResult;
use Gs2\Limit\Control\UpMyCounterRequest;
use Gs2\Limit\Control\UpMyCounterResult;
use Gs2\Limit\Control\GetCurrentCounterMasterRequest;
use Gs2\Limit\Control\GetCurrentCounterMasterResult;
use Gs2\Limit\Control\UpdateCurrentCounterMasterRequest;
use Gs2\Limit\Control\UpdateCurrentCounterMasterResult;
use Gs2\Limit\Control\CreateLimitRequest;
use Gs2\Limit\Control\CreateLimitResult;
use Gs2\Limit\Control\DeleteLimitRequest;
use Gs2\Limit\Control\DescribeLimitRequest;
use Gs2\Limit\Control\DescribeLimitResult;
use Gs2\Limit\Control\GetLimitRequest;
use Gs2\Limit\Control\GetLimitResult;
use Gs2\Limit\Control\GetLimitStatusRequest;
use Gs2\Limit\Control\GetLimitStatusResult;
use Gs2\Limit\Control\UpdateLimitRequest;
use Gs2\Limit\Control\UpdateLimitResult;
use Gs2\Limit\Control\ExportMasterRequest;
use Gs2\Limit\Control\ExportMasterResult;

/**
 * GS2 Limit API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2LimitClient extends AbstractGs2Client {

	public static $ENDPOINT = "limit";

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
	 * カウンターマスターを新規作成します<br>
	 * <br>
	 *
	 * @param CreateCounterMasterRequest $request リクエストパラメータ
	 * @return CreateCounterMasterResult 結果
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
	public function createCounterMaster(CreateCounterMasterRequest $request): CreateCounterMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/master/counter";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['max'] = $request->getMax();
        $body['resetType'] = $request->getResetType();
        if($request->getResetDayOfMonth() !== null) $body['resetDayOfMonth'] = $request->getResetDayOfMonth();
        if($request->getResetDayOfWeek() !== null) $body['resetDayOfWeek'] = $request->getResetDayOfWeek();
        if($request->getResetHour() !== null) $body['resetHour'] = $request->getResetHour();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            CreateCounterMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateCounterMasterResult($result);
    }

	/**
	 * カウンターマスターを削除します<br>
	 * <br>
	 *
	 * @param DeleteCounterMasterRequest $request リクエストパラメータ
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
	public function deleteCounterMaster(DeleteCounterMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/master/counter/". ($request->getCounterName() === null || $request->getCounterName() === "" ? "null" : $request->getCounterName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            DeleteCounterMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * カウンターマスターの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeCounterMasterRequest $request リクエストパラメータ
	 * @return DescribeCounterMasterResult 結果
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
	public function describeCounterMaster(DescribeCounterMasterRequest $request): DescribeCounterMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/master/counter";

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
            Gs2Limit::MODULE,
            DescribeCounterMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeCounterMasterResult($result);
    }

	/**
	 * カウンターマスターを取得します<br>
	 * <br>
	 *
	 * @param GetCounterMasterRequest $request リクエストパラメータ
	 * @return GetCounterMasterResult 結果
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
	public function getCounterMaster(GetCounterMasterRequest $request): GetCounterMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/master/counter/". ($request->getCounterName() === null || $request->getCounterName() === "" ? "null" : $request->getCounterName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            GetCounterMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetCounterMasterResult($result);
    }

	/**
	 * カウンターマスターを更新します<br>
	 * <br>
	 *
	 * @param UpdateCounterMasterRequest $request リクエストパラメータ
	 * @return UpdateCounterMasterResult 結果
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
	public function updateCounterMaster(UpdateCounterMasterRequest $request): UpdateCounterMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/master/counter/". ($request->getCounterName() === null || $request->getCounterName() === "" ? "null" : $request->getCounterName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['max'] = $request->getMax();
        $body['resetType'] = $request->getResetType();
        if($request->getResetDayOfMonth() !== null) $body['resetDayOfMonth'] = $request->getResetDayOfMonth();
        if($request->getResetDayOfWeek() !== null) $body['resetDayOfWeek'] = $request->getResetDayOfWeek();
        if($request->getResetHour() !== null) $body['resetHour'] = $request->getResetHour();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            UpdateCounterMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateCounterMasterResult($result);
    }

	/**
	 * カウンターを削除します<br>
	 * <br>
	 *
	 * @param DeleteCounterRequest $request リクエストパラメータ
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
	public function deleteCounter(DeleteCounterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/counter/". ($request->getCounterName() === null || $request->getCounterName() === "" ? "null" : $request->getCounterName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            DeleteCounterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * カウンターの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeCounterRequest $request リクエストパラメータ
	 * @return DescribeCounterResult 結果
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
	public function describeCounter(DescribeCounterRequest $request): DescribeCounterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/counter";

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
            Gs2Limit::MODULE,
            DescribeCounterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeCounterResult($result);
    }

	/**
	 * ユーザのカウンターの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeCounterByUserIdRequest $request リクエストパラメータ
	 * @return DescribeCounterByUserIdResult 結果
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
	public function describeCounterByUserId(DescribeCounterByUserIdRequest $request): DescribeCounterByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/counter";

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
            Gs2Limit::MODULE,
            DescribeCounterByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeCounterByUserIdResult($result);
    }

	/**
	 * カウンターを取得します<br>
	 * <br>
	 *
	 * @param GetCounterRequest $request リクエストパラメータ
	 * @return GetCounterResult 結果
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
	public function getCounter(GetCounterRequest $request): GetCounterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/counter/". ($request->getCounterName() === null || $request->getCounterName() === "" ? "null" : $request->getCounterName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            GetCounterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetCounterResult($result);
    }

	/**
	 * カウンターを取得します<br>
	 * <br>
	 *
	 * @param GetMyCounterRequest $request リクエストパラメータ
	 * @return GetMyCounterResult 結果
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
	public function getMyCounter(GetMyCounterRequest $request): GetMyCounterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/counter/". ($request->getCounterName() === null || $request->getCounterName() === "" ? "null" : $request->getCounterName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            GetMyCounterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMyCounterResult($result);
    }

	/**
	 * カウンターを進めます<br>
	 * <br>
	 *
	 * @param UpCounterRequest $request リクエストパラメータ
	 * @return UpCounterResult 結果
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
	public function upCounter(UpCounterRequest $request): UpCounterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/counter/". ($request->getCounterName() === null || $request->getCounterName() === "" ? "null" : $request->getCounterName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            UpCounterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpCounterResult($result);
    }

	/**
	 * カウンターを進めます<br>
	 * <br>
	 *
	 * @param UpCounterByStampTaskRequest $request リクエストパラメータ
	 * @return UpCounterByStampTaskResult 結果
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
	public function upCounterByStampTask(UpCounterByStampTaskRequest $request): UpCounterByStampTaskResult
	{
	    $url = self::ENDPOINT_HOST. "/counter";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['task'] = $request->getTask();
        $body['keyName'] = $request->getKeyName();
        $body['transactionId'] = $request->getTransactionId();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            UpCounterByStampTaskRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpCounterByStampTaskResult($result);
    }

	/**
	 * カウンターを進めます<br>
	 * <br>
	 *
	 * @param UpMyCounterRequest $request リクエストパラメータ
	 * @return UpMyCounterResult 結果
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
	public function upMyCounter(UpMyCounterRequest $request): UpMyCounterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/counter/". ($request->getCounterName() === null || $request->getCounterName() === "" ? "null" : $request->getCounterName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            UpMyCounterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpMyCounterResult($result);
    }

	/**
	 * 現在適用されている回数制限マスターを取得します<br>
	 * <br>
	 *
	 * @param GetCurrentCounterMasterRequest $request リクエストパラメータ
	 * @return GetCurrentCounterMasterResult 結果
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
	public function getCurrentCounterMaster(GetCurrentCounterMasterRequest $request): GetCurrentCounterMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/counter/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            GetCurrentCounterMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetCurrentCounterMasterResult($result);
    }

	/**
	 * 回数制限マスターをインポートします<br>
	 * <br>
	 *
	 * @param UpdateCurrentCounterMasterRequest $request リクエストパラメータ
	 * @return UpdateCurrentCounterMasterResult 結果
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
	public function updateCurrentCounterMaster(UpdateCurrentCounterMasterRequest $request): UpdateCurrentCounterMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/counter/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['settings'] = $request->getSettings();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            UpdateCurrentCounterMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateCurrentCounterMasterResult($result);
    }

	/**
	 * 回数制限を新規作成します<br>
	 * <br>
	 *
	 * @param CreateLimitRequest $request リクエストパラメータ
	 * @return CreateLimitResult 結果
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
	public function createLimit(CreateLimitRequest $request): CreateLimitResult
	{
	    $url = self::ENDPOINT_HOST. "/limit";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            CreateLimitRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateLimitResult($result);
    }

	/**
	 * 回数制限を削除します<br>
	 * <br>
	 *
	 * @param DeleteLimitRequest $request リクエストパラメータ
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
	public function deleteLimit(DeleteLimitRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            DeleteLimitRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 回数制限の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeLimitRequest $request リクエストパラメータ
	 * @return DescribeLimitResult 結果
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
	public function describeLimit(DescribeLimitRequest $request): DescribeLimitResult
	{
	    $url = self::ENDPOINT_HOST. "/limit";

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
            Gs2Limit::MODULE,
            DescribeLimitRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeLimitResult($result);
    }

	/**
	 * 回数制限を取得します<br>
	 * <br>
	 *
	 * @param GetLimitRequest $request リクエストパラメータ
	 * @return GetLimitResult 結果
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
	public function getLimit(GetLimitRequest $request): GetLimitResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            GetLimitRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetLimitResult($result);
    }

	/**
	 * 回数制限の状態を取得します<br>
	 * <br>
	 *
	 * @param GetLimitStatusRequest $request リクエストパラメータ
	 * @return GetLimitStatusResult 結果
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
	public function getLimitStatus(GetLimitStatusRequest $request): GetLimitStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            GetLimitStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetLimitStatusResult($result);
    }

	/**
	 * 回数制限を更新します<br>
	 * <br>
	 *
	 * @param UpdateLimitRequest $request リクエストパラメータ
	 * @return UpdateLimitResult 結果
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
	public function updateLimit(UpdateLimitRequest $request): UpdateLimitResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            UpdateLimitRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateLimitResult($result);
    }

	/**
	 * カウンターマスターをエクスポートします<br>
	 * <br>
	 *
	 * @param ExportMasterRequest $request リクエストパラメータ
	 * @return ExportMasterResult 結果
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
	public function exportMaster(ExportMasterRequest $request): ExportMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/limit/". ($request->getLimitName() === null || $request->getLimitName() === "" ? "null" : $request->getLimitName()). "/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Limit::MODULE,
            ExportMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new ExportMasterResult($result);
    }
}