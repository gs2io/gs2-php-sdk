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
use Gs2\Matchmaking\Request\GetGatheringRequest;
use Gs2\Matchmaking\Result\GetGatheringResult;
use Gs2\Matchmaking\Request\CancelMatchmakingRequest;
use Gs2\Matchmaking\Result\CancelMatchmakingResult;
use Gs2\Matchmaking\Request\CancelMatchmakingByUserIdRequest;
use Gs2\Matchmaking\Result\CancelMatchmakingByUserIdResult;
use Gs2\Matchmaking\Request\DeleteGatheringRequest;
use Gs2\Matchmaking\Result\DeleteGatheringResult;

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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getCreateGatheringTriggerType() != null) {
            $json["createGatheringTriggerType"] = $this->request->getCreateGatheringTriggerType();
        }
        if ($this->request->getCreateGatheringTriggerRealtimeNamespaceId() != null) {
            $json["createGatheringTriggerRealtimeNamespaceId"] = $this->request->getCreateGatheringTriggerRealtimeNamespaceId();
        }
        if ($this->request->getCreateGatheringTriggerScriptId() != null) {
            $json["createGatheringTriggerScriptId"] = $this->request->getCreateGatheringTriggerScriptId();
        }
        if ($this->request->getCompleteMatchmakingTriggerType() != null) {
            $json["completeMatchmakingTriggerType"] = $this->request->getCompleteMatchmakingTriggerType();
        }
        if ($this->request->getCompleteMatchmakingTriggerRealtimeNamespaceId() != null) {
            $json["completeMatchmakingTriggerRealtimeNamespaceId"] = $this->request->getCompleteMatchmakingTriggerRealtimeNamespaceId();
        }
        if ($this->request->getCompleteMatchmakingTriggerScriptId() != null) {
            $json["completeMatchmakingTriggerScriptId"] = $this->request->getCompleteMatchmakingTriggerScriptId();
        }
        if ($this->request->getJoinNotification() != null) {
            $json["joinNotification"] = $this->request->getJoinNotification()->toJson();
        }
        if ($this->request->getLeaveNotification() != null) {
            $json["leaveNotification"] = $this->request->getLeaveNotification()->toJson();
        }
        if ($this->request->getCompleteNotification() != null) {
            $json["completeNotification"] = $this->request->getCompleteNotification()->toJson();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getCreateGatheringTriggerType() != null) {
            $json["createGatheringTriggerType"] = $this->request->getCreateGatheringTriggerType();
        }
        if ($this->request->getCreateGatheringTriggerRealtimeNamespaceId() != null) {
            $json["createGatheringTriggerRealtimeNamespaceId"] = $this->request->getCreateGatheringTriggerRealtimeNamespaceId();
        }
        if ($this->request->getCreateGatheringTriggerScriptId() != null) {
            $json["createGatheringTriggerScriptId"] = $this->request->getCreateGatheringTriggerScriptId();
        }
        if ($this->request->getCompleteMatchmakingTriggerType() != null) {
            $json["completeMatchmakingTriggerType"] = $this->request->getCompleteMatchmakingTriggerType();
        }
        if ($this->request->getCompleteMatchmakingTriggerRealtimeNamespaceId() != null) {
            $json["completeMatchmakingTriggerRealtimeNamespaceId"] = $this->request->getCompleteMatchmakingTriggerRealtimeNamespaceId();
        }
        if ($this->request->getCompleteMatchmakingTriggerScriptId() != null) {
            $json["completeMatchmakingTriggerScriptId"] = $this->request->getCompleteMatchmakingTriggerScriptId();
        }
        if ($this->request->getJoinNotification() != null) {
            $json["joinNotification"] = $this->request->getJoinNotification()->toJson();
        }
        if ($this->request->getLeaveNotification() != null) {
            $json["leaveNotification"] = $this->request->getLeaveNotification()->toJson();
        }
        if ($this->request->getCompleteNotification() != null) {
            $json["completeNotification"] = $this->request->getCompleteNotification()->toJson();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getPlayer() != null) {
            $json["player"] = $this->request->getPlayer()->toJson();
        }
        if ($this->request->getAttributeRanges() != null) {
            $array = [];
            foreach ($this->request->getAttributeRanges() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["attributeRanges"] = $array;
        }
        if ($this->request->getCapacityOfRoles() != null) {
            $array = [];
            foreach ($this->request->getCapacityOfRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["capacityOfRoles"] = $array;
        }
        if ($this->request->getAllowUserIds() != null) {
            $array = [];
            foreach ($this->request->getAllowUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["allowUserIds"] = $array;
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getPlayer() != null) {
            $json["player"] = $this->request->getPlayer()->toJson();
        }
        if ($this->request->getAttributeRanges() != null) {
            $array = [];
            foreach ($this->request->getAttributeRanges() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["attributeRanges"] = $array;
        }
        if ($this->request->getCapacityOfRoles() != null) {
            $array = [];
            foreach ($this->request->getCapacityOfRoles() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["capacityOfRoles"] = $array;
        }
        if ($this->request->getAllowUserIds() != null) {
            $array = [];
            foreach ($this->request->getAllowUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["allowUserIds"] = $array;
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering/{gatheringName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() == null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $json = [];
        if ($this->request->getAttributeRanges() != null) {
            $array = [];
            foreach ($this->request->getAttributeRanges() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["attributeRanges"] = $array;
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering/{gatheringName}/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() == null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getAttributeRanges() != null) {
            $array = [];
            foreach ($this->request->getAttributeRanges() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["attributeRanges"] = $array;
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering/player/do";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getPlayer() != null) {
            $json["player"] = $this->request->getPlayer()->toJson();
        }
        if ($this->request->getMatchmakingContextToken() != null) {
            $json["matchmakingContextToken"] = $this->request->getMatchmakingContextToken();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering/do";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getPlayer() != null) {
            $json["player"] = $this->request->getPlayer()->toJson();
        }
        if ($this->request->getMatchmakingContextToken() != null) {
            $json["matchmakingContextToken"] = $this->request->getMatchmakingContextToken();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering/{gatheringName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() == null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering/{gatheringName}/user/me";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() == null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering/{gatheringName}/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() == null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "matchmaking", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/gathering/{gatheringName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{gatheringName}", $this->request->getGatheringName() == null|| strlen($this->request->getGatheringName()) == 0 ? "null" : $this->request->getGatheringName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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
     * ギャザリングの一覧を取得<br>
     *
     * @param DescribeGatheringsRequest $request リクエストパラメータ
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
     * ギャザリングの一覧を取得<br>
     *
     * @param DescribeGatheringsRequest $request リクエストパラメータ
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
     * ギャザリングを作成して募集を開始<br>
     *   <br>
     *   `募集条件` には、作成したギャザリングに参加を許可する各属性値の範囲を指定します。<br>
     *   <br>
     *   たとえば、同一ゲームモードを希望するプレイヤーを募集したい場合は、ゲームモードに対応した属性値が完全一致する参加条件プレイヤーとマッチメイキングするように<br>
     *   `属性名：ゲームモード` `属性最小値: ゲームモードを表す数値` `属性最大値: ゲームモードを表す数値`<br>
     *   とすることで、同一ゲームモードを希望するプレイヤー同士をマッチメイキングできます。<br>
     *   <br>
     *   他にレーティングをベースにしたマッチメイキングを実施したい場合は、<br>
     *   ルーム作成者のレーティング値を中心とした属性値の範囲を指定することで、レーティング値の近いプレイヤー同士をマッチメイキングできます。<br>
     *   この `募集条件` はあとで更新することができますので、徐々に条件を緩和していくことができます。<br>
     *   <br>
     *   ロール とは 盾役1人・回復役1人・攻撃役2人 などの役割ごとに募集人数を設定したい場合に使用します。<br>
     *   ロールにはエイリアスを指定できます。<br>
     *   たとえば、盾役は パラディン と ナイト の2種類の `ジョブ` に更に分類できるとします。<br>
     *   この場合、ロール名 に `盾役` エイリアス に `パラディン` `ナイト` として募集を出すようにゲームを実装します。<br>
     *   そして、プレイヤーは自分自身の `ジョブ` を自身のプレイヤー情報のロールに指定します。<br>
     *   <br>
     *   こうすることで、募集条件が `盾役` になっているギャザリングには `パラディン` も `ナイト` も参加できます。<br>
     *   一方で、ギャザリングを作成するときに、 `パラディン` だけ募集したくて、 `ナイト` を募集したくない場合は、<br>
     *   募集するロール名に `パラディン` を直接指定したり、エイリアスに `ナイト` を含めないようにすることで実現できます。<br>
     *   <br>
     *   `参加者` の `募集人数` はプレイヤーの募集人数を指定します。ロール名を指定することで、ロール名ごとの募集人数を設定できます。<br>
     *   <br>
     *   `参加者` の `参加者のプレイヤー情報リスト` には事前にプレイヤー間でパーティを構築している場合や、参加者が離脱したあとの追加募集で使用します。<br>
     *
     * @param CreateGatheringRequest $request リクエストパラメータ
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
     * ギャザリングを作成して募集を開始<br>
     *   <br>
     *   `募集条件` には、作成したギャザリングに参加を許可する各属性値の範囲を指定します。<br>
     *   <br>
     *   たとえば、同一ゲームモードを希望するプレイヤーを募集したい場合は、ゲームモードに対応した属性値が完全一致する参加条件プレイヤーとマッチメイキングするように<br>
     *   `属性名：ゲームモード` `属性最小値: ゲームモードを表す数値` `属性最大値: ゲームモードを表す数値`<br>
     *   とすることで、同一ゲームモードを希望するプレイヤー同士をマッチメイキングできます。<br>
     *   <br>
     *   他にレーティングをベースにしたマッチメイキングを実施したい場合は、<br>
     *   ルーム作成者のレーティング値を中心とした属性値の範囲を指定することで、レーティング値の近いプレイヤー同士をマッチメイキングできます。<br>
     *   この `募集条件` はあとで更新することができますので、徐々に条件を緩和していくことができます。<br>
     *   <br>
     *   ロール とは 盾役1人・回復役1人・攻撃役2人 などの役割ごとに募集人数を設定したい場合に使用します。<br>
     *   ロールにはエイリアスを指定できます。<br>
     *   たとえば、盾役は パラディン と ナイト の2種類の `ジョブ` に更に分類できるとします。<br>
     *   この場合、ロール名 に `盾役` エイリアス に `パラディン` `ナイト` として募集を出すようにゲームを実装します。<br>
     *   そして、プレイヤーは自分自身の `ジョブ` を自身のプレイヤー情報のロールに指定します。<br>
     *   <br>
     *   こうすることで、募集条件が `盾役` になっているギャザリングには `パラディン` も `ナイト` も参加できます。<br>
     *   一方で、ギャザリングを作成するときに、 `パラディン` だけ募集したくて、 `ナイト` を募集したくない場合は、<br>
     *   募集するロール名に `パラディン` を直接指定したり、エイリアスに `ナイト` を含めないようにすることで実現できます。<br>
     *   <br>
     *   `参加者` の `募集人数` はプレイヤーの募集人数を指定します。ロール名を指定することで、ロール名ごとの募集人数を設定できます。<br>
     *   <br>
     *   `参加者` の `参加者のプレイヤー情報リスト` には事前にプレイヤー間でパーティを構築している場合や、参加者が離脱したあとの追加募集で使用します。<br>
     *
     * @param CreateGatheringRequest $request リクエストパラメータ
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
     * ギャザリングを作成して募集を開始<br>
     *   <br>
     *   `募集条件` には、作成したギャザリングに参加を許可する各属性値の範囲を指定します。<br>
     *   <br>
     *   たとえば、同一ゲームモードを希望するプレイヤーを募集したい場合は、ゲームモードに対応した属性値が完全一致する参加条件プレイヤーとマッチメイキングするように<br>
     *   `属性名：ゲームモード` `属性最小値: ゲームモードを表す数値` `属性最大値: ゲームモードを表す数値`<br>
     *   とすることで、同一ゲームモードを希望するプレイヤー同士をマッチメイキングできます。<br>
     *   <br>
     *   他にレーティングをベースにしたマッチメイキングを実施したい場合は、<br>
     *   ルーム作成者のレーティング値を中心とした属性値の範囲を指定することで、レーティング値の近いプレイヤー同士をマッチメイキングできます。<br>
     *   この `募集条件` はあとで更新することができますので、徐々に条件を緩和していくことができます。<br>
     *   <br>
     *   ロール とは 盾役1人・回復役1人・攻撃役2人 などの役割ごとに募集人数を設定したい場合に使用します。<br>
     *   ロールにはエイリアスを指定できます。<br>
     *   たとえば、盾役は パラディン と ナイト の2種類の `ジョブ` に更に分類できるとします。<br>
     *   この場合、ロール名 に `盾役` エイリアス に `パラディン` `ナイト` として募集を出すようにゲームを実装します。<br>
     *   そして、プレイヤーは自分自身の `ジョブ` を自身のプレイヤー情報のロールに指定します。<br>
     *   <br>
     *   こうすることで、募集条件が `盾役` になっているギャザリングには `パラディン` も `ナイト` も参加できます。<br>
     *   一方で、ギャザリングを作成するときに、 `パラディン` だけ募集したくて、 `ナイト` を募集したくない場合は、<br>
     *   募集するロール名に `パラディン` を直接指定したり、エイリアスに `ナイト` を含めないようにすることで実現できます。<br>
     *   <br>
     *   `参加者` の `募集人数` はプレイヤーの募集人数を指定します。ロール名を指定することで、ロール名ごとの募集人数を設定できます。<br>
     *   <br>
     *   `参加者` の `参加者のプレイヤー情報リスト` には事前にプレイヤー間でパーティを構築している場合や、参加者が離脱したあとの追加募集で使用します。<br>
     *
     * @param CreateGatheringByUserIdRequest $request リクエストパラメータ
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
     * ギャザリングを作成して募集を開始<br>
     *   <br>
     *   `募集条件` には、作成したギャザリングに参加を許可する各属性値の範囲を指定します。<br>
     *   <br>
     *   たとえば、同一ゲームモードを希望するプレイヤーを募集したい場合は、ゲームモードに対応した属性値が完全一致する参加条件プレイヤーとマッチメイキングするように<br>
     *   `属性名：ゲームモード` `属性最小値: ゲームモードを表す数値` `属性最大値: ゲームモードを表す数値`<br>
     *   とすることで、同一ゲームモードを希望するプレイヤー同士をマッチメイキングできます。<br>
     *   <br>
     *   他にレーティングをベースにしたマッチメイキングを実施したい場合は、<br>
     *   ルーム作成者のレーティング値を中心とした属性値の範囲を指定することで、レーティング値の近いプレイヤー同士をマッチメイキングできます。<br>
     *   この `募集条件` はあとで更新することができますので、徐々に条件を緩和していくことができます。<br>
     *   <br>
     *   ロール とは 盾役1人・回復役1人・攻撃役2人 などの役割ごとに募集人数を設定したい場合に使用します。<br>
     *   ロールにはエイリアスを指定できます。<br>
     *   たとえば、盾役は パラディン と ナイト の2種類の `ジョブ` に更に分類できるとします。<br>
     *   この場合、ロール名 に `盾役` エイリアス に `パラディン` `ナイト` として募集を出すようにゲームを実装します。<br>
     *   そして、プレイヤーは自分自身の `ジョブ` を自身のプレイヤー情報のロールに指定します。<br>
     *   <br>
     *   こうすることで、募集条件が `盾役` になっているギャザリングには `パラディン` も `ナイト` も参加できます。<br>
     *   一方で、ギャザリングを作成するときに、 `パラディン` だけ募集したくて、 `ナイト` を募集したくない場合は、<br>
     *   募集するロール名に `パラディン` を直接指定したり、エイリアスに `ナイト` を含めないようにすることで実現できます。<br>
     *   <br>
     *   `参加者` の `募集人数` はプレイヤーの募集人数を指定します。ロール名を指定することで、ロール名ごとの募集人数を設定できます。<br>
     *   <br>
     *   `参加者` の `参加者のプレイヤー情報リスト` には事前にプレイヤー間でパーティを構築している場合や、参加者が離脱したあとの追加募集で使用します。<br>
     *
     * @param CreateGatheringByUserIdRequest $request リクエストパラメータ
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
     * ギャザリングを更新する<br>
     *
     * @param UpdateGatheringRequest $request リクエストパラメータ
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
     * ギャザリングを更新する<br>
     *
     * @param UpdateGatheringRequest $request リクエストパラメータ
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
     * ギャザリングを更新する<br>
     *
     * @param UpdateGatheringByUserIdRequest $request リクエストパラメータ
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
     * ギャザリングを更新する<br>
     *
     * @param UpdateGatheringByUserIdRequest $request リクエストパラメータ
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
     * Player が参加できるギャザリングを探して参加する<br>
     *   <br>
     *   一定時間 検索を行い、対象が見つからなかったときには `マッチメイキングの状態を保持するトークン` を返す。<br>
     *   次回 `マッチメイキングの状態を保持するトークン` をつけて再度リクエストを出すことで、前回の続きから検索処理を再開できる。<br>
     *   すべてのギャザリングを検索したが、参加できるギャザリングが存在しなかった場合はギャザリングもトークンもどちらも null が応答される。<br>
     *
     * @param DoMatchmakingByPlayerRequest $request リクエストパラメータ
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
     * Player が参加できるギャザリングを探して参加する<br>
     *   <br>
     *   一定時間 検索を行い、対象が見つからなかったときには `マッチメイキングの状態を保持するトークン` を返す。<br>
     *   次回 `マッチメイキングの状態を保持するトークン` をつけて再度リクエストを出すことで、前回の続きから検索処理を再開できる。<br>
     *   すべてのギャザリングを検索したが、参加できるギャザリングが存在しなかった場合はギャザリングもトークンもどちらも null が応答される。<br>
     *
     * @param DoMatchmakingByPlayerRequest $request リクエストパラメータ
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
     * 自分が参加できるギャザリングを探して参加する<br>
     *   <br>
     *   一定時間 検索を行い、対象が見つからなかったときには `マッチメイキングの状態を保持するトークン` を返す。<br>
     *   次回 `マッチメイキングの状態を保持するトークン` をつけて再度リクエストを出すことで、前回の続きから検索処理を再開できる。<br>
     *   すべてのギャザリングを検索したが、参加できるギャザリングが存在しなかった場合はギャザリングもトークンもどちらも null が応答される。<br>
     *
     * @param DoMatchmakingRequest $request リクエストパラメータ
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
     * 自分が参加できるギャザリングを探して参加する<br>
     *   <br>
     *   一定時間 検索を行い、対象が見つからなかったときには `マッチメイキングの状態を保持するトークン` を返す。<br>
     *   次回 `マッチメイキングの状態を保持するトークン` をつけて再度リクエストを出すことで、前回の続きから検索処理を再開できる。<br>
     *   すべてのギャザリングを検索したが、参加できるギャザリングが存在しなかった場合はギャザリングもトークンもどちらも null が応答される。<br>
     *
     * @param DoMatchmakingRequest $request リクエストパラメータ
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
     * ギャザリングを取得<br>
     *
     * @param GetGatheringRequest $request リクエストパラメータ
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
     * ギャザリングを取得<br>
     *
     * @param GetGatheringRequest $request リクエストパラメータ
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
     * マッチメイキングをキャンセルする<br>
     *   <br>
     *   ギャザリングから離脱する前にマッチメイキングが完了した場合は、NotFoundException(404エラー) が発生し失敗します<br>
     *
     * @param CancelMatchmakingRequest $request リクエストパラメータ
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
     * マッチメイキングをキャンセルする<br>
     *   <br>
     *   ギャザリングから離脱する前にマッチメイキングが完了した場合は、NotFoundException(404エラー) が発生し失敗します<br>
     *
     * @param CancelMatchmakingRequest $request リクエストパラメータ
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
     * ユーザIDを指定してマッチメイキングをキャンセルする<br>
     *   <br>
     *   ギャザリングから離脱する前にマッチメイキングが完了した場合は、NotFoundException(404エラー) が発生し失敗します<br>
     *
     * @param CancelMatchmakingByUserIdRequest $request リクエストパラメータ
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
     * ユーザIDを指定してマッチメイキングをキャンセルする<br>
     *   <br>
     *   ギャザリングから離脱する前にマッチメイキングが完了した場合は、NotFoundException(404エラー) が発生し失敗します<br>
     *
     * @param CancelMatchmakingByUserIdRequest $request リクエストパラメータ
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
     * ギャザリングを削除<br>
     *
     * @param DeleteGatheringRequest $request リクエストパラメータ
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
     * ギャザリングを削除<br>
     *
     * @param DeleteGatheringRequest $request リクエストパラメータ
     * @return DeleteGatheringResult
     */
    public function deleteGathering (
            DeleteGatheringRequest $request
    ): DeleteGatheringResult {
        return $this->deleteGatheringAsync(
            $request
        )->wait();
    }
}