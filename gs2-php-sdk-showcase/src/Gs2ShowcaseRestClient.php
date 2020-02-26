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

namespace Gs2\Showcase;

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
use Gs2\Showcase\Request\DescribeNamespacesRequest;
use Gs2\Showcase\Result\DescribeNamespacesResult;
use Gs2\Showcase\Request\CreateNamespaceRequest;
use Gs2\Showcase\Result\CreateNamespaceResult;
use Gs2\Showcase\Request\GetNamespaceStatusRequest;
use Gs2\Showcase\Result\GetNamespaceStatusResult;
use Gs2\Showcase\Request\GetNamespaceRequest;
use Gs2\Showcase\Result\GetNamespaceResult;
use Gs2\Showcase\Request\UpdateNamespaceRequest;
use Gs2\Showcase\Result\UpdateNamespaceResult;
use Gs2\Showcase\Request\DeleteNamespaceRequest;
use Gs2\Showcase\Result\DeleteNamespaceResult;
use Gs2\Showcase\Request\DescribeSalesItemMastersRequest;
use Gs2\Showcase\Result\DescribeSalesItemMastersResult;
use Gs2\Showcase\Request\CreateSalesItemMasterRequest;
use Gs2\Showcase\Result\CreateSalesItemMasterResult;
use Gs2\Showcase\Request\GetSalesItemMasterRequest;
use Gs2\Showcase\Result\GetSalesItemMasterResult;
use Gs2\Showcase\Request\UpdateSalesItemMasterRequest;
use Gs2\Showcase\Result\UpdateSalesItemMasterResult;
use Gs2\Showcase\Request\DeleteSalesItemMasterRequest;
use Gs2\Showcase\Result\DeleteSalesItemMasterResult;
use Gs2\Showcase\Request\DescribeSalesItemGroupMastersRequest;
use Gs2\Showcase\Result\DescribeSalesItemGroupMastersResult;
use Gs2\Showcase\Request\CreateSalesItemGroupMasterRequest;
use Gs2\Showcase\Result\CreateSalesItemGroupMasterResult;
use Gs2\Showcase\Request\GetSalesItemGroupMasterRequest;
use Gs2\Showcase\Result\GetSalesItemGroupMasterResult;
use Gs2\Showcase\Request\UpdateSalesItemGroupMasterRequest;
use Gs2\Showcase\Result\UpdateSalesItemGroupMasterResult;
use Gs2\Showcase\Request\DeleteSalesItemGroupMasterRequest;
use Gs2\Showcase\Result\DeleteSalesItemGroupMasterResult;
use Gs2\Showcase\Request\DescribeShowcaseMastersRequest;
use Gs2\Showcase\Result\DescribeShowcaseMastersResult;
use Gs2\Showcase\Request\CreateShowcaseMasterRequest;
use Gs2\Showcase\Result\CreateShowcaseMasterResult;
use Gs2\Showcase\Request\GetShowcaseMasterRequest;
use Gs2\Showcase\Result\GetShowcaseMasterResult;
use Gs2\Showcase\Request\UpdateShowcaseMasterRequest;
use Gs2\Showcase\Result\UpdateShowcaseMasterResult;
use Gs2\Showcase\Request\DeleteShowcaseMasterRequest;
use Gs2\Showcase\Result\DeleteShowcaseMasterResult;
use Gs2\Showcase\Request\ExportMasterRequest;
use Gs2\Showcase\Result\ExportMasterResult;
use Gs2\Showcase\Request\GetCurrentShowcaseMasterRequest;
use Gs2\Showcase\Result\GetCurrentShowcaseMasterResult;
use Gs2\Showcase\Request\UpdateCurrentShowcaseMasterRequest;
use Gs2\Showcase\Result\UpdateCurrentShowcaseMasterResult;
use Gs2\Showcase\Request\UpdateCurrentShowcaseMasterFromGitHubRequest;
use Gs2\Showcase\Result\UpdateCurrentShowcaseMasterFromGitHubResult;
use Gs2\Showcase\Request\DescribeShowcasesRequest;
use Gs2\Showcase\Result\DescribeShowcasesResult;
use Gs2\Showcase\Request\DescribeShowcasesByUserIdRequest;
use Gs2\Showcase\Result\DescribeShowcasesByUserIdResult;
use Gs2\Showcase\Request\GetShowcaseRequest;
use Gs2\Showcase\Result\GetShowcaseResult;
use Gs2\Showcase\Request\GetShowcaseByUserIdRequest;
use Gs2\Showcase\Result\GetShowcaseByUserIdResult;
use Gs2\Showcase\Request\BuyRequest;
use Gs2\Showcase\Result\BuyResult;
use Gs2\Showcase\Request\BuyByUserIdRequest;
use Gs2\Showcase\Result\BuyByUserIdResult;

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getQueueNamespaceId() != null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getQueueNamespaceId() != null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

class DescribeSalesItemMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSalesItemMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSalesItemMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSalesItemMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSalesItemMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSalesItemMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/salesItem";

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

class CreateSalesItemMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateSalesItemMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateSalesItemMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateSalesItemMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateSalesItemMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateSalesItemMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/salesItem";

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
        if ($this->request->getConsumeActions() != null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
        }
        if ($this->request->getAcquireActions() != null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
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

class GetSalesItemMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetSalesItemMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSalesItemMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetSalesItemMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSalesItemMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetSalesItemMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/salesItem/{salesItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemName}", $this->request->getSalesItemName() == null|| strlen($this->request->getSalesItemName()) == 0 ? "null" : $this->request->getSalesItemName(), $url);

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

class UpdateSalesItemMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateSalesItemMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateSalesItemMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateSalesItemMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateSalesItemMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateSalesItemMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/salesItem/{salesItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemName}", $this->request->getSalesItemName() == null|| strlen($this->request->getSalesItemName()) == 0 ? "null" : $this->request->getSalesItemName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getConsumeActions() != null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
        }
        if ($this->request->getAcquireActions() != null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
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

class DeleteSalesItemMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSalesItemMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSalesItemMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSalesItemMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSalesItemMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSalesItemMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/salesItem/{salesItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemName}", $this->request->getSalesItemName() == null|| strlen($this->request->getSalesItemName()) == 0 ? "null" : $this->request->getSalesItemName(), $url);

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

class DescribeSalesItemGroupMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSalesItemGroupMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSalesItemGroupMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSalesItemGroupMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSalesItemGroupMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSalesItemGroupMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/group";

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

class CreateSalesItemGroupMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateSalesItemGroupMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateSalesItemGroupMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateSalesItemGroupMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateSalesItemGroupMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateSalesItemGroupMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/group";

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
        if ($this->request->getSalesItemNames() != null) {
            $array = [];
            foreach ($this->request->getSalesItemNames() as $item)
            {
                array_push($array, $item);
            }
            $json["salesItemNames"] = $array;
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

class GetSalesItemGroupMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetSalesItemGroupMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSalesItemGroupMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetSalesItemGroupMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSalesItemGroupMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetSalesItemGroupMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/group/{salesItemGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemGroupName}", $this->request->getSalesItemGroupName() == null|| strlen($this->request->getSalesItemGroupName()) == 0 ? "null" : $this->request->getSalesItemGroupName(), $url);

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

class UpdateSalesItemGroupMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateSalesItemGroupMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateSalesItemGroupMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateSalesItemGroupMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateSalesItemGroupMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateSalesItemGroupMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/group/{salesItemGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemGroupName}", $this->request->getSalesItemGroupName() == null|| strlen($this->request->getSalesItemGroupName()) == 0 ? "null" : $this->request->getSalesItemGroupName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getSalesItemNames() != null) {
            $array = [];
            foreach ($this->request->getSalesItemNames() as $item)
            {
                array_push($array, $item);
            }
            $json["salesItemNames"] = $array;
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

class DeleteSalesItemGroupMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSalesItemGroupMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSalesItemGroupMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSalesItemGroupMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSalesItemGroupMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSalesItemGroupMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/group/{salesItemGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemGroupName}", $this->request->getSalesItemGroupName() == null|| strlen($this->request->getSalesItemGroupName()) == 0 ? "null" : $this->request->getSalesItemGroupName(), $url);

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

class DescribeShowcaseMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeShowcaseMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeShowcaseMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeShowcaseMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeShowcaseMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeShowcaseMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/showcase";

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

class CreateShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/showcase";

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
        if ($this->request->getDisplayItems() != null) {
            $array = [];
            foreach ($this->request->getDisplayItems() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["displayItems"] = $array;
        }
        if ($this->request->getSalesPeriodEventId() != null) {
            $json["salesPeriodEventId"] = $this->request->getSalesPeriodEventId();
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

class GetShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() == null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

class UpdateShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() == null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDisplayItems() != null) {
            $array = [];
            foreach ($this->request->getDisplayItems() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["displayItems"] = $array;
        }
        if ($this->request->getSalesPeriodEventId() != null) {
            $json["salesPeriodEventId"] = $this->request->getSalesPeriodEventId();
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

class DeleteShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() == null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentShowcaseMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentShowcaseMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentShowcaseMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentShowcaseMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentShowcaseMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentShowcaseMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentShowcaseMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentShowcaseMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentShowcaseMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentShowcaseMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentShowcaseMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentShowcaseMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeShowcasesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeShowcasesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeShowcasesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeShowcasesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeShowcasesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeShowcasesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/showcase";

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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeShowcasesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeShowcasesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeShowcasesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeShowcasesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeShowcasesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeShowcasesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/showcase";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetShowcaseTask extends Gs2RestSessionTask {

    /**
     * @var GetShowcaseRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetShowcaseTask constructor.
     * @param Gs2RestSession $session
     * @param GetShowcaseRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetShowcaseRequest $request
    ) {
        parent::__construct(
            $session,
            GetShowcaseResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() == null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetShowcaseByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetShowcaseByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetShowcaseByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetShowcaseByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetShowcaseByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetShowcaseByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() == null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class BuyTask extends Gs2RestSessionTask {

    /**
     * @var BuyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * BuyTask constructor.
     * @param Gs2RestSession $session
     * @param BuyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        BuyRequest $request
    ) {
        parent::__construct(
            $session,
            BuyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/showcase/{showcaseName}/{displayItemId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() == null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemId}", $this->request->getDisplayItemId() == null|| strlen($this->request->getDisplayItemId()) == 0 ? "null" : $this->request->getDisplayItemId(), $url);

        $json = [];
        if ($this->request->getConfig() != null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
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

class BuyByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var BuyByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * BuyByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param BuyByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        BuyByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            BuyByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/showcase/{showcaseName}/{displayItemId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() == null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemId}", $this->request->getDisplayItemId() == null|| strlen($this->request->getDisplayItemId()) == 0 ? "null" : $this->request->getDisplayItemId(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getConfig() != null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
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
 * GS2 Showcase API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2ShowcaseRestClient extends AbstractGs2Client {

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

        $resultAsyncResult = [];
        $this->describeNamespacesAsync(
            $request
        )->then(
            function (DescribeNamespacesResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
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

        $resultAsyncResult = [];
        $this->createNamespaceAsync(
            $request
        )->then(
            function (CreateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
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

        $resultAsyncResult = [];
        $this->getNamespaceStatusAsync(
            $request
        )->then(
            function (GetNamespaceStatusResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
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

        $resultAsyncResult = [];
        $this->getNamespaceAsync(
            $request
        )->then(
            function (GetNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
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

        $resultAsyncResult = [];
        $this->updateNamespaceAsync(
            $request
        )->then(
            function (UpdateNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
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

        $resultAsyncResult = [];
        $this->deleteNamespaceAsync(
            $request
        )->then(
            function (DeleteNamespaceResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品マスターの一覧を取得<br>
     *
     * @param DescribeSalesItemMastersRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeSalesItemMastersAsync(
            DescribeSalesItemMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSalesItemMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品マスターの一覧を取得<br>
     *
     * @param DescribeSalesItemMastersRequest $request リクエストパラメータ
     * @return DescribeSalesItemMastersResult
     */
    public function describeSalesItemMasters (
            DescribeSalesItemMastersRequest $request
    ): DescribeSalesItemMastersResult {

        $resultAsyncResult = [];
        $this->describeSalesItemMastersAsync(
            $request
        )->then(
            function (DescribeSalesItemMastersResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品マスターを新規作成<br>
     *
     * @param CreateSalesItemMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createSalesItemMasterAsync(
            CreateSalesItemMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateSalesItemMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品マスターを新規作成<br>
     *
     * @param CreateSalesItemMasterRequest $request リクエストパラメータ
     * @return CreateSalesItemMasterResult
     */
    public function createSalesItemMaster (
            CreateSalesItemMasterRequest $request
    ): CreateSalesItemMasterResult {

        $resultAsyncResult = [];
        $this->createSalesItemMasterAsync(
            $request
        )->then(
            function (CreateSalesItemMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品マスターを取得<br>
     *
     * @param GetSalesItemMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getSalesItemMasterAsync(
            GetSalesItemMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSalesItemMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品マスターを取得<br>
     *
     * @param GetSalesItemMasterRequest $request リクエストパラメータ
     * @return GetSalesItemMasterResult
     */
    public function getSalesItemMaster (
            GetSalesItemMasterRequest $request
    ): GetSalesItemMasterResult {

        $resultAsyncResult = [];
        $this->getSalesItemMasterAsync(
            $request
        )->then(
            function (GetSalesItemMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品マスターを更新<br>
     *
     * @param UpdateSalesItemMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateSalesItemMasterAsync(
            UpdateSalesItemMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateSalesItemMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品マスターを更新<br>
     *
     * @param UpdateSalesItemMasterRequest $request リクエストパラメータ
     * @return UpdateSalesItemMasterResult
     */
    public function updateSalesItemMaster (
            UpdateSalesItemMasterRequest $request
    ): UpdateSalesItemMasterResult {

        $resultAsyncResult = [];
        $this->updateSalesItemMasterAsync(
            $request
        )->then(
            function (UpdateSalesItemMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品マスターを削除<br>
     *
     * @param DeleteSalesItemMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteSalesItemMasterAsync(
            DeleteSalesItemMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSalesItemMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品マスターを削除<br>
     *
     * @param DeleteSalesItemMasterRequest $request リクエストパラメータ
     * @return DeleteSalesItemMasterResult
     */
    public function deleteSalesItemMaster (
            DeleteSalesItemMasterRequest $request
    ): DeleteSalesItemMasterResult {

        $resultAsyncResult = [];
        $this->deleteSalesItemMasterAsync(
            $request
        )->then(
            function (DeleteSalesItemMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品グループマスターの一覧を取得<br>
     *
     * @param DescribeSalesItemGroupMastersRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeSalesItemGroupMastersAsync(
            DescribeSalesItemGroupMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSalesItemGroupMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品グループマスターの一覧を取得<br>
     *
     * @param DescribeSalesItemGroupMastersRequest $request リクエストパラメータ
     * @return DescribeSalesItemGroupMastersResult
     */
    public function describeSalesItemGroupMasters (
            DescribeSalesItemGroupMastersRequest $request
    ): DescribeSalesItemGroupMastersResult {

        $resultAsyncResult = [];
        $this->describeSalesItemGroupMastersAsync(
            $request
        )->then(
            function (DescribeSalesItemGroupMastersResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品グループマスターを新規作成<br>
     *
     * @param CreateSalesItemGroupMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createSalesItemGroupMasterAsync(
            CreateSalesItemGroupMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateSalesItemGroupMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品グループマスターを新規作成<br>
     *
     * @param CreateSalesItemGroupMasterRequest $request リクエストパラメータ
     * @return CreateSalesItemGroupMasterResult
     */
    public function createSalesItemGroupMaster (
            CreateSalesItemGroupMasterRequest $request
    ): CreateSalesItemGroupMasterResult {

        $resultAsyncResult = [];
        $this->createSalesItemGroupMasterAsync(
            $request
        )->then(
            function (CreateSalesItemGroupMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品グループマスターを取得<br>
     *
     * @param GetSalesItemGroupMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getSalesItemGroupMasterAsync(
            GetSalesItemGroupMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSalesItemGroupMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品グループマスターを取得<br>
     *
     * @param GetSalesItemGroupMasterRequest $request リクエストパラメータ
     * @return GetSalesItemGroupMasterResult
     */
    public function getSalesItemGroupMaster (
            GetSalesItemGroupMasterRequest $request
    ): GetSalesItemGroupMasterResult {

        $resultAsyncResult = [];
        $this->getSalesItemGroupMasterAsync(
            $request
        )->then(
            function (GetSalesItemGroupMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品グループマスターを更新<br>
     *
     * @param UpdateSalesItemGroupMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateSalesItemGroupMasterAsync(
            UpdateSalesItemGroupMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateSalesItemGroupMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品グループマスターを更新<br>
     *
     * @param UpdateSalesItemGroupMasterRequest $request リクエストパラメータ
     * @return UpdateSalesItemGroupMasterResult
     */
    public function updateSalesItemGroupMaster (
            UpdateSalesItemGroupMasterRequest $request
    ): UpdateSalesItemGroupMasterResult {

        $resultAsyncResult = [];
        $this->updateSalesItemGroupMasterAsync(
            $request
        )->then(
            function (UpdateSalesItemGroupMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 商品グループマスターを削除<br>
     *
     * @param DeleteSalesItemGroupMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteSalesItemGroupMasterAsync(
            DeleteSalesItemGroupMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSalesItemGroupMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 商品グループマスターを削除<br>
     *
     * @param DeleteSalesItemGroupMasterRequest $request リクエストパラメータ
     * @return DeleteSalesItemGroupMasterResult
     */
    public function deleteSalesItemGroupMaster (
            DeleteSalesItemGroupMasterRequest $request
    ): DeleteSalesItemGroupMasterResult {

        $resultAsyncResult = [];
        $this->deleteSalesItemGroupMasterAsync(
            $request
        )->then(
            function (DeleteSalesItemGroupMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 陳列棚マスターの一覧を取得<br>
     *
     * @param DescribeShowcaseMastersRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeShowcaseMastersAsync(
            DescribeShowcaseMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeShowcaseMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 陳列棚マスターの一覧を取得<br>
     *
     * @param DescribeShowcaseMastersRequest $request リクエストパラメータ
     * @return DescribeShowcaseMastersResult
     */
    public function describeShowcaseMasters (
            DescribeShowcaseMastersRequest $request
    ): DescribeShowcaseMastersResult {

        $resultAsyncResult = [];
        $this->describeShowcaseMastersAsync(
            $request
        )->then(
            function (DescribeShowcaseMastersResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 陳列棚マスターを新規作成<br>
     *
     * @param CreateShowcaseMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function createShowcaseMasterAsync(
            CreateShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 陳列棚マスターを新規作成<br>
     *
     * @param CreateShowcaseMasterRequest $request リクエストパラメータ
     * @return CreateShowcaseMasterResult
     */
    public function createShowcaseMaster (
            CreateShowcaseMasterRequest $request
    ): CreateShowcaseMasterResult {

        $resultAsyncResult = [];
        $this->createShowcaseMasterAsync(
            $request
        )->then(
            function (CreateShowcaseMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 陳列棚マスターを取得<br>
     *
     * @param GetShowcaseMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getShowcaseMasterAsync(
            GetShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 陳列棚マスターを取得<br>
     *
     * @param GetShowcaseMasterRequest $request リクエストパラメータ
     * @return GetShowcaseMasterResult
     */
    public function getShowcaseMaster (
            GetShowcaseMasterRequest $request
    ): GetShowcaseMasterResult {

        $resultAsyncResult = [];
        $this->getShowcaseMasterAsync(
            $request
        )->then(
            function (GetShowcaseMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 陳列棚マスターを更新<br>
     *
     * @param UpdateShowcaseMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateShowcaseMasterAsync(
            UpdateShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 陳列棚マスターを更新<br>
     *
     * @param UpdateShowcaseMasterRequest $request リクエストパラメータ
     * @return UpdateShowcaseMasterResult
     */
    public function updateShowcaseMaster (
            UpdateShowcaseMasterRequest $request
    ): UpdateShowcaseMasterResult {

        $resultAsyncResult = [];
        $this->updateShowcaseMasterAsync(
            $request
        )->then(
            function (UpdateShowcaseMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 陳列棚マスターを削除<br>
     *
     * @param DeleteShowcaseMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteShowcaseMasterAsync(
            DeleteShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 陳列棚マスターを削除<br>
     *
     * @param DeleteShowcaseMasterRequest $request リクエストパラメータ
     * @return DeleteShowcaseMasterResult
     */
    public function deleteShowcaseMaster (
            DeleteShowcaseMasterRequest $request
    ): DeleteShowcaseMasterResult {

        $resultAsyncResult = [];
        $this->deleteShowcaseMasterAsync(
            $request
        )->then(
            function (DeleteShowcaseMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 現在有効な陳列棚マスターのマスターデータをエクスポートします<br>
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
     * 現在有効な陳列棚マスターのマスターデータをエクスポートします<br>
     *
     * @param ExportMasterRequest $request リクエストパラメータ
     * @return ExportMasterResult
     */
    public function exportMaster (
            ExportMasterRequest $request
    ): ExportMasterResult {

        $resultAsyncResult = [];
        $this->exportMasterAsync(
            $request
        )->then(
            function (ExportMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 現在有効な陳列棚マスターを取得します<br>
     *
     * @param GetCurrentShowcaseMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getCurrentShowcaseMasterAsync(
            GetCurrentShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効な陳列棚マスターを取得します<br>
     *
     * @param GetCurrentShowcaseMasterRequest $request リクエストパラメータ
     * @return GetCurrentShowcaseMasterResult
     */
    public function getCurrentShowcaseMaster (
            GetCurrentShowcaseMasterRequest $request
    ): GetCurrentShowcaseMasterResult {

        $resultAsyncResult = [];
        $this->getCurrentShowcaseMasterAsync(
            $request
        )->then(
            function (GetCurrentShowcaseMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 現在有効な陳列棚マスターを更新します<br>
     *
     * @param UpdateCurrentShowcaseMasterRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateCurrentShowcaseMasterAsync(
            UpdateCurrentShowcaseMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentShowcaseMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効な陳列棚マスターを更新します<br>
     *
     * @param UpdateCurrentShowcaseMasterRequest $request リクエストパラメータ
     * @return UpdateCurrentShowcaseMasterResult
     */
    public function updateCurrentShowcaseMaster (
            UpdateCurrentShowcaseMasterRequest $request
    ): UpdateCurrentShowcaseMasterResult {

        $resultAsyncResult = [];
        $this->updateCurrentShowcaseMasterAsync(
            $request
        )->then(
            function (UpdateCurrentShowcaseMasterResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 現在有効な陳列棚マスターを更新します<br>
     *
     * @param UpdateCurrentShowcaseMasterFromGitHubRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateCurrentShowcaseMasterFromGitHubAsync(
            UpdateCurrentShowcaseMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentShowcaseMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 現在有効な陳列棚マスターを更新します<br>
     *
     * @param UpdateCurrentShowcaseMasterFromGitHubRequest $request リクエストパラメータ
     * @return UpdateCurrentShowcaseMasterFromGitHubResult
     */
    public function updateCurrentShowcaseMasterFromGitHub (
            UpdateCurrentShowcaseMasterFromGitHubRequest $request
    ): UpdateCurrentShowcaseMasterFromGitHubResult {

        $resultAsyncResult = [];
        $this->updateCurrentShowcaseMasterFromGitHubAsync(
            $request
        )->then(
            function (UpdateCurrentShowcaseMasterFromGitHubResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 陳列棚の一覧を取得<br>
     *
     * @param DescribeShowcasesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeShowcasesAsync(
            DescribeShowcasesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeShowcasesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 陳列棚の一覧を取得<br>
     *
     * @param DescribeShowcasesRequest $request リクエストパラメータ
     * @return DescribeShowcasesResult
     */
    public function describeShowcases (
            DescribeShowcasesRequest $request
    ): DescribeShowcasesResult {

        $resultAsyncResult = [];
        $this->describeShowcasesAsync(
            $request
        )->then(
            function (DescribeShowcasesResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザIDを指定して陳列棚の一覧を取得<br>
     *
     * @param DescribeShowcasesByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeShowcasesByUserIdAsync(
            DescribeShowcasesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeShowcasesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定して陳列棚の一覧を取得<br>
     *
     * @param DescribeShowcasesByUserIdRequest $request リクエストパラメータ
     * @return DescribeShowcasesByUserIdResult
     */
    public function describeShowcasesByUserId (
            DescribeShowcasesByUserIdRequest $request
    ): DescribeShowcasesByUserIdResult {

        $resultAsyncResult = [];
        $this->describeShowcasesByUserIdAsync(
            $request
        )->then(
            function (DescribeShowcasesByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 陳列棚を取得<br>
     *
     * @param GetShowcaseRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getShowcaseAsync(
            GetShowcaseRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetShowcaseTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 陳列棚を取得<br>
     *
     * @param GetShowcaseRequest $request リクエストパラメータ
     * @return GetShowcaseResult
     */
    public function getShowcase (
            GetShowcaseRequest $request
    ): GetShowcaseResult {

        $resultAsyncResult = [];
        $this->getShowcaseAsync(
            $request
        )->then(
            function (GetShowcaseResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザIDを指定して陳列棚を取得<br>
     *
     * @param GetShowcaseByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getShowcaseByUserIdAsync(
            GetShowcaseByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetShowcaseByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定して陳列棚を取得<br>
     *
     * @param GetShowcaseByUserIdRequest $request リクエストパラメータ
     * @return GetShowcaseByUserIdResult
     */
    public function getShowcaseByUserId (
            GetShowcaseByUserIdRequest $request
    ): GetShowcaseByUserIdResult {

        $resultAsyncResult = [];
        $this->getShowcaseByUserIdAsync(
            $request
        )->then(
            function (GetShowcaseByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * 陳列棚を取得<br>
     *
     * @param BuyRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function buyAsync(
            BuyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new BuyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * 陳列棚を取得<br>
     *
     * @param BuyRequest $request リクエストパラメータ
     * @return BuyResult
     */
    public function buy (
            BuyRequest $request
    ): BuyResult {

        $resultAsyncResult = [];
        $this->buyAsync(
            $request
        )->then(
            function (BuyResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }

    /**
     * ユーザIDを指定して陳列棚を取得<br>
     *
     * @param BuyByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function buyByUserIdAsync(
            BuyByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new BuyByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定して陳列棚を取得<br>
     *
     * @param BuyByUserIdRequest $request リクエストパラメータ
     * @return BuyByUserIdResult
     */
    public function buyByUserId (
            BuyByUserIdRequest $request
    ): BuyByUserIdResult {

        $resultAsyncResult = [];
        $this->buyByUserIdAsync(
            $request
        )->then(
            function (BuyByUserIdResult $result) use (&$resultAsyncResult) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult($result, null)
                );
            },
            function (Gs2Exception $e) {
                array_push(
                    $resultAsyncResult,
                    new AsyncResult(null, $e)
                );
            }
        )->wait();

        if($resultAsyncResult[0]->getError() != null) {
            throw $resultAsyncResult[0]->getError();
        }

        return $resultAsyncResult[0]->getResult();
    }
}