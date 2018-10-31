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

namespace Gs2\Ranking;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Ranking\Control\CreateGameModeRequest;
use Gs2\Ranking\Control\CreateGameModeResult;
use Gs2\Ranking\Control\DeleteGameModeRequest;
use Gs2\Ranking\Control\DescribeGameModeRequest;
use Gs2\Ranking\Control\DescribeGameModeResult;
use Gs2\Ranking\Control\GetGameModeRequest;
use Gs2\Ranking\Control\GetGameModeResult;
use Gs2\Ranking\Control\UpdateGameModeRequest;
use Gs2\Ranking\Control\UpdateGameModeResult;
use Gs2\Ranking\Control\CreateRankingTableRequest;
use Gs2\Ranking\Control\CreateRankingTableResult;
use Gs2\Ranking\Control\DeleteRankingTableRequest;
use Gs2\Ranking\Control\DescribeRankingTableRequest;
use Gs2\Ranking\Control\DescribeRankingTableResult;
use Gs2\Ranking\Control\GetRankingTableRequest;
use Gs2\Ranking\Control\GetRankingTableResult;
use Gs2\Ranking\Control\UpdateRankingTableRequest;
use Gs2\Ranking\Control\UpdateRankingTableResult;
use Gs2\Ranking\Control\GetEstimateRankRequest;
use Gs2\Ranking\Control\GetEstimateRankResult;
use Gs2\Ranking\Control\GetMyRankRequest;
use Gs2\Ranking\Control\GetMyRankResult;
use Gs2\Ranking\Control\GetRankingRequest;
use Gs2\Ranking\Control\GetRankingResult;
use Gs2\Ranking\Control\PutScoreRequest;
use Gs2\Ranking\Control\PutScoreResult;

