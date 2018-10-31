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

namespace Gs2\InGamePushNotification;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\InGamePushNotification\Control\CreateGameRequest;
use Gs2\InGamePushNotification\Control\CreateGameResult;
use Gs2\InGamePushNotification\Control\DeleteGameRequest;
use Gs2\InGamePushNotification\Control\DescribeGameRequest;
use Gs2\InGamePushNotification\Control\DescribeGameResult;
use Gs2\InGamePushNotification\Control\DescribeServiceClassRequest;
use Gs2\InGamePushNotification\Control\DescribeServiceClassResult;
use Gs2\InGamePushNotification\Control\GetGameRequest;
use Gs2\InGamePushNotification\Control\GetGameResult;
use Gs2\InGamePushNotification\Control\GetGameStatusRequest;
use Gs2\InGamePushNotification\Control\GetGameStatusResult;
use Gs2\InGamePushNotification\Control\UpdateGameRequest;
use Gs2\InGamePushNotification\Control\UpdateGameResult;
use Gs2\InGamePushNotification\Control\GetMqttHostRequest;
use Gs2\InGamePushNotification\Control\GetMqttHostResult;
use Gs2\InGamePushNotification\Control\GetWebSocketHostRequest;
use Gs2\InGamePushNotification\Control\GetWebSocketHostResult;
use Gs2\InGamePushNotification\Control\PublishRequest;
use Gs2\InGamePushNotification\Control\PublishResult;
use Gs2\InGamePushNotification\Control\CreateCertificateRequest;
use Gs2\InGamePushNotification\Control\CreateCertificateResult;
use Gs2\InGamePushNotification\Control\DeleteCertificateRequest;
use Gs2\InGamePushNotification\Control\DescribeStatusRequest;
use Gs2\InGamePushNotification\Control\DescribeStatusResult;
use Gs2\InGamePushNotification\Control\SetFirebaseTokenRequest;
use Gs2\InGamePushNotification\Control\SetFirebaseTokenResult;

