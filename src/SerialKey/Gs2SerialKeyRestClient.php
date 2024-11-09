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

namespace Gs2\SerialKey;

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


use Gs2\SerialKey\Request\DescribeNamespacesRequest;
use Gs2\SerialKey\Result\DescribeNamespacesResult;
use Gs2\SerialKey\Request\CreateNamespaceRequest;
use Gs2\SerialKey\Result\CreateNamespaceResult;
use Gs2\SerialKey\Request\GetNamespaceStatusRequest;
use Gs2\SerialKey\Result\GetNamespaceStatusResult;
use Gs2\SerialKey\Request\GetNamespaceRequest;
use Gs2\SerialKey\Result\GetNamespaceResult;
use Gs2\SerialKey\Request\UpdateNamespaceRequest;
use Gs2\SerialKey\Result\UpdateNamespaceResult;
use Gs2\SerialKey\Request\DeleteNamespaceRequest;
use Gs2\SerialKey\Result\DeleteNamespaceResult;
use Gs2\SerialKey\Request\DumpUserDataByUserIdRequest;
use Gs2\SerialKey\Result\DumpUserDataByUserIdResult;
use Gs2\SerialKey\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\SerialKey\Result\CheckDumpUserDataByUserIdResult;
use Gs2\SerialKey\Request\CleanUserDataByUserIdRequest;
use Gs2\SerialKey\Result\CleanUserDataByUserIdResult;
use Gs2\SerialKey\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\SerialKey\Result\CheckCleanUserDataByUserIdResult;
use Gs2\SerialKey\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\SerialKey\Result\PrepareImportUserDataByUserIdResult;
use Gs2\SerialKey\Request\ImportUserDataByUserIdRequest;
use Gs2\SerialKey\Result\ImportUserDataByUserIdResult;
use Gs2\SerialKey\Request\CheckImportUserDataByUserIdRequest;
use Gs2\SerialKey\Result\CheckImportUserDataByUserIdResult;
use Gs2\SerialKey\Request\DescribeIssueJobsRequest;
use Gs2\SerialKey\Result\DescribeIssueJobsResult;
use Gs2\SerialKey\Request\GetIssueJobRequest;
use Gs2\SerialKey\Result\GetIssueJobResult;
use Gs2\SerialKey\Request\IssueRequest;
use Gs2\SerialKey\Result\IssueResult;
use Gs2\SerialKey\Request\DescribeSerialKeysRequest;
use Gs2\SerialKey\Result\DescribeSerialKeysResult;
use Gs2\SerialKey\Request\DownloadSerialCodesRequest;
use Gs2\SerialKey\Result\DownloadSerialCodesResult;
use Gs2\SerialKey\Request\IssueOnceRequest;
use Gs2\SerialKey\Result\IssueOnceResult;
use Gs2\SerialKey\Request\GetSerialKeyRequest;
use Gs2\SerialKey\Result\GetSerialKeyResult;
use Gs2\SerialKey\Request\VerifyCodeRequest;
use Gs2\SerialKey\Result\VerifyCodeResult;
use Gs2\SerialKey\Request\VerifyCodeByUserIdRequest;
use Gs2\SerialKey\Result\VerifyCodeByUserIdResult;
use Gs2\SerialKey\Request\UseRequest;
use Gs2\SerialKey\Result\UseResult;
use Gs2\SerialKey\Request\UseByUserIdRequest;
use Gs2\SerialKey\Result\UseByUserIdResult;
use Gs2\SerialKey\Request\RevertUseByUserIdRequest;
use Gs2\SerialKey\Result\RevertUseByUserIdResult;
use Gs2\SerialKey\Request\UseByStampTaskRequest;
use Gs2\SerialKey\Result\UseByStampTaskResult;
use Gs2\SerialKey\Request\RevertUseByStampSheetRequest;
use Gs2\SerialKey\Result\RevertUseByStampSheetResult;
use Gs2\SerialKey\Request\VerifyByStampTaskRequest;
use Gs2\SerialKey\Result\VerifyByStampTaskResult;
use Gs2\SerialKey\Request\IssueOnceByStampSheetRequest;
use Gs2\SerialKey\Result\IssueOnceByStampSheetResult;
use Gs2\SerialKey\Request\DescribeCampaignModelsRequest;
use Gs2\SerialKey\Result\DescribeCampaignModelsResult;
use Gs2\SerialKey\Request\GetCampaignModelRequest;
use Gs2\SerialKey\Result\GetCampaignModelResult;
use Gs2\SerialKey\Request\DescribeCampaignModelMastersRequest;
use Gs2\SerialKey\Result\DescribeCampaignModelMastersResult;
use Gs2\SerialKey\Request\CreateCampaignModelMasterRequest;
use Gs2\SerialKey\Result\CreateCampaignModelMasterResult;
use Gs2\SerialKey\Request\GetCampaignModelMasterRequest;
use Gs2\SerialKey\Result\GetCampaignModelMasterResult;
use Gs2\SerialKey\Request\UpdateCampaignModelMasterRequest;
use Gs2\SerialKey\Result\UpdateCampaignModelMasterResult;
use Gs2\SerialKey\Request\DeleteCampaignModelMasterRequest;
use Gs2\SerialKey\Result\DeleteCampaignModelMasterResult;
use Gs2\SerialKey\Request\ExportMasterRequest;
use Gs2\SerialKey\Result\ExportMasterResult;
use Gs2\SerialKey\Request\GetCurrentCampaignMasterRequest;
use Gs2\SerialKey\Result\GetCurrentCampaignMasterResult;
use Gs2\SerialKey\Request\UpdateCurrentCampaignMasterRequest;
use Gs2\SerialKey\Result\UpdateCurrentCampaignMasterResult;
use Gs2\SerialKey\Request\UpdateCurrentCampaignMasterFromGitHubRequest;
use Gs2\SerialKey\Result\UpdateCurrentCampaignMasterFromGitHubResult;

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeIssueJobsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeIssueJobsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeIssueJobsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeIssueJobsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeIssueJobsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeIssueJobsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}/issue";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

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

