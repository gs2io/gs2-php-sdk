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

namespace Gs2\Showcase;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Showcase\Control\GetCurrentShowcaseMasterRequest;
use Gs2\Showcase\Control\GetCurrentShowcaseMasterResult;
use Gs2\Showcase\Control\UpdateCurrentShowcaseMasterRequest;
use Gs2\Showcase\Control\UpdateCurrentShowcaseMasterResult;
use Gs2\Showcase\Control\CreateItemGroupMasterRequest;
use Gs2\Showcase\Control\CreateItemGroupMasterResult;
use Gs2\Showcase\Control\DeleteItemGroupMasterRequest;
use Gs2\Showcase\Control\DescribeItemGroupMasterRequest;
use Gs2\Showcase\Control\DescribeItemGroupMasterResult;
use Gs2\Showcase\Control\GetItemGroupMasterRequest;
use Gs2\Showcase\Control\GetItemGroupMasterResult;
use Gs2\Showcase\Control\UpdateItemGroupMasterRequest;
use Gs2\Showcase\Control\UpdateItemGroupMasterResult;
use Gs2\Showcase\Control\CreateItemMasterRequest;
use Gs2\Showcase\Control\CreateItemMasterResult;
use Gs2\Showcase\Control\DeleteItemMasterRequest;
use Gs2\Showcase\Control\DescribeItemMasterRequest;
use Gs2\Showcase\Control\DescribeItemMasterResult;
use Gs2\Showcase\Control\GetItemMasterRequest;
use Gs2\Showcase\Control\GetItemMasterResult;
use Gs2\Showcase\Control\UpdateItemMasterRequest;
use Gs2\Showcase\Control\UpdateItemMasterResult;
use Gs2\Showcase\Control\BuyItemRequest;
use Gs2\Showcase\Control\BuyItemResult;
use Gs2\Showcase\Control\DescribeItemRequest;
use Gs2\Showcase\Control\DescribeItemResult;
use Gs2\Showcase\Control\GetItemRequest;
use Gs2\Showcase\Control\GetItemResult;
use Gs2\Showcase\Control\ExportMasterRequest;
use Gs2\Showcase\Control\ExportMasterResult;
use Gs2\Showcase\Control\CreateShowcaseItemMasterRequest;
use Gs2\Showcase\Control\CreateShowcaseItemMasterResult;
use Gs2\Showcase\Control\DeleteShowcaseItemMasterRequest;
use Gs2\Showcase\Control\DescribeShowcaseItemMasterRequest;
use Gs2\Showcase\Control\DescribeShowcaseItemMasterResult;
use Gs2\Showcase\Control\GetShowcaseItemMasterRequest;
use Gs2\Showcase\Control\GetShowcaseItemMasterResult;
use Gs2\Showcase\Control\UpdateShowcaseItemMasterRequest;
use Gs2\Showcase\Control\UpdateShowcaseItemMasterResult;
use Gs2\Showcase\Control\CreateShowcaseRequest;
use Gs2\Showcase\Control\CreateShowcaseResult;
use Gs2\Showcase\Control\DeleteShowcaseRequest;
use Gs2\Showcase\Control\DescribeShowcaseRequest;
use Gs2\Showcase\Control\DescribeShowcaseResult;
use Gs2\Showcase\Control\GetShowcaseRequest;
use Gs2\Showcase\Control\GetShowcaseResult;
use Gs2\Showcase\Control\GetShowcaseStatusRequest;
use Gs2\Showcase\Control\GetShowcaseStatusResult;
use Gs2\Showcase\Control\UpdateShowcaseRequest;
use Gs2\Showcase\Control\UpdateShowcaseResult;

