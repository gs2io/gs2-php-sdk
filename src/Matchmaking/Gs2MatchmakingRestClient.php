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
use Gs2\Matchmaking\Request\GetGatheringRequest;
use Gs2\Matchmaking\Result\GetGatheringResult;
use Gs2\Matchmaking\Request\CancelMatchmakingRequest;
use Gs2\Matchmaking\Result\CancelMatchmakingResult;
use Gs2\Matchmaking\Request\CancelMatchmakingByUserIdRequest;
use Gs2\Matchmaking\Result\CancelMatchmakingByUserIdResult;
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
use Gs2\Matchmaking\Request\GetCurrentRatingModelMasterRequest;
use Gs2\Matchmaking\Result\GetCurrentRatingModelMasterResult;
use Gs2\Matchmaking\Request\UpdateCurrentRatingModelMasterRequest;
use Gs2\Matchmaking\Result\UpdateCurrentRatingModelMasterResult;
use Gs2\Matchmaking\Request\UpdateCurrentRatingModelMasterFromGitHubRequest;
use Gs2\Matchmaking\Result\UpdateCurrentRatingModelMasterFromGitHubResult;
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/dump";

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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/dump";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/clean";

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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/clean";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/import/prepare";

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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/import";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/user/{userId}/import";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

class GetCurrentRatingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentRatingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentRatingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentRatingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentRatingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentRatingModelMasterResult::class
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

class UpdateCurrentRatingModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentRatingModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentRatingModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentRatingModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentRatingModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentRatingModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getSettings() !== null) {
            $json["settings"] = $this->request->getSettings();
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

class UpdateCurrentRatingModelMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentRatingModelMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentRatingModelMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentRatingModelMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentRatingModelMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentRatingModelMasterFromGitHubResult::class
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
     * @param GetCurrentRatingModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentRatingModelMasterAsync(
            GetCurrentRatingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentRatingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentRatingModelMasterRequest $request
     * @return GetCurrentRatingModelMasterResult
     */
    public function getCurrentRatingModelMaster (
            GetCurrentRatingModelMasterRequest $request
    ): GetCurrentRatingModelMasterResult {
        return $this->getCurrentRatingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentRatingModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentRatingModelMasterAsync(
            UpdateCurrentRatingModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentRatingModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentRatingModelMasterRequest $request
     * @return UpdateCurrentRatingModelMasterResult
     */
    public function updateCurrentRatingModelMaster (
            UpdateCurrentRatingModelMasterRequest $request
    ): UpdateCurrentRatingModelMasterResult {
        return $this->updateCurrentRatingModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentRatingModelMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentRatingModelMasterFromGitHubAsync(
            UpdateCurrentRatingModelMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentRatingModelMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentRatingModelMasterFromGitHubRequest $request
     * @return UpdateCurrentRatingModelMasterFromGitHubResult
     */
    public function updateCurrentRatingModelMasterFromGitHub (
            UpdateCurrentRatingModelMasterFromGitHubRequest $request
    ): UpdateCurrentRatingModelMasterFromGitHubResult {
        return $this->updateCurrentRatingModelMasterFromGitHubAsync(
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