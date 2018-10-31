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

namespace Gs2\Gacha;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Gacha\Control\GetCurrentGachaMasterRequest;
use Gs2\Gacha\Control\GetCurrentGachaMasterResult;
use Gs2\Gacha\Control\UpdateCurrentGachaMasterRequest;
use Gs2\Gacha\Control\UpdateCurrentGachaMasterResult;
use Gs2\Gacha\Control\CreateGachaMasterRequest;
use Gs2\Gacha\Control\CreateGachaMasterResult;
use Gs2\Gacha\Control\DeleteGachaMasterRequest;
use Gs2\Gacha\Control\DescribeGachaMasterRequest;
use Gs2\Gacha\Control\DescribeGachaMasterResult;
use Gs2\Gacha\Control\GetGachaMasterRequest;
use Gs2\Gacha\Control\GetGachaMasterResult;
use Gs2\Gacha\Control\UpdateGachaMasterRequest;
use Gs2\Gacha\Control\UpdateGachaMasterResult;
use Gs2\Gacha\Control\CreateGachaPoolRequest;
use Gs2\Gacha\Control\CreateGachaPoolResult;
use Gs2\Gacha\Control\DeleteGachaPoolRequest;
use Gs2\Gacha\Control\DescribeGachaPoolRequest;
use Gs2\Gacha\Control\DescribeGachaPoolResult;
use Gs2\Gacha\Control\GetGachaPoolRequest;
use Gs2\Gacha\Control\GetGachaPoolResult;
use Gs2\Gacha\Control\GetGachaPoolStatusRequest;
use Gs2\Gacha\Control\GetGachaPoolStatusResult;
use Gs2\Gacha\Control\UpdateGachaPoolRequest;
use Gs2\Gacha\Control\UpdateGachaPoolResult;
use Gs2\Gacha\Control\DescribeGachaRequest;
use Gs2\Gacha\Control\DescribeGachaResult;
use Gs2\Gacha\Control\DetailProbabilityRequest;
use Gs2\Gacha\Control\DetailProbabilityResult;
use Gs2\Gacha\Control\DoGachaRequest;
use Gs2\Gacha\Control\DoGachaResult;
use Gs2\Gacha\Control\DoGachaByStampSheetRequest;
use Gs2\Gacha\Control\DoGachaByStampSheetResult;
use Gs2\Gacha\Control\GetGachaRequest;
use Gs2\Gacha\Control\GetGachaResult;
use Gs2\Gacha\Control\GetProbabilityRequest;
use Gs2\Gacha\Control\GetProbabilityResult;
use Gs2\Gacha\Control\ExportMasterRequest;
use Gs2\Gacha\Control\ExportMasterResult;
use Gs2\Gacha\Control\CreatePrizeMasterRequest;
use Gs2\Gacha\Control\CreatePrizeMasterResult;
use Gs2\Gacha\Control\DeletePrizeMasterRequest;
use Gs2\Gacha\Control\DescribePrizeMasterRequest;
use Gs2\Gacha\Control\DescribePrizeMasterResult;
use Gs2\Gacha\Control\GetPrizeMasterRequest;
use Gs2\Gacha\Control\GetPrizeMasterResult;
use Gs2\Gacha\Control\UpdatePrizeMasterRequest;
use Gs2\Gacha\Control\UpdatePrizeMasterResult;
use Gs2\Gacha\Control\CreatePrizeTableMasterRequest;
use Gs2\Gacha\Control\CreatePrizeTableMasterResult;
use Gs2\Gacha\Control\DeletePrizeTableMasterRequest;
use Gs2\Gacha\Control\DescribePrizeTableMasterRequest;
use Gs2\Gacha\Control\DescribePrizeTableMasterResult;
use Gs2\Gacha\Control\GetPrizeTableMasterRequest;
use Gs2\Gacha\Control\GetPrizeTableMasterResult;
use Gs2\Gacha\Control\CreateRarityMasterRequest;
use Gs2\Gacha\Control\CreateRarityMasterResult;
use Gs2\Gacha\Control\DeleteRarityMasterRequest;
use Gs2\Gacha\Control\DescribeRarityMasterRequest;
use Gs2\Gacha\Control\DescribeRarityMasterResult;
use Gs2\Gacha\Control\GetRarityMasterRequest;
use Gs2\Gacha\Control\GetRarityMasterResult;
use Gs2\Gacha\Control\UpdateRarityMasterRequest;
use Gs2\Gacha\Control\UpdateRarityMasterResult;

