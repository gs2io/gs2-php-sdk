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
use Gs2\Inbox\Request\GetServiceVersionRequest;
use Gs2\Inbox\Result\GetServiceVersionResult;
use Gs2\Inbox\Request\DumpUserDataByUserIdRequest;
use Gs2\Inbox\Result\DumpUserDataByUserIdResult;
use Gs2\Inbox\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Inbox\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Inbox\Request\CleanUserDataByUserIdRequest;
use Gs2\Inbox\Result\CleanUserDataByUserIdResult;
use Gs2\Inbox\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Inbox\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Inbox\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Inbox\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Inbox\Request\ImportUserDataByUserIdRequest;
use Gs2\Inbox\Result\ImportUserDataByUserIdResult;
use Gs2\Inbox\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Inbox\Result\CheckImportUserDataByUserIdResult;
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
use Gs2\Inbox\Request\CloseMessageByUserIdRequest;
use Gs2\Inbox\Result\CloseMessageByUserIdResult;
use Gs2\Inbox\Request\ReadMessageRequest;
use Gs2\Inbox\Result\ReadMessageResult;
use Gs2\Inbox\Request\ReadMessageByUserIdRequest;
use Gs2\Inbox\Result\ReadMessageByUserIdResult;
use Gs2\Inbox\Request\BatchReadMessagesRequest;
use Gs2\Inbox\Result\BatchReadMessagesResult;
use Gs2\Inbox\Request\BatchReadMessagesByUserIdRequest;
use Gs2\Inbox\Result\BatchReadMessagesByUserIdResult;
use Gs2\Inbox\Request\DeleteMessageRequest;
use Gs2\Inbox\Result\DeleteMessageResult;
use Gs2\Inbox\Request\DeleteMessageByUserIdRequest;
use Gs2\Inbox\Result\DeleteMessageByUserIdResult;
use Gs2\Inbox\Request\SendByStampSheetRequest;
use Gs2\Inbox\Result\SendByStampSheetResult;
use Gs2\Inbox\Request\OpenByStampTaskRequest;
use Gs2\Inbox\Result\OpenByStampTaskResult;
use Gs2\Inbox\Request\DeleteMessageByStampTaskRequest;
use Gs2\Inbox\Result\DeleteMessageByStampTaskResult;
use Gs2\Inbox\Request\ExportMasterRequest;
use Gs2\Inbox\Result\ExportMasterResult;
use Gs2\Inbox\Request\GetCurrentMessageMasterRequest;
use Gs2\Inbox\Result\GetCurrentMessageMasterResult;
use Gs2\Inbox\Request\PreUpdateCurrentMessageMasterRequest;
use Gs2\Inbox\Result\PreUpdateCurrentMessageMasterResult;
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
        if ($this->request->getNamePrefix() !== null) {
            $queryStrings["namePrefix"] = $this->request->getNamePrefix();
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
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
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
        if ($this->request->getReceiveNotification() !== null) {
            $json["receiveNotification"] = $this->request->getReceiveNotification()->toJson();
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
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
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
        if ($this->request->getReceiveNotification() !== null) {
            $json["receiveNotification"] = $this->request->getReceiveNotification()->toJson();
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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
        if ($this->request->getIsRead() !== null) {
            $queryStrings["isRead"] = $this->request->getIsRead() ? "true" : "false";
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
        if ($this->request->getIsRead() !== null) {
            $queryStrings["isRead"] = $this->request->getIsRead() ? "true" : "false";
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getDuplicationAvoider() !== null) {
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CloseMessageByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CloseMessageByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CloseMessageByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CloseMessageByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CloseMessageByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CloseMessageByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/{messageName}/close";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getDuplicationAvoider() !== null) {
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class BatchReadMessagesTask extends Gs2RestSessionTask {

    /**
     * @var BatchReadMessagesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * BatchReadMessagesTask constructor.
     * @param Gs2RestSession $session
     * @param BatchReadMessagesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        BatchReadMessagesRequest $request
    ) {
        parent::__construct(
            $session,
            BatchReadMessagesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/messages/read/batch";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getMessageNames() !== null) {
            $array = [];
            foreach ($this->request->getMessageNames() as $item)
            {
                array_push($array, $item);
            }
            $json["messageNames"] = $array;
        }
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

class BatchReadMessagesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var BatchReadMessagesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * BatchReadMessagesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param BatchReadMessagesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        BatchReadMessagesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            BatchReadMessagesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/messages/read/batch";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getMessageNames() !== null) {
            $array = [];
            foreach ($this->request->getMessageNames() as $item)
            {
                array_push($array, $item);
            }
            $json["messageNames"] = $array;
        }
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
        if ($this->request->getDuplicationAvoider() !== null) {
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

class DeleteMessageByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMessageByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMessageByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMessageByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMessageByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMessageByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/delete";

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

class PreUpdateCurrentMessageMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentMessageMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentMessageMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentMessageMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentMessageMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentMessageMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentMessageMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentMessageMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentMessageMasterResult $res */
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

        $url = str_replace('{service}', "inbox", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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
        if ($this->request->getNamePrefix() !== null) {
            $queryStrings["namePrefix"] = $this->request->getNamePrefix();
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
        if ($this->request->getMessageReceptionPeriodEventId() !== null) {
            $json["messageReceptionPeriodEventId"] = $this->request->getMessageReceptionPeriodEventId();
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
        if ($this->request->getMessageReceptionPeriodEventId() !== null) {
            $json["messageReceptionPeriodEventId"] = $this->request->getMessageReceptionPeriodEventId();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

/**
 * GS2-Inbox API client
 *
 * @see https://docs.gs2.io/api_reference/inbox/sdk/
 */
class Gs2InboxRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describenamespaces
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
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return DescribeNamespacesResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describenamespaces
     */
    public function describeNamespaces (
            DescribeNamespacesRequest $request
    ): DescribeNamespacesResult {
        return $this->describeNamespacesAsync(
            $request
        )->wait();
    }

    /**
     * Create Namespace
     *
     * @param CreateNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#createnamespace
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
     * Create Namespace
     *
     * @param CreateNamespaceRequest $request
     * @return CreateNamespaceResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#createnamespace
     */
    public function createNamespace (
            CreateNamespaceRequest $request
    ): CreateNamespaceResult {
        return $this->createNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Get Namespace Status
     *
     * @param GetNamespaceStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getnamespacestatus
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
     * Get Namespace Status
     *
     * @param GetNamespaceStatusRequest $request
     * @return GetNamespaceStatusResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getnamespacestatus
     */
    public function getNamespaceStatus (
            GetNamespaceStatusRequest $request
    ): GetNamespaceStatusResult {
        return $this->getNamespaceStatusAsync(
            $request
        )->wait();
    }

    /**
     * Get Namespace
     *
     * @param GetNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getnamespace
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
     * Get Namespace
     *
     * @param GetNamespaceRequest $request
     * @return GetNamespaceResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getnamespace
     */
    public function getNamespace (
            GetNamespaceRequest $request
    ): GetNamespaceResult {
        return $this->getNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Update Namespace
     *
     * @param UpdateNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updatenamespace
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
     * Update Namespace
     *
     * @param UpdateNamespaceRequest $request
     * @return UpdateNamespaceResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updatenamespace
     */
    public function updateNamespace (
            UpdateNamespaceRequest $request
    ): UpdateNamespaceResult {
        return $this->updateNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Delete Namespace
     *
     * @param DeleteNamespaceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deletenamespace
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
     * Delete Namespace
     *
     * @param DeleteNamespaceRequest $request
     * @return DeleteNamespaceResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deletenamespace
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {
        return $this->deleteNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Get Microservice Version
     *
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getserviceversion
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
     * Get Microservice Version
     *
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getserviceversion
     */
    public function getServiceVersion (
            GetServiceVersionRequest $request
    ): GetServiceVersionResult {
        return $this->getServiceVersionAsync(
            $request
        )->wait();
    }

    /**
     * Dump data associated with the specified user ID
     *
     * @param DumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#dumpuserdatabyuserid
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
     * Dump data associated with the specified user ID
     *
     * @param DumpUserDataByUserIdRequest $request
     * @return DumpUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#dumpuserdatabyuserid
     */
    public function dumpUserDataByUserId (
            DumpUserDataByUserIdRequest $request
    ): DumpUserDataByUserIdResult {
        return $this->dumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the dump of the data associated with the specified user ID is complete
     *
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#checkdumpuserdatabyuserid
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
     * Check if the dump of the data associated with the specified user ID is complete
     *
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return CheckDumpUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#checkdumpuserdatabyuserid
     */
    public function checkDumpUserDataByUserId (
            CheckDumpUserDataByUserIdRequest $request
    ): CheckDumpUserDataByUserIdResult {
        return $this->checkDumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Clean User Data by User ID
     *
     * @param CleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#cleanuserdatabyuserid
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
     * Clean User Data by User ID
     *
     * @param CleanUserDataByUserIdRequest $request
     * @return CleanUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#cleanuserdatabyuserid
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the cleaning of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#checkcleanuserdatabyuserid
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
     * Check if the cleaning of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#checkcleanuserdatabyuserid
     */
    public function checkCleanUserDataByUserId (
            CheckCleanUserDataByUserIdRequest $request
    ): CheckCleanUserDataByUserIdResult {
        return $this->checkCleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Prepare User Data Import by User ID
     *
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#prepareimportuserdatabyuserid
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
     * Prepare User Data Import by User ID
     *
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PrepareImportUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#prepareimportuserdatabyuserid
     */
    public function prepareImportUserDataByUserId (
            PrepareImportUserDataByUserIdRequest $request
    ): PrepareImportUserDataByUserIdResult {
        return $this->prepareImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute import of data associated with the specified user ID
     *
     * @param ImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#importuserdatabyuserid
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
     * Execute import of data associated with the specified user ID
     *
     * @param ImportUserDataByUserIdRequest $request
     * @return ImportUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#importuserdatabyuserid
     */
    public function importUserDataByUserId (
            ImportUserDataByUserIdRequest $request
    ): ImportUserDataByUserIdResult {
        return $this->importUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the import of the data associated with the specified user ID is complete
     *
     * @param CheckImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#checkimportuserdatabyuserid
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
     * Check if the import of the data associated with the specified user ID is complete
     *
     * @param CheckImportUserDataByUserIdRequest $request
     * @return CheckImportUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List messages
     *
     * @param DescribeMessagesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describemessages
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
     * List messages
     *
     * @param DescribeMessagesRequest $request
     * @return DescribeMessagesResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describemessages
     */
    public function describeMessages (
            DescribeMessagesRequest $request
    ): DescribeMessagesResult {
        return $this->describeMessagesAsync(
            $request
        )->wait();
    }

    /**
     * List messages by User ID
     *
     * @param DescribeMessagesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describemessagesbyuserid
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
     * List messages by User ID
     *
     * @param DescribeMessagesByUserIdRequest $request
     * @return DescribeMessagesByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describemessagesbyuserid
     */
    public function describeMessagesByUserId (
            DescribeMessagesByUserIdRequest $request
    ): DescribeMessagesByUserIdResult {
        return $this->describeMessagesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Send a message by User ID
     *
     * @param SendMessageByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#sendmessagebyuserid
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
     * Send a message by User ID
     *
     * @param SendMessageByUserIdRequest $request
     * @return SendMessageByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#sendmessagebyuserid
     */
    public function sendMessageByUserId (
            SendMessageByUserIdRequest $request
    ): SendMessageByUserIdResult {
        return $this->sendMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Message
     *
     * @param GetMessageRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getmessage
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
     * Get Message
     *
     * @param GetMessageRequest $request
     * @return GetMessageResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getmessage
     */
    public function getMessage (
            GetMessageRequest $request
    ): GetMessageResult {
        return $this->getMessageAsync(
            $request
        )->wait();
    }

    /**
     * Get message by User ID
     *
     * @param GetMessageByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getmessagebyuserid
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
     * Get message by User ID
     *
     * @param GetMessageByUserIdRequest $request
     * @return GetMessageByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getmessagebyuserid
     */
    public function getMessageByUserId (
            GetMessageByUserIdRequest $request
    ): GetMessageByUserIdResult {
        return $this->getMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Receive Unreceived Global Messages
     *
     * @param ReceiveGlobalMessageRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#receiveglobalmessage
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
     * Receive Unreceived Global Messages
     *
     * @param ReceiveGlobalMessageRequest $request
     * @return ReceiveGlobalMessageResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#receiveglobalmessage
     */
    public function receiveGlobalMessage (
            ReceiveGlobalMessageRequest $request
    ): ReceiveGlobalMessageResult {
        return $this->receiveGlobalMessageAsync(
            $request
        )->wait();
    }

    /**
     * Receive Unreceived Global Messages by User ID
     *
     * @param ReceiveGlobalMessageByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#receiveglobalmessagebyuserid
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
     * Receive Unreceived Global Messages by User ID
     *
     * @param ReceiveGlobalMessageByUserIdRequest $request
     * @return ReceiveGlobalMessageByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#receiveglobalmessagebyuserid
     */
    public function receiveGlobalMessageByUserId (
            ReceiveGlobalMessageByUserIdRequest $request
    ): ReceiveGlobalMessageByUserIdResult {
        return $this->receiveGlobalMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Mark Message as Opened
     *
     * @param OpenMessageRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#openmessage
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
     * Mark Message as Opened
     *
     * @param OpenMessageRequest $request
     * @return OpenMessageResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#openmessage
     */
    public function openMessage (
            OpenMessageRequest $request
    ): OpenMessageResult {
        return $this->openMessageAsync(
            $request
        )->wait();
    }

    /**
     * Mark Message as Opened by User ID
     *
     * @param OpenMessageByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#openmessagebyuserid
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
     * Mark Message as Opened by User ID
     *
     * @param OpenMessageByUserIdRequest $request
     * @return OpenMessageByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#openmessagebyuserid
     */
    public function openMessageByUserId (
            OpenMessageByUserIdRequest $request
    ): OpenMessageByUserIdResult {
        return $this->openMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Mark a previously opened message as unread
     *
     * @param CloseMessageByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#closemessagebyuserid
     */
    public function closeMessageByUserIdAsync(
            CloseMessageByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CloseMessageByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Mark a previously opened message as unread
     *
     * @param CloseMessageByUserIdRequest $request
     * @return CloseMessageByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#closemessagebyuserid
     */
    public function closeMessageByUserId (
            CloseMessageByUserIdRequest $request
    ): CloseMessageByUserIdResult {
        return $this->closeMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Read message
     *
     * @param ReadMessageRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#readmessage
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
     * Read message
     *
     * @param ReadMessageRequest $request
     * @return ReadMessageResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#readmessage
     */
    public function readMessage (
            ReadMessageRequest $request
    ): ReadMessageResult {
        return $this->readMessageAsync(
            $request
        )->wait();
    }

    /**
     * Read message by User ID
     *
     * @param ReadMessageByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#readmessagebyuserid
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
     * Read message by User ID
     *
     * @param ReadMessageByUserIdRequest $request
     * @return ReadMessageByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#readmessagebyuserid
     */
    public function readMessageByUserId (
            ReadMessageByUserIdRequest $request
    ): ReadMessageByUserIdResult {
        return $this->readMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Read messages
     *
     * @param BatchReadMessagesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#batchreadmessages
     */
    public function batchReadMessagesAsync(
            BatchReadMessagesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new BatchReadMessagesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Read messages
     *
     * @param BatchReadMessagesRequest $request
     * @return BatchReadMessagesResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#batchreadmessages
     */
    public function batchReadMessages (
            BatchReadMessagesRequest $request
    ): BatchReadMessagesResult {
        return $this->batchReadMessagesAsync(
            $request
        )->wait();
    }

    /**
     * Read messages by User ID
     *
     * @param BatchReadMessagesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#batchreadmessagesbyuserid
     */
    public function batchReadMessagesByUserIdAsync(
            BatchReadMessagesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new BatchReadMessagesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Read messages by User ID
     *
     * @param BatchReadMessagesByUserIdRequest $request
     * @return BatchReadMessagesByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#batchreadmessagesbyuserid
     */
    public function batchReadMessagesByUserId (
            BatchReadMessagesByUserIdRequest $request
    ): BatchReadMessagesByUserIdResult {
        return $this->batchReadMessagesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete message
     *
     * @param DeleteMessageRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deletemessage
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
     * Delete message
     *
     * @param DeleteMessageRequest $request
     * @return DeleteMessageResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deletemessage
     */
    public function deleteMessage (
            DeleteMessageRequest $request
    ): DeleteMessageResult {
        return $this->deleteMessageAsync(
            $request
        )->wait();
    }

    /**
     * Delete message by User ID
     *
     * @param DeleteMessageByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deletemessagebyuserid
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
     * Delete message by User ID
     *
     * @param DeleteMessageByUserIdRequest $request
     * @return DeleteMessageByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deletemessagebyuserid
     */
    public function deleteMessageByUserId (
            DeleteMessageByUserIdRequest $request
    ): DeleteMessageByUserIdResult {
        return $this->deleteMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute sending a message as an acquire action
     *
     * @param SendByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/stamp_sheet/#gs2inboxsendmessagebyuserid
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
     * Execute sending a message as an acquire action
     *
     * @param SendByStampSheetRequest $request
     * @return SendByStampSheetResult
     * @see https://docs.gs2.io/api_reference/inbox/stamp_sheet/#gs2inboxsendmessagebyuserid
     */
    public function sendByStampSheet (
            SendByStampSheetRequest $request
    ): SendByStampSheetResult {
        return $this->sendByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute opening a message as a consume action
     *
     * @param OpenByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/stamp_sheet/#gs2inboxopenmessagebyuserid
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
     * Execute opening a message as a consume action
     *
     * @param OpenByStampTaskRequest $request
     * @return OpenByStampTaskResult
     * @see https://docs.gs2.io/api_reference/inbox/stamp_sheet/#gs2inboxopenmessagebyuserid
     */
    public function openByStampTask (
            OpenByStampTaskRequest $request
    ): OpenByStampTaskResult {
        return $this->openByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Execute deleting a Message as a consume action
     *
     * @param DeleteMessageByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/stamp_sheet/#gs2inboxdeletemessagebyuserid
     */
    public function deleteMessageByStampTaskAsync(
            DeleteMessageByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMessageByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute deleting a Message as a consume action
     *
     * @param DeleteMessageByStampTaskRequest $request
     * @return DeleteMessageByStampTaskResult
     * @see https://docs.gs2.io/api_reference/inbox/stamp_sheet/#gs2inboxdeletemessagebyuserid
     */
    public function deleteMessageByStampTask (
            DeleteMessageByStampTaskRequest $request
    ): DeleteMessageByStampTaskResult {
        return $this->deleteMessageByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Export Global Message Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#exportmaster
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
     * Export Global Message Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Global Message master data
     *
     * @param GetCurrentMessageMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getcurrentmessagemaster
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
     * Get currently active Global Message master data
     *
     * @param GetCurrentMessageMasterRequest $request
     * @return GetCurrentMessageMasterResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getcurrentmessagemaster
     */
    public function getCurrentMessageMaster (
            GetCurrentMessageMasterRequest $request
    ): GetCurrentMessageMasterResult {
        return $this->getCurrentMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Currently Active Master Data (3-phase version)
     *
     * @param PreUpdateCurrentMessageMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#preupdatecurrentmessagemaster
     */
    public function preUpdateCurrentMessageMasterAsync(
            PreUpdateCurrentMessageMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentMessageMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Currently Active Master Data (3-phase version)
     *
     * @param PreUpdateCurrentMessageMasterRequest $request
     * @return PreUpdateCurrentMessageMasterResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#preupdatecurrentmessagemaster
     */
    public function preUpdateCurrentMessageMaster (
            PreUpdateCurrentMessageMasterRequest $request
    ): PreUpdateCurrentMessageMasterResult {
        return $this->preUpdateCurrentMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Global Message master data
     *
     * @param UpdateCurrentMessageMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updatecurrentmessagemaster
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
     * Update currently active Global Message master data
     *
     * @param UpdateCurrentMessageMasterRequest $request
     * @return UpdateCurrentMessageMasterResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updatecurrentmessagemaster
     */
    public function updateCurrentMessageMaster (
            UpdateCurrentMessageMasterRequest $request
    ): UpdateCurrentMessageMasterResult {
        return $this->updateCurrentMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Global Message master data from GitHub
     *
     * @param UpdateCurrentMessageMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updatecurrentmessagemasterfromgithub
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
     * Update currently active Global Message master data from GitHub
     *
     * @param UpdateCurrentMessageMasterFromGitHubRequest $request
     * @return UpdateCurrentMessageMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updatecurrentmessagemasterfromgithub
     */
    public function updateCurrentMessageMasterFromGitHub (
            UpdateCurrentMessageMasterFromGitHubRequest $request
    ): UpdateCurrentMessageMasterFromGitHubResult {
        return $this->updateCurrentMessageMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * List messages to all users
     *
     * @param DescribeGlobalMessageMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describeglobalmessagemasters
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
     * List messages to all users
     *
     * @param DescribeGlobalMessageMastersRequest $request
     * @return DescribeGlobalMessageMastersResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describeglobalmessagemasters
     */
    public function describeGlobalMessageMasters (
            DescribeGlobalMessageMastersRequest $request
    ): DescribeGlobalMessageMastersResult {
        return $this->describeGlobalMessageMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Global Message Master
     *
     * @param CreateGlobalMessageMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#createglobalmessagemaster
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
     * Create Global Message Master
     *
     * @param CreateGlobalMessageMasterRequest $request
     * @return CreateGlobalMessageMasterResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#createglobalmessagemaster
     */
    public function createGlobalMessageMaster (
            CreateGlobalMessageMasterRequest $request
    ): CreateGlobalMessageMasterResult {
        return $this->createGlobalMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get a message for all users
     *
     * @param GetGlobalMessageMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getglobalmessagemaster
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
     * Get a message for all users
     *
     * @param GetGlobalMessageMasterRequest $request
     * @return GetGlobalMessageMasterResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getglobalmessagemaster
     */
    public function getGlobalMessageMaster (
            GetGlobalMessageMasterRequest $request
    ): GetGlobalMessageMasterResult {
        return $this->getGlobalMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update message to all users
     *
     * @param UpdateGlobalMessageMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updateglobalmessagemaster
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
     * Update message to all users
     *
     * @param UpdateGlobalMessageMasterRequest $request
     * @return UpdateGlobalMessageMasterResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updateglobalmessagemaster
     */
    public function updateGlobalMessageMaster (
            UpdateGlobalMessageMasterRequest $request
    ): UpdateGlobalMessageMasterResult {
        return $this->updateGlobalMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete messages for all users
     *
     * @param DeleteGlobalMessageMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deleteglobalmessagemaster
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
     * Delete messages for all users
     *
     * @param DeleteGlobalMessageMasterRequest $request
     * @return DeleteGlobalMessageMasterResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deleteglobalmessagemaster
     */
    public function deleteGlobalMessageMaster (
            DeleteGlobalMessageMasterRequest $request
    ): DeleteGlobalMessageMasterResult {
        return $this->deleteGlobalMessageMasterAsync(
            $request
        )->wait();
    }

    /**
     * List messages to all users
     *
     * @param DescribeGlobalMessagesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describeglobalmessages
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
     * List messages to all users
     *
     * @param DescribeGlobalMessagesRequest $request
     * @return DescribeGlobalMessagesResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#describeglobalmessages
     */
    public function describeGlobalMessages (
            DescribeGlobalMessagesRequest $request
    ): DescribeGlobalMessagesResult {
        return $this->describeGlobalMessagesAsync(
            $request
        )->wait();
    }

    /**
     * Get a message for all users
     *
     * @param GetGlobalMessageRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getglobalmessage
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
     * Get a message for all users
     *
     * @param GetGlobalMessageRequest $request
     * @return GetGlobalMessageResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getglobalmessage
     */
    public function getGlobalMessage (
            GetGlobalMessageRequest $request
    ): GetGlobalMessageResult {
        return $this->getGlobalMessageAsync(
            $request
        )->wait();
    }

    /**
     * Get Received Global Message by User ID
     *
     * @param GetReceivedByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getreceivedbyuserid
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
     * Get Received Global Message by User ID
     *
     * @param GetReceivedByUserIdRequest $request
     * @return GetReceivedByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#getreceivedbyuserid
     */
    public function getReceivedByUserId (
            GetReceivedByUserIdRequest $request
    ): GetReceivedByUserIdResult {
        return $this->getReceivedByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Update Received Global Message by User ID
     *
     * @param UpdateReceivedByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updatereceivedbyuserid
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
     * Update Received Global Message by User ID
     *
     * @param UpdateReceivedByUserIdRequest $request
     * @return UpdateReceivedByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#updatereceivedbyuserid
     */
    public function updateReceivedByUserId (
            UpdateReceivedByUserIdRequest $request
    ): UpdateReceivedByUserIdResult {
        return $this->updateReceivedByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Received Global Message by User ID
     *
     * @param DeleteReceivedByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deletereceivedbyuserid
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
     * Delete Received Global Message by User ID
     *
     * @param DeleteReceivedByUserIdRequest $request
     * @return DeleteReceivedByUserIdResult
     * @see https://docs.gs2.io/api_reference/inbox/sdk/#deletereceivedbyuserid
     */
    public function deleteReceivedByUserId (
            DeleteReceivedByUserIdRequest $request
    ): DeleteReceivedByUserIdResult {
        return $this->deleteReceivedByUserIdAsync(
            $request
        )->wait();
    }
}