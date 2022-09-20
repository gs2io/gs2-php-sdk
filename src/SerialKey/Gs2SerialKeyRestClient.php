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

namespace Gs2\SerialKey;

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


use Gs2\SerialKey\Request\DescribeNamespacesRequest;
use Gs2\SerialKey\Result\DescribeNamespacesResult;
use Gs2\SerialKey\Request\CreateNamespaceRequest;
use Gs2\SerialKey\Result\CreateNamespaceResult;
use Gs2\SerialKey\Request\GetNamespaceStatusRequest;
use Gs2\SerialKey\Result\GetNamespaceStatusResult;
use Gs2\SerialKey\Request\GetNamespaceRequest;
use Gs2\SerialKey\Result\GetNamespaceResult;
use Gs2\SerialKey\Request\UpdateNamespaceRequest;
use Gs2\SerialKey\Result\UpdateNamespaceResult;
use Gs2\SerialKey\Request\DeleteNamespaceRequest;
use Gs2\SerialKey\Result\DeleteNamespaceResult;
use Gs2\SerialKey\Request\DescribeIssueJobsRequest;
use Gs2\SerialKey\Result\DescribeIssueJobsResult;
use Gs2\SerialKey\Request\GetIssueJobRequest;
use Gs2\SerialKey\Result\GetIssueJobResult;
use Gs2\SerialKey\Request\IssueRequest;
use Gs2\SerialKey\Result\IssueResult;
use Gs2\SerialKey\Request\DescribeSerialCodesRequest;
use Gs2\SerialKey\Result\DescribeSerialCodesResult;
use Gs2\SerialKey\Request\UseRequest;
use Gs2\SerialKey\Result\UseResult;
use Gs2\SerialKey\Request\UseByUserIdRequest;
use Gs2\SerialKey\Result\UseByUserIdResult;
use Gs2\SerialKey\Request\UseByStampTaskRequest;
use Gs2\SerialKey\Result\UseByStampTaskResult;
use Gs2\SerialKey\Request\DescribeCampaignModelsRequest;
use Gs2\SerialKey\Result\DescribeCampaignModelsResult;
use Gs2\SerialKey\Request\GetCampaignModelRequest;
use Gs2\SerialKey\Result\GetCampaignModelResult;
use Gs2\SerialKey\Request\DescribeCampaignModelMastersRequest;
use Gs2\SerialKey\Result\DescribeCampaignModelMastersResult;
use Gs2\SerialKey\Request\CreateCampaignModelMasterRequest;
use Gs2\SerialKey\Result\CreateCampaignModelMasterResult;
use Gs2\SerialKey\Request\GetCampaignModelMasterRequest;
use Gs2\SerialKey\Result\GetCampaignModelMasterResult;
use Gs2\SerialKey\Request\UpdateCampaignModelMasterRequest;
use Gs2\SerialKey\Result\UpdateCampaignModelMasterResult;
use Gs2\SerialKey\Request\DeleteCampaignModelMasterRequest;
use Gs2\SerialKey\Result\DeleteCampaignModelMasterResult;
use Gs2\SerialKey\Request\ExportMasterRequest;
use Gs2\SerialKey\Result\ExportMasterResult;
use Gs2\SerialKey\Request\GetCurrentCampaignMasterRequest;
use Gs2\SerialKey\Result\GetCurrentCampaignMasterResult;
use Gs2\SerialKey\Request\UpdateCurrentCampaignMasterRequest;
use Gs2\SerialKey\Result\UpdateCurrentCampaignMasterResult;
use Gs2\SerialKey\Request\UpdateCurrentCampaignMasterFromGitHubRequest;
use Gs2\SerialKey\Result\UpdateCurrentCampaignMasterFromGitHubResult;

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeIssueJobsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeIssueJobsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeIssueJobsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeIssueJobsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeIssueJobsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeIssueJobsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}/issue";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

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

class GetIssueJobTask extends Gs2RestSessionTask {

