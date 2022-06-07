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

namespace Gs2\Exchange;

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


use Gs2\Exchange\Request\DescribeNamespacesRequest;
use Gs2\Exchange\Result\DescribeNamespacesResult;
use Gs2\Exchange\Request\CreateNamespaceRequest;
use Gs2\Exchange\Result\CreateNamespaceResult;
use Gs2\Exchange\Request\GetNamespaceStatusRequest;
use Gs2\Exchange\Result\GetNamespaceStatusResult;
use Gs2\Exchange\Request\GetNamespaceRequest;
use Gs2\Exchange\Result\GetNamespaceResult;
use Gs2\Exchange\Request\UpdateNamespaceRequest;
use Gs2\Exchange\Result\UpdateNamespaceResult;
use Gs2\Exchange\Request\DeleteNamespaceRequest;
use Gs2\Exchange\Result\DeleteNamespaceResult;
use Gs2\Exchange\Request\DescribeRateModelsRequest;
use Gs2\Exchange\Result\DescribeRateModelsResult;
use Gs2\Exchange\Request\GetRateModelRequest;
use Gs2\Exchange\Result\GetRateModelResult;
use Gs2\Exchange\Request\DescribeRateModelMastersRequest;
use Gs2\Exchange\Result\DescribeRateModelMastersResult;
use Gs2\Exchange\Request\CreateRateModelMasterRequest;
use Gs2\Exchange\Result\CreateRateModelMasterResult;
use Gs2\Exchange\Request\GetRateModelMasterRequest;
use Gs2\Exchange\Result\GetRateModelMasterResult;
use Gs2\Exchange\Request\UpdateRateModelMasterRequest;
use Gs2\Exchange\Result\UpdateRateModelMasterResult;
use Gs2\Exchange\Request\DeleteRateModelMasterRequest;
use Gs2\Exchange\Result\DeleteRateModelMasterResult;
use Gs2\Exchange\Request\ExchangeRequest;
use Gs2\Exchange\Result\ExchangeResult;
use Gs2\Exchange\Request\ExchangeByUserIdRequest;
use Gs2\Exchange\Result\ExchangeByUserIdResult;
use Gs2\Exchange\Request\ExchangeByStampSheetRequest;
use Gs2\Exchange\Result\ExchangeByStampSheetResult;
use Gs2\Exchange\Request\ExportMasterRequest;
use Gs2\Exchange\Result\ExportMasterResult;
use Gs2\Exchange\Request\GetCurrentRateMasterRequest;
use Gs2\Exchange\Result\GetCurrentRateMasterResult;
use Gs2\Exchange\Request\UpdateCurrentRateMasterRequest;
use Gs2\Exchange\Result\UpdateCurrentRateMasterResult;
use Gs2\Exchange\Request\UpdateCurrentRateMasterFromGitHubRequest;
use Gs2\Exchange\Result\UpdateCurrentRateMasterFromGitHubResult;
use Gs2\Exchange\Request\CreateAwaitByUserIdRequest;
use Gs2\Exchange\Result\CreateAwaitByUserIdResult;
use Gs2\Exchange\Request\DescribeAwaitsRequest;
use Gs2\Exchange\Result\DescribeAwaitsResult;
use Gs2\Exchange\Request\DescribeAwaitsByUserIdRequest;
use Gs2\Exchange\Result\DescribeAwaitsByUserIdResult;
use Gs2\Exchange\Request\GetAwaitRequest;
use Gs2\Exchange\Result\GetAwaitResult;
use Gs2\Exchange\Request\GetAwaitByUserIdRequest;
use Gs2\Exchange\Result\GetAwaitByUserIdResult;
use Gs2\Exchange\Request\AcquireRequest;
use Gs2\Exchange\Result\AcquireResult;
use Gs2\Exchange\Request\AcquireByUserIdRequest;
use Gs2\Exchange\Result\AcquireByUserIdResult;
use Gs2\Exchange\Request\AcquireForceByUserIdRequest;
use Gs2\Exchange\Result\AcquireForceByUserIdResult;
use Gs2\Exchange\Request\SkipRequest;
use Gs2\Exchange\Result\SkipResult;
use Gs2\Exchange\Request\SkipByUserIdRequest;
use Gs2\Exchange\Result\SkipByUserIdResult;
use Gs2\Exchange\Request\DeleteAwaitRequest;
use Gs2\Exchange\Result\DeleteAwaitResult;
use Gs2\Exchange\Request\DeleteAwaitByUserIdRequest;
use Gs2\Exchange\Result\DeleteAwaitByUserIdResult;
use Gs2\Exchange\Request\CreateAwaitByStampSheetRequest;
use Gs2\Exchange\Result\CreateAwaitByStampSheetResult;
use Gs2\Exchange\Request\DeleteAwaitByStampTaskRequest;
use Gs2\Exchange\Result\DeleteAwaitByStampTaskResult;

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEnableAwaitExchange() !== null) {
            $json["enableAwaitExchange"] = $this->request->getEnableAwaitExchange();
        }
        if ($this->request->getEnableDirectExchange() !== null) {
            $json["enableDirectExchange"] = $this->request->getEnableDirectExchange();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getExchangeScript() !== null) {
            $json["exchangeScript"] = $this->request->getExchangeScript()->toJson();
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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEnableAwaitExchange() !== null) {
            $json["enableAwaitExchange"] = $this->request->getEnableAwaitExchange();
        }
        if ($this->request->getEnableDirectExchange() !== null) {
            $json["enableDirectExchange"] = $this->request->getEnableDirectExchange();
        }
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
        }
        if ($this->request->getExchangeScript() !== null) {
            $json["exchangeScript"] = $this->request->getExchangeScript()->toJson();
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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{rateName}";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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
        if ($this->request->getTimingType() !== null) {
            $json["timingType"] = $this->request->getTimingType();
        }
        if ($this->request->getLockTime() !== null) {
            $json["lockTime"] = $this->request->getLockTime();
        }
        if ($this->request->getEnableSkip() !== null) {
            $json["enableSkip"] = $this->request->getEnableSkip();
        }
        if ($this->request->getSkipConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getSkipConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["skipConsumeActions"] = $array;
        }
        if ($this->request->getAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
        }
        if ($this->request->getConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{rateName}";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getTimingType() !== null) {
            $json["timingType"] = $this->request->getTimingType();
        }
        if ($this->request->getLockTime() !== null) {
            $json["lockTime"] = $this->request->getLockTime();
        }
        if ($this->request->getEnableSkip() !== null) {
            $json["enableSkip"] = $this->request->getEnableSkip();
        }
        if ($this->request->getSkipConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getSkipConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["skipConsumeActions"] = $array;
        }
        if ($this->request->getAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
        }
        if ($this->request->getConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{rateName}";

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

class ExchangeTask extends Gs2RestSessionTask {

    /**
     * @var ExchangeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ExchangeTask constructor.
     * @param Gs2RestSession $session
     * @param ExchangeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ExchangeRequest $request
    ) {
        parent::__construct(
            $session,
            ExchangeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/exchange/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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

        return parent::executeImpl();
    }
}

class ExchangeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ExchangeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ExchangeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ExchangeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ExchangeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ExchangeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/exchange/{rateName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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

class ExchangeByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var ExchangeByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ExchangeByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param ExchangeByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ExchangeByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            ExchangeByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/exchange";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class CreateAwaitByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CreateAwaitByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateAwaitByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CreateAwaitByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateAwaitByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CreateAwaitByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/exchange/{rateName}/await";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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

class DescribeAwaitsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAwaitsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAwaitsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAwaitsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAwaitsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAwaitsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/exchange/await";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRateName() !== null) {
            $queryStrings["rateName"] = $this->request->getRateName();
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

class DescribeAwaitsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAwaitsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAwaitsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAwaitsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAwaitsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAwaitsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/exchange/await";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getRateName() !== null) {
            $queryStrings["rateName"] = $this->request->getRateName();
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

class GetAwaitTask extends Gs2RestSessionTask {

    /**
     * @var GetAwaitRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAwaitTask constructor.
     * @param Gs2RestSession $session
     * @param GetAwaitRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAwaitRequest $request
    ) {
        parent::__construct(
            $session,
            GetAwaitResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/exchange/{rateName}/await/{awaitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{awaitName}", $this->request->getAwaitName() === null|| strlen($this->request->getAwaitName()) == 0 ? "null" : $this->request->getAwaitName(), $url);

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

class GetAwaitByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetAwaitByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAwaitByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetAwaitByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAwaitByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetAwaitByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/exchange/{rateName}/await/{awaitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{awaitName}", $this->request->getAwaitName() === null|| strlen($this->request->getAwaitName()) == 0 ? "null" : $this->request->getAwaitName(), $url);

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

class AcquireTask extends Gs2RestSessionTask {

    /**
     * @var AcquireRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/exchange/{rateName}/await/{awaitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{awaitName}", $this->request->getAwaitName() === null|| strlen($this->request->getAwaitName()) == 0 ? "null" : $this->request->getAwaitName(), $url);

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

        return parent::executeImpl();
    }
}

class AcquireByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AcquireByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/exchange/{rateName}/await/{awaitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{awaitName}", $this->request->getAwaitName() === null|| strlen($this->request->getAwaitName()) == 0 ? "null" : $this->request->getAwaitName(), $url);

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

class AcquireForceByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AcquireForceByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireForceByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireForceByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireForceByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireForceByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/exchange/{rateName}/await/{awaitName}/force";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{awaitName}", $this->request->getAwaitName() === null|| strlen($this->request->getAwaitName()) == 0 ? "null" : $this->request->getAwaitName(), $url);

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

class SkipTask extends Gs2RestSessionTask {

    /**
     * @var SkipRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SkipTask constructor.
     * @param Gs2RestSession $session
     * @param SkipRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SkipRequest $request
    ) {
        parent::__construct(
            $session,
            SkipResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/exchange/{rateName}/await/{awaitName}/skip";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{awaitName}", $this->request->getAwaitName() === null|| strlen($this->request->getAwaitName()) == 0 ? "null" : $this->request->getAwaitName(), $url);

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

        return parent::executeImpl();
    }
}

class SkipByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SkipByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SkipByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SkipByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SkipByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SkipByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/exchange/{rateName}/await/{awaitName}/skip";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{awaitName}", $this->request->getAwaitName() === null|| strlen($this->request->getAwaitName()) == 0 ? "null" : $this->request->getAwaitName(), $url);

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

class DeleteAwaitTask extends Gs2RestSessionTask {

    /**
     * @var DeleteAwaitRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteAwaitTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteAwaitRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteAwaitRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteAwaitResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/exchange/{rateName}/await/{awaitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{awaitName}", $this->request->getAwaitName() === null|| strlen($this->request->getAwaitName()) == 0 ? "null" : $this->request->getAwaitName(), $url);

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

        return parent::executeImpl();
    }
}

class DeleteAwaitByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteAwaitByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteAwaitByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteAwaitByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteAwaitByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteAwaitByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/exchange/{rateName}/await/{awaitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{rateName}", $this->request->getRateName() === null|| strlen($this->request->getRateName()) == 0 ? "null" : $this->request->getRateName(), $url);
        $url = str_replace("{awaitName}", $this->request->getAwaitName() === null|| strlen($this->request->getAwaitName()) == 0 ? "null" : $this->request->getAwaitName(), $url);

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

class CreateAwaitByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var CreateAwaitByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateAwaitByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param CreateAwaitByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateAwaitByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            CreateAwaitByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/await/create";

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

class DeleteAwaitByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var DeleteAwaitByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteAwaitByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteAwaitByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteAwaitByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteAwaitByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "exchange", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/await/delete";

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
 * GS2 Exchange API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ExchangeRestClient extends AbstractGs2Client {

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
     * @param ExchangeRequest $request
     * @return PromiseInterface
     */
    public function exchangeAsync(
            ExchangeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ExchangeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ExchangeRequest $request
     * @return ExchangeResult
     */
    public function exchange (
            ExchangeRequest $request
    ): ExchangeResult {
        return $this->exchangeAsync(
            $request
        )->wait();
    }

    /**
     * @param ExchangeByUserIdRequest $request
     * @return PromiseInterface
     */
    public function exchangeByUserIdAsync(
            ExchangeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ExchangeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ExchangeByUserIdRequest $request
     * @return ExchangeByUserIdResult
     */
    public function exchangeByUserId (
            ExchangeByUserIdRequest $request
    ): ExchangeByUserIdResult {
        return $this->exchangeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ExchangeByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function exchangeByStampSheetAsync(
            ExchangeByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ExchangeByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ExchangeByStampSheetRequest $request
     * @return ExchangeByStampSheetResult
     */
    public function exchangeByStampSheet (
            ExchangeByStampSheetRequest $request
    ): ExchangeByStampSheetResult {
        return $this->exchangeByStampSheetAsync(
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

    /**
     * @param CreateAwaitByUserIdRequest $request
     * @return PromiseInterface
     */
    public function createAwaitByUserIdAsync(
            CreateAwaitByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateAwaitByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateAwaitByUserIdRequest $request
     * @return CreateAwaitByUserIdResult
     */
    public function createAwaitByUserId (
            CreateAwaitByUserIdRequest $request
    ): CreateAwaitByUserIdResult {
        return $this->createAwaitByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeAwaitsRequest $request
     * @return PromiseInterface
     */
    public function describeAwaitsAsync(
            DescribeAwaitsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAwaitsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeAwaitsRequest $request
     * @return DescribeAwaitsResult
     */
    public function describeAwaits (
            DescribeAwaitsRequest $request
    ): DescribeAwaitsResult {
        return $this->describeAwaitsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeAwaitsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeAwaitsByUserIdAsync(
            DescribeAwaitsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAwaitsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeAwaitsByUserIdRequest $request
     * @return DescribeAwaitsByUserIdResult
     */
    public function describeAwaitsByUserId (
            DescribeAwaitsByUserIdRequest $request
    ): DescribeAwaitsByUserIdResult {
        return $this->describeAwaitsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetAwaitRequest $request
     * @return PromiseInterface
     */
    public function getAwaitAsync(
            GetAwaitRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAwaitTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetAwaitRequest $request
     * @return GetAwaitResult
     */
    public function getAwait (
            GetAwaitRequest $request
    ): GetAwaitResult {
        return $this->getAwaitAsync(
            $request
        )->wait();
    }

    /**
     * @param GetAwaitByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getAwaitByUserIdAsync(
            GetAwaitByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAwaitByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetAwaitByUserIdRequest $request
     * @return GetAwaitByUserIdResult
     */
    public function getAwaitByUserId (
            GetAwaitByUserIdRequest $request
    ): GetAwaitByUserIdResult {
        return $this->getAwaitByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireRequest $request
     * @return PromiseInterface
     */
    public function acquireAsync(
            AcquireRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireRequest $request
     * @return AcquireResult
     */
    public function acquire (
            AcquireRequest $request
    ): AcquireResult {
        return $this->acquireAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireByUserIdRequest $request
     * @return PromiseInterface
     */
    public function acquireByUserIdAsync(
            AcquireByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireByUserIdRequest $request
     * @return AcquireByUserIdResult
     */
    public function acquireByUserId (
            AcquireByUserIdRequest $request
    ): AcquireByUserIdResult {
        return $this->acquireByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireForceByUserIdRequest $request
     * @return PromiseInterface
     */
    public function acquireForceByUserIdAsync(
            AcquireForceByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireForceByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireForceByUserIdRequest $request
     * @return AcquireForceByUserIdResult
     */
    public function acquireForceByUserId (
            AcquireForceByUserIdRequest $request
    ): AcquireForceByUserIdResult {
        return $this->acquireForceByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SkipRequest $request
     * @return PromiseInterface
     */
    public function skipAsync(
            SkipRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SkipTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SkipRequest $request
     * @return SkipResult
     */
    public function skip (
            SkipRequest $request
    ): SkipResult {
        return $this->skipAsync(
            $request
        )->wait();
    }

    /**
     * @param SkipByUserIdRequest $request
     * @return PromiseInterface
     */
    public function skipByUserIdAsync(
            SkipByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SkipByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SkipByUserIdRequest $request
     * @return SkipByUserIdResult
     */
    public function skipByUserId (
            SkipByUserIdRequest $request
    ): SkipByUserIdResult {
        return $this->skipByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteAwaitRequest $request
     * @return PromiseInterface
     */
    public function deleteAwaitAsync(
            DeleteAwaitRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteAwaitTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteAwaitRequest $request
     * @return DeleteAwaitResult
     */
    public function deleteAwait (
            DeleteAwaitRequest $request
    ): DeleteAwaitResult {
        return $this->deleteAwaitAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteAwaitByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteAwaitByUserIdAsync(
            DeleteAwaitByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteAwaitByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteAwaitByUserIdRequest $request
     * @return DeleteAwaitByUserIdResult
     */
    public function deleteAwaitByUserId (
            DeleteAwaitByUserIdRequest $request
    ): DeleteAwaitByUserIdResult {
        return $this->deleteAwaitByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateAwaitByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function createAwaitByStampSheetAsync(
            CreateAwaitByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateAwaitByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateAwaitByStampSheetRequest $request
     * @return CreateAwaitByStampSheetResult
     */
    public function createAwaitByStampSheet (
            CreateAwaitByStampSheetRequest $request
    ): CreateAwaitByStampSheetResult {
        return $this->createAwaitByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteAwaitByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function deleteAwaitByStampTaskAsync(
            DeleteAwaitByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteAwaitByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteAwaitByStampTaskRequest $request
     * @return DeleteAwaitByStampTaskResult
     */
    public function deleteAwaitByStampTask (
            DeleteAwaitByStampTaskRequest $request
    ): DeleteAwaitByStampTaskResult {
        return $this->deleteAwaitByStampTaskAsync(
            $request
        )->wait();
    }
}