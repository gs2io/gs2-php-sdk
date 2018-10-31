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

namespace Gs2\Money;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Money\Control\CreateItemRequest;
use Gs2\Money\Control\CreateItemResult;
use Gs2\Money\Control\DeleteItemRequest;
use Gs2\Money\Control\DescribeItemRequest;
use Gs2\Money\Control\DescribeItemResult;
use Gs2\Money\Control\GetItemRequest;
use Gs2\Money\Control\GetItemResult;
use Gs2\Money\Control\UpdateItemRequest;
use Gs2\Money\Control\UpdateItemResult;
use Gs2\Money\Control\CreateMoneyRequest;
use Gs2\Money\Control\CreateMoneyResult;
use Gs2\Money\Control\DeleteMoneyRequest;
use Gs2\Money\Control\DescribeMoneyRequest;
use Gs2\Money\Control\DescribeMoneyResult;
use Gs2\Money\Control\GetMoneyRequest;
use Gs2\Money\Control\GetMoneyResult;
use Gs2\Money\Control\GetMoneyStatusRequest;
use Gs2\Money\Control\GetMoneyStatusResult;
use Gs2\Money\Control\UpdateMoneyRequest;
use Gs2\Money\Control\UpdateMoneyResult;
use Gs2\Money\Control\CreatePlatformedItemRequest;
use Gs2\Money\Control\CreatePlatformedItemResult;
use Gs2\Money\Control\DeletePlatformedItemRequest;
use Gs2\Money\Control\DescribePlatformedItemRequest;
use Gs2\Money\Control\DescribePlatformedItemResult;
use Gs2\Money\Control\GetPlatformedItemRequest;
use Gs2\Money\Control\GetPlatformedItemResult;
use Gs2\Money\Control\UpdatePlatformedItemRequest;
use Gs2\Money\Control\UpdatePlatformedItemResult;
use Gs2\Money\Control\DescribeReceiptRequest;
use Gs2\Money\Control\DescribeReceiptResult;
use Gs2\Money\Control\DescribeReceiptByUserIdAndSlotRequest;
use Gs2\Money\Control\DescribeReceiptByUserIdAndSlotResult;
use Gs2\Money\Control\VerifyRequest;
use Gs2\Money\Control\VerifyResult;
use Gs2\Money\Control\VerifyByStampTaskRequest;
use Gs2\Money\Control\ChargeWalletRequest;
use Gs2\Money\Control\ChargeWalletResult;
use Gs2\Money\Control\ChargeWalletByStampSheetRequest;
use Gs2\Money\Control\ChargeWalletByStampSheetResult;
use Gs2\Money\Control\ChargeWalletByUserIdRequest;
use Gs2\Money\Control\ChargeWalletByUserIdResult;
use Gs2\Money\Control\ConsumeWalletRequest;
use Gs2\Money\Control\ConsumeWalletResult;
use Gs2\Money\Control\ConsumeWalletByStampTaskRequest;
use Gs2\Money\Control\ConsumeWalletByStampTaskResult;
use Gs2\Money\Control\ConsumeWalletByUserIdRequest;
use Gs2\Money\Control\ConsumeWalletByUserIdResult;
use Gs2\Money\Control\DescribeWalletRequest;
use Gs2\Money\Control\DescribeWalletResult;
use Gs2\Money\Control\GetWalletRequest;
use Gs2\Money\Control\GetWalletResult;
use Gs2\Money\Control\GetWalletByUserIdRequest;
use Gs2\Money\Control\GetWalletByUserIdResult;
use Gs2\Money\Control\GetWalletDetailRequest;
use Gs2\Money\Control\GetWalletDetailResult;

