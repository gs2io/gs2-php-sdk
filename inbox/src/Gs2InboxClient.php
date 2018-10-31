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

namespace Gs2\Inbox;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Inbox\Control\CreateInboxRequest;
use Gs2\Inbox\Control\CreateInboxResult;
use Gs2\Inbox\Control\DeleteInboxRequest;
use Gs2\Inbox\Control\DescribeInboxRequest;
use Gs2\Inbox\Control\DescribeInboxResult;
use Gs2\Inbox\Control\DescribeServiceClassRequest;
use Gs2\Inbox\Control\DescribeServiceClassResult;
use Gs2\Inbox\Control\GetInboxRequest;
use Gs2\Inbox\Control\GetInboxResult;
use Gs2\Inbox\Control\GetInboxStatusRequest;
use Gs2\Inbox\Control\GetInboxStatusResult;
use Gs2\Inbox\Control\UpdateInboxRequest;
use Gs2\Inbox\Control\UpdateInboxResult;
use Gs2\Inbox\Control\DeleteMessageRequest;
use Gs2\Inbox\Control\DeleteMessagesRequest;
use Gs2\Inbox\Control\DescribeMessageRequest;
use Gs2\Inbox\Control\DescribeMessageResult;
use Gs2\Inbox\Control\GetMessageRequest;
use Gs2\Inbox\Control\GetMessageResult;
use Gs2\Inbox\Control\ReadMessageRequest;
use Gs2\Inbox\Control\ReadMessageResult;
use Gs2\Inbox\Control\ReadMessagesRequest;
use Gs2\Inbox\Control\ReadMessagesResult;
use Gs2\Inbox\Control\SendMessageRequest;
use Gs2\Inbox\Control\SendMessageResult;

