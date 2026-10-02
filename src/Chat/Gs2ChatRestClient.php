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
use Gs2\Chat\Request\GetServiceVersionRequest;
use Gs2\Chat\Result\GetServiceVersionResult;
use Gs2\Chat\Request\DumpUserDataByUserIdRequest;
use Gs2\Chat\Result\DumpUserDataByUserIdResult;
use Gs2\Chat\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Chat\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Chat\Request\CleanUserDataByUserIdRequest;
use Gs2\Chat\Result\CleanUserDataByUserIdResult;
use Gs2\Chat\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Chat\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Chat\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Chat\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Chat\Request\ImportUserDataByUserIdRequest;
use Gs2\Chat\Result\ImportUserDataByUserIdResult;
use Gs2\Chat\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Chat\Result\CheckImportUserDataByUserIdResult;
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
use Gs2\Chat\Request\UpdateRoomFromBackendRequest;
use Gs2\Chat\Result\UpdateRoomFromBackendResult;
use Gs2\Chat\Request\DeleteRoomRequest;
use Gs2\Chat\Result\DeleteRoomResult;
use Gs2\Chat\Request\DeleteRoomFromBackendRequest;
use Gs2\Chat\Result\DeleteRoomFromBackendResult;
use Gs2\Chat\Request\DescribeMessagesRequest;
use Gs2\Chat\Result\DescribeMessagesResult;
use Gs2\Chat\Request\DescribeMessagesByUserIdRequest;
use Gs2\Chat\Result\DescribeMessagesByUserIdResult;
use Gs2\Chat\Request\DescribeLatestMessagesRequest;
use Gs2\Chat\Result\DescribeLatestMessagesResult;
use Gs2\Chat\Request\DescribeLatestMessagesByUserIdRequest;
use Gs2\Chat\Result\DescribeLatestMessagesByUserIdResult;
use Gs2\Chat\Request\PostRequest;
use Gs2\Chat\Result\PostResult;
use Gs2\Chat\Request\PostByUserIdRequest;
use Gs2\Chat\Result\PostByUserIdResult;
use Gs2\Chat\Request\GetMessageRequest;
use Gs2\Chat\Result\GetMessageResult;
use Gs2\Chat\Request\GetMessageByUserIdRequest;
use Gs2\Chat\Result\GetMessageByUserIdResult;
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
use Gs2\Chat\Request\DescribeCategoryModelsRequest;
use Gs2\Chat\Result\DescribeCategoryModelsResult;
use Gs2\Chat\Request\GetCategoryModelRequest;
use Gs2\Chat\Result\GetCategoryModelResult;
use Gs2\Chat\Request\DescribeCategoryModelMastersRequest;
use Gs2\Chat\Result\DescribeCategoryModelMastersResult;
use Gs2\Chat\Request\CreateCategoryModelMasterRequest;
use Gs2\Chat\Result\CreateCategoryModelMasterResult;
use Gs2\Chat\Request\GetCategoryModelMasterRequest;
use Gs2\Chat\Result\GetCategoryModelMasterResult;
use Gs2\Chat\Request\UpdateCategoryModelMasterRequest;
use Gs2\Chat\Result\UpdateCategoryModelMasterResult;
use Gs2\Chat\Request\DeleteCategoryModelMasterRequest;
use Gs2\Chat\Result\DeleteCategoryModelMasterResult;
use Gs2\Chat\Request\ExportMasterRequest;
use Gs2\Chat\Result\ExportMasterResult;
use Gs2\Chat\Request\GetCurrentModelMasterRequest;
use Gs2\Chat\Result\GetCurrentModelMasterResult;
use Gs2\Chat\Request\PreUpdateCurrentModelMasterRequest;
use Gs2\Chat\Result\PreUpdateCurrentModelMasterResult;
use Gs2\Chat\Request\UpdateCurrentModelMasterRequest;
use Gs2\Chat\Result\UpdateCurrentModelMasterResult;
use Gs2\Chat\Request\UpdateCurrentModelMasterFromGitHubRequest;
use Gs2\Chat\Result\UpdateCurrentModelMasterFromGitHubResult;

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
        }
        if ($this->request->getAllowCreateRoom() !== null) {
            $json["allowCreateRoom"] = $this->request->getAllowCreateRoom();
        }
        if ($this->request->getMessageLifeTimeDays() !== null) {
            $json["messageLifeTimeDays"] = $this->request->getMessageLifeTimeDays();
        }
        if ($this->request->getPostMessageScript() !== null) {
            $json["postMessageScript"] = $this->request->getPostMessageScript()->toJson();
        }
        if ($this->request->getCreateRoomScript() !== null) {
            $json["createRoomScript"] = $this->request->getCreateRoomScript()->toJson();
        }
        if ($this->request->getDeleteRoomScript() !== null) {
            $json["deleteRoomScript"] = $this->request->getDeleteRoomScript()->toJson();
        }
        if ($this->request->getSubscribeRoomScript() !== null) {
            $json["subscribeRoomScript"] = $this->request->getSubscribeRoomScript()->toJson();
        }
        if ($this->request->getUnsubscribeRoomScript() !== null) {
            $json["unsubscribeRoomScript"] = $this->request->getUnsubscribeRoomScript()->toJson();
        }
        if ($this->request->getPostNotification() !== null) {
            $json["postNotification"] = $this->request->getPostNotification()->toJson();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
        }
        if ($this->request->getAllowCreateRoom() !== null) {
            $json["allowCreateRoom"] = $this->request->getAllowCreateRoom();
        }
        if ($this->request->getMessageLifeTimeDays() !== null) {
            $json["messageLifeTimeDays"] = $this->request->getMessageLifeTimeDays();
        }
        if ($this->request->getPostMessageScript() !== null) {
            $json["postMessageScript"] = $this->request->getPostMessageScript()->toJson();
        }
        if ($this->request->getCreateRoomScript() !== null) {
            $json["createRoomScript"] = $this->request->getCreateRoomScript()->toJson();
        }
        if ($this->request->getDeleteRoomScript() !== null) {
            $json["deleteRoomScript"] = $this->request->getDeleteRoomScript()->toJson();
        }
        if ($this->request->getSubscribeRoomScript() !== null) {
            $json["subscribeRoomScript"] = $this->request->getSubscribeRoomScript()->toJson();
        }
        if ($this->request->getUnsubscribeRoomScript() !== null) {
            $json["unsubscribeRoomScript"] = $this->request->getUnsubscribeRoomScript()->toJson();
        }
        if ($this->request->getPostNotification() !== null) {
            $json["postNotification"] = $this->request->getPostNotification()->toJson();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room";

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/user";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
        }
        if ($this->request->getWhiteListUserIds() !== null) {
            $array = [];
            foreach ($this->request->getWhiteListUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListUserIds"] = $array;
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
        }
        if ($this->request->getWhiteListUserIds() !== null) {
            $array = [];
            foreach ($this->request->getWhiteListUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListUserIds"] = $array;
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/user";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
        }
        if ($this->request->getWhiteListUserIds() !== null) {
            $array = [];
            foreach ($this->request->getWhiteListUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListUserIds"] = $array;
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class UpdateRoomFromBackendTask extends Gs2RestSessionTask {

    /**
     * @var UpdateRoomFromBackendRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateRoomFromBackendTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateRoomFromBackendRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateRoomFromBackendRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateRoomFromBackendResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
        }
        if ($this->request->getWhiteListUserIds() !== null) {
            $array = [];
            foreach ($this->request->getWhiteListUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListUserIds"] = $array;
        }
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/user";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/message";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPassword() !== null) {
            $queryStrings["password"] = $this->request->getPassword();
        }
        if ($this->request->getCategory() !== null) {
            $queryStrings["category"] = $this->request->getCategory();
        }
        if ($this->request->getStartAt() !== null) {
            $queryStrings["startAt"] = $this->request->getStartAt();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/message/get";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPassword() !== null) {
            $queryStrings["password"] = $this->request->getPassword();
        }
        if ($this->request->getCategory() !== null) {
            $queryStrings["category"] = $this->request->getCategory();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
        }
        if ($this->request->getStartAt() !== null) {
            $queryStrings["startAt"] = $this->request->getStartAt();
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

class DescribeLatestMessagesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLatestMessagesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLatestMessagesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLatestMessagesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLatestMessagesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLatestMessagesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/message/latest";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPassword() !== null) {
            $queryStrings["password"] = $this->request->getPassword();
        }
        if ($this->request->getCategory() !== null) {
            $queryStrings["category"] = $this->request->getCategory();
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

class DescribeLatestMessagesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLatestMessagesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLatestMessagesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLatestMessagesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLatestMessagesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLatestMessagesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/message/latest/get";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPassword() !== null) {
            $queryStrings["password"] = $this->request->getPassword();
        }
        if ($this->request->getCategory() !== null) {
            $queryStrings["category"] = $this->request->getCategory();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/message";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $json = [];
        if ($this->request->getCategory() !== null) {
            $json["category"] = $this->request->getCategory();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/message/user/{userId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCategory() !== null) {
            $json["category"] = $this->request->getCategory();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPassword() !== null) {
            $json["password"] = $this->request->getPassword();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/message/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPassword() !== null) {
            $queryStrings["password"] = $this->request->getPassword();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/message/{messageName}/get";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPassword() !== null) {
            $queryStrings["password"] = $this->request->getPassword();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/message/{messageName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{messageName}", $this->request->getMessageName() === null|| strlen($this->request->getMessageName()) == 0 ? "null" : $this->request->getMessageName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/room/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRoomNamePrefix() !== null) {
            $queryStrings["roomNamePrefix"] = $this->request->getRoomNamePrefix();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/room/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRoomNamePrefix() !== null) {
            $queryStrings["roomNamePrefix"] = $this->request->getRoomNamePrefix();
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $json = [];
        if ($this->request->getNotificationTypes() !== null) {
            $array = [];
            foreach ($this->request->getNotificationTypes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["notificationTypes"] = $array;
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getNotificationTypes() !== null) {
            $array = [];
            foreach ($this->request->getNotificationTypes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["notificationTypes"] = $array;
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/room/{roomName}/subscribe/notification";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

        $json = [];
        if ($this->request->getNotificationTypes() !== null) {
            $array = [];
            foreach ($this->request->getNotificationTypes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["notificationTypes"] = $array;
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/room/{roomName}/subscribe/notification";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getNotificationTypes() !== null) {
            $array = [];
            foreach ($this->request->getNotificationTypes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["notificationTypes"] = $array;
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/room/{roomName}/subscribe";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{roomName}", $this->request->getRoomName() === null|| strlen($this->request->getRoomName()) == 0 ? "null" : $this->request->getRoomName(), $url);
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

class DescribeCategoryModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCategoryModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCategoryModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCategoryModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCategoryModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCategoryModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetCategoryModelTask extends Gs2RestSessionTask {

    /**
     * @var GetCategoryModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCategoryModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetCategoryModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCategoryModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetCategoryModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{category}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{category}", $this->request->getCategory() === null ? "null" : $this->request->getCategory(), $url);

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

class DescribeCategoryModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCategoryModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCategoryModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCategoryModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCategoryModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCategoryModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCategory() !== null) {
            $json["category"] = $this->request->getCategory();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getRejectAccessTokenPost() !== null) {
            $json["rejectAccessTokenPost"] = $this->request->getRejectAccessTokenPost();
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

class GetCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{category}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{category}", $this->request->getCategory() === null ? "null" : $this->request->getCategory(), $url);

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

class UpdateCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{category}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{category}", $this->request->getCategory() === null ? "null" : $this->request->getCategory(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getRejectAccessTokenPost() !== null) {
            $json["rejectAccessTokenPost"] = $this->request->getRejectAccessTokenPost();
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

class DeleteCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{category}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{category}", $this->request->getCategory() === null ? "null" : $this->request->getCategory(), $url);

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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentModelMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentModelMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentModelMasterResult $res */
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

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentModelMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentModelMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentModelMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentModelMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentModelMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "chat", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2-Chat API client
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/
 */
class Gs2ChatRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deletenamespace
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {
        return $this->deleteNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * Get microservice version
     *
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getserviceversion
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
     * Get microservice version
     *
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Rooms
     *
     * @param DescribeRoomsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describerooms
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
     * List Rooms
     *
     * @param DescribeRoomsRequest $request
     * @return DescribeRoomsResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describerooms
     */
    public function describeRooms (
            DescribeRoomsRequest $request
    ): DescribeRoomsResult {
        return $this->describeRoomsAsync(
            $request
        )->wait();
    }

    /**
     * Create Room
     *
     * @param CreateRoomRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#createroom
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
     * Create Room
     *
     * @param CreateRoomRequest $request
     * @return CreateRoomResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#createroom
     */
    public function createRoom (
            CreateRoomRequest $request
    ): CreateRoomResult {
        return $this->createRoomAsync(
            $request
        )->wait();
    }

    /**
     * Create Room from Backend
     *
     * @param CreateRoomFromBackendRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#createroomfrombackend
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
     * Create Room from Backend
     *
     * @param CreateRoomFromBackendRequest $request
     * @return CreateRoomFromBackendResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#createroomfrombackend
     */
    public function createRoomFromBackend (
            CreateRoomFromBackendRequest $request
    ): CreateRoomFromBackendResult {
        return $this->createRoomFromBackendAsync(
            $request
        )->wait();
    }

    /**
     * Get Room Information
     *
     * @param GetRoomRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getroom
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
     * Get Room Information
     *
     * @param GetRoomRequest $request
     * @return GetRoomResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getroom
     */
    public function getRoom (
            GetRoomRequest $request
    ): GetRoomResult {
        return $this->getRoomAsync(
            $request
        )->wait();
    }

    /**
     * Update Room
     *
     * @param UpdateRoomRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updateroom
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
     * Update Room
     *
     * @param UpdateRoomRequest $request
     * @return UpdateRoomResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updateroom
     */
    public function updateRoom (
            UpdateRoomRequest $request
    ): UpdateRoomResult {
        return $this->updateRoomAsync(
            $request
        )->wait();
    }

    /**
     * Update Room from Backend
     *
     * @param UpdateRoomFromBackendRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updateroomfrombackend
     */
    public function updateRoomFromBackendAsync(
            UpdateRoomFromBackendRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateRoomFromBackendTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Room from Backend
     *
     * @param UpdateRoomFromBackendRequest $request
     * @return UpdateRoomFromBackendResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updateroomfrombackend
     */
    public function updateRoomFromBackend (
            UpdateRoomFromBackendRequest $request
    ): UpdateRoomFromBackendResult {
        return $this->updateRoomFromBackendAsync(
            $request
        )->wait();
    }

    /**
     * Delete Room
     *
     * @param DeleteRoomRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deleteroom
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
     * Delete Room
     *
     * @param DeleteRoomRequest $request
     * @return DeleteRoomResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deleteroom
     */
    public function deleteRoom (
            DeleteRoomRequest $request
    ): DeleteRoomResult {
        return $this->deleteRoomAsync(
            $request
        )->wait();
    }

    /**
     * Delete Room from Backend
     *
     * @param DeleteRoomFromBackendRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deleteroomfrombackend
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
     * Delete Room from Backend
     *
     * @param DeleteRoomFromBackendRequest $request
     * @return DeleteRoomFromBackendResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deleteroomfrombackend
     */
    public function deleteRoomFromBackend (
            DeleteRoomFromBackendRequest $request
    ): DeleteRoomFromBackendResult {
        return $this->deleteRoomFromBackendAsync(
            $request
        )->wait();
    }

    /**
     * List Messages
     *
     * @param DescribeMessagesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describemessages
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
     * List Messages
     *
     * @param DescribeMessagesRequest $request
     * @return DescribeMessagesResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describemessages
     */
    public function describeMessages (
            DescribeMessagesRequest $request
    ): DescribeMessagesResult {
        return $this->describeMessagesAsync(
            $request
        )->wait();
    }

    /**
     * List Messages by User ID
     *
     * @param DescribeMessagesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describemessagesbyuserid
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
     * List Messages by User ID
     *
     * @param DescribeMessagesByUserIdRequest $request
     * @return DescribeMessagesByUserIdResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describemessagesbyuserid
     */
    public function describeMessagesByUserId (
            DescribeMessagesByUserIdRequest $request
    ): DescribeMessagesByUserIdResult {
        return $this->describeMessagesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List latest Messages
     *
     * @param DescribeLatestMessagesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describelatestmessages
     */
    public function describeLatestMessagesAsync(
            DescribeLatestMessagesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLatestMessagesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List latest Messages
     *
     * @param DescribeLatestMessagesRequest $request
     * @return DescribeLatestMessagesResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describelatestmessages
     */
    public function describeLatestMessages (
            DescribeLatestMessagesRequest $request
    ): DescribeLatestMessagesResult {
        return $this->describeLatestMessagesAsync(
            $request
        )->wait();
    }

    /**
     * List latest Messages by User ID
     *
     * @param DescribeLatestMessagesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describelatestmessagesbyuserid
     */
    public function describeLatestMessagesByUserIdAsync(
            DescribeLatestMessagesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLatestMessagesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List latest Messages by User ID
     *
     * @param DescribeLatestMessagesByUserIdRequest $request
     * @return DescribeLatestMessagesByUserIdResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describelatestmessagesbyuserid
     */
    public function describeLatestMessagesByUserId (
            DescribeLatestMessagesByUserIdRequest $request
    ): DescribeLatestMessagesByUserIdResult {
        return $this->describeLatestMessagesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Post a message
     *
     * @param PostRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#post
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
     * Post a message
     *
     * @param PostRequest $request
     * @return PostResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#post
     */
    public function post (
            PostRequest $request
    ): PostResult {
        return $this->postAsync(
            $request
        )->wait();
    }

    /**
     * Post Message by User ID
     *
     * @param PostByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#postbyuserid
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
     * Post Message by User ID
     *
     * @param PostByUserIdRequest $request
     * @return PostByUserIdResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#postbyuserid
     */
    public function postByUserId (
            PostByUserIdRequest $request
    ): PostByUserIdResult {
        return $this->postByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Message
     *
     * @param GetMessageRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getmessage
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getmessage
     */
    public function getMessage (
            GetMessageRequest $request
    ): GetMessageResult {
        return $this->getMessageAsync(
            $request
        )->wait();
    }

    /**
     * Get Message by User ID
     *
     * @param GetMessageByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getmessagebyuserid
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
     * Get Message by User ID
     *
     * @param GetMessageByUserIdRequest $request
     * @return GetMessageByUserIdResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getmessagebyuserid
     */
    public function getMessageByUserId (
            GetMessageByUserIdRequest $request
    ): GetMessageByUserIdResult {
        return $this->getMessageByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete message
     *
     * @param DeleteMessageRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deletemessage
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
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deletemessage
     */
    public function deleteMessage (
            DeleteMessageRequest $request
    ): DeleteMessageResult {
        return $this->deleteMessageAsync(
            $request
        )->wait();
    }

    /**
     * List Room Subscriptions
     *
     * @param DescribeSubscribesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describesubscribes
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
     * List Room Subscriptions
     *
     * @param DescribeSubscribesRequest $request
     * @return DescribeSubscribesResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describesubscribes
     */
    public function describeSubscribes (
            DescribeSubscribesRequest $request
    ): DescribeSubscribesResult {
        return $this->describeSubscribesAsync(
            $request
        )->wait();
    }

    /**
     * List Room Subscriptions by User ID
     *
     * @param DescribeSubscribesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describesubscribesbyuserid
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
     * List Room Subscriptions by User ID
     *
     * @param DescribeSubscribesByUserIdRequest $request
     * @return DescribeSubscribesByUserIdResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describesubscribesbyuserid
     */
    public function describeSubscribesByUserId (
            DescribeSubscribesByUserIdRequest $request
    ): DescribeSubscribesByUserIdResult {
        return $this->describeSubscribesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List users subscribed to a room by specifying Room name
     *
     * @param DescribeSubscribesByRoomNameRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describesubscribesbyroomname
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
     * List users subscribed to a room by specifying Room name
     *
     * @param DescribeSubscribesByRoomNameRequest $request
     * @return DescribeSubscribesByRoomNameResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describesubscribesbyroomname
     */
    public function describeSubscribesByRoomName (
            DescribeSubscribesByRoomNameRequest $request
    ): DescribeSubscribesByRoomNameResult {
        return $this->describeSubscribesByRoomNameAsync(
            $request
        )->wait();
    }

    /**
     * Subscribe to a room
     *
     * @param SubscribeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#subscribe-1
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
     * Subscribe to a room
     *
     * @param SubscribeRequest $request
     * @return SubscribeResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#subscribe-1
     */
    public function subscribe (
            SubscribeRequest $request
    ): SubscribeResult {
        return $this->subscribeAsync(
            $request
        )->wait();
    }

    /**
     * Subscribe to a room by User ID
     *
     * @param SubscribeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#subscribebyuserid
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
     * Subscribe to a room by User ID
     *
     * @param SubscribeByUserIdRequest $request
     * @return SubscribeByUserIdResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#subscribebyuserid
     */
    public function subscribeByUserId (
            SubscribeByUserIdRequest $request
    ): SubscribeByUserIdResult {
        return $this->subscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Room Subscription
     *
     * @param GetSubscribeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getsubscribe
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
     * Get Room Subscription
     *
     * @param GetSubscribeRequest $request
     * @return GetSubscribeResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getsubscribe
     */
    public function getSubscribe (
            GetSubscribeRequest $request
    ): GetSubscribeResult {
        return $this->getSubscribeAsync(
            $request
        )->wait();
    }

    /**
     * Get Room Subscription by User ID
     *
     * @param GetSubscribeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getsubscribebyuserid
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
     * Get Room Subscription by User ID
     *
     * @param GetSubscribeByUserIdRequest $request
     * @return GetSubscribeByUserIdResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getsubscribebyuserid
     */
    public function getSubscribeByUserId (
            GetSubscribeByUserIdRequest $request
    ): GetSubscribeByUserIdResult {
        return $this->getSubscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Update notification methods
     *
     * @param UpdateNotificationTypeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatenotificationtype
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
     * Update notification methods
     *
     * @param UpdateNotificationTypeRequest $request
     * @return UpdateNotificationTypeResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatenotificationtype
     */
    public function updateNotificationType (
            UpdateNotificationTypeRequest $request
    ): UpdateNotificationTypeResult {
        return $this->updateNotificationTypeAsync(
            $request
        )->wait();
    }

    /**
     * Update notification methods by User ID
     *
     * @param UpdateNotificationTypeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatenotificationtypebyuserid
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
     * Update notification methods by User ID
     *
     * @param UpdateNotificationTypeByUserIdRequest $request
     * @return UpdateNotificationTypeByUserIdResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatenotificationtypebyuserid
     */
    public function updateNotificationTypeByUserId (
            UpdateNotificationTypeByUserIdRequest $request
    ): UpdateNotificationTypeByUserIdResult {
        return $this->updateNotificationTypeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Unsubscribe from a room
     *
     * @param UnsubscribeRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#unsubscribe
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
     * Unsubscribe from a room
     *
     * @param UnsubscribeRequest $request
     * @return UnsubscribeResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#unsubscribe
     */
    public function unsubscribe (
            UnsubscribeRequest $request
    ): UnsubscribeResult {
        return $this->unsubscribeAsync(
            $request
        )->wait();
    }

    /**
     * Unsubscribe from a subscription by User ID
     *
     * @param UnsubscribeByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#unsubscribebyuserid
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
     * Unsubscribe from a subscription by User ID
     *
     * @param UnsubscribeByUserIdRequest $request
     * @return UnsubscribeByUserIdResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#unsubscribebyuserid
     */
    public function unsubscribeByUserId (
            UnsubscribeByUserIdRequest $request
    ): UnsubscribeByUserIdResult {
        return $this->unsubscribeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Message Category Models
     *
     * @param DescribeCategoryModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describecategorymodels
     */
    public function describeCategoryModelsAsync(
            DescribeCategoryModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCategoryModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Message Category Models
     *
     * @param DescribeCategoryModelsRequest $request
     * @return DescribeCategoryModelsResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describecategorymodels
     */
    public function describeCategoryModels (
            DescribeCategoryModelsRequest $request
    ): DescribeCategoryModelsResult {
        return $this->describeCategoryModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Message Category Model
     *
     * @param GetCategoryModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getcategorymodel
     */
    public function getCategoryModelAsync(
            GetCategoryModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCategoryModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Message Category Model
     *
     * @param GetCategoryModelRequest $request
     * @return GetCategoryModelResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getcategorymodel
     */
    public function getCategoryModel (
            GetCategoryModelRequest $request
    ): GetCategoryModelResult {
        return $this->getCategoryModelAsync(
            $request
        )->wait();
    }

    /**
     * List Message Category Model Masters
     *
     * @param DescribeCategoryModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describecategorymodelmasters
     */
    public function describeCategoryModelMastersAsync(
            DescribeCategoryModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCategoryModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Message Category Model Masters
     *
     * @param DescribeCategoryModelMastersRequest $request
     * @return DescribeCategoryModelMastersResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#describecategorymodelmasters
     */
    public function describeCategoryModelMasters (
            DescribeCategoryModelMastersRequest $request
    ): DescribeCategoryModelMastersResult {
        return $this->describeCategoryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Message Category Model Master
     *
     * @param CreateCategoryModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#createcategorymodelmaster
     */
    public function createCategoryModelMasterAsync(
            CreateCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Message Category Model Master
     *
     * @param CreateCategoryModelMasterRequest $request
     * @return CreateCategoryModelMasterResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#createcategorymodelmaster
     */
    public function createCategoryModelMaster (
            CreateCategoryModelMasterRequest $request
    ): CreateCategoryModelMasterResult {
        return $this->createCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Message Category Model Master
     *
     * @param GetCategoryModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getcategorymodelmaster
     */
    public function getCategoryModelMasterAsync(
            GetCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Message Category Model Master
     *
     * @param GetCategoryModelMasterRequest $request
     * @return GetCategoryModelMasterResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getcategorymodelmaster
     */
    public function getCategoryModelMaster (
            GetCategoryModelMasterRequest $request
    ): GetCategoryModelMasterResult {
        return $this->getCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Message Category Model Master
     *
     * @param UpdateCategoryModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatecategorymodelmaster
     */
    public function updateCategoryModelMasterAsync(
            UpdateCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Message Category Model Master
     *
     * @param UpdateCategoryModelMasterRequest $request
     * @return UpdateCategoryModelMasterResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatecategorymodelmaster
     */
    public function updateCategoryModelMaster (
            UpdateCategoryModelMasterRequest $request
    ): UpdateCategoryModelMasterResult {
        return $this->updateCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Message Category Model Master
     *
     * @param DeleteCategoryModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deletecategorymodelmaster
     */
    public function deleteCategoryModelMasterAsync(
            DeleteCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Message Category Model Master
     *
     * @param DeleteCategoryModelMasterRequest $request
     * @return DeleteCategoryModelMasterResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#deletecategorymodelmaster
     */
    public function deleteCategoryModelMaster (
            DeleteCategoryModelMasterRequest $request
    ): DeleteCategoryModelMasterResult {
        return $this->deleteCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Export Message Category Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#exportmaster
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
     * Export Message Category Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Message Category Model master data
     *
     * @param GetCurrentModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getcurrentmodelmaster
     */
    public function getCurrentModelMasterAsync(
            GetCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get currently active Message Category Model master data
     *
     * @param GetCurrentModelMasterRequest $request
     * @return GetCurrentModelMasterResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#getcurrentmodelmaster
     */
    public function getCurrentModelMaster (
            GetCurrentModelMasterRequest $request
    ): GetCurrentModelMasterResult {
        return $this->getCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Message Category Model master data (3-phase version)
     *
     * @param PreUpdateCurrentModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#preupdatecurrentmodelmaster
     */
    public function preUpdateCurrentModelMasterAsync(
            PreUpdateCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Message Category Model master data (3-phase version)
     *
     * @param PreUpdateCurrentModelMasterRequest $request
     * @return PreUpdateCurrentModelMasterResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#preupdatecurrentmodelmaster
     */
    public function preUpdateCurrentModelMaster (
            PreUpdateCurrentModelMasterRequest $request
    ): PreUpdateCurrentModelMasterResult {
        return $this->preUpdateCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Message Category Model master data
     *
     * @param UpdateCurrentModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatecurrentmodelmaster
     */
    public function updateCurrentModelMasterAsync(
            UpdateCurrentModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Message Category Model master data
     *
     * @param UpdateCurrentModelMasterRequest $request
     * @return UpdateCurrentModelMasterResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatecurrentmodelmaster
     */
    public function updateCurrentModelMaster (
            UpdateCurrentModelMasterRequest $request
    ): UpdateCurrentModelMasterResult {
        return $this->updateCurrentModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Message Category Model master data from GitHub
     *
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatecurrentmodelmasterfromgithub
     */
    public function updateCurrentModelMasterFromGitHubAsync(
            UpdateCurrentModelMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentModelMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Message Category Model master data from GitHub
     *
     * @param UpdateCurrentModelMasterFromGitHubRequest $request
     * @return UpdateCurrentModelMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/chat/sdk/#updatecurrentmodelmasterfromgithub
     */
    public function updateCurrentModelMasterFromGitHub (
            UpdateCurrentModelMasterFromGitHubRequest $request
    ): UpdateCurrentModelMasterFromGitHubResult {
        return $this->updateCurrentModelMasterFromGitHubAsync(
            $request
        )->wait();
    }
}