/**
 * GS2 Gacha API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2GachaClient extends AbstractGs2Client {

	public static $ENDPOINT = "gacha";

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
	 * 公開されているガチャマスタを取得します<br>
	 * <br>
	 *
	 * @param GetCurrentGachaMasterRequest $request リクエストパラメータ
	 * @return GetCurrentGachaMasterResult 結果
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
	public function getCurrentGachaMaster(GetCurrentGachaMasterRequest $request): GetCurrentGachaMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/gacha/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            GetCurrentGachaMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetCurrentGachaMasterResult($result);
    }

	/**
	 * 公開するガチャマスタを更新します<br>
	 * <br>
	 *
	 * @param UpdateCurrentGachaMasterRequest $request リクエストパラメータ
	 * @return UpdateCurrentGachaMasterResult 結果
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
	public function updateCurrentGachaMaster(UpdateCurrentGachaMasterRequest $request): UpdateCurrentGachaMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/gacha/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['settings'] = $request->getSettings();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            UpdateCurrentGachaMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateCurrentGachaMasterResult($result);
    }

	/**
	 * ガチャを新規作成します<br>
	 * <br>
	 *
	 * @param CreateGachaMasterRequest $request リクエストパラメータ
	 * @return CreateGachaMasterResult 結果
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
	public function createGachaMaster(CreateGachaMasterRequest $request): CreateGachaMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/gacha";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['prizeTableNames'] = $request->getPrizeTableNames();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getPrizeJobQueueName() !== null) $body['prizeJobQueueName'] = $request->getPrizeJobQueueName();
        if($request->getPrizeJobQueueScriptName() !== null) $body['prizeJobQueueScriptName'] = $request->getPrizeJobQueueScriptName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            CreateGachaMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateGachaMasterResult($result);
    }

	/**
	 * ガチャを削除します<br>
	 * <br>
	 *
	 * @param DeleteGachaMasterRequest $request リクエストパラメータ
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
	public function deleteGachaMaster(DeleteGachaMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/gacha/". ($request->getGachaName() === null || $request->getGachaName() === "" ? "null" : $request->getGachaName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            DeleteGachaMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ガチャの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeGachaMasterRequest $request リクエストパラメータ
	 * @return DescribeGachaMasterResult 結果
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
	public function describeGachaMaster(DescribeGachaMasterRequest $request): DescribeGachaMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/gacha";

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
            Gs2Gacha::MODULE,
            DescribeGachaMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeGachaMasterResult($result);
    }

	/**
	 * ガチャを取得します<br>
	 * <br>
	 *
	 * @param GetGachaMasterRequest $request リクエストパラメータ
	 * @return GetGachaMasterResult 結果
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
	public function getGachaMaster(GetGachaMasterRequest $request): GetGachaMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/gacha/". ($request->getGachaName() === null || $request->getGachaName() === "" ? "null" : $request->getGachaName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            GetGachaMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGachaMasterResult($result);
    }

	/**
	 * ガチャを更新します<br>
	 * <br>
	 *
	 * @param UpdateGachaMasterRequest $request リクエストパラメータ
	 * @return UpdateGachaMasterResult 結果
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
	public function updateGachaMaster(UpdateGachaMasterRequest $request): UpdateGachaMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/gacha/". ($request->getGachaName() === null || $request->getGachaName() === "" ? "null" : $request->getGachaName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['prizeTableNames'] = $request->getPrizeTableNames();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        if($request->getPrizeJobQueueName() !== null) $body['prizeJobQueueName'] = $request->getPrizeJobQueueName();
        if($request->getPrizeJobQueueScriptName() !== null) $body['prizeJobQueueScriptName'] = $request->getPrizeJobQueueScriptName();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            UpdateGachaMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateGachaMasterResult($result);
    }

	/**
	 * ガチャプールを新規作成します<br>
	 * <br>
	 *
	 * @param CreateGachaPoolRequest $request リクエストパラメータ
	 * @return CreateGachaPoolResult 結果
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
	public function createGachaPool(CreateGachaPoolRequest $request): CreateGachaPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getPublicDrawRate() !== null) $body['publicDrawRate'] = $request->getPublicDrawRate();
        if($request->getAllowAccessGachaInfo() !== null) $body['allowAccessGachaInfo'] = $request->getAllowAccessGachaInfo();
        if($request->getRestrict() !== null) $body['restrict'] = $request->getRestrict();
        if($request->getDrawPrizeTriggerScript() !== null) $body['drawPrizeTriggerScript'] = $request->getDrawPrizeTriggerScript();
        if($request->getDrawPrizeDoneTriggerScript() !== null) $body['drawPrizeDoneTriggerScript'] = $request->getDrawPrizeDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            CreateGachaPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateGachaPoolResult($result);
    }

	/**
	 * ガチャプールを削除します<br>
	 * <br>
	 *
	 * @param DeleteGachaPoolRequest $request リクエストパラメータ
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
	public function deleteGachaPool(DeleteGachaPoolRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            DeleteGachaPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ガチャプールの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeGachaPoolRequest $request リクエストパラメータ
	 * @return DescribeGachaPoolResult 結果
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
	public function describeGachaPool(DescribeGachaPoolRequest $request): DescribeGachaPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool";

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
            Gs2Gacha::MODULE,
            DescribeGachaPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeGachaPoolResult($result);
    }

	/**
	 * ガチャプールを取得します<br>
	 * <br>
	 *
	 * @param GetGachaPoolRequest $request リクエストパラメータ
	 * @return GetGachaPoolResult 結果
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
	public function getGachaPool(GetGachaPoolRequest $request): GetGachaPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            GetGachaPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGachaPoolResult($result);
    }

	/**
	 * ガチャプールの状態を取得します<br>
	 * <br>
	 *
	 * @param GetGachaPoolStatusRequest $request リクエストパラメータ
	 * @return GetGachaPoolStatusResult 結果
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
	public function getGachaPoolStatus(GetGachaPoolStatusRequest $request): GetGachaPoolStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            GetGachaPoolStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGachaPoolStatusResult($result);
    }

	/**
	 * ガチャプールを更新します<br>
	 * <br>
	 *
	 * @param UpdateGachaPoolRequest $request リクエストパラメータ
	 * @return UpdateGachaPoolResult 結果
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
	public function updateGachaPool(UpdateGachaPoolRequest $request): UpdateGachaPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getPublicDrawRate() !== null) $body['publicDrawRate'] = $request->getPublicDrawRate();
        if($request->getAllowAccessGachaInfo() !== null) $body['allowAccessGachaInfo'] = $request->getAllowAccessGachaInfo();
        if($request->getRestrict() !== null) $body['restrict'] = $request->getRestrict();
        if($request->getDrawPrizeTriggerScript() !== null) $body['drawPrizeTriggerScript'] = $request->getDrawPrizeTriggerScript();
        if($request->getDrawPrizeDoneTriggerScript() !== null) $body['drawPrizeDoneTriggerScript'] = $request->getDrawPrizeDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            UpdateGachaPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateGachaPoolResult($result);
    }

	/**
	 * 公開されているガチャ一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeGachaRequest $request リクエストパラメータ
	 * @return DescribeGachaResult 結果
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
	public function describeGacha(DescribeGachaRequest $request): DescribeGachaResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/gacha";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            DescribeGachaRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeGachaResult($result);
    }

	/**
	 * リソース毎のガチャの排出確率を取得します<br>
	 * <br>
	 *
	 * @param DetailProbabilityRequest $request リクエストパラメータ
	 * @return DetailProbabilityResult 結果
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
	public function detailProbability(DetailProbabilityRequest $request): DetailProbabilityResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/gacha/". ($request->getGachaName() === null || $request->getGachaName() === "" ? "null" : $request->getGachaName()). "/probability/". ($request->getDrawTime() === null || $request->getDrawTime() === "" ? "null" : $request->getDrawTime()). "/detail";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            DetailProbabilityRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DetailProbabilityResult($result);
    }

	/**
	 * ガチャを実行します。<br>
	 * <br>
	 *
	 * @param DoGachaRequest $request リクエストパラメータ
	 * @return DoGachaResult 結果
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
	public function doGacha(DoGachaRequest $request): DoGachaResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/gacha/". ($request->getGachaName() === null || $request->getGachaName() === "" ? "null" : $request->getGachaName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        if($request->getContext() !== null) $body['context'] = $request->getContext();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            DoGachaRequest::FUNCTION,
            $body,
            $headers
        );
        return new DoGachaResult($result);
    }

	/**
	 * スタンプシートを使用してガチャを実行します。<br>
	 * <br>
	 *
	 * @param DoGachaByStampSheetRequest $request リクエストパラメータ
	 * @return DoGachaByStampSheetResult 結果
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
	public function doGachaByStampSheet(DoGachaByStampSheetRequest $request): DoGachaByStampSheetResult
	{
	    $url = self::ENDPOINT_HOST. "/gacha";

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
            Gs2Gacha::MODULE,
            DoGachaByStampSheetRequest::FUNCTION,
            $body,
            $headers
        );
        return new DoGachaByStampSheetResult($result);
    }

	/**
	 * 公開されているガチャを取得します<br>
	 * <br>
	 *
	 * @param GetGachaRequest $request リクエストパラメータ
	 * @return GetGachaResult 結果
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
	public function getGacha(GetGachaRequest $request): GetGachaResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/gacha/". ($request->getGachaName() === null || $request->getGachaName() === "" ? "null" : $request->getGachaName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            GetGachaRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGachaResult($result);
    }

	/**
	 * レアリティ毎のガチャの排出確率を取得します<br>
	 * <br>
	 *
	 * @param GetProbabilityRequest $request リクエストパラメータ
	 * @return GetProbabilityResult 結果
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
	public function getProbability(GetProbabilityRequest $request): GetProbabilityResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/gacha/". ($request->getGachaName() === null || $request->getGachaName() === "" ? "null" : $request->getGachaName()). "/probability/". ($request->getDrawTime() === null || $request->getDrawTime() === "" ? "null" : $request->getDrawTime()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            GetProbabilityRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetProbabilityResult($result);
    }

	/**
	 * ガチャマスターデータをエクスポートする<br>
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
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            ExportMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new ExportMasterResult($result);
    }

	/**
	 * 景品を新規作成します<br>
	 * <br>
	 *
	 * @param CreatePrizeMasterRequest $request リクエストパラメータ
	 * @return CreatePrizeMasterResult 結果
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
	public function createPrizeMaster(CreatePrizeMasterRequest $request): CreatePrizeMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity/". ($request->getRarityName() === null || $request->getRarityName() === "" ? "null" : $request->getRarityName()). "/prize";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['resourceId'] = $request->getResourceId();
        $body['weight'] = $request->getWeight();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            CreatePrizeMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreatePrizeMasterResult($result);
    }

	/**
	 * 景品を削除します<br>
	 * <br>
	 *
	 * @param DeletePrizeMasterRequest $request リクエストパラメータ
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
	public function deletePrizeMaster(DeletePrizeMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity/". ($request->getRarityName() === null || $request->getRarityName() === "" ? "null" : $request->getRarityName()). "/prize/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            DeletePrizeMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 景品の一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribePrizeMasterRequest $request リクエストパラメータ
	 * @return DescribePrizeMasterResult 結果
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
	public function describePrizeMaster(DescribePrizeMasterRequest $request): DescribePrizeMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity/". ($request->getRarityName() === null || $request->getRarityName() === "" ? "null" : $request->getRarityName()). "/prize";

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
            Gs2Gacha::MODULE,
            DescribePrizeMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribePrizeMasterResult($result);
    }

	/**
	 * 景品を取得します<br>
	 * <br>
	 *
	 * @param GetPrizeMasterRequest $request リクエストパラメータ
	 * @return GetPrizeMasterResult 結果
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
	public function getPrizeMaster(GetPrizeMasterRequest $request): GetPrizeMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity/". ($request->getRarityName() === null || $request->getRarityName() === "" ? "null" : $request->getRarityName()). "/prize/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            GetPrizeMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetPrizeMasterResult($result);
    }

	/**
	 * 景品を更新します<br>
	 * <br>
	 *
	 * @param UpdatePrizeMasterRequest $request リクエストパラメータ
	 * @return UpdatePrizeMasterResult 結果
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
	public function updatePrizeMaster(UpdatePrizeMasterRequest $request): UpdatePrizeMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity/". ($request->getRarityName() === null || $request->getRarityName() === "" ? "null" : $request->getRarityName()). "/prize/". ($request->getResourceId() === null || $request->getResourceId() === "" ? "null" : $request->getResourceId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['weight'] = $request->getWeight();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            UpdatePrizeMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdatePrizeMasterResult($result);
    }

	/**
	 * 排出確率テーブルを新規作成します<br>
	 * <br>
	 *
	 * @param CreatePrizeTableMasterRequest $request リクエストパラメータ
	 * @return CreatePrizeTableMasterResult 結果
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
	public function createPrizeTableMaster(CreatePrizeTableMasterRequest $request): CreatePrizeTableMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            CreatePrizeTableMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreatePrizeTableMasterResult($result);
    }

	/**
	 * 排出確率テーブルを削除します<br>
	 * <br>
	 *
	 * @param DeletePrizeTableMasterRequest $request リクエストパラメータ
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
	public function deletePrizeTableMaster(DeletePrizeTableMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            DeletePrizeTableMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 排出確率テーブルの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribePrizeTableMasterRequest $request リクエストパラメータ
	 * @return DescribePrizeTableMasterResult 結果
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
	public function describePrizeTableMaster(DescribePrizeTableMasterRequest $request): DescribePrizeTableMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable";

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
            Gs2Gacha::MODULE,
            DescribePrizeTableMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribePrizeTableMasterResult($result);
    }

	/**
	 * 排出確率テーブルを取得します<br>
	 * <br>
	 *
	 * @param GetPrizeTableMasterRequest $request リクエストパラメータ
	 * @return GetPrizeTableMasterResult 結果
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
	public function getPrizeTableMaster(GetPrizeTableMasterRequest $request): GetPrizeTableMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            GetPrizeTableMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetPrizeTableMasterResult($result);
    }

	/**
	 * 景品レアリティを新規作成します<br>
	 * <br>
	 *
	 * @param CreateRarityMasterRequest $request リクエストパラメータ
	 * @return CreateRarityMasterResult 結果
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
	public function createRarityMaster(CreateRarityMasterRequest $request): CreateRarityMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['weight'] = $request->getWeight();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            CreateRarityMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateRarityMasterResult($result);
    }

	/**
	 * 景品レアリティを削除します<br>
	 * <br>
	 *
	 * @param DeleteRarityMasterRequest $request リクエストパラメータ
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
	public function deleteRarityMaster(DeleteRarityMasterRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity/". ($request->getRarityName() === null || $request->getRarityName() === "" ? "null" : $request->getRarityName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            DeleteRarityMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 景品レアリティの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeRarityMasterRequest $request リクエストパラメータ
	 * @return DescribeRarityMasterResult 結果
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
	public function describeRarityMaster(DescribeRarityMasterRequest $request): DescribeRarityMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity";

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
            Gs2Gacha::MODULE,
            DescribeRarityMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeRarityMasterResult($result);
    }

	/**
	 * 景品レアリティを取得します<br>
	 * <br>
	 *
	 * @param GetRarityMasterRequest $request リクエストパラメータ
	 * @return GetRarityMasterResult 結果
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
	public function getRarityMaster(GetRarityMasterRequest $request): GetRarityMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity/". ($request->getRarityName() === null || $request->getRarityName() === "" ? "null" : $request->getRarityName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            GetRarityMasterRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetRarityMasterResult($result);
    }

	/**
	 * 景品レアリティを更新します<br>
	 * <br>
	 *
	 * @param UpdateRarityMasterRequest $request リクエストパラメータ
	 * @return UpdateRarityMasterResult 結果
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
	public function updateRarityMaster(UpdateRarityMasterRequest $request): UpdateRarityMasterResult
	{
	    $url = self::ENDPOINT_HOST. "/gachaPool/". ($request->getGachaPoolName() === null || $request->getGachaPoolName() === "" ? "null" : $request->getGachaPoolName()). "/master/prizeTable/". ($request->getPrizeTableName() === null || $request->getPrizeTableName() === "" ? "null" : $request->getPrizeTableName()). "/rarity/". ($request->getRarityName() === null || $request->getRarityName() === "" ? "null" : $request->getRarityName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['weight'] = $request->getWeight();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Gacha::MODULE,
            UpdateRarityMasterRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateRarityMasterResult($result);
    }
}