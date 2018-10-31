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

namespace Gs2\Gold;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Gold\Control\GetCurrentGoldMasterRequest;
use Gs2\Gold\Control\GetCurrentGoldMasterResult;
use Gs2\Gold\Control\UpdateCurrentGoldMasterRequest;
use Gs2\Gold\Control\UpdateCurrentGoldMasterResult;
use Gs2\Gold\Control\CreateGoldMasterRequest;
use Gs2\Gold\Control\CreateGoldMasterResult;
use Gs2\Gold\Control\DeleteGoldMasterRequest;
use Gs2\Gold\Control\DescribeGoldMasterRequest;
use Gs2\Gold\Control\DescribeGoldMasterResult;
use Gs2\Gold\Control\GetGoldMasterRequest;
use Gs2\Gold\Control\GetGoldMasterResult;
use Gs2\Gold\Control\UpdateGoldMasterRequest;
use Gs2\Gold\Control\UpdateGoldMasterResult;
use Gs2\Gold\Control\CreateGoldPoolRequest;
use Gs2\Gold\Control\CreateGoldPoolResult;
use Gs2\Gold\Control\DeleteGoldPoolRequest;
use Gs2\Gold\Control\DescribeGoldPoolRequest;
use Gs2\Gold\Control\DescribeGoldPoolResult;
use Gs2\Gold\Control\DescribeServiceClassRequest;
use Gs2\Gold\Control\DescribeServiceClassResult;
use Gs2\Gold\Control\GetGoldPoolRequest;
use Gs2\Gold\Control\GetGoldPoolResult;
use Gs2\Gold\Control\GetGoldPoolStatusRequest;
use Gs2\Gold\Control\GetGoldPoolStatusResult;
use Gs2\Gold\Control\UpdateGoldPoolRequest;
use Gs2\Gold\Control\UpdateGoldPoolResult;
use Gs2\Gold\Control\ExportMasterRequest;
use Gs2\Gold\Control\ExportMasterResult;
use Gs2\Gold\Control\GetWalletSettingsRequest;
use Gs2\Gold\Control\GetWalletSettingsResult;
use Gs2\Gold\Control\DeleteWalletByUserIdRequest;
use Gs2\Gold\Control\DepositIntoWalletRequest;
use Gs2\Gold\Control\DepositIntoWalletResult;
use Gs2\Gold\Control\DepositIntoWalletByStampSheetRequest;
use Gs2\Gold\Control\DepositIntoWalletByStampSheetResult;
use Gs2\Gold\Control\DepositIntoWalletByUserIdRequest;
use Gs2\Gold\Control\DepositIntoWalletByUserIdResult;
use Gs2\Gold\Control\DescribeWalletRequest;
use Gs2\Gold\Control\DescribeWalletResult;
use Gs2\Gold\Control\DescribeWalletByUserIdRequest;
use Gs2\Gold\Control\DescribeWalletByUserIdResult;
use Gs2\Gold\Control\GetWalletRequest;
use Gs2\Gold\Control\GetWalletResult;
use Gs2\Gold\Control\GetWalletByUserIdRequest;
use Gs2\Gold\Control\GetWalletByUserIdResult;
use Gs2\Gold\Control\SetLatestGainRequest;
use Gs2\Gold\Control\SetLatestGainResult;
use Gs2\Gold\Control\WithdrawFromWalletRequest;
use Gs2\Gold\Control\WithdrawFromWalletResult;
use Gs2\Gold\Control\WithdrawFromWalletByStampTaskRequest;
use Gs2\Gold\Control\WithdrawFromWalletByStampTaskResult;
use Gs2\Gold\Control\WithdrawFromWalletByUserIdRequest;
use Gs2\Gold\Control\WithdrawFromWalletByUserIdResult;

