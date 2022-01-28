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

namespace Gs2\Lottery;

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


use Gs2\Lottery\Request\DescribeNamespacesRequest;
use Gs2\Lottery\Result\DescribeNamespacesResult;
use Gs2\Lottery\Request\CreateNamespaceRequest;
use Gs2\Lottery\Result\CreateNamespaceResult;
use Gs2\Lottery\Request\GetNamespaceStatusRequest;
use Gs2\Lottery\Result\GetNamespaceStatusResult;
use Gs2\Lottery\Request\GetNamespaceRequest;
use Gs2\Lottery\Result\GetNamespaceResult;
use Gs2\Lottery\Request\UpdateNamespaceRequest;
use Gs2\Lottery\Result\UpdateNamespaceResult;
use Gs2\Lottery\Request\DeleteNamespaceRequest;
use Gs2\Lottery\Result\DeleteNamespaceResult;
use Gs2\Lottery\Request\DescribeLotteryModelMastersRequest;
use Gs2\Lottery\Result\DescribeLotteryModelMastersResult;
use Gs2\Lottery\Request\CreateLotteryModelMasterRequest;
use Gs2\Lottery\Result\CreateLotteryModelMasterResult;
use Gs2\Lottery\Request\GetLotteryModelMasterRequest;
use Gs2\Lottery\Result\GetLotteryModelMasterResult;
use Gs2\Lottery\Request\UpdateLotteryModelMasterRequest;
use Gs2\Lottery\Result\UpdateLotteryModelMasterResult;
use Gs2\Lottery\Request\DeleteLotteryModelMasterRequest;
use Gs2\Lottery\Result\DeleteLotteryModelMasterResult;
use Gs2\Lottery\Request\DescribePrizeTableMastersRequest;
use Gs2\Lottery\Result\DescribePrizeTableMastersResult;
use Gs2\Lottery\Request\CreatePrizeTableMasterRequest;
use Gs2\Lottery\Result\CreatePrizeTableMasterResult;
use Gs2\Lottery\Request\GetPrizeTableMasterRequest;
use Gs2\Lottery\Result\GetPrizeTableMasterResult;
use Gs2\Lottery\Request\UpdatePrizeTableMasterRequest;
use Gs2\Lottery\Result\UpdatePrizeTableMasterResult;
use Gs2\Lottery\Request\DeletePrizeTableMasterRequest;
use Gs2\Lottery\Result\DeletePrizeTableMasterResult;
use Gs2\Lottery\Request\DescribeBoxesRequest;
use Gs2\Lottery\Result\DescribeBoxesResult;
use Gs2\Lottery\Request\DescribeBoxesByUserIdRequest;
use Gs2\Lottery\Result\DescribeBoxesByUserIdResult;
use Gs2\Lottery\Request\GetBoxRequest;
use Gs2\Lottery\Result\GetBoxResult;
use Gs2\Lottery\Request\GetBoxByUserIdRequest;
use Gs2\Lottery\Result\GetBoxByUserIdResult;
use Gs2\Lottery\Request\GetRawBoxByUserIdRequest;
use Gs2\Lottery\Result\GetRawBoxByUserIdResult;
use Gs2\Lottery\Request\ResetBoxRequest;
use Gs2\Lottery\Result\ResetBoxResult;
use Gs2\Lottery\Request\ResetBoxByUserIdRequest;
use Gs2\Lottery\Result\ResetBoxByUserIdResult;
use Gs2\Lottery\Request\DescribeLotteryModelsRequest;
use Gs2\Lottery\Result\DescribeLotteryModelsResult;
use Gs2\Lottery\Request\GetLotteryModelRequest;
use Gs2\Lottery\Result\GetLotteryModelResult;
use Gs2\Lottery\Request\DescribePrizeTablesRequest;
use Gs2\Lottery\Result\DescribePrizeTablesResult;
use Gs2\Lottery\Request\GetPrizeTableRequest;
use Gs2\Lottery\Result\GetPrizeTableResult;
use Gs2\Lottery\Request\DrawByUserIdRequest;
use Gs2\Lottery\Result\DrawByUserIdResult;
use Gs2\Lottery\Request\DrawByStampSheetRequest;
use Gs2\Lottery\Result\DrawByStampSheetResult;
use Gs2\Lottery\Request\DescribeProbabilitiesRequest;
use Gs2\Lottery\Result\DescribeProbabilitiesResult;
use Gs2\Lottery\Request\DescribeProbabilitiesByUserIdRequest;
use Gs2\Lottery\Result\DescribeProbabilitiesByUserIdResult;
use Gs2\Lottery\Request\ExportMasterRequest;
use Gs2\Lottery\Result\ExportMasterResult;
use Gs2\Lottery\Request\GetCurrentLotteryMasterRequest;
use Gs2\Lottery\Result\GetCurrentLotteryMasterResult;
use Gs2\Lottery\Request\UpdateCurrentLotteryMasterRequest;
use Gs2\Lottery\Result\UpdateCurrentLotteryMasterResult;
use Gs2\Lottery\Request\UpdateCurrentLotteryMasterFromGitHubRequest;
use Gs2\Lottery\Result\UpdateCurrentLotteryMasterFromGitHubResult;

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

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getLotteryTriggerScriptId() !== null) {
            $json["lotteryTriggerScriptId"] = $this->request->getLotteryTriggerScriptId();
        }
        if ($this->request->getChoicePrizeTableScriptId() !== null) {
            $json["choicePrizeTableScriptId"] = $this->request->getChoicePrizeTableScriptId();
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

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getLotteryTriggerScriptId() !== null) {
            $json["lotteryTriggerScriptId"] = $this->request->getLotteryTriggerScriptId();
        }
        if ($this->request->getChoicePrizeTableScriptId() !== null) {
            $json["choicePrizeTableScriptId"] = $this->request->getChoicePrizeTableScriptId();
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

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeLotteryModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLotteryModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLotteryModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLotteryModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLotteryModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLotteryModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/lottery";

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

class CreateLotteryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateLotteryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateLotteryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateLotteryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateLotteryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateLotteryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/lottery";

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
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getMethod() !== null) {
            $json["method"] = $this->request->getMethod();
        }
        if ($this->request->getPrizeTableName() !== null) {
            $json["prizeTableName"] = $this->request->getPrizeTableName();
        }
        if ($this->request->getChoicePrizeTableScriptId() !== null) {
            $json["choicePrizeTableScriptId"] = $this->request->getChoicePrizeTableScriptId();
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

class GetLotteryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetLotteryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLotteryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetLotteryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLotteryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetLotteryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/lottery/{lotteryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{lotteryName}", $this->request->getLotteryName() === null|| strlen($this->request->getLotteryName()) == 0 ? "null" : $this->request->getLotteryName(), $url);

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

class UpdateLotteryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateLotteryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateLotteryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateLotteryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateLotteryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateLotteryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/lottery/{lotteryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{lotteryName}", $this->request->getLotteryName() === null|| strlen($this->request->getLotteryName()) == 0 ? "null" : $this->request->getLotteryName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getMethod() !== null) {
            $json["method"] = $this->request->getMethod();
        }
        if ($this->request->getPrizeTableName() !== null) {
            $json["prizeTableName"] = $this->request->getPrizeTableName();
        }
        if ($this->request->getChoicePrizeTableScriptId() !== null) {
            $json["choicePrizeTableScriptId"] = $this->request->getChoicePrizeTableScriptId();
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

class DeleteLotteryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteLotteryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteLotteryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteLotteryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteLotteryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteLotteryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/lottery/{lotteryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{lotteryName}", $this->request->getLotteryName() === null|| strlen($this->request->getLotteryName()) == 0 ? "null" : $this->request->getLotteryName(), $url);

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

class DescribePrizeTableMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribePrizeTableMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribePrizeTableMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribePrizeTableMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribePrizeTableMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribePrizeTableMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/table";

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

class CreatePrizeTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreatePrizeTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreatePrizeTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreatePrizeTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreatePrizeTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreatePrizeTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/table";

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
        if ($this->request->getPrizes() !== null) {
            $array = [];
            foreach ($this->request->getPrizes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["prizes"] = $array;
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

class GetPrizeTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetPrizeTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPrizeTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetPrizeTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPrizeTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetPrizeTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/table/{prizeTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{prizeTableName}", $this->request->getPrizeTableName() === null|| strlen($this->request->getPrizeTableName()) == 0 ? "null" : $this->request->getPrizeTableName(), $url);

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

class UpdatePrizeTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdatePrizeTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdatePrizeTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdatePrizeTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdatePrizeTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdatePrizeTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/table/{prizeTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{prizeTableName}", $this->request->getPrizeTableName() === null|| strlen($this->request->getPrizeTableName()) == 0 ? "null" : $this->request->getPrizeTableName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getPrizes() !== null) {
            $array = [];
            foreach ($this->request->getPrizes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["prizes"] = $array;
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

class DeletePrizeTableMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeletePrizeTableMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeletePrizeTableMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeletePrizeTableMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeletePrizeTableMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeletePrizeTableMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/table/{prizeTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{prizeTableName}", $this->request->getPrizeTableName() === null|| strlen($this->request->getPrizeTableName()) == 0 ? "null" : $this->request->getPrizeTableName(), $url);

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

class DescribeBoxesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBoxesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBoxesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBoxesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBoxesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBoxesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/box";

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

class DescribeBoxesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBoxesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBoxesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBoxesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBoxesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBoxesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/box";

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

        return parent::executeImpl();
    }
}

class GetBoxTask extends Gs2RestSessionTask {

    /**
     * @var GetBoxRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBoxTask constructor.
     * @param Gs2RestSession $session
     * @param GetBoxRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBoxRequest $request
    ) {
        parent::__construct(
            $session,
            GetBoxResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/box/{prizeTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{prizeTableName}", $this->request->getPrizeTableName() === null|| strlen($this->request->getPrizeTableName()) == 0 ? "null" : $this->request->getPrizeTableName(), $url);

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

class GetBoxByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetBoxByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBoxByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetBoxByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBoxByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetBoxByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/box/{prizeTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{prizeTableName}", $this->request->getPrizeTableName() === null|| strlen($this->request->getPrizeTableName()) == 0 ? "null" : $this->request->getPrizeTableName(), $url);
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

class GetRawBoxByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetRawBoxByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetRawBoxByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetRawBoxByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetRawBoxByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetRawBoxByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/box/{prizeTableName}/raw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{prizeTableName}", $this->request->getPrizeTableName() === null|| strlen($this->request->getPrizeTableName()) == 0 ? "null" : $this->request->getPrizeTableName(), $url);
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

class ResetBoxTask extends Gs2RestSessionTask {

    /**
     * @var ResetBoxRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ResetBoxTask constructor.
     * @param Gs2RestSession $session
     * @param ResetBoxRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ResetBoxRequest $request
    ) {
        parent::__construct(
            $session,
            ResetBoxResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/box/{prizeTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{prizeTableName}", $this->request->getPrizeTableName() === null|| strlen($this->request->getPrizeTableName()) == 0 ? "null" : $this->request->getPrizeTableName(), $url);

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

class ResetBoxByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ResetBoxByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ResetBoxByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ResetBoxByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ResetBoxByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ResetBoxByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/box/{prizeTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{prizeTableName}", $this->request->getPrizeTableName() === null|| strlen($this->request->getPrizeTableName()) == 0 ? "null" : $this->request->getPrizeTableName(), $url);
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

        return parent::executeImpl();
    }
}

class DescribeLotteryModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLotteryModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLotteryModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLotteryModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLotteryModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLotteryModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/lottery";

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

class GetLotteryModelTask extends Gs2RestSessionTask {

    /**
     * @var GetLotteryModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLotteryModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetLotteryModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLotteryModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetLotteryModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/lottery/{lotteryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{lotteryName}", $this->request->getLotteryName() === null|| strlen($this->request->getLotteryName()) == 0 ? "null" : $this->request->getLotteryName(), $url);

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

class DescribePrizeTablesTask extends Gs2RestSessionTask {

    /**
     * @var DescribePrizeTablesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribePrizeTablesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribePrizeTablesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribePrizeTablesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribePrizeTablesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/table";

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

class GetPrizeTableTask extends Gs2RestSessionTask {

    /**
     * @var GetPrizeTableRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetPrizeTableTask constructor.
     * @param Gs2RestSession $session
     * @param GetPrizeTableRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetPrizeTableRequest $request
    ) {
        parent::__construct(
            $session,
            GetPrizeTableResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/table/{prizeTableName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{prizeTableName}", $this->request->getPrizeTableName() === null|| strlen($this->request->getPrizeTableName()) == 0 ? "null" : $this->request->getPrizeTableName(), $url);

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

class DrawByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DrawByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DrawByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DrawByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DrawByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DrawByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/lottery/{lotteryName}/draw";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{lotteryName}", $this->request->getLotteryName() === null|| strlen($this->request->getLotteryName()) == 0 ? "null" : $this->request->getLotteryName(), $url);
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

        return parent::executeImpl();
    }
}

class DrawByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var DrawByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DrawByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param DrawByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DrawByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            DrawByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/draw";

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

class DescribeProbabilitiesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeProbabilitiesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeProbabilitiesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeProbabilitiesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeProbabilitiesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeProbabilitiesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/lottery/{lotteryName}/probability";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{lotteryName}", $this->request->getLotteryName() === null|| strlen($this->request->getLotteryName()) == 0 ? "null" : $this->request->getLotteryName(), $url);

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

class DescribeProbabilitiesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeProbabilitiesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeProbabilitiesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeProbabilitiesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeProbabilitiesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeProbabilitiesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/lottery/{lotteryName}/probability";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{lotteryName}", $this->request->getLotteryName() === null|| strlen($this->request->getLotteryName()) == 0 ? "null" : $this->request->getLotteryName(), $url);
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

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentLotteryMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentLotteryMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentLotteryMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentLotteryMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentLotteryMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentLotteryMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentLotteryMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentLotteryMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentLotteryMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentLotteryMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentLotteryMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentLotteryMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentLotteryMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentLotteryMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentLotteryMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentLotteryMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentLotteryMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentLotteryMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "lottery", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2 Lottery API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2LotteryRestClient extends AbstractGs2Client {

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
     * @param DescribeLotteryModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeLotteryModelMastersAsync(
            DescribeLotteryModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLotteryModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLotteryModelMastersRequest $request
     * @return DescribeLotteryModelMastersResult
     */
    public function describeLotteryModelMasters (
            DescribeLotteryModelMastersRequest $request
    ): DescribeLotteryModelMastersResult {
        return $this->describeLotteryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateLotteryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createLotteryModelMasterAsync(
            CreateLotteryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateLotteryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateLotteryModelMasterRequest $request
     * @return CreateLotteryModelMasterResult
     */
    public function createLotteryModelMaster (
            CreateLotteryModelMasterRequest $request
    ): CreateLotteryModelMasterResult {
        return $this->createLotteryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLotteryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getLotteryModelMasterAsync(
            GetLotteryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLotteryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLotteryModelMasterRequest $request
     * @return GetLotteryModelMasterResult
     */
    public function getLotteryModelMaster (
            GetLotteryModelMasterRequest $request
    ): GetLotteryModelMasterResult {
        return $this->getLotteryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateLotteryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateLotteryModelMasterAsync(
            UpdateLotteryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateLotteryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateLotteryModelMasterRequest $request
     * @return UpdateLotteryModelMasterResult
     */
    public function updateLotteryModelMaster (
            UpdateLotteryModelMasterRequest $request
    ): UpdateLotteryModelMasterResult {
        return $this->updateLotteryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteLotteryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteLotteryModelMasterAsync(
            DeleteLotteryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteLotteryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteLotteryModelMasterRequest $request
     * @return DeleteLotteryModelMasterResult
     */
    public function deleteLotteryModelMaster (
            DeleteLotteryModelMasterRequest $request
    ): DeleteLotteryModelMasterResult {
        return $this->deleteLotteryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribePrizeTableMastersRequest $request
     * @return PromiseInterface
     */
    public function describePrizeTableMastersAsync(
            DescribePrizeTableMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribePrizeTableMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribePrizeTableMastersRequest $request
     * @return DescribePrizeTableMastersResult
     */
    public function describePrizeTableMasters (
            DescribePrizeTableMastersRequest $request
    ): DescribePrizeTableMastersResult {
        return $this->describePrizeTableMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreatePrizeTableMasterRequest $request
     * @return PromiseInterface
     */
    public function createPrizeTableMasterAsync(
            CreatePrizeTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreatePrizeTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreatePrizeTableMasterRequest $request
     * @return CreatePrizeTableMasterResult
     */
    public function createPrizeTableMaster (
            CreatePrizeTableMasterRequest $request
    ): CreatePrizeTableMasterResult {
        return $this->createPrizeTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetPrizeTableMasterRequest $request
     * @return PromiseInterface
     */
    public function getPrizeTableMasterAsync(
            GetPrizeTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPrizeTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetPrizeTableMasterRequest $request
     * @return GetPrizeTableMasterResult
     */
    public function getPrizeTableMaster (
            GetPrizeTableMasterRequest $request
    ): GetPrizeTableMasterResult {
        return $this->getPrizeTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdatePrizeTableMasterRequest $request
     * @return PromiseInterface
     */
    public function updatePrizeTableMasterAsync(
            UpdatePrizeTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdatePrizeTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdatePrizeTableMasterRequest $request
     * @return UpdatePrizeTableMasterResult
     */
    public function updatePrizeTableMaster (
            UpdatePrizeTableMasterRequest $request
    ): UpdatePrizeTableMasterResult {
        return $this->updatePrizeTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeletePrizeTableMasterRequest $request
     * @return PromiseInterface
     */
    public function deletePrizeTableMasterAsync(
            DeletePrizeTableMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeletePrizeTableMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeletePrizeTableMasterRequest $request
     * @return DeletePrizeTableMasterResult
     */
    public function deletePrizeTableMaster (
            DeletePrizeTableMasterRequest $request
    ): DeletePrizeTableMasterResult {
        return $this->deletePrizeTableMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBoxesRequest $request
     * @return PromiseInterface
     */
    public function describeBoxesAsync(
            DescribeBoxesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBoxesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBoxesRequest $request
     * @return DescribeBoxesResult
     */
    public function describeBoxes (
            DescribeBoxesRequest $request
    ): DescribeBoxesResult {
        return $this->describeBoxesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBoxesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeBoxesByUserIdAsync(
            DescribeBoxesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBoxesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBoxesByUserIdRequest $request
     * @return DescribeBoxesByUserIdResult
     */
    public function describeBoxesByUserId (
            DescribeBoxesByUserIdRequest $request
    ): DescribeBoxesByUserIdResult {
        return $this->describeBoxesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBoxRequest $request
     * @return PromiseInterface
     */
    public function getBoxAsync(
            GetBoxRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBoxTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBoxRequest $request
     * @return GetBoxResult
     */
    public function getBox (
            GetBoxRequest $request
    ): GetBoxResult {
        return $this->getBoxAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBoxByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getBoxByUserIdAsync(
            GetBoxByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBoxByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBoxByUserIdRequest $request
     * @return GetBoxByUserIdResult
     */
    public function getBoxByUserId (
            GetBoxByUserIdRequest $request
    ): GetBoxByUserIdResult {
        return $this->getBoxByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetRawBoxByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getRawBoxByUserIdAsync(
            GetRawBoxByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetRawBoxByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetRawBoxByUserIdRequest $request
     * @return GetRawBoxByUserIdResult
     */
    public function getRawBoxByUserId (
            GetRawBoxByUserIdRequest $request
    ): GetRawBoxByUserIdResult {
        return $this->getRawBoxByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ResetBoxRequest $request
     * @return PromiseInterface
     */
    public function resetBoxAsync(
            ResetBoxRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ResetBoxTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ResetBoxRequest $request
     * @return ResetBoxResult
     */
    public function resetBox (
            ResetBoxRequest $request
    ): ResetBoxResult {
        return $this->resetBoxAsync(
            $request
        )->wait();
    }

    /**
     * @param ResetBoxByUserIdRequest $request
     * @return PromiseInterface
     */
    public function resetBoxByUserIdAsync(
            ResetBoxByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ResetBoxByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ResetBoxByUserIdRequest $request
     * @return ResetBoxByUserIdResult
     */
    public function resetBoxByUserId (
            ResetBoxByUserIdRequest $request
    ): ResetBoxByUserIdResult {
        return $this->resetBoxByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLotteryModelsRequest $request
     * @return PromiseInterface
     */
    public function describeLotteryModelsAsync(
            DescribeLotteryModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLotteryModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLotteryModelsRequest $request
     * @return DescribeLotteryModelsResult
     */
    public function describeLotteryModels (
            DescribeLotteryModelsRequest $request
    ): DescribeLotteryModelsResult {
        return $this->describeLotteryModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLotteryModelRequest $request
     * @return PromiseInterface
     */
    public function getLotteryModelAsync(
            GetLotteryModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLotteryModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLotteryModelRequest $request
     * @return GetLotteryModelResult
     */
    public function getLotteryModel (
            GetLotteryModelRequest $request
    ): GetLotteryModelResult {
        return $this->getLotteryModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribePrizeTablesRequest $request
     * @return PromiseInterface
     */
    public function describePrizeTablesAsync(
            DescribePrizeTablesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribePrizeTablesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribePrizeTablesRequest $request
     * @return DescribePrizeTablesResult
     */
    public function describePrizeTables (
            DescribePrizeTablesRequest $request
    ): DescribePrizeTablesResult {
        return $this->describePrizeTablesAsync(
            $request
        )->wait();
    }

    /**
     * @param GetPrizeTableRequest $request
     * @return PromiseInterface
     */
    public function getPrizeTableAsync(
            GetPrizeTableRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetPrizeTableTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetPrizeTableRequest $request
     * @return GetPrizeTableResult
     */
    public function getPrizeTable (
            GetPrizeTableRequest $request
    ): GetPrizeTableResult {
        return $this->getPrizeTableAsync(
            $request
        )->wait();
    }

    /**
     * @param DrawByUserIdRequest $request
     * @return PromiseInterface
     */
    public function drawByUserIdAsync(
            DrawByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DrawByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DrawByUserIdRequest $request
     * @return DrawByUserIdResult
     */
    public function drawByUserId (
            DrawByUserIdRequest $request
    ): DrawByUserIdResult {
        return $this->drawByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DrawByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function drawByStampSheetAsync(
            DrawByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DrawByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DrawByStampSheetRequest $request
     * @return DrawByStampSheetResult
     */
    public function drawByStampSheet (
            DrawByStampSheetRequest $request
    ): DrawByStampSheetResult {
        return $this->drawByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeProbabilitiesRequest $request
     * @return PromiseInterface
     */
    public function describeProbabilitiesAsync(
            DescribeProbabilitiesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeProbabilitiesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeProbabilitiesRequest $request
     * @return DescribeProbabilitiesResult
     */
    public function describeProbabilities (
            DescribeProbabilitiesRequest $request
    ): DescribeProbabilitiesResult {
        return $this->describeProbabilitiesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeProbabilitiesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeProbabilitiesByUserIdAsync(
            DescribeProbabilitiesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeProbabilitiesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeProbabilitiesByUserIdRequest $request
     * @return DescribeProbabilitiesByUserIdResult
     */
    public function describeProbabilitiesByUserId (
            DescribeProbabilitiesByUserIdRequest $request
    ): DescribeProbabilitiesByUserIdResult {
        return $this->describeProbabilitiesByUserIdAsync(
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
     * @param GetCurrentLotteryMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentLotteryMasterAsync(
            GetCurrentLotteryMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentLotteryMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentLotteryMasterRequest $request
     * @return GetCurrentLotteryMasterResult
     */
    public function getCurrentLotteryMaster (
            GetCurrentLotteryMasterRequest $request
    ): GetCurrentLotteryMasterResult {
        return $this->getCurrentLotteryMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentLotteryMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentLotteryMasterAsync(
            UpdateCurrentLotteryMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentLotteryMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentLotteryMasterRequest $request
     * @return UpdateCurrentLotteryMasterResult
     */
    public function updateCurrentLotteryMaster (
            UpdateCurrentLotteryMasterRequest $request
    ): UpdateCurrentLotteryMasterResult {
        return $this->updateCurrentLotteryMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentLotteryMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentLotteryMasterFromGitHubAsync(
            UpdateCurrentLotteryMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentLotteryMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentLotteryMasterFromGitHubRequest $request
     * @return UpdateCurrentLotteryMasterFromGitHubResult
     */
    public function updateCurrentLotteryMasterFromGitHub (
            UpdateCurrentLotteryMasterFromGitHubRequest $request
    ): UpdateCurrentLotteryMasterFromGitHubResult {
        return $this->updateCurrentLotteryMasterFromGitHubAsync(
            $request
        )->wait();
    }
}