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

namespace Gs2\MegaField;

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


use Gs2\MegaField\Request\DescribeNamespacesRequest;
use Gs2\MegaField\Result\DescribeNamespacesResult;
use Gs2\MegaField\Request\CreateNamespaceRequest;
use Gs2\MegaField\Result\CreateNamespaceResult;
use Gs2\MegaField\Request\GetNamespaceStatusRequest;
use Gs2\MegaField\Result\GetNamespaceStatusResult;
use Gs2\MegaField\Request\GetNamespaceRequest;
use Gs2\MegaField\Result\GetNamespaceResult;
use Gs2\MegaField\Request\UpdateNamespaceRequest;
use Gs2\MegaField\Result\UpdateNamespaceResult;
use Gs2\MegaField\Request\DeleteNamespaceRequest;
use Gs2\MegaField\Result\DeleteNamespaceResult;
use Gs2\MegaField\Request\DescribeAreaModelsRequest;
use Gs2\MegaField\Result\DescribeAreaModelsResult;
use Gs2\MegaField\Request\GetAreaModelRequest;
use Gs2\MegaField\Result\GetAreaModelResult;
use Gs2\MegaField\Request\DescribeAreaModelMastersRequest;
use Gs2\MegaField\Result\DescribeAreaModelMastersResult;
use Gs2\MegaField\Request\CreateAreaModelMasterRequest;
use Gs2\MegaField\Result\CreateAreaModelMasterResult;
use Gs2\MegaField\Request\GetAreaModelMasterRequest;
use Gs2\MegaField\Result\GetAreaModelMasterResult;
use Gs2\MegaField\Request\UpdateAreaModelMasterRequest;
use Gs2\MegaField\Result\UpdateAreaModelMasterResult;
use Gs2\MegaField\Request\DeleteAreaModelMasterRequest;
use Gs2\MegaField\Result\DeleteAreaModelMasterResult;
use Gs2\MegaField\Request\DescribeLayerModelsRequest;
use Gs2\MegaField\Result\DescribeLayerModelsResult;
use Gs2\MegaField\Request\GetLayerModelRequest;
use Gs2\MegaField\Result\GetLayerModelResult;
use Gs2\MegaField\Request\DescribeLayerModelMastersRequest;
use Gs2\MegaField\Result\DescribeLayerModelMastersResult;
use Gs2\MegaField\Request\CreateLayerModelMasterRequest;
use Gs2\MegaField\Result\CreateLayerModelMasterResult;
use Gs2\MegaField\Request\GetLayerModelMasterRequest;
use Gs2\MegaField\Result\GetLayerModelMasterResult;
use Gs2\MegaField\Request\UpdateLayerModelMasterRequest;
use Gs2\MegaField\Result\UpdateLayerModelMasterResult;
use Gs2\MegaField\Request\DeleteLayerModelMasterRequest;
use Gs2\MegaField\Result\DeleteLayerModelMasterResult;
use Gs2\MegaField\Request\ExportMasterRequest;
use Gs2\MegaField\Result\ExportMasterResult;
use Gs2\MegaField\Request\GetCurrentFieldMasterRequest;
use Gs2\MegaField\Result\GetCurrentFieldMasterResult;
use Gs2\MegaField\Request\UpdateCurrentFieldMasterRequest;
use Gs2\MegaField\Result\UpdateCurrentFieldMasterResult;
use Gs2\MegaField\Request\UpdateCurrentFieldMasterFromGitHubRequest;
use Gs2\MegaField\Result\UpdateCurrentFieldMasterFromGitHubResult;
use Gs2\MegaField\Request\PutPositionRequest;
use Gs2\MegaField\Result\PutPositionResult;
use Gs2\MegaField\Request\PutPositionByUserIdRequest;
use Gs2\MegaField\Result\PutPositionByUserIdResult;
use Gs2\MegaField\Request\FetchPositionRequest;
use Gs2\MegaField\Result\FetchPositionResult;
use Gs2\MegaField\Request\FetchPositionFromSystemRequest;
use Gs2\MegaField\Result\FetchPositionFromSystemResult;
use Gs2\MegaField\Request\NearUserIdsRequest;
use Gs2\MegaField\Result\NearUserIdsResult;
use Gs2\MegaField\Request\NearUserIdsFromSystemRequest;
use Gs2\MegaField\Result\NearUserIdsFromSystemResult;
use Gs2\MegaField\Request\ActionRequest;
use Gs2\MegaField\Result\ActionResult;
use Gs2\MegaField\Request\ActionByUserIdRequest;
use Gs2\MegaField\Result\ActionByUserIdResult;

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

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeAreaModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAreaModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAreaModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAreaModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAreaModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAreaModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/area";

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

