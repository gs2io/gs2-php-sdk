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

namespace Gs2\Chat;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Chat\Control\CreateLobbyRequest;
use Gs2\Chat\Control\CreateLobbyResult;
use Gs2\Chat\Control\DeleteLobbyRequest;
use Gs2\Chat\Control\DescribeLobbyRequest;
use Gs2\Chat\Control\DescribeLobbyResult;
use Gs2\Chat\Control\DescribeServiceClassRequest;
use Gs2\Chat\Control\DescribeServiceClassResult;
use Gs2\Chat\Control\GetLobbyRequest;
use Gs2\Chat\Control\GetLobbyResult;
use Gs2\Chat\Control\GetLobbyStatusRequest;
use Gs2\Chat\Control\GetLobbyStatusResult;
use Gs2\Chat\Control\UpdateLobbyRequest;
use Gs2\Chat\Control\UpdateLobbyResult;
use Gs2\Chat\Control\CheckEstimateScanByteByAllRoomRequest;
use Gs2\Chat\Control\CheckEstimateScanByteByAllRoomResult;
use Gs2\Chat\Control\CheckEstimateScanByteByRoomRequest;
use Gs2\Chat\Control\CheckEstimateScanByteByRoomResult;
use Gs2\Chat\Control\SearchLogByAllRoomRequest;
use Gs2\Chat\Control\SearchLogByAllRoomResult;
use Gs2\Chat\Control\SearchLogByRoomRequest;
use Gs2\Chat\Control\SearchLogByRoomResult;
use Gs2\Chat\Control\DescribeMessageRequest;
use Gs2\Chat\Control\DescribeMessageResult;
use Gs2\Chat\Control\DescribeMessageNoAuthRequest;
use Gs2\Chat\Control\DescribeMessageNoAuthResult;
use Gs2\Chat\Control\SendMessageRequest;
use Gs2\Chat\Control\SendMessageResult;
use Gs2\Chat\Control\SendMessageNoAuthRequest;
use Gs2\Chat\Control\SendMessageNoAuthResult;
use Gs2\Chat\Control\CreateRoomRequest;
use Gs2\Chat\Control\CreateRoomResult;
use Gs2\Chat\Control\DeleteRoomRequest;
use Gs2\Chat\Control\DescribeRoomRequest;
use Gs2\Chat\Control\DescribeRoomResult;
use Gs2\Chat\Control\GetRoomRequest;
use Gs2\Chat\Control\GetRoomResult;
use Gs2\Chat\Control\CreateMySubscribeRequest;
use Gs2\Chat\Control\CreateMySubscribeResult;
use Gs2\Chat\Control\CreateSubscribeRequest;
use Gs2\Chat\Control\CreateSubscribeResult;
use Gs2\Chat\Control\DeleteMySubscribeRequest;
use Gs2\Chat\Control\DeleteSubscribeRequest;
use Gs2\Chat\Control\DescribeMySubscribeRequest;
use Gs2\Chat\Control\DescribeMySubscribeResult;
use Gs2\Chat\Control\DescribeSubscribeByRoomIdRequest;
use Gs2\Chat\Control\DescribeSubscribeByRoomIdResult;
use Gs2\Chat\Control\DescribeSubscribeByUserIdRequest;
use Gs2\Chat\Control\DescribeSubscribeByUserIdResult;
use Gs2\Chat\Control\GetMySubscribeRequest;
use Gs2\Chat\Control\GetMySubscribeResult;
use Gs2\Chat\Control\GetSubscribeRequest;
use Gs2\Chat\Control\GetSubscribeResult;

