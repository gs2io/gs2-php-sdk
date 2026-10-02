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

namespace Gs2\Enchant;

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


use Gs2\Enchant\Request\DescribeNamespacesRequest;
use Gs2\Enchant\Result\DescribeNamespacesResult;
use Gs2\Enchant\Request\CreateNamespaceRequest;
use Gs2\Enchant\Result\CreateNamespaceResult;
use Gs2\Enchant\Request\GetNamespaceStatusRequest;
use Gs2\Enchant\Result\GetNamespaceStatusResult;
use Gs2\Enchant\Request\GetNamespaceRequest;
use Gs2\Enchant\Result\GetNamespaceResult;
use Gs2\Enchant\Request\UpdateNamespaceRequest;
use Gs2\Enchant\Result\UpdateNamespaceResult;
use Gs2\Enchant\Request\DeleteNamespaceRequest;
use Gs2\Enchant\Result\DeleteNamespaceResult;
use Gs2\Enchant\Request\GetServiceVersionRequest;
use Gs2\Enchant\Result\GetServiceVersionResult;
use Gs2\Enchant\Request\DumpUserDataByUserIdRequest;
use Gs2\Enchant\Result\DumpUserDataByUserIdResult;
use Gs2\Enchant\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Enchant\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Enchant\Request\CleanUserDataByUserIdRequest;
use Gs2\Enchant\Result\CleanUserDataByUserIdResult;
use Gs2\Enchant\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Enchant\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Enchant\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Enchant\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Enchant\Request\ImportUserDataByUserIdRequest;
use Gs2\Enchant\Result\ImportUserDataByUserIdResult;
use Gs2\Enchant\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Enchant\Result\CheckImportUserDataByUserIdResult;
use Gs2\Enchant\Request\DescribeBalanceParameterModelsRequest;
use Gs2\Enchant\Result\DescribeBalanceParameterModelsResult;
use Gs2\Enchant\Request\GetBalanceParameterModelRequest;
use Gs2\Enchant\Result\GetBalanceParameterModelResult;
use Gs2\Enchant\Request\DescribeBalanceParameterModelMastersRequest;
use Gs2\Enchant\Result\DescribeBalanceParameterModelMastersResult;
use Gs2\Enchant\Request\CreateBalanceParameterModelMasterRequest;
use Gs2\Enchant\Result\CreateBalanceParameterModelMasterResult;
use Gs2\Enchant\Request\GetBalanceParameterModelMasterRequest;
use Gs2\Enchant\Result\GetBalanceParameterModelMasterResult;
use Gs2\Enchant\Request\UpdateBalanceParameterModelMasterRequest;
use Gs2\Enchant\Result\UpdateBalanceParameterModelMasterResult;
use Gs2\Enchant\Request\DeleteBalanceParameterModelMasterRequest;
use Gs2\Enchant\Result\DeleteBalanceParameterModelMasterResult;
use Gs2\Enchant\Request\DescribeRarityParameterModelsRequest;
use Gs2\Enchant\Result\DescribeRarityParameterModelsResult;
use Gs2\Enchant\Request\GetRarityParameterModelRequest;
use Gs2\Enchant\Result\GetRarityParameterModelResult;
use Gs2\Enchant\Request\DescribeRarityParameterModelMastersRequest;
use Gs2\Enchant\Result\DescribeRarityParameterModelMastersResult;
use Gs2\Enchant\Request\CreateRarityParameterModelMasterRequest;
use Gs2\Enchant\Result\CreateRarityParameterModelMasterResult;
use Gs2\Enchant\Request\GetRarityParameterModelMasterRequest;
use Gs2\Enchant\Result\GetRarityParameterModelMasterResult;
use Gs2\Enchant\Request\UpdateRarityParameterModelMasterRequest;
use Gs2\Enchant\Result\UpdateRarityParameterModelMasterResult;
use Gs2\Enchant\Request\DeleteRarityParameterModelMasterRequest;
use Gs2\Enchant\Result\DeleteRarityParameterModelMasterResult;
use Gs2\Enchant\Request\ExportMasterRequest;
use Gs2\Enchant\Result\ExportMasterResult;
use Gs2\Enchant\Request\GetCurrentParameterMasterRequest;
use Gs2\Enchant\Result\GetCurrentParameterMasterResult;
use Gs2\Enchant\Request\PreUpdateCurrentParameterMasterRequest;
use Gs2\Enchant\Result\PreUpdateCurrentParameterMasterResult;
use Gs2\Enchant\Request\UpdateCurrentParameterMasterRequest;
use Gs2\Enchant\Result\UpdateCurrentParameterMasterResult;
use Gs2\Enchant\Request\UpdateCurrentParameterMasterFromGitHubRequest;
use Gs2\Enchant\Result\UpdateCurrentParameterMasterFromGitHubResult;
use Gs2\Enchant\Request\DescribeBalanceParameterStatusesRequest;
use Gs2\Enchant\Result\DescribeBalanceParameterStatusesResult;
use Gs2\Enchant\Request\DescribeBalanceParameterStatusesByUserIdRequest;
use Gs2\Enchant\Result\DescribeBalanceParameterStatusesByUserIdResult;
use Gs2\Enchant\Request\GetBalanceParameterStatusRequest;
use Gs2\Enchant\Result\GetBalanceParameterStatusResult;
use Gs2\Enchant\Request\GetBalanceParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\GetBalanceParameterStatusByUserIdResult;
use Gs2\Enchant\Request\DeleteBalanceParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\DeleteBalanceParameterStatusByUserIdResult;
use Gs2\Enchant\Request\ReDrawBalanceParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\ReDrawBalanceParameterStatusByUserIdResult;
use Gs2\Enchant\Request\ReDrawBalanceParameterStatusByStampSheetRequest;
use Gs2\Enchant\Result\ReDrawBalanceParameterStatusByStampSheetResult;
use Gs2\Enchant\Request\SetBalanceParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\SetBalanceParameterStatusByUserIdResult;
use Gs2\Enchant\Request\SetBalanceParameterStatusByStampSheetRequest;
use Gs2\Enchant\Result\SetBalanceParameterStatusByStampSheetResult;
use Gs2\Enchant\Request\DescribeRarityParameterStatusesRequest;
use Gs2\Enchant\Result\DescribeRarityParameterStatusesResult;
use Gs2\Enchant\Request\DescribeRarityParameterStatusesByUserIdRequest;
use Gs2\Enchant\Result\DescribeRarityParameterStatusesByUserIdResult;
use Gs2\Enchant\Request\GetRarityParameterStatusRequest;
use Gs2\Enchant\Result\GetRarityParameterStatusResult;
use Gs2\Enchant\Request\GetRarityParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\GetRarityParameterStatusByUserIdResult;
use Gs2\Enchant\Request\DeleteRarityParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\DeleteRarityParameterStatusByUserIdResult;
use Gs2\Enchant\Request\ReDrawRarityParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\ReDrawRarityParameterStatusByUserIdResult;
use Gs2\Enchant\Request\ReDrawRarityParameterStatusByStampSheetRequest;
use Gs2\Enchant\Result\ReDrawRarityParameterStatusByStampSheetResult;
use Gs2\Enchant\Request\AddRarityParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\AddRarityParameterStatusByUserIdResult;
use Gs2\Enchant\Request\AddRarityParameterStatusByStampSheetRequest;
use Gs2\Enchant\Result\AddRarityParameterStatusByStampSheetResult;
use Gs2\Enchant\Request\VerifyRarityParameterStatusRequest;
use Gs2\Enchant\Result\VerifyRarityParameterStatusResult;
use Gs2\Enchant\Request\VerifyRarityParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\VerifyRarityParameterStatusByUserIdResult;
use Gs2\Enchant\Request\VerifyRarityParameterStatusByStampTaskRequest;
use Gs2\Enchant\Result\VerifyRarityParameterStatusByStampTaskResult;
use Gs2\Enchant\Request\SetRarityParameterStatusByUserIdRequest;
use Gs2\Enchant\Result\SetRarityParameterStatusByUserIdResult;
use Gs2\Enchant\Request\SetRarityParameterStatusByStampSheetRequest;
use Gs2\Enchant\Result\SetRarityParameterStatusByStampSheetResult;

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeBalanceParameterModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBalanceParameterModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBalanceParameterModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBalanceParameterModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBalanceParameterModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBalanceParameterModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/balance";

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

