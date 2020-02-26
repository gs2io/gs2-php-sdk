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

namespace Gs2\Chat;

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
use Gs2\Chat\Request\DescribeNamespacesRequest;
use Gs2\Chat\Result\DescribeNamespacesResult;
use Gs2\Chat\Request\CreateNamespaceRequest;
use Gs2\Chat\Result\CreateNamespaceResult;
use Gs2\Chat\Request\GetNamespaceStatusRequest;
use Gs2\Chat\Result\GetNamespaceStatusResult;
use Gs2\Chat\Request\GetNamespaceRequest;
use Gs2\Chat\Result\GetNamespaceResult;
use Gs2\Chat\Request\UpdateNamespaceRequest;
use Gs2\Chat\Result\UpdateNamespaceResult;
use Gs2\Chat\Request\DeleteNamespaceRequest;
use Gs2\Chat\Result\DeleteNamespaceResult;
use Gs2\Chat\Request\DescribeRoomsRequest;
use Gs2\Chat\Result\DescribeRoomsResult;
use Gs2\Chat\Request\CreateRoomRequest;
use Gs2\Chat\Result\CreateRoomResult;
use Gs2\Chat\Request\CreateRoomFromBackendRequest;
use Gs2\Chat\Result\CreateRoomFromBackendResult;
use Gs2\Chat\Request\GetRoomRequest;
use Gs2\Chat\Result\GetRoomResult;
use Gs2\Chat\Request\UpdateRoomRequest;
use Gs2\Chat\Result\UpdateRoomResult;
use Gs2\Chat\Request\DeleteRoomRequest;
use Gs2\Chat\Result\DeleteRoomResult;
use Gs2\Chat\Request\DeleteRoomFromBackendRequest;
use Gs2\Chat\Result\DeleteRoomFromBackendResult;
use Gs2\Chat\Request\DescribeMessagesRequest;
use Gs2\Chat\Result\DescribeMessagesResult;
use Gs2\Chat\Request\PostRequest;
use Gs2\Chat\Result\PostResult;
use Gs2\Chat\Request\PostByUserIdRequest;
use Gs2\Chat\Result\PostByUserIdResult;
use Gs2\Chat\Request\GetMessageRequest;
use Gs2\Chat\Result\GetMessageResult;
use Gs2\Chat\Request\DeleteMessageRequest;
use Gs2\Chat\Result\DeleteMessageResult;
use Gs2\Chat\Request\DescribeSubscribesRequest;
use Gs2\Chat\Result\DescribeSubscribesResult;
use Gs2\Chat\Request\DescribeSubscribesByUserIdRequest;
use Gs2\Chat\Result\DescribeSubscribesByUserIdResult;
use Gs2\Chat\Request\DescribeSubscribesByRoomNameRequest;
use Gs2\Chat\Result\DescribeSubscribesByRoomNameResult;
use Gs2\Chat\Request\SubscribeRequest;
use Gs2\Chat\Result\SubscribeResult;
use Gs2\Chat\Request\SubscribeByUserIdRequest;
use Gs2\Chat\Result\SubscribeByUserIdResult;
use Gs2\Chat\Request\GetSubscribeRequest;
use Gs2\Chat\Result\GetSubscribeResult;
use Gs2\Chat\Request\GetSubscribeByUserIdRequest;
use Gs2\Chat\Result\GetSubscribeByUserIdResult;
use Gs2\Chat\Request\UpdateNotificationTypeRequest;
use Gs2\Chat\Result\UpdateNotificationTypeResult;
use Gs2\Chat\Request\UpdateNotificationTypeByUserIdRequest;
use Gs2\Chat\Result\UpdateNotificationTypeByUserIdResult;
use Gs2\Chat\Request\UnsubscribeRequest;
use Gs2\Chat\Result\UnsubscribeResult;
use Gs2\Chat\Request\UnsubscribeByUserIdRequest;
use Gs2\Chat\Result\UnsubscribeByUserIdResult;

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getAllowCreateRoom() != null) {
            $json["allowCreateRoom"] = $this->request->getAllowCreateRoom();
        }
        if ($this->request->getPostMessageScript() != null) {
            $json["postMessageScript"] = $this->request->getPostMessageScript()->toJson();
        }
        if ($this->request->getCreateRoomScript() != null) {
            $json["createRoomScript"] = $this->request->getCreateRoomScript()->toJson();
        }
        if ($this->request->getDeleteRoomScript() != null) {
            $json["deleteRoomScript"] = $this->request->getDeleteRoomScript()->toJson();
        }
        if ($this->request->getSubscribeRoomScript() != null) {
            $json["subscribeRoomScript"] = $this->request->getSubscribeRoomScript()->toJson();
        }
        if ($this->request->getUnsubscribeRoomScript() != null) {
            $json["unsubscribeRoomScript"] = $this->request->getUnsubscribeRoomScript()->toJson();
        }
        if ($this->request->getPostNotification() != null) {
            $json["postNotification"] = $this->request->getPostNotification()->toJson();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getAllowCreateRoom() != null) {
            $json["allowCreateRoom"] = $this->request->getAllowCreateRoom();
        }
        if ($this->request->getPostMessageScript() != null) {
            $json["postMessageScript"] = $this->request->getPostMessageScript()->toJson();
        }
        if ($this->request->getCreateRoomScript() != null) {
            $json["createRoomScript"] = $this->request->getCreateRoomScript()->toJson();
        }
        if ($this->request->getDeleteRoomScript() != null) {
            $json["deleteRoomScript"] = $this->request->getDeleteRoomScript()->toJson();
        }
        if ($this->request->getSubscribeRoomScript() != null) {
            $json["subscribeRoomScript"] = $this->request->getSubscribeRoomScript()->toJson();
        }
        if ($this->request->getUnsubscribeRoomScript() != null) {
            $json["unsubscribeRoomScript"] = $this->request->getUnsubscribeRoomScript()->toJson();
        }
        if ($this->request->getPostNotification() != null) {
            $json["postNotification"] = $this->request->getPostNotification()->toJson();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

class DescribeRoomsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRoomsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRoomsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRoomsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRoomsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRoomsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room";

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

class CreateRoomTask extends Gs2RestSessionTask {

    /**
     * @var CreateRoomRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateRoomTask constructor.
     * @param Gs2RestSession $session
     * @param CreateRoomRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateRoomRequest $request
    ) {
        parent::__construct(
            $session,
            CreateRoomResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/user";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
        }
        if ($this->request->getWhiteListUserIds() != null) {
            $array = [];
            foreach ($this->request->getWhiteListUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListUserIds"] = $array;
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

class CreateRoomFromBackendTask extends Gs2RestSessionTask {

    /**
     * @var CreateRoomFromBackendRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateRoomFromBackendTask constructor.
     * @param Gs2RestSession $session
     * @param CreateRoomFromBackendRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateRoomFromBackendRequest $request
    ) {
        parent::__construct(
            $session,
            CreateRoomFromBackendResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getUserId() != null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
        }
        if ($this->request->getWhiteListUserIds() != null) {
            $array = [];
            foreach ($this->request->getWhiteListUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListUserIds"] = $array;
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

class GetRoomTask extends Gs2RestSessionTask {

    /**
     * @var GetRoomRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRoomTask constructor.
     * @param Gs2RestSession $session
     * @param GetRoomRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRoomRequest $request
    ) {
        parent::__construct(
            $session,
            GetRoomResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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

class UpdateRoomTask extends Gs2RestSessionTask {

    /**
     * @var UpdateRoomRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateRoomTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateRoomRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateRoomRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateRoomResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $json = [];
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
        }
        if ($this->request->getWhiteListUserIds() != null) {
            $array = [];
            foreach ($this->request->getWhiteListUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListUserIds"] = $array;
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

class DeleteRoomTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRoomRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRoomTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRoomRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRoomRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRoomResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}/user";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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

class DeleteRoomFromBackendTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRoomFromBackendRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRoomFromBackendTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRoomFromBackendRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRoomFromBackendRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRoomFromBackendResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
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

class DescribeMessagesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMessagesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMessagesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMessagesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMessagesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMessagesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}/message";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPassword() != null) {
            $queryStrings["password"] = $this->request->getPassword();
        }
        if ($this->request->getStartAt() != null) {
            $queryStrings["startAt"] = $this->request->getStartAt();
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

class PostTask extends Gs2RestSessionTask {

    /**
     * @var PostRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PostTask constructor.
     * @param Gs2RestSession $session
     * @param PostRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PostRequest $request
    ) {
        parent::__construct(
            $session,
            PostResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}/message";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $json = [];
        if ($this->request->getCategory() != null) {
            $json["category"] = $this->request->getCategory();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
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

class PostByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PostByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PostByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PostByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PostByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PostByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}/message/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCategory() != null) {
            $json["category"] = $this->request->getCategory();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() != null) {
            $json["password"] = $this->request->getPassword();
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

class GetMessageTask extends Gs2RestSessionTask {

    /**
     * @var GetMessageRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMessageTask constructor.
     * @param Gs2RestSession $session
     * @param GetMessageRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMessageRequest $request
    ) {
        parent::__construct(
            $session,
            GetMessageResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}/message/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() == null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

class DeleteMessageTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMessageRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMessageTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMessageRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMessageRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMessageResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}/message/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() == null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

class DescribeSubscribesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/room/subscribe";

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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeSubscribesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/room/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeSubscribesByRoomNameTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSubscribesByRoomNameRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSubscribesByRoomNameTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSubscribesByRoomNameRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSubscribesByRoomNameRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSubscribesByRoomNameResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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

class SubscribeTask extends Gs2RestSessionTask {

    /**
     * @var SubscribeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubscribeTask constructor.
     * @param Gs2RestSession $session
     * @param SubscribeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubscribeRequest $request
    ) {
        parent::__construct(
            $session,
            SubscribeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $json = [];
        if ($this->request->getNotificationTypes() != null) {
            $array = [];
            foreach ($this->request->getNotificationTypes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["notificationTypes"] = $array;
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

class SubscribeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SubscribeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubscribeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SubscribeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubscribeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SubscribeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getNotificationTypes() != null) {
            $array = [];
            foreach ($this->request->getNotificationTypes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["notificationTypes"] = $array;
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

class GetSubscribeTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetSubscribeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetSubscribeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSubscribeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetSubscribeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSubscribeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetSubscribeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class UpdateNotificationTypeTask extends Gs2RestSessionTask {

    /**
     * @var UpdateNotificationTypeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateNotificationTypeTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateNotificationTypeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateNotificationTypeRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateNotificationTypeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/room/{roomName}/subscribe/notification";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $json = [];
        if ($this->request->getNotificationTypes() != null) {
            $array = [];
            foreach ($this->request->getNotificationTypes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["notificationTypes"] = $array;
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

class UpdateNotificationTypeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UpdateNotificationTypeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateNotificationTypeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateNotificationTypeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateNotificationTypeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateNotificationTypeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/room/{roomName}/subscribe/notification";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getNotificationTypes() != null) {
            $array = [];
            foreach ($this->request->getNotificationTypes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["notificationTypes"] = $array;
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

class UnsubscribeTask extends Gs2RestSessionTask {

    /**
     * @var UnsubscribeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnsubscribeTask constructor.
     * @param Gs2RestSession $session
     * @param UnsubscribeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnsubscribeRequest $request
    ) {
        parent::__construct(
            $session,
            UnsubscribeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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

class UnsubscribeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UnsubscribeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnsubscribeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UnsubscribeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnsubscribeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UnsubscribeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() == null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
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

/**
 * GS2 Chat API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ChatRestClient extends AbstractGs2Client {

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

        $resultAsyncResult = [];
        $this->describeNamespacesAsync(
            $request
        )->then(
            function (DescribeNamespacesResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
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

        $resultAsyncResult = [];
        $this->createNamespaceAsync(
            $request
        )->then(
            function (CreateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを取得<br>
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
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
     * @return GetNamespaceStatusResult
     */
    public function getNamespaceStatus (
            GetNamespaceStatusRequest $request
    ): GetNamespaceStatusResult {

        $resultAsyncResult = [];
        $this->getNamespaceStatusAsync(
            $request
        )->then(
            function (GetNamespaceStatusResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
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

        $resultAsyncResult = [];
        $this->getNamespaceAsync(
            $request
        )->then(
            function (GetNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
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

        $resultAsyncResult = [];
        $this->updateNamespaceAsync(
            $request
        )->then(
            function (UpdateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
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

        $resultAsyncResult = [];
        $this->deleteNamespaceAsync(
            $request
        )->then(
            function (DeleteNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ルームの一覧取得<br>
     *
     * @param DescribeRoomsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeRoomsAsync(
            DescribeRoomsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRoomsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ルームの一覧取得<br>
     *
     * @param DescribeRoomsRequest $request リクエストパラメータ
     * @return DescribeRoomsResult
     */
    public function describeRooms (
            DescribeRoomsRequest $request
    ): DescribeRoomsResult {

        $resultAsyncResult = [];
        $this->describeRoomsAsync(
            $request
        )->then(
            function (DescribeRoomsResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ルームを作成<br>
     *
     * @param CreateRoomRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createRoomAsync(
            CreateRoomRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateRoomTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ルームを作成<br>
     *
     * @param CreateRoomRequest $request リクエストパラメータ
     * @return CreateRoomResult
     */
    public function createRoom (
            CreateRoomRequest $request
    ): CreateRoomResult {

        $resultAsyncResult = [];
        $this->createRoomAsync(
            $request
        )->then(
            function (CreateRoomResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ルームを作成<br>
     *
     * @param CreateRoomFromBackendRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createRoomFromBackendAsync(
            CreateRoomFromBackendRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateRoomFromBackendTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ルームを作成<br>
     *
     * @param CreateRoomFromBackendRequest $request リクエストパラメータ
     * @return CreateRoomFromBackendResult
     */
    public function createRoomFromBackend (
            CreateRoomFromBackendRequest $request
    ): CreateRoomFromBackendResult {

        $resultAsyncResult = [];
        $this->createRoomFromBackendAsync(
            $request
        )->then(
            function (CreateRoomFromBackendResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ルームを取得<br>
     *
     * @param GetRoomRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getRoomAsync(
            GetRoomRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRoomTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ルームを取得<br>
     *
     * @param GetRoomRequest $request リクエストパラメータ
     * @return GetRoomResult
     */
    public function getRoom (
            GetRoomRequest $request
    ): GetRoomResult {

        $resultAsyncResult = [];
        $this->getRoomAsync(
            $request
        )->then(
            function (GetRoomResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ルームを更新<br>
     *
     * @param UpdateRoomRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateRoomAsync(
            UpdateRoomRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateRoomTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ルームを更新<br>
     *
     * @param UpdateRoomRequest $request リクエストパラメータ
     * @return UpdateRoomResult
     */
    public function updateRoom (
            UpdateRoomRequest $request
    ): UpdateRoomResult {

        $resultAsyncResult = [];
        $this->updateRoomAsync(
            $request
        )->then(
            function (UpdateRoomResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ルームを削除<br>
     *
     * @param DeleteRoomRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteRoomAsync(
            DeleteRoomRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRoomTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ルームを削除<br>
     *
     * @param DeleteRoomRequest $request リクエストパラメータ
     * @return DeleteRoomResult
     */
    public function deleteRoom (
            DeleteRoomRequest $request
    ): DeleteRoomResult {

        $resultAsyncResult = [];
        $this->deleteRoomAsync(
            $request
        )->then(
            function (DeleteRoomResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ルームを削除<br>
     *
     * @param DeleteRoomFromBackendRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteRoomFromBackendAsync(
            DeleteRoomFromBackendRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRoomFromBackendTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ルームを削除<br>
     *
     * @param DeleteRoomFromBackendRequest $request リクエストパラメータ
     * @return DeleteRoomFromBackendResult
     */
    public function deleteRoomFromBackend (
            DeleteRoomFromBackendRequest $request
    ): DeleteRoomFromBackendResult {

        $resultAsyncResult = [];
        $this->deleteRoomFromBackendAsync(
            $request
        )->then(
            function (DeleteRoomFromBackendResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * メッセージの一覧取得<br>
     *
     * @param DescribeMessagesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeMessagesAsync(
            DescribeMessagesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMessagesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * メッセージの一覧取得<br>
     *
     * @param DescribeMessagesRequest $request リクエストパラメータ
     * @return DescribeMessagesResult
     */
    public function describeMessages (
            DescribeMessagesRequest $request
    ): DescribeMessagesResult {

        $resultAsyncResult = [];
        $this->describeMessagesAsync(
            $request
        )->then(
            function (DescribeMessagesResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * メッセージを投稿<br>
     *
     * @param PostRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function postAsync(
            PostRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PostTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * メッセージを投稿<br>
     *
     * @param PostRequest $request リクエストパラメータ
     * @return PostResult
     */
    public function post (
            PostRequest $request
    ): PostResult {

        $resultAsyncResult = [];
        $this->postAsync(
            $request
        )->then(
            function (PostResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザIDを指定してメッセージを投稿<br>
     *
     * @param PostByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function postByUserIdAsync(
            PostByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PostByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してメッセージを投稿<br>
     *
     * @param PostByUserIdRequest $request リクエストパラメータ
     * @return PostByUserIdResult
     */
    public function postByUserId (
            PostByUserIdRequest $request
    ): PostByUserIdResult {

        $resultAsyncResult = [];
        $this->postByUserIdAsync(
            $request
        )->then(
            function (PostByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * メッセージを取得<br>
     *
     * @param GetMessageRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getMessageAsync(
            GetMessageRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMessageTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * メッセージを取得<br>
     *
     * @param GetMessageRequest $request リクエストパラメータ
     * @return GetMessageResult
     */
    public function getMessage (
            GetMessageRequest $request
    ): GetMessageResult {

        $resultAsyncResult = [];
        $this->getMessageAsync(
            $request
        )->then(
            function (GetMessageResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * メッセージを削除<br>
     *
     * @param DeleteMessageRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteMessageAsync(
            DeleteMessageRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMessageTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * メッセージを削除<br>
     *
     * @param DeleteMessageRequest $request リクエストパラメータ
     * @return DeleteMessageResult
     */
    public function deleteMessage (
            DeleteMessageRequest $request
    ): DeleteMessageResult {

        $resultAsyncResult = [];
        $this->deleteMessageAsync(
            $request
        )->then(
            function (DeleteMessageResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 購読しているルームの一覧取得<br>
     *
     * @param DescribeSubscribesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeSubscribesAsync(
            DescribeSubscribesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 購読しているルームの一覧取得<br>
     *
     * @param DescribeSubscribesRequest $request リクエストパラメータ
     * @return DescribeSubscribesResult
     */
    public function describeSubscribes (
            DescribeSubscribesRequest $request
    ): DescribeSubscribesResult {

        $resultAsyncResult = [];
        $this->describeSubscribesAsync(
            $request
        )->then(
            function (DescribeSubscribesResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザIDを指定して購読しているルームの一覧取得<br>
     *
     * @param DescribeSubscribesByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeSubscribesByUserIdAsync(
            DescribeSubscribesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定して購読しているルームの一覧取得<br>
     *
     * @param DescribeSubscribesByUserIdRequest $request リクエストパラメータ
     * @return DescribeSubscribesByUserIdResult
     */
    public function describeSubscribesByUserId (
            DescribeSubscribesByUserIdRequest $request
    ): DescribeSubscribesByUserIdResult {

        $resultAsyncResult = [];
        $this->describeSubscribesByUserIdAsync(
            $request
        )->then(
            function (DescribeSubscribesByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ルーム名を指定して購読しているユーザの一覧取得<br>
     *
     * @param DescribeSubscribesByRoomNameRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeSubscribesByRoomNameAsync(
            DescribeSubscribesByRoomNameRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSubscribesByRoomNameTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ルーム名を指定して購読しているユーザの一覧取得<br>
     *
     * @param DescribeSubscribesByRoomNameRequest $request リクエストパラメータ
     * @return DescribeSubscribesByRoomNameResult
     */
    public function describeSubscribesByRoomName (
            DescribeSubscribesByRoomNameRequest $request
    ): DescribeSubscribesByRoomNameResult {

        $resultAsyncResult = [];
        $this->describeSubscribesByRoomNameAsync(
            $request
        )->then(
            function (DescribeSubscribesByRoomNameResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ルームを購読<br>
     *
     * @param SubscribeRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function subscribeAsync(
            SubscribeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubscribeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ルームを購読<br>
     *
     * @param SubscribeRequest $request リクエストパラメータ
     * @return SubscribeResult
     */
    public function subscribe (
            SubscribeRequest $request
    ): SubscribeResult {

        $resultAsyncResult = [];
        $this->subscribeAsync(
            $request
        )->then(
            function (SubscribeResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザIDを指定してルームを購読<br>
     *
     * @param SubscribeByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function subscribeByUserIdAsync(
            SubscribeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubscribeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してルームを購読<br>
     *
     * @param SubscribeByUserIdRequest $request リクエストパラメータ
     * @return SubscribeByUserIdResult
     */
    public function subscribeByUserId (
            SubscribeByUserIdRequest $request
    ): SubscribeByUserIdResult {

        $resultAsyncResult = [];
        $this->subscribeByUserIdAsync(
            $request
        )->then(
            function (SubscribeByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 購読を取得<br>
     *
     * @param GetSubscribeRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getSubscribeAsync(
            GetSubscribeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 購読を取得<br>
     *
     * @param GetSubscribeRequest $request リクエストパラメータ
     * @return GetSubscribeResult
     */
    public function getSubscribe (
            GetSubscribeRequest $request
    ): GetSubscribeResult {

        $resultAsyncResult = [];
        $this->getSubscribeAsync(
            $request
        )->then(
            function (GetSubscribeResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザIDを指定して購読を取得<br>
     *
     * @param GetSubscribeByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getSubscribeByUserIdAsync(
            GetSubscribeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSubscribeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定して購読を取得<br>
     *
     * @param GetSubscribeByUserIdRequest $request リクエストパラメータ
     * @return GetSubscribeByUserIdResult
     */
    public function getSubscribeByUserId (
            GetSubscribeByUserIdRequest $request
    ): GetSubscribeByUserIdResult {

        $resultAsyncResult = [];
        $this->getSubscribeByUserIdAsync(
            $request
        )->then(
            function (GetSubscribeByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 通知方法を更新<br>
     *
     * @param UpdateNotificationTypeRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateNotificationTypeAsync(
            UpdateNotificationTypeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateNotificationTypeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 通知方法を更新<br>
     *
     * @param UpdateNotificationTypeRequest $request リクエストパラメータ
     * @return UpdateNotificationTypeResult
     */
    public function updateNotificationType (
            UpdateNotificationTypeRequest $request
    ): UpdateNotificationTypeResult {

        $resultAsyncResult = [];
        $this->updateNotificationTypeAsync(
            $request
        )->then(
            function (UpdateNotificationTypeResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザIDを指定して通知方法を更新<br>
     *
     * @param UpdateNotificationTypeByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateNotificationTypeByUserIdAsync(
            UpdateNotificationTypeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateNotificationTypeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定して通知方法を更新<br>
     *
     * @param UpdateNotificationTypeByUserIdRequest $request リクエストパラメータ
     * @return UpdateNotificationTypeByUserIdResult
     */
    public function updateNotificationTypeByUserId (
            UpdateNotificationTypeByUserIdRequest $request
    ): UpdateNotificationTypeByUserIdResult {

        $resultAsyncResult = [];
        $this->updateNotificationTypeByUserIdAsync(
            $request
        )->then(
            function (UpdateNotificationTypeByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 購読の購読を解除<br>
     *
     * @param UnsubscribeRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function unsubscribeAsync(
            UnsubscribeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnsubscribeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 購読の購読を解除<br>
     *
     * @param UnsubscribeRequest $request リクエストパラメータ
     * @return UnsubscribeResult
     */
    public function unsubscribe (
            UnsubscribeRequest $request
    ): UnsubscribeResult {

        $resultAsyncResult = [];
        $this->unsubscribeAsync(
            $request
        )->then(
            function (UnsubscribeResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザIDを指定して購読の購読を解除<br>
     *
     * @param UnsubscribeByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function unsubscribeByUserIdAsync(
            UnsubscribeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnsubscribeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定して購読の購読を解除<br>
     *
     * @param UnsubscribeByUserIdRequest $request リクエストパラメータ
     * @return UnsubscribeByUserIdResult
     */
    public function unsubscribeByUserId (
            UnsubscribeByUserIdRequest $request
    ): UnsubscribeByUserIdResult {

        $resultAsyncResult = [];
        $this->unsubscribeByUserIdAsync(
            $request
        )->then(
            function (UnsubscribeByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }
}