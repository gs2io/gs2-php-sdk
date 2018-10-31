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

namespace Gs2\Notification;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Notification\Control\CreateNotificationRequest;
use Gs2\Notification\Control\CreateNotificationResult;
use Gs2\Notification\Control\DeleteNotificationRequest;
use Gs2\Notification\Control\DescribeNotificationRequest;
use Gs2\Notification\Control\DescribeNotificationResult;
use Gs2\Notification\Control\GetNotificationRequest;
use Gs2\Notification\Control\GetNotificationResult;
use Gs2\Notification\Control\UpdateNotificationRequest;
use Gs2\Notification\Control\UpdateNotificationResult;
use Gs2\Notification\Control\CreateSubscribeRequest;
use Gs2\Notification\Control\CreateSubscribeResult;
use Gs2\Notification\Control\DeleteSubscribeRequest;
use Gs2\Notification\Control\DescribeSubscribeRequest;
use Gs2\Notification\Control\DescribeSubscribeResult;
use Gs2\Notification\Control\GetSubscribeRequest;
use Gs2\Notification\Control\GetSubscribeResult;

/**
 * GS2 Notification API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2NotificationClient extends AbstractGs2Client {

	public static $ENDPOINT = "notification";

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
	 * 通知を新規作成します<br>
	 * <br>
	 *
	 * @param CreateNotificationRequest $request リクエストパラメータ
	 * @return CreateNotificationResult 結果
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
	public function createNotification(CreateNotificationRequest $request): CreateNotificationResult
	{
	    $url = self::ENDPOINT_HOST. "/notification";

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
            Gs2Notification::MODULE,
            CreateNotificationRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateNotificationResult($result);
    }

	/**
	 * 通知を削除します<br>
	 * <br>
	 *
	 * @param DeleteNotificationRequest $request リクエストパラメータ
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
	public function deleteNotification(DeleteNotificationRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/notification/". ($request->getNotificationName() === null || $request->getNotificationName() === "" ? "null" : $request->getNotificationName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Notification::MODULE,
            DeleteNotificationRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 通知の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeNotificationRequest $request リクエストパラメータ
	 * @return DescribeNotificationResult 結果
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
	public function describeNotification(DescribeNotificationRequest $request): DescribeNotificationResult
	{
	    $url = self::ENDPOINT_HOST. "/notification";

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
            Gs2Notification::MODULE,
            DescribeNotificationRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeNotificationResult($result);
    }

	/**
	 * 通知を取得します<br>
	 * <br>
	 *
	 * @param GetNotificationRequest $request リクエストパラメータ
	 * @return GetNotificationResult 結果
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
	public function getNotification(GetNotificationRequest $request): GetNotificationResult
	{
	    $url = self::ENDPOINT_HOST. "/notification/". ($request->getNotificationName() === null || $request->getNotificationName() === "" ? "null" : $request->getNotificationName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Notification::MODULE,
            GetNotificationRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetNotificationResult($result);
    }

	/**
	 * 通知を更新します<br>
	 * <br>
	 *
	 * @param UpdateNotificationRequest $request リクエストパラメータ
	 * @return UpdateNotificationResult 結果
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
	public function updateNotification(UpdateNotificationRequest $request): UpdateNotificationResult
	{
	    $url = self::ENDPOINT_HOST. "/notification/". ($request->getNotificationName() === null || $request->getNotificationName() === "" ? "null" : $request->getNotificationName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Notification::MODULE,
            UpdateNotificationRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateNotificationResult($result);
    }

	/**
	 * 購読を作成します<br>
	 * <br>
	 *
	 * @param CreateSubscribeRequest $request リクエストパラメータ
	 * @return CreateSubscribeResult 結果
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
	public function createSubscribe(CreateSubscribeRequest $request): CreateSubscribeResult
	{
	    $url = self::ENDPOINT_HOST. "/notification/". ($request->getNotificationName() === null || $request->getNotificationName() === "" ? "null" : $request->getNotificationName()). "/subscribe";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['type'] = $request->getType();
        $body['endpoint'] = $request->getEndpoint();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Notification::MODULE,
            CreateSubscribeRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateSubscribeResult($result);
    }

	/**
	 * 購読を削除します<br>
	 * <br>
	 *
	 * @param DeleteSubscribeRequest $request リクエストパラメータ
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
	public function deleteSubscribe(DeleteSubscribeRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/notification/". ($request->getNotificationName() === null || $request->getNotificationName() === "" ? "null" : $request->getNotificationName()). "/subscribe/". ($request->getSubscribeId() === null || $request->getSubscribeId() === "" ? "null" : $request->getSubscribeId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Notification::MODULE,
            DeleteSubscribeRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 購読の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeSubscribeRequest $request リクエストパラメータ
	 * @return DescribeSubscribeResult 結果
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
	public function describeSubscribe(DescribeSubscribeRequest $request): DescribeSubscribeResult
	{
	    $url = self::ENDPOINT_HOST. "/notification/". ($request->getNotificationName() === null || $request->getNotificationName() === "" ? "null" : $request->getNotificationName()). "/subscribe";

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
            Gs2Notification::MODULE,
            DescribeSubscribeRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeSubscribeResult($result);
    }

	/**
	 * 購読を取得します<br>
	 * <br>
	 *
	 * @param GetSubscribeRequest $request リクエストパラメータ
	 * @return GetSubscribeResult 結果
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
	public function getSubscribe(GetSubscribeRequest $request): GetSubscribeResult
	{
	    $url = self::ENDPOINT_HOST. "/notification/". ($request->getNotificationName() === null || $request->getNotificationName() === "" ? "null" : $request->getNotificationName()). "/subscribe/". ($request->getSubscribeId() === null || $request->getSubscribeId() === "" ? "null" : $request->getSubscribeId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Notification::MODULE,
            GetSubscribeRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetSubscribeResult($result);
    }
}