/**
 * GS2 Money API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2MoneyClient extends AbstractGs2Client {

	public static $ENDPOINT = "money";

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
	 * 商品を新規作成します<br>
	 * <br>
	 * このデータは GS2-Money のレシート検証機能を利用するときにのみ登録する必要があります。<br>
	 * これはレシート検証の結果妥当だった場合対価として課金通貨を付与するために、<br>
	 * どのような価値の課金通貨をいくらで販売しているのかという情報を GS2-Money が持っていなければサービスを実現できないためです。<br>
	 * <br>
	 * - 商品(課金通貨 60個)<br>
	 * -- プラットフォーム個別商品(AppleAppStore 120円)<br>
	 * -- プラットフォーム個別商品(GooglePlay 120円)<br>
	 * <br>
	 * という構造で商品を登録する必要があります。<br>
	 * <br>
	 *
	 * @param CreateItemRequest $request リクエストパラメータ
	 * @return CreateItemResult 結果
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
	public function createItem(CreateItemRequest $request): CreateItemResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['count'] = $request->getCount();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            CreateItemRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateItemResult($result);
    }

	/**
	 * 商品を削除します<br>
	 * <br>
	 *
	 * @param DeleteItemRequest $request リクエストパラメータ
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
	public function deleteItem(DeleteItemRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            DeleteItemRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 商品の一覧を取得します<br>
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
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item";

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
            Gs2Money::MODULE,
            DescribeItemRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeItemResult($result);
    }

	/**
	 * 商品を取得します<br>
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
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            GetItemRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetItemResult($result);
    }

	/**
	 * 商品を更新します<br>
	 * <br>
	 *
	 * @param UpdateItemRequest $request リクエストパラメータ
	 * @return UpdateItemResult 結果
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
	public function updateItem(UpdateItemRequest $request): UpdateItemResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['count'] = $request->getCount();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            UpdateItemRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateItemResult($result);
    }

	/**
	 * 課金通貨を新規作成します<br>
	 * <br>
	 * priority には課金通貨の消費優先度を指定することが出来ます。<br>
	 * 無償課金通貨を優先して消費する場合は free を、有償課金通貨を優先して消費する場合は paid を指定します。<br>
	 * 資金決済法への対応としては有償課金通貨を優先して消費するほうが未使用残高が溜まりにくく効率的ですが、<br>
	 * 有償課金通貨でしか購入できないアイテムを提供している場合はユーザの心象は悪いかもしれません。<br>
	 * <br>
	 * ユーザごとにウォレットという財布のようなものを用意し、課金通貨はそこにチャージされます。<br>
	 * ウォレットにはスロットという概念があり、各ユーザ複数の財布を持つことが出来ます。<br>
	 * これはガイドラインによってプラットフォームごとに課金通貨を分けて管理する必要があるためです。<br>
	 * このガイドラインは有償課金通貨にのみ適用される者で、無償課金通貨はその義務は生じません。<br>
	 * そのため shareFree という設定値があり、ここを true に設定することですべてのスロットで無償課金通貨を共有することができるようになります。<br>
	 * この際、あらゆるスロットにアクセスしても無償課金通貨に関してはスロット0の課金通貨が利用される。という挙動を取ります。<br>
	 * <br>
	 * useVerifyReceipt で課金時に各プラットフォームから取得できるレシートを検証する機能を利用できるようになります。<br>
	 * レシートの検証機能を利用する場合は各プラットフォームごとに検証に必要な要素を登録しておく必要があります。<br>
	 * <br>
	 * AppleAppStore におけるレシートの検証を実現するには appleKey を指定します。<br>
	 * appleKey にはアプリケーションの bundle_id を指定してください。<br>
	 * 異なるアプリケーションで決済されたトランザクションで課金通貨をチャージすることを防ぐ意味があります。<br>
	 * <br>
	 * GooglePlay におけるレシートの検証を実現するには googleKey を指定します。<br>
	 * googleKey には Google Play Developer Console で取得できる公開鍵を指定してください。<br>
	 * レシートが改ざんされていないか検証するために利用します。<br>
	 * <br>
	 * GS2-Money は資金決済法における前払式支払手段(自家型)に対応します。<br>
	 * マネージメントコンソールやAPIで取得できる未使用残高が1,000万円を超えると法的な責任が発生します。<br>
	 * 詳しくはドキュメントを参照してください。<br>
	 * <br>
	 *
	 * @param CreateMoneyRequest $request リクエストパラメータ
	 * @return CreateMoneyResult 結果
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
	public function createMoney(CreateMoneyRequest $request): CreateMoneyResult
	{
	    $url = self::ENDPOINT_HOST. "/money";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['priority'] = $request->getPriority();
        $body['shareFree'] = $request->getShareFree();
        $body['currency'] = $request->getCurrency();
        $body['useVerifyReceipt'] = $request->getUseVerifyReceipt();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getAppleKey() !== null) $body['appleKey'] = $request->getAppleKey();
        if($request->getGoogleKey() !== null) $body['googleKey'] = $request->getGoogleKey();
        if($request->getCreateWalletTriggerScript() !== null) $body['createWalletTriggerScript'] = $request->getCreateWalletTriggerScript();
        if($request->getCreateWalletDoneTriggerScript() !== null) $body['createWalletDoneTriggerScript'] = $request->getCreateWalletDoneTriggerScript();
        if($request->getChargeWalletTriggerScript() !== null) $body['chargeWalletTriggerScript'] = $request->getChargeWalletTriggerScript();
        if($request->getChargeWalletDoneTriggerScript() !== null) $body['chargeWalletDoneTriggerScript'] = $request->getChargeWalletDoneTriggerScript();
        if($request->getConsumeWalletTriggerScript() !== null) $body['consumeWalletTriggerScript'] = $request->getConsumeWalletTriggerScript();
        if($request->getConsumeWalletDoneTriggerScript() !== null) $body['consumeWalletDoneTriggerScript'] = $request->getConsumeWalletDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            CreateMoneyRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateMoneyResult($result);
    }

	/**
	 * 課金通貨を削除します<br>
	 * <br>
	 *
	 * @param DeleteMoneyRequest $request リクエストパラメータ
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
	public function deleteMoney(DeleteMoneyRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            DeleteMoneyRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 課金通貨の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeMoneyRequest $request リクエストパラメータ
	 * @return DescribeMoneyResult 結果
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
	public function describeMoney(DescribeMoneyRequest $request): DescribeMoneyResult
	{
	    $url = self::ENDPOINT_HOST. "/money";

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
            Gs2Money::MODULE,
            DescribeMoneyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeMoneyResult($result);
    }

	/**
	 * 課金通貨を取得します<br>
	 * <br>
	 *
	 * @param GetMoneyRequest $request リクエストパラメータ
	 * @return GetMoneyResult 結果
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
	public function getMoney(GetMoneyRequest $request): GetMoneyResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            GetMoneyRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMoneyResult($result);
    }

	/**
	 * 課金通貨の状態を取得します<br>
	 * <br>
	 *
	 * @param GetMoneyStatusRequest $request リクエストパラメータ
	 * @return GetMoneyStatusResult 結果
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
	public function getMoneyStatus(GetMoneyStatusRequest $request): GetMoneyStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            GetMoneyStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMoneyStatusResult($result);
    }

	/**
	 * 課金通貨を更新します<br>
	 * <br>
	 *
	 * @param UpdateMoneyRequest $request リクエストパラメータ
	 * @return UpdateMoneyResult 結果
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
	public function updateMoney(UpdateMoneyRequest $request): UpdateMoneyResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['priority'] = $request->getPriority();
        $body['useVerifyReceipt'] = $request->getUseVerifyReceipt();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getAppleKey() !== null) $body['appleKey'] = $request->getAppleKey();
        if($request->getGoogleKey() !== null) $body['googleKey'] = $request->getGoogleKey();
        if($request->getCreateWalletTriggerScript() !== null) $body['createWalletTriggerScript'] = $request->getCreateWalletTriggerScript();
        if($request->getCreateWalletDoneTriggerScript() !== null) $body['createWalletDoneTriggerScript'] = $request->getCreateWalletDoneTriggerScript();
        if($request->getChargeWalletTriggerScript() !== null) $body['chargeWalletTriggerScript'] = $request->getChargeWalletTriggerScript();
        if($request->getChargeWalletDoneTriggerScript() !== null) $body['chargeWalletDoneTriggerScript'] = $request->getChargeWalletDoneTriggerScript();
        if($request->getConsumeWalletTriggerScript() !== null) $body['consumeWalletTriggerScript'] = $request->getConsumeWalletTriggerScript();
        if($request->getConsumeWalletDoneTriggerScript() !== null) $body['consumeWalletDoneTriggerScript'] = $request->getConsumeWalletDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            UpdateMoneyRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateMoneyResult($result);
    }

	/**
	 * プラットフォーム個別商品を新規作成します<br>
	 * <br>
	 * name には各プラットフォームの管理コンソールで作成した消費型アイテムの名前を指定してください。<br>
	 * <br>
	 *
	 * @param CreatePlatformedItemRequest $request リクエストパラメータ
	 * @return CreatePlatformedItemResult 結果
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
	public function createPlatformedItem(CreatePlatformedItemRequest $request): CreatePlatformedItemResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "/platformedItem";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['platform'] = $request->getPlatform();
        $body['name'] = $request->getName();
        $body['price'] = $request->getPrice();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            CreatePlatformedItemRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreatePlatformedItemResult($result);
    }

	/**
	 * プラットフォーム個別商品を削除します<br>
	 * <br>
	 *
	 * @param DeletePlatformedItemRequest $request リクエストパラメータ
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
	public function deletePlatformedItem(DeletePlatformedItemRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "/platformedItem/". ($request->getPlatform() === null || $request->getPlatform() === "" ? "null" : $request->getPlatform()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            DeletePlatformedItemRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * プラットフォーム個別商品の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribePlatformedItemRequest $request リクエストパラメータ
	 * @return DescribePlatformedItemResult 結果
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
	public function describePlatformedItem(DescribePlatformedItemRequest $request): DescribePlatformedItemResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "/platformedItem";

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
            Gs2Money::MODULE,
            DescribePlatformedItemRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribePlatformedItemResult($result);
    }

	/**
	 * プラットフォーム個別商品を取得します<br>
	 * <br>
	 *
	 * @param GetPlatformedItemRequest $request リクエストパラメータ
	 * @return GetPlatformedItemResult 結果
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
	public function getPlatformedItem(GetPlatformedItemRequest $request): GetPlatformedItemResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "/platformedItem/". ($request->getPlatform() === null || $request->getPlatform() === "" ? "null" : $request->getPlatform()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            GetPlatformedItemRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetPlatformedItemResult($result);
    }

	/**
	 * プラットフォーム個別商品を更新します<br>
	 * <br>
	 *
	 * @param UpdatePlatformedItemRequest $request リクエストパラメータ
	 * @return UpdatePlatformedItemResult 結果
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
	public function updatePlatformedItem(UpdatePlatformedItemRequest $request): UpdatePlatformedItemResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/item/". ($request->getItemName() === null || $request->getItemName() === "" ? "null" : $request->getItemName()). "/platformedItem/". ($request->getPlatform() === null || $request->getPlatform() === "" ? "null" : $request->getPlatform()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['price'] = $request->getPrice();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            UpdatePlatformedItemRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdatePlatformedItemResult($result);
    }

	/**
	 * レシートを取得します<br>
	 * <br>
	 *
	 * @param DescribeReceiptRequest $request リクエストパラメータ
	 * @return DescribeReceiptResult 結果
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
	public function describeReceipt(DescribeReceiptRequest $request): DescribeReceiptResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/receipt";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getBegin() !== null) $queryString['begin'] = $request->getBegin();
        if($request->getEnd() !== null) $queryString['end'] = $request->getEnd();
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            DescribeReceiptRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeReceiptResult($result);
    }

	/**
	 * 指定したユーザ・スロット番号のレシートを取得します<br>
	 * <br>
	 *
	 * @param DescribeReceiptByUserIdAndSlotRequest $request リクエストパラメータ
	 * @return DescribeReceiptByUserIdAndSlotResult 結果
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
	public function describeReceiptByUserIdAndSlot(DescribeReceiptByUserIdAndSlotRequest $request): DescribeReceiptByUserIdAndSlotResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/receipt/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getBegin() !== null) $queryString['begin'] = $request->getBegin();
        if($request->getEnd() !== null) $queryString['end'] = $request->getEnd();
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            DescribeReceiptByUserIdAndSlotRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeReceiptByUserIdAndSlotResult($result);
    }

	/**
	 * レシートを検証する<br>
	 * <br>
	 * 下記フォーマットのレシートをPOSTすることでレシートを検証し、課金通貨のチャージまでアトミックに実行できます。<br>
	 * {<br>
	 *   "Store": ストア名,<br>
	 *   "TransactionID": トランザクションID,<br>
	 *   "Payload": レシート本体<br>
	 * }<br>
	 * <br>
	 * 現在ストア名には<br>
	 * - AppleAppStore<br>
	 * - GooglePlay<br>
	 * が指定できます。<br>
	 * <br>
	 *
	 * @param VerifyRequest $request リクエストパラメータ
	 * @return VerifyResult 結果
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
	public function verify(VerifyRequest $request): VerifyResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/verify";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['slot'] = $request->getSlot();
        $body['receipt'] = $request->getReceipt();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            VerifyRequest::FUNCTION,
            $body,
            $headers
        );
        return new VerifyResult($result);
    }

	/**
	 * スタンプタスクを使用してレシートを検証する<br>
	 * <br>
	 *
	 * @param VerifyByStampTaskRequest $request リクエストパラメータ
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
	public function verifyByStampTask(VerifyByStampTaskRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/verify/stampTask";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['task'] = $request->getTask();
        $body['keyName'] = $request->getKeyName();
        $body['transactionId'] = $request->getTransactionId();
        $body['receipt'] = $request->getReceipt();
        $body['slot'] = $request->getSlot();
        $this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            VerifyByStampTaskRequest::FUNCTION,
            $body,
            $headers
        );
    }

	/**
	 * ウォレットに課金通貨をチャージします<br>
	 * <br>
	 * trasactionId にトランザクションIDを指定することで、<br>
	 * 1回の課金処理で複数回課金通貨をチャージすることを防ぐことが出来ます。<br>
	 * 重複したリクエストが発生した場合は 409エラー(ConflictException) が発生しますが、正常処理とするべきです。<br>
	 * <br>
	 *
	 * @param ChargeWalletRequest $request リクエストパラメータ
	 * @return ChargeWalletResult 結果
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
	public function chargeWallet(ChargeWalletRequest $request): ChargeWalletResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/wallet/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "/charge";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['price'] = $request->getPrice();
        $body['count'] = $request->getCount();
        if($request->getTransactionId() !== null) $body['transactionId'] = $request->getTransactionId();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            ChargeWalletRequest::FUNCTION,
            $body,
            $headers
        );
        return new ChargeWalletResult($result);
    }

	/**
	 * スタンプシートを使用してウォレットに課金通貨をチャージします<br>
	 * <br>
	 *
	 * @param ChargeWalletByStampSheetRequest $request リクエストパラメータ
	 * @return ChargeWalletByStampSheetResult 結果
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
	public function chargeWalletByStampSheet(ChargeWalletByStampSheetRequest $request): ChargeWalletByStampSheetResult
	{
	    $url = self::ENDPOINT_HOST. "/wallet/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "/stampSheet/charge";

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
            Gs2Money::MODULE,
            ChargeWalletByStampSheetRequest::FUNCTION,
            $body,
            $headers
        );
        return new ChargeWalletByStampSheetResult($result);
    }

	/**
	 * ウォレットに課金通貨をチャージします<br>
	 * <br>
	 * trasactionId にトランザクションIDを指定することで、<br>
	 * 1回の課金処理で複数回課金通貨をチャージすることを防ぐことが出来ます。<br>
	 * 重複したリクエストが発生した場合は 409エラー(ConflictException) が発生しますが、正常処理とするべきです。<br>
	 * <br>
	 *
	 * @param ChargeWalletByUserIdRequest $request リクエストパラメータ
	 * @return ChargeWalletByUserIdResult 結果
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
	public function chargeWalletByUserId(ChargeWalletByUserIdRequest $request): ChargeWalletByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/wallet/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/charge";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['price'] = $request->getPrice();
        $body['count'] = $request->getCount();
        if($request->getTransactionId() !== null) $body['transactionId'] = $request->getTransactionId();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            ChargeWalletByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new ChargeWalletByUserIdResult($result);
    }

	/**
	 * ウォレットから課金通貨を消費します<br>
	 * <br>
	 * paidOnly に true を指定することで、有償課金通貨のみ消費対象とすることが出来ます。<br>
	 * プレミアムなサービスの提供時などに活用してください。<br>
	 * <br>
	 *
	 * @param ConsumeWalletRequest $request リクエストパラメータ
	 * @return ConsumeWalletResult 結果
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
	public function consumeWallet(ConsumeWalletRequest $request): ConsumeWalletResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/wallet/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "/consume";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['count'] = $request->getCount();
        $body['use'] = $request->getUse();
        if($request->getPaidOnly() !== null) $body['paidOnly'] = $request->getPaidOnly();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            ConsumeWalletRequest::FUNCTION,
            $body,
            $headers
        );
        return new ConsumeWalletResult($result);
    }

	/**
	 * スタンプタスクを使用してウォレットから課金通貨を消費します<br>
	 * <br>
	 *
	 * @param ConsumeWalletByStampTaskRequest $request リクエストパラメータ
	 * @return ConsumeWalletByStampTaskResult 結果
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
	public function consumeWalletByStampTask(ConsumeWalletByStampTaskRequest $request): ConsumeWalletByStampTaskResult
	{
	    $url = self::ENDPOINT_HOST. "/wallet/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "/stampTask/consume";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['task'] = $request->getTask();
        $body['keyName'] = $request->getKeyName();
        $body['transactionId'] = $request->getTransactionId();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            ConsumeWalletByStampTaskRequest::FUNCTION,
            $body,
            $headers
        );
        return new ConsumeWalletByStampTaskResult($result);
    }

	/**
	 * ウォレットの課金通貨を消費します<br>
	 * <br>
	 * trasactionId にトランザクションIDを指定することで、<br>
	 * 1回の課金処理で複数回課金通貨を消費することを防ぐことが出来ます。<br>
	 * 重複したリクエストが発生した場合は 409エラー(ConflictException) が発生しますが、正常処理とするべきです。<br>
	 * <br>
	 *
	 * @param ConsumeWalletByUserIdRequest $request リクエストパラメータ
	 * @return ConsumeWalletByUserIdResult 結果
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
	public function consumeWalletByUserId(ConsumeWalletByUserIdRequest $request): ConsumeWalletByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/wallet/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/consume";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['count'] = $request->getCount();
        $body['use'] = $request->getUse();
        if($request->getPaidOnly() !== null) $body['paidOnly'] = $request->getPaidOnly();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            ConsumeWalletByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new ConsumeWalletByUserIdResult($result);
    }

	/**
	 * ウォレット一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeWalletRequest $request リクエストパラメータ
	 * @return DescribeWalletResult 結果
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
	public function describeWallet(DescribeWalletRequest $request): DescribeWalletResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/wallet";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getUserId() !== null) $queryString['userId'] = $request->getUserId();
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            DescribeWalletRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeWalletResult($result);
    }

	/**
	 * ウォレットを取得します<br>
	 * <br>
	 * ここでは有償課金通貨と無償課金通貨の数が取得できます。<br>
	 * 有償課金通貨は単価ごとに所持数量が別途管理されています。<br>
	 * 詳細な構成を取得したい場合は Gs2Money:GetWalletDetail を使ってください。<br>
	 * <br>
	 *
	 * @param GetWalletRequest $request リクエストパラメータ
	 * @return GetWalletResult 結果
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
	public function getWallet(GetWalletRequest $request): GetWalletResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/wallet/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            GetWalletRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetWalletResult($result);
    }

	/**
	 * ユーザIDを指定してウォレットを取得します<br>
	 * <br>
	 *
	 * @param GetWalletByUserIdRequest $request リクエストパラメータ
	 * @return GetWalletByUserIdResult 結果
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
	public function getWalletByUserId(GetWalletByUserIdRequest $request): GetWalletByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/wallet/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            GetWalletByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetWalletByUserIdResult($result);
    }

	/**
	 * ウォレットの詳細を取得します<br>
	 * <br>
	 *
	 * @param GetWalletDetailRequest $request リクエストパラメータ
	 * @return GetWalletDetailResult 結果
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
	public function getWalletDetail(GetWalletDetailRequest $request): GetWalletDetailResult
	{
	    $url = self::ENDPOINT_HOST. "/money/". ($request->getMoneyName() === null || $request->getMoneyName() === "" ? "null" : $request->getMoneyName()). "/wallet/". ($request->getSlot() === null || $request->getSlot() === "" ? "null" : $request->getSlot()). "/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/detail";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Money::MODULE,
            GetWalletDetailRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetWalletDetailResult($result);
    }
}