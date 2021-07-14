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

namespace Gs2\Limit;

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


use Gs2\Limit\Request\DescribeNamespacesRequest;
use Gs2\Limit\Result\DescribeNamespacesResult;
use Gs2\Limit\Request\CreateNamespaceRequest;
use Gs2\Limit\Result\CreateNamespaceResult;
use Gs2\Limit\Request\GetNamespaceStatusRequest;
use Gs2\Limit\Result\GetNamespaceStatusResult;
use Gs2\Limit\Request\GetNamespaceRequest;
use Gs2\Limit\Result\GetNamespaceResult;
use Gs2\Limit\Request\UpdateNamespaceRequest;
use Gs2\Limit\Result\UpdateNamespaceResult;
use Gs2\Limit\Request\DeleteNamespaceRequest;
use Gs2\Limit\Result\DeleteNamespaceResult;
use Gs2\Limit\Request\DescribeCountersRequest;
use Gs2\Limit\Result\DescribeCountersResult;
use Gs2\Limit\Request\DescribeCountersByUserIdRequest;
use Gs2\Limit\Result\DescribeCountersByUserIdResult;
use Gs2\Limit\Request\GetCounterRequest;
use Gs2\Limit\Result\GetCounterResult;
use Gs2\Limit\Request\GetCounterByUserIdRequest;
use Gs2\Limit\Result\GetCounterByUserIdResult;
use Gs2\Limit\Request\CountUpRequest;
use Gs2\Limit\Result\CountUpResult;
use Gs2\Limit\Request\CountUpByUserIdRequest;
use Gs2\Limit\Result\CountUpByUserIdResult;
use Gs2\Limit\Request\DeleteCounterByUserIdRequest;
use Gs2\Limit\Result\DeleteCounterByUserIdResult;
use Gs2\Limit\Request\CountUpByStampTaskRequest;
use Gs2\Limit\Result\CountUpByStampTaskResult;
use Gs2\Limit\Request\DeleteByStampSheetRequest;
use Gs2\Limit\Result\DeleteByStampSheetResult;
use Gs2\Limit\Request\DescribeLimitModelMastersRequest;
use Gs2\Limit\Result\DescribeLimitModelMastersResult;
use Gs2\Limit\Request\CreateLimitModelMasterRequest;
use Gs2\Limit\Result\CreateLimitModelMasterResult;
use Gs2\Limit\Request\GetLimitModelMasterRequest;
use Gs2\Limit\Result\GetLimitModelMasterResult;
use Gs2\Limit\Request\UpdateLimitModelMasterRequest;
use Gs2\Limit\Result\UpdateLimitModelMasterResult;
use Gs2\Limit\Request\DeleteLimitModelMasterRequest;
use Gs2\Limit\Result\DeleteLimitModelMasterResult;
use Gs2\Limit\Request\ExportMasterRequest;
use Gs2\Limit\Result\ExportMasterResult;
use Gs2\Limit\Request\GetCurrentLimitMasterRequest;
use Gs2\Limit\Result\GetCurrentLimitMasterResult;
use Gs2\Limit\Request\UpdateCurrentLimitMasterRequest;
use Gs2\Limit\Result\UpdateCurrentLimitMasterResult;
use Gs2\Limit\Request\UpdateCurrentLimitMasterFromGitHubRequest;
use Gs2\Limit\Result\UpdateCurrentLimitMasterFromGitHubResult;
use Gs2\Limit\Request\DescribeLimitModelsRequest;
use Gs2\Limit\Result\DescribeLimitModelsResult;
use Gs2\Limit\Request\GetLimitModelRequest;
use Gs2\Limit\Result\GetLimitModelResult;

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeCountersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCountersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCountersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCountersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCountersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCountersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getLimitName() !== null) {
            $queryStrings["limitName"] = $this->request->getLimitName();
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

class DescribeCountersByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCountersByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCountersByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCountersByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCountersByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCountersByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getLimitName() !== null) {
            $queryStrings["limitName"] = $this->request->getLimitName();
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

class GetCounterTask extends Gs2RestSessionTask {

