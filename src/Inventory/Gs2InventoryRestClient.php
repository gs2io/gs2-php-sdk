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
use Gs2\Inventory\Request\GetServiceVersionRequest;
use Gs2\Inventory\Result\GetServiceVersionResult;
use Gs2\Inventory\Request\DumpUserDataByUserIdRequest;
use Gs2\Inventory\Result\DumpUserDataByUserIdResult;
use Gs2\Inventory\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Inventory\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Inventory\Request\CleanUserDataByUserIdRequest;
use Gs2\Inventory\Result\CleanUserDataByUserIdResult;
use Gs2\Inventory\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Inventory\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Inventory\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Inventory\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Inventory\Request\ImportUserDataByUserIdRequest;
use Gs2\Inventory\Result\ImportUserDataByUserIdResult;
use Gs2\Inventory\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Inventory\Result\CheckImportUserDataByUserIdResult;
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
use Gs2\Inventory\Request\DescribeSimpleInventoryModelMastersRequest;
use Gs2\Inventory\Result\DescribeSimpleInventoryModelMastersResult;
use Gs2\Inventory\Request\CreateSimpleInventoryModelMasterRequest;
use Gs2\Inventory\Result\CreateSimpleInventoryModelMasterResult;
use Gs2\Inventory\Request\GetSimpleInventoryModelMasterRequest;
use Gs2\Inventory\Result\GetSimpleInventoryModelMasterResult;
use Gs2\Inventory\Request\UpdateSimpleInventoryModelMasterRequest;
use Gs2\Inventory\Result\UpdateSimpleInventoryModelMasterResult;
use Gs2\Inventory\Request\DeleteSimpleInventoryModelMasterRequest;
use Gs2\Inventory\Result\DeleteSimpleInventoryModelMasterResult;
use Gs2\Inventory\Request\DescribeSimpleInventoryModelsRequest;
use Gs2\Inventory\Result\DescribeSimpleInventoryModelsResult;
use Gs2\Inventory\Request\GetSimpleInventoryModelRequest;
use Gs2\Inventory\Result\GetSimpleInventoryModelResult;
use Gs2\Inventory\Request\DescribeSimpleItemModelMastersRequest;
use Gs2\Inventory\Result\DescribeSimpleItemModelMastersResult;
use Gs2\Inventory\Request\CreateSimpleItemModelMasterRequest;
use Gs2\Inventory\Result\CreateSimpleItemModelMasterResult;
use Gs2\Inventory\Request\GetSimpleItemModelMasterRequest;
use Gs2\Inventory\Result\GetSimpleItemModelMasterResult;
use Gs2\Inventory\Request\UpdateSimpleItemModelMasterRequest;
use Gs2\Inventory\Result\UpdateSimpleItemModelMasterResult;
use Gs2\Inventory\Request\DeleteSimpleItemModelMasterRequest;
use Gs2\Inventory\Result\DeleteSimpleItemModelMasterResult;
use Gs2\Inventory\Request\DescribeSimpleItemModelsRequest;
use Gs2\Inventory\Result\DescribeSimpleItemModelsResult;
use Gs2\Inventory\Request\GetSimpleItemModelRequest;
use Gs2\Inventory\Result\GetSimpleItemModelResult;
use Gs2\Inventory\Request\DescribeBigInventoryModelMastersRequest;
use Gs2\Inventory\Result\DescribeBigInventoryModelMastersResult;
use Gs2\Inventory\Request\CreateBigInventoryModelMasterRequest;
use Gs2\Inventory\Result\CreateBigInventoryModelMasterResult;
use Gs2\Inventory\Request\GetBigInventoryModelMasterRequest;
use Gs2\Inventory\Result\GetBigInventoryModelMasterResult;
use Gs2\Inventory\Request\UpdateBigInventoryModelMasterRequest;
use Gs2\Inventory\Result\UpdateBigInventoryModelMasterResult;
use Gs2\Inventory\Request\DeleteBigInventoryModelMasterRequest;
use Gs2\Inventory\Result\DeleteBigInventoryModelMasterResult;
use Gs2\Inventory\Request\DescribeBigInventoryModelsRequest;
use Gs2\Inventory\Result\DescribeBigInventoryModelsResult;
use Gs2\Inventory\Request\GetBigInventoryModelRequest;
use Gs2\Inventory\Result\GetBigInventoryModelResult;
use Gs2\Inventory\Request\DescribeBigItemModelMastersRequest;
use Gs2\Inventory\Result\DescribeBigItemModelMastersResult;
use Gs2\Inventory\Request\CreateBigItemModelMasterRequest;
use Gs2\Inventory\Result\CreateBigItemModelMasterResult;
use Gs2\Inventory\Request\GetBigItemModelMasterRequest;
use Gs2\Inventory\Result\GetBigItemModelMasterResult;
use Gs2\Inventory\Request\UpdateBigItemModelMasterRequest;
use Gs2\Inventory\Result\UpdateBigItemModelMasterResult;
use Gs2\Inventory\Request\DeleteBigItemModelMasterRequest;
use Gs2\Inventory\Result\DeleteBigItemModelMasterResult;
use Gs2\Inventory\Request\DescribeBigItemModelsRequest;
use Gs2\Inventory\Result\DescribeBigItemModelsResult;
use Gs2\Inventory\Request\GetBigItemModelRequest;
use Gs2\Inventory\Result\GetBigItemModelResult;
use Gs2\Inventory\Request\ExportMasterRequest;
use Gs2\Inventory\Result\ExportMasterResult;
use Gs2\Inventory\Request\GetCurrentItemModelMasterRequest;
use Gs2\Inventory\Result\GetCurrentItemModelMasterResult;
use Gs2\Inventory\Request\PreUpdateCurrentItemModelMasterRequest;
use Gs2\Inventory\Result\PreUpdateCurrentItemModelMasterResult;
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
use Gs2\Inventory\Request\VerifyInventoryCurrentMaxCapacityRequest;
use Gs2\Inventory\Result\VerifyInventoryCurrentMaxCapacityResult;
use Gs2\Inventory\Request\VerifyInventoryCurrentMaxCapacityByUserIdRequest;
use Gs2\Inventory\Result\VerifyInventoryCurrentMaxCapacityByUserIdResult;
use Gs2\Inventory\Request\VerifyInventoryCurrentMaxCapacityByStampTaskRequest;
use Gs2\Inventory\Result\VerifyInventoryCurrentMaxCapacityByStampTaskResult;
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
use Gs2\Inventory\Request\AcquireItemSetWithGradeByUserIdRequest;
use Gs2\Inventory\Result\AcquireItemSetWithGradeByUserIdResult;
use Gs2\Inventory\Request\ConsumeItemSetRequest;
use Gs2\Inventory\Result\ConsumeItemSetResult;
use Gs2\Inventory\Request\ConsumeItemSetByUserIdRequest;
use Gs2\Inventory\Result\ConsumeItemSetByUserIdResult;
use Gs2\Inventory\Request\DeleteItemSetByUserIdRequest;
use Gs2\Inventory\Result\DeleteItemSetByUserIdResult;
use Gs2\Inventory\Request\VerifyItemSetRequest;
use Gs2\Inventory\Result\VerifyItemSetResult;
use Gs2\Inventory\Request\VerifyItemSetByUserIdRequest;
use Gs2\Inventory\Result\VerifyItemSetByUserIdResult;
use Gs2\Inventory\Request\AcquireItemSetByStampSheetRequest;
use Gs2\Inventory\Result\AcquireItemSetByStampSheetResult;
use Gs2\Inventory\Request\AcquireItemSetWithGradeByStampSheetRequest;
use Gs2\Inventory\Result\AcquireItemSetWithGradeByStampSheetResult;
use Gs2\Inventory\Request\ConsumeItemSetByStampTaskRequest;
use Gs2\Inventory\Result\ConsumeItemSetByStampTaskResult;
use Gs2\Inventory\Request\VerifyItemSetByStampTaskRequest;
use Gs2\Inventory\Result\VerifyItemSetByStampTaskResult;
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
use Gs2\Inventory\Request\DescribeSimpleItemsRequest;
use Gs2\Inventory\Result\DescribeSimpleItemsResult;
use Gs2\Inventory\Request\DescribeSimpleItemsByUserIdRequest;
use Gs2\Inventory\Result\DescribeSimpleItemsByUserIdResult;
use Gs2\Inventory\Request\GetSimpleItemRequest;
use Gs2\Inventory\Result\GetSimpleItemResult;
use Gs2\Inventory\Request\GetSimpleItemByUserIdRequest;
use Gs2\Inventory\Result\GetSimpleItemByUserIdResult;
use Gs2\Inventory\Request\GetSimpleItemWithSignatureRequest;
use Gs2\Inventory\Result\GetSimpleItemWithSignatureResult;
use Gs2\Inventory\Request\GetSimpleItemWithSignatureByUserIdRequest;
use Gs2\Inventory\Result\GetSimpleItemWithSignatureByUserIdResult;
use Gs2\Inventory\Request\AcquireSimpleItemsByUserIdRequest;
use Gs2\Inventory\Result\AcquireSimpleItemsByUserIdResult;
use Gs2\Inventory\Request\ConsumeSimpleItemsRequest;
use Gs2\Inventory\Result\ConsumeSimpleItemsResult;
use Gs2\Inventory\Request\ConsumeSimpleItemsByUserIdRequest;
use Gs2\Inventory\Result\ConsumeSimpleItemsByUserIdResult;
use Gs2\Inventory\Request\SetSimpleItemsByUserIdRequest;
use Gs2\Inventory\Result\SetSimpleItemsByUserIdResult;
use Gs2\Inventory\Request\DeleteSimpleItemsByUserIdRequest;
use Gs2\Inventory\Result\DeleteSimpleItemsByUserIdResult;
use Gs2\Inventory\Request\VerifySimpleItemRequest;
use Gs2\Inventory\Result\VerifySimpleItemResult;
use Gs2\Inventory\Request\VerifySimpleItemByUserIdRequest;
use Gs2\Inventory\Result\VerifySimpleItemByUserIdResult;
use Gs2\Inventory\Request\AcquireSimpleItemsByStampSheetRequest;
use Gs2\Inventory\Result\AcquireSimpleItemsByStampSheetResult;
use Gs2\Inventory\Request\ConsumeSimpleItemsByStampTaskRequest;
use Gs2\Inventory\Result\ConsumeSimpleItemsByStampTaskResult;
use Gs2\Inventory\Request\SetSimpleItemsByStampSheetRequest;
use Gs2\Inventory\Result\SetSimpleItemsByStampSheetResult;
use Gs2\Inventory\Request\VerifySimpleItemByStampTaskRequest;
use Gs2\Inventory\Result\VerifySimpleItemByStampTaskResult;
use Gs2\Inventory\Request\DescribeBigItemsRequest;
use Gs2\Inventory\Result\DescribeBigItemsResult;
use Gs2\Inventory\Request\DescribeBigItemsByUserIdRequest;
use Gs2\Inventory\Result\DescribeBigItemsByUserIdResult;
use Gs2\Inventory\Request\GetBigItemRequest;
use Gs2\Inventory\Result\GetBigItemResult;
use Gs2\Inventory\Request\GetBigItemByUserIdRequest;
use Gs2\Inventory\Result\GetBigItemByUserIdResult;
use Gs2\Inventory\Request\AcquireBigItemByUserIdRequest;
use Gs2\Inventory\Result\AcquireBigItemByUserIdResult;
use Gs2\Inventory\Request\ConsumeBigItemRequest;
use Gs2\Inventory\Result\ConsumeBigItemResult;
use Gs2\Inventory\Request\ConsumeBigItemByUserIdRequest;
use Gs2\Inventory\Result\ConsumeBigItemByUserIdResult;
use Gs2\Inventory\Request\SetBigItemByUserIdRequest;
use Gs2\Inventory\Result\SetBigItemByUserIdResult;
use Gs2\Inventory\Request\DeleteBigItemByUserIdRequest;
use Gs2\Inventory\Result\DeleteBigItemByUserIdResult;
use Gs2\Inventory\Request\VerifyBigItemRequest;
use Gs2\Inventory\Result\VerifyBigItemResult;
use Gs2\Inventory\Request\VerifyBigItemByUserIdRequest;
use Gs2\Inventory\Result\VerifyBigItemByUserIdResult;
use Gs2\Inventory\Request\AcquireBigItemByStampSheetRequest;
use Gs2\Inventory\Result\AcquireBigItemByStampSheetResult;
use Gs2\Inventory\Request\ConsumeBigItemByStampTaskRequest;
use Gs2\Inventory\Result\ConsumeBigItemByStampTaskResult;
use Gs2\Inventory\Request\SetBigItemByStampSheetRequest;
use Gs2\Inventory\Result\SetBigItemByStampSheetResult;
use Gs2\Inventory\Request\VerifyBigItemByStampTaskRequest;
use Gs2\Inventory\Result\VerifyBigItemByStampTaskResult;

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
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
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
        if ($this->request->getSimpleItemAcquireScript() !== null) {
            $json["simpleItemAcquireScript"] = $this->request->getSimpleItemAcquireScript()->toJson();
        }
        if ($this->request->getSimpleItemConsumeScript() !== null) {
            $json["simpleItemConsumeScript"] = $this->request->getSimpleItemConsumeScript()->toJson();
        }
        if ($this->request->getBigItemAcquireScript() !== null) {
            $json["bigItemAcquireScript"] = $this->request->getBigItemAcquireScript()->toJson();
        }
        if ($this->request->getBigItemConsumeScript() !== null) {
            $json["bigItemConsumeScript"] = $this->request->getBigItemConsumeScript()->toJson();
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
        if ($this->request->getTransactionSetting() !== null) {
            $json["transactionSetting"] = $this->request->getTransactionSetting()->toJson();
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
        if ($this->request->getSimpleItemAcquireScript() !== null) {
            $json["simpleItemAcquireScript"] = $this->request->getSimpleItemAcquireScript()->toJson();
        }
        if ($this->request->getSimpleItemConsumeScript() !== null) {
            $json["simpleItemConsumeScript"] = $this->request->getSimpleItemConsumeScript()->toJson();
        }
        if ($this->request->getBigItemAcquireScript() !== null) {
            $json["bigItemAcquireScript"] = $this->request->getBigItemAcquireScript()->toJson();
        }
        if ($this->request->getBigItemConsumeScript() !== null) {
            $json["bigItemConsumeScript"] = $this->request->getBigItemConsumeScript()->toJson();
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

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

class DumpUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DumpUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DumpUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DumpUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DumpUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DumpUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckDumpUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckDumpUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckDumpUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckDumpUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckDumpUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckDumpUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CleanUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CleanUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CleanUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CleanUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CleanUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CleanUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckCleanUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckCleanUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckCleanUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckCleanUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckCleanUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckCleanUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class PrepareImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PrepareImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class ImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class CheckImportUserDataByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckImportUserDataByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckImportUserDataByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckImportUserDataByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckImportUserDataByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckImportUserDataByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{uploadToken}", $this->request->getUploadToken() === null|| strlen($this->request->getUploadToken()) == 0 ? "null" : $this->request->getUploadToken(), $url);

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

class DescribeSimpleInventoryModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSimpleInventoryModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSimpleInventoryModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSimpleInventoryModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSimpleInventoryModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSimpleInventoryModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

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

class CreateSimpleInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateSimpleInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateSimpleInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateSimpleInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateSimpleInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateSimpleInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory";

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

class GetSimpleInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetSimpleInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSimpleInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetSimpleInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSimpleInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetSimpleInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory/{inventoryName}";

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

class UpdateSimpleInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateSimpleInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateSimpleInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateSimpleInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateSimpleInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateSimpleInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class DeleteSimpleInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSimpleInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSimpleInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSimpleInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSimpleInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSimpleInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory/{inventoryName}";

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

class DescribeSimpleInventoryModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSimpleInventoryModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSimpleInventoryModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSimpleInventoryModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSimpleInventoryModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSimpleInventoryModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/simple/inventory";

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

class GetSimpleInventoryModelTask extends Gs2RestSessionTask {

    /**
     * @var GetSimpleInventoryModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSimpleInventoryModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetSimpleInventoryModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSimpleInventoryModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetSimpleInventoryModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/simple/inventory/{inventoryName}";

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

class DescribeSimpleItemModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSimpleItemModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSimpleItemModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSimpleItemModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSimpleItemModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSimpleItemModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory/{inventoryName}/item";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class CreateSimpleItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateSimpleItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateSimpleItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateSimpleItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateSimpleItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateSimpleItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory/{inventoryName}/item";

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

class GetSimpleItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetSimpleItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSimpleItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetSimpleItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSimpleItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetSimpleItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory/{inventoryName}/item/{itemName}";

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

class UpdateSimpleItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateSimpleItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateSimpleItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateSimpleItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateSimpleItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateSimpleItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory/{inventoryName}/item/{itemName}";

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

class DeleteSimpleItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSimpleItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSimpleItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSimpleItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSimpleItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSimpleItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/simple/inventory/{inventoryName}/item/{itemName}";

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

class DescribeSimpleItemModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSimpleItemModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSimpleItemModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSimpleItemModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSimpleItemModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSimpleItemModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/simple/inventory/{inventoryName}/item";

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

class GetSimpleItemModelTask extends Gs2RestSessionTask {

    /**
     * @var GetSimpleItemModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSimpleItemModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetSimpleItemModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSimpleItemModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetSimpleItemModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/simple/inventory/{inventoryName}/item/{itemName}";

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

class DescribeBigInventoryModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBigInventoryModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBigInventoryModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBigInventoryModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBigInventoryModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBigInventoryModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

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

class CreateBigInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateBigInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateBigInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateBigInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateBigInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateBigInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory";

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

class GetBigInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetBigInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBigInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetBigInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBigInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetBigInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory/{inventoryName}";

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

class UpdateBigInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateBigInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateBigInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateBigInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateBigInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateBigInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class DeleteBigInventoryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteBigInventoryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteBigInventoryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteBigInventoryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteBigInventoryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteBigInventoryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory/{inventoryName}";

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

class DescribeBigInventoryModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBigInventoryModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBigInventoryModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBigInventoryModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBigInventoryModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBigInventoryModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/big/inventory";

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

class GetBigInventoryModelTask extends Gs2RestSessionTask {

    /**
     * @var GetBigInventoryModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBigInventoryModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetBigInventoryModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBigInventoryModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetBigInventoryModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/big/inventory/{inventoryName}";

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

class DescribeBigItemModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBigItemModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBigItemModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBigItemModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBigItemModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBigItemModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory/{inventoryName}/item";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

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

class CreateBigItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateBigItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateBigItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateBigItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateBigItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateBigItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory/{inventoryName}/item";

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

class GetBigItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetBigItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBigItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetBigItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBigItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetBigItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory/{inventoryName}/item/{itemName}";

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

class UpdateBigItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateBigItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateBigItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateBigItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateBigItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateBigItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory/{inventoryName}/item/{itemName}";

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

class DeleteBigItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteBigItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteBigItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteBigItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteBigItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteBigItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/big/inventory/{inventoryName}/item/{itemName}";

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

class DescribeBigItemModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBigItemModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBigItemModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBigItemModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBigItemModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBigItemModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/big/inventory/{inventoryName}/item";

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

class GetBigItemModelTask extends Gs2RestSessionTask {

    /**
     * @var GetBigItemModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBigItemModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetBigItemModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBigItemModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetBigItemModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/big/inventory/{inventoryName}/item/{itemName}";

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

class PreUpdateCurrentItemModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentItemModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentItemModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentItemModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentItemModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentItemModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

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
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentItemModelMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentItemModelMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentItemModelMasterResult $res */
            $res = $this->session->execute($task)->wait();

            (new \GuzzleHttp\Client())
                ->put($res->getUploadUrl(), [
                    'timeout' => 60,
                    'body' => $this->request->getSettings(),
                    'headers' => [
                        "Content-Type" => "application/json",
                    ],
                ]);
            $this->request = $this->request
                ->withMode("preUpload")
                ->withUploadToken($res->getUploadToken())
                ->withSettings(null);
        }

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getMode() !== null) {
            $json["mode"] = $this->request->getMode();
        }
        if ($this->request->getSettings() !== null) {
            $json["settings"] = $this->request->getSettings();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class VerifyInventoryCurrentMaxCapacityTask extends Gs2RestSessionTask {

    /**
     * @var VerifyInventoryCurrentMaxCapacityRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyInventoryCurrentMaxCapacityTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyInventoryCurrentMaxCapacityRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyInventoryCurrentMaxCapacityRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyInventoryCurrentMaxCapacityResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getCurrentInventoryMaxCapacity() !== null) {
            $json["currentInventoryMaxCapacity"] = $this->request->getCurrentInventoryMaxCapacity();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyInventoryCurrentMaxCapacityByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyInventoryCurrentMaxCapacityByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyInventoryCurrentMaxCapacityByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyInventoryCurrentMaxCapacityByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyInventoryCurrentMaxCapacityByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyInventoryCurrentMaxCapacityByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getCurrentInventoryMaxCapacity() !== null) {
            $json["currentInventoryMaxCapacity"] = $this->request->getCurrentInventoryMaxCapacity();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class VerifyInventoryCurrentMaxCapacityByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyInventoryCurrentMaxCapacityByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyInventoryCurrentMaxCapacityByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyInventoryCurrentMaxCapacityByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyInventoryCurrentMaxCapacityByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyInventoryCurrentMaxCapacityByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/inventory/verify";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AcquireItemSetWithGradeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AcquireItemSetWithGradeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireItemSetWithGradeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireItemSetWithGradeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireItemSetWithGradeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireItemSetWithGradeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/acquire/grade";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getGradeModelId() !== null) {
            $json["gradeModelId"] = $this->request->getGradeModelId();
        }
        if ($this->request->getGradeValue() !== null) {
            $json["gradeValue"] = $this->request->getGradeValue();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class VerifyItemSetTask extends Gs2RestSessionTask {

    /**
     * @var VerifyItemSetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyItemSetTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyItemSetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyItemSetRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyItemSetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/inventory/{inventoryName}/item/{itemName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getItemSetName() !== null) {
            $json["itemSetName"] = $this->request->getItemSetName();
        }
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyItemSetByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyItemSetByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyItemSetByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyItemSetByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyItemSetByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyItemSetByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/inventory/{inventoryName}/item/{itemName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getItemSetName() !== null) {
            $json["itemSetName"] = $this->request->getItemSetName();
        }
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

class AcquireItemSetWithGradeByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AcquireItemSetWithGradeByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireItemSetWithGradeByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireItemSetWithGradeByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireItemSetWithGradeByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireItemSetWithGradeByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/item/acquire/grade";

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

class VerifyItemSetByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyItemSetByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyItemSetByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyItemSetByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyItemSetByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyItemSetByStampTaskResult::class
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
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

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/item/reference/verify";

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

class DescribeSimpleItemsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSimpleItemsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSimpleItemsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSimpleItemsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSimpleItemsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSimpleItemsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/simple/inventory/{inventoryName}/item";

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

class DescribeSimpleItemsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeSimpleItemsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeSimpleItemsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeSimpleItemsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeSimpleItemsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeSimpleItemsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/simple/inventory/{inventoryName}/item";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetSimpleItemTask extends Gs2RestSessionTask {

    /**
     * @var GetSimpleItemRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSimpleItemTask constructor.
     * @param Gs2RestSession $session
     * @param GetSimpleItemRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSimpleItemRequest $request
    ) {
        parent::__construct(
            $session,
            GetSimpleItemResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/simple/inventory/{inventoryName}/item/{itemName}";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetSimpleItemByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetSimpleItemByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSimpleItemByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetSimpleItemByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSimpleItemByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetSimpleItemByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/simple/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetSimpleItemWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var GetSimpleItemWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSimpleItemWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param GetSimpleItemWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSimpleItemWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            GetSimpleItemWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/simple/inventory/{inventoryName}/item/{itemName}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

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

        return parent::executeImpl();
    }
}

class GetSimpleItemWithSignatureByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetSimpleItemWithSignatureByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetSimpleItemWithSignatureByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetSimpleItemWithSignatureByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetSimpleItemWithSignatureByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetSimpleItemWithSignatureByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/simple/inventory/{inventoryName}/item/{itemName}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AcquireSimpleItemsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AcquireSimpleItemsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireSimpleItemsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireSimpleItemsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireSimpleItemsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireSimpleItemsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/simple/inventory/{inventoryName}/acquire";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getAcquireCounts() !== null) {
            $array = [];
            foreach ($this->request->getAcquireCounts() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["acquireCounts"] = $array;
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class ConsumeSimpleItemsTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeSimpleItemsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeSimpleItemsTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeSimpleItemsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeSimpleItemsRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeSimpleItemsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/simple/inventory/{inventoryName}/consume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);

        $json = [];
        if ($this->request->getConsumeCounts() !== null) {
            $array = [];
            foreach ($this->request->getConsumeCounts() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeCounts"] = $array;
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

class ConsumeSimpleItemsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeSimpleItemsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeSimpleItemsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeSimpleItemsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeSimpleItemsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeSimpleItemsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/simple/inventory/{inventoryName}/consume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getConsumeCounts() !== null) {
            $array = [];
            foreach ($this->request->getConsumeCounts() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["consumeCounts"] = $array;
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class SetSimpleItemsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetSimpleItemsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetSimpleItemsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetSimpleItemsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetSimpleItemsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetSimpleItemsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/simple/inventory/{inventoryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getCounts() !== null) {
            $array = [];
            foreach ($this->request->getCounts() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["counts"] = $array;
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeleteSimpleItemsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteSimpleItemsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteSimpleItemsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteSimpleItemsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteSimpleItemsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteSimpleItemsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/simple/inventory/{inventoryName}";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class VerifySimpleItemTask extends Gs2RestSessionTask {

    /**
     * @var VerifySimpleItemRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifySimpleItemTask constructor.
     * @param Gs2RestSession $session
     * @param VerifySimpleItemRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifySimpleItemRequest $request
    ) {
        parent::__construct(
            $session,
            VerifySimpleItemResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/simple/inventory/{inventoryName}/item/{itemName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifySimpleItemByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifySimpleItemByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifySimpleItemByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifySimpleItemByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifySimpleItemByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifySimpleItemByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/simple/inventory/{inventoryName}/item/{itemName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AcquireSimpleItemsByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AcquireSimpleItemsByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireSimpleItemsByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireSimpleItemsByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireSimpleItemsByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireSimpleItemsByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/simple/item/acquire";

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

class ConsumeSimpleItemsByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeSimpleItemsByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeSimpleItemsByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeSimpleItemsByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeSimpleItemsByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeSimpleItemsByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/simple/item/consume";

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

class SetSimpleItemsByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetSimpleItemsByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetSimpleItemsByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetSimpleItemsByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetSimpleItemsByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetSimpleItemsByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/simple/item/set";

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

class VerifySimpleItemByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifySimpleItemByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifySimpleItemByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifySimpleItemByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifySimpleItemByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifySimpleItemByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/simple/item/verify";

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

class DescribeBigItemsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBigItemsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBigItemsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBigItemsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBigItemsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBigItemsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/big/inventory/{inventoryName}/item";

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

class DescribeBigItemsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeBigItemsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeBigItemsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeBigItemsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeBigItemsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeBigItemsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/big/inventory/{inventoryName}/item";

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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class GetBigItemTask extends Gs2RestSessionTask {

    /**
     * @var GetBigItemRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBigItemTask constructor.
     * @param Gs2RestSession $session
     * @param GetBigItemRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBigItemRequest $request
    ) {
        parent::__construct(
            $session,
            GetBigItemResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/big/inventory/{inventoryName}/item/{itemName}";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class GetBigItemByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetBigItemByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetBigItemByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetBigItemByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetBigItemByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetBigItemByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/big/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AcquireBigItemByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AcquireBigItemByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireBigItemByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireBigItemByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireBigItemByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireBigItemByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/big/inventory/{inventoryName}/item/{itemName}/acquire";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $json = [];
        if ($this->request->getAcquireCount() !== null) {
            $json["acquireCount"] = $this->request->getAcquireCount();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class ConsumeBigItemTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeBigItemRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeBigItemTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeBigItemRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeBigItemRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeBigItemResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/big/inventory/{inventoryName}/item/{itemName}/consume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $json = [];
        if ($this->request->getConsumeCount() !== null) {
            $json["consumeCount"] = $this->request->getConsumeCount();
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

class ConsumeBigItemByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeBigItemByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeBigItemByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeBigItemByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeBigItemByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeBigItemByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/big/inventory/{inventoryName}/item/{itemName}/consume";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $json = [];
        if ($this->request->getConsumeCount() !== null) {
            $json["consumeCount"] = $this->request->getConsumeCount();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class SetBigItemByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetBigItemByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetBigItemByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetBigItemByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetBigItemByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetBigItemByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/big/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class DeleteBigItemByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteBigItemByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteBigItemByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteBigItemByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteBigItemByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteBigItemByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/big/inventory/{inventoryName}/item/{itemName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class VerifyBigItemTask extends Gs2RestSessionTask {

    /**
     * @var VerifyBigItemRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyBigItemTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyBigItemRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyBigItemRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyBigItemResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/big/inventory/{inventoryName}/item/{itemName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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

class VerifyBigItemByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyBigItemByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyBigItemByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyBigItemByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyBigItemByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyBigItemByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/big/inventory/{inventoryName}/item/{itemName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{inventoryName}", $this->request->getInventoryName() === null|| strlen($this->request->getInventoryName()) == 0 ? "null" : $this->request->getInventoryName(), $url);
        $url = str_replace("{itemName}", $this->request->getItemName() === null|| strlen($this->request->getItemName()) == 0 ? "null" : $this->request->getItemName(), $url);
        $url = str_replace("{verifyType}", $this->request->getVerifyType() === null|| strlen($this->request->getVerifyType()) == 0 ? "null" : $this->request->getVerifyType(), $url);

        $json = [];
        if ($this->request->getCount() !== null) {
            $json["count"] = $this->request->getCount();
        }
        if ($this->request->getMultiplyValueSpecifyingQuantity() !== null) {
            $json["multiplyValueSpecifyingQuantity"] = $this->request->getMultiplyValueSpecifyingQuantity();
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
        if ($this->request->getTimeOffsetToken() !== null) {
            $this->builder->setHeader("X-GS2-TIME-OFFSET-TOKEN", $this->request->getTimeOffsetToken());
        }

        return parent::executeImpl();
    }
}

class AcquireBigItemByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AcquireBigItemByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireBigItemByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireBigItemByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireBigItemByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireBigItemByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/big/item/acquire";

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

class ConsumeBigItemByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var ConsumeBigItemByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ConsumeBigItemByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param ConsumeBigItemByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ConsumeBigItemByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            ConsumeBigItemByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/big/item/consume";

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

class SetBigItemByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var SetBigItemByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetBigItemByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param SetBigItemByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetBigItemByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            SetBigItemByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/big/item/set";

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

class VerifyBigItemByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyBigItemByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyBigItemByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyBigItemByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyBigItemByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyBigItemByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "inventory", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/big/item/verify";

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
     * @param GetServiceVersionRequest $request
     * @return PromiseInterface
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
     * @param GetServiceVersionRequest $request
     * @return GetServiceVersionResult
     */
    public function getServiceVersion (
            GetServiceVersionRequest $request
    ): GetServiceVersionResult {
        return $this->getServiceVersionAsync(
            $request
        )->wait();
    }

    /**
     * @param DumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function dumpUserDataByUserIdAsync(
            DumpUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DumpUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DumpUserDataByUserIdRequest $request
     * @return DumpUserDataByUserIdResult
     */
    public function dumpUserDataByUserId (
            DumpUserDataByUserIdRequest $request
    ): DumpUserDataByUserIdResult {
        return $this->dumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkDumpUserDataByUserIdAsync(
            CheckDumpUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckDumpUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckDumpUserDataByUserIdRequest $request
     * @return CheckDumpUserDataByUserIdResult
     */
    public function checkDumpUserDataByUserId (
            CheckDumpUserDataByUserIdRequest $request
    ): CheckDumpUserDataByUserIdResult {
        return $this->checkDumpUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function cleanUserDataByUserIdAsync(
            CleanUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CleanUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CleanUserDataByUserIdRequest $request
     * @return CleanUserDataByUserIdResult
     */
    public function cleanUserDataByUserId (
            CleanUserDataByUserIdRequest $request
    ): CleanUserDataByUserIdResult {
        return $this->cleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkCleanUserDataByUserIdAsync(
            CheckCleanUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckCleanUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckCleanUserDataByUserIdRequest $request
     * @return CheckCleanUserDataByUserIdResult
     */
    public function checkCleanUserDataByUserId (
            CheckCleanUserDataByUserIdRequest $request
    ): CheckCleanUserDataByUserIdResult {
        return $this->checkCleanUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function prepareImportUserDataByUserIdAsync(
            PrepareImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PrepareImportUserDataByUserIdRequest $request
     * @return PrepareImportUserDataByUserIdResult
     */
    public function prepareImportUserDataByUserId (
            PrepareImportUserDataByUserIdRequest $request
    ): PrepareImportUserDataByUserIdResult {
        return $this->prepareImportUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function importUserDataByUserIdAsync(
            ImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ImportUserDataByUserIdRequest $request
     * @return ImportUserDataByUserIdResult
     */
    public function importUserDataByUserId (
            ImportUserDataByUserIdRequest $request
    ): ImportUserDataByUserIdResult {
        return $this->importUserDataByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckImportUserDataByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkImportUserDataByUserIdAsync(
            CheckImportUserDataByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckImportUserDataByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckImportUserDataByUserIdRequest $request
     * @return CheckImportUserDataByUserIdResult
     */
    public function checkImportUserDataByUserId (
            CheckImportUserDataByUserIdRequest $request
    ): CheckImportUserDataByUserIdResult {
        return $this->checkImportUserDataByUserIdAsync(
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
     * @param DescribeSimpleInventoryModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeSimpleInventoryModelMastersAsync(
            DescribeSimpleInventoryModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSimpleInventoryModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSimpleInventoryModelMastersRequest $request
     * @return DescribeSimpleInventoryModelMastersResult
     */
    public function describeSimpleInventoryModelMasters (
            DescribeSimpleInventoryModelMastersRequest $request
    ): DescribeSimpleInventoryModelMastersResult {
        return $this->describeSimpleInventoryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateSimpleInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createSimpleInventoryModelMasterAsync(
            CreateSimpleInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateSimpleInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateSimpleInventoryModelMasterRequest $request
     * @return CreateSimpleInventoryModelMasterResult
     */
    public function createSimpleInventoryModelMaster (
            CreateSimpleInventoryModelMasterRequest $request
    ): CreateSimpleInventoryModelMasterResult {
        return $this->createSimpleInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSimpleInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getSimpleInventoryModelMasterAsync(
            GetSimpleInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSimpleInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSimpleInventoryModelMasterRequest $request
     * @return GetSimpleInventoryModelMasterResult
     */
    public function getSimpleInventoryModelMaster (
            GetSimpleInventoryModelMasterRequest $request
    ): GetSimpleInventoryModelMasterResult {
        return $this->getSimpleInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateSimpleInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateSimpleInventoryModelMasterAsync(
            UpdateSimpleInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateSimpleInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateSimpleInventoryModelMasterRequest $request
     * @return UpdateSimpleInventoryModelMasterResult
     */
    public function updateSimpleInventoryModelMaster (
            UpdateSimpleInventoryModelMasterRequest $request
    ): UpdateSimpleInventoryModelMasterResult {
        return $this->updateSimpleInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteSimpleInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteSimpleInventoryModelMasterAsync(
            DeleteSimpleInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSimpleInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteSimpleInventoryModelMasterRequest $request
     * @return DeleteSimpleInventoryModelMasterResult
     */
    public function deleteSimpleInventoryModelMaster (
            DeleteSimpleInventoryModelMasterRequest $request
    ): DeleteSimpleInventoryModelMasterResult {
        return $this->deleteSimpleInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSimpleInventoryModelsRequest $request
     * @return PromiseInterface
     */
    public function describeSimpleInventoryModelsAsync(
            DescribeSimpleInventoryModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSimpleInventoryModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSimpleInventoryModelsRequest $request
     * @return DescribeSimpleInventoryModelsResult
     */
    public function describeSimpleInventoryModels (
            DescribeSimpleInventoryModelsRequest $request
    ): DescribeSimpleInventoryModelsResult {
        return $this->describeSimpleInventoryModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSimpleInventoryModelRequest $request
     * @return PromiseInterface
     */
    public function getSimpleInventoryModelAsync(
            GetSimpleInventoryModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSimpleInventoryModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSimpleInventoryModelRequest $request
     * @return GetSimpleInventoryModelResult
     */
    public function getSimpleInventoryModel (
            GetSimpleInventoryModelRequest $request
    ): GetSimpleInventoryModelResult {
        return $this->getSimpleInventoryModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSimpleItemModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeSimpleItemModelMastersAsync(
            DescribeSimpleItemModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSimpleItemModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSimpleItemModelMastersRequest $request
     * @return DescribeSimpleItemModelMastersResult
     */
    public function describeSimpleItemModelMasters (
            DescribeSimpleItemModelMastersRequest $request
    ): DescribeSimpleItemModelMastersResult {
        return $this->describeSimpleItemModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateSimpleItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createSimpleItemModelMasterAsync(
            CreateSimpleItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateSimpleItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateSimpleItemModelMasterRequest $request
     * @return CreateSimpleItemModelMasterResult
     */
    public function createSimpleItemModelMaster (
            CreateSimpleItemModelMasterRequest $request
    ): CreateSimpleItemModelMasterResult {
        return $this->createSimpleItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSimpleItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getSimpleItemModelMasterAsync(
            GetSimpleItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSimpleItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSimpleItemModelMasterRequest $request
     * @return GetSimpleItemModelMasterResult
     */
    public function getSimpleItemModelMaster (
            GetSimpleItemModelMasterRequest $request
    ): GetSimpleItemModelMasterResult {
        return $this->getSimpleItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateSimpleItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateSimpleItemModelMasterAsync(
            UpdateSimpleItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateSimpleItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateSimpleItemModelMasterRequest $request
     * @return UpdateSimpleItemModelMasterResult
     */
    public function updateSimpleItemModelMaster (
            UpdateSimpleItemModelMasterRequest $request
    ): UpdateSimpleItemModelMasterResult {
        return $this->updateSimpleItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteSimpleItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteSimpleItemModelMasterAsync(
            DeleteSimpleItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSimpleItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteSimpleItemModelMasterRequest $request
     * @return DeleteSimpleItemModelMasterResult
     */
    public function deleteSimpleItemModelMaster (
            DeleteSimpleItemModelMasterRequest $request
    ): DeleteSimpleItemModelMasterResult {
        return $this->deleteSimpleItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSimpleItemModelsRequest $request
     * @return PromiseInterface
     */
    public function describeSimpleItemModelsAsync(
            DescribeSimpleItemModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSimpleItemModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSimpleItemModelsRequest $request
     * @return DescribeSimpleItemModelsResult
     */
    public function describeSimpleItemModels (
            DescribeSimpleItemModelsRequest $request
    ): DescribeSimpleItemModelsResult {
        return $this->describeSimpleItemModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSimpleItemModelRequest $request
     * @return PromiseInterface
     */
    public function getSimpleItemModelAsync(
            GetSimpleItemModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSimpleItemModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSimpleItemModelRequest $request
     * @return GetSimpleItemModelResult
     */
    public function getSimpleItemModel (
            GetSimpleItemModelRequest $request
    ): GetSimpleItemModelResult {
        return $this->getSimpleItemModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBigInventoryModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeBigInventoryModelMastersAsync(
            DescribeBigInventoryModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBigInventoryModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBigInventoryModelMastersRequest $request
     * @return DescribeBigInventoryModelMastersResult
     */
    public function describeBigInventoryModelMasters (
            DescribeBigInventoryModelMastersRequest $request
    ): DescribeBigInventoryModelMastersResult {
        return $this->describeBigInventoryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateBigInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createBigInventoryModelMasterAsync(
            CreateBigInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateBigInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateBigInventoryModelMasterRequest $request
     * @return CreateBigInventoryModelMasterResult
     */
    public function createBigInventoryModelMaster (
            CreateBigInventoryModelMasterRequest $request
    ): CreateBigInventoryModelMasterResult {
        return $this->createBigInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBigInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getBigInventoryModelMasterAsync(
            GetBigInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBigInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBigInventoryModelMasterRequest $request
     * @return GetBigInventoryModelMasterResult
     */
    public function getBigInventoryModelMaster (
            GetBigInventoryModelMasterRequest $request
    ): GetBigInventoryModelMasterResult {
        return $this->getBigInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateBigInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateBigInventoryModelMasterAsync(
            UpdateBigInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateBigInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateBigInventoryModelMasterRequest $request
     * @return UpdateBigInventoryModelMasterResult
     */
    public function updateBigInventoryModelMaster (
            UpdateBigInventoryModelMasterRequest $request
    ): UpdateBigInventoryModelMasterResult {
        return $this->updateBigInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteBigInventoryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteBigInventoryModelMasterAsync(
            DeleteBigInventoryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteBigInventoryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteBigInventoryModelMasterRequest $request
     * @return DeleteBigInventoryModelMasterResult
     */
    public function deleteBigInventoryModelMaster (
            DeleteBigInventoryModelMasterRequest $request
    ): DeleteBigInventoryModelMasterResult {
        return $this->deleteBigInventoryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBigInventoryModelsRequest $request
     * @return PromiseInterface
     */
    public function describeBigInventoryModelsAsync(
            DescribeBigInventoryModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBigInventoryModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBigInventoryModelsRequest $request
     * @return DescribeBigInventoryModelsResult
     */
    public function describeBigInventoryModels (
            DescribeBigInventoryModelsRequest $request
    ): DescribeBigInventoryModelsResult {
        return $this->describeBigInventoryModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBigInventoryModelRequest $request
     * @return PromiseInterface
     */
    public function getBigInventoryModelAsync(
            GetBigInventoryModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBigInventoryModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBigInventoryModelRequest $request
     * @return GetBigInventoryModelResult
     */
    public function getBigInventoryModel (
            GetBigInventoryModelRequest $request
    ): GetBigInventoryModelResult {
        return $this->getBigInventoryModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBigItemModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeBigItemModelMastersAsync(
            DescribeBigItemModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBigItemModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBigItemModelMastersRequest $request
     * @return DescribeBigItemModelMastersResult
     */
    public function describeBigItemModelMasters (
            DescribeBigItemModelMastersRequest $request
    ): DescribeBigItemModelMastersResult {
        return $this->describeBigItemModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateBigItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createBigItemModelMasterAsync(
            CreateBigItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateBigItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateBigItemModelMasterRequest $request
     * @return CreateBigItemModelMasterResult
     */
    public function createBigItemModelMaster (
            CreateBigItemModelMasterRequest $request
    ): CreateBigItemModelMasterResult {
        return $this->createBigItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBigItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getBigItemModelMasterAsync(
            GetBigItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBigItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBigItemModelMasterRequest $request
     * @return GetBigItemModelMasterResult
     */
    public function getBigItemModelMaster (
            GetBigItemModelMasterRequest $request
    ): GetBigItemModelMasterResult {
        return $this->getBigItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateBigItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateBigItemModelMasterAsync(
            UpdateBigItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateBigItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateBigItemModelMasterRequest $request
     * @return UpdateBigItemModelMasterResult
     */
    public function updateBigItemModelMaster (
            UpdateBigItemModelMasterRequest $request
    ): UpdateBigItemModelMasterResult {
        return $this->updateBigItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteBigItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteBigItemModelMasterAsync(
            DeleteBigItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteBigItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteBigItemModelMasterRequest $request
     * @return DeleteBigItemModelMasterResult
     */
    public function deleteBigItemModelMaster (
            DeleteBigItemModelMasterRequest $request
    ): DeleteBigItemModelMasterResult {
        return $this->deleteBigItemModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBigItemModelsRequest $request
     * @return PromiseInterface
     */
    public function describeBigItemModelsAsync(
            DescribeBigItemModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBigItemModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBigItemModelsRequest $request
     * @return DescribeBigItemModelsResult
     */
    public function describeBigItemModels (
            DescribeBigItemModelsRequest $request
    ): DescribeBigItemModelsResult {
        return $this->describeBigItemModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBigItemModelRequest $request
     * @return PromiseInterface
     */
    public function getBigItemModelAsync(
            GetBigItemModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBigItemModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBigItemModelRequest $request
     * @return GetBigItemModelResult
     */
    public function getBigItemModel (
            GetBigItemModelRequest $request
    ): GetBigItemModelResult {
        return $this->getBigItemModelAsync(
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
     * @param PreUpdateCurrentItemModelMasterRequest $request
     * @return PromiseInterface
     */
    public function preUpdateCurrentItemModelMasterAsync(
            PreUpdateCurrentItemModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentItemModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreUpdateCurrentItemModelMasterRequest $request
     * @return PreUpdateCurrentItemModelMasterResult
     */
    public function preUpdateCurrentItemModelMaster (
            PreUpdateCurrentItemModelMasterRequest $request
    ): PreUpdateCurrentItemModelMasterResult {
        return $this->preUpdateCurrentItemModelMasterAsync(
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
     * @param VerifyInventoryCurrentMaxCapacityRequest $request
     * @return PromiseInterface
     */
    public function verifyInventoryCurrentMaxCapacityAsync(
            VerifyInventoryCurrentMaxCapacityRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyInventoryCurrentMaxCapacityTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyInventoryCurrentMaxCapacityRequest $request
     * @return VerifyInventoryCurrentMaxCapacityResult
     */
    public function verifyInventoryCurrentMaxCapacity (
            VerifyInventoryCurrentMaxCapacityRequest $request
    ): VerifyInventoryCurrentMaxCapacityResult {
        return $this->verifyInventoryCurrentMaxCapacityAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyInventoryCurrentMaxCapacityByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyInventoryCurrentMaxCapacityByUserIdAsync(
            VerifyInventoryCurrentMaxCapacityByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyInventoryCurrentMaxCapacityByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyInventoryCurrentMaxCapacityByUserIdRequest $request
     * @return VerifyInventoryCurrentMaxCapacityByUserIdResult
     */
    public function verifyInventoryCurrentMaxCapacityByUserId (
            VerifyInventoryCurrentMaxCapacityByUserIdRequest $request
    ): VerifyInventoryCurrentMaxCapacityByUserIdResult {
        return $this->verifyInventoryCurrentMaxCapacityByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyInventoryCurrentMaxCapacityByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyInventoryCurrentMaxCapacityByStampTaskAsync(
            VerifyInventoryCurrentMaxCapacityByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyInventoryCurrentMaxCapacityByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyInventoryCurrentMaxCapacityByStampTaskRequest $request
     * @return VerifyInventoryCurrentMaxCapacityByStampTaskResult
     */
    public function verifyInventoryCurrentMaxCapacityByStampTask (
            VerifyInventoryCurrentMaxCapacityByStampTaskRequest $request
    ): VerifyInventoryCurrentMaxCapacityByStampTaskResult {
        return $this->verifyInventoryCurrentMaxCapacityByStampTaskAsync(
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
     * @param AcquireItemSetWithGradeByUserIdRequest $request
     * @return PromiseInterface
     */
    public function acquireItemSetWithGradeByUserIdAsync(
            AcquireItemSetWithGradeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireItemSetWithGradeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireItemSetWithGradeByUserIdRequest $request
     * @return AcquireItemSetWithGradeByUserIdResult
     */
    public function acquireItemSetWithGradeByUserId (
            AcquireItemSetWithGradeByUserIdRequest $request
    ): AcquireItemSetWithGradeByUserIdResult {
        return $this->acquireItemSetWithGradeByUserIdAsync(
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
     * @param VerifyItemSetRequest $request
     * @return PromiseInterface
     */
    public function verifyItemSetAsync(
            VerifyItemSetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyItemSetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyItemSetRequest $request
     * @return VerifyItemSetResult
     */
    public function verifyItemSet (
            VerifyItemSetRequest $request
    ): VerifyItemSetResult {
        return $this->verifyItemSetAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyItemSetByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyItemSetByUserIdAsync(
            VerifyItemSetByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyItemSetByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyItemSetByUserIdRequest $request
     * @return VerifyItemSetByUserIdResult
     */
    public function verifyItemSetByUserId (
            VerifyItemSetByUserIdRequest $request
    ): VerifyItemSetByUserIdResult {
        return $this->verifyItemSetByUserIdAsync(
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
     * @param AcquireItemSetWithGradeByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function acquireItemSetWithGradeByStampSheetAsync(
            AcquireItemSetWithGradeByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireItemSetWithGradeByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireItemSetWithGradeByStampSheetRequest $request
     * @return AcquireItemSetWithGradeByStampSheetResult
     */
    public function acquireItemSetWithGradeByStampSheet (
            AcquireItemSetWithGradeByStampSheetRequest $request
    ): AcquireItemSetWithGradeByStampSheetResult {
        return $this->acquireItemSetWithGradeByStampSheetAsync(
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
     * @param VerifyItemSetByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyItemSetByStampTaskAsync(
            VerifyItemSetByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyItemSetByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyItemSetByStampTaskRequest $request
     * @return VerifyItemSetByStampTaskResult
     */
    public function verifyItemSetByStampTask (
            VerifyItemSetByStampTaskRequest $request
    ): VerifyItemSetByStampTaskResult {
        return $this->verifyItemSetByStampTaskAsync(
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

    /**
     * @param DescribeSimpleItemsRequest $request
     * @return PromiseInterface
     */
    public function describeSimpleItemsAsync(
            DescribeSimpleItemsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSimpleItemsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSimpleItemsRequest $request
     * @return DescribeSimpleItemsResult
     */
    public function describeSimpleItems (
            DescribeSimpleItemsRequest $request
    ): DescribeSimpleItemsResult {
        return $this->describeSimpleItemsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeSimpleItemsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeSimpleItemsByUserIdAsync(
            DescribeSimpleItemsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeSimpleItemsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeSimpleItemsByUserIdRequest $request
     * @return DescribeSimpleItemsByUserIdResult
     */
    public function describeSimpleItemsByUserId (
            DescribeSimpleItemsByUserIdRequest $request
    ): DescribeSimpleItemsByUserIdResult {
        return $this->describeSimpleItemsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSimpleItemRequest $request
     * @return PromiseInterface
     */
    public function getSimpleItemAsync(
            GetSimpleItemRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSimpleItemTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSimpleItemRequest $request
     * @return GetSimpleItemResult
     */
    public function getSimpleItem (
            GetSimpleItemRequest $request
    ): GetSimpleItemResult {
        return $this->getSimpleItemAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSimpleItemByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getSimpleItemByUserIdAsync(
            GetSimpleItemByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSimpleItemByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSimpleItemByUserIdRequest $request
     * @return GetSimpleItemByUserIdResult
     */
    public function getSimpleItemByUserId (
            GetSimpleItemByUserIdRequest $request
    ): GetSimpleItemByUserIdResult {
        return $this->getSimpleItemByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSimpleItemWithSignatureRequest $request
     * @return PromiseInterface
     */
    public function getSimpleItemWithSignatureAsync(
            GetSimpleItemWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSimpleItemWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSimpleItemWithSignatureRequest $request
     * @return GetSimpleItemWithSignatureResult
     */
    public function getSimpleItemWithSignature (
            GetSimpleItemWithSignatureRequest $request
    ): GetSimpleItemWithSignatureResult {
        return $this->getSimpleItemWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * @param GetSimpleItemWithSignatureByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getSimpleItemWithSignatureByUserIdAsync(
            GetSimpleItemWithSignatureByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetSimpleItemWithSignatureByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetSimpleItemWithSignatureByUserIdRequest $request
     * @return GetSimpleItemWithSignatureByUserIdResult
     */
    public function getSimpleItemWithSignatureByUserId (
            GetSimpleItemWithSignatureByUserIdRequest $request
    ): GetSimpleItemWithSignatureByUserIdResult {
        return $this->getSimpleItemWithSignatureByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireSimpleItemsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function acquireSimpleItemsByUserIdAsync(
            AcquireSimpleItemsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireSimpleItemsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireSimpleItemsByUserIdRequest $request
     * @return AcquireSimpleItemsByUserIdResult
     */
    public function acquireSimpleItemsByUserId (
            AcquireSimpleItemsByUserIdRequest $request
    ): AcquireSimpleItemsByUserIdResult {
        return $this->acquireSimpleItemsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeSimpleItemsRequest $request
     * @return PromiseInterface
     */
    public function consumeSimpleItemsAsync(
            ConsumeSimpleItemsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeSimpleItemsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeSimpleItemsRequest $request
     * @return ConsumeSimpleItemsResult
     */
    public function consumeSimpleItems (
            ConsumeSimpleItemsRequest $request
    ): ConsumeSimpleItemsResult {
        return $this->consumeSimpleItemsAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeSimpleItemsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function consumeSimpleItemsByUserIdAsync(
            ConsumeSimpleItemsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeSimpleItemsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeSimpleItemsByUserIdRequest $request
     * @return ConsumeSimpleItemsByUserIdResult
     */
    public function consumeSimpleItemsByUserId (
            ConsumeSimpleItemsByUserIdRequest $request
    ): ConsumeSimpleItemsByUserIdResult {
        return $this->consumeSimpleItemsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetSimpleItemsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setSimpleItemsByUserIdAsync(
            SetSimpleItemsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetSimpleItemsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetSimpleItemsByUserIdRequest $request
     * @return SetSimpleItemsByUserIdResult
     */
    public function setSimpleItemsByUserId (
            SetSimpleItemsByUserIdRequest $request
    ): SetSimpleItemsByUserIdResult {
        return $this->setSimpleItemsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteSimpleItemsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteSimpleItemsByUserIdAsync(
            DeleteSimpleItemsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteSimpleItemsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteSimpleItemsByUserIdRequest $request
     * @return DeleteSimpleItemsByUserIdResult
     */
    public function deleteSimpleItemsByUserId (
            DeleteSimpleItemsByUserIdRequest $request
    ): DeleteSimpleItemsByUserIdResult {
        return $this->deleteSimpleItemsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifySimpleItemRequest $request
     * @return PromiseInterface
     */
    public function verifySimpleItemAsync(
            VerifySimpleItemRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifySimpleItemTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifySimpleItemRequest $request
     * @return VerifySimpleItemResult
     */
    public function verifySimpleItem (
            VerifySimpleItemRequest $request
    ): VerifySimpleItemResult {
        return $this->verifySimpleItemAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifySimpleItemByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifySimpleItemByUserIdAsync(
            VerifySimpleItemByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifySimpleItemByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifySimpleItemByUserIdRequest $request
     * @return VerifySimpleItemByUserIdResult
     */
    public function verifySimpleItemByUserId (
            VerifySimpleItemByUserIdRequest $request
    ): VerifySimpleItemByUserIdResult {
        return $this->verifySimpleItemByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireSimpleItemsByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function acquireSimpleItemsByStampSheetAsync(
            AcquireSimpleItemsByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireSimpleItemsByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireSimpleItemsByStampSheetRequest $request
     * @return AcquireSimpleItemsByStampSheetResult
     */
    public function acquireSimpleItemsByStampSheet (
            AcquireSimpleItemsByStampSheetRequest $request
    ): AcquireSimpleItemsByStampSheetResult {
        return $this->acquireSimpleItemsByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeSimpleItemsByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function consumeSimpleItemsByStampTaskAsync(
            ConsumeSimpleItemsByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeSimpleItemsByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeSimpleItemsByStampTaskRequest $request
     * @return ConsumeSimpleItemsByStampTaskResult
     */
    public function consumeSimpleItemsByStampTask (
            ConsumeSimpleItemsByStampTaskRequest $request
    ): ConsumeSimpleItemsByStampTaskResult {
        return $this->consumeSimpleItemsByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param SetSimpleItemsByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function setSimpleItemsByStampSheetAsync(
            SetSimpleItemsByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetSimpleItemsByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetSimpleItemsByStampSheetRequest $request
     * @return SetSimpleItemsByStampSheetResult
     */
    public function setSimpleItemsByStampSheet (
            SetSimpleItemsByStampSheetRequest $request
    ): SetSimpleItemsByStampSheetResult {
        return $this->setSimpleItemsByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifySimpleItemByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifySimpleItemByStampTaskAsync(
            VerifySimpleItemByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifySimpleItemByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifySimpleItemByStampTaskRequest $request
     * @return VerifySimpleItemByStampTaskResult
     */
    public function verifySimpleItemByStampTask (
            VerifySimpleItemByStampTaskRequest $request
    ): VerifySimpleItemByStampTaskResult {
        return $this->verifySimpleItemByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBigItemsRequest $request
     * @return PromiseInterface
     */
    public function describeBigItemsAsync(
            DescribeBigItemsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBigItemsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBigItemsRequest $request
     * @return DescribeBigItemsResult
     */
    public function describeBigItems (
            DescribeBigItemsRequest $request
    ): DescribeBigItemsResult {
        return $this->describeBigItemsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeBigItemsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeBigItemsByUserIdAsync(
            DescribeBigItemsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeBigItemsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeBigItemsByUserIdRequest $request
     * @return DescribeBigItemsByUserIdResult
     */
    public function describeBigItemsByUserId (
            DescribeBigItemsByUserIdRequest $request
    ): DescribeBigItemsByUserIdResult {
        return $this->describeBigItemsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBigItemRequest $request
     * @return PromiseInterface
     */
    public function getBigItemAsync(
            GetBigItemRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBigItemTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBigItemRequest $request
     * @return GetBigItemResult
     */
    public function getBigItem (
            GetBigItemRequest $request
    ): GetBigItemResult {
        return $this->getBigItemAsync(
            $request
        )->wait();
    }

    /**
     * @param GetBigItemByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getBigItemByUserIdAsync(
            GetBigItemByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetBigItemByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetBigItemByUserIdRequest $request
     * @return GetBigItemByUserIdResult
     */
    public function getBigItemByUserId (
            GetBigItemByUserIdRequest $request
    ): GetBigItemByUserIdResult {
        return $this->getBigItemByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireBigItemByUserIdRequest $request
     * @return PromiseInterface
     */
    public function acquireBigItemByUserIdAsync(
            AcquireBigItemByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireBigItemByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireBigItemByUserIdRequest $request
     * @return AcquireBigItemByUserIdResult
     */
    public function acquireBigItemByUserId (
            AcquireBigItemByUserIdRequest $request
    ): AcquireBigItemByUserIdResult {
        return $this->acquireBigItemByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeBigItemRequest $request
     * @return PromiseInterface
     */
    public function consumeBigItemAsync(
            ConsumeBigItemRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeBigItemTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeBigItemRequest $request
     * @return ConsumeBigItemResult
     */
    public function consumeBigItem (
            ConsumeBigItemRequest $request
    ): ConsumeBigItemResult {
        return $this->consumeBigItemAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeBigItemByUserIdRequest $request
     * @return PromiseInterface
     */
    public function consumeBigItemByUserIdAsync(
            ConsumeBigItemByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeBigItemByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeBigItemByUserIdRequest $request
     * @return ConsumeBigItemByUserIdResult
     */
    public function consumeBigItemByUserId (
            ConsumeBigItemByUserIdRequest $request
    ): ConsumeBigItemByUserIdResult {
        return $this->consumeBigItemByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetBigItemByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setBigItemByUserIdAsync(
            SetBigItemByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetBigItemByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetBigItemByUserIdRequest $request
     * @return SetBigItemByUserIdResult
     */
    public function setBigItemByUserId (
            SetBigItemByUserIdRequest $request
    ): SetBigItemByUserIdResult {
        return $this->setBigItemByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteBigItemByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteBigItemByUserIdAsync(
            DeleteBigItemByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteBigItemByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteBigItemByUserIdRequest $request
     * @return DeleteBigItemByUserIdResult
     */
    public function deleteBigItemByUserId (
            DeleteBigItemByUserIdRequest $request
    ): DeleteBigItemByUserIdResult {
        return $this->deleteBigItemByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyBigItemRequest $request
     * @return PromiseInterface
     */
    public function verifyBigItemAsync(
            VerifyBigItemRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyBigItemTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyBigItemRequest $request
     * @return VerifyBigItemResult
     */
    public function verifyBigItem (
            VerifyBigItemRequest $request
    ): VerifyBigItemResult {
        return $this->verifyBigItemAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyBigItemByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyBigItemByUserIdAsync(
            VerifyBigItemByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyBigItemByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyBigItemByUserIdRequest $request
     * @return VerifyBigItemByUserIdResult
     */
    public function verifyBigItemByUserId (
            VerifyBigItemByUserIdRequest $request
    ): VerifyBigItemByUserIdResult {
        return $this->verifyBigItemByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireBigItemByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function acquireBigItemByStampSheetAsync(
            AcquireBigItemByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireBigItemByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireBigItemByStampSheetRequest $request
     * @return AcquireBigItemByStampSheetResult
     */
    public function acquireBigItemByStampSheet (
            AcquireBigItemByStampSheetRequest $request
    ): AcquireBigItemByStampSheetResult {
        return $this->acquireBigItemByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param ConsumeBigItemByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function consumeBigItemByStampTaskAsync(
            ConsumeBigItemByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ConsumeBigItemByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ConsumeBigItemByStampTaskRequest $request
     * @return ConsumeBigItemByStampTaskResult
     */
    public function consumeBigItemByStampTask (
            ConsumeBigItemByStampTaskRequest $request
    ): ConsumeBigItemByStampTaskResult {
        return $this->consumeBigItemByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param SetBigItemByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function setBigItemByStampSheetAsync(
            SetBigItemByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetBigItemByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetBigItemByStampSheetRequest $request
     * @return SetBigItemByStampSheetResult
     */
    public function setBigItemByStampSheet (
            SetBigItemByStampSheetRequest $request
    ): SetBigItemByStampSheetResult {
        return $this->setBigItemByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyBigItemByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyBigItemByStampTaskAsync(
            VerifyBigItemByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyBigItemByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyBigItemByStampTaskRequest $request
     * @return VerifyBigItemByStampTaskResult
     */
    public function verifyBigItemByStampTask (
            VerifyBigItemByStampTaskRequest $request
    ): VerifyBigItemByStampTaskResult {
        return $this->verifyBigItemByStampTaskAsync(
            $request
        )->wait();
    }
}