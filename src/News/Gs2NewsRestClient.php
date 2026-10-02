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

namespace Gs2\News;

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


use Gs2\News\Request\DescribeNamespacesRequest;
use Gs2\News\Result\DescribeNamespacesResult;
use Gs2\News\Request\CreateNamespaceRequest;
use Gs2\News\Result\CreateNamespaceResult;
use Gs2\News\Request\GetNamespaceStatusRequest;
use Gs2\News\Result\GetNamespaceStatusResult;
use Gs2\News\Request\GetNamespaceRequest;
use Gs2\News\Result\GetNamespaceResult;
use Gs2\News\Request\UpdateNamespaceRequest;
use Gs2\News\Result\UpdateNamespaceResult;
use Gs2\News\Request\DeleteNamespaceRequest;
use Gs2\News\Result\DeleteNamespaceResult;
use Gs2\News\Request\GetServiceVersionRequest;
use Gs2\News\Result\GetServiceVersionResult;
use Gs2\News\Request\DescribeProgressesRequest;
use Gs2\News\Result\DescribeProgressesResult;
use Gs2\News\Request\GetProgressRequest;
use Gs2\News\Result\GetProgressResult;
use Gs2\News\Request\DescribeOutputsRequest;
use Gs2\News\Result\DescribeOutputsResult;
use Gs2\News\Request\GetOutputRequest;
use Gs2\News\Result\GetOutputResult;
use Gs2\News\Request\PrepareUpdateCurrentNewsMasterRequest;
use Gs2\News\Result\PrepareUpdateCurrentNewsMasterResult;
use Gs2\News\Request\UpdateCurrentNewsMasterRequest;
use Gs2\News\Result\UpdateCurrentNewsMasterResult;
use Gs2\News\Request\PrepareUpdateCurrentNewsMasterFromGitHubRequest;
use Gs2\News\Result\PrepareUpdateCurrentNewsMasterFromGitHubResult;
use Gs2\News\Request\DescribeNewsRequest;
use Gs2\News\Result\DescribeNewsResult;
use Gs2\News\Request\DescribeNewsByUserIdRequest;
use Gs2\News\Result\DescribeNewsByUserIdResult;
use Gs2\News\Request\WantGrantRequest;
use Gs2\News\Result\WantGrantResult;
use Gs2\News\Request\WantGrantByUserIdRequest;
use Gs2\News\Result\WantGrantByUserIdResult;

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

class DescribeProgressesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeProgressesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeProgressesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeProgressesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeProgressesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeProgressesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/progress";

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

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/progress/{uploadToken}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

        return parent::executeImpl();
    }
}

class DescribeOutputsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeOutputsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeOutputsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeOutputsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeOutputsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeOutputsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/progress/{uploadToken}/output";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{uploadToken}", $this->request->getUploadToken() === null|| strlen($this->request->getUploadToken()) == 0 ? "null" : $this->request->getUploadToken(), $url);

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

class GetOutputTask extends Gs2RestSessionTask {

    /**
     * @var GetOutputRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetOutputTask constructor.
     * @param Gs2RestSession $session
     * @param GetOutputRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetOutputRequest $request
    ) {
        parent::__construct(
            $session,
            GetOutputResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/progress/{uploadToken}/output/{outputName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{uploadToken}", $this->request->getUploadToken() === null|| strlen($this->request->getUploadToken()) == 0 ? "null" : $this->request->getUploadToken(), $url);
        $url = str_replace("{outputName}", $this->request->getOutputName() === null|| strlen($this->request->getOutputName()) == 0 ? "null" : $this->request->getOutputName(), $url);

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

class PrepareUpdateCurrentNewsMasterTask extends Gs2RestSessionTask {

    /**
     * @var PrepareUpdateCurrentNewsMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareUpdateCurrentNewsMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareUpdateCurrentNewsMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareUpdateCurrentNewsMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareUpdateCurrentNewsMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/prepare";

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

class UpdateCurrentNewsMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentNewsMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentNewsMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentNewsMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentNewsMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentNewsMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
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

class PrepareUpdateCurrentNewsMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var PrepareUpdateCurrentNewsMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareUpdateCurrentNewsMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareUpdateCurrentNewsMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeNewsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeNewsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeNewsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeNewsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeNewsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeNewsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/news";

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

class DescribeNewsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeNewsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeNewsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeNewsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeNewsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeNewsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/news";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class WantGrantTask extends Gs2RestSessionTask {

    /**
     * @var WantGrantRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WantGrantTask constructor.
     * @param Gs2RestSession $session
     * @param WantGrantRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WantGrantRequest $request
    ) {
        parent::__construct(
            $session,
            WantGrantResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/news/grant";

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

class WantGrantByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var WantGrantByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * WantGrantByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param WantGrantByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        WantGrantByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            WantGrantByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "news", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/news/grant";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

/**
 * GS2-News API client
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/
 */
class Gs2NewsRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Namespaces
     *
     * @param DescribeNamespacesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#describenamespaces
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#createnamespace
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#getnamespacestatus
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#getnamespace
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#updatenamespace
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#deletenamespace
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#getserviceversion
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
     * @see https://docs.gs2.io/api_reference/news/sdk/#getserviceversion
     */
    public function getServiceVersion (
            GetServiceVersionRequest $request
    ): GetServiceVersionResult {
        return $this->getServiceVersionAsync(
            $request
        )->wait();
    }

