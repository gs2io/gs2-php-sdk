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
use Gs2\Experience\Request\AddExperienceByUserIdRequest;
use Gs2\Experience\Result\AddExperienceByUserIdResult;
use Gs2\Experience\Request\SetExperienceByUserIdRequest;
use Gs2\Experience\Result\SetExperienceByUserIdResult;
use Gs2\Experience\Request\AddRankCapByUserIdRequest;
use Gs2\Experience\Result\AddRankCapByUserIdResult;
use Gs2\Experience\Request\SetRankCapByUserIdRequest;
use Gs2\Experience\Result\SetRankCapByUserIdResult;
use Gs2\Experience\Request\DeleteStatusByUserIdRequest;
use Gs2\Experience\Result\DeleteStatusByUserIdResult;
use Gs2\Experience\Request\AddExperienceByStampSheetRequest;
use Gs2\Experience\Result\AddExperienceByStampSheetResult;
use Gs2\Experience\Request\AddRankCapByStampSheetRequest;
use Gs2\Experience\Result\AddRankCapByStampSheetResult;
use Gs2\Experience\Request\SetRankCapByStampSheetRequest;
use Gs2\Experience\Result\SetRankCapByStampSheetResult;

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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getExperienceCapScriptId() != null) {
            $json["experienceCapScriptId"] = $this->request->getExperienceCapScriptId();
        }
        if ($this->request->getChangeExperienceScript() != null) {
            $json["changeExperienceScript"] = $this->request->getChangeExperienceScript()->toJson();
        }
        if ($this->request->getChangeRankScript() != null) {
            $json["changeRankScript"] = $this->request->getChangeRankScript()->toJson();
        }
        if ($this->request->getChangeRankCapScript() != null) {
            $json["changeRankCapScript"] = $this->request->getChangeRankCapScript()->toJson();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getExperienceCapScriptId() != null) {
            $json["experienceCapScriptId"] = $this->request->getExperienceCapScriptId();
        }
        if ($this->request->getChangeExperienceScript() != null) {
            $json["changeExperienceScript"] = $this->request->getChangeExperienceScript()->toJson();
        }
        if ($this->request->getChangeRankScript() != null) {
            $json["changeRankScript"] = $this->request->getChangeRankScript()->toJson();
        }
        if ($this->request->getChangeRankCapScript() != null) {
            $json["changeRankCapScript"] = $this->request->getChangeRankCapScript()->toJson();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/model";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/model";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDefaultExperience() != null) {
            $json["defaultExperience"] = $this->request->getDefaultExperience();
        }
        if ($this->request->getDefaultRankCap() != null) {
            $json["defaultRankCap"] = $this->request->getDefaultRankCap();
        }
        if ($this->request->getMaxRankCap() != null) {
            $json["maxRankCap"] = $this->request->getMaxRankCap();
        }
        if ($this->request->getRankThresholdId() != null) {
            $json["rankThresholdId"] = $this->request->getRankThresholdId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/model/{experienceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/model/{experienceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDefaultExperience() != null) {
            $json["defaultExperience"] = $this->request->getDefaultExperience();
        }
        if ($this->request->getDefaultRankCap() != null) {
            $json["defaultRankCap"] = $this->request->getDefaultRankCap();
        }
        if ($this->request->getMaxRankCap() != null) {
            $json["maxRankCap"] = $this->request->getMaxRankCap();
        }
        if ($this->request->getRankThresholdId() != null) {
            $json["rankThresholdId"] = $this->request->getRankThresholdId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/model/{experienceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/model";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/model/{experienceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/threshold";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/threshold";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getValues() != null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/threshold/{thresholdName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{thresholdName}", $this->request->getThresholdName() == null|| strlen($this->request->getThresholdName()) == 0 ? "null" : $this->request->getThresholdName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/threshold/{thresholdName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{thresholdName}", $this->request->getThresholdName() == null|| strlen($this->request->getThresholdName()) == 0 ? "null" : $this->request->getThresholdName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getValues() != null) {
            $array = [];
            foreach ($this->request->getValues() as $item)
            {
                array_push($array, $item);
            }
            $json["values"] = $array;
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/threshold/{thresholdName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{thresholdName}", $this->request->getThresholdName() == null|| strlen($this->request->getThresholdName()) == 0 ? "null" : $this->request->getThresholdName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/export";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getSettings() != null) {
            $json["settings"] = $this->request->getSettings();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/from_git_hub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCheckoutSetting() != null) {
            $json["checkoutSetting"] = $this->request->getCheckoutSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getExperienceName() != null) {
            $queryStrings["experienceName"] = $this->request->getExperienceName();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getExperienceName() != null) {
            $queryStrings["experienceName"] = $this->request->getExperienceName();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/status/model/{experienceName}/property/{propertyId}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getKeyId() != null) {
            $queryStrings["keyId"] = $this->request->getKeyId();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getExperienceValue() != null) {
            $json["experienceValue"] = $this->request->getExperienceValue();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getExperienceValue() != null) {
            $json["experienceValue"] = $this->request->getExperienceValue();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}/cap";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getRankCapValue() != null) {
            $json["rankCapValue"] = $this->request->getRankCapValue();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}/cap";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $json = [];
        if ($this->request->getRankCapValue() != null) {
            $json["rankCapValue"] = $this->request->getRankCapValue();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/status/model/{experienceName}/property/{propertyId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{experienceName}", $this->request->getExperienceName() == null|| strlen($this->request->getExperienceName()) == 0 ? "null" : $this->request->getExperienceName(), $url);
        $url = str_replace("{propertyId}", $this->request->getPropertyId() == null|| strlen($this->request->getPropertyId()) == 0 ? "null" : $this->request->getPropertyId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/stamp/experience/add";

        $json = [];
        if ($this->request->getStampSheet() != null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/stamp/rankCap/add";

        $json = [];
        if ($this->request->getStampSheet() != null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/stamp/rankCap/set";

        $json = [];
        if ($this->request->getStampSheet() != null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

/**
 * GS2 Experience API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ExperienceRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * ネームスペースの一覧を取得<br>
     *
     * @param DescribeNamespacesRequest $request リクエストパラメータ
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
     * ネームスペースの一覧を取得<br>
     *
     * @param DescribeNamespacesRequest $request リクエストパラメータ
     * @return DescribeNamespacesResult
     */
    public function describeNamespaces (
            DescribeNamespacesRequest $request
    ): DescribeNamespacesResult {

        $resultAsyncResult = [];
        $this->describeNamespacesAsync(
            $request
        )->then(
            function (DescribeNamespacesResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを新規作成<br>
     *
     * @param CreateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを新規作成<br>
     *
     * @param CreateNamespaceRequest $request リクエストパラメータ
     * @return CreateNamespaceResult
     */
    public function createNamespace (
            CreateNamespaceRequest $request
    ): CreateNamespaceResult {

        $resultAsyncResult = [];
        $this->createNamespaceAsync(
            $request
        )->then(
            function (CreateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
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
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceStatusRequest $request リクエストパラメータ
     * @return GetNamespaceStatusResult
     */
    public function getNamespaceStatus (
            GetNamespaceStatusRequest $request
    ): GetNamespaceStatusResult {

        $resultAsyncResult = [];
        $this->getNamespaceStatusAsync(
            $request
        )->then(
            function (GetNamespaceStatusResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを取得<br>
     *
     * @param GetNamespaceRequest $request リクエストパラメータ
     * @return GetNamespaceResult
     */
    public function getNamespace (
            GetNamespaceRequest $request
    ): GetNamespaceResult {

        $resultAsyncResult = [];
        $this->getNamespaceAsync(
            $request
        )->then(
            function (GetNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを更新<br>
     *
     * @param UpdateNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを更新<br>
     *
     * @param UpdateNamespaceRequest $request リクエストパラメータ
     * @return UpdateNamespaceResult
     */
    public function updateNamespace (
            UpdateNamespaceRequest $request
    ): UpdateNamespaceResult {

        $resultAsyncResult = [];
        $this->updateNamespaceAsync(
            $request
        )->then(
            function (UpdateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ネームスペースを削除<br>
     *
     * @param DeleteNamespaceRequest $request リクエストパラメータ
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
     * ネームスペースを削除<br>
     *
     * @param DeleteNamespaceRequest $request リクエストパラメータ
     * @return DeleteNamespaceResult
     */
    public function deleteNamespace (
            DeleteNamespaceRequest $request
    ): DeleteNamespaceResult {

        $resultAsyncResult = [];
        $this->deleteNamespaceAsync(
            $request
        )->then(
            function (DeleteNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 経験値の種類マスターの一覧を取得<br>
     *
     * @param DescribeExperienceModelMastersRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 経験値の種類マスターの一覧を取得<br>
     *
     * @param DescribeExperienceModelMastersRequest $request リクエストパラメータ
     * @return DescribeExperienceModelMastersResult
     */
    public function describeExperienceModelMasters (
            DescribeExperienceModelMastersRequest $request
    ): DescribeExperienceModelMastersResult {

        $resultAsyncResult = [];
        $this->describeExperienceModelMastersAsync(
            $request
        )->then(
            function (DescribeExperienceModelMastersResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 経験値の種類マスターを新規作成<br>
     *
     * @param CreateExperienceModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 経験値の種類マスターを新規作成<br>
     *
     * @param CreateExperienceModelMasterRequest $request リクエストパラメータ
     * @return CreateExperienceModelMasterResult
     */
    public function createExperienceModelMaster (
            CreateExperienceModelMasterRequest $request
    ): CreateExperienceModelMasterResult {

        $resultAsyncResult = [];
        $this->createExperienceModelMasterAsync(
            $request
        )->then(
            function (CreateExperienceModelMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 経験値の種類マスターを取得<br>
     *
     * @param GetExperienceModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 経験値の種類マスターを取得<br>
     *
     * @param GetExperienceModelMasterRequest $request リクエストパラメータ
     * @return GetExperienceModelMasterResult
     */
    public function getExperienceModelMaster (
            GetExperienceModelMasterRequest $request
    ): GetExperienceModelMasterResult {

        $resultAsyncResult = [];
        $this->getExperienceModelMasterAsync(
            $request
        )->then(
            function (GetExperienceModelMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 経験値の種類マスターを更新<br>
     *
     * @param UpdateExperienceModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 経験値の種類マスターを更新<br>
     *
     * @param UpdateExperienceModelMasterRequest $request リクエストパラメータ
     * @return UpdateExperienceModelMasterResult
     */
    public function updateExperienceModelMaster (
            UpdateExperienceModelMasterRequest $request
    ): UpdateExperienceModelMasterResult {

        $resultAsyncResult = [];
        $this->updateExperienceModelMasterAsync(
            $request
        )->then(
            function (UpdateExperienceModelMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 経験値の種類マスターを削除<br>
     *
     * @param DeleteExperienceModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 経験値の種類マスターを削除<br>
     *
     * @param DeleteExperienceModelMasterRequest $request リクエストパラメータ
     * @return DeleteExperienceModelMasterResult
     */
    public function deleteExperienceModelMaster (
            DeleteExperienceModelMasterRequest $request
    ): DeleteExperienceModelMasterResult {

        $resultAsyncResult = [];
        $this->deleteExperienceModelMasterAsync(
            $request
        )->then(
            function (DeleteExperienceModelMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 経験値・ランクアップ閾値モデルの一覧を取得<br>
     *
     * @param DescribeExperienceModelsRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 経験値・ランクアップ閾値モデルの一覧を取得<br>
     *
     * @param DescribeExperienceModelsRequest $request リクエストパラメータ
     * @return DescribeExperienceModelsResult
     */
    public function describeExperienceModels (
            DescribeExperienceModelsRequest $request
    ): DescribeExperienceModelsResult {

        $resultAsyncResult = [];
        $this->describeExperienceModelsAsync(
            $request
        )->then(
            function (DescribeExperienceModelsResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 経験値・ランクアップ閾値モデルを取得<br>
     *
     * @param GetExperienceModelRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 経験値・ランクアップ閾値モデルを取得<br>
     *
     * @param GetExperienceModelRequest $request リクエストパラメータ
     * @return GetExperienceModelResult
     */
    public function getExperienceModel (
            GetExperienceModelRequest $request
    ): GetExperienceModelResult {

        $resultAsyncResult = [];
        $this->getExperienceModelAsync(
            $request
        )->then(
            function (GetExperienceModelResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ランクアップ閾値マスターの一覧を取得<br>
     *
     * @param DescribeThresholdMastersRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ランクアップ閾値マスターの一覧を取得<br>
     *
     * @param DescribeThresholdMastersRequest $request リクエストパラメータ
     * @return DescribeThresholdMastersResult
     */
    public function describeThresholdMasters (
            DescribeThresholdMastersRequest $request
    ): DescribeThresholdMastersResult {

        $resultAsyncResult = [];
        $this->describeThresholdMastersAsync(
            $request
        )->then(
            function (DescribeThresholdMastersResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ランクアップ閾値マスターを新規作成<br>
     *
     * @param CreateThresholdMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ランクアップ閾値マスターを新規作成<br>
     *
     * @param CreateThresholdMasterRequest $request リクエストパラメータ
     * @return CreateThresholdMasterResult
     */
    public function createThresholdMaster (
            CreateThresholdMasterRequest $request
    ): CreateThresholdMasterResult {

        $resultAsyncResult = [];
        $this->createThresholdMasterAsync(
            $request
        )->then(
            function (CreateThresholdMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ランクアップ閾値マスターを取得<br>
     *
     * @param GetThresholdMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ランクアップ閾値マスターを取得<br>
     *
     * @param GetThresholdMasterRequest $request リクエストパラメータ
     * @return GetThresholdMasterResult
     */
    public function getThresholdMaster (
            GetThresholdMasterRequest $request
    ): GetThresholdMasterResult {

        $resultAsyncResult = [];
        $this->getThresholdMasterAsync(
            $request
        )->then(
            function (GetThresholdMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ランクアップ閾値マスターを更新<br>
     *
     * @param UpdateThresholdMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ランクアップ閾値マスターを更新<br>
     *
     * @param UpdateThresholdMasterRequest $request リクエストパラメータ
     * @return UpdateThresholdMasterResult
     */
    public function updateThresholdMaster (
            UpdateThresholdMasterRequest $request
    ): UpdateThresholdMasterResult {

        $resultAsyncResult = [];
        $this->updateThresholdMasterAsync(
            $request
        )->then(
            function (UpdateThresholdMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ランクアップ閾値マスターを削除<br>
     *
     * @param DeleteThresholdMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ランクアップ閾値マスターを削除<br>
     *
     * @param DeleteThresholdMasterRequest $request リクエストパラメータ
     * @return DeleteThresholdMasterResult
     */
    public function deleteThresholdMaster (
            DeleteThresholdMasterRequest $request
    ): DeleteThresholdMasterResult {

        $resultAsyncResult = [];
        $this->deleteThresholdMasterAsync(
            $request
        )->then(
            function (DeleteThresholdMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 現在有効な経験値設定のマスターデータをエクスポートします<br>
     *
     * @param ExportMasterRequest $request リクエストパラメータ
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
     * 現在有効な経験値設定のマスターデータをエクスポートします<br>
     *
     * @param ExportMasterRequest $request リクエストパラメータ
     * @return ExportMasterResult
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {

        $resultAsyncResult = [];
        $this->exportMasterAsync(
            $request
        )->then(
            function (ExportMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 現在有効な経験値設定を取得します<br>
     *
     * @param GetCurrentExperienceMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 現在有効な経験値設定を取得します<br>
     *
     * @param GetCurrentExperienceMasterRequest $request リクエストパラメータ
     * @return GetCurrentExperienceMasterResult
     */
    public function getCurrentExperienceMaster (
            GetCurrentExperienceMasterRequest $request
    ): GetCurrentExperienceMasterResult {

        $resultAsyncResult = [];
        $this->getCurrentExperienceMasterAsync(
            $request
        )->then(
            function (GetCurrentExperienceMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 現在有効な経験値設定を更新します<br>
     *
     * @param UpdateCurrentExperienceMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 現在有効な経験値設定を更新します<br>
     *
     * @param UpdateCurrentExperienceMasterRequest $request リクエストパラメータ
     * @return UpdateCurrentExperienceMasterResult
     */
    public function updateCurrentExperienceMaster (
            UpdateCurrentExperienceMasterRequest $request
    ): UpdateCurrentExperienceMasterResult {

        $resultAsyncResult = [];
        $this->updateCurrentExperienceMasterAsync(
            $request
        )->then(
            function (UpdateCurrentExperienceMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 現在有効な経験値設定を更新します<br>
     *
     * @param UpdateCurrentExperienceMasterFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 現在有効な経験値設定を更新します<br>
     *
     * @param UpdateCurrentExperienceMasterFromGitHubRequest $request リクエストパラメータ
     * @return UpdateCurrentExperienceMasterFromGitHubResult
     */
    public function updateCurrentExperienceMasterFromGitHub (
            UpdateCurrentExperienceMasterFromGitHubRequest $request
    ): UpdateCurrentExperienceMasterFromGitHubResult {

        $resultAsyncResult = [];
        $this->updateCurrentExperienceMasterFromGitHubAsync(
            $request
        )->then(
            function (UpdateCurrentExperienceMasterFromGitHubResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ステータスの一覧を取得<br>
     *
     * @param DescribeStatusesRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ステータスの一覧を取得<br>
     *
     * @param DescribeStatusesRequest $request リクエストパラメータ
     * @return DescribeStatusesResult
     */
    public function describeStatuses (
            DescribeStatusesRequest $request
    ): DescribeStatusesResult {

        $resultAsyncResult = [];
        $this->describeStatusesAsync(
            $request
        )->then(
            function (DescribeStatusesResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ステータスの一覧を取得<br>
     *
     * @param DescribeStatusesByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ステータスの一覧を取得<br>
     *
     * @param DescribeStatusesByUserIdRequest $request リクエストパラメータ
     * @return DescribeStatusesByUserIdResult
     */
    public function describeStatusesByUserId (
            DescribeStatusesByUserIdRequest $request
    ): DescribeStatusesByUserIdResult {

        $resultAsyncResult = [];
        $this->describeStatusesByUserIdAsync(
            $request
        )->then(
            function (DescribeStatusesByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ステータスを取得<br>
     *
     * @param GetStatusRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ステータスを取得<br>
     *
     * @param GetStatusRequest $request リクエストパラメータ
     * @return GetStatusResult
     */
    public function getStatus (
            GetStatusRequest $request
    ): GetStatusResult {

        $resultAsyncResult = [];
        $this->getStatusAsync(
            $request
        )->then(
            function (GetStatusResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ステータスを取得<br>
     *
     * @param GetStatusByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ステータスを取得<br>
     *
     * @param GetStatusByUserIdRequest $request リクエストパラメータ
     * @return GetStatusByUserIdResult
     */
    public function getStatusByUserId (
            GetStatusByUserIdRequest $request
    ): GetStatusByUserIdResult {

        $resultAsyncResult = [];
        $this->getStatusByUserIdAsync(
            $request
        )->then(
            function (GetStatusByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ステータスを取得<br>
     *
     * @param GetStatusWithSignatureRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ステータスを取得<br>
     *
     * @param GetStatusWithSignatureRequest $request リクエストパラメータ
     * @return GetStatusWithSignatureResult
     */
    public function getStatusWithSignature (
            GetStatusWithSignatureRequest $request
    ): GetStatusWithSignatureResult {

        $resultAsyncResult = [];
        $this->getStatusWithSignatureAsync(
            $request
        )->then(
            function (GetStatusWithSignatureResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 経験値を加算<br>
     *
     * @param AddExperienceByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 経験値を加算<br>
     *
     * @param AddExperienceByUserIdRequest $request リクエストパラメータ
     * @return AddExperienceByUserIdResult
     */
    public function addExperienceByUserId (
            AddExperienceByUserIdRequest $request
    ): AddExperienceByUserIdResult {

        $resultAsyncResult = [];
        $this->addExperienceByUserIdAsync(
            $request
        )->then(
            function (AddExperienceByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 累計獲得経験値を設定<br>
     *
     * @param SetExperienceByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 累計獲得経験値を設定<br>
     *
     * @param SetExperienceByUserIdRequest $request リクエストパラメータ
     * @return SetExperienceByUserIdResult
     */
    public function setExperienceByUserId (
            SetExperienceByUserIdRequest $request
    ): SetExperienceByUserIdResult {

        $resultAsyncResult = [];
        $this->setExperienceByUserIdAsync(
            $request
        )->then(
            function (SetExperienceByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ランクキャップを加算<br>
     *
     * @param AddRankCapByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ランクキャップを加算<br>
     *
     * @param AddRankCapByUserIdRequest $request リクエストパラメータ
     * @return AddRankCapByUserIdResult
     */
    public function addRankCapByUserId (
            AddRankCapByUserIdRequest $request
    ): AddRankCapByUserIdResult {

        $resultAsyncResult = [];
        $this->addRankCapByUserIdAsync(
            $request
        )->then(
            function (AddRankCapByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ランクキャップを設定<br>
     *
     * @param SetRankCapByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ランクキャップを設定<br>
     *
     * @param SetRankCapByUserIdRequest $request リクエストパラメータ
     * @return SetRankCapByUserIdResult
     */
    public function setRankCapByUserId (
            SetRankCapByUserIdRequest $request
    ): SetRankCapByUserIdResult {

        $resultAsyncResult = [];
        $this->setRankCapByUserIdAsync(
            $request
        )->then(
            function (SetRankCapByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ステータスを削除<br>
     *
     * @param DeleteStatusByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ステータスを削除<br>
     *
     * @param DeleteStatusByUserIdRequest $request リクエストパラメータ
     * @return DeleteStatusByUserIdResult
     */
    public function deleteStatusByUserId (
            DeleteStatusByUserIdRequest $request
    ): DeleteStatusByUserIdResult {

        $resultAsyncResult = [];
        $this->deleteStatusByUserIdAsync(
            $request
        )->then(
            function (DeleteStatusByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 経験値を加算<br>
     *
     * @param AddExperienceByStampSheetRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * 経験値を加算<br>
     *
     * @param AddExperienceByStampSheetRequest $request リクエストパラメータ
     * @return AddExperienceByStampSheetResult
     */
    public function addExperienceByStampSheet (
            AddExperienceByStampSheetRequest $request
    ): AddExperienceByStampSheetResult {

        $resultAsyncResult = [];
        $this->addExperienceByStampSheetAsync(
            $request
        )->then(
            function (AddExperienceByStampSheetResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ランクキャップを加算<br>
     *
     * @param AddRankCapByStampSheetRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ランクキャップを加算<br>
     *
     * @param AddRankCapByStampSheetRequest $request リクエストパラメータ
     * @return AddRankCapByStampSheetResult
     */
    public function addRankCapByStampSheet (
            AddRankCapByStampSheetRequest $request
    ): AddRankCapByStampSheetResult {

        $resultAsyncResult = [];
        $this->addRankCapByStampSheetAsync(
            $request
        )->then(
            function (AddRankCapByStampSheetResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ランクキャップを更新<br>
     *
     * @param SetRankCapByStampSheetRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * ランクキャップを更新<br>
     *
     * @param SetRankCapByStampSheetRequest $request リクエストパラメータ
     * @return SetRankCapByStampSheetResult
     */
    public function setRankCapByStampSheet (
            SetRankCapByStampSheetRequest $request
    ): SetRankCapByStampSheetResult {

        $resultAsyncResult = [];
        $this->setRankCapByStampSheetAsync(
            $request
        )->then(
            function (SetRankCapByStampSheetResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }
}