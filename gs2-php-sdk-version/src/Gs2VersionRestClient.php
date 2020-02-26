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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/version";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/version";

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
        if ($this->request->getWarningVersion() != null) {
            $json["warningVersion"] = $this->request->getWarningVersion()->toJson();
        }
        if ($this->request->getErrorVersion() != null) {
            $json["errorVersion"] = $this->request->getErrorVersion()->toJson();
        }
        if ($this->request->getScope() != null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getCurrentVersion() != null) {
            $json["currentVersion"] = $this->request->getCurrentVersion()->toJson();
        }
        if ($this->request->getNeedSignature() != null) {
            $json["needSignature"] = $this->request->getNeedSignature();
        }
        if ($this->request->getSignatureKeyId() != null) {
            $json["signatureKeyId"] = $this->request->getSignatureKeyId();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() == null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() == null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getMetadata() != null) {
            $json["metadata"] = $this->request->getMetadata();
        }
        if ($this->request->getWarningVersion() != null) {
            $json["warningVersion"] = $this->request->getWarningVersion()->toJson();
        }
        if ($this->request->getErrorVersion() != null) {
            $json["errorVersion"] = $this->request->getErrorVersion()->toJson();
        }
        if ($this->request->getScope() != null) {
            $json["scope"] = $this->request->getScope();
        }
        if ($this->request->getCurrentVersion() != null) {
            $json["currentVersion"] = $this->request->getCurrentVersion()->toJson();
        }
        if ($this->request->getNeedSignature() != null) {
            $json["needSignature"] = $this->request->getNeedSignature();
        }
        if ($this->request->getSignatureKeyId() != null) {
            $json["signatureKeyId"] = $this->request->getSignatureKeyId();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() == null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/version";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/version/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() == null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/acceptVersion";

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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/acceptVersion";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $queryStrings = [];
        if ($this->request->getContextStack() != null) {
            $queryStrings["contextStack"] = $this->request->getContextStack();
        }
        if ($this->request->getUserId() != null) {
            $queryStrings["userId"] = $this->request->getUserId();
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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/acceptVersion";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getVersionName() != null) {
            $json["versionName"] = $this->request->getVersionName();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/acceptVersion";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getVersionName() != null) {
            $json["versionName"] = $this->request->getVersionName();
        }
        if ($this->request->getUserId() != null) {
            $json["userId"] = $this->request->getUserId();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() == null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() == null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() == null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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
        if ($this->request->getAccessToken() != null) {
            $this->builder->setHeader("X-GS2-ACCESS-TOKEN", $this->request->getAccessToken());
        }
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/{versionName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() == null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/check";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getTargetVersions() != null) {
            $array = [];
            foreach ($this->request->getTargetVersions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["targetVersions"] = $array;
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/check";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getTargetVersions() != null) {
            $array = [];
            foreach ($this->request->getTargetVersions() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["targetVersions"] = $array;
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/calculate/signature";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{versionName}", $this->request->getVersionName() == null|| strlen($this->request->getVersionName()) == 0 ? "null" : $this->request->getVersionName(), $url);

        $json = [];
        if ($this->request->getVersion() != null) {
            $json["version"] = $this->request->getVersion()->toJson();
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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/export";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master";

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

        $url = str_replace('{service}', "version", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/master/from_git_hub";

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
     * バージョンマスターの一覧を取得<br>
     *
     * @param DescribeVersionModelMastersRequest $request リクエストパラメータ
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
     * バージョンマスターの一覧を取得<br>
     *
     * @param DescribeVersionModelMastersRequest $request リクエストパラメータ
     * @return DescribeVersionModelMastersResult
     */
    public function describeVersionModelMasters (
            DescribeVersionModelMastersRequest $request
    ): DescribeVersionModelMastersResult {

        $resultAsyncResult = [];
        $this->describeVersionModelMastersAsync(
            $request
        )->then(
            function (DescribeVersionModelMastersResult $result) use (&$resultAsyncResult) {
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
     * バージョンマスターを新規作成<br>
     *
     * @param CreateVersionModelMasterRequest $request リクエストパラメータ
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
     * バージョンマスターを新規作成<br>
     *
     * @param CreateVersionModelMasterRequest $request リクエストパラメータ
     * @return CreateVersionModelMasterResult
     */
    public function createVersionModelMaster (
            CreateVersionModelMasterRequest $request
    ): CreateVersionModelMasterResult {

        $resultAsyncResult = [];
        $this->createVersionModelMasterAsync(
            $request
        )->then(
            function (CreateVersionModelMasterResult $result) use (&$resultAsyncResult) {
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
     * バージョンマスターを取得<br>
     *
     * @param GetVersionModelMasterRequest $request リクエストパラメータ
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
     * バージョンマスターを取得<br>
     *
     * @param GetVersionModelMasterRequest $request リクエストパラメータ
     * @return GetVersionModelMasterResult
     */
    public function getVersionModelMaster (
            GetVersionModelMasterRequest $request
    ): GetVersionModelMasterResult {

        $resultAsyncResult = [];
        $this->getVersionModelMasterAsync(
            $request
        )->then(
            function (GetVersionModelMasterResult $result) use (&$resultAsyncResult) {
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
     * バージョンマスターを更新<br>
     *
     * @param UpdateVersionModelMasterRequest $request リクエストパラメータ
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
     * バージョンマスターを更新<br>
     *
     * @param UpdateVersionModelMasterRequest $request リクエストパラメータ
     * @return UpdateVersionModelMasterResult
     */
    public function updateVersionModelMaster (
            UpdateVersionModelMasterRequest $request
    ): UpdateVersionModelMasterResult {

        $resultAsyncResult = [];
        $this->updateVersionModelMasterAsync(
            $request
        )->then(
            function (UpdateVersionModelMasterResult $result) use (&$resultAsyncResult) {
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
     * バージョンマスターを削除<br>
     *
     * @param DeleteVersionModelMasterRequest $request リクエストパラメータ
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
     * バージョンマスターを削除<br>
     *
     * @param DeleteVersionModelMasterRequest $request リクエストパラメータ
     * @return DeleteVersionModelMasterResult
     */
    public function deleteVersionModelMaster (
            DeleteVersionModelMasterRequest $request
    ): DeleteVersionModelMasterResult {

        $resultAsyncResult = [];
        $this->deleteVersionModelMasterAsync(
            $request
        )->then(
            function (DeleteVersionModelMasterResult $result) use (&$resultAsyncResult) {
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
     * バージョン設定の一覧を取得<br>
     *
     * @param DescribeVersionModelsRequest $request リクエストパラメータ
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
     * バージョン設定の一覧を取得<br>
     *
     * @param DescribeVersionModelsRequest $request リクエストパラメータ
     * @return DescribeVersionModelsResult
     */
    public function describeVersionModels (
            DescribeVersionModelsRequest $request
    ): DescribeVersionModelsResult {

        $resultAsyncResult = [];
        $this->describeVersionModelsAsync(
            $request
        )->then(
            function (DescribeVersionModelsResult $result) use (&$resultAsyncResult) {
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
     * バージョン設定を取得<br>
     *
     * @param GetVersionModelRequest $request リクエストパラメータ
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
     * バージョン設定を取得<br>
     *
     * @param GetVersionModelRequest $request リクエストパラメータ
     * @return GetVersionModelResult
     */
    public function getVersionModel (
            GetVersionModelRequest $request
    ): GetVersionModelResult {

        $resultAsyncResult = [];
        $this->getVersionModelAsync(
            $request
        )->then(
            function (GetVersionModelResult $result) use (&$resultAsyncResult) {
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
     * 承認したバージョンの一覧を取得<br>
     *
     * @param DescribeAcceptVersionsRequest $request リクエストパラメータ
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
     * 承認したバージョンの一覧を取得<br>
     *
     * @param DescribeAcceptVersionsRequest $request リクエストパラメータ
     * @return DescribeAcceptVersionsResult
     */
    public function describeAcceptVersions (
            DescribeAcceptVersionsRequest $request
    ): DescribeAcceptVersionsResult {

        $resultAsyncResult = [];
        $this->describeAcceptVersionsAsync(
            $request
        )->then(
            function (DescribeAcceptVersionsResult $result) use (&$resultAsyncResult) {
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
     * 承認したバージョンの一覧を取得<br>
     *
     * @param DescribeAcceptVersionsByUserIdRequest $request リクエストパラメータ
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
     * 承認したバージョンの一覧を取得<br>
     *
     * @param DescribeAcceptVersionsByUserIdRequest $request リクエストパラメータ
     * @return DescribeAcceptVersionsByUserIdResult
     */
    public function describeAcceptVersionsByUserId (
            DescribeAcceptVersionsByUserIdRequest $request
    ): DescribeAcceptVersionsByUserIdResult {

        $resultAsyncResult = [];
        $this->describeAcceptVersionsByUserIdAsync(
            $request
        )->then(
            function (DescribeAcceptVersionsByUserIdResult $result) use (&$resultAsyncResult) {
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
     * 現在のバージョンを承認<br>
     *
     * @param AcceptRequest $request リクエストパラメータ
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
     * 現在のバージョンを承認<br>
     *
     * @param AcceptRequest $request リクエストパラメータ
     * @return AcceptResult
     */
    public function accept (
            AcceptRequest $request
    ): AcceptResult {

        $resultAsyncResult = [];
        $this->acceptAsync(
            $request
        )->then(
            function (AcceptResult $result) use (&$resultAsyncResult) {
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
     * ユーザIDを指定して現在のバージョンを承認<br>
     *
     * @param AcceptByUserIdRequest $request リクエストパラメータ
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
     * ユーザIDを指定して現在のバージョンを承認<br>
     *
     * @param AcceptByUserIdRequest $request リクエストパラメータ
     * @return AcceptByUserIdResult
     */
    public function acceptByUserId (
            AcceptByUserIdRequest $request
    ): AcceptByUserIdResult {

        $resultAsyncResult = [];
        $this->acceptByUserIdAsync(
            $request
        )->then(
            function (AcceptByUserIdResult $result) use (&$resultAsyncResult) {
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
     * 承認したバージョンを取得<br>
     *
     * @param GetAcceptVersionRequest $request リクエストパラメータ
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
     * 承認したバージョンを取得<br>
     *
     * @param GetAcceptVersionRequest $request リクエストパラメータ
     * @return GetAcceptVersionResult
     */
    public function getAcceptVersion (
            GetAcceptVersionRequest $request
    ): GetAcceptVersionResult {

        $resultAsyncResult = [];
        $this->getAcceptVersionAsync(
            $request
        )->then(
            function (GetAcceptVersionResult $result) use (&$resultAsyncResult) {
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
     * ユーザーIDを指定して承認したバージョンを取得<br>
     *
     * @param GetAcceptVersionByUserIdRequest $request リクエストパラメータ
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
     * ユーザーIDを指定して承認したバージョンを取得<br>
     *
     * @param GetAcceptVersionByUserIdRequest $request リクエストパラメータ
     * @return GetAcceptVersionByUserIdResult
     */
    public function getAcceptVersionByUserId (
            GetAcceptVersionByUserIdRequest $request
    ): GetAcceptVersionByUserIdResult {

        $resultAsyncResult = [];
        $this->getAcceptVersionByUserIdAsync(
            $request
        )->then(
            function (GetAcceptVersionByUserIdResult $result) use (&$resultAsyncResult) {
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
     * 承認したバージョンを削除<br>
     *
     * @param DeleteAcceptVersionRequest $request リクエストパラメータ
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
     * 承認したバージョンを削除<br>
     *
     * @param DeleteAcceptVersionRequest $request リクエストパラメータ
     * @return DeleteAcceptVersionResult
     */
    public function deleteAcceptVersion (
            DeleteAcceptVersionRequest $request
    ): DeleteAcceptVersionResult {

        $resultAsyncResult = [];
        $this->deleteAcceptVersionAsync(
            $request
        )->then(
            function (DeleteAcceptVersionResult $result) use (&$resultAsyncResult) {
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
     * ユーザーIDを指定して承認したバージョンを削除<br>
     *
     * @param DeleteAcceptVersionByUserIdRequest $request リクエストパラメータ
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
     * ユーザーIDを指定して承認したバージョンを削除<br>
     *
     * @param DeleteAcceptVersionByUserIdRequest $request リクエストパラメータ
     * @return DeleteAcceptVersionByUserIdResult
     */
    public function deleteAcceptVersionByUserId (
            DeleteAcceptVersionByUserIdRequest $request
    ): DeleteAcceptVersionByUserIdResult {

        $resultAsyncResult = [];
        $this->deleteAcceptVersionByUserIdAsync(
            $request
        )->then(
            function (DeleteAcceptVersionByUserIdResult $result) use (&$resultAsyncResult) {
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
     * バージョンチェック<br>
     *
     * @param CheckVersionRequest $request リクエストパラメータ
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
     * バージョンチェック<br>
     *
     * @param CheckVersionRequest $request リクエストパラメータ
     * @return CheckVersionResult
     */
    public function checkVersion (
            CheckVersionRequest $request
    ): CheckVersionResult {

        $resultAsyncResult = [];
        $this->checkVersionAsync(
            $request
        )->then(
            function (CheckVersionResult $result) use (&$resultAsyncResult) {
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
     * バージョンチェック<br>
     *
     * @param CheckVersionByUserIdRequest $request リクエストパラメータ
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
     * バージョンチェック<br>
     *
     * @param CheckVersionByUserIdRequest $request リクエストパラメータ
     * @return CheckVersionByUserIdResult
     */
    public function checkVersionByUserId (
            CheckVersionByUserIdRequest $request
    ): CheckVersionByUserIdResult {

        $resultAsyncResult = [];
        $this->checkVersionByUserIdAsync(
            $request
        )->then(
            function (CheckVersionByUserIdResult $result) use (&$resultAsyncResult) {
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
     * スタンプシートのタスクを実行する<br>
     *
     * @param CalculateSignatureRequest $request リクエストパラメータ
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
     * スタンプシートのタスクを実行する<br>
     *
     * @param CalculateSignatureRequest $request リクエストパラメータ
     * @return CalculateSignatureResult
     */
    public function calculateSignature (
            CalculateSignatureRequest $request
    ): CalculateSignatureResult {

        $resultAsyncResult = [];
        $this->calculateSignatureAsync(
            $request
        )->then(
            function (CalculateSignatureResult $result) use (&$resultAsyncResult) {
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
     * 現在有効なバージョンのマスターデータをエクスポートします<br>
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
     * 現在有効なバージョンのマスターデータをエクスポートします<br>
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
     * 現在有効なバージョンを取得します<br>
     *
     * @param GetCurrentVersionMasterRequest $request リクエストパラメータ
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
     * 現在有効なバージョンを取得します<br>
     *
     * @param GetCurrentVersionMasterRequest $request リクエストパラメータ
     * @return GetCurrentVersionMasterResult
     */
    public function getCurrentVersionMaster (
            GetCurrentVersionMasterRequest $request
    ): GetCurrentVersionMasterResult {

        $resultAsyncResult = [];
        $this->getCurrentVersionMasterAsync(
            $request
        )->then(
            function (GetCurrentVersionMasterResult $result) use (&$resultAsyncResult) {
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
     * 現在有効なバージョンを更新します<br>
     *
     * @param UpdateCurrentVersionMasterRequest $request リクエストパラメータ
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
     * 現在有効なバージョンを更新します<br>
     *
     * @param UpdateCurrentVersionMasterRequest $request リクエストパラメータ
     * @return UpdateCurrentVersionMasterResult
     */
    public function updateCurrentVersionMaster (
            UpdateCurrentVersionMasterRequest $request
    ): UpdateCurrentVersionMasterResult {

        $resultAsyncResult = [];
        $this->updateCurrentVersionMasterAsync(
            $request
        )->then(
            function (UpdateCurrentVersionMasterResult $result) use (&$resultAsyncResult) {
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
     * 現在有効なバージョンを更新します<br>
     *
     * @param UpdateCurrentVersionMasterFromGitHubRequest $request リクエストパラメータ
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
     * 現在有効なバージョンを更新します<br>
     *
     * @param UpdateCurrentVersionMasterFromGitHubRequest $request リクエストパラメータ
     * @return UpdateCurrentVersionMasterFromGitHubResult
     */
    public function updateCurrentVersionMasterFromGitHub (
            UpdateCurrentVersionMasterFromGitHubRequest $request
    ): UpdateCurrentVersionMasterFromGitHubResult {

        $resultAsyncResult = [];
        $this->updateCurrentVersionMasterFromGitHubAsync(
            $request
        )->then(
            function (UpdateCurrentVersionMasterFromGitHubResult $result) use (&$resultAsyncResult) {
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