class GetAreaModelTask extends Gs2RestSessionTask {

    /**
     * @var GetAreaModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAreaModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetAreaModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAreaModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetAreaModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/area/{areaModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);

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

class DescribeAreaModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAreaModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAreaModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAreaModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAreaModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAreaModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area";

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

class CreateAreaModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateAreaModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateAreaModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateAreaModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateAreaModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateAreaModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area";

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

class GetAreaModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetAreaModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAreaModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetAreaModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAreaModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetAreaModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area/{areaModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);

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

class UpdateAreaModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateAreaModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateAreaModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateAreaModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateAreaModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateAreaModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area/{areaModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class DeleteAreaModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteAreaModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteAreaModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteAreaModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteAreaModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteAreaModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area/{areaModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);

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

class DescribeLayerModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLayerModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLayerModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLayerModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLayerModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLayerModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/area/{areaModelName}/layer";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);

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

class GetLayerModelTask extends Gs2RestSessionTask {

    /**
     * @var GetLayerModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLayerModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetLayerModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLayerModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetLayerModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/area/{areaModelName}/layer/{layerModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

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

class DescribeLayerModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLayerModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLayerModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLayerModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLayerModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLayerModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area/{areaModelName}/layer";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);

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

class CreateLayerModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateLayerModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateLayerModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateLayerModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateLayerModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateLayerModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area/{areaModelName}/layer";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);

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

class GetLayerModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetLayerModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLayerModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetLayerModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLayerModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetLayerModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area/{areaModelName}/layer/{layerModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

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

class UpdateLayerModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateLayerModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateLayerModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateLayerModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateLayerModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateLayerModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area/{areaModelName}/layer/{layerModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
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

class DeleteLayerModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteLayerModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteLayerModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteLayerModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteLayerModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteLayerModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/area/{areaModelName}/layer/{layerModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

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

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentFieldMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentFieldMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentFieldMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentFieldMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentFieldMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentFieldMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentFieldMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentFieldMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentFieldMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentFieldMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentFieldMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentFieldMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentFieldMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentFieldMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentFieldMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentFieldMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentFieldMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentFieldMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class PutPositionTask extends Gs2RestSessionTask {

    /**
     * @var PutPositionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutPositionTask constructor.
     * @param Gs2RestSession $session
     * @param PutPositionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutPositionRequest $request
    ) {
        parent::__construct(
            $session,
            PutPositionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/spatial/{areaModelName}/{layerModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

        $json = [];
        if ($this->request->getPosition() !== null) {
            $json["position"] = $this->request->getPosition()->toJson();
        }
        if ($this->request->getVector() !== null) {
            $json["vector"] = $this->request->getVector()->toJson();
        }
        if ($this->request->getR() !== null) {
            $json["r"] = $this->request->getR();
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

class PutPositionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PutPositionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PutPositionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PutPositionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PutPositionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PutPositionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/spatial/{areaModelName}/{layerModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

        $json = [];
        if ($this->request->getPosition() !== null) {
            $json["position"] = $this->request->getPosition()->toJson();
        }
        if ($this->request->getVector() !== null) {
            $json["vector"] = $this->request->getVector()->toJson();
        }
        if ($this->request->getR() !== null) {
            $json["r"] = $this->request->getR();
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

class FetchPositionTask extends Gs2RestSessionTask {

    /**
     * @var FetchPositionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FetchPositionTask constructor.
     * @param Gs2RestSession $session
     * @param FetchPositionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FetchPositionRequest $request
    ) {
        parent::__construct(
            $session,
            FetchPositionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/area/{areaModelName}/layer/{layerModelName}/spatial/fetch";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

        $json = [];
        if ($this->request->getUserIds() !== null) {
            $array = [];
            foreach ($this->request->getUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["userIds"] = $array;
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

class FetchPositionFromSystemTask extends Gs2RestSessionTask {

    /**
     * @var FetchPositionFromSystemRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * FetchPositionFromSystemTask constructor.
     * @param Gs2RestSession $session
     * @param FetchPositionFromSystemRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        FetchPositionFromSystemRequest $request
    ) {
        parent::__construct(
            $session,
            FetchPositionFromSystemResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/system/area/{areaModelName}/layer/{layerModelName}/spatial/fetch";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

        $json = [];
        if ($this->request->getUserIds() !== null) {
            $array = [];
            foreach ($this->request->getUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["userIds"] = $array;
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

class NearUserIdsTask extends Gs2RestSessionTask {

    /**
     * @var NearUserIdsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * NearUserIdsTask constructor.
     * @param Gs2RestSession $session
     * @param NearUserIdsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        NearUserIdsRequest $request
    ) {
        parent::__construct(
            $session,
            NearUserIdsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/area/{areaModelName}/layer/{layerModelName}/spatial/near";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

        $json = [];
        if ($this->request->getPoint() !== null) {
            $json["point"] = $this->request->getPoint()->toJson();
        }
        if ($this->request->getR() !== null) {
            $json["r"] = $this->request->getR();
        }
        if ($this->request->getLimit() !== null) {
            $json["limit"] = $this->request->getLimit();
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

class NearUserIdsFromSystemTask extends Gs2RestSessionTask {

    /**
     * @var NearUserIdsFromSystemRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * NearUserIdsFromSystemTask constructor.
     * @param Gs2RestSession $session
     * @param NearUserIdsFromSystemRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        NearUserIdsFromSystemRequest $request
    ) {
        parent::__construct(
            $session,
            NearUserIdsFromSystemResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/system/area/{areaModelName}/layer/{layerModelName}/spatial/near";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

        $json = [];
        if ($this->request->getPoint() !== null) {
            $json["point"] = $this->request->getPoint()->toJson();
        }
        if ($this->request->getR() !== null) {
            $json["r"] = $this->request->getR();
        }
        if ($this->request->getLimit() !== null) {
            $json["limit"] = $this->request->getLimit();
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

class ActionTask extends Gs2RestSessionTask {

    /**
     * @var ActionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ActionTask constructor.
     * @param Gs2RestSession $session
     * @param ActionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ActionRequest $request
    ) {
        parent::__construct(
            $session,
            ActionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/spatial/{areaModelName}/{layerModelName}/action";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

        $json = [];
        if ($this->request->getPosition() !== null) {
            $json["position"] = $this->request->getPosition()->toJson();
        }
        if ($this->request->getScopes() !== null) {
            $array = [];
            foreach ($this->request->getScopes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["scopes"] = $array;
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

class ActionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ActionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ActionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ActionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ActionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ActionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "mega-field", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/spatial/{areaModelName}/{layerModelName}/action";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{areaModelName}", $this->request->getAreaModelName() === null|| strlen($this->request->getAreaModelName()) == 0 ? "null" : $this->request->getAreaModelName(), $url);
        $url = str_replace("{layerModelName}", $this->request->getLayerModelName() === null|| strlen($this->request->getLayerModelName()) == 0 ? "null" : $this->request->getLayerModelName(), $url);

        $json = [];
        if ($this->request->getPosition() !== null) {
            $json["position"] = $this->request->getPosition()->toJson();
        }
        if ($this->request->getScopes() !== null) {
            $array = [];
            foreach ($this->request->getScopes() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["scopes"] = $array;
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

/**
 * GS2 MegaField API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2MegaFieldRestClient extends AbstractGs2Client {

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
     * @param DescribeAreaModelsRequest $request
     * @return PromiseInterface
     */
    public function describeAreaModelsAsync(
            DescribeAreaModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAreaModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeAreaModelsRequest $request
     * @return DescribeAreaModelsResult
     */
    public function describeAreaModels (
            DescribeAreaModelsRequest $request
    ): DescribeAreaModelsResult {
        return $this->describeAreaModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetAreaModelRequest $request
     * @return PromiseInterface
     */
    public function getAreaModelAsync(
            GetAreaModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAreaModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetAreaModelRequest $request
     * @return GetAreaModelResult
     */
    public function getAreaModel (
            GetAreaModelRequest $request
    ): GetAreaModelResult {
        return $this->getAreaModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeAreaModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeAreaModelMastersAsync(
            DescribeAreaModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAreaModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeAreaModelMastersRequest $request
     * @return DescribeAreaModelMastersResult
     */
    public function describeAreaModelMasters (
            DescribeAreaModelMastersRequest $request
    ): DescribeAreaModelMastersResult {
        return $this->describeAreaModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateAreaModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createAreaModelMasterAsync(
            CreateAreaModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateAreaModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateAreaModelMasterRequest $request
     * @return CreateAreaModelMasterResult
     */
    public function createAreaModelMaster (
            CreateAreaModelMasterRequest $request
    ): CreateAreaModelMasterResult {
        return $this->createAreaModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetAreaModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getAreaModelMasterAsync(
            GetAreaModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAreaModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetAreaModelMasterRequest $request
     * @return GetAreaModelMasterResult
     */
    public function getAreaModelMaster (
            GetAreaModelMasterRequest $request
    ): GetAreaModelMasterResult {
        return $this->getAreaModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateAreaModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateAreaModelMasterAsync(
            UpdateAreaModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateAreaModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateAreaModelMasterRequest $request
     * @return UpdateAreaModelMasterResult
     */
    public function updateAreaModelMaster (
            UpdateAreaModelMasterRequest $request
    ): UpdateAreaModelMasterResult {
        return $this->updateAreaModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteAreaModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteAreaModelMasterAsync(
            DeleteAreaModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteAreaModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteAreaModelMasterRequest $request
     * @return DeleteAreaModelMasterResult
     */
    public function deleteAreaModelMaster (
            DeleteAreaModelMasterRequest $request
    ): DeleteAreaModelMasterResult {
        return $this->deleteAreaModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLayerModelsRequest $request
     * @return PromiseInterface
     */
    public function describeLayerModelsAsync(
            DescribeLayerModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLayerModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLayerModelsRequest $request
     * @return DescribeLayerModelsResult
     */
    public function describeLayerModels (
            DescribeLayerModelsRequest $request
    ): DescribeLayerModelsResult {
        return $this->describeLayerModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLayerModelRequest $request
     * @return PromiseInterface
     */
    public function getLayerModelAsync(
            GetLayerModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLayerModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLayerModelRequest $request
     * @return GetLayerModelResult
     */
    public function getLayerModel (
            GetLayerModelRequest $request
    ): GetLayerModelResult {
        return $this->getLayerModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLayerModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeLayerModelMastersAsync(
            DescribeLayerModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLayerModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLayerModelMastersRequest $request
     * @return DescribeLayerModelMastersResult
     */
    public function describeLayerModelMasters (
            DescribeLayerModelMastersRequest $request
    ): DescribeLayerModelMastersResult {
        return $this->describeLayerModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateLayerModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createLayerModelMasterAsync(
            CreateLayerModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateLayerModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateLayerModelMasterRequest $request
     * @return CreateLayerModelMasterResult
     */
    public function createLayerModelMaster (
            CreateLayerModelMasterRequest $request
    ): CreateLayerModelMasterResult {
        return $this->createLayerModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLayerModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getLayerModelMasterAsync(
            GetLayerModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLayerModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLayerModelMasterRequest $request
     * @return GetLayerModelMasterResult
     */
    public function getLayerModelMaster (
            GetLayerModelMasterRequest $request
    ): GetLayerModelMasterResult {
        return $this->getLayerModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateLayerModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateLayerModelMasterAsync(
            UpdateLayerModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateLayerModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateLayerModelMasterRequest $request
     * @return UpdateLayerModelMasterResult
     */
    public function updateLayerModelMaster (
            UpdateLayerModelMasterRequest $request
    ): UpdateLayerModelMasterResult {
        return $this->updateLayerModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteLayerModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteLayerModelMasterAsync(
            DeleteLayerModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteLayerModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteLayerModelMasterRequest $request
     * @return DeleteLayerModelMasterResult
     */
    public function deleteLayerModelMaster (
            DeleteLayerModelMasterRequest $request
    ): DeleteLayerModelMasterResult {
        return $this->deleteLayerModelMasterAsync(
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
     * @param GetCurrentFieldMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentFieldMasterAsync(
            GetCurrentFieldMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentFieldMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentFieldMasterRequest $request
     * @return GetCurrentFieldMasterResult
     */
    public function getCurrentFieldMaster (
            GetCurrentFieldMasterRequest $request
    ): GetCurrentFieldMasterResult {
        return $this->getCurrentFieldMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentFieldMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentFieldMasterAsync(
            UpdateCurrentFieldMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentFieldMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentFieldMasterRequest $request
     * @return UpdateCurrentFieldMasterResult
     */
    public function updateCurrentFieldMaster (
            UpdateCurrentFieldMasterRequest $request
    ): UpdateCurrentFieldMasterResult {
        return $this->updateCurrentFieldMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentFieldMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentFieldMasterFromGitHubAsync(
            UpdateCurrentFieldMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentFieldMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentFieldMasterFromGitHubRequest $request
     * @return UpdateCurrentFieldMasterFromGitHubResult
     */
    public function updateCurrentFieldMasterFromGitHub (
            UpdateCurrentFieldMasterFromGitHubRequest $request
    ): UpdateCurrentFieldMasterFromGitHubResult {
        return $this->updateCurrentFieldMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param PutPositionRequest $request
     * @return PromiseInterface
     */
    public function putPositionAsync(
            PutPositionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutPositionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PutPositionRequest $request
     * @return PutPositionResult
     */
    public function putPosition (
            PutPositionRequest $request
    ): PutPositionResult {
        return $this->putPositionAsync(
            $request
        )->wait();
    }

    /**
     * @param PutPositionByUserIdRequest $request
     * @return PromiseInterface
     */
    public function putPositionByUserIdAsync(
            PutPositionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PutPositionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PutPositionByUserIdRequest $request
     * @return PutPositionByUserIdResult
     */
    public function putPositionByUserId (
            PutPositionByUserIdRequest $request
    ): PutPositionByUserIdResult {
        return $this->putPositionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param FetchPositionRequest $request
     * @return PromiseInterface
     */
    public function fetchPositionAsync(
            FetchPositionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FetchPositionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param FetchPositionRequest $request
     * @return FetchPositionResult
     */
    public function fetchPosition (
            FetchPositionRequest $request
    ): FetchPositionResult {
        return $this->fetchPositionAsync(
            $request
        )->wait();
    }

    /**
     * @param FetchPositionFromSystemRequest $request
     * @return PromiseInterface
     */
    public function fetchPositionFromSystemAsync(
            FetchPositionFromSystemRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new FetchPositionFromSystemTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param FetchPositionFromSystemRequest $request
     * @return FetchPositionFromSystemResult
     */
    public function fetchPositionFromSystem (
            FetchPositionFromSystemRequest $request
    ): FetchPositionFromSystemResult {
        return $this->fetchPositionFromSystemAsync(
            $request
        )->wait();
    }

    /**
     * @param NearUserIdsRequest $request
     * @return PromiseInterface
     */
    public function nearUserIdsAsync(
            NearUserIdsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new NearUserIdsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param NearUserIdsRequest $request
     * @return NearUserIdsResult
     */
    public function nearUserIds (
            NearUserIdsRequest $request
    ): NearUserIdsResult {
        return $this->nearUserIdsAsync(
            $request
        )->wait();
    }

    /**
     * @param NearUserIdsFromSystemRequest $request
     * @return PromiseInterface
     */
    public function nearUserIdsFromSystemAsync(
            NearUserIdsFromSystemRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new NearUserIdsFromSystemTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param NearUserIdsFromSystemRequest $request
     * @return NearUserIdsFromSystemResult
     */
    public function nearUserIdsFromSystem (
            NearUserIdsFromSystemRequest $request
    ): NearUserIdsFromSystemResult {
        return $this->nearUserIdsFromSystemAsync(
            $request
        )->wait();
    }

    /**
     * @param ActionRequest $request
     * @return PromiseInterface
     */
    public function actionAsync(
            ActionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ActionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ActionRequest $request
     * @return ActionResult
     */
    public function action (
            ActionRequest $request
    ): ActionResult {
        return $this->actionAsync(
            $request
        )->wait();
    }

    /**
     * @param ActionByUserIdRequest $request
     * @return PromiseInterface
     */
    public function actionByUserIdAsync(
            ActionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ActionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ActionByUserIdRequest $request
     * @return ActionByUserIdResult
     */
    public function actionByUserId (
            ActionByUserIdRequest $request
    ): ActionByUserIdResult {
        return $this->actionByUserIdAsync(
            $request
        )->wait();
    }
}