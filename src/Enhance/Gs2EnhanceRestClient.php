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

namespace Gs2\Enhance;

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


use Gs2\Enhance\Request\DescribeNamespacesRequest;
use Gs2\Enhance\Result\DescribeNamespacesResult;
use Gs2\Enhance\Request\CreateNamespaceRequest;
use Gs2\Enhance\Result\CreateNamespaceResult;
use Gs2\Enhance\Request\GetNamespaceStatusRequest;
use Gs2\Enhance\Result\GetNamespaceStatusResult;
use Gs2\Enhance\Request\GetNamespaceRequest;
use Gs2\Enhance\Result\GetNamespaceResult;
use Gs2\Enhance\Request\UpdateNamespaceRequest;
use Gs2\Enhance\Result\UpdateNamespaceResult;
use Gs2\Enhance\Request\DeleteNamespaceRequest;
use Gs2\Enhance\Result\DeleteNamespaceResult;
use Gs2\Enhance\Request\DescribeRateModelsRequest;
use Gs2\Enhance\Result\DescribeRateModelsResult;
use Gs2\Enhance\Request\GetRateModelRequest;
use Gs2\Enhance\Result\GetRateModelResult;
use Gs2\Enhance\Request\DescribeRateModelMastersRequest;
use Gs2\Enhance\Result\DescribeRateModelMastersResult;
use Gs2\Enhance\Request\CreateRateModelMasterRequest;
use Gs2\Enhance\Result\CreateRateModelMasterResult;
use Gs2\Enhance\Request\GetRateModelMasterRequest;
use Gs2\Enhance\Result\GetRateModelMasterResult;
use Gs2\Enhance\Request\UpdateRateModelMasterRequest;
use Gs2\Enhance\Result\UpdateRateModelMasterResult;
use Gs2\Enhance\Request\DeleteRateModelMasterRequest;
use Gs2\Enhance\Result\DeleteRateModelMasterResult;
use Gs2\Enhance\Request\DirectEnhanceRequest;
use Gs2\Enhance\Result\DirectEnhanceResult;
use Gs2\Enhance\Request\DirectEnhanceByUserIdRequest;
use Gs2\Enhance\Result\DirectEnhanceByUserIdResult;
use Gs2\Enhance\Request\DirectEnhanceByStampSheetRequest;
use Gs2\Enhance\Result\DirectEnhanceByStampSheetResult;
use Gs2\Enhance\Request\CreateProgressByUserIdRequest;
use Gs2\Enhance\Result\CreateProgressByUserIdResult;
use Gs2\Enhance\Request\GetProgressRequest;
use Gs2\Enhance\Result\GetProgressResult;
use Gs2\Enhance\Request\GetProgressByUserIdRequest;
use Gs2\Enhance\Result\GetProgressByUserIdResult;
use Gs2\Enhance\Request\StartRequest;
use Gs2\Enhance\Result\StartResult;
use Gs2\Enhance\Request\StartByUserIdRequest;
use Gs2\Enhance\Result\StartByUserIdResult;
use Gs2\Enhance\Request\EndRequest;
use Gs2\Enhance\Result\EndResult;
use Gs2\Enhance\Request\EndByUserIdRequest;
use Gs2\Enhance\Result\EndByUserIdResult;
use Gs2\Enhance\Request\DeleteProgressRequest;
use Gs2\Enhance\Result\DeleteProgressResult;
use Gs2\Enhance\Request\DeleteProgressByUserIdRequest;
use Gs2\Enhance\Result\DeleteProgressByUserIdResult;
use Gs2\Enhance\Request\CreateProgressByStampSheetRequest;
use Gs2\Enhance\Result\CreateProgressByStampSheetResult;
use Gs2\Enhance\Request\DeleteProgressByStampTaskRequest;
use Gs2\Enhance\Result\DeleteProgressByStampTaskResult;
use Gs2\Enhance\Request\ExportMasterRequest;
use Gs2\Enhance\Result\ExportMasterResult;
use Gs2\Enhance\Request\GetCurrentRateMasterRequest;
use Gs2\Enhance\Result\GetCurrentRateMasterResult;
use Gs2\Enhance\Request\UpdateCurrentRateMasterRequest;
use Gs2\Enhance\Result\UpdateCurrentRateMasterResult;
use Gs2\Enhance\Request\UpdateCurrentRateMasterFromGitHubRequest;
use Gs2\Enhance\Result\UpdateCurrentRateMasterFromGitHubResult;

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

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEnableDirectEnhance() !== null) {
            $json["enableDirectEnhance"] = $this->request->getEnableDirectEnhance();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getEnhanceScript() !== null) {
            $json["enhanceScript"] = $this->request->getEnhanceScript()->toJson();
        }
        if ($this->request->getLogSetting() !== null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
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

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEnableDirectEnhance() !== null) {
            $json["enableDirectEnhance"] = $this->request->getEnableDirectEnhance();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getEnhanceScript() !== null) {
            $json["enhanceScript"] = $this->request->getEnhanceScript()->toJson();
        }
        if ($this->request->getLogSetting() !== null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeRateModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRateModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRateModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRateModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRateModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRateModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetRateModelTask extends Gs2RestSessionTask {

    /**
     * @var GetRateModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRateModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetRateModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRateModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetRateModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

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

class DescribeRateModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeRateModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeRateModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeRateModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeRateModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeRateModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateRateModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateRateModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateRateModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateRateModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateRateModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateRateModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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
        if ($this->request->getTargetInventoryModelId() !== null) {
            $json["targetInventoryModelId"] = $this->request->getTargetInventoryModelId();
        }
        if ($this->request->getAcquireExperienceSuffix() !== null) {
            $json["acquireExperienceSuffix"] = $this->request->getAcquireExperienceSuffix();
        }
        if ($this->request->getMaterialInventoryModelId() !== null) {
            $json["materialInventoryModelId"] = $this->request->getMaterialInventoryModelId();
        }
        if ($this->request->getAcquireExperienceHierarchy() !== null) {
            $array = [];
            foreach ($this->request->getAcquireExperienceHierarchy() as $item)
            {
                array_push($array, $item);
            }
            $json["acquireExperienceHierarchy"] = $array;
        }
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getBonusRates() !== null) {
            $array = [];
            foreach ($this->request->getBonusRates() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["bonusRates"] = $array;
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

class GetRateModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetRateModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRateModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetRateModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRateModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetRateModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

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

class UpdateRateModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateRateModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateRateModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateRateModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateRateModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateRateModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getTargetInventoryModelId() !== null) {
            $json["targetInventoryModelId"] = $this->request->getTargetInventoryModelId();
        }
        if ($this->request->getAcquireExperienceSuffix() !== null) {
            $json["acquireExperienceSuffix"] = $this->request->getAcquireExperienceSuffix();
        }
        if ($this->request->getMaterialInventoryModelId() !== null) {
            $json["materialInventoryModelId"] = $this->request->getMaterialInventoryModelId();
        }
        if ($this->request->getAcquireExperienceHierarchy() !== null) {
            $array = [];
            foreach ($this->request->getAcquireExperienceHierarchy() as $item)
            {
                array_push($array, $item);
            }
            $json["acquireExperienceHierarchy"] = $array;
        }
        if ($this->request->getExperienceModelId() !== null) {
            $json["experienceModelId"] = $this->request->getExperienceModelId();
        }
        if ($this->request->getBonusRates() !== null) {
            $array = [];
            foreach ($this->request->getBonusRates() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["bonusRates"] = $array;
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

class DeleteRateModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteRateModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteRateModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteRateModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteRateModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteRateModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

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

class DirectEnhanceTask extends Gs2RestSessionTask {

    /**
     * @var DirectEnhanceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DirectEnhanceTask constructor.
     * @param Gs2RestSession $session
     * @param DirectEnhanceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DirectEnhanceRequest $request
    ) {
        parent::__construct(
            $session,
            DirectEnhanceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/enhance/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

        $json = [];
        if ($this->request->getTargetItemSetId() !== null) {
            $json["targetItemSetId"] = $this->request->getTargetItemSetId();
        }
        if ($this->request->getMaterials() !== null) {
            $array = [];
            foreach ($this->request->getMaterials() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["materials"] = $array;
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

class DirectEnhanceByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DirectEnhanceByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DirectEnhanceByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DirectEnhanceByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DirectEnhanceByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DirectEnhanceByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/enhance/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTargetItemSetId() !== null) {
            $json["targetItemSetId"] = $this->request->getTargetItemSetId();
        }
        if ($this->request->getMaterials() !== null) {
            $array = [];
            foreach ($this->request->getMaterials() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["materials"] = $array;
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

        return parent::executeImpl();
    }
}

class DirectEnhanceByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var DirectEnhanceByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DirectEnhanceByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param DirectEnhanceByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DirectEnhanceByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            DirectEnhanceByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/enhance/direct";

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

class CreateProgressByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreateProgressByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateProgressByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreateProgressByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateProgressByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreateProgressByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getRateName() !== null) {
            $json["rateName"] = $this->request->getRateName();
        }
        if ($this->request->getTargetItemSetId() !== null) {
            $json["targetItemSetId"] = $this->request->getTargetItemSetId();
        }
        if ($this->request->getMaterials() !== null) {
            $array = [];
            foreach ($this->request->getMaterials() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["materials"] = $array;
        }
        if ($this->request->getForce() !== null) {
            $json["force"] = $this->request->getForce();
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

class GetProgressTask extends Gs2RestSessionTask {

    /**
     * @var GetProgressRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetProgressTask constructor.
     * @param Gs2RestSession $session
     * @param GetProgressRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetProgressRequest $request
    ) {
        parent::__construct(
            $session,
            GetProgressResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/progress";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetProgressByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetProgressByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetProgressByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetProgressByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetProgressByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetProgressByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

        return parent::executeImpl();
    }
}

class StartTask extends Gs2RestSessionTask {

    /**
     * @var StartRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * StartTask constructor.
     * @param Gs2RestSession $session
     * @param StartRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        StartRequest $request
    ) {
        parent::__construct(
            $session,
            StartResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/progress/rate/{rateName}/start";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

        $json = [];
        if ($this->request->getTargetItemSetId() !== null) {
            $json["targetItemSetId"] = $this->request->getTargetItemSetId();
        }
        if ($this->request->getMaterials() !== null) {
            $array = [];
            foreach ($this->request->getMaterials() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["materials"] = $array;
        }
        if ($this->request->getForce() !== null) {
            $json["force"] = $this->request->getForce();
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

class StartByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var StartByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * StartByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param StartByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        StartByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            StartByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress/rate/{rateName}/start";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTargetItemSetId() !== null) {
            $json["targetItemSetId"] = $this->request->getTargetItemSetId();
        }
        if ($this->request->getMaterials() !== null) {
            $array = [];
            foreach ($this->request->getMaterials() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["materials"] = $array;
        }
        if ($this->request->getForce() !== null) {
            $json["force"] = $this->request->getForce();
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

        return parent::executeImpl();
    }
}

class EndTask extends Gs2RestSessionTask {

    /**
     * @var EndRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * EndTask constructor.
     * @param Gs2RestSession $session
     * @param EndRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        EndRequest $request
    ) {
        parent::__construct(
            $session,
            EndResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/progress/end";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

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

class EndByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var EndByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * EndByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param EndByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        EndByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            EndByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress/end";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

        return parent::executeImpl();
    }
}

class DeleteProgressTask extends Gs2RestSessionTask {

    /**
     * @var DeleteProgressRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteProgressTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteProgressRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteProgressRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteProgressResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/progress";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteProgressByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteProgressByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteProgressByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteProgressByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteProgressByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteProgressByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/progress";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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

class CreateProgressByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var CreateProgressByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateProgressByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param CreateProgressByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateProgressByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            CreateProgressByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/progress/create";

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

class DeleteProgressByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var DeleteProgressByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteProgressByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteProgressByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteProgressByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteProgressByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/progress/delete";

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

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentRateMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentRateMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentRateMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentRateMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentRateMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentRateMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentRateMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentRateMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentRateMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentRateMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentRateMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentRateMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentRateMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentRateMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentRateMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentRateMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentRateMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentRateMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "enhance", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2 Enhance API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2EnhanceRestClient extends AbstractGs2Client {

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
     * @param DescribeRateModelsRequest $request
     * @return PromiseInterface
     */
    public function describeRateModelsAsync(
            DescribeRateModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRateModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRateModelsRequest $request
     * @return DescribeRateModelsResult
     */
    public function describeRateModels (
            DescribeRateModelsRequest $request
    ): DescribeRateModelsResult {
        return $this->describeRateModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRateModelRequest $request
     * @return PromiseInterface
     */
    public function getRateModelAsync(
            GetRateModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRateModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRateModelRequest $request
     * @return GetRateModelResult
     */
    public function getRateModel (
            GetRateModelRequest $request
    ): GetRateModelResult {
        return $this->getRateModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeRateModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeRateModelMastersAsync(
            DescribeRateModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeRateModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeRateModelMastersRequest $request
     * @return DescribeRateModelMastersResult
     */
    public function describeRateModelMasters (
            DescribeRateModelMastersRequest $request
    ): DescribeRateModelMastersResult {
        return $this->describeRateModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateRateModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createRateModelMasterAsync(
            CreateRateModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateRateModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateRateModelMasterRequest $request
     * @return CreateRateModelMasterResult
     */
    public function createRateModelMaster (
            CreateRateModelMasterRequest $request
    ): CreateRateModelMasterResult {
        return $this->createRateModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRateModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getRateModelMasterAsync(
            GetRateModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRateModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRateModelMasterRequest $request
     * @return GetRateModelMasterResult
     */
    public function getRateModelMaster (
            GetRateModelMasterRequest $request
    ): GetRateModelMasterResult {
        return $this->getRateModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateRateModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateRateModelMasterAsync(
            UpdateRateModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateRateModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateRateModelMasterRequest $request
     * @return UpdateRateModelMasterResult
     */
    public function updateRateModelMaster (
            UpdateRateModelMasterRequest $request
    ): UpdateRateModelMasterResult {
        return $this->updateRateModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteRateModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteRateModelMasterAsync(
            DeleteRateModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteRateModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteRateModelMasterRequest $request
     * @return DeleteRateModelMasterResult
     */
    public function deleteRateModelMaster (
            DeleteRateModelMasterRequest $request
    ): DeleteRateModelMasterResult {
        return $this->deleteRateModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DirectEnhanceRequest $request
     * @return PromiseInterface
     */
    public function directEnhanceAsync(
            DirectEnhanceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DirectEnhanceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DirectEnhanceRequest $request
     * @return DirectEnhanceResult
     */
    public function directEnhance (
            DirectEnhanceRequest $request
    ): DirectEnhanceResult {
        return $this->directEnhanceAsync(
            $request
        )->wait();
    }

    /**
     * @param DirectEnhanceByUserIdRequest $request
     * @return PromiseInterface
     */
    public function directEnhanceByUserIdAsync(
            DirectEnhanceByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DirectEnhanceByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DirectEnhanceByUserIdRequest $request
     * @return DirectEnhanceByUserIdResult
     */
    public function directEnhanceByUserId (
            DirectEnhanceByUserIdRequest $request
    ): DirectEnhanceByUserIdResult {
        return $this->directEnhanceByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DirectEnhanceByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function directEnhanceByStampSheetAsync(
            DirectEnhanceByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DirectEnhanceByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DirectEnhanceByStampSheetRequest $request
     * @return DirectEnhanceByStampSheetResult
     */
    public function directEnhanceByStampSheet (
            DirectEnhanceByStampSheetRequest $request
    ): DirectEnhanceByStampSheetResult {
        return $this->directEnhanceByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateProgressByUserIdRequest $request
     * @return PromiseInterface
     */
    public function createProgressByUserIdAsync(
            CreateProgressByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateProgressByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateProgressByUserIdRequest $request
     * @return CreateProgressByUserIdResult
     */
    public function createProgressByUserId (
            CreateProgressByUserIdRequest $request
    ): CreateProgressByUserIdResult {
        return $this->createProgressByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetProgressRequest $request
     * @return PromiseInterface
     */
    public function getProgressAsync(
            GetProgressRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetProgressTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetProgressRequest $request
     * @return GetProgressResult
     */
    public function getProgress (
            GetProgressRequest $request
    ): GetProgressResult {
        return $this->getProgressAsync(
            $request
        )->wait();
    }

    /**
     * @param GetProgressByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getProgressByUserIdAsync(
            GetProgressByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetProgressByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetProgressByUserIdRequest $request
     * @return GetProgressByUserIdResult
     */
    public function getProgressByUserId (
            GetProgressByUserIdRequest $request
    ): GetProgressByUserIdResult {
        return $this->getProgressByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param StartRequest $request
     * @return PromiseInterface
     */
    public function startAsync(
            StartRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new StartTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param StartRequest $request
     * @return StartResult
     */
    public function start (
            StartRequest $request
    ): StartResult {
        return $this->startAsync(
            $request
        )->wait();
    }

    /**
     * @param StartByUserIdRequest $request
     * @return PromiseInterface
     */
    public function startByUserIdAsync(
            StartByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new StartByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param StartByUserIdRequest $request
     * @return StartByUserIdResult
     */
    public function startByUserId (
            StartByUserIdRequest $request
    ): StartByUserIdResult {
        return $this->startByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param EndRequest $request
     * @return PromiseInterface
     */
    public function endAsync(
            EndRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new EndTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param EndRequest $request
     * @return EndResult
     */
    public function end (
            EndRequest $request
    ): EndResult {
        return $this->endAsync(
            $request
        )->wait();
    }

    /**
     * @param EndByUserIdRequest $request
     * @return PromiseInterface
     */
    public function endByUserIdAsync(
            EndByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new EndByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param EndByUserIdRequest $request
     * @return EndByUserIdResult
     */
    public function endByUserId (
            EndByUserIdRequest $request
    ): EndByUserIdResult {
        return $this->endByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteProgressRequest $request
     * @return PromiseInterface
     */
    public function deleteProgressAsync(
            DeleteProgressRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteProgressTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteProgressRequest $request
     * @return DeleteProgressResult
     */
    public function deleteProgress (
            DeleteProgressRequest $request
    ): DeleteProgressResult {
        return $this->deleteProgressAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteProgressByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteProgressByUserIdAsync(
            DeleteProgressByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteProgressByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteProgressByUserIdRequest $request
     * @return DeleteProgressByUserIdResult
     */
    public function deleteProgressByUserId (
            DeleteProgressByUserIdRequest $request
    ): DeleteProgressByUserIdResult {
        return $this->deleteProgressByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateProgressByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function createProgressByStampSheetAsync(
            CreateProgressByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateProgressByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateProgressByStampSheetRequest $request
     * @return CreateProgressByStampSheetResult
     */
    public function createProgressByStampSheet (
            CreateProgressByStampSheetRequest $request
    ): CreateProgressByStampSheetResult {
        return $this->createProgressByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteProgressByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function deleteProgressByStampTaskAsync(
            DeleteProgressByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteProgressByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteProgressByStampTaskRequest $request
     * @return DeleteProgressByStampTaskResult
     */
    public function deleteProgressByStampTask (
            DeleteProgressByStampTaskRequest $request
    ): DeleteProgressByStampTaskResult {
        return $this->deleteProgressByStampTaskAsync(
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
     * @param GetCurrentRateMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentRateMasterAsync(
            GetCurrentRateMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentRateMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentRateMasterRequest $request
     * @return GetCurrentRateMasterResult
     */
    public function getCurrentRateMaster (
            GetCurrentRateMasterRequest $request
    ): GetCurrentRateMasterResult {
        return $this->getCurrentRateMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentRateMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentRateMasterAsync(
            UpdateCurrentRateMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentRateMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentRateMasterRequest $request
     * @return UpdateCurrentRateMasterResult
     */
    public function updateCurrentRateMaster (
            UpdateCurrentRateMasterRequest $request
    ): UpdateCurrentRateMasterResult {
        return $this->updateCurrentRateMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentRateMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentRateMasterFromGitHubAsync(
            UpdateCurrentRateMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentRateMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentRateMasterFromGitHubRequest $request
     * @return UpdateCurrentRateMasterFromGitHubResult
     */
    public function updateCurrentRateMasterFromGitHub (
            UpdateCurrentRateMasterFromGitHubRequest $request
    ): UpdateCurrentRateMasterFromGitHubResult {
        return $this->updateCurrentRateMasterFromGitHubAsync(
            $request
        )->wait();
    }
}