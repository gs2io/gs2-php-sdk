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
use Gs2\Deploy\Request\PreCreateStackRequest;
use Gs2\Deploy\Result\PreCreateStackResult;
use Gs2\Deploy\Request\CreateStackRequest;
use Gs2\Deploy\Result\CreateStackResult;
use Gs2\Deploy\Request\CreateStackFromGitHubRequest;
use Gs2\Deploy\Result\CreateStackFromGitHubResult;
use Gs2\Deploy\Request\PreValidateRequest;
use Gs2\Deploy\Result\PreValidateResult;
use Gs2\Deploy\Request\ValidateRequest;
use Gs2\Deploy\Result\ValidateResult;
use Gs2\Deploy\Request\GetStackStatusRequest;
use Gs2\Deploy\Result\GetStackStatusResult;
use Gs2\Deploy\Request\GetStackRequest;
use Gs2\Deploy\Result\GetStackResult;
use Gs2\Deploy\Request\PreUpdateStackRequest;
use Gs2\Deploy\Result\PreUpdateStackResult;
use Gs2\Deploy\Request\UpdateStackRequest;
use Gs2\Deploy\Result\UpdateStackResult;
use Gs2\Deploy\Request\PreChangeSetRequest;
use Gs2\Deploy\Result\PreChangeSetResult;
use Gs2\Deploy\Request\ChangeSetRequest;
use Gs2\Deploy\Result\ChangeSetResult;
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

class PreCreateStackTask extends Gs2RestSessionTask {

    /**
     * @var PreCreateStackRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreCreateStackTask constructor.
     * @param Gs2RestSession $session
     * @param PreCreateStackRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreCreateStackRequest $request
    ) {
        parent::__construct(
            $session,
            PreCreateStackResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/pre";

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
        if ($this->request->getTemplate() !== null) {
            $req = new PreCreateStackRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            $task = new PreCreateStackTask(
                $this->session,
                $req
            );
            /** @var PreCreateStackResult $res */
            $res = $this->session->execute($task)->wait();

            (new \GuzzleHttp\Client())
                ->put($res->getUploadUrl(), [
                    'timeout' => 60,
                    'body' => $this->request->getTemplate(),
                    'headers' => [
                        "Content-Type" => "application/json",
                    ],
                ]);
            $this->request = $this->request
                ->withMode("preUpload")
                ->withUploadToken($res->getUploadToken())
                ->withTemplate(null);
        }

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getTemplate() !== null) {
            $json["template"] = $this->request->getTemplate();
        }
        if ($this->request->getUploadToken() !== null) {
            $json["uploadToken"] = $this->request->getUploadToken();
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

class PreValidateTask extends Gs2RestSessionTask {

    /**
     * @var PreValidateRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreValidateTask constructor.
     * @param Gs2RestSession $session
     * @param PreValidateRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreValidateRequest $request
    ) {
        parent::__construct(
            $session,
            PreValidateResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/validate/pre";

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
        if ($this->request->getTemplate() !== null) {
            $req = new PreValidateRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            $task = new PreValidateTask(
                $this->session,
                $req
            );
            /** @var PreValidateResult $res */
            $res = $this->session->execute($task)->wait();

            (new \GuzzleHttp\Client())
                ->put($res->getUploadUrl(), [
                    'timeout' => 60,
                    'body' => $this->request->getTemplate(),
                    'headers' => [
                        "Content-Type" => "application/json",
                    ],
                ]);
            $this->request = $this->request
                ->withMode("preUpload")
                ->withUploadToken($res->getUploadToken())
                ->withTemplate(null);
        }

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/validate";

        $json = [];
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getTemplate() !== null) {
            $json["template"] = $this->request->getTemplate();
        }
        if ($this->request->getUploadToken() !== null) {
            $json["uploadToken"] = $this->request->getUploadToken();
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

class PreUpdateStackTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateStackRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateStackTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateStackRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateStackRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateStackResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/pre";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

        $json = [];
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
        if ($this->request->getTemplate() !== null) {
            $req = new PreUpdateStackRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getStackName() !== null) {
                $req->setStackName($this->request->getStackName());
            }
            $task = new PreUpdateStackTask(
                $this->session,
                $req
            );
            /** @var PreUpdateStackResult $res */
            $res = $this->session->execute($task)->wait();

            (new \GuzzleHttp\Client())
                ->put($res->getUploadUrl(), [
                    'timeout' => 60,
                    'body' => $this->request->getTemplate(),
                    'headers' => [
                        "Content-Type" => "application/json",
                    ],
                ]);
            $this->request = $this->request
                ->withMode("preUpload")
                ->withUploadToken($res->getUploadToken())
                ->withTemplate(null);
        }

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getTemplate() !== null) {
            $json["template"] = $this->request->getTemplate();
        }
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

class PreChangeSetTask extends Gs2RestSessionTask {

