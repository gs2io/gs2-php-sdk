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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem";

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
        if ($this->request->getConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
        }
        if ($this->request->getAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem/{salesItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemName}", $this->request->getSalesItemName() === null|| strlen($this->request->getSalesItemName()) == 0 ? "null" : $this->request->getSalesItemName(), $url);

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem/{salesItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemName}", $this->request->getSalesItemName() === null|| strlen($this->request->getSalesItemName()) == 0 ? "null" : $this->request->getSalesItemName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getConsumeActions() !== null) {
            $array = [];
            foreach ($this->request->getConsumeActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeActions"] = $array;
        }
        if ($this->request->getAcquireActions() !== null) {
            $array = [];
            foreach ($this->request->getAcquireActions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireActions"] = $array;
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/salesItem/{salesItemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemName}", $this->request->getSalesItemName() === null|| strlen($this->request->getSalesItemName()) == 0 ? "null" : $this->request->getSalesItemName(), $url);

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group";

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
        if ($this->request->getSalesItemNames() !== null) {
            $array = [];
            foreach ($this->request->getSalesItemNames() as $item)
            {
                array_push($array, $item);
            }
            $json["salesItemNames"] = $array;
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{salesItemGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemGroupName}", $this->request->getSalesItemGroupName() === null|| strlen($this->request->getSalesItemGroupName()) == 0 ? "null" : $this->request->getSalesItemGroupName(), $url);

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{salesItemGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemGroupName}", $this->request->getSalesItemGroupName() === null|| strlen($this->request->getSalesItemGroupName()) == 0 ? "null" : $this->request->getSalesItemGroupName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getSalesItemNames() !== null) {
            $array = [];
            foreach ($this->request->getSalesItemNames() as $item)
            {
                array_push($array, $item);
            }
            $json["salesItemNames"] = $array;
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/group/{salesItemGroupName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{salesItemGroupName}", $this->request->getSalesItemGroupName() === null|| strlen($this->request->getSalesItemGroupName()) == 0 ? "null" : $this->request->getSalesItemGroupName(), $url);

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase";

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
        if ($this->request->getDisplayItems() !== null) {
            $array = [];
            foreach ($this->request->getDisplayItems() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["displayItems"] = $array;
        }
        if ($this->request->getSalesPeriodEventId() !== null) {
            $json["salesPeriodEventId"] = $this->request->getSalesPeriodEventId();
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getDisplayItems() !== null) {
            $array = [];
            foreach ($this->request->getDisplayItems() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["displayItems"] = $array;
        }
        if ($this->request->getSalesPeriodEventId() !== null) {
            $json["salesPeriodEventId"] = $this->request->getSalesPeriodEventId();
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/showcase";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/showcase";

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);

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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/showcase/{showcaseName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/showcase/{showcaseName}/{displayItemId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemId}", $this->request->getDisplayItemId() === null|| strlen($this->request->getDisplayItemId()) == 0 ? "null" : $this->request->getDisplayItemId(), $url);

        $json = [];
        if ($this->request->getConfig() !== null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
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

        $url = str_replace('{service}', "showcase", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/showcase/{showcaseName}/{displayItemId}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{showcaseName}", $this->request->getShowcaseName() === null|| strlen($this->request->getShowcaseName()) == 0 ? "null" : $this->request->getShowcaseName(), $url);
        $url = str_replace("{displayItemId}", $this->request->getDisplayItemId() === null|| strlen($this->request->getDisplayItemId()) == 0 ? "null" : $this->request->getDisplayItemId(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getConfig() !== null) {
            $array = [];
            foreach ($this->request->getConfig() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["config"] = $array;
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
     * @param DescribeSalesItemMastersRequest $request
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
     * @param DescribeSalesItemMastersRequest $request
     * @return DescribeSalesItemMastersResult
     */
    public function describeSalesItemMasters (
            DescribeSalesItemMastersRequest $request
    ): DescribeSalesItemMastersResult {
        return $this->describeSalesItemMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateSalesItemMasterRequest $request
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
     * @param CreateSalesItemMasterRequest $request
     * @return CreateSalesItemMasterResult
     */
    public function createSalesItemMaster (
            CreateSalesItemMasterRequest $request
    ): CreateSalesItemMasterResult {
        return $this->createSalesItemMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSalesItemMasterRequest $request
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
     * @param GetSalesItemMasterRequest $request
     * @return GetSalesItemMasterResult
     */
    public function getSalesItemMaster (
            GetSalesItemMasterRequest $request
    ): GetSalesItemMasterResult {
        return $this->getSalesItemMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateSalesItemMasterRequest $request
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
     * @param UpdateSalesItemMasterRequest $request
     * @return UpdateSalesItemMasterResult
     */
    public function updateSalesItemMaster (
            UpdateSalesItemMasterRequest $request
    ): UpdateSalesItemMasterResult {
        return $this->updateSalesItemMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteSalesItemMasterRequest $request
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
     * @param DeleteSalesItemMasterRequest $request
     * @return DeleteSalesItemMasterResult
     */
    public function deleteSalesItemMaster (
            DeleteSalesItemMasterRequest $request
    ): DeleteSalesItemMasterResult {
        return $this->deleteSalesItemMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSalesItemGroupMastersRequest $request
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
     * @param DescribeSalesItemGroupMastersRequest $request
     * @return DescribeSalesItemGroupMastersResult
     */
    public function describeSalesItemGroupMasters (
            DescribeSalesItemGroupMastersRequest $request
    ): DescribeSalesItemGroupMastersResult {
        return $this->describeSalesItemGroupMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateSalesItemGroupMasterRequest $request
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
     * @param CreateSalesItemGroupMasterRequest $request
     * @return CreateSalesItemGroupMasterResult
     */
    public function createSalesItemGroupMaster (
            CreateSalesItemGroupMasterRequest $request
    ): CreateSalesItemGroupMasterResult {
        return $this->createSalesItemGroupMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSalesItemGroupMasterRequest $request
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
     * @param GetSalesItemGroupMasterRequest $request
     * @return GetSalesItemGroupMasterResult
     */
    public function getSalesItemGroupMaster (
            GetSalesItemGroupMasterRequest $request
    ): GetSalesItemGroupMasterResult {
        return $this->getSalesItemGroupMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateSalesItemGroupMasterRequest $request
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
     * @param UpdateSalesItemGroupMasterRequest $request
     * @return UpdateSalesItemGroupMasterResult
     */
    public function updateSalesItemGroupMaster (
            UpdateSalesItemGroupMasterRequest $request
    ): UpdateSalesItemGroupMasterResult {
        return $this->updateSalesItemGroupMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteSalesItemGroupMasterRequest $request
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
     * @param DeleteSalesItemGroupMasterRequest $request
     * @return DeleteSalesItemGroupMasterResult
     */
    public function deleteSalesItemGroupMaster (
            DeleteSalesItemGroupMasterRequest $request
    ): DeleteSalesItemGroupMasterResult {
        return $this->deleteSalesItemGroupMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeShowcaseMastersRequest $request
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
     * @param DescribeShowcaseMastersRequest $request
     * @return DescribeShowcaseMastersResult
     */
    public function describeShowcaseMasters (
            DescribeShowcaseMastersRequest $request
    ): DescribeShowcaseMastersResult {
        return $this->describeShowcaseMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateShowcaseMasterRequest $request
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
     * @param CreateShowcaseMasterRequest $request
     * @return CreateShowcaseMasterResult
     */
    public function createShowcaseMaster (
            CreateShowcaseMasterRequest $request
    ): CreateShowcaseMasterResult {
        return $this->createShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetShowcaseMasterRequest $request
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
     * @param GetShowcaseMasterRequest $request
     * @return GetShowcaseMasterResult
     */
    public function getShowcaseMaster (
            GetShowcaseMasterRequest $request
    ): GetShowcaseMasterResult {
        return $this->getShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateShowcaseMasterRequest $request
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
     * @param UpdateShowcaseMasterRequest $request
     * @return UpdateShowcaseMasterResult
     */
    public function updateShowcaseMaster (
            UpdateShowcaseMasterRequest $request
    ): UpdateShowcaseMasterResult {
        return $this->updateShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteShowcaseMasterRequest $request
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
     * @param DeleteShowcaseMasterRequest $request
     * @return DeleteShowcaseMasterResult
     */
    public function deleteShowcaseMaster (
            DeleteShowcaseMasterRequest $request
    ): DeleteShowcaseMasterResult {
        return $this->deleteShowcaseMasterAsync(
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
     * @param GetCurrentShowcaseMasterRequest $request
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
     * @param GetCurrentShowcaseMasterRequest $request
     * @return GetCurrentShowcaseMasterResult
     */
    public function getCurrentShowcaseMaster (
            GetCurrentShowcaseMasterRequest $request
    ): GetCurrentShowcaseMasterResult {
        return $this->getCurrentShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentShowcaseMasterRequest $request
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
     * @param UpdateCurrentShowcaseMasterRequest $request
     * @return UpdateCurrentShowcaseMasterResult
     */
    public function updateCurrentShowcaseMaster (
            UpdateCurrentShowcaseMasterRequest $request
    ): UpdateCurrentShowcaseMasterResult {
        return $this->updateCurrentShowcaseMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentShowcaseMasterFromGitHubRequest $request
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
     * @param UpdateCurrentShowcaseMasterFromGitHubRequest $request
     * @return UpdateCurrentShowcaseMasterFromGitHubResult
     */
    public function updateCurrentShowcaseMasterFromGitHub (
            UpdateCurrentShowcaseMasterFromGitHubRequest $request
    ): UpdateCurrentShowcaseMasterFromGitHubResult {
        return $this->updateCurrentShowcaseMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeShowcasesRequest $request
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
     * @param DescribeShowcasesRequest $request
     * @return DescribeShowcasesResult
     */
    public function describeShowcases (
            DescribeShowcasesRequest $request
    ): DescribeShowcasesResult {
        return $this->describeShowcasesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeShowcasesByUserIdRequest $request
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
     * @param DescribeShowcasesByUserIdRequest $request
     * @return DescribeShowcasesByUserIdResult
     */
    public function describeShowcasesByUserId (
            DescribeShowcasesByUserIdRequest $request
    ): DescribeShowcasesByUserIdResult {
        return $this->describeShowcasesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetShowcaseRequest $request
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
     * @param GetShowcaseRequest $request
     * @return GetShowcaseResult
     */
    public function getShowcase (
            GetShowcaseRequest $request
    ): GetShowcaseResult {
        return $this->getShowcaseAsync(
            $request
        )->wait();
    }

    /**
     * @param GetShowcaseByUserIdRequest $request
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
     * @param GetShowcaseByUserIdRequest $request
     * @return GetShowcaseByUserIdResult
     */
    public function getShowcaseByUserId (
            GetShowcaseByUserIdRequest $request
    ): GetShowcaseByUserIdResult {
        return $this->getShowcaseByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param BuyRequest $request
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
     * @param BuyRequest $request
     * @return BuyResult
     */
    public function buy (
            BuyRequest $request
    ): BuyResult {
        return $this->buyAsync(
            $request
        )->wait();
    }

    /**
     * @param BuyByUserIdRequest $request
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
     * @param BuyByUserIdRequest $request
     * @return BuyByUserIdResult
     */
    public function buyByUserId (
            BuyByUserIdRequest $request
    ): BuyByUserIdResult {
        return $this->buyByUserIdAsync(
            $request
        )->wait();
    }
}