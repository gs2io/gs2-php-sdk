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

namespace Gs2\Version;

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


use Gs2\Version\Request\DescribeNamespacesRequest;
use Gs2\Version\Result\DescribeNamespacesResult;
use Gs2\Version\Request\CreateNamespaceRequest;
use Gs2\Version\Result\CreateNamespaceResult;
use Gs2\Version\Request\GetNamespaceStatusRequest;
use Gs2\Version\Result\GetNamespaceStatusResult;
use Gs2\Version\Request\GetNamespaceRequest;
use Gs2\Version\Result\GetNamespaceResult;
use Gs2\Version\Request\UpdateNamespaceRequest;
use Gs2\Version\Result\UpdateNamespaceResult;
use Gs2\Version\Request\DeleteNamespaceRequest;
use Gs2\Version\Result\DeleteNamespaceResult;
use Gs2\Version\Request\GetServiceVersionRequest;
use Gs2\Version\Result\GetServiceVersionResult;
use Gs2\Version\Request\DumpUserDataByUserIdRequest;
use Gs2\Version\Result\DumpUserDataByUserIdResult;
use Gs2\Version\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Version\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Version\Request\CleanUserDataByUserIdRequest;
use Gs2\Version\Result\CleanUserDataByUserIdResult;
use Gs2\Version\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Version\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Version\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Version\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Version\Request\ImportUserDataByUserIdRequest;
use Gs2\Version\Result\ImportUserDataByUserIdResult;
use Gs2\Version\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Version\Result\CheckImportUserDataByUserIdResult;
use Gs2\Version\Request\DescribeVersionModelMastersRequest;
use Gs2\Version\Result\DescribeVersionModelMastersResult;
use Gs2\Version\Request\CreateVersionModelMasterRequest;
use Gs2\Version\Result\CreateVersionModelMasterResult;
use Gs2\Version\Request\GetVersionModelMasterRequest;
use Gs2\Version\Result\GetVersionModelMasterResult;
use Gs2\Version\Request\UpdateVersionModelMasterRequest;
use Gs2\Version\Result\UpdateVersionModelMasterResult;
use Gs2\Version\Request\DeleteVersionModelMasterRequest;
use Gs2\Version\Result\DeleteVersionModelMasterResult;
use Gs2\Version\Request\DescribeVersionModelsRequest;
use Gs2\Version\Result\DescribeVersionModelsResult;
use Gs2\Version\Request\GetVersionModelRequest;
use Gs2\Version\Result\GetVersionModelResult;
use Gs2\Version\Request\DescribeAcceptVersionsRequest;
use Gs2\Version\Result\DescribeAcceptVersionsResult;
use Gs2\Version\Request\DescribeAcceptVersionsByUserIdRequest;
use Gs2\Version\Result\DescribeAcceptVersionsByUserIdResult;
use Gs2\Version\Request\AcceptRequest;
use Gs2\Version\Result\AcceptResult;
use Gs2\Version\Request\AcceptByUserIdRequest;
use Gs2\Version\Result\AcceptByUserIdResult;
use Gs2\Version\Request\RejectRequest;
use Gs2\Version\Result\RejectResult;
use Gs2\Version\Request\RejectByUserIdRequest;
use Gs2\Version\Result\RejectByUserIdResult;
use Gs2\Version\Request\GetAcceptVersionRequest;
use Gs2\Version\Result\GetAcceptVersionResult;
use Gs2\Version\Request\GetAcceptVersionByUserIdRequest;
use Gs2\Version\Result\GetAcceptVersionByUserIdResult;
use Gs2\Version\Request\DeleteAcceptVersionRequest;
use Gs2\Version\Result\DeleteAcceptVersionResult;
use Gs2\Version\Request\DeleteAcceptVersionByUserIdRequest;
use Gs2\Version\Result\DeleteAcceptVersionByUserIdResult;
use Gs2\Version\Request\CheckVersionRequest;
use Gs2\Version\Result\CheckVersionResult;
use Gs2\Version\Request\CheckVersionByUserIdRequest;
use Gs2\Version\Result\CheckVersionByUserIdResult;
use Gs2\Version\Request\CalculateSignatureRequest;
use Gs2\Version\Result\CalculateSignatureResult;
use Gs2\Version\Request\ExportMasterRequest;
use Gs2\Version\Result\ExportMasterResult;
use Gs2\Version\Request\GetCurrentVersionMasterRequest;
use Gs2\Version\Result\GetCurrentVersionMasterResult;
use Gs2\Version\Request\PreUpdateCurrentVersionMasterRequest;
use Gs2\Version\Result\PreUpdateCurrentVersionMasterResult;
use Gs2\Version\Request\UpdateCurrentVersionMasterRequest;
use Gs2\Version\Result\UpdateCurrentVersionMasterResult;
use Gs2\Version\Request\UpdateCurrentVersionMasterFromGitHubRequest;
use Gs2\Version\Result\UpdateCurrentVersionMasterFromGitHubResult;

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getAssumeUserId() !== null) {
            $json["assumeUserId"] = $this->request->getAssumeUserId();
        }
        if ($this->request->getAcceptVersionScript() !== null) {
            $json["acceptVersionScript"] = $this->request->getAcceptVersionScript()->toJson();
        }
        if ($this->request->getCheckVersionTriggerScriptId() !== null) {
            $json["checkVersionTriggerScriptId"] = $this->request->getCheckVersionTriggerScriptId();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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
        if ($this->request->getAssumeUserId() !== null) {
            $json["assumeUserId"] = $this->request->getAssumeUserId();
        }
        if ($this->request->getAcceptVersionScript() !== null) {
            $json["acceptVersionScript"] = $this->request->getAcceptVersionScript()->toJson();
        }
        if ($this->request->getCheckVersionTriggerScriptId() !== null) {
            $json["checkVersionTriggerScriptId"] = $this->request->getCheckVersionTriggerScriptId();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeVersionModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeVersionModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeVersionModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeVersionModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeVersionModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeVersionModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version";

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

class CreateVersionModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateVersionModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateVersionModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateVersionModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateVersionModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateVersionModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version";

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
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getCurrentVersion() !== null) {
            $json["currentVersion"] = $this->request->getCurrentVersion()->toJson();
        }
        if ($this->request->getWarningVersion() !== null) {
            $json["warningVersion"] = $this->request->getWarningVersion()->toJson();
        }
        if ($this->request->getErrorVersion() !== null) {
            $json["errorVersion"] = $this->request->getErrorVersion()->toJson();
        }
        if ($this->request->getScheduleVersions() !== null) {
            $array = [];
            foreach ($this->request->getScheduleVersions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["scheduleVersions"] = $array;
        }
        if ($this->request->getNeedSignature() !== null) {
            $json["needSignature"] = $this->request->getNeedSignature();
        }
        if ($this->request->getSignatureKeyId() !== null) {
            $json["signatureKeyId"] = $this->request->getSignatureKeyId();
        }
        if ($this->request->getApproveRequirement() !== null) {
            $json["approveRequirement"] = $this->request->getApproveRequirement();
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

class GetVersionModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetVersionModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetVersionModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetVersionModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetVersionModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetVersionModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class UpdateVersionModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateVersionModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateVersionModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateVersionModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateVersionModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateVersionModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getType() !== null) {
            $json["type"] = $this->request->getType();
        }
        if ($this->request->getCurrentVersion() !== null) {
            $json["currentVersion"] = $this->request->getCurrentVersion()->toJson();
        }
        if ($this->request->getWarningVersion() !== null) {
            $json["warningVersion"] = $this->request->getWarningVersion()->toJson();
        }
        if ($this->request->getErrorVersion() !== null) {
            $json["errorVersion"] = $this->request->getErrorVersion()->toJson();
        }
        if ($this->request->getScheduleVersions() !== null) {
            $array = [];
            foreach ($this->request->getScheduleVersions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["scheduleVersions"] = $array;
        }
        if ($this->request->getNeedSignature() !== null) {
            $json["needSignature"] = $this->request->getNeedSignature();
        }
        if ($this->request->getSignatureKeyId() !== null) {
            $json["signatureKeyId"] = $this->request->getSignatureKeyId();
        }
        if ($this->request->getApproveRequirement() !== null) {
            $json["approveRequirement"] = $this->request->getApproveRequirement();
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

class DeleteVersionModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteVersionModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteVersionModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteVersionModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteVersionModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteVersionModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class DescribeVersionModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeVersionModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeVersionModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeVersionModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeVersionModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeVersionModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/version";

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

class GetVersionModelTask extends Gs2RestSessionTask {

    /**
     * @var GetVersionModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetVersionModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetVersionModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetVersionModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetVersionModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class DescribeAcceptVersionsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAcceptVersionsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAcceptVersionsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAcceptVersionsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAcceptVersionsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAcceptVersionsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/acceptVersion";

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

class DescribeAcceptVersionsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAcceptVersionsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAcceptVersionsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAcceptVersionsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAcceptVersionsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAcceptVersionsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/acceptVersion";

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

class AcceptTask extends Gs2RestSessionTask {

    /**
     * @var AcceptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcceptTask constructor.
     * @param Gs2RestSession $session
     * @param AcceptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcceptRequest $request
    ) {
        parent::__construct(
            $session,
            AcceptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/acceptVersion";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getVersionName() !== null) {
            $json["versionName"] = $this->request->getVersionName();
        }
        if ($this->request->getVersion() !== null) {
            $json["version"] = $this->request->getVersion()->toJson();
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

class AcceptByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AcceptByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcceptByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AcceptByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcceptByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AcceptByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/acceptVersion";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getVersionName() !== null) {
            $json["versionName"] = $this->request->getVersionName();
        }
        if ($this->request->getVersion() !== null) {
            $json["version"] = $this->request->getVersion()->toJson();
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

class RejectTask extends Gs2RestSessionTask {

    /**
     * @var RejectRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RejectTask constructor.
     * @param Gs2RestSession $session
     * @param RejectRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RejectRequest $request
    ) {
        parent::__construct(
            $session,
            RejectResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/acceptVersion/reject";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getVersionName() !== null) {
            $json["versionName"] = $this->request->getVersionName();
        }
        if ($this->request->getVersion() !== null) {
            $json["version"] = $this->request->getVersion()->toJson();
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

class RejectByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RejectByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RejectByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RejectByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RejectByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RejectByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/acceptVersion/reject";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getVersionName() !== null) {
            $json["versionName"] = $this->request->getVersionName();
        }
        if ($this->request->getVersion() !== null) {
            $json["version"] = $this->request->getVersion()->toJson();
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

class GetAcceptVersionTask extends Gs2RestSessionTask {

    /**
     * @var GetAcceptVersionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAcceptVersionTask constructor.
     * @param Gs2RestSession $session
     * @param GetAcceptVersionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAcceptVersionRequest $request
    ) {
        parent::__construct(
            $session,
            GetAcceptVersionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class GetAcceptVersionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetAcceptVersionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAcceptVersionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetAcceptVersionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAcceptVersionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetAcceptVersionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class DeleteAcceptVersionTask extends Gs2RestSessionTask {

    /**
     * @var DeleteAcceptVersionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteAcceptVersionTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteAcceptVersionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteAcceptVersionRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteAcceptVersionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class DeleteAcceptVersionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteAcceptVersionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteAcceptVersionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteAcceptVersionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteAcceptVersionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteAcceptVersionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class CheckVersionTask extends Gs2RestSessionTask {

    /**
     * @var CheckVersionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckVersionTask constructor.
     * @param Gs2RestSession $session
     * @param CheckVersionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckVersionRequest $request
    ) {
        parent::__construct(
            $session,
            CheckVersionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/check";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getTargetVersions() !== null) {
            $array = [];
            foreach ($this->request->getTargetVersions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["targetVersions"] = $array;
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

class CheckVersionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckVersionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckVersionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckVersionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckVersionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckVersionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/check";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTargetVersions() !== null) {
            $array = [];
            foreach ($this->request->getTargetVersions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["targetVersions"] = $array;
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

class CalculateSignatureTask extends Gs2RestSessionTask {

    /**
     * @var CalculateSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CalculateSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param CalculateSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CalculateSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            CalculateSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/version/{versionName}/calculate/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

        $json = [];
        if ($this->request->getVersion() !== null) {
            $json["version"] = $this->request->getVersion()->toJson();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentVersionMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentVersionMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentVersionMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentVersionMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentVersionMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentVersionMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentVersionMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentVersionMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentVersionMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentVersionMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentVersionMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentVersionMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentVersionMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentVersionMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentVersionMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentVersionMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentVersionMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentVersionMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentVersionMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentVersionMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentVersionMasterResult $res */
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentVersionMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentVersionMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentVersionMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentVersionMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentVersionMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentVersionMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2-Version API client
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/
 */
class Gs2VersionRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Version Model Masters
     *
     * @param DescribeVersionModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#describeversionmodelmasters
     */
    public function describeVersionModelMastersAsync(
            DescribeVersionModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeVersionModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Version Model Masters
     *
     * @param DescribeVersionModelMastersRequest $request
     * @return DescribeVersionModelMastersResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#describeversionmodelmasters
     */
    public function describeVersionModelMasters (
            DescribeVersionModelMastersRequest $request
    ): DescribeVersionModelMastersResult {
        return $this->describeVersionModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Version Model Master
     *
     * @param CreateVersionModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#createversionmodelmaster
     */
    public function createVersionModelMasterAsync(
            CreateVersionModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateVersionModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Version Model Master
     *
     * @param CreateVersionModelMasterRequest $request
     * @return CreateVersionModelMasterResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#createversionmodelmaster
     */
    public function createVersionModelMaster (
            CreateVersionModelMasterRequest $request
    ): CreateVersionModelMasterResult {
        return $this->createVersionModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Version Model Master
     *
     * @param GetVersionModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#getversionmodelmaster
     */
    public function getVersionModelMasterAsync(
            GetVersionModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetVersionModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Version Model Master
     *
     * @param GetVersionModelMasterRequest $request
     * @return GetVersionModelMasterResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#getversionmodelmaster
     */
    public function getVersionModelMaster (
            GetVersionModelMasterRequest $request
    ): GetVersionModelMasterResult {
        return $this->getVersionModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Version Model Master
     *
     * @param UpdateVersionModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#updateversionmodelmaster
     */
    public function updateVersionModelMasterAsync(
            UpdateVersionModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateVersionModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Version Model Master
     *
     * @param UpdateVersionModelMasterRequest $request
     * @return UpdateVersionModelMasterResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#updateversionmodelmaster
     */
    public function updateVersionModelMaster (
            UpdateVersionModelMasterRequest $request
    ): UpdateVersionModelMasterResult {
        return $this->updateVersionModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Version Model Master
     *
     * @param DeleteVersionModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#deleteversionmodelmaster
     */
    public function deleteVersionModelMasterAsync(
            DeleteVersionModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteVersionModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Version Model Master
     *
     * @param DeleteVersionModelMasterRequest $request
     * @return DeleteVersionModelMasterResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#deleteversionmodelmaster
     */
    public function deleteVersionModelMaster (
            DeleteVersionModelMasterRequest $request
    ): DeleteVersionModelMasterResult {
        return $this->deleteVersionModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * List Version Models
     *
     * @param DescribeVersionModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#describeversionmodels
     */
    public function describeVersionModelsAsync(
            DescribeVersionModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeVersionModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Version Models
     *
     * @param DescribeVersionModelsRequest $request
     * @return DescribeVersionModelsResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#describeversionmodels
     */
    public function describeVersionModels (
            DescribeVersionModelsRequest $request
    ): DescribeVersionModelsResult {
        return $this->describeVersionModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Version Model
     *
     * @param GetVersionModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#getversionmodel
     */
    public function getVersionModelAsync(
            GetVersionModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetVersionModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Version Model
     *
     * @param GetVersionModelRequest $request
     * @return GetVersionModelResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#getversionmodel
     */
    public function getVersionModel (
            GetVersionModelRequest $request
    ): GetVersionModelResult {
        return $this->getVersionModelAsync(
            $request
        )->wait();
    }

    /**
     * List Approved Versions
     *
     * @param DescribeAcceptVersionsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#describeacceptversions
     */
    public function describeAcceptVersionsAsync(
            DescribeAcceptVersionsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAcceptVersionsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Approved Versions
     *
     * @param DescribeAcceptVersionsRequest $request
     * @return DescribeAcceptVersionsResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#describeacceptversions
     */
    public function describeAcceptVersions (
            DescribeAcceptVersionsRequest $request
    ): DescribeAcceptVersionsResult {
        return $this->describeAcceptVersionsAsync(
            $request
        )->wait();
    }

    /**
     * List Approved Versions by User ID
     *
     * @param DescribeAcceptVersionsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#describeacceptversionsbyuserid
     */
    public function describeAcceptVersionsByUserIdAsync(
            DescribeAcceptVersionsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAcceptVersionsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Approved Versions by User ID
     *
     * @param DescribeAcceptVersionsByUserIdRequest $request
     * @return DescribeAcceptVersionsByUserIdResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#describeacceptversionsbyuserid
     */
    public function describeAcceptVersionsByUserId (
            DescribeAcceptVersionsByUserIdRequest $request
    ): DescribeAcceptVersionsByUserIdResult {
        return $this->describeAcceptVersionsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Approve current version
     *
     * @param AcceptRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#accept
     */
    public function acceptAsync(
            AcceptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcceptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Approve current version
     *
     * @param AcceptRequest $request
     * @return AcceptResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#accept
     */
    public function accept (
            AcceptRequest $request
    ): AcceptResult {
        return $this->acceptAsync(
            $request
        )->wait();
    }

    /**
     * Approve current version by User ID
     *
     * @param AcceptByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#acceptbyuserid
     */
    public function acceptByUserIdAsync(
            AcceptByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcceptByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Approve current version by User ID
     *
     * @param AcceptByUserIdRequest $request
     * @return AcceptByUserIdResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#acceptbyuserid
     */
    public function acceptByUserId (
            AcceptByUserIdRequest $request
    ): AcceptByUserIdResult {
        return $this->acceptByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Reject current version
     *
     * @param RejectRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#reject
     */
    public function rejectAsync(
            RejectRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RejectTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Reject current version
     *
     * @param RejectRequest $request
     * @return RejectResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#reject
     */
    public function reject (
            RejectRequest $request
    ): RejectResult {
        return $this->rejectAsync(
            $request
        )->wait();
    }

    /**
     * Reject current version by User ID
     *
     * @param RejectByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#rejectbyuserid
     */
    public function rejectByUserIdAsync(
            RejectByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RejectByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Reject current version by User ID
     *
     * @param RejectByUserIdRequest $request
     * @return RejectByUserIdResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#rejectbyuserid
     */
    public function rejectByUserId (
            RejectByUserIdRequest $request
    ): RejectByUserIdResult {
        return $this->rejectByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Approved Version
     *
     * @param GetAcceptVersionRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#getacceptversion
     */
    public function getAcceptVersionAsync(
            GetAcceptVersionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAcceptVersionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Approved Version
     *
     * @param GetAcceptVersionRequest $request
     * @return GetAcceptVersionResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#getacceptversion
     */
    public function getAcceptVersion (
            GetAcceptVersionRequest $request
    ): GetAcceptVersionResult {
        return $this->getAcceptVersionAsync(
            $request
        )->wait();
    }

    /**
     * Get Approved Version by User ID
     *
     * @param GetAcceptVersionByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#getacceptversionbyuserid
     */
    public function getAcceptVersionByUserIdAsync(
            GetAcceptVersionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAcceptVersionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Approved Version by User ID
     *
     * @param GetAcceptVersionByUserIdRequest $request
     * @return GetAcceptVersionByUserIdResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#getacceptversionbyuserid
     */
    public function getAcceptVersionByUserId (
            GetAcceptVersionByUserIdRequest $request
    ): GetAcceptVersionByUserIdResult {
        return $this->getAcceptVersionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete Approved Version
     *
     * @param DeleteAcceptVersionRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#deleteacceptversion
     */
    public function deleteAcceptVersionAsync(
            DeleteAcceptVersionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteAcceptVersionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Approved Version
     *
     * @param DeleteAcceptVersionRequest $request
     * @return DeleteAcceptVersionResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#deleteacceptversion
     */
    public function deleteAcceptVersion (
            DeleteAcceptVersionRequest $request
    ): DeleteAcceptVersionResult {
        return $this->deleteAcceptVersionAsync(
            $request
        )->wait();
    }

    /**
     * Delete Approved Version by User ID
     *
     * @param DeleteAcceptVersionByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#deleteacceptversionbyuserid
     */
    public function deleteAcceptVersionByUserIdAsync(
            DeleteAcceptVersionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteAcceptVersionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Approved Version by User ID
     *
     * @param DeleteAcceptVersionByUserIdRequest $request
     * @return DeleteAcceptVersionByUserIdResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#deleteacceptversionbyuserid
     */
    public function deleteAcceptVersionByUserId (
            DeleteAcceptVersionByUserIdRequest $request
    ): DeleteAcceptVersionByUserIdResult {
        return $this->deleteAcceptVersionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Check Version
     *
     * @param CheckVersionRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkversion
     */
    public function checkVersionAsync(
            CheckVersionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckVersionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Check Version
     *
     * @param CheckVersionRequest $request
     * @return CheckVersionResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkversion
     */
    public function checkVersion (
            CheckVersionRequest $request
    ): CheckVersionResult {
        return $this->checkVersionAsync(
            $request
        )->wait();
    }

    /**
     * Check Version by User ID
     *
     * @param CheckVersionByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkversionbyuserid
     */
    public function checkVersionByUserIdAsync(
            CheckVersionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckVersionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Check Version by User ID
     *
     * @param CheckVersionByUserIdRequest $request
     * @return CheckVersionByUserIdResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#checkversionbyuserid
     */
    public function checkVersionByUserId (
            CheckVersionByUserIdRequest $request
    ): CheckVersionByUserIdResult {
        return $this->checkVersionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Calculate version signature
     *
     * @param CalculateSignatureRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#calculatesignature
     */
    public function calculateSignatureAsync(
            CalculateSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CalculateSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Calculate version signature
     *
     * @param CalculateSignatureRequest $request
     * @return CalculateSignatureResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#calculatesignature
     */
    public function calculateSignature (
            CalculateSignatureRequest $request
    ): CalculateSignatureResult {
        return $this->calculateSignatureAsync(
            $request
        )->wait();
    }

    /**
     * Export Version Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#exportmaster
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
     * Export Version Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Version Model master data
     *
     * @param GetCurrentVersionMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#getcurrentversionmaster
     */
    public function getCurrentVersionMasterAsync(
            GetCurrentVersionMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentVersionMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get currently active Version Model master data
     *
     * @param GetCurrentVersionMasterRequest $request
     * @return GetCurrentVersionMasterResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#getcurrentversionmaster
     */
    public function getCurrentVersionMaster (
            GetCurrentVersionMasterRequest $request
    ): GetCurrentVersionMasterResult {
        return $this->getCurrentVersionMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Version Model master data (3-phase version)
     *
     * @param PreUpdateCurrentVersionMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#preupdatecurrentversionmaster
     */
    public function preUpdateCurrentVersionMasterAsync(
            PreUpdateCurrentVersionMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentVersionMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Version Model master data (3-phase version)
     *
     * @param PreUpdateCurrentVersionMasterRequest $request
     * @return PreUpdateCurrentVersionMasterResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#preupdatecurrentversionmaster
     */
    public function preUpdateCurrentVersionMaster (
            PreUpdateCurrentVersionMasterRequest $request
    ): PreUpdateCurrentVersionMasterResult {
        return $this->preUpdateCurrentVersionMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Version Model master data
     *
     * @param UpdateCurrentVersionMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#updatecurrentversionmaster
     */
    public function updateCurrentVersionMasterAsync(
            UpdateCurrentVersionMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentVersionMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Version Model master data
     *
     * @param UpdateCurrentVersionMasterRequest $request
     * @return UpdateCurrentVersionMasterResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#updatecurrentversionmaster
     */
    public function updateCurrentVersionMaster (
            UpdateCurrentVersionMasterRequest $request
    ): UpdateCurrentVersionMasterResult {
        return $this->updateCurrentVersionMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Version Model master data from GitHub
     *
     * @param UpdateCurrentVersionMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/version/sdk/#updatecurrentversionmasterfromgithub
     */
    public function updateCurrentVersionMasterFromGitHubAsync(
            UpdateCurrentVersionMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentVersionMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Version Model master data from GitHub
     *
     * @param UpdateCurrentVersionMasterFromGitHubRequest $request
     * @return UpdateCurrentVersionMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/version/sdk/#updatecurrentversionmasterfromgithub
     */
    public function updateCurrentVersionMasterFromGitHub (
            UpdateCurrentVersionMasterFromGitHubRequest $request
    ): UpdateCurrentVersionMasterFromGitHubResult {
        return $this->updateCurrentVersionMasterFromGitHubAsync(
            $request
        )->wait();
    }
}