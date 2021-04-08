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

namespace Gs2\Deploy;

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
use Gs2\Deploy\Request\DescribeStacksRequest;
use Gs2\Deploy\Result\DescribeStacksResult;
use Gs2\Deploy\Request\CreateStackRequest;
use Gs2\Deploy\Result\CreateStackResult;
use Gs2\Deploy\Request\CreateStackFromGitHubRequest;
use Gs2\Deploy\Result\CreateStackFromGitHubResult;
use Gs2\Deploy\Request\ValidateRequest;
use Gs2\Deploy\Result\ValidateResult;
use Gs2\Deploy\Request\GetStackStatusRequest;
use Gs2\Deploy\Result\GetStackStatusResult;
use Gs2\Deploy\Request\GetStackRequest;
use Gs2\Deploy\Result\GetStackResult;
use Gs2\Deploy\Request\UpdateStackRequest;
use Gs2\Deploy\Result\UpdateStackResult;
use Gs2\Deploy\Request\UpdateStackFromGitHubRequest;
use Gs2\Deploy\Result\UpdateStackFromGitHubResult;
use Gs2\Deploy\Request\DeleteStackRequest;
use Gs2\Deploy\Result\DeleteStackResult;
use Gs2\Deploy\Request\ForceDeleteStackRequest;
use Gs2\Deploy\Result\ForceDeleteStackResult;
use Gs2\Deploy\Request\DeleteStackResourcesRequest;
use Gs2\Deploy\Result\DeleteStackResourcesResult;
use Gs2\Deploy\Request\DeleteStackEntityRequest;
use Gs2\Deploy\Result\DeleteStackEntityResult;
use Gs2\Deploy\Request\DescribeResourcesRequest;
use Gs2\Deploy\Result\DescribeResourcesResult;
use Gs2\Deploy\Request\GetResourceRequest;
use Gs2\Deploy\Result\GetResourceResult;
use Gs2\Deploy\Request\DescribeEventsRequest;
use Gs2\Deploy\Result\DescribeEventsResult;
use Gs2\Deploy\Request\GetEventRequest;
use Gs2\Deploy\Result\GetEventResult;
use Gs2\Deploy\Request\DescribeOutputsRequest;
use Gs2\Deploy\Result\DescribeOutputsResult;
use Gs2\Deploy\Request\GetOutputRequest;
use Gs2\Deploy\Result\GetOutputResult;

class DescribeStacksTask extends Gs2RestSessionTask {