/**
 * GS2 Ranking API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2RankingClient extends AbstractGs2Client {

	public static $ENDPOINT = "ranking";

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
	 * ゲームモードを作成します<br>
	 * <br>
	 *
	 * @param CreateGameModeRequest $request リクエストパラメータ
	 * @return CreateGameModeResult 結果
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
	public function createGameMode(CreateGameModeRequest $request): CreateGameModeResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "/mode";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['gameMode'] = $request->getGameMode();
        $body['asc'] = $request->getAsc();
        $body['calcInterval'] = $request->getCalcInterval();
        if($request->getPutScoreTriggerScript() !== null) $body['putScoreTriggerScript'] = $request->getPutScoreTriggerScript();
        if($request->getPutScoreDoneTriggerScript() !== null) $body['putScoreDoneTriggerScript'] = $request->getPutScoreDoneTriggerScript();
        if($request->getCalculateRankingDoneTriggerScript() !== null) $body['calculateRankingDoneTriggerScript'] = $request->getCalculateRankingDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            CreateGameModeRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateGameModeResult($result);
    }

	/**
	 * ゲームモードを削除します<br>
	 * <br>
	 *
	 * @param DeleteGameModeRequest $request リクエストパラメータ
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
	public function deleteGameMode(DeleteGameModeRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "/mode/". ($request->getGameMode() === null || $request->getGameMode() === "" ? "null" : $request->getGameMode()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            DeleteGameModeRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ゲームモードの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeGameModeRequest $request リクエストパラメータ
	 * @return DescribeGameModeResult 結果
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
	public function describeGameMode(DescribeGameModeRequest $request): DescribeGameModeResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "/mode";

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
            Gs2Ranking::MODULE,
            DescribeGameModeRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeGameModeResult($result);
    }

	/**
	 * ゲームモードを取得します<br>
	 * <br>
	 *
	 * @param GetGameModeRequest $request リクエストパラメータ
	 * @return GetGameModeResult 結果
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
	public function getGameMode(GetGameModeRequest $request): GetGameModeResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "/mode/". ($request->getGameMode() === null || $request->getGameMode() === "" ? "null" : $request->getGameMode()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            GetGameModeRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGameModeResult($result);
    }

	/**
	 * ゲームモードの設定を更新します<br>
	 * <br>
	 *
	 * @param UpdateGameModeRequest $request リクエストパラメータ
	 * @return UpdateGameModeResult 結果
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
	public function updateGameMode(UpdateGameModeRequest $request): UpdateGameModeResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "/mode/". ($request->getGameMode() === null || $request->getGameMode() === "" ? "null" : $request->getGameMode()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['calcInterval'] = $request->getCalcInterval();
        if($request->getPutScoreTriggerScript() !== null) $body['putScoreTriggerScript'] = $request->getPutScoreTriggerScript();
        if($request->getPutScoreDoneTriggerScript() !== null) $body['putScoreDoneTriggerScript'] = $request->getPutScoreDoneTriggerScript();
        if($request->getCalculateRankingDoneTriggerScript() !== null) $body['calculateRankingDoneTriggerScript'] = $request->getCalculateRankingDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            UpdateGameModeRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateGameModeResult($result);
    }

	/**
	 * ランキングテーブルを新規作成します<br>
	 * <br>
	 *
	 * @param CreateRankingTableRequest $request リクエストパラメータ
	 * @return CreateRankingTableResult 結果
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
	public function createRankingTable(CreateRankingTableRequest $request): CreateRankingTableResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getPutScoreTriggerScript() !== null) $body['putScoreTriggerScript'] = $request->getPutScoreTriggerScript();
        if($request->getPutScoreDoneTriggerScript() !== null) $body['putScoreDoneTriggerScript'] = $request->getPutScoreDoneTriggerScript();
        if($request->getCalculateRankingDoneTriggerScript() !== null) $body['calculateRankingDoneTriggerScript'] = $request->getCalculateRankingDoneTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            CreateRankingTableRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateRankingTableResult($result);
    }

	/**
	 * ランキングテーブルを削除します<br>
	 * <br>
	 *
	 * @param DeleteRankingTableRequest $request リクエストパラメータ
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
	public function deleteRankingTable(DeleteRankingTableRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            DeleteRankingTableRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ランキングテーブルの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeRankingTableRequest $request リクエストパラメータ
	 * @return DescribeRankingTableResult 結果
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
	public function describeRankingTable(DescribeRankingTableRequest $request): DescribeRankingTableResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking";

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
            Gs2Ranking::MODULE,
            DescribeRankingTableRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeRankingTableResult($result);
    }

	/**
	 * ランキングテーブルを取得します<br>
	 * <br>
	 *
	 * @param GetRankingTableRequest $request リクエストパラメータ
	 * @return GetRankingTableResult 結果
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
	public function getRankingTable(GetRankingTableRequest $request): GetRankingTableResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            GetRankingTableRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetRankingTableResult($result);
    }

	/**
	 * ランキングテーブルを更新します<br>
	 * <br>
	 *
	 * @param UpdateRankingTableRequest $request リクエストパラメータ
	 * @return UpdateRankingTableResult 結果
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
	public function updateRankingTable(UpdateRankingTableRequest $request): UpdateRankingTableResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getPutScoreTriggerScript() !== null) $body['putScoreTriggerScript'] = $request->getPutScoreTriggerScript();
        if($request->getPutScoreDoneTriggerScript() !== null) $body['putScoreDoneTriggerScript'] = $request->getPutScoreDoneTriggerScript();
        if($request->getCalculateRankingDoneTriggerScript() !== null) $body['calculateRankingDoneTriggerScript'] = $request->getCalculateRankingDoneTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            UpdateRankingTableRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateRankingTableResult($result);
    }

	/**
	 * 指定したスコアを取った時のおおよその順位を取得します<br>
	 * <br>
	 *
	 * @param GetEstimateRankRequest $request リクエストパラメータ
	 * @return GetEstimateRankResult 結果
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
	public function getEstimateRank(GetEstimateRankRequest $request): GetEstimateRankResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "/mode/". ($request->getGameMode() === null || $request->getGameMode() === "" ? "null" : $request->getGameMode()). "/ranking/estimate";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getScore() !== null) $queryString['score'] = $request->getScore();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            GetEstimateRankRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetEstimateRankResult($result);
    }

	/**
	 * 現在の順位を取得します<br>
	 * <br>
	 *
	 * @param GetMyRankRequest $request リクエストパラメータ
	 * @return GetMyRankResult 結果
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
	public function getMyRank(GetMyRankRequest $request): GetMyRankResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "/mode/". ($request->getGameMode() === null || $request->getGameMode() === "" ? "null" : $request->getGameMode()). "/ranking/rank";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            GetMyRankRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMyRankResult($result);
    }

	/**
	 * ランキングを取得します<br>
	 * <br>
	 *
	 * @param GetRankingRequest $request リクエストパラメータ
	 * @return GetRankingResult 結果
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
	public function getRanking(GetRankingRequest $request): GetRankingResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "/mode/". ($request->getGameMode() === null || $request->getGameMode() === "" ? "null" : $request->getGameMode()). "/ranking";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getOffset() !== null) $queryString['offset'] = $request->getOffset();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            GetRankingRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetRankingResult($result);
    }

	/**
	 * スコアを登録します<br>
	 * <br>
	 *
	 * @param PutScoreRequest $request リクエストパラメータ
	 * @return PutScoreResult 結果
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
	public function putScore(PutScoreRequest $request): PutScoreResult
	{
	    $url = self::ENDPOINT_HOST. "/ranking/". ($request->getRankingTableName() === null || $request->getRankingTableName() === "" ? "null" : $request->getRankingTableName()). "/mode/". ($request->getGameMode() === null || $request->getGameMode() === "" ? "null" : $request->getGameMode()). "/ranking";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $body['score'] = $request->getScore();
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Ranking::MODULE,
            PutScoreRequest::FUNCTION,
            $body,
            $headers
        );
        return new PutScoreResult($result);
    }
}