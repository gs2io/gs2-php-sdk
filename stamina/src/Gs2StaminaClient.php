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

namespace Gs2\Stamina;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Stamina\Control\CreateStaminaPoolRequest;
use Gs2\Stamina\Control\CreateStaminaPoolResult;
use Gs2\Stamina\Control\DeleteStaminaPoolRequest;
use Gs2\Stamina\Control\DescribeServiceClassRequest;
use Gs2\Stamina\Control\DescribeServiceClassResult;
use Gs2\Stamina\Control\DescribeStaminaPoolRequest;
use Gs2\Stamina\Control\DescribeStaminaPoolResult;
use Gs2\Stamina\Control\GetStaminaPoolRequest;
use Gs2\Stamina\Control\GetStaminaPoolResult;
use Gs2\Stamina\Control\GetStaminaPoolStatusRequest;
use Gs2\Stamina\Control\GetStaminaPoolStatusResult;
use Gs2\Stamina\Control\UpdateStaminaPoolRequest;
use Gs2\Stamina\Control\UpdateStaminaPoolResult;
use Gs2\Stamina\Control\ChangeStaminaRequest;
use Gs2\Stamina\Control\ChangeStaminaResult;
use Gs2\Stamina\Control\ChangeStaminaByStampSheetRequest;
use Gs2\Stamina\Control\ChangeStaminaByStampSheetResult;
use Gs2\Stamina\Control\ConsumeStaminaRequest;
use Gs2\Stamina\Control\ConsumeStaminaResult;
use Gs2\Stamina\Control\ConsumeStaminaByStampTaskRequest;
use Gs2\Stamina\Control\ConsumeStaminaByStampTaskResult;
use Gs2\Stamina\Control\GetStaminaRequest;
use Gs2\Stamina\Control\GetStaminaResult;

