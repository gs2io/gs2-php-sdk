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

namespace Gs2\Dictionary;

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


use Gs2\Dictionary\Request\DescribeNamespacesRequest;
use Gs2\Dictionary\Result\DescribeNamespacesResult;
use Gs2\Dictionary\Request\CreateNamespaceRequest;
use Gs2\Dictionary\Result\CreateNamespaceResult;
use Gs2\Dictionary\Request\GetNamespaceStatusRequest;
use Gs2\Dictionary\Result\GetNamespaceStatusResult;
use Gs2\Dictionary\Request\GetNamespaceRequest;
use Gs2\Dictionary\Result\GetNamespaceResult;
use Gs2\Dictionary\Request\UpdateNamespaceRequest;
use Gs2\Dictionary\Result\UpdateNamespaceResult;
use Gs2\Dictionary\Request\DeleteNamespaceRequest;
use Gs2\Dictionary\Result\DeleteNamespaceResult;
use Gs2\Dictionary\Request\GetServiceVersionRequest;
use Gs2\Dictionary\Result\GetServiceVersionResult;
use Gs2\Dictionary\Request\DumpUserDataByUserIdRequest;
use Gs2\Dictionary\Result\DumpUserDataByUserIdResult;
use Gs2\Dictionary\Request\CheckDumpUserDataByUserIdRequest;
use Gs2\Dictionary\Result\CheckDumpUserDataByUserIdResult;
use Gs2\Dictionary\Request\CleanUserDataByUserIdRequest;
use Gs2\Dictionary\Result\CleanUserDataByUserIdResult;
use Gs2\Dictionary\Request\CheckCleanUserDataByUserIdRequest;
use Gs2\Dictionary\Result\CheckCleanUserDataByUserIdResult;
use Gs2\Dictionary\Request\PrepareImportUserDataByUserIdRequest;
use Gs2\Dictionary\Result\PrepareImportUserDataByUserIdResult;
use Gs2\Dictionary\Request\ImportUserDataByUserIdRequest;
use Gs2\Dictionary\Result\ImportUserDataByUserIdResult;
use Gs2\Dictionary\Request\CheckImportUserDataByUserIdRequest;
use Gs2\Dictionary\Result\CheckImportUserDataByUserIdResult;
use Gs2\Dictionary\Request\DescribeEntryModelsRequest;
use Gs2\Dictionary\Result\DescribeEntryModelsResult;
use Gs2\Dictionary\Request\GetEntryModelRequest;
use Gs2\Dictionary\Result\GetEntryModelResult;
use Gs2\Dictionary\Request\DescribeEntryModelMastersRequest;
use Gs2\Dictionary\Result\DescribeEntryModelMastersResult;
use Gs2\Dictionary\Request\CreateEntryModelMasterRequest;
use Gs2\Dictionary\Result\CreateEntryModelMasterResult;
use Gs2\Dictionary\Request\GetEntryModelMasterRequest;
use Gs2\Dictionary\Result\GetEntryModelMasterResult;
use Gs2\Dictionary\Request\UpdateEntryModelMasterRequest;
use Gs2\Dictionary\Result\UpdateEntryModelMasterResult;
use Gs2\Dictionary\Request\DeleteEntryModelMasterRequest;
use Gs2\Dictionary\Result\DeleteEntryModelMasterResult;
use Gs2\Dictionary\Request\DescribeEntriesRequest;
use Gs2\Dictionary\Result\DescribeEntriesResult;
use Gs2\Dictionary\Request\DescribeEntriesByUserIdRequest;
use Gs2\Dictionary\Result\DescribeEntriesByUserIdResult;
use Gs2\Dictionary\Request\AddEntriesByUserIdRequest;
use Gs2\Dictionary\Result\AddEntriesByUserIdResult;
use Gs2\Dictionary\Request\GetEntryRequest;
use Gs2\Dictionary\Result\GetEntryResult;
use Gs2\Dictionary\Request\GetEntryByUserIdRequest;
use Gs2\Dictionary\Result\GetEntryByUserIdResult;
use Gs2\Dictionary\Request\GetEntryWithSignatureRequest;
use Gs2\Dictionary\Result\GetEntryWithSignatureResult;
use Gs2\Dictionary\Request\GetEntryWithSignatureByUserIdRequest;
use Gs2\Dictionary\Result\GetEntryWithSignatureByUserIdResult;
use Gs2\Dictionary\Request\ResetByUserIdRequest;
use Gs2\Dictionary\Result\ResetByUserIdResult;
use Gs2\Dictionary\Request\VerifyEntryRequest;
use Gs2\Dictionary\Result\VerifyEntryResult;
use Gs2\Dictionary\Request\VerifyEntryByUserIdRequest;
use Gs2\Dictionary\Result\VerifyEntryByUserIdResult;
use Gs2\Dictionary\Request\DeleteEntriesRequest;
use Gs2\Dictionary\Result\DeleteEntriesResult;
use Gs2\Dictionary\Request\DeleteEntriesByUserIdRequest;
use Gs2\Dictionary\Result\DeleteEntriesByUserIdResult;
use Gs2\Dictionary\Request\AddEntriesByStampSheetRequest;
use Gs2\Dictionary\Result\AddEntriesByStampSheetResult;
use Gs2\Dictionary\Request\DeleteEntriesByStampTaskRequest;
use Gs2\Dictionary\Result\DeleteEntriesByStampTaskResult;
use Gs2\Dictionary\Request\VerifyEntryByStampTaskRequest;
use Gs2\Dictionary\Result\VerifyEntryByStampTaskResult;
use Gs2\Dictionary\Request\DescribeLikesRequest;
use Gs2\Dictionary\Result\DescribeLikesResult;
use Gs2\Dictionary\Request\DescribeLikesByUserIdRequest;
use Gs2\Dictionary\Result\DescribeLikesByUserIdResult;
use Gs2\Dictionary\Request\AddLikesRequest;
use Gs2\Dictionary\Result\AddLikesResult;
use Gs2\Dictionary\Request\AddLikesByUserIdRequest;
use Gs2\Dictionary\Result\AddLikesByUserIdResult;
use Gs2\Dictionary\Request\GetLikeRequest;
use Gs2\Dictionary\Result\GetLikeResult;
use Gs2\Dictionary\Request\GetLikeByUserIdRequest;
use Gs2\Dictionary\Result\GetLikeByUserIdResult;
use Gs2\Dictionary\Request\ResetLikesRequest;
use Gs2\Dictionary\Result\ResetLikesResult;
use Gs2\Dictionary\Request\ResetLikesByUserIdRequest;
use Gs2\Dictionary\Result\ResetLikesByUserIdResult;
use Gs2\Dictionary\Request\DeleteLikesRequest;
use Gs2\Dictionary\Result\DeleteLikesResult;
use Gs2\Dictionary\Request\DeleteLikesByUserIdRequest;
use Gs2\Dictionary\Result\DeleteLikesByUserIdResult;
use Gs2\Dictionary\Request\ExportMasterRequest;
use Gs2\Dictionary\Result\ExportMasterResult;
use Gs2\Dictionary\Request\GetCurrentEntryMasterRequest;
use Gs2\Dictionary\Result\GetCurrentEntryMasterResult;
use Gs2\Dictionary\Request\PreUpdateCurrentEntryMasterRequest;
use Gs2\Dictionary\Result\PreUpdateCurrentEntryMasterResult;
use Gs2\Dictionary\Request\UpdateCurrentEntryMasterRequest;
use Gs2\Dictionary\Result\UpdateCurrentEntryMasterResult;
use Gs2\Dictionary\Request\UpdateCurrentEntryMasterFromGitHubRequest;
use Gs2\Dictionary\Result\UpdateCurrentEntryMasterFromGitHubResult;

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEntryScript() !== null) {
            $json["entryScript"] = $this->request->getEntryScript()->toJson();
        }
        if ($this->request->getDuplicateEntryScript() !== null) {
            $json["duplicateEntryScript"] = $this->request->getDuplicateEntryScript();
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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getEntryScript() !== null) {
            $json["entryScript"] = $this->request->getEntryScript()->toJson();
        }
        if ($this->request->getDuplicateEntryScript() !== null) {
            $json["duplicateEntryScript"] = $this->request->getDuplicateEntryScript();
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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/dump/user/{userId}";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/clean/user/{userId}";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/prepare";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}";

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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/import/user/{userId}/{uploadToken}";

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

class DescribeEntryModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEntryModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEntryModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEntryModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEntryModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEntryModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model";

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

class GetEntryModelTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/model/{entryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryName}", $this->request->getEntryName() === null|| strlen($this->request->getEntryName()) == 0 ? "null" : $this->request->getEntryName(), $url);

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

class DescribeEntryModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEntryModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEntryModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEntryModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEntryModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEntryModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class CreateEntryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateEntryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateEntryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateEntryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateEntryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateEntryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model";

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

class GetEntryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{entryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryName}", $this->request->getEntryName() === null|| strlen($this->request->getEntryName()) == 0 ? "null" : $this->request->getEntryName(), $url);

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

class UpdateEntryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateEntryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateEntryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateEntryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateEntryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateEntryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{entryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryName}", $this->request->getEntryName() === null|| strlen($this->request->getEntryName()) == 0 ? "null" : $this->request->getEntryName(), $url);

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

class DeleteEntryModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteEntryModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteEntryModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteEntryModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteEntryModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteEntryModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/model/{entryName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryName}", $this->request->getEntryName() === null|| strlen($this->request->getEntryName()) == 0 ? "null" : $this->request->getEntryName(), $url);

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

class DescribeEntriesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEntriesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEntriesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEntriesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEntriesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEntriesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/entry";

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

class DescribeEntriesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeEntriesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeEntriesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeEntriesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeEntriesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeEntriesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry";

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

class AddEntriesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddEntriesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddEntriesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddEntriesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddEntriesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddEntriesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getEntryModelNames() !== null) {
            $array = [];
            foreach ($this->request->getEntryModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["entryModelNames"] = $array;
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

class GetEntryTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/entry/{entryModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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

class GetEntryByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry/{entryModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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

class GetEntryWithSignatureTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryWithSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryWithSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryWithSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryWithSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryWithSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/entry/{entryModelName}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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

class GetEntryWithSignatureByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetEntryWithSignatureByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetEntryWithSignatureByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetEntryWithSignatureByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetEntryWithSignatureByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetEntryWithSignatureByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry/{entryModelName}/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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

class ResetByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ResetByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ResetByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ResetByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ResetByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ResetByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class VerifyEntryTask extends Gs2RestSessionTask {

    /**
     * @var VerifyEntryRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyEntryTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyEntryRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyEntryRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyEntryResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/entry/{entryModelName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);
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

class VerifyEntryByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var VerifyEntryByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyEntryByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyEntryByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyEntryByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyEntryByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry/{entryModelName}/verify/{verifyType}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);
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

class DeleteEntriesTask extends Gs2RestSessionTask {

    /**
     * @var DeleteEntriesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteEntriesTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteEntriesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteEntriesRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteEntriesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/entry/delete";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getEntryModelNames() !== null) {
            $array = [];
            foreach ($this->request->getEntryModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["entryModelNames"] = $array;
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

class DeleteEntriesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteEntriesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteEntriesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteEntriesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteEntriesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteEntriesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/entry/delete";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getEntryModelNames() !== null) {
            $array = [];
            foreach ($this->request->getEntryModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["entryModelNames"] = $array;
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

class AddEntriesByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var AddEntriesByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddEntriesByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param AddEntriesByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddEntriesByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            AddEntriesByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/entry/add";

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

class DeleteEntriesByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var DeleteEntriesByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteEntriesByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteEntriesByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteEntriesByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteEntriesByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/entry/delete";

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

class VerifyEntryByStampTaskTask extends Gs2RestSessionTask {

    /**
     * @var VerifyEntryByStampTaskRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * VerifyEntryByStampTaskTask constructor.
     * @param Gs2RestSession $session
     * @param VerifyEntryByStampTaskRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        VerifyEntryByStampTaskRequest $request
    ) {
        parent::__construct(
            $session,
            VerifyEntryByStampTaskResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/stamp/entry/verify";

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

class DescribeLikesTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLikesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLikesTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLikesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLikesRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLikesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/like";

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

class DescribeLikesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeLikesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeLikesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeLikesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeLikesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeLikesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/like";

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

class AddLikesTask extends Gs2RestSessionTask {

    /**
     * @var AddLikesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddLikesTask constructor.
     * @param Gs2RestSession $session
     * @param AddLikesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddLikesRequest $request
    ) {
        parent::__construct(
            $session,
            AddLikesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/like";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getEntryModelNames() !== null) {
            $array = [];
            foreach ($this->request->getEntryModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["entryModelNames"] = $array;
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

class AddLikesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AddLikesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AddLikesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AddLikesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AddLikesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AddLikesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/like";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getEntryModelNames() !== null) {
            $array = [];
            foreach ($this->request->getEntryModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["entryModelNames"] = $array;
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

class GetLikeTask extends Gs2RestSessionTask {

    /**
     * @var GetLikeRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLikeTask constructor.
     * @param Gs2RestSession $session
     * @param GetLikeRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLikeRequest $request
    ) {
        parent::__construct(
            $session,
            GetLikeResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/like/{entryModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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

class GetLikeByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetLikeByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetLikeByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetLikeByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetLikeByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetLikeByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/like/{entryModelName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{entryModelName}", $this->request->getEntryModelName() === null|| strlen($this->request->getEntryModelName()) == 0 ? "null" : $this->request->getEntryModelName(), $url);

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

class ResetLikesTask extends Gs2RestSessionTask {

    /**
     * @var ResetLikesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ResetLikesTask constructor.
     * @param Gs2RestSession $session
     * @param ResetLikesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ResetLikesRequest $request
    ) {
        parent::__construct(
            $session,
            ResetLikesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/like";

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
        if ($this->request->getAccessToken() !== null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() !== null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class ResetLikesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var ResetLikesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * ResetLikesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param ResetLikesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        ResetLikesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            ResetLikesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/like";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
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

class DeleteLikesTask extends Gs2RestSessionTask {

    /**
     * @var DeleteLikesRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteLikesTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteLikesRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteLikesRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteLikesResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/like/delete";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getEntryModelNames() !== null) {
            $array = [];
            foreach ($this->request->getEntryModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["entryModelNames"] = $array;
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

class DeleteLikesByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteLikesByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteLikesByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteLikesByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteLikesByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteLikesByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/like/delete";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getEntryModelNames() !== null) {
            $array = [];
            foreach ($this->request->getEntryModelNames() as $item)
            {
                array_push($array, $item);
            }
            $json["entryModelNames"] = $array;
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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentEntryMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentEntryMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentEntryMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentEntryMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentEntryMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentEntryMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class PreUpdateCurrentEntryMasterTask extends Gs2RestSessionTask {

    /**
     * @var PreUpdateCurrentEntryMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PreUpdateCurrentEntryMasterTask constructor.
     * @param Gs2RestSession $session
     * @param PreUpdateCurrentEntryMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PreUpdateCurrentEntryMasterRequest $request
    ) {
        parent::__construct(
            $session,
            PreUpdateCurrentEntryMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentEntryMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentEntryMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentEntryMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentEntryMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentEntryMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentEntryMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {
        if ($this->request->getSettings() !== null) {
            $req = new PreUpdateCurrentEntryMasterRequest();
            if ($this->request->getContextStack() !== null) {
                $req->setContextStack($this->request->getContextStack());
            }
            if ($this->request->getNamespaceName() !== null) {
                $req->setNamespaceName($this->request->getNamespaceName());
            }
            $task = new PreUpdateCurrentEntryMasterTask(
                $this->session,
                $req
            );
            /** @var PreUpdateCurrentEntryMasterResult $res */
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

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentEntryMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentEntryMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentEntryMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentEntryMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentEntryMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentEntryMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "dictionary", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2 Dictionary API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2DictionaryRestClient extends AbstractGs2Client {

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
     * @param DescribeEntryModelsRequest $request
     * @return PromiseInterface
     */
    public function describeEntryModelsAsync(
            DescribeEntryModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEntryModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeEntryModelsRequest $request
     * @return DescribeEntryModelsResult
     */
    public function describeEntryModels (
            DescribeEntryModelsRequest $request
    ): DescribeEntryModelsResult {
        return $this->describeEntryModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetEntryModelRequest $request
     * @return PromiseInterface
     */
    public function getEntryModelAsync(
            GetEntryModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetEntryModelRequest $request
     * @return GetEntryModelResult
     */
    public function getEntryModel (
            GetEntryModelRequest $request
    ): GetEntryModelResult {
        return $this->getEntryModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeEntryModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeEntryModelMastersAsync(
            DescribeEntryModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEntryModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeEntryModelMastersRequest $request
     * @return DescribeEntryModelMastersResult
     */
    public function describeEntryModelMasters (
            DescribeEntryModelMastersRequest $request
    ): DescribeEntryModelMastersResult {
        return $this->describeEntryModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateEntryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createEntryModelMasterAsync(
            CreateEntryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateEntryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateEntryModelMasterRequest $request
     * @return CreateEntryModelMasterResult
     */
    public function createEntryModelMaster (
            CreateEntryModelMasterRequest $request
    ): CreateEntryModelMasterResult {
        return $this->createEntryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetEntryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getEntryModelMasterAsync(
            GetEntryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetEntryModelMasterRequest $request
     * @return GetEntryModelMasterResult
     */
    public function getEntryModelMaster (
            GetEntryModelMasterRequest $request
    ): GetEntryModelMasterResult {
        return $this->getEntryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateEntryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateEntryModelMasterAsync(
            UpdateEntryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateEntryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateEntryModelMasterRequest $request
     * @return UpdateEntryModelMasterResult
     */
    public function updateEntryModelMaster (
            UpdateEntryModelMasterRequest $request
    ): UpdateEntryModelMasterResult {
        return $this->updateEntryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteEntryModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteEntryModelMasterAsync(
            DeleteEntryModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteEntryModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteEntryModelMasterRequest $request
     * @return DeleteEntryModelMasterResult
     */
    public function deleteEntryModelMaster (
            DeleteEntryModelMasterRequest $request
    ): DeleteEntryModelMasterResult {
        return $this->deleteEntryModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeEntriesRequest $request
     * @return PromiseInterface
     */
    public function describeEntriesAsync(
            DescribeEntriesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEntriesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeEntriesRequest $request
     * @return DescribeEntriesResult
     */
    public function describeEntries (
            DescribeEntriesRequest $request
    ): DescribeEntriesResult {
        return $this->describeEntriesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeEntriesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeEntriesByUserIdAsync(
            DescribeEntriesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeEntriesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeEntriesByUserIdRequest $request
     * @return DescribeEntriesByUserIdResult
     */
    public function describeEntriesByUserId (
            DescribeEntriesByUserIdRequest $request
    ): DescribeEntriesByUserIdResult {
        return $this->describeEntriesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddEntriesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function addEntriesByUserIdAsync(
            AddEntriesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddEntriesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddEntriesByUserIdRequest $request
     * @return AddEntriesByUserIdResult
     */
    public function addEntriesByUserId (
            AddEntriesByUserIdRequest $request
    ): AddEntriesByUserIdResult {
        return $this->addEntriesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetEntryRequest $request
     * @return PromiseInterface
     */
    public function getEntryAsync(
            GetEntryRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetEntryRequest $request
     * @return GetEntryResult
     */
    public function getEntry (
            GetEntryRequest $request
    ): GetEntryResult {
        return $this->getEntryAsync(
            $request
        )->wait();
    }

    /**
     * @param GetEntryByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getEntryByUserIdAsync(
            GetEntryByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetEntryByUserIdRequest $request
     * @return GetEntryByUserIdResult
     */
    public function getEntryByUserId (
            GetEntryByUserIdRequest $request
    ): GetEntryByUserIdResult {
        return $this->getEntryByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetEntryWithSignatureRequest $request
     * @return PromiseInterface
     */
    public function getEntryWithSignatureAsync(
            GetEntryWithSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryWithSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetEntryWithSignatureRequest $request
     * @return GetEntryWithSignatureResult
     */
    public function getEntryWithSignature (
            GetEntryWithSignatureRequest $request
    ): GetEntryWithSignatureResult {
        return $this->getEntryWithSignatureAsync(
            $request
        )->wait();
    }

    /**
     * @param GetEntryWithSignatureByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getEntryWithSignatureByUserIdAsync(
            GetEntryWithSignatureByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetEntryWithSignatureByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetEntryWithSignatureByUserIdRequest $request
     * @return GetEntryWithSignatureByUserIdResult
     */
    public function getEntryWithSignatureByUserId (
            GetEntryWithSignatureByUserIdRequest $request
    ): GetEntryWithSignatureByUserIdResult {
        return $this->getEntryWithSignatureByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ResetByUserIdRequest $request
     * @return PromiseInterface
     */
    public function resetByUserIdAsync(
            ResetByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ResetByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ResetByUserIdRequest $request
     * @return ResetByUserIdResult
     */
    public function resetByUserId (
            ResetByUserIdRequest $request
    ): ResetByUserIdResult {
        return $this->resetByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyEntryRequest $request
     * @return PromiseInterface
     */
    public function verifyEntryAsync(
            VerifyEntryRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyEntryTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyEntryRequest $request
     * @return VerifyEntryResult
     */
    public function verifyEntry (
            VerifyEntryRequest $request
    ): VerifyEntryResult {
        return $this->verifyEntryAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyEntryByUserIdRequest $request
     * @return PromiseInterface
     */
    public function verifyEntryByUserIdAsync(
            VerifyEntryByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyEntryByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyEntryByUserIdRequest $request
     * @return VerifyEntryByUserIdResult
     */
    public function verifyEntryByUserId (
            VerifyEntryByUserIdRequest $request
    ): VerifyEntryByUserIdResult {
        return $this->verifyEntryByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteEntriesRequest $request
     * @return PromiseInterface
     */
    public function deleteEntriesAsync(
            DeleteEntriesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteEntriesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteEntriesRequest $request
     * @return DeleteEntriesResult
     */
    public function deleteEntries (
            DeleteEntriesRequest $request
    ): DeleteEntriesResult {
        return $this->deleteEntriesAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteEntriesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteEntriesByUserIdAsync(
            DeleteEntriesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteEntriesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteEntriesByUserIdRequest $request
     * @return DeleteEntriesByUserIdResult
     */
    public function deleteEntriesByUserId (
            DeleteEntriesByUserIdRequest $request
    ): DeleteEntriesByUserIdResult {
        return $this->deleteEntriesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddEntriesByStampSheetRequest $request
     * @return PromiseInterface
     */
    public function addEntriesByStampSheetAsync(
            AddEntriesByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddEntriesByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddEntriesByStampSheetRequest $request
     * @return AddEntriesByStampSheetResult
     */
    public function addEntriesByStampSheet (
            AddEntriesByStampSheetRequest $request
    ): AddEntriesByStampSheetResult {
        return $this->addEntriesByStampSheetAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteEntriesByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function deleteEntriesByStampTaskAsync(
            DeleteEntriesByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteEntriesByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteEntriesByStampTaskRequest $request
     * @return DeleteEntriesByStampTaskResult
     */
    public function deleteEntriesByStampTask (
            DeleteEntriesByStampTaskRequest $request
    ): DeleteEntriesByStampTaskResult {
        return $this->deleteEntriesByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param VerifyEntryByStampTaskRequest $request
     * @return PromiseInterface
     */
    public function verifyEntryByStampTaskAsync(
            VerifyEntryByStampTaskRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new VerifyEntryByStampTaskTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param VerifyEntryByStampTaskRequest $request
     * @return VerifyEntryByStampTaskResult
     */
    public function verifyEntryByStampTask (
            VerifyEntryByStampTaskRequest $request
    ): VerifyEntryByStampTaskResult {
        return $this->verifyEntryByStampTaskAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLikesRequest $request
     * @return PromiseInterface
     */
    public function describeLikesAsync(
            DescribeLikesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLikesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLikesRequest $request
     * @return DescribeLikesResult
     */
    public function describeLikes (
            DescribeLikesRequest $request
    ): DescribeLikesResult {
        return $this->describeLikesAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeLikesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeLikesByUserIdAsync(
            DescribeLikesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeLikesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeLikesByUserIdRequest $request
     * @return DescribeLikesByUserIdResult
     */
    public function describeLikesByUserId (
            DescribeLikesByUserIdRequest $request
    ): DescribeLikesByUserIdResult {
        return $this->describeLikesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AddLikesRequest $request
     * @return PromiseInterface
     */
    public function addLikesAsync(
            AddLikesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddLikesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddLikesRequest $request
     * @return AddLikesResult
     */
    public function addLikes (
            AddLikesRequest $request
    ): AddLikesResult {
        return $this->addLikesAsync(
            $request
        )->wait();
    }

    /**
     * @param AddLikesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function addLikesByUserIdAsync(
            AddLikesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AddLikesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AddLikesByUserIdRequest $request
     * @return AddLikesByUserIdResult
     */
    public function addLikesByUserId (
            AddLikesByUserIdRequest $request
    ): AddLikesByUserIdResult {
        return $this->addLikesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLikeRequest $request
     * @return PromiseInterface
     */
    public function getLikeAsync(
            GetLikeRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLikeTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLikeRequest $request
     * @return GetLikeResult
     */
    public function getLike (
            GetLikeRequest $request
    ): GetLikeResult {
        return $this->getLikeAsync(
            $request
        )->wait();
    }

    /**
     * @param GetLikeByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getLikeByUserIdAsync(
            GetLikeByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetLikeByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetLikeByUserIdRequest $request
     * @return GetLikeByUserIdResult
     */
    public function getLikeByUserId (
            GetLikeByUserIdRequest $request
    ): GetLikeByUserIdResult {
        return $this->getLikeByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param ResetLikesRequest $request
     * @return PromiseInterface
     */
    public function resetLikesAsync(
            ResetLikesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ResetLikesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ResetLikesRequest $request
     * @return ResetLikesResult
     */
    public function resetLikes (
            ResetLikesRequest $request
    ): ResetLikesResult {
        return $this->resetLikesAsync(
            $request
        )->wait();
    }

    /**
     * @param ResetLikesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function resetLikesByUserIdAsync(
            ResetLikesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new ResetLikesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param ResetLikesByUserIdRequest $request
     * @return ResetLikesByUserIdResult
     */
    public function resetLikesByUserId (
            ResetLikesByUserIdRequest $request
    ): ResetLikesByUserIdResult {
        return $this->resetLikesByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteLikesRequest $request
     * @return PromiseInterface
     */
    public function deleteLikesAsync(
            DeleteLikesRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteLikesTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteLikesRequest $request
     * @return DeleteLikesResult
     */
    public function deleteLikes (
            DeleteLikesRequest $request
    ): DeleteLikesResult {
        return $this->deleteLikesAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteLikesByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteLikesByUserIdAsync(
            DeleteLikesByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteLikesByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteLikesByUserIdRequest $request
     * @return DeleteLikesByUserIdResult
     */
    public function deleteLikesByUserId (
            DeleteLikesByUserIdRequest $request
    ): DeleteLikesByUserIdResult {
        return $this->deleteLikesByUserIdAsync(
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
     * @param GetCurrentEntryMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentEntryMasterAsync(
            GetCurrentEntryMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentEntryMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentEntryMasterRequest $request
     * @return GetCurrentEntryMasterResult
     */
    public function getCurrentEntryMaster (
            GetCurrentEntryMasterRequest $request
    ): GetCurrentEntryMasterResult {
        return $this->getCurrentEntryMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param PreUpdateCurrentEntryMasterRequest $request
     * @return PromiseInterface
     */
    public function preUpdateCurrentEntryMasterAsync(
            PreUpdateCurrentEntryMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PreUpdateCurrentEntryMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param PreUpdateCurrentEntryMasterRequest $request
     * @return PreUpdateCurrentEntryMasterResult
     */
    public function preUpdateCurrentEntryMaster (
            PreUpdateCurrentEntryMasterRequest $request
    ): PreUpdateCurrentEntryMasterResult {
        return $this->preUpdateCurrentEntryMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentEntryMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentEntryMasterAsync(
            UpdateCurrentEntryMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentEntryMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentEntryMasterRequest $request
     * @return UpdateCurrentEntryMasterResult
     */
    public function updateCurrentEntryMaster (
            UpdateCurrentEntryMasterRequest $request
    ): UpdateCurrentEntryMasterResult {
        return $this->updateCurrentEntryMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentEntryMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentEntryMasterFromGitHubAsync(
            UpdateCurrentEntryMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentEntryMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentEntryMasterFromGitHubRequest $request
     * @return UpdateCurrentEntryMasterFromGitHubResult
     */
    public function updateCurrentEntryMasterFromGitHub (
            UpdateCurrentEntryMasterFromGitHubRequest $request
    ): UpdateCurrentEntryMasterFromGitHubResult {
        return $this->updateCurrentEntryMasterFromGitHubAsync(
            $request
        )->wait();
    }
}