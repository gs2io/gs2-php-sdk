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

namespace Gs2\Version;

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


use Gs2\Version\Request\DescribeNamespacesRequest;
use Gs2\Version\Result\DescribeNamespacesResult;
use Gs2\Version\Request\CreateNamespaceRequest;
use Gs2\Version\Result\CreateNamespaceResult;
use Gs2\Version\Request\GetNamespaceStatusRequest;
use Gs2\Version\Result\GetNamespaceStatusResult;
use Gs2\Version\Request\GetNamespaceRequest;
use Gs2\Version\Result\GetNamespaceResult;
use Gs2\Version\Request\UpdateNamespaceRequest;
use Gs2\Version\Result\UpdateNamespaceResult;
use Gs2\Version\Request\DeleteNamespaceRequest;
use Gs2\Version\Result\DeleteNamespaceResult;
use Gs2\Version\Request\DescribeVersionModelMastersRequest;
use Gs2\Version\Result\DescribeVersionModelMastersResult;
use Gs2\Version\Request\CreateVersionModelMasterRequest;
use Gs2\Version\Result\CreateVersionModelMasterResult;
use Gs2\Version\Request\GetVersionModelMasterRequest;
use Gs2\Version\Result\GetVersionModelMasterResult;
use Gs2\Version\Request\UpdateVersionModelMasterRequest;
use Gs2\Version\Result\UpdateVersionModelMasterResult;
use Gs2\Version\Request\DeleteVersionModelMasterRequest;
use Gs2\Version\Result\DeleteVersionModelMasterResult;
use Gs2\Version\Request\DescribeVersionModelsRequest;
use Gs2\Version\Result\DescribeVersionModelsResult;
use Gs2\Version\Request\GetVersionModelRequest;
use Gs2\Version\Result\GetVersionModelResult;
use Gs2\Version\Request\DescribeAcceptVersionsRequest;
use Gs2\Version\Result\DescribeAcceptVersionsResult;
use Gs2\Version\Request\DescribeAcceptVersionsByUserIdRequest;
use Gs2\Version\Result\DescribeAcceptVersionsByUserIdResult;
use Gs2\Version\Request\AcceptRequest;
use Gs2\Version\Result\AcceptResult;
use Gs2\Version\Request\AcceptByUserIdRequest;
use Gs2\Version\Result\AcceptByUserIdResult;
use Gs2\Version\Request\GetAcceptVersionRequest;
use Gs2\Version\Result\GetAcceptVersionResult;
use Gs2\Version\Request\GetAcceptVersionByUserIdRequest;
use Gs2\Version\Result\GetAcceptVersionByUserIdResult;
use Gs2\Version\Request\DeleteAcceptVersionRequest;
use Gs2\Version\Result\DeleteAcceptVersionResult;
use Gs2\Version\Request\DeleteAcceptVersionByUserIdRequest;
use Gs2\Version\Result\DeleteAcceptVersionByUserIdResult;
use Gs2\Version\Request\CheckVersionRequest;
use Gs2\Version\Result\CheckVersionResult;
use Gs2\Version\Request\CheckVersionByUserIdRequest;
use Gs2\Version\Result\CheckVersionByUserIdResult;
use Gs2\Version\Request\CalculateSignatureRequest;
use Gs2\Version\Result\CalculateSignatureResult;
use Gs2\Version\Request\ExportMasterRequest;
use Gs2\Version\Result\ExportMasterResult;
use Gs2\Version\Request\GetCurrentVersionMasterRequest;
use Gs2\Version\Result\GetCurrentVersionMasterResult;
use Gs2\Version\Request\UpdateCurrentVersionMasterRequest;
use Gs2\Version\Result\UpdateCurrentVersionMasterResult;
use Gs2\Version\Request\UpdateCurrentVersionMasterFromGitHubRequest;
use Gs2\Version\Result\UpdateCurrentVersionMasterFromGitHubResult;

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getAssumeUserId() !== null) {
            $json["assumeUserId"] = $this->request->getAssumeUserId();
        }
        if ($this->request->getAcceptVersionScript() !== null) {
            $json["acceptVersionScript"] = $this->request->getAcceptVersionScript()->toJson();
        }
        if ($this->request->getCheckVersionTriggerScriptId() !== null) {
            $json["checkVersionTriggerScriptId"] = $this->request->getCheckVersionTriggerScriptId();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getAssumeUserId() !== null) {
            $json["assumeUserId"] = $this->request->getAssumeUserId();
        }
        if ($this->request->getAcceptVersionScript() !== null) {
            $json["acceptVersionScript"] = $this->request->getAcceptVersionScript()->toJson();
        }
        if ($this->request->getCheckVersionTriggerScriptId() !== null) {
            $json["checkVersionTriggerScriptId"] = $this->request->getCheckVersionTriggerScriptId();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

class DescribeVersionModelMastersTask extends Gs2RestSessionTask {

    /**
     * @var DescribeVersionModelMastersRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeVersionModelMastersTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeVersionModelMastersRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeVersionModelMastersRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeVersionModelMastersResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version";

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

class CreateVersionModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var CreateVersionModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateVersionModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param CreateVersionModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateVersionModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            CreateVersionModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version";

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
        if ($this->request->getWarningVersion() !== null) {
            $json["warningVersion"] = $this->request->getWarningVersion()->toJson();
        }
        if ($this->request->getErrorVersion() !== null) {
            $json["errorVersion"] = $this->request->getErrorVersion()->toJson();
        }
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getCurrentVersion() !== null) {
            $json["currentVersion"] = $this->request->getCurrentVersion()->toJson();
        }
        if ($this->request->getNeedSignature() !== null) {
            $json["needSignature"] = $this->request->getNeedSignature();
        }
        if ($this->request->getSignatureKeyId() !== null) {
            $json["signatureKeyId"] = $this->request->getSignatureKeyId();
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

class GetVersionModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetVersionModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetVersionModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetVersionModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetVersionModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetVersionModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class UpdateVersionModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateVersionModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateVersionModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateVersionModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateVersionModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateVersionModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() !== null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getWarningVersion() !== null) {
            $json["warningVersion"] = $this->request->getWarningVersion()->toJson();
        }
        if ($this->request->getErrorVersion() !== null) {
            $json["errorVersion"] = $this->request->getErrorVersion()->toJson();
        }
        if ($this->request->getScope() !== null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getCurrentVersion() !== null) {
            $json["currentVersion"] = $this->request->getCurrentVersion()->toJson();
        }
        if ($this->request->getNeedSignature() !== null) {
            $json["needSignature"] = $this->request->getNeedSignature();
        }
        if ($this->request->getSignatureKeyId() !== null) {
            $json["signatureKeyId"] = $this->request->getSignatureKeyId();
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

class DeleteVersionModelMasterTask extends Gs2RestSessionTask {

    /**
     * @var DeleteVersionModelMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteVersionModelMasterTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteVersionModelMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteVersionModelMasterRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteVersionModelMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class DescribeVersionModelsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeVersionModelsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeVersionModelsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeVersionModelsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeVersionModelsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeVersionModelsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/version";

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

class GetVersionModelTask extends Gs2RestSessionTask {

    /**
     * @var GetVersionModelRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetVersionModelTask constructor.
     * @param Gs2RestSession $session
     * @param GetVersionModelRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetVersionModelRequest $request
    ) {
        parent::__construct(
            $session,
            GetVersionModelResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class DescribeAcceptVersionsTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAcceptVersionsRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAcceptVersionsTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAcceptVersionsRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAcceptVersionsRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAcceptVersionsResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/acceptVersion";

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

class DescribeAcceptVersionsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeAcceptVersionsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeAcceptVersionsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeAcceptVersionsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeAcceptVersionsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeAcceptVersionsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/acceptVersion";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() !== null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() !== null) {
            $queryStrings["userId"] = $this->request->getUserId();
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

class AcceptTask extends Gs2RestSessionTask {

    /**
     * @var AcceptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcceptTask constructor.
     * @param Gs2RestSession $session
     * @param AcceptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcceptRequest $request
    ) {
        parent::__construct(
            $session,
            AcceptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/acceptVersion";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getVersionName() !== null) {
            $json["versionName"] = $this->request->getVersionName();
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

class AcceptByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var AcceptByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * AcceptByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param AcceptByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        AcceptByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            AcceptByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/acceptVersion";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getVersionName() !== null) {
            $json["versionName"] = $this->request->getVersionName();
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

class GetAcceptVersionTask extends Gs2RestSessionTask {

    /**
     * @var GetAcceptVersionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAcceptVersionTask constructor.
     * @param Gs2RestSession $session
     * @param GetAcceptVersionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAcceptVersionRequest $request
    ) {
        parent::__construct(
            $session,
            GetAcceptVersionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class GetAcceptVersionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetAcceptVersionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetAcceptVersionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetAcceptVersionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetAcceptVersionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetAcceptVersionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class DeleteAcceptVersionTask extends Gs2RestSessionTask {

    /**
     * @var DeleteAcceptVersionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteAcceptVersionTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteAcceptVersionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteAcceptVersionRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteAcceptVersionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class DeleteAcceptVersionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteAcceptVersionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteAcceptVersionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteAcceptVersionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteAcceptVersionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteAcceptVersionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

class CheckVersionTask extends Gs2RestSessionTask {

    /**
     * @var CheckVersionRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckVersionTask constructor.
     * @param Gs2RestSession $session
     * @param CheckVersionRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckVersionRequest $request
    ) {
        parent::__construct(
            $session,
            CheckVersionResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/me/check";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getTargetVersions() !== null) {
            $array = [];
            foreach ($this->request->getTargetVersions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["targetVersions"] = $array;
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

class CheckVersionByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var CheckVersionByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CheckVersionByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param CheckVersionByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CheckVersionByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            CheckVersionByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/user/{userId}/check";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() === null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTargetVersions() !== null) {
            $array = [];
            foreach ($this->request->getTargetVersions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["targetVersions"] = $array;
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

class CalculateSignatureTask extends Gs2RestSessionTask {

    /**
     * @var CalculateSignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CalculateSignatureTask constructor.
     * @param Gs2RestSession $session
     * @param CalculateSignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CalculateSignatureRequest $request
    ) {
        parent::__construct(
            $session,
            CalculateSignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/version/{versionName}/calculate/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() === null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

        $json = [];
        if ($this->request->getVersion() !== null) {
            $json["version"] = $this->request->getVersion()->toJson();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/export";

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

class GetCurrentVersionMasterTask extends Gs2RestSessionTask {

    /**
     * @var GetCurrentVersionMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetCurrentVersionMasterTask constructor.
     * @param Gs2RestSession $session
     * @param GetCurrentVersionMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetCurrentVersionMasterRequest $request
    ) {
        parent::__construct(
            $session,
            GetCurrentVersionMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentVersionMasterTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentVersionMasterRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentVersionMasterTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentVersionMasterRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentVersionMasterRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentVersionMasterResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master";

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

class UpdateCurrentVersionMasterFromGitHubTask extends Gs2RestSessionTask {

    /**
     * @var UpdateCurrentVersionMasterFromGitHubRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateCurrentVersionMasterFromGitHubTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateCurrentVersionMasterFromGitHubRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateCurrentVersionMasterFromGitHubRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateCurrentVersionMasterFromGitHubResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/master/from_git_hub";

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
 * GS2 Version API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2VersionRestClient extends AbstractGs2Client {

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
     * @param DescribeVersionModelMastersRequest $request
     * @return PromiseInterface
     */
    public function describeVersionModelMastersAsync(
            DescribeVersionModelMastersRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeVersionModelMastersTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeVersionModelMastersRequest $request
     * @return DescribeVersionModelMastersResult
     */
    public function describeVersionModelMasters (
            DescribeVersionModelMastersRequest $request
    ): DescribeVersionModelMastersResult {
        return $this->describeVersionModelMastersAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateVersionModelMasterRequest $request
     * @return PromiseInterface
     */
    public function createVersionModelMasterAsync(
            CreateVersionModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateVersionModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateVersionModelMasterRequest $request
     * @return CreateVersionModelMasterResult
     */
    public function createVersionModelMaster (
            CreateVersionModelMasterRequest $request
    ): CreateVersionModelMasterResult {
        return $this->createVersionModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param GetVersionModelMasterRequest $request
     * @return PromiseInterface
     */
    public function getVersionModelMasterAsync(
            GetVersionModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetVersionModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetVersionModelMasterRequest $request
     * @return GetVersionModelMasterResult
     */
    public function getVersionModelMaster (
            GetVersionModelMasterRequest $request
    ): GetVersionModelMasterResult {
        return $this->getVersionModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateVersionModelMasterRequest $request
     * @return PromiseInterface
     */
    public function updateVersionModelMasterAsync(
            UpdateVersionModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateVersionModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateVersionModelMasterRequest $request
     * @return UpdateVersionModelMasterResult
     */
    public function updateVersionModelMaster (
            UpdateVersionModelMasterRequest $request
    ): UpdateVersionModelMasterResult {
        return $this->updateVersionModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteVersionModelMasterRequest $request
     * @return PromiseInterface
     */
    public function deleteVersionModelMasterAsync(
            DeleteVersionModelMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteVersionModelMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteVersionModelMasterRequest $request
     * @return DeleteVersionModelMasterResult
     */
    public function deleteVersionModelMaster (
            DeleteVersionModelMasterRequest $request
    ): DeleteVersionModelMasterResult {
        return $this->deleteVersionModelMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeVersionModelsRequest $request
     * @return PromiseInterface
     */
    public function describeVersionModelsAsync(
            DescribeVersionModelsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeVersionModelsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeVersionModelsRequest $request
     * @return DescribeVersionModelsResult
     */
    public function describeVersionModels (
            DescribeVersionModelsRequest $request
    ): DescribeVersionModelsResult {
        return $this->describeVersionModelsAsync(
            $request
        )->wait();
    }

    /**
     * @param GetVersionModelRequest $request
     * @return PromiseInterface
     */
    public function getVersionModelAsync(
            GetVersionModelRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetVersionModelTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetVersionModelRequest $request
     * @return GetVersionModelResult
     */
    public function getVersionModel (
            GetVersionModelRequest $request
    ): GetVersionModelResult {
        return $this->getVersionModelAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeAcceptVersionsRequest $request
     * @return PromiseInterface
     */
    public function describeAcceptVersionsAsync(
            DescribeAcceptVersionsRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAcceptVersionsTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeAcceptVersionsRequest $request
     * @return DescribeAcceptVersionsResult
     */
    public function describeAcceptVersions (
            DescribeAcceptVersionsRequest $request
    ): DescribeAcceptVersionsResult {
        return $this->describeAcceptVersionsAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeAcceptVersionsByUserIdRequest $request
     * @return PromiseInterface
     */
    public function describeAcceptVersionsByUserIdAsync(
            DescribeAcceptVersionsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeAcceptVersionsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeAcceptVersionsByUserIdRequest $request
     * @return DescribeAcceptVersionsByUserIdResult
     */
    public function describeAcceptVersionsByUserId (
            DescribeAcceptVersionsByUserIdRequest $request
    ): DescribeAcceptVersionsByUserIdResult {
        return $this->describeAcceptVersionsByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param AcceptRequest $request
     * @return PromiseInterface
     */
    public function acceptAsync(
            AcceptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcceptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcceptRequest $request
     * @return AcceptResult
     */
    public function accept (
            AcceptRequest $request
    ): AcceptResult {
        return $this->acceptAsync(
            $request
        )->wait();
    }

    /**
     * @param AcceptByUserIdRequest $request
     * @return PromiseInterface
     */
    public function acceptByUserIdAsync(
            AcceptByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new AcceptByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param AcceptByUserIdRequest $request
     * @return AcceptByUserIdResult
     */
    public function acceptByUserId (
            AcceptByUserIdRequest $request
    ): AcceptByUserIdResult {
        return $this->acceptByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param GetAcceptVersionRequest $request
     * @return PromiseInterface
     */
    public function getAcceptVersionAsync(
            GetAcceptVersionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAcceptVersionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetAcceptVersionRequest $request
     * @return GetAcceptVersionResult
     */
    public function getAcceptVersion (
            GetAcceptVersionRequest $request
    ): GetAcceptVersionResult {
        return $this->getAcceptVersionAsync(
            $request
        )->wait();
    }

    /**
     * @param GetAcceptVersionByUserIdRequest $request
     * @return PromiseInterface
     */
    public function getAcceptVersionByUserIdAsync(
            GetAcceptVersionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetAcceptVersionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetAcceptVersionByUserIdRequest $request
     * @return GetAcceptVersionByUserIdResult
     */
    public function getAcceptVersionByUserId (
            GetAcceptVersionByUserIdRequest $request
    ): GetAcceptVersionByUserIdResult {
        return $this->getAcceptVersionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteAcceptVersionRequest $request
     * @return PromiseInterface
     */
    public function deleteAcceptVersionAsync(
            DeleteAcceptVersionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteAcceptVersionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteAcceptVersionRequest $request
     * @return DeleteAcceptVersionResult
     */
    public function deleteAcceptVersion (
            DeleteAcceptVersionRequest $request
    ): DeleteAcceptVersionResult {
        return $this->deleteAcceptVersionAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteAcceptVersionByUserIdRequest $request
     * @return PromiseInterface
     */
    public function deleteAcceptVersionByUserIdAsync(
            DeleteAcceptVersionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteAcceptVersionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteAcceptVersionByUserIdRequest $request
     * @return DeleteAcceptVersionByUserIdResult
     */
    public function deleteAcceptVersionByUserId (
            DeleteAcceptVersionByUserIdRequest $request
    ): DeleteAcceptVersionByUserIdResult {
        return $this->deleteAcceptVersionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckVersionRequest $request
     * @return PromiseInterface
     */
    public function checkVersionAsync(
            CheckVersionRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckVersionTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckVersionRequest $request
     * @return CheckVersionResult
     */
    public function checkVersion (
            CheckVersionRequest $request
    ): CheckVersionResult {
        return $this->checkVersionAsync(
            $request
        )->wait();
    }

    /**
     * @param CheckVersionByUserIdRequest $request
     * @return PromiseInterface
     */
    public function checkVersionByUserIdAsync(
            CheckVersionByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CheckVersionByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CheckVersionByUserIdRequest $request
     * @return CheckVersionByUserIdResult
     */
    public function checkVersionByUserId (
            CheckVersionByUserIdRequest $request
    ): CheckVersionByUserIdResult {
        return $this->checkVersionByUserIdAsync(
            $request
        )->wait();
    }

    /**
     * @param CalculateSignatureRequest $request
     * @return PromiseInterface
     */
    public function calculateSignatureAsync(
            CalculateSignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CalculateSignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CalculateSignatureRequest $request
     * @return CalculateSignatureResult
     */
    public function calculateSignature (
            CalculateSignatureRequest $request
    ): CalculateSignatureResult {
        return $this->calculateSignatureAsync(
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
     * @param GetCurrentVersionMasterRequest $request
     * @return PromiseInterface
     */
    public function getCurrentVersionMasterAsync(
            GetCurrentVersionMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetCurrentVersionMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetCurrentVersionMasterRequest $request
     * @return GetCurrentVersionMasterResult
     */
    public function getCurrentVersionMaster (
            GetCurrentVersionMasterRequest $request
    ): GetCurrentVersionMasterResult {
        return $this->getCurrentVersionMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentVersionMasterRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentVersionMasterAsync(
            UpdateCurrentVersionMasterRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentVersionMasterTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentVersionMasterRequest $request
     * @return UpdateCurrentVersionMasterResult
     */
    public function updateCurrentVersionMaster (
            UpdateCurrentVersionMasterRequest $request
    ): UpdateCurrentVersionMasterResult {
        return $this->updateCurrentVersionMasterAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateCurrentVersionMasterFromGitHubRequest $request
     * @return PromiseInterface
     */
    public function updateCurrentVersionMasterFromGitHubAsync(
            UpdateCurrentVersionMasterFromGitHubRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateCurrentVersionMasterFromGitHubTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateCurrentVersionMasterFromGitHubRequest $request
     * @return UpdateCurrentVersionMasterFromGitHubResult
     */
    public function updateCurrentVersionMasterFromGitHub (
            UpdateCurrentVersionMasterFromGitHubRequest $request
    ): UpdateCurrentVersionMasterFromGitHubResult {
        return $this->updateCurrentVersionMasterFromGitHubAsync(
            $request
        )->wait();
    }
}