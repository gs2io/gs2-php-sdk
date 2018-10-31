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

namespace Gs2\Schedule;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Schedule\Control\GetCurrentEventMasterRequest;
use Gs2\Schedule\Control\GetCurrentEventMasterResult;
use Gs2\Schedule\Control\UpdateCurrentEventMasterRequest;
use Gs2\Schedule\Control\UpdateCurrentEventMasterResult;
use Gs2\Schedule\Control\CreateEventMasterRequest;
use Gs2\Schedule\Control\CreateEventMasterResult;
use Gs2\Schedule\Control\DeleteEventMasterRequest;
use Gs2\Schedule\Control\DescribeEventMasterRequest;
use Gs2\Schedule\Control\DescribeEventMasterResult;
use Gs2\Schedule\Control\GetEventMasterRequest;
use Gs2\Schedule\Control\GetEventMasterResult;
use Gs2\Schedule\Control\UpdateEventMasterRequest;
use Gs2\Schedule\Control\UpdateEventMasterResult;
use Gs2\Schedule\Control\DescribeEventRequest;
use Gs2\Schedule\Control\DescribeEventResult;
use Gs2\Schedule\Control\DescribeEventByUserIdRequest;
use Gs2\Schedule\Control\DescribeEventByUserIdResult;
use Gs2\Schedule\Control\GetEventRequest;
use Gs2\Schedule\Control\GetEventResult;
use Gs2\Schedule\Control\GetEventByUserIdRequest;
use Gs2\Schedule\Control\GetEventByUserIdResult;
use Gs2\Schedule\Control\ExportMasterRequest;
use Gs2\Schedule\Control\ExportMasterResult;
use Gs2\Schedule\Control\CreateScheduleRequest;
use Gs2\Schedule\Control\CreateScheduleResult;
use Gs2\Schedule\Control\DeleteScheduleRequest;
use Gs2\Schedule\Control\DescribeScheduleRequest;
use Gs2\Schedule\Control\DescribeScheduleResult;
use Gs2\Schedule\Control\GetScheduleRequest;
use Gs2\Schedule\Control\GetScheduleResult;
use Gs2\Schedule\Control\GetScheduleStatusRequest;
use Gs2\Schedule\Control\GetScheduleStatusResult;
use Gs2\Schedule\Control\UpdateScheduleRequest;
use Gs2\Schedule\Control\UpdateScheduleResult;
use Gs2\Schedule\Control\DeleteTriggerRequest;
use Gs2\Schedule\Control\DescribeTriggerRequest;
use Gs2\Schedule\Control\DescribeTriggerResult;
use Gs2\Schedule\Control\DescribeTriggerByUserIdRequest;
use Gs2\Schedule\Control\DescribeTriggerByUserIdResult;
use Gs2\Schedule\Control\GetTriggerRequest;
use Gs2\Schedule\Control\GetTriggerResult;
use Gs2\Schedule\Control\PullTriggerRequest;
use Gs2\Schedule\Control\PullTriggerResult;