/**
 * GS2 Inbox API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2InboxClient extends AbstractGs2Client {

	public static $ENDPOINT = "inbox";

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
	 * 受信ボックスを新規作成します<br>
	 * <br>
	 *
	 * @param CreateInboxRequest $request リクエストパラメータ
	 * @return CreateInboxResult 結果
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
	public function createInbox(CreateInboxRequest $request): CreateInboxResult
	{
	    $url = self::ENDPOINT_HOST. "/inbox";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getAutoDelete() !== null) $body['autoDelete'] = $request->getAutoDelete();
        if($request->getCooperationUrl() !== null) $body['cooperationUrl'] = $request->getCooperationUrl();
        if($request->getReceiveMessageTriggerScript() !== null) $body['receiveMessageTriggerScript'] = $request->getReceiveMessageTriggerScript();
        if($request->getReceiveMessageDoneTriggerScript() !== null) $body['receiveMessageDoneTriggerScript'] = $request->getReceiveMessageDoneTriggerScript();
        if($request->getReadMessageTriggerScript() !== null) $body['readMessageTriggerScript'] = $request->getReadMessageTriggerScript();
        if($request->getReadMessageDoneTriggerScript() !== null) $body['readMessageDoneTriggerScript'] = $request->getReadMessageDoneTriggerScript();
        if($request->getDeleteMessageTriggerScript() !== null) $body['deleteMessageTriggerScript'] = $request->getDeleteMessageTriggerScript();
        if($request->getDeleteMessageDoneTriggerScript() !== null) $body['deleteMessageDoneTriggerScript'] = $request->getDeleteMessageDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            CreateInboxRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateInboxResult($result);
    }

	/**
	 * 受信ボックスを削除します<br>
	 * <br>
	 *
	 * @param DeleteInboxRequest $request リクエストパラメータ
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
	public function deleteInbox(DeleteInboxRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            DeleteInboxRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 受信ボックスの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeInboxRequest $request リクエストパラメータ
	 * @return DescribeInboxResult 結果
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
	public function describeInbox(DescribeInboxRequest $request): DescribeInboxResult
	{
	    $url = self::ENDPOINT_HOST. "/inbox";

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
            Gs2Inbox::MODULE,
            DescribeInboxRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeInboxResult($result);
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
	    $url = self::ENDPOINT_HOST. "/inbox/serviceClass";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            DescribeServiceClassRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeServiceClassResult($result);
    }

	/**
	 * 受信ボックスを取得します<br>
	 * <br>
	 *
	 * @param GetInboxRequest $request リクエストパラメータ
	 * @return GetInboxResult 結果
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
	public function getInbox(GetInboxRequest $request): GetInboxResult
	{
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            GetInboxRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetInboxResult($result);
    }

	/**
	 * 受信ボックスの状態を取得します<br>
	 * <br>
	 *
	 * @param GetInboxStatusRequest $request リクエストパラメータ
	 * @return GetInboxStatusResult 結果
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
	public function getInboxStatus(GetInboxStatusRequest $request): GetInboxStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            GetInboxStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetInboxStatusResult($result);
    }

	/**
	 * 受信ボックスを更新します<br>
	 * <br>
	 *
	 * @param UpdateInboxRequest $request リクエストパラメータ
	 * @return UpdateInboxResult 結果
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
	public function updateInbox(UpdateInboxRequest $request): UpdateInboxResult
	{
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getServiceClass() !== null) $body['serviceClass'] = $request->getServiceClass();
        if($request->getCooperationUrl() !== null) $body['cooperationUrl'] = $request->getCooperationUrl();
        if($request->getReceiveMessageTriggerScript() !== null) $body['receiveMessageTriggerScript'] = $request->getReceiveMessageTriggerScript();
        if($request->getReceiveMessageDoneTriggerScript() !== null) $body['receiveMessageDoneTriggerScript'] = $request->getReceiveMessageDoneTriggerScript();
        if($request->getReadMessageTriggerScript() !== null) $body['readMessageTriggerScript'] = $request->getReadMessageTriggerScript();
        if($request->getReadMessageDoneTriggerScript() !== null) $body['readMessageDoneTriggerScript'] = $request->getReadMessageDoneTriggerScript();
        if($request->getDeleteMessageTriggerScript() !== null) $body['deleteMessageTriggerScript'] = $request->getDeleteMessageTriggerScript();
        if($request->getDeleteMessageDoneTriggerScript() !== null) $body['deleteMessageDoneTriggerScript'] = $request->getDeleteMessageDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            UpdateInboxRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateInboxResult($result);
    }

	/**
	 * メッセージを削除します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param DeleteMessageRequest $request リクエストパラメータ
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
	public function deleteMessage(DeleteMessageRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "/message/". ($request->getMessageId() === null || $request->getMessageId() === "" ? "null" : $request->getMessageId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            DeleteMessageRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 複数のメッセージをまとめて削除します<br>
	 * <br>
	 * - 消費クオータ: 削除するメッセージの数 * 10<br>
	 * <br>
	 *
	 * @param DeleteMessagesRequest $request リクエストパラメータ
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
	public function deleteMessages(DeleteMessagesRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "/message/multiple";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        if($request->getMessageIds() !== null) $queryString['messageIds'] = $request->getMessageIds();
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            DeleteMessagesRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 受信メッセージの一覧を取得します<br>
	 * <br>
	 * - 消費クオータ: 50件あたり5<br>
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
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "/message";

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
            Gs2Inbox::MODULE,
            DescribeMessageRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeMessageResult($result);
    }

	/**
	 * メッセージを取得します<br>
	 * <br>
	 * - 消費クオータ: 5<br>
	 * <br>
	 *
	 * @param GetMessageRequest $request リクエストパラメータ
	 * @return GetMessageResult 結果
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
	public function getMessage(GetMessageRequest $request): GetMessageResult
	{
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "/message/". ($request->getMessageId() === null || $request->getMessageId() === "" ? "null" : $request->getMessageId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            GetMessageRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMessageResult($result);
    }

	/**
	 * メッセージを開封します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param ReadMessageRequest $request リクエストパラメータ
	 * @return ReadMessageResult 結果
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
	public function readMessage(ReadMessageRequest $request): ReadMessageResult
	{
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "/message/". ($request->getMessageId() === null || $request->getMessageId() === "" ? "null" : $request->getMessageId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            ReadMessageRequest::FUNCTION,
            $body,
            $headers
        );
        return new ReadMessageResult($result);
    }

	/**
	 * 複数のメッセージをまとめて開封します<br>
	 * <br>
	 * 連携用URLと複数メッセージの開封処理を同時に利用する場合は、200レスポンスを応答すると、GS2側では指定されたすべてのメッセージを開封したことにします。<br>
	 * <br>
	 * 200 以外のステータスコードを応答する場合はレスポンスボディにJSON形式で、<br>
	 * "success" というパラメータに開封に成功したメッセージIDのリストを返す必要があります。<br>
	 * success に指定されたメッセージIDのみ開封成功処理を行い、BadGateway(502)応答を返します。<br>
	 * <br>
	 * BadGateway(502) のレスポンスボディには、コールバックで返された値がそのまま含まれます。<br>
	 * 例えば、メッセージにアイテムを添付されていたが、一部アイテムが所有できる上限を超えていたため開封できなかった。という場合<br>
	 * success にはアイテムを付与できたメッセージIDのみを応答し、reason など任意のパラメータでアイテムの所持上限を迎えたため<br>
	 * メッセージID hoge のメッセージは開封に失敗した。というようなレスポンスを返すことでクライアントにも開封に失敗した理由を伝えることができます。<br>
	 * <br>
	 * - 消費クオータ: 開封するメッセージの数 * 10<br>
	 * <br>
	 *
	 * @param ReadMessagesRequest $request リクエストパラメータ
	 * @return ReadMessagesResult 結果
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
	public function readMessages(ReadMessagesRequest $request): ReadMessagesResult
	{
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "/message/multiple";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['messageIds'] = $request->getMessageIds();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            ReadMessagesRequest::FUNCTION,
            $body,
            $headers
        );
        return new ReadMessagesResult($result);
    }

	/**
	 * メッセージを送信します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
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
	    $url = self::ENDPOINT_HOST. "/inbox/". ($request->getInboxName() === null || $request->getInboxName() === "" ? "null" : $request->getInboxName()). "/message";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['userId'] = $request->getUserId();
        $body['message'] = $request->getMessage();
        if($request->getCooperation() !== null) $body['cooperation'] = $request->getCooperation();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Inbox::MODULE,
            SendMessageRequest::FUNCTION,
            $body,
            $headers
        );
        return new SendMessageResult($result);
    }
}