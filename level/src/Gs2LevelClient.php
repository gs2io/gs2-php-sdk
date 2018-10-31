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

namespace Gs2\Level;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Level\Control\GetCurrentLevelMasterRequest;
use Gs2\Level\Control\GetCurrentLevelMasterResult;
use Gs2\Level\Control\UpdateCurrentLevelMasterRequest;
use Gs2\Level\Control\UpdateCurrentLevelMasterResult;
use Gs2\Level\Control\CreateLevelTableMasterRequest;
use Gs2\Level\Control\CreateLevelTableMasterResult;
use Gs2\Level\Control\DeleteLevelTableMasterRequest;
use Gs2\Level\Control\DescribeLevelTableMasterRequest;
use Gs2\Level\Control\DescribeLevelTableMasterResult;
use Gs2\Level\Control\GetLevelTableMasterRequest;
use Gs2\Level\Control\GetLevelTableMasterResult;
use Gs2\Level\Control\CreateLevelThresholdMasterRequest;
use Gs2\Level\Control\CreateLevelThresholdMasterResult;
use Gs2\Level\Control\DeleteLevelThresholdMasterRequest;
use Gs2\Level\Control\DescribeLevelThresholdMasterRequest;
use Gs2\Level\Control\DescribeLevelThresholdMasterResult;
use Gs2\Level\Control\GetLevelThresholdMasterRequest;
use Gs2\Level\Control\GetLevelThresholdMasterResult;
use Gs2\Level\Control\ExportMasterRequest;
use Gs2\Level\Control\ExportMasterResult;
use Gs2\Level\Control\CreateResourcePoolRequest;
use Gs2\Level\Control\CreateResourcePoolResult;
use Gs2\Level\Control\DeleteResourcePoolRequest;
use Gs2\Level\Control\DescribeResourcePoolRequest;
use Gs2\Level\Control\DescribeResourcePoolResult;
use Gs2\Level\Control\GetResourcePoolRequest;
use Gs2\Level\Control\GetResourcePoolResult;
use Gs2\Level\Control\GetResourcePoolStatusRequest;
use Gs2\Level\Control\GetResourcePoolStatusResult;
use Gs2\Level\Control\UpdateResourcePoolRequest;
use Gs2\Level\Control\UpdateResourcePoolResult;
use Gs2\Level\Control\CreateResourceTypeMasterRequest;
use Gs2\Level\Control\CreateResourceTypeMasterResult;
use Gs2\Level\Control\DeleteResourceTypeMasterRequest;
use Gs2\Level\Control\DescribeResourceTypeMasterRequest;
use Gs2\Level\Control\DescribeResourceTypeMasterResult;
use Gs2\Level\Control\GetResourceTypeMasterRequest;
use Gs2\Level\Control\GetResourceTypeMasterResult;
use Gs2\Level\Control\UpdateResourceTypeMasterRequest;
use Gs2\Level\Control\UpdateResourceTypeMasterResult;
use Gs2\Level\Control\ChangeLevelCapByStampSheetRequest;
use Gs2\Level\Control\ChangeLevelCapByStampSheetResult;
use Gs2\Level\Control\ChangeLevelCapByUserIdRequest;
use Gs2\Level\Control\ChangeLevelCapByUserIdResult;
use Gs2\Level\Control\ChangeLevelCapByUserIdAndResourceTypeRequest;
use Gs2\Level\Control\ChangeLevelCapByUserIdAndResourceTypeResult;
use Gs2\Level\Control\DescribeStatusRequest;
use Gs2\Level\Control\DescribeStatusResult;
use Gs2\Level\Control\DescribeStatusByUserIdRequest;
use Gs2\Level\Control\DescribeStatusByUserIdResult;
use Gs2\Level\Control\GetStatusRequest;
use Gs2\Level\Control\GetStatusResult;
use Gs2\Level\Control\GetStatusByResourceTypeRequest;
use Gs2\Level\Control\GetStatusByResourceTypeResult;
use Gs2\Level\Control\GetStatusByUserIdRequest;
use Gs2\Level\Control\GetStatusByUserIdResult;
use Gs2\Level\Control\GetStatusByUserIdAndResourceTypeRequest;
use Gs2\Level\Control\GetStatusByUserIdAndResourceTypeResult;
use Gs2\Level\Control\IncreaseExperienceByStampSheetRequest;
use Gs2\Level\Control\IncreaseExperienceByStampSheetResult;
use Gs2\Level\Control\IncreaseExperienceByUserIdRequest;
use Gs2\Level\Control\IncreaseExperienceByUserIdResult;
use Gs2\Level\Control\IncreaseExperienceByUserIdAndResourceTypeRequest;
use Gs2\Level\Control\IncreaseExperienceByUserIdAndResourceTypeResult;
use Gs2\Level\Control\SetExperienceByUserIdRequest;
use Gs2\Level\Control\SetExperienceByUserIdResult;
use Gs2\Level\Control\SetExperienceByUserIdAndResourceTypeRequest;
use Gs2\Level\Control\SetExperienceByUserIdAndResourceTypeResult;