class GetIssueJobTask extends Gs2RestSessionTask {

    /**
     * @var GetIssueJobRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetIssueJobTask constructor.
     * @param Gs2RestSession $session
     * @param GetIssueJobRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetIssueJobRequest $request
    ) {
        parent::__construct(
            $session,
            GetIssueJobResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}/issue/{issueJobName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);
        $url = str_replace("{issueJobName}", $this->request->getIssueJobName() === null|| strlen($this->request->getIssueJobName()) == 0 ? "null" : $this->request->getIssueJobName(), $url);

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

class IssueTask extends Gs2RestSessionTask {

    /**
     * @var IssueRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IssueTask constructor.
     * @param Gs2RestSession $session
     * @param IssueRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IssueRequest $request
    ) {
        parent::__construct(
            $session,
            IssueResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getIssueRequestCount() !== null) {
            $json["issueRequestCount"] = $this->request->getIssueRequestCount();
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

class DescribeSerialKeysTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSerialKeysRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSerialKeysTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSerialKeysRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSerialKeysRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSerialKeysResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}/issue/{issueJobName}/serialKey";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);
        $url = str_replace("{issueJobName}", $this->request->getIssueJobName() === null|| strlen($this->request->getIssueJobName()) == 0 ? "null" : $this->request->getIssueJobName(), $url);

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

class DownloadSerialCodesTask extends Gs2RestSessionTask {

    /**
     * @var DownloadSerialCodesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DownloadSerialCodesTask constructor.
     * @param Gs2RestSession $session
     * @param DownloadSerialCodesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DownloadSerialCodesRequest $request
    ) {
        parent::__construct(
            $session,
            DownloadSerialCodesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}/issue/{issueJobName}/serialCode/download";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);
        $url = str_replace("{issueJobName}", $this->request->getIssueJobName() === null|| strlen($this->request->getIssueJobName()) == 0 ? "null" : $this->request->getIssueJobName(), $url);

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

class IssueOnceTask extends Gs2RestSessionTask {

    /**
     * @var IssueOnceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IssueOnceTask constructor.
     * @param Gs2RestSession $session
     * @param IssueOnceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IssueOnceRequest $request
    ) {
        parent::__construct(
            $session,
            IssueOnceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}/serialKey";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class GetSerialKeyTask extends Gs2RestSessionTask {

    /**
     * @var GetSerialKeyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSerialKeyTask constructor.
     * @param Gs2RestSession $session
     * @param GetSerialKeyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSerialKeyRequest $request
    ) {
        parent::__construct(
            $session,
            GetSerialKeyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/serialKey/{code}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{code}", $this->request->getCode() === null|| strlen($this->request->getCode()) == 0 ? "null" : $this->request->getCode(), $url);

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

class VerifyCodeTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCodeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCodeTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCodeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCodeRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCodeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/serialKey/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCode() !== null) {
            $json["code"] = $this->request->getCode();
        }
        if ($this->request->getCampaignModelName() !== null) {
            $json["campaignModelName"] = $this->request->getCampaignModelName();
        }
        if ($this->request->getVerifyType() !== null) {
            $json["verifyType"] = $this->request->getVerifyType();
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

class VerifyCodeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyCodeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyCodeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyCodeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyCodeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyCodeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/serialKey/verify";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCode() !== null) {
            $json["code"] = $this->request->getCode();
        }
        if ($this->request->getCampaignModelName() !== null) {
            $json["campaignModelName"] = $this->request->getCampaignModelName();
        }
        if ($this->request->getVerifyType() !== null) {
            $json["verifyType"] = $this->request->getVerifyType();
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

class UseTask extends Gs2RestSessionTask {

    /**
     * @var UseRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UseTask constructor.
     * @param Gs2RestSession $session
     * @param UseRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UseRequest $request
    ) {
        parent::__construct(
            $session,
            UseResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/serialKey";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCode() !== null) {
            $json["code"] = $this->request->getCode();
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

class UseByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UseByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UseByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UseByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UseByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UseByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/serialKey";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCode() !== null) {
            $json["code"] = $this->request->getCode();
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

class RevertUseByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RevertUseByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RevertUseByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RevertUseByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RevertUseByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RevertUseByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/serialKey/revert";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCode() !== null) {
            $json["code"] = $this->request->getCode();
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

class UseByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var UseByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UseByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param UseByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UseByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            UseByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/serialKey/use";

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

class RevertUseByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var RevertUseByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RevertUseByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param RevertUseByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RevertUseByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            RevertUseByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/serialKey/revert";

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

class VerifyByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/serialKey/verify";

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

class IssueOnceByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var IssueOnceByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IssueOnceByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param IssueOnceByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IssueOnceByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            IssueOnceByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/serialKey/issueOnce";

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

class DescribeCampaignModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCampaignModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCampaignModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCampaignModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCampaignModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCampaignModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign";

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

class GetCampaignModelTask extends Gs2RestSessionTask {

    /**
     * @var GetCampaignModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCampaignModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetCampaignModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCampaignModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetCampaignModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

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

class DescribeCampaignModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCampaignModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCampaignModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCampaignModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCampaignModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCampaignModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign";

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

class CreateCampaignModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateCampaignModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateCampaignModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateCampaignModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateCampaignModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateCampaignModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign";

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
        if ($this->request->getEnableCampaignCode() !== null) {
            $json["enableCampaignCode"] = $this->request->getEnableCampaignCode();
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

class GetCampaignModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCampaignModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCampaignModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCampaignModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCampaignModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCampaignModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

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

class UpdateCampaignModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCampaignModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCampaignModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCampaignModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCampaignModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCampaignModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getEnableCampaignCode() !== null) {
            $json["enableCampaignCode"] = $this->request->getEnableCampaignCode();
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

class DeleteCampaignModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCampaignModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCampaignModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCampaignModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCampaignModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCampaignModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentCampaignMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentCampaignMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentCampaignMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentCampaignMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentCampaignMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentCampaignMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentCampaignMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentCampaignMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentCampaignMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentCampaignMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentCampaignMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentCampaignMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentCampaignMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentCampaignMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentCampaignMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentCampaignMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentCampaignMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentCampaignMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2 SerialKey API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2SerialKeyRestClient extends AbstractGs2Client {

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
     * @param DescribeIssueJobsRequest $request
     * @return PromiseInterface
     */
    public function describeIssueJobsAsync(
            DescribeIssueJobsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeIssueJobsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeIssueJobsRequest $request
     * @return DescribeIssueJobsResult
     */
    public function describeIssueJobs (
            DescribeIssueJobsRequest $request
    ): DescribeIssueJobsResult {
        return $this->describeIssueJobsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetIssueJobRequest $request
     * @return PromiseInterface
     */
    public function getIssueJobAsync(
            GetIssueJobRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetIssueJobTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetIssueJobRequest $request
     * @return GetIssueJobResult
     */
    public function getIssueJob (
            GetIssueJobRequest $request
    ): GetIssueJobResult {
        return $this->getIssueJobAsync(
            $request
        )->wait();
    }

    /**
     * @param IssueRequest $request
     * @return PromiseInterface
     */
    public function issueAsync(
            IssueRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IssueTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IssueRequest $request
     * @return IssueResult
     */
    public function issue (
            IssueRequest $request
    ): IssueResult {
        return $this->issueAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSerialKeysRequest $request
     * @return PromiseInterface
     */
    public function describeSerialKeysAsync(
            DescribeSerialKeysRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSerialKeysTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSerialKeysRequest $request
     * @return DescribeSerialKeysResult
     */
    public function describeSerialKeys (
            DescribeSerialKeysRequest $request
    ): DescribeSerialKeysResult {
        return $this->describeSerialKeysAsync(
            $request
        )->wait();
    }

    /**
     * @param DownloadSerialCodesRequest $request
     * @return PromiseInterface
     */
    public function downloadSerialCodesAsync(
            DownloadSerialCodesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DownloadSerialCodesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DownloadSerialCodesRequest $request
     * @return DownloadSerialCodesResult
     */
    public function downloadSerialCodes (
            DownloadSerialCodesRequest $request
    ): DownloadSerialCodesResult {
        return $this->downloadSerialCodesAsync(
            $request
        )->wait();
    }

    /**
     * @param IssueOnceRequest $request
     * @return PromiseInterface
     */
    public function issueOnceAsync(
            IssueOnceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IssueOnceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IssueOnceRequest $request
     * @return IssueOnceResult
     */
    public function issueOnce (
            IssueOnceRequest $request
    ): IssueOnceResult {
        return $this->issueOnceAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSerialKeyRequest $request
     * @return PromiseInterface
     */
    public function getSerialKeyAsync(
            GetSerialKeyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSerialKeyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSerialKeyRequest $request
     * @return GetSerialKeyResult
     */
    public function getSerialKey (
            GetSerialKeyRequest $request
    ): GetSerialKeyResult {
        return $this->getSerialKeyAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCodeRequest $request
     * @return PromiseInterface
     */
    public function verifyCodeAsync(
            VerifyCodeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCodeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCodeRequest $request
     * @return VerifyCodeResult
     */
    public function verifyCode (
            VerifyCodeRequest $request
    ): VerifyCodeResult {
        return $this->verifyCodeAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyCodeByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyCodeByUserIdAsync(
            VerifyCodeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyCodeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyCodeByUserIdRequest $request
     * @return VerifyCodeByUserIdResult
     */
    public function verifyCodeByUserId (
            VerifyCodeByUserIdRequest $request
    ): VerifyCodeByUserIdResult {
        return $this->verifyCodeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UseRequest $request
     * @return PromiseInterface
     */
    public function useAsync(
            UseRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UseTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UseRequest $request
     * @return UseResult
     */
    public function use (
            UseRequest $request
    ): UseResult {
        return $this->useAsync(
            $request
        )->wait();
    }

    /**
     * @param UseByUserIdRequest $request
     * @return PromiseInterface
     */
    public function useByUserIdAsync(
            UseByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UseByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UseByUserIdRequest $request
     * @return UseByUserIdResult
     */
    public function useByUserId (
            UseByUserIdRequest $request
    ): UseByUserIdResult {
        return $this->useByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param RevertUseByUserIdRequest $request
     * @return PromiseInterface
     */
    public function revertUseByUserIdAsync(
            RevertUseByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RevertUseByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RevertUseByUserIdRequest $request
     * @return RevertUseByUserIdResult
     */
    public function revertUseByUserId (
            RevertUseByUserIdRequest $request
    ): RevertUseByUserIdResult {
        return $this->revertUseByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UseByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function useByStampTaskAsync(
            UseByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UseByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UseByStampTaskRequest $request
     * @return UseByStampTaskResult
     */
    public function useByStampTask (
            UseByStampTaskRequest $request
    ): UseByStampTaskResult {
        return $this->useByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param RevertUseByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function revertUseByStampSheetAsync(
            RevertUseByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RevertUseByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param RevertUseByStampSheetRequest $request
     * @return RevertUseByStampSheetResult
     */
    public function revertUseByStampSheet (
            RevertUseByStampSheetRequest $request
    ): RevertUseByStampSheetResult {
        return $this->revertUseByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyByStampTaskAsync(
            VerifyByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyByStampTaskRequest $request
     * @return VerifyByStampTaskResult
     */
    public function verifyByStampTask (
            VerifyByStampTaskRequest $request
    ): VerifyByStampTaskResult {
        return $this->verifyByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param IssueOnceByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function issueOnceByStampSheetAsync(
            IssueOnceByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IssueOnceByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IssueOnceByStampSheetRequest $request
     * @return IssueOnceByStampSheetResult
     */
    public function issueOnceByStampSheet (
            IssueOnceByStampSheetRequest $request
    ): IssueOnceByStampSheetResult {
        return $this->issueOnceByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCampaignModelsRequest $request
     * @return PromiseInterface
     */
    public function describeCampaignModelsAsync(
            DescribeCampaignModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCampaignModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCampaignModelsRequest $request
     * @return DescribeCampaignModelsResult
     */
    public function describeCampaignModels (
            DescribeCampaignModelsRequest $request
    ): DescribeCampaignModelsResult {
        return $this->describeCampaignModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCampaignModelRequest $request
     * @return PromiseInterface
     */
    public function getCampaignModelAsync(
            GetCampaignModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCampaignModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCampaignModelRequest $request
     * @return GetCampaignModelResult
     */
    public function getCampaignModel (
            GetCampaignModelRequest $request
    ): GetCampaignModelResult {
        return $this->getCampaignModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCampaignModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeCampaignModelMastersAsync(
            DescribeCampaignModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCampaignModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCampaignModelMastersRequest $request
     * @return DescribeCampaignModelMastersResult
     */
    public function describeCampaignModelMasters (
            DescribeCampaignModelMastersRequest $request
    ): DescribeCampaignModelMastersResult {
        return $this->describeCampaignModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateCampaignModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createCampaignModelMasterAsync(
            CreateCampaignModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateCampaignModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateCampaignModelMasterRequest $request
     * @return CreateCampaignModelMasterResult
     */
    public function createCampaignModelMaster (
            CreateCampaignModelMasterRequest $request
    ): CreateCampaignModelMasterResult {
        return $this->createCampaignModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCampaignModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getCampaignModelMasterAsync(
            GetCampaignModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCampaignModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCampaignModelMasterRequest $request
     * @return GetCampaignModelMasterResult
     */
    public function getCampaignModelMaster (
            GetCampaignModelMasterRequest $request
    ): GetCampaignModelMasterResult {
        return $this->getCampaignModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCampaignModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCampaignModelMasterAsync(
            UpdateCampaignModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCampaignModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCampaignModelMasterRequest $request
     * @return UpdateCampaignModelMasterResult
     */
    public function updateCampaignModelMaster (
            UpdateCampaignModelMasterRequest $request
    ): UpdateCampaignModelMasterResult {
        return $this->updateCampaignModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteCampaignModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteCampaignModelMasterAsync(
            DeleteCampaignModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCampaignModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteCampaignModelMasterRequest $request
     * @return DeleteCampaignModelMasterResult
     */
    public function deleteCampaignModelMaster (
            DeleteCampaignModelMasterRequest $request
    ): DeleteCampaignModelMasterResult {
        return $this->deleteCampaignModelMasterAsync(
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
     * @param GetCurrentCampaignMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentCampaignMasterAsync(
            GetCurrentCampaignMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentCampaignMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentCampaignMasterRequest $request
     * @return GetCurrentCampaignMasterResult
     */
    public function getCurrentCampaignMaster (
            GetCurrentCampaignMasterRequest $request
    ): GetCurrentCampaignMasterResult {
        return $this->getCurrentCampaignMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentCampaignMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentCampaignMasterAsync(
            UpdateCurrentCampaignMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentCampaignMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentCampaignMasterRequest $request
     * @return UpdateCurrentCampaignMasterResult
     */
    public function updateCurrentCampaignMaster (
            UpdateCurrentCampaignMasterRequest $request
    ): UpdateCurrentCampaignMasterResult {
        return $this->updateCurrentCampaignMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentCampaignMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentCampaignMasterFromGitHubAsync(
            UpdateCurrentCampaignMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentCampaignMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentCampaignMasterFromGitHubRequest $request
     * @return UpdateCurrentCampaignMasterFromGitHubResult
     */
    public function updateCurrentCampaignMasterFromGitHub (
            UpdateCurrentCampaignMasterFromGitHubRequest $request
    ): UpdateCurrentCampaignMasterFromGitHubResult {
        return $this->updateCurrentCampaignMasterFromGitHubAsync(
            $request
        )->wait();
    }
}