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

namespace Gs2\Experience;

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


use Gs2\Experience\Request\DescribeNamespacesRequest;
use Gs2\Experience\Result\DescribeNamespacesResult;
use Gs2\Experience\Request\CreateNamespaceRequest;
use Gs2\Experience\Result\CreateNamespaceResult;
use Gs2\Experience\Request\GetNamespaceStatusRequest;
use Gs2\Experience\Result\GetNamespaceStatusResult;
use Gs2\Experience\Request\GetNamespaceRequest;
use Gs2\Experience\Result\GetNamespaceResult;
use Gs2\Experience\Request\UpdateNamespaceRequest;
use Gs2\Experience\Result\UpdateNamespaceResult;
use Gs2\Experience\Request\DeleteNamespaceRequest;
use Gs2\Experience\Result\DeleteNamespaceResult;
use Gs2\Experience\Request\GetServiceVersionRequest;
use Gs2\Experience\Result\GetServiceVersionResult;
use Gs2\Experience\Request\DumpUserDataByUserIdRequest;
use Gs2\Experience\Result\DumpUserDataByUserIdResult;
use Gs2\Experience\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Experience\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Experience\Request\CleanUserDataByUserIdRequest;
use Gs2\Experience\Result\CleanUserDataByUserIdResult;
use Gs2\Experience\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Experience\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Experience\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Experience\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Experience\Request\ImportUserDataByUserIdRequest;
use Gs2\Experience\Result\ImportUserDataByUserIdResult;
use Gs2\Experience\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Experience\Result\CheckImportUserDataByUserIdResult;
use Gs2\Experience\Request\DescribeExperienceModelMastersRequest;
use Gs2\Experience\Result\DescribeExperienceModelMastersResult;
use Gs2\Experience\Request\CreateExperienceModelMasterRequest;
use Gs2\Experience\Result\CreateExperienceModelMasterResult;
use Gs2\Experience\Request\GetExperienceModelMasterRequest;
use Gs2\Experience\Result\GetExperienceModelMasterResult;
use Gs2\Experience\Request\UpdateExperienceModelMasterRequest;
use Gs2\Experience\Result\UpdateExperienceModelMasterResult;
use Gs2\Experience\Request\DeleteExperienceModelMasterRequest;
use Gs2\Experience\Result\DeleteExperienceModelMasterResult;
use Gs2\Experience\Request\DescribeExperienceModelsRequest;
use Gs2\Experience\Result\DescribeExperienceModelsResult;
use Gs2\Experience\Request\GetExperienceModelRequest;
use Gs2\Experience\Result\GetExperienceModelResult;
use Gs2\Experience\Request\DescribeThresholdMastersRequest;
use Gs2\Experience\Result\DescribeThresholdMastersResult;
use Gs2\Experience\Request\CreateThresholdMasterRequest;
use Gs2\Experience\Result\CreateThresholdMasterResult;
use Gs2\Experience\Request\GetThresholdMasterRequest;
use Gs2\Experience\Result\GetThresholdMasterResult;
use Gs2\Experience\Request\UpdateThresholdMasterRequest;
use Gs2\Experience\Result\UpdateThresholdMasterResult;
use Gs2\Experience\Request\DeleteThresholdMasterRequest;
use Gs2\Experience\Result\DeleteThresholdMasterResult;
use Gs2\Experience\Request\ExportMasterRequest;
use Gs2\Experience\Result\ExportMasterResult;
use Gs2\Experience\Request\GetCurrentExperienceMasterRequest;
use Gs2\Experience\Result\GetCurrentExperienceMasterResult;
use Gs2\Experience\Request\PreUpdateCurrentExperienceMasterRequest;
use Gs2\Experience\Result\PreUpdateCurrentExperienceMasterResult;
use Gs2\Experience\Request\UpdateCurrentExperienceMasterRequest;
use Gs2\Experience\Result\UpdateCurrentExperienceMasterResult;
use Gs2\Experience\Request\UpdateCurrentExperienceMasterFromGitHubRequest;
use Gs2\Experience\Result\UpdateCurrentExperienceMasterFromGitHubResult;
use Gs2\Experience\Request\DescribeStatusesRequest;
use Gs2\Experience\Result\DescribeStatusesResult;
use Gs2\Experience\Request\DescribeStatusesByUserIdRequest;
use Gs2\Experience\Result\DescribeStatusesByUserIdResult;
use Gs2\Experience\Request\GetStatusRequest;
use Gs2\Experience\Result\GetStatusResult;
use Gs2\Experience\Request\GetStatusByUserIdRequest;
use Gs2\Experience\Result\GetStatusByUserIdResult;
use Gs2\Experience\Request\GetStatusWithSignatureRequest;
use Gs2\Experience\Result\GetStatusWithSignatureResult;
use Gs2\Experience\Request\GetStatusWithSignatureByUserIdRequest;
use Gs2\Experience\Result\GetStatusWithSignatureByUserIdResult;
use Gs2\Experience\Request\AddExperienceByUserIdRequest;
use Gs2\Experience\Result\AddExperienceByUserIdResult;
use Gs2\Experience\Request\SubExperienceRequest;
use Gs2\Experience\Result\SubExperienceResult;
use Gs2\Experience\Request\SubExperienceByUserIdRequest;
use Gs2\Experience\Result\SubExperienceByUserIdResult;
use Gs2\Experience\Request\SetExperienceByUserIdRequest;
use Gs2\Experience\Result\SetExperienceByUserIdResult;
use Gs2\Experience\Request\AddRankCapByUserIdRequest;
use Gs2\Experience\Result\AddRankCapByUserIdResult;
use Gs2\Experience\Request\SubRankCapRequest;
use Gs2\Experience\Result\SubRankCapResult;
use Gs2\Experience\Request\SubRankCapByUserIdRequest;
use Gs2\Experience\Result\SubRankCapByUserIdResult;
use Gs2\Experience\Request\SetRankCapByUserIdRequest;
use Gs2\Experience\Result\SetRankCapByUserIdResult;
use Gs2\Experience\Request\DeleteStatusByUserIdRequest;
use Gs2\Experience\Result\DeleteStatusByUserIdResult;
use Gs2\Experience\Request\VerifyRankRequest;
use Gs2\Experience\Result\VerifyRankResult;
use Gs2\Experience\Request\VerifyRankByUserIdRequest;
use Gs2\Experience\Result\VerifyRankByUserIdResult;
use Gs2\Experience\Request\VerifyRankCapRequest;
use Gs2\Experience\Result\VerifyRankCapResult;
use Gs2\Experience\Request\VerifyRankCapByUserIdRequest;
use Gs2\Experience\Result\VerifyRankCapByUserIdResult;
use Gs2\Experience\Request\AddExperienceByStampSheetRequest;
use Gs2\Experience\Result\AddExperienceByStampSheetResult;
use Gs2\Experience\Request\SetExperienceByStampSheetRequest;
use Gs2\Experience\Result\SetExperienceByStampSheetResult;
use Gs2\Experience\Request\SubExperienceByStampTaskRequest;
use Gs2\Experience\Result\SubExperienceByStampTaskResult;
use Gs2\Experience\Request\AddRankCapByStampSheetRequest;
use Gs2\Experience\Result\AddRankCapByStampSheetResult;
use Gs2\Experience\Request\SubRankCapByStampTaskRequest;
use Gs2\Experience\Result\SubRankCapByStampTaskResult;
use Gs2\Experience\Request\SetRankCapByStampSheetRequest;
use Gs2\Experience\Result\SetRankCapByStampSheetResult;
use Gs2\Experience\Request\MultiplyAcquireActionsByUserIdRequest;
use Gs2\Experience\Result\MultiplyAcquireActionsByUserIdResult;
use Gs2\Experience\Request\MultiplyAcquireActionsByStampSheetRequest;
use Gs2\Experience\Result\MultiplyAcquireActionsByStampSheetResult;
use Gs2\Experience\Request\VerifyRankByStampTaskRequest;
use Gs2\Experience\Result\VerifyRankByStampTaskResult;
use Gs2\Experience\Request\VerifyRankCapByStampTaskRequest;
use Gs2\Experience\Result\VerifyRankCapByStampTaskResult;

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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
        if ($this->request->getRankCapScriptId() !== null) {
            $json["rankCapScriptId"] = $this->request->getRankCapScriptId();
        }
        if ($this->request->getChangeExperienceScript() !== null) {
            $json["changeExperienceScript"] = $this->request->getChangeExperienceScript()->toJson();
        }
        if ($this->request->getChangeRankScript() !== null) {
            $json["changeRankScript"] = $this->request->getChangeRankScript()->toJson();
        }
        if ($this->request->getChangeRankCapScript() !== null) {
            $json["changeRankCapScript"] = $this->request->getChangeRankCapScript()->toJson();
        }
        if ($this->request->getOverflowExperienceScript() !== null) {
            $json["overflowExperienceScript"] = $this->request->getOverflowExperienceScript();
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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
        if ($this->request->getRankCapScriptId() !== null) {
            $json["rankCapScriptId"] = $this->request->getRankCapScriptId();
        }
        if ($this->request->getChangeExperienceScript() !== null) {
            $json["changeExperienceScript"] = $this->request->getChangeExperienceScript()->toJson();
        }
        if ($this->request->getChangeRankScript() !== null) {
            $json["changeRankScript"] = $this->request->getChangeRankScript()->toJson();
        }
        if ($this->request->getChangeRankCapScript() !== null) {
            $json["changeRankCapScript"] = $this->request->getChangeRankCapScript()->toJson();
        }
        if ($this->request->getOverflowExperienceScript() !== null) {
            $json["overflowExperienceScript"] = $this->request->getOverflowExperienceScript();
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeExperienceModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeExperienceModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeExperienceModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeExperienceModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeExperienceModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeExperienceModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateExperienceModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateExperienceModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateExperienceModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateExperienceModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateExperienceModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateExperienceModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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
        if ($this->request->getDefaultExperience() !== null) {
            $json["defaultExperience"] = $this->request->getDefaultExperience();
        }
        if ($this->request->getDefaultRankCap() !== null) {
            $json["defaultRankCap"] = $this->request->getDefaultRankCap();
        }
        if ($this->request->getMaxRankCap() !== null) {
            $json["maxRankCap"] = $this->request->getMaxRankCap();
        }
        if ($this->request->getRankThresholdName() !== null) {
            $json["rankThresholdName"] = $this->request->getRankThresholdName();
        }
        if ($this->request->getAcquireActionRates() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActionRates() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActionRates"] = $array;
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

class GetExperienceModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetExperienceModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetExperienceModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetExperienceModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetExperienceModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetExperienceModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{experienceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

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

class UpdateExperienceModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateExperienceModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateExperienceModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateExperienceModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateExperienceModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateExperienceModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{experienceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDefaultExperience() !== null) {
            $json["defaultExperience"] = $this->request->getDefaultExperience();
        }
        if ($this->request->getDefaultRankCap() !== null) {
            $json["defaultRankCap"] = $this->request->getDefaultRankCap();
        }
        if ($this->request->getMaxRankCap() !== null) {
            $json["maxRankCap"] = $this->request->getMaxRankCap();
        }
        if ($this->request->getRankThresholdName() !== null) {
            $json["rankThresholdName"] = $this->request->getRankThresholdName();
        }
        if ($this->request->getAcquireActionRates() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActionRates() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActionRates"] = $array;
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

class DeleteExperienceModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteExperienceModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteExperienceModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteExperienceModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteExperienceModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteExperienceModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{experienceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

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

class DescribeExperienceModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeExperienceModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeExperienceModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeExperienceModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeExperienceModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeExperienceModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetExperienceModelTask extends Gs2RestSessionTask {

    /**
     * @var GetExperienceModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetExperienceModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetExperienceModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetExperienceModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetExperienceModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{experienceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

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

class DescribeThresholdMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeThresholdMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeThresholdMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeThresholdMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeThresholdMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeThresholdMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/threshold";

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

class CreateThresholdMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateThresholdMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateThresholdMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateThresholdMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateThresholdMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateThresholdMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/threshold";

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
        if ($this->request->getValues() !== null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
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

class GetThresholdMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetThresholdMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetThresholdMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetThresholdMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetThresholdMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetThresholdMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/threshold/{thresholdName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{thresholdName}", $this->request->getThresholdName() === null|| strlen($this->request->getThresholdName()) == 0 ? "null" : $this->request->getThresholdName(), $url);

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

class UpdateThresholdMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateThresholdMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateThresholdMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateThresholdMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateThresholdMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateThresholdMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/threshold/{thresholdName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{thresholdName}", $this->request->getThresholdName() === null|| strlen($this->request->getThresholdName()) == 0 ? "null" : $this->request->getThresholdName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getValues() !== null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
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

class DeleteThresholdMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteThresholdMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteThresholdMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteThresholdMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteThresholdMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteThresholdMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/threshold/{thresholdName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{thresholdName}", $this->request->getThresholdName() === null|| strlen($this->request->getThresholdName()) == 0 ? "null" : $this->request->getThresholdName(), $url);

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentExperienceMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentExperienceMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentExperienceMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentExperienceMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentExperienceMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentExperienceMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentExperienceMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentExperienceMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentExperienceMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentExperienceMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentExperienceMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentExperienceMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentExperienceMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentExperienceMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentExperienceMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentExperienceMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentExperienceMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentExperienceMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentExperienceMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentExperienceMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentExperienceMasterResult $res */
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentExperienceMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentExperienceMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentExperienceMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentExperienceMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentExperienceMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentExperienceMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getExperienceName() !== null) {
            $queryStrings["experienceName"] = $this->request->getExperienceName();
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getExperienceName() !== null) {
            $queryStrings["experienceName"] = $this->request->getExperienceName();
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
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

class GetStatusWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var GetStatusWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStatusWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param GetStatusWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStatusWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            GetStatusWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/model/{experienceName}/property/{propertyId}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getKeyId() !== null) {
            $queryStrings["keyId"] = $this->request->getKeyId();
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

class GetStatusWithSignatureByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetStatusWithSignatureByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStatusWithSignatureByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetStatusWithSignatureByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStatusWithSignatureByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetStatusWithSignatureByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getKeyId() !== null) {
            $queryStrings["keyId"] = $this->request->getKeyId();
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

class AddExperienceByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddExperienceByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddExperienceByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddExperienceByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddExperienceByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddExperienceByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getExperienceValue() !== null) {
            $json["experienceValue"] = $this->request->getExperienceValue();
        }
        if ($this->request->getTruncateExperienceWhenRankUp() !== null) {
            $json["truncateExperienceWhenRankUp"] = $this->request->getTruncateExperienceWhenRankUp();
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

class SubExperienceTask extends Gs2RestSessionTask {

    /**
     * @var SubExperienceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubExperienceTask constructor.
     * @param Gs2RestSession $session
     * @param SubExperienceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubExperienceRequest $request
    ) {
        parent::__construct(
            $session,
            SubExperienceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/model/{experienceName}/property/{propertyId}/sub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getExperienceValue() !== null) {
            $json["experienceValue"] = $this->request->getExperienceValue();
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

class SubExperienceByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SubExperienceByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubExperienceByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SubExperienceByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubExperienceByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SubExperienceByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}/sub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getExperienceValue() !== null) {
            $json["experienceValue"] = $this->request->getExperienceValue();
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

class SetExperienceByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetExperienceByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetExperienceByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetExperienceByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetExperienceByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetExperienceByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getExperienceValue() !== null) {
            $json["experienceValue"] = $this->request->getExperienceValue();
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

class AddRankCapByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddRankCapByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddRankCapByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddRankCapByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddRankCapByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddRankCapByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}/cap";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getRankCapValue() !== null) {
            $json["rankCapValue"] = $this->request->getRankCapValue();
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

class SubRankCapTask extends Gs2RestSessionTask {

    /**
     * @var SubRankCapRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubRankCapTask constructor.
     * @param Gs2RestSession $session
     * @param SubRankCapRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubRankCapRequest $request
    ) {
        parent::__construct(
            $session,
            SubRankCapResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/model/{experienceName}/property/{propertyId}/cap/sub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getRankCapValue() !== null) {
            $json["rankCapValue"] = $this->request->getRankCapValue();
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

class SubRankCapByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SubRankCapByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubRankCapByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SubRankCapByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubRankCapByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SubRankCapByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}/cap/sub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getRankCapValue() !== null) {
            $json["rankCapValue"] = $this->request->getRankCapValue();
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

class SetRankCapByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetRankCapByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRankCapByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetRankCapByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRankCapByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetRankCapByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}/cap";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getRankCapValue() !== null) {
            $json["rankCapValue"] = $this->request->getRankCapValue();
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

class DeleteStatusByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStatusByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStatusByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStatusByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStatusByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStatusByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
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

class VerifyRankTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRankRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyRankTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRankRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRankRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyRankResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{experienceName}/verify/rank/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getPropertyId() !== null) {
            $json["propertyId"] = $this->request->getPropertyId();
        }
        if ($this->request->getRankValue() !== null) {
            $json["rankValue"] = $this->request->getRankValue();
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

class VerifyRankByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRankByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyRankByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRankByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRankByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyRankByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{experienceName}/verify/rank/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getPropertyId() !== null) {
            $json["propertyId"] = $this->request->getPropertyId();
        }
        if ($this->request->getRankValue() !== null) {
            $json["rankValue"] = $this->request->getRankValue();
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

class VerifyRankCapTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRankCapRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyRankCapTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRankCapRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRankCapRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyRankCapResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{experienceName}/verify/rankCap/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getPropertyId() !== null) {
            $json["propertyId"] = $this->request->getPropertyId();
        }
        if ($this->request->getRankCapValue() !== null) {
            $json["rankCapValue"] = $this->request->getRankCapValue();
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

class VerifyRankCapByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRankCapByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyRankCapByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRankCapByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRankCapByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyRankCapByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{experienceName}/verify/rankCap/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getPropertyId() !== null) {
            $json["propertyId"] = $this->request->getPropertyId();
        }
        if ($this->request->getRankCapValue() !== null) {
            $json["rankCapValue"] = $this->request->getRankCapValue();
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

class AddExperienceByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AddExperienceByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddExperienceByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AddExperienceByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddExperienceByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AddExperienceByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/experience/add";

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

class SetExperienceByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetExperienceByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetExperienceByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetExperienceByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetExperienceByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetExperienceByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/experience/set";

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

class SubExperienceByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var SubExperienceByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubExperienceByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param SubExperienceByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubExperienceByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            SubExperienceByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/experience/sub";

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

class AddRankCapByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AddRankCapByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddRankCapByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AddRankCapByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddRankCapByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AddRankCapByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/rankCap/add";

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

class SubRankCapByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var SubRankCapByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SubRankCapByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param SubRankCapByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SubRankCapByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            SubRankCapByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/rankCap/sub";

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

class SetRankCapByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetRankCapByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetRankCapByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetRankCapByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetRankCapByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetRankCapByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/rankCap/set";

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

class MultiplyAcquireActionsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var MultiplyAcquireActionsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MultiplyAcquireActionsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param MultiplyAcquireActionsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MultiplyAcquireActionsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            MultiplyAcquireActionsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}/acquire/rate/{rateName}/multiply";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() === null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() === null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

        $json = [];
        if ($this->request->getAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
        }
        if ($this->request->getBaseRate() !== null) {
            $json["baseRate"] = $this->request->getBaseRate();
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

class MultiplyAcquireActionsByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var MultiplyAcquireActionsByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * MultiplyAcquireActionsByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param MultiplyAcquireActionsByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        MultiplyAcquireActionsByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            MultiplyAcquireActionsByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/form/acquire";

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

class VerifyRankByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRankByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyRankByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRankByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRankByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyRankByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/rank/verify";

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

class VerifyRankCapByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyRankCapByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyRankCapByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyRankCapByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyRankCapByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyRankCapByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/rankCap/verify";

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

/**
 * GS2-Experience API client
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/
 */
class Gs2ExperienceRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#dumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#checkdumpuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#cleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#checkcleanuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#prepareimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#importuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#checkimportuserdatabyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#checkimportuserdatabyuserid
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * List Experience Model Masters
     *
     * @param DescribeExperienceModelMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describeexperiencemodelmasters
     */
    public function describeExperienceModelMastersAsync(
            DescribeExperienceModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeExperienceModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Experience Model Masters
     *
     * @param DescribeExperienceModelMastersRequest $request
     * @return DescribeExperienceModelMastersResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describeexperiencemodelmasters
     */
    public function describeExperienceModelMasters (
            DescribeExperienceModelMastersRequest $request
    ): DescribeExperienceModelMastersResult {
        return $this->describeExperienceModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Experience Model Master
     *
     * @param CreateExperienceModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#createexperiencemodelmaster
     */
    public function createExperienceModelMasterAsync(
            CreateExperienceModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateExperienceModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Experience Model Master
     *
     * @param CreateExperienceModelMasterRequest $request
     * @return CreateExperienceModelMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#createexperiencemodelmaster
     */
    public function createExperienceModelMaster (
            CreateExperienceModelMasterRequest $request
    ): CreateExperienceModelMasterResult {
        return $this->createExperienceModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Experience Model Master
     *
     * @param GetExperienceModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getexperiencemodelmaster
     */
    public function getExperienceModelMasterAsync(
            GetExperienceModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetExperienceModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Experience Model Master
     *
     * @param GetExperienceModelMasterRequest $request
     * @return GetExperienceModelMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getexperiencemodelmaster
     */
    public function getExperienceModelMaster (
            GetExperienceModelMasterRequest $request
    ): GetExperienceModelMasterResult {
        return $this->getExperienceModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Experience Model Master
     *
     * @param UpdateExperienceModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updateexperiencemodelmaster
     */
    public function updateExperienceModelMasterAsync(
            UpdateExperienceModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateExperienceModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Experience Model Master
     *
     * @param UpdateExperienceModelMasterRequest $request
     * @return UpdateExperienceModelMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updateexperiencemodelmaster
     */
    public function updateExperienceModelMaster (
            UpdateExperienceModelMasterRequest $request
    ): UpdateExperienceModelMasterResult {
        return $this->updateExperienceModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Experience Model Master
     *
     * @param DeleteExperienceModelMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#deleteexperiencemodelmaster
     */
    public function deleteExperienceModelMasterAsync(
            DeleteExperienceModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteExperienceModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Experience Model Master
     *
     * @param DeleteExperienceModelMasterRequest $request
     * @return DeleteExperienceModelMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#deleteexperiencemodelmaster
     */
    public function deleteExperienceModelMaster (
            DeleteExperienceModelMasterRequest $request
    ): DeleteExperienceModelMasterResult {
        return $this->deleteExperienceModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * List Experience Models
     *
     * @param DescribeExperienceModelsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describeexperiencemodels
     */
    public function describeExperienceModelsAsync(
            DescribeExperienceModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeExperienceModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Experience Models
     *
     * @param DescribeExperienceModelsRequest $request
     * @return DescribeExperienceModelsResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describeexperiencemodels
     */
    public function describeExperienceModels (
            DescribeExperienceModelsRequest $request
    ): DescribeExperienceModelsResult {
        return $this->describeExperienceModelsAsync(
            $request
        )->wait();
    }

    /**
     * Get Experience Model
     *
     * @param GetExperienceModelRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getexperiencemodel
     */
    public function getExperienceModelAsync(
            GetExperienceModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetExperienceModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Experience Model
     *
     * @param GetExperienceModelRequest $request
     * @return GetExperienceModelResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getexperiencemodel
     */
    public function getExperienceModel (
            GetExperienceModelRequest $request
    ): GetExperienceModelResult {
        return $this->getExperienceModelAsync(
            $request
        )->wait();
    }

    /**
     * List Rank Up Threshold Masters
     *
     * @param DescribeThresholdMastersRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describethresholdmasters
     */
    public function describeThresholdMastersAsync(
            DescribeThresholdMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeThresholdMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List Rank Up Threshold Masters
     *
     * @param DescribeThresholdMastersRequest $request
     * @return DescribeThresholdMastersResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describethresholdmasters
     */
    public function describeThresholdMasters (
            DescribeThresholdMastersRequest $request
    ): DescribeThresholdMastersResult {
        return $this->describeThresholdMastersAsync(
            $request
        )->wait();
    }

    /**
     * Create Rank Up Threshold Master
     *
     * @param CreateThresholdMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#createthresholdmaster
     */
    public function createThresholdMasterAsync(
            CreateThresholdMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateThresholdMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Create Rank Up Threshold Master
     *
     * @param CreateThresholdMasterRequest $request
     * @return CreateThresholdMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#createthresholdmaster
     */
    public function createThresholdMaster (
            CreateThresholdMasterRequest $request
    ): CreateThresholdMasterResult {
        return $this->createThresholdMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get Rank Up Threshold Master
     *
     * @param GetThresholdMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getthresholdmaster
     */
    public function getThresholdMasterAsync(
            GetThresholdMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetThresholdMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Rank Up Threshold Master
     *
     * @param GetThresholdMasterRequest $request
     * @return GetThresholdMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getthresholdmaster
     */
    public function getThresholdMaster (
            GetThresholdMasterRequest $request
    ): GetThresholdMasterResult {
        return $this->getThresholdMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update Rank Up Threshold Master
     *
     * @param UpdateThresholdMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updatethresholdmaster
     */
    public function updateThresholdMasterAsync(
            UpdateThresholdMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateThresholdMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update Rank Up Threshold Master
     *
     * @param UpdateThresholdMasterRequest $request
     * @return UpdateThresholdMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updatethresholdmaster
     */
    public function updateThresholdMaster (
            UpdateThresholdMasterRequest $request
    ): UpdateThresholdMasterResult {
        return $this->updateThresholdMasterAsync(
            $request
        )->wait();
    }

    /**
     * Delete Rank Up Threshold Master
     *
     * @param DeleteThresholdMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#deletethresholdmaster
     */
    public function deleteThresholdMasterAsync(
            DeleteThresholdMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteThresholdMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete Rank Up Threshold Master
     *
     * @param DeleteThresholdMasterRequest $request
     * @return DeleteThresholdMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#deletethresholdmaster
     */
    public function deleteThresholdMaster (
            DeleteThresholdMasterRequest $request
    ): DeleteThresholdMasterResult {
        return $this->deleteThresholdMasterAsync(
            $request
        )->wait();
    }

    /**
     * Export Experience Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#exportmaster
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
     * Export Experience Model Master in a master data format that can be activated
     *
     * @param ExportMasterRequest $request
     * @return ExportMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#exportmaster
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {
        return $this->exportMasterAsync(
            $request
        )->wait();
    }

    /**
     * Get currently active Experience Model master data
     *
     * @param GetCurrentExperienceMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getcurrentexperiencemaster
     */
    public function getCurrentExperienceMasterAsync(
            GetCurrentExperienceMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentExperienceMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get currently active Experience Model master data
     *
     * @param GetCurrentExperienceMasterRequest $request
     * @return GetCurrentExperienceMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getcurrentexperiencemaster
     */
    public function getCurrentExperienceMaster (
            GetCurrentExperienceMasterRequest $request
    ): GetCurrentExperienceMasterResult {
        return $this->getCurrentExperienceMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Experience Model master data (3-phase version)
     *
     * @param PreUpdateCurrentExperienceMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#preupdatecurrentexperiencemaster
     */
    public function preUpdateCurrentExperienceMasterAsync(
            PreUpdateCurrentExperienceMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentExperienceMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Experience Model master data (3-phase version)
     *
     * @param PreUpdateCurrentExperienceMasterRequest $request
     * @return PreUpdateCurrentExperienceMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#preupdatecurrentexperiencemaster
     */
    public function preUpdateCurrentExperienceMaster (
            PreUpdateCurrentExperienceMasterRequest $request
    ): PreUpdateCurrentExperienceMasterResult {
        return $this->preUpdateCurrentExperienceMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Experience Model master data
     *
     * @param UpdateCurrentExperienceMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updatecurrentexperiencemaster
     */
    public function updateCurrentExperienceMasterAsync(
            UpdateCurrentExperienceMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentExperienceMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Experience Model master data
     *
     * @param UpdateCurrentExperienceMasterRequest $request
     * @return UpdateCurrentExperienceMasterResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updatecurrentexperiencemaster
     */
    public function updateCurrentExperienceMaster (
            UpdateCurrentExperienceMasterRequest $request
    ): UpdateCurrentExperienceMasterResult {
        return $this->updateCurrentExperienceMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently active Experience Model master data from GitHub
     *
     * @param UpdateCurrentExperienceMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updatecurrentexperiencemasterfromgithub
     */
    public function updateCurrentExperienceMasterFromGitHubAsync(
            UpdateCurrentExperienceMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentExperienceMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently active Experience Model master data from GitHub
     *
     * @param UpdateCurrentExperienceMasterFromGitHubRequest $request
     * @return UpdateCurrentExperienceMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#updatecurrentexperiencemasterfromgithub
     */
    public function updateCurrentExperienceMasterFromGitHub (
            UpdateCurrentExperienceMasterFromGitHubRequest $request
    ): UpdateCurrentExperienceMasterFromGitHubResult {
        return $this->updateCurrentExperienceMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * List Statuses
     *
     * @param DescribeStatusesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describestatuses
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
     * List Statuses
     *
     * @param DescribeStatusesRequest $request
     * @return DescribeStatusesResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describestatuses
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describestatusesbyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#describestatusesbyuserid
     */
    public function describeStatusesByUserId (
            DescribeStatusesByUserIdRequest $request
    ): DescribeStatusesByUserIdResult {
        return $this->describeStatusesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get Status
     *
     * @param GetStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getstatus
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
     * Get Status
     *
     * @param GetStatusRequest $request
     * @return GetStatusResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getstatus
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getstatusbyuserid
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
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getstatusbyuserid
     */
    public function getStatusByUserId (
            GetStatusByUserIdRequest $request
    ): GetStatusByUserIdResult {
        return $this->getStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get status along with signature
     *
     * @param GetStatusWithSignatureRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getstatuswithsignature
     */
    public function getStatusWithSignatureAsync(
            GetStatusWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStatusWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get status along with signature
     *
     * @param GetStatusWithSignatureRequest $request
     * @return GetStatusWithSignatureResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getstatuswithsignature
     */
    public function getStatusWithSignature (
            GetStatusWithSignatureRequest $request
    ): GetStatusWithSignatureResult {
        return $this->getStatusWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * Get Status with signature by User ID
     *
     * @param GetStatusWithSignatureByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getstatuswithsignaturebyuserid
     */
    public function getStatusWithSignatureByUserIdAsync(
            GetStatusWithSignatureByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStatusWithSignatureByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get Status with signature by User ID
     *
     * @param GetStatusWithSignatureByUserIdRequest $request
     * @return GetStatusWithSignatureByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#getstatuswithsignaturebyuserid
     */
    public function getStatusWithSignatureByUserId (
            GetStatusWithSignatureByUserIdRequest $request
    ): GetStatusWithSignatureByUserIdResult {
        return $this->getStatusWithSignatureByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Add experience by User ID
     *
     * @param AddExperienceByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#addexperiencebyuserid
     */
    public function addExperienceByUserIdAsync(
            AddExperienceByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddExperienceByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Add experience by User ID
     *
     * @param AddExperienceByUserIdRequest $request
     * @return AddExperienceByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#addexperiencebyuserid
     */
    public function addExperienceByUserId (
            AddExperienceByUserIdRequest $request
    ): AddExperienceByUserIdResult {
        return $this->addExperienceByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Subtract experience
     *
     * @param SubExperienceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#subexperience
     */
    public function subExperienceAsync(
            SubExperienceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubExperienceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Subtract experience
     *
     * @param SubExperienceRequest $request
     * @return SubExperienceResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#subexperience
     */
    public function subExperience (
            SubExperienceRequest $request
    ): SubExperienceResult {
        return $this->subExperienceAsync(
            $request
        )->wait();
    }

    /**
     * Subtract experience by User ID
     *
     * @param SubExperienceByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#subexperiencebyuserid
     */
    public function subExperienceByUserIdAsync(
            SubExperienceByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubExperienceByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Subtract experience by User ID
     *
     * @param SubExperienceByUserIdRequest $request
     * @return SubExperienceByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#subexperiencebyuserid
     */
    public function subExperienceByUserId (
            SubExperienceByUserIdRequest $request
    ): SubExperienceByUserIdResult {
        return $this->subExperienceByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Set experience by User ID
     *
     * @param SetExperienceByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#setexperiencebyuserid
     */
    public function setExperienceByUserIdAsync(
            SetExperienceByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetExperienceByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Set experience by User ID
     *
     * @param SetExperienceByUserIdRequest $request
     * @return SetExperienceByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#setexperiencebyuserid
     */
    public function setExperienceByUserId (
            SetExperienceByUserIdRequest $request
    ): SetExperienceByUserIdResult {
        return $this->setExperienceByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Add rank cap by User ID
     *
     * @param AddRankCapByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#addrankcapbyuserid
     */
    public function addRankCapByUserIdAsync(
            AddRankCapByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddRankCapByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Add rank cap by User ID
     *
     * @param AddRankCapByUserIdRequest $request
     * @return AddRankCapByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#addrankcapbyuserid
     */
    public function addRankCapByUserId (
            AddRankCapByUserIdRequest $request
    ): AddRankCapByUserIdResult {
        return $this->addRankCapByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Subtract rank cap
     *
     * @param SubRankCapRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#subrankcap
     */
    public function subRankCapAsync(
            SubRankCapRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubRankCapTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Subtract rank cap
     *
     * @param SubRankCapRequest $request
     * @return SubRankCapResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#subrankcap
     */
    public function subRankCap (
            SubRankCapRequest $request
    ): SubRankCapResult {
        return $this->subRankCapAsync(
            $request
        )->wait();
    }

    /**
     * Subtract rank cap by User ID
     *
     * @param SubRankCapByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#subrankcapbyuserid
     */
    public function subRankCapByUserIdAsync(
            SubRankCapByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubRankCapByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Subtract rank cap by User ID
     *
     * @param SubRankCapByUserIdRequest $request
     * @return SubRankCapByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#subrankcapbyuserid
     */
    public function subRankCapByUserId (
            SubRankCapByUserIdRequest $request
    ): SubRankCapByUserIdResult {
        return $this->subRankCapByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Set rank cap by User ID
     *
     * @param SetRankCapByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#setrankcapbyuserid
     */
    public function setRankCapByUserIdAsync(
            SetRankCapByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRankCapByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Set rank cap by User ID
     *
     * @param SetRankCapByUserIdRequest $request
     * @return SetRankCapByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#setrankcapbyuserid
     */
    public function setRankCapByUserId (
            SetRankCapByUserIdRequest $request
    ): SetRankCapByUserIdResult {
        return $this->setRankCapByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Delete status
     *
     * @param DeleteStatusByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#deletestatusbyuserid
     */
    public function deleteStatusByUserIdAsync(
            DeleteStatusByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStatusByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Delete status
     *
     * @param DeleteStatusByUserIdRequest $request
     * @return DeleteStatusByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#deletestatusbyuserid
     */
    public function deleteStatusByUserId (
            DeleteStatusByUserIdRequest $request
    ): DeleteStatusByUserIdResult {
        return $this->deleteStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Verify rank
     *
     * @param VerifyRankRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#verifyrank
     */
    public function verifyRankAsync(
            VerifyRankRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyRankTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify rank
     *
     * @param VerifyRankRequest $request
     * @return VerifyRankResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#verifyrank
     */
    public function verifyRank (
            VerifyRankRequest $request
    ): VerifyRankResult {
        return $this->verifyRankAsync(
            $request
        )->wait();
    }

    /**
     * Verify rank by User ID
     *
     * @param VerifyRankByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#verifyrankbyuserid
     */
    public function verifyRankByUserIdAsync(
            VerifyRankByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyRankByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify rank by User ID
     *
     * @param VerifyRankByUserIdRequest $request
     * @return VerifyRankByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#verifyrankbyuserid
     */
    public function verifyRankByUserId (
            VerifyRankByUserIdRequest $request
    ): VerifyRankByUserIdResult {
        return $this->verifyRankByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Verify rank cap
     *
     * @param VerifyRankCapRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#verifyrankcap
     */
    public function verifyRankCapAsync(
            VerifyRankCapRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyRankCapTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify rank cap
     *
     * @param VerifyRankCapRequest $request
     * @return VerifyRankCapResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#verifyrankcap
     */
    public function verifyRankCap (
            VerifyRankCapRequest $request
    ): VerifyRankCapResult {
        return $this->verifyRankCapAsync(
            $request
        )->wait();
    }

    /**
     * Verify rank cap by User ID
     *
     * @param VerifyRankCapByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#verifyrankcapbyuserid
     */
    public function verifyRankCapByUserIdAsync(
            VerifyRankCapByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyRankCapByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Verify rank cap by User ID
     *
     * @param VerifyRankCapByUserIdRequest $request
     * @return VerifyRankCapByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#verifyrankcapbyuserid
     */
    public function verifyRankCapByUserId (
            VerifyRankCapByUserIdRequest $request
    ): VerifyRankCapByUserIdResult {
        return $this->verifyRankCapByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute the addition of experience as an acquire action
     *
     * @param AddExperienceByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experienceaddexperiencebyuserid
     */
    public function addExperienceByStampSheetAsync(
            AddExperienceByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddExperienceByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the addition of experience as an acquire action
     *
     * @param AddExperienceByStampSheetRequest $request
     * @return AddExperienceByStampSheetResult
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experienceaddexperiencebyuserid
     */
    public function addExperienceByStampSheet (
            AddExperienceByStampSheetRequest $request
    ): AddExperienceByStampSheetResult {
        return $this->addExperienceByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute the setting of experience as an acquire action
     *
     * @param SetExperienceByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencesetexperiencebyuserid
     */
    public function setExperienceByStampSheetAsync(
            SetExperienceByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetExperienceByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the setting of experience as an acquire action
     *
     * @param SetExperienceByStampSheetRequest $request
     * @return SetExperienceByStampSheetResult
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencesetexperiencebyuserid
     */
    public function setExperienceByStampSheet (
            SetExperienceByStampSheetRequest $request
    ): SetExperienceByStampSheetResult {
        return $this->setExperienceByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute the subtraction of experience as a consume action
     *
     * @param SubExperienceByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencesubexperiencebyuserid
     */
    public function subExperienceByStampTaskAsync(
            SubExperienceByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubExperienceByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the subtraction of experience as a consume action
     *
     * @param SubExperienceByStampTaskRequest $request
     * @return SubExperienceByStampTaskResult
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencesubexperiencebyuserid
     */
    public function subExperienceByStampTask (
            SubExperienceByStampTaskRequest $request
    ): SubExperienceByStampTaskResult {
        return $this->subExperienceByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Execute the addition of rank cap as an acquire action
     *
     * @param AddRankCapByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experienceaddrankcapbyuserid
     */
    public function addRankCapByStampSheetAsync(
            AddRankCapByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddRankCapByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the addition of rank cap as an acquire action
     *
     * @param AddRankCapByStampSheetRequest $request
     * @return AddRankCapByStampSheetResult
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experienceaddrankcapbyuserid
     */
    public function addRankCapByStampSheet (
            AddRankCapByStampSheetRequest $request
    ): AddRankCapByStampSheetResult {
        return $this->addRankCapByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute the subtraction of rank cap as a consume action
     *
     * @param SubRankCapByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencesubrankcapbyuserid
     */
    public function subRankCapByStampTaskAsync(
            SubRankCapByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SubRankCapByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the subtraction of rank cap as a consume action
     *
     * @param SubRankCapByStampTaskRequest $request
     * @return SubRankCapByStampTaskResult
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencesubrankcapbyuserid
     */
    public function subRankCapByStampTask (
            SubRankCapByStampTaskRequest $request
    ): SubRankCapByStampTaskResult {
        return $this->subRankCapByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Execute the setting of rank cap as an acquire action
     *
     * @param SetRankCapByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencesetrankcapbyuserid
     */
    public function setRankCapByStampSheetAsync(
            SetRankCapByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetRankCapByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the setting of rank cap as an acquire action
     *
     * @param SetRankCapByStampSheetRequest $request
     * @return SetRankCapByStampSheetResult
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencesetrankcapbyuserid
     */
    public function setRankCapByStampSheet (
            SetRankCapByStampSheetRequest $request
    ): SetRankCapByStampSheetResult {
        return $this->setRankCapByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Multiply resources according to the rank of the property subject to the experience value by specifying user ID
     *
     * @param MultiplyAcquireActionsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/sdk/#multiplyacquireactionsbyuserid
     */
    public function multiplyAcquireActionsByUserIdAsync(
            MultiplyAcquireActionsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MultiplyAcquireActionsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Multiply resources according to the rank of the property subject to the experience value by specifying user ID
     *
     * @param MultiplyAcquireActionsByUserIdRequest $request
     * @return MultiplyAcquireActionsByUserIdResult
     * @see https://docs.gs2.io/api_reference/experience/sdk/#multiplyacquireactionsbyuserid
     */
    public function multiplyAcquireActionsByUserId (
            MultiplyAcquireActionsByUserIdRequest $request
    ): MultiplyAcquireActionsByUserIdResult {
        return $this->multiplyAcquireActionsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Execute the addition of resources as an acquire action according to the rank of the property subject to the experience value
     *
     * @param MultiplyAcquireActionsByStampSheetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencemultiplyacquireactionsbyuserid
     */
    public function multiplyAcquireActionsByStampSheetAsync(
            MultiplyAcquireActionsByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new MultiplyAcquireActionsByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute the addition of resources as an acquire action according to the rank of the property subject to the experience value
     *
     * @param MultiplyAcquireActionsByStampSheetRequest $request
     * @return MultiplyAcquireActionsByStampSheetResult
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experiencemultiplyacquireactionsbyuserid
     */
    public function multiplyAcquireActionsByStampSheet (
            MultiplyAcquireActionsByStampSheetRequest $request
    ): MultiplyAcquireActionsByStampSheetResult {
        return $this->multiplyAcquireActionsByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * Execute rank verification as a verify action
     *
     * @param VerifyRankByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experienceverifyrankbyuserid
     */
    public function verifyRankByStampTaskAsync(
            VerifyRankByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyRankByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute rank verification as a verify action
     *
     * @param VerifyRankByStampTaskRequest $request
     * @return VerifyRankByStampTaskResult
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experienceverifyrankbyuserid
     */
    public function verifyRankByStampTask (
            VerifyRankByStampTaskRequest $request
    ): VerifyRankByStampTaskResult {
        return $this->verifyRankByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * Execute rank cap verification as a verify action
     *
     * @param VerifyRankCapByStampTaskRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experienceverifyrankcapbyuserid
     */
    public function verifyRankCapByStampTaskAsync(
            VerifyRankCapByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyRankCapByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Execute rank cap verification as a verify action
     *
     * @param VerifyRankCapByStampTaskRequest $request
     * @return VerifyRankCapByStampTaskResult
     * @see https://docs.gs2.io/api_reference/experience/stamp_sheet/#gs2experienceverifyrankcapbyuserid
     */
    public function verifyRankCapByStampTask (
            VerifyRankCapByStampTaskRequest $request
    ): VerifyRankCapByStampTaskResult {
        return $this->verifyRankCapByStampTaskAsync(
            $request
        )->wait();
    }
}