/**
 * GS2 Level API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2LevelClient extends AbstractGs2Client {

	public static $ENDPOINT = "level";

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
	 * レベルマスタを取得します<br>
	 * <br>
	 *
	 * @param GetCurrentLevelMasterRequest $request リクエストパラメータ
	 * @return GetCurrentLevelMasterResult 結果
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
	public function getCurrentLevelMaster(GetCurrentLevelMasterRequest $request): GetCurrentLevelMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/status/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetCurrentLevelMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetCurrentLevelMasterResult($result);
    }

	/**
	 * レベルマスタを更新します<br>
	 * <br>
	 *
	 * @param UpdateCurrentLevelMasterRequest $request リクエストパラメータ
	 * @return UpdateCurrentLevelMasterResult 結果
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
	public function updateCurrentLevelMaster(UpdateCurrentLevelMasterRequest $request): UpdateCurrentLevelMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/status/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['settings'] = $request->getSettings();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            UpdateCurrentLevelMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateCurrentLevelMasterResult($result);
    }

	/**
	 * レベルテーブルを新規作成します<br>
	 * <br>
	 *
	 * @param CreateLevelTableMasterRequest $request リクエストパラメータ
	 * @return CreateLevelTableMasterResult 結果
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
	public function createLevelTableMaster(CreateLevelTableMasterRequest $request): CreateLevelTableMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/levelTable";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            CreateLevelTableMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateLevelTableMasterResult($result);
    }

	/**
	 * レベルテーブルを削除します<br>
	 * <br>
	 *
	 * @param DeleteLevelTableMasterRequest $request リクエストパラメータ
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
	public function deleteLevelTableMaster(DeleteLevelTableMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/levelTable/". ($request->getLevelTableName() === null || $request->getLevelTableName() === "" ? "null" : $request->getLevelTableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            DeleteLevelTableMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * レベルテーブルの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeLevelTableMasterRequest $request リクエストパラメータ
	 * @return DescribeLevelTableMasterResult 結果
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
	public function describeLevelTableMaster(DescribeLevelTableMasterRequest $request): DescribeLevelTableMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/levelTable";

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
            Gs2Level::MODULE,
            DescribeLevelTableMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeLevelTableMasterResult($result);
    }

	/**
	 * レベルテーブルを取得します<br>
	 * <br>
	 *
	 * @param GetLevelTableMasterRequest $request リクエストパラメータ
	 * @return GetLevelTableMasterResult 結果
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
	public function getLevelTableMaster(GetLevelTableMasterRequest $request): GetLevelTableMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/levelTable/". ($request->getLevelTableName() === null || $request->getLevelTableName() === "" ? "null" : $request->getLevelTableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetLevelTableMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetLevelTableMasterResult($result);
    }

	/**
	 * レベルアップ経験値閾値を新規作成します<br>
	 * <br>
	 *
	 * @param CreateLevelThresholdMasterRequest $request リクエストパラメータ
	 * @return CreateLevelThresholdMasterResult 結果
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
	public function createLevelThresholdMaster(CreateLevelThresholdMasterRequest $request): CreateLevelThresholdMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/levelTable/". ($request->getLevelTableName() === null || $request->getLevelTableName() === "" ? "null" : $request->getLevelTableName()). "/threshold";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['threshold'] = $request->getThreshold();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            CreateLevelThresholdMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateLevelThresholdMasterResult($result);
    }

	/**
	 * レベルアップ経験値閾値を削除します<br>
	 * <br>
	 *
	 * @param DeleteLevelThresholdMasterRequest $request リクエストパラメータ
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
	public function deleteLevelThresholdMaster(DeleteLevelThresholdMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/levelTable/". ($request->getLevelTableName() === null || $request->getLevelTableName() === "" ? "null" : $request->getLevelTableName()). "/threshold/". ($request->getThreshold() === null || $request->getThreshold() === "" ? "null" : $request->getThreshold()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            DeleteLevelThresholdMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * レベルアップ経験値閾値の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeLevelThresholdMasterRequest $request リクエストパラメータ
	 * @return DescribeLevelThresholdMasterResult 結果
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
	public function describeLevelThresholdMaster(DescribeLevelThresholdMasterRequest $request): DescribeLevelThresholdMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/levelTable/". ($request->getLevelTableName() === null || $request->getLevelTableName() === "" ? "null" : $request->getLevelTableName()). "/threshold";

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
            Gs2Level::MODULE,
            DescribeLevelThresholdMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeLevelThresholdMasterResult($result);
    }

	/**
	 * レベルアップ経験値閾値を取得します<br>
	 * <br>
	 *
	 * @param GetLevelThresholdMasterRequest $request リクエストパラメータ
	 * @return GetLevelThresholdMasterResult 結果
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
	public function getLevelThresholdMaster(GetLevelThresholdMasterRequest $request): GetLevelThresholdMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/levelTable/". ($request->getLevelTableName() === null || $request->getLevelTableName() === "" ? "null" : $request->getLevelTableName()). "/threshold/". ($request->getThreshold() === null || $request->getThreshold() === "" ? "null" : $request->getThreshold()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetLevelThresholdMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetLevelThresholdMasterResult($result);
    }

	/**
	 * レベルマスターデータをエクスポートする<br>
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
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            ExportMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new ExportMasterResult($result);
    }

	/**
	 * リソースプールを新規作成します<br>
	 * <br>
	 *
	 * @param CreateResourcePoolRequest $request リクエストパラメータ
	 * @return CreateResourcePoolResult 結果
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
	public function createResourcePool(CreateResourcePoolRequest $request): CreateResourcePoolResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getLevelCapScript() !== null) $body['levelCapScript'] = $request->getLevelCapScript();
        if($request->getChangeExperienceTriggerScript() !== null) $body['changeExperienceTriggerScript'] = $request->getChangeExperienceTriggerScript();
        if($request->getChangeExperienceDoneTriggerScript() !== null) $body['changeExperienceDoneTriggerScript'] = $request->getChangeExperienceDoneTriggerScript();
        if($request->getChangeLevelTriggerScript() !== null) $body['changeLevelTriggerScript'] = $request->getChangeLevelTriggerScript();
        if($request->getChangeLevelDoneTriggerScript() !== null) $body['changeLevelDoneTriggerScript'] = $request->getChangeLevelDoneTriggerScript();
        if($request->getChangeLevelCapTriggerScript() !== null) $body['changeLevelCapTriggerScript'] = $request->getChangeLevelCapTriggerScript();
        if($request->getChangeLevelCapDoneTriggerScript() !== null) $body['changeLevelCapDoneTriggerScript'] = $request->getChangeLevelCapDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            CreateResourcePoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateResourcePoolResult($result);
    }

	/**
	 * リソースプールを削除します<br>
	 * <br>
	 *
	 * @param DeleteResourcePoolRequest $request リクエストパラメータ
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
	public function deleteResourcePool(DeleteResourcePoolRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            DeleteResourcePoolRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * リソースプールの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeResourcePoolRequest $request リクエストパラメータ
	 * @return DescribeResourcePoolResult 結果
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
	public function describeResourcePool(DescribeResourcePoolRequest $request): DescribeResourcePoolResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool";

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
            Gs2Level::MODULE,
            DescribeResourcePoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeResourcePoolResult($result);
    }

	/**
	 * リソースプールを取得します<br>
	 * <br>
	 *
	 * @param GetResourcePoolRequest $request リクエストパラメータ
	 * @return GetResourcePoolResult 結果
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
	public function getResourcePool(GetResourcePoolRequest $request): GetResourcePoolResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetResourcePoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetResourcePoolResult($result);
    }

	/**
	 * リソースプールの状態を取得します<br>
	 * <br>
	 *
	 * @param GetResourcePoolStatusRequest $request リクエストパラメータ
	 * @return GetResourcePoolStatusResult 結果
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
	public function getResourcePoolStatus(GetResourcePoolStatusRequest $request): GetResourcePoolStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetResourcePoolStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetResourcePoolStatusResult($result);
    }

	/**
	 * リソースプールを更新します<br>
	 * <br>
	 *
	 * @param UpdateResourcePoolRequest $request リクエストパラメータ
	 * @return UpdateResourcePoolResult 結果
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
	public function updateResourcePool(UpdateResourcePoolRequest $request): UpdateResourcePoolResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getLevelCapScript() !== null) $body['levelCapScript'] = $request->getLevelCapScript();
        if($request->getChangeExperienceTriggerScript() !== null) $body['changeExperienceTriggerScript'] = $request->getChangeExperienceTriggerScript();
        if($request->getChangeExperienceDoneTriggerScript() !== null) $body['changeExperienceDoneTriggerScript'] = $request->getChangeExperienceDoneTriggerScript();
        if($request->getChangeLevelTriggerScript() !== null) $body['changeLevelTriggerScript'] = $request->getChangeLevelTriggerScript();
        if($request->getChangeLevelDoneTriggerScript() !== null) $body['changeLevelDoneTriggerScript'] = $request->getChangeLevelDoneTriggerScript();
        if($request->getChangeLevelCapTriggerScript() !== null) $body['changeLevelCapTriggerScript'] = $request->getChangeLevelCapTriggerScript();
        if($request->getChangeLevelCapDoneTriggerScript() !== null) $body['changeLevelCapDoneTriggerScript'] = $request->getChangeLevelCapDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            UpdateResourcePoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateResourcePoolResult($result);
    }

	/**
	 * リソースタイプを新規作成します<br>
	 * <br>
	 *
	 * @param CreateResourceTypeMasterRequest $request リクエストパラメータ
	 * @return CreateResourceTypeMasterResult 結果
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
	public function createResourceTypeMaster(CreateResourceTypeMasterRequest $request): CreateResourceTypeMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/resourceType";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['levelTableName'] = $request->getLevelTableName();
        $body['defaultLevelCap'] = $request->getDefaultLevelCap();
        $body['maxLevelCap'] = $request->getMaxLevelCap();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getDefaultExperience() !== null) $body['defaultExperience'] = $request->getDefaultExperience();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            CreateResourceTypeMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateResourceTypeMasterResult($result);
    }

	/**
	 * リソースタイプを削除します<br>
	 * <br>
	 *
	 * @param DeleteResourceTypeMasterRequest $request リクエストパラメータ
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
	public function deleteResourceTypeMaster(DeleteResourceTypeMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/resourceType/". ($request->getResourceTypeName() === null || $request->getResourceTypeName() === "" ? "null" : $request->getResourceTypeName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            DeleteResourceTypeMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * リソースタイプの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeResourceTypeMasterRequest $request リクエストパラメータ
	 * @return DescribeResourceTypeMasterResult 結果
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
	public function describeResourceTypeMaster(DescribeResourceTypeMasterRequest $request): DescribeResourceTypeMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/resourceType";

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
            Gs2Level::MODULE,
            DescribeResourceTypeMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeResourceTypeMasterResult($result);
    }

	/**
	 * リソースタイプを取得します<br>
	 * <br>
	 *
	 * @param GetResourceTypeMasterRequest $request リクエストパラメータ
	 * @return GetResourceTypeMasterResult 結果
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
	public function getResourceTypeMaster(GetResourceTypeMasterRequest $request): GetResourceTypeMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/resourceType/". ($request->getResourceTypeName() === null || $request->getResourceTypeName() === "" ? "null" : $request->getResourceTypeName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetResourceTypeMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetResourceTypeMasterResult($result);
    }

	/**
	 * リソースタイプを更新します<br>
	 * <br>
	 *
	 * @param UpdateResourceTypeMasterRequest $request リクエストパラメータ
	 * @return UpdateResourceTypeMasterResult 結果
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
	public function updateResourceTypeMaster(UpdateResourceTypeMasterRequest $request): UpdateResourceTypeMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/master/resourceType/". ($request->getResourceTypeName() === null || $request->getResourceTypeName() === "" ? "null" : $request->getResourceTypeName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['levelTableName'] = $request->getLevelTableName();
        $body['defaultLevelCap'] = $request->getDefaultLevelCap();
        $body['maxLevelCap'] = $request->getMaxLevelCap();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getDefaultExperience() !== null) $body['defaultExperience'] = $request->getDefaultExperience();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            UpdateResourceTypeMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateResourceTypeMasterResult($result);
    }

	/**
	 * スタンプシートを使用してレベルキャップを変更します。<br>
	 * <br>
	 *
	 * @param ChangeLevelCapByStampSheetRequest $request リクエストパラメータ
	 * @return ChangeLevelCapByStampSheetResult 結果
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
	public function changeLevelCapByStampSheet(ChangeLevelCapByStampSheetRequest $request): ChangeLevelCapByStampSheetResult
	{
	    $url = self::ENDPOINT_HOST. "/status/levelCap";

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
            Gs2Level::MODULE,
            ChangeLevelCapByStampSheetRequest::FUNCTION,
            $body,
            $headers
        );
        return new ChangeLevelCapByStampSheetResult($result);
    }

	/**
	 * レベルキャップを変更します<br>
	 * <br>
	 * 消費クォーター: 5<br>
	 * <br>
	 *
	 * @param ChangeLevelCapByUserIdRequest $request リクエストパラメータ
	 * @return ChangeLevelCapByUserIdResult 結果
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
	public function changeLevelCapByUserId(ChangeLevelCapByUserIdRequest $request): ChangeLevelCapByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/status/". ($request->getStatusId() === null || $request->getStatusId() === "" ? "null" : $request->getStatusId()). "/levelCap";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['levelCap'] = $request->getLevelCap();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            ChangeLevelCapByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new ChangeLevelCapByUserIdResult($result);
    }

	/**
	 * レベルキャップを変更します<br>
	 * <br>
	 * 消費クォーター: 5<br>
	 * <br>
	 *
	 * @param ChangeLevelCapByUserIdAndResourceTypeRequest $request リクエストパラメータ
	 * @return ChangeLevelCapByUserIdAndResourceTypeResult 結果
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
	public function changeLevelCapByUserIdAndResourceType(ChangeLevelCapByUserIdAndResourceTypeRequest $request): ChangeLevelCapByUserIdAndResourceTypeResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/status/resourceType/". ($request->getResourceTypeName() === null || $request->getResourceTypeName() === "" ? "null" : $request->getResourceTypeName()). "/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "/levelCap";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['levelCap'] = $request->getLevelCap();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            ChangeLevelCapByUserIdAndResourceTypeRequest::FUNCTION,
            $body,
            $headers
        );
        return new ChangeLevelCapByUserIdAndResourceTypeResult($result);
    }

	/**
	 * ステータス一覧を取得します<br>
	 * <br>
	 * 本APIは statusIds に取得するリソースIDのリストを指定出来ます。<br>
	 * リソースIDリストを指定しない場合は全てのリソースのステータスを応答しますが、IDを指定する場合と比較して2倍のクォーターを消費します。<br>
	 * ステータスを取得する段階でリソースIDが明らかな場合はリソースIDのリストを指定することをお勧めします。<br>
	 * <br>
	 * 消費クォーター: 取得件数 × 3(リソースIDを省略した場合は2倍)<br>
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
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/my/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        if($request->getStatusIds() !== null) $queryString['statusIds'] = $request->getStatusIds();
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            DescribeStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeStatusResult($result);
    }

	/**
	 * ステータスを一覧を取得します<br>
	 * <br>
	 * 本APIは statusIds に取得するリソースIDのリストを指定出来ます。<br>
	 * リソースIDリストを指定しない場合は全てのリソースのステータスを応答しますが、IDを指定する場合と比較して2倍のクォーターを消費します。<br>
	 * ステータスを取得する段階でリソースIDが明らかな場合はリソースIDのリストを指定することをお勧めします。<br>
	 * <br>
	 * 消費クォーター: 取得件数 × 3(リソースIDを省略した場合は2倍)<br>
	 * <br>
	 *
	 * @param DescribeStatusByUserIdRequest $request リクエストパラメータ
	 * @return DescribeStatusByUserIdResult 結果
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
	public function describeStatusByUserId(DescribeStatusByUserIdRequest $request): DescribeStatusByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getStatusIds() !== null) $queryString['statusIds'] = $request->getStatusIds();
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            DescribeStatusByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeStatusByUserIdResult($result);
    }

	/**
	 * ステータスを取得します<br>
	 * <br>
	 * 消費クォーター: 3<br>
	 * <br>
	 *
	 * @param GetStatusRequest $request リクエストパラメータ
	 * @return GetStatusResult 結果
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
	public function getStatus(GetStatusRequest $request): GetStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/my/status/". ($request->getStatusId() === null || $request->getStatusId() === "" ? "null" : $request->getStatusId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetStatusResult($result);
    }

	/**
	 * ステータスを取得します<br>
	 * <br>
	 * 消費クォーター: 3<br>
	 * <br>
	 *
	 * @param GetStatusByResourceTypeRequest $request リクエストパラメータ
	 * @return GetStatusByResourceTypeResult 結果
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
	public function getStatusByResourceType(GetStatusByResourceTypeRequest $request): GetStatusByResourceTypeResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/my/status/resourceType/". ($request->getResourceTypeName() === null || $request->getResourceTypeName() === "" ? "null" : $request->getResourceTypeName()). "/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetStatusByResourceTypeRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetStatusByResourceTypeResult($result);
    }

	/**
	 * ステータスを取得します<br>
	 * <br>
	 * 消費クォーター: 3<br>
	 * <br>
	 *
	 * @param GetStatusByUserIdRequest $request リクエストパラメータ
	 * @return GetStatusByUserIdResult 結果
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
	public function getStatusByUserId(GetStatusByUserIdRequest $request): GetStatusByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/status/". ($request->getStatusId() === null || $request->getStatusId() === "" ? "null" : $request->getStatusId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetStatusByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetStatusByUserIdResult($result);
    }

	/**
	 * ステータスを取得します<br>
	 * <br>
	 * 消費クォーター: 3<br>
	 * <br>
	 *
	 * @param GetStatusByUserIdAndResourceTypeRequest $request リクエストパラメータ
	 * @return GetStatusByUserIdAndResourceTypeResult 結果
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
	public function getStatusByUserIdAndResourceType(GetStatusByUserIdAndResourceTypeRequest $request): GetStatusByUserIdAndResourceTypeResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/status/resourceType/". ($request->getResourceTypeName() === null || $request->getResourceTypeName() === "" ? "null" : $request->getResourceTypeName()). "/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            GetStatusByUserIdAndResourceTypeRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetStatusByUserIdAndResourceTypeResult($result);
    }

	/**
	 * スタンプシートを使用して経験値を加算します。<br>
	 * <br>
	 *
	 * @param IncreaseExperienceByStampSheetRequest $request リクエストパラメータ
	 * @return IncreaseExperienceByStampSheetResult 結果
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
	public function increaseExperienceByStampSheet(IncreaseExperienceByStampSheetRequest $request): IncreaseExperienceByStampSheetResult
	{
	    $url = self::ENDPOINT_HOST. "/status";

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
            Gs2Level::MODULE,
            IncreaseExperienceByStampSheetRequest::FUNCTION,
            $body,
            $headers
        );
        return new IncreaseExperienceByStampSheetResult($result);
    }

	/**
	 * 経験値を加算します<br>
	 * <br>
	 * 消費クォーター: 5<br>
	 * <br>
	 *
	 * @param IncreaseExperienceByUserIdRequest $request リクエストパラメータ
	 * @return IncreaseExperienceByUserIdResult 結果
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
	public function increaseExperienceByUserId(IncreaseExperienceByUserIdRequest $request): IncreaseExperienceByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/status/". ($request->getStatusId() === null || $request->getStatusId() === "" ? "null" : $request->getStatusId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['value'] = $request->getValue();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            IncreaseExperienceByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new IncreaseExperienceByUserIdResult($result);
    }

	/**
	 * 経験値を加算します<br>
	 * <br>
	 * 消費クォーター: 5<br>
	 * <br>
	 *
	 * @param IncreaseExperienceByUserIdAndResourceTypeRequest $request リクエストパラメータ
	 * @return IncreaseExperienceByUserIdAndResourceTypeResult 結果
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
	public function increaseExperienceByUserIdAndResourceType(IncreaseExperienceByUserIdAndResourceTypeRequest $request): IncreaseExperienceByUserIdAndResourceTypeResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/status/resourceType/". ($request->getResourceTypeName() === null || $request->getResourceTypeName() === "" ? "null" : $request->getResourceTypeName()). "/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['value'] = $request->getValue();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            IncreaseExperienceByUserIdAndResourceTypeRequest::FUNCTION,
            $body,
            $headers
        );
        return new IncreaseExperienceByUserIdAndResourceTypeResult($result);
    }

	/**
	 * 経験値を設定します<br>
	 * <br>
	 * 消費クォーター: 5<br>
	 * <br>
	 *
	 * @param SetExperienceByUserIdRequest $request リクエストパラメータ
	 * @return SetExperienceByUserIdResult 結果
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
	public function setExperienceByUserId(SetExperienceByUserIdRequest $request): SetExperienceByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/status/". ($request->getStatusId() === null || $request->getStatusId() === "" ? "null" : $request->getStatusId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['experience'] = $request->getExperience();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            SetExperienceByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new SetExperienceByUserIdResult($result);
    }

	/**
	 * 経験値を設定します<br>
	 * <br>
	 * 消費クォーター: 5<br>
	 * <br>
	 *
	 * @param SetExperienceByUserIdAndResourceTypeRequest $request リクエストパラメータ
	 * @return SetExperienceByUserIdAndResourceTypeResult 結果
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
	public function setExperienceByUserIdAndResourceType(SetExperienceByUserIdAndResourceTypeRequest $request): SetExperienceByUserIdAndResourceTypeResult
	{
	    $url = self::ENDPOINT_HOST. "/resourcePool/". ($request->getResourcePoolName() === null || $request->getResourcePoolName() === "" ? "null" : $request->getResourcePoolName()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/status/resourceType/". ($request->getResourceTypeName() === null || $request->getResourceTypeName() === "" ? "null" : $request->getResourceTypeName()). "/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['experience'] = $request->getExperience();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Level::MODULE,
            SetExperienceByUserIdAndResourceTypeRequest::FUNCTION,
            $body,
            $headers
        );
        return new SetExperienceByUserIdAndResourceTypeResult($result);
    }
}