/**
 * GS2 Stamina API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2StaminaClient extends AbstractGs2Client {

	public static $ENDPOINT = "stamina";

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
	 * スタミナプールを新規作成します<br>
	 * <br>
	 *
	 * @param CreateStaminaPoolRequest $request リクエストパラメータ
	 * @return CreateStaminaPoolResult 結果
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
	public function createStaminaPool(CreateStaminaPoolRequest $request): CreateStaminaPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/staminaPool";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['serviceClass'] = $request->getServiceClass();
        $body['increaseInterval'] = $request->getIncreaseInterval();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getConsumeStaminaTriggerScript() !== null) $body['consumeStaminaTriggerScript'] = $request->getConsumeStaminaTriggerScript();
        if($request->getConsumeStaminaDoneTriggerScript() !== null) $body['consumeStaminaDoneTriggerScript'] = $request->getConsumeStaminaDoneTriggerScript();
        if($request->getAddStaminaTriggerScript() !== null) $body['addStaminaTriggerScript'] = $request->getAddStaminaTriggerScript();
        if($request->getAddStaminaDoneTriggerScript() !== null) $body['addStaminaDoneTriggerScript'] = $request->getAddStaminaDoneTriggerScript();
        if($request->getGetMaxStaminaTriggerScript() !== null) $body['getMaxStaminaTriggerScript'] = $request->getGetMaxStaminaTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            CreateStaminaPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateStaminaPoolResult($result);
    }

	/**
	 * スタミナプールを削除します<br>
	 * <br>
	 *
	 * @param DeleteStaminaPoolRequest $request リクエストパラメータ
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
	public function deleteStaminaPool(DeleteStaminaPoolRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/staminaPool/". ($request->getStaminaPoolName() === null || $request->getStaminaPoolName() === "" ? "null" : $request->getStaminaPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            DeleteStaminaPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
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
	    $url = self::ENDPOINT_HOST. "/staminaPool/serviceClass";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            DescribeServiceClassRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeServiceClassResult($result);
    }

	/**
	 * スタミナプールの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeStaminaPoolRequest $request リクエストパラメータ
	 * @return DescribeStaminaPoolResult 結果
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
	public function describeStaminaPool(DescribeStaminaPoolRequest $request): DescribeStaminaPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/staminaPool";

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
            Gs2Stamina::MODULE,
            DescribeStaminaPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeStaminaPoolResult($result);
    }

	/**
	 * スタミナプールを取得します<br>
	 * <br>
	 *
	 * @param GetStaminaPoolRequest $request リクエストパラメータ
	 * @return GetStaminaPoolResult 結果
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
	public function getStaminaPool(GetStaminaPoolRequest $request): GetStaminaPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/staminaPool/". ($request->getStaminaPoolName() === null || $request->getStaminaPoolName() === "" ? "null" : $request->getStaminaPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            GetStaminaPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetStaminaPoolResult($result);
    }

	/**
	 * スタミナプールの状態を取得します<br>
	 * <br>
	 *
	 * @param GetStaminaPoolStatusRequest $request リクエストパラメータ
	 * @return GetStaminaPoolStatusResult 結果
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
	public function getStaminaPoolStatus(GetStaminaPoolStatusRequest $request): GetStaminaPoolStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/staminaPool/". ($request->getStaminaPoolName() === null || $request->getStaminaPoolName() === "" ? "null" : $request->getStaminaPoolName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            GetStaminaPoolStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetStaminaPoolStatusResult($result);
    }

	/**
	 * スタミナプールを更新します<br>
	 * <br>
	 *
	 * @param UpdateStaminaPoolRequest $request リクエストパラメータ
	 * @return UpdateStaminaPoolResult 結果
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
	public function updateStaminaPool(UpdateStaminaPoolRequest $request): UpdateStaminaPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/staminaPool/". ($request->getStaminaPoolName() === null || $request->getStaminaPoolName() === "" ? "null" : $request->getStaminaPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceClass'] = $request->getServiceClass();
        $body['increaseInterval'] = $request->getIncreaseInterval();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getConsumeStaminaTriggerScript() !== null) $body['consumeStaminaTriggerScript'] = $request->getConsumeStaminaTriggerScript();
        if($request->getConsumeStaminaDoneTriggerScript() !== null) $body['consumeStaminaDoneTriggerScript'] = $request->getConsumeStaminaDoneTriggerScript();
        if($request->getAddStaminaTriggerScript() !== null) $body['addStaminaTriggerScript'] = $request->getAddStaminaTriggerScript();
        if($request->getAddStaminaDoneTriggerScript() !== null) $body['addStaminaDoneTriggerScript'] = $request->getAddStaminaDoneTriggerScript();
        if($request->getGetMaxStaminaTriggerScript() !== null) $body['getMaxStaminaTriggerScript'] = $request->getGetMaxStaminaTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            UpdateStaminaPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateStaminaPoolResult($result);
    }

	/**
	 * スタミナを増減します<br>
	 * <br>
	 * - 消費クオータ: 5<br>
	 * <br>
	 *
	 * @param ChangeStaminaRequest $request リクエストパラメータ
	 * @return ChangeStaminaResult 結果
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
	public function changeStamina(ChangeStaminaRequest $request): ChangeStaminaResult
	{
	    $url = self::ENDPOINT_HOST. "/staminaPool/". ($request->getStaminaPoolName() === null || $request->getStaminaPoolName() === "" ? "null" : $request->getStaminaPoolName()). "/stamina";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['variation'] = $request->getVariation();
        $body['maxValue'] = $request->getMaxValue();
        if($request->getOverflow() !== null) $body['overflow'] = $request->getOverflow();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            ChangeStaminaRequest::FUNCTION,
            $body,
            $headers
        );
        return new ChangeStaminaResult($result);
    }

	/**
	 * スタンプシートを使用してスタミナを増減します<br>
	 * <br>
	 * - 消費クオータ: 5<br>
	 * <br>
	 *
	 * @param ChangeStaminaByStampSheetRequest $request リクエストパラメータ
	 * @return ChangeStaminaByStampSheetResult 結果
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
	public function changeStaminaByStampSheet(ChangeStaminaByStampSheetRequest $request): ChangeStaminaByStampSheetResult
	{
	    $url = self::ENDPOINT_HOST. "/stamina";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['sheet'] = $request->getSheet();
        $body['keyName'] = $request->getKeyName();
        if($request->getMaxValue() !== null) $body['maxValue'] = $request->getMaxValue();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            ChangeStaminaByStampSheetRequest::FUNCTION,
            $body,
            $headers
        );
        return new ChangeStaminaByStampSheetResult($result);
    }

	/**
	 * スタミナを消費します。<br>
	 * このエンドポイントは回復に使用できません。<br>
	 * ポリシーで消費と回復を分けて管理したい場合に使用してください。<br>
	 * <br>
	 * - 消費クオータ: 5<br>
	 * <br>
	 *
	 * @param ConsumeStaminaRequest $request リクエストパラメータ
	 * @return ConsumeStaminaResult 結果
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
	public function consumeStamina(ConsumeStaminaRequest $request): ConsumeStaminaResult
	{
	    $url = self::ENDPOINT_HOST. "/staminaPool/". ($request->getStaminaPoolName() === null || $request->getStaminaPoolName() === "" ? "null" : $request->getStaminaPoolName()). "/stamina/consume";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['variation'] = $request->getVariation();
        $body['maxValue'] = $request->getMaxValue();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            ConsumeStaminaRequest::FUNCTION,
            $body,
            $headers
        );
        return new ConsumeStaminaResult($result);
    }

	/**
	 * スタンプタスクを使用してスタミナを消費します。<br>
	 * <br>
	 * - 消費クオータ: 5<br>
	 * <br>
	 *
	 * @param ConsumeStaminaByStampTaskRequest $request リクエストパラメータ
	 * @return ConsumeStaminaByStampTaskResult 結果
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
	public function consumeStaminaByStampTask(ConsumeStaminaByStampTaskRequest $request): ConsumeStaminaByStampTaskResult
	{
	    $url = self::ENDPOINT_HOST. "/stamina/consume";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['task'] = $request->getTask();
        $body['keyName'] = $request->getKeyName();
        $body['transactionId'] = $request->getTransactionId();
        $body['maxValue'] = $request->getMaxValue();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            ConsumeStaminaByStampTaskRequest::FUNCTION,
            $body,
            $headers
        );
        return new ConsumeStaminaByStampTaskResult($result);
    }

	/**
	 * 現在のスタミナ値を取得します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param GetStaminaRequest $request リクエストパラメータ
	 * @return GetStaminaResult 結果
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
	public function getStamina(GetStaminaRequest $request): GetStaminaResult
	{
	    $url = self::ENDPOINT_HOST. "/staminaPool/". ($request->getStaminaPoolName() === null || $request->getStaminaPoolName() === "" ? "null" : $request->getStaminaPoolName()). "/stamina";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        if($request->getMaxValue() !== null) $queryString['maxValue'] = $request->getMaxValue();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Stamina::MODULE,
            GetStaminaRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetStaminaResult($result);
    }
}