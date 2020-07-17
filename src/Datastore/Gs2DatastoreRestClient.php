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

namespace Gs2\Datastore;

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
use Gs2\Datastore\Request\DescribeNamespacesRequest;
use Gs2\Datastore\Result\DescribeNamespacesResult;
use Gs2\Datastore\Request\CreateNamespaceRequest;
use Gs2\Datastore\Result\CreateNamespaceResult;
use Gs2\Datastore\Request\GetNamespaceStatusRequest;
use Gs2\Datastore\Result\GetNamespaceStatusResult;
use Gs2\Datastore\Request\GetNamespaceRequest;
use Gs2\Datastore\Result\GetNamespaceResult;
use Gs2\Datastore\Request\UpdateNamespaceRequest;
use Gs2\Datastore\Result\UpdateNamespaceResult;
use Gs2\Datastore\Request\DeleteNamespaceRequest;
use Gs2\Datastore\Result\DeleteNamespaceResult;
use Gs2\Datastore\Request\DescribeDataObjectsRequest;
use Gs2\Datastore\Result\DescribeDataObjectsResult;
use Gs2\Datastore\Request\DescribeDataObjectsByUserIdRequest;
use Gs2\Datastore\Result\DescribeDataObjectsByUserIdResult;
use Gs2\Datastore\Request\PrepareUploadRequest;
use Gs2\Datastore\Result\PrepareUploadResult;
use Gs2\Datastore\Request\PrepareUploadByUserIdRequest;
use Gs2\Datastore\Result\PrepareUploadByUserIdResult;
use Gs2\Datastore\Request\UpdateDataObjectRequest;
use Gs2\Datastore\Result\UpdateDataObjectResult;
use Gs2\Datastore\Request\UpdateDataObjectByUserIdRequest;
use Gs2\Datastore\Result\UpdateDataObjectByUserIdResult;
use Gs2\Datastore\Request\PrepareReUploadRequest;
use Gs2\Datastore\Result\PrepareReUploadResult;
use Gs2\Datastore\Request\PrepareReUploadByUserIdRequest;
use Gs2\Datastore\Result\PrepareReUploadByUserIdResult;
use Gs2\Datastore\Request\DoneUploadRequest;
use Gs2\Datastore\Result\DoneUploadResult;
use Gs2\Datastore\Request\DoneUploadByUserIdRequest;
use Gs2\Datastore\Result\DoneUploadByUserIdResult;
use Gs2\Datastore\Request\DeleteDataObjectRequest;
use Gs2\Datastore\Result\DeleteDataObjectResult;
use Gs2\Datastore\Request\DeleteDataObjectByUserIdRequest;
use Gs2\Datastore\Result\DeleteDataObjectByUserIdResult;
use Gs2\Datastore\Request\PrepareDownloadRequest;
use Gs2\Datastore\Result\PrepareDownloadResult;
use Gs2\Datastore\Request\PrepareDownloadByUserIdRequest;
use Gs2\Datastore\Result\PrepareDownloadByUserIdResult;
use Gs2\Datastore\Request\PrepareDownloadByGenerationRequest;
use Gs2\Datastore\Result\PrepareDownloadByGenerationResult;
use Gs2\Datastore\Request\PrepareDownloadByGenerationAndUserIdRequest;
use Gs2\Datastore\Result\PrepareDownloadByGenerationAndUserIdResult;
use Gs2\Datastore\Request\PrepareDownloadOwnDataRequest;
use Gs2\Datastore\Result\PrepareDownloadOwnDataResult;
use Gs2\Datastore\Request\PrepareDownloadOwnDataByGenerationRequest;
use Gs2\Datastore\Result\PrepareDownloadOwnDataByGenerationResult;
use Gs2\Datastore\Request\PrepareDownloadOwnDataByGenerationAndUserIdRequest;
use Gs2\Datastore\Result\PrepareDownloadOwnDataByGenerationAndUserIdResult;
use Gs2\Datastore\Request\DescribeDataObjectHistoriesRequest;
use Gs2\Datastore\Result\DescribeDataObjectHistoriesResult;
use Gs2\Datastore\Request\DescribeDataObjectHistoriesByUserIdRequest;
use Gs2\Datastore\Result\DescribeDataObjectHistoriesByUserIdResult;
use Gs2\Datastore\Request\GetDataObjectHistoryRequest;
use Gs2\Datastore\Result\GetDataObjectHistoryResult;
use Gs2\Datastore\Request\GetDataObjectHistoryByUserIdRequest;
use Gs2\Datastore\Result\GetDataObjectHistoryByUserIdResult;

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

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

class DescribeDataObjectsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDataObjectsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDataObjectsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDataObjectsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDataObjectsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDataObjectsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/data";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getStatus() !== null) {
            $queryStrings["status"] = $this->request->getStatus();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeDataObjectsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDataObjectsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDataObjectsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDataObjectsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDataObjectsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDataObjectsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/data";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getStatus() !== null) {
            $queryStrings["status"] = $this->request->getStatus();
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class PrepareUploadTask extends Gs2RestSessionTask {

    /**
     * @var PrepareUploadRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareUploadTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareUploadRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareUploadRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareUploadResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/data/file";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getContentType() !== null) {
            $json["contentType"] = $this->request->getContentType();
        }
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getAllowUserIds() !== null) {
            $array = [];
            foreach ($this->request->getAllowUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["allowUserIds"] = $array;
        }
        if ($this->request->getUpdateIfExists() !== null) {
            $json["updateIfExists"] = $this->request->getUpdateIfExists();
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

class PrepareUploadByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PrepareUploadByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareUploadByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareUploadByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareUploadByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareUploadByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/data/file";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getContentType() !== null) {
            $json["contentType"] = $this->request->getContentType();
        }
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getAllowUserIds() !== null) {
            $array = [];
            foreach ($this->request->getAllowUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["allowUserIds"] = $array;
        }
        if ($this->request->getUpdateIfExists() !== null) {
            $json["updateIfExists"] = $this->request->getUpdateIfExists();
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

class UpdateDataObjectTask extends Gs2RestSessionTask {

    /**
     * @var UpdateDataObjectRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateDataObjectTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateDataObjectRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateDataObjectRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateDataObjectResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/data/{dataObjectName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);

        $json = [];
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getAllowUserIds() !== null) {
            $array = [];
            foreach ($this->request->getAllowUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["allowUserIds"] = $array;
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

class UpdateDataObjectByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var UpdateDataObjectByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateDataObjectByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateDataObjectByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateDataObjectByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateDataObjectByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/data/{dataObjectName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getAllowUserIds() !== null) {
            $array = [];
            foreach ($this->request->getAllowUserIds() as $item)
            {
                array_push($array, $item);
            }
            $json["allowUserIds"] = $array;
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

class PrepareReUploadTask extends Gs2RestSessionTask {

    /**
     * @var PrepareReUploadRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareReUploadTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareReUploadRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareReUploadRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareReUploadResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/data/{dataObjectName}/file";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);

        $json = [];
        if ($this->request->getContentType() !== null) {
            $json["contentType"] = $this->request->getContentType();
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

class PrepareReUploadByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PrepareReUploadByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareReUploadByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareReUploadByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareReUploadByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareReUploadByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/data/{dataObjectName}/file";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getContentType() !== null) {
            $json["contentType"] = $this->request->getContentType();
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

class DoneUploadTask extends Gs2RestSessionTask {

    /**
     * @var DoneUploadRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DoneUploadTask constructor.
     * @param Gs2RestSession $session
     * @param DoneUploadRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DoneUploadRequest $request
    ) {
        parent::__construct(
            $session,
            DoneUploadResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/data/{dataObjectName}/done";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);

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

class DoneUploadByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DoneUploadByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DoneUploadByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DoneUploadByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DoneUploadByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DoneUploadByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/data/{dataObjectName}/done";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);
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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DeleteDataObjectTask extends Gs2RestSessionTask {

    /**
     * @var DeleteDataObjectRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteDataObjectTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteDataObjectRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteDataObjectRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteDataObjectResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/data/{dataObjectName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);

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

class DeleteDataObjectByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteDataObjectByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteDataObjectByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteDataObjectByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteDataObjectByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteDataObjectByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/data/{dataObjectName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);

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

class PrepareDownloadTask extends Gs2RestSessionTask {

    /**
     * @var PrepareDownloadRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareDownloadTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareDownloadRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareDownloadRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareDownloadResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/file";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDataObjectId() !== null) {
            $json["dataObjectId"] = $this->request->getDataObjectId();
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

class PrepareDownloadByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PrepareDownloadByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareDownloadByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareDownloadByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareDownloadByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareDownloadByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/file";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getDataObjectId() !== null) {
            $json["dataObjectId"] = $this->request->getDataObjectId();
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

class PrepareDownloadByGenerationTask extends Gs2RestSessionTask {

    /**
     * @var PrepareDownloadByGenerationRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareDownloadByGenerationTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareDownloadByGenerationRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareDownloadByGenerationRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareDownloadByGenerationResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/file/generation/{generation}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{generation}", $this->request->getGeneration() === null|| strlen($this->request->getGeneration()) == 0 ? "null" : $this->request->getGeneration(), $url);

        $json = [];
        if ($this->request->getDataObjectId() !== null) {
            $json["dataObjectId"] = $this->request->getDataObjectId();
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

class PrepareDownloadByGenerationAndUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PrepareDownloadByGenerationAndUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareDownloadByGenerationAndUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareDownloadByGenerationAndUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareDownloadByGenerationAndUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareDownloadByGenerationAndUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/file/generation/{generation}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{generation}", $this->request->getGeneration() === null|| strlen($this->request->getGeneration()) == 0 ? "null" : $this->request->getGeneration(), $url);

        $json = [];
        if ($this->request->getDataObjectId() !== null) {
            $json["dataObjectId"] = $this->request->getDataObjectId();
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

class PrepareDownloadOwnDataTask extends Gs2RestSessionTask {

    /**
     * @var PrepareDownloadOwnDataRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareDownloadOwnDataTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareDownloadOwnDataRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareDownloadOwnDataRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareDownloadOwnDataResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/file";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);

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

class PrepareDownloadOwnDataByGenerationTask extends Gs2RestSessionTask {

    /**
     * @var PrepareDownloadOwnDataByGenerationRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareDownloadOwnDataByGenerationTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareDownloadOwnDataByGenerationRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareDownloadOwnDataByGenerationRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareDownloadOwnDataByGenerationResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/data/{dataObjectName}/generation/{generation}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);
        $url = str_replace("{generation}", $this->request->getGeneration() === null|| strlen($this->request->getGeneration()) == 0 ? "null" : $this->request->getGeneration(), $url);

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

class PrepareDownloadOwnDataByGenerationAndUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PrepareDownloadOwnDataByGenerationAndUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PrepareDownloadOwnDataByGenerationAndUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PrepareDownloadOwnDataByGenerationAndUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PrepareDownloadOwnDataByGenerationAndUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PrepareDownloadOwnDataByGenerationAndUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/data/{dataObjectName}/generation/{generation}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);
        $url = str_replace("{generation}", $this->request->getGeneration() === null|| strlen($this->request->getGeneration()) == 0 ? "null" : $this->request->getGeneration(), $url);

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

class DescribeDataObjectHistoriesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDataObjectHistoriesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDataObjectHistoriesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDataObjectHistoriesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDataObjectHistoriesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDataObjectHistoriesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/data/{dataObjectName}/history";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class DescribeDataObjectHistoriesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDataObjectHistoriesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDataObjectHistoriesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDataObjectHistoriesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDataObjectHistoriesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDataObjectHistoriesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/data/{dataObjectName}/history";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);

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
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetDataObjectHistoryTask extends Gs2RestSessionTask {

    /**
     * @var GetDataObjectHistoryRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDataObjectHistoryTask constructor.
     * @param Gs2RestSession $session
     * @param GetDataObjectHistoryRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDataObjectHistoryRequest $request
    ) {
        parent::__construct(
            $session,
            GetDataObjectHistoryResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/data/{dataObjectName}/history/{generation}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);
        $url = str_replace("{generation}", $this->request->getGeneration() === null|| strlen($this->request->getGeneration()) == 0 ? "null" : $this->request->getGeneration(), $url);

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

class GetDataObjectHistoryByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetDataObjectHistoryByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDataObjectHistoryByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetDataObjectHistoryByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDataObjectHistoryByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetDataObjectHistoryByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "datastore", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/data/{dataObjectName}/history/{generation}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{dataObjectName}", $this->request->getDataObjectName() === null|| strlen($this->request->getDataObjectName()) == 0 ? "null" : $this->request->getDataObjectName(), $url);
        $url = str_replace("{generation}", $this->request->getGeneration() === null|| strlen($this->request->getGeneration()) == 0 ? "null" : $this->request->getGeneration(), $url);

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

/**
 * GS2 Datastore API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2DatastoreRestClient extends AbstractGs2Client {

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
     * ネームスペースを取得<br>
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
     * ネームスペースを取得<br>
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
     * データオブジェクトの一覧を取得<br>
     *
     * @param DescribeDataObjectsRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeDataObjectsAsync(
            DescribeDataObjectsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDataObjectsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトの一覧を取得<br>
     *
     * @param DescribeDataObjectsRequest $request リクエストパラメータ
     * @return DescribeDataObjectsResult
     */
    public function describeDataObjects (
            DescribeDataObjectsRequest $request
    ): DescribeDataObjectsResult {
        return $this->describeDataObjectsAsync(
            $request
        )->wait();
    }

    /**
     * オーナーIDを指定してデータオブジェクトの一覧を取得<br>
     *
     * @param DescribeDataObjectsByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeDataObjectsByUserIdAsync(
            DescribeDataObjectsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDataObjectsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * オーナーIDを指定してデータオブジェクトの一覧を取得<br>
     *
     * @param DescribeDataObjectsByUserIdRequest $request リクエストパラメータ
     * @return DescribeDataObjectsByUserIdResult
     */
    public function describeDataObjectsByUserId (
            DescribeDataObjectsByUserIdRequest $request
    ): DescribeDataObjectsByUserIdResult {
        return $this->describeDataObjectsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクトをアップロード準備する<br>
     *
     * @param PrepareUploadRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareUploadAsync(
            PrepareUploadRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareUploadTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトをアップロード準備する<br>
     *
     * @param PrepareUploadRequest $request リクエストパラメータ
     * @return PrepareUploadResult
     */
    public function prepareUpload (
            PrepareUploadRequest $request
    ): PrepareUploadResult {
        return $this->prepareUploadAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクトをアップロード準備する<br>
     *
     * @param PrepareUploadByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareUploadByUserIdAsync(
            PrepareUploadByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareUploadByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクトをアップロード準備する<br>
     *
     * @param PrepareUploadByUserIdRequest $request リクエストパラメータ
     * @return PrepareUploadByUserIdResult
     */
    public function prepareUploadByUserId (
            PrepareUploadByUserIdRequest $request
    ): PrepareUploadByUserIdResult {
        return $this->prepareUploadByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクトを更新する<br>
     *
     * @param UpdateDataObjectRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateDataObjectAsync(
            UpdateDataObjectRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateDataObjectTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトを更新する<br>
     *
     * @param UpdateDataObjectRequest $request リクエストパラメータ
     * @return UpdateDataObjectResult
     */
    public function updateDataObject (
            UpdateDataObjectRequest $request
    ): UpdateDataObjectResult {
        return $this->updateDataObjectAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクトを更新する<br>
     *
     * @param UpdateDataObjectByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function updateDataObjectByUserIdAsync(
            UpdateDataObjectByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateDataObjectByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクトを更新する<br>
     *
     * @param UpdateDataObjectByUserIdRequest $request リクエストパラメータ
     * @return UpdateDataObjectByUserIdResult
     */
    public function updateDataObjectByUserId (
            UpdateDataObjectByUserIdRequest $request
    ): UpdateDataObjectByUserIdResult {
        return $this->updateDataObjectByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクトを再アップロード準備する<br>
     *
     * @param PrepareReUploadRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareReUploadAsync(
            PrepareReUploadRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareReUploadTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトを再アップロード準備する<br>
     *
     * @param PrepareReUploadRequest $request リクエストパラメータ
     * @return PrepareReUploadResult
     */
    public function prepareReUpload (
            PrepareReUploadRequest $request
    ): PrepareReUploadResult {
        return $this->prepareReUploadAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクトを再アップロード準備する<br>
     *
     * @param PrepareReUploadByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareReUploadByUserIdAsync(
            PrepareReUploadByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareReUploadByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクトを再アップロード準備する<br>
     *
     * @param PrepareReUploadByUserIdRequest $request リクエストパラメータ
     * @return PrepareReUploadByUserIdResult
     */
    public function prepareReUploadByUserId (
            PrepareReUploadByUserIdRequest $request
    ): PrepareReUploadByUserIdResult {
        return $this->prepareReUploadByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクトのアップロード完了を報告する<br>
     *
     * @param DoneUploadRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function doneUploadAsync(
            DoneUploadRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DoneUploadTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトのアップロード完了を報告する<br>
     *
     * @param DoneUploadRequest $request リクエストパラメータ
     * @return DoneUploadResult
     */
    public function doneUpload (
            DoneUploadRequest $request
    ): DoneUploadResult {
        return $this->doneUploadAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクトのアップロード完了を報告する<br>
     *
     * @param DoneUploadByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function doneUploadByUserIdAsync(
            DoneUploadByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DoneUploadByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクトのアップロード完了を報告する<br>
     *
     * @param DoneUploadByUserIdRequest $request リクエストパラメータ
     * @return DoneUploadByUserIdResult
     */
    public function doneUploadByUserId (
            DoneUploadByUserIdRequest $request
    ): DoneUploadByUserIdResult {
        return $this->doneUploadByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクトを削除する<br>
     *
     * @param DeleteDataObjectRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteDataObjectAsync(
            DeleteDataObjectRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteDataObjectTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトを削除する<br>
     *
     * @param DeleteDataObjectRequest $request リクエストパラメータ
     * @return DeleteDataObjectResult
     */
    public function deleteDataObject (
            DeleteDataObjectRequest $request
    ): DeleteDataObjectResult {
        return $this->deleteDataObjectAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクトを削除する<br>
     *
     * @param DeleteDataObjectByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteDataObjectByUserIdAsync(
            DeleteDataObjectByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteDataObjectByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクトを削除する<br>
     *
     * @param DeleteDataObjectByUserIdRequest $request リクエストパラメータ
     * @return DeleteDataObjectByUserIdResult
     */
    public function deleteDataObjectByUserId (
            DeleteDataObjectByUserIdRequest $request
    ): DeleteDataObjectByUserIdResult {
        return $this->deleteDataObjectByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクトをダウンロード準備する<br>
     *
     * @param PrepareDownloadRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareDownloadAsync(
            PrepareDownloadRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareDownloadTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトをダウンロード準備する<br>
     *
     * @param PrepareDownloadRequest $request リクエストパラメータ
     * @return PrepareDownloadResult
     */
    public function prepareDownload (
            PrepareDownloadRequest $request
    ): PrepareDownloadResult {
        return $this->prepareDownloadAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクトをダウンロード準備する<br>
     *
     * @param PrepareDownloadByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareDownloadByUserIdAsync(
            PrepareDownloadByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareDownloadByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクトをダウンロード準備する<br>
     *
     * @param PrepareDownloadByUserIdRequest $request リクエストパラメータ
     * @return PrepareDownloadByUserIdResult
     */
    public function prepareDownloadByUserId (
            PrepareDownloadByUserIdRequest $request
    ): PrepareDownloadByUserIdResult {
        return $this->prepareDownloadByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクトを世代を指定してダウンロード準備する<br>
     *
     * @param PrepareDownloadByGenerationRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareDownloadByGenerationAsync(
            PrepareDownloadByGenerationRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareDownloadByGenerationTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトを世代を指定してダウンロード準備する<br>
     *
     * @param PrepareDownloadByGenerationRequest $request リクエストパラメータ
     * @return PrepareDownloadByGenerationResult
     */
    public function prepareDownloadByGeneration (
            PrepareDownloadByGenerationRequest $request
    ): PrepareDownloadByGenerationResult {
        return $this->prepareDownloadByGenerationAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する<br>
     *
     * @param PrepareDownloadByGenerationAndUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareDownloadByGenerationAndUserIdAsync(
            PrepareDownloadByGenerationAndUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareDownloadByGenerationAndUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する<br>
     *
     * @param PrepareDownloadByGenerationAndUserIdRequest $request リクエストパラメータ
     * @return PrepareDownloadByGenerationAndUserIdResult
     */
    public function prepareDownloadByGenerationAndUserId (
            PrepareDownloadByGenerationAndUserIdRequest $request
    ): PrepareDownloadByGenerationAndUserIdResult {
        return $this->prepareDownloadByGenerationAndUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクトをダウンロード準備する<br>
     *
     * @param PrepareDownloadOwnDataRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareDownloadOwnDataAsync(
            PrepareDownloadOwnDataRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareDownloadOwnDataTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトをダウンロード準備する<br>
     *
     * @param PrepareDownloadOwnDataRequest $request リクエストパラメータ
     * @return PrepareDownloadOwnDataResult
     */
    public function prepareDownloadOwnData (
            PrepareDownloadOwnDataRequest $request
    ): PrepareDownloadOwnDataResult {
        return $this->prepareDownloadOwnDataAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクトを世代を指定してダウンロード準備する<br>
     *
     * @param PrepareDownloadOwnDataByGenerationRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareDownloadOwnDataByGenerationAsync(
            PrepareDownloadOwnDataByGenerationRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareDownloadOwnDataByGenerationTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクトを世代を指定してダウンロード準備する<br>
     *
     * @param PrepareDownloadOwnDataByGenerationRequest $request リクエストパラメータ
     * @return PrepareDownloadOwnDataByGenerationResult
     */
    public function prepareDownloadOwnDataByGeneration (
            PrepareDownloadOwnDataByGenerationRequest $request
    ): PrepareDownloadOwnDataByGenerationResult {
        return $this->prepareDownloadOwnDataByGenerationAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する<br>
     *
     * @param PrepareDownloadOwnDataByGenerationAndUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function prepareDownloadOwnDataByGenerationAndUserIdAsync(
            PrepareDownloadOwnDataByGenerationAndUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PrepareDownloadOwnDataByGenerationAndUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する<br>
     *
     * @param PrepareDownloadOwnDataByGenerationAndUserIdRequest $request リクエストパラメータ
     * @return PrepareDownloadOwnDataByGenerationAndUserIdResult
     */
    public function prepareDownloadOwnDataByGenerationAndUserId (
            PrepareDownloadOwnDataByGenerationAndUserIdRequest $request
    ): PrepareDownloadOwnDataByGenerationAndUserIdResult {
        return $this->prepareDownloadOwnDataByGenerationAndUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクト履歴の一覧を取得<br>
     *
     * @param DescribeDataObjectHistoriesRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeDataObjectHistoriesAsync(
            DescribeDataObjectHistoriesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDataObjectHistoriesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクト履歴の一覧を取得<br>
     *
     * @param DescribeDataObjectHistoriesRequest $request リクエストパラメータ
     * @return DescribeDataObjectHistoriesResult
     */
    public function describeDataObjectHistories (
            DescribeDataObjectHistoriesRequest $request
    ): DescribeDataObjectHistoriesResult {
        return $this->describeDataObjectHistoriesAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクト履歴の一覧を取得<br>
     *
     * @param DescribeDataObjectHistoriesByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeDataObjectHistoriesByUserIdAsync(
            DescribeDataObjectHistoriesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDataObjectHistoriesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクト履歴の一覧を取得<br>
     *
     * @param DescribeDataObjectHistoriesByUserIdRequest $request リクエストパラメータ
     * @return DescribeDataObjectHistoriesByUserIdResult
     */
    public function describeDataObjectHistoriesByUserId (
            DescribeDataObjectHistoriesByUserIdRequest $request
    ): DescribeDataObjectHistoriesByUserIdResult {
        return $this->describeDataObjectHistoriesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * データオブジェクト履歴を取得する<br>
     *
     * @param GetDataObjectHistoryRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getDataObjectHistoryAsync(
            GetDataObjectHistoryRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDataObjectHistoryTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * データオブジェクト履歴を取得する<br>
     *
     * @param GetDataObjectHistoryRequest $request リクエストパラメータ
     * @return GetDataObjectHistoryResult
     */
    public function getDataObjectHistory (
            GetDataObjectHistoryRequest $request
    ): GetDataObjectHistoryResult {
        return $this->getDataObjectHistoryAsync(
            $request
        )->wait();
    }

    /**
     * ユーザIDを指定してデータオブジェクト履歴を取得する<br>
     *
     * @param GetDataObjectHistoryByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getDataObjectHistoryByUserIdAsync(
            GetDataObjectHistoryByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDataObjectHistoryByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してデータオブジェクト履歴を取得する<br>
     *
     * @param GetDataObjectHistoryByUserIdRequest $request リクエストパラメータ
     * @return GetDataObjectHistoryByUserIdResult
     */
    public function getDataObjectHistoryByUserId (
            GetDataObjectHistoryByUserIdRequest $request
    ): GetDataObjectHistoryByUserIdResult {
        return $this->getDataObjectHistoryByUserIdAsync(
            $request
        )->wait();
    }
}