    /**
     * @var GetIssueJobRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetIssueJobTask constructor.
     * @param Gs2RestSession $session
     * @param GetIssueJobRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetIssueJobRequest $request
    ) {
        parent::__construct(
            $session,
            GetIssueJobResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}/issue/{issueJobName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);
        $url = str_replace("{issueJobName}", $this->request->getIssueJobName() === null|| strlen($this->request->getIssueJobName()) == 0 ? "null" : $this->request->getIssueJobName(), $url);

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

class IssueTask extends Gs2RestSessionTask {

    /**
     * @var IssueRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * IssueTask constructor.
     * @param Gs2RestSession $session
     * @param IssueRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        IssueRequest $request
    ) {
        parent::__construct(
            $session,
            IssueResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

        $json = [];
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getIssueRequestCount() !== null) {
            $json["issueRequestCount"] = $this->request->getIssueRequestCount();
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

class DescribeSerialCodesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSerialCodesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSerialCodesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSerialCodesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSerialCodesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSerialCodesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}/issue/{issueJobName}/serialCode";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);
        $url = str_replace("{issueJobName}", $this->request->getIssueJobName() === null|| strlen($this->request->getIssueJobName()) == 0 ? "null" : $this->request->getIssueJobName(), $url);

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

class UseTask extends Gs2RestSessionTask {

    /**
     * @var UseRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UseTask constructor.
     * @param Gs2RestSession $session
     * @param UseRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UseRequest $request
    ) {
        parent::__construct(
            $session,
            UseResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/serialKey";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCode() !== null) {
            $json["code"] = $this->request->getCode();
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

class UseByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UseByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UseByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UseByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UseByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UseByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/serialKey";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCode() !== null) {
            $json["code"] = $this->request->getCode();
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

class UseByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var UseByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UseByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param UseByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UseByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            UseByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/serialKey/use";

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

class DescribeCampaignModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCampaignModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCampaignModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCampaignModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCampaignModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCampaignModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign";

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

class GetCampaignModelTask extends Gs2RestSessionTask {

    /**
     * @var GetCampaignModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCampaignModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetCampaignModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCampaignModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetCampaignModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

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

class DescribeCampaignModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeCampaignModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeCampaignModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeCampaignModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeCampaignModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeCampaignModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign";

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

class CreateCampaignModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateCampaignModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateCampaignModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateCampaignModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateCampaignModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateCampaignModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign";

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
        if ($this->request->getEnableCampaignCode() !== null) {
            $json["enableCampaignCode"] = $this->request->getEnableCampaignCode();
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

class GetCampaignModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCampaignModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCampaignModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCampaignModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCampaignModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCampaignModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

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

class UpdateCampaignModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCampaignModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCampaignModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCampaignModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCampaignModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCampaignModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getEnableCampaignCode() !== null) {
            $json["enableCampaignCode"] = $this->request->getEnableCampaignCode();
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

class DeleteCampaignModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteCampaignModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteCampaignModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteCampaignModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteCampaignModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteCampaignModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/campaign/{campaignModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{campaignModelName}", $this->request->getCampaignModelName() === null|| strlen($this->request->getCampaignModelName()) == 0 ? "null" : $this->request->getCampaignModelName(), $url);

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

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentCampaignMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentCampaignMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentCampaignMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentCampaignMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentCampaignMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentCampaignMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentCampaignMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentCampaignMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentCampaignMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentCampaignMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentCampaignMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentCampaignMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentCampaignMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentCampaignMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentCampaignMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentCampaignMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentCampaignMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentCampaignMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "serial-key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2 SerialKey API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2SerialKeyRestClient extends AbstractGs2Client {

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
     * @param DescribeIssueJobsRequest $request
     * @return PromiseInterface
     */
    public function describeIssueJobsAsync(
            DescribeIssueJobsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeIssueJobsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeIssueJobsRequest $request
     * @return DescribeIssueJobsResult
     */
    public function describeIssueJobs (
            DescribeIssueJobsRequest $request
    ): DescribeIssueJobsResult {
        return $this->describeIssueJobsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetIssueJobRequest $request
     * @return PromiseInterface
     */
    public function getIssueJobAsync(
            GetIssueJobRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetIssueJobTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetIssueJobRequest $request
     * @return GetIssueJobResult
     */
    public function getIssueJob (
            GetIssueJobRequest $request
    ): GetIssueJobResult {
        return $this->getIssueJobAsync(
            $request
        )->wait();
    }

    /**
     * @param IssueRequest $request
     * @return PromiseInterface
     */
    public function issueAsync(
            IssueRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new IssueTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param IssueRequest $request
     * @return IssueResult
     */
    public function issue (
            IssueRequest $request
    ): IssueResult {
        return $this->issueAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSerialCodesRequest $request
     * @return PromiseInterface
     */
    public function describeSerialCodesAsync(
            DescribeSerialCodesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSerialCodesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSerialCodesRequest $request
     * @return DescribeSerialCodesResult
     */
    public function describeSerialCodes (
            DescribeSerialCodesRequest $request
    ): DescribeSerialCodesResult {
        return $this->describeSerialCodesAsync(
            $request
        )->wait();
    }

    /**
     * @param UseRequest $request
     * @return PromiseInterface
     */
    public function useAsync(
            UseRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UseTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UseRequest $request
     * @return UseResult
     */
    public function use (
            UseRequest $request
    ): UseResult {
        return $this->useAsync(
            $request
        )->wait();
    }

    /**
     * @param UseByUserIdRequest $request
     * @return PromiseInterface
     */
    public function useByUserIdAsync(
            UseByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UseByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UseByUserIdRequest $request
     * @return UseByUserIdResult
     */
    public function useByUserId (
            UseByUserIdRequest $request
    ): UseByUserIdResult {
        return $this->useByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param UseByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function useByStampTaskAsync(
            UseByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UseByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UseByStampTaskRequest $request
     * @return UseByStampTaskResult
     */
    public function useByStampTask (
            UseByStampTaskRequest $request
    ): UseByStampTaskResult {
        return $this->useByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCampaignModelsRequest $request
     * @return PromiseInterface
     */
    public function describeCampaignModelsAsync(
            DescribeCampaignModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCampaignModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCampaignModelsRequest $request
     * @return DescribeCampaignModelsResult
     */
    public function describeCampaignModels (
            DescribeCampaignModelsRequest $request
    ): DescribeCampaignModelsResult {
        return $this->describeCampaignModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCampaignModelRequest $request
     * @return PromiseInterface
     */
    public function getCampaignModelAsync(
            GetCampaignModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCampaignModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCampaignModelRequest $request
     * @return GetCampaignModelResult
     */
    public function getCampaignModel (
            GetCampaignModelRequest $request
    ): GetCampaignModelResult {
        return $this->getCampaignModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeCampaignModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeCampaignModelMastersAsync(
            DescribeCampaignModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeCampaignModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeCampaignModelMastersRequest $request
     * @return DescribeCampaignModelMastersResult
     */
    public function describeCampaignModelMasters (
            DescribeCampaignModelMastersRequest $request
    ): DescribeCampaignModelMastersResult {
        return $this->describeCampaignModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateCampaignModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createCampaignModelMasterAsync(
            CreateCampaignModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateCampaignModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateCampaignModelMasterRequest $request
     * @return CreateCampaignModelMasterResult
     */
    public function createCampaignModelMaster (
            CreateCampaignModelMasterRequest $request
    ): CreateCampaignModelMasterResult {
        return $this->createCampaignModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetCampaignModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getCampaignModelMasterAsync(
            GetCampaignModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCampaignModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCampaignModelMasterRequest $request
     * @return GetCampaignModelMasterResult
     */
    public function getCampaignModelMaster (
            GetCampaignModelMasterRequest $request
    ): GetCampaignModelMasterResult {
        return $this->getCampaignModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCampaignModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCampaignModelMasterAsync(
            UpdateCampaignModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCampaignModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCampaignModelMasterRequest $request
     * @return UpdateCampaignModelMasterResult
     */
    public function updateCampaignModelMaster (
            UpdateCampaignModelMasterRequest $request
    ): UpdateCampaignModelMasterResult {
        return $this->updateCampaignModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteCampaignModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteCampaignModelMasterAsync(
            DeleteCampaignModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteCampaignModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteCampaignModelMasterRequest $request
     * @return DeleteCampaignModelMasterResult
     */
    public function deleteCampaignModelMaster (
            DeleteCampaignModelMasterRequest $request
    ): DeleteCampaignModelMasterResult {
        return $this->deleteCampaignModelMasterAsync(
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
     * @param GetCurrentCampaignMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentCampaignMasterAsync(
            GetCurrentCampaignMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentCampaignMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentCampaignMasterRequest $request
     * @return GetCurrentCampaignMasterResult
     */
    public function getCurrentCampaignMaster (
            GetCurrentCampaignMasterRequest $request
    ): GetCurrentCampaignMasterResult {
        return $this->getCurrentCampaignMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentCampaignMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentCampaignMasterAsync(
            UpdateCurrentCampaignMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentCampaignMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentCampaignMasterRequest $request
     * @return UpdateCurrentCampaignMasterResult
     */
    public function updateCurrentCampaignMaster (
            UpdateCurrentCampaignMasterRequest $request
    ): UpdateCurrentCampaignMasterResult {
        return $this->updateCurrentCampaignMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentCampaignMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentCampaignMasterFromGitHubAsync(
            UpdateCurrentCampaignMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentCampaignMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentCampaignMasterFromGitHubRequest $request
     * @return UpdateCurrentCampaignMasterFromGitHubResult
     */
    public function updateCurrentCampaignMasterFromGitHub (
            UpdateCurrentCampaignMasterFromGitHubRequest $request
    ): UpdateCurrentCampaignMasterFromGitHubResult {
        return $this->updateCurrentCampaignMasterFromGitHubAsync(
            $request
        )->wait();
    }
}