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

namespace Gs2\StateMachine;

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


use Gs2\StateMachine\Request\DescribeNamespacesRequest;
use Gs2\StateMachine\Result\DescribeNamespacesResult;
use Gs2\StateMachine\Request\CreateNamespaceRequest;
use Gs2\StateMachine\Result\CreateNamespaceResult;
use Gs2\StateMachine\Request\GetNamespaceStatusRequest;
use Gs2\StateMachine\Result\GetNamespaceStatusResult;
use Gs2\StateMachine\Request\GetNamespaceRequest;
use Gs2\StateMachine\Result\GetNamespaceResult;
use Gs2\StateMachine\Request\UpdateNamespaceRequest;
use Gs2\StateMachine\Result\UpdateNamespaceResult;
use Gs2\StateMachine\Request\DeleteNamespaceRequest;
use Gs2\StateMachine\Result\DeleteNamespaceResult;
use Gs2\StateMachine\Request\DescribeStateMachineMastersRequest;
use Gs2\StateMachine\Result\DescribeStateMachineMastersResult;
use Gs2\StateMachine\Request\UpdateStateMachineMasterRequest;
use Gs2\StateMachine\Result\UpdateStateMachineMasterResult;
use Gs2\StateMachine\Request\GetStateMachineMasterRequest;
use Gs2\StateMachine\Result\GetStateMachineMasterResult;
use Gs2\StateMachine\Request\DeleteStateMachineMasterRequest;
use Gs2\StateMachine\Result\DeleteStateMachineMasterResult;
use Gs2\StateMachine\Request\DescribeStatusesRequest;
use Gs2\StateMachine\Result\DescribeStatusesResult;
use Gs2\StateMachine\Request\DescribeStatusesByUserIdRequest;
use Gs2\StateMachine\Result\DescribeStatusesByUserIdResult;
use Gs2\StateMachine\Request\GetStatusRequest;
use Gs2\StateMachine\Result\GetStatusResult;
use Gs2\StateMachine\Request\GetStatusByUserIdRequest;
use Gs2\StateMachine\Result\GetStatusByUserIdResult;
use Gs2\StateMachine\Request\StartStateMachineByUserIdRequest;
use Gs2\StateMachine\Result\StartStateMachineByUserIdResult;
use Gs2\StateMachine\Request\StartStateMachineByStampSheetRequest;
use Gs2\StateMachine\Result\StartStateMachineByStampSheetResult;
use Gs2\StateMachine\Request\EmitRequest;
use Gs2\StateMachine\Result\EmitResult;
use Gs2\StateMachine\Request\EmitByUserIdRequest;
use Gs2\StateMachine\Result\EmitByUserIdResult;
use Gs2\StateMachine\Request\DeleteStatusByUserIdRequest;
use Gs2\StateMachine\Result\DeleteStatusByUserIdResult;
use Gs2\StateMachine\Request\ExitStateMachineRequest;
use Gs2\StateMachine\Result\ExitStateMachineResult;
use Gs2\StateMachine\Request\ExitStateMachineByUserIdRequest;
use Gs2\StateMachine\Result\ExitStateMachineByUserIdResult;

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

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getStartScript() !== null) {
            $json["startScript"] = $this->request->getStartScript()->toJson();
        }
        if ($this->request->getPassScript() !== null) {
            $json["passScript"] = $this->request->getPassScript()->toJson();
        }
        if ($this->request->getErrorScript() !== null) {
            $json["errorScript"] = $this->request->getErrorScript()->toJson();
        }
        if ($this->request->getLowestStateMachineVersion() !== null) {
            $json["lowestStateMachineVersion"] = $this->request->getLowestStateMachineVersion();
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

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getStartScript() !== null) {
            $json["startScript"] = $this->request->getStartScript()->toJson();
        }
        if ($this->request->getPassScript() !== null) {
            $json["passScript"] = $this->request->getPassScript()->toJson();
        }
        if ($this->request->getErrorScript() !== null) {
            $json["errorScript"] = $this->request->getErrorScript()->toJson();
        }
        if ($this->request->getLowestStateMachineVersion() !== null) {
            $json["lowestStateMachineVersion"] = $this->request->getLowestStateMachineVersion();
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

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeStateMachineMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStateMachineMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStateMachineMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStateMachineMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStateMachineMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStateMachineMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/stateMachine";

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

class UpdateStateMachineMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateStateMachineMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateStateMachineMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateStateMachineMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateStateMachineMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateStateMachineMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/stateMachine";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getMainStateMachineName() !== null) {
            $json["mainStateMachineName"] = $this->request->getMainStateMachineName();
        }
        if ($this->request->getPayload() !== null) {
            $json["payload"] = $this->request->getPayload();
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

class GetStateMachineMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetStateMachineMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStateMachineMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetStateMachineMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStateMachineMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetStateMachineMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/stateMachine/{version}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{version}", $this->request->getVersion() === null ? "null" : $this->request->getVersion(), $url);

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

class DeleteStateMachineMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStateMachineMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStateMachineMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStateMachineMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStateMachineMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStateMachineMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/stateMachine/{version}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{version}", $this->request->getVersion() === null ? "null" : $this->request->getVersion(), $url);

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

class DescribeStatusesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStatusesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStatusesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStatusesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStatusesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStatusesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getStatus() !== null) {
            $queryStrings["status"] = $this->request->getStatus();
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

class DescribeStatusesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStatusesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStatusesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStatusesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStatusesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStatusesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getStatus() !== null) {
            $queryStrings["status"] = $this->request->getStatus();
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

class GetStatusTask extends Gs2RestSessionTask {