class GetBalanceParameterModelTask extends Gs2RestSessionTask {

    /**
     * @var GetBalanceParameterModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBalanceParameterModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetBalanceParameterModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBalanceParameterModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetBalanceParameterModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/balance/{parameterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);

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

class DescribeBalanceParameterModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBalanceParameterModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBalanceParameterModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBalanceParameterModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBalanceParameterModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBalanceParameterModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/balance";

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

class CreateBalanceParameterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateBalanceParameterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateBalanceParameterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateBalanceParameterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateBalanceParameterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateBalanceParameterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/balance";

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
        if ($this->request->getTotalValue() !== null) {
            $json["totalValue"] = $this->request->getTotalValue();
        }
        if ($this->request->getInitialValueStrategy() !== null) {
            $json["initialValueStrategy"] = $this->request->getInitialValueStrategy();
        }
        if ($this->request->getParameters() !== null) {
            $array = [];
            foreach ($this->request->getParameters() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["parameters"] = $array;
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

class GetBalanceParameterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetBalanceParameterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBalanceParameterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetBalanceParameterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBalanceParameterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetBalanceParameterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/balance/{parameterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);

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

class UpdateBalanceParameterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateBalanceParameterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateBalanceParameterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateBalanceParameterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateBalanceParameterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateBalanceParameterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/balance/{parameterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getTotalValue() !== null) {
            $json["totalValue"] = $this->request->getTotalValue();
        }
        if ($this->request->getInitialValueStrategy() !== null) {
            $json["initialValueStrategy"] = $this->request->getInitialValueStrategy();
        }
        if ($this->request->getParameters() !== null) {
            $array = [];
            foreach ($this->request->getParameters() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["parameters"] = $array;
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

class DeleteBalanceParameterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteBalanceParameterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteBalanceParameterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteBalanceParameterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteBalanceParameterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteBalanceParameterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/balance/{parameterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);

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

class DescribeRarityParameterModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRarityParameterModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRarityParameterModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRarityParameterModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRarityParameterModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRarityParameterModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/rarity";

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

class GetRarityParameterModelTask extends Gs2RestSessionTask {

    /**
     * @var GetRarityParameterModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRarityParameterModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetRarityParameterModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRarityParameterModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetRarityParameterModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/rarity/{parameterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);

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

class DescribeRarityParameterModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRarityParameterModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRarityParameterModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRarityParameterModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRarityParameterModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRarityParameterModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/rarity";

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

class CreateRarityParameterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateRarityParameterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateRarityParameterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateRarityParameterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateRarityParameterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateRarityParameterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/rarity";

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
        if ($this->request->getMaximumParameterCount() !== null) {
            $json["maximumParameterCount"] = $this->request->getMaximumParameterCount();
        }
        if ($this->request->getParameterCounts() !== null) {
            $array = [];
            foreach ($this->request->getParameterCounts() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["parameterCounts"] = $array;
        }
        if ($this->request->getParameters() !== null) {
            $array = [];
            foreach ($this->request->getParameters() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["parameters"] = $array;
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

class GetRarityParameterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetRarityParameterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRarityParameterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetRarityParameterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRarityParameterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetRarityParameterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/rarity/{parameterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);

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

class UpdateRarityParameterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateRarityParameterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateRarityParameterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateRarityParameterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateRarityParameterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateRarityParameterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/rarity/{parameterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getMaximumParameterCount() !== null) {
            $json["maximumParameterCount"] = $this->request->getMaximumParameterCount();
        }
        if ($this->request->getParameterCounts() !== null) {
            $array = [];
            foreach ($this->request->getParameterCounts() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["parameterCounts"] = $array;
        }
        if ($this->request->getParameters() !== null) {
            $array = [];
            foreach ($this->request->getParameters() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["parameters"] = $array;
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

class DeleteRarityParameterModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRarityParameterModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRarityParameterModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRarityParameterModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRarityParameterModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRarityParameterModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/rarity/{parameterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);

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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentParameterMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentParameterMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentParameterMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentParameterMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentParameterMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentParameterMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentParameterMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentParameterMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentParameterMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentParameterMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentParameterMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentParameterMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentParameterMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentParameterMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentParameterMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentParameterMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentParameterMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentParameterMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentParameterMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentParameterMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentParameterMasterResult $res */
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

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentParameterMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentParameterMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentParameterMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentParameterMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentParameterMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentParameterMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeBalanceParameterStatusesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBalanceParameterStatusesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBalanceParameterStatusesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBalanceParameterStatusesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBalanceParameterStatusesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBalanceParameterStatusesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/balance";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getParameterName() !== null) {
            $queryStrings["parameterName"] = $this->request->getParameterName();
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

class DescribeBalanceParameterStatusesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBalanceParameterStatusesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBalanceParameterStatusesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBalanceParameterStatusesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBalanceParameterStatusesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBalanceParameterStatusesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/balance";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getParameterName() !== null) {
            $queryStrings["parameterName"] = $this->request->getParameterName();
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

class GetBalanceParameterStatusTask extends Gs2RestSessionTask {

