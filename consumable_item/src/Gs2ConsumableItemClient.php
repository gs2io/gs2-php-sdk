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

namespace Gs2\ConsumableItem;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\ConsumableItem\Control\GetCurrentItemMasterRequest;
use Gs2\ConsumableItem\Control\GetCurrentItemMasterResult;
use Gs2\ConsumableItem\Control\UpdateCurrentItemMasterRequest;
use Gs2\ConsumableItem\Control\UpdateCurrentItemMasterResult;
use Gs2\ConsumableItem\Control\AcquisitionItemRequest;
use Gs2\ConsumableItem\Control\AcquisitionItemResult;
use Gs2\ConsumableItem\Control\AcquisitionItemByStampSheetRequest;
use Gs2\ConsumableItem\Control\AcquisitionItemByStampSheetResult;
use Gs2\ConsumableItem\Control\AcquisitionItemByUserIdRequest;
use Gs2\ConsumableItem\Control\AcquisitionItemByUserIdResult;
use Gs2\ConsumableItem\Control\ConsumeItemRequest;
use Gs2\ConsumableItem\Control\ConsumeItemResult;
use Gs2\ConsumableItem\Control\ConsumeItemByStampTaskRequest;
use Gs2\ConsumableItem\Control\ConsumeItemByStampTaskResult;
use Gs2\ConsumableItem\Control\ConsumeItemByUserIdRequest;
use Gs2\ConsumableItem\Control\ConsumeItemByUserIdResult;
use Gs2\ConsumableItem\Control\DeleteInventoryByUserIdRequest;
use Gs2\ConsumableItem\Control\DescribeInventoryRequest;
use Gs2\ConsumableItem\Control\DescribeInventoryResult;
use Gs2\ConsumableItem\Control\DescribeInventoryByUserIdRequest;
use Gs2\ConsumableItem\Control\DescribeInventoryByUserIdResult;
use Gs2\ConsumableItem\Control\GetInventoryRequest;
use Gs2\ConsumableItem\Control\GetInventoryResult;
use Gs2\ConsumableItem\Control\GetInventoryByUserIdRequest;
use Gs2\ConsumableItem\Control\GetInventoryByUserIdResult;
use Gs2\ConsumableItem\Control\CreateItemMasterRequest;
use Gs2\ConsumableItem\Control\CreateItemMasterResult;
use Gs2\ConsumableItem\Control\DeleteItemMasterRequest;
use Gs2\ConsumableItem\Control\DescribeItemMasterRequest;
use Gs2\ConsumableItem\Control\DescribeItemMasterResult;
use Gs2\ConsumableItem\Control\GetItemMasterRequest;
use Gs2\ConsumableItem\Control\GetItemMasterResult;
use Gs2\ConsumableItem\Control\UpdateItemMasterRequest;
use Gs2\ConsumableItem\Control\UpdateItemMasterResult;
use Gs2\ConsumableItem\Control\CreateItemPoolRequest;
use Gs2\ConsumableItem\Control\CreateItemPoolResult;
use Gs2\ConsumableItem\Control\DeleteItemPoolRequest;
use Gs2\ConsumableItem\Control\DescribeItemPoolRequest;
use Gs2\ConsumableItem\Control\DescribeItemPoolResult;
use Gs2\ConsumableItem\Control\DescribeServiceClassRequest;
use Gs2\ConsumableItem\Control\DescribeServiceClassResult;
use Gs2\ConsumableItem\Control\GetItemPoolRequest;
use Gs2\ConsumableItem\Control\GetItemPoolResult;
use Gs2\ConsumableItem\Control\GetItemPoolStatusRequest;
use Gs2\ConsumableItem\Control\GetItemPoolStatusResult;
use Gs2\ConsumableItem\Control\UpdateItemPoolRequest;
use Gs2\ConsumableItem\Control\UpdateItemPoolResult;
use Gs2\ConsumableItem\Control\ExportMasterRequest;
use Gs2\ConsumableItem\Control\ExportMasterResult;

