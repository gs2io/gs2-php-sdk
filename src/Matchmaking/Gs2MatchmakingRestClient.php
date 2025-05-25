<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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
use Gs2\Core\Exception\Gs2Exception;
use Gs2\Core\Model\AsyncAction;
use Gs2\Core\Model\AsyncResult;
use Gs2\Core\Net\Gs2RestResponse;
use Gs2\Core\Net\Gs2RestSession;
use Gs2\Core\Net\Gs2RestSessionTask;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;


use Gs2\Matchmaking\Request\DescribeNamespacesRequest;
use Gs2\Matchmaking\Result\DescribeNamespacesResult;
use Gs2\Matchmaking\Request\CreateNamespaceRequest;
use Gs2\Matchmaking\Result\CreateNamespaceResult;
use Gs2\Matchmaking\Request\GetNamespaceStatusRequest;
use Gs2\Matchmaking\Result\GetNamespaceStatusResult;
use Gs2\Matchmaking\Request\GetNamespaceRequest;
use Gs2\Matchmaking\Result\GetNamespaceResult;
use Gs2\Matchmaking\Request\UpdateNamespaceRequest;
use Gs2\Matchmaking\Result\UpdateNamespaceResult;
use Gs2\Matchmaking\Request\DeleteNamespaceRequest;
use Gs2\Matchmaking\Result\DeleteNamespaceResult;
use Gs2\Matchmaking\Request\GetServiceVersionRequest;
use Gs2\Matchmaking\Result\GetServiceVersionResult;
use Gs2\Matchmaking\Request\DumpUserDataByUserIdRequest;
use Gs2\Matchmaking\Result\DumpUserDataByUserIdResult;
use Gs2\Matchmaking\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Matchmaking\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Matchmaking\Request\CleanUserDataByUserIdRequest;
use Gs2\Matchmaking\Result\CleanUserDataByUserIdResult;
use Gs2\Matchmaking\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Matchmaking\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Matchmaking\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Matchmaking\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Matchmaking\Request\ImportUserDataByUserIdRequest;
use Gs2\Matchmaking\Result\ImportUserDataByUserIdResult;
use Gs2\Matchmaking\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Matchmaking\Result\CheckImportUserDataByUserIdResult;
use Gs2\Matchmaking\Request\DescribeGatheringsRequest;
use Gs2\Matchmaking\Result\DescribeGatheringsResult;
use Gs2\Matchmaking\Request\CreateGatheringRequest;
use Gs2\Matchmaking\Result\CreateGatheringResult;
use Gs2\Matchmaking\Request\CreateGatheringByUserIdRequest;
use Gs2\Matchmaking\Result\CreateGatheringByUserIdResult;
use Gs2\Matchmaking\Request\UpdateGatheringRequest;
use Gs2\Matchmaking\Result\UpdateGatheringResult;
use Gs2\Matchmaking\Request\UpdateGatheringByUserIdRequest;
use Gs2\Matchmaking\Result\UpdateGatheringByUserIdResult;
use Gs2\Matchmaking\Request\DoMatchmakingByPlayerRequest;
use Gs2\Matchmaking\Result\DoMatchmakingByPlayerResult;
use Gs2\Matchmaking\Request\DoMatchmakingRequest;
use Gs2\Matchmaking\Result\DoMatchmakingResult;
use Gs2\Matchmaking\Request\DoMatchmakingByUserIdRequest;
use Gs2\Matchmaking\Result\DoMatchmakingByUserIdResult;
use Gs2\Matchmaking\Request\PingRequest;
use Gs2\Matchmaking\Result\PingResult;
use Gs2\Matchmaking\Request\PingByUserIdRequest;
use Gs2\Matchmaking\Result\PingByUserIdResult;
use Gs2\Matchmaking\Request\GetGatheringRequest;
use Gs2\Matchmaking\Result\GetGatheringResult;
use Gs2\Matchmaking\Request\CancelMatchmakingRequest;
use Gs2\Matchmaking\Result\CancelMatchmakingResult;
use Gs2\Matchmaking\Request\CancelMatchmakingByUserIdRequest;
use Gs2\Matchmaking\Result\CancelMatchmakingByUserIdResult;
use Gs2\Matchmaking\Request\EarlyCompleteRequest;
use Gs2\Matchmaking\Result\EarlyCompleteResult;
use Gs2\Matchmaking\Request\EarlyCompleteByUserIdRequest;
use Gs2\Matchmaking\Result\EarlyCompleteByUserIdResult;
use Gs2\Matchmaking\Request\DeleteGatheringRequest;
use Gs2\Matchmaking\Result\DeleteGatheringResult;
use Gs2\Matchmaking\Request\DescribeRatingModelMastersRequest;
use Gs2\Matchmaking\Result\DescribeRatingModelMastersResult;
use Gs2\Matchmaking\Request\CreateRatingModelMasterRequest;
use Gs2\Matchmaking\Result\CreateRatingModelMasterResult;
use Gs2\Matchmaking\Request\GetRatingModelMasterRequest;
use Gs2\Matchmaking\Result\GetRatingModelMasterResult;
use Gs2\Matchmaking\Request\UpdateRatingModelMasterRequest;
use Gs2\Matchmaking\Result\UpdateRatingModelMasterResult;
use Gs2\Matchmaking\Request\DeleteRatingModelMasterRequest;
use Gs2\Matchmaking\Result\DeleteRatingModelMasterResult;
use Gs2\Matchmaking\Request\DescribeRatingModelsRequest;
use Gs2\Matchmaking\Result\DescribeRatingModelsResult;
use Gs2\Matchmaking\Request\GetRatingModelRequest;
use Gs2\Matchmaking\Result\GetRatingModelResult;
use Gs2\Matchmaking\Request\ExportMasterRequest;
use Gs2\Matchmaking\Result\ExportMasterResult;
use Gs2\Matchmaking\Request\GetCurrentModelMasterRequest;
use Gs2\Matchmaking\Result\GetCurrentModelMasterResult;
use Gs2\Matchmaking\Request\PreUpdateCurrentModelMasterRequest;
use Gs2\Matchmaking\Result\PreUpdateCurrentModelMasterResult;
use Gs2\Matchmaking\Request\UpdateCurrentModelMasterRequest;
use Gs2\Matchmaking\Result\UpdateCurrentModelMasterResult;
use Gs2\Matchmaking\Request\UpdateCurrentModelMasterFromGitHubRequest;
use Gs2\Matchmaking\Result\UpdateCurrentModelMasterFromGitHubResult;
use Gs2\Matchmaking\Request\DescribeSeasonModelsRequest;
use Gs2\Matchmaking\Result\DescribeSeasonModelsResult;
use Gs2\Matchmaking\Request\GetSeasonModelRequest;
use Gs2\Matchmaking\Result\GetSeasonModelResult;
use Gs2\Matchmaking\Request\DescribeSeasonModelMastersRequest;
use Gs2\Matchmaking\Result\DescribeSeasonModelMastersResult;
use Gs2\Matchmaking\Request\CreateSeasonModelMasterRequest;
use Gs2\Matchmaking\Result\CreateSeasonModelMasterResult;
use Gs2\Matchmaking\Request\GetSeasonModelMasterRequest;
use Gs2\Matchmaking\Result\GetSeasonModelMasterResult;
use Gs2\Matchmaking\Request\UpdateSeasonModelMasterRequest;
use Gs2\Matchmaking\Result\UpdateSeasonModelMasterResult;
use Gs2\Matchmaking\Request\DeleteSeasonModelMasterRequest;
use Gs2\Matchmaking\Result\DeleteSeasonModelMasterResult;
use Gs2\Matchmaking\Request\DescribeSeasonGatheringsRequest;
use Gs2\Matchmaking\Result\DescribeSeasonGatheringsResult;
use Gs2\Matchmaking\Request\DescribeMatchmakingSeasonGatheringsRequest;
use Gs2\Matchmaking\Result\DescribeMatchmakingSeasonGatheringsResult;
use Gs2\Matchmaking\Request\DoSeasonMatchmakingRequest;
use Gs2\Matchmaking\Result\DoSeasonMatchmakingResult;
use Gs2\Matchmaking\Request\DoSeasonMatchmakingByUserIdRequest;
use Gs2\Matchmaking\Result\DoSeasonMatchmakingByUserIdResult;
use Gs2\Matchmaking\Request\GetSeasonGatheringRequest;
use Gs2\Matchmaking\Result\GetSeasonGatheringResult;
use Gs2\Matchmaking\Request\VerifyIncludeParticipantRequest;
use Gs2\Matchmaking\Result\VerifyIncludeParticipantResult;
use Gs2\Matchmaking\Request\VerifyIncludeParticipantByUserIdRequest;
use Gs2\Matchmaking\Result\VerifyIncludeParticipantByUserIdResult;
use Gs2\Matchmaking\Request\DeleteSeasonGatheringRequest;
use Gs2\Matchmaking\Result\DeleteSeasonGatheringResult;
use Gs2\Matchmaking\Request\VerifyIncludeParticipantByStampTaskRequest;
use Gs2\Matchmaking\Result\VerifyIncludeParticipantByStampTaskResult;
use Gs2\Matchmaking\Request\DescribeJoinedSeasonGatheringsRequest;
use Gs2\Matchmaking\Result\DescribeJoinedSeasonGatheringsResult;
use Gs2\Matchmaking\Request\DescribeJoinedSeasonGatheringsByUserIdRequest;
use Gs2\Matchmaking\Result\DescribeJoinedSeasonGatheringsByUserIdResult;
use Gs2\Matchmaking\Request\GetJoinedSeasonGatheringRequest;
use Gs2\Matchmaking\Result\GetJoinedSeasonGatheringResult;
use Gs2\Matchmaking\Request\GetJoinedSeasonGatheringByUserIdRequest;
use Gs2\Matchmaking\Result\GetJoinedSeasonGatheringByUserIdResult;
use Gs2\Matchmaking\Request\DescribeRatingsRequest;
use Gs2\Matchmaking\Result\DescribeRatingsResult;
use Gs2\Matchmaking\Request\DescribeRatingsByUserIdRequest;
use Gs2\Matchmaking\Result\DescribeRatingsByUserIdResult;
use Gs2\Matchmaking\Request\GetRatingRequest;
use Gs2\Matchmaking\Result\GetRatingResult;
use Gs2\Matchmaking\Request\GetRatingByUserIdRequest;
use Gs2\Matchmaking\Result\GetRatingByUserIdResult;
use Gs2\Matchmaking\Request\PutResultRequest;
use Gs2\Matchmaking\Result\PutResultResult;
use Gs2\Matchmaking\Request\DeleteRatingRequest;
use Gs2\Matchmaking\Result\DeleteRatingResult;
use Gs2\Matchmaking\Request\GetBallotRequest;
use Gs2\Matchmaking\Result\GetBallotResult;
use Gs2\Matchmaking\Request\GetBallotByUserIdRequest;
use Gs2\Matchmaking\Result\GetBallotByUserIdResult;
use Gs2\Matchmaking\Request\VoteRequest;
use Gs2\Matchmaking\Result\VoteResult;
use Gs2\Matchmaking\Request\VoteMultipleRequest;
use Gs2\Matchmaking\Result\VoteMultipleResult;
use Gs2\Matchmaking\Request\CommitVoteRequest;
use Gs2\Matchmaking\Result\CommitVoteResult;

class DescribeNamespacesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeNamespacesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeNamespacesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeNamespacesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeNamespacesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeNamespacesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CreateNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var CreateNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param CreateNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            CreateNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEnableRating() !== null) {
            $json["enableRating"] = $this->request->getEnableRating();
        }
        if ($this->request->getEnableDisconnectDetection() !== null) {
            $json["enableDisconnectDetection"] = $this->request->getEnableDisconnectDetection();
        }
        if ($this->request->getDisconnectDetectionTimeoutSeconds() !== null) {
            $json["disconnectDetectionTimeoutSeconds"] = $this->request->getDisconnectDetectionTimeoutSeconds();
        }
        if ($this->request->getCreateGatheringTriggerType() !== null) {
            $json["createGatheringTriggerType"] = $this->request->getCreateGatheringTriggerType();
        }
        if ($this->request->getCreateGatheringTriggerRealtimeNamespaceId() !== null) {
            $json["createGatheringTriggerRealtimeNamespaceId"] = $this->request->getCreateGatheringTriggerRealtimeNamespaceId();
        }
        if ($this->request->getCreateGatheringTriggerScriptId() !== null) {
            $json["createGatheringTriggerScriptId"] = $this->request->getCreateGatheringTriggerScriptId();
        }
        if ($this->request->getCompleteMatchmakingTriggerType() !== null) {
            $json["completeMatchmakingTriggerType"] = $this->request->getCompleteMatchmakingTriggerType();
        }
        if ($this->request->getCompleteMatchmakingTriggerRealtimeNamespaceId() !== null) {
            $json["completeMatchmakingTriggerRealtimeNamespaceId"] = $this->request->getCompleteMatchmakingTriggerRealtimeNamespaceId();
        }
        if ($this->request->getCompleteMatchmakingTriggerScriptId() !== null) {
            $json["completeMatchmakingTriggerScriptId"] = $this->request->getCompleteMatchmakingTriggerScriptId();
        }
        if ($this->request->getEnableCollaborateSeasonRating() !== null) {
            $json["enableCollaborateSeasonRating"] = $this->request->getEnableCollaborateSeasonRating();
        }
        if ($this->request->getCollaborateSeasonRatingNamespaceId() !== null) {
            $json["collaborateSeasonRatingNamespaceId"] = $this->request->getCollaborateSeasonRatingNamespaceId();
        }
        if ($this->request->getCollaborateSeasonRatingTtl() !== null) {
            $json["collaborateSeasonRatingTtl"] = $this->request->getCollaborateSeasonRatingTtl();
        }
        if ($this->request->getChangeRatingScript() !== null) {
            $json["changeRatingScript"] = $this->request->getChangeRatingScript()->toJson();
        }
        if ($this->request->getJoinNotification() !== null) {
            $json["joinNotification"] = $this->request->getJoinNotification()->toJson();
        }
        if ($this->request->getLeaveNotification() !== null) {
            $json["leaveNotification"] = $this->request->getLeaveNotification()->toJson();
        }
        if ($this->request->getCompleteNotification() !== null) {
            $json["completeNotification"] = $this->request->getCompleteNotification()->toJson();
        }
        if ($this->request->getChangeRatingNotification() !== null) {
            $json["changeRatingNotification"] = $this->request->getChangeRatingNotification()->toJson();
        }
        if ($this->request->getLogSetting() !== null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetNamespaceStatusTask extends Gs2RestSessionTask {

    /**
     * @var GetNamespaceStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetNamespaceStatusTask constructor.
     * @param Gs2RestSession $session
     * @param GetNamespaceStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetNamespaceStatusRequest $request
    ) {
        parent::__construct(
            $session,
            GetNamespaceStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var GetNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param GetNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            GetNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var UpdateNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEnableRating() !== null) {
            $json["enableRating"] = $this->request->getEnableRating();
        }
        if ($this->request->getEnableDisconnectDetection() !== null) {
            $json["enableDisconnectDetection"] = $this->request->getEnableDisconnectDetection();
        }
        if ($this->request->getDisconnectDetectionTimeoutSeconds() !== null) {
            $json["disconnectDetectionTimeoutSeconds"] = $this->request->getDisconnectDetectionTimeoutSeconds();
        }
        if ($this->request->getCreateGatheringTriggerType() !== null) {
            $json["createGatheringTriggerType"] = $this->request->getCreateGatheringTriggerType();
        }
        if ($this->request->getCreateGatheringTriggerRealtimeNamespaceId() !== null) {
            $json["createGatheringTriggerRealtimeNamespaceId"] = $this->request->getCreateGatheringTriggerRealtimeNamespaceId();
        }
        if ($this->request->getCreateGatheringTriggerScriptId() !== null) {
            $json["createGatheringTriggerScriptId"] = $this->request->getCreateGatheringTriggerScriptId();
        }
        if ($this->request->getCompleteMatchmakingTriggerType() !== null) {
            $json["completeMatchmakingTriggerType"] = $this->request->getCompleteMatchmakingTriggerType();
        }
        if ($this->request->getCompleteMatchmakingTriggerRealtimeNamespaceId() !== null) {
            $json["completeMatchmakingTriggerRealtimeNamespaceId"] = $this->request->getCompleteMatchmakingTriggerRealtimeNamespaceId();
        }
        if ($this->request->getCompleteMatchmakingTriggerScriptId() !== null) {
            $json["completeMatchmakingTriggerScriptId"] = $this->request->getCompleteMatchmakingTriggerScriptId();
        }
        if ($this->request->getEnableCollaborateSeasonRating() !== null) {
            $json["enableCollaborateSeasonRating"] = $this->request->getEnableCollaborateSeasonRating();
        }
        if ($this->request->getCollaborateSeasonRatingNamespaceId() !== null) {
            $json["collaborateSeasonRatingNamespaceId"] = $this->request->getCollaborateSeasonRatingNamespaceId();
        }
        if ($this->request->getCollaborateSeasonRatingTtl() !== null) {
            $json["collaborateSeasonRatingTtl"] = $this->request->getCollaborateSeasonRatingTtl();
        }
        if ($this->request->getChangeRatingScript() !== null) {
            $json["changeRatingScript"] = $this->request->getChangeRatingScript()->toJson();
        }
        if ($this->request->getJoinNotification() !== null) {
            $json["joinNotification"] = $this->request->getJoinNotification()->toJson();
        }
        if ($this->request->getLeaveNotification() !== null) {
            $json["leaveNotification"] = $this->request->getLeaveNotification()->toJson();
        }
        if ($this->request->getCompleteNotification() !== null) {
            $json["completeNotification"] = $this->request->getCompleteNotification()->toJson();
        }
        if ($this->request->getChangeRatingNotification() !== null) {
            $json["changeRatingNotification"] = $this->request->getChangeRatingNotification()->toJson();
        }
        if ($this->request->getLogSetting() !== null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DeleteNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var DeleteNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetServiceVersionTask extends Gs2RestSessionTask {

    /**
     * @var GetServiceVersionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetServiceVersionTask constructor.
     * @param Gs2RestSession $session
     * @param GetServiceVersionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetServiceVersionRequest $request
    ) {
        parent::__construct(
            $session,
            GetServiceVersionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DumpUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DumpUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DumpUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DumpUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DumpUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DumpUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckDumpUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckDumpUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckDumpUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckDumpUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckDumpUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckDumpUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CleanUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CleanUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CleanUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CleanUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CleanUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CleanUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckCleanUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckCleanUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckCleanUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckCleanUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckCleanUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckCleanUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class PrepareImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PrepareImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class ImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getUploadToken() !== null) {
            $json["uploadToken"] = $this->request->getUploadToken();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{uploadToken}", $this->request->getUploadToken() === null|| strlen($this->request->getUploadToken()) == 0 ? "null" : $this->request->getUploadToken(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DescribeGatheringsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGatheringsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGatheringsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGatheringsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGatheringsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGatheringsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CreateGatheringTask extends Gs2RestSessionTask {

    /**
     * @var CreateGatheringRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGatheringTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGatheringRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGatheringRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGatheringResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getPlayer() !== null) {
            $json["player"] = $this->request->getPlayer()->toJson();
        }
        if ($this->request->getAttributeRanges() !== null) {
            $array = [];
            foreach ($this->request->getAttributeRanges() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["attributeRanges"] = $array;
        }
        if ($this->request->getCapacityOfRoles() !== null) {
            $array = [];
            foreach ($this->request->getCapacityOfRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["capacityOfRoles"] = $array;
        }
        if ($this->request->getAllowUserIds() !== null) {
            $array = [];
            foreach ($this->request->getAllowUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["allowUserIds"] = $array;
        }
        if ($this->request->getExpiresAt() !== null) {
            $json["expiresAt"] = $this->request->getExpiresAt();
        }
        if ($this->request->getExpiresAtTimeSpan() !== null) {
            $json["expiresAtTimeSpan"] = $this->request->getExpiresAtTimeSpan()->toJson();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class CreateGatheringByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreateGatheringByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGatheringByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGatheringByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGatheringByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGatheringByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getPlayer() !== null) {
            $json["player"] = $this->request->getPlayer()->toJson();
        }
        if ($this->request->getAttributeRanges() !== null) {
            $array = [];
            foreach ($this->request->getAttributeRanges() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["attributeRanges"] = $array;
        }
        if ($this->request->getCapacityOfRoles() !== null) {
            $array = [];
            foreach ($this->request->getCapacityOfRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["capacityOfRoles"] = $array;
        }
        if ($this->request->getAllowUserIds() !== null) {
            $array = [];
            foreach ($this->request->getAllowUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["allowUserIds"] = $array;
        }
        if ($this->request->getExpiresAt() !== null) {
            $json["expiresAt"] = $this->request->getExpiresAt();
        }
        if ($this->request->getExpiresAtTimeSpan() !== null) {
            $json["expiresAtTimeSpan"] = $this->request->getExpiresAtTimeSpan()->toJson();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class UpdateGatheringTask extends Gs2RestSessionTask {

    /**
     * @var UpdateGatheringRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateGatheringTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateGatheringRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateGatheringRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateGatheringResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $json = [];
        if ($this->request->getAttributeRanges() !== null) {
            $array = [];
            foreach ($this->request->getAttributeRanges() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["attributeRanges"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class UpdateGatheringByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UpdateGatheringByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateGatheringByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateGatheringByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateGatheringByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateGatheringByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getAttributeRanges() !== null) {
            $array = [];
            foreach ($this->request->getAttributeRanges() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["attributeRanges"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DoMatchmakingByPlayerTask extends Gs2RestSessionTask {

    /**
     * @var DoMatchmakingByPlayerRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DoMatchmakingByPlayerTask constructor.
     * @param Gs2RestSession $session
     * @param DoMatchmakingByPlayerRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DoMatchmakingByPlayerRequest $request
    ) {
        parent::__construct(
            $session,
            DoMatchmakingByPlayerResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/player/do";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getPlayer() !== null) {
            $json["player"] = $this->request->getPlayer()->toJson();
        }
        if ($this->request->getMatchmakingContextToken() !== null) {
            $json["matchmakingContextToken"] = $this->request->getMatchmakingContextToken();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DoMatchmakingTask extends Gs2RestSessionTask {

    /**
     * @var DoMatchmakingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DoMatchmakingTask constructor.
     * @param Gs2RestSession $session
     * @param DoMatchmakingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DoMatchmakingRequest $request
    ) {
        parent::__construct(
            $session,
            DoMatchmakingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/do";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getPlayer() !== null) {
            $json["player"] = $this->request->getPlayer()->toJson();
        }
        if ($this->request->getMatchmakingContextToken() !== null) {
            $json["matchmakingContextToken"] = $this->request->getMatchmakingContextToken();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DoMatchmakingByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DoMatchmakingByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DoMatchmakingByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DoMatchmakingByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DoMatchmakingByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DoMatchmakingByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/gathering/do";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getPlayer() !== null) {
            $json["player"] = $this->request->getPlayer()->toJson();
        }
        if ($this->request->getMatchmakingContextToken() !== null) {
            $json["matchmakingContextToken"] = $this->request->getMatchmakingContextToken();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class PingTask extends Gs2RestSessionTask {

    /**
     * @var PingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PingTask constructor.
     * @param Gs2RestSession $session
     * @param PingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PingRequest $request
    ) {
        parent::__construct(
            $session,
            PingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}/ping";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class PingByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PingByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PingByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PingByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PingByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PingByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}/user/{userId}/ping";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetGatheringTask extends Gs2RestSessionTask {

    /**
     * @var GetGatheringRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGatheringTask constructor.
     * @param Gs2RestSession $session
     * @param GetGatheringRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGatheringRequest $request
    ) {
        parent::__construct(
            $session,
            GetGatheringResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CancelMatchmakingTask extends Gs2RestSessionTask {

    /**
     * @var CancelMatchmakingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CancelMatchmakingTask constructor.
     * @param Gs2RestSession $session
     * @param CancelMatchmakingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CancelMatchmakingRequest $request
    ) {
        parent::__construct(
            $session,
            CancelMatchmakingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}/user/me";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class CancelMatchmakingByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CancelMatchmakingByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CancelMatchmakingByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CancelMatchmakingByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CancelMatchmakingByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CancelMatchmakingByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class EarlyCompleteTask extends Gs2RestSessionTask {

    /**
     * @var EarlyCompleteRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * EarlyCompleteTask constructor.
     * @param Gs2RestSession $session
     * @param EarlyCompleteRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        EarlyCompleteRequest $request
    ) {
        parent::__construct(
            $session,
            EarlyCompleteResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}/user/me/early";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class EarlyCompleteByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var EarlyCompleteByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * EarlyCompleteByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param EarlyCompleteByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        EarlyCompleteByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            EarlyCompleteByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}/user/{userId}/early";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeleteGatheringTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGatheringRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGatheringTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGatheringRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGatheringRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGatheringResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/gathering/{gatheringName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeRatingModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRatingModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRatingModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRatingModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRatingModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRatingModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/rating";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CreateRatingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateRatingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateRatingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateRatingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateRatingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateRatingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/rating";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getInitialValue() !== null) {
            $json["initialValue"] = $this->request->getInitialValue();
        }
        if ($this->request->getVolatility() !== null) {
            $json["volatility"] = $this->request->getVolatility();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetRatingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetRatingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRatingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetRatingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRatingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetRatingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/rating/{ratingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateRatingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateRatingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateRatingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateRatingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateRatingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateRatingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/rating/{ratingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getInitialValue() !== null) {
            $json["initialValue"] = $this->request->getInitialValue();
        }
        if ($this->request->getVolatility() !== null) {
            $json["volatility"] = $this->request->getVolatility();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DeleteRatingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRatingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRatingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRatingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRatingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRatingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/rating/{ratingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeRatingModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRatingModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRatingModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRatingModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRatingModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRatingModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/rating";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetRatingModelTask extends Gs2RestSessionTask {

    /**
     * @var GetRatingModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRatingModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetRatingModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRatingModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetRatingModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/rating/{ratingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class ExportMasterTask extends Gs2RestSessionTask {

    /**
     * @var ExportMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ExportMasterTask constructor.
     * @param Gs2RestSession $session
     * @param ExportMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ExportMasterRequest $request
    ) {
        parent::__construct(
            $session,
            ExportMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class PreUpdateCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentModelMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentModelMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentModelMasterResult $res */
            $res = $this->session->execute($task)->wait();

            (new \GuzzleHttp\Client())
                ->put($res->getUploadUrl(), [
                    'timeout' => 60,
                    'body' => $this->request->getSettings(),
                    'headers' => [
                        "Content-Type" => "application/json",
                    ],
                ]);
            $this->request = $this->request
                ->withMode("preUpload")
                ->withUploadToken($res->getUploadToken())
                ->withSettings(null);
        }

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getSettings() !== null) {
            $json["settings"] = $this->request->getSettings();
        }
        if ($this->request->getUploadToken() !== null) {
            $json["uploadToken"] = $this->request->getUploadToken();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateCurrentModelMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentModelMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentModelMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentModelMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentModelMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCheckoutSetting() !== null) {
            $json["checkoutSetting"] = $this->request->getCheckoutSetting()->toJson();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeSeasonModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSeasonModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSeasonModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSeasonModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSeasonModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSeasonModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/season";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetSeasonModelTask extends Gs2RestSessionTask {

    /**
     * @var GetSeasonModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSeasonModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetSeasonModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSeasonModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetSeasonModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/season/{seasonName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeSeasonModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSeasonModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSeasonModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSeasonModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSeasonModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSeasonModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/season";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CreateSeasonModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateSeasonModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateSeasonModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateSeasonModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateSeasonModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateSeasonModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/season";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getMaximumParticipants() !== null) {
            $json["maximumParticipants"] = $this->request->getMaximumParticipants();
        }
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getChallengePeriodEventId() !== null) {
            $json["challengePeriodEventId"] = $this->request->getChallengePeriodEventId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetSeasonModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetSeasonModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSeasonModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetSeasonModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSeasonModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetSeasonModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/season/{seasonName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateSeasonModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateSeasonModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateSeasonModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateSeasonModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateSeasonModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateSeasonModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/season/{seasonName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getMaximumParticipants() !== null) {
            $json["maximumParticipants"] = $this->request->getMaximumParticipants();
        }
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getChallengePeriodEventId() !== null) {
            $json["challengePeriodEventId"] = $this->request->getChallengePeriodEventId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DeleteSeasonModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSeasonModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSeasonModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSeasonModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSeasonModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSeasonModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/season/{seasonName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeSeasonGatheringsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSeasonGatheringsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSeasonGatheringsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSeasonGatheringsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSeasonGatheringsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSeasonGatheringsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/season/{seasonName}/{season}/gathering";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);
        $url = str_replace("{tier}", $this->request->getTier() === null ? "null" : $this->request->getTier(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeMatchmakingSeasonGatheringsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMatchmakingSeasonGatheringsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMatchmakingSeasonGatheringsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMatchmakingSeasonGatheringsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMatchmakingSeasonGatheringsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMatchmakingSeasonGatheringsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/season/{seasonName}/{season}/gathering/matchmaking";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getTier() !== null) {
            $queryStrings["tier"] = $this->request->getTier();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DoSeasonMatchmakingTask extends Gs2RestSessionTask {

    /**
     * @var DoSeasonMatchmakingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DoSeasonMatchmakingTask constructor.
     * @param Gs2RestSession $session
     * @param DoSeasonMatchmakingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DoSeasonMatchmakingRequest $request
    ) {
        parent::__construct(
            $session,
            DoSeasonMatchmakingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/season/{seasonName}/gathering/do";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);

        $json = [];
        if ($this->request->getMatchmakingContextToken() !== null) {
            $json["matchmakingContextToken"] = $this->request->getMatchmakingContextToken();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DoSeasonMatchmakingByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DoSeasonMatchmakingByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DoSeasonMatchmakingByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DoSeasonMatchmakingByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DoSeasonMatchmakingByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DoSeasonMatchmakingByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/season/{seasonName}/gathering/do";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getMatchmakingContextToken() !== null) {
            $json["matchmakingContextToken"] = $this->request->getMatchmakingContextToken();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetSeasonGatheringTask extends Gs2RestSessionTask {

    /**
     * @var GetSeasonGatheringRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSeasonGatheringTask constructor.
     * @param Gs2RestSession $session
     * @param GetSeasonGatheringRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSeasonGatheringRequest $request
    ) {
        parent::__construct(
            $session,
            GetSeasonGatheringResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/season/{seasonName}/{season}/{tier}/gathering/{seasonGatheringName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);
        $url = str_replace("{tier}", $this->request->getTier() === null ? "null" : $this->request->getTier(), $url);
        $url = str_replace("{seasonGatheringName}", $this->request->getSeasonGatheringName() === null|| strlen($this->request->getSeasonGatheringName()) == 0 ? "null" : $this->request->getSeasonGatheringName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class VerifyIncludeParticipantTask extends Gs2RestSessionTask {

    /**
     * @var VerifyIncludeParticipantRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyIncludeParticipantTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyIncludeParticipantRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyIncludeParticipantRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyIncludeParticipantResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/season/{seasonName}/{season}/{tier}/gathering/{seasonGatheringName}/participant/me/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);
        $url = str_replace("{tier}", $this->request->getTier() === null ? "null" : $this->request->getTier(), $url);
        $url = str_replace("{seasonGatheringName}", $this->request->getSeasonGatheringName() === null|| strlen($this->request->getSeasonGatheringName()) == 0 ? "null" : $this->request->getSeasonGatheringName(), $url);

        $json = [];
        if ($this->request->getVerifyType() !== null) {
            $json["verifyType"] = $this->request->getVerifyType();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class VerifyIncludeParticipantByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyIncludeParticipantByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyIncludeParticipantByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyIncludeParticipantByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyIncludeParticipantByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyIncludeParticipantByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/season/{seasonName}/{season}/{tier}/gathering/{seasonGatheringName}/participant/{userId}/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);
        $url = str_replace("{tier}", $this->request->getTier() === null ? "null" : $this->request->getTier(), $url);
        $url = str_replace("{seasonGatheringName}", $this->request->getSeasonGatheringName() === null|| strlen($this->request->getSeasonGatheringName()) == 0 ? "null" : $this->request->getSeasonGatheringName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getVerifyType() !== null) {
            $json["verifyType"] = $this->request->getVerifyType();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeleteSeasonGatheringTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSeasonGatheringRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSeasonGatheringTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSeasonGatheringRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSeasonGatheringRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSeasonGatheringResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/season/{seasonName}/{season}/{tier}/gathering/{seasonGatheringName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);
        $url = str_replace("{tier}", $this->request->getTier() === null ? "null" : $this->request->getTier(), $url);
        $url = str_replace("{seasonGatheringName}", $this->request->getSeasonGatheringName() === null|| strlen($this->request->getSeasonGatheringName()) == 0 ? "null" : $this->request->getSeasonGatheringName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class VerifyIncludeParticipantByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyIncludeParticipantByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyIncludeParticipantByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyIncludeParticipantByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyIncludeParticipantByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyIncludeParticipantByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/season/gathering/participant/verify";

        $json = [];
        if ($this->request->getStampTask() !== null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeJoinedSeasonGatheringsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeJoinedSeasonGatheringsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeJoinedSeasonGatheringsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeJoinedSeasonGatheringsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeJoinedSeasonGatheringsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeJoinedSeasonGatheringsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/season/{seasonName}/gathering/join";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class DescribeJoinedSeasonGatheringsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeJoinedSeasonGatheringsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeJoinedSeasonGatheringsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeJoinedSeasonGatheringsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeJoinedSeasonGatheringsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeJoinedSeasonGatheringsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/season/{seasonName}/gathering/join";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetJoinedSeasonGatheringTask extends Gs2RestSessionTask {

    /**
     * @var GetJoinedSeasonGatheringRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetJoinedSeasonGatheringTask constructor.
     * @param Gs2RestSession $session
     * @param GetJoinedSeasonGatheringRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetJoinedSeasonGatheringRequest $request
    ) {
        parent::__construct(
            $session,
            GetJoinedSeasonGatheringResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/season/{seasonName}/gathering/join/{season}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetJoinedSeasonGatheringByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetJoinedSeasonGatheringByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetJoinedSeasonGatheringByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetJoinedSeasonGatheringByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetJoinedSeasonGatheringByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetJoinedSeasonGatheringByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/season/{seasonName}/gathering/join/{season}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{seasonName}", $this->request->getSeasonName() === null|| strlen($this->request->getSeasonName()) == 0 ? "null" : $this->request->getSeasonName(), $url);
        $url = str_replace("{season}", $this->request->getSeason() === null ? "null" : $this->request->getSeason(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DescribeRatingsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRatingsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRatingsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRatingsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRatingsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRatingsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/rating";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class DescribeRatingsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRatingsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRatingsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRatingsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRatingsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRatingsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/rating";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() !== null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() !== null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetRatingTask extends Gs2RestSessionTask {

    /**
     * @var GetRatingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRatingTask constructor.
     * @param Gs2RestSession $session
     * @param GetRatingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRatingRequest $request
    ) {
        parent::__construct(
            $session,
            GetRatingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/rating/{ratingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetRatingByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetRatingByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRatingByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetRatingByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRatingByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetRatingByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/rating/{ratingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class PutResultTask extends Gs2RestSessionTask {

    /**
     * @var PutResultRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutResultTask constructor.
     * @param Gs2RestSession $session
     * @param PutResultRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutResultRequest $request
    ) {
        parent::__construct(
            $session,
            PutResultResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/rating/{ratingName}/vote";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);

        $json = [];
        if ($this->request->getGameResults() !== null) {
            $array = [];
            foreach ($this->request->getGameResults() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["gameResults"] = $array;
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DeleteRatingTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRatingRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRatingTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRatingRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRatingRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRatingResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/rating/{ratingName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        if (count($queryStrings) > 0) {
            $url .= '?'. http_build_query($queryStrings);
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetBallotTask extends Gs2RestSessionTask {

    /**
     * @var GetBallotRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBallotTask constructor.
     * @param Gs2RestSession $session
     * @param GetBallotRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBallotRequest $request
    ) {
        parent::__construct(
            $session,
            GetBallotResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/vote/{ratingName}/{gatheringName}/ballot";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $json = [];
        if ($this->request->getNumberOfPlayer() !== null) {
            $json["numberOfPlayer"] = $this->request->getNumberOfPlayer();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetBallotByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetBallotByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBallotByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetBallotByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBallotByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetBallotByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/vote/{ratingName}/{gatheringName}/ballot";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getNumberOfPlayer() !== null) {
            $json["numberOfPlayer"] = $this->request->getNumberOfPlayer();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class VoteTask extends Gs2RestSessionTask {

    /**
     * @var VoteRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VoteTask constructor.
     * @param Gs2RestSession $session
     * @param VoteRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VoteRequest $request
    ) {
        parent::__construct(
            $session,
            VoteResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/action/vote";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getBallotBody() !== null) {
            $json["ballotBody"] = $this->request->getBallotBody();
        }
        if ($this->request->getBallotSignature() !== null) {
            $json["ballotSignature"] = $this->request->getBallotSignature();
        }
        if ($this->request->getGameResults() !== null) {
            $array = [];
            foreach ($this->request->getGameResults() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["gameResults"] = $array;
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class VoteMultipleTask extends Gs2RestSessionTask {

    /**
     * @var VoteMultipleRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VoteMultipleTask constructor.
     * @param Gs2RestSession $session
     * @param VoteMultipleRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VoteMultipleRequest $request
    ) {
        parent::__construct(
            $session,
            VoteMultipleResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/action/vote/multiple";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getSignedBallots() !== null) {
            $array = [];
            foreach ($this->request->getSignedBallots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["signedBallots"] = $array;
        }
        if ($this->request->getGameResults() !== null) {
            $array = [];
            foreach ($this->request->getGameResults() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["gameResults"] = $array;
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CommitVoteTask extends Gs2RestSessionTask {

    /**
     * @var CommitVoteRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CommitVoteTask constructor.
     * @param Gs2RestSession $session
     * @param CommitVoteRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CommitVoteRequest $request
    ) {
        parent::__construct(
            $session,
            CommitVoteResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/vote/{ratingName}/{gatheringName}/action/vote/commit";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{ratingName}", $this->request->getRatingName() === null|| strlen($this->request->getRatingName()) == 0 ? "null" : $this->request->getRatingName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() === null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $json = [];
        if ($this->request->getContextStack() !== null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() !== null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

/**
 * GS2 Matchmaking API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2MatchmakingRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     */
    public function describeNamespacesAsync(
            DescribeNamespacesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeNamespacesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeNamespacesRequest $request
     * @return DescribeNamespacesResult
     */
    public function describeNamespaces (
            DescribeNamespacesRequest $request
    ): DescribeNamespacesResult {
        return $this->describeNamespacesAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateNamespaceRequest $request
     * @return PromiseInterface
     */
    public function createNamespaceAsync(
            CreateNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateNamespaceRequest $request
     * @return CreateNamespaceResult
     */
    public function createNamespace (
            CreateNamespaceRequest $request
    ): CreateNamespaceResult {
        return $this->createNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param GetNamespaceStatusRequest $request
     * @return PromiseInterface
     */
    public function getNamespaceStatusAsync(
            GetNamespaceStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetNamespaceStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetNamespaceStatusRequest $request
     * @return GetNamespaceStatusResult
     */
    public function getNamespaceStatus (
            GetNamespaceStatusRequest $request
    ): GetNamespaceStatusResult {
        return $this->getNamespaceStatusAsync(
            $request
        )->wait();
    }

    /**
     * @param GetNamespaceRequest $request
     * @return PromiseInterface
     */
    public function getNamespaceAsync(
            GetNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetNamespaceRequest $request
     * @return GetNamespaceResult
     */
    public function getNamespace (
            GetNamespaceRequest $request
    ): GetNamespaceResult {
        return $this->getNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateNamespaceRequest $request
     * @return PromiseInterface
     */
    public function updateNamespaceAsync(
            UpdateNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateNamespaceRequest $request
     * @return UpdateNamespaceResult
     */
    public function updateNamespace (
            UpdateNamespaceRequest $request
    ): UpdateNamespaceResult {
        return $this->updateNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteNamespaceRequest $request
     * @return PromiseInterface
     */
    public function deleteNamespaceAsync(
            DeleteNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteNamespaceRequest $request
     * @return DeleteNamespaceResult
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {
        return $this->deleteNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
     */
    public function getServiceVersionAsync(
            GetServiceVersionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetServiceVersionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     */
    public function getServiceVersion (
            GetServiceVersionRequest $request
    ): GetServiceVersionResult {
        return $this->getServiceVersionAsync(
            $request
        )->wait();
    }

    /**
     * @param DumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function dumpUserDataByUserIdAsync(
            DumpUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DumpUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DumpUserDataByUserIdRequest $request
     * @return DumpUserDataByUserIdResult
     */
    public function dumpUserDataByUserId (
            DumpUserDataByUserIdRequest $request
    ): DumpUserDataByUserIdResult {
        return $this->dumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkDumpUserDataByUserIdAsync(
            CheckDumpUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckDumpUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return CheckDumpUserDataByUserIdResult
     */
    public function checkDumpUserDataByUserId (
            CheckDumpUserDataByUserIdRequest $request
    ): CheckDumpUserDataByUserIdResult {
        return $this->checkDumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function cleanUserDataByUserIdAsync(
            CleanUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CleanUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CleanUserDataByUserIdRequest $request
     * @return CleanUserDataByUserIdResult
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkCleanUserDataByUserIdAsync(
            CheckCleanUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckCleanUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     */
    public function checkCleanUserDataByUserId (
            CheckCleanUserDataByUserIdRequest $request
    ): CheckCleanUserDataByUserIdResult {
        return $this->checkCleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function prepareImportUserDataByUserIdAsync(
            PrepareImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PrepareImportUserDataByUserIdResult
     */
    public function prepareImportUserDataByUserId (
            PrepareImportUserDataByUserIdRequest $request
    ): PrepareImportUserDataByUserIdResult {
        return $this->prepareImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function importUserDataByUserIdAsync(
            ImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ImportUserDataByUserIdRequest $request
     * @return ImportUserDataByUserIdResult
     */
    public function importUserDataByUserId (
            ImportUserDataByUserIdRequest $request
    ): ImportUserDataByUserIdResult {
        return $this->importUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkImportUserDataByUserIdAsync(
            CheckImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckImportUserDataByUserIdRequest $request
     * @return CheckImportUserDataByUserIdResult
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeGatheringsRequest $request
     * @return PromiseInterface
     */
    public function describeGatheringsAsync(
            DescribeGatheringsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGatheringsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeGatheringsRequest $request
     * @return DescribeGatheringsResult
     */
    public function describeGatherings (
            DescribeGatheringsRequest $request
    ): DescribeGatheringsResult {
        return $this->describeGatheringsAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateGatheringRequest $request
     * @return PromiseInterface
     */
    public function createGatheringAsync(
            CreateGatheringRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGatheringTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateGatheringRequest $request
     * @return CreateGatheringResult
     */
    public function createGathering (
            CreateGatheringRequest $request
    ): CreateGatheringResult {
        return $this->createGatheringAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateGatheringByUserIdRequest $request
     * @return PromiseInterface
     */
    public function createGatheringByUserIdAsync(
            CreateGatheringByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGatheringByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateGatheringByUserIdRequest $request
     * @return CreateGatheringByUserIdResult
     */
    public function createGatheringByUserId (
            CreateGatheringByUserIdRequest $request
    ): CreateGatheringByUserIdResult {
        return $this->createGatheringByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateGatheringRequest $request
     * @return PromiseInterface
     */
    public function updateGatheringAsync(
            UpdateGatheringRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateGatheringTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateGatheringRequest $request
     * @return UpdateGatheringResult
     */
    public function updateGathering (
            UpdateGatheringRequest $request
    ): UpdateGatheringResult {
        return $this->updateGatheringAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateGatheringByUserIdRequest $request
     * @return PromiseInterface
     */
    public function updateGatheringByUserIdAsync(
            UpdateGatheringByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateGatheringByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateGatheringByUserIdRequest $request
     * @return UpdateGatheringByUserIdResult
     */
    public function updateGatheringByUserId (
            UpdateGatheringByUserIdRequest $request
    ): UpdateGatheringByUserIdResult {
        return $this->updateGatheringByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DoMatchmakingByPlayerRequest $request
     * @return PromiseInterface
     */
    public function doMatchmakingByPlayerAsync(
            DoMatchmakingByPlayerRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DoMatchmakingByPlayerTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DoMatchmakingByPlayerRequest $request
     * @return DoMatchmakingByPlayerResult
     */
    public function doMatchmakingByPlayer (
            DoMatchmakingByPlayerRequest $request
    ): DoMatchmakingByPlayerResult {
        return $this->doMatchmakingByPlayerAsync(
            $request
        )->wait();
    }

    /**
     * @param DoMatchmakingRequest $request
     * @return PromiseInterface
     */
    public function doMatchmakingAsync(
            DoMatchmakingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DoMatchmakingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DoMatchmakingRequest $request
     * @return DoMatchmakingResult
     */
    public function doMatchmaking (
            DoMatchmakingRequest $request
    ): DoMatchmakingResult {
        return $this->doMatchmakingAsync(
            $request
        )->wait();
    }

    /**
     * @param DoMatchmakingByUserIdRequest $request
     * @return PromiseInterface
     */
    public function doMatchmakingByUserIdAsync(
            DoMatchmakingByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DoMatchmakingByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DoMatchmakingByUserIdRequest $request
     * @return DoMatchmakingByUserIdResult
     */
    public function doMatchmakingByUserId (
            DoMatchmakingByUserIdRequest $request
    ): DoMatchmakingByUserIdResult {
        return $this->doMatchmakingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param PingRequest $request
     * @return PromiseInterface
     */
    public function pingAsync(
            PingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PingRequest $request
     * @return PingResult
     */
    public function ping (
            PingRequest $request
    ): PingResult {
        return $this->pingAsync(
            $request
        )->wait();
    }

    /**
     * @param PingByUserIdRequest $request
     * @return PromiseInterface
     */
    public function pingByUserIdAsync(
            PingByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PingByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PingByUserIdRequest $request
     * @return PingByUserIdResult
     */
    public function pingByUserId (
            PingByUserIdRequest $request
    ): PingByUserIdResult {
        return $this->pingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGatheringRequest $request
     * @return PromiseInterface
     */
    public function getGatheringAsync(
            GetGatheringRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGatheringTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGatheringRequest $request
     * @return GetGatheringResult
     */
    public function getGathering (
            GetGatheringRequest $request
    ): GetGatheringResult {
        return $this->getGatheringAsync(
            $request
        )->wait();
    }

    /**
     * @param CancelMatchmakingRequest $request
     * @return PromiseInterface
     */
    public function cancelMatchmakingAsync(
            CancelMatchmakingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CancelMatchmakingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CancelMatchmakingRequest $request
     * @return CancelMatchmakingResult
     */
    public function cancelMatchmaking (
            CancelMatchmakingRequest $request
    ): CancelMatchmakingResult {
        return $this->cancelMatchmakingAsync(
            $request
        )->wait();
    }

    /**
     * @param CancelMatchmakingByUserIdRequest $request
     * @return PromiseInterface
     */
    public function cancelMatchmakingByUserIdAsync(
            CancelMatchmakingByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CancelMatchmakingByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CancelMatchmakingByUserIdRequest $request
     * @return CancelMatchmakingByUserIdResult
     */
    public function cancelMatchmakingByUserId (
            CancelMatchmakingByUserIdRequest $request
    ): CancelMatchmakingByUserIdResult {
        return $this->cancelMatchmakingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param EarlyCompleteRequest $request
     * @return PromiseInterface
     */
    public function earlyCompleteAsync(
            EarlyCompleteRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new EarlyCompleteTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param EarlyCompleteRequest $request
     * @return EarlyCompleteResult
     */
    public function earlyComplete (
            EarlyCompleteRequest $request
    ): EarlyCompleteResult {
        return $this->earlyCompleteAsync(
            $request
        )->wait();
    }

    /**
     * @param EarlyCompleteByUserIdRequest $request
     * @return PromiseInterface
     */
    public function earlyCompleteByUserIdAsync(
            EarlyCompleteByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new EarlyCompleteByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param EarlyCompleteByUserIdRequest $request
     * @return EarlyCompleteByUserIdResult
     */
    public function earlyCompleteByUserId (
            EarlyCompleteByUserIdRequest $request
    ): EarlyCompleteByUserIdResult {
        return $this->earlyCompleteByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteGatheringRequest $request
     * @return PromiseInterface
     */
    public function deleteGatheringAsync(
            DeleteGatheringRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGatheringTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteGatheringRequest $request
     * @return DeleteGatheringResult
     */
    public function deleteGathering (
            DeleteGatheringRequest $request
    ): DeleteGatheringResult {
        return $this->deleteGatheringAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRatingModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeRatingModelMastersAsync(
            DescribeRatingModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRatingModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRatingModelMastersRequest $request
     * @return DescribeRatingModelMastersResult
     */
    public function describeRatingModelMasters (
            DescribeRatingModelMastersRequest $request
    ): DescribeRatingModelMastersResult {
        return $this->describeRatingModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateRatingModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createRatingModelMasterAsync(
            CreateRatingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateRatingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateRatingModelMasterRequest $request
     * @return CreateRatingModelMasterResult
     */
    public function createRatingModelMaster (
            CreateRatingModelMasterRequest $request
    ): CreateRatingModelMasterResult {
        return $this->createRatingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRatingModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getRatingModelMasterAsync(
            GetRatingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRatingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRatingModelMasterRequest $request
     * @return GetRatingModelMasterResult
     */
    public function getRatingModelMaster (
            GetRatingModelMasterRequest $request
    ): GetRatingModelMasterResult {
        return $this->getRatingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateRatingModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateRatingModelMasterAsync(
            UpdateRatingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateRatingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateRatingModelMasterRequest $request
     * @return UpdateRatingModelMasterResult
     */
    public function updateRatingModelMaster (
            UpdateRatingModelMasterRequest $request
    ): UpdateRatingModelMasterResult {
        return $this->updateRatingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteRatingModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteRatingModelMasterAsync(
            DeleteRatingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRatingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteRatingModelMasterRequest $request
     * @return DeleteRatingModelMasterResult
     */
    public function deleteRatingModelMaster (
            DeleteRatingModelMasterRequest $request
    ): DeleteRatingModelMasterResult {
        return $this->deleteRatingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRatingModelsRequest $request
     * @return PromiseInterface
     */
    public function describeRatingModelsAsync(
            DescribeRatingModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRatingModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRatingModelsRequest $request
     * @return DescribeRatingModelsResult
     */
    public function describeRatingModels (
            DescribeRatingModelsRequest $request
    ): DescribeRatingModelsResult {
        return $this->describeRatingModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRatingModelRequest $request
     * @return PromiseInterface
     */
    public function getRatingModelAsync(
            GetRatingModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRatingModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRatingModelRequest $request
     * @return GetRatingModelResult
     */
    public function getRatingModel (
            GetRatingModelRequest $request
    ): GetRatingModelResult {
        return $this->getRatingModelAsync(
            $request
        )->wait();
    }

    /**
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     */
    public function exportMasterAsync(
            ExportMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ExportMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCurrentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentModelMasterAsync(
            GetCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentModelMasterRequest $request
     * @return GetCurrentModelMasterResult
     */
    public function getCurrentModelMaster (
            GetCurrentModelMasterRequest $request
    ): GetCurrentModelMasterResult {
        return $this->getCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param PreUpdateCurrentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function preUpdateCurrentModelMasterAsync(
            PreUpdateCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreUpdateCurrentModelMasterRequest $request
     * @return PreUpdateCurrentModelMasterResult
     */
    public function preUpdateCurrentModelMaster (
            PreUpdateCurrentModelMasterRequest $request
    ): PreUpdateCurrentModelMasterResult {
        return $this->preUpdateCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentModelMasterAsync(
            UpdateCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentModelMasterRequest $request
     * @return UpdateCurrentModelMasterResult
     */
    public function updateCurrentModelMaster (
            UpdateCurrentModelMasterRequest $request
    ): UpdateCurrentModelMasterResult {
        return $this->updateCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentModelMasterFromGitHubAsync(
            UpdateCurrentModelMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentModelMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     * @return UpdateCurrentModelMasterFromGitHubResult
     */
    public function updateCurrentModelMasterFromGitHub (
            UpdateCurrentModelMasterFromGitHubRequest $request
    ): UpdateCurrentModelMasterFromGitHubResult {
        return $this->updateCurrentModelMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSeasonModelsRequest $request
     * @return PromiseInterface
     */
    public function describeSeasonModelsAsync(
            DescribeSeasonModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSeasonModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSeasonModelsRequest $request
     * @return DescribeSeasonModelsResult
     */
    public function describeSeasonModels (
            DescribeSeasonModelsRequest $request
    ): DescribeSeasonModelsResult {
        return $this->describeSeasonModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSeasonModelRequest $request
     * @return PromiseInterface
     */
    public function getSeasonModelAsync(
            GetSeasonModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSeasonModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSeasonModelRequest $request
     * @return GetSeasonModelResult
     */
    public function getSeasonModel (
            GetSeasonModelRequest $request
    ): GetSeasonModelResult {
        return $this->getSeasonModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSeasonModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeSeasonModelMastersAsync(
            DescribeSeasonModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSeasonModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSeasonModelMastersRequest $request
     * @return DescribeSeasonModelMastersResult
     */
    public function describeSeasonModelMasters (
            DescribeSeasonModelMastersRequest $request
    ): DescribeSeasonModelMastersResult {
        return $this->describeSeasonModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateSeasonModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createSeasonModelMasterAsync(
            CreateSeasonModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateSeasonModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateSeasonModelMasterRequest $request
     * @return CreateSeasonModelMasterResult
     */
    public function createSeasonModelMaster (
            CreateSeasonModelMasterRequest $request
    ): CreateSeasonModelMasterResult {
        return $this->createSeasonModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSeasonModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getSeasonModelMasterAsync(
            GetSeasonModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSeasonModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSeasonModelMasterRequest $request
     * @return GetSeasonModelMasterResult
     */
    public function getSeasonModelMaster (
            GetSeasonModelMasterRequest $request
    ): GetSeasonModelMasterResult {
        return $this->getSeasonModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateSeasonModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateSeasonModelMasterAsync(
            UpdateSeasonModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateSeasonModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateSeasonModelMasterRequest $request
     * @return UpdateSeasonModelMasterResult
     */
    public function updateSeasonModelMaster (
            UpdateSeasonModelMasterRequest $request
    ): UpdateSeasonModelMasterResult {
        return $this->updateSeasonModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteSeasonModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteSeasonModelMasterAsync(
            DeleteSeasonModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSeasonModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteSeasonModelMasterRequest $request
     * @return DeleteSeasonModelMasterResult
     */
    public function deleteSeasonModelMaster (
            DeleteSeasonModelMasterRequest $request
    ): DeleteSeasonModelMasterResult {
        return $this->deleteSeasonModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSeasonGatheringsRequest $request
     * @return PromiseInterface
     */
    public function describeSeasonGatheringsAsync(
            DescribeSeasonGatheringsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSeasonGatheringsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSeasonGatheringsRequest $request
     * @return DescribeSeasonGatheringsResult
     */
    public function describeSeasonGatherings (
            DescribeSeasonGatheringsRequest $request
    ): DescribeSeasonGatheringsResult {
        return $this->describeSeasonGatheringsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMatchmakingSeasonGatheringsRequest $request
     * @return PromiseInterface
     */
    public function describeMatchmakingSeasonGatheringsAsync(
            DescribeMatchmakingSeasonGatheringsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMatchmakingSeasonGatheringsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMatchmakingSeasonGatheringsRequest $request
     * @return DescribeMatchmakingSeasonGatheringsResult
     */
    public function describeMatchmakingSeasonGatherings (
            DescribeMatchmakingSeasonGatheringsRequest $request
    ): DescribeMatchmakingSeasonGatheringsResult {
        return $this->describeMatchmakingSeasonGatheringsAsync(
            $request
        )->wait();
    }

    /**
     * @param DoSeasonMatchmakingRequest $request
     * @return PromiseInterface
     */
    public function doSeasonMatchmakingAsync(
            DoSeasonMatchmakingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DoSeasonMatchmakingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DoSeasonMatchmakingRequest $request
     * @return DoSeasonMatchmakingResult
     */
    public function doSeasonMatchmaking (
            DoSeasonMatchmakingRequest $request
    ): DoSeasonMatchmakingResult {
        return $this->doSeasonMatchmakingAsync(
            $request
        )->wait();
    }

    /**
     * @param DoSeasonMatchmakingByUserIdRequest $request
     * @return PromiseInterface
     */
    public function doSeasonMatchmakingByUserIdAsync(
            DoSeasonMatchmakingByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DoSeasonMatchmakingByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DoSeasonMatchmakingByUserIdRequest $request
     * @return DoSeasonMatchmakingByUserIdResult
     */
    public function doSeasonMatchmakingByUserId (
            DoSeasonMatchmakingByUserIdRequest $request
    ): DoSeasonMatchmakingByUserIdResult {
        return $this->doSeasonMatchmakingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSeasonGatheringRequest $request
     * @return PromiseInterface
     */
    public function getSeasonGatheringAsync(
            GetSeasonGatheringRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSeasonGatheringTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSeasonGatheringRequest $request
     * @return GetSeasonGatheringResult
     */
    public function getSeasonGathering (
            GetSeasonGatheringRequest $request
    ): GetSeasonGatheringResult {
        return $this->getSeasonGatheringAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyIncludeParticipantRequest $request
     * @return PromiseInterface
     */
    public function verifyIncludeParticipantAsync(
            VerifyIncludeParticipantRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyIncludeParticipantTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyIncludeParticipantRequest $request
     * @return VerifyIncludeParticipantResult
     */
    public function verifyIncludeParticipant (
            VerifyIncludeParticipantRequest $request
    ): VerifyIncludeParticipantResult {
        return $this->verifyIncludeParticipantAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyIncludeParticipantByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyIncludeParticipantByUserIdAsync(
            VerifyIncludeParticipantByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyIncludeParticipantByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyIncludeParticipantByUserIdRequest $request
     * @return VerifyIncludeParticipantByUserIdResult
     */
    public function verifyIncludeParticipantByUserId (
            VerifyIncludeParticipantByUserIdRequest $request
    ): VerifyIncludeParticipantByUserIdResult {
        return $this->verifyIncludeParticipantByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteSeasonGatheringRequest $request
     * @return PromiseInterface
     */
    public function deleteSeasonGatheringAsync(
            DeleteSeasonGatheringRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSeasonGatheringTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteSeasonGatheringRequest $request
     * @return DeleteSeasonGatheringResult
     */
    public function deleteSeasonGathering (
            DeleteSeasonGatheringRequest $request
    ): DeleteSeasonGatheringResult {
        return $this->deleteSeasonGatheringAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyIncludeParticipantByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyIncludeParticipantByStampTaskAsync(
            VerifyIncludeParticipantByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyIncludeParticipantByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyIncludeParticipantByStampTaskRequest $request
     * @return VerifyIncludeParticipantByStampTaskResult
     */
    public function verifyIncludeParticipantByStampTask (
            VerifyIncludeParticipantByStampTaskRequest $request
    ): VerifyIncludeParticipantByStampTaskResult {
        return $this->verifyIncludeParticipantByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeJoinedSeasonGatheringsRequest $request
     * @return PromiseInterface
     */
    public function describeJoinedSeasonGatheringsAsync(
            DescribeJoinedSeasonGatheringsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeJoinedSeasonGatheringsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeJoinedSeasonGatheringsRequest $request
     * @return DescribeJoinedSeasonGatheringsResult
     */
    public function describeJoinedSeasonGatherings (
            DescribeJoinedSeasonGatheringsRequest $request
    ): DescribeJoinedSeasonGatheringsResult {
        return $this->describeJoinedSeasonGatheringsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeJoinedSeasonGatheringsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeJoinedSeasonGatheringsByUserIdAsync(
            DescribeJoinedSeasonGatheringsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeJoinedSeasonGatheringsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeJoinedSeasonGatheringsByUserIdRequest $request
     * @return DescribeJoinedSeasonGatheringsByUserIdResult
     */
    public function describeJoinedSeasonGatheringsByUserId (
            DescribeJoinedSeasonGatheringsByUserIdRequest $request
    ): DescribeJoinedSeasonGatheringsByUserIdResult {
        return $this->describeJoinedSeasonGatheringsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetJoinedSeasonGatheringRequest $request
     * @return PromiseInterface
     */
    public function getJoinedSeasonGatheringAsync(
            GetJoinedSeasonGatheringRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetJoinedSeasonGatheringTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetJoinedSeasonGatheringRequest $request
     * @return GetJoinedSeasonGatheringResult
     */
    public function getJoinedSeasonGathering (
            GetJoinedSeasonGatheringRequest $request
    ): GetJoinedSeasonGatheringResult {
        return $this->getJoinedSeasonGatheringAsync(
            $request
        )->wait();
    }

    /**
     * @param GetJoinedSeasonGatheringByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getJoinedSeasonGatheringByUserIdAsync(
            GetJoinedSeasonGatheringByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetJoinedSeasonGatheringByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetJoinedSeasonGatheringByUserIdRequest $request
     * @return GetJoinedSeasonGatheringByUserIdResult
     */
    public function getJoinedSeasonGatheringByUserId (
            GetJoinedSeasonGatheringByUserIdRequest $request
    ): GetJoinedSeasonGatheringByUserIdResult {
        return $this->getJoinedSeasonGatheringByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRatingsRequest $request
     * @return PromiseInterface
     */
    public function describeRatingsAsync(
            DescribeRatingsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRatingsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRatingsRequest $request
     * @return DescribeRatingsResult
     */
    public function describeRatings (
            DescribeRatingsRequest $request
    ): DescribeRatingsResult {
        return $this->describeRatingsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRatingsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeRatingsByUserIdAsync(
            DescribeRatingsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRatingsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRatingsByUserIdRequest $request
     * @return DescribeRatingsByUserIdResult
     */
    public function describeRatingsByUserId (
            DescribeRatingsByUserIdRequest $request
    ): DescribeRatingsByUserIdResult {
        return $this->describeRatingsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRatingRequest $request
     * @return PromiseInterface
     */
    public function getRatingAsync(
            GetRatingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRatingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRatingRequest $request
     * @return GetRatingResult
     */
    public function getRating (
            GetRatingRequest $request
    ): GetRatingResult {
        return $this->getRatingAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRatingByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getRatingByUserIdAsync(
            GetRatingByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRatingByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRatingByUserIdRequest $request
     * @return GetRatingByUserIdResult
     */
    public function getRatingByUserId (
            GetRatingByUserIdRequest $request
    ): GetRatingByUserIdResult {
        return $this->getRatingByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param PutResultRequest $request
     * @return PromiseInterface
     */
    public function putResultAsync(
            PutResultRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutResultTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PutResultRequest $request
     * @return PutResultResult
     */
    public function putResult (
            PutResultRequest $request
    ): PutResultResult {
        return $this->putResultAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteRatingRequest $request
     * @return PromiseInterface
     */
    public function deleteRatingAsync(
            DeleteRatingRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRatingTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteRatingRequest $request
     * @return DeleteRatingResult
     */
    public function deleteRating (
            DeleteRatingRequest $request
    ): DeleteRatingResult {
        return $this->deleteRatingAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBallotRequest $request
     * @return PromiseInterface
     */
    public function getBallotAsync(
            GetBallotRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBallotTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBallotRequest $request
     * @return GetBallotResult
     */
    public function getBallot (
            GetBallotRequest $request
    ): GetBallotResult {
        return $this->getBallotAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBallotByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getBallotByUserIdAsync(
            GetBallotByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBallotByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBallotByUserIdRequest $request
     * @return GetBallotByUserIdResult
     */
    public function getBallotByUserId (
            GetBallotByUserIdRequest $request
    ): GetBallotByUserIdResult {
        return $this->getBallotByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VoteRequest $request
     * @return PromiseInterface
     */
    public function voteAsync(
            VoteRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VoteTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VoteRequest $request
     * @return VoteResult
     */
    public function vote (
            VoteRequest $request
    ): VoteResult {
        return $this->voteAsync(
            $request
        )->wait();
    }

    /**
     * @param VoteMultipleRequest $request
     * @return PromiseInterface
     */
    public function voteMultipleAsync(
            VoteMultipleRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VoteMultipleTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VoteMultipleRequest $request
     * @return VoteMultipleResult
     */
    public function voteMultiple (
            VoteMultipleRequest $request
    ): VoteMultipleResult {
        return $this->voteMultipleAsync(
            $request
        )->wait();
    }

    /**
     * @param CommitVoteRequest $request
     * @return PromiseInterface
     */
    public function commitVoteAsync(
            CommitVoteRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CommitVoteTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CommitVoteRequest $request
     * @return CommitVoteResult
     */
    public function commitVote (
            CommitVoteRequest $request
    ): CommitVoteResult {
        return $this->commitVoteAsync(
            $request
        )->wait();
    }
}