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

namespace Gs2\Realtime;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Realtime\Control\CreateGatheringPoolRequest;
use Gs2\Realtime\Control\CreateGatheringPoolResult;
use Gs2\Realtime\Control\DeleteGatheringPoolRequest;
use Gs2\Realtime\Control\DescribeGatheringPoolRequest;
use Gs2\Realtime\Control\DescribeGatheringPoolResult;
use Gs2\Realtime\Control\GetGatheringPoolRequest;
use Gs2\Realtime\Control\GetGatheringPoolResult;
use Gs2\Realtime\Control\UpdateGatheringPoolRequest;
use Gs2\Realtime\Control\UpdateGatheringPoolResult;
use Gs2\Realtime\Control\CreateGatheringRequest;
use Gs2\Realtime\Control\CreateGatheringResult;
use Gs2\Realtime\Control\DeleteGatheringRequest;
use Gs2\Realtime\Control\DescribeGatheringRequest;
use Gs2\Realtime\Control\DescribeGatheringResult;
use Gs2\Realtime\Control\GetGatheringRequest;
use Gs2\Realtime\Control\GetGatheringResult;

/**
 * GS2 Realtime API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2RealtimeClient extends AbstractGs2Client {

	public static $ENDPOINT = "realtime";

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
	 * ギャザリングプールを新規作成します<br>
	 * <br>
	 *
	 * @param CreateGatheringPoolRequest $request リクエストパラメータ
	 * @return CreateGatheringPoolResult 結果
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
	public function createGatheringPool(CreateGatheringPoolRequest $request): CreateGatheringPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/gatheringPool";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Realtime::MODULE,
            CreateGatheringPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateGatheringPoolResult($result);
    }

	/**
	 * ギャザリングプールを削除します<br>
	 * <br>
	 *
	 * @param DeleteGatheringPoolRequest $request リクエストパラメータ
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
	public function deleteGatheringPool(DeleteGatheringPoolRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/gatheringPool/". ($request->getGatheringPoolName() === null || $request->getGatheringPoolName() === "" ? "null" : $request->getGatheringPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Realtime::MODULE,
            DeleteGatheringPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ギャザリングプールの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeGatheringPoolRequest $request リクエストパラメータ
	 * @return DescribeGatheringPoolResult 結果
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
	public function describeGatheringPool(DescribeGatheringPoolRequest $request): DescribeGatheringPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/gatheringPool";

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
            Gs2Realtime::MODULE,
            DescribeGatheringPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeGatheringPoolResult($result);
    }

	/**
	 * ギャザリングプールを取得します<br>
	 * <br>
	 *
	 * @param GetGatheringPoolRequest $request リクエストパラメータ
	 * @return GetGatheringPoolResult 結果
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
	public function getGatheringPool(GetGatheringPoolRequest $request): GetGatheringPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/gatheringPool/". ($request->getGatheringPoolName() === null || $request->getGatheringPoolName() === "" ? "null" : $request->getGatheringPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Realtime::MODULE,
            GetGatheringPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGatheringPoolResult($result);
    }

	/**
	 * ギャザリングプールを更新します<br>
	 * <br>
	 *
	 * @param UpdateGatheringPoolRequest $request リクエストパラメータ
	 * @return UpdateGatheringPoolResult 結果
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
	public function updateGatheringPool(UpdateGatheringPoolRequest $request): UpdateGatheringPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/gatheringPool/". ($request->getGatheringPoolName() === null || $request->getGatheringPoolName() === "" ? "null" : $request->getGatheringPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Realtime::MODULE,
            UpdateGatheringPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateGatheringPoolResult($result);
    }

	/**
	 * ギャザリングを作成します<br>
	 * <br>
	 *
	 * @param CreateGatheringRequest $request リクエストパラメータ
	 * @return CreateGatheringResult 結果
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
	public function createGathering(CreateGatheringRequest $request): CreateGatheringResult
	{
	    $url = self::ENDPOINT_HOST. "/gatheringPool/". ($request->getGatheringPoolName() === null || $request->getGatheringPoolName() === "" ? "null" : $request->getGatheringPoolName()). "/gathering";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getName() !== null) $body['name'] = $request->getName();
        if($request->getUserIds() !== null) $body['userIds'] = $request->getUserIds();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Realtime::MODULE,
            CreateGatheringRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateGatheringResult($result);
    }

	/**
	 * ギャザリングを削除します<br>
	 * <br>
	 *
	 * @param DeleteGatheringRequest $request リクエストパラメータ
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
	public function deleteGathering(DeleteGatheringRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/gatheringPool/". ($request->getGatheringPoolName() === null || $request->getGatheringPoolName() === "" ? "null" : $request->getGatheringPoolName()). "/gathering/". ($request->getGatheringName() === null || $request->getGatheringName() === "" ? "null" : $request->getGatheringName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Realtime::MODULE,
            DeleteGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ギャザリングの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeGatheringRequest $request リクエストパラメータ
	 * @return DescribeGatheringResult 結果
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
	public function describeGathering(DescribeGatheringRequest $request): DescribeGatheringResult
	{
	    $url = self::ENDPOINT_HOST. "/gatheringPool/". ($request->getGatheringPoolName() === null || $request->getGatheringPoolName() === "" ? "null" : $request->getGatheringPoolName()). "/gathering";

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
            Gs2Realtime::MODULE,
            DescribeGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeGatheringResult($result);
    }

	/**
	 * ギャザリングを取得します<br>
	 * <br>
	 *
	 * @param GetGatheringRequest $request リクエストパラメータ
	 * @return GetGatheringResult 結果
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
	public function getGathering(GetGatheringRequest $request): GetGatheringResult
	{
	    $url = self::ENDPOINT_HOST. "/gatheringPool/". ($request->getGatheringPoolName() === null || $request->getGatheringPoolName() === "" ? "null" : $request->getGatheringPoolName()). "/gathering/". ($request->getGatheringName() === null || $request->getGatheringName() === "" ? "null" : $request->getGatheringName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Realtime::MODULE,
            GetGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetGatheringResult($result);
    }
}