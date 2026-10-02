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

namespace Gs2\Quest;

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


use Gs2\Quest\Request\DescribeNamespacesRequest;
use Gs2\Quest\Result\DescribeNamespacesResult;
use Gs2\Quest\Request\CreateNamespaceRequest;
use Gs2\Quest\Result\CreateNamespaceResult;
use Gs2\Quest\Request\GetNamespaceStatusRequest;
use Gs2\Quest\Result\GetNamespaceStatusResult;
use Gs2\Quest\Request\GetNamespaceRequest;
use Gs2\Quest\Result\GetNamespaceResult;
use Gs2\Quest\Request\UpdateNamespaceRequest;
use Gs2\Quest\Result\UpdateNamespaceResult;
use Gs2\Quest\Request\DeleteNamespaceRequest;
use Gs2\Quest\Result\DeleteNamespaceResult;
use Gs2\Quest\Request\GetServiceVersionRequest;
use Gs2\Quest\Result\GetServiceVersionResult;
use Gs2\Quest\Request\DumpUserDataByUserIdRequest;
use Gs2\Quest\Result\DumpUserDataByUserIdResult;
use Gs2\Quest\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Quest\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Quest\Request\CleanUserDataByUserIdRequest;
use Gs2\Quest\Result\CleanUserDataByUserIdResult;
use Gs2\Quest\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Quest\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Quest\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Quest\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Quest\Request\ImportUserDataByUserIdRequest;
use Gs2\Quest\Result\ImportUserDataByUserIdResult;
use Gs2\Quest\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Quest\Result\CheckImportUserDataByUserIdResult;
use Gs2\Quest\Request\DescribeQuestGroupModelMastersRequest;
use Gs2\Quest\Result\DescribeQuestGroupModelMastersResult;
use Gs2\Quest\Request\CreateQuestGroupModelMasterRequest;
use Gs2\Quest\Result\CreateQuestGroupModelMasterResult;
use Gs2\Quest\Request\GetQuestGroupModelMasterRequest;
use Gs2\Quest\Result\GetQuestGroupModelMasterResult;
use Gs2\Quest\Request\UpdateQuestGroupModelMasterRequest;
use Gs2\Quest\Result\UpdateQuestGroupModelMasterResult;
use Gs2\Quest\Request\DeleteQuestGroupModelMasterRequest;
use Gs2\Quest\Result\DeleteQuestGroupModelMasterResult;
use Gs2\Quest\Request\DescribeQuestModelMastersRequest;
use Gs2\Quest\Result\DescribeQuestModelMastersResult;
use Gs2\Quest\Request\CreateQuestModelMasterRequest;
use Gs2\Quest\Result\CreateQuestModelMasterResult;
use Gs2\Quest\Request\GetQuestModelMasterRequest;
use Gs2\Quest\Result\GetQuestModelMasterResult;
use Gs2\Quest\Request\UpdateQuestModelMasterRequest;
use Gs2\Quest\Result\UpdateQuestModelMasterResult;
use Gs2\Quest\Request\DeleteQuestModelMasterRequest;
use Gs2\Quest\Result\DeleteQuestModelMasterResult;
use Gs2\Quest\Request\ExportMasterRequest;
use Gs2\Quest\Result\ExportMasterResult;
use Gs2\Quest\Request\GetCurrentQuestMasterRequest;
use Gs2\Quest\Result\GetCurrentQuestMasterResult;
use Gs2\Quest\Request\PreUpdateCurrentQuestMasterRequest;
use Gs2\Quest\Result\PreUpdateCurrentQuestMasterResult;
use Gs2\Quest\Request\UpdateCurrentQuestMasterRequest;
use Gs2\Quest\Result\UpdateCurrentQuestMasterResult;
use Gs2\Quest\Request\UpdateCurrentQuestMasterFromGitHubRequest;
use Gs2\Quest\Result\UpdateCurrentQuestMasterFromGitHubResult;
use Gs2\Quest\Request\DescribeProgressesByUserIdRequest;
use Gs2\Quest\Result\DescribeProgressesByUserIdResult;
use Gs2\Quest\Request\CreateProgressByUserIdRequest;
use Gs2\Quest\Result\CreateProgressByUserIdResult;
use Gs2\Quest\Request\GetProgressRequest;
use Gs2\Quest\Result\GetProgressResult;
use Gs2\Quest\Request\GetProgressByUserIdRequest;
use Gs2\Quest\Result\GetProgressByUserIdResult;
use Gs2\Quest\Request\StartRequest;
use Gs2\Quest\Result\StartResult;
use Gs2\Quest\Request\StartByUserIdRequest;
use Gs2\Quest\Result\StartByUserIdResult;
use Gs2\Quest\Request\EndRequest;
use Gs2\Quest\Result\EndResult;
use Gs2\Quest\Request\EndByUserIdRequest;
use Gs2\Quest\Result\EndByUserIdResult;
use Gs2\Quest\Request\DeleteProgressRequest;
use Gs2\Quest\Result\DeleteProgressResult;
use Gs2\Quest\Request\DeleteProgressByUserIdRequest;
use Gs2\Quest\Result\DeleteProgressByUserIdResult;
use Gs2\Quest\Request\CreateProgressByStampSheetRequest;
use Gs2\Quest\Result\CreateProgressByStampSheetResult;
use Gs2\Quest\Request\DeleteProgressByStampTaskRequest;
use Gs2\Quest\Result\DeleteProgressByStampTaskResult;
use Gs2\Quest\Request\DescribeCompletedQuestListsRequest;
use Gs2\Quest\Result\DescribeCompletedQuestListsResult;
use Gs2\Quest\Request\DescribeCompletedQuestListsByUserIdRequest;
use Gs2\Quest\Result\DescribeCompletedQuestListsByUserIdResult;
use Gs2\Quest\Request\GetCompletedQuestListRequest;
use Gs2\Quest\Result\GetCompletedQuestListResult;
use Gs2\Quest\Request\GetCompletedQuestListByUserIdRequest;
use Gs2\Quest\Result\GetCompletedQuestListByUserIdResult;
use Gs2\Quest\Request\DeleteCompletedQuestListByUserIdRequest;
use Gs2\Quest\Result\DeleteCompletedQuestListByUserIdResult;
use Gs2\Quest\Request\DescribeQuestGroupModelsRequest;
use Gs2\Quest\Result\DescribeQuestGroupModelsResult;
use Gs2\Quest\Request\GetQuestGroupModelRequest;
use Gs2\Quest\Result\GetQuestGroupModelResult;
use Gs2\Quest\Request\DescribeQuestModelsRequest;
use Gs2\Quest\Result\DescribeQuestModelsResult;
use Gs2\Quest\Request\GetQuestModelRequest;
use Gs2\Quest\Result\GetQuestModelResult;

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getStartQuestScript() !== null) {
            $json["startQuestScript"] = $this->request->getStartQuestScript()->toJson();
        }
        if ($this->request->getCompleteQuestScript() !== null) {
            $json["completeQuestScript"] = $this->request->getCompleteQuestScript()->toJson();
        }
        if ($this->request->getFailedQuestScript() !== null) {
            $json["failedQuestScript"] = $this->request->getFailedQuestScript()->toJson();
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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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
        if ($this->request->getStartQuestScript() !== null) {
            $json["startQuestScript"] = $this->request->getStartQuestScript()->toJson();
        }
        if ($this->request->getCompleteQuestScript() !== null) {
            $json["completeQuestScript"] = $this->request->getCompleteQuestScript()->toJson();
        }
        if ($this->request->getFailedQuestScript() !== null) {
            $json["failedQuestScript"] = $this->request->getFailedQuestScript()->toJson();
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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeQuestGroupModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeQuestGroupModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeQuestGroupModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeQuestGroupModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeQuestGroupModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeQuestGroupModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group";

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

class CreateQuestGroupModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateQuestGroupModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateQuestGroupModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateQuestGroupModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateQuestGroupModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateQuestGroupModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group";

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

class GetQuestGroupModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetQuestGroupModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetQuestGroupModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetQuestGroupModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetQuestGroupModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetQuestGroupModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{questGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

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

class UpdateQuestGroupModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateQuestGroupModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateQuestGroupModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateQuestGroupModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateQuestGroupModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateQuestGroupModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{questGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class DeleteQuestGroupModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteQuestGroupModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteQuestGroupModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteQuestGroupModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteQuestGroupModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteQuestGroupModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{questGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

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

class DescribeQuestModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeQuestModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeQuestModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeQuestModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeQuestModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeQuestModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{questGroupName}/quest";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

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

class CreateQuestModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateQuestModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateQuestModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateQuestModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateQuestModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateQuestModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{questGroupName}/quest";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

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
        if ($this->request->getContents() !== null) {
            $array = [];
            foreach ($this->request->getContents() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["contents"] = $array;
        }
        if ($this->request->getChallengePeriodEventId() !== null) {
            $json["challengePeriodEventId"] = $this->request->getChallengePeriodEventId();
        }
        if ($this->request->getFirstCompleteAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getFirstCompleteAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["firstCompleteAcquireActions"] = $array;
        }
        if ($this->request->getVerifyActions() !== null) {
            $array = [];
            foreach ($this->request->getVerifyActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["verifyActions"] = $array;
        }
        if ($this->request->getConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
        }
        if ($this->request->getFailedAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getFailedAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["failedAcquireActions"] = $array;
        }
        if ($this->request->getPremiseQuestNames() !== null) {
            $array = [];
            foreach ($this->request->getPremiseQuestNames() as $item)
            {
                array_push($array, $item);
            }
            $json["premiseQuestNames"] = $array;
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

class GetQuestModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetQuestModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetQuestModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetQuestModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetQuestModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetQuestModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{questGroupName}/quest/{questName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);
        $url = str_replace("{questName}", $this->request->getQuestName() === null|| strlen($this->request->getQuestName()) == 0 ? "null" : $this->request->getQuestName(), $url);

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

class UpdateQuestModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateQuestModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateQuestModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateQuestModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateQuestModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateQuestModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{questGroupName}/quest/{questName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);
        $url = str_replace("{questName}", $this->request->getQuestName() === null|| strlen($this->request->getQuestName()) == 0 ? "null" : $this->request->getQuestName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getContents() !== null) {
            $array = [];
            foreach ($this->request->getContents() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["contents"] = $array;
        }
        if ($this->request->getChallengePeriodEventId() !== null) {
            $json["challengePeriodEventId"] = $this->request->getChallengePeriodEventId();
        }
        if ($this->request->getFirstCompleteAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getFirstCompleteAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["firstCompleteAcquireActions"] = $array;
        }
        if ($this->request->getVerifyActions() !== null) {
            $array = [];
            foreach ($this->request->getVerifyActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["verifyActions"] = $array;
        }
        if ($this->request->getConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
        }
        if ($this->request->getFailedAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getFailedAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["failedAcquireActions"] = $array;
        }
        if ($this->request->getPremiseQuestNames() !== null) {
            $array = [];
            foreach ($this->request->getPremiseQuestNames() as $item)
            {
                array_push($array, $item);
            }
            $json["premiseQuestNames"] = $array;
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

class DeleteQuestModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteQuestModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteQuestModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteQuestModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteQuestModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteQuestModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{questGroupName}/quest/{questName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);
        $url = str_replace("{questName}", $this->request->getQuestName() === null|| strlen($this->request->getQuestName()) == 0 ? "null" : $this->request->getQuestName(), $url);

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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentQuestMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentQuestMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentQuestMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentQuestMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentQuestMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentQuestMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentQuestMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentQuestMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentQuestMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentQuestMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentQuestMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentQuestMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentQuestMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentQuestMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentQuestMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentQuestMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentQuestMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentQuestMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentQuestMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentQuestMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentQuestMasterResult $res */
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

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentQuestMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentQuestMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentQuestMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentQuestMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentQuestMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentQuestMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeProgressesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeProgressesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeProgressesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeProgressesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeProgressesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeProgressesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/progress";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CreateProgressByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreateProgressByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateProgressByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreateProgressByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateProgressByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreateProgressByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getQuestModelId() !== null) {
            $json["questModelId"] = $this->request->getQuestModelId();
        }
        if ($this->request->getForce() !== null) {
            $json["force"] = $this->request->getForce();
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

class GetProgressTask extends Gs2RestSessionTask {

    /**
     * @var GetProgressRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetProgressTask constructor.
     * @param Gs2RestSession $session
     * @param GetProgressRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetProgressRequest $request
    ) {
        parent::__construct(
            $session,
            GetProgressResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/progress";

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

        return parent::executeImpl();
    }
}

class GetProgressByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetProgressByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetProgressByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetProgressByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetProgressByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetProgressByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress";

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

class StartTask extends Gs2RestSessionTask {

    /**
     * @var StartRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * StartTask constructor.
     * @param Gs2RestSession $session
     * @param StartRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        StartRequest $request
    ) {
        parent::__construct(
            $session,
            StartResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/progress/group/{questGroupName}/quest/{questName}/start";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);
        $url = str_replace("{questName}", $this->request->getQuestName() === null|| strlen($this->request->getQuestName()) == 0 ? "null" : $this->request->getQuestName(), $url);

        $json = [];
        if ($this->request->getForce() !== null) {
            $json["force"] = $this->request->getForce();
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

class StartByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var StartByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * StartByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param StartByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        StartByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            StartByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress/group/{questGroupName}/quest/{questName}/start";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);
        $url = str_replace("{questName}", $this->request->getQuestName() === null|| strlen($this->request->getQuestName()) == 0 ? "null" : $this->request->getQuestName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getForce() !== null) {
            $json["force"] = $this->request->getForce();
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

class EndTask extends Gs2RestSessionTask {

    /**
     * @var EndRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * EndTask constructor.
     * @param Gs2RestSession $session
     * @param EndRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        EndRequest $request
    ) {
        parent::__construct(
            $session,
            EndResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/progress/end";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getRewards() !== null) {
            $array = [];
            foreach ($this->request->getRewards() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["rewards"] = $array;
        }
        if ($this->request->getIsComplete() !== null) {
            $json["isComplete"] = $this->request->getIsComplete();
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

class EndByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var EndByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * EndByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param EndByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        EndByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            EndByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress/end";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getRewards() !== null) {
            $array = [];
            foreach ($this->request->getRewards() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["rewards"] = $array;
        }
        if ($this->request->getIsComplete() !== null) {
            $json["isComplete"] = $this->request->getIsComplete();
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

class DeleteProgressTask extends Gs2RestSessionTask {

    /**
     * @var DeleteProgressRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteProgressTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteProgressRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteProgressRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteProgressResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/progress";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteProgressByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteProgressByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteProgressByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteProgressByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteProgressByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteProgressByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress";

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

class CreateProgressByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var CreateProgressByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateProgressByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param CreateProgressByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateProgressByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            CreateProgressByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/progress/create";

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

class DeleteProgressByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var DeleteProgressByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteProgressByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteProgressByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteProgressByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteProgressByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/progress/delete";

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

class DescribeCompletedQuestListsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCompletedQuestListsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCompletedQuestListsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCompletedQuestListsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCompletedQuestListsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCompletedQuestListsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/completed";

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

class DescribeCompletedQuestListsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCompletedQuestListsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCompletedQuestListsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCompletedQuestListsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCompletedQuestListsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCompletedQuestListsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/completed";

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

class GetCompletedQuestListTask extends Gs2RestSessionTask {

    /**
     * @var GetCompletedQuestListRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCompletedQuestListTask constructor.
     * @param Gs2RestSession $session
     * @param GetCompletedQuestListRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCompletedQuestListRequest $request
    ) {
        parent::__construct(
            $session,
            GetCompletedQuestListResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/completed/group/{questGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

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

class GetCompletedQuestListByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetCompletedQuestListByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCompletedQuestListByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetCompletedQuestListByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCompletedQuestListByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetCompletedQuestListByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/completed/group/{questGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);
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

class DeleteCompletedQuestListByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCompletedQuestListByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCompletedQuestListByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCompletedQuestListByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCompletedQuestListByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCompletedQuestListByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/completed/group/{questGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);
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

class DescribeQuestGroupModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeQuestGroupModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeQuestGroupModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeQuestGroupModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeQuestGroupModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeQuestGroupModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/group";

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

class GetQuestGroupModelTask extends Gs2RestSessionTask {

    /**
     * @var GetQuestGroupModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetQuestGroupModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetQuestGroupModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetQuestGroupModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetQuestGroupModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/group/{questGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

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

class DescribeQuestModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeQuestModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeQuestModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeQuestModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeQuestModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeQuestModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/group/{questGroupName}/quest";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);

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

class GetQuestModelTask extends Gs2RestSessionTask {

    /**
     * @var GetQuestModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetQuestModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetQuestModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetQuestModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetQuestModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "quest", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/group/{questGroupName}/quest/{questName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{questGroupName}", $this->request->getQuestGroupName() === null|| strlen($this->request->getQuestGroupName()) == 0 ? "null" : $this->request->getQuestGroupName(), $url);
        $url = str_replace("{questName}", $this->request->getQuestName() === null|| strlen($this->request->getQuestName()) == 0 ? "null" : $this->request->getQuestName(), $url);

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

/**
 * GS2-Quest API client
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/
 */
class Gs2QuestRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#cleanuserdatabyuserid
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check if the clean of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#checkcleanuserdatabyuserid
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
     * Check if the clean of the data associated with the specified user ID is complete
     *
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/quest/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Quest Group Model Masters
     *
     * @param DescribeQuestGroupModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describequestgroupmodelmasters
     */
    public function describeQuestGroupModelMastersAsync(
            DescribeQuestGroupModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeQuestGroupModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Quest Group Model Masters
     *
     * @param DescribeQuestGroupModelMastersRequest $request
     * @return DescribeQuestGroupModelMastersResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describequestgroupmodelmasters
     */
    public function describeQuestGroupModelMasters (
            DescribeQuestGroupModelMastersRequest $request
    ): DescribeQuestGroupModelMastersResult {
        return $this->describeQuestGroupModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Quest Group Model Master
     *
     * @param CreateQuestGroupModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#createquestgroupmodelmaster
     */
    public function createQuestGroupModelMasterAsync(
            CreateQuestGroupModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateQuestGroupModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Quest Group Model Master
     *
     * @param CreateQuestGroupModelMasterRequest $request
     * @return CreateQuestGroupModelMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#createquestgroupmodelmaster
     */
    public function createQuestGroupModelMaster (
            CreateQuestGroupModelMasterRequest $request
    ): CreateQuestGroupModelMasterResult {
        return $this->createQuestGroupModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Quest Group Model Master
     *
     * @param GetQuestGroupModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getquestgroupmodelmaster
     */
    public function getQuestGroupModelMasterAsync(
            GetQuestGroupModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetQuestGroupModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Quest Group Model Master
     *
     * @param GetQuestGroupModelMasterRequest $request
     * @return GetQuestGroupModelMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getquestgroupmodelmaster
     */
    public function getQuestGroupModelMaster (
            GetQuestGroupModelMasterRequest $request
    ): GetQuestGroupModelMasterResult {
        return $this->getQuestGroupModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Quest Group Model Master
     *
     * @param UpdateQuestGroupModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatequestgroupmodelmaster
     */
    public function updateQuestGroupModelMasterAsync(
            UpdateQuestGroupModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateQuestGroupModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Quest Group Model Master
     *
     * @param UpdateQuestGroupModelMasterRequest $request
     * @return UpdateQuestGroupModelMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatequestgroupmodelmaster
     */
    public function updateQuestGroupModelMaster (
            UpdateQuestGroupModelMasterRequest $request
    ): UpdateQuestGroupModelMasterResult {
        return $this->updateQuestGroupModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Quest Group Model Master
     *
     * @param DeleteQuestGroupModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deletequestgroupmodelmaster
     */
    public function deleteQuestGroupModelMasterAsync(
            DeleteQuestGroupModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteQuestGroupModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Quest Group Model Master
     *
     * @param DeleteQuestGroupModelMasterRequest $request
     * @return DeleteQuestGroupModelMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deletequestgroupmodelmaster
     */
    public function deleteQuestGroupModelMaster (
            DeleteQuestGroupModelMasterRequest $request
    ): DeleteQuestGroupModelMasterResult {
        return $this->deleteQuestGroupModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * List Quest Model Masters
     *
     * @param DescribeQuestModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describequestmodelmasters
     */
    public function describeQuestModelMastersAsync(
            DescribeQuestModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeQuestModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Quest Model Masters
     *
     * @param DescribeQuestModelMastersRequest $request
     * @return DescribeQuestModelMastersResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describequestmodelmasters
     */
    public function describeQuestModelMasters (
            DescribeQuestModelMastersRequest $request
    ): DescribeQuestModelMastersResult {
        return $this->describeQuestModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Quest Model Master
     *
     * @param CreateQuestModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#createquestmodelmaster
     */
    public function createQuestModelMasterAsync(
            CreateQuestModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateQuestModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Quest Model Master
     *
     * @param CreateQuestModelMasterRequest $request
     * @return CreateQuestModelMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#createquestmodelmaster
     */
    public function createQuestModelMaster (
            CreateQuestModelMasterRequest $request
    ): CreateQuestModelMasterResult {
        return $this->createQuestModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Quest Model Master
     *
     * @param GetQuestModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getquestmodelmaster
     */
    public function getQuestModelMasterAsync(
            GetQuestModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetQuestModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Quest Model Master
     *
     * @param GetQuestModelMasterRequest $request
     * @return GetQuestModelMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getquestmodelmaster
     */
    public function getQuestModelMaster (
            GetQuestModelMasterRequest $request
    ): GetQuestModelMasterResult {
        return $this->getQuestModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Quest Model Master
     *
     * @param UpdateQuestModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatequestmodelmaster
     */
    public function updateQuestModelMasterAsync(
            UpdateQuestModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateQuestModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Quest Model Master
     *
     * @param UpdateQuestModelMasterRequest $request
     * @return UpdateQuestModelMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatequestmodelmaster
     */
    public function updateQuestModelMaster (
            UpdateQuestModelMasterRequest $request
    ): UpdateQuestModelMasterResult {
        return $this->updateQuestModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Quest Model master
     *
     * @param DeleteQuestModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deletequestmodelmaster
     */
    public function deleteQuestModelMasterAsync(
            DeleteQuestModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteQuestModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Quest Model master
     *
     * @param DeleteQuestModelMasterRequest $request
     * @return DeleteQuestModelMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deletequestmodelmaster
     */
    public function deleteQuestModelMaster (
            DeleteQuestModelMasterRequest $request
    ): DeleteQuestModelMasterResult {
        return $this->deleteQuestModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Export Quest Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#exportmaster
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
     * Export Quest Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Quest Model master data
     *
     * @param GetCurrentQuestMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getcurrentquestmaster
     */
    public function getCurrentQuestMasterAsync(
            GetCurrentQuestMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentQuestMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get currently active Quest Model master data
     *
     * @param GetCurrentQuestMasterRequest $request
     * @return GetCurrentQuestMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getcurrentquestmaster
     */
    public function getCurrentQuestMaster (
            GetCurrentQuestMasterRequest $request
    ): GetCurrentQuestMasterResult {
        return $this->getCurrentQuestMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Quest Model master data (3-phase version)
     *
     * @param PreUpdateCurrentQuestMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#preupdatecurrentquestmaster
     */
    public function preUpdateCurrentQuestMasterAsync(
            PreUpdateCurrentQuestMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentQuestMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Quest Model master data (3-phase version)
     *
     * @param PreUpdateCurrentQuestMasterRequest $request
     * @return PreUpdateCurrentQuestMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#preupdatecurrentquestmaster
     */
    public function preUpdateCurrentQuestMaster (
            PreUpdateCurrentQuestMasterRequest $request
    ): PreUpdateCurrentQuestMasterResult {
        return $this->preUpdateCurrentQuestMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Quest Model master data
     *
     * @param UpdateCurrentQuestMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatecurrentquestmaster
     */
    public function updateCurrentQuestMasterAsync(
            UpdateCurrentQuestMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentQuestMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Quest Model master data
     *
     * @param UpdateCurrentQuestMasterRequest $request
     * @return UpdateCurrentQuestMasterResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatecurrentquestmaster
     */
    public function updateCurrentQuestMaster (
            UpdateCurrentQuestMasterRequest $request
    ): UpdateCurrentQuestMasterResult {
        return $this->updateCurrentQuestMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Quest Model master data from GitHub
     *
     * @param UpdateCurrentQuestMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatecurrentquestmasterfromgithub
     */
    public function updateCurrentQuestMasterFromGitHubAsync(
            UpdateCurrentQuestMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentQuestMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Quest Model master data from GitHub
     *
     * @param UpdateCurrentQuestMasterFromGitHubRequest $request
     * @return UpdateCurrentQuestMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#updatecurrentquestmasterfromgithub
     */
    public function updateCurrentQuestMasterFromGitHub (
            UpdateCurrentQuestMasterFromGitHubRequest $request
    ): UpdateCurrentQuestMasterFromGitHubResult {
        return $this->updateCurrentQuestMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * List Quest Progress
     *
     * @param DescribeProgressesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describeprogressesbyuserid
     */
    public function describeProgressesByUserIdAsync(
            DescribeProgressesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeProgressesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Quest Progress
     *
     * @param DescribeProgressesByUserIdRequest $request
     * @return DescribeProgressesByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describeprogressesbyuserid
     */
    public function describeProgressesByUserId (
            DescribeProgressesByUserIdRequest $request
    ): DescribeProgressesByUserIdResult {
        return $this->describeProgressesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Create Quest Progress by User ID
     *
     * @param CreateProgressByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#createprogressbyuserid
     */
    public function createProgressByUserIdAsync(
            CreateProgressByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateProgressByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Quest Progress by User ID
     *
     * @param CreateProgressByUserIdRequest $request
     * @return CreateProgressByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#createprogressbyuserid
     */
    public function createProgressByUserId (
            CreateProgressByUserIdRequest $request
    ): CreateProgressByUserIdResult {
        return $this->createProgressByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get quest progress
     *
     * @param GetProgressRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getprogress
     */
    public function getProgressAsync(
            GetProgressRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetProgressTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get quest progress
     *
     * @param GetProgressRequest $request
     * @return GetProgressResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getprogress
     */
    public function getProgress (
            GetProgressRequest $request
    ): GetProgressResult {
        return $this->getProgressAsync(
            $request
        )->wait();
    }

    /**
     * Get Quest Progress by User ID
     *
     * @param GetProgressByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getprogressbyuserid
     */
    public function getProgressByUserIdAsync(
            GetProgressByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetProgressByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Quest Progress by User ID
     *
     * @param GetProgressByUserIdRequest $request
     * @return GetProgressByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getprogressbyuserid
     */
    public function getProgressByUserId (
            GetProgressByUserIdRequest $request
    ): GetProgressByUserIdResult {
        return $this->getProgressByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Start Quest
     *
     * @param StartRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#start
     */
    public function startAsync(
            StartRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new StartTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Start Quest
     *
     * @param StartRequest $request
     * @return StartResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#start
     */
    public function start (
            StartRequest $request
    ): StartResult {
        return $this->startAsync(
            $request
        )->wait();
    }

    /**
     * Start a quest by User ID
     *
     * @param StartByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#startbyuserid
     */
    public function startByUserIdAsync(
            StartByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new StartByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Start a quest by User ID
     *
     * @param StartByUserIdRequest $request
     * @return StartByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#startbyuserid
     */
    public function startByUserId (
            StartByUserIdRequest $request
    ): StartByUserIdResult {
        return $this->startByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Completed Quest
     *
     * @param EndRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#end
     */
    public function endAsync(
            EndRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new EndTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Completed Quest
     *
     * @param EndRequest $request
     * @return EndResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#end
     */
    public function end (
            EndRequest $request
    ): EndResult {
        return $this->endAsync(
            $request
        )->wait();
    }

    /**
     * Complete quest by User ID
     *
     * @param EndByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#endbyuserid
     */
    public function endByUserIdAsync(
            EndByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new EndByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Complete quest by User ID
     *
     * @param EndByUserIdRequest $request
     * @return EndByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#endbyuserid
     */
    public function endByUserId (
            EndByUserIdRequest $request
    ): EndByUserIdResult {
        return $this->endByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete quest progress
     *
     * @param DeleteProgressRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deleteprogress
     */
    public function deleteProgressAsync(
            DeleteProgressRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteProgressTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete quest progress
     *
     * @param DeleteProgressRequest $request
     * @return DeleteProgressResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deleteprogress
     */
    public function deleteProgress (
            DeleteProgressRequest $request
    ): DeleteProgressResult {
        return $this->deleteProgressAsync(
            $request
        )->wait();
    }

    /**
     * Delete Quest Progress by User ID
     *
     * @param DeleteProgressByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deleteprogressbyuserid
     */
    public function deleteProgressByUserIdAsync(
            DeleteProgressByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteProgressByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Quest Progress by User ID
     *
     * @param DeleteProgressByUserIdRequest $request
     * @return DeleteProgressByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deleteprogressbyuserid
     */
    public function deleteProgressByUserId (
            DeleteProgressByUserIdRequest $request
    ): DeleteProgressByUserIdResult {
        return $this->deleteProgressByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute the creation of quest progress as an acquire action
     *
     * @param CreateProgressByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/stamp_sheet/#gs2questcreateprogressbyuserid
     */
    public function createProgressByStampSheetAsync(
            CreateProgressByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateProgressByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the creation of quest progress as an acquire action
     *
     * @param CreateProgressByStampSheetRequest $request
     * @return CreateProgressByStampSheetResult
     * @see https://docs.gs2.io/api_reference/quest/stamp_sheet/#gs2questcreateprogressbyuserid
     */
    public function createProgressByStampSheet (
            CreateProgressByStampSheetRequest $request
    ): CreateProgressByStampSheetResult {
        return $this->createProgressByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Delete Quest Progress in Consume Actions
     *
     * @param DeleteProgressByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/stamp_sheet/#gs2questdeleteprogressbyuserid
     */
    public function deleteProgressByStampTaskAsync(
            DeleteProgressByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteProgressByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Quest Progress in Consume Actions
     *
     * @param DeleteProgressByStampTaskRequest $request
     * @return DeleteProgressByStampTaskResult
     * @see https://docs.gs2.io/api_reference/quest/stamp_sheet/#gs2questdeleteprogressbyuserid
     */
    public function deleteProgressByStampTask (
            DeleteProgressByStampTaskRequest $request
    ): DeleteProgressByStampTaskResult {
        return $this->deleteProgressByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * List Completed Quest lists
     *
     * @param DescribeCompletedQuestListsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describecompletedquestlists
     */
    public function describeCompletedQuestListsAsync(
            DescribeCompletedQuestListsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCompletedQuestListsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Completed Quest lists
     *
     * @param DescribeCompletedQuestListsRequest $request
     * @return DescribeCompletedQuestListsResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describecompletedquestlists
     */
    public function describeCompletedQuestLists (
            DescribeCompletedQuestListsRequest $request
    ): DescribeCompletedQuestListsResult {
        return $this->describeCompletedQuestListsAsync(
            $request
        )->wait();
    }

    /**
     * List Completed Quest Lists by User ID
     *
     * @param DescribeCompletedQuestListsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describecompletedquestlistsbyuserid
     */
    public function describeCompletedQuestListsByUserIdAsync(
            DescribeCompletedQuestListsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCompletedQuestListsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Completed Quest Lists by User ID
     *
     * @param DescribeCompletedQuestListsByUserIdRequest $request
     * @return DescribeCompletedQuestListsByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describecompletedquestlistsbyuserid
     */
    public function describeCompletedQuestListsByUserId (
            DescribeCompletedQuestListsByUserIdRequest $request
    ): DescribeCompletedQuestListsByUserIdResult {
        return $this->describeCompletedQuestListsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Completed Quest List
     *
     * @param GetCompletedQuestListRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getcompletedquestlist
     */
    public function getCompletedQuestListAsync(
            GetCompletedQuestListRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCompletedQuestListTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Completed Quest List
     *
     * @param GetCompletedQuestListRequest $request
     * @return GetCompletedQuestListResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getcompletedquestlist
     */
    public function getCompletedQuestList (
            GetCompletedQuestListRequest $request
    ): GetCompletedQuestListResult {
        return $this->getCompletedQuestListAsync(
            $request
        )->wait();
    }

    /**
     * Get Completed Quest List by User ID
     *
     * @param GetCompletedQuestListByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getcompletedquestlistbyuserid
     */
    public function getCompletedQuestListByUserIdAsync(
            GetCompletedQuestListByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCompletedQuestListByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Completed Quest List by User ID
     *
     * @param GetCompletedQuestListByUserIdRequest $request
     * @return GetCompletedQuestListByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getcompletedquestlistbyuserid
     */
    public function getCompletedQuestListByUserId (
            GetCompletedQuestListByUserIdRequest $request
    ): GetCompletedQuestListByUserIdResult {
        return $this->getCompletedQuestListByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Completed Quest List by User ID
     *
     * @param DeleteCompletedQuestListByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deletecompletedquestlistbyuserid
     */
    public function deleteCompletedQuestListByUserIdAsync(
            DeleteCompletedQuestListByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCompletedQuestListByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Completed Quest List by User ID
     *
     * @param DeleteCompletedQuestListByUserIdRequest $request
     * @return DeleteCompletedQuestListByUserIdResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#deletecompletedquestlistbyuserid
     */
    public function deleteCompletedQuestListByUserId (
            DeleteCompletedQuestListByUserIdRequest $request
    ): DeleteCompletedQuestListByUserIdResult {
        return $this->deleteCompletedQuestListByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Quest Groups
     *
     * @param DescribeQuestGroupModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describequestgroupmodels
     */
    public function describeQuestGroupModelsAsync(
            DescribeQuestGroupModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeQuestGroupModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Quest Groups
     *
     * @param DescribeQuestGroupModelsRequest $request
     * @return DescribeQuestGroupModelsResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describequestgroupmodels
     */
    public function describeQuestGroupModels (
            DescribeQuestGroupModelsRequest $request
    ): DescribeQuestGroupModelsResult {
        return $this->describeQuestGroupModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Quest Group Model
     *
     * @param GetQuestGroupModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getquestgroupmodel
     */
    public function getQuestGroupModelAsync(
            GetQuestGroupModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetQuestGroupModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Quest Group Model
     *
     * @param GetQuestGroupModelRequest $request
     * @return GetQuestGroupModelResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getquestgroupmodel
     */
    public function getQuestGroupModel (
            GetQuestGroupModelRequest $request
    ): GetQuestGroupModelResult {
        return $this->getQuestGroupModelAsync(
            $request
        )->wait();
    }

    /**
     * List Quest Models
     *
     * @param DescribeQuestModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describequestmodels
     */
    public function describeQuestModelsAsync(
            DescribeQuestModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeQuestModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Quest Models
     *
     * @param DescribeQuestModelsRequest $request
     * @return DescribeQuestModelsResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#describequestmodels
     */
    public function describeQuestModels (
            DescribeQuestModelsRequest $request
    ): DescribeQuestModelsResult {
        return $this->describeQuestModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Quest Model
     *
     * @param GetQuestModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getquestmodel
     */
    public function getQuestModelAsync(
            GetQuestModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetQuestModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Quest Model
     *
     * @param GetQuestModelRequest $request
     * @return GetQuestModelResult
     * @see https://docs.gs2.io/api_reference/quest/sdk/#getquestmodel
     */
    public function getQuestModel (
            GetQuestModelRequest $request
    ): GetQuestModelResult {
        return $this->getQuestModelAsync(
            $request
        )->wait();
    }
}