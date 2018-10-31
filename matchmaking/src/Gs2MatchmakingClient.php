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

namespace Gs2\Matchmaking;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\Matchmaking\Control\AnybodyDescribeJoinedUserRequest;
use Gs2\Matchmaking\Control\AnybodyDescribeJoinedUserResult;
use Gs2\Matchmaking\Control\AnybodyDoMatchmakingRequest;
use Gs2\Matchmaking\Control\AnybodyDoMatchmakingResult;
use Gs2\Matchmaking\Control\AnybodyLeaveGatheringRequest;
use Gs2\Matchmaking\Control\CustomAutoDescribeJoinedUserRequest;
use Gs2\Matchmaking\Control\CustomAutoDescribeJoinedUserResult;
use Gs2\Matchmaking\Control\CustomAutoDoMatchmakingRequest;
use Gs2\Matchmaking\Control\CustomAutoDoMatchmakingResult;
use Gs2\Matchmaking\Control\CustomAutoLeaveGatheringRequest;
use Gs2\Matchmaking\Control\CreateMatchmakingRequest;
use Gs2\Matchmaking\Control\CreateMatchmakingResult;
use Gs2\Matchmaking\Control\DeleteMatchmakingRequest;
use Gs2\Matchmaking\Control\DescribeMatchmakingRequest;
use Gs2\Matchmaking\Control\DescribeMatchmakingResult;
use Gs2\Matchmaking\Control\DescribeServiceClassRequest;
use Gs2\Matchmaking\Control\DescribeServiceClassResult;
use Gs2\Matchmaking\Control\GetMatchmakingRequest;
use Gs2\Matchmaking\Control\GetMatchmakingResult;
use Gs2\Matchmaking\Control\GetMatchmakingStatusRequest;
use Gs2\Matchmaking\Control\GetMatchmakingStatusResult;
use Gs2\Matchmaking\Control\UpdateMatchmakingRequest;
use Gs2\Matchmaking\Control\UpdateMatchmakingResult;
use Gs2\Matchmaking\Control\PasscodeBreakupGatheringRequest;
use Gs2\Matchmaking\Control\PasscodeCreateGatheringRequest;
use Gs2\Matchmaking\Control\PasscodeCreateGatheringResult;
use Gs2\Matchmaking\Control\PasscodeDescribeJoinedUserRequest;
use Gs2\Matchmaking\Control\PasscodeDescribeJoinedUserResult;
use Gs2\Matchmaking\Control\PasscodeEarlyCompleteGatheringRequest;
use Gs2\Matchmaking\Control\PasscodeJoinGatheringRequest;
use Gs2\Matchmaking\Control\PasscodeJoinGatheringResult;
use Gs2\Matchmaking\Control\PasscodeLeaveGatheringRequest;
use Gs2\Matchmaking\Control\RoomBreakupGatheringRequest;
use Gs2\Matchmaking\Control\RoomCreateGatheringRequest;
use Gs2\Matchmaking\Control\RoomCreateGatheringResult;
use Gs2\Matchmaking\Control\RoomDescribeGatheringRequest;
use Gs2\Matchmaking\Control\RoomDescribeGatheringResult;
use Gs2\Matchmaking\Control\RoomDescribeJoinedUserRequest;
use Gs2\Matchmaking\Control\RoomDescribeJoinedUserResult;
use Gs2\Matchmaking\Control\RoomEarlyCompleteGatheringRequest;
use Gs2\Matchmaking\Control\RoomJoinGatheringRequest;
use Gs2\Matchmaking\Control\RoomJoinGatheringResult;
use Gs2\Matchmaking\Control\RoomLeaveGatheringRequest;