/**
 * GS2 ConsumableItem API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ConsumableItemClient extends AbstractGs2Client {

	public static $ENDPOINT = "consumable-item";

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
	 * 公開されているアイテムマスタを取得します<br>
	 * <br>
	 *
	 * @param GetCurrentItemMasterRequest $request リクエストパラメータ
	 * @return GetCurrentItemMasterResult 結果
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
	public function getCurrentItemMaster(GetCurrentItemMasterRequest $request): GetCurrentItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/item/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            GetCurrentItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetCurrentItemMasterResult($result);
    }

	/**
	 * 公開するアイテムマスタを更新します<br>
	 * <br>
	 *
	 * @param UpdateCurrentItemMasterRequest $request リクエストパラメータ
	 * @return UpdateCurrentItemMasterResult 結果
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
	public function updateCurrentItemMaster(UpdateCurrentItemMasterRequest $request): UpdateCurrentItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/item/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['settings'] = $request->getSettings();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            UpdateCurrentItemMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateCurrentItemMasterResult($result);
    }

	/**
	 * インベントリにアイテムを加えます<br>
	 * <br>
	 * 有効期限に 0 を設定すると有効期限無しになります。<br>
	 * <br>
	 * アイテムに所持数の上限が設定されている状態で、複数個付与することによって<br>
	 * 所持数の上限を超えてしまうケースでは一切付与せずエラー応答を返します。<br>
	 * <br>
	 * 例えば、所持数上限 10 のアイテムで、8個所持しているユーザに 3個 付与しようとすると1個も付与せずにエラーを返します。<br>
	 * <br>
	 *
	 * @param AcquisitionItemRequest $request リクエストパラメータ
	 * @return AcquisitionItemResult 結果
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
	public function acquisitionItem(AcquisitionItemRequest $request): AcquisitionItemResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/inventory/user/my/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['count'] = $request->getCount();
        if($request->getExpireAt() !== null) $body['expireAt'] = $request->getExpireAt();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            AcquisitionItemRequest::FUNCTION,
            $body,
            $headers
        );
        return new AcquisitionItemResult($result);
    }

	/**
	 * スタンプシートを使用してインベントリにアイテムを加えます<br>
	 * <br>
	 *
	 * @param AcquisitionItemByStampSheetRequest $request リクエストパラメータ
	 * @return AcquisitionItemByStampSheetResult 結果
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
	public function acquisitionItemByStampSheet(AcquisitionItemByStampSheetRequest $request): AcquisitionItemByStampSheetResult
	{
	    $url = self::ENDPOINT_HOST. "/inventory";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['sheet'] = $request->getSheet();
        $body['keyName'] = $request->getKeyName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            AcquisitionItemByStampSheetRequest::FUNCTION,
            $body,
            $headers
        );
        return new AcquisitionItemByStampSheetResult($result);
    }

	/**
	 * インベントリにアイテムを加えます<br>
	 * <br>
	 * 有効期限に 0 を設定すると有効期限無しになります。<br>
	 * <br>
	 * アイテムに所持数の上限が設定されている状態で、複数個付与することによって<br>
	 * 所持数の上限を超えてしまうケースでは一切付与せずエラー応答を返します。<br>
	 * <br>
	 * 例えば、所持数上限 10 のアイテムで、8個所持しているユーザに 3個 付与しようとすると<br>
	 * 1個も付与せずにエラーを返します。<br>
	 * <br>
	 *
	 * @param AcquisitionItemByUserIdRequest $request リクエストパラメータ
	 * @return AcquisitionItemByUserIdResult 結果
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
	public function acquisitionItemByUserId(AcquisitionItemByUserIdRequest $request): AcquisitionItemByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/inventory/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['count'] = $request->getCount();
        if($request->getExpireAt() !== null) $body['expireAt'] = $request->getExpireAt();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            AcquisitionItemByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new AcquisitionItemByUserIdResult($result);
    }

	/**
	 * インベントリのアイテムを消費します<br>
	 * <br>
	 * expireAt を指定しない場合は有効期限内の所有するアイテムの中から有効期限の近いアイテムから消費します。<br>
	 * ただし、この場合有効期限内の所有するアイテムの数量倍クォーターを消費します。<br>
	 * <br>
	 *
	 * @param ConsumeItemRequest $request リクエストパラメータ
	 * @return ConsumeItemResult 結果
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
	public function consumeItem(ConsumeItemRequest $request): ConsumeItemResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/inventory/user/my/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['count'] = $request->getCount();
        if($request->getExpireAt() !== null) $body['expireAt'] = $request->getExpireAt();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            ConsumeItemRequest::FUNCTION,
            $body,
            $headers
        );
        return new ConsumeItemResult($result);
    }

	/**
	 * スタンプタスクを使用してインベントリのアイテムを消費します<br>
	 * <br>
	 *
	 * @param ConsumeItemByStampTaskRequest $request リクエストパラメータ
	 * @return ConsumeItemByStampTaskResult 結果
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
	public function consumeItemByStampTask(ConsumeItemByStampTaskRequest $request): ConsumeItemByStampTaskResult
	{
	    $url = self::ENDPOINT_HOST. "/inventory";

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
            Gs2ConsumableItem::MODULE,
            ConsumeItemByStampTaskRequest::FUNCTION,
            $body,
            $headers
        );
        return new ConsumeItemByStampTaskResult($result);
    }

	/**
	 * インベントリのアイテムを消費します<br>
	 * <br>
	 * expireAt を指定しない場合は有効期限内の所有するアイテムの中から有効期限の近いアイテムから消費します。<br>
	 * ただし、この場合クォーターを有効期限内の所有するアイテムの数量倍消費します。<br>
	 * <br>
	 *
	 * @param ConsumeItemByUserIdRequest $request リクエストパラメータ
	 * @return ConsumeItemByUserIdResult 結果
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
	public function consumeItemByUserId(ConsumeItemByUserIdRequest $request): ConsumeItemByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/inventory/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['count'] = $request->getCount();
        if($request->getExpireAt() !== null) $body['expireAt'] = $request->getExpireAt();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            ConsumeItemByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new ConsumeItemByUserIdResult($result);
    }

	/**
	 * インベントリからアイテムを削除します<br>
	 * <br>
	 *
	 * @param DeleteInventoryByUserIdRequest $request リクエストパラメータ
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
	public function deleteInventoryByUserId(DeleteInventoryByUserIdRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/inventory/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "/". ($request->getExpireAt() === null || $request->getExpireAt() === "" ? "null" : $request->getExpireAt()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            DeleteInventoryByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ユーザが所持しているインベントリの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeInventoryRequest $request リクエストパラメータ
	 * @return DescribeInventoryResult 結果
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
	public function describeInventory(DescribeInventoryRequest $request): DescribeInventoryResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/inventory/user/my";

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
            Gs2ConsumableItem::MODULE,
            DescribeInventoryRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeInventoryResult($result);
    }

	/**
	 * ユーザが所持しているインベントリの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeInventoryByUserIdRequest $request リクエストパラメータ
	 * @return DescribeInventoryByUserIdResult 結果
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
	public function describeInventoryByUserId(DescribeInventoryByUserIdRequest $request): DescribeInventoryByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/inventory/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

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
            Gs2ConsumableItem::MODULE,
            DescribeInventoryByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeInventoryByUserIdResult($result);
    }

	/**
	 * インベントリの内容を取得します<br>
	 * <br>
	 * expireAt を指定しない場合は有効期限内の所有するアイテムの数量を丸めて応答します。<br>
	 * 有効期限には0が設定されて応答されますので、有効期限が存在するかどうかを判別することもできなくなります。<br>
	 * <br>
	 * また、expireAt を指定しない場合は処理時間が expireAt を指定しない場合を指定する場合と比較して長くなります。<br>
	 * 全ての消費型アイテムが有効期限を持たないアイテムで構成される場合は、有効期限に0を設定すると有効期限の無いアイテムとして管理されますので、そちらを利用してください。<br>
	 * <br>
	 * expireAt を指定しない場合は有効期限内の所有するアイテムの数量倍クォーターを消費します。<br>
	 * <br>
	 *
	 * @param GetInventoryRequest $request リクエストパラメータ
	 * @return GetInventoryResult 結果
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
	public function getInventory(GetInventoryRequest $request): GetInventoryResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/inventory/user/my/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        if($request->getExpireAt() !== null) $queryString['expireAt'] = $request->getExpireAt();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            GetInventoryRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetInventoryResult($result);
    }

	/**
	 * インベントリの内容を取得します<br>
	 * <br>
	 * expireAt を指定しない場合は有効期限内の所有するアイテムの数量を丸めて応答します。<br>
	 * 有効期限には0が設定されて応答されますので、有効期限が存在するかどうかを判別することもできなくなります。<br>
	 * <br>
	 * また、expireAt を指定しない場合は処理時間が expireAt を指定しない場合を指定する場合と比較して長くなります。<br>
	 * 全ての消費型アイテムが有効期限を持たないアイテムで構成される場合は、有効期限に0を設定すると有効期限の無いアイテムとして管理されますので、そちらを利用してください。<br>
	 * <br>
	 * expireAt を指定しない場合は有効期限内の所有するアイテムの数量倍クォーターを消費します。<br>
	 * <br>
	 *
	 * @param GetInventoryByUserIdRequest $request リクエストパラメータ
	 * @return GetInventoryByUserIdResult 結果
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
	public function getInventoryByUserId(GetInventoryByUserIdRequest $request): GetInventoryByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/inventory/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getExpireAt() !== null) $queryString['expireAt'] = $request->getExpireAt();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            GetInventoryByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetInventoryByUserIdResult($result);
    }

	/**
	 * 消費型アイテムを新規作成します<br>
	 * <br>
	 *
	 * @param CreateItemMasterRequest $request リクエストパラメータ
	 * @return CreateItemMasterResult 結果
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
	public function createItemMaster(CreateItemMasterRequest $request): CreateItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/master/item";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        if($request->getMax() !== null) $body['max'] = $request->getMax();
        if($request->getAcquisitionItemTriggerScript() !== null) $body['acquisitionItemTriggerScript'] = $request->getAcquisitionItemTriggerScript();
        if($request->getAcquisitionItemDoneTriggerScript() !== null) $body['acquisitionItemDoneTriggerScript'] = $request->getAcquisitionItemDoneTriggerScript();
        if($request->getConsumeItemTriggerScript() !== null) $body['consumeItemTriggerScript'] = $request->getConsumeItemTriggerScript();
        if($request->getConsumeItemDoneTriggerScript() !== null) $body['consumeItemDoneTriggerScript'] = $request->getConsumeItemDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            CreateItemMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateItemMasterResult($result);
    }

	/**
	 * 消費型アイテムを削除します<br>
	 * <br>
	 * 既にアイテムを所持しているユーザがいる場合、そのアイテムはインベントリから削除されることはありません。<br>
	 * 消費型アイテムを削除することで新しくアイテムを付与することはできなくなりますが、消費することは出来ます。<br>
	 * <br>
	 * これを防ぎたい場合はすべてのユーザのインベントリを走査して該当アイテムを削除する必要があります。<br>
	 * <br>
	 *
	 * @param DeleteItemMasterRequest $request リクエストパラメータ
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
	public function deleteItemMaster(DeleteItemMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/master/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            DeleteItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 消費型アイテムの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeItemMasterRequest $request リクエストパラメータ
	 * @return DescribeItemMasterResult 結果
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
	public function describeItemMaster(DescribeItemMasterRequest $request): DescribeItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/master/item";

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
            Gs2ConsumableItem::MODULE,
            DescribeItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeItemMasterResult($result);
    }

	/**
	 * 消費型アイテムを取得します<br>
	 * <br>
	 *
	 * @param GetItemMasterRequest $request リクエストパラメータ
	 * @return GetItemMasterResult 結果
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
	public function getItemMaster(GetItemMasterRequest $request): GetItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/master/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            GetItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetItemMasterResult($result);
    }

	/**
	 * 消費型アイテムを更新します<br>
	 * <br>
	 *
	 * @param UpdateItemMasterRequest $request リクエストパラメータ
	 * @return UpdateItemMasterResult 結果
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
	public function updateItemMaster(UpdateItemMasterRequest $request): UpdateItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/master/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['max'] = $request->getMax();
        if($request->getAcquisitionItemTriggerScript() !== null) $body['acquisitionItemTriggerScript'] = $request->getAcquisitionItemTriggerScript();
        if($request->getAcquisitionItemDoneTriggerScript() !== null) $body['acquisitionItemDoneTriggerScript'] = $request->getAcquisitionItemDoneTriggerScript();
        if($request->getConsumeItemTriggerScript() !== null) $body['consumeItemTriggerScript'] = $request->getConsumeItemTriggerScript();
        if($request->getConsumeItemDoneTriggerScript() !== null) $body['consumeItemDoneTriggerScript'] = $request->getConsumeItemDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            UpdateItemMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateItemMasterResult($result);
    }

	/**
	 * 消費型アイテムプールを新規作成します<br>
	 * <br>
	 *
	 * @param CreateItemPoolRequest $request リクエストパラメータ
	 * @return CreateItemPoolResult 結果
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
	public function createItemPool(CreateItemPoolRequest $request): CreateItemPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getAcquisitionItemTriggerScript() !== null) $body['acquisitionItemTriggerScript'] = $request->getAcquisitionItemTriggerScript();
        if($request->getAcquisitionItemDoneTriggerScript() !== null) $body['acquisitionItemDoneTriggerScript'] = $request->getAcquisitionItemDoneTriggerScript();
        if($request->getConsumeItemTriggerScript() !== null) $body['consumeItemTriggerScript'] = $request->getConsumeItemTriggerScript();
        if($request->getConsumeItemDoneTriggerScript() !== null) $body['consumeItemDoneTriggerScript'] = $request->getConsumeItemDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            CreateItemPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateItemPoolResult($result);
    }

	/**
	 * 消費型アイテムプールを削除します<br>
	 * <br>
	 *
	 * @param DeleteItemPoolRequest $request リクエストパラメータ
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
	public function deleteItemPool(DeleteItemPoolRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            DeleteItemPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 消費型アイテムプールの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeItemPoolRequest $request リクエストパラメータ
	 * @return DescribeItemPoolResult 結果
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
	public function describeItemPool(DescribeItemPoolRequest $request): DescribeItemPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool";

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
            Gs2ConsumableItem::MODULE,
            DescribeItemPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeItemPoolResult($result);
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
	    $url = self::ENDPOINT_HOST. "/itemPool/serviceClass";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            DescribeServiceClassRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeServiceClassResult($result);
    }

	/**
	 * 消費型アイテムプールを取得します<br>
	 * <br>
	 *
	 * @param GetItemPoolRequest $request リクエストパラメータ
	 * @return GetItemPoolResult 結果
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
	public function getItemPool(GetItemPoolRequest $request): GetItemPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            GetItemPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetItemPoolResult($result);
    }

	/**
	 * 消費型アイテムプールの状態を取得します<br>
	 * <br>
	 *
	 * @param GetItemPoolStatusRequest $request リクエストパラメータ
	 * @return GetItemPoolStatusResult 結果
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
	public function getItemPoolStatus(GetItemPoolStatusRequest $request): GetItemPoolStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            GetItemPoolStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetItemPoolStatusResult($result);
    }

	/**
	 * 消費型アイテムプールを更新します<br>
	 * <br>
	 *
	 * @param UpdateItemPoolRequest $request リクエストパラメータ
	 * @return UpdateItemPoolResult 結果
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
	public function updateItemPool(UpdateItemPoolRequest $request): UpdateItemPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getAcquisitionItemTriggerScript() !== null) $body['acquisitionItemTriggerScript'] = $request->getAcquisitionItemTriggerScript();
        if($request->getAcquisitionItemDoneTriggerScript() !== null) $body['acquisitionItemDoneTriggerScript'] = $request->getAcquisitionItemDoneTriggerScript();
        if($request->getConsumeItemTriggerScript() !== null) $body['consumeItemTriggerScript'] = $request->getConsumeItemTriggerScript();
        if($request->getConsumeItemDoneTriggerScript() !== null) $body['consumeItemDoneTriggerScript'] = $request->getConsumeItemDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            UpdateItemPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateItemPoolResult($result);
    }

	/**
	 * アイテムマスターデータをエクスポートする<br>
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
	    $url = self::ENDPOINT_HOST. "/itemPool/". ($request->getItemPoolName() === null || $request->getItemPoolName() === "" ? "null" : $request->getItemPoolName()). "/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2ConsumableItem::MODULE,
            ExportMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new ExportMasterResult($result);
    }
}