    /**
     * @var PreChangeSetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreChangeSetTask constructor.
     * @param Gs2RestSession $session
     * @param PreChangeSetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreChangeSetRequest $request
    ) {
        parent::__construct(
            $session,
            PreChangeSetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}/pre";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

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

class ChangeSetTask extends Gs2RestSessionTask {

    /**
     * @var ChangeSetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ChangeSetTask constructor.
     * @param Gs2RestSession $session
     * @param ChangeSetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ChangeSetRequest $request
    ) {
        parent::__construct(
            $session,
            ChangeSetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getTemplate() !== null) {
            $req = new PreChangeSetRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getStackName() !== null) {
                $req->setStackName($this->request->getStackName());
            }
            $task = new PreChangeSetTask(
                $this->session,
                $req
            );
            /** @var PreChangeSetResult $res */
            $res = $this->session->execute($task)->wait();

            (new \GuzzleHttp\Client())
                ->put($res->getUploadUrl(), [
                    'timeout' => 60,
                    'body' => $this->request->getTemplate(),
                    'headers' => [
                        "Content-Type" => "application/json",
                    ],
                ]);
            $this->request = $this->request
                ->withMode("preUpload")
                ->withUploadToken($res->getUploadToken())
                ->withTemplate(null);
        }

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stack/{stackName}";

        $url = str_replace("{stackName}", $this->request->getStackName() === null|| strlen($this->request->getStackName()) == 0 ? "null" : $this->request->getStackName(), $url);

        $json = [];
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getTemplate() !== null) {
            $json["template"] = $this->request->getTemplate();
        }
        if ($this->request->getUploadToken() !== null) {
            $json["uploadToken"] = $this->request->getUploadToken();
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
     * @param DescribeStacksRequest $request
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
     * @param DescribeStacksRequest $request
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
     * @param PreCreateStackRequest $request
     * @return PromiseInterface
     */
    public function preCreateStackAsync(
            PreCreateStackRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreCreateStackTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreCreateStackRequest $request
     * @return PreCreateStackResult
     */
    public function preCreateStack (
            PreCreateStackRequest $request
    ): PreCreateStackResult {
        return $this->preCreateStackAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateStackRequest $request
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
     * @param CreateStackRequest $request
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
     * @param CreateStackFromGitHubRequest $request
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
     * @param CreateStackFromGitHubRequest $request
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
     * @param PreValidateRequest $request
     * @return PromiseInterface
     */
    public function preValidateAsync(
            PreValidateRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreValidateTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreValidateRequest $request
     * @return PreValidateResult
     */
    public function preValidate (
            PreValidateRequest $request
    ): PreValidateResult {
        return $this->preValidateAsync(
            $request
        )->wait();
    }

    /**
     * @param ValidateRequest $request
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
     * @param ValidateRequest $request
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
     * @param GetStackStatusRequest $request
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
     * @param GetStackStatusRequest $request
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
     * @param GetStackRequest $request
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
     * @param GetStackRequest $request
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
     * @param PreUpdateStackRequest $request
     * @return PromiseInterface
     */
    public function preUpdateStackAsync(
            PreUpdateStackRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateStackTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreUpdateStackRequest $request
     * @return PreUpdateStackResult
     */
    public function preUpdateStack (
            PreUpdateStackRequest $request
    ): PreUpdateStackResult {
        return $this->preUpdateStackAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateStackRequest $request
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
     * @param UpdateStackRequest $request
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
     * @param PreChangeSetRequest $request
     * @return PromiseInterface
     */
    public function preChangeSetAsync(
            PreChangeSetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreChangeSetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreChangeSetRequest $request
     * @return PreChangeSetResult
     */
    public function preChangeSet (
            PreChangeSetRequest $request
    ): PreChangeSetResult {
        return $this->preChangeSetAsync(
            $request
        )->wait();
    }

    /**
     * @param ChangeSetRequest $request
     * @return PromiseInterface
     */
    public function changeSetAsync(
            ChangeSetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ChangeSetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ChangeSetRequest $request
     * @return ChangeSetResult
     */
    public function changeSet (
            ChangeSetRequest $request
    ): ChangeSetResult {
        return $this->changeSetAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateStackFromGitHubRequest $request
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
     * @param UpdateStackFromGitHubRequest $request
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
     * @param DeleteStackRequest $request
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
     * @param DeleteStackRequest $request
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
     * @param ForceDeleteStackRequest $request
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
     * @param ForceDeleteStackRequest $request
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
     * @param DeleteStackResourcesRequest $request
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
     * @param DeleteStackResourcesRequest $request
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
     * @param DeleteStackEntityRequest $request
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
     * @param DeleteStackEntityRequest $request
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
     * @param DescribeResourcesRequest $request
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
     * @param DescribeResourcesRequest $request
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
     * @param GetResourceRequest $request
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
     * @param GetResourceRequest $request
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
     * @param DescribeEventsRequest $request
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
     * @param DescribeEventsRequest $request
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
     * @param GetEventRequest $request
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
     * @param GetEventRequest $request
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
     * @param DescribeOutputsRequest $request
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
     * @param DescribeOutputsRequest $request
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
     * @param GetOutputRequest $request
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
     * @param GetOutputRequest $request
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