/**
 * GS2 Schedule API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ScheduleClient extends AbstractGs2Client {

	public static $ENDPOINT = "schedule";

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
	 * 現在適用されているイベントマスターを取得します<br>
	 * <br>
	 *
	 * @param GetCurrentEventMasterRequest $request リクエストパラメータ
	 * @return GetCurrentEventMasterResult 結果
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
	public function getCurrentEventMaster(GetCurrentEventMasterRequest $request): GetCurrentEventMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/event/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            GetCurrentEventMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetCurrentEventMasterResult($result);
    }

	/**
	 * イベントマスターを更新します<br>
	 * <br>
	 *
	 * @param UpdateCurrentEventMasterRequest $request リクエストパラメータ
	 * @return UpdateCurrentEventMasterResult 結果
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
	public function updateCurrentEventMaster(UpdateCurrentEventMasterRequest $request): UpdateCurrentEventMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/event/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['settings'] = $request->getSettings();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            UpdateCurrentEventMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateCurrentEventMasterResult($result);
    }

	/**
	 * イベントマスターを新規作成します<br>
	 * <br>
	 *
	 * @param CreateEventMasterRequest $request リクエストパラメータ
	 * @return CreateEventMasterResult 結果
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
	public function createEventMaster(CreateEventMasterRequest $request): CreateEventMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/master/event";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['type'] = $request->getType();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getAbsoluteBegin() !== null) $body['absoluteBegin'] = $request->getAbsoluteBegin();
        if($request->getAbsoluteEnd() !== null) $body['absoluteEnd'] = $request->getAbsoluteEnd();
        if($request->getRelativeTriggerName() !== null) $body['relativeTriggerName'] = $request->getRelativeTriggerName();
        if($request->getRelativeSpan() !== null) $body['relativeSpan'] = $request->getRelativeSpan();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            CreateEventMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateEventMasterResult($result);
    }

	/**
	 * イベントマスターを削除します<br>
	 * <br>
	 *
	 * @param DeleteEventMasterRequest $request リクエストパラメータ
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
	public function deleteEventMaster(DeleteEventMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/master/event/". ($request->getEventName() === null || $request->getEventName() === "" ? "null" : $request->getEventName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            DeleteEventMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * イベントマスターの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeEventMasterRequest $request リクエストパラメータ
	 * @return DescribeEventMasterResult 結果
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
	public function describeEventMaster(DescribeEventMasterRequest $request): DescribeEventMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/master/event";

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
            Gs2Schedule::MODULE,
            DescribeEventMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeEventMasterResult($result);
    }

	/**
	 * イベントマスターを取得します<br>
	 * <br>
	 *
	 * @param GetEventMasterRequest $request リクエストパラメータ
	 * @return GetEventMasterResult 結果
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
	public function getEventMaster(GetEventMasterRequest $request): GetEventMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/master/event/". ($request->getEventName() === null || $request->getEventName() === "" ? "null" : $request->getEventName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            GetEventMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetEventMasterResult($result);
    }

	/**
	 * イベントマスターを更新します<br>
	 * <br>
	 *
	 * @param UpdateEventMasterRequest $request リクエストパラメータ
	 * @return UpdateEventMasterResult 結果
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
	public function updateEventMaster(UpdateEventMasterRequest $request): UpdateEventMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/master/event/". ($request->getEventName() === null || $request->getEventName() === "" ? "null" : $request->getEventName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['type'] = $request->getType();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getAbsoluteBegin() !== null) $body['absoluteBegin'] = $request->getAbsoluteBegin();
        if($request->getAbsoluteEnd() !== null) $body['absoluteEnd'] = $request->getAbsoluteEnd();
        if($request->getRelativeTriggerName() !== null) $body['relativeTriggerName'] = $request->getRelativeTriggerName();
        if($request->getRelativeSpan() !== null) $body['relativeSpan'] = $request->getRelativeSpan();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            UpdateEventMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateEventMasterResult($result);
    }

	/**
	 * 開催中のイベントの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeEventRequest $request リクエストパラメータ
	 * @return DescribeEventResult 結果
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
	public function describeEvent(DescribeEventRequest $request): DescribeEventResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/event";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        if($request->getEventNames() !== null) $queryString['eventNames'] = $request->getEventNames();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            DescribeEventRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeEventResult($result);
    }

	/**
	 * 開催中のイベントの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeEventByUserIdRequest $request リクエストパラメータ
	 * @return DescribeEventByUserIdResult 結果
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
	public function describeEventByUserId(DescribeEventByUserIdRequest $request): DescribeEventByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/event/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getEventNames() !== null) $queryString['eventNames'] = $request->getEventNames();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            DescribeEventByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeEventByUserIdResult($result);
    }

	/**
	 * 開催中のイベントを取得します<br>
	 * <br>
	 *
	 * @param GetEventRequest $request リクエストパラメータ
	 * @return GetEventResult 結果
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
	public function getEvent(GetEventRequest $request): GetEventResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/event/". ($request->getEventName() === null || $request->getEventName() === "" ? "null" : $request->getEventName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            GetEventRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetEventResult($result);
    }

	/**
	 * 開催中のイベントを取得します<br>
	 * <br>
	 *
	 * @param GetEventByUserIdRequest $request リクエストパラメータ
	 * @return GetEventByUserIdResult 結果
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
	public function getEventByUserId(GetEventByUserIdRequest $request): GetEventByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/event/". ($request->getEventName() === null || $request->getEventName() === "" ? "null" : $request->getEventName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            GetEventByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetEventByUserIdResult($result);
    }

	/**
	 * イベントマスターをエクスポートします<br>
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
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            ExportMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new ExportMasterResult($result);
    }

	/**
	 * スケジュールを新規作成します<br>
	 * <br>
	 *
	 * @param CreateScheduleRequest $request リクエストパラメータ
	 * @return CreateScheduleResult 結果
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
	public function createSchedule(CreateScheduleRequest $request): CreateScheduleResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule";

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
            Gs2Schedule::MODULE,
            CreateScheduleRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateScheduleResult($result);
    }

	/**
	 * スケジュールを削除します<br>
	 * <br>
	 *
	 * @param DeleteScheduleRequest $request リクエストパラメータ
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
	public function deleteSchedule(DeleteScheduleRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            DeleteScheduleRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * スケジュールの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeScheduleRequest $request リクエストパラメータ
	 * @return DescribeScheduleResult 結果
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
	public function describeSchedule(DescribeScheduleRequest $request): DescribeScheduleResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule";

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
            Gs2Schedule::MODULE,
            DescribeScheduleRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeScheduleResult($result);
    }

	/**
	 * スケジュールを取得します<br>
	 * <br>
	 *
	 * @param GetScheduleRequest $request リクエストパラメータ
	 * @return GetScheduleResult 結果
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
	public function getSchedule(GetScheduleRequest $request): GetScheduleResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            GetScheduleRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetScheduleResult($result);
    }

	/**
	 * スケジュールの状態を取得します<br>
	 * <br>
	 *
	 * @param GetScheduleStatusRequest $request リクエストパラメータ
	 * @return GetScheduleStatusResult 結果
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
	public function getScheduleStatus(GetScheduleStatusRequest $request): GetScheduleStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            GetScheduleStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetScheduleStatusResult($result);
    }

	/**
	 * スケジュールを更新します<br>
	 * <br>
	 *
	 * @param UpdateScheduleRequest $request リクエストパラメータ
	 * @return UpdateScheduleResult 結果
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
	public function updateSchedule(UpdateScheduleRequest $request): UpdateScheduleResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            UpdateScheduleRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateScheduleResult($result);
    }

	/**
	 * トリガーを削除します<br>
	 * <br>
	 *
	 * @param DeleteTriggerRequest $request リクエストパラメータ
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
	public function deleteTrigger(DeleteTriggerRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/trigger/". ($request->getTriggerName() === null || $request->getTriggerName() === "" ? "null" : $request->getTriggerName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            DeleteTriggerRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * トリガーの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeTriggerRequest $request リクエストパラメータ
	 * @return DescribeTriggerResult 結果
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
	public function describeTrigger(DescribeTriggerRequest $request): DescribeTriggerResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/trigger";

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
            Gs2Schedule::MODULE,
            DescribeTriggerRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeTriggerResult($result);
    }

	/**
	 * ユーザのトリガーの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeTriggerByUserIdRequest $request リクエストパラメータ
	 * @return DescribeTriggerByUserIdResult 結果
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
	public function describeTriggerByUserId(DescribeTriggerByUserIdRequest $request): DescribeTriggerByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/trigger";

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
            Gs2Schedule::MODULE,
            DescribeTriggerByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeTriggerByUserIdResult($result);
    }

	/**
	 * トリガーを取得します<br>
	 * <br>
	 *
	 * @param GetTriggerRequest $request リクエストパラメータ
	 * @return GetTriggerResult 結果
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
	public function getTrigger(GetTriggerRequest $request): GetTriggerResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/trigger/". ($request->getTriggerName() === null || $request->getTriggerName() === "" ? "null" : $request->getTriggerName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            GetTriggerRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetTriggerResult($result);
    }

	/**
	 * トリガーを引きます<br>
	 * <br>
	 *
	 * @param PullTriggerRequest $request リクエストパラメータ
	 * @return PullTriggerResult 結果
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
	public function pullTrigger(PullTriggerRequest $request): PullTriggerResult
	{
	    $url = self::ENDPOINT_HOST. "/schedule/". ($request->getScheduleName() === null || $request->getScheduleName() === "" ? "null" : $request->getScheduleName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/trigger/". ($request->getTriggerName() === null || $request->getTriggerName() === "" ? "null" : $request->getTriggerName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['action'] = $request->getAction();
        if($request->getTtl() !== null) $body['ttl'] = $request->getTtl();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Schedule::MODULE,
            PullTriggerRequest::FUNCTION,
            $body,
            $headers
        );
        return new PullTriggerResult($result);
    }
}