/**
 * GS2 Gold API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2GoldClient extends AbstractGs2Client {

	public static $ENDPOINT = "gold";

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
	 * 公開されているゴールドマスタを取得します<br>
	 * <br>
	 *
	 * @param GetCurrentGoldMasterRequest $request リクエストパラメータ
	 * @return GetCurrentGoldMasterResult 結果
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
	public function getCurrentGoldMaster(GetCurrentGoldMasterRequest $request): GetCurrentGoldMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            GetCurrentGoldMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetCurrentGoldMasterResult($result);
    }

	/**
	 * 公開するゴールドマスタを更新します<br>
	 * <br>
	 *
	 * @param UpdateCurrentGoldMasterRequest $request リクエストパラメータ
	 * @return UpdateCurrentGoldMasterResult 結果
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
	public function updateCurrentGoldMaster(UpdateCurrentGoldMasterRequest $request): UpdateCurrentGoldMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['settings'] = $request->getSettings();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            UpdateCurrentGoldMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateCurrentGoldMasterResult($result);
    }

	/**
	 * ゴールドマスターを新規作成します<br>
	 * <br>
	 *
	 * @param CreateGoldMasterRequest $request リクエストパラメータ
	 * @return CreateGoldMasterResult 結果
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
	public function createGoldMaster(CreateGoldMasterRequest $request): CreateGoldMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/master/gold";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getBalanceMax() !== null) $body['balanceMax'] = $request->getBalanceMax();
        if($request->getResetType() !== null) $body['resetType'] = $request->getResetType();
        if($request->getResetDayOfMonth() !== null) $body['resetDayOfMonth'] = $request->getResetDayOfMonth();
        if($request->getResetDayOfWeek() !== null) $body['resetDayOfWeek'] = $request->getResetDayOfWeek();
        if($request->getResetHour() !== null) $body['resetHour'] = $request->getResetHour();
        if($request->getLatestGainMax() !== null) $body['latestGainMax'] = $request->getLatestGainMax();
        if($request->getCreateWalletTriggerScript() !== null) $body['createWalletTriggerScript'] = $request->getCreateWalletTriggerScript();
        if($request->getCreateWalletDoneTriggerScript() !== null) $body['createWalletDoneTriggerScript'] = $request->getCreateWalletDoneTriggerScript();
        if($request->getDepositIntoWalletTriggerScript() !== null) $body['depositIntoWalletTriggerScript'] = $request->getDepositIntoWalletTriggerScript();
        if($request->getDepositIntoWalletDoneTriggerScript() !== null) $body['depositIntoWalletDoneTriggerScript'] = $request->getDepositIntoWalletDoneTriggerScript();
        if($request->getWithdrawFromWalletTriggerScript() !== null) $body['withdrawFromWalletTriggerScript'] = $request->getWithdrawFromWalletTriggerScript();
        if($request->getWithdrawFromWalletDoneTriggerScript() !== null) $body['withdrawFromWalletDoneTriggerScript'] = $request->getWithdrawFromWalletDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            CreateGoldMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateGoldMasterResult($result);
    }

	/**
	 * ゴールドマスターを削除します<br>
	 * <br>
	 *
	 * @param DeleteGoldMasterRequest $request リクエストパラメータ
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
	public function deleteGoldMaster(DeleteGoldMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/master/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            DeleteGoldMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ゴールドマスターの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeGoldMasterRequest $request リクエストパラメータ
	 * @return DescribeGoldMasterResult 結果
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
	public function describeGoldMaster(DescribeGoldMasterRequest $request): DescribeGoldMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/master/gold";

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
            Gs2Gold::MODULE,
            DescribeGoldMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeGoldMasterResult($result);
    }

	/**
	 * ゴールドマスターを取得します<br>
	 * <br>
	 *
	 * @param GetGoldMasterRequest $request リクエストパラメータ
	 * @return GetGoldMasterResult 結果
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
	public function getGoldMaster(GetGoldMasterRequest $request): GetGoldMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/master/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            GetGoldMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGoldMasterResult($result);
    }

	/**
	 * ゴールドマスターを更新します<br>
	 * <br>
	 *
	 * @param UpdateGoldMasterRequest $request リクエストパラメータ
	 * @return UpdateGoldMasterResult 結果
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
	public function updateGoldMaster(UpdateGoldMasterRequest $request): UpdateGoldMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/master/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getBalanceMax() !== null) $body['balanceMax'] = $request->getBalanceMax();
        if($request->getResetType() !== null) $body['resetType'] = $request->getResetType();
        if($request->getResetDayOfMonth() !== null) $body['resetDayOfMonth'] = $request->getResetDayOfMonth();
        if($request->getResetDayOfWeek() !== null) $body['resetDayOfWeek'] = $request->getResetDayOfWeek();
        if($request->getResetHour() !== null) $body['resetHour'] = $request->getResetHour();
        if($request->getLatestGainMax() !== null) $body['latestGainMax'] = $request->getLatestGainMax();
        if($request->getCreateWalletTriggerScript() !== null) $body['createWalletTriggerScript'] = $request->getCreateWalletTriggerScript();
        if($request->getCreateWalletDoneTriggerScript() !== null) $body['createWalletDoneTriggerScript'] = $request->getCreateWalletDoneTriggerScript();
        if($request->getDepositIntoWalletTriggerScript() !== null) $body['depositIntoWalletTriggerScript'] = $request->getDepositIntoWalletTriggerScript();
        if($request->getDepositIntoWalletDoneTriggerScript() !== null) $body['depositIntoWalletDoneTriggerScript'] = $request->getDepositIntoWalletDoneTriggerScript();
        if($request->getWithdrawFromWalletTriggerScript() !== null) $body['withdrawFromWalletTriggerScript'] = $request->getWithdrawFromWalletTriggerScript();
        if($request->getWithdrawFromWalletDoneTriggerScript() !== null) $body['withdrawFromWalletDoneTriggerScript'] = $request->getWithdrawFromWalletDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            UpdateGoldMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateGoldMasterResult($result);
    }

	/**
	 * ゴールドプールを新規作成します<br>
	 * <br>
	 *
	 * @param CreateGoldPoolRequest $request リクエストパラメータ
	 * @return CreateGoldPoolResult 結果
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
	public function createGoldPool(CreateGoldPoolRequest $request): CreateGoldPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getCreateWalletTriggerScript() !== null) $body['createWalletTriggerScript'] = $request->getCreateWalletTriggerScript();
        if($request->getCreateWalletDoneTriggerScript() !== null) $body['createWalletDoneTriggerScript'] = $request->getCreateWalletDoneTriggerScript();
        if($request->getDepositIntoWalletTriggerScript() !== null) $body['depositIntoWalletTriggerScript'] = $request->getDepositIntoWalletTriggerScript();
        if($request->getDepositIntoWalletDoneTriggerScript() !== null) $body['depositIntoWalletDoneTriggerScript'] = $request->getDepositIntoWalletDoneTriggerScript();
        if($request->getWithdrawFromWalletTriggerScript() !== null) $body['withdrawFromWalletTriggerScript'] = $request->getWithdrawFromWalletTriggerScript();
        if($request->getWithdrawFromWalletDoneTriggerScript() !== null) $body['withdrawFromWalletDoneTriggerScript'] = $request->getWithdrawFromWalletDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            CreateGoldPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateGoldPoolResult($result);
    }

	/**
	 * ゴールドプールを削除します<br>
	 * <br>
	 *
	 * @param DeleteGoldPoolRequest $request リクエストパラメータ
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
	public function deleteGoldPool(DeleteGoldPoolRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            DeleteGoldPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ゴールドプールの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeGoldPoolRequest $request リクエストパラメータ
	 * @return DescribeGoldPoolResult 結果
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
	public function describeGoldPool(DescribeGoldPoolRequest $request): DescribeGoldPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool";

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
            Gs2Gold::MODULE,
            DescribeGoldPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeGoldPoolResult($result);
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
	    $url = self::ENDPOINT_HOST. "/goldPool/serviceClass";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            DescribeServiceClassRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeServiceClassResult($result);
    }

	/**
	 * ゴールドプールを取得します<br>
	 * <br>
	 *
	 * @param GetGoldPoolRequest $request リクエストパラメータ
	 * @return GetGoldPoolResult 結果
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
	public function getGoldPool(GetGoldPoolRequest $request): GetGoldPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            GetGoldPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGoldPoolResult($result);
    }

	/**
	 * ゴールドプールの状態を取得します<br>
	 * <br>
	 *
	 * @param GetGoldPoolStatusRequest $request リクエストパラメータ
	 * @return GetGoldPoolStatusResult 結果
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
	public function getGoldPoolStatus(GetGoldPoolStatusRequest $request): GetGoldPoolStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            GetGoldPoolStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGoldPoolStatusResult($result);
    }

	/**
	 * ゴールドプールを更新します<br>
	 * <br>
	 *
	 * @param UpdateGoldPoolRequest $request リクエストパラメータ
	 * @return UpdateGoldPoolResult 結果
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
	public function updateGoldPool(UpdateGoldPoolRequest $request): UpdateGoldPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getCreateWalletTriggerScript() !== null) $body['createWalletTriggerScript'] = $request->getCreateWalletTriggerScript();
        if($request->getCreateWalletDoneTriggerScript() !== null) $body['createWalletDoneTriggerScript'] = $request->getCreateWalletDoneTriggerScript();
        if($request->getDepositIntoWalletTriggerScript() !== null) $body['depositIntoWalletTriggerScript'] = $request->getDepositIntoWalletTriggerScript();
        if($request->getDepositIntoWalletDoneTriggerScript() !== null) $body['depositIntoWalletDoneTriggerScript'] = $request->getDepositIntoWalletDoneTriggerScript();
        if($request->getWithdrawFromWalletTriggerScript() !== null) $body['withdrawFromWalletTriggerScript'] = $request->getWithdrawFromWalletTriggerScript();
        if($request->getWithdrawFromWalletDoneTriggerScript() !== null) $body['withdrawFromWalletDoneTriggerScript'] = $request->getWithdrawFromWalletDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            UpdateGoldPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateGoldPoolResult($result);
    }

	/**
	 * ゴールドマスターデータをエクスポートする<br>
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
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            ExportMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new ExportMasterResult($result);
    }

	/**
	 * ウォレットの設定を取得します<br>
	 * <br>
	 * - 消費クオータ: 2<br>
	 * <br>
	 *
	 * @param GetWalletSettingsRequest $request リクエストパラメータ
	 * @return GetWalletSettingsResult 結果
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
	public function getWalletSettings(GetWalletSettingsRequest $request): GetWalletSettingsResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "/wallet/settings";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            GetWalletSettingsRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetWalletSettingsResult($result);
    }

	/**
	 * ウォレットを削除します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param DeleteWalletByUserIdRequest $request リクエストパラメータ
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
	public function deleteWalletByUserId(DeleteWalletByUserIdRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "/wallet/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            DeleteWalletByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ウォレットの残高を加算します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param DepositIntoWalletRequest $request リクエストパラメータ
	 * @return DepositIntoWalletResult 結果
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
	public function depositIntoWallet(DepositIntoWalletRequest $request): DepositIntoWalletResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "/wallet/user/self/action/deposit";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['value'] = $request->getValue();
        if($request->getContext() !== null) $body['context'] = $request->getContext();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            DepositIntoWalletRequest::FUNCTION,
            $body,
            $headers
        );
        return new DepositIntoWalletResult($result);
    }

	/**
	 * スタンプタスクを使用してウォレットの残高を加算します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param DepositIntoWalletByStampSheetRequest $request リクエストパラメータ
	 * @return DepositIntoWalletByStampSheetResult 結果
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
	public function depositIntoWalletByStampSheet(DepositIntoWalletByStampSheetRequest $request): DepositIntoWalletByStampSheetResult
	{
	    $url = self::ENDPOINT_HOST. "/wallet/action/deposit";

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
            Gs2Gold::MODULE,
            DepositIntoWalletByStampSheetRequest::FUNCTION,
            $body,
            $headers
        );
        return new DepositIntoWalletByStampSheetResult($result);
    }

	/**
	 * ウォレットの残高を加算します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param DepositIntoWalletByUserIdRequest $request リクエストパラメータ
	 * @return DepositIntoWalletByUserIdResult 結果
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
	public function depositIntoWalletByUserId(DepositIntoWalletByUserIdRequest $request): DepositIntoWalletByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "/wallet/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/action/deposit";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['value'] = $request->getValue();
        if($request->getContext() !== null) $body['context'] = $request->getContext();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            DepositIntoWalletByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new DepositIntoWalletByUserIdResult($result);
    }

	/**
	 * ウォレットの一覧を取得します<br>
	 * <br>
	 * - 消費クオータ: 30件あたり10<br>
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
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold";

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
            Gs2Gold::MODULE,
            DescribeWalletRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeWalletResult($result);
    }

	/**
	 * ウォレットの一覧を取得します<br>
	 * <br>
	 * - 消費クオータ: 30件あたり10<br>
	 * <br>
	 *
	 * @param DescribeWalletByUserIdRequest $request リクエストパラメータ
	 * @return DescribeWalletByUserIdResult 結果
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
	public function describeWalletByUserId(DescribeWalletByUserIdRequest $request): DescribeWalletByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

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
            Gs2Gold::MODULE,
            DescribeWalletByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeWalletByUserIdResult($result);
    }

	/**
	 * ウォレットを取得します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
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
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "/wallet/user/self";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            GetWalletRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetWalletResult($result);
    }

	/**
	 * ウォレットを取得します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
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
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "/wallet/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            GetWalletByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetWalletByUserIdResult($result);
    }

	/**
	 * ウォレットの残高を加算します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param SetLatestGainRequest $request リクエストパラメータ
	 * @return SetLatestGainResult 結果
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
	public function setLatestGain(SetLatestGainRequest $request): SetLatestGainResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "/wallet/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/action/set";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['value'] = $request->getValue();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            SetLatestGainRequest::FUNCTION,
            $body,
            $headers
        );
        return new SetLatestGainResult($result);
    }

	/**
	 * ウォレットの残高を減算します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param WithdrawFromWalletRequest $request リクエストパラメータ
	 * @return WithdrawFromWalletResult 結果
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
	public function withdrawFromWallet(WithdrawFromWalletRequest $request): WithdrawFromWalletResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "/wallet/user/self/action/withdraw";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['value'] = $request->getValue();
        if($request->getContext() !== null) $body['context'] = $request->getContext();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            WithdrawFromWalletRequest::FUNCTION,
            $body,
            $headers
        );
        return new WithdrawFromWalletResult($result);
    }

	/**
	 * スタンプタスクを使用してウォレットの減算を加算します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param WithdrawFromWalletByStampTaskRequest $request リクエストパラメータ
	 * @return WithdrawFromWalletByStampTaskResult 結果
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
	public function withdrawFromWalletByStampTask(WithdrawFromWalletByStampTaskRequest $request): WithdrawFromWalletByStampTaskResult
	{
	    $url = self::ENDPOINT_HOST. "/wallet/action/withdraw";

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
            Gs2Gold::MODULE,
            WithdrawFromWalletByStampTaskRequest::FUNCTION,
            $body,
            $headers
        );
        return new WithdrawFromWalletByStampTaskResult($result);
    }

	/**
	 * ウォレットの残高を減算します<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param WithdrawFromWalletByUserIdRequest $request リクエストパラメータ
	 * @return WithdrawFromWalletByUserIdResult 結果
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
	public function withdrawFromWalletByUserId(WithdrawFromWalletByUserIdRequest $request): WithdrawFromWalletByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/goldPool/". ($request->getGoldPoolName() === null || $request->getGoldPoolName() === "" ? "null" : $request->getGoldPoolName()). "/gold/". ($request->getGoldName() === null || $request->getGoldName() === "" ? "null" : $request->getGoldName()). "/wallet/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/action/withdraw";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['value'] = $request->getValue();
        if($request->getContext() !== null) $body['context'] = $request->getContext();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gold::MODULE,
            WithdrawFromWalletByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new WithdrawFromWalletByUserIdResult($result);
    }
}