    /**
     * List content generation progress
     *
     * @param DescribeProgressesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#describeprogresses
     */
    public function describeProgressesAsync(
            DescribeProgressesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeProgressesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List content generation progress
     *
     * @param DescribeProgressesRequest $request
     * @return DescribeProgressesResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#describeprogresses
     */
    public function describeProgresses (
            DescribeProgressesRequest $request
    ): DescribeProgressesResult {
        return $this->describeProgressesAsync(
            $request
        )->wait();
    }

    /**
     * Get content generation progress
     *
     * @param GetProgressRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#getprogress
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
     * Get content generation progress
     *
     * @param GetProgressRequest $request
     * @return GetProgressResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#getprogress
     */
    public function getProgress (
            GetProgressRequest $request
    ): GetProgressResult {
        return $this->getProgressAsync(
            $request
        )->wait();
    }

    /**
     * List output of content generation progress
     *
     * @param DescribeOutputsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#describeoutputs
     */
    public function describeOutputsAsync(
            DescribeOutputsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeOutputsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List output of content generation progress
     *
     * @param DescribeOutputsRequest $request
     * @return DescribeOutputsResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#describeoutputs
     */
    public function describeOutputs (
            DescribeOutputsRequest $request
    ): DescribeOutputsResult {
        return $this->describeOutputsAsync(
            $request
        )->wait();
    }

    /**
     * Get output of content generation progress
     *
     * @param GetOutputRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#getoutput
     */
    public function getOutputAsync(
            GetOutputRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetOutputTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get output of content generation progress
     *
     * @param GetOutputRequest $request
     * @return GetOutputResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#getoutput
     */
    public function getOutput (
            GetOutputRequest $request
    ): GetOutputResult {
        return $this->getOutputAsync(
            $request
        )->wait();
    }

    /**
     * Prepare updates to Currently Active Notice
     *
     * @param PrepareUpdateCurrentNewsMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#prepareupdatecurrentnewsmaster
     */
    public function prepareUpdateCurrentNewsMasterAsync(
            PrepareUpdateCurrentNewsMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareUpdateCurrentNewsMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Prepare updates to Currently Active Notice
     *
     * @param PrepareUpdateCurrentNewsMasterRequest $request
     * @return PrepareUpdateCurrentNewsMasterResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#prepareupdatecurrentnewsmaster
     */
    public function prepareUpdateCurrentNewsMaster (
            PrepareUpdateCurrentNewsMasterRequest $request
    ): PrepareUpdateCurrentNewsMasterResult {
        return $this->prepareUpdateCurrentNewsMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently available notices
     *
     * @param UpdateCurrentNewsMasterRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#updatecurrentnewsmaster
     */
    public function updateCurrentNewsMasterAsync(
            UpdateCurrentNewsMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentNewsMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently available notices
     *
     * @param UpdateCurrentNewsMasterRequest $request
     * @return UpdateCurrentNewsMasterResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#updatecurrentnewsmaster
     */
    public function updateCurrentNewsMaster (
            UpdateCurrentNewsMasterRequest $request
    ): UpdateCurrentNewsMasterResult {
        return $this->updateCurrentNewsMasterAsync(
            $request
        )->wait();
    }

    /**
     * Update currently available notices from GitHub
     *
     * @param PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#prepareupdatecurrentnewsmasterfromgithub
     */
    public function prepareUpdateCurrentNewsMasterFromGitHubAsync(
            PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareUpdateCurrentNewsMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Update currently available notices from GitHub
     *
     * @param PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
     * @return PrepareUpdateCurrentNewsMasterFromGitHubResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#prepareupdatecurrentnewsmasterfromgithub
     */
    public function prepareUpdateCurrentNewsMasterFromGitHub (
            PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
    ): PrepareUpdateCurrentNewsMasterFromGitHubResult {
        return $this->prepareUpdateCurrentNewsMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * List News Articles
     *
     * @param DescribeNewsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#describenews
     */
    public function describeNewsAsync(
            DescribeNewsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeNewsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List News Articles
     *
     * @param DescribeNewsRequest $request
     * @return DescribeNewsResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#describenews
     */
    public function describeNews (
            DescribeNewsRequest $request
    ): DescribeNewsResult {
        return $this->describeNewsAsync(
            $request
        )->wait();
    }

    /**
     * List News Articles by User ID
     *
     * @param DescribeNewsByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#describenewsbyuserid
     */
    public function describeNewsByUserIdAsync(
            DescribeNewsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeNewsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * List News Articles by User ID
     *
     * @param DescribeNewsByUserIdRequest $request
     * @return DescribeNewsByUserIdResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#describenewsbyuserid
     */
    public function describeNewsByUserId (
            DescribeNewsByUserIdRequest $request
    ): DescribeNewsByUserIdResult {
        return $this->describeNewsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * Get the information needed to access the News Article
     *
     * @param WantGrantRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#wantgrant
     */
    public function wantGrantAsync(
            WantGrantRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WantGrantTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get the information needed to access the News Article
     *
     * @param WantGrantRequest $request
     * @return WantGrantResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#wantgrant
     */
    public function wantGrant (
            WantGrantRequest $request
    ): WantGrantResult {
        return $this->wantGrantAsync(
            $request
        )->wait();
    }

    /**
     * Get the information necessary to access a News Article by User ID
     *
     * @param WantGrantByUserIdRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/news/sdk/#wantgrantbyuserid
     */
    public function wantGrantByUserIdAsync(
            WantGrantByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new WantGrantByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * Get the information necessary to access a News Article by User ID
     *
     * @param WantGrantByUserIdRequest $request
     * @return WantGrantByUserIdResult
     * @see https://docs.gs2.io/api_reference/news/sdk/#wantgrantbyuserid
     */
    public function wantGrantByUserId (
            WantGrantByUserIdRequest $request
    ): WantGrantByUserIdResult {
        return $this->wantGrantByUserIdAsync(
            $request
        )->wait();
    }
}