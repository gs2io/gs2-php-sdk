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

namespace Gs2\Lock;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Lock\Control\CreateLockPoolRequest;
use Gs2\Lock\Control\CreateLockPoolResult;
use Gs2\Lock\Control\DeleteLockPoolRequest;
use Gs2\Lock\Control\DescribeLockPoolRequest;
use Gs2\Lock\Control\DescribeLockPoolResult;
use Gs2\Lock\Control\DescribeServiceClassRequest;
use Gs2\Lock\Control\DescribeServiceClassResult;
use Gs2\Lock\Control\GetLockPoolRequest;
use Gs2\Lock\Control\GetLockPoolResult;
use Gs2\Lock\Control\GetLockPoolStatusRequest;
use Gs2\Lock\Control\GetLockPoolStatusResult;
use Gs2\Lock\Control\UpdateLockPoolRequest;
use Gs2\Lock\Control\UpdateLockPoolResult;
use Gs2\Lock\Control\LockRequest;
use Gs2\Lock\Control\LockResult;
use Gs2\Lock\Control\LockByUserRequest;
use Gs2\Lock\Control\LockByUserResult;
use Gs2\Lock\Control\UnlockRequest;
use Gs2\Lock\Control\UnlockByUserRequest;
use Gs2\Lock\Control\UnlockForceByUserRequest;

/**
 * GS2 Lock API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2LockClient extends AbstractGs2Client {

	public static $ENDPOINT = "lock";

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
	 * ロックプールを新規作成します<br>
	 * <br>
	 *
	 * @param CreateLockPoolRequest $request リクエストパラメータ
	 * @return CreateLockPoolResult 結果
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
	public function createLockPool(CreateLockPoolRequest $request): CreateLockPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/lockPool";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            CreateLockPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateLockPoolResult($result);
    }

	/**
	 * ロックプールを削除します<br>
	 * <br>
	 *
	 * @param DeleteLockPoolRequest $request リクエストパラメータ
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
	public function deleteLockPool(DeleteLockPoolRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/lockPool/". ($request->getLockPoolName() === null || $request->getLockPoolName() === "" ? "null" : $request->getLockPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            DeleteLockPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ロックプールの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeLockPoolRequest $request リクエストパラメータ
	 * @return DescribeLockPoolResult 結果
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
	public function describeLockPool(DescribeLockPoolRequest $request): DescribeLockPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/lockPool";

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
            Gs2Lock::MODULE,
            DescribeLockPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeLockPoolResult($result);
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
	    $url = self::ENDPOINT_HOST. "/lockPool/serviceClass";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            DescribeServiceClassRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeServiceClassResult($result);
    }

	/**
	 * ロックプールを取得します<br>
	 * <br>
	 *
	 * @param GetLockPoolRequest $request リクエストパラメータ
	 * @return GetLockPoolResult 結果
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
	public function getLockPool(GetLockPoolRequest $request): GetLockPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/lockPool/". ($request->getLockPoolName() === null || $request->getLockPoolName() === "" ? "null" : $request->getLockPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            GetLockPoolRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetLockPoolResult($result);
    }

	/**
	 * ロックプールの状態を取得します<br>
	 * <br>
	 *
	 * @param GetLockPoolStatusRequest $request リクエストパラメータ
	 * @return GetLockPoolStatusResult 結果
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
	public function getLockPoolStatus(GetLockPoolStatusRequest $request): GetLockPoolStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/lockPool/". ($request->getLockPoolName() === null || $request->getLockPoolName() === "" ? "null" : $request->getLockPoolName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            GetLockPoolStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetLockPoolStatusResult($result);
    }

	/**
	 * ロックプールを更新します<br>
	 * <br>
	 *
	 * @param UpdateLockPoolRequest $request リクエストパラメータ
	 * @return UpdateLockPoolResult 結果
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
	public function updateLockPool(UpdateLockPoolRequest $request): UpdateLockPoolResult
	{
	    $url = self::ENDPOINT_HOST. "/lockPool/". ($request->getLockPoolName() === null || $request->getLockPoolName() === "" ? "null" : $request->getLockPoolName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            UpdateLockPoolRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateLockPoolResult($result);
    }

	/**
	 * ロックを取得します。<br>
	 * <br>
	 *
	 * @param LockRequest $request リクエストパラメータ
	 * @return LockResult 結果
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
	public function lock(LockRequest $request): LockResult
	{
	    $url = self::ENDPOINT_HOST. "/lockPool/". ($request->getLockPoolName() === null || $request->getLockPoolName() === "" ? "null" : $request->getLockPoolName()). "/lock/transaction/". ($request->getTransactionId() === null || $request->getTransactionId() === "" ? "null" : $request->getTransactionId()). "/resource/". ($request->getResourceName() === null || $request->getResourceName() === "" ? "null" : $request->getResourceName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        if($request->getTtl() !== null) $queryString['ttl'] = $request->getTtl();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            LockRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new LockResult($result);
    }

	/**
	 * ロックを取得します。<br>
	 * <br>
	 *
	 * @param LockByUserRequest $request リクエストパラメータ
	 * @return LockByUserResult 結果
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
	public function lockByUser(LockByUserRequest $request): LockByUserResult
	{
	    $url = self::ENDPOINT_HOST. "/lockPool/". ($request->getLockPoolName() === null || $request->getLockPoolName() === "" ? "null" : $request->getLockPoolName()). "/lock/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/transaction/". ($request->getTransactionId() === null || $request->getTransactionId() === "" ? "null" : $request->getTransactionId()). "/resource/". ($request->getResourceName() === null || $request->getResourceName() === "" ? "null" : $request->getResourceName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getTtl() !== null) $queryString['ttl'] = $request->getTtl();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            LockByUserRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new LockByUserResult($result);
    }

	/**
	 * アンロックします。<br>
	 * <br>
	 *
	 * @param UnlockRequest $request リクエストパラメータ
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
	public function unlock(UnlockRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/lockPool/". ($request->getLockPoolName() === null || $request->getLockPoolName() === "" ? "null" : $request->getLockPoolName()). "/lock/transaction/". ($request->getTransactionId() === null || $request->getTransactionId() === "" ? "null" : $request->getTransactionId()). "/resource/". ($request->getResourceName() === null || $request->getResourceName() === "" ? "null" : $request->getResourceName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            UnlockRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * アンロックします。<br>
	 * <br>
	 *
	 * @param UnlockByUserRequest $request リクエストパラメータ
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
	public function unlockByUser(UnlockByUserRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/lockPool/". ($request->getLockPoolName() === null || $request->getLockPoolName() === "" ? "null" : $request->getLockPoolName()). "/lock/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/transaction/". ($request->getTransactionId() === null || $request->getTransactionId() === "" ? "null" : $request->getTransactionId()). "/resource/". ($request->getResourceName() === null || $request->getResourceName() === "" ? "null" : $request->getResourceName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            UnlockByUserRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * 強制的にアンロックします。<br>
	 * <br>
	 * このAPIを利用すると、トランザクションやロックカウンターの状態を無視して強制的にアンロック出来ます。<br>
	 * <br>
	 *
	 * @param UnlockForceByUserRequest $request リクエストパラメータ
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
	public function unlockForceByUser(UnlockForceByUserRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/lockPool/". ($request->getLockPoolName() === null || $request->getLockPoolName() === "" ? "null" : $request->getLockPoolName()). "/lock/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/resource/". ($request->getResourceName() === null || $request->getResourceName() === "" ? "null" : $request->getResourceName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Lock::MODULE,
            UnlockForceByUserRequest::FUNCTION,
            $queryString,
            $headers
        );
    }
}