/**
 * GS2 Matchmaking API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2MatchmakingClient extends AbstractGs2Client {

	public static $ENDPOINT = "matchmaking";

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
	 * ギャザリングの参加者一覧を取得します<br>
	 * <br>
	 * マッチメイキングが成立すると 404 Not Found 応答が返るようになります。<br>
	 * 404応答を返すようになる直前にコールバックエンドポイントに確定した参加者一覧情報が渡されるため、<br>
	 * コールバックを受け取ってからは本APIを呼び出さないように実装するべきです。<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param AnybodyDescribeJoinedUserRequest $request リクエストパラメータ
	 * @return AnybodyDescribeJoinedUserResult 結果
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
	public function anybodyDescribeJoinedUser(AnybodyDescribeJoinedUserRequest $request): AnybodyDescribeJoinedUserResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/anybody/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/player";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            AnybodyDescribeJoinedUserRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new AnybodyDescribeJoinedUserResult($result);
    }

	/**
	 * Anybodyマッチメイキングを開始します<br>
	 * <br>
	 * すでに存在するギャザリングに参加するか、新しいギャザリングを新規作成します。<br>
	 * 戻り値で参加したギャザリングIDが返りますので、そのIDを利用して後続のAPIを利用できます。<br>
	 * <br>
	 * ギャザリングが成立した場合、マッチメイキングに設定したコールバックエンドポイントにギャザリング<br>
	 * とそのギャザリングの参加者一覧が返されます。<br>
	 * コールバック後にギャザリング情報はマッチメイキングサーバから削除され、後続のAPIも利用できなくなります。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param AnybodyDoMatchmakingRequest $request リクエストパラメータ
	 * @return AnybodyDoMatchmakingResult 結果
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
	public function anybodyDoMatchmaking(AnybodyDoMatchmakingRequest $request): AnybodyDoMatchmakingResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/anybody";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            AnybodyDoMatchmakingRequest::FUNCTION,
            $body,
            $headers
        );
        return new AnybodyDoMatchmakingResult($result);
    }

	/**
	 * ギャザリングから離脱します<br>
	 * <br>
	 * 本APIは確実に成功することを保証していません。<br>
	 * 例えば、離脱する直前にギャザリングが成立した場合は 404 Not Found を応答します。<br>
	 * <br>
	 * 404応答を受け取った場合はすでにギャザリングが成立していないかを確認する必要があります。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param AnybodyLeaveGatheringRequest $request リクエストパラメータ
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
	public function anybodyLeaveGathering(AnybodyLeaveGatheringRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/anybody/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/player";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            AnybodyLeaveGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ギャザリングの参加者一覧を取得します<br>
	 * <br>
	 * マッチメイキングが成立すると 404 Not Found 応答が返るようになります。<br>
	 * 404応答を返すようになる直前にコールバックエンドポイントに確定した参加者一覧情報が渡されるため、<br>
	 * コールバックを受け取ってからは本APIを呼び出さないように実装するべきです。<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param CustomAutoDescribeJoinedUserRequest $request リクエストパラメータ
	 * @return CustomAutoDescribeJoinedUserResult 結果
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
	public function customAutoDescribeJoinedUser(CustomAutoDescribeJoinedUserRequest $request): CustomAutoDescribeJoinedUserResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/customauto/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/player";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            CustomAutoDescribeJoinedUserRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new CustomAutoDescribeJoinedUserResult($result);
    }

	/**
	 * カスタムオートマッチメイキングを開始します<br>
	 * <br>
	 * カスタムオートマッチメイキングは最大5つの属性値を指定してギャザリングを作成するか、<br>
	 * すでに存在するギャザリングの最大5つの属性値で、すべての属性値が指定した範囲内に収まっているギャザリングに参加します。<br>
	 * <br>
	 * ギャザリングへの参加が成功した場合は done に true が返ります。<br>
	 * done に true が返った場合は、同時に item に参加したギャザリングの情報が格納されています。<br>
	 * <br>
	 * done に false が返った場合は、一定時間内に存在するギャザリングの検索が完了しなかった場合に返ります。<br>
	 * この場合、searchContext に検索を継続するための情報が返ります。<br>
	 * 引き続き検索を続けるために、再度APIを呼び出す際に引数に指定することで検索を再開することができます。<br>
	 * <br>
	 * すべてのギャザリングを検索したが、条件にマッチするものがなかった場合、新しいギャザリングを作成し done に true が返ります。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param CustomAutoDoMatchmakingRequest $request リクエストパラメータ
	 * @return CustomAutoDoMatchmakingResult 結果
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
	public function customAutoDoMatchmaking(CustomAutoDoMatchmakingRequest $request): CustomAutoDoMatchmakingResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/customauto";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        if($request->getAttribute1() !== null) $body['attribute1'] = $request->getAttribute1();
        if($request->getAttribute2() !== null) $body['attribute2'] = $request->getAttribute2();
        if($request->getAttribute3() !== null) $body['attribute3'] = $request->getAttribute3();
        if($request->getAttribute4() !== null) $body['attribute4'] = $request->getAttribute4();
        if($request->getAttribute5() !== null) $body['attribute5'] = $request->getAttribute5();
        if($request->getSearchAttribute1Min() !== null) $body['searchAttribute1Min'] = $request->getSearchAttribute1Min();
        if($request->getSearchAttribute2Min() !== null) $body['searchAttribute2Min'] = $request->getSearchAttribute2Min();
        if($request->getSearchAttribute3Min() !== null) $body['searchAttribute3Min'] = $request->getSearchAttribute3Min();
        if($request->getSearchAttribute4Min() !== null) $body['searchAttribute4Min'] = $request->getSearchAttribute4Min();
        if($request->getSearchAttribute5Min() !== null) $body['searchAttribute5Min'] = $request->getSearchAttribute5Min();
        if($request->getSearchAttribute1Max() !== null) $body['searchAttribute1Max'] = $request->getSearchAttribute1Max();
        if($request->getSearchAttribute2Max() !== null) $body['searchAttribute2Max'] = $request->getSearchAttribute2Max();
        if($request->getSearchAttribute3Max() !== null) $body['searchAttribute3Max'] = $request->getSearchAttribute3Max();
        if($request->getSearchAttribute4Max() !== null) $body['searchAttribute4Max'] = $request->getSearchAttribute4Max();
        if($request->getSearchAttribute5Max() !== null) $body['searchAttribute5Max'] = $request->getSearchAttribute5Max();
        if($request->getSearchContext() !== null) $body['searchContext'] = $request->getSearchContext();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            CustomAutoDoMatchmakingRequest::FUNCTION,
            $body,
            $headers
        );
        return new CustomAutoDoMatchmakingResult($result);
    }

	/**
	 * ギャザリングから離脱します<br>
	 * <br>
	 * 本APIは確実に成功することを保証していません。<br>
	 * 例えば、離脱する直前にギャザリングが成立した場合は 404 Not Found を応答します。<br>
	 * <br>
	 * 404応答を受け取った場合はすでにギャザリングが成立していないかを確認する必要があります。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param CustomAutoLeaveGatheringRequest $request リクエストパラメータ
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
	public function customAutoLeaveGathering(CustomAutoLeaveGatheringRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/customauto/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/player";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            CustomAutoLeaveGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * マッチメイキングを新規作成します<br>
	 * <br>
	 *
	 * @param CreateMatchmakingRequest $request リクエストパラメータ
	 * @return CreateMatchmakingResult 結果
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
	public function createMatchmaking(CreateMatchmakingRequest $request): CreateMatchmakingResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        $body['serviceClass'] = $request->getServiceClass();
        $body['type'] = $request->getType();
        $body['maxPlayer'] = $request->getMaxPlayer();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getGatheringPoolName() !== null) $body['gatheringPoolName'] = $request->getGatheringPoolName();
        if($request->getCallback() !== null) $body['callback'] = $request->getCallback();
        if($request->getNotificationGameName() !== null) $body['notificationGameName'] = $request->getNotificationGameName();
        if($request->getCreateGatheringTriggerScript() !== null) $body['createGatheringTriggerScript'] = $request->getCreateGatheringTriggerScript();
        if($request->getCreateGatheringDoneTriggerScript() !== null) $body['createGatheringDoneTriggerScript'] = $request->getCreateGatheringDoneTriggerScript();
        if($request->getJoinGatheringTriggerScript() !== null) $body['joinGatheringTriggerScript'] = $request->getJoinGatheringTriggerScript();
        if($request->getJoinGatheringDoneTriggerScript() !== null) $body['joinGatheringDoneTriggerScript'] = $request->getJoinGatheringDoneTriggerScript();
        if($request->getLeaveGatheringTriggerScript() !== null) $body['leaveGatheringTriggerScript'] = $request->getLeaveGatheringTriggerScript();
        if($request->getLeaveGatheringDoneTriggerScript() !== null) $body['leaveGatheringDoneTriggerScript'] = $request->getLeaveGatheringDoneTriggerScript();
        if($request->getBreakupGatheringTriggerScript() !== null) $body['breakupGatheringTriggerScript'] = $request->getBreakupGatheringTriggerScript();
        if($request->getMatchmakingCompleteTriggerScript() !== null) $body['matchmakingCompleteTriggerScript'] = $request->getMatchmakingCompleteTriggerScript();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            CreateMatchmakingRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateMatchmakingResult($result);
    }

	/**
	 * マッチメイキングを削除します<br>
	 * <br>
	 *
	 * @param DeleteMatchmakingRequest $request リクエストパラメータ
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
	public function deleteMatchmaking(DeleteMatchmakingRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            DeleteMatchmakingRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * マッチメイキングの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeMatchmakingRequest $request リクエストパラメータ
	 * @return DescribeMatchmakingResult 結果
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
	public function describeMatchmaking(DescribeMatchmakingRequest $request): DescribeMatchmakingResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking";

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
            Gs2Matchmaking::MODULE,
            DescribeMatchmakingRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeMatchmakingResult($result);
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
	    $url = self::ENDPOINT_HOST. "/matchmaking/serviceClass";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            DescribeServiceClassRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeServiceClassResult($result);
    }

	/**
	 * マッチメイキングを取得します<br>
	 * <br>
	 *
	 * @param GetMatchmakingRequest $request リクエストパラメータ
	 * @return GetMatchmakingResult 結果
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
	public function getMatchmaking(GetMatchmakingRequest $request): GetMatchmakingResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            GetMatchmakingRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMatchmakingResult($result);
    }

	/**
	 * マッチメイキングのステータスを取得します<br>
	 * <br>
	 *
	 * @param GetMatchmakingStatusRequest $request リクエストパラメータ
	 * @return GetMatchmakingStatusResult 結果
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
	public function getMatchmakingStatus(GetMatchmakingStatusRequest $request): GetMatchmakingStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            GetMatchmakingStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetMatchmakingStatusResult($result);
    }

	/**
	 * マッチメイキングを更新します<br>
	 * <br>
	 *
	 * @param UpdateMatchmakingRequest $request リクエストパラメータ
	 * @return UpdateMatchmakingResult 結果
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
	public function updateMatchmaking(UpdateMatchmakingRequest $request): UpdateMatchmakingResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['serviceClass'] = $request->getServiceClass();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getGatheringPoolName() !== null) $body['gatheringPoolName'] = $request->getGatheringPoolName();
        if($request->getCallback() !== null) $body['callback'] = $request->getCallback();
        if($request->getNotificationGameName() !== null) $body['notificationGameName'] = $request->getNotificationGameName();
        if($request->getCreateGatheringTriggerScript() !== null) $body['createGatheringTriggerScript'] = $request->getCreateGatheringTriggerScript();
        if($request->getCreateGatheringDoneTriggerScript() !== null) $body['createGatheringDoneTriggerScript'] = $request->getCreateGatheringDoneTriggerScript();
        if($request->getJoinGatheringTriggerScript() !== null) $body['joinGatheringTriggerScript'] = $request->getJoinGatheringTriggerScript();
        if($request->getJoinGatheringDoneTriggerScript() !== null) $body['joinGatheringDoneTriggerScript'] = $request->getJoinGatheringDoneTriggerScript();
        if($request->getLeaveGatheringTriggerScript() !== null) $body['leaveGatheringTriggerScript'] = $request->getLeaveGatheringTriggerScript();
        if($request->getLeaveGatheringDoneTriggerScript() !== null) $body['leaveGatheringDoneTriggerScript'] = $request->getLeaveGatheringDoneTriggerScript();
        if($request->getBreakupGatheringTriggerScript() !== null) $body['breakupGatheringTriggerScript'] = $request->getBreakupGatheringTriggerScript();
        if($request->getMatchmakingCompleteTriggerScript() !== null) $body['matchmakingCompleteTriggerScript'] = $request->getMatchmakingCompleteTriggerScript();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            UpdateMatchmakingRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateMatchmakingResult($result);
    }

	/**
	 * ギャザリングを解散します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param PasscodeBreakupGatheringRequest $request リクエストパラメータ
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
	public function passcodeBreakupGathering(PasscodeBreakupGatheringRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/passcode/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            PasscodeBreakupGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * パスコード付きギャザリングを新規作成します<br>
	 * <br>
	 * パスコードは8桁の数字で構成されたものが自動的に発行されます。<br>
	 * パスコードの解像度的に秒間100を超える勢いでギャザリングを作成する必要がある場合は<br>
	 * オートマッチメイキングと組み合わせる必要があります。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param PasscodeCreateGatheringRequest $request リクエストパラメータ
	 * @return PasscodeCreateGatheringResult 結果
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
	public function passcodeCreateGathering(PasscodeCreateGatheringRequest $request): PasscodeCreateGatheringResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/passcode";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            PasscodeCreateGatheringRequest::FUNCTION,
            $body,
            $headers
        );
        return new PasscodeCreateGatheringResult($result);
    }

	/**
	 * ギャザリングの参加者一覧を取得します<br>
	 * <br>
	 * マッチメイキングが成立すると 404 Not Found 応答が返るようになります。<br>
	 * 404応答を返すようになる直前にコールバックエンドポイントに確定した参加者一覧情報が渡されるため、<br>
	 * コールバックを受け取ってからは本APIを呼び出さないように実装するべきです。<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param PasscodeDescribeJoinedUserRequest $request リクエストパラメータ
	 * @return PasscodeDescribeJoinedUserResult 結果
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
	public function passcodeDescribeJoinedUser(PasscodeDescribeJoinedUserRequest $request): PasscodeDescribeJoinedUserResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/passcode/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/player";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            PasscodeDescribeJoinedUserRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new PasscodeDescribeJoinedUserResult($result);
    }

	/**
	 * マッチメイキングを早期終了します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param PasscodeEarlyCompleteGatheringRequest $request リクエストパラメータ
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
	public function passcodeEarlyCompleteGathering(PasscodeEarlyCompleteGatheringRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/passcode/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/complete";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            PasscodeEarlyCompleteGatheringRequest::FUNCTION,
            $body,
            $headers
        );
    }

	/**
	 * パスコード付きギャザリングに参加します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param PasscodeJoinGatheringRequest $request リクエストパラメータ
	 * @return PasscodeJoinGatheringResult 結果
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
	public function passcodeJoinGathering(PasscodeJoinGatheringRequest $request): PasscodeJoinGatheringResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/passcode/join/". ($request->getPasscode() === null || $request->getPasscode() === "" ? "null" : $request->getPasscode()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            PasscodeJoinGatheringRequest::FUNCTION,
            $body,
            $headers
        );
        return new PasscodeJoinGatheringResult($result);
    }

	/**
	 * ギャザリングから離脱します<br>
	 * <br>
	 * 本APIは確実に成功することを保証していません。<br>
	 * 例えば、離脱する直前にギャザリングが成立した場合は 404 Not Found を応答します。<br>
	 * <br>
	 * 404応答を受け取った場合はすでにギャザリングが成立していないかを確認する必要があります。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param PasscodeLeaveGatheringRequest $request リクエストパラメータ
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
	public function passcodeLeaveGathering(PasscodeLeaveGatheringRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/passcode/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/player";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            PasscodeLeaveGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ギャザリングを解散します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param RoomBreakupGatheringRequest $request リクエストパラメータ
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
	public function roomBreakupGathering(RoomBreakupGatheringRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/room/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            RoomBreakupGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ギャザリングを新規作成します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param RoomCreateGatheringRequest $request リクエストパラメータ
	 * @return RoomCreateGatheringResult 結果
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
	public function roomCreateGathering(RoomCreateGatheringRequest $request): RoomCreateGatheringResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/room";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        if($request->getMeta() !== null) $body['meta'] = $request->getMeta();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            RoomCreateGatheringRequest::FUNCTION,
            $body,
            $headers
        );
        return new RoomCreateGatheringResult($result);
    }

	/**
	 * ギャザリング一覧を取得します<br>
	 * <br>
	 * - 消費クオータ: 20件あたり3クオータ<br>
	 * <br>
	 *
	 * @param RoomDescribeGatheringRequest $request リクエストパラメータ
	 * @return RoomDescribeGatheringResult 結果
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
	public function roomDescribeGathering(RoomDescribeGatheringRequest $request): RoomDescribeGatheringResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/room";

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
            Gs2Matchmaking::MODULE,
            RoomDescribeGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new RoomDescribeGatheringResult($result);
    }

	/**
	 * ギャザリングの参加者一覧を取得します<br>
	 * <br>
	 * マッチメイキングが成立すると 404 Not Found 応答が返るようになります。<br>
	 * 404応答を返すようになる直前にコールバックエンドポイントに確定した参加者一覧情報が渡されるため、<br>
	 * コールバックを受け取ってからは本APIを呼び出さないように実装するべきです。<br>
	 * <br>
	 * - 消費クオータ: 3<br>
	 * <br>
	 *
	 * @param RoomDescribeJoinedUserRequest $request リクエストパラメータ
	 * @return RoomDescribeJoinedUserResult 結果
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
	public function roomDescribeJoinedUser(RoomDescribeJoinedUserRequest $request): RoomDescribeJoinedUserResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/room/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/player";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            RoomDescribeJoinedUserRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new RoomDescribeJoinedUserResult($result);
    }

	/**
	 * マッチメイキングを早期終了します<br>
	 * <br>
	 *     - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param RoomEarlyCompleteGatheringRequest $request リクエストパラメータ
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
	public function roomEarlyCompleteGathering(RoomEarlyCompleteGatheringRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/room/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/complete";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            RoomEarlyCompleteGatheringRequest::FUNCTION,
            $body,
            $headers
        );
    }

	/**
	 * ギャザリングに参加します<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param RoomJoinGatheringRequest $request リクエストパラメータ
	 * @return RoomJoinGatheringResult 結果
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
	public function roomJoinGathering(RoomJoinGatheringRequest $request): RoomJoinGatheringResult
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/room/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            RoomJoinGatheringRequest::FUNCTION,
            $body,
            $headers
        );
        return new RoomJoinGatheringResult($result);
    }

	/**
	 * ギャザリングから離脱します<br>
	 * <br>
	 * 本APIは確実に成功することを保証していません。<br>
	 * 例えば、離脱する直前にギャザリングが成立した場合は 404 Not Found を応答します。<br>
	 * <br>
	 * 404応答を受け取った場合はすでにギャザリングが成立していないかを確認する必要があります。<br>
	 * <br>
	 * - 消費クオータ: 10<br>
	 * <br>
	 *
	 * @param RoomLeaveGatheringRequest $request リクエストパラメータ
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
	public function roomLeaveGathering(RoomLeaveGatheringRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/matchmaking/". ($request->getMatchmakingName() === null || $request->getMatchmakingName() === "" ? "null" : $request->getMatchmakingName()). "/room/". ($request->getGatheringId() === null || $request->getGatheringId() === "" ? "null" : $request->getGatheringId()). "/player";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2Matchmaking::MODULE,
            RoomLeaveGatheringRequest::FUNCTION,
            $queryString,
            $headers
        );
    }
}