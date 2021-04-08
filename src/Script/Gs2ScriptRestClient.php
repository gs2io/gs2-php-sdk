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

namespace Gs2\Script;

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
use Gs2\Script\Request\DescribeNamespacesRequest;
use Gs2\Script\Result\DescribeNamespacesResult;
use Gs2\Script\Request\CreateNamespaceRequest;
use Gs2\Script\Result\CreateNamespaceResult;
use Gs2\Script\Request\GetNamespaceStatusRequest;
use Gs2\Script\Result\GetNamespaceStatusResult;
use Gs2\Script\Request\GetNamespaceRequest;
use Gs2\Script\Result\GetNamespaceResult;
use Gs2\Script\Request\UpdateNamespaceRequest;
use Gs2\Script\Result\UpdateNamespaceResult;
use Gs2\Script\Request\DeleteNamespaceRequest;
use Gs2\Script\Result\DeleteNamespaceResult;
use Gs2\Script\Request\DescribeScriptsRequest;
use Gs2\Script\Result\DescribeScriptsResult;
use Gs2\Script\Request\CreateScriptRequest;
use Gs2\Script\Result\CreateScriptResult;
use Gs2\Script\Request\CreateScriptFromGitHubRequest;
use Gs2\Script\Result\CreateScriptFromGitHubResult;
use Gs2\Script\Request\GetScriptRequest;
use Gs2\Script\Result\GetScriptResult;
use Gs2\Script\Request\UpdateScriptRequest;
use Gs2\Script\Result\UpdateScriptResult;
use Gs2\Script\Request\UpdateScriptFromGitHubRequest;
use Gs2\Script\Result\UpdateScriptFromGitHubResult;
use Gs2\Script\Request\DeleteScriptRequest;
use Gs2\Script\Result\DeleteScriptResult;
use Gs2\Script\Request\InvokeScriptRequest;
use Gs2\Script\Result\InvokeScriptResult;
use Gs2\Script\Request\DebugInvokeRequest;
use Gs2\Script\Result\DebugInvokeResult;

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

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeScriptsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeScriptsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeScriptsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeScriptsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeScriptsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeScriptsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/script";

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

class CreateScriptTask extends Gs2RestSessionTask {

    /**
     * @var CreateScriptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateScriptTask constructor.
     * @param Gs2RestSession $session
     * @param CreateScriptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateScriptRequest $request
    ) {
        parent::__construct(
            $session,
            CreateScriptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/script";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getScript() !== null) {
            $json["script"] = $this->request->getScript();
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

class CreateScriptFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var CreateScriptFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateScriptFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param CreateScriptFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateScriptFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            CreateScriptFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/script/from_git_hub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getCheckoutSetting() !== null) {
            $json["checkoutSetting"] = $this->request->getCheckoutSetting()->toJson();
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

class GetScriptTask extends Gs2RestSessionTask {

    /**
     * @var GetScriptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetScriptTask constructor.
     * @param Gs2RestSession $session
     * @param GetScriptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetScriptRequest $request
    ) {
        parent::__construct(
            $session,
            GetScriptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/script/{scriptName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{scriptName}", $this->request->getScriptName() === null|| strlen($this->request->getScriptName()) == 0 ? "null" : $this->request->getScriptName(), $url);

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

class UpdateScriptTask extends Gs2RestSessionTask {

    /**
     * @var UpdateScriptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateScriptTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateScriptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateScriptRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateScriptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/script/{scriptName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{scriptName}", $this->request->getScriptName() === null|| strlen($this->request->getScriptName()) == 0 ? "null" : $this->request->getScriptName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getScript() !== null) {
            $json["script"] = $this->request->getScript();
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

class UpdateScriptFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateScriptFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateScriptFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateScriptFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateScriptFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateScriptFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/script/{scriptName}/from_git_hub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{scriptName}", $this->request->getScriptName() === null|| strlen($this->request->getScriptName()) == 0 ? "null" : $this->request->getScriptName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
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

class DeleteScriptTask extends Gs2RestSessionTask {

    /**
     * @var DeleteScriptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteScriptTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteScriptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteScriptRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteScriptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/script/{scriptName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{scriptName}", $this->request->getScriptName() === null|| strlen($this->request->getScriptName()) == 0 ? "null" : $this->request->getScriptName(), $url);

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

class InvokeScriptTask extends Gs2RestSessionTask {

    /**
     * @var InvokeScriptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * InvokeScriptTask constructor.
     * @param Gs2RestSession $session
     * @param InvokeScriptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        InvokeScriptRequest $request
    ) {
        parent::__construct(
            $session,
            InvokeScriptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/invoke";

        $json = [];
        if ($this->request->getScriptId() !== null) {
            $json["scriptId"] = $this->request->getScriptId();
        }
        if ($this->request->getArgs() !== null) {
            $json["args"] = $this->request->getArgs();
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

class DebugInvokeTask extends Gs2RestSessionTask {

    /**
     * @var DebugInvokeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DebugInvokeTask constructor.
     * @param Gs2RestSession $session
     * @param DebugInvokeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DebugInvokeRequest $request
    ) {
        parent::__construct(
            $session,
            DebugInvokeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "script", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/debug/invoke";

        $json = [];
        if ($this->request->getScript() !== null) {
            $json["script"] = $this->request->getScript();
        }
        if ($this->request->getArgs() !== null) {
            $json["args"] = $this->request->getArgs();
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
 * GS2 Script API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ScriptRestClient extends AbstractGs2Client {

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
     * スクリプトの一覧を取得します<br>
     *
     * @param DescribeScriptsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeScriptsAsync(
            DescribeScriptsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeScriptsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スクリプトの一覧を取得します<br>
     *
     * @param DescribeScriptsRequest $request リクエストパラメータ
     * @return DescribeScriptsResult
     */
    public function describeScripts (
            DescribeScriptsRequest $request
    ): DescribeScriptsResult {
        return $this->describeScriptsAsync(
            $request
        )->wait();
    }