    /**
     * @var DescribeStacksRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeStacksTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeStacksRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeStacksRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeStacksResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack";

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

class CreateStackTask extends Gs2RestSessionTask {

    /**
     * @var CreateStackRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateStackTask constructor.
     * @param Gs2RestSession $session
     * @param CreateStackRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateStackRequest $request
    ) {
        parent::__construct(
            $session,
            CreateStackResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTemplate() !== null) {
            $json["template"] = $this->request->getTemplate();
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

class CreateStackFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var CreateStackFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateStackFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param CreateStackFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateStackFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            CreateStackFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/from_git_hub";

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

class ValidateTask extends Gs2RestSessionTask {

    /**
     * @var ValidateRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ValidateTask constructor.
     * @param Gs2RestSession $session
     * @param ValidateRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ValidateRequest $request
    ) {
        parent::__construct(
            $session,
            ValidateResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/validate";

        $json = [];
        if ($this->request->getTemplate() !== null) {
            $json["template"] = $this->request->getTemplate();
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

class GetStackStatusTask extends Gs2RestSessionTask {

    /**
     * @var GetStackStatusRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStackStatusTask constructor.
     * @param Gs2RestSession $session
     * @param GetStackStatusRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStackStatusRequest $request
    ) {
        parent::__construct(
            $session,
            GetStackStatusResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/status";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class GetStackTask extends Gs2RestSessionTask {

    /**
     * @var GetStackRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetStackTask constructor.
     * @param Gs2RestSession $session
     * @param GetStackRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetStackRequest $request
    ) {
        parent::__construct(
            $session,
            GetStackResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class UpdateStackTask extends Gs2RestSessionTask {

    /**
     * @var UpdateStackRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateStackTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateStackRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateStackRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateStackResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getTemplate() !== null) {
            $json["template"] = $this->request->getTemplate();
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

class UpdateStackFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateStackFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateStackFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateStackFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateStackFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateStackFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/from_git_hub";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class DeleteStackTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStackRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStackTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStackRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStackRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStackResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class ForceDeleteStackTask extends Gs2RestSessionTask {

    /**
     * @var ForceDeleteStackRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ForceDeleteStackTask constructor.
     * @param Gs2RestSession $session
     * @param ForceDeleteStackRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ForceDeleteStackRequest $request
    ) {
        parent::__construct(
            $session,
            ForceDeleteStackResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/force";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class DeleteStackResourcesTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStackResourcesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStackResourcesTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStackResourcesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStackResourcesRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStackResourcesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/resources";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class DeleteStackEntityTask extends Gs2RestSessionTask {

    /**
     * @var DeleteStackEntityRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteStackEntityTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteStackEntityRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteStackEntityRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteStackEntityResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/entity";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class DescribeResourcesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeResourcesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeResourcesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeResourcesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeResourcesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeResourcesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/resource";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class GetResourceTask extends Gs2RestSessionTask {

    /**
     * @var GetResourceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetResourceTask constructor.
     * @param Gs2RestSession $session
     * @param GetResourceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetResourceRequest $request
    ) {
        parent::__construct(
            $session,
            GetResourceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/resource/{resourceName}";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);
        $url = str_replace("{resourceName}", $this->request->getResourceName() === null|| strlen($this->request->getResourceName()) == 0 ? "null" : $this->request->getResourceName(), $url);

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

class DescribeEventsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEventsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEventsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEventsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEventsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEventsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/event";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class GetEventTask extends Gs2RestSessionTask {

    /**
     * @var GetEventRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEventTask constructor.
     * @param Gs2RestSession $session
     * @param GetEventRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEventRequest $request
    ) {
        parent::__construct(
            $session,
            GetEventResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/event/{eventName}";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);
        $url = str_replace("{eventName}", $this->request->getEventName() === null|| strlen($this->request->getEventName()) == 0 ? "null" : $this->request->getEventName(), $url);

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

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/output";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/output/{outputName}";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);
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

/**
 * GS2 Deploy API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2DeployRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * スタックの一覧を取得<br>
     *
     * @param DescribeStacksRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeStacksAsync(
            DescribeStacksRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeStacksTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックの一覧を取得<br>
     *
     * @param DescribeStacksRequest $request リクエストパラメータ
     * @return DescribeStacksResult
     */
    public function describeStacks (
            DescribeStacksRequest $request
    ): DescribeStacksResult {
        return $this->describeStacksAsync(
            $request
        )->wait();
    }

    /**
     * スタックを新規作成<br>
     *
     * @param CreateStackRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createStackAsync(
            CreateStackRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateStackTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックを新規作成<br>
     *
     * @param CreateStackRequest $request リクエストパラメータ
     * @return CreateStackResult
     */
    public function createStack (
            CreateStackRequest $request
    ): CreateStackResult {
        return $this->createStackAsync(
            $request
        )->wait();
    }

