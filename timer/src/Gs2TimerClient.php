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

namespace Gs2\Timer;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Timer\Control\CreateTimerPoolRequest;
use Gs2\Timer\Control\CreateTimerPoolResult;
use Gs2\Timer\Control\DeleteTimerPoolRequest;
use Gs2\Timer\Control\DescribeTimerPoolRequest;
use Gs2\Timer\Control\DescribeTimerPoolResult;
use Gs2\Timer\Control\GetTimerPoolRequest;
use Gs2\Timer\Control\GetTimerPoolResult;
use Gs2\Timer\Control\UpdateTimerPoolRequest;
use Gs2\Timer\Control\UpdateTimerPoolResult;
use Gs2\Timer\Control\CreateTimerRequest;
use Gs2\Timer\Control\CreateTimerResult;
use Gs2\Timer\Control\DeleteTimerRequest;
use Gs2\Timer\Control\DescribeTimerRequest;
use Gs2\Timer\Control\DescribeTimerResult;
use Gs2\Timer\Control\GetTimerRequest;
use Gs2\Timer\Control\GetTimerResult;

/**
 * GS2 Timer API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2TimerClient extends AbstractGs2Client {

	public static $ENDPOINT = "timer";

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
	 * タイマープールを新規作成します<br>
	 * <br>
	 *
	 * @param CreateTimerPoolRequest $request リクエストパラメータ
	 * @return CreateTimerPoolResult 結果
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
	public function createTimerPool(CreateTimerPoolRequest $request): CreateTimerPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/timerPool";

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
            Gs2Timer::MODULE,
            CreateTimerPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateTimerPoolResult($result);
    }

	/**
	 * タイマープールを削除します<br>
	 * <br>
	 *
	 * @param DeleteTimerPoolRequest $request リクエストパラメータ
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
	public function deleteTimerPool(DeleteTimerPoolRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/timerPool/". ($request->getTimerPoolName() === null || $request->getTimerPoolName() === "" ? "null" : $request->getTimerPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Timer::MODULE,
            DeleteTimerPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * タイマープールの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeTimerPoolRequest $request リクエストパラメータ
	 * @return DescribeTimerPoolResult 結果
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
	public function describeTimerPool(DescribeTimerPoolRequest $request): DescribeTimerPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/timerPool";

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
            Gs2Timer::MODULE,
            DescribeTimerPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeTimerPoolResult($result);
    }

	/**
	 * タイマープールを取得します<br>
	 * <br>
	 *
	 * @param GetTimerPoolRequest $request リクエストパラメータ
	 * @return GetTimerPoolResult 結果
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
	public function getTimerPool(GetTimerPoolRequest $request): GetTimerPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/timerPool/". ($request->getTimerPoolName() === null || $request->getTimerPoolName() === "" ? "null" : $request->getTimerPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Timer::MODULE,
            GetTimerPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetTimerPoolResult($result);
    }

	/**
	 * タイマープールを更新します<br>
	 * <br>
	 *
	 * @param UpdateTimerPoolRequest $request リクエストパラメータ
	 * @return UpdateTimerPoolResult 結果
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
	public function updateTimerPool(UpdateTimerPoolRequest $request): UpdateTimerPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/timerPool/". ($request->getTimerPoolName() === null || $request->getTimerPoolName() === "" ? "null" : $request->getTimerPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Timer::MODULE,
            UpdateTimerPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateTimerPoolResult($result);
    }

	/**
	 * タイマーを新規作成します<br>
	 * <br>
	 * タイマーの timestamp は秒単位で指定できますが、<br>
	 * 指定した時刻以降で通常1分以内にコールバックURLは呼び出されます<br>
	 * <br>
	 * 混雑時などには数分の遅れが出ることがあります<br>
	 * <br>
	 * タイマーによるコールバックは指定されたリトライ回数試行します<br>
	 * タイムアウトなどの理由により、実際には通信が到達しているにもかかわらず、リトライが発生する可能性があります<br>
	 * <br>
	 * コールバックは同等のリクエストが複数回呼び出されても問題なく動作するように設計してください<br>
	 * <br>
	 *
	 * @param CreateTimerRequest $request リクエストパラメータ
	 * @return CreateTimerResult 結果
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
	public function createTimer(CreateTimerRequest $request): CreateTimerResult
	{
	    $url = self::ENDPOINT_HOST. "/timerPool/". ($request->getTimerPoolName() === null || $request->getTimerPoolName() === "" ? "null" : $request->getTimerPoolName()). "/timer";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['callbackMethod'] = $request->getCallbackMethod();
        $body['callbackUrl'] = $request->getCallbackUrl();
        $body['executeTime'] = $request->getExecuteTime();
        if($request->getCallbackBody() !== null) $body['callbackBody'] = $request->getCallbackBody();
        if($request->getRetryMax() !== null) $body['retryMax'] = $request->getRetryMax();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Timer::MODULE,
            CreateTimerRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateTimerResult($result);
    }

	/**
	 * タイマーを削除します<br>
	 * <br>
	 *
	 * @param DeleteTimerRequest $request リクエストパラメータ
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
	public function deleteTimer(DeleteTimerRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/timerPool/". ($request->getTimerPoolName() === null || $request->getTimerPoolName() === "" ? "null" : $request->getTimerPoolName()). "/timer/". ($request->getTimerId() === null || $request->getTimerId() === "" ? "null" : $request->getTimerId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Timer::MODULE,
            DeleteTimerRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * タイマーの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeTimerRequest $request リクエストパラメータ
	 * @return DescribeTimerResult 結果
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
	public function describeTimer(DescribeTimerRequest $request): DescribeTimerResult
	{
	    $url = self::ENDPOINT_HOST. "/timerPool/". ($request->getTimerPoolName() === null || $request->getTimerPoolName() === "" ? "null" : $request->getTimerPoolName()). "/timer";

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
            Gs2Timer::MODULE,
            DescribeTimerRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeTimerResult($result);
    }

	/**
	 * タイマーを取得します<br>
	 * <br>
	 *
	 * @param GetTimerRequest $request リクエストパラメータ
	 * @return GetTimerResult 結果
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
	public function getTimer(GetTimerRequest $request): GetTimerResult
	{
	    $url = self::ENDPOINT_HOST. "/timerPool/". ($request->getTimerPoolName() === null || $request->getTimerPoolName() === "" ? "null" : $request->getTimerPoolName()). "/timer/". ($request->getTimerId() === null || $request->getTimerId() === "" ? "null" : $request->getTimerId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Timer::MODULE,
            GetTimerRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetTimerResult($result);
    }
}