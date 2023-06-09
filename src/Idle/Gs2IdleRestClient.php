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

namespace Gs2\Idle;

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


use Gs2\Idle\Request\DescribeNamespacesRequest;
use Gs2\Idle\Result\DescribeNamespacesResult;
use Gs2\Idle\Request\CreateNamespaceRequest;
use Gs2\Idle\Result\CreateNamespaceResult;
use Gs2\Idle\Request\GetNamespaceStatusRequest;
use Gs2\Idle\Result\GetNamespaceStatusResult;
use Gs2\Idle\Request\GetNamespaceRequest;
use Gs2\Idle\Result\GetNamespaceResult;
use Gs2\Idle\Request\UpdateNamespaceRequest;
use Gs2\Idle\Result\UpdateNamespaceResult;
use Gs2\Idle\Request\DeleteNamespaceRequest;
use Gs2\Idle\Result\DeleteNamespaceResult;
use Gs2\Idle\Request\DescribeCategoryModelMastersRequest;
use Gs2\Idle\Result\DescribeCategoryModelMastersResult;
use Gs2\Idle\Request\CreateCategoryModelMasterRequest;
use Gs2\Idle\Result\CreateCategoryModelMasterResult;
use Gs2\Idle\Request\GetCategoryModelMasterRequest;
use Gs2\Idle\Result\GetCategoryModelMasterResult;
use Gs2\Idle\Request\UpdateCategoryModelMasterRequest;
use Gs2\Idle\Result\UpdateCategoryModelMasterResult;
use Gs2\Idle\Request\DeleteCategoryModelMasterRequest;
use Gs2\Idle\Result\DeleteCategoryModelMasterResult;
use Gs2\Idle\Request\DescribeCategoryModelsRequest;
use Gs2\Idle\Result\DescribeCategoryModelsResult;
use Gs2\Idle\Request\GetCategoryModelRequest;
use Gs2\Idle\Result\GetCategoryModelResult;
use Gs2\Idle\Request\DescribeStatusesRequest;
use Gs2\Idle\Result\DescribeStatusesResult;
use Gs2\Idle\Request\DescribeStatusesByUserIdRequest;
use Gs2\Idle\Result\DescribeStatusesByUserIdResult;
use Gs2\Idle\Request\GetStatusRequest;
use Gs2\Idle\Result\GetStatusResult;
use Gs2\Idle\Request\GetStatusByUserIdRequest;
use Gs2\Idle\Result\GetStatusByUserIdResult;
use Gs2\Idle\Request\PredictionRequest;
use Gs2\Idle\Result\PredictionResult;
use Gs2\Idle\Request\PredictionByUserIdRequest;
use Gs2\Idle\Result\PredictionByUserIdResult;
use Gs2\Idle\Request\ReceiveRequest;
use Gs2\Idle\Result\ReceiveResult;
use Gs2\Idle\Request\ReceiveByUserIdRequest;
use Gs2\Idle\Result\ReceiveByUserIdResult;
use Gs2\Idle\Request\IncreaseMaximumIdleMinutesByUserIdRequest;
use Gs2\Idle\Result\IncreaseMaximumIdleMinutesByUserIdResult;
use Gs2\Idle\Request\IncreaseMaximumIdleMinutesByStampSheetRequest;
use Gs2\Idle\Result\IncreaseMaximumIdleMinutesByStampSheetResult;
use Gs2\Idle\Request\ExportMasterRequest;
use Gs2\Idle\Result\ExportMasterResult;
use Gs2\Idle\Request\GetCurrentIdleMasterRequest;
use Gs2\Idle\Result\GetCurrentIdleMasterResult;
use Gs2\Idle\Request\UpdateCurrentIdleMasterRequest;
use Gs2\Idle\Result\UpdateCurrentIdleMasterResult;
use Gs2\Idle\Request\UpdateCurrentIdleMasterFromGitHubRequest;
use Gs2\Idle\Result\UpdateCurrentIdleMasterFromGitHubResult;

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeCategoryModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCategoryModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCategoryModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCategoryModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCategoryModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCategoryModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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
        if ($this->request->getRewardIntervalMinutes() !== null) {
            $json["rewardIntervalMinutes"] = $this->request->getRewardIntervalMinutes();
        }
        if ($this->request->getDefaultMaximumIdleMinutes() !== null) {
            $json["defaultMaximumIdleMinutes"] = $this->request->getDefaultMaximumIdleMinutes();
        }
        if ($this->request->getAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
        }
        if ($this->request->getIdlePeriodScheduleId() !== null) {
            $json["idlePeriodScheduleId"] = $this->request->getIdlePeriodScheduleId();
        }
        if ($this->request->getReceivePeriodScheduleId() !== null) {
            $json["receivePeriodScheduleId"] = $this->request->getReceivePeriodScheduleId();
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

class GetCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

class UpdateCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getRewardIntervalMinutes() !== null) {
            $json["rewardIntervalMinutes"] = $this->request->getRewardIntervalMinutes();
        }
        if ($this->request->getDefaultMaximumIdleMinutes() !== null) {
            $json["defaultMaximumIdleMinutes"] = $this->request->getDefaultMaximumIdleMinutes();
        }
        if ($this->request->getAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
        }
        if ($this->request->getIdlePeriodScheduleId() !== null) {
            $json["idlePeriodScheduleId"] = $this->request->getIdlePeriodScheduleId();
        }
        if ($this->request->getReceivePeriodScheduleId() !== null) {
            $json["receivePeriodScheduleId"] = $this->request->getReceivePeriodScheduleId();
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

class DeleteCategoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCategoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCategoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCategoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCategoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCategoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

class DescribeCategoryModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCategoryModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCategoryModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCategoryModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCategoryModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCategoryModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetCategoryModelTask extends Gs2RestSessionTask {

    /**
     * @var GetCategoryModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCategoryModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetCategoryModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCategoryModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetCategoryModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getCategoryName() !== null) {
            $queryStrings["categoryName"] = $this->request->getCategoryName();
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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getCategoryName() !== null) {
            $queryStrings["categoryName"] = $this->request->getCategoryName();
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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

class PredictionTask extends Gs2RestSessionTask {

    /**
     * @var PredictionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PredictionTask constructor.
     * @param Gs2RestSession $session
     * @param PredictionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PredictionRequest $request
    ) {
        parent::__construct(
            $session,
            PredictionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/model/{categoryName}/prediction";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class PredictionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PredictionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PredictionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PredictionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PredictionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PredictionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{categoryName}/prediction";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/status/model/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{categoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

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

class IncreaseMaximumIdleMinutesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var IncreaseMaximumIdleMinutesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IncreaseMaximumIdleMinutesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param IncreaseMaximumIdleMinutesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IncreaseMaximumIdleMinutesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            IncreaseMaximumIdleMinutesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/status/model/{categoryName}/maximumIdle/increase";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{categoryName}", $this->request->getCategoryName() === null|| strlen($this->request->getCategoryName()) == 0 ? "null" : $this->request->getCategoryName(), $url);

        $json = [];
        if ($this->request->getIncreaseMinutes() !== null) {
            $json["increaseMinutes"] = $this->request->getIncreaseMinutes();
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

class IncreaseMaximumIdleMinutesByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var IncreaseMaximumIdleMinutesByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IncreaseMaximumIdleMinutesByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param IncreaseMaximumIdleMinutesByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IncreaseMaximumIdleMinutesByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            IncreaseMaximumIdleMinutesByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/status/maximumIdleMinutes/add";

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

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentIdleMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentIdleMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentIdleMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentIdleMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentIdleMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentIdleMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentIdleMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentIdleMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentIdleMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentIdleMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentIdleMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentIdleMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentIdleMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentIdleMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentIdleMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentIdleMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentIdleMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentIdleMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "idle", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2 Idle API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2IdleRestClient extends AbstractGs2Client {

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
     * @param DescribeCategoryModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeCategoryModelMastersAsync(
            DescribeCategoryModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCategoryModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCategoryModelMastersRequest $request
     * @return DescribeCategoryModelMastersResult
     */
    public function describeCategoryModelMasters (
            DescribeCategoryModelMastersRequest $request
    ): DescribeCategoryModelMastersResult {
        return $this->describeCategoryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateCategoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createCategoryModelMasterAsync(
            CreateCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateCategoryModelMasterRequest $request
     * @return CreateCategoryModelMasterResult
     */
    public function createCategoryModelMaster (
            CreateCategoryModelMasterRequest $request
    ): CreateCategoryModelMasterResult {
        return $this->createCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCategoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getCategoryModelMasterAsync(
            GetCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCategoryModelMasterRequest $request
     * @return GetCategoryModelMasterResult
     */
    public function getCategoryModelMaster (
            GetCategoryModelMasterRequest $request
    ): GetCategoryModelMasterResult {
        return $this->getCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCategoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCategoryModelMasterAsync(
            UpdateCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCategoryModelMasterRequest $request
     * @return UpdateCategoryModelMasterResult
     */
    public function updateCategoryModelMaster (
            UpdateCategoryModelMasterRequest $request
    ): UpdateCategoryModelMasterResult {
        return $this->updateCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteCategoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteCategoryModelMasterAsync(
            DeleteCategoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCategoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteCategoryModelMasterRequest $request
     * @return DeleteCategoryModelMasterResult
     */
    public function deleteCategoryModelMaster (
            DeleteCategoryModelMasterRequest $request
    ): DeleteCategoryModelMasterResult {
        return $this->deleteCategoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCategoryModelsRequest $request
     * @return PromiseInterface
     */
    public function describeCategoryModelsAsync(
            DescribeCategoryModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCategoryModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCategoryModelsRequest $request
     * @return DescribeCategoryModelsResult
     */
    public function describeCategoryModels (
            DescribeCategoryModelsRequest $request
    ): DescribeCategoryModelsResult {
        return $this->describeCategoryModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCategoryModelRequest $request
     * @return PromiseInterface
     */
    public function getCategoryModelAsync(
            GetCategoryModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCategoryModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCategoryModelRequest $request
     * @return GetCategoryModelResult
     */
    public function getCategoryModel (
            GetCategoryModelRequest $request
    ): GetCategoryModelResult {
        return $this->getCategoryModelAsync(
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
     * @param PredictionRequest $request
     * @return PromiseInterface
     */
    public function predictionAsync(
            PredictionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PredictionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PredictionRequest $request
     * @return PredictionResult
     */
    public function prediction (
            PredictionRequest $request
    ): PredictionResult {
        return $this->predictionAsync(
            $request
        )->wait();
    }

    /**
     * @param PredictionByUserIdRequest $request
     * @return PromiseInterface
     */
    public function predictionByUserIdAsync(
            PredictionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PredictionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PredictionByUserIdRequest $request
     * @return PredictionByUserIdResult
     */
    public function predictionByUserId (
            PredictionByUserIdRequest $request
    ): PredictionByUserIdResult {
        return $this->predictionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ReceiveRequest $request
     * @return PromiseInterface
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
     * @param ReceiveRequest $request
     * @return ReceiveResult
     */
    public function receive (
            ReceiveRequest $request
    ): ReceiveResult {
        return $this->receiveAsync(
            $request
        )->wait();
    }

    /**
     * @param ReceiveByUserIdRequest $request
     * @return PromiseInterface
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
     * @param ReceiveByUserIdRequest $request
     * @return ReceiveByUserIdResult
     */
    public function receiveByUserId (
            ReceiveByUserIdRequest $request
    ): ReceiveByUserIdResult {
        return $this->receiveByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param IncreaseMaximumIdleMinutesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function increaseMaximumIdleMinutesByUserIdAsync(
            IncreaseMaximumIdleMinutesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IncreaseMaximumIdleMinutesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IncreaseMaximumIdleMinutesByUserIdRequest $request
     * @return IncreaseMaximumIdleMinutesByUserIdResult
     */
    public function increaseMaximumIdleMinutesByUserId (
            IncreaseMaximumIdleMinutesByUserIdRequest $request
    ): IncreaseMaximumIdleMinutesByUserIdResult {
        return $this->increaseMaximumIdleMinutesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param IncreaseMaximumIdleMinutesByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function increaseMaximumIdleMinutesByStampSheetAsync(
            IncreaseMaximumIdleMinutesByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IncreaseMaximumIdleMinutesByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IncreaseMaximumIdleMinutesByStampSheetRequest $request
     * @return IncreaseMaximumIdleMinutesByStampSheetResult
     */
    public function increaseMaximumIdleMinutesByStampSheet (
            IncreaseMaximumIdleMinutesByStampSheetRequest $request
    ): IncreaseMaximumIdleMinutesByStampSheetResult {
        return $this->increaseMaximumIdleMinutesByStampSheetAsync(
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
     * @param GetCurrentIdleMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentIdleMasterAsync(
            GetCurrentIdleMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentIdleMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentIdleMasterRequest $request
     * @return GetCurrentIdleMasterResult
     */
    public function getCurrentIdleMaster (
            GetCurrentIdleMasterRequest $request
    ): GetCurrentIdleMasterResult {
        return $this->getCurrentIdleMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentIdleMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentIdleMasterAsync(
            UpdateCurrentIdleMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentIdleMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentIdleMasterRequest $request
     * @return UpdateCurrentIdleMasterResult
     */
    public function updateCurrentIdleMaster (
            UpdateCurrentIdleMasterRequest $request
    ): UpdateCurrentIdleMasterResult {
        return $this->updateCurrentIdleMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentIdleMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentIdleMasterFromGitHubAsync(
            UpdateCurrentIdleMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentIdleMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentIdleMasterFromGitHubRequest $request
     * @return UpdateCurrentIdleMasterFromGitHubResult
     */
    public function updateCurrentIdleMasterFromGitHub (
            UpdateCurrentIdleMasterFromGitHubRequest $request
    ): UpdateCurrentIdleMasterFromGitHubResult {
        return $this->updateCurrentIdleMasterFromGitHubAsync(
            $request
        )->wait();
    }
}