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

namespace Gs2\Mission;

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


use Gs2\Mission\Request\DescribeCompletesRequest;
use Gs2\Mission\Result\DescribeCompletesResult;
use Gs2\Mission\Request\DescribeCompletesByUserIdRequest;
use Gs2\Mission\Result\DescribeCompletesByUserIdResult;
use Gs2\Mission\Request\CompleteRequest;
use Gs2\Mission\Result\CompleteResult;
use Gs2\Mission\Request\CompleteByUserIdRequest;
use Gs2\Mission\Result\CompleteByUserIdResult;
use Gs2\Mission\Request\ReceiveByUserIdRequest;
use Gs2\Mission\Result\ReceiveByUserIdResult;
use Gs2\Mission\Request\RevertReceiveByUserIdRequest;
use Gs2\Mission\Result\RevertReceiveByUserIdResult;
use Gs2\Mission\Request\GetCompleteRequest;
use Gs2\Mission\Result\GetCompleteResult;
use Gs2\Mission\Request\GetCompleteByUserIdRequest;
use Gs2\Mission\Result\GetCompleteByUserIdResult;
use Gs2\Mission\Request\DeleteCompleteByUserIdRequest;
use Gs2\Mission\Result\DeleteCompleteByUserIdResult;
use Gs2\Mission\Request\VerifyCompleteRequest;
use Gs2\Mission\Result\VerifyCompleteResult;
use Gs2\Mission\Request\VerifyCompleteByUserIdRequest;
use Gs2\Mission\Result\VerifyCompleteByUserIdResult;
use Gs2\Mission\Request\ReceiveByStampTaskRequest;
use Gs2\Mission\Result\ReceiveByStampTaskResult;
use Gs2\Mission\Request\RevertReceiveByStampSheetRequest;
use Gs2\Mission\Result\RevertReceiveByStampSheetResult;
use Gs2\Mission\Request\VerifyCompleteByStampTaskRequest;
use Gs2\Mission\Result\VerifyCompleteByStampTaskResult;
use Gs2\Mission\Request\DescribeCounterModelMastersRequest;
use Gs2\Mission\Result\DescribeCounterModelMastersResult;
use Gs2\Mission\Request\CreateCounterModelMasterRequest;
use Gs2\Mission\Result\CreateCounterModelMasterResult;
use Gs2\Mission\Request\GetCounterModelMasterRequest;
use Gs2\Mission\Result\GetCounterModelMasterResult;
use Gs2\Mission\Request\UpdateCounterModelMasterRequest;
use Gs2\Mission\Result\UpdateCounterModelMasterResult;
use Gs2\Mission\Request\DeleteCounterModelMasterRequest;
use Gs2\Mission\Result\DeleteCounterModelMasterResult;
use Gs2\Mission\Request\DescribeMissionGroupModelMastersRequest;
use Gs2\Mission\Result\DescribeMissionGroupModelMastersResult;
use Gs2\Mission\Request\CreateMissionGroupModelMasterRequest;
use Gs2\Mission\Result\CreateMissionGroupModelMasterResult;
use Gs2\Mission\Request\GetMissionGroupModelMasterRequest;
use Gs2\Mission\Result\GetMissionGroupModelMasterResult;
use Gs2\Mission\Request\UpdateMissionGroupModelMasterRequest;
use Gs2\Mission\Result\UpdateMissionGroupModelMasterResult;
use Gs2\Mission\Request\DeleteMissionGroupModelMasterRequest;
use Gs2\Mission\Result\DeleteMissionGroupModelMasterResult;
use Gs2\Mission\Request\DescribeNamespacesRequest;
use Gs2\Mission\Result\DescribeNamespacesResult;
use Gs2\Mission\Request\CreateNamespaceRequest;
use Gs2\Mission\Result\CreateNamespaceResult;
use Gs2\Mission\Request\GetNamespaceStatusRequest;
use Gs2\Mission\Result\GetNamespaceStatusResult;
use Gs2\Mission\Request\GetNamespaceRequest;
use Gs2\Mission\Result\GetNamespaceResult;
use Gs2\Mission\Request\UpdateNamespaceRequest;
use Gs2\Mission\Result\UpdateNamespaceResult;
use Gs2\Mission\Request\DeleteNamespaceRequest;
use Gs2\Mission\Result\DeleteNamespaceResult;
use Gs2\Mission\Request\DumpUserDataByUserIdRequest;
use Gs2\Mission\Result\DumpUserDataByUserIdResult;
use Gs2\Mission\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Mission\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Mission\Request\CleanUserDataByUserIdRequest;
use Gs2\Mission\Result\CleanUserDataByUserIdResult;
use Gs2\Mission\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Mission\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Mission\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Mission\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Mission\Request\ImportUserDataByUserIdRequest;
use Gs2\Mission\Result\ImportUserDataByUserIdResult;
use Gs2\Mission\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Mission\Result\CheckImportUserDataByUserIdResult;
use Gs2\Mission\Request\DescribeCountersRequest;
use Gs2\Mission\Result\DescribeCountersResult;
use Gs2\Mission\Request\DescribeCountersByUserIdRequest;
use Gs2\Mission\Result\DescribeCountersByUserIdResult;
use Gs2\Mission\Request\IncreaseCounterByUserIdRequest;
use Gs2\Mission\Result\IncreaseCounterByUserIdResult;
use Gs2\Mission\Request\SetCounterByUserIdRequest;
use Gs2\Mission\Result\SetCounterByUserIdResult;
use Gs2\Mission\Request\DecreaseCounterRequest;
use Gs2\Mission\Result\DecreaseCounterResult;
use Gs2\Mission\Request\DecreaseCounterByUserIdRequest;
use Gs2\Mission\Result\DecreaseCounterByUserIdResult;
use Gs2\Mission\Request\GetCounterRequest;
use Gs2\Mission\Result\GetCounterResult;
use Gs2\Mission\Request\GetCounterByUserIdRequest;
use Gs2\Mission\Result\GetCounterByUserIdResult;
use Gs2\Mission\Request\VerifyCounterValueRequest;
use Gs2\Mission\Result\VerifyCounterValueResult;
use Gs2\Mission\Request\VerifyCounterValueByUserIdRequest;
use Gs2\Mission\Result\VerifyCounterValueByUserIdResult;
use Gs2\Mission\Request\DeleteCounterByUserIdRequest;
use Gs2\Mission\Result\DeleteCounterByUserIdResult;
use Gs2\Mission\Request\IncreaseByStampSheetRequest;
use Gs2\Mission\Result\IncreaseByStampSheetResult;
use Gs2\Mission\Request\SetByStampSheetRequest;
use Gs2\Mission\Result\SetByStampSheetResult;
use Gs2\Mission\Request\DecreaseByStampTaskRequest;
use Gs2\Mission\Result\DecreaseByStampTaskResult;
use Gs2\Mission\Request\VerifyCounterValueByStampTaskRequest;
use Gs2\Mission\Result\VerifyCounterValueByStampTaskResult;
use Gs2\Mission\Request\ExportMasterRequest;
use Gs2\Mission\Result\ExportMasterResult;
use Gs2\Mission\Request\GetCurrentMissionMasterRequest;
use Gs2\Mission\Result\GetCurrentMissionMasterResult;
use Gs2\Mission\Request\UpdateCurrentMissionMasterRequest;
use Gs2\Mission\Result\UpdateCurrentMissionMasterResult;
use Gs2\Mission\Request\UpdateCurrentMissionMasterFromGitHubRequest;
use Gs2\Mission\Result\UpdateCurrentMissionMasterFromGitHubResult;
use Gs2\Mission\Request\DescribeCounterModelsRequest;
use Gs2\Mission\Result\DescribeCounterModelsResult;
use Gs2\Mission\Request\GetCounterModelRequest;
use Gs2\Mission\Result\GetCounterModelResult;
use Gs2\Mission\Request\DescribeMissionGroupModelsRequest;
use Gs2\Mission\Result\DescribeMissionGroupModelsResult;
use Gs2\Mission\Request\GetMissionGroupModelRequest;
use Gs2\Mission\Result\GetMissionGroupModelResult;
use Gs2\Mission\Request\DescribeMissionTaskModelsRequest;
use Gs2\Mission\Result\DescribeMissionTaskModelsResult;
use Gs2\Mission\Request\GetMissionTaskModelRequest;
use Gs2\Mission\Result\GetMissionTaskModelResult;
use Gs2\Mission\Request\DescribeMissionTaskModelMastersRequest;
use Gs2\Mission\Result\DescribeMissionTaskModelMastersResult;
use Gs2\Mission\Request\CreateMissionTaskModelMasterRequest;
use Gs2\Mission\Result\CreateMissionTaskModelMasterResult;
use Gs2\Mission\Request\GetMissionTaskModelMasterRequest;
use Gs2\Mission\Result\GetMissionTaskModelMasterResult;
use Gs2\Mission\Request\UpdateMissionTaskModelMasterRequest;
use Gs2\Mission\Result\UpdateMissionTaskModelMasterResult;
use Gs2\Mission\Request\DeleteMissionTaskModelMasterRequest;
use Gs2\Mission\Result\DeleteMissionTaskModelMasterResult;

class DescribeCompletesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCompletesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCompletesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCompletesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCompletesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCompletesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/complete";

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

class DescribeCompletesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCompletesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCompletesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCompletesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCompletesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCompletesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/complete";

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

class CompleteTask extends Gs2RestSessionTask {

    /**
     * @var CompleteRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CompleteTask constructor.
     * @param Gs2RestSession $session
     * @param CompleteRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CompleteRequest $request
    ) {
        parent::__construct(
            $session,
            CompleteResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/complete/group/{missionGroupName}/task/{missionTaskName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);

        $json = [];
        if ($this->request->getConfig() !== null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
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

class CompleteByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CompleteByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CompleteByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CompleteByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CompleteByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CompleteByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/complete/group/{missionGroupName}/task/{missionTaskName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getConfig() !== null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
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

class ReceiveByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ReceiveByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReceiveByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ReceiveByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReceiveByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ReceiveByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/complete/group/{missionGroupName}/task/{missionTaskName}/receive";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);
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

class RevertReceiveByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RevertReceiveByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RevertReceiveByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RevertReceiveByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RevertReceiveByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RevertReceiveByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/complete/group/{missionGroupName}/task/{missionTaskName}/revert";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);
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

class GetCompleteTask extends Gs2RestSessionTask {

    /**
     * @var GetCompleteRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCompleteTask constructor.
     * @param Gs2RestSession $session
     * @param GetCompleteRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCompleteRequest $request
    ) {
        parent::__construct(
            $session,
            GetCompleteResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/complete/group/{missionGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

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

class GetCompleteByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetCompleteByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCompleteByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetCompleteByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCompleteByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetCompleteByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/complete/group/{missionGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
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

class DeleteCompleteByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCompleteByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCompleteByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCompleteByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCompleteByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCompleteByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/complete/group/{missionGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

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

class VerifyCompleteTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCompleteRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCompleteTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCompleteRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCompleteRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCompleteResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/complete/group/{missionGroupName}/task/{missionTaskName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);
        $url = str_replace("{multiplyValueSpecifyingQuantity}", $this->request->getMultiplyValueSpecifyingQuantity() === null ? "null" : $this->request->getMultiplyValueSpecifyingQuantity(), $url);

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

class VerifyCompleteByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCompleteByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCompleteByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCompleteByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCompleteByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCompleteByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/complete/group/{missionGroupName}/task/{missionTaskName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);
        $url = str_replace("{multiplyValueSpecifyingQuantity}", $this->request->getMultiplyValueSpecifyingQuantity() === null ? "null" : $this->request->getMultiplyValueSpecifyingQuantity(), $url);

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

class ReceiveByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var ReceiveByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReceiveByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param ReceiveByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReceiveByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            ReceiveByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/receive";

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

class RevertReceiveByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var RevertReceiveByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RevertReceiveByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param RevertReceiveByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RevertReceiveByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            RevertReceiveByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/revert";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
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

class VerifyCompleteByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCompleteByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCompleteByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCompleteByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCompleteByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCompleteByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/complete/verify";

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

class DescribeCounterModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCounterModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCounterModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCounterModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCounterModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCounterModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/counter";

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

class CreateCounterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateCounterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateCounterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateCounterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateCounterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateCounterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/counter";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getScopes() !== null) {
            $array = [];
            foreach ($this->request->getScopes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["scopes"] = $array;
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

class GetCounterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCounterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCounterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCounterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCounterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCounterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/counter/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class UpdateCounterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCounterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCounterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCounterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCounterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCounterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/counter/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getScopes() !== null) {
            $array = [];
            foreach ($this->request->getScopes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["scopes"] = $array;
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

class DeleteCounterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCounterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCounterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCounterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCounterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCounterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/counter/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class DescribeMissionGroupModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMissionGroupModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMissionGroupModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMissionGroupModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMissionGroupModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMissionGroupModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group";

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

class CreateMissionGroupModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateMissionGroupModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateMissionGroupModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateMissionGroupModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateMissionGroupModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateMissionGroupModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getResetType() !== null) {
            $json["resetType"] = $this->request->getResetType();
        }
        if ($this->request->getResetDayOfMonth() !== null) {
            $json["resetDayOfMonth"] = $this->request->getResetDayOfMonth();
        }
        if ($this->request->getResetDayOfWeek() !== null) {
            $json["resetDayOfWeek"] = $this->request->getResetDayOfWeek();
        }
        if ($this->request->getResetHour() !== null) {
            $json["resetHour"] = $this->request->getResetHour();
        }
        if ($this->request->getCompleteNotificationNamespaceId() !== null) {
            $json["completeNotificationNamespaceId"] = $this->request->getCompleteNotificationNamespaceId();
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

class GetMissionGroupModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetMissionGroupModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMissionGroupModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetMissionGroupModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMissionGroupModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetMissionGroupModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{missionGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

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

class UpdateMissionGroupModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateMissionGroupModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateMissionGroupModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateMissionGroupModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateMissionGroupModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateMissionGroupModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{missionGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getResetType() !== null) {
            $json["resetType"] = $this->request->getResetType();
        }
        if ($this->request->getResetDayOfMonth() !== null) {
            $json["resetDayOfMonth"] = $this->request->getResetDayOfMonth();
        }
        if ($this->request->getResetDayOfWeek() !== null) {
            $json["resetDayOfWeek"] = $this->request->getResetDayOfWeek();
        }
        if ($this->request->getResetHour() !== null) {
            $json["resetHour"] = $this->request->getResetHour();
        }
        if ($this->request->getCompleteNotificationNamespaceId() !== null) {
            $json["completeNotificationNamespaceId"] = $this->request->getCompleteNotificationNamespaceId();
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

class DeleteMissionGroupModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMissionGroupModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMissionGroupModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMissionGroupModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMissionGroupModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMissionGroupModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{missionGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getMissionCompleteScript() !== null) {
            $json["missionCompleteScript"] = $this->request->getMissionCompleteScript()->toJson();
        }
        if ($this->request->getCounterIncrementScript() !== null) {
            $json["counterIncrementScript"] = $this->request->getCounterIncrementScript()->toJson();
        }
        if ($this->request->getReceiveRewardsScript() !== null) {
            $json["receiveRewardsScript"] = $this->request->getReceiveRewardsScript()->toJson();
        }
        if ($this->request->getCompleteNotification() !== null) {
            $json["completeNotification"] = $this->request->getCompleteNotification()->toJson();
        }
        if ($this->request->getLogSetting() !== null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getMissionCompleteScript() !== null) {
            $json["missionCompleteScript"] = $this->request->getMissionCompleteScript()->toJson();
        }
        if ($this->request->getCounterIncrementScript() !== null) {
            $json["counterIncrementScript"] = $this->request->getCounterIncrementScript()->toJson();
        }
        if ($this->request->getReceiveRewardsScript() !== null) {
            $json["receiveRewardsScript"] = $this->request->getReceiveRewardsScript()->toJson();
        }
        if ($this->request->getCompleteNotification() !== null) {
            $json["completeNotification"] = $this->request->getCompleteNotification()->toJson();
        }
        if ($this->request->getLogSetting() !== null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeCountersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCountersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCountersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCountersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCountersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCountersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter";

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

class DescribeCountersByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCountersByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCountersByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCountersByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCountersByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCountersByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter";

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

class IncreaseCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var IncreaseCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IncreaseCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param IncreaseCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IncreaseCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            IncreaseCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
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

class SetCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getValues() !== null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["values"] = $array;
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DecreaseCounterTask extends Gs2RestSessionTask {

    /**
     * @var DecreaseCounterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecreaseCounterTask constructor.
     * @param Gs2RestSession $session
     * @param DecreaseCounterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecreaseCounterRequest $request
    ) {
        parent::__construct(
            $session,
            DecreaseCounterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter/{counterName}/decrease";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
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

class DecreaseCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DecreaseCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecreaseCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DecreaseCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecreaseCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DecreaseCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{counterName}/decrease";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
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

class GetCounterTask extends Gs2RestSessionTask {

    /**
     * @var GetCounterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCounterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCounterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCounterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCounterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class GetCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
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

class VerifyCounterValueTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCounterValueRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCounterValueTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCounterValueRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCounterValueRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCounterValueResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter/{counterName}/verify/counter/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getResetType() !== null) {
            $json["resetType"] = $this->request->getResetType();
        }
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyCounterValueByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCounterValueByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCounterValueByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCounterValueByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCounterValueByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCounterValueByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{counterName}/verify/counter/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getResetType() !== null) {
            $json["resetType"] = $this->request->getResetType();
        }
        if ($this->request->getValue() !== null) {
            $json["value"] = $this->request->getValue();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class DeleteCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class IncreaseByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var IncreaseByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IncreaseByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param IncreaseByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IncreaseByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            IncreaseByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/increase";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
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

class SetByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/set";

        $json = [];
        if ($this->request->getStampSheet() !== null) {
            $json["stampSheet"] = $this->request->getStampSheet();
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

class DecreaseByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var DecreaseByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecreaseByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param DecreaseByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecreaseByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            DecreaseByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/decrease";

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

class VerifyCounterValueByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCounterValueByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCounterValueByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCounterValueByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCounterValueByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCounterValueByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/counter/verify";

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

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentMissionMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentMissionMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentMissionMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentMissionMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentMissionMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentMissionMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentMissionMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentMissionMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentMissionMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentMissionMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentMissionMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentMissionMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentMissionMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentMissionMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentMissionMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentMissionMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentMissionMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentMissionMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeCounterModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCounterModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCounterModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCounterModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCounterModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCounterModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/counter";

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

class GetCounterModelTask extends Gs2RestSessionTask {

    /**
     * @var GetCounterModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCounterModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetCounterModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCounterModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetCounterModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/counter/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class DescribeMissionGroupModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMissionGroupModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMissionGroupModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMissionGroupModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMissionGroupModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMissionGroupModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/group";

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

class GetMissionGroupModelTask extends Gs2RestSessionTask {

    /**
     * @var GetMissionGroupModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMissionGroupModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetMissionGroupModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMissionGroupModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetMissionGroupModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/group/{missionGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

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

class DescribeMissionTaskModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMissionTaskModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMissionTaskModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMissionTaskModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMissionTaskModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMissionTaskModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/group/{missionGroupName}/task";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

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

class GetMissionTaskModelTask extends Gs2RestSessionTask {

    /**
     * @var GetMissionTaskModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMissionTaskModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetMissionTaskModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMissionTaskModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetMissionTaskModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/group/{missionGroupName}/task/{missionTaskName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);

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

class DescribeMissionTaskModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMissionTaskModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMissionTaskModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMissionTaskModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMissionTaskModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMissionTaskModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{missionGroupName}/task";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

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

class CreateMissionTaskModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateMissionTaskModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateMissionTaskModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateMissionTaskModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateMissionTaskModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateMissionTaskModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{missionGroupName}/task";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getVerifyCompleteType() !== null) {
            $json["verifyCompleteType"] = $this->request->getVerifyCompleteType();
        }
        if ($this->request->getTargetCounter() !== null) {
            $json["targetCounter"] = $this->request->getTargetCounter()->toJson();
        }
        if ($this->request->getVerifyCompleteConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getVerifyCompleteConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["verifyCompleteConsumeActions"] = $array;
        }
        if ($this->request->getCompleteAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getCompleteAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["completeAcquireActions"] = $array;
        }
        if ($this->request->getChallengePeriodEventId() !== null) {
            $json["challengePeriodEventId"] = $this->request->getChallengePeriodEventId();
        }
        if ($this->request->getPremiseMissionTaskName() !== null) {
            $json["premiseMissionTaskName"] = $this->request->getPremiseMissionTaskName();
        }
        if ($this->request->getCounterName() !== null) {
            $json["counterName"] = $this->request->getCounterName();
        }
        if ($this->request->getTargetResetType() !== null) {
            $json["targetResetType"] = $this->request->getTargetResetType();
        }
        if ($this->request->getTargetValue() !== null) {
            $json["targetValue"] = $this->request->getTargetValue();
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

class GetMissionTaskModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetMissionTaskModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMissionTaskModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetMissionTaskModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMissionTaskModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetMissionTaskModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{missionGroupName}/task/{missionTaskName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);

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

class UpdateMissionTaskModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateMissionTaskModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateMissionTaskModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateMissionTaskModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateMissionTaskModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateMissionTaskModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{missionGroupName}/task/{missionTaskName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getVerifyCompleteType() !== null) {
            $json["verifyCompleteType"] = $this->request->getVerifyCompleteType();
        }
        if ($this->request->getTargetCounter() !== null) {
            $json["targetCounter"] = $this->request->getTargetCounter()->toJson();
        }
        if ($this->request->getVerifyCompleteConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getVerifyCompleteConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["verifyCompleteConsumeActions"] = $array;
        }
        if ($this->request->getCompleteAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getCompleteAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["completeAcquireActions"] = $array;
        }
        if ($this->request->getChallengePeriodEventId() !== null) {
            $json["challengePeriodEventId"] = $this->request->getChallengePeriodEventId();
        }
        if ($this->request->getPremiseMissionTaskName() !== null) {
            $json["premiseMissionTaskName"] = $this->request->getPremiseMissionTaskName();
        }
        if ($this->request->getCounterName() !== null) {
            $json["counterName"] = $this->request->getCounterName();
        }
        if ($this->request->getTargetResetType() !== null) {
            $json["targetResetType"] = $this->request->getTargetResetType();
        }
        if ($this->request->getTargetValue() !== null) {
            $json["targetValue"] = $this->request->getTargetValue();
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

class DeleteMissionTaskModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMissionTaskModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMissionTaskModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMissionTaskModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMissionTaskModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMissionTaskModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mission", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{missionGroupName}/task/{missionTaskName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{missionGroupName}", $this->request->getMissionGroupName() === null|| strlen($this->request->getMissionGroupName()) == 0 ? "null" : $this->request->getMissionGroupName(), $url);
        $url = str_replace("{missionTaskName}", $this->request->getMissionTaskName() === null|| strlen($this->request->getMissionTaskName()) == 0 ? "null" : $this->request->getMissionTaskName(), $url);

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

/**
 * GS2 Mission API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2MissionRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * @param DescribeCompletesRequest $request
     * @return PromiseInterface
     */
    public function describeCompletesAsync(
            DescribeCompletesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCompletesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCompletesRequest $request
     * @return DescribeCompletesResult
     */
    public function describeCompletes (
            DescribeCompletesRequest $request
    ): DescribeCompletesResult {
        return $this->describeCompletesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCompletesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeCompletesByUserIdAsync(
            DescribeCompletesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCompletesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCompletesByUserIdRequest $request
     * @return DescribeCompletesByUserIdResult
     */
    public function describeCompletesByUserId (
            DescribeCompletesByUserIdRequest $request
    ): DescribeCompletesByUserIdResult {
        return $this->describeCompletesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CompleteRequest $request
     * @return PromiseInterface
     */
    public function completeAsync(
            CompleteRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CompleteTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CompleteRequest $request
     * @return CompleteResult
     */
    public function complete (
            CompleteRequest $request
    ): CompleteResult {
        return $this->completeAsync(
            $request
        )->wait();
    }

    /**
     * @param CompleteByUserIdRequest $request
     * @return PromiseInterface
     */
    public function completeByUserIdAsync(
            CompleteByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CompleteByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CompleteByUserIdRequest $request
     * @return CompleteByUserIdResult
     */
    public function completeByUserId (
            CompleteByUserIdRequest $request
    ): CompleteByUserIdResult {
        return $this->completeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ReceiveByUserIdRequest $request
     * @return PromiseInterface
     */
    public function receiveByUserIdAsync(
            ReceiveByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReceiveByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ReceiveByUserIdRequest $request
     * @return ReceiveByUserIdResult
     */
    public function receiveByUserId (
            ReceiveByUserIdRequest $request
    ): ReceiveByUserIdResult {
        return $this->receiveByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param RevertReceiveByUserIdRequest $request
     * @return PromiseInterface
     */
    public function revertReceiveByUserIdAsync(
            RevertReceiveByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RevertReceiveByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RevertReceiveByUserIdRequest $request
     * @return RevertReceiveByUserIdResult
     */
    public function revertReceiveByUserId (
            RevertReceiveByUserIdRequest $request
    ): RevertReceiveByUserIdResult {
        return $this->revertReceiveByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCompleteRequest $request
     * @return PromiseInterface
     */
    public function getCompleteAsync(
            GetCompleteRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCompleteTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCompleteRequest $request
     * @return GetCompleteResult
     */
    public function getComplete (
            GetCompleteRequest $request
    ): GetCompleteResult {
        return $this->getCompleteAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCompleteByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getCompleteByUserIdAsync(
            GetCompleteByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCompleteByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCompleteByUserIdRequest $request
     * @return GetCompleteByUserIdResult
     */
    public function getCompleteByUserId (
            GetCompleteByUserIdRequest $request
    ): GetCompleteByUserIdResult {
        return $this->getCompleteByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteCompleteByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteCompleteByUserIdAsync(
            DeleteCompleteByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCompleteByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteCompleteByUserIdRequest $request
     * @return DeleteCompleteByUserIdResult
     */
    public function deleteCompleteByUserId (
            DeleteCompleteByUserIdRequest $request
    ): DeleteCompleteByUserIdResult {
        return $this->deleteCompleteByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCompleteRequest $request
     * @return PromiseInterface
     */
    public function verifyCompleteAsync(
            VerifyCompleteRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCompleteTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCompleteRequest $request
     * @return VerifyCompleteResult
     */
    public function verifyComplete (
            VerifyCompleteRequest $request
    ): VerifyCompleteResult {
        return $this->verifyCompleteAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCompleteByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyCompleteByUserIdAsync(
            VerifyCompleteByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCompleteByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCompleteByUserIdRequest $request
     * @return VerifyCompleteByUserIdResult
     */
    public function verifyCompleteByUserId (
            VerifyCompleteByUserIdRequest $request
    ): VerifyCompleteByUserIdResult {
        return $this->verifyCompleteByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ReceiveByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function receiveByStampTaskAsync(
            ReceiveByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReceiveByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ReceiveByStampTaskRequest $request
     * @return ReceiveByStampTaskResult
     */
    public function receiveByStampTask (
            ReceiveByStampTaskRequest $request
    ): ReceiveByStampTaskResult {
        return $this->receiveByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param RevertReceiveByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function revertReceiveByStampSheetAsync(
            RevertReceiveByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RevertReceiveByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RevertReceiveByStampSheetRequest $request
     * @return RevertReceiveByStampSheetResult
     */
    public function revertReceiveByStampSheet (
            RevertReceiveByStampSheetRequest $request
    ): RevertReceiveByStampSheetResult {
        return $this->revertReceiveByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCompleteByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyCompleteByStampTaskAsync(
            VerifyCompleteByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCompleteByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCompleteByStampTaskRequest $request
     * @return VerifyCompleteByStampTaskResult
     */
    public function verifyCompleteByStampTask (
            VerifyCompleteByStampTaskRequest $request
    ): VerifyCompleteByStampTaskResult {
        return $this->verifyCompleteByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCounterModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeCounterModelMastersAsync(
            DescribeCounterModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCounterModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCounterModelMastersRequest $request
     * @return DescribeCounterModelMastersResult
     */
    public function describeCounterModelMasters (
            DescribeCounterModelMastersRequest $request
    ): DescribeCounterModelMastersResult {
        return $this->describeCounterModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateCounterModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createCounterModelMasterAsync(
            CreateCounterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateCounterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateCounterModelMasterRequest $request
     * @return CreateCounterModelMasterResult
     */
    public function createCounterModelMaster (
            CreateCounterModelMasterRequest $request
    ): CreateCounterModelMasterResult {
        return $this->createCounterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCounterModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getCounterModelMasterAsync(
            GetCounterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCounterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCounterModelMasterRequest $request
     * @return GetCounterModelMasterResult
     */
    public function getCounterModelMaster (
            GetCounterModelMasterRequest $request
    ): GetCounterModelMasterResult {
        return $this->getCounterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCounterModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCounterModelMasterAsync(
            UpdateCounterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCounterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCounterModelMasterRequest $request
     * @return UpdateCounterModelMasterResult
     */
    public function updateCounterModelMaster (
            UpdateCounterModelMasterRequest $request
    ): UpdateCounterModelMasterResult {
        return $this->updateCounterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteCounterModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteCounterModelMasterAsync(
            DeleteCounterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCounterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteCounterModelMasterRequest $request
     * @return DeleteCounterModelMasterResult
     */
    public function deleteCounterModelMaster (
            DeleteCounterModelMasterRequest $request
    ): DeleteCounterModelMasterResult {
        return $this->deleteCounterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMissionGroupModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeMissionGroupModelMastersAsync(
            DescribeMissionGroupModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMissionGroupModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMissionGroupModelMastersRequest $request
     * @return DescribeMissionGroupModelMastersResult
     */
    public function describeMissionGroupModelMasters (
            DescribeMissionGroupModelMastersRequest $request
    ): DescribeMissionGroupModelMastersResult {
        return $this->describeMissionGroupModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateMissionGroupModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createMissionGroupModelMasterAsync(
            CreateMissionGroupModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateMissionGroupModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateMissionGroupModelMasterRequest $request
     * @return CreateMissionGroupModelMasterResult
     */
    public function createMissionGroupModelMaster (
            CreateMissionGroupModelMasterRequest $request
    ): CreateMissionGroupModelMasterResult {
        return $this->createMissionGroupModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMissionGroupModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getMissionGroupModelMasterAsync(
            GetMissionGroupModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMissionGroupModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMissionGroupModelMasterRequest $request
     * @return GetMissionGroupModelMasterResult
     */
    public function getMissionGroupModelMaster (
            GetMissionGroupModelMasterRequest $request
    ): GetMissionGroupModelMasterResult {
        return $this->getMissionGroupModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateMissionGroupModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateMissionGroupModelMasterAsync(
            UpdateMissionGroupModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateMissionGroupModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateMissionGroupModelMasterRequest $request
     * @return UpdateMissionGroupModelMasterResult
     */
    public function updateMissionGroupModelMaster (
            UpdateMissionGroupModelMasterRequest $request
    ): UpdateMissionGroupModelMasterResult {
        return $this->updateMissionGroupModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteMissionGroupModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteMissionGroupModelMasterAsync(
            DeleteMissionGroupModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMissionGroupModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteMissionGroupModelMasterRequest $request
     * @return DeleteMissionGroupModelMasterResult
     */
    public function deleteMissionGroupModelMaster (
            DeleteMissionGroupModelMasterRequest $request
    ): DeleteMissionGroupModelMasterResult {
        return $this->deleteMissionGroupModelMasterAsync(
            $request
        )->wait();
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
     * @param DescribeCountersRequest $request
     * @return PromiseInterface
     */
    public function describeCountersAsync(
            DescribeCountersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCountersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCountersRequest $request
     * @return DescribeCountersResult
     */
    public function describeCounters (
            DescribeCountersRequest $request
    ): DescribeCountersResult {
        return $this->describeCountersAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCountersByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeCountersByUserIdAsync(
            DescribeCountersByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCountersByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCountersByUserIdRequest $request
     * @return DescribeCountersByUserIdResult
     */
    public function describeCountersByUserId (
            DescribeCountersByUserIdRequest $request
    ): DescribeCountersByUserIdResult {
        return $this->describeCountersByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param IncreaseCounterByUserIdRequest $request
     * @return PromiseInterface
     */
    public function increaseCounterByUserIdAsync(
            IncreaseCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IncreaseCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IncreaseCounterByUserIdRequest $request
     * @return IncreaseCounterByUserIdResult
     */
    public function increaseCounterByUserId (
            IncreaseCounterByUserIdRequest $request
    ): IncreaseCounterByUserIdResult {
        return $this->increaseCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetCounterByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setCounterByUserIdAsync(
            SetCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetCounterByUserIdRequest $request
     * @return SetCounterByUserIdResult
     */
    public function setCounterByUserId (
            SetCounterByUserIdRequest $request
    ): SetCounterByUserIdResult {
        return $this->setCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DecreaseCounterRequest $request
     * @return PromiseInterface
     */
    public function decreaseCounterAsync(
            DecreaseCounterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecreaseCounterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecreaseCounterRequest $request
     * @return DecreaseCounterResult
     */
    public function decreaseCounter (
            DecreaseCounterRequest $request
    ): DecreaseCounterResult {
        return $this->decreaseCounterAsync(
            $request
        )->wait();
    }

    /**
     * @param DecreaseCounterByUserIdRequest $request
     * @return PromiseInterface
     */
    public function decreaseCounterByUserIdAsync(
            DecreaseCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecreaseCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecreaseCounterByUserIdRequest $request
     * @return DecreaseCounterByUserIdResult
     */
    public function decreaseCounterByUserId (
            DecreaseCounterByUserIdRequest $request
    ): DecreaseCounterByUserIdResult {
        return $this->decreaseCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCounterRequest $request
     * @return PromiseInterface
     */
    public function getCounterAsync(
            GetCounterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCounterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCounterRequest $request
     * @return GetCounterResult
     */
    public function getCounter (
            GetCounterRequest $request
    ): GetCounterResult {
        return $this->getCounterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCounterByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getCounterByUserIdAsync(
            GetCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCounterByUserIdRequest $request
     * @return GetCounterByUserIdResult
     */
    public function getCounterByUserId (
            GetCounterByUserIdRequest $request
    ): GetCounterByUserIdResult {
        return $this->getCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCounterValueRequest $request
     * @return PromiseInterface
     */
    public function verifyCounterValueAsync(
            VerifyCounterValueRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCounterValueTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCounterValueRequest $request
     * @return VerifyCounterValueResult
     */
    public function verifyCounterValue (
            VerifyCounterValueRequest $request
    ): VerifyCounterValueResult {
        return $this->verifyCounterValueAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCounterValueByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyCounterValueByUserIdAsync(
            VerifyCounterValueByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCounterValueByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCounterValueByUserIdRequest $request
     * @return VerifyCounterValueByUserIdResult
     */
    public function verifyCounterValueByUserId (
            VerifyCounterValueByUserIdRequest $request
    ): VerifyCounterValueByUserIdResult {
        return $this->verifyCounterValueByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteCounterByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteCounterByUserIdAsync(
            DeleteCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteCounterByUserIdRequest $request
     * @return DeleteCounterByUserIdResult
     */
    public function deleteCounterByUserId (
            DeleteCounterByUserIdRequest $request
    ): DeleteCounterByUserIdResult {
        return $this->deleteCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param IncreaseByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function increaseByStampSheetAsync(
            IncreaseByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IncreaseByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IncreaseByStampSheetRequest $request
     * @return IncreaseByStampSheetResult
     */
    public function increaseByStampSheet (
            IncreaseByStampSheetRequest $request
    ): IncreaseByStampSheetResult {
        return $this->increaseByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param SetByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function setByStampSheetAsync(
            SetByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetByStampSheetRequest $request
     * @return SetByStampSheetResult
     */
    public function setByStampSheet (
            SetByStampSheetRequest $request
    ): SetByStampSheetResult {
        return $this->setByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DecreaseByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function decreaseByStampTaskAsync(
            DecreaseByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecreaseByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecreaseByStampTaskRequest $request
     * @return DecreaseByStampTaskResult
     */
    public function decreaseByStampTask (
            DecreaseByStampTaskRequest $request
    ): DecreaseByStampTaskResult {
        return $this->decreaseByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCounterValueByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyCounterValueByStampTaskAsync(
            VerifyCounterValueByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCounterValueByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCounterValueByStampTaskRequest $request
     * @return VerifyCounterValueByStampTaskResult
     */
    public function verifyCounterValueByStampTask (
            VerifyCounterValueByStampTaskRequest $request
    ): VerifyCounterValueByStampTaskResult {
        return $this->verifyCounterValueByStampTaskAsync(
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
     * @param GetCurrentMissionMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentMissionMasterAsync(
            GetCurrentMissionMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentMissionMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentMissionMasterRequest $request
     * @return GetCurrentMissionMasterResult
     */
    public function getCurrentMissionMaster (
            GetCurrentMissionMasterRequest $request
    ): GetCurrentMissionMasterResult {
        return $this->getCurrentMissionMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentMissionMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentMissionMasterAsync(
            UpdateCurrentMissionMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentMissionMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentMissionMasterRequest $request
     * @return UpdateCurrentMissionMasterResult
     */
    public function updateCurrentMissionMaster (
            UpdateCurrentMissionMasterRequest $request
    ): UpdateCurrentMissionMasterResult {
        return $this->updateCurrentMissionMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentMissionMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentMissionMasterFromGitHubAsync(
            UpdateCurrentMissionMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentMissionMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentMissionMasterFromGitHubRequest $request
     * @return UpdateCurrentMissionMasterFromGitHubResult
     */
    public function updateCurrentMissionMasterFromGitHub (
            UpdateCurrentMissionMasterFromGitHubRequest $request
    ): UpdateCurrentMissionMasterFromGitHubResult {
        return $this->updateCurrentMissionMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCounterModelsRequest $request
     * @return PromiseInterface
     */
    public function describeCounterModelsAsync(
            DescribeCounterModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCounterModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCounterModelsRequest $request
     * @return DescribeCounterModelsResult
     */
    public function describeCounterModels (
            DescribeCounterModelsRequest $request
    ): DescribeCounterModelsResult {
        return $this->describeCounterModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCounterModelRequest $request
     * @return PromiseInterface
     */
    public function getCounterModelAsync(
            GetCounterModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCounterModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCounterModelRequest $request
     * @return GetCounterModelResult
     */
    public function getCounterModel (
            GetCounterModelRequest $request
    ): GetCounterModelResult {
        return $this->getCounterModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMissionGroupModelsRequest $request
     * @return PromiseInterface
     */
    public function describeMissionGroupModelsAsync(
            DescribeMissionGroupModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMissionGroupModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMissionGroupModelsRequest $request
     * @return DescribeMissionGroupModelsResult
     */
    public function describeMissionGroupModels (
            DescribeMissionGroupModelsRequest $request
    ): DescribeMissionGroupModelsResult {
        return $this->describeMissionGroupModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMissionGroupModelRequest $request
     * @return PromiseInterface
     */
    public function getMissionGroupModelAsync(
            GetMissionGroupModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMissionGroupModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMissionGroupModelRequest $request
     * @return GetMissionGroupModelResult
     */
    public function getMissionGroupModel (
            GetMissionGroupModelRequest $request
    ): GetMissionGroupModelResult {
        return $this->getMissionGroupModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMissionTaskModelsRequest $request
     * @return PromiseInterface
     */
    public function describeMissionTaskModelsAsync(
            DescribeMissionTaskModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMissionTaskModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMissionTaskModelsRequest $request
     * @return DescribeMissionTaskModelsResult
     */
    public function describeMissionTaskModels (
            DescribeMissionTaskModelsRequest $request
    ): DescribeMissionTaskModelsResult {
        return $this->describeMissionTaskModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMissionTaskModelRequest $request
     * @return PromiseInterface
     */
    public function getMissionTaskModelAsync(
            GetMissionTaskModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMissionTaskModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMissionTaskModelRequest $request
     * @return GetMissionTaskModelResult
     */
    public function getMissionTaskModel (
            GetMissionTaskModelRequest $request
    ): GetMissionTaskModelResult {
        return $this->getMissionTaskModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMissionTaskModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeMissionTaskModelMastersAsync(
            DescribeMissionTaskModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMissionTaskModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMissionTaskModelMastersRequest $request
     * @return DescribeMissionTaskModelMastersResult
     */
    public function describeMissionTaskModelMasters (
            DescribeMissionTaskModelMastersRequest $request
    ): DescribeMissionTaskModelMastersResult {
        return $this->describeMissionTaskModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateMissionTaskModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createMissionTaskModelMasterAsync(
            CreateMissionTaskModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateMissionTaskModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateMissionTaskModelMasterRequest $request
     * @return CreateMissionTaskModelMasterResult
     */
    public function createMissionTaskModelMaster (
            CreateMissionTaskModelMasterRequest $request
    ): CreateMissionTaskModelMasterResult {
        return $this->createMissionTaskModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMissionTaskModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getMissionTaskModelMasterAsync(
            GetMissionTaskModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMissionTaskModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMissionTaskModelMasterRequest $request
     * @return GetMissionTaskModelMasterResult
     */
    public function getMissionTaskModelMaster (
            GetMissionTaskModelMasterRequest $request
    ): GetMissionTaskModelMasterResult {
        return $this->getMissionTaskModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateMissionTaskModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateMissionTaskModelMasterAsync(
            UpdateMissionTaskModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateMissionTaskModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateMissionTaskModelMasterRequest $request
     * @return UpdateMissionTaskModelMasterResult
     */
    public function updateMissionTaskModelMaster (
            UpdateMissionTaskModelMasterRequest $request
    ): UpdateMissionTaskModelMasterResult {
        return $this->updateMissionTaskModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteMissionTaskModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteMissionTaskModelMasterAsync(
            DeleteMissionTaskModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMissionTaskModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteMissionTaskModelMasterRequest $request
     * @return DeleteMissionTaskModelMasterResult
     */
    public function deleteMissionTaskModelMaster (
            DeleteMissionTaskModelMasterRequest $request
    ): DeleteMissionTaskModelMasterResult {
        return $this->deleteMissionTaskModelMasterAsync(
            $request
        )->wait();
    }
}