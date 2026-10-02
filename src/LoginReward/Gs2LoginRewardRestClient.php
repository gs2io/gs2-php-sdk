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
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
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
        if ($this->request->getTransactionSettingV2() !== null) {
            $json["transactionSettingV2"] = $this->request->getTransactionSettingV2()->toJson();
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
 * GS2-LoginReward API client
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/
 */
class Gs2LoginRewardRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Login Bonus Model Masters
     *
     * @param DescribeBonusModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describebonusmodelmasters
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
     * List Login Bonus Model Masters
     *
     * @param DescribeBonusModelMastersRequest $request
     * @return DescribeBonusModelMastersResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describebonusmodelmasters
     */
    public function describeBonusModelMasters (
            DescribeBonusModelMastersRequest $request
    ): DescribeBonusModelMastersResult {
        return $this->describeBonusModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Login Bonus Model Master
     *
     * @param CreateBonusModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#createbonusmodelmaster
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
     * Create Login Bonus Model Master
     *
     * @param CreateBonusModelMasterRequest $request
     * @return CreateBonusModelMasterResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#createbonusmodelmaster
     */
    public function createBonusModelMaster (
            CreateBonusModelMasterRequest $request
    ): CreateBonusModelMasterResult {
        return $this->createBonusModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Login Bonus Model Master
     *
     * @param GetBonusModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getbonusmodelmaster
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
     * Get Login Bonus Model Master
     *
     * @param GetBonusModelMasterRequest $request
     * @return GetBonusModelMasterResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getbonusmodelmaster
     */
    public function getBonusModelMaster (
            GetBonusModelMasterRequest $request
    ): GetBonusModelMasterResult {
        return $this->getBonusModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Login Bonus Model Master
     *
     * @param UpdateBonusModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#updatebonusmodelmaster
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
     * Update Login Bonus Model Master
     *
     * @param UpdateBonusModelMasterRequest $request
     * @return UpdateBonusModelMasterResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#updatebonusmodelmaster
     */
    public function updateBonusModelMaster (
            UpdateBonusModelMasterRequest $request
    ): UpdateBonusModelMasterResult {
        return $this->updateBonusModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Login Bonus Model Master
     *
     * @param DeleteBonusModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#deletebonusmodelmaster
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
     * Delete Login Bonus Model Master
     *
     * @param DeleteBonusModelMasterRequest $request
     * @return DeleteBonusModelMasterResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#deletebonusmodelmaster
     */
    public function deleteBonusModelMaster (
            DeleteBonusModelMasterRequest $request
    ): DeleteBonusModelMasterResult {
        return $this->deleteBonusModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Export Login Bonus Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#exportmaster
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
     * Export Login Bonus Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Login Bonus Model master data
     *
     * @param GetCurrentBonusMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getcurrentbonusmaster
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
     * Get currently active Login Bonus Model master data
     *
     * @param GetCurrentBonusMasterRequest $request
     * @return GetCurrentBonusMasterResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getcurrentbonusmaster
     */
    public function getCurrentBonusMaster (
            GetCurrentBonusMasterRequest $request
    ): GetCurrentBonusMasterResult {
        return $this->getCurrentBonusMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Login Bonus Model master data (3-phase version)
     *
     * @param PreUpdateCurrentBonusMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#preupdatecurrentbonusmaster
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
     * Update currently active Login Bonus Model master data (3-phase version)
     *
     * @param PreUpdateCurrentBonusMasterRequest $request
     * @return PreUpdateCurrentBonusMasterResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#preupdatecurrentbonusmaster
     */
    public function preUpdateCurrentBonusMaster (
            PreUpdateCurrentBonusMasterRequest $request
    ): PreUpdateCurrentBonusMasterResult {
        return $this->preUpdateCurrentBonusMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Login Bonus Model master data
     *
     * @param UpdateCurrentBonusMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#updatecurrentbonusmaster
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
     * Update currently active Login Bonus Model master data
     *
     * @param UpdateCurrentBonusMasterRequest $request
     * @return UpdateCurrentBonusMasterResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#updatecurrentbonusmaster
     */
    public function updateCurrentBonusMaster (
            UpdateCurrentBonusMasterRequest $request
    ): UpdateCurrentBonusMasterResult {
        return $this->updateCurrentBonusMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Login Bonus Model master data from GitHub
     *
     * @param UpdateCurrentBonusMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#updatecurrentbonusmasterfromgithub
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
     * Update currently active Login Bonus Model master data from GitHub
     *
     * @param UpdateCurrentBonusMasterFromGitHubRequest $request
     * @return UpdateCurrentBonusMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#updatecurrentbonusmasterfromgithub
     */
    public function updateCurrentBonusMasterFromGitHub (
            UpdateCurrentBonusMasterFromGitHubRequest $request
    ): UpdateCurrentBonusMasterFromGitHubResult {
        return $this->updateCurrentBonusMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * List Login Bonus Models
     *
     * @param DescribeBonusModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describebonusmodels
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
     * List Login Bonus Models
     *
     * @param DescribeBonusModelsRequest $request
     * @return DescribeBonusModelsResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describebonusmodels
     */
    public function describeBonusModels (
            DescribeBonusModelsRequest $request
    ): DescribeBonusModelsResult {
        return $this->describeBonusModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Login Bonus Model
     *
     * @param GetBonusModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getbonusmodel
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
     * Get Login Bonus Model
     *
     * @param GetBonusModelRequest $request
     * @return GetBonusModelResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getbonusmodel
     */
    public function getBonusModel (
            GetBonusModelRequest $request
    ): GetBonusModelResult {
        return $this->getBonusModelAsync(
            $request
        )->wait();
    }

    /**
     * Receive Login Bonus
     *
     * @param ReceiveRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#receive
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
     * Receive Login Bonus
     *
     * @param ReceiveRequest $request
     * @return ReceiveResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#receive
     */
    public function receive (
            ReceiveRequest $request
    ): ReceiveResult {
        return $this->receiveAsync(
            $request
        )->wait();
    }

    /**
     * Get login rewards by userId
     *
     * @param ReceiveByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#receivebyuserid
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
     * Get login rewards by userId
     *
     * @param ReceiveByUserIdRequest $request
     * @return ReceiveByUserIdResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#receivebyuserid
     */
    public function receiveByUserId (
            ReceiveByUserIdRequest $request
    ): ReceiveByUserIdResult {
        return $this->receiveByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Receive missed login rewards
     *
     * @param MissedReceiveRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#missedreceive
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
     * Receive missed login rewards
     *
     * @param MissedReceiveRequest $request
     * @return MissedReceiveResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#missedreceive
     */
    public function missedReceive (
            MissedReceiveRequest $request
    ): MissedReceiveResult {
        return $this->missedReceiveAsync(
            $request
        )->wait();
    }

    /**
     * Receive missed login rewards by userId
     *
     * @param MissedReceiveByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#missedreceivebyuserid
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
     * Receive missed login rewards by userId
     *
     * @param MissedReceiveByUserIdRequest $request
     * @return MissedReceiveByUserIdResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#missedreceivebyuserid
     */
    public function missedReceiveByUserId (
            MissedReceiveByUserIdRequest $request
    ): MissedReceiveByUserIdResult {
        return $this->missedReceiveByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Receive Statuses
     *
     * @param DescribeReceiveStatusesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describereceivestatuses
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
     * List Receive Statuses
     *
     * @param DescribeReceiveStatusesRequest $request
     * @return DescribeReceiveStatusesResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describereceivestatuses
     */
    public function describeReceiveStatuses (
            DescribeReceiveStatusesRequest $request
    ): DescribeReceiveStatusesResult {
        return $this->describeReceiveStatusesAsync(
            $request
        )->wait();
    }

    /**
     * List Receive Statuses by User ID
     *
     * @param DescribeReceiveStatusesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describereceivestatusesbyuserid
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
     * List Receive Statuses by User ID
     *
     * @param DescribeReceiveStatusesByUserIdRequest $request
     * @return DescribeReceiveStatusesByUserIdResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describereceivestatusesbyuserid
     */
    public function describeReceiveStatusesByUserId (
            DescribeReceiveStatusesByUserIdRequest $request
    ): DescribeReceiveStatusesByUserIdResult {
        return $this->describeReceiveStatusesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Receive Status
     *
     * @param GetReceiveStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getreceivestatus
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
     * Get Receive Status
     *
     * @param GetReceiveStatusRequest $request
     * @return GetReceiveStatusResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getreceivestatus
     */
    public function getReceiveStatus (
            GetReceiveStatusRequest $request
    ): GetReceiveStatusResult {
        return $this->getReceiveStatusAsync(
            $request
        )->wait();
    }

    /**
     * Get Receive Status by User ID
     *
     * @param GetReceiveStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getreceivestatusbyuserid
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
     * Get Receive Status by User ID
     *
     * @param GetReceiveStatusByUserIdRequest $request
     * @return GetReceiveStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getreceivestatusbyuserid
     */
    public function getReceiveStatusByUserId (
            GetReceiveStatusByUserIdRequest $request
    ): GetReceiveStatusByUserIdResult {
        return $this->getReceiveStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Receive Status by User ID
     *
     * @param DeleteReceiveStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#deletereceivestatusbyuserid
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
     * Delete Receive Status by User ID
     *
     * @param DeleteReceiveStatusByUserIdRequest $request
     * @return DeleteReceiveStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#deletereceivestatusbyuserid
     */
    public function deleteReceiveStatusByUserId (
            DeleteReceiveStatusByUserIdRequest $request
    ): DeleteReceiveStatusByUserIdResult {
        return $this->deleteReceiveStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute reset of receive status as acquire action
     *
     * @param DeleteReceiveStatusByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/stamp_sheet/#gs2loginrewarddeletereceivestatusbyuserid
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
     * Execute reset of receive status as acquire action
     *
     * @param DeleteReceiveStatusByStampSheetRequest $request
     * @return DeleteReceiveStatusByStampSheetResult
     * @see https://docs.gs2.io/api_reference/login_reward/stamp_sheet/#gs2loginrewarddeletereceivestatusbyuserid
     */
    public function deleteReceiveStatusByStampSheet (
            DeleteReceiveStatusByStampSheetRequest $request
    ): DeleteReceiveStatusByStampSheetResult {
        return $this->deleteReceiveStatusByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Mark as received
     *
     * @param MarkReceivedRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#markreceived
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
     * Mark as received
     *
     * @param MarkReceivedRequest $request
     * @return MarkReceivedResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#markreceived
     */
    public function markReceived (
            MarkReceivedRequest $request
    ): MarkReceivedResult {
        return $this->markReceivedAsync(
            $request
        )->wait();
    }

    /**
     * Mark as received by User ID
     *
     * @param MarkReceivedByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#markreceivedbyuserid
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
     * Mark as received by User ID
     *
     * @param MarkReceivedByUserIdRequest $request
     * @return MarkReceivedByUserIdResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#markreceivedbyuserid
     */
    public function markReceivedByUserId (
            MarkReceivedByUserIdRequest $request
    ): MarkReceivedByUserIdResult {
        return $this->markReceivedByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Unmark as received by User ID
     *
     * @param UnmarkReceivedByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#unmarkreceivedbyuserid
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
     * Unmark as received by User ID
     *
     * @param UnmarkReceivedByUserIdRequest $request
     * @return UnmarkReceivedByUserIdResult
     * @see https://docs.gs2.io/api_reference/login_reward/sdk/#unmarkreceivedbyuserid
     */
    public function unmarkReceivedByUserId (
            UnmarkReceivedByUserIdRequest $request
    ): UnmarkReceivedByUserIdResult {
        return $this->unmarkReceivedByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute mark as received as consume action
     *
     * @param MarkReceivedByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/stamp_sheet/#gs2loginrewardmarkreceivedbyuserid
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
     * Execute mark as received as consume action
     *
     * @param MarkReceivedByStampTaskRequest $request
     * @return MarkReceivedByStampTaskResult
     * @see https://docs.gs2.io/api_reference/login_reward/stamp_sheet/#gs2loginrewardmarkreceivedbyuserid
     */
    public function markReceivedByStampTask (
            MarkReceivedByStampTaskRequest $request
    ): MarkReceivedByStampTaskResult {
        return $this->markReceivedByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Execute unmark as received as acquire action
     *
     * @param UnmarkReceivedByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/login_reward/stamp_sheet/#gs2loginrewardunmarkreceivedbyuserid
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
     * Execute unmark as received as acquire action
     *
     * @param UnmarkReceivedByStampSheetRequest $request
     * @return UnmarkReceivedByStampSheetResult
     * @see https://docs.gs2.io/api_reference/login_reward/stamp_sheet/#gs2loginrewardunmarkreceivedbyuserid
     */
    public function unmarkReceivedByStampSheet (
            UnmarkReceivedByStampSheetRequest $request
    ): UnmarkReceivedByStampSheetResult {
        return $this->unmarkReceivedByStampSheetAsync(
            $request
        )->wait();
    }
}