    /**
     * @var GetBalanceParameterStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBalanceParameterStatusTask constructor.
     * @param Gs2RestSession $session
     * @param GetBalanceParameterStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBalanceParameterStatusRequest $request
    ) {
        parent::__construct(
            $session,
            GetBalanceParameterStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/balance/{parameterName}/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

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

class GetBalanceParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetBalanceParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBalanceParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetBalanceParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBalanceParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetBalanceParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/balance/{parameterName}/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

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

class DeleteBalanceParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteBalanceParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteBalanceParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteBalanceParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteBalanceParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteBalanceParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/balance/{parameterName}/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

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

class ReDrawBalanceParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ReDrawBalanceParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReDrawBalanceParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ReDrawBalanceParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReDrawBalanceParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ReDrawBalanceParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/balance/{parameterName}/{propertyId}/redraw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getFixedParameterNames() !== null) {
            $array = [];
            foreach ($this->request->getFixedParameterNames() as $item)
            {
                array_push($array, $item);
            }
            $json["fixedParameterNames"] = $array;
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

class ReDrawBalanceParameterStatusByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var ReDrawBalanceParameterStatusByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReDrawBalanceParameterStatusByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param ReDrawBalanceParameterStatusByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReDrawBalanceParameterStatusByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            ReDrawBalanceParameterStatusByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/balance/redraw";

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

class SetBalanceParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetBalanceParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetBalanceParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetBalanceParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetBalanceParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetBalanceParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/balance/{parameterName}/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getParameterValues() !== null) {
            $array = [];
            foreach ($this->request->getParameterValues() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["parameterValues"] = $array;
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

class SetBalanceParameterStatusByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetBalanceParameterStatusByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetBalanceParameterStatusByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetBalanceParameterStatusByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetBalanceParameterStatusByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetBalanceParameterStatusByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/balance/set";

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

class DescribeRarityParameterStatusesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRarityParameterStatusesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRarityParameterStatusesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRarityParameterStatusesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRarityParameterStatusesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRarityParameterStatusesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/rarity";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getParameterName() !== null) {
            $queryStrings["parameterName"] = $this->request->getParameterName();
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

class DescribeRarityParameterStatusesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRarityParameterStatusesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRarityParameterStatusesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRarityParameterStatusesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRarityParameterStatusesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRarityParameterStatusesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/rarity";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getParameterName() !== null) {
            $queryStrings["parameterName"] = $this->request->getParameterName();
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

class GetRarityParameterStatusTask extends Gs2RestSessionTask {

    /**
     * @var GetRarityParameterStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRarityParameterStatusTask constructor.
     * @param Gs2RestSession $session
     * @param GetRarityParameterStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRarityParameterStatusRequest $request
    ) {
        parent::__construct(
            $session,
            GetRarityParameterStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/rarity/{parameterName}/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

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

class GetRarityParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetRarityParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRarityParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetRarityParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRarityParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetRarityParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/rarity/{parameterName}/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

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

class DeleteRarityParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRarityParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRarityParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRarityParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRarityParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRarityParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/rarity/{parameterName}/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

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

class ReDrawRarityParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ReDrawRarityParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReDrawRarityParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ReDrawRarityParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReDrawRarityParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ReDrawRarityParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/rarity/{parameterName}/{propertyId}/redraw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getFixedParameterNames() !== null) {
            $array = [];
            foreach ($this->request->getFixedParameterNames() as $item)
            {
                array_push($array, $item);
            }
            $json["fixedParameterNames"] = $array;
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

class ReDrawRarityParameterStatusByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var ReDrawRarityParameterStatusByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReDrawRarityParameterStatusByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param ReDrawRarityParameterStatusByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReDrawRarityParameterStatusByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            ReDrawRarityParameterStatusByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/rarity/parameter/redraw";

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

class AddRarityParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddRarityParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddRarityParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddRarityParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddRarityParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddRarityParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/rarity/{parameterName}/{propertyId}/add";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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

class AddRarityParameterStatusByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AddRarityParameterStatusByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddRarityParameterStatusByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AddRarityParameterStatusByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddRarityParameterStatusByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AddRarityParameterStatusByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/rarity/parameter/add";

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

class VerifyRarityParameterStatusTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRarityParameterStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyRarityParameterStatusTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRarityParameterStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRarityParameterStatusRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyRarityParameterStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/rarity/{parameterName}/{propertyId}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getParameterValueName() !== null) {
            $json["parameterValueName"] = $this->request->getParameterValueName();
        }
        if ($this->request->getParameterCount() !== null) {
            $json["parameterCount"] = $this->request->getParameterCount();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyRarityParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRarityParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyRarityParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRarityParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRarityParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyRarityParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/rarity/{parameterName}/{propertyId}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getParameterValueName() !== null) {
            $json["parameterValueName"] = $this->request->getParameterValueName();
        }
        if ($this->request->getParameterCount() !== null) {
            $json["parameterCount"] = $this->request->getParameterCount();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyRarityParameterStatusByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRarityParameterStatusByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyRarityParameterStatusByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRarityParameterStatusByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRarityParameterStatusByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyRarityParameterStatusByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/rarity/parameter/verify";

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

class SetRarityParameterStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetRarityParameterStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRarityParameterStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetRarityParameterStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRarityParameterStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetRarityParameterStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/rarity/{parameterName}/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{parameterName}", $this->request->getParameterName() === null|| strlen($this->request->getParameterName()) == 0 ? "null" : $this->request->getParameterName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getParameterValues() !== null) {
            $array = [];
            foreach ($this->request->getParameterValues() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["parameterValues"] = $array;
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

class SetRarityParameterStatusByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetRarityParameterStatusByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRarityParameterStatusByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetRarityParameterStatusByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRarityParameterStatusByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetRarityParameterStatusByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enchant", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/rarity/parameter/set";

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
 * GS2-Enchant API client
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/
 */
class Gs2EnchantRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Balance Parameter Models
     *
     * @param DescribeBalanceParameterModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describebalanceparametermodels
     */
    public function describeBalanceParameterModelsAsync(
            DescribeBalanceParameterModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBalanceParameterModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Balance Parameter Models
     *
     * @param DescribeBalanceParameterModelsRequest $request
     * @return DescribeBalanceParameterModelsResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describebalanceparametermodels
     */
    public function describeBalanceParameterModels (
            DescribeBalanceParameterModelsRequest $request
    ): DescribeBalanceParameterModelsResult {
        return $this->describeBalanceParameterModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Balance Parameter Model
     *
     * @param GetBalanceParameterModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparametermodel
     */
    public function getBalanceParameterModelAsync(
            GetBalanceParameterModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBalanceParameterModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Balance Parameter Model
     *
     * @param GetBalanceParameterModelRequest $request
     * @return GetBalanceParameterModelResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparametermodel
     */
    public function getBalanceParameterModel (
            GetBalanceParameterModelRequest $request
    ): GetBalanceParameterModelResult {
        return $this->getBalanceParameterModelAsync(
            $request
        )->wait();
    }

    /**
     * List Balance Parameter Model Masters
     *
     * @param DescribeBalanceParameterModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describebalanceparametermodelmasters
     */
    public function describeBalanceParameterModelMastersAsync(
            DescribeBalanceParameterModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBalanceParameterModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Balance Parameter Model Masters
     *
     * @param DescribeBalanceParameterModelMastersRequest $request
     * @return DescribeBalanceParameterModelMastersResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describebalanceparametermodelmasters
     */
    public function describeBalanceParameterModelMasters (
            DescribeBalanceParameterModelMastersRequest $request
    ): DescribeBalanceParameterModelMastersResult {
        return $this->describeBalanceParameterModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Balance Parameter Model Master
     *
     * @param CreateBalanceParameterModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#createbalanceparametermodelmaster
     */
    public function createBalanceParameterModelMasterAsync(
            CreateBalanceParameterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateBalanceParameterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Balance Parameter Model Master
     *
     * @param CreateBalanceParameterModelMasterRequest $request
     * @return CreateBalanceParameterModelMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#createbalanceparametermodelmaster
     */
    public function createBalanceParameterModelMaster (
            CreateBalanceParameterModelMasterRequest $request
    ): CreateBalanceParameterModelMasterResult {
        return $this->createBalanceParameterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Balance Parameter Model Master Data
     *
     * @param GetBalanceParameterModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparametermodelmaster
     */
    public function getBalanceParameterModelMasterAsync(
            GetBalanceParameterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBalanceParameterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Balance Parameter Model Master Data
     *
     * @param GetBalanceParameterModelMasterRequest $request
     * @return GetBalanceParameterModelMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparametermodelmaster
     */
    public function getBalanceParameterModelMaster (
            GetBalanceParameterModelMasterRequest $request
    ): GetBalanceParameterModelMasterResult {
        return $this->getBalanceParameterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Balance Parameter Model Master
     *
     * @param UpdateBalanceParameterModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updatebalanceparametermodelmaster
     */
    public function updateBalanceParameterModelMasterAsync(
            UpdateBalanceParameterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateBalanceParameterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Balance Parameter Model Master
     *
     * @param UpdateBalanceParameterModelMasterRequest $request
     * @return UpdateBalanceParameterModelMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updatebalanceparametermodelmaster
     */
    public function updateBalanceParameterModelMaster (
            UpdateBalanceParameterModelMasterRequest $request
    ): UpdateBalanceParameterModelMasterResult {
        return $this->updateBalanceParameterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Balance Parameter Model Master
     *
     * @param DeleteBalanceParameterModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deletebalanceparametermodelmaster
     */
    public function deleteBalanceParameterModelMasterAsync(
            DeleteBalanceParameterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteBalanceParameterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Balance Parameter Model Master
     *
     * @param DeleteBalanceParameterModelMasterRequest $request
     * @return DeleteBalanceParameterModelMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deletebalanceparametermodelmaster
     */
    public function deleteBalanceParameterModelMaster (
            DeleteBalanceParameterModelMasterRequest $request
    ): DeleteBalanceParameterModelMasterResult {
        return $this->deleteBalanceParameterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * List Rarity Parameter Models
     *
     * @param DescribeRarityParameterModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describerarityparametermodels
     */
    public function describeRarityParameterModelsAsync(
            DescribeRarityParameterModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRarityParameterModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Rarity Parameter Models
     *
     * @param DescribeRarityParameterModelsRequest $request
     * @return DescribeRarityParameterModelsResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describerarityparametermodels
     */
    public function describeRarityParameterModels (
            DescribeRarityParameterModelsRequest $request
    ): DescribeRarityParameterModelsResult {
        return $this->describeRarityParameterModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Rarity Parameter Model
     *
     * @param GetRarityParameterModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getrarityparametermodel
     */
    public function getRarityParameterModelAsync(
            GetRarityParameterModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRarityParameterModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Rarity Parameter Model
     *
     * @param GetRarityParameterModelRequest $request
     * @return GetRarityParameterModelResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getrarityparametermodel
     */
    public function getRarityParameterModel (
            GetRarityParameterModelRequest $request
    ): GetRarityParameterModelResult {
        return $this->getRarityParameterModelAsync(
            $request
        )->wait();
    }

    /**
     * List Rarity Parameter Model Masters
     *
     * @param DescribeRarityParameterModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describerarityparametermodelmasters
     */
    public function describeRarityParameterModelMastersAsync(
            DescribeRarityParameterModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRarityParameterModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Rarity Parameter Model Masters
     *
     * @param DescribeRarityParameterModelMastersRequest $request
     * @return DescribeRarityParameterModelMastersResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describerarityparametermodelmasters
     */
    public function describeRarityParameterModelMasters (
            DescribeRarityParameterModelMastersRequest $request
    ): DescribeRarityParameterModelMastersResult {
        return $this->describeRarityParameterModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Rarity Parameter Model Master
     *
     * @param CreateRarityParameterModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#createrarityparametermodelmaster
     */
    public function createRarityParameterModelMasterAsync(
            CreateRarityParameterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateRarityParameterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Rarity Parameter Model Master
     *
     * @param CreateRarityParameterModelMasterRequest $request
     * @return CreateRarityParameterModelMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#createrarityparametermodelmaster
     */
    public function createRarityParameterModelMaster (
            CreateRarityParameterModelMasterRequest $request
    ): CreateRarityParameterModelMasterResult {
        return $this->createRarityParameterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Rarity Parameter Model Master
     *
     * @param GetRarityParameterModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getrarityparametermodelmaster
     */
    public function getRarityParameterModelMasterAsync(
            GetRarityParameterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRarityParameterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Rarity Parameter Model Master
     *
     * @param GetRarityParameterModelMasterRequest $request
     * @return GetRarityParameterModelMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getrarityparametermodelmaster
     */
    public function getRarityParameterModelMaster (
            GetRarityParameterModelMasterRequest $request
    ): GetRarityParameterModelMasterResult {
        return $this->getRarityParameterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Rarity Parameter Model Master
     *
     * @param UpdateRarityParameterModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updaterarityparametermodelmaster
     */
    public function updateRarityParameterModelMasterAsync(
            UpdateRarityParameterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateRarityParameterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Rarity Parameter Model Master
     *
     * @param UpdateRarityParameterModelMasterRequest $request
     * @return UpdateRarityParameterModelMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updaterarityparametermodelmaster
     */
    public function updateRarityParameterModelMaster (
            UpdateRarityParameterModelMasterRequest $request
    ): UpdateRarityParameterModelMasterResult {
        return $this->updateRarityParameterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Rarity Parameter Model Master
     *
     * @param DeleteRarityParameterModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deleterarityparametermodelmaster
     */
    public function deleteRarityParameterModelMasterAsync(
            DeleteRarityParameterModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRarityParameterModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Rarity Parameter Model Master
     *
     * @param DeleteRarityParameterModelMasterRequest $request
     * @return DeleteRarityParameterModelMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deleterarityparametermodelmaster
     */
    public function deleteRarityParameterModelMaster (
            DeleteRarityParameterModelMasterRequest $request
    ): DeleteRarityParameterModelMasterResult {
        return $this->deleteRarityParameterModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Export Parameter Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#exportmaster
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
     * Export Parameter Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Parameter Model master data
     *
     * @param GetCurrentParameterMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getcurrentparametermaster
     */
    public function getCurrentParameterMasterAsync(
            GetCurrentParameterMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentParameterMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get currently active Parameter Model master data
     *
     * @param GetCurrentParameterMasterRequest $request
     * @return GetCurrentParameterMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getcurrentparametermaster
     */
    public function getCurrentParameterMaster (
            GetCurrentParameterMasterRequest $request
    ): GetCurrentParameterMasterResult {
        return $this->getCurrentParameterMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Parameter Model master data (3-phase version)
     *
     * @param PreUpdateCurrentParameterMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#preupdatecurrentparametermaster
     */
    public function preUpdateCurrentParameterMasterAsync(
            PreUpdateCurrentParameterMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentParameterMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Parameter Model master data (3-phase version)
     *
     * @param PreUpdateCurrentParameterMasterRequest $request
     * @return PreUpdateCurrentParameterMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#preupdatecurrentparametermaster
     */
    public function preUpdateCurrentParameterMaster (
            PreUpdateCurrentParameterMasterRequest $request
    ): PreUpdateCurrentParameterMasterResult {
        return $this->preUpdateCurrentParameterMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Parameter Model master data
     *
     * @param UpdateCurrentParameterMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updatecurrentparametermaster
     */
    public function updateCurrentParameterMasterAsync(
            UpdateCurrentParameterMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentParameterMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Parameter Model master data
     *
     * @param UpdateCurrentParameterMasterRequest $request
     * @return UpdateCurrentParameterMasterResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updatecurrentparametermaster
     */
    public function updateCurrentParameterMaster (
            UpdateCurrentParameterMasterRequest $request
    ): UpdateCurrentParameterMasterResult {
        return $this->updateCurrentParameterMasterAsync(
            $request
        )->wait();
    }

    /**
     * Updates currently active Parameter Model master data from GitHub
     *
     * @param UpdateCurrentParameterMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updatecurrentparametermasterfromgithub
     */
    public function updateCurrentParameterMasterFromGitHubAsync(
            UpdateCurrentParameterMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentParameterMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Updates currently active Parameter Model master data from GitHub
     *
     * @param UpdateCurrentParameterMasterFromGitHubRequest $request
     * @return UpdateCurrentParameterMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#updatecurrentparametermasterfromgithub
     */
    public function updateCurrentParameterMasterFromGitHub (
            UpdateCurrentParameterMasterFromGitHubRequest $request
    ): UpdateCurrentParameterMasterFromGitHubResult {
        return $this->updateCurrentParameterMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * List Balance Parameter Statuses
     *
     * @param DescribeBalanceParameterStatusesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describebalanceparameterstatuses
     */
    public function describeBalanceParameterStatusesAsync(
            DescribeBalanceParameterStatusesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBalanceParameterStatusesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Balance Parameter Statuses
     *
     * @param DescribeBalanceParameterStatusesRequest $request
     * @return DescribeBalanceParameterStatusesResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describebalanceparameterstatuses
     */
    public function describeBalanceParameterStatuses (
            DescribeBalanceParameterStatusesRequest $request
    ): DescribeBalanceParameterStatusesResult {
        return $this->describeBalanceParameterStatusesAsync(
            $request
        )->wait();
    }

    /**
     * List Balance Parameter Statuses by User ID
     *
     * @param DescribeBalanceParameterStatusesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describebalanceparameterstatusesbyuserid
     */
    public function describeBalanceParameterStatusesByUserIdAsync(
            DescribeBalanceParameterStatusesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBalanceParameterStatusesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Balance Parameter Statuses by User ID
     *
     * @param DescribeBalanceParameterStatusesByUserIdRequest $request
     * @return DescribeBalanceParameterStatusesByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describebalanceparameterstatusesbyuserid
     */
    public function describeBalanceParameterStatusesByUserId (
            DescribeBalanceParameterStatusesByUserIdRequest $request
    ): DescribeBalanceParameterStatusesByUserIdResult {
        return $this->describeBalanceParameterStatusesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Balance Parameter Status
     *
     * @param GetBalanceParameterStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparameterstatus
     */
    public function getBalanceParameterStatusAsync(
            GetBalanceParameterStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBalanceParameterStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Balance Parameter Status
     *
     * @param GetBalanceParameterStatusRequest $request
     * @return GetBalanceParameterStatusResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparameterstatus
     */
    public function getBalanceParameterStatus (
            GetBalanceParameterStatusRequest $request
    ): GetBalanceParameterStatusResult {
        return $this->getBalanceParameterStatusAsync(
            $request
        )->wait();
    }

    /**
     * Get Balance Parameter Status by User ID
     *
     * @param GetBalanceParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparameterstatusbyuserid
     */
    public function getBalanceParameterStatusByUserIdAsync(
            GetBalanceParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBalanceParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Balance Parameter Status by User ID
     *
     * @param GetBalanceParameterStatusByUserIdRequest $request
     * @return GetBalanceParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getbalanceparameterstatusbyuserid
     */
    public function getBalanceParameterStatusByUserId (
            GetBalanceParameterStatusByUserIdRequest $request
    ): GetBalanceParameterStatusByUserIdResult {
        return $this->getBalanceParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Balance Parameter Status
     *
     * @param DeleteBalanceParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deletebalanceparameterstatusbyuserid
     */
    public function deleteBalanceParameterStatusByUserIdAsync(
            DeleteBalanceParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteBalanceParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Balance Parameter Status
     *
     * @param DeleteBalanceParameterStatusByUserIdRequest $request
     * @return DeleteBalanceParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deletebalanceparameterstatusbyuserid
     */
    public function deleteBalanceParameterStatusByUserId (
            DeleteBalanceParameterStatusByUserIdRequest $request
    ): DeleteBalanceParameterStatusByUserIdResult {
        return $this->deleteBalanceParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Re-draw balance parameter by User ID
     *
     * @param ReDrawBalanceParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#redrawbalanceparameterstatusbyuserid
     */
    public function reDrawBalanceParameterStatusByUserIdAsync(
            ReDrawBalanceParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReDrawBalanceParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Re-draw balance parameter by User ID
     *
     * @param ReDrawBalanceParameterStatusByUserIdRequest $request
     * @return ReDrawBalanceParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#redrawbalanceparameterstatusbyuserid
     */
    public function reDrawBalanceParameterStatusByUserId (
            ReDrawBalanceParameterStatusByUserIdRequest $request
    ): ReDrawBalanceParameterStatusByUserIdResult {
        return $this->reDrawBalanceParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute re-draw of Balance Parameter Status as acquire action
     *
     * @param ReDrawBalanceParameterStatusByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantredrawbalanceparameterstatusbyuserid
     */
    public function reDrawBalanceParameterStatusByStampSheetAsync(
            ReDrawBalanceParameterStatusByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReDrawBalanceParameterStatusByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute re-draw of Balance Parameter Status as acquire action
     *
     * @param ReDrawBalanceParameterStatusByStampSheetRequest $request
     * @return ReDrawBalanceParameterStatusByStampSheetResult
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantredrawbalanceparameterstatusbyuserid
     */
    public function reDrawBalanceParameterStatusByStampSheet (
            ReDrawBalanceParameterStatusByStampSheetRequest $request
    ): ReDrawBalanceParameterStatusByStampSheetResult {
        return $this->reDrawBalanceParameterStatusByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Set any value to Balance Parameter Status by User ID
     *
     * @param SetBalanceParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#setbalanceparameterstatusbyuserid
     */
    public function setBalanceParameterStatusByUserIdAsync(
            SetBalanceParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetBalanceParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Set any value to Balance Parameter Status by User ID
     *
     * @param SetBalanceParameterStatusByUserIdRequest $request
     * @return SetBalanceParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#setbalanceparameterstatusbyuserid
     */
    public function setBalanceParameterStatusByUserId (
            SetBalanceParameterStatusByUserIdRequest $request
    ): SetBalanceParameterStatusByUserIdResult {
        return $this->setBalanceParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute setting any value to Balance Parameter Status as acquire action
     *
     * @param SetBalanceParameterStatusByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantsetbalanceparameterstatusbyuserid
     */
    public function setBalanceParameterStatusByStampSheetAsync(
            SetBalanceParameterStatusByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetBalanceParameterStatusByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute setting any value to Balance Parameter Status as acquire action
     *
     * @param SetBalanceParameterStatusByStampSheetRequest $request
     * @return SetBalanceParameterStatusByStampSheetResult
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantsetbalanceparameterstatusbyuserid
     */
    public function setBalanceParameterStatusByStampSheet (
            SetBalanceParameterStatusByStampSheetRequest $request
    ): SetBalanceParameterStatusByStampSheetResult {
        return $this->setBalanceParameterStatusByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * List Rarity Parameter Statuses
     *
     * @param DescribeRarityParameterStatusesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describerarityparameterstatuses
     */
    public function describeRarityParameterStatusesAsync(
            DescribeRarityParameterStatusesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRarityParameterStatusesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Rarity Parameter Statuses
     *
     * @param DescribeRarityParameterStatusesRequest $request
     * @return DescribeRarityParameterStatusesResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describerarityparameterstatuses
     */
    public function describeRarityParameterStatuses (
            DescribeRarityParameterStatusesRequest $request
    ): DescribeRarityParameterStatusesResult {
        return $this->describeRarityParameterStatusesAsync(
            $request
        )->wait();
    }

    /**
     * List Rarity Parameter Statuses by User ID
     *
     * @param DescribeRarityParameterStatusesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describerarityparameterstatusesbyuserid
     */
    public function describeRarityParameterStatusesByUserIdAsync(
            DescribeRarityParameterStatusesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRarityParameterStatusesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Rarity Parameter Statuses by User ID
     *
     * @param DescribeRarityParameterStatusesByUserIdRequest $request
     * @return DescribeRarityParameterStatusesByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#describerarityparameterstatusesbyuserid
     */
    public function describeRarityParameterStatusesByUserId (
            DescribeRarityParameterStatusesByUserIdRequest $request
    ): DescribeRarityParameterStatusesByUserIdResult {
        return $this->describeRarityParameterStatusesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Rarity Parameter Status
     *
     * @param GetRarityParameterStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getrarityparameterstatus
     */
    public function getRarityParameterStatusAsync(
            GetRarityParameterStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRarityParameterStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Rarity Parameter Status
     *
     * @param GetRarityParameterStatusRequest $request
     * @return GetRarityParameterStatusResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getrarityparameterstatus
     */
    public function getRarityParameterStatus (
            GetRarityParameterStatusRequest $request
    ): GetRarityParameterStatusResult {
        return $this->getRarityParameterStatusAsync(
            $request
        )->wait();
    }

    /**
     * Get Rarity Parameter Status by User ID
     *
     * @param GetRarityParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getrarityparameterstatusbyuserid
     */
    public function getRarityParameterStatusByUserIdAsync(
            GetRarityParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRarityParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Rarity Parameter Status by User ID
     *
     * @param GetRarityParameterStatusByUserIdRequest $request
     * @return GetRarityParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#getrarityparameterstatusbyuserid
     */
    public function getRarityParameterStatusByUserId (
            GetRarityParameterStatusByUserIdRequest $request
    ): GetRarityParameterStatusByUserIdResult {
        return $this->getRarityParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Rarity Parameter Status
     *
     * @param DeleteRarityParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deleterarityparameterstatusbyuserid
     */
    public function deleteRarityParameterStatusByUserIdAsync(
            DeleteRarityParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRarityParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Rarity Parameter Status
     *
     * @param DeleteRarityParameterStatusByUserIdRequest $request
     * @return DeleteRarityParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#deleterarityparameterstatusbyuserid
     */
    public function deleteRarityParameterStatusByUserId (
            DeleteRarityParameterStatusByUserIdRequest $request
    ): DeleteRarityParameterStatusByUserIdResult {
        return $this->deleteRarityParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Re-draw Rarity Parameter Status by User ID
     *
     * @param ReDrawRarityParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#redrawrarityparameterstatusbyuserid
     */
    public function reDrawRarityParameterStatusByUserIdAsync(
            ReDrawRarityParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReDrawRarityParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Re-draw Rarity Parameter Status by User ID
     *
     * @param ReDrawRarityParameterStatusByUserIdRequest $request
     * @return ReDrawRarityParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#redrawrarityparameterstatusbyuserid
     */
    public function reDrawRarityParameterStatusByUserId (
            ReDrawRarityParameterStatusByUserIdRequest $request
    ): ReDrawRarityParameterStatusByUserIdResult {
        return $this->reDrawRarityParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute re-draw Rarity Parameter Status as an acquire action
     *
     * @param ReDrawRarityParameterStatusByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantredrawrarityparameterstatusbyuserid
     */
    public function reDrawRarityParameterStatusByStampSheetAsync(
            ReDrawRarityParameterStatusByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReDrawRarityParameterStatusByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute re-draw Rarity Parameter Status as an acquire action
     *
     * @param ReDrawRarityParameterStatusByStampSheetRequest $request
     * @return ReDrawRarityParameterStatusByStampSheetResult
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantredrawrarityparameterstatusbyuserid
     */
    public function reDrawRarityParameterStatusByStampSheet (
            ReDrawRarityParameterStatusByStampSheetRequest $request
    ): ReDrawRarityParameterStatusByStampSheetResult {
        return $this->reDrawRarityParameterStatusByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Add Rarity Parameter Status by User ID
     *
     * @param AddRarityParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#addrarityparameterstatusbyuserid
     */
    public function addRarityParameterStatusByUserIdAsync(
            AddRarityParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddRarityParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Add Rarity Parameter Status by User ID
     *
     * @param AddRarityParameterStatusByUserIdRequest $request
     * @return AddRarityParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#addrarityparameterstatusbyuserid
     */
    public function addRarityParameterStatusByUserId (
            AddRarityParameterStatusByUserIdRequest $request
    ): AddRarityParameterStatusByUserIdResult {
        return $this->addRarityParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute add rarity parameter as an acquire action
     *
     * @param AddRarityParameterStatusByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantaddrarityparameterstatusbyuserid
     */
    public function addRarityParameterStatusByStampSheetAsync(
            AddRarityParameterStatusByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddRarityParameterStatusByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute add rarity parameter as an acquire action
     *
     * @param AddRarityParameterStatusByStampSheetRequest $request
     * @return AddRarityParameterStatusByStampSheetResult
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantaddrarityparameterstatusbyuserid
     */
    public function addRarityParameterStatusByStampSheet (
            AddRarityParameterStatusByStampSheetRequest $request
    ): AddRarityParameterStatusByStampSheetResult {
        return $this->addRarityParameterStatusByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Verify rarity parameter
     *
     * @param VerifyRarityParameterStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#verifyrarityparameterstatus
     */
    public function verifyRarityParameterStatusAsync(
            VerifyRarityParameterStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyRarityParameterStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify rarity parameter
     *
     * @param VerifyRarityParameterStatusRequest $request
     * @return VerifyRarityParameterStatusResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#verifyrarityparameterstatus
     */
    public function verifyRarityParameterStatus (
            VerifyRarityParameterStatusRequest $request
    ): VerifyRarityParameterStatusResult {
        return $this->verifyRarityParameterStatusAsync(
            $request
        )->wait();
    }

    /**
     * Verify rarity parameter by User ID
     *
     * @param VerifyRarityParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#verifyrarityparameterstatusbyuserid
     */
    public function verifyRarityParameterStatusByUserIdAsync(
            VerifyRarityParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyRarityParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify rarity parameter by User ID
     *
     * @param VerifyRarityParameterStatusByUserIdRequest $request
     * @return VerifyRarityParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#verifyrarityparameterstatusbyuserid
     */
    public function verifyRarityParameterStatusByUserId (
            VerifyRarityParameterStatusByUserIdRequest $request
    ): VerifyRarityParameterStatusByUserIdResult {
        return $this->verifyRarityParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute verification of rarity parameter as a verify action
     *
     * @param VerifyRarityParameterStatusByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantverifyrarityparameterstatusbyuserid
     */
    public function verifyRarityParameterStatusByStampTaskAsync(
            VerifyRarityParameterStatusByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyRarityParameterStatusByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute verification of rarity parameter as a verify action
     *
     * @param VerifyRarityParameterStatusByStampTaskRequest $request
     * @return VerifyRarityParameterStatusByStampTaskResult
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantverifyrarityparameterstatusbyuserid
     */
    public function verifyRarityParameterStatusByStampTask (
            VerifyRarityParameterStatusByStampTaskRequest $request
    ): VerifyRarityParameterStatusByStampTaskResult {
        return $this->verifyRarityParameterStatusByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Set any value to rarity parameter by User ID
     *
     * @param SetRarityParameterStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#setrarityparameterstatusbyuserid
     */
    public function setRarityParameterStatusByUserIdAsync(
            SetRarityParameterStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRarityParameterStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Set any value to rarity parameter by User ID
     *
     * @param SetRarityParameterStatusByUserIdRequest $request
     * @return SetRarityParameterStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/enchant/sdk/#setrarityparameterstatusbyuserid
     */
    public function setRarityParameterStatusByUserId (
            SetRarityParameterStatusByUserIdRequest $request
    ): SetRarityParameterStatusByUserIdResult {
        return $this->setRarityParameterStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute setting any value to rarity parameter as an acquire action
     *
     * @param SetRarityParameterStatusByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantsetrarityparameterstatusbyuserid
     */
    public function setRarityParameterStatusByStampSheetAsync(
            SetRarityParameterStatusByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRarityParameterStatusByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute setting any value to rarity parameter as an acquire action
     *
     * @param SetRarityParameterStatusByStampSheetRequest $request
     * @return SetRarityParameterStatusByStampSheetResult
     * @see https://docs.gs2.io/api_reference/enchant/stamp_sheet/#gs2enchantsetrarityparameterstatusbyuserid
     */
    public function setRarityParameterStatusByStampSheet (
            SetRarityParameterStatusByStampSheetRequest $request
    ): SetRarityParameterStatusByStampSheetResult {
        return $this->setRarityParameterStatusByStampSheetAsync(
            $request
        )->wait();
    }
}