/**
 * GS2 Chat API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ChatClient extends AbstractGs2Client {

	public static $ENDPOINT = "chat";

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
	 * ロビーを新規作成します<br>
	 * <br>
	 * GS2-Chat の使用を開始するには、まずはロビーを作成します。<br>
	 * ロビーはチャットルームの集合体のような存在です。<br>
	 * <br>
	 * ロビーへの設定項目として購読しているルームに発言があったときの通知方式を指定できます。<br>
	 * http/https を設定した場合は、新しい発言があるたびに指定されたURLに通知を出します。<br>
	 * 通知は以下のフォーマットで通知されます。<br>
	 * {<br>
	 *   "_gs2_service": "GS2-Chat#Receive",<br>
	 *   "notificationUserIds": [<br>
	 *     通知先ユーザID<br>
	 *   ],<br>
	 *   "roomId": 発言されたルームID,<br>
	 *   "userId": 発言したユーザのユーザID,<br>
	 *   "message": {<br>
	 *     "text": メッセージテキスト,<br>
	 *     "meta": メタデータ,<br>
	 *   }<br>
	 * }<br>
	 * GS2-InGamePushNotification を指定した場合は、新しい発言があるたびにプッシュ通知を出します。<br>
	 * 通知は以下のフォーマットで通知されます。<br>
	 * {<br>
	 *   "subject": メッセージテキスト,<br>
	 *   "body": {<br>
	 *     "_gs2_service": "GS2-Chat#Receive",<br>
	 *     "roomId": 発言されたルームID,<br>
	 *     "userId": 発言したユーザのユーザID,<br>
	 *     "message": {<br>
	 *       "text": メッセージテキスト,<br>
	 *       "meta": メタデータ,<br>
	 *     }<br>
	 *   }<br>
	 * }<br>
	 * <br>
	 *
	 * @param CreateLobbyRequest $request リクエストパラメータ
	 * @return CreateLobbyResult 結果
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
	public function createLobby(CreateLobbyRequest $request): CreateLobbyResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['serviceClass'] = $request->getServiceClass();
        $body['notificationType'] = $request->getNotificationType();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getNotificationUrl() !== null) $body['notificationUrl'] = $request->getNotificationUrl();
        if($request->getNotificationGameName() !== null) $body['notificationGameName'] = $request->getNotificationGameName();
        if($request->getLogging() !== null) $body['logging'] = $request->getLogging();
        if($request->getLoggingDate() !== null) $body['loggingDate'] = $request->getLoggingDate();
        if($request->getCreateRoomTriggerScript() !== null) $body['createRoomTriggerScript'] = $request->getCreateRoomTriggerScript();
        if($request->getCreateRoomDoneTriggerScript() !== null) $body['createRoomDoneTriggerScript'] = $request->getCreateRoomDoneTriggerScript();
        if($request->getDeleteRoomTriggerScript() !== null) $body['deleteRoomTriggerScript'] = $request->getDeleteRoomTriggerScript();
        if($request->getDeleteRoomDoneTriggerScript() !== null) $body['deleteRoomDoneTriggerScript'] = $request->getDeleteRoomDoneTriggerScript();
        if($request->getCreateSubscribeTriggerScript() !== null) $body['createSubscribeTriggerScript'] = $request->getCreateSubscribeTriggerScript();
        if($request->getCreateSubscribeDoneTriggerScript() !== null) $body['createSubscribeDoneTriggerScript'] = $request->getCreateSubscribeDoneTriggerScript();
        if($request->getDeleteSubscribeTriggerScript() !== null) $body['deleteSubscribeTriggerScript'] = $request->getDeleteSubscribeTriggerScript();
        if($request->getDeleteSubscribeDoneTriggerScript() !== null) $body['deleteSubscribeDoneTriggerScript'] = $request->getDeleteSubscribeDoneTriggerScript();
        if($request->getSendMessageTriggerScript() !== null) $body['sendMessageTriggerScript'] = $request->getSendMessageTriggerScript();
        if($request->getSendMessageDoneTriggerScript() !== null) $body['sendMessageDoneTriggerScript'] = $request->getSendMessageDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            CreateLobbyRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateLobbyResult($result);
    }

	/**
	 * ロビーを削除します<br>
	 * <br>
	 *
	 * @param DeleteLobbyRequest $request リクエストパラメータ
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
	public function deleteLobby(DeleteLobbyRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            DeleteLobbyRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ロビーの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeLobbyRequest $request リクエストパラメータ
	 * @return DescribeLobbyResult 結果
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
	public function describeLobby(DescribeLobbyRequest $request): DescribeLobbyResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby";

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
            Gs2Chat::MODULE,
            DescribeLobbyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeLobbyResult($result);
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
	    $url = self::ENDPOINT_HOST. "/lobby/serviceClass";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            DescribeServiceClassRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeServiceClassResult($result);
    }

	/**
	 * ロビーを取得します<br>
	 * <br>
	 *
	 * @param GetLobbyRequest $request リクエストパラメータ
	 * @return GetLobbyResult 結果
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
	public function getLobby(GetLobbyRequest $request): GetLobbyResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            GetLobbyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetLobbyResult($result);
    }

	/**
	 * ロビーの状態を取得します<br>
	 * <br>
	 *
	 * @param GetLobbyStatusRequest $request リクエストパラメータ
	 * @return GetLobbyStatusResult 結果
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
	public function getLobbyStatus(GetLobbyStatusRequest $request): GetLobbyStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            GetLobbyStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetLobbyStatusResult($result);
    }

	/**
	 * ロビーを更新します<br>
	 * <br>
	 *
	 * @param UpdateLobbyRequest $request リクエストパラメータ
	 * @return UpdateLobbyResult 結果
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
	public function updateLobby(UpdateLobbyRequest $request): UpdateLobbyResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceClass'] = $request->getServiceClass();
        $body['notificationType'] = $request->getNotificationType();
        $body['logging'] = $request->getLogging();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getNotificationUrl() !== null) $body['notificationUrl'] = $request->getNotificationUrl();
        if($request->getNotificationGameName() !== null) $body['notificationGameName'] = $request->getNotificationGameName();
        if($request->getLoggingDate() !== null) $body['loggingDate'] = $request->getLoggingDate();
        if($request->getCreateRoomTriggerScript() !== null) $body['createRoomTriggerScript'] = $request->getCreateRoomTriggerScript();
        if($request->getCreateRoomDoneTriggerScript() !== null) $body['createRoomDoneTriggerScript'] = $request->getCreateRoomDoneTriggerScript();
        if($request->getDeleteRoomTriggerScript() !== null) $body['deleteRoomTriggerScript'] = $request->getDeleteRoomTriggerScript();
        if($request->getDeleteRoomDoneTriggerScript() !== null) $body['deleteRoomDoneTriggerScript'] = $request->getDeleteRoomDoneTriggerScript();
        if($request->getCreateSubscribeTriggerScript() !== null) $body['createSubscribeTriggerScript'] = $request->getCreateSubscribeTriggerScript();
        if($request->getCreateSubscribeDoneTriggerScript() !== null) $body['createSubscribeDoneTriggerScript'] = $request->getCreateSubscribeDoneTriggerScript();
        if($request->getDeleteSubscribeTriggerScript() !== null) $body['deleteSubscribeTriggerScript'] = $request->getDeleteSubscribeTriggerScript();
        if($request->getDeleteSubscribeDoneTriggerScript() !== null) $body['deleteSubscribeDoneTriggerScript'] = $request->getDeleteSubscribeDoneTriggerScript();
        if($request->getSendMessageTriggerScript() !== null) $body['sendMessageTriggerScript'] = $request->getSendMessageTriggerScript();
        if($request->getSendMessageDoneTriggerScript() !== null) $body['sendMessageDoneTriggerScript'] = $request->getSendMessageDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            UpdateLobbyRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateLobbyResult($result);
    }

	/**
	 * メッセージ検索時にスキャンするログサイズの予測値を取得します。<br>
	 * <br>
	 * 長期にわたる検索を行う場合、事前におおよそのログスキャン容量を把握したいと思うはずです。<br>
	 * そのような場合にはこのAPIを使用することで、事前にログスキャン容量を把握することが出来ます。<br>
	 * <br>
	 * ただし、ここで得られる値はあくまで予測値であり、実際に実行した際の値とは異なる場合があります。<br>
	 * <br>
	 *
	 * @param CheckEstimateScanByteByAllRoomRequest $request リクエストパラメータ
	 * @return CheckEstimateScanByteByAllRoomResult 結果
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
	public function checkEstimateScanByteByAllRoom(CheckEstimateScanByteByAllRoomRequest $request): CheckEstimateScanByteByAllRoomResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/log/estimate";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getUserId() !== null) $queryString['userId'] = $request->getUserId();
        if($request->getMessage() !== null) $queryString['message'] = $request->getMessage();
        if($request->getMeta() !== null) $queryString['meta'] = $request->getMeta();
        if($request->getBegin() !== null) $queryString['begin'] = $request->getBegin();
        if($request->getEnd() !== null) $queryString['end'] = $request->getEnd();
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            CheckEstimateScanByteByAllRoomRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new CheckEstimateScanByteByAllRoomResult($result);
    }

	/**
	 * メッセージ検索時にスキャンするログサイズの予測値を取得します。<br>
	 * <br>
	 * 長期にわたる検索を行う場合、事前におおよそのログスキャン容量を把握したいと思うはずです。<br>
	 * そのような場合にはこのAPIを使用することで、事前にログスキャン容量を把握することが出来ます。<br>
	 * <br>
	 * ただし、ここで得られる値はあくまで予測値であり、実際に実行した際の値とは異なる場合があります。<br>
	 * <br>
	 *
	 * @param CheckEstimateScanByteByRoomRequest $request リクエストパラメータ
	 * @return CheckEstimateScanByteByRoomResult 結果
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
	public function checkEstimateScanByteByRoom(CheckEstimateScanByteByRoomRequest $request): CheckEstimateScanByteByRoomResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/log/estimate";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getUserId() !== null) $queryString['userId'] = $request->getUserId();
        if($request->getMessage() !== null) $queryString['message'] = $request->getMessage();
        if($request->getMeta() !== null) $queryString['meta'] = $request->getMeta();
        if($request->getBegin() !== null) $queryString['begin'] = $request->getBegin();
        if($request->getEnd() !== null) $queryString['end'] = $request->getEnd();
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            CheckEstimateScanByteByRoomRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new CheckEstimateScanByteByRoomResult($result);
    }

	/**
	 * メッセージログを検索します。<br>
	 * <br>
	 * メッセージログの検索には以下のパラメータを使用できます。<br>
	 * * ユーザID<br>
	 * * メッセージテキスト<br>
	 * * メッセージメタデータ<br>
	 * いずれも部分一致で検索できます。<br>
	 * たとえば、メッセージメタデータに JSON フォーマットを使用している場合は JSON 文字列に対する部分一致検索が適用できます。<br>
	 * 一方で、BLOB データを Base64 かけたようなデータの場合は検索対象とするのは困難です。<br>
	 * <br>
	 * メッセージログ検索にかかる費用は、検索時にログデータを何バイトスキャンしたかで決定されます。<br>
	 * そのため、発言者が滞在していたルームが特定できている場合は、本APIではなく『Gs2Chat:SearchLogByRoom』を使用する方が費用を節約できます。<br>
	 * また、検索範囲を時間で指定できますが、ログデータは1日単位(UTC)で分割して保存されており、スキャン時には1日分全てがスキャン対象となります。<br>
	 * つまり、特定の日付の5分間のログを検索するクエリを実行した場合、該当する1日分のログデータがスキャン対象となり、<br>
	 * さらにその5分間が日付をまたぐような場合は2日分のログデータがスキャン対象となります。<br>
	 * <br>
	 * 検索結果が指定した取得最大件数以上の結果を持つ場合、実行後一定期間内であればページトークンを使用した続きのデータ取得が可能です。<br>
	 * <br>
	 *
	 * @param SearchLogByAllRoomRequest $request リクエストパラメータ
	 * @return SearchLogByAllRoomResult 結果
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
	public function searchLogByAllRoom(SearchLogByAllRoomRequest $request): SearchLogByAllRoomResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/log";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getUserId() !== null) $queryString['userId'] = $request->getUserId();
        if($request->getMessage() !== null) $queryString['message'] = $request->getMessage();
        if($request->getMeta() !== null) $queryString['meta'] = $request->getMeta();
        if($request->getBegin() !== null) $queryString['begin'] = $request->getBegin();
        if($request->getEnd() !== null) $queryString['end'] = $request->getEnd();
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        if($request->getUseCache() !== null) $queryString['useCache'] = $request->getUseCache();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            SearchLogByAllRoomRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new SearchLogByAllRoomResult($result);
    }

	/**
	 * メッセージログを検索します。<br>
	 * <br>
	 * メッセージログの検索には以下のパラメータを使用できます。<br>
	 * * ユーザID<br>
	 * * メッセージテキスト<br>
	 * * メッセージメタデータ<br>
	 * いずれも部分一致で検索できます。<br>
	 * たとえば、メッセージメタデータに JSON フォーマットを使用している場合は JSON 文字列に対する部分一致検索が適用できます。<br>
	 * 一方で、BLOB データを Base64 かけたようなデータの場合は検索対象とするのは困難です。<br>
	 * <br>
	 * メッセージログ検索にかかる費用は、検索時にログデータを何バイトスキャンしたかで決定されます。<br>
	 * 検索範囲を時間で指定できますが、ログデータは1日単位(UTC)で分割して保存されており、スキャン時には1日分全てがスキャン対象となります。<br>
	 * つまり、特定の日付の5分間のログを検索するクエリを実行した場合、該当する1日分のログデータがスキャン対象となり、<br>
	 * さらにその5分間が日付をまたぐような場合は2日分のログデータがスキャン対象となります。<br>
	 * <br>
	 * 検索結果が指定した取得最大件数以上の結果を持つ場合、実行後一定期間内であればページトークンを使用した続きのデータ取得が可能です。<br>
	 * <br>
	 *
	 * @param SearchLogByRoomRequest $request リクエストパラメータ
	 * @return SearchLogByRoomResult 結果
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
	public function searchLogByRoom(SearchLogByRoomRequest $request): SearchLogByRoomResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/log";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getUserId() !== null) $queryString['userId'] = $request->getUserId();
        if($request->getMessage() !== null) $queryString['message'] = $request->getMessage();
        if($request->getMeta() !== null) $queryString['meta'] = $request->getMeta();
        if($request->getBegin() !== null) $queryString['begin'] = $request->getBegin();
        if($request->getEnd() !== null) $queryString['end'] = $request->getEnd();
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        if($request->getUseCache() !== null) $queryString['useCache'] = $request->getUseCache();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            SearchLogByRoomRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new SearchLogByRoomResult($result);
    }

	/**
	 * メッセージの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeMessageRequest $request リクエストパラメータ
	 * @return DescribeMessageResult 結果
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
	public function describeMessage(DescribeMessageRequest $request): DescribeMessageResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/message";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        if($request->getPassword() !== null) $queryString['password'] = $request->getPassword();
        if($request->getStartAt() !== null) $queryString['startAt'] = $request->getStartAt();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            DescribeMessageRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeMessageResult($result);
    }

	/**
	 * メッセージの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeMessageNoAuthRequest $request リクエストパラメータ
	 * @return DescribeMessageNoAuthResult 結果
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
	public function describeMessageNoAuth(DescribeMessageNoAuthRequest $request): DescribeMessageNoAuthResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/message/force";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getStartAt() !== null) $queryString['startAt'] = $request->getStartAt();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            DescribeMessageNoAuthRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeMessageNoAuthResult($result);
    }

	/**
	 * メッセージを送信します。<br>
	 * <br>
	 *
	 * @param SendMessageRequest $request リクエストパラメータ
	 * @return SendMessageResult 結果
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
	public function sendMessage(SendMessageRequest $request): SendMessageResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/message";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['message'] = $request->getMessage();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getPassword() !== null) $body['password'] = $request->getPassword();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            SendMessageRequest::FUNCTION,
            $body,
            $headers
        );
        return new SendMessageResult($result);
    }

	/**
	 * メッセージを送信します。<br>
	 * <br>
	 *
	 * @param SendMessageNoAuthRequest $request リクエストパラメータ
	 * @return SendMessageNoAuthResult 結果
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
	public function sendMessageNoAuth(SendMessageNoAuthRequest $request): SendMessageNoAuthResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/message/force";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['userId'] = $request->getUserId();
        $body['message'] = $request->getMessage();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            SendMessageNoAuthRequest::FUNCTION,
            $body,
            $headers
        );
        return new SendMessageNoAuthResult($result);
    }

	/**
	 * ルームを作成します<br>
	 * <br>
	 * ルームには参加可能なユーザIDリストを設定することが出来ます。<br>
	 * ここで指定されたユーザID以外のユーザがメッセージ情報を取得したり、メッセージを書き込もうとしても失敗するようになります。<br>
	 * 何も指定しなければ、誰でも読み書きの出来る部屋になります。<br>
	 * ルームを作成する際に参加するユーザが確定している場合に使用するといいでしょう。<br>
	 * <br>
	 * ルームにはパスワードを設定することが出来ます。<br>
	 * パスワードが設定されたルームのメッセージ情報を取得したり、メッセージを書き込もうとするさいにパスワードを指定する必要があります。<br>
	 * パスワードが一致しない場合は失敗します。<br>
	 * 何も指定しなければ、メッセージの読み書きにパスワードを要求しません。<br>
	 * ルームを作成する際には参加するユーザが確定できないけれど、アクセスを制限したい場合に使用するといいでしょう。<br>
	 * <br>
	 * ルームIDには任意の値を指定することが出来ます。<br>
	 * たとえば、マッチメイキングを実行し構築されたギャザリングのユーザ向けにチャットルームを提供したい場合、<br>
	 * ギャザリングIDをキーとしてルームを作成することで、クライアントがチャットにアクセスする際にIDの特定が容易になります。<br>
	 * ルームIDを省略するとUUIDv4に基づいて自動的に採番されます。<br>
	 * <br>
	 *
	 * @param CreateRoomRequest $request リクエストパラメータ
	 * @return CreateRoomResult 結果
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
	public function createRoom(CreateRoomRequest $request): CreateRoomResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getRoomId() !== null) $body['roomId'] = $request->getRoomId();
        if($request->getAllowUserIds() !== null) $body['allowUserIds'] = $request->getAllowUserIds();
        if($request->getPassword() !== null) $body['password'] = $request->getPassword();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            CreateRoomRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateRoomResult($result);
    }

	/**
	 * ルームを削除します<br>
	 * <br>
	 *
	 * @param DeleteRoomRequest $request リクエストパラメータ
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
	public function deleteRoom(DeleteRoomRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            DeleteRoomRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ルームの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeRoomRequest $request リクエストパラメータ
	 * @return DescribeRoomResult 結果
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
	public function describeRoom(DescribeRoomRequest $request): DescribeRoomResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room";

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
            Gs2Chat::MODULE,
            DescribeRoomRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeRoomResult($result);
    }

	/**
	 * ルームを取得します<br>
	 * <br>
	 *
	 * @param GetRoomRequest $request リクエストパラメータ
	 * @return GetRoomResult 結果
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
	public function getRoom(GetRoomRequest $request): GetRoomResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            GetRoomRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetRoomResult($result);
    }

	/**
	 * ルームを購読します。<br>
	 * <br>
	 * ルームを購読すると、ルームに対する新着メッセージを受信したときに通知を受けることが出来ます。<br>
	 * 通知方式はロビーの設定に依存します。<br>
	 * <br>
	 *
	 * @param CreateMySubscribeRequest $request リクエストパラメータ
	 * @return CreateMySubscribeResult 結果
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
	public function createMySubscribe(CreateMySubscribeRequest $request): CreateMySubscribeResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/subscribe";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        if($request->getEnableOfflineTransfer() !== null) $body['enableOfflineTransfer'] = $request->getEnableOfflineTransfer();
        if($request->getOfflineTransferSound() !== null) $body['offlineTransferSound'] = $request->getOfflineTransferSound();
        if($request->getPassword() !== null) $body['password'] = $request->getPassword();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            CreateMySubscribeRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateMySubscribeResult($result);
    }

	/**
	 * ルームを購読します。<br>
	 * <br>
	 * ルームを購読すると、ルームに対する新着メッセージを受信したときに通知を受けることが出来ます。<br>
	 * 通知方式はロビーの設定に依存します。<br>
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
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/subscribe";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getEnableOfflineTransfer() !== null) $body['enableOfflineTransfer'] = $request->getEnableOfflineTransfer();
        if($request->getOfflineTransferSound() !== null) $body['offlineTransferSound'] = $request->getOfflineTransferSound();
        if($request->getPassword() !== null) $body['password'] = $request->getPassword();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            CreateSubscribeRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateSubscribeResult($result);
    }

	/**
	 * 購読を解除する。<br>
	 * <br>
	 *
	 * @param DeleteMySubscribeRequest $request リクエストパラメータ
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
	public function deleteMySubscribe(DeleteMySubscribeRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/user/self/subscribe";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            DeleteMySubscribeRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 購読を解除する。<br>
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
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/subscribe";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            DeleteSubscribeRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ユーザが購読しているルームの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeMySubscribeRequest $request リクエストパラメータ
	 * @return DescribeMySubscribeResult 結果
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
	public function describeMySubscribe(DescribeMySubscribeRequest $request): DescribeMySubscribeResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/user/subscribe";

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
            Gs2Chat::MODULE,
            DescribeMySubscribeRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeMySubscribeResult($result);
    }

	/**
	 * ルームを購読しているユーザの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeSubscribeByRoomIdRequest $request リクエストパラメータ
	 * @return DescribeSubscribeByRoomIdResult 結果
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
	public function describeSubscribeByRoomId(DescribeSubscribeByRoomIdRequest $request): DescribeSubscribeByRoomIdResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/subscribe";

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
            Gs2Chat::MODULE,
            DescribeSubscribeByRoomIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeSubscribeByRoomIdResult($result);
    }

	/**
	 * ユーザが購読しているルームの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeSubscribeByUserIdRequest $request リクエストパラメータ
	 * @return DescribeSubscribeByUserIdResult 結果
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
	public function describeSubscribeByUserId(DescribeSubscribeByUserIdRequest $request): DescribeSubscribeByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/subscribe";

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
            Gs2Chat::MODULE,
            DescribeSubscribeByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeSubscribeByUserIdResult($result);
    }

	/**
	 * 購読情報を取得する。<br>
	 * <br>
	 *
	 * @param GetMySubscribeRequest $request リクエストパラメータ
	 * @return GetMySubscribeResult 結果
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
	public function getMySubscribe(GetMySubscribeRequest $request): GetMySubscribeResult
	{
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/user/self/subscribe";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            GetMySubscribeRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMySubscribeResult($result);
    }

	/**
	 * 購読情報を取得する。<br>
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
	    $url = self::ENDPOINT_HOST. "/lobby/". ($request->getLobbyName() === null || $request->getLobbyName() === "" ? "null" : $request->getLobbyName()). "/room/". ($request->getRoomId() === null || $request->getRoomId() === "" ? "null" : $request->getRoomId()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/subscribe";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Chat::MODULE,
            GetSubscribeRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetSubscribeResult($result);
    }
}