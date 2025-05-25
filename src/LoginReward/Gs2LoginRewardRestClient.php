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

namespace Gs2\LoginReward;

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


use Gs2\LoginReward\Request\DescribeNamespacesRequest;
use Gs2\LoginReward\Result\DescribeNamespacesResult;
use Gs2\LoginReward\Request\CreateNamespaceRequest;
use Gs2\LoginReward\Result\CreateNamespaceResult;
use Gs2\LoginReward\Request\GetNamespaceStatusRequest;
use Gs2\LoginReward\Result\GetNamespaceStatusResult;
use Gs2\LoginReward\Request\GetNamespaceRequest;
use Gs2\LoginReward\Result\GetNamespaceResult;
use Gs2\LoginReward\Request\UpdateNamespaceRequest;
use Gs2\LoginReward\Result\UpdateNamespaceResult;
use Gs2\LoginReward\Request\DeleteNamespaceRequest;
use Gs2\LoginReward\Result\DeleteNamespaceResult;
use Gs2\LoginReward\Request\GetServiceVersionRequest;
use Gs2\LoginReward\Result\GetServiceVersionResult;
use Gs2\LoginReward\Request\DumpUserDataByUserIdRequest;
use Gs2\LoginReward\Result\DumpUserDataByUserIdResult;
use Gs2\LoginReward\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\LoginReward\Result\CheckDumpUserDataByUserIdResult;
use Gs2\LoginReward\Request\CleanUserDataByUserIdRequest;
use Gs2\LoginReward\Result\CleanUserDataByUserIdResult;
use Gs2\LoginReward\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\LoginReward\Result\CheckCleanUserDataByUserIdResult;
use Gs2\LoginReward\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\LoginReward\Result\PrepareImportUserDataByUserIdResult;
use Gs2\LoginReward\Request\ImportUserDataByUserIdRequest;
use Gs2\LoginReward\Result\ImportUserDataByUserIdResult;
use Gs2\LoginReward\Request\CheckImportUserDataByUserIdRequest;
use Gs2\LoginReward\Result\CheckImportUserDataByUserIdResult;
use Gs2\LoginReward\Request\DescribeBonusModelMastersRequest;
use Gs2\LoginReward\Result\DescribeBonusModelMastersResult;
use Gs2\LoginReward\Request\CreateBonusModelMasterRequest;
use Gs2\LoginReward\Result\CreateBonusModelMasterResult;
use Gs2\LoginReward\Request\GetBonusModelMasterRequest;
use Gs2\LoginReward\Result\GetBonusModelMasterResult;
use Gs2\LoginReward\Request\UpdateBonusModelMasterRequest;
use Gs2\LoginReward\Result\UpdateBonusModelMasterResult;
use Gs2\LoginReward\Request\DeleteBonusModelMasterRequest;
use Gs2\LoginReward\Result\DeleteBonusModelMasterResult;
use Gs2\LoginReward\Request\ExportMasterRequest;
use Gs2\LoginReward\Result\ExportMasterResult;
use Gs2\LoginReward\Request\GetCurrentBonusMasterRequest;
use Gs2\LoginReward\Result\GetCurrentBonusMasterResult;
use Gs2\LoginReward\Request\PreUpdateCurrentBonusMasterRequest;
use Gs2\LoginReward\Result\PreUpdateCurrentBonusMasterResult;
use Gs2\LoginReward\Request\UpdateCurrentBonusMasterRequest;
use Gs2\LoginReward\Result\UpdateCurrentBonusMasterResult;
use Gs2\LoginReward\Request\UpdateCurrentBonusMasterFromGitHubRequest;
use Gs2\LoginReward\Result\UpdateCurrentBonusMasterFromGitHubResult;
use Gs2\LoginReward\Request\DescribeBonusModelsRequest;
use Gs2\LoginReward\Result\DescribeBonusModelsResult;
use Gs2\LoginReward\Request\GetBonusModelRequest;
use Gs2\LoginReward\Result\GetBonusModelResult;
use Gs2\LoginReward\Request\ReceiveRequest;
use Gs2\LoginReward\Result\ReceiveResult;
use Gs2\LoginReward\Request\ReceiveByUserIdRequest;
use Gs2\LoginReward\Result\ReceiveByUserIdResult;
use Gs2\LoginReward\Request\MissedReceiveRequest;
use Gs2\LoginReward\Result\MissedReceiveResult;
use Gs2\LoginReward\Request\MissedReceiveByUserIdRequest;
use Gs2\LoginReward\Result\MissedReceiveByUserIdResult;
use Gs2\LoginReward\Request\DescribeReceiveStatusesRequest;
use Gs2\LoginReward\Result\DescribeReceiveStatusesResult;
use Gs2\LoginReward\Request\DescribeReceiveStatusesByUserIdRequest;
use Gs2\LoginReward\Result\DescribeReceiveStatusesByUserIdResult;
use Gs2\LoginReward\Request\GetReceiveStatusRequest;
use Gs2\LoginReward\Result\GetReceiveStatusResult;
use Gs2\LoginReward\Request\GetReceiveStatusByUserIdRequest;
use Gs2\LoginReward\Result\GetReceiveStatusByUserIdResult;
use Gs2\LoginReward\Request\DeleteReceiveStatusByUserIdRequest;
use Gs2\LoginReward\Result\DeleteReceiveStatusByUserIdResult;
use Gs2\LoginReward\Request\DeleteReceiveStatusByStampSheetRequest;
use Gs2\LoginReward\Result\DeleteReceiveStatusByStampSheetResult;
use Gs2\LoginReward\Request\MarkReceivedRequest;
use Gs2\LoginReward\Result\MarkReceivedResult;
use Gs2\LoginReward\Request\MarkReceivedByUserIdRequest;
use Gs2\LoginReward\Result\MarkReceivedByUserIdResult;
use Gs2\LoginReward\Request\UnmarkReceivedByUserIdRequest;
use Gs2\LoginReward\Result\UnmarkReceivedByUserIdResult;
use Gs2\LoginReward\Request\MarkReceivedByStampTaskRequest;
use Gs2\LoginReward\Result\MarkReceivedByStampTaskResult;
use Gs2\LoginReward\Request\UnmarkReceivedByStampSheetRequest;
use Gs2\LoginReward\Result\UnmarkReceivedByStampSheetResult;

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getReceiveScript() !== null) {
            $json["receiveScript"] = $this->request->getReceiveScript()->toJson();
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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getReceiveScript() !== null) {
            $json["receiveScript"] = $this->request->getReceiveScript()->toJson();
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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeBonusModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBonusModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBonusModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBonusModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBonusModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBonusModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/bonusModel";

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

class CreateBonusModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateBonusModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateBonusModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateBonusModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateBonusModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateBonusModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/bonusModel";

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
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getPeriodEventId() !== null) {
            $json["periodEventId"] = $this->request->getPeriodEventId();
        }
        if ($this->request->getResetHour() !== null) {
            $json["resetHour"] = $this->request->getResetHour();
        }
        if ($this->request->getRepeat() !== null) {
            $json["repeat"] = $this->request->getRepeat();
        }
        if ($this->request->getRewards() !== null) {
            $array = [];
            foreach ($this->request->getRewards() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["rewards"] = $array;
        }
        if ($this->request->getMissedReceiveRelief() !== null) {
            $json["missedReceiveRelief"] = $this->request->getMissedReceiveRelief();
        }
        if ($this->request->getMissedReceiveReliefVerifyActions() !== null) {
            $array = [];
            foreach ($this->request->getMissedReceiveReliefVerifyActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["missedReceiveReliefVerifyActions"] = $array;
        }
        if ($this->request->getMissedReceiveReliefConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getMissedReceiveReliefConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["missedReceiveReliefConsumeActions"] = $array;
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

class GetBonusModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetBonusModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBonusModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetBonusModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBonusModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetBonusModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/bonusModel/{bonusModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);

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

class UpdateBonusModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateBonusModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateBonusModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateBonusModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateBonusModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateBonusModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/bonusModel/{bonusModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getPeriodEventId() !== null) {
            $json["periodEventId"] = $this->request->getPeriodEventId();
        }
        if ($this->request->getResetHour() !== null) {
            $json["resetHour"] = $this->request->getResetHour();
        }
        if ($this->request->getRepeat() !== null) {
            $json["repeat"] = $this->request->getRepeat();
        }
        if ($this->request->getRewards() !== null) {
            $array = [];
            foreach ($this->request->getRewards() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["rewards"] = $array;
        }
        if ($this->request->getMissedReceiveRelief() !== null) {
            $json["missedReceiveRelief"] = $this->request->getMissedReceiveRelief();
        }
        if ($this->request->getMissedReceiveReliefVerifyActions() !== null) {
            $array = [];
            foreach ($this->request->getMissedReceiveReliefVerifyActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["missedReceiveReliefVerifyActions"] = $array;
        }
        if ($this->request->getMissedReceiveReliefConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getMissedReceiveReliefConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["missedReceiveReliefConsumeActions"] = $array;
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

class DeleteBonusModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteBonusModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteBonusModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteBonusModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteBonusModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteBonusModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/bonusModel/{bonusModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentBonusMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentBonusMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentBonusMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentBonusMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentBonusMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentBonusMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentBonusMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentBonusMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentBonusMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentBonusMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentBonusMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentBonusMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentBonusMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentBonusMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentBonusMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentBonusMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentBonusMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentBonusMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentBonusMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentBonusMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentBonusMasterResult $res */
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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentBonusMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentBonusMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentBonusMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentBonusMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentBonusMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentBonusMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeBonusModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBonusModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBonusModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBonusModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBonusModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBonusModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/bonusModel";

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

class GetBonusModelTask extends Gs2RestSessionTask {

    /**
     * @var GetBonusModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBonusModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetBonusModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBonusModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetBonusModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/bonusModel/{bonusModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);

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

class ReceiveTask extends Gs2RestSessionTask {

    /**
     * @var ReceiveRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReceiveTask constructor.
     * @param Gs2RestSession $session
     * @param ReceiveRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReceiveRequest $request
    ) {
        parent::__construct(
            $session,
            ReceiveResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/bonus/{bonusModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);

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

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/bonus/{bonusModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class MissedReceiveTask extends Gs2RestSessionTask {

    /**
     * @var MissedReceiveRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MissedReceiveTask constructor.
     * @param Gs2RestSession $session
     * @param MissedReceiveRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MissedReceiveRequest $request
    ) {
        parent::__construct(
            $session,
            MissedReceiveResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/bonus/{bonusModelName}/missed";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);

        $json = [];
        if ($this->request->getStepNumber() !== null) {
            $json["stepNumber"] = $this->request->getStepNumber();
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

class MissedReceiveByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var MissedReceiveByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MissedReceiveByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param MissedReceiveByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MissedReceiveByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            MissedReceiveByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/bonus/{bonusModelName}/missed";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getStepNumber() !== null) {
            $json["stepNumber"] = $this->request->getStepNumber();
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

class DescribeReceiveStatusesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeReceiveStatusesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeReceiveStatusesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeReceiveStatusesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeReceiveStatusesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeReceiveStatusesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/login_reward";

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

class DescribeReceiveStatusesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeReceiveStatusesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeReceiveStatusesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeReceiveStatusesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeReceiveStatusesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeReceiveStatusesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/login_reward";

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

class GetReceiveStatusTask extends Gs2RestSessionTask {

    /**
     * @var GetReceiveStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetReceiveStatusTask constructor.
     * @param Gs2RestSession $session
     * @param GetReceiveStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetReceiveStatusRequest $request
    ) {
        parent::__construct(
            $session,
            GetReceiveStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/receiveStatus/{bonusModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);

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

class GetReceiveStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetReceiveStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetReceiveStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetReceiveStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetReceiveStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetReceiveStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/receiveStatus/{bonusModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);
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

class DeleteReceiveStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteReceiveStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteReceiveStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteReceiveStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteReceiveStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteReceiveStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/receiveStatus/{bonusModelName}/delete";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);
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

class DeleteReceiveStatusByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var DeleteReceiveStatusByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteReceiveStatusByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteReceiveStatusByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteReceiveStatusByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteReceiveStatusByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/receiveStatus/delete";

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

class MarkReceivedTask extends Gs2RestSessionTask {

    /**
     * @var MarkReceivedRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MarkReceivedTask constructor.
     * @param Gs2RestSession $session
     * @param MarkReceivedRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MarkReceivedRequest $request
    ) {
        parent::__construct(
            $session,
            MarkReceivedResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/receiveStatus/{bonusModelName}/mark";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);

        $json = [];
        if ($this->request->getStepNumber() !== null) {
            $json["stepNumber"] = $this->request->getStepNumber();
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

class MarkReceivedByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var MarkReceivedByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MarkReceivedByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param MarkReceivedByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MarkReceivedByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            MarkReceivedByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/receiveStatus/{bonusModelName}/mark";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getStepNumber() !== null) {
            $json["stepNumber"] = $this->request->getStepNumber();
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

class UnmarkReceivedByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UnmarkReceivedByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnmarkReceivedByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UnmarkReceivedByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnmarkReceivedByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UnmarkReceivedByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/receiveStatus/{bonusModelName}/unmark";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{bonusModelName}", $this->request->getBonusModelName() === null|| strlen($this->request->getBonusModelName()) == 0 ? "null" : $this->request->getBonusModelName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getStepNumber() !== null) {
            $json["stepNumber"] = $this->request->getStepNumber();
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

class MarkReceivedByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var MarkReceivedByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MarkReceivedByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param MarkReceivedByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MarkReceivedByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            MarkReceivedByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/receiveStatus/mark";

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

class UnmarkReceivedByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var UnmarkReceivedByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UnmarkReceivedByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param UnmarkReceivedByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UnmarkReceivedByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            UnmarkReceivedByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "login-reward", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/receiveStatus/unmark";

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

/**
 * GS2 LoginReward API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2LoginRewardRestClient extends AbstractGs2Client {

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
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
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
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     */
    public function getServiceVersion (
            GetServiceVersionRequest $request
    ): GetServiceVersionResult {
        return $this->getServiceVersionAsync(
            $request
        )->wait();
    }

    /**
     * @param DumpUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param DumpUserDataByUserIdRequest $request
     * @return DumpUserDataByUserIdResult
     */
    public function dumpUserDataByUserId (
            DumpUserDataByUserIdRequest $request
    ): DumpUserDataByUserIdResult {
        return $this->dumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return CheckDumpUserDataByUserIdResult
     */
    public function checkDumpUserDataByUserId (
            CheckDumpUserDataByUserIdRequest $request
    ): CheckDumpUserDataByUserIdResult {
        return $this->checkDumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CleanUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param CleanUserDataByUserIdRequest $request
     * @return CleanUserDataByUserIdResult
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     */
    public function checkCleanUserDataByUserId (
            CheckCleanUserDataByUserIdRequest $request
    ): CheckCleanUserDataByUserIdResult {
        return $this->checkCleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PrepareImportUserDataByUserIdResult
     */
    public function prepareImportUserDataByUserId (
            PrepareImportUserDataByUserIdRequest $request
    ): PrepareImportUserDataByUserIdResult {
        return $this->prepareImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ImportUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param ImportUserDataByUserIdRequest $request
     * @return ImportUserDataByUserIdResult
     */
    public function importUserDataByUserId (
            ImportUserDataByUserIdRequest $request
    ): ImportUserDataByUserIdResult {
        return $this->importUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckImportUserDataByUserIdRequest $request
     * @return PromiseInterface
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
     * @param CheckImportUserDataByUserIdRequest $request
     * @return CheckImportUserDataByUserIdResult
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBonusModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeBonusModelMastersAsync(
            DescribeBonusModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBonusModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBonusModelMastersRequest $request
     * @return DescribeBonusModelMastersResult
     */
    public function describeBonusModelMasters (
            DescribeBonusModelMastersRequest $request
    ): DescribeBonusModelMastersResult {
        return $this->describeBonusModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateBonusModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createBonusModelMasterAsync(
            CreateBonusModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateBonusModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateBonusModelMasterRequest $request
     * @return CreateBonusModelMasterResult
     */
    public function createBonusModelMaster (
            CreateBonusModelMasterRequest $request
    ): CreateBonusModelMasterResult {
        return $this->createBonusModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBonusModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getBonusModelMasterAsync(
            GetBonusModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBonusModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBonusModelMasterRequest $request
     * @return GetBonusModelMasterResult
     */
    public function getBonusModelMaster (
            GetBonusModelMasterRequest $request
    ): GetBonusModelMasterResult {
        return $this->getBonusModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateBonusModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateBonusModelMasterAsync(
            UpdateBonusModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateBonusModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateBonusModelMasterRequest $request
     * @return UpdateBonusModelMasterResult
     */
    public function updateBonusModelMaster (
            UpdateBonusModelMasterRequest $request
    ): UpdateBonusModelMasterResult {
        return $this->updateBonusModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteBonusModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteBonusModelMasterAsync(
            DeleteBonusModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteBonusModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteBonusModelMasterRequest $request
     * @return DeleteBonusModelMasterResult
     */
    public function deleteBonusModelMaster (
            DeleteBonusModelMasterRequest $request
    ): DeleteBonusModelMasterResult {
        return $this->deleteBonusModelMasterAsync(
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
     * @param GetCurrentBonusMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentBonusMasterAsync(
            GetCurrentBonusMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentBonusMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentBonusMasterRequest $request
     * @return GetCurrentBonusMasterResult
     */
    public function getCurrentBonusMaster (
            GetCurrentBonusMasterRequest $request
    ): GetCurrentBonusMasterResult {
        return $this->getCurrentBonusMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param PreUpdateCurrentBonusMasterRequest $request
     * @return PromiseInterface
     */
    public function preUpdateCurrentBonusMasterAsync(
            PreUpdateCurrentBonusMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentBonusMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreUpdateCurrentBonusMasterRequest $request
     * @return PreUpdateCurrentBonusMasterResult
     */
    public function preUpdateCurrentBonusMaster (
            PreUpdateCurrentBonusMasterRequest $request
    ): PreUpdateCurrentBonusMasterResult {
        return $this->preUpdateCurrentBonusMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentBonusMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentBonusMasterAsync(
            UpdateCurrentBonusMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentBonusMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentBonusMasterRequest $request
     * @return UpdateCurrentBonusMasterResult
     */
    public function updateCurrentBonusMaster (
            UpdateCurrentBonusMasterRequest $request
    ): UpdateCurrentBonusMasterResult {
        return $this->updateCurrentBonusMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentBonusMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentBonusMasterFromGitHubAsync(
            UpdateCurrentBonusMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentBonusMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentBonusMasterFromGitHubRequest $request
     * @return UpdateCurrentBonusMasterFromGitHubResult
     */
    public function updateCurrentBonusMasterFromGitHub (
            UpdateCurrentBonusMasterFromGitHubRequest $request
    ): UpdateCurrentBonusMasterFromGitHubResult {
        return $this->updateCurrentBonusMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBonusModelsRequest $request
     * @return PromiseInterface
     */
    public function describeBonusModelsAsync(
            DescribeBonusModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBonusModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBonusModelsRequest $request
     * @return DescribeBonusModelsResult
     */
    public function describeBonusModels (
            DescribeBonusModelsRequest $request
    ): DescribeBonusModelsResult {
        return $this->describeBonusModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBonusModelRequest $request
     * @return PromiseInterface
     */
    public function getBonusModelAsync(
            GetBonusModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBonusModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBonusModelRequest $request
     * @return GetBonusModelResult
     */
    public function getBonusModel (
            GetBonusModelRequest $request
    ): GetBonusModelResult {
        return $this->getBonusModelAsync(
            $request
        )->wait();
    }

    /**
     * @param ReceiveRequest $request
     * @return PromiseInterface
     */
    public function receiveAsync(
            ReceiveRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReceiveTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ReceiveRequest $request
     * @return ReceiveResult
     */
    public function receive (
            ReceiveRequest $request
    ): ReceiveResult {
        return $this->receiveAsync(
            $request
        )->wait();
    }

    /**
     * @param ReceiveByUserIdRequest $request
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
     * @param ReceiveByUserIdRequest $request
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
     * @param MissedReceiveRequest $request
     * @return PromiseInterface
     */
    public function missedReceiveAsync(
            MissedReceiveRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MissedReceiveTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param MissedReceiveRequest $request
     * @return MissedReceiveResult
     */
    public function missedReceive (
            MissedReceiveRequest $request
    ): MissedReceiveResult {
        return $this->missedReceiveAsync(
            $request
        )->wait();
    }

    /**
     * @param MissedReceiveByUserIdRequest $request
     * @return PromiseInterface
     */
    public function missedReceiveByUserIdAsync(
            MissedReceiveByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MissedReceiveByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param MissedReceiveByUserIdRequest $request
     * @return MissedReceiveByUserIdResult
     */
    public function missedReceiveByUserId (
            MissedReceiveByUserIdRequest $request
    ): MissedReceiveByUserIdResult {
        return $this->missedReceiveByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeReceiveStatusesRequest $request
     * @return PromiseInterface
     */
    public function describeReceiveStatusesAsync(
            DescribeReceiveStatusesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeReceiveStatusesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeReceiveStatusesRequest $request
     * @return DescribeReceiveStatusesResult
     */
    public function describeReceiveStatuses (
            DescribeReceiveStatusesRequest $request
    ): DescribeReceiveStatusesResult {
        return $this->describeReceiveStatusesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeReceiveStatusesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeReceiveStatusesByUserIdAsync(
            DescribeReceiveStatusesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeReceiveStatusesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeReceiveStatusesByUserIdRequest $request
     * @return DescribeReceiveStatusesByUserIdResult
     */
    public function describeReceiveStatusesByUserId (
            DescribeReceiveStatusesByUserIdRequest $request
    ): DescribeReceiveStatusesByUserIdResult {
        return $this->describeReceiveStatusesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetReceiveStatusRequest $request
     * @return PromiseInterface
     */
    public function getReceiveStatusAsync(
            GetReceiveStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetReceiveStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetReceiveStatusRequest $request
     * @return GetReceiveStatusResult
     */
    public function getReceiveStatus (
            GetReceiveStatusRequest $request
    ): GetReceiveStatusResult {
        return $this->getReceiveStatusAsync(
            $request
        )->wait();
    }

    /**
     * @param GetReceiveStatusByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getReceiveStatusByUserIdAsync(
            GetReceiveStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetReceiveStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetReceiveStatusByUserIdRequest $request
     * @return GetReceiveStatusByUserIdResult
     */
    public function getReceiveStatusByUserId (
            GetReceiveStatusByUserIdRequest $request
    ): GetReceiveStatusByUserIdResult {
        return $this->getReceiveStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteReceiveStatusByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteReceiveStatusByUserIdAsync(
            DeleteReceiveStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteReceiveStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteReceiveStatusByUserIdRequest $request
     * @return DeleteReceiveStatusByUserIdResult
     */
    public function deleteReceiveStatusByUserId (
            DeleteReceiveStatusByUserIdRequest $request
    ): DeleteReceiveStatusByUserIdResult {
        return $this->deleteReceiveStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteReceiveStatusByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function deleteReceiveStatusByStampSheetAsync(
            DeleteReceiveStatusByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteReceiveStatusByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteReceiveStatusByStampSheetRequest $request
     * @return DeleteReceiveStatusByStampSheetResult
     */
    public function deleteReceiveStatusByStampSheet (
            DeleteReceiveStatusByStampSheetRequest $request
    ): DeleteReceiveStatusByStampSheetResult {
        return $this->deleteReceiveStatusByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param MarkReceivedRequest $request
     * @return PromiseInterface
     */
    public function markReceivedAsync(
            MarkReceivedRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MarkReceivedTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param MarkReceivedRequest $request
     * @return MarkReceivedResult
     */
    public function markReceived (
            MarkReceivedRequest $request
    ): MarkReceivedResult {
        return $this->markReceivedAsync(
            $request
        )->wait();
    }

    /**
     * @param MarkReceivedByUserIdRequest $request
     * @return PromiseInterface
     */
    public function markReceivedByUserIdAsync(
            MarkReceivedByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MarkReceivedByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param MarkReceivedByUserIdRequest $request
     * @return MarkReceivedByUserIdResult
     */
    public function markReceivedByUserId (
            MarkReceivedByUserIdRequest $request
    ): MarkReceivedByUserIdResult {
        return $this->markReceivedByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UnmarkReceivedByUserIdRequest $request
     * @return PromiseInterface
     */
    public function unmarkReceivedByUserIdAsync(
            UnmarkReceivedByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnmarkReceivedByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UnmarkReceivedByUserIdRequest $request
     * @return UnmarkReceivedByUserIdResult
     */
    public function unmarkReceivedByUserId (
            UnmarkReceivedByUserIdRequest $request
    ): UnmarkReceivedByUserIdResult {
        return $this->unmarkReceivedByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param MarkReceivedByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function markReceivedByStampTaskAsync(
            MarkReceivedByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MarkReceivedByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param MarkReceivedByStampTaskRequest $request
     * @return MarkReceivedByStampTaskResult
     */
    public function markReceivedByStampTask (
            MarkReceivedByStampTaskRequest $request
    ): MarkReceivedByStampTaskResult {
        return $this->markReceivedByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param UnmarkReceivedByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function unmarkReceivedByStampSheetAsync(
            UnmarkReceivedByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UnmarkReceivedByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UnmarkReceivedByStampSheetRequest $request
     * @return UnmarkReceivedByStampSheetResult
     */
    public function unmarkReceivedByStampSheet (
            UnmarkReceivedByStampSheetRequest $request
    ): UnmarkReceivedByStampSheetResult {
        return $this->unmarkReceivedByStampSheetAsync(
            $request
        )->wait();
    }
}