/**
 * GS2 Showcase API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ShowcaseClient extends AbstractGs2Client {

	public static $ENDPOINT = "showcase";

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
	 * 公開されているショーケースマスタを取得します<br>
	 * <br>
	 *
	 * @param GetCurrentShowcaseMasterRequest $request リクエストパラメータ
	 * @return GetCurrentShowcaseMasterResult 結果
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
	public function getCurrentShowcaseMaster(GetCurrentShowcaseMasterRequest $request): GetCurrentShowcaseMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/item/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            GetCurrentShowcaseMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetCurrentShowcaseMasterResult($result);
    }

	/**
	 * 公開するショーケースマスタを更新します<br>
	 * <br>
	 *
	 * @param UpdateCurrentShowcaseMasterRequest $request リクエストパラメータ
	 * @return UpdateCurrentShowcaseMasterResult 結果
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
	public function updateCurrentShowcaseMaster(UpdateCurrentShowcaseMasterRequest $request): UpdateCurrentShowcaseMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/item/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['settings'] = $request->getSettings();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            UpdateCurrentShowcaseMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateCurrentShowcaseMasterResult($result);
    }

	/**
	 * 商品グループを新規作成します<br>
	 * <br>
	 *
	 * @param CreateItemGroupMasterRequest $request リクエストパラメータ
	 * @return CreateItemGroupMasterResult 結果
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
	public function createItemGroupMaster(CreateItemGroupMasterRequest $request): CreateItemGroupMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/itemGroup";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['itemNames'] = $request->getItemNames();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            CreateItemGroupMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateItemGroupMasterResult($result);
    }

	/**
	 * 商品グループを削除します<br>
	 * <br>
	 *
	 * @param DeleteItemGroupMasterRequest $request リクエストパラメータ
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
	public function deleteItemGroupMaster(DeleteItemGroupMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/itemGroup/". ($request->getItemGroupName() === null || $request->getItemGroupName() === "" ? "null" : $request->getItemGroupName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            DeleteItemGroupMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 商品グループの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeItemGroupMasterRequest $request リクエストパラメータ
	 * @return DescribeItemGroupMasterResult 結果
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
	public function describeItemGroupMaster(DescribeItemGroupMasterRequest $request): DescribeItemGroupMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/itemGroup";

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
            Gs2Showcase::MODULE,
            DescribeItemGroupMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeItemGroupMasterResult($result);
    }

	/**
	 * 商品グループを取得します<br>
	 * <br>
	 *
	 * @param GetItemGroupMasterRequest $request リクエストパラメータ
	 * @return GetItemGroupMasterResult 結果
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
	public function getItemGroupMaster(GetItemGroupMasterRequest $request): GetItemGroupMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/itemGroup/". ($request->getItemGroupName() === null || $request->getItemGroupName() === "" ? "null" : $request->getItemGroupName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            GetItemGroupMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetItemGroupMasterResult($result);
    }

	/**
	 * 商品グループを更新します<br>
	 * <br>
	 *
	 * @param UpdateItemGroupMasterRequest $request リクエストパラメータ
	 * @return UpdateItemGroupMasterResult 結果
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
	public function updateItemGroupMaster(UpdateItemGroupMasterRequest $request): UpdateItemGroupMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/itemGroup/". ($request->getItemGroupName() === null || $request->getItemGroupName() === "" ? "null" : $request->getItemGroupName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['itemNames'] = $request->getItemNames();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            UpdateItemGroupMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateItemGroupMasterResult($result);
    }

	/**
	 * 商品を新規作成します<br>
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
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/item";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['currencyType'] = $request->getCurrencyType();
        $body['price'] = $request->getPrice();
        $body['itemType'] = $request->getItemType();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getCurrencyMoneyName() !== null) $body['currencyMoneyName'] = $request->getCurrencyMoneyName();
        if($request->getCurrencyGoldName() !== null) $body['currencyGoldName'] = $request->getCurrencyGoldName();
        if($request->getCurrencyGoldPoolName() !== null) $body['currencyGoldPoolName'] = $request->getCurrencyGoldPoolName();
        if($request->getCurrencyConsumableItemItemPoolName() !== null) $body['currencyConsumableItemItemPoolName'] = $request->getCurrencyConsumableItemItemPoolName();
        if($request->getCurrencyConsumableItemItemName() !== null) $body['currencyConsumableItemItemName'] = $request->getCurrencyConsumableItemItemName();
        if($request->getCurrencyOption() !== null) $body['currencyOption'] = $request->getCurrencyOption();
        if($request->getItemMoneyName() !== null) $body['itemMoneyName'] = $request->getItemMoneyName();
        if($request->getItemGoldPoolName() !== null) $body['itemGoldPoolName'] = $request->getItemGoldPoolName();
        if($request->getItemGoldName() !== null) $body['itemGoldName'] = $request->getItemGoldName();
        if($request->getItemStaminaStaminaPoolName() !== null) $body['itemStaminaStaminaPoolName'] = $request->getItemStaminaStaminaPoolName();
        if($request->getItemConsumableItemItemPoolName() !== null) $body['itemConsumableItemItemPoolName'] = $request->getItemConsumableItemItemPoolName();
        if($request->getItemConsumableItemItemName() !== null) $body['itemConsumableItemItemName'] = $request->getItemConsumableItemItemName();
        if($request->getItemGachaGachaPoolName() !== null) $body['itemGachaGachaPoolName'] = $request->getItemGachaGachaPoolName();
        if($request->getItemGachaGachaName() !== null) $body['itemGachaGachaName'] = $request->getItemGachaGachaName();
        if($request->getItemAmount() !== null) $body['itemAmount'] = $request->getItemAmount();
        if($request->getItemOption() !== null) $body['itemOption'] = $request->getItemOption();
        if($request->getOpenConditionType() !== null) $body['openConditionType'] = $request->getOpenConditionType();
        if($request->getOpenConditionLimitName() !== null) $body['openConditionLimitName'] = $request->getOpenConditionLimitName();
        if($request->getOpenConditionLimitCounterName() !== null) $body['openConditionLimitCounterName'] = $request->getOpenConditionLimitCounterName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            CreateItemMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateItemMasterResult($result);
    }

	/**
	 * 商品を削除します<br>
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
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            DeleteItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 商品の一覧を取得します<br>
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
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/item";

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
            Gs2Showcase::MODULE,
            DescribeItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeItemMasterResult($result);
    }

	/**
	 * 商品を取得します<br>
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
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            GetItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetItemMasterResult($result);
    }

	/**
	 * 商品を更新します<br>
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
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['currencyType'] = $request->getCurrencyType();
        $body['price'] = $request->getPrice();
        $body['itemType'] = $request->getItemType();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getCurrencyMoneyName() !== null) $body['currencyMoneyName'] = $request->getCurrencyMoneyName();
        if($request->getCurrencyGoldName() !== null) $body['currencyGoldName'] = $request->getCurrencyGoldName();
        if($request->getCurrencyGoldPoolName() !== null) $body['currencyGoldPoolName'] = $request->getCurrencyGoldPoolName();
        if($request->getCurrencyConsumableItemItemPoolName() !== null) $body['currencyConsumableItemItemPoolName'] = $request->getCurrencyConsumableItemItemPoolName();
        if($request->getCurrencyConsumableItemItemName() !== null) $body['currencyConsumableItemItemName'] = $request->getCurrencyConsumableItemItemName();
        if($request->getCurrencyOption() !== null) $body['currencyOption'] = $request->getCurrencyOption();
        if($request->getItemMoneyName() !== null) $body['itemMoneyName'] = $request->getItemMoneyName();
        if($request->getItemGoldPoolName() !== null) $body['itemGoldPoolName'] = $request->getItemGoldPoolName();
        if($request->getItemGoldName() !== null) $body['itemGoldName'] = $request->getItemGoldName();
        if($request->getItemStaminaStaminaPoolName() !== null) $body['itemStaminaStaminaPoolName'] = $request->getItemStaminaStaminaPoolName();
        if($request->getItemConsumableItemItemPoolName() !== null) $body['itemConsumableItemItemPoolName'] = $request->getItemConsumableItemItemPoolName();
        if($request->getItemConsumableItemItemName() !== null) $body['itemConsumableItemItemName'] = $request->getItemConsumableItemItemName();
        if($request->getItemGachaGachaPoolName() !== null) $body['itemGachaGachaPoolName'] = $request->getItemGachaGachaPoolName();
        if($request->getItemGachaGachaName() !== null) $body['itemGachaGachaName'] = $request->getItemGachaGachaName();
        if($request->getItemAmount() !== null) $body['itemAmount'] = $request->getItemAmount();
        if($request->getItemOption() !== null) $body['itemOption'] = $request->getItemOption();
        if($request->getOpenConditionType() !== null) $body['openConditionType'] = $request->getOpenConditionType();
        if($request->getOpenConditionLimitName() !== null) $body['openConditionLimitName'] = $request->getOpenConditionLimitName();
        if($request->getOpenConditionLimitCounterName() !== null) $body['openConditionLimitCounterName'] = $request->getOpenConditionLimitCounterName();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            UpdateItemMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateItemMasterResult($result);
    }

	/**
	 * 購入処理を実行完了する為に必要となるスタンプシートを取得します。<br>
	 * スタンプシートの詳細は GS2 ドキュメントを参照してください。<br>
	 * <br>
	 * このAPIによって払い出されるスタンプシートが要求するタスクは以下のアクションの可能性があります。<br>
	 * <br>
	 * Gs2Money:VerifyByStampTask<br>
	 * Gs2Money:ConsumeWalletByStampTask<br>
	 * Gs2Gold:WithdrawFromWalletByStampTask<br>
	 * Gs2Stamina:ConsumeStaminaByStampTask<br>
	 * Gs2ConsumableItem:ConsumeInventoryByStampTask<br>
	 * Gs2Limit:UpCounterByStampTask<br>
	 * <br>
	 * このAPIによって払い出されるスタンプシートの完了は以下のアクションの可能性があります。<br>
	 * <br>
	 * Gs2Money:ChargeWalletByStampSheet<br>
	 * Gs2Gold:DepositIntoWalletByStampSheet<br>
	 * Gs2Stamina:ChangeStaminaByStampSheet<br>
	 * Gs2ConsumableItem:AcquisitionInventoryByStampSheet<br>
	 * <br>
	 *
	 * @param BuyItemRequest $request リクエストパラメータ
	 * @return BuyItemResult 結果
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
	public function buyItem(BuyItemRequest $request): BuyItemResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/item/". ($request->getShowcaseItemId() === null || $request->getShowcaseItemId() === "" ? "null" : $request->getShowcaseItemId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['keyName'] = $request->getKeyName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            BuyItemRequest::FUNCTION,
            $body,
            $headers
        );
        return new BuyItemResult($result);
    }

	/**
	 * 陳列されている商品一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeItemRequest $request リクエストパラメータ
	 * @return DescribeItemResult 結果
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
	public function describeItem(DescribeItemRequest $request): DescribeItemResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/item";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            DescribeItemRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeItemResult($result);
    }

	/**
	 * 陳列されている商品を取得します<br>
	 * <br>
	 *
	 * @param GetItemRequest $request リクエストパラメータ
	 * @return GetItemResult 結果
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
	public function getItem(GetItemRequest $request): GetItemResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/item/". ($request->getShowcaseItemId() === null || $request->getShowcaseItemId() === "" ? "null" : $request->getShowcaseItemId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            GetItemRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetItemResult($result);
    }

	/**
	 * ショーケースマスターデータをエクスポートする<br>
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
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            ExportMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new ExportMasterResult($result);
    }

	/**
	 * 陳列商品を新規作成します<br>
	 * <br>
	 *
	 * @param CreateShowcaseItemMasterRequest $request リクエストパラメータ
	 * @return CreateShowcaseItemMasterResult 結果
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
	public function createShowcaseItemMaster(CreateShowcaseItemMasterRequest $request): CreateShowcaseItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/showcaseItem";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['category'] = $request->getCategory();
        $body['priority'] = $request->getPriority();
        if($request->getItemName() !== null) $body['itemName'] = $request->getItemName();
        if($request->getItemGroupName() !== null) $body['itemGroupName'] = $request->getItemGroupName();
        if($request->getReleaseConditionType() !== null) $body['releaseConditionType'] = $request->getReleaseConditionType();
        if($request->getReleaseConditionScheduleName() !== null) $body['releaseConditionScheduleName'] = $request->getReleaseConditionScheduleName();
        if($request->getReleaseConditionScheduleEventName() !== null) $body['releaseConditionScheduleEventName'] = $request->getReleaseConditionScheduleEventName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            CreateShowcaseItemMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateShowcaseItemMasterResult($result);
    }

	/**
	 * 陳列商品を削除します<br>
	 * <br>
	 *
	 * @param DeleteShowcaseItemMasterRequest $request リクエストパラメータ
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
	public function deleteShowcaseItemMaster(DeleteShowcaseItemMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/showcaseItem/". ($request->getCategory() === null || $request->getCategory() === "" ? "null" : $request->getCategory()). "/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            DeleteShowcaseItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 陳列商品の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeShowcaseItemMasterRequest $request リクエストパラメータ
	 * @return DescribeShowcaseItemMasterResult 結果
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
	public function describeShowcaseItemMaster(DescribeShowcaseItemMasterRequest $request): DescribeShowcaseItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/showcaseItem";

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
            Gs2Showcase::MODULE,
            DescribeShowcaseItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeShowcaseItemMasterResult($result);
    }

	/**
	 * 陳列商品を取得します<br>
	 * <br>
	 *
	 * @param GetShowcaseItemMasterRequest $request リクエストパラメータ
	 * @return GetShowcaseItemMasterResult 結果
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
	public function getShowcaseItemMaster(GetShowcaseItemMasterRequest $request): GetShowcaseItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/showcaseItem/". ($request->getCategory() === null || $request->getCategory() === "" ? "null" : $request->getCategory()). "/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            GetShowcaseItemMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetShowcaseItemMasterResult($result);
    }

	/**
	 * 陳列商品を更新します<br>
	 * <br>
	 *
	 * @param UpdateShowcaseItemMasterRequest $request リクエストパラメータ
	 * @return UpdateShowcaseItemMasterResult 結果
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
	public function updateShowcaseItemMaster(UpdateShowcaseItemMasterRequest $request): UpdateShowcaseItemMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/master/showcaseItem/". ($request->getCategory() === null || $request->getCategory() === "" ? "null" : $request->getCategory()). "/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['releaseConditionType'] = $request->getReleaseConditionType();
        $body['priority'] = $request->getPriority();
        if($request->getReleaseConditionScheduleName() !== null) $body['releaseConditionScheduleName'] = $request->getReleaseConditionScheduleName();
        if($request->getReleaseConditionScheduleEventName() !== null) $body['releaseConditionScheduleEventName'] = $request->getReleaseConditionScheduleEventName();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            UpdateShowcaseItemMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateShowcaseItemMasterResult($result);
    }

	/**
	 * ショーケースを新規作成します<br>
	 * <br>
	 *
	 * @param CreateShowcaseRequest $request リクエストパラメータ
	 * @return CreateShowcaseResult 結果
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
	public function createShowcase(CreateShowcaseRequest $request): CreateShowcaseResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getReleaseConditionTriggerScript() !== null) $body['releaseConditionTriggerScript'] = $request->getReleaseConditionTriggerScript();
        if($request->getBuyTriggerScript() !== null) $body['buyTriggerScript'] = $request->getBuyTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            CreateShowcaseRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateShowcaseResult($result);
    }

	/**
	 * ショーケースを削除します<br>
	 * <br>
	 *
	 * @param DeleteShowcaseRequest $request リクエストパラメータ
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
	public function deleteShowcase(DeleteShowcaseRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            DeleteShowcaseRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ショーケースの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeShowcaseRequest $request リクエストパラメータ
	 * @return DescribeShowcaseResult 結果
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
	public function describeShowcase(DescribeShowcaseRequest $request): DescribeShowcaseResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase";

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
            Gs2Showcase::MODULE,
            DescribeShowcaseRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeShowcaseResult($result);
    }

	/**
	 * ショーケースを取得します<br>
	 * <br>
	 *
	 * @param GetShowcaseRequest $request リクエストパラメータ
	 * @return GetShowcaseResult 結果
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
	public function getShowcase(GetShowcaseRequest $request): GetShowcaseResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            GetShowcaseRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetShowcaseResult($result);
    }

	/**
	 * ショーケースの状態を取得します<br>
	 * <br>
	 *
	 * @param GetShowcaseStatusRequest $request リクエストパラメータ
	 * @return GetShowcaseStatusResult 結果
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
	public function getShowcaseStatus(GetShowcaseStatusRequest $request): GetShowcaseStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            GetShowcaseStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetShowcaseStatusResult($result);
    }

	/**
	 * ショーケースを更新します<br>
	 * <br>
	 *
	 * @param UpdateShowcaseRequest $request リクエストパラメータ
	 * @return UpdateShowcaseResult 結果
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
	public function updateShowcase(UpdateShowcaseRequest $request): UpdateShowcaseResult
	{
	    $url = self::ENDPOINT_HOST. "/showcase/". ($request->getShowcaseName() === null || $request->getShowcaseName() === "" ? "null" : $request->getShowcaseName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getReleaseConditionTriggerScript() !== null) $body['releaseConditionTriggerScript'] = $request->getReleaseConditionTriggerScript();
        if($request->getBuyTriggerScript() !== null) $body['buyTriggerScript'] = $request->getBuyTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Showcase::MODULE,
            UpdateShowcaseRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateShowcaseResult($result);
    }
}