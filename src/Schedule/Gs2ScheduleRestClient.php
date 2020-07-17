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

namespace Gs2\Schedule;

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
use Gs2\Schedule\Request\DescribeNamespacesRequest;
use Gs2\Schedule\Result\DescribeNamespacesResult;
use Gs2\Schedule\Request\CreateNamespaceRequest;
use Gs2\Schedule\Result\CreateNamespaceResult;
use Gs2\Schedule\Request\GetNamespaceStatusRequest;
use Gs2\Schedule\Result\GetNamespaceStatusResult;
use Gs2\Schedule\Request\GetNamespaceRequest;
use Gs2\Schedule\Result\GetNamespaceResult;
use Gs2\Schedule\Request\UpdateNamespaceRequest;
use Gs2\Schedule\Result\UpdateNamespaceResult;
use Gs2\Schedule\Request\DeleteNamespaceRequest;
use Gs2\Schedule\Result\DeleteNamespaceResult;
use Gs2\Schedule\Request\DescribeEventMastersRequest;
use Gs2\Schedule\Result\DescribeEventMastersResult;
use Gs2\Schedule\Request\CreateEventMasterRequest;
use Gs2\Schedule\Result\CreateEventMasterResult;
use Gs2\Schedule\Request\GetEventMasterRequest;
use Gs2\Schedule\Result\GetEventMasterResult;
use Gs2\Schedule\Request\UpdateEventMasterRequest;
use Gs2\Schedule\Result\UpdateEventMasterResult;
use Gs2\Schedule\Request\DeleteEventMasterRequest;
use Gs2\Schedule\Result\DeleteEventMasterResult;
use Gs2\Schedule\Request\DescribeTriggersRequest;
use Gs2\Schedule\Result\DescribeTriggersResult;
use Gs2\Schedule\Request\DescribeTriggersByUserIdRequest;
use Gs2\Schedule\Result\DescribeTriggersByUserIdResult;
use Gs2\Schedule\Request\GetTriggerRequest;
use Gs2\Schedule\Result\GetTriggerResult;
use Gs2\Schedule\Request\GetTriggerByUserIdRequest;
use Gs2\Schedule\Result\GetTriggerByUserIdResult;
use Gs2\Schedule\Request\TriggerByUserIdRequest;
use Gs2\Schedule\Result\TriggerByUserIdResult;
use Gs2\Schedule\Request\DeleteTriggerRequest;
use Gs2\Schedule\Result\DeleteTriggerResult;
use Gs2\Schedule\Request\DeleteTriggerByUserIdRequest;
use Gs2\Schedule\Result\DeleteTriggerByUserIdResult;
use Gs2\Schedule\Request\DescribeEventsRequest;
use Gs2\Schedule\Result\DescribeEventsResult;
use Gs2\Schedule\Request\DescribeEventsByUserIdRequest;
use Gs2\Schedule\Result\DescribeEventsByUserIdResult;
use Gs2\Schedule\Request\DescribeRawEventsRequest;
use Gs2\Schedule\Result\DescribeRawEventsResult;
use Gs2\Schedule\Request\GetEventRequest;
use Gs2\Schedule\Result\GetEventResult;
use Gs2\Schedule\Request\GetEventByUserIdRequest;
use Gs2\Schedule\Result\GetEventByUserIdResult;
use Gs2\Schedule\Request\GetRawEventRequest;
use Gs2\Schedule\Result\GetRawEventResult;
use Gs2\Schedule\Request\ExportMasterRequest;
use Gs2\Schedule\Result\ExportMasterResult;
use Gs2\Schedule\Request\GetCurrentEventMasterRequest;
use Gs2\Schedule\Result\GetCurrentEventMasterResult;
use Gs2\Schedule\Request\UpdateCurrentEventMasterRequest;
use Gs2\Schedule\Result\UpdateCurrentEventMasterResult;
use Gs2\Schedule\Request\UpdateCurrentEventMasterFromGitHubRequest;
use Gs2\Schedule\Result\UpdateCurrentEventMasterFromGitHubResult;

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

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
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

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
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

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

class DescribeEventMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEventMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEventMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEventMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEventMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEventMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/event";

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

class CreateEventMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateEventMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateEventMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateEventMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateEventMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateEventMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/event";

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
        if ($this->request->getScheduleType() !== null) {
            $json["scheduleType"] = $this->request->getScheduleType();
        }
        if ($this->request->getAbsoluteBegin() !== null) {
            $json["absoluteBegin"] = $this->request->getAbsoluteBegin();
        }
        if ($this->request->getAbsoluteEnd() !== null) {
            $json["absoluteEnd"] = $this->request->getAbsoluteEnd();
        }
        if ($this->request->getRepeatType() !== null) {
            $json["repeatType"] = $this->request->getRepeatType();
        }
        if ($this->request->getRepeatBeginDayOfMonth() !== null) {
            $json["repeatBeginDayOfMonth"] = $this->request->getRepeatBeginDayOfMonth();
        }
        if ($this->request->getRepeatEndDayOfMonth() !== null) {
            $json["repeatEndDayOfMonth"] = $this->request->getRepeatEndDayOfMonth();
        }
        if ($this->request->getRepeatBeginDayOfWeek() !== null) {
            $json["repeatBeginDayOfWeek"] = $this->request->getRepeatBeginDayOfWeek();
        }
        if ($this->request->getRepeatEndDayOfWeek() !== null) {
            $json["repeatEndDayOfWeek"] = $this->request->getRepeatEndDayOfWeek();
        }
        if ($this->request->getRepeatBeginHour() !== null) {
            $json["repeatBeginHour"] = $this->request->getRepeatBeginHour();
        }
        if ($this->request->getRepeatEndHour() !== null) {
            $json["repeatEndHour"] = $this->request->getRepeatEndHour();
        }
        if ($this->request->getRelativeTriggerName() !== null) {
            $json["relativeTriggerName"] = $this->request->getRelativeTriggerName();
        }
        if ($this->request->getRelativeDuration() !== null) {
            $json["relativeDuration"] = $this->request->getRelativeDuration();
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

class GetEventMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetEventMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEventMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetEventMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEventMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetEventMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/event/{eventName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{eventName}", $this->request->getEventName() === null|| strlen($this->request->getEventName()) == 0 ? "null" : $this->request->getEventName(), $url);

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

class UpdateEventMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateEventMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateEventMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateEventMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateEventMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateEventMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/event/{eventName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{eventName}", $this->request->getEventName() === null|| strlen($this->request->getEventName()) == 0 ? "null" : $this->request->getEventName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getScheduleType() !== null) {
            $json["scheduleType"] = $this->request->getScheduleType();
        }
        if ($this->request->getAbsoluteBegin() !== null) {
            $json["absoluteBegin"] = $this->request->getAbsoluteBegin();
        }
        if ($this->request->getAbsoluteEnd() !== null) {
            $json["absoluteEnd"] = $this->request->getAbsoluteEnd();
        }
        if ($this->request->getRepeatType() !== null) {
            $json["repeatType"] = $this->request->getRepeatType();
        }
        if ($this->request->getRepeatBeginDayOfMonth() !== null) {
            $json["repeatBeginDayOfMonth"] = $this->request->getRepeatBeginDayOfMonth();
        }
        if ($this->request->getRepeatEndDayOfMonth() !== null) {
            $json["repeatEndDayOfMonth"] = $this->request->getRepeatEndDayOfMonth();
        }
        if ($this->request->getRepeatBeginDayOfWeek() !== null) {
            $json["repeatBeginDayOfWeek"] = $this->request->getRepeatBeginDayOfWeek();
        }
        if ($this->request->getRepeatEndDayOfWeek() !== null) {
            $json["repeatEndDayOfWeek"] = $this->request->getRepeatEndDayOfWeek();
        }
        if ($this->request->getRepeatBeginHour() !== null) {
            $json["repeatBeginHour"] = $this->request->getRepeatBeginHour();
        }
        if ($this->request->getRepeatEndHour() !== null) {
            $json["repeatEndHour"] = $this->request->getRepeatEndHour();
        }
        if ($this->request->getRelativeTriggerName() !== null) {
            $json["relativeTriggerName"] = $this->request->getRelativeTriggerName();
        }
        if ($this->request->getRelativeDuration() !== null) {
            $json["relativeDuration"] = $this->request->getRelativeDuration();
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

class DeleteEventMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteEventMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteEventMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteEventMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteEventMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteEventMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/event/{eventName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{eventName}", $this->request->getEventName() === null|| strlen($this->request->getEventName()) == 0 ? "null" : $this->request->getEventName(), $url);

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

class DescribeTriggersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeTriggersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeTriggersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeTriggersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeTriggersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeTriggersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/trigger";

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

class DescribeTriggersByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeTriggersByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeTriggersByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeTriggersByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeTriggersByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeTriggersByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/trigger";

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

class GetTriggerTask extends Gs2RestSessionTask {

    /**
     * @var GetTriggerRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetTriggerTask constructor.
     * @param Gs2RestSession $session
     * @param GetTriggerRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetTriggerRequest $request
    ) {
        parent::__construct(
            $session,
            GetTriggerResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/trigger/{triggerName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{triggerName}", $this->request->getTriggerName() === null|| strlen($this->request->getTriggerName()) == 0 ? "null" : $this->request->getTriggerName(), $url);

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

class GetTriggerByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetTriggerByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetTriggerByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetTriggerByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetTriggerByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetTriggerByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/trigger/{triggerName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{triggerName}", $this->request->getTriggerName() === null|| strlen($this->request->getTriggerName()) == 0 ? "null" : $this->request->getTriggerName(), $url);

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

class TriggerByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var TriggerByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * TriggerByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param TriggerByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        TriggerByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            TriggerByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/trigger/{triggerName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{triggerName}", $this->request->getTriggerName() === null|| strlen($this->request->getTriggerName()) == 0 ? "null" : $this->request->getTriggerName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTriggerStrategy() !== null) {
            $json["triggerStrategy"] = $this->request->getTriggerStrategy();
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

class DeleteTriggerTask extends Gs2RestSessionTask {

    /**
     * @var DeleteTriggerRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteTriggerTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteTriggerRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteTriggerRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteTriggerResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/trigger/{triggerName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{triggerName}", $this->request->getTriggerName() === null|| strlen($this->request->getTriggerName()) == 0 ? "null" : $this->request->getTriggerName(), $url);

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

class DeleteTriggerByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteTriggerByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteTriggerByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteTriggerByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteTriggerByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteTriggerByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/trigger/{triggerName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{triggerName}", $this->request->getTriggerName() === null|| strlen($this->request->getTriggerName()) == 0 ? "null" : $this->request->getTriggerName(), $url);

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

class DescribeEventsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEventsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEventsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEventsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEventsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEventsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/event";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeEventsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEventsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEventsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEventsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEventsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEventsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/event";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class DescribeRawEventsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRawEventsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRawEventsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRawEventsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRawEventsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRawEventsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/event";

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

class GetEventTask extends Gs2RestSessionTask {

    /**
     * @var GetEventRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEventTask constructor.
     * @param Gs2RestSession $session
     * @param GetEventRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEventRequest $request
    ) {
        parent::__construct(
            $session,
            GetEventResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/event/{eventName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{eventName}", $this->request->getEventName() === null|| strlen($this->request->getEventName()) == 0 ? "null" : $this->request->getEventName(), $url);

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

class GetEventByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetEventByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEventByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetEventByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEventByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetEventByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/event/{eventName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{eventName}", $this->request->getEventName() === null|| strlen($this->request->getEventName()) == 0 ? "null" : $this->request->getEventName(), $url);
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

class GetRawEventTask extends Gs2RestSessionTask {

    /**
     * @var GetRawEventRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRawEventTask constructor.
     * @param Gs2RestSession $session
     * @param GetRawEventRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRawEventRequest $request
    ) {
        parent::__construct(
            $session,
            GetRawEventResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/event/{eventName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{eventName}", $this->request->getEventName() === null|| strlen($this->request->getEventName()) == 0 ? "null" : $this->request->getEventName(), $url);

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

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentEventMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentEventMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentEventMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentEventMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentEventMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentEventMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentEventMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentEventMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentEventMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentEventMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentEventMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentEventMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentEventMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentEventMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentEventMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentEventMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentEventMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentEventMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "schedule", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/from_git_hub";

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

/**
 * GS2 Schedule API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ScheduleRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
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
     * イベントマスターの一覧を取得<br>
     *
     * @param DescribeEventMastersRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeEventMastersAsync(
            DescribeEventMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEventMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * イベントマスターの一覧を取得<br>
     *
     * @param DescribeEventMastersRequest $request リクエストパラメータ
     * @return DescribeEventMastersResult
     */
    public function describeEventMasters (
            DescribeEventMastersRequest $request
    ): DescribeEventMastersResult {
        return $this->describeEventMastersAsync(
            $request
        )->wait();
    }

    /**
     * イベントマスターを新規作成<br>
     *
     * @param CreateEventMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createEventMasterAsync(
            CreateEventMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateEventMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * イベントマスターを新規作成<br>
     *
     * @param CreateEventMasterRequest $request リクエストパラメータ
     * @return CreateEventMasterResult
     */
    public function createEventMaster (
            CreateEventMasterRequest $request
    ): CreateEventMasterResult {
        return $this->createEventMasterAsync(
            $request
        )->wait();
    }

    /**
     * イベントマスターを取得<br>
     *
     * @param GetEventMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEventMasterAsync(
            GetEventMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEventMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * イベントマスターを取得<br>
     *
     * @param GetEventMasterRequest $request リクエストパラメータ
     * @return GetEventMasterResult
     */
    public function getEventMaster (
            GetEventMasterRequest $request
    ): GetEventMasterResult {
        return $this->getEventMasterAsync(
            $request
        )->wait();
    }

    /**
     * イベントマスターを更新<br>
     *
     * @param UpdateEventMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateEventMasterAsync(
            UpdateEventMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateEventMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * イベントマスターを更新<br>
     *
     * @param UpdateEventMasterRequest $request リクエストパラメータ
     * @return UpdateEventMasterResult
     */
    public function updateEventMaster (
            UpdateEventMasterRequest $request
    ): UpdateEventMasterResult {
        return $this->updateEventMasterAsync(
            $request
        )->wait();
    }

    /**
     * イベントマスターを削除<br>
     *
     * @param DeleteEventMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteEventMasterAsync(
            DeleteEventMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteEventMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * イベントマスターを削除<br>
     *
     * @param DeleteEventMasterRequest $request リクエストパラメータ
     * @return DeleteEventMasterResult
     */
    public function deleteEventMaster (
            DeleteEventMasterRequest $request
    ): DeleteEventMasterResult {
        return $this->deleteEventMasterAsync(
            $request
        )->wait();
    }

    /**
     * トリガーの一覧を取得<br>
     *
     * @param DescribeTriggersRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeTriggersAsync(
            DescribeTriggersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeTriggersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * トリガーの一覧を取得<br>
     *
     * @param DescribeTriggersRequest $request リクエストパラメータ
     * @return DescribeTriggersResult
     */
    public function describeTriggers (
            DescribeTriggersRequest $request
    ): DescribeTriggersResult {
        return $this->describeTriggersAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してトリガーの一覧を取得<br>
     *
     * @param DescribeTriggersByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeTriggersByUserIdAsync(
            DescribeTriggersByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeTriggersByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してトリガーの一覧を取得<br>
     *
     * @param DescribeTriggersByUserIdRequest $request リクエストパラメータ
     * @return DescribeTriggersByUserIdResult
     */
    public function describeTriggersByUserId (
            DescribeTriggersByUserIdRequest $request
    ): DescribeTriggersByUserIdResult {
        return $this->describeTriggersByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * トリガーを取得<br>
     *
     * @param GetTriggerRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getTriggerAsync(
            GetTriggerRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetTriggerTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * トリガーを取得<br>
     *
     * @param GetTriggerRequest $request リクエストパラメータ
     * @return GetTriggerResult
     */
    public function getTrigger (
            GetTriggerRequest $request
    ): GetTriggerResult {
        return $this->getTriggerAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してトリガーを取得<br>
     *
     * @param GetTriggerByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getTriggerByUserIdAsync(
            GetTriggerByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetTriggerByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してトリガーを取得<br>
     *
     * @param GetTriggerByUserIdRequest $request リクエストパラメータ
     * @return GetTriggerByUserIdResult
     */
    public function getTriggerByUserId (
            GetTriggerByUserIdRequest $request
    ): GetTriggerByUserIdResult {
        return $this->getTriggerByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してトリガーを登録<br>
     *
     * @param TriggerByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function triggerByUserIdAsync(
            TriggerByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new TriggerByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してトリガーを登録<br>
     *
     * @param TriggerByUserIdRequest $request リクエストパラメータ
     * @return TriggerByUserIdResult
     */
    public function triggerByUserId (
            TriggerByUserIdRequest $request
    ): TriggerByUserIdResult {
        return $this->triggerByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * トリガーを削除<br>
     *
     * @param DeleteTriggerRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteTriggerAsync(
            DeleteTriggerRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteTriggerTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * トリガーを削除<br>
     *
     * @param DeleteTriggerRequest $request リクエストパラメータ
     * @return DeleteTriggerResult
     */
    public function deleteTrigger (
            DeleteTriggerRequest $request
    ): DeleteTriggerResult {
        return $this->deleteTriggerAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してトリガーを削除<br>
     *
     * @param DeleteTriggerByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteTriggerByUserIdAsync(
            DeleteTriggerByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteTriggerByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してトリガーを削除<br>
     *
     * @param DeleteTriggerByUserIdRequest $request リクエストパラメータ
     * @return DeleteTriggerByUserIdResult
     */
    public function deleteTriggerByUserId (
            DeleteTriggerByUserIdRequest $request
    ): DeleteTriggerByUserIdResult {
        return $this->deleteTriggerByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * イベントの一覧を取得<br>
     *
     * @param DescribeEventsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeEventsAsync(
            DescribeEventsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEventsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * イベントの一覧を取得<br>
     *
     * @param DescribeEventsRequest $request リクエストパラメータ
     * @return DescribeEventsResult
     */
    public function describeEvents (
            DescribeEventsRequest $request
    ): DescribeEventsResult {
        return $this->describeEventsAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してイベントの一覧を取得<br>
     *
     * @param DescribeEventsByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeEventsByUserIdAsync(
            DescribeEventsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEventsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してイベントの一覧を取得<br>
     *
     * @param DescribeEventsByUserIdRequest $request リクエストパラメータ
     * @return DescribeEventsByUserIdResult
     */
    public function describeEventsByUserId (
            DescribeEventsByUserIdRequest $request
    ): DescribeEventsByUserIdResult {
        return $this->describeEventsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * イベントの一覧を取得<br>
     *
     * @param DescribeRawEventsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeRawEventsAsync(
            DescribeRawEventsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRawEventsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * イベントの一覧を取得<br>
     *
     * @param DescribeRawEventsRequest $request リクエストパラメータ
     * @return DescribeRawEventsResult
     */
    public function describeRawEvents (
            DescribeRawEventsRequest $request
    ): DescribeRawEventsResult {
        return $this->describeRawEventsAsync(
            $request
        )->wait();
    }

    /**
     * イベントを取得<br>
     *
     * @param GetEventRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEventAsync(
            GetEventRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEventTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * イベントを取得<br>
     *
     * @param GetEventRequest $request リクエストパラメータ
     * @return GetEventResult
     */
    public function getEvent (
            GetEventRequest $request
    ): GetEventResult {
        return $this->getEventAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してイベントを取得<br>
     *
     * @param GetEventByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEventByUserIdAsync(
            GetEventByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEventByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してイベントを取得<br>
     *
     * @param GetEventByUserIdRequest $request リクエストパラメータ
     * @return GetEventByUserIdResult
     */
    public function getEventByUserId (
            GetEventByUserIdRequest $request
    ): GetEventByUserIdResult {
        return $this->getEventByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * イベントを取得<br>
     *
     * @param GetRawEventRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getRawEventAsync(
            GetRawEventRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRawEventTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * イベントを取得<br>
     *
     * @param GetRawEventRequest $request リクエストパラメータ
     * @return GetRawEventResult
     */
    public function getRawEvent (
            GetRawEventRequest $request
    ): GetRawEventResult {
        return $this->getRawEventAsync(
            $request
        )->wait();
    }

    /**
     * 現在有効なイベントスケジュールマスターのマスターデータをエクスポートします<br>
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
     * 現在有効なイベントスケジュールマスターのマスターデータをエクスポートします<br>
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
     * 現在有効なイベントスケジュールマスターを取得します<br>
     *
     * @param GetCurrentEventMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getCurrentEventMasterAsync(
            GetCurrentEventMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentEventMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効なイベントスケジュールマスターを取得します<br>
     *
     * @param GetCurrentEventMasterRequest $request リクエストパラメータ
     * @return GetCurrentEventMasterResult
     */
    public function getCurrentEventMaster (
            GetCurrentEventMasterRequest $request
    ): GetCurrentEventMasterResult {
        return $this->getCurrentEventMasterAsync(
            $request
        )->wait();
    }

    /**
     * 現在有効なイベントスケジュールマスターを更新します<br>
     *
     * @param UpdateCurrentEventMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateCurrentEventMasterAsync(
            UpdateCurrentEventMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentEventMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効なイベントスケジュールマスターを更新します<br>
     *
     * @param UpdateCurrentEventMasterRequest $request リクエストパラメータ
     * @return UpdateCurrentEventMasterResult
     */
    public function updateCurrentEventMaster (
            UpdateCurrentEventMasterRequest $request
    ): UpdateCurrentEventMasterResult {
        return $this->updateCurrentEventMasterAsync(
            $request
        )->wait();
    }

    /**
     * 現在有効なイベントスケジュールマスターを更新します<br>
     *
     * @param UpdateCurrentEventMasterFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateCurrentEventMasterFromGitHubAsync(
            UpdateCurrentEventMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentEventMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効なイベントスケジュールマスターを更新します<br>
     *
     * @param UpdateCurrentEventMasterFromGitHubRequest $request リクエストパラメータ
     * @return UpdateCurrentEventMasterFromGitHubResult
     */
    public function updateCurrentEventMasterFromGitHub (
            UpdateCurrentEventMasterFromGitHubRequest $request
    ): UpdateCurrentEventMasterFromGitHubResult {
        return $this->updateCurrentEventMasterFromGitHubAsync(
            $request
        )->wait();
    }
}