    /**
     * スタックを新規作成<br>
     *
     * @param CreateStackFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createStackFromGitHubAsync(
            CreateStackFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateStackFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックを新規作成<br>
     *
     * @param CreateStackFromGitHubRequest $request リクエストパラメータ
     * @return CreateStackFromGitHubResult
     */
    public function createStackFromGitHub (
            CreateStackFromGitHubRequest $request
    ): CreateStackFromGitHubResult {
        return $this->createStackFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * テンプレートを検証<br>
     *   <br>
     *   このAPIの検証内容は簡易検証を行うに過ぎず、<br>
     *   このAPIで検証をパスしたとしても、実行したらエラーが発生する場合もあります<br>
     *
     * @param ValidateRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function validateAsync(
            ValidateRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ValidateTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * テンプレートを検証<br>
     *   <br>
     *   このAPIの検証内容は簡易検証を行うに過ぎず、<br>
     *   このAPIで検証をパスしたとしても、実行したらエラーが発生する場合もあります<br>
     *
     * @param ValidateRequest $request リクエストパラメータ
     * @return ValidateResult
     */
    public function validate (
            ValidateRequest $request
    ): ValidateResult {
        return $this->validateAsync(
            $request
        )->wait();
    }

    /**
     * スタックを取得<br>
     *
     * @param GetStackStatusRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getStackStatusAsync(
            GetStackStatusRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStackStatusTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックを取得<br>
     *
     * @param GetStackStatusRequest $request リクエストパラメータ
     * @return GetStackStatusResult
     */
    public function getStackStatus (
            GetStackStatusRequest $request
    ): GetStackStatusResult {
        return $this->getStackStatusAsync(
            $request
        )->wait();
    }

    /**
     * スタックを取得<br>
     *
     * @param GetStackRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getStackAsync(
            GetStackRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetStackTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックを取得<br>
     *
     * @param GetStackRequest $request リクエストパラメータ
     * @return GetStackResult
     */
    public function getStack (
            GetStackRequest $request
    ): GetStackResult {
        return $this->getStackAsync(
            $request
        )->wait();
    }

    /**
     * スタックを更新<br>
     *
     * @param UpdateStackRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateStackAsync(
            UpdateStackRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateStackTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックを更新<br>
     *
     * @param UpdateStackRequest $request リクエストパラメータ
     * @return UpdateStackResult
     */
    public function updateStack (
            UpdateStackRequest $request
    ): UpdateStackResult {
        return $this->updateStackAsync(
            $request
        )->wait();
    }

    /**
     * スタックを更新<br>
     *
     * @param UpdateStackFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateStackFromGitHubAsync(
            UpdateStackFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateStackFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックを更新<br>
     *
     * @param UpdateStackFromGitHubRequest $request リクエストパラメータ
     * @return UpdateStackFromGitHubResult
     */
    public function updateStackFromGitHub (
            UpdateStackFromGitHubRequest $request
    ): UpdateStackFromGitHubResult {
        return $this->updateStackFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * スタックを削除<br>
     *   <br>
     *   スタックによって作成されたリソースの削除を行い、成功すればエンティティを削除します。<br>
     *   何らかの理由でリソースの削除に失敗した場合はエンティティが残ります。<br>
     *
     * @param DeleteStackRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteStackAsync(
            DeleteStackRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStackTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックを削除<br>
     *   <br>
     *   スタックによって作成されたリソースの削除を行い、成功すればエンティティを削除します。<br>
     *   何らかの理由でリソースの削除に失敗した場合はエンティティが残ります。<br>
     *
     * @param DeleteStackRequest $request リクエストパラメータ
     * @return DeleteStackResult
     */
    public function deleteStack (
            DeleteStackRequest $request
    ): DeleteStackResult {
        return $this->deleteStackAsync(
            $request
        )->wait();
    }

    /**
     * スタックを強制的に最終削除<br>
     *   <br>
     *   スタックのエンティティを強制的に削除します。<br>
     *   スタックが作成したリソースが残っていても、それらは削除されません。<br>
     *
     * @param ForceDeleteStackRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function forceDeleteStackAsync(
            ForceDeleteStackRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ForceDeleteStackTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックを強制的に最終削除<br>
     *   <br>
     *   スタックのエンティティを強制的に削除します。<br>
     *   スタックが作成したリソースが残っていても、それらは削除されません。<br>
     *
     * @param ForceDeleteStackRequest $request リクエストパラメータ
     * @return ForceDeleteStackResult
     */
    public function forceDeleteStack (
            ForceDeleteStackRequest $request
    ): ForceDeleteStackResult {
        return $this->forceDeleteStackAsync(
            $request
        )->wait();
    }

    /**
     * スタックのリソースを削除<br>
     *   <br>
     *   スタックによって作成されたリソースの削除を行います。<br>
     *   空のテンプレートでスタックを更新するのとほぼ同様の挙動ですが、スタックに適用されていたテンプレートが残るため、誤操作時に、残ったテンプレートからリソースを復元することができます。<br>
     *
     * @param DeleteStackResourcesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteStackResourcesAsync(
            DeleteStackResourcesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStackResourcesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックのリソースを削除<br>
     *   <br>
     *   スタックによって作成されたリソースの削除を行います。<br>
     *   空のテンプレートでスタックを更新するのとほぼ同様の挙動ですが、スタックに適用されていたテンプレートが残るため、誤操作時に、残ったテンプレートからリソースを復元することができます。<br>
     *
     * @param DeleteStackResourcesRequest $request リクエストパラメータ
     * @return DeleteStackResourcesResult
     */
    public function deleteStackResources (
            DeleteStackResourcesRequest $request
    ): DeleteStackResourcesResult {
        return $this->deleteStackResourcesAsync(
            $request
        )->wait();
    }

    /**
     * スタックを最終削除<br>
     *   <br>
     *   スタックのエンティティを削除します。<br>
     *   リソースの残っているスタックを削除しようとするとエラーになります。<br>
     *
     * @param DeleteStackEntityRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteStackEntityAsync(
            DeleteStackEntityRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteStackEntityTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタックを最終削除<br>
     *   <br>
     *   スタックのエンティティを削除します。<br>
     *   リソースの残っているスタックを削除しようとするとエラーになります。<br>
     *
     * @param DeleteStackEntityRequest $request リクエストパラメータ
     * @return DeleteStackEntityResult
     */
    public function deleteStackEntity (
            DeleteStackEntityRequest $request
    ): DeleteStackEntityResult {
        return $this->deleteStackEntityAsync(
            $request
        )->wait();
    }

    /**
     * 作成されたのリソースの一覧を取得<br>
     *
     * @param DescribeResourcesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeResourcesAsync(
            DescribeResourcesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeResourcesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 作成されたのリソースの一覧を取得<br>
     *
     * @param DescribeResourcesRequest $request リクエストパラメータ
     * @return DescribeResourcesResult
     */
    public function describeResources (
            DescribeResourcesRequest $request
    ): DescribeResourcesResult {
        return $this->describeResourcesAsync(
            $request
        )->wait();
    }

    /**
     * 作成されたのリソースを取得<br>
     *
     * @param GetResourceRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getResourceAsync(
            GetResourceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetResourceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 作成されたのリソースを取得<br>
     *
     * @param GetResourceRequest $request リクエストパラメータ
     * @return GetResourceResult
     */
    public function getResource (
            GetResourceRequest $request
    ): GetResourceResult {
        return $this->getResourceAsync(
            $request
        )->wait();
    }

    /**
     * 発生したイベントの一覧を取得<br>
     *
     * @param DescribeEventsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeEventsAsync(
            DescribeEventsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEventsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 発生したイベントの一覧を取得<br>
     *
     * @param DescribeEventsRequest $request リクエストパラメータ
     * @return DescribeEventsResult
     */
    public function describeEvents (
            DescribeEventsRequest $request
    ): DescribeEventsResult {
        return $this->describeEventsAsync(
            $request
        )->wait();
    }

    /**
     * 発生したイベントを取得<br>
     *
     * @param GetEventRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getEventAsync(
            GetEventRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEventTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 発生したイベントを取得<br>
     *
     * @param GetEventRequest $request リクエストパラメータ
     * @return GetEventResult
     */
    public function getEvent (
            GetEventRequest $request
    ): GetEventResult {
        return $this->getEventAsync(
            $request
        )->wait();
    }

    /**
     * アウトプットの一覧を取得<br>
     *
     * @param DescribeOutputsRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * アウトプットの一覧を取得<br>
     *
     * @param DescribeOutputsRequest $request リクエストパラメータ
     * @return DescribeOutputsResult
     */
    public function describeOutputs (
            DescribeOutputsRequest $request
    ): DescribeOutputsResult {
        return $this->describeOutputsAsync(
            $request
        )->wait();
    }

    /**
     * アウトプットを取得<br>
     *
     * @param GetOutputRequest $request リクエストパラメータ
     * @return PromiseInterface
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
     * アウトプットを取得<br>
     *
     * @param GetOutputRequest $request リクエストパラメータ
     * @return GetOutputResult
     */
    public function getOutput (
            GetOutputRequest $request
    ): GetOutputResult {
        return $this->getOutputAsync(
            $request
        )->wait();
    }
}