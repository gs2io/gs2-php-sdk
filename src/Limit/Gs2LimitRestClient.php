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

namespace Gs2\Limit;

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


use Gs2\Limit\Request\DescribeNamespacesRequest;
use Gs2\Limit\Result\DescribeNamespacesResult;
use Gs2\Limit\Request\CreateNamespaceRequest;
use Gs2\Limit\Result\CreateNamespaceResult;
use Gs2\Limit\Request\GetNamespaceStatusRequest;
use Gs2\Limit\Result\GetNamespaceStatusResult;
use Gs2\Limit\Request\GetNamespaceRequest;
use Gs2\Limit\Result\GetNamespaceResult;
use Gs2\Limit\Request\UpdateNamespaceRequest;
use Gs2\Limit\Result\UpdateNamespaceResult;
use Gs2\Limit\Request\DeleteNamespaceRequest;
use Gs2\Limit\Result\DeleteNamespaceResult;
use Gs2\Limit\Request\GetServiceVersionRequest;
use Gs2\Limit\Result\GetServiceVersionResult;
use Gs2\Limit\Request\DumpUserDataByUserIdRequest;
use Gs2\Limit\Result\DumpUserDataByUserIdResult;
use Gs2\Limit\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Limit\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Limit\Request\CleanUserDataByUserIdRequest;
use Gs2\Limit\Result\CleanUserDataByUserIdResult;
use Gs2\Limit\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Limit\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Limit\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Limit\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Limit\Request\ImportUserDataByUserIdRequest;
use Gs2\Limit\Result\ImportUserDataByUserIdResult;
use Gs2\Limit\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Limit\Result\CheckImportUserDataByUserIdResult;
use Gs2\Limit\Request\DescribeCountersRequest;
use Gs2\Limit\Result\DescribeCountersResult;
use Gs2\Limit\Request\DescribeCountersByUserIdRequest;
use Gs2\Limit\Result\DescribeCountersByUserIdResult;
use Gs2\Limit\Request\GetCounterRequest;
use Gs2\Limit\Result\GetCounterResult;
use Gs2\Limit\Request\GetCounterByUserIdRequest;
use Gs2\Limit\Result\GetCounterByUserIdResult;
use Gs2\Limit\Request\CountUpRequest;
use Gs2\Limit\Result\CountUpResult;
use Gs2\Limit\Request\CountUpByUserIdRequest;
use Gs2\Limit\Result\CountUpByUserIdResult;
use Gs2\Limit\Request\CountDownByUserIdRequest;
use Gs2\Limit\Result\CountDownByUserIdResult;
use Gs2\Limit\Request\DeleteCounterByUserIdRequest;
use Gs2\Limit\Result\DeleteCounterByUserIdResult;
use Gs2\Limit\Request\VerifyCounterRequest;
use Gs2\Limit\Result\VerifyCounterResult;
use Gs2\Limit\Request\VerifyCounterByUserIdRequest;
use Gs2\Limit\Result\VerifyCounterByUserIdResult;
use Gs2\Limit\Request\CountUpByStampTaskRequest;
use Gs2\Limit\Result\CountUpByStampTaskResult;
use Gs2\Limit\Request\CountDownByStampSheetRequest;
use Gs2\Limit\Result\CountDownByStampSheetResult;
use Gs2\Limit\Request\DeleteByStampSheetRequest;
use Gs2\Limit\Result\DeleteByStampSheetResult;
use Gs2\Limit\Request\VerifyCounterByStampTaskRequest;
use Gs2\Limit\Result\VerifyCounterByStampTaskResult;
use Gs2\Limit\Request\DescribeLimitModelMastersRequest;
use Gs2\Limit\Result\DescribeLimitModelMastersResult;
use Gs2\Limit\Request\CreateLimitModelMasterRequest;
use Gs2\Limit\Result\CreateLimitModelMasterResult;
use Gs2\Limit\Request\GetLimitModelMasterRequest;
use Gs2\Limit\Result\GetLimitModelMasterResult;
use Gs2\Limit\Request\UpdateLimitModelMasterRequest;
use Gs2\Limit\Result\UpdateLimitModelMasterResult;
use Gs2\Limit\Request\DeleteLimitModelMasterRequest;
use Gs2\Limit\Result\DeleteLimitModelMasterResult;
use Gs2\Limit\Request\ExportMasterRequest;
use Gs2\Limit\Result\ExportMasterResult;
use Gs2\Limit\Request\GetCurrentLimitMasterRequest;
use Gs2\Limit\Result\GetCurrentLimitMasterResult;
use Gs2\Limit\Request\PreUpdateCurrentLimitMasterRequest;
use Gs2\Limit\Result\PreUpdateCurrentLimitMasterResult;
use Gs2\Limit\Request\UpdateCurrentLimitMasterRequest;
use Gs2\Limit\Result\UpdateCurrentLimitMasterResult;
use Gs2\Limit\Request\UpdateCurrentLimitMasterFromGitHubRequest;
use Gs2\Limit\Result\UpdateCurrentLimitMasterFromGitHubResult;
use Gs2\Limit\Request\DescribeLimitModelsRequest;
use Gs2\Limit\Result\DescribeLimitModelsResult;
use Gs2\Limit\Request\GetLimitModelRequest;
use Gs2\Limit\Result\GetLimitModelResult;

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getCountUpScript() !== null) {
            $json["countUpScript"] = $this->request->getCountUpScript()->toJson();
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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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
        if ($this->request->getCountUpScript() !== null) {
            $json["countUpScript"] = $this->request->getCountUpScript()->toJson();
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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeCountersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCountersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCountersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCountersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCountersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCountersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getLimitName() !== null) {
            $queryStrings["limitName"] = $this->request->getLimitName();
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

class DescribeCountersByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCountersByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCountersByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCountersByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCountersByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCountersByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getLimitName() !== null) {
            $queryStrings["limitName"] = $this->request->getLimitName();
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

class GetCounterTask extends Gs2RestSessionTask {

    /**
     * @var GetCounterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCounterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCounterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCounterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCounterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class GetCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class CountUpTask extends Gs2RestSessionTask {

    /**
     * @var CountUpRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountUpTask constructor.
     * @param Gs2RestSession $session
     * @param CountUpRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountUpRequest $request
    ) {
        parent::__construct(
            $session,
            CountUpResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

        $json = [];
        if ($this->request->getCountUpValue() !== null) {
            $json["countUpValue"] = $this->request->getCountUpValue();
        }
        if ($this->request->getMaxValue() !== null) {
            $json["maxValue"] = $this->request->getMaxValue();
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

class CountUpByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CountUpByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountUpByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CountUpByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountUpByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CountUpByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCountUpValue() !== null) {
            $json["countUpValue"] = $this->request->getCountUpValue();
        }
        if ($this->request->getMaxValue() !== null) {
            $json["maxValue"] = $this->request->getMaxValue();
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

class CountDownByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CountDownByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountDownByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CountDownByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountDownByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CountDownByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{limitName}/{counterName}/decrease";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCountDownValue() !== null) {
            $json["countDownValue"] = $this->request->getCountDownValue();
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

class DeleteCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class VerifyCounterTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCounterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCounterTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCounterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCounterRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCounterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter/{limitName}/{counterName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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

class VerifyCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{limitName}/{counterName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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

class CountUpByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var CountUpByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountUpByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param CountUpByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountUpByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            CountUpByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/counter/increase";

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

class CountDownByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var CountDownByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountDownByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param CountDownByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountDownByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            CountDownByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/counter/decrease";

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

class DeleteByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var DeleteByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/counter/delete";

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

class VerifyCounterByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCounterByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCounterByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCounterByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCounterByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCounterByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/counter/verify";

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

class DescribeLimitModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLimitModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLimitModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLimitModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLimitModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLimitModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit";

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

class CreateLimitModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateLimitModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateLimitModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateLimitModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateLimitModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateLimitModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit";

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
        if ($this->request->getResetType() !== null) {
            $json["resetType"] = $this->request->getResetType();
        }
        if ($this->request->getResetDayOfMonth() !== null) {
            $json["resetDayOfMonth"] = $this->request->getResetDayOfMonth();
        }
        if ($this->request->getResetDayOfWeek() !== null) {
            $json["resetDayOfWeek"] = $this->request->getResetDayOfWeek();
        }
        if ($this->request->getResetHour() !== null) {
            $json["resetHour"] = $this->request->getResetHour();
        }
        if ($this->request->getAnchorTimestamp() !== null) {
            $json["anchorTimestamp"] = $this->request->getAnchorTimestamp();
        }
        if ($this->request->getDays() !== null) {
            $json["days"] = $this->request->getDays();
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

class GetLimitModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetLimitModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLimitModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetLimitModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLimitModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetLimitModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit/{limitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

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

class UpdateLimitModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateLimitModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateLimitModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateLimitModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateLimitModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateLimitModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit/{limitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getResetType() !== null) {
            $json["resetType"] = $this->request->getResetType();
        }
        if ($this->request->getResetDayOfMonth() !== null) {
            $json["resetDayOfMonth"] = $this->request->getResetDayOfMonth();
        }
        if ($this->request->getResetDayOfWeek() !== null) {
            $json["resetDayOfWeek"] = $this->request->getResetDayOfWeek();
        }
        if ($this->request->getResetHour() !== null) {
            $json["resetHour"] = $this->request->getResetHour();
        }
        if ($this->request->getAnchorTimestamp() !== null) {
            $json["anchorTimestamp"] = $this->request->getAnchorTimestamp();
        }
        if ($this->request->getDays() !== null) {
            $json["days"] = $this->request->getDays();
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

class DeleteLimitModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteLimitModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteLimitModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteLimitModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteLimitModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteLimitModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit/{limitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentLimitMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentLimitMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentLimitMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentLimitMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentLimitMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentLimitMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentLimitMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentLimitMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentLimitMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentLimitMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentLimitMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentLimitMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentLimitMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentLimitMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentLimitMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentLimitMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentLimitMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentLimitMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentLimitMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentLimitMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentLimitMasterResult $res */
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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentLimitMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentLimitMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentLimitMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentLimitMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentLimitMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentLimitMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeLimitModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLimitModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLimitModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLimitModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLimitModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLimitModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/limit";

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

class GetLimitModelTask extends Gs2RestSessionTask {

    /**
     * @var GetLimitModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLimitModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetLimitModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLimitModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetLimitModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/limit/{limitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

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
 * GS2-Limit API client
 *
 * @see https://docs.gs2.io/api_reference/limit/sdk/
 */
class Gs2LimitRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/limit/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Counters
     *
     * @param DescribeCountersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describecounters
     */
    public function describeCountersAsync(
            DescribeCountersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCountersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Counters
     *
     * @param DescribeCountersRequest $request
     * @return DescribeCountersResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describecounters
     */
    public function describeCounters (
            DescribeCountersRequest $request
    ): DescribeCountersResult {
        return $this->describeCountersAsync(
            $request
        )->wait();
    }

    /**
     * List Counters by User ID
     *
     * @param DescribeCountersByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describecountersbyuserid
     */
    public function describeCountersByUserIdAsync(
            DescribeCountersByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCountersByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Counters by User ID
     *
     * @param DescribeCountersByUserIdRequest $request
     * @return DescribeCountersByUserIdResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describecountersbyuserid
     */
    public function describeCountersByUserId (
            DescribeCountersByUserIdRequest $request
    ): DescribeCountersByUserIdResult {
        return $this->describeCountersByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get a Counter
     *
     * @param GetCounterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getcounter
     */
    public function getCounterAsync(
            GetCounterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCounterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get a Counter
     *
     * @param GetCounterRequest $request
     * @return GetCounterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getcounter
     */
    public function getCounter (
            GetCounterRequest $request
    ): GetCounterResult {
        return $this->getCounterAsync(
            $request
        )->wait();
    }

    /**
     * Get a Counter by User ID
     *
     * @param GetCounterByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getcounterbyuserid
     */
    public function getCounterByUserIdAsync(
            GetCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get a Counter by User ID
     *
     * @param GetCounterByUserIdRequest $request
     * @return GetCounterByUserIdResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getcounterbyuserid
     */
    public function getCounterByUserId (
            GetCounterByUserIdRequest $request
    ): GetCounterByUserIdResult {
        return $this->getCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Count-up
     *
     * @param CountUpRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#countup
     */
    public function countUpAsync(
            CountUpRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountUpTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Count-up
     *
     * @param CountUpRequest $request
     * @return CountUpResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#countup
     */
    public function countUp (
            CountUpRequest $request
    ): CountUpResult {
        return $this->countUpAsync(
            $request
        )->wait();
    }

    /**
     * Count-up by User ID
     *
     * @param CountUpByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#countupbyuserid
     */
    public function countUpByUserIdAsync(
            CountUpByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountUpByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Count-up by User ID
     *
     * @param CountUpByUserIdRequest $request
     * @return CountUpByUserIdResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#countupbyuserid
     */
    public function countUpByUserId (
            CountUpByUserIdRequest $request
    ): CountUpByUserIdResult {
        return $this->countUpByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Count-down by User ID
     *
     * @param CountDownByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#countdownbyuserid
     */
    public function countDownByUserIdAsync(
            CountDownByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountDownByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Count-down by User ID
     *
     * @param CountDownByUserIdRequest $request
     * @return CountDownByUserIdResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#countdownbyuserid
     */
    public function countDownByUserId (
            CountDownByUserIdRequest $request
    ): CountDownByUserIdResult {
        return $this->countDownByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Counter by User ID
     *
     * @param DeleteCounterByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#deletecounterbyuserid
     */
    public function deleteCounterByUserIdAsync(
            DeleteCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Counter by User ID
     *
     * @param DeleteCounterByUserIdRequest $request
     * @return DeleteCounterByUserIdResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#deletecounterbyuserid
     */
    public function deleteCounterByUserId (
            DeleteCounterByUserIdRequest $request
    ): DeleteCounterByUserIdResult {
        return $this->deleteCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Verify Counter value
     *
     * @param VerifyCounterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#verifycounter
     */
    public function verifyCounterAsync(
            VerifyCounterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCounterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify Counter value
     *
     * @param VerifyCounterRequest $request
     * @return VerifyCounterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#verifycounter
     */
    public function verifyCounter (
            VerifyCounterRequest $request
    ): VerifyCounterResult {
        return $this->verifyCounterAsync(
            $request
        )->wait();
    }

    /**
     * Verify Counter value by User ID
     *
     * @param VerifyCounterByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#verifycounterbyuserid
     */
    public function verifyCounterByUserIdAsync(
            VerifyCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify Counter value by User ID
     *
     * @param VerifyCounterByUserIdRequest $request
     * @return VerifyCounterByUserIdResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#verifycounterbyuserid
     */
    public function verifyCounterByUserId (
            VerifyCounterByUserIdRequest $request
    ): VerifyCounterByUserIdResult {
        return $this->verifyCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute count-up as consume action
     *
     * @param CountUpByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitcountupbyuserid
     */
    public function countUpByStampTaskAsync(
            CountUpByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountUpByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute count-up as consume action
     *
     * @param CountUpByStampTaskRequest $request
     * @return CountUpByStampTaskResult
     * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitcountupbyuserid
     */
    public function countUpByStampTask (
            CountUpByStampTaskRequest $request
    ): CountUpByStampTaskResult {
        return $this->countUpByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Execute count-down as an acquire action
     *
     * @param CountDownByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitcountdownbyuserid
     */
    public function countDownByStampSheetAsync(
            CountDownByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountDownByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute count-down as an acquire action
     *
     * @param CountDownByStampSheetRequest $request
     * @return CountDownByStampSheetResult
     * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitcountdownbyuserid
     */
    public function countDownByStampSheet (
            CountDownByStampSheetRequest $request
    ): CountDownByStampSheetResult {
        return $this->countDownByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute Counter deletion as an acquire action
     *
     * @param DeleteByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitdeletecounterbyuserid
     */
    public function deleteByStampSheetAsync(
            DeleteByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute Counter deletion as an acquire action
     *
     * @param DeleteByStampSheetRequest $request
     * @return DeleteByStampSheetResult
     * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitdeletecounterbyuserid
     */
    public function deleteByStampSheet (
            DeleteByStampSheetRequest $request
    ): DeleteByStampSheetResult {
        return $this->deleteByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute Counter value verification as a verify action
     *
     * @param VerifyCounterByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitverifycounterbyuserid
     */
    public function verifyCounterByStampTaskAsync(
            VerifyCounterByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCounterByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute Counter value verification as a verify action
     *
     * @param VerifyCounterByStampTaskRequest $request
     * @return VerifyCounterByStampTaskResult
     * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitverifycounterbyuserid
     */
    public function verifyCounterByStampTask (
            VerifyCounterByStampTaskRequest $request
    ): VerifyCounterByStampTaskResult {
        return $this->verifyCounterByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * List Usage Limit Model Masters
     *
     * @param DescribeLimitModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describelimitmodelmasters
     */
    public function describeLimitModelMastersAsync(
            DescribeLimitModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLimitModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Usage Limit Model Masters
     *
     * @param DescribeLimitModelMastersRequest $request
     * @return DescribeLimitModelMastersResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describelimitmodelmasters
     */
    public function describeLimitModelMasters (
            DescribeLimitModelMastersRequest $request
    ): DescribeLimitModelMastersResult {
        return $this->describeLimitModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Usage Limit Model Master
     *
     * @param CreateLimitModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#createlimitmodelmaster
     */
    public function createLimitModelMasterAsync(
            CreateLimitModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateLimitModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Usage Limit Model Master
     *
     * @param CreateLimitModelMasterRequest $request
     * @return CreateLimitModelMasterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#createlimitmodelmaster
     */
    public function createLimitModelMaster (
            CreateLimitModelMasterRequest $request
    ): CreateLimitModelMasterResult {
        return $this->createLimitModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get a Usage Limit Model Master
     *
     * @param GetLimitModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getlimitmodelmaster
     */
    public function getLimitModelMasterAsync(
            GetLimitModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLimitModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get a Usage Limit Model Master
     *
     * @param GetLimitModelMasterRequest $request
     * @return GetLimitModelMasterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getlimitmodelmaster
     */
    public function getLimitModelMaster (
            GetLimitModelMasterRequest $request
    ): GetLimitModelMasterResult {
        return $this->getLimitModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Usage Limit Model Master
     *
     * @param UpdateLimitModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#updatelimitmodelmaster
     */
    public function updateLimitModelMasterAsync(
            UpdateLimitModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateLimitModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Usage Limit Model Master
     *
     * @param UpdateLimitModelMasterRequest $request
     * @return UpdateLimitModelMasterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#updatelimitmodelmaster
     */
    public function updateLimitModelMaster (
            UpdateLimitModelMasterRequest $request
    ): UpdateLimitModelMasterResult {
        return $this->updateLimitModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Usage Limit Model Master
     *
     * @param DeleteLimitModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#deletelimitmodelmaster
     */
    public function deleteLimitModelMasterAsync(
            DeleteLimitModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteLimitModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Usage Limit Model Master
     *
     * @param DeleteLimitModelMasterRequest $request
     * @return DeleteLimitModelMasterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#deletelimitmodelmaster
     */
    public function deleteLimitModelMaster (
            DeleteLimitModelMasterRequest $request
    ): DeleteLimitModelMasterResult {
        return $this->deleteLimitModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Export Usage Limit Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#exportmaster
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
     * Export Usage Limit Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Usage Limit Model master data
     *
     * @param GetCurrentLimitMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getcurrentlimitmaster
     */
    public function getCurrentLimitMasterAsync(
            GetCurrentLimitMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentLimitMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get currently active Usage Limit Model master data
     *
     * @param GetCurrentLimitMasterRequest $request
     * @return GetCurrentLimitMasterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getcurrentlimitmaster
     */
    public function getCurrentLimitMaster (
            GetCurrentLimitMasterRequest $request
    ): GetCurrentLimitMasterResult {
        return $this->getCurrentLimitMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Usage Limit Model master data (3-phase version)
     *
     * @param PreUpdateCurrentLimitMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#preupdatecurrentlimitmaster
     */
    public function preUpdateCurrentLimitMasterAsync(
            PreUpdateCurrentLimitMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentLimitMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Usage Limit Model master data (3-phase version)
     *
     * @param PreUpdateCurrentLimitMasterRequest $request
     * @return PreUpdateCurrentLimitMasterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#preupdatecurrentlimitmaster
     */
    public function preUpdateCurrentLimitMaster (
            PreUpdateCurrentLimitMasterRequest $request
    ): PreUpdateCurrentLimitMasterResult {
        return $this->preUpdateCurrentLimitMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Usage Limit Model master data
     *
     * @param UpdateCurrentLimitMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#updatecurrentlimitmaster
     */
    public function updateCurrentLimitMasterAsync(
            UpdateCurrentLimitMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentLimitMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Usage Limit Model master data
     *
     * @param UpdateCurrentLimitMasterRequest $request
     * @return UpdateCurrentLimitMasterResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#updatecurrentlimitmaster
     */
    public function updateCurrentLimitMaster (
            UpdateCurrentLimitMasterRequest $request
    ): UpdateCurrentLimitMasterResult {
        return $this->updateCurrentLimitMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Usage Limit Model master data from GitHub
     *
     * @param UpdateCurrentLimitMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#updatecurrentlimitmasterfromgithub
     */
    public function updateCurrentLimitMasterFromGitHubAsync(
            UpdateCurrentLimitMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentLimitMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Usage Limit Model master data from GitHub
     *
     * @param UpdateCurrentLimitMasterFromGitHubRequest $request
     * @return UpdateCurrentLimitMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#updatecurrentlimitmasterfromgithub
     */
    public function updateCurrentLimitMasterFromGitHub (
            UpdateCurrentLimitMasterFromGitHubRequest $request
    ): UpdateCurrentLimitMasterFromGitHubResult {
        return $this->updateCurrentLimitMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * List Usage Limit Models
     *
     * @param DescribeLimitModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describelimitmodels
     */
    public function describeLimitModelsAsync(
            DescribeLimitModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLimitModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Usage Limit Models
     *
     * @param DescribeLimitModelsRequest $request
     * @return DescribeLimitModelsResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#describelimitmodels
     */
    public function describeLimitModels (
            DescribeLimitModelsRequest $request
    ): DescribeLimitModelsResult {
        return $this->describeLimitModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Usage Limit Model
     *
     * @param GetLimitModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getlimitmodel
     */
    public function getLimitModelAsync(
            GetLimitModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLimitModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Usage Limit Model
     *
     * @param GetLimitModelRequest $request
     * @return GetLimitModelResult
     * @see https://docs.gs2.io/api_reference/limit/sdk/#getlimitmodel
     */
    public function getLimitModel (
            GetLimitModelRequest $request
    ): GetLimitModelResult {
        return $this->getLimitModelAsync(
            $request
        )->wait();
    }
}