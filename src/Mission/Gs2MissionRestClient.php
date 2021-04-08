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
use Gs2\Mission\Request\DescribeMissionTaskModelsRequest;
use Gs2\Mission\Result\DescribeMissionTaskModelsResult;
use Gs2\Mission\Request\GetMissionTaskModelRequest;
use Gs2\Mission\Result\GetMissionTaskModelResult;
use Gs2\Mission\Request\DescribeMissionGroupModelsRequest;
use Gs2\Mission\Result\DescribeMissionGroupModelsResult;
use Gs2\Mission\Request\GetMissionGroupModelRequest;
use Gs2\Mission\Result\GetMissionGroupModelResult;
use Gs2\Mission\Request\DescribeCountersRequest;
use Gs2\Mission\Result\DescribeCountersResult;
use Gs2\Mission\Request\DescribeCountersByUserIdRequest;
use Gs2\Mission\Result\DescribeCountersByUserIdResult;
use Gs2\Mission\Request\IncreaseCounterByUserIdRequest;
use Gs2\Mission\Result\IncreaseCounterByUserIdResult;
use Gs2\Mission\Request\GetCounterRequest;
use Gs2\Mission\Result\GetCounterResult;
use Gs2\Mission\Request\GetCounterByUserIdRequest;
use Gs2\Mission\Result\GetCounterByUserIdResult;
use Gs2\Mission\Request\DeleteCounterByUserIdRequest;
use Gs2\Mission\Result\DeleteCounterByUserIdResult;
use Gs2\Mission\Request\IncreaseByStampSheetRequest;
use Gs2\Mission\Result\IncreaseByStampSheetResult;
use Gs2\Mission\Request\ExportMasterRequest;
use Gs2\Mission\Result\ExportMasterResult;
use Gs2\Mission\Request\GetCurrentMissionMasterRequest;
use Gs2\Mission\Result\GetCurrentMissionMasterResult;
use Gs2\Mission\Request\UpdateCurrentMissionMasterRequest;
use Gs2\Mission\Result\UpdateCurrentMissionMasterResult;
use Gs2\Mission\Request\UpdateCurrentMissionMasterFromGitHubRequest;
use Gs2\Mission\Result\UpdateCurrentMissionMasterFromGitHubResult;
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
use Gs2\Mission\Request\GetCompleteRequest;
use Gs2\Mission\Result\GetCompleteResult;
use Gs2\Mission\Request\GetCompleteByUserIdRequest;
use Gs2\Mission\Result\GetCompleteByUserIdResult;
use Gs2\Mission\Request\DeleteCompleteByUserIdRequest;
use Gs2\Mission\Result\DeleteCompleteByUserIdResult;
use Gs2\Mission\Request\ReceiveByStampTaskRequest;
use Gs2\Mission\Result\ReceiveByStampTaskResult;
use Gs2\Mission\Request\DescribeCounterModelsRequest;
use Gs2\Mission\Result\DescribeCounterModelsResult;
use Gs2\Mission\Request\GetCounterModelRequest;
use Gs2\Mission\Result\GetCounterModelResult;
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getMissionCompleteScript() !== null) {
            $json["missionCompleteScript"] = $this->request->getMissionCompleteScript()->toJson();
        }
        if ($this->request->getCounterIncrementScript() !== null) {
            $json["counterIncrementScript"] = $this->request->getCounterIncrementScript()->toJson();
        }
        if ($this->request->getReceiveRewardsScript() !== null) {
            $json["receiveRewardsScript"] = $this->request->getReceiveRewardsScript()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getCompleteNotification() !== null) {
            $json["completeNotification"] = $this->request->getCompleteNotification()->toJson();
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
        if ($this->request->getMissionCompleteScript() !== null) {
            $json["missionCompleteScript"] = $this->request->getMissionCompleteScript()->toJson();
        }
        if ($this->request->getCounterIncrementScript() !== null) {
            $json["counterIncrementScript"] = $this->request->getCounterIncrementScript()->toJson();
        }
        if ($this->request->getReceiveRewardsScript() !== null) {
            $json["receiveRewardsScript"] = $this->request->getReceiveRewardsScript()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getCompleteNotification() !== null) {
            $json["completeNotification"] = $this->request->getCompleteNotification()->toJson();
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
        if ($this->request->getCounterName() !== null) {
            $json["counterName"] = $this->request->getCounterName();
        }
        if ($this->request->getTargetValue() !== null) {
            $json["targetValue"] = $this->request->getTargetValue();
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
        if ($this->request->getCounterName() !== null) {
            $json["counterName"] = $this->request->getCounterName();
        }
        if ($this->request->getTargetValue() !== null) {
            $json["targetValue"] = $this->request->getTargetValue();
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
     * ミッショングループマスターの一覧を取得<br>
     *
     * @param DescribeMissionGroupModelMastersRequest $request リクエストパラメータ
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
     * ミッショングループマスターの一覧を取得<br>
     *
     * @param DescribeMissionGroupModelMastersRequest $request リクエストパラメータ
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
     * ミッショングループマスターを新規作成<br>
     *
     * @param CreateMissionGroupModelMasterRequest $request リクエストパラメータ
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
     * ミッショングループマスターを新規作成<br>
     *
     * @param CreateMissionGroupModelMasterRequest $request リクエストパラメータ
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
     * ミッショングループマスターを取得<br>
     *
     * @param GetMissionGroupModelMasterRequest $request リクエストパラメータ
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
     * ミッショングループマスターを取得<br>
     *
     * @param GetMissionGroupModelMasterRequest $request リクエストパラメータ
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
     * ミッショングループマスターを更新<br>
     *
     * @param UpdateMissionGroupModelMasterRequest $request リクエストパラメータ
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
     * ミッショングループマスターを更新<br>
     *
     * @param UpdateMissionGroupModelMasterRequest $request リクエストパラメータ
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
     * ミッショングループマスターを削除<br>
     *
     * @param DeleteMissionGroupModelMasterRequest $request リクエストパラメータ
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
     * ミッショングループマスターを削除<br>
     *
     * @param DeleteMissionGroupModelMasterRequest $request リクエストパラメータ
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
     * ミッションタスクの一覧を取得<br>
     *
     * @param DescribeMissionTaskModelsRequest $request リクエストパラメータ
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
     * ミッションタスクの一覧を取得<br>
     *
     * @param DescribeMissionTaskModelsRequest $request リクエストパラメータ
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
     * ミッションタスクを取得<br>
     *
     * @param GetMissionTaskModelRequest $request リクエストパラメータ
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
     * ミッションタスクを取得<br>
     *
     * @param GetMissionTaskModelRequest $request リクエストパラメータ
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
     * ミッショングループの一覧を取得<br>
     *
     * @param DescribeMissionGroupModelsRequest $request リクエストパラメータ
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
     * ミッショングループの一覧を取得<br>
     *
     * @param DescribeMissionGroupModelsRequest $request リクエストパラメータ
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
     * ミッショングループを取得<br>
     *
     * @param GetMissionGroupModelRequest $request リクエストパラメータ
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
     * ミッショングループを取得<br>
     *
     * @param GetMissionGroupModelRequest $request リクエストパラメータ
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
     * カウンターの一覧を取得<br>
     *
     * @param DescribeCountersRequest $request リクエストパラメータ
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
     * カウンターの一覧を取得<br>
     *
     * @param DescribeCountersRequest $request リクエストパラメータ
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
     * ユーザIDを指定してカウンターの一覧を取得<br>
     *
     * @param DescribeCountersByUserIdRequest $request リクエストパラメータ
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
     * ユーザIDを指定してカウンターの一覧を取得<br>
     *
     * @param DescribeCountersByUserIdRequest $request リクエストパラメータ
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
     * カウンターに加算<br>
     *
     * @param IncreaseCounterByUserIdRequest $request リクエストパラメータ
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
     * カウンターに加算<br>
     *
     * @param IncreaseCounterByUserIdRequest $request リクエストパラメータ
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
     * カウンターを取得<br>
     *
     * @param GetCounterRequest $request リクエストパラメータ
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
     * カウンターを取得<br>
     *
     * @param GetCounterRequest $request リクエストパラメータ
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
     * ユーザIDを指定してカウンターを取得<br>
     *
     * @param GetCounterByUserIdRequest $request リクエストパラメータ
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
     * ユーザIDを指定してカウンターを取得<br>
     *
     * @param GetCounterByUserIdRequest $request リクエストパラメータ
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
     * カウンターを削除<br>
     *
     * @param DeleteCounterByUserIdRequest $request リクエストパラメータ
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
     * カウンターを削除<br>
     *
     * @param DeleteCounterByUserIdRequest $request リクエストパラメータ
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
     * カウンター加算<br>
     *
     * @param IncreaseByStampSheetRequest $request リクエストパラメータ
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
     * カウンター加算<br>
     *
     * @param IncreaseByStampSheetRequest $request リクエストパラメータ
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
     * 現在有効なミッションのマスターデータをエクスポートします<br>
     *
     * @param ExportMasterRequest $request リクエストパラメータ
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
     * 現在有効なミッションのマスターデータをエクスポートします<br>
     *
     * @param ExportMasterRequest $request リクエストパラメータ
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
     * 現在有効なミッションを取得します<br>
     *
     * @param GetCurrentMissionMasterRequest $request リクエストパラメータ
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
     * 現在有効なミッションを取得します<br>
     *
     * @param GetCurrentMissionMasterRequest $request リクエストパラメータ
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
     * 現在有効なミッションを更新します<br>
     *
     * @param UpdateCurrentMissionMasterRequest $request リクエストパラメータ
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
     * 現在有効なミッションを更新します<br>
     *
     * @param UpdateCurrentMissionMasterRequest $request リクエストパラメータ
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
     * 現在有効なミッションを更新します<br>
     *
     * @param UpdateCurrentMissionMasterFromGitHubRequest $request リクエストパラメータ
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
     * 現在有効なミッションを更新します<br>
     *
     * @param UpdateCurrentMissionMasterFromGitHubRequest $request リクエストパラメータ
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
     * 達成状況の一覧を取得<br>
     *
     * @param DescribeCompletesRequest $request リクエストパラメータ
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
     * 達成状況の一覧を取得<br>
     *
     * @param DescribeCompletesRequest $request リクエストパラメータ
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
     * ユーザIDを指定して達成状況の一覧を取得<br>
     *
     * @param DescribeCompletesByUserIdRequest $request リクエストパラメータ
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
     * ユーザIDを指定して達成状況の一覧を取得<br>
     *
     * @param DescribeCompletesByUserIdRequest $request リクエストパラメータ
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
     * ミッション達成報酬を受領するためのスタンプシートを発行<br>
     *
     * @param CompleteRequest $request リクエストパラメータ
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
     * ミッション達成報酬を受領するためのスタンプシートを発行<br>
     *
     * @param CompleteRequest $request リクエストパラメータ
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
     * 達成状況を新規作成<br>
     *
     * @param CompleteByUserIdRequest $request リクエストパラメータ
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
     * 達成状況を新規作成<br>
     *
     * @param CompleteByUserIdRequest $request リクエストパラメータ
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
     * ミッション達成報酬を受領する<br>
     *
     * @param ReceiveByUserIdRequest $request リクエストパラメータ
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
     * ミッション達成報酬を受領する<br>
     *
     * @param ReceiveByUserIdRequest $request リクエストパラメータ
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
     * 達成状況を取得<br>
     *
     * @param GetCompleteRequest $request リクエストパラメータ
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
     * 達成状況を取得<br>
     *
     * @param GetCompleteRequest $request リクエストパラメータ
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
     * ユーザIDを指定して達成状況を取得<br>
     *
     * @param GetCompleteByUserIdRequest $request リクエストパラメータ
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
     * ユーザIDを指定して達成状況を取得<br>
     *
     * @param GetCompleteByUserIdRequest $request リクエストパラメータ
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
     * 達成状況を削除<br>
     *
     * @param DeleteCompleteByUserIdRequest $request リクエストパラメータ
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
     * 達成状況を削除<br>
     *
     * @param DeleteCompleteByUserIdRequest $request リクエストパラメータ
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
     * 達成状況を作成<br>
     *
     * @param ReceiveByStampTaskRequest $request リクエストパラメータ
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
     * 達成状況を作成<br>
     *
     * @param ReceiveByStampTaskRequest $request リクエストパラメータ
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
     * カウンターの種類の一覧を取得<br>
     *
     * @param DescribeCounterModelsRequest $request リクエストパラメータ
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
     * カウンターの種類の一覧を取得<br>
     *
     * @param DescribeCounterModelsRequest $request リクエストパラメータ
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
     * カウンターの種類を取得<br>
     *
     * @param GetCounterModelRequest $request リクエストパラメータ
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
     * カウンターの種類を取得<br>
     *
     * @param GetCounterModelRequest $request リクエストパラメータ
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
     * ネームスペースの一覧を取得<br>
     *
     * @param DescribeNamespacesRequest $request リクエストパラメータ
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
     * ネームスペースの一覧を取得<br>
     *
     * @param DescribeNamespacesRequest $request リクエストパラメータ
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
     * ネームスペースを新規作成<br>
     *
     * @param CreateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを新規作成<br>
     *
     * @param CreateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースの状態を取得<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
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
     * ネームスペースの状態を取得<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
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
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを更新<br>
     *
     * @param UpdateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを更新<br>
     *
     * @param UpdateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを削除<br>
     *
     * @param DeleteNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを削除<br>
     *
     * @param DeleteNamespaceRequest $request リクエストパラメータ
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
     * ミッションタスクマスターの一覧を取得<br>
     *
     * @param DescribeMissionTaskModelMastersRequest $request リクエストパラメータ
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
     * ミッションタスクマスターの一覧を取得<br>
     *
     * @param DescribeMissionTaskModelMastersRequest $request リクエストパラメータ
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
     * ミッションタスクマスターを新規作成<br>
     *
     * @param CreateMissionTaskModelMasterRequest $request リクエストパラメータ
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
     * ミッションタスクマスターを新規作成<br>
     *
     * @param CreateMissionTaskModelMasterRequest $request リクエストパラメータ
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
     * ミッションタスクマスターを取得<br>
     *
     * @param GetMissionTaskModelMasterRequest $request リクエストパラメータ
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
     * ミッションタスクマスターを取得<br>
     *
     * @param GetMissionTaskModelMasterRequest $request リクエストパラメータ
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
     * ミッションタスクマスターを更新<br>
     *
     * @param UpdateMissionTaskModelMasterRequest $request リクエストパラメータ
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
     * ミッションタスクマスターを更新<br>
     *
     * @param UpdateMissionTaskModelMasterRequest $request リクエストパラメータ
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
     * ミッションタスクマスターを削除<br>
     *
     * @param DeleteMissionTaskModelMasterRequest $request リクエストパラメータ
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
     * ミッションタスクマスターを削除<br>
     *
     * @param DeleteMissionTaskModelMasterRequest $request リクエストパラメータ
     * @return DeleteMissionTaskModelMasterResult
     */
    public function deleteMissionTaskModelMaster (
            DeleteMissionTaskModelMasterRequest $request
    ): DeleteMissionTaskModelMasterResult {
        return $this->deleteMissionTaskModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * カウンターの種類マスターの一覧を取得<br>
     *
     * @param DescribeCounterModelMastersRequest $request リクエストパラメータ
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
     * カウンターの種類マスターの一覧を取得<br>
     *
     * @param DescribeCounterModelMastersRequest $request リクエストパラメータ
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
     * カウンターの種類マスターを新規作成<br>
     *
     * @param CreateCounterModelMasterRequest $request リクエストパラメータ
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
     * カウンターの種類マスターを新規作成<br>
     *
     * @param CreateCounterModelMasterRequest $request リクエストパラメータ
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
     * カウンターの種類マスターを取得<br>
     *
     * @param GetCounterModelMasterRequest $request リクエストパラメータ
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
     * カウンターの種類マスターを取得<br>
     *
     * @param GetCounterModelMasterRequest $request リクエストパラメータ
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
     * カウンターの種類マスターを更新<br>
     *
     * @param UpdateCounterModelMasterRequest $request リクエストパラメータ
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
     * カウンターの種類マスターを更新<br>
     *
     * @param UpdateCounterModelMasterRequest $request リクエストパラメータ
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
     * カウンターの種類マスターを削除<br>
     *
     * @param DeleteCounterModelMasterRequest $request リクエストパラメータ
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
     * カウンターの種類マスターを削除<br>
     *
     * @param DeleteCounterModelMasterRequest $request リクエストパラメータ
     * @return DeleteCounterModelMasterResult
     */
    public function deleteCounterModelMaster (
            DeleteCounterModelMasterRequest $request
    ): DeleteCounterModelMasterResult {
        return $this->deleteCounterModelMasterAsync(
            $request
        )->wait();
    }
}