/**
 * GS2 InGamePushNotification API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2InGamePushNotificationClient extends AbstractGs2Client {

	public static $ENDPOINT = "in-game-push-notification";

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
	 * ゲームを新規作成します<br>
	 * <br>
	 * GS2-InGamePushNotification の使用を開始するには、まずはゲームを作成します。<br>
	 * その後、ゲームに対してMQTTに接続するためのクライアント証明書の発行を依頼をします。<br>
	 * 応答されたクライアント証明書と秘密鍵をデバイスに保存し、MQTTサーバへの接続に使用します。<br>
	 * <br>
	 * サーバサイドから ユーザに対してプッシュ通知を出すことが出来ます。<br>
	 * その際にユーザがMQTTに接続している場合はMQTTを使用して通知を出します。<br>
	 * もし、ユーザがMQTTに接続していない場合の挙動は ゲームの設定で変更できます。<br>
	 * <br>
	 * 1つ目は何もしない。<br>
	 * 2つ目は指定したURLに通知する。<br>
	 * 3つ目は Firebase Cloud Messaging を使用してモバイルプッシュ通知する。です。<br>
	 * <br>
	 * http/https を指定した場合、以下のフォーマットでURLにPOSTします。<br>
	 * {<br>
	 *   "_gs2_service": "gs2-in-game-push-notification",<br>
	 *   "userId": ユーザID<br>
	 *   "subject": サブジェクト,<br>
	 *   "body": ボディ,<br>
	 * }<br>
	 * <br>
	 * APIリクエスト以外に各デバイスがMQTTサーバに新しく接続する際に クオータを10消費する点にご注意ください。<br>
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
        $body['offlineTransfer'] = $request->getOfflineTransfer();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getNotificationUrl() !== null) $body['notificationUrl'] = $request->getNotificationUrl();
        if($request->getNotificationFirebaseServerKey() !== null) $body['notificationFirebaseServerKey'] = $request->getNotificationFirebaseServerKey();
        if($request->getCreateCertificateTriggerScript() !== null) $body['createCertificateTriggerScript'] = $request->getCreateCertificateTriggerScript();
        if($request->getCreateCertificateDoneTriggerScript() !== null) $body['createCertificateDoneTriggerScript'] = $request->getCreateCertificateDoneTriggerScript();
        if($request->getDeleteCertificateTriggerScript() !== null) $body['deleteCertificateTriggerScript'] = $request->getDeleteCertificateTriggerScript();
        if($request->getDeleteCertificateDoneTriggerScript() !== null) $body['deleteCertificateDoneTriggerScript'] = $request->getDeleteCertificateDoneTriggerScript();
        if($request->getPublishTriggerScript() !== null) $body['publishTriggerScript'] = $request->getPublishTriggerScript();
        if($request->getPublishDoneTriggerScript() !== null) $body['publishDoneTriggerScript'] = $request->getPublishDoneTriggerScript();
        if($request->getSetFirebaseTokenTriggerScript() !== null) $body['setFirebaseTokenTriggerScript'] = $request->getSetFirebaseTokenTriggerScript();
        if($request->getSetFirebaseTokenDoneTriggerScript() !== null) $body['setFirebaseTokenDoneTriggerScript'] = $request->getSetFirebaseTokenDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2InGamePushNotification::MODULE,
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
            Gs2InGamePushNotification::MODULE,
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
            Gs2InGamePushNotification::MODULE,
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
            Gs2InGamePushNotification::MODULE,
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
            Gs2InGamePushNotification::MODULE,
            GetGameRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGameResult($result);
    }

	/**
	 * ゲームの状態を取得します<br>
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
            Gs2InGamePushNotification::MODULE,
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
        $body['offlineTransfer'] = $request->getOfflineTransfer();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getNotificationUrl() !== null) $body['notificationUrl'] = $request->getNotificationUrl();
        if($request->getNotificationFirebaseServerKey() !== null) $body['notificationFirebaseServerKey'] = $request->getNotificationFirebaseServerKey();
        if($request->getCreateCertificateTriggerScript() !== null) $body['createCertificateTriggerScript'] = $request->getCreateCertificateTriggerScript();
        if($request->getCreateCertificateDoneTriggerScript() !== null) $body['createCertificateDoneTriggerScript'] = $request->getCreateCertificateDoneTriggerScript();
        if($request->getDeleteCertificateTriggerScript() !== null) $body['deleteCertificateTriggerScript'] = $request->getDeleteCertificateTriggerScript();
        if($request->getDeleteCertificateDoneTriggerScript() !== null) $body['deleteCertificateDoneTriggerScript'] = $request->getDeleteCertificateDoneTriggerScript();
        if($request->getPublishTriggerScript() !== null) $body['publishTriggerScript'] = $request->getPublishTriggerScript();
        if($request->getPublishDoneTriggerScript() !== null) $body['publishDoneTriggerScript'] = $request->getPublishDoneTriggerScript();
        if($request->getSetFirebaseTokenTriggerScript() !== null) $body['setFirebaseTokenTriggerScript'] = $request->getSetFirebaseTokenTriggerScript();
        if($request->getSetFirebaseTokenDoneTriggerScript() !== null) $body['setFirebaseTokenDoneTriggerScript'] = $request->getSetFirebaseTokenDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2InGamePushNotification::MODULE,
            UpdateGameRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateGameResult($result);
    }

	/**
	 * MQTTサーバ情報を取得します<br>
	 * <br>
	 *
	 * @param GetMqttHostRequest $request リクエストパラメータ
	 * @return GetMqttHostResult 結果
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
	public function getMqttHost(GetMqttHostRequest $request): GetMqttHostResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/server/mqtt";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2InGamePushNotification::MODULE,
            GetMqttHostRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMqttHostResult($result);
    }

	/**
	 * MQTT over Websocketサーバ情報を取得します<br>
	 * <br>
	 *
	 * @param GetWebSocketHostRequest $request リクエストパラメータ
	 * @return GetWebSocketHostResult 結果
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
	public function getWebSocketHost(GetWebSocketHostRequest $request): GetWebSocketHostResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/server/webSocket";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2InGamePushNotification::MODULE,
            GetWebSocketHostRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetWebSocketHostResult($result);
    }

	/**
	 * 通知を送信します。<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param PublishRequest $request リクエストパラメータ
	 * @return PublishResult 結果
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
	public function publish(PublishRequest $request): PublishResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['subject'] = $request->getSubject();
        $body['body'] = $request->getBody();
        $body['enableOfflineTransfer'] = $request->getEnableOfflineTransfer();
        if($request->getOfflineTransferSound() !== null) $body['offlineTransferSound'] = $request->getOfflineTransferSound();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2InGamePushNotification::MODULE,
            PublishRequest::FUNCTION,
            $body,
            $headers
        );
        return new PublishResult($result);
    }

	/**
	 * クライアント証明書を新規作成します<br>
	 * <br>
	 * MQTTサーバに接続するためのクライアント証明書の発行を行います。<br>
	 * 1ユーザに対して発行できるクライアント証明書は同時に1つのみです。<br>
	 * 異なるデバイスでMQTTサーバにアクセスする場合、クライアント証明書を削除して取り直すようにしてください。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param CreateCertificateRequest $request リクエストパラメータ
	 * @return CreateCertificateResult 結果
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
	public function createCertificate(CreateCertificateRequest $request): CreateCertificateResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/certificate";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2InGamePushNotification::MODULE,
            CreateCertificateRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateCertificateResult($result);
    }

	/**
	 * クライアント証明書を削除します。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param DeleteCertificateRequest $request リクエストパラメータ
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
	public function deleteCertificate(DeleteCertificateRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/certificate";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2InGamePushNotification::MODULE,
            DeleteCertificateRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ユーザステータスの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeStatusRequest $request リクエストパラメータ
	 * @return DescribeStatusResult 結果
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
	public function describeStatus(DescribeStatusRequest $request): DescribeStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/user";

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
            Gs2InGamePushNotification::MODULE,
            DescribeStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeStatusResult($result);
    }

	/**
	 * Firebase のデバイストークンを設定します。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param SetFirebaseTokenRequest $request リクエストパラメータ
	 * @return SetFirebaseTokenResult 結果
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
	public function setFirebaseToken(SetFirebaseTokenRequest $request): SetFirebaseTokenResult
	{
	    $url = self::ENDPOINT_HOST. "/game/". ($request->getGameName() === null || $request->getGameName() === "" ? "null" : $request->getGameName()). "/user";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['token'] = $request->getToken();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2InGamePushNotification::MODULE,
            SetFirebaseTokenRequest::FUNCTION,
            $body,
            $headers
        );
        return new SetFirebaseTokenResult($result);
    }
}