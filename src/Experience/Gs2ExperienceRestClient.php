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
use Gs2\Experience\Request\GetStatusWithSignatureByUserIdRequest;
use Gs2\Experience\Result\GetStatusWithSignatureByUserIdResult;
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
use Gs2\Experience\Request\MultiplyAcquireActionsByUserIdRequest;
use Gs2\Experience\Result\MultiplyAcquireActionsByUserIdResult;
use Gs2\Experience\Request\MultiplyAcquireActionsByStampSheetRequest;
use Gs2\Experience\Result\MultiplyAcquireActionsByStampSheetResult;

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
        if ($this->request->getExperienceCapScriptId() !== null) {
            $json["experienceCapScriptId"] = $this->request->getExperienceCapScriptId();
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
            $json["overflowExperienceScript"] = $this->request->getOverflowExperienceScript()->toJson();
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
        if ($this->request->getExperienceCapScriptId() !== null) {
            $json["experienceCapScriptId"] = $this->request->getExperienceCapScriptId();
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
            $json["overflowExperienceScript"] = $this->request->getOverflowExperienceScript()->toJson();
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

        $url = str_replace('{service}', "experience", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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
     * @param DescribeExperienceModelMastersRequest $request
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
     * @param DescribeExperienceModelMastersRequest $request
     * @return DescribeExperienceModelMastersResult
     */
    public function describeExperienceModelMasters (
            DescribeExperienceModelMastersRequest $request
    ): DescribeExperienceModelMastersResult {
        return $this->describeExperienceModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateExperienceModelMasterRequest $request
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
     * @param CreateExperienceModelMasterRequest $request
     * @return CreateExperienceModelMasterResult
     */
    public function createExperienceModelMaster (
            CreateExperienceModelMasterRequest $request
    ): CreateExperienceModelMasterResult {
        return $this->createExperienceModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetExperienceModelMasterRequest $request
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
     * @param GetExperienceModelMasterRequest $request
     * @return GetExperienceModelMasterResult
     */
    public function getExperienceModelMaster (
            GetExperienceModelMasterRequest $request
    ): GetExperienceModelMasterResult {
        return $this->getExperienceModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateExperienceModelMasterRequest $request
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
     * @param UpdateExperienceModelMasterRequest $request
     * @return UpdateExperienceModelMasterResult
     */
    public function updateExperienceModelMaster (
            UpdateExperienceModelMasterRequest $request
    ): UpdateExperienceModelMasterResult {
        return $this->updateExperienceModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteExperienceModelMasterRequest $request
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
     * @param DeleteExperienceModelMasterRequest $request
     * @return DeleteExperienceModelMasterResult
     */
    public function deleteExperienceModelMaster (
            DeleteExperienceModelMasterRequest $request
    ): DeleteExperienceModelMasterResult {
        return $this->deleteExperienceModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeExperienceModelsRequest $request
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
     * @param DescribeExperienceModelsRequest $request
     * @return DescribeExperienceModelsResult
     */
    public function describeExperienceModels (
            DescribeExperienceModelsRequest $request
    ): DescribeExperienceModelsResult {
        return $this->describeExperienceModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetExperienceModelRequest $request
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
     * @param GetExperienceModelRequest $request
     * @return GetExperienceModelResult
     */
    public function getExperienceModel (
            GetExperienceModelRequest $request
    ): GetExperienceModelResult {
        return $this->getExperienceModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeThresholdMastersRequest $request
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
     * @param DescribeThresholdMastersRequest $request
     * @return DescribeThresholdMastersResult
     */
    public function describeThresholdMasters (
            DescribeThresholdMastersRequest $request
    ): DescribeThresholdMastersResult {
        return $this->describeThresholdMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateThresholdMasterRequest $request
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
     * @param CreateThresholdMasterRequest $request
     * @return CreateThresholdMasterResult
     */
    public function createThresholdMaster (
            CreateThresholdMasterRequest $request
    ): CreateThresholdMasterResult {
        return $this->createThresholdMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetThresholdMasterRequest $request
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
     * @param GetThresholdMasterRequest $request
     * @return GetThresholdMasterResult
     */
    public function getThresholdMaster (
            GetThresholdMasterRequest $request
    ): GetThresholdMasterResult {
        return $this->getThresholdMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateThresholdMasterRequest $request
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
     * @param UpdateThresholdMasterRequest $request
     * @return UpdateThresholdMasterResult
     */
    public function updateThresholdMaster (
            UpdateThresholdMasterRequest $request
    ): UpdateThresholdMasterResult {
        return $this->updateThresholdMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteThresholdMasterRequest $request
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
     * @param DeleteThresholdMasterRequest $request
     * @return DeleteThresholdMasterResult
     */
    public function deleteThresholdMaster (
            DeleteThresholdMasterRequest $request
    ): DeleteThresholdMasterResult {
        return $this->deleteThresholdMasterAsync(
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
     * @param GetCurrentExperienceMasterRequest $request
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
     * @param GetCurrentExperienceMasterRequest $request
     * @return GetCurrentExperienceMasterResult
     */
    public function getCurrentExperienceMaster (
            GetCurrentExperienceMasterRequest $request
    ): GetCurrentExperienceMasterResult {
        return $this->getCurrentExperienceMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentExperienceMasterRequest $request
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
     * @param UpdateCurrentExperienceMasterRequest $request
     * @return UpdateCurrentExperienceMasterResult
     */
    public function updateCurrentExperienceMaster (
            UpdateCurrentExperienceMasterRequest $request
    ): UpdateCurrentExperienceMasterResult {
        return $this->updateCurrentExperienceMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentExperienceMasterFromGitHubRequest $request
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
     * @param UpdateCurrentExperienceMasterFromGitHubRequest $request
     * @return UpdateCurrentExperienceMasterFromGitHubResult
     */
    public function updateCurrentExperienceMasterFromGitHub (
            UpdateCurrentExperienceMasterFromGitHubRequest $request
    ): UpdateCurrentExperienceMasterFromGitHubResult {
        return $this->updateCurrentExperienceMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStatusesRequest $request
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
     * @param DescribeStatusesRequest $request
     * @return DescribeStatusesResult
     */
    public function describeStatuses (
            DescribeStatusesRequest $request
    ): DescribeStatusesResult {
        return $this->describeStatusesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeStatusesByUserIdRequest $request
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
     * @param DescribeStatusesByUserIdRequest $request
     * @return DescribeStatusesByUserIdResult
     */
    public function describeStatusesByUserId (
            DescribeStatusesByUserIdRequest $request
    ): DescribeStatusesByUserIdResult {
        return $this->describeStatusesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStatusRequest $request
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
     * @param GetStatusRequest $request
     * @return GetStatusResult
     */
    public function getStatus (
            GetStatusRequest $request
    ): GetStatusResult {
        return $this->getStatusAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStatusByUserIdRequest $request
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
     * @param GetStatusByUserIdRequest $request
     * @return GetStatusByUserIdResult
     */
    public function getStatusByUserId (
            GetStatusByUserIdRequest $request
    ): GetStatusByUserIdResult {
        return $this->getStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStatusWithSignatureRequest $request
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
     * @param GetStatusWithSignatureRequest $request
     * @return GetStatusWithSignatureResult
     */
    public function getStatusWithSignature (
            GetStatusWithSignatureRequest $request
    ): GetStatusWithSignatureResult {
        return $this->getStatusWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * @param GetStatusWithSignatureByUserIdRequest $request
     * @return PromiseInterface
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
     * @param GetStatusWithSignatureByUserIdRequest $request
     * @return GetStatusWithSignatureByUserIdResult
     */
    public function getStatusWithSignatureByUserId (
            GetStatusWithSignatureByUserIdRequest $request
    ): GetStatusWithSignatureByUserIdResult {
        return $this->getStatusWithSignatureByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddExperienceByUserIdRequest $request
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
     * @param AddExperienceByUserIdRequest $request
     * @return AddExperienceByUserIdResult
     */
    public function addExperienceByUserId (
            AddExperienceByUserIdRequest $request
    ): AddExperienceByUserIdResult {
        return $this->addExperienceByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetExperienceByUserIdRequest $request
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
     * @param SetExperienceByUserIdRequest $request
     * @return SetExperienceByUserIdResult
     */
    public function setExperienceByUserId (
            SetExperienceByUserIdRequest $request
    ): SetExperienceByUserIdResult {
        return $this->setExperienceByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddRankCapByUserIdRequest $request
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
     * @param AddRankCapByUserIdRequest $request
     * @return AddRankCapByUserIdResult
     */
    public function addRankCapByUserId (
            AddRankCapByUserIdRequest $request
    ): AddRankCapByUserIdResult {
        return $this->addRankCapByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetRankCapByUserIdRequest $request
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
     * @param SetRankCapByUserIdRequest $request
     * @return SetRankCapByUserIdResult
     */
    public function setRankCapByUserId (
            SetRankCapByUserIdRequest $request
    ): SetRankCapByUserIdResult {
        return $this->setRankCapByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteStatusByUserIdRequest $request
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
     * @param DeleteStatusByUserIdRequest $request
     * @return DeleteStatusByUserIdResult
     */
    public function deleteStatusByUserId (
            DeleteStatusByUserIdRequest $request
    ): DeleteStatusByUserIdResult {
        return $this->deleteStatusByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddExperienceByStampSheetRequest $request
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
     * @param AddExperienceByStampSheetRequest $request
     * @return AddExperienceByStampSheetResult
     */
    public function addExperienceByStampSheet (
            AddExperienceByStampSheetRequest $request
    ): AddExperienceByStampSheetResult {
        return $this->addExperienceByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param AddRankCapByStampSheetRequest $request
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
     * @param AddRankCapByStampSheetRequest $request
     * @return AddRankCapByStampSheetResult
     */
    public function addRankCapByStampSheet (
            AddRankCapByStampSheetRequest $request
    ): AddRankCapByStampSheetResult {
        return $this->addRankCapByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param SetRankCapByStampSheetRequest $request
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
     * @param SetRankCapByStampSheetRequest $request
     * @return SetRankCapByStampSheetResult
     */
    public function setRankCapByStampSheet (
            SetRankCapByStampSheetRequest $request
    ): SetRankCapByStampSheetResult {
        return $this->setRankCapByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param MultiplyAcquireActionsByUserIdRequest $request
     * @return PromiseInterface
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
     * @param MultiplyAcquireActionsByUserIdRequest $request
     * @return MultiplyAcquireActionsByUserIdResult
     */
    public function multiplyAcquireActionsByUserId (
            MultiplyAcquireActionsByUserIdRequest $request
    ): MultiplyAcquireActionsByUserIdResult {
        return $this->multiplyAcquireActionsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param MultiplyAcquireActionsByStampSheetRequest $request
     * @return PromiseInterface
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
     * @param MultiplyAcquireActionsByStampSheetRequest $request
     * @return MultiplyAcquireActionsByStampSheetResult
     */
    public function multiplyAcquireActionsByStampSheet (
            MultiplyAcquireActionsByStampSheetRequest $request
    ): MultiplyAcquireActionsByStampSheetResult {
        return $this->multiplyAcquireActionsByStampSheetAsync(
            $request
        )->wait();
    }
}