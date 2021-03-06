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

namespace Gs2\Formation;

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


use Gs2\Formation\Request\DescribeNamespacesRequest;
use Gs2\Formation\Result\DescribeNamespacesResult;
use Gs2\Formation\Request\CreateNamespaceRequest;
use Gs2\Formation\Result\CreateNamespaceResult;
use Gs2\Formation\Request\GetNamespaceStatusRequest;
use Gs2\Formation\Result\GetNamespaceStatusResult;
use Gs2\Formation\Request\GetNamespaceRequest;
use Gs2\Formation\Result\GetNamespaceResult;
use Gs2\Formation\Request\UpdateNamespaceRequest;
use Gs2\Formation\Result\UpdateNamespaceResult;
use Gs2\Formation\Request\DeleteNamespaceRequest;
use Gs2\Formation\Result\DeleteNamespaceResult;
use Gs2\Formation\Request\DescribeFormModelMastersRequest;
use Gs2\Formation\Result\DescribeFormModelMastersResult;
use Gs2\Formation\Request\CreateFormModelMasterRequest;
use Gs2\Formation\Result\CreateFormModelMasterResult;
use Gs2\Formation\Request\GetFormModelMasterRequest;
use Gs2\Formation\Result\GetFormModelMasterResult;
use Gs2\Formation\Request\UpdateFormModelMasterRequest;
use Gs2\Formation\Result\UpdateFormModelMasterResult;
use Gs2\Formation\Request\DeleteFormModelMasterRequest;
use Gs2\Formation\Result\DeleteFormModelMasterResult;
use Gs2\Formation\Request\DescribeMoldModelsRequest;
use Gs2\Formation\Result\DescribeMoldModelsResult;
use Gs2\Formation\Request\GetMoldModelRequest;
use Gs2\Formation\Result\GetMoldModelResult;
use Gs2\Formation\Request\DescribeMoldModelMastersRequest;
use Gs2\Formation\Result\DescribeMoldModelMastersResult;
use Gs2\Formation\Request\CreateMoldModelMasterRequest;
use Gs2\Formation\Result\CreateMoldModelMasterResult;
use Gs2\Formation\Request\GetMoldModelMasterRequest;
use Gs2\Formation\Result\GetMoldModelMasterResult;
use Gs2\Formation\Request\UpdateMoldModelMasterRequest;
use Gs2\Formation\Result\UpdateMoldModelMasterResult;
use Gs2\Formation\Request\DeleteMoldModelMasterRequest;
use Gs2\Formation\Result\DeleteMoldModelMasterResult;
use Gs2\Formation\Request\ExportMasterRequest;
use Gs2\Formation\Result\ExportMasterResult;
use Gs2\Formation\Request\GetCurrentFormMasterRequest;
use Gs2\Formation\Result\GetCurrentFormMasterResult;
use Gs2\Formation\Request\UpdateCurrentFormMasterRequest;
use Gs2\Formation\Result\UpdateCurrentFormMasterResult;
use Gs2\Formation\Request\UpdateCurrentFormMasterFromGitHubRequest;
use Gs2\Formation\Result\UpdateCurrentFormMasterFromGitHubResult;
use Gs2\Formation\Request\DescribeMoldsRequest;
use Gs2\Formation\Result\DescribeMoldsResult;
use Gs2\Formation\Request\DescribeMoldsByUserIdRequest;
use Gs2\Formation\Result\DescribeMoldsByUserIdResult;
use Gs2\Formation\Request\GetMoldRequest;
use Gs2\Formation\Result\GetMoldResult;
use Gs2\Formation\Request\GetMoldByUserIdRequest;
use Gs2\Formation\Result\GetMoldByUserIdResult;
use Gs2\Formation\Request\SetMoldCapacityByUserIdRequest;
use Gs2\Formation\Result\SetMoldCapacityByUserIdResult;
use Gs2\Formation\Request\AddMoldCapacityByUserIdRequest;
use Gs2\Formation\Result\AddMoldCapacityByUserIdResult;
use Gs2\Formation\Request\DeleteMoldRequest;
use Gs2\Formation\Result\DeleteMoldResult;
use Gs2\Formation\Request\DeleteMoldByUserIdRequest;
use Gs2\Formation\Result\DeleteMoldByUserIdResult;
use Gs2\Formation\Request\AddCapacityByStampSheetRequest;
use Gs2\Formation\Result\AddCapacityByStampSheetResult;
use Gs2\Formation\Request\SetCapacityByStampSheetRequest;
use Gs2\Formation\Result\SetCapacityByStampSheetResult;
use Gs2\Formation\Request\DescribeFormsRequest;
use Gs2\Formation\Result\DescribeFormsResult;
use Gs2\Formation\Request\DescribeFormsByUserIdRequest;
use Gs2\Formation\Result\DescribeFormsByUserIdResult;
use Gs2\Formation\Request\GetFormRequest;
use Gs2\Formation\Result\GetFormResult;
use Gs2\Formation\Request\GetFormByUserIdRequest;
use Gs2\Formation\Result\GetFormByUserIdResult;
use Gs2\Formation\Request\GetFormWithSignatureRequest;
use Gs2\Formation\Result\GetFormWithSignatureResult;
use Gs2\Formation\Request\GetFormWithSignatureByUserIdRequest;
use Gs2\Formation\Result\GetFormWithSignatureByUserIdResult;
use Gs2\Formation\Request\SetFormByUserIdRequest;
use Gs2\Formation\Result\SetFormByUserIdResult;
use Gs2\Formation\Request\SetFormWithSignatureRequest;
use Gs2\Formation\Result\SetFormWithSignatureResult;
use Gs2\Formation\Request\AcquireActionsToFormPropertiesRequest;
use Gs2\Formation\Result\AcquireActionsToFormPropertiesResult;
use Gs2\Formation\Request\DeleteFormRequest;
use Gs2\Formation\Result\DeleteFormResult;
use Gs2\Formation\Request\DeleteFormByUserIdRequest;
use Gs2\Formation\Result\DeleteFormByUserIdResult;
use Gs2\Formation\Request\AcquireActionToFormPropertiesByStampSheetRequest;
use Gs2\Formation\Result\AcquireActionToFormPropertiesByStampSheetResult;

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

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getUpdateMoldScript() !== null) {
            $json["updateMoldScript"] = $this->request->getUpdateMoldScript()->toJson();
        }
        if ($this->request->getUpdateFormScript() !== null) {
            $json["updateFormScript"] = $this->request->getUpdateFormScript()->toJson();
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

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getUpdateMoldScript() !== null) {
            $json["updateMoldScript"] = $this->request->getUpdateMoldScript()->toJson();
        }
        if ($this->request->getUpdateFormScript() !== null) {
            $json["updateFormScript"] = $this->request->getUpdateFormScript()->toJson();
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

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeFormModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFormModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFormModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFormModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFormModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFormModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form";

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

class CreateFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form";

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
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
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

class GetFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form/{formModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{formModelName}", $this->request->getFormModelName() === null|| strlen($this->request->getFormModelName()) == 0 ? "null" : $this->request->getFormModelName(), $url);

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

class UpdateFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form/{formModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{formModelName}", $this->request->getFormModelName() === null|| strlen($this->request->getFormModelName()) == 0 ? "null" : $this->request->getFormModelName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
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

class DeleteFormModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFormModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFormModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFormModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFormModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFormModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/form/{formModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{formModelName}", $this->request->getFormModelName() === null|| strlen($this->request->getFormModelName()) == 0 ? "null" : $this->request->getFormModelName(), $url);

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

class DescribeMoldModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoldModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoldModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoldModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoldModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoldModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/mold";

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

class GetMoldModelTask extends Gs2RestSessionTask {

    /**
     * @var GetMoldModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMoldModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetMoldModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMoldModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetMoldModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

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

class DescribeMoldModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoldModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoldModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoldModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoldModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoldModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold";

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

class CreateMoldModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateMoldModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateMoldModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateMoldModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateMoldModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateMoldModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold";

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
        if ($this->request->getFormModelName() !== null) {
            $json["formModelName"] = $this->request->getFormModelName();
        }
        if ($this->request->getInitialMaxCapacity() !== null) {
            $json["initialMaxCapacity"] = $this->request->getInitialMaxCapacity();
        }
        if ($this->request->getMaxCapacity() !== null) {
            $json["maxCapacity"] = $this->request->getMaxCapacity();
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

class GetMoldModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetMoldModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMoldModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetMoldModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMoldModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetMoldModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

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

class UpdateMoldModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateMoldModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateMoldModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateMoldModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateMoldModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateMoldModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getFormModelName() !== null) {
            $json["formModelName"] = $this->request->getFormModelName();
        }
        if ($this->request->getInitialMaxCapacity() !== null) {
            $json["initialMaxCapacity"] = $this->request->getInitialMaxCapacity();
        }
        if ($this->request->getMaxCapacity() !== null) {
            $json["maxCapacity"] = $this->request->getMaxCapacity();
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

class DeleteMoldModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMoldModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMoldModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMoldModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMoldModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMoldModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

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

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentFormMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentFormMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentFormMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentFormMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentFormMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentFormMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentFormMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentFormMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentFormMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentFormMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentFormMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentFormMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentFormMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentFormMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentFormMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentFormMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentFormMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentFormMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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

class DescribeMoldsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoldsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoldsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoldsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoldsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoldsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold";

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

class DescribeMoldsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeMoldsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeMoldsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeMoldsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeMoldsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeMoldsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold";

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

class GetMoldTask extends Gs2RestSessionTask {

    /**
     * @var GetMoldRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMoldTask constructor.
     * @param Gs2RestSession $session
     * @param GetMoldRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMoldRequest $request
    ) {
        parent::__construct(
            $session,
            GetMoldResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

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

class GetMoldByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetMoldByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetMoldByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetMoldByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetMoldByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetMoldByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

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

class SetMoldCapacityByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetMoldCapacityByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetMoldCapacityByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetMoldCapacityByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetMoldCapacityByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetMoldCapacityByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

        $json = [];
        if ($this->request->getCapacity() !== null) {
            $json["capacity"] = $this->request->getCapacity();
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

class AddMoldCapacityByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddMoldCapacityByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddMoldCapacityByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddMoldCapacityByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddMoldCapacityByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddMoldCapacityByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

        $json = [];
        if ($this->request->getCapacity() !== null) {
            $json["capacity"] = $this->request->getCapacity();
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

class DeleteMoldTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMoldRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMoldTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMoldRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMoldRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMoldResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

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

        return parent::executeImpl();
    }
}

class DeleteMoldByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteMoldByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteMoldByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteMoldByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteMoldByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteMoldByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

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

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/mold/capacity/add";

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

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/mold/capacity/set";

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

class DescribeFormsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFormsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFormsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFormsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFormsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFormsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldName}/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);

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

class DescribeFormsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeFormsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeFormsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeFormsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeFormsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeFormsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}/form";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
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

class GetFormTask extends Gs2RestSessionTask {

    /**
     * @var GetFormRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

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

class GetFormByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetFormByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

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

class GetFormWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var GetFormWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldName}/form/{index}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

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

class GetFormWithSignatureByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetFormWithSignatureByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetFormWithSignatureByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetFormWithSignatureByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetFormWithSignatureByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetFormWithSignatureByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}/form/{index}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

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

        return parent::executeImpl();
    }
}

class SetFormByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var SetFormByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetFormByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param SetFormByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetFormByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            SetFormByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $json = [];
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
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

class SetFormWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var SetFormWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * SetFormWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param SetFormWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        SetFormWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            SetFormWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $json = [];
        if ($this->request->getSlots() !== null) {
            $array = [];
            foreach ($this->request->getSlots() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["slots"] = $array;
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }

        return parent::executeImpl();
    }
}

class AcquireActionsToFormPropertiesTask extends Gs2RestSessionTask {

    /**
     * @var AcquireActionsToFormPropertiesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireActionsToFormPropertiesTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireActionsToFormPropertiesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireActionsToFormPropertiesRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireActionsToFormPropertiesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}/form/{index}/stamp/delegate";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

        $json = [];
        if ($this->request->getAcquireAction() !== null) {
            $json["acquireAction"] = $this->request->getAcquireAction()->toJson();
        }
        if ($this->request->getQueueNamespaceId() !== null) {
            $json["queueNamespaceId"] = $this->request->getQueueNamespaceId();
        }
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
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

class DeleteFormTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFormRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFormTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFormRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFormRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFormResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/mold/{moldName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

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

        return parent::executeImpl();
    }
}

class DeleteFormByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteFormByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteFormByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteFormByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteFormByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteFormByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/mold/{moldName}/form/{index}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{moldName}", $this->request->getMoldName() === null|| strlen($this->request->getMoldName()) == 0 ? "null" : $this->request->getMoldName(), $url);
        $url = str_replace("{index}", $this->request->getIndex() === null ? "null" : $this->request->getIndex(), $url);

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

class AcquireActionToFormPropertiesByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AcquireActionToFormPropertiesByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcquireActionToFormPropertiesByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AcquireActionToFormPropertiesByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcquireActionToFormPropertiesByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AcquireActionToFormPropertiesByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "formation", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/form/acquire";

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

/**
 * GS2 Formation API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2FormationRestClient extends AbstractGs2Client {

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
     * @param DescribeFormModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeFormModelMastersAsync(
            DescribeFormModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFormModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeFormModelMastersRequest $request
     * @return DescribeFormModelMastersResult
     */
    public function describeFormModelMasters (
            DescribeFormModelMastersRequest $request
    ): DescribeFormModelMastersResult {
        return $this->describeFormModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateFormModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createFormModelMasterAsync(
            CreateFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateFormModelMasterRequest $request
     * @return CreateFormModelMasterResult
     */
    public function createFormModelMaster (
            CreateFormModelMasterRequest $request
    ): CreateFormModelMasterResult {
        return $this->createFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFormModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getFormModelMasterAsync(
            GetFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFormModelMasterRequest $request
     * @return GetFormModelMasterResult
     */
    public function getFormModelMaster (
            GetFormModelMasterRequest $request
    ): GetFormModelMasterResult {
        return $this->getFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateFormModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateFormModelMasterAsync(
            UpdateFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateFormModelMasterRequest $request
     * @return UpdateFormModelMasterResult
     */
    public function updateFormModelMaster (
            UpdateFormModelMasterRequest $request
    ): UpdateFormModelMasterResult {
        return $this->updateFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteFormModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteFormModelMasterAsync(
            DeleteFormModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFormModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteFormModelMasterRequest $request
     * @return DeleteFormModelMasterResult
     */
    public function deleteFormModelMaster (
            DeleteFormModelMasterRequest $request
    ): DeleteFormModelMasterResult {
        return $this->deleteFormModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMoldModelsRequest $request
     * @return PromiseInterface
     */
    public function describeMoldModelsAsync(
            DescribeMoldModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoldModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMoldModelsRequest $request
     * @return DescribeMoldModelsResult
     */
    public function describeMoldModels (
            DescribeMoldModelsRequest $request
    ): DescribeMoldModelsResult {
        return $this->describeMoldModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMoldModelRequest $request
     * @return PromiseInterface
     */
    public function getMoldModelAsync(
            GetMoldModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMoldModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMoldModelRequest $request
     * @return GetMoldModelResult
     */
    public function getMoldModel (
            GetMoldModelRequest $request
    ): GetMoldModelResult {
        return $this->getMoldModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMoldModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeMoldModelMastersAsync(
            DescribeMoldModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoldModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMoldModelMastersRequest $request
     * @return DescribeMoldModelMastersResult
     */
    public function describeMoldModelMasters (
            DescribeMoldModelMastersRequest $request
    ): DescribeMoldModelMastersResult {
        return $this->describeMoldModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateMoldModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createMoldModelMasterAsync(
            CreateMoldModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateMoldModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateMoldModelMasterRequest $request
     * @return CreateMoldModelMasterResult
     */
    public function createMoldModelMaster (
            CreateMoldModelMasterRequest $request
    ): CreateMoldModelMasterResult {
        return $this->createMoldModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMoldModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getMoldModelMasterAsync(
            GetMoldModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMoldModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMoldModelMasterRequest $request
     * @return GetMoldModelMasterResult
     */
    public function getMoldModelMaster (
            GetMoldModelMasterRequest $request
    ): GetMoldModelMasterResult {
        return $this->getMoldModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateMoldModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateMoldModelMasterAsync(
            UpdateMoldModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateMoldModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateMoldModelMasterRequest $request
     * @return UpdateMoldModelMasterResult
     */
    public function updateMoldModelMaster (
            UpdateMoldModelMasterRequest $request
    ): UpdateMoldModelMasterResult {
        return $this->updateMoldModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteMoldModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteMoldModelMasterAsync(
            DeleteMoldModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMoldModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteMoldModelMasterRequest $request
     * @return DeleteMoldModelMasterResult
     */
    public function deleteMoldModelMaster (
            DeleteMoldModelMasterRequest $request
    ): DeleteMoldModelMasterResult {
        return $this->deleteMoldModelMasterAsync(
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
     * @param GetCurrentFormMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentFormMasterAsync(
            GetCurrentFormMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentFormMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentFormMasterRequest $request
     * @return GetCurrentFormMasterResult
     */
    public function getCurrentFormMaster (
            GetCurrentFormMasterRequest $request
    ): GetCurrentFormMasterResult {
        return $this->getCurrentFormMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentFormMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentFormMasterAsync(
            UpdateCurrentFormMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentFormMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentFormMasterRequest $request
     * @return UpdateCurrentFormMasterResult
     */
    public function updateCurrentFormMaster (
            UpdateCurrentFormMasterRequest $request
    ): UpdateCurrentFormMasterResult {
        return $this->updateCurrentFormMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentFormMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentFormMasterFromGitHubAsync(
            UpdateCurrentFormMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentFormMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentFormMasterFromGitHubRequest $request
     * @return UpdateCurrentFormMasterFromGitHubResult
     */
    public function updateCurrentFormMasterFromGitHub (
            UpdateCurrentFormMasterFromGitHubRequest $request
    ): UpdateCurrentFormMasterFromGitHubResult {
        return $this->updateCurrentFormMasterFromGitHubAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMoldsRequest $request
     * @return PromiseInterface
     */
    public function describeMoldsAsync(
            DescribeMoldsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoldsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMoldsRequest $request
     * @return DescribeMoldsResult
     */
    public function describeMolds (
            DescribeMoldsRequest $request
    ): DescribeMoldsResult {
        return $this->describeMoldsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeMoldsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeMoldsByUserIdAsync(
            DescribeMoldsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeMoldsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeMoldsByUserIdRequest $request
     * @return DescribeMoldsByUserIdResult
     */
    public function describeMoldsByUserId (
            DescribeMoldsByUserIdRequest $request
    ): DescribeMoldsByUserIdResult {
        return $this->describeMoldsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMoldRequest $request
     * @return PromiseInterface
     */
    public function getMoldAsync(
            GetMoldRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMoldTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMoldRequest $request
     * @return GetMoldResult
     */
    public function getMold (
            GetMoldRequest $request
    ): GetMoldResult {
        return $this->getMoldAsync(
            $request
        )->wait();
    }

    /**
     * @param GetMoldByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getMoldByUserIdAsync(
            GetMoldByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetMoldByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetMoldByUserIdRequest $request
     * @return GetMoldByUserIdResult
     */
    public function getMoldByUserId (
            GetMoldByUserIdRequest $request
    ): GetMoldByUserIdResult {
        return $this->getMoldByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetMoldCapacityByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setMoldCapacityByUserIdAsync(
            SetMoldCapacityByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetMoldCapacityByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetMoldCapacityByUserIdRequest $request
     * @return SetMoldCapacityByUserIdResult
     */
    public function setMoldCapacityByUserId (
            SetMoldCapacityByUserIdRequest $request
    ): SetMoldCapacityByUserIdResult {
        return $this->setMoldCapacityByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddMoldCapacityByUserIdRequest $request
     * @return PromiseInterface
     */
    public function addMoldCapacityByUserIdAsync(
            AddMoldCapacityByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddMoldCapacityByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddMoldCapacityByUserIdRequest $request
     * @return AddMoldCapacityByUserIdResult
     */
    public function addMoldCapacityByUserId (
            AddMoldCapacityByUserIdRequest $request
    ): AddMoldCapacityByUserIdResult {
        return $this->addMoldCapacityByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteMoldRequest $request
     * @return PromiseInterface
     */
    public function deleteMoldAsync(
            DeleteMoldRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMoldTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteMoldRequest $request
     * @return DeleteMoldResult
     */
    public function deleteMold (
            DeleteMoldRequest $request
    ): DeleteMoldResult {
        return $this->deleteMoldAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteMoldByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteMoldByUserIdAsync(
            DeleteMoldByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteMoldByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteMoldByUserIdRequest $request
     * @return DeleteMoldByUserIdResult
     */
    public function deleteMoldByUserId (
            DeleteMoldByUserIdRequest $request
    ): DeleteMoldByUserIdResult {
        return $this->deleteMoldByUserIdAsync(
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
     * @param DescribeFormsRequest $request
     * @return PromiseInterface
     */
    public function describeFormsAsync(
            DescribeFormsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFormsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeFormsRequest $request
     * @return DescribeFormsResult
     */
    public function describeForms (
            DescribeFormsRequest $request
    ): DescribeFormsResult {
        return $this->describeFormsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeFormsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeFormsByUserIdAsync(
            DescribeFormsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeFormsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeFormsByUserIdRequest $request
     * @return DescribeFormsByUserIdResult
     */
    public function describeFormsByUserId (
            DescribeFormsByUserIdRequest $request
    ): DescribeFormsByUserIdResult {
        return $this->describeFormsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFormRequest $request
     * @return PromiseInterface
     */
    public function getFormAsync(
            GetFormRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFormRequest $request
     * @return GetFormResult
     */
    public function getForm (
            GetFormRequest $request
    ): GetFormResult {
        return $this->getFormAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFormByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getFormByUserIdAsync(
            GetFormByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFormByUserIdRequest $request
     * @return GetFormByUserIdResult
     */
    public function getFormByUserId (
            GetFormByUserIdRequest $request
    ): GetFormByUserIdResult {
        return $this->getFormByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFormWithSignatureRequest $request
     * @return PromiseInterface
     */
    public function getFormWithSignatureAsync(
            GetFormWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFormWithSignatureRequest $request
     * @return GetFormWithSignatureResult
     */
    public function getFormWithSignature (
            GetFormWithSignatureRequest $request
    ): GetFormWithSignatureResult {
        return $this->getFormWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * @param GetFormWithSignatureByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getFormWithSignatureByUserIdAsync(
            GetFormWithSignatureByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetFormWithSignatureByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetFormWithSignatureByUserIdRequest $request
     * @return GetFormWithSignatureByUserIdResult
     */
    public function getFormWithSignatureByUserId (
            GetFormWithSignatureByUserIdRequest $request
    ): GetFormWithSignatureByUserIdResult {
        return $this->getFormWithSignatureByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetFormByUserIdRequest $request
     * @return PromiseInterface
     */
    public function setFormByUserIdAsync(
            SetFormByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetFormByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetFormByUserIdRequest $request
     * @return SetFormByUserIdResult
     */
    public function setFormByUserId (
            SetFormByUserIdRequest $request
    ): SetFormByUserIdResult {
        return $this->setFormByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param SetFormWithSignatureRequest $request
     * @return PromiseInterface
     */
    public function setFormWithSignatureAsync(
            SetFormWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new SetFormWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param SetFormWithSignatureRequest $request
     * @return SetFormWithSignatureResult
     */
    public function setFormWithSignature (
            SetFormWithSignatureRequest $request
    ): SetFormWithSignatureResult {
        return $this->setFormWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireActionsToFormPropertiesRequest $request
     * @return PromiseInterface
     */
    public function acquireActionsToFormPropertiesAsync(
            AcquireActionsToFormPropertiesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireActionsToFormPropertiesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireActionsToFormPropertiesRequest $request
     * @return AcquireActionsToFormPropertiesResult
     */
    public function acquireActionsToFormProperties (
            AcquireActionsToFormPropertiesRequest $request
    ): AcquireActionsToFormPropertiesResult {
        return $this->acquireActionsToFormPropertiesAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteFormRequest $request
     * @return PromiseInterface
     */
    public function deleteFormAsync(
            DeleteFormRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFormTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteFormRequest $request
     * @return DeleteFormResult
     */
    public function deleteForm (
            DeleteFormRequest $request
    ): DeleteFormResult {
        return $this->deleteFormAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteFormByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteFormByUserIdAsync(
            DeleteFormByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteFormByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteFormByUserIdRequest $request
     * @return DeleteFormByUserIdResult
     */
    public function deleteFormByUserId (
            DeleteFormByUserIdRequest $request
    ): DeleteFormByUserIdResult {
        return $this->deleteFormByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcquireActionToFormPropertiesByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function acquireActionToFormPropertiesByStampSheetAsync(
            AcquireActionToFormPropertiesByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcquireActionToFormPropertiesByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcquireActionToFormPropertiesByStampSheetRequest $request
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
    public function acquireActionToFormPropertiesByStampSheet (
            AcquireActionToFormPropertiesByStampSheetRequest $request
    ): AcquireActionToFormPropertiesByStampSheetResult {
        return $this->acquireActionToFormPropertiesByStampSheetAsync(
            $request
        )->wait();
    }
}