    /**
     * @var GetCounterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCounterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCounterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCounterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCounterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class GetCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class CountUpTask extends Gs2RestSessionTask {

    /**
     * @var CountUpRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountUpTask constructor.
     * @param Gs2RestSession $session
     * @param CountUpRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountUpRequest $request
    ) {
        parent::__construct(
            $session,
            CountUpResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

        $json = [];
        if ($this->request->getCountUpValue() !== null) {
            $json["countUpValue"] = $this->request->getCountUpValue();
        }
        if ($this->request->getMaxValue() !== null) {
            $json["maxValue"] = $this->request->getMaxValue();
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

class CountUpByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CountUpByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountUpByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CountUpByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountUpByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CountUpByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCountUpValue() !== null) {
            $json["countUpValue"] = $this->request->getCountUpValue();
        }
        if ($this->request->getMaxValue() !== null) {
            $json["maxValue"] = $this->request->getMaxValue();
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

class DeleteCounterByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCounterByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCounterByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCounterByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCounterByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCounterByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/counter/{limitName}/{counterName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{counterName}", $this->request->getCounterName() === null|| strlen($this->request->getCounterName()) == 0 ? "null" : $this->request->getCounterName(), $url);

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

class CountUpByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var CountUpByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CountUpByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param CountUpByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CountUpByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            CountUpByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/counter/increase";

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

class DeleteByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var DeleteByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/counter/delete";

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

class DescribeLimitModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLimitModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLimitModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLimitModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLimitModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLimitModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit";

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

class CreateLimitModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateLimitModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateLimitModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateLimitModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateLimitModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateLimitModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit";

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
        if ($this->request->getResetType() !== null) {
            $json["resetType"] = $this->request->getResetType();
        }
        if ($this->request->getResetDayOfMonth() !== null) {
            $json["resetDayOfMonth"] = $this->request->getResetDayOfMonth();
        }
        if ($this->request->getResetDayOfWeek() !== null) {
            $json["resetDayOfWeek"] = $this->request->getResetDayOfWeek();
        }
        if ($this->request->getResetHour() !== null) {
            $json["resetHour"] = $this->request->getResetHour();
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

class GetLimitModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetLimitModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLimitModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetLimitModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLimitModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetLimitModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit/{limitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

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

class UpdateLimitModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateLimitModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateLimitModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateLimitModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateLimitModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateLimitModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit/{limitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getResetType() !== null) {
            $json["resetType"] = $this->request->getResetType();
        }
        if ($this->request->getResetDayOfMonth() !== null) {
            $json["resetDayOfMonth"] = $this->request->getResetDayOfMonth();
        }
        if ($this->request->getResetDayOfWeek() !== null) {
            $json["resetDayOfWeek"] = $this->request->getResetDayOfWeek();
        }
        if ($this->request->getResetHour() !== null) {
            $json["resetHour"] = $this->request->getResetHour();
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

class DeleteLimitModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteLimitModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteLimitModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteLimitModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteLimitModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteLimitModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/limit/{limitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

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

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentLimitMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentLimitMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentLimitMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentLimitMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentLimitMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentLimitMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentLimitMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentLimitMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentLimitMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentLimitMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentLimitMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentLimitMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentLimitMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentLimitMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentLimitMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentLimitMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentLimitMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentLimitMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeLimitModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLimitModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLimitModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLimitModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLimitModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLimitModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/limit";

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

class GetLimitModelTask extends Gs2RestSessionTask {

    /**
     * @var GetLimitModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLimitModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetLimitModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLimitModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetLimitModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "limit", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/limit/{limitName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{limitName}", $this->request->getLimitName() === null|| strlen($this->request->getLimitName()) == 0 ? "null" : $this->request->getLimitName(), $url);

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

/**
 * GS2 Limit API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2LimitRestClient extends AbstractGs2Client {

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
     * @param DescribeCountersRequest $request
     * @return PromiseInterface
     */
    public function describeCountersAsync(
            DescribeCountersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCountersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCountersRequest $request
     * @return DescribeCountersResult
     */
    public function describeCounters (
            DescribeCountersRequest $request
    ): DescribeCountersResult {
        return $this->describeCountersAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCountersByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeCountersByUserIdAsync(
            DescribeCountersByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCountersByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCountersByUserIdRequest $request
     * @return DescribeCountersByUserIdResult
     */
    public function describeCountersByUserId (
            DescribeCountersByUserIdRequest $request
    ): DescribeCountersByUserIdResult {
        return $this->describeCountersByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCounterRequest $request
     * @return PromiseInterface
     */
    public function getCounterAsync(
            GetCounterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCounterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCounterRequest $request
     * @return GetCounterResult
     */
    public function getCounter (
            GetCounterRequest $request
    ): GetCounterResult {
        return $this->getCounterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCounterByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getCounterByUserIdAsync(
            GetCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCounterByUserIdRequest $request
     * @return GetCounterByUserIdResult
     */
    public function getCounterByUserId (
            GetCounterByUserIdRequest $request
    ): GetCounterByUserIdResult {
        return $this->getCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CountUpRequest $request
     * @return PromiseInterface
     */
    public function countUpAsync(
            CountUpRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountUpTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CountUpRequest $request
     * @return CountUpResult
     */
    public function countUp (
            CountUpRequest $request
    ): CountUpResult {
        return $this->countUpAsync(
            $request
        )->wait();
    }

    /**
     * @param CountUpByUserIdRequest $request
     * @return PromiseInterface
     */
    public function countUpByUserIdAsync(
            CountUpByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountUpByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CountUpByUserIdRequest $request
     * @return CountUpByUserIdResult
     */
    public function countUpByUserId (
            CountUpByUserIdRequest $request
    ): CountUpByUserIdResult {
        return $this->countUpByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteCounterByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteCounterByUserIdAsync(
            DeleteCounterByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCounterByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteCounterByUserIdRequest $request
     * @return DeleteCounterByUserIdResult
     */
    public function deleteCounterByUserId (
            DeleteCounterByUserIdRequest $request
    ): DeleteCounterByUserIdResult {
        return $this->deleteCounterByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CountUpByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function countUpByStampTaskAsync(
            CountUpByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CountUpByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CountUpByStampTaskRequest $request
     * @return CountUpByStampTaskResult
     */
    public function countUpByStampTask (
            CountUpByStampTaskRequest $request
    ): CountUpByStampTaskResult {
        return $this->countUpByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function deleteByStampSheetAsync(
            DeleteByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteByStampSheetRequest $request
     * @return DeleteByStampSheetResult
     */
    public function deleteByStampSheet (
            DeleteByStampSheetRequest $request
    ): DeleteByStampSheetResult {
        return $this->deleteByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLimitModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeLimitModelMastersAsync(
            DescribeLimitModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLimitModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLimitModelMastersRequest $request
     * @return DescribeLimitModelMastersResult
     */
    public function describeLimitModelMasters (
            DescribeLimitModelMastersRequest $request
    ): DescribeLimitModelMastersResult {
        return $this->describeLimitModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateLimitModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createLimitModelMasterAsync(
            CreateLimitModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateLimitModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateLimitModelMasterRequest $request
     * @return CreateLimitModelMasterResult
     */
    public function createLimitModelMaster (
            CreateLimitModelMasterRequest $request
    ): CreateLimitModelMasterResult {
        return $this->createLimitModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLimitModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getLimitModelMasterAsync(
            GetLimitModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLimitModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLimitModelMasterRequest $request
     * @return GetLimitModelMasterResult
     */
    public function getLimitModelMaster (
            GetLimitModelMasterRequest $request
    ): GetLimitModelMasterResult {
        return $this->getLimitModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateLimitModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateLimitModelMasterAsync(
            UpdateLimitModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateLimitModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateLimitModelMasterRequest $request
     * @return UpdateLimitModelMasterResult
     */
    public function updateLimitModelMaster (
            UpdateLimitModelMasterRequest $request
    ): UpdateLimitModelMasterResult {
        return $this->updateLimitModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteLimitModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteLimitModelMasterAsync(
            DeleteLimitModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteLimitModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteLimitModelMasterRequest $request
     * @return DeleteLimitModelMasterResult
     */
    public function deleteLimitModelMaster (
            DeleteLimitModelMasterRequest $request
    ): DeleteLimitModelMasterResult {
        return $this->deleteLimitModelMasterAsync(
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
     * @param GetCurrentLimitMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentLimitMasterAsync(
            GetCurrentLimitMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentLimitMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentLimitMasterRequest $request
     * @return GetCurrentLimitMasterResult
     */
    public function getCurrentLimitMaster (
            GetCurrentLimitMasterRequest $request
    ): GetCurrentLimitMasterResult {
        return $this->getCurrentLimitMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentLimitMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentLimitMasterAsync(
            UpdateCurrentLimitMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentLimitMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentLimitMasterRequest $request
     * @return UpdateCurrentLimitMasterResult
     */
    public function updateCurrentLimitMaster (
            UpdateCurrentLimitMasterRequest $request
    ): UpdateCurrentLimitMasterResult {
        return $this->updateCurrentLimitMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentLimitMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentLimitMasterFromGitHubAsync(
            UpdateCurrentLimitMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentLimitMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentLimitMasterFromGitHubRequest $request
     * @return UpdateCurrentLimitMasterFromGitHubResult
     */
    public function updateCurrentLimitMasterFromGitHub (
            UpdateCurrentLimitMasterFromGitHubRequest $request
    ): UpdateCurrentLimitMasterFromGitHubResult {
        return $this->updateCurrentLimitMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLimitModelsRequest $request
     * @return PromiseInterface
     */
    public function describeLimitModelsAsync(
            DescribeLimitModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLimitModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLimitModelsRequest $request
     * @return DescribeLimitModelsResult
     */
    public function describeLimitModels (
            DescribeLimitModelsRequest $request
    ): DescribeLimitModelsResult {
        return $this->describeLimitModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLimitModelRequest $request
     * @return PromiseInterface
     */
    public function getLimitModelAsync(
            GetLimitModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLimitModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLimitModelRequest $request
     * @return GetLimitModelResult
     */
    public function getLimitModel (
            GetLimitModelRequest $request
    ): GetLimitModelResult {
        return $this->getLimitModelAsync(
            $request
        )->wait();
    }
}