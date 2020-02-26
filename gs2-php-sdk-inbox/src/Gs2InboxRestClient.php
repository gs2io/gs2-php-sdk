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

namespace Gs2\Inbox;

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
use Gs2\Inbox\Request\DescribeNamespacesRequest;
use Gs2\Inbox\Result\DescribeNamespacesResult;
use Gs2\Inbox\Request\CreateNamespaceRequest;
use Gs2\Inbox\Result\CreateNamespaceResult;
use Gs2\Inbox\Request\GetNamespaceStatusRequest;
use Gs2\Inbox\Result\GetNamespaceStatusResult;
use Gs2\Inbox\Request\GetNamespaceRequest;
use Gs2\Inbox\Result\GetNamespaceResult;
use Gs2\Inbox\Request\UpdateNamespaceRequest;
use Gs2\Inbox\Result\UpdateNamespaceResult;
use Gs2\Inbox\Request\DeleteNamespaceRequest;
use Gs2\Inbox\Result\DeleteNamespaceResult;
use Gs2\Inbox\Request\DescribeMessagesRequest;
use Gs2\Inbox\Result\DescribeMessagesResult;
use Gs2\Inbox\Request\DescribeMessagesByUserIdRequest;
use Gs2\Inbox\Result\DescribeMessagesByUserIdResult;
use Gs2\Inbox\Request\SendMessageByUserIdRequest;
use Gs2\Inbox\Result\SendMessageByUserIdResult;
use Gs2\Inbox\Request\GetMessageRequest;
use Gs2\Inbox\Result\GetMessageResult;
use Gs2\Inbox\Request\GetMessageByUserIdRequest;
use Gs2\Inbox\Result\GetMessageByUserIdResult;
use Gs2\Inbox\Request\OpenMessageRequest;
use Gs2\Inbox\Result\OpenMessageResult;
use Gs2\Inbox\Request\OpenMessageByUserIdRequest;
use Gs2\Inbox\Result\OpenMessageByUserIdResult;
use Gs2\Inbox\Request\ReadMessageRequest;
use Gs2\Inbox\Result\ReadMessageResult;
use Gs2\Inbox\Request\ReadMessageByUserIdRequest;
use Gs2\Inbox\Result\ReadMessageByUserIdResult;
use Gs2\Inbox\Request\DeleteMessageRequest;
use Gs2\Inbox\Result\DeleteMessageResult;
use Gs2\Inbox\Request\DeleteMessageByUserIdRequest;
use Gs2\Inbox\Result\DeleteMessageByUserIdResult;
use Gs2\Inbox\Request\OpenByStampTaskRequest;
use Gs2\Inbox\Result\OpenByStampTaskResult;

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getIsAutomaticDeletingEnabled() != null) {
            $json["isAutomaticDeletingEnabled"] = $this->request->getIsAutomaticDeletingEnabled();
        }
        if ($this->request->getReceiveMessageScript() != null) {
            $json["receiveMessageScript"] = $this->request->getReceiveMessageScript()->toJson();
        }
        if ($this->request->getReadMessageScript() != null) {
            $json["readMessageScript"] = $this->request->getReadMessageScript()->toJson();
        }
        if ($this->request->getDeleteMessageScript() != null) {
            $json["deleteMessageScript"] = $this->request->getDeleteMessageScript()->toJson();
        }
        if ($this->request->getQueueNamespaceId() != null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getReceiveNotification() != null) {
            $json["receiveNotification"] = $this->request->getReceiveNotification()->toJson();
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getIsAutomaticDeletingEnabled() != null) {
            $json["isAutomaticDeletingEnabled"] = $this->request->getIsAutomaticDeletingEnabled();
        }
        if ($this->request->getReceiveMessageScript() != null) {
            $json["receiveMessageScript"] = $this->request->getReceiveMessageScript()->toJson();
        }
        if ($this->request->getReadMessageScript() != null) {
            $json["readMessageScript"] = $this->request->getReadMessageScript()->toJson();
        }
        if ($this->request->getDeleteMessageScript() != null) {
            $json["deleteMessageScript"] = $this->request->getDeleteMessageScript()->toJson();
        }
        if ($this->request->getQueueNamespaceId() != null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getReceiveNotification() != null) {
            $json["receiveNotification"] = $this->request->getReceiveNotification()->toJson();
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/message";

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

class DescribeMessagesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMessagesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMessagesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMessagesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMessagesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMessagesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/message";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
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

class SendMessageByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SendMessageByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SendMessageByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SendMessageByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SendMessageByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SendMessageByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/message";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getReadAcquireActions() != null) {
            $array = [];
            foreach ($this->request->getReadAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["readAcquireActions"] = $array;
        }
        if ($this->request->getExpiresAt() != null) {
            $json["expiresAt"] = $this->request->getExpiresAt();
        }
        if ($this->request->getExpiresTimeSpan() != null) {
            $json["expiresTimeSpan"] = $this->request->getExpiresTimeSpan()->toJson();
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetMessageByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetMessageByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMessageByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetMessageByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMessageByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetMessageByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class OpenMessageTask extends Gs2RestSessionTask {

    /**
     * @var OpenMessageRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * OpenMessageTask constructor.
     * @param Gs2RestSession $session
     * @param OpenMessageRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        OpenMessageRequest $request
    ) {
        parent::__construct(
            $session,
            OpenMessageResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() == null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

        $json = [];
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

class OpenMessageByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var OpenMessageByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * OpenMessageByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param OpenMessageByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        OpenMessageByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            OpenMessageByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() == null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

        $json = [];
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

class ReadMessageTask extends Gs2RestSessionTask {

    /**
     * @var ReadMessageRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReadMessageTask constructor.
     * @param Gs2RestSession $session
     * @param ReadMessageRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReadMessageRequest $request
    ) {
        parent::__construct(
            $session,
            ReadMessageResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/{messageName}/read";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() == null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

        $json = [];
        if ($this->request->getConfig() != null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
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

class ReadMessageByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ReadMessageByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReadMessageByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ReadMessageByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReadMessageByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ReadMessageByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/{messageName}/read";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() == null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

        $json = [];
        if ($this->request->getConfig() != null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteMessageByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMessageByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMessageByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMessageByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMessageByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMessageByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class OpenByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var OpenByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * OpenByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param OpenByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        OpenByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            OpenByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/stamp/open";

        $json = [];
        if ($this->request->getStampTask() != null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
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

/**
 * GS2 Inbox API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2InboxRestClient extends AbstractGs2Client {

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
     * メッセージの一覧を取得<br>
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
     * メッセージの一覧を取得<br>
     *
     * @param DescribeMessagesRequest $request リクエストパラメータ
     * @return DescribeMessagesResult
     */
    public function describeMessages (
            DescribeMessagesRequest $request
    ): DescribeMessagesResult {
        return $this->describeMessagesAsync(
            $request
        )->wait();
    }

    /**
     * メッセージの一覧を取得<br>
     *
     * @param DescribeMessagesByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeMessagesByUserIdAsync(
            DescribeMessagesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMessagesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * メッセージの一覧を取得<br>
     *
     * @param DescribeMessagesByUserIdRequest $request リクエストパラメータ
     * @return DescribeMessagesByUserIdResult
     */
    public function describeMessagesByUserId (
            DescribeMessagesByUserIdRequest $request
    ): DescribeMessagesByUserIdResult {
        return $this->describeMessagesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * メッセージを新規作成<br>
     *
     * @param SendMessageByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function sendMessageByUserIdAsync(
            SendMessageByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SendMessageByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * メッセージを新規作成<br>
     *
     * @param SendMessageByUserIdRequest $request リクエストパラメータ
     * @return SendMessageByUserIdResult
     */
    public function sendMessageByUserId (
            SendMessageByUserIdRequest $request
    ): SendMessageByUserIdResult {
        return $this->sendMessageByUserIdAsync(
            $request
        )->wait();
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
        return $this->getMessageAsync(
            $request
        )->wait();
    }

    /**
     * ユーザーIDを指定してメッセージを取得<br>
     *
     * @param GetMessageByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getMessageByUserIdAsync(
            GetMessageByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMessageByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザーIDを指定してメッセージを取得<br>
     *
     * @param GetMessageByUserIdRequest $request リクエストパラメータ
     * @return GetMessageByUserIdResult
     */
    public function getMessageByUserId (
            GetMessageByUserIdRequest $request
    ): GetMessageByUserIdResult {
        return $this->getMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * メッセージを開封<br>
     *
     * @param OpenMessageRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function openMessageAsync(
            OpenMessageRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new OpenMessageTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * メッセージを開封<br>
     *
     * @param OpenMessageRequest $request リクエストパラメータ
     * @return OpenMessageResult
     */
    public function openMessage (
            OpenMessageRequest $request
    ): OpenMessageResult {
        return $this->openMessageAsync(
            $request
        )->wait();
    }

    /**
     * ユーザーIDを指定してメッセージを開封<br>
     *
     * @param OpenMessageByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function openMessageByUserIdAsync(
            OpenMessageByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new OpenMessageByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザーIDを指定してメッセージを開封<br>
     *
     * @param OpenMessageByUserIdRequest $request リクエストパラメータ
     * @return OpenMessageByUserIdResult
     */
    public function openMessageByUserId (
            OpenMessageByUserIdRequest $request
    ): OpenMessageByUserIdResult {
        return $this->openMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * メッセージを開封<br>
     *
     * @param ReadMessageRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function readMessageAsync(
            ReadMessageRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReadMessageTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * メッセージを開封<br>
     *
     * @param ReadMessageRequest $request リクエストパラメータ
     * @return ReadMessageResult
     */
    public function readMessage (
            ReadMessageRequest $request
    ): ReadMessageResult {
        return $this->readMessageAsync(
            $request
        )->wait();
    }

    /**
     * ユーザーIDを指定してメッセージを開封<br>
     *
     * @param ReadMessageByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function readMessageByUserIdAsync(
            ReadMessageByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReadMessageByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザーIDを指定してメッセージを開封<br>
     *
     * @param ReadMessageByUserIdRequest $request リクエストパラメータ
     * @return ReadMessageByUserIdResult
     */
    public function readMessageByUserId (
            ReadMessageByUserIdRequest $request
    ): ReadMessageByUserIdResult {
        return $this->readMessageByUserIdAsync(
            $request
        )->wait();
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
        return $this->deleteMessageAsync(
            $request
        )->wait();
    }

    /**
     * ユーザーIDを指定してメッセージを削除<br>
     *
     * @param DeleteMessageByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteMessageByUserIdAsync(
            DeleteMessageByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMessageByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザーIDを指定してメッセージを削除<br>
     *
     * @param DeleteMessageByUserIdRequest $request リクエストパラメータ
     * @return DeleteMessageByUserIdResult
     */
    public function deleteMessageByUserId (
            DeleteMessageByUserIdRequest $request
    ): DeleteMessageByUserIdResult {
        return $this->deleteMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * メッセージを作成<br>
     *
     * @param OpenByStampTaskRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function openByStampTaskAsync(
            OpenByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new OpenByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * メッセージを作成<br>
     *
     * @param OpenByStampTaskRequest $request リクエストパラメータ
     * @return OpenByStampTaskResult
     */
    public function openByStampTask (
            OpenByStampTaskRequest $request
    ): OpenByStampTaskResult {
        return $this->openByStampTaskAsync(
            $request
        )->wait();
    }
}