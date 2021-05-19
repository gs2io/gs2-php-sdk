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

namespace Gs2\Dictionary;

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
use Gs2\Dictionary\Request\DescribeNamespacesRequest;
use Gs2\Dictionary\Result\DescribeNamespacesResult;
use Gs2\Dictionary\Request\CreateNamespaceRequest;
use Gs2\Dictionary\Result\CreateNamespaceResult;
use Gs2\Dictionary\Request\GetNamespaceStatusRequest;
use Gs2\Dictionary\Result\GetNamespaceStatusResult;
use Gs2\Dictionary\Request\GetNamespaceRequest;
use Gs2\Dictionary\Result\GetNamespaceResult;
use Gs2\Dictionary\Request\UpdateNamespaceRequest;
use Gs2\Dictionary\Result\UpdateNamespaceResult;
use Gs2\Dictionary\Request\DeleteNamespaceRequest;
use Gs2\Dictionary\Result\DeleteNamespaceResult;
use Gs2\Dictionary\Request\DescribeEntryModelsRequest;
use Gs2\Dictionary\Result\DescribeEntryModelsResult;
use Gs2\Dictionary\Request\GetEntryModelRequest;
use Gs2\Dictionary\Result\GetEntryModelResult;
use Gs2\Dictionary\Request\DescribeEntryModelMastersRequest;
use Gs2\Dictionary\Result\DescribeEntryModelMastersResult;
use Gs2\Dictionary\Request\CreateEntryModelMasterRequest;
use Gs2\Dictionary\Result\CreateEntryModelMasterResult;
use Gs2\Dictionary\Request\GetEntryModelMasterRequest;
use Gs2\Dictionary\Result\GetEntryModelMasterResult;
use Gs2\Dictionary\Request\UpdateEntryModelMasterRequest;
use Gs2\Dictionary\Result\UpdateEntryModelMasterResult;
use Gs2\Dictionary\Request\DeleteEntryModelMasterRequest;
use Gs2\Dictionary\Result\DeleteEntryModelMasterResult;
use Gs2\Dictionary\Request\DescribeEntriesRequest;
use Gs2\Dictionary\Result\DescribeEntriesResult;
use Gs2\Dictionary\Request\DescribeEntriesByUserIdRequest;
use Gs2\Dictionary\Result\DescribeEntriesByUserIdResult;
use Gs2\Dictionary\Request\AddEntriesByUserIdRequest;
use Gs2\Dictionary\Result\AddEntriesByUserIdResult;
use Gs2\Dictionary\Request\GetEntryRequest;
use Gs2\Dictionary\Result\GetEntryResult;
use Gs2\Dictionary\Request\GetEntryByUserIdRequest;
use Gs2\Dictionary\Result\GetEntryByUserIdResult;
use Gs2\Dictionary\Request\GetEntryWithSignatureRequest;
use Gs2\Dictionary\Result\GetEntryWithSignatureResult;
use Gs2\Dictionary\Request\GetEntryWithSignatureByUserIdRequest;
use Gs2\Dictionary\Result\GetEntryWithSignatureByUserIdResult;
use Gs2\Dictionary\Request\ResetByUserIdRequest;
use Gs2\Dictionary\Result\ResetByUserIdResult;
use Gs2\Dictionary\Request\AddEntriesByStampSheetRequest;
use Gs2\Dictionary\Result\AddEntriesByStampSheetResult;
use Gs2\Dictionary\Request\ExportMasterRequest;
use Gs2\Dictionary\Result\ExportMasterResult;
use Gs2\Dictionary\Request\GetCurrentEntryMasterRequest;
use Gs2\Dictionary\Result\GetCurrentEntryMasterResult;
use Gs2\Dictionary\Request\UpdateCurrentEntryMasterRequest;
use Gs2\Dictionary\Result\UpdateCurrentEntryMasterResult;
use Gs2\Dictionary\Request\UpdateCurrentEntryMasterFromGitHubRequest;
use Gs2\Dictionary\Result\UpdateCurrentEntryMasterFromGitHubResult;

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEntryScript() !== null) {
            $json["entryScript"] = $this->request->getEntryScript()->toJson();
        }
        if ($this->request->getDuplicateEntryScript() !== null) {
            $json["duplicateEntryScript"] = $this->request->getDuplicateEntryScript()->toJson();
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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEntryScript() !== null) {
            $json["entryScript"] = $this->request->getEntryScript()->toJson();
        }
        if ($this->request->getDuplicateEntryScript() !== null) {
            $json["duplicateEntryScript"] = $this->request->getDuplicateEntryScript()->toJson();
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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeEntryModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEntryModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEntryModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEntryModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEntryModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEntryModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetEntryModelTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{entryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryName}", $this->request->getEntryName() === null|| strlen($this->request->getEntryName()) == 0 ? "null" : $this->request->getEntryName(), $url);

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

class DescribeEntryModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEntryModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEntryModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEntryModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEntryModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEntryModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateEntryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateEntryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateEntryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateEntryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateEntryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateEntryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class GetEntryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{entryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryName}", $this->request->getEntryName() === null|| strlen($this->request->getEntryName()) == 0 ? "null" : $this->request->getEntryName(), $url);

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

class UpdateEntryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateEntryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateEntryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateEntryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateEntryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateEntryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{entryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryName}", $this->request->getEntryName() === null|| strlen($this->request->getEntryName()) == 0 ? "null" : $this->request->getEntryName(), $url);

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

class DeleteEntryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteEntryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteEntryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteEntryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteEntryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteEntryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{entryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryName}", $this->request->getEntryName() === null|| strlen($this->request->getEntryName()) == 0 ? "null" : $this->request->getEntryName(), $url);

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

class DescribeEntriesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEntriesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEntriesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEntriesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEntriesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEntriesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/entry";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeEntriesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEntriesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEntriesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEntriesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEntriesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEntriesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class AddEntriesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddEntriesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddEntriesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddEntriesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddEntriesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddEntriesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getEntryModelNames() !== null) {
            $array = [];
            foreach ($this->request->getEntryModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["entryModelNames"] = $array;
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

class GetEntryTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/entry/{entryModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetEntryByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry/{entryModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetEntryWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/entry/{entryModelName}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetEntryWithSignatureByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryWithSignatureByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryWithSignatureByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryWithSignatureByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryWithSignatureByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryWithSignatureByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry/{entryModelName}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class ResetByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ResetByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ResetByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ResetByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ResetByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ResetByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry";

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

class AddEntriesByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AddEntriesByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddEntriesByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AddEntriesByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddEntriesByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AddEntriesByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/entry/add";

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentEntryMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentEntryMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentEntryMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentEntryMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentEntryMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentEntryMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentEntryMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentEntryMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentEntryMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentEntryMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentEntryMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentEntryMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentEntryMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentEntryMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentEntryMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentEntryMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentEntryMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentEntryMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2 Dictionary API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2DictionaryRestClient extends AbstractGs2Client {

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
        return $this->describeNamespacesAsync(
            $request
        )->wait();
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
        return $this->createNamespaceAsync(
            $request
        )->wait();
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
        return $this->getNamespaceStatusAsync(
            $request
        )->wait();
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
        return $this->getNamespaceAsync(
            $request
        )->wait();
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
        return $this->updateNamespaceAsync(
            $request
        )->wait();
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
        return $this->deleteNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * エントリーモデルの一覧を取得<br>
     *
     * @param DescribeEntryModelsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeEntryModelsAsync(
            DescribeEntryModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEntryModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーモデルの一覧を取得<br>
     *
     * @param DescribeEntryModelsRequest $request リクエストパラメータ
     * @return DescribeEntryModelsResult
     */
    public function describeEntryModels (
            DescribeEntryModelsRequest $request
    ): DescribeEntryModelsResult {
        return $this->describeEntryModelsAsync(
            $request
        )->wait();
    }

    /**
     * エントリーモデルを取得<br>
     *
     * @param GetEntryModelRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEntryModelAsync(
            GetEntryModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーモデルを取得<br>
     *
     * @param GetEntryModelRequest $request リクエストパラメータ
     * @return GetEntryModelResult
     */
    public function getEntryModel (
            GetEntryModelRequest $request
    ): GetEntryModelResult {
        return $this->getEntryModelAsync(
            $request
        )->wait();
    }

    /**
     * エントリーモデルマスターの一覧を取得<br>
     *
     * @param DescribeEntryModelMastersRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeEntryModelMastersAsync(
            DescribeEntryModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEntryModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーモデルマスターの一覧を取得<br>
     *
     * @param DescribeEntryModelMastersRequest $request リクエストパラメータ
     * @return DescribeEntryModelMastersResult
     */
    public function describeEntryModelMasters (
            DescribeEntryModelMastersRequest $request
    ): DescribeEntryModelMastersResult {
        return $this->describeEntryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * エントリーモデルマスターを新規作成<br>
     *
     * @param CreateEntryModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createEntryModelMasterAsync(
            CreateEntryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateEntryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーモデルマスターを新規作成<br>
     *
     * @param CreateEntryModelMasterRequest $request リクエストパラメータ
     * @return CreateEntryModelMasterResult
     */
    public function createEntryModelMaster (
            CreateEntryModelMasterRequest $request
    ): CreateEntryModelMasterResult {
        return $this->createEntryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * エントリーモデルマスターを取得<br>
     *
     * @param GetEntryModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEntryModelMasterAsync(
            GetEntryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーモデルマスターを取得<br>
     *
     * @param GetEntryModelMasterRequest $request リクエストパラメータ
     * @return GetEntryModelMasterResult
     */
    public function getEntryModelMaster (
            GetEntryModelMasterRequest $request
    ): GetEntryModelMasterResult {
        return $this->getEntryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * エントリーモデルマスターを更新<br>
     *
     * @param UpdateEntryModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateEntryModelMasterAsync(
            UpdateEntryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateEntryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーモデルマスターを更新<br>
     *
     * @param UpdateEntryModelMasterRequest $request リクエストパラメータ
     * @return UpdateEntryModelMasterResult
     */
    public function updateEntryModelMaster (
            UpdateEntryModelMasterRequest $request
    ): UpdateEntryModelMasterResult {
        return $this->updateEntryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * エントリーモデルマスターを削除<br>
     *
     * @param DeleteEntryModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteEntryModelMasterAsync(
            DeleteEntryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteEntryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーモデルマスターを削除<br>
     *
     * @param DeleteEntryModelMasterRequest $request リクエストパラメータ
     * @return DeleteEntryModelMasterResult
     */
    public function deleteEntryModelMaster (
            DeleteEntryModelMasterRequest $request
    ): DeleteEntryModelMasterResult {
        return $this->deleteEntryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * エントリーの一覧を取得<br>
     *
     * @param DescribeEntriesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeEntriesAsync(
            DescribeEntriesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEntriesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーの一覧を取得<br>
     *
     * @param DescribeEntriesRequest $request リクエストパラメータ
     * @return DescribeEntriesResult
     */
    public function describeEntries (
            DescribeEntriesRequest $request
    ): DescribeEntriesResult {
        return $this->describeEntriesAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してエントリーの一覧を取得<br>
     *
     * @param DescribeEntriesByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeEntriesByUserIdAsync(
            DescribeEntriesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEntriesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してエントリーの一覧を取得<br>
     *
     * @param DescribeEntriesByUserIdRequest $request リクエストパラメータ
     * @return DescribeEntriesByUserIdResult
     */
    public function describeEntriesByUserId (
            DescribeEntriesByUserIdRequest $request
    ): DescribeEntriesByUserIdResult {
        return $this->describeEntriesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してエントリーを入手済みとして登録<br>
     *
     * @param AddEntriesByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function addEntriesByUserIdAsync(
            AddEntriesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddEntriesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してエントリーを入手済みとして登録<br>
     *
     * @param AddEntriesByUserIdRequest $request リクエストパラメータ
     * @return AddEntriesByUserIdResult
     */
    public function addEntriesByUserId (
            AddEntriesByUserIdRequest $request
    ): AddEntriesByUserIdResult {
        return $this->addEntriesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * エントリーを取得<br>
     *
     * @param GetEntryRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEntryAsync(
            GetEntryRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーを取得<br>
     *
     * @param GetEntryRequest $request リクエストパラメータ
     * @return GetEntryResult
     */
    public function getEntry (
            GetEntryRequest $request
    ): GetEntryResult {
        return $this->getEntryAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してエントリーを取得<br>
     *
     * @param GetEntryByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEntryByUserIdAsync(
            GetEntryByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してエントリーを取得<br>
     *
     * @param GetEntryByUserIdRequest $request リクエストパラメータ
     * @return GetEntryByUserIdResult
     */
    public function getEntryByUserId (
            GetEntryByUserIdRequest $request
    ): GetEntryByUserIdResult {
        return $this->getEntryByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * エントリーを取得<br>
     *
     * @param GetEntryWithSignatureRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEntryWithSignatureAsync(
            GetEntryWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーを取得<br>
     *
     * @param GetEntryWithSignatureRequest $request リクエストパラメータ
     * @return GetEntryWithSignatureResult
     */
    public function getEntryWithSignature (
            GetEntryWithSignatureRequest $request
    ): GetEntryWithSignatureResult {
        return $this->getEntryWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してエントリーを取得<br>
     *
     * @param GetEntryWithSignatureByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEntryWithSignatureByUserIdAsync(
            GetEntryWithSignatureByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryWithSignatureByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してエントリーを取得<br>
     *
     * @param GetEntryWithSignatureByUserIdRequest $request リクエストパラメータ
     * @return GetEntryWithSignatureByUserIdResult
     */
    public function getEntryWithSignatureByUserId (
            GetEntryWithSignatureByUserIdRequest $request
    ): GetEntryWithSignatureByUserIdResult {
        return $this->getEntryWithSignatureByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * エントリーをリセット<br>
     *
     * @param ResetByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function resetByUserIdAsync(
            ResetByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ResetByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * エントリーをリセット<br>
     *
     * @param ResetByUserIdRequest $request リクエストパラメータ
     * @return ResetByUserIdResult
     */
    public function resetByUserId (
            ResetByUserIdRequest $request
    ): ResetByUserIdResult {
        return $this->resetByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * スタンプシートでエントリーを追加<br>
     *
     * @param AddEntriesByStampSheetRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function addEntriesByStampSheetAsync(
            AddEntriesByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddEntriesByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタンプシートでエントリーを追加<br>
     *
     * @param AddEntriesByStampSheetRequest $request リクエストパラメータ
     * @return AddEntriesByStampSheetResult
     */
    public function addEntriesByStampSheet (
            AddEntriesByStampSheetRequest $request
    ): AddEntriesByStampSheetResult {
        return $this->addEntriesByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * 現在有効なエントリー設定のマスターデータをエクスポートします<br>
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
     * 現在有効なエントリー設定のマスターデータをエクスポートします<br>
     *
     * @param ExportMasterRequest $request リクエストパラメータ
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
     * 現在有効なエントリー設定を取得します<br>
     *
     * @param GetCurrentEntryMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getCurrentEntryMasterAsync(
            GetCurrentEntryMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentEntryMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効なエントリー設定を取得します<br>
     *
     * @param GetCurrentEntryMasterRequest $request リクエストパラメータ
     * @return GetCurrentEntryMasterResult
     */
    public function getCurrentEntryMaster (
            GetCurrentEntryMasterRequest $request
    ): GetCurrentEntryMasterResult {
        return $this->getCurrentEntryMasterAsync(
            $request
        )->wait();
    }

    /**
     * 現在有効なエントリー設定を更新します<br>
     *
     * @param UpdateCurrentEntryMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateCurrentEntryMasterAsync(
            UpdateCurrentEntryMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentEntryMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効なエントリー設定を更新します<br>
     *
     * @param UpdateCurrentEntryMasterRequest $request リクエストパラメータ
     * @return UpdateCurrentEntryMasterResult
     */
    public function updateCurrentEntryMaster (
            UpdateCurrentEntryMasterRequest $request
    ): UpdateCurrentEntryMasterResult {
        return $this->updateCurrentEntryMasterAsync(
            $request
        )->wait();
    }

    /**
     * 現在有効なエントリー設定を更新します<br>
     *
     * @param UpdateCurrentEntryMasterFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateCurrentEntryMasterFromGitHubAsync(
            UpdateCurrentEntryMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentEntryMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効なエントリー設定を更新します<br>
     *
     * @param UpdateCurrentEntryMasterFromGitHubRequest $request リクエストパラメータ
     * @return UpdateCurrentEntryMasterFromGitHubResult
     */
    public function updateCurrentEntryMasterFromGitHub (
            UpdateCurrentEntryMasterFromGitHubRequest $request
    ): UpdateCurrentEntryMasterFromGitHubResult {
        return $this->updateCurrentEntryMasterFromGitHubAsync(
            $request
        )->wait();
    }
}