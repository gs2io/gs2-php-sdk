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

namespace Gs2\Inventory;

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


use Gs2\Inventory\Request\DescribeNamespacesRequest;
use Gs2\Inventory\Result\DescribeNamespacesResult;
use Gs2\Inventory\Request\CreateNamespaceRequest;
use Gs2\Inventory\Result\CreateNamespaceResult;
use Gs2\Inventory\Request\GetNamespaceStatusRequest;
use Gs2\Inventory\Result\GetNamespaceStatusResult;
use Gs2\Inventory\Request\GetNamespaceRequest;
use Gs2\Inventory\Result\GetNamespaceResult;
use Gs2\Inventory\Request\UpdateNamespaceRequest;
use Gs2\Inventory\Result\UpdateNamespaceResult;
use Gs2\Inventory\Request\DeleteNamespaceRequest;
use Gs2\Inventory\Result\DeleteNamespaceResult;
use Gs2\Inventory\Request\DescribeInventoryModelMastersRequest;
use Gs2\Inventory\Result\DescribeInventoryModelMastersResult;
use Gs2\Inventory\Request\CreateInventoryModelMasterRequest;
use Gs2\Inventory\Result\CreateInventoryModelMasterResult;
use Gs2\Inventory\Request\GetInventoryModelMasterRequest;
use Gs2\Inventory\Result\GetInventoryModelMasterResult;
use Gs2\Inventory\Request\UpdateInventoryModelMasterRequest;
use Gs2\Inventory\Result\UpdateInventoryModelMasterResult;
use Gs2\Inventory\Request\DeleteInventoryModelMasterRequest;
use Gs2\Inventory\Result\DeleteInventoryModelMasterResult;
use Gs2\Inventory\Request\DescribeInventoryModelsRequest;
use Gs2\Inventory\Result\DescribeInventoryModelsResult;
use Gs2\Inventory\Request\GetInventoryModelRequest;
use Gs2\Inventory\Result\GetInventoryModelResult;
use Gs2\Inventory\Request\DescribeItemModelMastersRequest;
use Gs2\Inventory\Result\DescribeItemModelMastersResult;
use Gs2\Inventory\Request\CreateItemModelMasterRequest;
use Gs2\Inventory\Result\CreateItemModelMasterResult;
use Gs2\Inventory\Request\GetItemModelMasterRequest;
use Gs2\Inventory\Result\GetItemModelMasterResult;
use Gs2\Inventory\Request\UpdateItemModelMasterRequest;
use Gs2\Inventory\Result\UpdateItemModelMasterResult;
use Gs2\Inventory\Request\DeleteItemModelMasterRequest;
use Gs2\Inventory\Result\DeleteItemModelMasterResult;
use Gs2\Inventory\Request\DescribeItemModelsRequest;
use Gs2\Inventory\Result\DescribeItemModelsResult;
use Gs2\Inventory\Request\GetItemModelRequest;
use Gs2\Inventory\Result\GetItemModelResult;
use Gs2\Inventory\Request\ExportMasterRequest;
use Gs2\Inventory\Result\ExportMasterResult;
use Gs2\Inventory\Request\GetCurrentItemModelMasterRequest;
use Gs2\Inventory\Result\GetCurrentItemModelMasterResult;
use Gs2\Inventory\Request\UpdateCurrentItemModelMasterRequest;
use Gs2\Inventory\Result\UpdateCurrentItemModelMasterResult;
use Gs2\Inventory\Request\UpdateCurrentItemModelMasterFromGitHubRequest;
use Gs2\Inventory\Result\UpdateCurrentItemModelMasterFromGitHubResult;
use Gs2\Inventory\Request\DescribeInventoriesRequest;
use Gs2\Inventory\Result\DescribeInventoriesResult;
use Gs2\Inventory\Request\DescribeInventoriesByUserIdRequest;
use Gs2\Inventory\Result\DescribeInventoriesByUserIdResult;
use Gs2\Inventory\Request\GetInventoryRequest;
use Gs2\Inventory\Result\GetInventoryResult;
use Gs2\Inventory\Request\GetInventoryByUserIdRequest;
use Gs2\Inventory\Result\GetInventoryByUserIdResult;
use Gs2\Inventory\Request\AddCapacityByUserIdRequest;
use Gs2\Inventory\Result\AddCapacityByUserIdResult;
use Gs2\Inventory\Request\SetCapacityByUserIdRequest;
use Gs2\Inventory\Result\SetCapacityByUserIdResult;
use Gs2\Inventory\Request\DeleteInventoryByUserIdRequest;
use Gs2\Inventory\Result\DeleteInventoryByUserIdResult;
use Gs2\Inventory\Request\AddCapacityByStampSheetRequest;
use Gs2\Inventory\Result\AddCapacityByStampSheetResult;
use Gs2\Inventory\Request\SetCapacityByStampSheetRequest;
use Gs2\Inventory\Result\SetCapacityByStampSheetResult;
use Gs2\Inventory\Request\DescribeItemSetsRequest;
use Gs2\Inventory\Result\DescribeItemSetsResult;
use Gs2\Inventory\Request\DescribeItemSetsByUserIdRequest;
use Gs2\Inventory\Result\DescribeItemSetsByUserIdResult;
use Gs2\Inventory\Request\GetItemSetRequest;
use Gs2\Inventory\Result\GetItemSetResult;
use Gs2\Inventory\Request\GetItemSetByUserIdRequest;
use Gs2\Inventory\Result\GetItemSetByUserIdResult;
use Gs2\Inventory\Request\GetItemWithSignatureRequest;
use Gs2\Inventory\Result\GetItemWithSignatureResult;
use Gs2\Inventory\Request\GetItemWithSignatureByUserIdRequest;
use Gs2\Inventory\Result\GetItemWithSignatureByUserIdResult;
use Gs2\Inventory\Request\AcquireItemSetByUserIdRequest;
use Gs2\Inventory\Result\AcquireItemSetByUserIdResult;
use Gs2\Inventory\Request\ConsumeItemSetRequest;
use Gs2\Inventory\Result\ConsumeItemSetResult;
use Gs2\Inventory\Request\ConsumeItemSetByUserIdRequest;
use Gs2\Inventory\Result\ConsumeItemSetByUserIdResult;
use Gs2\Inventory\Request\DeleteItemSetByUserIdRequest;
use Gs2\Inventory\Result\DeleteItemSetByUserIdResult;
use Gs2\Inventory\Request\AcquireItemSetByStampSheetRequest;
use Gs2\Inventory\Result\AcquireItemSetByStampSheetResult;
use Gs2\Inventory\Request\ConsumeItemSetByStampTaskRequest;
use Gs2\Inventory\Result\ConsumeItemSetByStampTaskResult;
use Gs2\Inventory\Request\DescribeReferenceOfRequest;
use Gs2\Inventory\Result\DescribeReferenceOfResult;
use Gs2\Inventory\Request\DescribeReferenceOfByUserIdRequest;
use Gs2\Inventory\Result\DescribeReferenceOfByUserIdResult;
use Gs2\Inventory\Request\GetReferenceOfRequest;
use Gs2\Inventory\Result\GetReferenceOfResult;
use Gs2\Inventory\Request\GetReferenceOfByUserIdRequest;
use Gs2\Inventory\Result\GetReferenceOfByUserIdResult;
use Gs2\Inventory\Request\VerifyReferenceOfRequest;
use Gs2\Inventory\Result\VerifyReferenceOfResult;
use Gs2\Inventory\Request\VerifyReferenceOfByUserIdRequest;
use Gs2\Inventory\Result\VerifyReferenceOfByUserIdResult;
use Gs2\Inventory\Request\AddReferenceOfRequest;
use Gs2\Inventory\Result\AddReferenceOfResult;
use Gs2\Inventory\Request\AddReferenceOfByUserIdRequest;
use Gs2\Inventory\Result\AddReferenceOfByUserIdResult;
use Gs2\Inventory\Request\DeleteReferenceOfRequest;
use Gs2\Inventory\Result\DeleteReferenceOfResult;
use Gs2\Inventory\Request\DeleteReferenceOfByUserIdRequest;
use Gs2\Inventory\Result\DeleteReferenceOfByUserIdResult;
use Gs2\Inventory\Request\AddReferenceOfItemSetByStampSheetRequest;
use Gs2\Inventory\Result\AddReferenceOfItemSetByStampSheetResult;
use Gs2\Inventory\Request\DeleteReferenceOfItemSetByStampSheetRequest;
use Gs2\Inventory\Result\DeleteReferenceOfItemSetByStampSheetResult;
use Gs2\Inventory\Request\VerifyReferenceOfByStampTaskRequest;
use Gs2\Inventory\Result\VerifyReferenceOfByStampTaskResult;

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

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getAcquireScript() !== null) {
            $json["acquireScript"] = $this->request->getAcquireScript()->toJson();
        }
        if ($this->request->getOverflowScript() !== null) {
            $json["overflowScript"] = $this->request->getOverflowScript()->toJson();
        }
        if ($this->request->getConsumeScript() !== null) {
            $json["consumeScript"] = $this->request->getConsumeScript()->toJson();
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

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getAcquireScript() !== null) {
            $json["acquireScript"] = $this->request->getAcquireScript()->toJson();
        }
        if ($this->request->getOverflowScript() !== null) {
            $json["overflowScript"] = $this->request->getOverflowScript()->toJson();
        }
        if ($this->request->getConsumeScript() !== null) {
            $json["consumeScript"] = $this->request->getConsumeScript()->toJson();
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

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeInventoryModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeInventoryModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeInventoryModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeInventoryModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeInventoryModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeInventoryModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory";

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

class CreateInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory";

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
        if ($this->request->getInitialCapacity() !== null) {
            $json["initialCapacity"] = $this->request->getInitialCapacity();
        }
        if ($this->request->getMaxCapacity() !== null) {
            $json["maxCapacity"] = $this->request->getMaxCapacity();
        }
        if ($this->request->getProtectReferencedItem() !== null) {
            $json["protectReferencedItem"] = $this->request->getProtectReferencedItem();
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

class GetInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class UpdateInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getInitialCapacity() !== null) {
            $json["initialCapacity"] = $this->request->getInitialCapacity();
        }
        if ($this->request->getMaxCapacity() !== null) {
            $json["maxCapacity"] = $this->request->getMaxCapacity();
        }
        if ($this->request->getProtectReferencedItem() !== null) {
            $json["protectReferencedItem"] = $this->request->getProtectReferencedItem();
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

class DeleteInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class DescribeInventoryModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeInventoryModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeInventoryModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeInventoryModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeInventoryModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeInventoryModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/inventory";

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

class GetInventoryModelTask extends Gs2RestSessionTask {

    /**
     * @var GetInventoryModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetInventoryModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetInventoryModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetInventoryModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetInventoryModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class DescribeItemModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeItemModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeItemModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeItemModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeItemModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeItemModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory/{inventoryName}/item";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class CreateItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory/{inventoryName}/item";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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
        if ($this->request->getStackingLimit() !== null) {
            $json["stackingLimit"] = $this->request->getStackingLimit();
        }
        if ($this->request->getAllowMultipleStacks() !== null) {
            $json["allowMultipleStacks"] = $this->request->getAllowMultipleStacks();
        }
        if ($this->request->getSortValue() !== null) {
            $json["sortValue"] = $this->request->getSortValue();
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

class GetItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

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

class UpdateItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getStackingLimit() !== null) {
            $json["stackingLimit"] = $this->request->getStackingLimit();
        }
        if ($this->request->getAllowMultipleStacks() !== null) {
            $json["allowMultipleStacks"] = $this->request->getAllowMultipleStacks();
        }
        if ($this->request->getSortValue() !== null) {
            $json["sortValue"] = $this->request->getSortValue();
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

class DeleteItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

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

class DescribeItemModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeItemModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeItemModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeItemModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeItemModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeItemModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/inventory/{inventoryName}/item";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class GetItemModelTask extends Gs2RestSessionTask {

    /**
     * @var GetItemModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetItemModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetItemModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetItemModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetItemModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

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

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentItemModelMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentItemModelMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentItemModelMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentItemModelMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentItemModelMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentItemModelMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeInventoriesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeInventoriesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeInventoriesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeInventoriesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeInventoriesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeInventoriesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory";

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

        return parent::executeImpl();
    }
}

class DescribeInventoriesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeInventoriesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeInventoriesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeInventoriesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeInventoriesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeInventoriesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory";

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

        return parent::executeImpl();
    }
}

class GetInventoryTask extends Gs2RestSessionTask {

    /**
     * @var GetInventoryRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetInventoryTask constructor.
     * @param Gs2RestSession $session
     * @param GetInventoryRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetInventoryRequest $request
    ) {
        parent::__construct(
            $session,
            GetInventoryResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class GetInventoryByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetInventoryByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetInventoryByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetInventoryByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetInventoryByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetInventoryByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
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

class AddCapacityByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddCapacityByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddCapacityByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddCapacityByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddCapacityByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddCapacityByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/capacity";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getAddCapacityValue() !== null) {
            $json["addCapacityValue"] = $this->request->getAddCapacityValue();
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

class SetCapacityByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetCapacityByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetCapacityByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetCapacityByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetCapacityByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetCapacityByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/capacity";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getNewCapacityValue() !== null) {
            $json["newCapacityValue"] = $this->request->getNewCapacityValue();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteInventoryByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteInventoryByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteInventoryByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteInventoryByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteInventoryByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteInventoryByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
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

class AddCapacityByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AddCapacityByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddCapacityByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AddCapacityByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddCapacityByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AddCapacityByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/inventory/capacity/add";

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

        return parent::executeImpl();
    }
}

class SetCapacityByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetCapacityByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetCapacityByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetCapacityByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetCapacityByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetCapacityByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/inventory/capacity/set";

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

        return parent::executeImpl();
    }
}

class DescribeItemSetsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeItemSetsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeItemSetsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeItemSetsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeItemSetsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeItemSetsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

        return parent::executeImpl();
    }
}

class DescribeItemSetsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeItemSetsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeItemSetsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeItemSetsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeItemSetsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeItemSetsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
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

        return parent::executeImpl();
    }
}

class GetItemSetTask extends Gs2RestSessionTask {

    /**
     * @var GetItemSetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetItemSetTask constructor.
     * @param Gs2RestSession $session
     * @param GetItemSetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetItemSetRequest $request
    ) {
        parent::__construct(
            $session,
            GetItemSetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getItemSetName() !== null) {
            $queryStrings["itemSetName"] = $this->request->getItemSetName();
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

class GetItemSetByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetItemSetByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetItemSetByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetItemSetByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetItemSetByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetItemSetByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getItemSetName() !== null) {
            $queryStrings["itemSetName"] = $this->request->getItemSetName();
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

class GetItemWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var GetItemWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetItemWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param GetItemWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetItemWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            GetItemWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item/{itemName}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getItemSetName() !== null) {
            $queryStrings["itemSetName"] = $this->request->getItemSetName();
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

        return parent::executeImpl();
    }
}

class GetItemWithSignatureByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetItemWithSignatureByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetItemWithSignatureByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetItemWithSignatureByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetItemWithSignatureByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetItemWithSignatureByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getItemSetName() !== null) {
            $queryStrings["itemSetName"] = $this->request->getItemSetName();
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

        return parent::executeImpl();
    }
}

class AcquireItemSetByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AcquireItemSetByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireItemSetByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireItemSetByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireItemSetByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireItemSetByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/acquire";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getAcquireCount() !== null) {
            $json["acquireCount"] = $this->request->getAcquireCount();
        }
        if ($this->request->getExpiresAt() !== null) {
            $json["expiresAt"] = $this->request->getExpiresAt();
        }
        if ($this->request->getCreateNewItemSet() !== null) {
            $json["createNewItemSet"] = $this->request->getCreateNewItemSet();
        }
        if ($this->request->getItemSetName() !== null) {
            $json["itemSetName"] = $this->request->getItemSetName();
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

class ConsumeItemSetTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeItemSetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeItemSetTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeItemSetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeItemSetRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeItemSetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item/{itemName}/consume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $json = [];
        if ($this->request->getConsumeCount() !== null) {
            $json["consumeCount"] = $this->request->getConsumeCount();
        }
        if ($this->request->getItemSetName() !== null) {
            $json["itemSetName"] = $this->request->getItemSetName();
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

class ConsumeItemSetByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeItemSetByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeItemSetByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeItemSetByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeItemSetByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeItemSetByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/consume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $json = [];
        if ($this->request->getConsumeCount() !== null) {
            $json["consumeCount"] = $this->request->getConsumeCount();
        }
        if ($this->request->getItemSetName() !== null) {
            $json["itemSetName"] = $this->request->getItemSetName();
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

class DeleteItemSetByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteItemSetByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteItemSetByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteItemSetByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteItemSetByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteItemSetByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getItemSetName() !== null) {
            $queryStrings["itemSetName"] = $this->request->getItemSetName();
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

class AcquireItemSetByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AcquireItemSetByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireItemSetByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireItemSetByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireItemSetByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireItemSetByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/item/acquire";

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

        return parent::executeImpl();
    }
}

class ConsumeItemSetByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeItemSetByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeItemSetByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeItemSetByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeItemSetByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeItemSetByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/item/consume";

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

class DescribeReferenceOfTask extends Gs2RestSessionTask {

    /**
     * @var DescribeReferenceOfRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeReferenceOfTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeReferenceOfRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeReferenceOfRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeReferenceOfResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);

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

class DescribeReferenceOfByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeReferenceOfByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeReferenceOfByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeReferenceOfByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeReferenceOfByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeReferenceOfByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);

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

class GetReferenceOfTask extends Gs2RestSessionTask {

    /**
     * @var GetReferenceOfRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetReferenceOfTask constructor.
     * @param Gs2RestSession $session
     * @param GetReferenceOfRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetReferenceOfRequest $request
    ) {
        parent::__construct(
            $session,
            GetReferenceOfResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference/{referenceOf}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);
        $url = str_replace("{referenceOf}", $this->request->getReferenceOf() === null|| strlen($this->request->getReferenceOf()) == 0 ? "null" : $this->request->getReferenceOf(), $url);

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

class GetReferenceOfByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetReferenceOfByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetReferenceOfByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetReferenceOfByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetReferenceOfByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetReferenceOfByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference/{referenceOf}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);
        $url = str_replace("{referenceOf}", $this->request->getReferenceOf() === null|| strlen($this->request->getReferenceOf()) == 0 ? "null" : $this->request->getReferenceOf(), $url);

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

class VerifyReferenceOfTask extends Gs2RestSessionTask {

    /**
     * @var VerifyReferenceOfRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyReferenceOfTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyReferenceOfRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyReferenceOfRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyReferenceOfResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference/{referenceOf}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);
        $url = str_replace("{referenceOf}", $this->request->getReferenceOf() === null|| strlen($this->request->getReferenceOf()) == 0 ? "null" : $this->request->getReferenceOf(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class VerifyReferenceOfByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyReferenceOfByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyReferenceOfByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyReferenceOfByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyReferenceOfByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyReferenceOfByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference/{referenceOf}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);
        $url = str_replace("{referenceOf}", $this->request->getReferenceOf() === null|| strlen($this->request->getReferenceOf()) == 0 ? "null" : $this->request->getReferenceOf(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class AddReferenceOfTask extends Gs2RestSessionTask {

    /**
     * @var AddReferenceOfRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddReferenceOfTask constructor.
     * @param Gs2RestSession $session
     * @param AddReferenceOfRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddReferenceOfRequest $request
    ) {
        parent::__construct(
            $session,
            AddReferenceOfResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);

        $json = [];
        if ($this->request->getReferenceOf() !== null) {
            $json["referenceOf"] = $this->request->getReferenceOf();
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

class AddReferenceOfByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddReferenceOfByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddReferenceOfByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddReferenceOfByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddReferenceOfByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddReferenceOfByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);

        $json = [];
        if ($this->request->getReferenceOf() !== null) {
            $json["referenceOf"] = $this->request->getReferenceOf();
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

class DeleteReferenceOfTask extends Gs2RestSessionTask {

    /**
     * @var DeleteReferenceOfRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteReferenceOfTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteReferenceOfRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteReferenceOfRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteReferenceOfResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference/{referenceOf}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);
        $url = str_replace("{referenceOf}", $this->request->getReferenceOf() === null|| strlen($this->request->getReferenceOf()) == 0 ? "null" : $this->request->getReferenceOf(), $url);

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteReferenceOfByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteReferenceOfByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteReferenceOfByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteReferenceOfByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteReferenceOfByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteReferenceOfByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/{itemSetName}/reference/{referenceOf}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{itemSetName}", $this->request->getItemSetName() === null|| strlen($this->request->getItemSetName()) == 0 ? "null" : $this->request->getItemSetName(), $url);
        $url = str_replace("{referenceOf}", $this->request->getReferenceOf() === null|| strlen($this->request->getReferenceOf()) == 0 ? "null" : $this->request->getReferenceOf(), $url);

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

class AddReferenceOfItemSetByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AddReferenceOfItemSetByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddReferenceOfItemSetByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AddReferenceOfItemSetByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddReferenceOfItemSetByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AddReferenceOfItemSetByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/item/reference/add";

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

        return parent::executeImpl();
    }
}

class DeleteReferenceOfItemSetByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var DeleteReferenceOfItemSetByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteReferenceOfItemSetByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteReferenceOfItemSetByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteReferenceOfItemSetByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteReferenceOfItemSetByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/item/reference/delete";

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

        return parent::executeImpl();
    }
}

class VerifyReferenceOfByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyReferenceOfByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyReferenceOfByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyReferenceOfByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyReferenceOfByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyReferenceOfByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/item/verify";

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

/**
 * GS2 Inventory API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2InventoryRestClient extends AbstractGs2Client {

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
     * @param DescribeInventoryModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeInventoryModelMastersAsync(
            DescribeInventoryModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeInventoryModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeInventoryModelMastersRequest $request
     * @return DescribeInventoryModelMastersResult
     */
    public function describeInventoryModelMasters (
            DescribeInventoryModelMastersRequest $request
    ): DescribeInventoryModelMastersResult {
        return $this->describeInventoryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createInventoryModelMasterAsync(
            CreateInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateInventoryModelMasterRequest $request
     * @return CreateInventoryModelMasterResult
     */
    public function createInventoryModelMaster (
            CreateInventoryModelMasterRequest $request
    ): CreateInventoryModelMasterResult {
        return $this->createInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getInventoryModelMasterAsync(
            GetInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetInventoryModelMasterRequest $request
     * @return GetInventoryModelMasterResult
     */
    public function getInventoryModelMaster (
            GetInventoryModelMasterRequest $request
    ): GetInventoryModelMasterResult {
        return $this->getInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateInventoryModelMasterAsync(
            UpdateInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateInventoryModelMasterRequest $request
     * @return UpdateInventoryModelMasterResult
     */
    public function updateInventoryModelMaster (
            UpdateInventoryModelMasterRequest $request
    ): UpdateInventoryModelMasterResult {
        return $this->updateInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteInventoryModelMasterAsync(
            DeleteInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteInventoryModelMasterRequest $request
     * @return DeleteInventoryModelMasterResult
     */
    public function deleteInventoryModelMaster (
            DeleteInventoryModelMasterRequest $request
    ): DeleteInventoryModelMasterResult {
        return $this->deleteInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeInventoryModelsRequest $request
     * @return PromiseInterface
     */
    public function describeInventoryModelsAsync(
            DescribeInventoryModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeInventoryModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeInventoryModelsRequest $request
     * @return DescribeInventoryModelsResult
     */
    public function describeInventoryModels (
            DescribeInventoryModelsRequest $request
    ): DescribeInventoryModelsResult {
        return $this->describeInventoryModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetInventoryModelRequest $request
     * @return PromiseInterface
     */
    public function getInventoryModelAsync(
            GetInventoryModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetInventoryModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetInventoryModelRequest $request
     * @return GetInventoryModelResult
     */
    public function getInventoryModel (
            GetInventoryModelRequest $request
    ): GetInventoryModelResult {
        return $this->getInventoryModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeItemModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeItemModelMastersAsync(
            DescribeItemModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeItemModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeItemModelMastersRequest $request
     * @return DescribeItemModelMastersResult
     */
    public function describeItemModelMasters (
            DescribeItemModelMastersRequest $request
    ): DescribeItemModelMastersResult {
        return $this->describeItemModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createItemModelMasterAsync(
            CreateItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateItemModelMasterRequest $request
     * @return CreateItemModelMasterResult
     */
    public function createItemModelMaster (
            CreateItemModelMasterRequest $request
    ): CreateItemModelMasterResult {
        return $this->createItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getItemModelMasterAsync(
            GetItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetItemModelMasterRequest $request
     * @return GetItemModelMasterResult
     */
    public function getItemModelMaster (
            GetItemModelMasterRequest $request
    ): GetItemModelMasterResult {
        return $this->getItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateItemModelMasterAsync(
            UpdateItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateItemModelMasterRequest $request
     * @return UpdateItemModelMasterResult
     */
    public function updateItemModelMaster (
            UpdateItemModelMasterRequest $request
    ): UpdateItemModelMasterResult {
        return $this->updateItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteItemModelMasterAsync(
            DeleteItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteItemModelMasterRequest $request
     * @return DeleteItemModelMasterResult
     */
    public function deleteItemModelMaster (
            DeleteItemModelMasterRequest $request
    ): DeleteItemModelMasterResult {
        return $this->deleteItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeItemModelsRequest $request
     * @return PromiseInterface
     */
    public function describeItemModelsAsync(
            DescribeItemModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeItemModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeItemModelsRequest $request
     * @return DescribeItemModelsResult
     */
    public function describeItemModels (
            DescribeItemModelsRequest $request
    ): DescribeItemModelsResult {
        return $this->describeItemModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetItemModelRequest $request
     * @return PromiseInterface
     */
    public function getItemModelAsync(
            GetItemModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetItemModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetItemModelRequest $request
     * @return GetItemModelResult
     */
    public function getItemModel (
            GetItemModelRequest $request
    ): GetItemModelResult {
        return $this->getItemModelAsync(
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
     * @param GetCurrentItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentItemModelMasterAsync(
            GetCurrentItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentItemModelMasterRequest $request
     * @return GetCurrentItemModelMasterResult
     */
    public function getCurrentItemModelMaster (
            GetCurrentItemModelMasterRequest $request
    ): GetCurrentItemModelMasterResult {
        return $this->getCurrentItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentItemModelMasterAsync(
            UpdateCurrentItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentItemModelMasterRequest $request
     * @return UpdateCurrentItemModelMasterResult
     */
    public function updateCurrentItemModelMaster (
            UpdateCurrentItemModelMasterRequest $request
    ): UpdateCurrentItemModelMasterResult {
        return $this->updateCurrentItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentItemModelMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentItemModelMasterFromGitHubAsync(
            UpdateCurrentItemModelMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentItemModelMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentItemModelMasterFromGitHubRequest $request
     * @return UpdateCurrentItemModelMasterFromGitHubResult
     */
    public function updateCurrentItemModelMasterFromGitHub (
            UpdateCurrentItemModelMasterFromGitHubRequest $request
    ): UpdateCurrentItemModelMasterFromGitHubResult {
        return $this->updateCurrentItemModelMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeInventoriesRequest $request
     * @return PromiseInterface
     */
    public function describeInventoriesAsync(
            DescribeInventoriesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeInventoriesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeInventoriesRequest $request
     * @return DescribeInventoriesResult
     */
    public function describeInventories (
            DescribeInventoriesRequest $request
    ): DescribeInventoriesResult {
        return $this->describeInventoriesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeInventoriesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeInventoriesByUserIdAsync(
            DescribeInventoriesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeInventoriesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeInventoriesByUserIdRequest $request
     * @return DescribeInventoriesByUserIdResult
     */
    public function describeInventoriesByUserId (
            DescribeInventoriesByUserIdRequest $request
    ): DescribeInventoriesByUserIdResult {
        return $this->describeInventoriesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetInventoryRequest $request
     * @return PromiseInterface
     */
    public function getInventoryAsync(
            GetInventoryRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetInventoryTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetInventoryRequest $request
     * @return GetInventoryResult
     */
    public function getInventory (
            GetInventoryRequest $request
    ): GetInventoryResult {
        return $this->getInventoryAsync(
            $request
        )->wait();
    }

    /**
     * @param GetInventoryByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getInventoryByUserIdAsync(
            GetInventoryByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetInventoryByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetInventoryByUserIdRequest $request
     * @return GetInventoryByUserIdResult
     */
    public function getInventoryByUserId (
            GetInventoryByUserIdRequest $request
    ): GetInventoryByUserIdResult {
        return $this->getInventoryByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddCapacityByUserIdRequest $request
     * @return PromiseInterface
     */
    public function addCapacityByUserIdAsync(
            AddCapacityByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddCapacityByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddCapacityByUserIdRequest $request
     * @return AddCapacityByUserIdResult
     */
    public function addCapacityByUserId (
            AddCapacityByUserIdRequest $request
    ): AddCapacityByUserIdResult {
        return $this->addCapacityByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetCapacityByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setCapacityByUserIdAsync(
            SetCapacityByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetCapacityByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetCapacityByUserIdRequest $request
     * @return SetCapacityByUserIdResult
     */
    public function setCapacityByUserId (
            SetCapacityByUserIdRequest $request
    ): SetCapacityByUserIdResult {
        return $this->setCapacityByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteInventoryByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteInventoryByUserIdAsync(
            DeleteInventoryByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteInventoryByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteInventoryByUserIdRequest $request
     * @return DeleteInventoryByUserIdResult
     */
    public function deleteInventoryByUserId (
            DeleteInventoryByUserIdRequest $request
    ): DeleteInventoryByUserIdResult {
        return $this->deleteInventoryByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddCapacityByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function addCapacityByStampSheetAsync(
            AddCapacityByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddCapacityByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddCapacityByStampSheetRequest $request
     * @return AddCapacityByStampSheetResult
     */
    public function addCapacityByStampSheet (
            AddCapacityByStampSheetRequest $request
    ): AddCapacityByStampSheetResult {
        return $this->addCapacityByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param SetCapacityByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function setCapacityByStampSheetAsync(
            SetCapacityByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetCapacityByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetCapacityByStampSheetRequest $request
     * @return SetCapacityByStampSheetResult
     */
    public function setCapacityByStampSheet (
            SetCapacityByStampSheetRequest $request
    ): SetCapacityByStampSheetResult {
        return $this->setCapacityByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeItemSetsRequest $request
     * @return PromiseInterface
     */
    public function describeItemSetsAsync(
            DescribeItemSetsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeItemSetsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeItemSetsRequest $request
     * @return DescribeItemSetsResult
     */
    public function describeItemSets (
            DescribeItemSetsRequest $request
    ): DescribeItemSetsResult {
        return $this->describeItemSetsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeItemSetsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeItemSetsByUserIdAsync(
            DescribeItemSetsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeItemSetsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeItemSetsByUserIdRequest $request
     * @return DescribeItemSetsByUserIdResult
     */
    public function describeItemSetsByUserId (
            DescribeItemSetsByUserIdRequest $request
    ): DescribeItemSetsByUserIdResult {
        return $this->describeItemSetsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetItemSetRequest $request
     * @return PromiseInterface
     */
    public function getItemSetAsync(
            GetItemSetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetItemSetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetItemSetRequest $request
     * @return GetItemSetResult
     */
    public function getItemSet (
            GetItemSetRequest $request
    ): GetItemSetResult {
        return $this->getItemSetAsync(
            $request
        )->wait();
    }

    /**
     * @param GetItemSetByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getItemSetByUserIdAsync(
            GetItemSetByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetItemSetByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetItemSetByUserIdRequest $request
     * @return GetItemSetByUserIdResult
     */
    public function getItemSetByUserId (
            GetItemSetByUserIdRequest $request
    ): GetItemSetByUserIdResult {
        return $this->getItemSetByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetItemWithSignatureRequest $request
     * @return PromiseInterface
     */
    public function getItemWithSignatureAsync(
            GetItemWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetItemWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetItemWithSignatureRequest $request
     * @return GetItemWithSignatureResult
     */
    public function getItemWithSignature (
            GetItemWithSignatureRequest $request
    ): GetItemWithSignatureResult {
        return $this->getItemWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * @param GetItemWithSignatureByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getItemWithSignatureByUserIdAsync(
            GetItemWithSignatureByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetItemWithSignatureByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetItemWithSignatureByUserIdRequest $request
     * @return GetItemWithSignatureByUserIdResult
     */
    public function getItemWithSignatureByUserId (
            GetItemWithSignatureByUserIdRequest $request
    ): GetItemWithSignatureByUserIdResult {
        return $this->getItemWithSignatureByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireItemSetByUserIdRequest $request
     * @return PromiseInterface
     */
    public function acquireItemSetByUserIdAsync(
            AcquireItemSetByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireItemSetByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireItemSetByUserIdRequest $request
     * @return AcquireItemSetByUserIdResult
     */
    public function acquireItemSetByUserId (
            AcquireItemSetByUserIdRequest $request
    ): AcquireItemSetByUserIdResult {
        return $this->acquireItemSetByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeItemSetRequest $request
     * @return PromiseInterface
     */
    public function consumeItemSetAsync(
            ConsumeItemSetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeItemSetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeItemSetRequest $request
     * @return ConsumeItemSetResult
     */
    public function consumeItemSet (
            ConsumeItemSetRequest $request
    ): ConsumeItemSetResult {
        return $this->consumeItemSetAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeItemSetByUserIdRequest $request
     * @return PromiseInterface
     */
    public function consumeItemSetByUserIdAsync(
            ConsumeItemSetByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeItemSetByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeItemSetByUserIdRequest $request
     * @return ConsumeItemSetByUserIdResult
     */
    public function consumeItemSetByUserId (
            ConsumeItemSetByUserIdRequest $request
    ): ConsumeItemSetByUserIdResult {
        return $this->consumeItemSetByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteItemSetByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteItemSetByUserIdAsync(
            DeleteItemSetByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteItemSetByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteItemSetByUserIdRequest $request
     * @return DeleteItemSetByUserIdResult
     */
    public function deleteItemSetByUserId (
            DeleteItemSetByUserIdRequest $request
    ): DeleteItemSetByUserIdResult {
        return $this->deleteItemSetByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireItemSetByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function acquireItemSetByStampSheetAsync(
            AcquireItemSetByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireItemSetByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireItemSetByStampSheetRequest $request
     * @return AcquireItemSetByStampSheetResult
     */
    public function acquireItemSetByStampSheet (
            AcquireItemSetByStampSheetRequest $request
    ): AcquireItemSetByStampSheetResult {
        return $this->acquireItemSetByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeItemSetByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function consumeItemSetByStampTaskAsync(
            ConsumeItemSetByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeItemSetByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeItemSetByStampTaskRequest $request
     * @return ConsumeItemSetByStampTaskResult
     */
    public function consumeItemSetByStampTask (
            ConsumeItemSetByStampTaskRequest $request
    ): ConsumeItemSetByStampTaskResult {
        return $this->consumeItemSetByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeReferenceOfRequest $request
     * @return PromiseInterface
     */
    public function describeReferenceOfAsync(
            DescribeReferenceOfRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeReferenceOfTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeReferenceOfRequest $request
     * @return DescribeReferenceOfResult
     */
    public function describeReferenceOf (
            DescribeReferenceOfRequest $request
    ): DescribeReferenceOfResult {
        return $this->describeReferenceOfAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeReferenceOfByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeReferenceOfByUserIdAsync(
            DescribeReferenceOfByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeReferenceOfByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeReferenceOfByUserIdRequest $request
     * @return DescribeReferenceOfByUserIdResult
     */
    public function describeReferenceOfByUserId (
            DescribeReferenceOfByUserIdRequest $request
    ): DescribeReferenceOfByUserIdResult {
        return $this->describeReferenceOfByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetReferenceOfRequest $request
     * @return PromiseInterface
     */
    public function getReferenceOfAsync(
            GetReferenceOfRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetReferenceOfTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetReferenceOfRequest $request
     * @return GetReferenceOfResult
     */
    public function getReferenceOf (
            GetReferenceOfRequest $request
    ): GetReferenceOfResult {
        return $this->getReferenceOfAsync(
            $request
        )->wait();
    }

    /**
     * @param GetReferenceOfByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getReferenceOfByUserIdAsync(
            GetReferenceOfByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetReferenceOfByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetReferenceOfByUserIdRequest $request
     * @return GetReferenceOfByUserIdResult
     */
    public function getReferenceOfByUserId (
            GetReferenceOfByUserIdRequest $request
    ): GetReferenceOfByUserIdResult {
        return $this->getReferenceOfByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyReferenceOfRequest $request
     * @return PromiseInterface
     */
    public function verifyReferenceOfAsync(
            VerifyReferenceOfRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyReferenceOfTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyReferenceOfRequest $request
     * @return VerifyReferenceOfResult
     */
    public function verifyReferenceOf (
            VerifyReferenceOfRequest $request
    ): VerifyReferenceOfResult {
        return $this->verifyReferenceOfAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyReferenceOfByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyReferenceOfByUserIdAsync(
            VerifyReferenceOfByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyReferenceOfByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyReferenceOfByUserIdRequest $request
     * @return VerifyReferenceOfByUserIdResult
     */
    public function verifyReferenceOfByUserId (
            VerifyReferenceOfByUserIdRequest $request
    ): VerifyReferenceOfByUserIdResult {
        return $this->verifyReferenceOfByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddReferenceOfRequest $request
     * @return PromiseInterface
     */
    public function addReferenceOfAsync(
            AddReferenceOfRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddReferenceOfTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddReferenceOfRequest $request
     * @return AddReferenceOfResult
     */
    public function addReferenceOf (
            AddReferenceOfRequest $request
    ): AddReferenceOfResult {
        return $this->addReferenceOfAsync(
            $request
        )->wait();
    }

    /**
     * @param AddReferenceOfByUserIdRequest $request
     * @return PromiseInterface
     */
    public function addReferenceOfByUserIdAsync(
            AddReferenceOfByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddReferenceOfByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddReferenceOfByUserIdRequest $request
     * @return AddReferenceOfByUserIdResult
     */
    public function addReferenceOfByUserId (
            AddReferenceOfByUserIdRequest $request
    ): AddReferenceOfByUserIdResult {
        return $this->addReferenceOfByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteReferenceOfRequest $request
     * @return PromiseInterface
     */
    public function deleteReferenceOfAsync(
            DeleteReferenceOfRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteReferenceOfTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteReferenceOfRequest $request
     * @return DeleteReferenceOfResult
     */
    public function deleteReferenceOf (
            DeleteReferenceOfRequest $request
    ): DeleteReferenceOfResult {
        return $this->deleteReferenceOfAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteReferenceOfByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteReferenceOfByUserIdAsync(
            DeleteReferenceOfByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteReferenceOfByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteReferenceOfByUserIdRequest $request
     * @return DeleteReferenceOfByUserIdResult
     */
    public function deleteReferenceOfByUserId (
            DeleteReferenceOfByUserIdRequest $request
    ): DeleteReferenceOfByUserIdResult {
        return $this->deleteReferenceOfByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddReferenceOfItemSetByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function addReferenceOfItemSetByStampSheetAsync(
            AddReferenceOfItemSetByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddReferenceOfItemSetByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddReferenceOfItemSetByStampSheetRequest $request
     * @return AddReferenceOfItemSetByStampSheetResult
     */
    public function addReferenceOfItemSetByStampSheet (
            AddReferenceOfItemSetByStampSheetRequest $request
    ): AddReferenceOfItemSetByStampSheetResult {
        return $this->addReferenceOfItemSetByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteReferenceOfItemSetByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function deleteReferenceOfItemSetByStampSheetAsync(
            DeleteReferenceOfItemSetByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteReferenceOfItemSetByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteReferenceOfItemSetByStampSheetRequest $request
     * @return DeleteReferenceOfItemSetByStampSheetResult
     */
    public function deleteReferenceOfItemSetByStampSheet (
            DeleteReferenceOfItemSetByStampSheetRequest $request
    ): DeleteReferenceOfItemSetByStampSheetResult {
        return $this->deleteReferenceOfItemSetByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyReferenceOfByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyReferenceOfByStampTaskAsync(
            VerifyReferenceOfByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyReferenceOfByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyReferenceOfByStampTaskRequest $request
     * @return VerifyReferenceOfByStampTaskResult
     */
    public function verifyReferenceOfByStampTask (
            VerifyReferenceOfByStampTaskRequest $request
    ): VerifyReferenceOfByStampTaskResult {
        return $this->verifyReferenceOfByStampTaskAsync(
            $request
        )->wait();
    }
}