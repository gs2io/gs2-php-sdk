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

namespace Gs2\Distributor;

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
use Gs2\Distributor\Request\DescribeNamespacesRequest;
use Gs2\Distributor\Result\DescribeNamespacesResult;
use Gs2\Distributor\Request\CreateNamespaceRequest;
use Gs2\Distributor\Result\CreateNamespaceResult;
use Gs2\Distributor\Request\GetNamespaceStatusRequest;
use Gs2\Distributor\Result\GetNamespaceStatusResult;
use Gs2\Distributor\Request\GetNamespaceRequest;
use Gs2\Distributor\Result\GetNamespaceResult;
use Gs2\Distributor\Request\UpdateNamespaceRequest;
use Gs2\Distributor\Result\UpdateNamespaceResult;
use Gs2\Distributor\Request\DeleteNamespaceRequest;
use Gs2\Distributor\Result\DeleteNamespaceResult;
use Gs2\Distributor\Request\DescribeDistributorModelMastersRequest;
use Gs2\Distributor\Result\DescribeDistributorModelMastersResult;
use Gs2\Distributor\Request\CreateDistributorModelMasterRequest;
use Gs2\Distributor\Result\CreateDistributorModelMasterResult;
use Gs2\Distributor\Request\GetDistributorModelMasterRequest;
use Gs2\Distributor\Result\GetDistributorModelMasterResult;
use Gs2\Distributor\Request\UpdateDistributorModelMasterRequest;
use Gs2\Distributor\Result\UpdateDistributorModelMasterResult;
use Gs2\Distributor\Request\DeleteDistributorModelMasterRequest;
use Gs2\Distributor\Result\DeleteDistributorModelMasterResult;
use Gs2\Distributor\Request\DescribeDistributorModelsRequest;
use Gs2\Distributor\Result\DescribeDistributorModelsResult;
use Gs2\Distributor\Request\GetDistributorModelRequest;
use Gs2\Distributor\Result\GetDistributorModelResult;
use Gs2\Distributor\Request\ExportMasterRequest;
use Gs2\Distributor\Result\ExportMasterResult;
use Gs2\Distributor\Request\GetCurrentDistributorMasterRequest;
use Gs2\Distributor\Result\GetCurrentDistributorMasterResult;
use Gs2\Distributor\Request\UpdateCurrentDistributorMasterRequest;
use Gs2\Distributor\Result\UpdateCurrentDistributorMasterResult;
use Gs2\Distributor\Request\UpdateCurrentDistributorMasterFromGitHubRequest;
use Gs2\Distributor\Result\UpdateCurrentDistributorMasterFromGitHubResult;
use Gs2\Distributor\Request\DistributeRequest;
use Gs2\Distributor\Result\DistributeResult;
use Gs2\Distributor\Request\DistributeWithoutOverflowProcessRequest;
use Gs2\Distributor\Result\DistributeWithoutOverflowProcessResult;
use Gs2\Distributor\Request\RunStampTaskRequest;
use Gs2\Distributor\Result\RunStampTaskResult;
use Gs2\Distributor\Request\RunStampSheetRequest;
use Gs2\Distributor\Result\RunStampSheetResult;
use Gs2\Distributor\Request\RunStampTaskWithoutNamespaceRequest;
use Gs2\Distributor\Result\RunStampTaskWithoutNamespaceResult;
use Gs2\Distributor\Request\RunStampSheetWithoutNamespaceRequest;
use Gs2\Distributor\Result\RunStampSheetWithoutNamespaceResult;

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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getAssumeUserId() != null) {
            $json["assumeUserId"] = $this->request->getAssumeUserId();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getAssumeUserId() != null) {
            $json["assumeUserId"] = $this->request->getAssumeUserId();
        }
        if ($this->request->getLogSetting() != null) {
            $json["logSetting"] = $this->request->getLogSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeDistributorModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDistributorModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDistributorModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDistributorModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDistributorModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDistributorModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/distributor";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getPageToken() != null) {
            $queryStrings["pageToken"] = $this->request->getPageToken();
        }
        if ($this->request->getLimit() != null) {
            $queryStrings["limit"] = $this->request->getLimit();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class CreateDistributorModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateDistributorModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateDistributorModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateDistributorModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateDistributorModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateDistributorModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/distributor";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getInboxNamespaceId() != null) {
            $json["inboxNamespaceId"] = $this->request->getInboxNamespaceId();
        }
        if ($this->request->getWhiteListTargetIds() != null) {
            $array = [];
            foreach ($this->request->getWhiteListTargetIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListTargetIds"] = $array;
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetDistributorModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetDistributorModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDistributorModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetDistributorModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDistributorModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetDistributorModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/distributor/{distributorName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() == null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateDistributorModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateDistributorModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateDistributorModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateDistributorModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateDistributorModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateDistributorModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/distributor/{distributorName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() == null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getInboxNamespaceId() != null) {
            $json["inboxNamespaceId"] = $this->request->getInboxNamespaceId();
        }
        if ($this->request->getWhiteListTargetIds() != null) {
            $array = [];
            foreach ($this->request->getWhiteListTargetIds() as $item)
            {
                array_push($array, $item);
            }
            $json["whiteListTargetIds"] = $array;
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DeleteDistributorModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteDistributorModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteDistributorModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteDistributorModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteDistributorModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteDistributorModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/distributor/{distributorName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() == null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("DELETE")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DescribeDistributorModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDistributorModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDistributorModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDistributorModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDistributorModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDistributorModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/distributor";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetDistributorModelTask extends Gs2RestSessionTask {

    /**
     * @var GetDistributorModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDistributorModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetDistributorModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDistributorModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetDistributorModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/distributor/{distributorName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() == null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
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

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/export";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class GetCurrentDistributorMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentDistributorMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentDistributorMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentDistributorMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentDistributorMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentDistributorMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setMethod("GET")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateCurrentDistributorMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentDistributorMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentDistributorMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentDistributorMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentDistributorMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentDistributorMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getSettings() != null) {
            $json["settings"] = $this->request->getSettings();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class UpdateCurrentDistributorMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentDistributorMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentDistributorMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentDistributorMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentDistributorMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentDistributorMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/from_git_hub";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getCheckoutSetting() != null) {
            $json["checkoutSetting"] = $this->request->getCheckoutSetting()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("PUT")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }

        return parent::executeImpl();
    }
}

class DistributeTask extends Gs2RestSessionTask {

    /**
     * @var DistributeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DistributeTask constructor.
     * @param Gs2RestSession $session
     * @param DistributeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DistributeRequest $request
    ) {
        parent::__construct(
            $session,
            DistributeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/distribute";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{distributorName}", $this->request->getDistributorName() == null|| strlen($this->request->getDistributorName()) == 0 ? "null" : $this->request->getDistributorName(), $url);

        $json = [];
        if ($this->request->getDistributeResource() != null) {
            $json["distributeResource"] = $this->request->getDistributeResource()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DistributeWithoutOverflowProcessTask extends Gs2RestSessionTask {

    /**
     * @var DistributeWithoutOverflowProcessRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DistributeWithoutOverflowProcessTask constructor.
     * @param Gs2RestSession $session
     * @param DistributeWithoutOverflowProcessRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DistributeWithoutOverflowProcessRequest $request
    ) {
        parent::__construct(
            $session,
            DistributeWithoutOverflowProcessResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/distribute";

        $json = [];
        if ($this->request->getDistributeResource() != null) {
            $json["distributeResource"] = $this->request->getDistributeResource()->toJson();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class RunStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var RunStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/distribute/stamp/task/run";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getStampTask() != null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class RunStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var RunStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/distribute/stamp/sheet/run";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getStampSheet() != null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class RunStampTaskWithoutNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var RunStampTaskWithoutNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampTaskWithoutNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampTaskWithoutNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampTaskWithoutNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampTaskWithoutNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/stamp/task/run";

        $json = [];
        if ($this->request->getStampTask() != null) {
            $json["stampTask"] = $this->request->getStampTask();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class RunStampSheetWithoutNamespaceTask extends Gs2RestSessionTask {

    /**
     * @var RunStampSheetWithoutNamespaceRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunStampSheetWithoutNamespaceTask constructor.
     * @param Gs2RestSession $session
     * @param RunStampSheetWithoutNamespaceRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunStampSheetWithoutNamespaceRequest $request
    ) {
        parent::__construct(
            $session,
            RunStampSheetWithoutNamespaceResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "distributor", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/distribute/stamp/sheet/run";

        $json = [];
        if ($this->request->getStampSheet() != null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getContextStack() != null) {
            $json["contextStack"] = $this->request->getContextStack();
        }

        $this->builder->setBody($json);

        $this->builder->setMethod("POST")
            ->setUrl($url)
            ->setHeader("Content-Type", "application/json")
            ->setHttpResponseHandler($this);

        if ($this->request->getRequestId() != null) {
            $this->builder->setHeader("X-GS2-REQUEST-ID", $this->request->getRequestId());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

/**
 * GS2 Distributor API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2DistributorRestClient extends AbstractGs2Client {

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
     * ネームスペースの状態を取得<br>
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
     * ネームスペースの状態を取得<br>
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
     * 配信設定マスターの一覧を取得<br>
     *
     * @param DescribeDistributorModelMastersRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeDistributorModelMastersAsync(
            DescribeDistributorModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDistributorModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 配信設定マスターの一覧を取得<br>
     *
     * @param DescribeDistributorModelMastersRequest $request リクエストパラメータ
     * @return DescribeDistributorModelMastersResult
     */
    public function describeDistributorModelMasters (
            DescribeDistributorModelMastersRequest $request
    ): DescribeDistributorModelMastersResult {
        return $this->describeDistributorModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * 配信設定マスターを新規作成<br>
     *
     * @param CreateDistributorModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createDistributorModelMasterAsync(
            CreateDistributorModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateDistributorModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 配信設定マスターを新規作成<br>
     *
     * @param CreateDistributorModelMasterRequest $request リクエストパラメータ
     * @return CreateDistributorModelMasterResult
     */
    public function createDistributorModelMaster (
            CreateDistributorModelMasterRequest $request
    ): CreateDistributorModelMasterResult {
        return $this->createDistributorModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * 配信設定マスターを取得<br>
     *
     * @param GetDistributorModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getDistributorModelMasterAsync(
            GetDistributorModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDistributorModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 配信設定マスターを取得<br>
     *
     * @param GetDistributorModelMasterRequest $request リクエストパラメータ
     * @return GetDistributorModelMasterResult
     */
    public function getDistributorModelMaster (
            GetDistributorModelMasterRequest $request
    ): GetDistributorModelMasterResult {
        return $this->getDistributorModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * 配信設定マスターを更新<br>
     *
     * @param UpdateDistributorModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateDistributorModelMasterAsync(
            UpdateDistributorModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateDistributorModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 配信設定マスターを更新<br>
     *
     * @param UpdateDistributorModelMasterRequest $request リクエストパラメータ
     * @return UpdateDistributorModelMasterResult
     */
    public function updateDistributorModelMaster (
            UpdateDistributorModelMasterRequest $request
    ): UpdateDistributorModelMasterResult {
        return $this->updateDistributorModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * 配信設定マスターを削除<br>
     *
     * @param DeleteDistributorModelMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteDistributorModelMasterAsync(
            DeleteDistributorModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteDistributorModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 配信設定マスターを削除<br>
     *
     * @param DeleteDistributorModelMasterRequest $request リクエストパラメータ
     * @return DeleteDistributorModelMasterResult
     */
    public function deleteDistributorModelMaster (
            DeleteDistributorModelMasterRequest $request
    ): DeleteDistributorModelMasterResult {
        return $this->deleteDistributorModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * 配信設定の一覧を取得<br>
     *
     * @param DescribeDistributorModelsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeDistributorModelsAsync(
            DescribeDistributorModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDistributorModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 配信設定の一覧を取得<br>
     *
     * @param DescribeDistributorModelsRequest $request リクエストパラメータ
     * @return DescribeDistributorModelsResult
     */
    public function describeDistributorModels (
            DescribeDistributorModelsRequest $request
    ): DescribeDistributorModelsResult {
        return $this->describeDistributorModelsAsync(
            $request
        )->wait();
    }

    /**
     * 配信設定を取得<br>
     *
     * @param GetDistributorModelRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getDistributorModelAsync(
            GetDistributorModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDistributorModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 配信設定を取得<br>
     *
     * @param GetDistributorModelRequest $request リクエストパラメータ
     * @return GetDistributorModelResult
     */
    public function getDistributorModel (
            GetDistributorModelRequest $request
    ): GetDistributorModelResult {
        return $this->getDistributorModelAsync(
            $request
        )->wait();
    }

    /**
     * 現在有効な配信設定のマスターデータをエクスポートします<br>
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
     * 現在有効な配信設定のマスターデータをエクスポートします<br>
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
     * 現在有効な配信設定を取得します<br>
     *
     * @param GetCurrentDistributorMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getCurrentDistributorMasterAsync(
            GetCurrentDistributorMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentDistributorMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効な配信設定を取得します<br>
     *
     * @param GetCurrentDistributorMasterRequest $request リクエストパラメータ
     * @return GetCurrentDistributorMasterResult
     */
    public function getCurrentDistributorMaster (
            GetCurrentDistributorMasterRequest $request
    ): GetCurrentDistributorMasterResult {
        return $this->getCurrentDistributorMasterAsync(
            $request
        )->wait();
    }

    /**
     * 現在有効な配信設定を更新します<br>
     *
     * @param UpdateCurrentDistributorMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateCurrentDistributorMasterAsync(
            UpdateCurrentDistributorMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentDistributorMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効な配信設定を更新します<br>
     *
     * @param UpdateCurrentDistributorMasterRequest $request リクエストパラメータ
     * @return UpdateCurrentDistributorMasterResult
     */
    public function updateCurrentDistributorMaster (
            UpdateCurrentDistributorMasterRequest $request
    ): UpdateCurrentDistributorMasterResult {
        return $this->updateCurrentDistributorMasterAsync(
            $request
        )->wait();
    }

    /**
     * 現在有効な配信設定を更新します<br>
     *
     * @param UpdateCurrentDistributorMasterFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateCurrentDistributorMasterFromGitHubAsync(
            UpdateCurrentDistributorMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentDistributorMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効な配信設定を更新します<br>
     *
     * @param UpdateCurrentDistributorMasterFromGitHubRequest $request リクエストパラメータ
     * @return UpdateCurrentDistributorMasterFromGitHubResult
     */
    public function updateCurrentDistributorMasterFromGitHub (
            UpdateCurrentDistributorMasterFromGitHubRequest $request
    ): UpdateCurrentDistributorMasterFromGitHubResult {
        return $this->updateCurrentDistributorMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * 所持品を配布する<br>
     *
     * @param DistributeRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function distributeAsync(
            DistributeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DistributeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 所持品を配布する<br>
     *
     * @param DistributeRequest $request リクエストパラメータ
     * @return DistributeResult
     */
    public function distribute (
            DistributeRequest $request
    ): DistributeResult {
        return $this->distributeAsync(
            $request
        )->wait();
    }

    /**
     * 所持品を配布する(溢れた際の救済処置無し)<br>
     *
     * @param DistributeWithoutOverflowProcessRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function distributeWithoutOverflowProcessAsync(
            DistributeWithoutOverflowProcessRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DistributeWithoutOverflowProcessTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 所持品を配布する(溢れた際の救済処置無し)<br>
     *
     * @param DistributeWithoutOverflowProcessRequest $request リクエストパラメータ
     * @return DistributeWithoutOverflowProcessResult
     */
    public function distributeWithoutOverflowProcess (
            DistributeWithoutOverflowProcessRequest $request
    ): DistributeWithoutOverflowProcessResult {
        return $this->distributeWithoutOverflowProcessAsync(
            $request
        )->wait();
    }

    /**
     * スタンプシートのタスクを実行する<br>
     *
     * @param RunStampTaskRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function runStampTaskAsync(
            RunStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタンプシートのタスクを実行する<br>
     *
     * @param RunStampTaskRequest $request リクエストパラメータ
     * @return RunStampTaskResult
     */
    public function runStampTask (
            RunStampTaskRequest $request
    ): RunStampTaskResult {
        return $this->runStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * スタンプシートの完了を報告する<br>
     *
     * @param RunStampSheetRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function runStampSheetAsync(
            RunStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタンプシートの完了を報告する<br>
     *
     * @param RunStampSheetRequest $request リクエストパラメータ
     * @return RunStampSheetResult
     */
    public function runStampSheet (
            RunStampSheetRequest $request
    ): RunStampSheetResult {
        return $this->runStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * スタンプシートのタスクを実行する<br>
     *   <br>
     *   ネームスペースの指定を省略することで、<br>
     *   ログが記録できない・リソース溢れ処理が実行されないなどの副作用があります。<br>
     *
     * @param RunStampTaskWithoutNamespaceRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function runStampTaskWithoutNamespaceAsync(
            RunStampTaskWithoutNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampTaskWithoutNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタンプシートのタスクを実行する<br>
     *   <br>
     *   ネームスペースの指定を省略することで、<br>
     *   ログが記録できない・リソース溢れ処理が実行されないなどの副作用があります。<br>
     *
     * @param RunStampTaskWithoutNamespaceRequest $request リクエストパラメータ
     * @return RunStampTaskWithoutNamespaceResult
     */
    public function runStampTaskWithoutNamespace (
            RunStampTaskWithoutNamespaceRequest $request
    ): RunStampTaskWithoutNamespaceResult {
        return $this->runStampTaskWithoutNamespaceAsync(
            $request
        )->wait();
    }

    /**
     * スタンプシートの完了を報告する<br>
     *   <br>
     *   ネームスペースの指定を省略することで、<br>
     *   ログが記録できない・リソース溢れ処理が実行されないなどの副作用があります。<br>
     *
     * @param RunStampSheetWithoutNamespaceRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function runStampSheetWithoutNamespaceAsync(
            RunStampSheetWithoutNamespaceRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunStampSheetWithoutNamespaceTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタンプシートの完了を報告する<br>
     *   <br>
     *   ネームスペースの指定を省略することで、<br>
     *   ログが記録できない・リソース溢れ処理が実行されないなどの副作用があります。<br>
     *
     * @param RunStampSheetWithoutNamespaceRequest $request リクエストパラメータ
     * @return RunStampSheetWithoutNamespaceResult
     */
    public function runStampSheetWithoutNamespace (
            RunStampSheetWithoutNamespaceRequest $request
    ): RunStampSheetWithoutNamespaceResult {
        return $this->runStampSheetWithoutNamespaceAsync(
            $request
        )->wait();
    }
}