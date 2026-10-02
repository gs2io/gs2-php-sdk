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
use Gs2\Deploy\Request\GetServiceVersionRequest;
use Gs2\Deploy\Result\GetServiceVersionResult;
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

        $url = str_replace('{service}', "deploy", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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
 * GS2-Deploy API client
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/
 */
class Gs2DeployRestClient extends AbstractGs2Client {

	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * List Stacks
     *
     * @param DescribeStacksRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#describestacks
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
     * List Stacks
     *
     * @param DescribeStacksRequest $request
     * @return DescribeStacksResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#describestacks
     */
    public function describeStacks (
            DescribeStacksRequest $request
    ): DescribeStacksResult {
        return $this->describeStacksAsync(
            $request
        )->wait();
    }

    /**
     * Prepare to Create Stack (pre-upload)
     *
     * @param PreCreateStackRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#precreatestack
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
     * Prepare to Create Stack (pre-upload)
     *
     * @param PreCreateStackRequest $request
     * @return PreCreateStackResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#precreatestack
     */
    public function preCreateStack (
            PreCreateStackRequest $request
    ): PreCreateStackResult {
        return $this->preCreateStackAsync(
            $request
        )->wait();
    }

    /**
     * Create Stack
     *
     * @param CreateStackRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#createstack
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
     * Create Stack
     *
     * @param CreateStackRequest $request
     * @return CreateStackResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#createstack
     */
    public function createStack (
            CreateStackRequest $request
    ): CreateStackResult {
        return $this->createStackAsync(
            $request
        )->wait();
    }

    /**
     * Create Stack from GitHub
     *
     * @param CreateStackFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#createstackfromgithub
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
     * Create Stack from GitHub
     *
     * @param CreateStackFromGitHubRequest $request
     * @return CreateStackFromGitHubResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#createstackfromgithub
     */
    public function createStackFromGitHub (
            CreateStackFromGitHubRequest $request
    ): CreateStackFromGitHubResult {
        return $this->createStackFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * Prepare to validate Template (pre-upload)
     *
     * @param PreValidateRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#prevalidate
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
     * Prepare to validate Template (pre-upload)
     *
     * @param PreValidateRequest $request
     * @return PreValidateResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#prevalidate
     */
    public function preValidate (
            PreValidateRequest $request
    ): PreValidateResult {
        return $this->preValidateAsync(
            $request
        )->wait();
    }

    /**
     * Validate Template
     *
     * @param ValidateRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#validate
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
     * Validate Template
     *
     * @param ValidateRequest $request
     * @return ValidateResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#validate
     */
    public function validate (
            ValidateRequest $request
    ): ValidateResult {
        return $this->validateAsync(
            $request
        )->wait();
    }

    /**
     * Get Stack Status
     *
     * @param GetStackStatusRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getstackstatus
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
     * Get Stack Status
     *
     * @param GetStackStatusRequest $request
     * @return GetStackStatusResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getstackstatus
     */
    public function getStackStatus (
            GetStackStatusRequest $request
    ): GetStackStatusResult {
        return $this->getStackStatusAsync(
            $request
        )->wait();
    }

    /**
     * Get Stack
     *
     * @param GetStackRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getstack
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
     * Get Stack
     *
     * @param GetStackRequest $request
     * @return GetStackResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getstack
     */
    public function getStack (
            GetStackRequest $request
    ): GetStackResult {
        return $this->getStackAsync(
            $request
        )->wait();
    }

    /**
     * Prepare to update Stack (pre-upload)
     *
     * @param PreUpdateStackRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#preupdatestack
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
     * Prepare to update Stack (pre-upload)
     *
     * @param PreUpdateStackRequest $request
     * @return PreUpdateStackResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#preupdatestack
     */
    public function preUpdateStack (
            PreUpdateStackRequest $request
    ): PreUpdateStackResult {
        return $this->preUpdateStackAsync(
            $request
        )->wait();
    }

    /**
     * Update Stack
     *
     * @param UpdateStackRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#updatestack
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
     * Update Stack
     *
     * @param UpdateStackRequest $request
     * @return UpdateStackResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#updatestack
     */
    public function updateStack (
            UpdateStackRequest $request
    ): UpdateStackResult {
        return $this->updateStackAsync(
            $request
        )->wait();
    }

    /**
     * Prepare to get Change Set (pre-upload)
     *
     * @param PreChangeSetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#prechangeset
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
     * Prepare to get Change Set (pre-upload)
     *
     * @param PreChangeSetRequest $request
     * @return PreChangeSetResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#prechangeset
     */
    public function preChangeSet (
            PreChangeSetRequest $request
    ): PreChangeSetResult {
        return $this->preChangeSetAsync(
            $request
        )->wait();
    }

    /**
     * Get Change Set
     *
     * @param ChangeSetRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#changeset-1
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
     * Get Change Set
     *
     * @param ChangeSetRequest $request
     * @return ChangeSetResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#changeset-1
     */
    public function changeSet (
            ChangeSetRequest $request
    ): ChangeSetResult {
        return $this->changeSetAsync(
            $request
        )->wait();
    }

    /**
     * Update Stack from GitHub
     *
     * @param UpdateStackFromGitHubRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#updatestackfromgithub
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
     * Update Stack from GitHub
     *
     * @param UpdateStackFromGitHubRequest $request
     * @return UpdateStackFromGitHubResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#updatestackfromgithub
     */
    public function updateStackFromGitHub (
            UpdateStackFromGitHubRequest $request
    ): UpdateStackFromGitHubResult {
        return $this->updateStackFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * Delete Stack
     *
     * @param DeleteStackRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#deletestack
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
     * Delete Stack
     *
     * @param DeleteStackRequest $request
     * @return DeleteStackResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#deletestack
     */
    public function deleteStack (
            DeleteStackRequest $request
    ): DeleteStackResult {
        return $this->deleteStackAsync(
            $request
        )->wait();
    }

    /**
     * Force delete Stack
     *
     * @param ForceDeleteStackRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#forcedeletestack
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
     * Force delete Stack
     *
     * @param ForceDeleteStackRequest $request
     * @return ForceDeleteStackResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#forcedeletestack
     */
    public function forceDeleteStack (
            ForceDeleteStackRequest $request
    ): ForceDeleteStackResult {
        return $this->forceDeleteStackAsync(
            $request
        )->wait();
    }

    /**
     * Delete Stack Resources
     *
     * @param DeleteStackResourcesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#deletestackresources
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
     * Delete Stack Resources
     *
     * @param DeleteStackResourcesRequest $request
     * @return DeleteStackResourcesResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#deletestackresources
     */
    public function deleteStackResources (
            DeleteStackResourcesRequest $request
    ): DeleteStackResourcesResult {
        return $this->deleteStackResourcesAsync(
            $request
        )->wait();
    }

    /**
     * Final Stack Deletion
     *
     * @param DeleteStackEntityRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#deletestackentity
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
     * Final Stack Deletion
     *
     * @param DeleteStackEntityRequest $request
     * @return DeleteStackEntityResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#deletestackentity
     */
    public function deleteStackEntity (
            DeleteStackEntityRequest $request
    ): DeleteStackEntityResult {
        return $this->deleteStackEntityAsync(
            $request
        )->wait();
    }

    /**
     * Get microservice version
     *
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getserviceversion
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
     * Get microservice version
     *
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getserviceversion
     */
    public function getServiceVersion (
            GetServiceVersionRequest $request
    ): GetServiceVersionResult {
        return $this->getServiceVersionAsync(
            $request
        )->wait();
    }

    /**
     * List Resources
     *
     * @param DescribeResourcesRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#describeresources
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
     * List Resources
     *
     * @param DescribeResourcesRequest $request
     * @return DescribeResourcesResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#describeresources
     */
    public function describeResources (
            DescribeResourcesRequest $request
    ): DescribeResourcesResult {
        return $this->describeResourcesAsync(
            $request
        )->wait();
    }

    /**
     * Get Resource
     *
     * @param GetResourceRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getresource
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
     * Get Resource
     *
     * @param GetResourceRequest $request
     * @return GetResourceResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getresource
     */
    public function getResource (
            GetResourceRequest $request
    ): GetResourceResult {
        return $this->getResourceAsync(
            $request
        )->wait();
    }

    /**
     * List Events
     *
     * @param DescribeEventsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#describeevents
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
     * List Events
     *
     * @param DescribeEventsRequest $request
     * @return DescribeEventsResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#describeevents
     */
    public function describeEvents (
            DescribeEventsRequest $request
    ): DescribeEventsResult {
        return $this->describeEventsAsync(
            $request
        )->wait();
    }

    /**
     * Get Event
     *
     * @param GetEventRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getevent
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
     * Get Event
     *
     * @param GetEventRequest $request
     * @return GetEventResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getevent
     */
    public function getEvent (
            GetEventRequest $request
    ): GetEventResult {
        return $this->getEventAsync(
            $request
        )->wait();
    }

    /**
     * List Outputs
     *
     * @param DescribeOutputsRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#describeoutputs
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
     * List Outputs
     *
     * @param DescribeOutputsRequest $request
     * @return DescribeOutputsResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#describeoutputs
     */
    public function describeOutputs (
            DescribeOutputsRequest $request
    ): DescribeOutputsResult {
        return $this->describeOutputsAsync(
            $request
        )->wait();
    }

    /**
     * Get Output
     *
     * @param GetOutputRequest $request
     * @return PromiseInterface
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getoutput
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
     * Get Output
     *
     * @param GetOutputRequest $request
     * @return GetOutputResult
     * @see https://docs.gs2.io/api_reference/deploy/sdk/#getoutput
     */
    public function getOutput (
            GetOutputRequest $request
    ): GetOutputResult {
        return $this->getOutputAsync(
            $request
        )->wait();
    }
}