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

namespace Gs2\Watch;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Watch\Control\CreateAlarmRequest;
use Gs2\Watch\Control\CreateAlarmResult;
use Gs2\Watch\Control\DeleteAlarmRequest;
use Gs2\Watch\Control\DescribeAlarmRequest;
use Gs2\Watch\Control\DescribeAlarmResult;
use Gs2\Watch\Control\DescribeAlarmEventRequest;
use Gs2\Watch\Control\DescribeAlarmEventResult;
use Gs2\Watch\Control\GetAlarmRequest;
use Gs2\Watch\Control\GetAlarmResult;
use Gs2\Watch\Control\UpdateAlarmRequest;
use Gs2\Watch\Control\UpdateAlarmResult;
use Gs2\Watch\Control\DescribeOperationRequest;
use Gs2\Watch\Control\DescribeOperationResult;
use Gs2\Watch\Control\DescribeServiceRequest;
use Gs2\Watch\Control\DescribeServiceResult;
use Gs2\Watch\Control\GetMetricRequest;
use Gs2\Watch\Control\GetMetricResult;

/**
 * GS2 Watch API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2WatchClient extends AbstractGs2Client {

	public static $ENDPOINT = "watch";

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
	 * アラームを新規作成します<br>
	 * <br>
	 *
	 * @param CreateAlarmRequest $request リクエストパラメータ
	 * @return CreateAlarmResult 結果
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
	public function createAlarm(CreateAlarmRequest $request): CreateAlarmResult
	{
	    $url = self::ENDPOINT_HOST. "/alarm";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['service'] = $request->getService();
        $body['operation'] = $request->getOperation();
        $body['expression'] = $request->getExpression();
        $body['threshold'] = $request->getThreshold();
        $body['notificationId'] = $request->getNotificationId();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getServiceId() !== null) $body['serviceId'] = $request->getServiceId();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Watch::MODULE,
            CreateAlarmRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateAlarmResult($result);
    }

	/**
	 * アラームを削除します<br>
	 * <br>
	 *
	 * @param DeleteAlarmRequest $request リクエストパラメータ
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
	public function deleteAlarm(DeleteAlarmRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/alarm/". ($request->getAlarmName() === null || $request->getAlarmName() === "" ? "null" : $request->getAlarmName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Watch::MODULE,
            DeleteAlarmRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * アラームの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeAlarmRequest $request リクエストパラメータ
	 * @return DescribeAlarmResult 結果
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
	public function describeAlarm(DescribeAlarmRequest $request): DescribeAlarmResult
	{
	    $url = self::ENDPOINT_HOST. "/alarm";

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
            Gs2Watch::MODULE,
            DescribeAlarmRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeAlarmResult($result);
    }

	/**
	 * アラームイベントの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeAlarmEventRequest $request リクエストパラメータ
	 * @return DescribeAlarmEventResult 結果
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
	public function describeAlarmEvent(DescribeAlarmEventRequest $request): DescribeAlarmEventResult
	{
	    $url = self::ENDPOINT_HOST. "/alarm/". ($request->getAlarmName() === null || $request->getAlarmName() === "" ? "null" : $request->getAlarmName()). "/event";

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
            Gs2Watch::MODULE,
            DescribeAlarmEventRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeAlarmEventResult($result);
    }

	/**
	 * アラームを取得します<br>
	 * <br>
	 *
	 * @param GetAlarmRequest $request リクエストパラメータ
	 * @return GetAlarmResult 結果
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
	public function getAlarm(GetAlarmRequest $request): GetAlarmResult
	{
	    $url = self::ENDPOINT_HOST. "/alarm/". ($request->getAlarmName() === null || $request->getAlarmName() === "" ? "null" : $request->getAlarmName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Watch::MODULE,
            GetAlarmRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetAlarmResult($result);
    }

	/**
	 * アラームを更新します<br>
	 * <br>
	 *
	 * @param UpdateAlarmRequest $request リクエストパラメータ
	 * @return UpdateAlarmResult 結果
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
	public function updateAlarm(UpdateAlarmRequest $request): UpdateAlarmResult
	{
	    $url = self::ENDPOINT_HOST. "/alarm/". ($request->getAlarmName() === null || $request->getAlarmName() === "" ? "null" : $request->getAlarmName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['expression'] = $request->getExpression();
        $body['threshold'] = $request->getThreshold();
        $body['notificationId'] = $request->getNotificationId();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Watch::MODULE,
            UpdateAlarmRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateAlarmResult($result);
    }

	/**
	 * 操作の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeOperationRequest $request リクエストパラメータ
	 * @return DescribeOperationResult 結果
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
	public function describeOperation(DescribeOperationRequest $request): DescribeOperationResult
	{
	    $url = self::ENDPOINT_HOST. "/service/". ($request->getService() === null || $request->getService() === "" ? "null" : $request->getService()). "/operation";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Watch::MODULE,
            DescribeOperationRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeOperationResult($result);
    }

	/**
	 * サービスの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeServiceRequest $request リクエストパラメータ
	 * @return DescribeServiceResult 結果
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
	public function describeService(DescribeServiceRequest $request): DescribeServiceResult
	{
	    $url = self::ENDPOINT_HOST. "/service";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Watch::MODULE,
            DescribeServiceRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeServiceResult($result);
    }

	/**
	 * メトリックを取得します<br>
	 * <br>
	 *
	 * @param GetMetricRequest $request リクエストパラメータ
	 * @return GetMetricResult 結果
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
	public function getMetric(GetMetricRequest $request): GetMetricResult
	{
	    $url = self::ENDPOINT_HOST. "/metric/". ($request->getServiceId() === null || $request->getServiceId() === "" ? "null" : $request->getServiceId()). "/". ($request->getOperation() === null || $request->getOperation() === "" ? "null" : $request->getOperation()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getBegin() !== null) $queryString['begin'] = $request->getBegin();
        if($request->getEnd() !== null) $queryString['end'] = $request->getEnd();
        if($request->getAllowLongTerm() !== null) $queryString['allowLongTerm'] = $request->getAllowLongTerm();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Watch::MODULE,
            GetMetricRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMetricResult($result);
    }
}