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

namespace Gs2\SkillTree;

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


use Gs2\SkillTree\Request\DescribeNamespacesRequest;
use Gs2\SkillTree\Result\DescribeNamespacesResult;
use Gs2\SkillTree\Request\CreateNamespaceRequest;
use Gs2\SkillTree\Result\CreateNamespaceResult;
use Gs2\SkillTree\Request\GetNamespaceStatusRequest;
use Gs2\SkillTree\Result\GetNamespaceStatusResult;
use Gs2\SkillTree\Request\GetNamespaceRequest;
use Gs2\SkillTree\Result\GetNamespaceResult;
use Gs2\SkillTree\Request\UpdateNamespaceRequest;
use Gs2\SkillTree\Result\UpdateNamespaceResult;
use Gs2\SkillTree\Request\DeleteNamespaceRequest;
use Gs2\SkillTree\Result\DeleteNamespaceResult;
use Gs2\SkillTree\Request\GetServiceVersionRequest;
use Gs2\SkillTree\Result\GetServiceVersionResult;
use Gs2\SkillTree\Request\DumpUserDataByUserIdRequest;
use Gs2\SkillTree\Result\DumpUserDataByUserIdResult;
use Gs2\SkillTree\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\SkillTree\Result\CheckDumpUserDataByUserIdResult;
use Gs2\SkillTree\Request\CleanUserDataByUserIdRequest;
use Gs2\SkillTree\Result\CleanUserDataByUserIdResult;
use Gs2\SkillTree\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\SkillTree\Result\CheckCleanUserDataByUserIdResult;
use Gs2\SkillTree\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\SkillTree\Result\PrepareImportUserDataByUserIdResult;
use Gs2\SkillTree\Request\ImportUserDataByUserIdRequest;
use Gs2\SkillTree\Result\ImportUserDataByUserIdResult;
use Gs2\SkillTree\Request\CheckImportUserDataByUserIdRequest;
use Gs2\SkillTree\Result\CheckImportUserDataByUserIdResult;
use Gs2\SkillTree\Request\DescribeNodeModelsRequest;
use Gs2\SkillTree\Result\DescribeNodeModelsResult;
use Gs2\SkillTree\Request\GetNodeModelRequest;
use Gs2\SkillTree\Result\GetNodeModelResult;
use Gs2\SkillTree\Request\DescribeNodeModelMastersRequest;
use Gs2\SkillTree\Result\DescribeNodeModelMastersResult;
use Gs2\SkillTree\Request\CreateNodeModelMasterRequest;
use Gs2\SkillTree\Result\CreateNodeModelMasterResult;
use Gs2\SkillTree\Request\GetNodeModelMasterRequest;
use Gs2\SkillTree\Result\GetNodeModelMasterResult;
use Gs2\SkillTree\Request\UpdateNodeModelMasterRequest;
use Gs2\SkillTree\Result\UpdateNodeModelMasterResult;
use Gs2\SkillTree\Request\DeleteNodeModelMasterRequest;
use Gs2\SkillTree\Result\DeleteNodeModelMasterResult;
use Gs2\SkillTree\Request\MarkReleaseByUserIdRequest;
use Gs2\SkillTree\Result\MarkReleaseByUserIdResult;
use Gs2\SkillTree\Request\ReleaseRequest;
use Gs2\SkillTree\Result\ReleaseResult;
use Gs2\SkillTree\Request\ReleaseByUserIdRequest;
use Gs2\SkillTree\Result\ReleaseByUserIdResult;
use Gs2\SkillTree\Request\MarkRestrainRequest;
use Gs2\SkillTree\Result\MarkRestrainResult;
use Gs2\SkillTree\Request\MarkRestrainByUserIdRequest;
use Gs2\SkillTree\Result\MarkRestrainByUserIdResult;
use Gs2\SkillTree\Request\RestrainRequest;
use Gs2\SkillTree\Result\RestrainResult;
use Gs2\SkillTree\Request\RestrainByUserIdRequest;
use Gs2\SkillTree\Result\RestrainByUserIdResult;
use Gs2\SkillTree\Request\DescribeStatusesRequest;
use Gs2\SkillTree\Result\DescribeStatusesResult;
use Gs2\SkillTree\Request\DescribeStatusesByUserIdRequest;
use Gs2\SkillTree\Result\DescribeStatusesByUserIdResult;
use Gs2\SkillTree\Request\GetStatusRequest;
use Gs2\SkillTree\Result\GetStatusResult;
use Gs2\SkillTree\Request\GetStatusByUserIdRequest;
use Gs2\SkillTree\Result\GetStatusByUserIdResult;
use Gs2\SkillTree\Request\ResetRequest;
use Gs2\SkillTree\Result\ResetResult;
use Gs2\SkillTree\Request\ResetByUserIdRequest;
use Gs2\SkillTree\Result\ResetByUserIdResult;
use Gs2\SkillTree\Request\MarkReleaseByStampSheetRequest;
use Gs2\SkillTree\Result\MarkReleaseByStampSheetResult;
use Gs2\SkillTree\Request\MarkRestrainByStampTaskRequest;
use Gs2\SkillTree\Result\MarkRestrainByStampTaskResult;
use Gs2\SkillTree\Request\ExportMasterRequest;
use Gs2\SkillTree\Result\ExportMasterResult;
use Gs2\SkillTree\Request\GetCurrentTreeMasterRequest;
use Gs2\SkillTree\Result\GetCurrentTreeMasterResult;
use Gs2\SkillTree\Request\PreUpdateCurrentTreeMasterRequest;
use Gs2\SkillTree\Result\PreUpdateCurrentTreeMasterResult;
use Gs2\SkillTree\Request\UpdateCurrentTreeMasterRequest;
use Gs2\SkillTree\Result\UpdateCurrentTreeMasterResult;
use Gs2\SkillTree\Request\UpdateCurrentTreeMasterFromGitHubRequest;
use Gs2\SkillTree\Result\UpdateCurrentTreeMasterFromGitHubResult;

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getReleaseScript() !== null) {
            $json["releaseScript"] = $this->request->getReleaseScript()->toJson();
        }
        if ($this->request->getRestrainScript() !== null) {
            $json["restrainScript"] = $this->request->getRestrainScript()->toJson();
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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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
        if ($this->request->getReleaseScript() !== null) {
            $json["releaseScript"] = $this->request->getReleaseScript()->toJson();
        }
        if ($this->request->getRestrainScript() !== null) {
            $json["restrainScript"] = $this->request->getRestrainScript()->toJson();
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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeNodeModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeNodeModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeNodeModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeNodeModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeNodeModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeNodeModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetNodeModelTask extends Gs2RestSessionTask {

    /**
     * @var GetNodeModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetNodeModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetNodeModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetNodeModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetNodeModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{nodeModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{nodeModelName}", $this->request->getNodeModelName() === null|| strlen($this->request->getNodeModelName()) == 0 ? "null" : $this->request->getNodeModelName(), $url);

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

class DescribeNodeModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeNodeModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeNodeModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeNodeModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeNodeModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeNodeModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateNodeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateNodeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateNodeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateNodeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateNodeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateNodeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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
        if ($this->request->getReleaseVerifyActions() !== null) {
            $array = [];
            foreach ($this->request->getReleaseVerifyActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["releaseVerifyActions"] = $array;
        }
        if ($this->request->getReleaseConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getReleaseConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["releaseConsumeActions"] = $array;
        }
        if ($this->request->getRestrainReturnRate() !== null) {
            $json["restrainReturnRate"] = $this->request->getRestrainReturnRate();
        }
        if ($this->request->getPremiseNodeNames() !== null) {
            $array = [];
            foreach ($this->request->getPremiseNodeNames() as $item)
            {
                array_push($array, $item);
            }
            $json["premiseNodeNames"] = $array;
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

class GetNodeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetNodeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetNodeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetNodeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetNodeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetNodeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{nodeModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{nodeModelName}", $this->request->getNodeModelName() === null|| strlen($this->request->getNodeModelName()) == 0 ? "null" : $this->request->getNodeModelName(), $url);

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

class UpdateNodeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateNodeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateNodeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateNodeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateNodeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateNodeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{nodeModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{nodeModelName}", $this->request->getNodeModelName() === null|| strlen($this->request->getNodeModelName()) == 0 ? "null" : $this->request->getNodeModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getReleaseVerifyActions() !== null) {
            $array = [];
            foreach ($this->request->getReleaseVerifyActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["releaseVerifyActions"] = $array;
        }
        if ($this->request->getReleaseConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getReleaseConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["releaseConsumeActions"] = $array;
        }
        if ($this->request->getRestrainReturnRate() !== null) {
            $json["restrainReturnRate"] = $this->request->getRestrainReturnRate();
        }
        if ($this->request->getPremiseNodeNames() !== null) {
            $array = [];
            foreach ($this->request->getPremiseNodeNames() as $item)
            {
                array_push($array, $item);
            }
            $json["premiseNodeNames"] = $array;
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

class DeleteNodeModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteNodeModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteNodeModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteNodeModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteNodeModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteNodeModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{nodeModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{nodeModelName}", $this->request->getNodeModelName() === null|| strlen($this->request->getNodeModelName()) == 0 ? "null" : $this->request->getNodeModelName(), $url);

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

class MarkReleaseByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var MarkReleaseByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MarkReleaseByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param MarkReleaseByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MarkReleaseByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            MarkReleaseByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{propertyId}/node/release/mark";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getNodeModelNames() !== null) {
            $array = [];
            foreach ($this->request->getNodeModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["nodeModelNames"] = $array;
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

class ReleaseTask extends Gs2RestSessionTask {

    /**
     * @var ReleaseRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReleaseTask constructor.
     * @param Gs2RestSession $session
     * @param ReleaseRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReleaseRequest $request
    ) {
        parent::__construct(
            $session,
            ReleaseResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{propertyId}/node/release";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getNodeModelNames() !== null) {
            $array = [];
            foreach ($this->request->getNodeModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["nodeModelNames"] = $array;
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

class ReleaseByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ReleaseByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ReleaseByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ReleaseByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ReleaseByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ReleaseByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{propertyId}/node/release";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getNodeModelNames() !== null) {
            $array = [];
            foreach ($this->request->getNodeModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["nodeModelNames"] = $array;
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

class MarkRestrainTask extends Gs2RestSessionTask {

    /**
     * @var MarkRestrainRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MarkRestrainTask constructor.
     * @param Gs2RestSession $session
     * @param MarkRestrainRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MarkRestrainRequest $request
    ) {
        parent::__construct(
            $session,
            MarkRestrainResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{propertyId}/node/restrain/mark";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getNodeModelNames() !== null) {
            $array = [];
            foreach ($this->request->getNodeModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["nodeModelNames"] = $array;
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

class MarkRestrainByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var MarkRestrainByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MarkRestrainByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param MarkRestrainByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MarkRestrainByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            MarkRestrainByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{propertyId}/node/restrain/mark";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getNodeModelNames() !== null) {
            $array = [];
            foreach ($this->request->getNodeModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["nodeModelNames"] = $array;
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

class RestrainTask extends Gs2RestSessionTask {

    /**
     * @var RestrainRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RestrainTask constructor.
     * @param Gs2RestSession $session
     * @param RestrainRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RestrainRequest $request
    ) {
        parent::__construct(
            $session,
            RestrainResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{propertyId}/node/restrain";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getNodeModelNames() !== null) {
            $array = [];
            foreach ($this->request->getNodeModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["nodeModelNames"] = $array;
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

class RestrainByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RestrainByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RestrainByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RestrainByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RestrainByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RestrainByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{propertyId}/node/restrain";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getNodeModelNames() !== null) {
            $array = [];
            foreach ($this->request->getNodeModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["nodeModelNames"] = $array;
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

class DescribeStatusesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStatusesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStatusesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStatusesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStatusesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStatusesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status";

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

class DescribeStatusesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStatusesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStatusesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStatusesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStatusesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStatusesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/";

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

class GetStatusTask extends Gs2RestSessionTask {

    /**
     * @var GetStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStatusTask constructor.
     * @param Gs2RestSession $session
     * @param GetStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStatusRequest $request
    ) {
        parent::__construct(
            $session,
            GetStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class GetStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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

class ResetTask extends Gs2RestSessionTask {

    /**
     * @var ResetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ResetTask constructor.
     * @param Gs2RestSession $session
     * @param ResetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ResetRequest $request
    ) {
        parent::__construct(
            $session,
            ResetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{propertyId}/reset";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

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

class ResetByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ResetByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ResetByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ResetByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ResetByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ResetByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{propertyId}/reset";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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

class MarkReleaseByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var MarkReleaseByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MarkReleaseByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param MarkReleaseByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MarkReleaseByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            MarkReleaseByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/status/release";

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

class MarkRestrainByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var MarkRestrainByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MarkRestrainByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param MarkRestrainByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MarkRestrainByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            MarkRestrainByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/status/restrain";

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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentTreeMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentTreeMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentTreeMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentTreeMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentTreeMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentTreeMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentTreeMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentTreeMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentTreeMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentTreeMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentTreeMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentTreeMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentTreeMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentTreeMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentTreeMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentTreeMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentTreeMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentTreeMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentTreeMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentTreeMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentTreeMasterResult $res */
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

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentTreeMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentTreeMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentTreeMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentTreeMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentTreeMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentTreeMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "skill-tree", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2-SkillTree API client
 *
 * @see https://docs.gs2.io/api_reference/skill_tree/sdk/
 */
class Gs2SkillTreeRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Node Models
     *
     * @param DescribeNodeModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describenodemodels
     */
    public function describeNodeModelsAsync(
            DescribeNodeModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeNodeModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Node Models
     *
     * @param DescribeNodeModelsRequest $request
     * @return DescribeNodeModelsResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describenodemodels
     */
    public function describeNodeModels (
            DescribeNodeModelsRequest $request
    ): DescribeNodeModelsResult {
        return $this->describeNodeModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Node Model
     *
     * @param GetNodeModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getnodemodel
     */
    public function getNodeModelAsync(
            GetNodeModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetNodeModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Node Model
     *
     * @param GetNodeModelRequest $request
     * @return GetNodeModelResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getnodemodel
     */
    public function getNodeModel (
            GetNodeModelRequest $request
    ): GetNodeModelResult {
        return $this->getNodeModelAsync(
            $request
        )->wait();
    }

    /**
     * List Node Model Masters
     *
     * @param DescribeNodeModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describenodemodelmasters
     */
    public function describeNodeModelMastersAsync(
            DescribeNodeModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeNodeModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Node Model Masters
     *
     * @param DescribeNodeModelMastersRequest $request
     * @return DescribeNodeModelMastersResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describenodemodelmasters
     */
    public function describeNodeModelMasters (
            DescribeNodeModelMastersRequest $request
    ): DescribeNodeModelMastersResult {
        return $this->describeNodeModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Node Model Master
     *
     * @param CreateNodeModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#createnodemodelmaster
     */
    public function createNodeModelMasterAsync(
            CreateNodeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateNodeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Node Model Master
     *
     * @param CreateNodeModelMasterRequest $request
     * @return CreateNodeModelMasterResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#createnodemodelmaster
     */
    public function createNodeModelMaster (
            CreateNodeModelMasterRequest $request
    ): CreateNodeModelMasterResult {
        return $this->createNodeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Node Model Master
     *
     * @param GetNodeModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getnodemodelmaster
     */
    public function getNodeModelMasterAsync(
            GetNodeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetNodeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Node Model Master
     *
     * @param GetNodeModelMasterRequest $request
     * @return GetNodeModelMasterResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getnodemodelmaster
     */
    public function getNodeModelMaster (
            GetNodeModelMasterRequest $request
    ): GetNodeModelMasterResult {
        return $this->getNodeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Node Model Master
     *
     * @param UpdateNodeModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatenodemodelmaster
     */
    public function updateNodeModelMasterAsync(
            UpdateNodeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateNodeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Node Model Master
     *
     * @param UpdateNodeModelMasterRequest $request
     * @return UpdateNodeModelMasterResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatenodemodelmaster
     */
    public function updateNodeModelMaster (
            UpdateNodeModelMasterRequest $request
    ): UpdateNodeModelMasterResult {
        return $this->updateNodeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Node Model Master
     *
     * @param DeleteNodeModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#deletenodemodelmaster
     */
    public function deleteNodeModelMasterAsync(
            DeleteNodeModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteNodeModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Node Model Master
     *
     * @param DeleteNodeModelMasterRequest $request
     * @return DeleteNodeModelMasterResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#deletenodemodelmaster
     */
    public function deleteNodeModelMaster (
            DeleteNodeModelMasterRequest $request
    ): DeleteNodeModelMasterResult {
        return $this->deleteNodeModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Mark a node as released by User ID
     *
     * @param MarkReleaseByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#markreleasebyuserid
     */
    public function markReleaseByUserIdAsync(
            MarkReleaseByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MarkReleaseByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Mark a node as released by User ID
     *
     * @param MarkReleaseByUserIdRequest $request
     * @return MarkReleaseByUserIdResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#markreleasebyuserid
     */
    public function markReleaseByUserId (
            MarkReleaseByUserIdRequest $request
    ): MarkReleaseByUserIdResult {
        return $this->markReleaseByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Release a node
     *
     * @param ReleaseRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#release
     */
    public function releaseAsync(
            ReleaseRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReleaseTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Release a node
     *
     * @param ReleaseRequest $request
     * @return ReleaseResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#release
     */
    public function release (
            ReleaseRequest $request
    ): ReleaseResult {
        return $this->releaseAsync(
            $request
        )->wait();
    }

    /**
     * Release a node by User ID
     *
     * @param ReleaseByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#releasebyuserid
     */
    public function releaseByUserIdAsync(
            ReleaseByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ReleaseByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Release a node by User ID
     *
     * @param ReleaseByUserIdRequest $request
     * @return ReleaseByUserIdResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#releasebyuserid
     */
    public function releaseByUserId (
            ReleaseByUserIdRequest $request
    ): ReleaseByUserIdResult {
        return $this->releaseByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Revert a node to unreleased state
     *
     * @param MarkRestrainRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#markrestrain
     */
    public function markRestrainAsync(
            MarkRestrainRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MarkRestrainTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Revert a node to unreleased state
     *
     * @param MarkRestrainRequest $request
     * @return MarkRestrainResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#markrestrain
     */
    public function markRestrain (
            MarkRestrainRequest $request
    ): MarkRestrainResult {
        return $this->markRestrainAsync(
            $request
        )->wait();
    }

    /**
     * Revert a node to unreleased state by User ID
     *
     * @param MarkRestrainByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#markrestrainbyuserid
     */
    public function markRestrainByUserIdAsync(
            MarkRestrainByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MarkRestrainByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Revert a node to unreleased state by User ID
     *
     * @param MarkRestrainByUserIdRequest $request
     * @return MarkRestrainByUserIdResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#markrestrainbyuserid
     */
    public function markRestrainByUserId (
            MarkRestrainByUserIdRequest $request
    ): MarkRestrainByUserIdResult {
        return $this->markRestrainByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Restrain a node
     *
     * @param RestrainRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#restrain
     */
    public function restrainAsync(
            RestrainRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RestrainTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Restrain a node
     *
     * @param RestrainRequest $request
     * @return RestrainResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#restrain
     */
    public function restrain (
            RestrainRequest $request
    ): RestrainResult {
        return $this->restrainAsync(
            $request
        )->wait();
    }

    /**
     * Restrain a node by User ID
     *
     * @param RestrainByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#restrainbyuserid
     */
    public function restrainByUserIdAsync(
            RestrainByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RestrainByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Restrain a node by User ID
     *
     * @param RestrainByUserIdRequest $request
     * @return RestrainByUserIdResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#restrainbyuserid
     */
    public function restrainByUserId (
            RestrainByUserIdRequest $request
    ): RestrainByUserIdResult {
        return $this->restrainByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List statuses
     *
     * @param DescribeStatusesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describestatuses
     */
    public function describeStatusesAsync(
            DescribeStatusesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStatusesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List statuses
     *
     * @param DescribeStatusesRequest $request
     * @return DescribeStatusesResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describestatuses
     */
    public function describeStatuses (
            DescribeStatusesRequest $request
    ): DescribeStatusesResult {
        return $this->describeStatusesAsync(
            $request
        )->wait();
    }

    /**
     * List Statuses by User ID
     *
     * @param DescribeStatusesByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describestatusesbyuserid
     */
    public function describeStatusesByUserIdAsync(
            DescribeStatusesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStatusesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Statuses by User ID
     *
     * @param DescribeStatusesByUserIdRequest $request
     * @return DescribeStatusesByUserIdResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#describestatusesbyuserid
     */
    public function describeStatusesByUserId (
            DescribeStatusesByUserIdRequest $request
    ): DescribeStatusesByUserIdResult {
        return $this->describeStatusesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get a status
     *
     * @param GetStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getstatus
     */
    public function getStatusAsync(
            GetStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get a status
     *
     * @param GetStatusRequest $request
     * @return GetStatusResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getstatus
     */
    public function getStatus (
            GetStatusRequest $request
    ): GetStatusResult {
        return $this->getStatusAsync(
            $request
        )->wait();
    }

    /**
     * Get Status by User ID
     *
     * @param GetStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getstatusbyuserid
     */
    public function getStatusByUserIdAsync(
            GetStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Status by User ID
     *
     * @param GetStatusByUserIdRequest $request
     * @return GetStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getstatusbyuserid
     */
    public function getStatusByUserId (
            GetStatusByUserIdRequest $request
    ): GetStatusByUserIdResult {
        return $this->getStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Reset status
     *
     * @param ResetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#reset
     */
    public function resetAsync(
            ResetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ResetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Reset status
     *
     * @param ResetRequest $request
     * @return ResetResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#reset
     */
    public function reset (
            ResetRequest $request
    ): ResetResult {
        return $this->resetAsync(
            $request
        )->wait();
    }

    /**
     * Reset status by User ID
     *
     * @param ResetByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#resetbyuserid
     */
    public function resetByUserIdAsync(
            ResetByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ResetByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Reset status by User ID
     *
     * @param ResetByUserIdRequest $request
     * @return ResetByUserIdResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#resetbyuserid
     */
    public function resetByUserId (
            ResetByUserIdRequest $request
    ): ResetByUserIdResult {
        return $this->resetByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute the record of the released node as an acquire action
     *
     * @param MarkReleaseByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/stamp_sheet/#gs2skilltreemarkreleasebyuserid
     */
    public function markReleaseByStampSheetAsync(
            MarkReleaseByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MarkReleaseByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the record of the released node as an acquire action
     *
     * @param MarkReleaseByStampSheetRequest $request
     * @return MarkReleaseByStampSheetResult
     * @see https://docs.gs2.io/api_reference/skill_tree/stamp_sheet/#gs2skilltreemarkreleasebyuserid
     */
    public function markReleaseByStampSheet (
            MarkReleaseByStampSheetRequest $request
    ): MarkReleaseByStampSheetResult {
        return $this->markReleaseByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute reverting a node to unreleased state as a consume action
     *
     * @param MarkRestrainByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/stamp_sheet/#gs2skilltreemarkrestrainbyuserid
     */
    public function markRestrainByStampTaskAsync(
            MarkRestrainByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MarkRestrainByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute reverting a node to unreleased state as a consume action
     *
     * @param MarkRestrainByStampTaskRequest $request
     * @return MarkRestrainByStampTaskResult
     * @see https://docs.gs2.io/api_reference/skill_tree/stamp_sheet/#gs2skilltreemarkrestrainbyuserid
     */
    public function markRestrainByStampTask (
            MarkRestrainByStampTaskRequest $request
    ): MarkRestrainByStampTaskResult {
        return $this->markRestrainByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Export Node Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#exportmaster
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
     * Export Node Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Node Model master data
     *
     * @param GetCurrentTreeMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getcurrenttreemaster
     */
    public function getCurrentTreeMasterAsync(
            GetCurrentTreeMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentTreeMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get currently active Node Model master data
     *
     * @param GetCurrentTreeMasterRequest $request
     * @return GetCurrentTreeMasterResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#getcurrenttreemaster
     */
    public function getCurrentTreeMaster (
            GetCurrentTreeMasterRequest $request
    ): GetCurrentTreeMasterResult {
        return $this->getCurrentTreeMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Currently Active Master Data (3-phase version)
     *
     * @param PreUpdateCurrentTreeMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#preupdatecurrenttreemaster
     */
    public function preUpdateCurrentTreeMasterAsync(
            PreUpdateCurrentTreeMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentTreeMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Currently Active Master Data (3-phase version)
     *
     * @param PreUpdateCurrentTreeMasterRequest $request
     * @return PreUpdateCurrentTreeMasterResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#preupdatecurrenttreemaster
     */
    public function preUpdateCurrentTreeMaster (
            PreUpdateCurrentTreeMasterRequest $request
    ): PreUpdateCurrentTreeMasterResult {
        return $this->preUpdateCurrentTreeMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Node Model master data
     *
     * @param UpdateCurrentTreeMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatecurrenttreemaster
     */
    public function updateCurrentTreeMasterAsync(
            UpdateCurrentTreeMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentTreeMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Node Model master data
     *
     * @param UpdateCurrentTreeMasterRequest $request
     * @return UpdateCurrentTreeMasterResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatecurrenttreemaster
     */
    public function updateCurrentTreeMaster (
            UpdateCurrentTreeMasterRequest $request
    ): UpdateCurrentTreeMasterResult {
        return $this->updateCurrentTreeMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Node Model master data from GitHub
     *
     * @param UpdateCurrentTreeMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatecurrenttreemasterfromgithub
     */
    public function updateCurrentTreeMasterFromGitHubAsync(
            UpdateCurrentTreeMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentTreeMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Node Model master data from GitHub
     *
     * @param UpdateCurrentTreeMasterFromGitHubRequest $request
     * @return UpdateCurrentTreeMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatecurrenttreemasterfromgithub
     */
    public function updateCurrentTreeMasterFromGitHub (
            UpdateCurrentTreeMasterFromGitHubRequest $request
    ): UpdateCurrentTreeMasterFromGitHubResult {
        return $this->updateCurrentTreeMasterFromGitHubAsync(
            $request
        )->wait();
    }
}