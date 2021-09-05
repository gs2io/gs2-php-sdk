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
use Gs2\Inbox\Request\ReceiveGlobalMessageRequest;
use Gs2\Inbox\Result\ReceiveGlobalMessageResult;
use Gs2\Inbox\Request\ReceiveGlobalMessageByUserIdRequest;
use Gs2\Inbox\Result\ReceiveGlobalMessageByUserIdResult;
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
use Gs2\Inbox\Request\SendByStampSheetRequest;
use Gs2\Inbox\Result\SendByStampSheetResult;
use Gs2\Inbox\Request\OpenByStampTaskRequest;
use Gs2\Inbox\Result\OpenByStampTaskResult;
use Gs2\Inbox\Request\ExportMasterRequest;
use Gs2\Inbox\Result\ExportMasterResult;
use Gs2\Inbox\Request\GetCurrentMessageMasterRequest;
use Gs2\Inbox\Result\GetCurrentMessageMasterResult;
use Gs2\Inbox\Request\UpdateCurrentMessageMasterRequest;
use Gs2\Inbox\Result\UpdateCurrentMessageMasterResult;
use Gs2\Inbox\Request\UpdateCurrentMessageMasterFromGitHubRequest;
use Gs2\Inbox\Result\UpdateCurrentMessageMasterFromGitHubResult;
use Gs2\Inbox\Request\DescribeGlobalMessageMastersRequest;
use Gs2\Inbox\Result\DescribeGlobalMessageMastersResult;
use Gs2\Inbox\Request\CreateGlobalMessageMasterRequest;
use Gs2\Inbox\Result\CreateGlobalMessageMasterResult;
use Gs2\Inbox\Request\GetGlobalMessageMasterRequest;
use Gs2\Inbox\Result\GetGlobalMessageMasterResult;
use Gs2\Inbox\Request\UpdateGlobalMessageMasterRequest;
use Gs2\Inbox\Result\UpdateGlobalMessageMasterResult;
use Gs2\Inbox\Request\DeleteGlobalMessageMasterRequest;
use Gs2\Inbox\Result\DeleteGlobalMessageMasterResult;
use Gs2\Inbox\Request\DescribeGlobalMessagesRequest;
use Gs2\Inbox\Result\DescribeGlobalMessagesResult;
use Gs2\Inbox\Request\GetGlobalMessageRequest;
use Gs2\Inbox\Result\GetGlobalMessageResult;
use Gs2\Inbox\Request\GetReceivedByUserIdRequest;
use Gs2\Inbox\Result\GetReceivedByUserIdResult;
use Gs2\Inbox\Request\UpdateReceivedByUserIdRequest;
use Gs2\Inbox\Result\UpdateReceivedByUserIdResult;
use Gs2\Inbox\Request\DeleteReceivedByUserIdRequest;
use Gs2\Inbox\Result\DeleteReceivedByUserIdResult;

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getIsAutomaticDeletingEnabled() !== null) {
            $json["isAutomaticDeletingEnabled"] = $this->request->getIsAutomaticDeletingEnabled();
        }
        if ($this->request->getReceiveMessageScript() !== null) {
            $json["receiveMessageScript"] = $this->request->getReceiveMessageScript()->toJson();
        }
        if ($this->request->getReadMessageScript() !== null) {
            $json["readMessageScript"] = $this->request->getReadMessageScript()->toJson();
        }
        if ($this->request->getDeleteMessageScript() !== null) {
            $json["deleteMessageScript"] = $this->request->getDeleteMessageScript()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getReceiveNotification() !== null) {
            $json["receiveNotification"] = $this->request->getReceiveNotification()->toJson();
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getIsAutomaticDeletingEnabled() !== null) {
            $json["isAutomaticDeletingEnabled"] = $this->request->getIsAutomaticDeletingEnabled();
        }
        if ($this->request->getReceiveMessageScript() !== null) {
            $json["receiveMessageScript"] = $this->request->getReceiveMessageScript()->toJson();
        }
        if ($this->request->getReadMessageScript() !== null) {
            $json["readMessageScript"] = $this->request->getReadMessageScript()->toJson();
        }
        if ($this->request->getDeleteMessageScript() !== null) {
            $json["deleteMessageScript"] = $this->request->getDeleteMessageScript()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getReceiveNotification() !== null) {
            $json["receiveNotification"] = $this->request->getReceiveNotification()->toJson();
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/message";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/message";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/message";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getReadAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getReadAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["readAcquireActions"] = $array;
        }
        if ($this->request->getExpiresAt() !== null) {
            $json["expiresAt"] = $this->request->getExpiresAt();
        }
        if ($this->request->getExpiresTimeSpan() !== null) {
            $json["expiresTimeSpan"] = $this->request->getExpiresTimeSpan()->toJson();
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

class ReceiveGlobalMessageTask extends Gs2RestSessionTask {

    /**
     * @var ReceiveGlobalMessageRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReceiveGlobalMessageTask constructor.
     * @param Gs2RestSession $session
     * @param ReceiveGlobalMessageRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReceiveGlobalMessageRequest $request
    ) {
        parent::__construct(
            $session,
            ReceiveGlobalMessageResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/message/globalMessage/receive";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class ReceiveGlobalMessageByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ReceiveGlobalMessageByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReceiveGlobalMessageByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ReceiveGlobalMessageByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReceiveGlobalMessageByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ReceiveGlobalMessageByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/message/globalMessage/receive";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/{messageName}/read";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/{messageName}/read";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

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

class SendByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SendByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SendByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SendByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SendByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SendByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/send";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/open";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentMessageMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentMessageMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentMessageMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentMessageMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentMessageMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentMessageMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentMessageMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentMessageMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentMessageMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentMessageMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentMessageMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentMessageMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentMessageMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentMessageMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentMessageMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentMessageMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentMessageMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentMessageMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeGlobalMessageMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalMessageMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalMessageMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalMessageMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalMessageMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalMessageMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/globalMessage";

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

class CreateGlobalMessageMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateGlobalMessageMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGlobalMessageMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGlobalMessageMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGlobalMessageMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGlobalMessageMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/globalMessage";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getReadAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getReadAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["readAcquireActions"] = $array;
        }
        if ($this->request->getExpiresTimeSpan() !== null) {
            $json["expiresTimeSpan"] = $this->request->getExpiresTimeSpan()->toJson();
        }
        if ($this->request->getExpiresAt() !== null) {
            $json["expiresAt"] = $this->request->getExpiresAt();
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

class GetGlobalMessageMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalMessageMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalMessageMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalMessageMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalMessageMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalMessageMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/globalMessage/{globalMessageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{globalMessageName}", $this->request->getGlobalMessageName() === null|| strlen($this->request->getGlobalMessageName()) == 0 ? "null" : $this->request->getGlobalMessageName(), $url);

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

class UpdateGlobalMessageMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateGlobalMessageMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateGlobalMessageMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateGlobalMessageMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateGlobalMessageMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateGlobalMessageMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/globalMessage/{globalMessageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{globalMessageName}", $this->request->getGlobalMessageName() === null|| strlen($this->request->getGlobalMessageName()) == 0 ? "null" : $this->request->getGlobalMessageName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getReadAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getReadAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["readAcquireActions"] = $array;
        }
        if ($this->request->getExpiresTimeSpan() !== null) {
            $json["expiresTimeSpan"] = $this->request->getExpiresTimeSpan()->toJson();
        }
        if ($this->request->getExpiresAt() !== null) {
            $json["expiresAt"] = $this->request->getExpiresAt();
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

class DeleteGlobalMessageMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGlobalMessageMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGlobalMessageMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGlobalMessageMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGlobalMessageMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGlobalMessageMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/globalMessage/{globalMessageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{globalMessageName}", $this->request->getGlobalMessageName() === null|| strlen($this->request->getGlobalMessageName()) == 0 ? "null" : $this->request->getGlobalMessageName(), $url);

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

class DescribeGlobalMessagesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGlobalMessagesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGlobalMessagesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGlobalMessagesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGlobalMessagesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGlobalMessagesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/globalMessage";

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

class GetGlobalMessageTask extends Gs2RestSessionTask {

    /**
     * @var GetGlobalMessageRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGlobalMessageTask constructor.
     * @param Gs2RestSession $session
     * @param GetGlobalMessageRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGlobalMessageRequest $request
    ) {
        parent::__construct(
            $session,
            GetGlobalMessageResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/globalMessage/{globalMessageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{globalMessageName}", $this->request->getGlobalMessageName() === null|| strlen($this->request->getGlobalMessageName()) == 0 ? "null" : $this->request->getGlobalMessageName(), $url);

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

class GetReceivedByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetReceivedByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetReceivedByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetReceivedByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetReceivedByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetReceivedByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/received";

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

        return parent::executeImpl();
    }
}

class UpdateReceivedByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UpdateReceivedByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateReceivedByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateReceivedByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateReceivedByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateReceivedByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/received";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getReceivedGlobalMessageNames() !== null) {
            $array = [];
            foreach ($this->request->getReceivedGlobalMessageNames() as $item)
            {
                array_push($array, $item);
            }
            $json["receivedGlobalMessageNames"] = $array;
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

class DeleteReceivedByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteReceivedByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteReceivedByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteReceivedByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteReceivedByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteReceivedByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/received";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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
     * @param DescribeMessagesRequest $request
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
     * @param DescribeMessagesRequest $request
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
     * @param DescribeMessagesByUserIdRequest $request
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
     * @param DescribeMessagesByUserIdRequest $request
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
     * @param SendMessageByUserIdRequest $request
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
     * @param SendMessageByUserIdRequest $request
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
     * @param GetMessageRequest $request
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
     * @param GetMessageRequest $request
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
     * @param GetMessageByUserIdRequest $request
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
     * @param GetMessageByUserIdRequest $request
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
     * @param ReceiveGlobalMessageRequest $request
     * @return PromiseInterface
     */
    public function receiveGlobalMessageAsync(
            ReceiveGlobalMessageRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReceiveGlobalMessageTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ReceiveGlobalMessageRequest $request
     * @return ReceiveGlobalMessageResult
     */
    public function receiveGlobalMessage (
            ReceiveGlobalMessageRequest $request
    ): ReceiveGlobalMessageResult {
        return $this->receiveGlobalMessageAsync(
            $request
        )->wait();
    }

    /**
     * @param ReceiveGlobalMessageByUserIdRequest $request
     * @return PromiseInterface
     */
    public function receiveGlobalMessageByUserIdAsync(
            ReceiveGlobalMessageByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReceiveGlobalMessageByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ReceiveGlobalMessageByUserIdRequest $request
     * @return ReceiveGlobalMessageByUserIdResult
     */
    public function receiveGlobalMessageByUserId (
            ReceiveGlobalMessageByUserIdRequest $request
    ): ReceiveGlobalMessageByUserIdResult {
        return $this->receiveGlobalMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param OpenMessageRequest $request
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
     * @param OpenMessageRequest $request
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
     * @param OpenMessageByUserIdRequest $request
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
     * @param OpenMessageByUserIdRequest $request
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
     * @param ReadMessageRequest $request
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
     * @param ReadMessageRequest $request
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
     * @param ReadMessageByUserIdRequest $request
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
     * @param ReadMessageByUserIdRequest $request
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
     * @param DeleteMessageRequest $request
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
     * @param DeleteMessageRequest $request
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
     * @param DeleteMessageByUserIdRequest $request
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
     * @param DeleteMessageByUserIdRequest $request
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
     * @param SendByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function sendByStampSheetAsync(
            SendByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SendByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SendByStampSheetRequest $request
     * @return SendByStampSheetResult
     */
    public function sendByStampSheet (
            SendByStampSheetRequest $request
    ): SendByStampSheetResult {
        return $this->sendByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param OpenByStampTaskRequest $request
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
     * @param OpenByStampTaskRequest $request
     * @return OpenByStampTaskResult
     */
    public function openByStampTask (
            OpenByStampTaskRequest $request
    ): OpenByStampTaskResult {
        return $this->openByStampTaskAsync(
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
     * @param GetCurrentMessageMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentMessageMasterAsync(
            GetCurrentMessageMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentMessageMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentMessageMasterRequest $request
     * @return GetCurrentMessageMasterResult
     */
    public function getCurrentMessageMaster (
            GetCurrentMessageMasterRequest $request
    ): GetCurrentMessageMasterResult {
        return $this->getCurrentMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentMessageMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentMessageMasterAsync(
            UpdateCurrentMessageMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentMessageMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentMessageMasterRequest $request
     * @return UpdateCurrentMessageMasterResult
     */
    public function updateCurrentMessageMaster (
            UpdateCurrentMessageMasterRequest $request
    ): UpdateCurrentMessageMasterResult {
        return $this->updateCurrentMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentMessageMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentMessageMasterFromGitHubAsync(
            UpdateCurrentMessageMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentMessageMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentMessageMasterFromGitHubRequest $request
     * @return UpdateCurrentMessageMasterFromGitHubResult
     */
    public function updateCurrentMessageMasterFromGitHub (
            UpdateCurrentMessageMasterFromGitHubRequest $request
    ): UpdateCurrentMessageMasterFromGitHubResult {
        return $this->updateCurrentMessageMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeGlobalMessageMastersRequest $request
     * @return PromiseInterface
     */
    public function describeGlobalMessageMastersAsync(
            DescribeGlobalMessageMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalMessageMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeGlobalMessageMastersRequest $request
     * @return DescribeGlobalMessageMastersResult
     */
    public function describeGlobalMessageMasters (
            DescribeGlobalMessageMastersRequest $request
    ): DescribeGlobalMessageMastersResult {
        return $this->describeGlobalMessageMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateGlobalMessageMasterRequest $request
     * @return PromiseInterface
     */
    public function createGlobalMessageMasterAsync(
            CreateGlobalMessageMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGlobalMessageMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateGlobalMessageMasterRequest $request
     * @return CreateGlobalMessageMasterResult
     */
    public function createGlobalMessageMaster (
            CreateGlobalMessageMasterRequest $request
    ): CreateGlobalMessageMasterResult {
        return $this->createGlobalMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGlobalMessageMasterRequest $request
     * @return PromiseInterface
     */
    public function getGlobalMessageMasterAsync(
            GetGlobalMessageMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalMessageMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGlobalMessageMasterRequest $request
     * @return GetGlobalMessageMasterResult
     */
    public function getGlobalMessageMaster (
            GetGlobalMessageMasterRequest $request
    ): GetGlobalMessageMasterResult {
        return $this->getGlobalMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateGlobalMessageMasterRequest $request
     * @return PromiseInterface
     */
    public function updateGlobalMessageMasterAsync(
            UpdateGlobalMessageMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateGlobalMessageMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateGlobalMessageMasterRequest $request
     * @return UpdateGlobalMessageMasterResult
     */
    public function updateGlobalMessageMaster (
            UpdateGlobalMessageMasterRequest $request
    ): UpdateGlobalMessageMasterResult {
        return $this->updateGlobalMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteGlobalMessageMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteGlobalMessageMasterAsync(
            DeleteGlobalMessageMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGlobalMessageMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteGlobalMessageMasterRequest $request
     * @return DeleteGlobalMessageMasterResult
     */
    public function deleteGlobalMessageMaster (
            DeleteGlobalMessageMasterRequest $request
    ): DeleteGlobalMessageMasterResult {
        return $this->deleteGlobalMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeGlobalMessagesRequest $request
     * @return PromiseInterface
     */
    public function describeGlobalMessagesAsync(
            DescribeGlobalMessagesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGlobalMessagesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeGlobalMessagesRequest $request
     * @return DescribeGlobalMessagesResult
     */
    public function describeGlobalMessages (
            DescribeGlobalMessagesRequest $request
    ): DescribeGlobalMessagesResult {
        return $this->describeGlobalMessagesAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGlobalMessageRequest $request
     * @return PromiseInterface
     */
    public function getGlobalMessageAsync(
            GetGlobalMessageRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGlobalMessageTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGlobalMessageRequest $request
     * @return GetGlobalMessageResult
     */
    public function getGlobalMessage (
            GetGlobalMessageRequest $request
    ): GetGlobalMessageResult {
        return $this->getGlobalMessageAsync(
            $request
        )->wait();
    }

    /**
     * @param GetReceivedByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getReceivedByUserIdAsync(
            GetReceivedByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetReceivedByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetReceivedByUserIdRequest $request
     * @return GetReceivedByUserIdResult
     */
    public function getReceivedByUserId (
            GetReceivedByUserIdRequest $request
    ): GetReceivedByUserIdResult {
        return $this->getReceivedByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateReceivedByUserIdRequest $request
     * @return PromiseInterface
     */
    public function updateReceivedByUserIdAsync(
            UpdateReceivedByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateReceivedByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateReceivedByUserIdRequest $request
     * @return UpdateReceivedByUserIdResult
     */
    public function updateReceivedByUserId (
            UpdateReceivedByUserIdRequest $request
    ): UpdateReceivedByUserIdResult {
        return $this->updateReceivedByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteReceivedByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteReceivedByUserIdAsync(
            DeleteReceivedByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteReceivedByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteReceivedByUserIdRequest $request
     * @return DeleteReceivedByUserIdResult
     */
    public function deleteReceivedByUserId (
            DeleteReceivedByUserIdRequest $request
    ): DeleteReceivedByUserIdResult {
        return $this->deleteReceivedByUserIdAsync(
            $request
        )->wait();
    }
}