    /**
     * スクリプトを新規作成します<br>
     *
     * @param CreateScriptRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createScriptAsync(
            CreateScriptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateScriptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スクリプトを新規作成します<br>
     *
     * @param CreateScriptRequest $request リクエストパラメータ
     * @return CreateScriptResult
     */
    public function createScript (
            CreateScriptRequest $request
    ): CreateScriptResult {
        return $this->createScriptAsync(
            $request
        )->wait();
    }

    /**
     * GitHubリポジトリのコードからスクリプトを新規作成します<br>
     *
     * @param CreateScriptFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createScriptFromGitHubAsync(
            CreateScriptFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateScriptFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * GitHubリポジトリのコードからスクリプトを新規作成します<br>
     *
     * @param CreateScriptFromGitHubRequest $request リクエストパラメータ
     * @return CreateScriptFromGitHubResult
     */
    public function createScriptFromGitHub (
            CreateScriptFromGitHubRequest $request
    ): CreateScriptFromGitHubResult {
        return $this->createScriptFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * スクリプトを取得します<br>
     *
     * @param GetScriptRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getScriptAsync(
            GetScriptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetScriptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スクリプトを取得します<br>
     *
     * @param GetScriptRequest $request リクエストパラメータ
     * @return GetScriptResult
     */
    public function getScript (
            GetScriptRequest $request
    ): GetScriptResult {
        return $this->getScriptAsync(
            $request
        )->wait();
    }

    /**
     * スクリプトを更新します<br>
     *
     * @param UpdateScriptRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateScriptAsync(
            UpdateScriptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateScriptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スクリプトを更新します<br>
     *
     * @param UpdateScriptRequest $request リクエストパラメータ
     * @return UpdateScriptResult
     */
    public function updateScript (
            UpdateScriptRequest $request
    ): UpdateScriptResult {
        return $this->updateScriptAsync(
            $request
        )->wait();
    }

    /**
     * GithHub をデータソースとしてスクリプトを更新します<br>
     *
     * @param UpdateScriptFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateScriptFromGitHubAsync(
            UpdateScriptFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateScriptFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * GithHub をデータソースとしてスクリプトを更新します<br>
     *
     * @param UpdateScriptFromGitHubRequest $request リクエストパラメータ
     * @return UpdateScriptFromGitHubResult
     */
    public function updateScriptFromGitHub (
            UpdateScriptFromGitHubRequest $request
    ): UpdateScriptFromGitHubResult {
        return $this->updateScriptFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * スクリプトを削除します<br>
     *
     * @param DeleteScriptRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteScriptAsync(
            DeleteScriptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteScriptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スクリプトを削除します<br>
     *
     * @param DeleteScriptRequest $request リクエストパラメータ
     * @return DeleteScriptResult
     */
    public function deleteScript (
            DeleteScriptRequest $request
    ): DeleteScriptResult {
        return $this->deleteScriptAsync(
            $request
        )->wait();
    }

    /**
     * スクリプトを実行します<br>
     *
     * @param InvokeScriptRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function invokeScriptAsync(
            InvokeScriptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new InvokeScriptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スクリプトを実行します<br>
     *
     * @param InvokeScriptRequest $request リクエストパラメータ
     * @return InvokeScriptResult
     */
    public function invokeScript (
            InvokeScriptRequest $request
    ): InvokeScriptResult {
        return $this->invokeScriptAsync(
            $request
        )->wait();
    }

    /**
     * スクリプトを実行します<br>
     *
     * @param DebugInvokeRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function debugInvokeAsync(
            DebugInvokeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DebugInvokeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スクリプトを実行します<br>
     *
     * @param DebugInvokeRequest $request リクエストパラメータ
     * @return DebugInvokeResult
     */
    public function debugInvoke (
            DebugInvokeRequest $request
    ): DebugInvokeResult {
        return $this->debugInvokeAsync(
            $request
        )->wait();
    }
}