    /**
     * @var GetStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStatusTask constructor.
     * @param Gs2RestSession $session
     * @param GetStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStatusRequest $request
    ) {
        parent::__construct(
            $session,
            GetStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{statusName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{statusName}", $this->request->getStatusName() === null|| strlen($this->request->getStatusName()) == 0 ? "null" : $this->request->getStatusName(), $url);

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

class GetStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{statusName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{statusName}", $this->request->getStatusName() === null|| strlen($this->request->getStatusName()) == 0 ? "null" : $this->request->getStatusName(), $url);

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

class StartStateMachineByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var StartStateMachineByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * StartStateMachineByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param StartStateMachineByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        StartStateMachineByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            StartStateMachineByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getArgs() !== null) {
            $json["args"] = $this->request->getArgs();
        }
        if ($this->request->getTtl() !== null) {
            $json["ttl"] = $this->request->getTtl();
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

class StartStateMachineByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var StartStateMachineByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * StartStateMachineByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param StartStateMachineByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        StartStateMachineByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            StartStateMachineByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/stateMachine/start";

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

class EmitTask extends Gs2RestSessionTask {

    /**
     * @var EmitRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * EmitTask constructor.
     * @param Gs2RestSession $session
     * @param EmitRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        EmitRequest $request
    ) {
        parent::__construct(
            $session,
            EmitResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{statusName}/emit";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{statusName}", $this->request->getStatusName() === null|| strlen($this->request->getStatusName()) == 0 ? "null" : $this->request->getStatusName(), $url);

        $json = [];
        if ($this->request->getEventName() !== null) {
            $json["eventName"] = $this->request->getEventName();
        }
        if ($this->request->getArgs() !== null) {
            $json["args"] = $this->request->getArgs();
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

class EmitByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var EmitByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * EmitByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param EmitByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        EmitByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            EmitByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{statusName}/emit";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{statusName}", $this->request->getStatusName() === null|| strlen($this->request->getStatusName()) == 0 ? "null" : $this->request->getStatusName(), $url);

        $json = [];
        if ($this->request->getEventName() !== null) {
            $json["eventName"] = $this->request->getEventName();
        }
        if ($this->request->getArgs() !== null) {
            $json["args"] = $this->request->getArgs();
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

class DeleteStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{statusName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{statusName}", $this->request->getStatusName() === null|| strlen($this->request->getStatusName()) == 0 ? "null" : $this->request->getStatusName(), $url);

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

class ExitStateMachineTask extends Gs2RestSessionTask {

    /**
     * @var ExitStateMachineRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ExitStateMachineTask constructor.
     * @param Gs2RestSession $session
     * @param ExitStateMachineRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ExitStateMachineRequest $request
    ) {
        parent::__construct(
            $session,
            ExitStateMachineResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{statusName}/exit";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{statusName}", $this->request->getStatusName() === null|| strlen($this->request->getStatusName()) == 0 ? "null" : $this->request->getStatusName(), $url);

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

class ExitStateMachineByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ExitStateMachineByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ExitStateMachineByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ExitStateMachineByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ExitStateMachineByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ExitStateMachineByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "state-machine", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{statusName}/exit";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{statusName}", $this->request->getStatusName() === null|| strlen($this->request->getStatusName()) == 0 ? "null" : $this->request->getStatusName(), $url);

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

/**
 * GS2 StateMachine API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2StateMachineRestClient extends AbstractGs2Client {

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
     * @param DescribeStateMachineMastersRequest $request
     * @return PromiseInterface
     */
    public function describeStateMachineMastersAsync(
            DescribeStateMachineMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStateMachineMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStateMachineMastersRequest $request
     * @return DescribeStateMachineMastersResult
     */
    public function describeStateMachineMasters (
            DescribeStateMachineMastersRequest $request
    ): DescribeStateMachineMastersResult {
        return $this->describeStateMachineMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateStateMachineMasterRequest $request
     * @return PromiseInterface
     */
    public function updateStateMachineMasterAsync(
            UpdateStateMachineMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateStateMachineMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateStateMachineMasterRequest $request
     * @return UpdateStateMachineMasterResult
     */
    public function updateStateMachineMaster (
            UpdateStateMachineMasterRequest $request
    ): UpdateStateMachineMasterResult {
        return $this->updateStateMachineMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStateMachineMasterRequest $request
     * @return PromiseInterface
     */
    public function getStateMachineMasterAsync(
            GetStateMachineMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStateMachineMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStateMachineMasterRequest $request
     * @return GetStateMachineMasterResult
     */
    public function getStateMachineMaster (
            GetStateMachineMasterRequest $request
    ): GetStateMachineMasterResult {
        return $this->getStateMachineMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteStateMachineMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteStateMachineMasterAsync(
            DeleteStateMachineMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStateMachineMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteStateMachineMasterRequest $request
     * @return DeleteStateMachineMasterResult
     */
    public function deleteStateMachineMaster (
            DeleteStateMachineMasterRequest $request
    ): DeleteStateMachineMasterResult {
        return $this->deleteStateMachineMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStatusesRequest $request
     * @return PromiseInterface
     */
    public function describeStatusesAsync(
            DescribeStatusesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStatusesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStatusesRequest $request
     * @return DescribeStatusesResult
     */
    public function describeStatuses (
            DescribeStatusesRequest $request
    ): DescribeStatusesResult {
        return $this->describeStatusesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStatusesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeStatusesByUserIdAsync(
            DescribeStatusesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStatusesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeStatusesByUserIdRequest $request
     * @return DescribeStatusesByUserIdResult
     */
    public function describeStatusesByUserId (
            DescribeStatusesByUserIdRequest $request
    ): DescribeStatusesByUserIdResult {
        return $this->describeStatusesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStatusRequest $request
     * @return PromiseInterface
     */
    public function getStatusAsync(
            GetStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStatusRequest $request
     * @return GetStatusResult
     */
    public function getStatus (
            GetStatusRequest $request
    ): GetStatusResult {
        return $this->getStatusAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStatusByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getStatusByUserIdAsync(
            GetStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetStatusByUserIdRequest $request
     * @return GetStatusByUserIdResult
     */
    public function getStatusByUserId (
            GetStatusByUserIdRequest $request
    ): GetStatusByUserIdResult {
        return $this->getStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param StartStateMachineByUserIdRequest $request
     * @return PromiseInterface
     */
    public function startStateMachineByUserIdAsync(
            StartStateMachineByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new StartStateMachineByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param StartStateMachineByUserIdRequest $request
     * @return StartStateMachineByUserIdResult
     */
    public function startStateMachineByUserId (
            StartStateMachineByUserIdRequest $request
    ): StartStateMachineByUserIdResult {
        return $this->startStateMachineByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param StartStateMachineByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function startStateMachineByStampSheetAsync(
            StartStateMachineByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new StartStateMachineByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param StartStateMachineByStampSheetRequest $request
     * @return StartStateMachineByStampSheetResult
     */
    public function startStateMachineByStampSheet (
            StartStateMachineByStampSheetRequest $request
    ): StartStateMachineByStampSheetResult {
        return $this->startStateMachineByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param EmitRequest $request
     * @return PromiseInterface
     */
    public function emitAsync(
            EmitRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new EmitTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param EmitRequest $request
     * @return EmitResult
     */
    public function emit (
            EmitRequest $request
    ): EmitResult {
        return $this->emitAsync(
            $request
        )->wait();
    }

    /**
     * @param EmitByUserIdRequest $request
     * @return PromiseInterface
     */
    public function emitByUserIdAsync(
            EmitByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new EmitByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param EmitByUserIdRequest $request
     * @return EmitByUserIdResult
     */
    public function emitByUserId (
            EmitByUserIdRequest $request
    ): EmitByUserIdResult {
        return $this->emitByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteStatusByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteStatusByUserIdAsync(
            DeleteStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteStatusByUserIdRequest $request
     * @return DeleteStatusByUserIdResult
     */
    public function deleteStatusByUserId (
            DeleteStatusByUserIdRequest $request
    ): DeleteStatusByUserIdResult {
        return $this->deleteStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ExitStateMachineRequest $request
     * @return PromiseInterface
     */
    public function exitStateMachineAsync(
            ExitStateMachineRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ExitStateMachineTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ExitStateMachineRequest $request
     * @return ExitStateMachineResult
     */
    public function exitStateMachine (
            ExitStateMachineRequest $request
    ): ExitStateMachineResult {
        return $this->exitStateMachineAsync(
            $request
        )->wait();
    }

    /**
     * @param ExitStateMachineByUserIdRequest $request
     * @return PromiseInterface
     */
    public function exitStateMachineByUserIdAsync(
            ExitStateMachineByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ExitStateMachineByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ExitStateMachineByUserIdRequest $request
     * @return ExitStateMachineByUserIdResult
     */
    public function exitStateMachineByUserId (
            ExitStateMachineByUserIdRequest $request
    ): ExitStateMachineByUserIdResult {
        return $this->exitStateMachineByUserIdAsync(
            $request
        )->wait();
    }
}