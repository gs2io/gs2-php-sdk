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

namespace Gs2\Key;

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


use Gs2\Key\Request\DescribeNamespacesRequest;
use Gs2\Key\Result\DescribeNamespacesResult;
use Gs2\Key\Request\CreateNamespaceRequest;
use Gs2\Key\Result\CreateNamespaceResult;
use Gs2\Key\Request\GetNamespaceStatusRequest;
use Gs2\Key\Result\GetNamespaceStatusResult;
use Gs2\Key\Request\GetNamespaceRequest;
use Gs2\Key\Result\GetNamespaceResult;
use Gs2\Key\Request\UpdateNamespaceRequest;
use Gs2\Key\Result\UpdateNamespaceResult;
use Gs2\Key\Request\DeleteNamespaceRequest;
use Gs2\Key\Result\DeleteNamespaceResult;
use Gs2\Key\Request\GetServiceVersionRequest;
use Gs2\Key\Result\GetServiceVersionResult;
use Gs2\Key\Request\DescribeKeysRequest;
use Gs2\Key\Result\DescribeKeysResult;
use Gs2\Key\Request\CreateKeyRequest;
use Gs2\Key\Result\CreateKeyResult;
use Gs2\Key\Request\UpdateKeyRequest;
use Gs2\Key\Result\UpdateKeyResult;
use Gs2\Key\Request\GetKeyRequest;
use Gs2\Key\Result\GetKeyResult;
use Gs2\Key\Request\DeleteKeyRequest;
use Gs2\Key\Result\DeleteKeyResult;
use Gs2\Key\Request\EncryptRequest;
use Gs2\Key\Result\EncryptResult;
use Gs2\Key\Request\DecryptRequest;
use Gs2\Key\Result\DecryptResult;
use Gs2\Key\Request\DescribeGitHubApiKeysRequest;
use Gs2\Key\Result\DescribeGitHubApiKeysResult;
use Gs2\Key\Request\CreateGitHubApiKeyRequest;
use Gs2\Key\Result\CreateGitHubApiKeyResult;
use Gs2\Key\Request\UpdateGitHubApiKeyRequest;
use Gs2\Key\Result\UpdateGitHubApiKeyResult;
use Gs2\Key\Request\GetGitHubApiKeyRequest;
use Gs2\Key\Result\GetGitHubApiKeyResult;
use Gs2\Key\Request\DeleteGitHubApiKeyRequest;
use Gs2\Key\Result\DeleteGitHubApiKeyResult;

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

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/";

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

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/system/version";

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

class DescribeKeysTask extends Gs2RestSessionTask {

    /**
     * @var DescribeKeysRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeKeysTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeKeysRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeKeysRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeKeysResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/key";

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

class CreateKeyTask extends Gs2RestSessionTask {

    /**
     * @var CreateKeyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateKeyTask constructor.
     * @param Gs2RestSession $session
     * @param CreateKeyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateKeyRequest $request
    ) {
        parent::__construct(
            $session,
            CreateKeyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/key";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
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

class UpdateKeyTask extends Gs2RestSessionTask {

    /**
     * @var UpdateKeyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateKeyTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateKeyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateKeyRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateKeyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/key/{keyName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{keyName}", $this->request->getKeyName() === null|| strlen($this->request->getKeyName()) == 0 ? "null" : $this->request->getKeyName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
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

class GetKeyTask extends Gs2RestSessionTask {

    /**
     * @var GetKeyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetKeyTask constructor.
     * @param Gs2RestSession $session
     * @param GetKeyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetKeyRequest $request
    ) {
        parent::__construct(
            $session,
            GetKeyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/key/{keyName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{keyName}", $this->request->getKeyName() === null|| strlen($this->request->getKeyName()) == 0 ? "null" : $this->request->getKeyName(), $url);

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

class DeleteKeyTask extends Gs2RestSessionTask {

    /**
     * @var DeleteKeyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteKeyTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteKeyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteKeyRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteKeyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/key/{keyName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{keyName}", $this->request->getKeyName() === null|| strlen($this->request->getKeyName()) == 0 ? "null" : $this->request->getKeyName(), $url);

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

class EncryptTask extends Gs2RestSessionTask {

    /**
     * @var EncryptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * EncryptTask constructor.
     * @param Gs2RestSession $session
     * @param EncryptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        EncryptRequest $request
    ) {
        parent::__construct(
            $session,
            EncryptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/key/{keyName}/encrypt";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{keyName}", $this->request->getKeyName() === null|| strlen($this->request->getKeyName()) == 0 ? "null" : $this->request->getKeyName(), $url);

        $json = [];
        if ($this->request->getData() !== null) {
            $json["data"] = $this->request->getData();
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

class DecryptTask extends Gs2RestSessionTask {

    /**
     * @var DecryptRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DecryptTask constructor.
     * @param Gs2RestSession $session
     * @param DecryptRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DecryptRequest $request
    ) {
        parent::__construct(
            $session,
            DecryptResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/key/{keyName}/decrypt";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{keyName}", $this->request->getKeyName() === null|| strlen($this->request->getKeyName()) == 0 ? "null" : $this->request->getKeyName(), $url);

        $json = [];
        if ($this->request->getData() !== null) {
            $json["data"] = $this->request->getData();
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

class DescribeGitHubApiKeysTask extends Gs2RestSessionTask {

    /**
     * @var DescribeGitHubApiKeysRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeGitHubApiKeysTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeGitHubApiKeysRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeGitHubApiKeysRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeGitHubApiKeysResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/github";

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

class CreateGitHubApiKeyTask extends Gs2RestSessionTask {

    /**
     * @var CreateGitHubApiKeyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * CreateGitHubApiKeyTask constructor.
     * @param Gs2RestSession $session
     * @param CreateGitHubApiKeyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        CreateGitHubApiKeyRequest $request
    ) {
        parent::__construct(
            $session,
            CreateGitHubApiKeyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/github";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getName() !== null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getApiKey() !== null) {
            $json["apiKey"] = $this->request->getApiKey();
        }
        if ($this->request->getEncryptionKeyName() !== null) {
            $json["encryptionKeyName"] = $this->request->getEncryptionKeyName();
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

class UpdateGitHubApiKeyTask extends Gs2RestSessionTask {

    /**
     * @var UpdateGitHubApiKeyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * UpdateGitHubApiKeyTask constructor.
     * @param Gs2RestSession $session
     * @param UpdateGitHubApiKeyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        UpdateGitHubApiKeyRequest $request
    ) {
        parent::__construct(
            $session,
            UpdateGitHubApiKeyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/github/{apiKeyName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{apiKeyName}", $this->request->getApiKeyName() === null|| strlen($this->request->getApiKeyName()) == 0 ? "null" : $this->request->getApiKeyName(), $url);

        $json = [];
        if ($this->request->getDescription() !== null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getApiKey() !== null) {
            $json["apiKey"] = $this->request->getApiKey();
        }
        if ($this->request->getEncryptionKeyName() !== null) {
            $json["encryptionKeyName"] = $this->request->getEncryptionKeyName();
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

class GetGitHubApiKeyTask extends Gs2RestSessionTask {

    /**
     * @var GetGitHubApiKeyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetGitHubApiKeyTask constructor.
     * @param Gs2RestSession $session
     * @param GetGitHubApiKeyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetGitHubApiKeyRequest $request
    ) {
        parent::__construct(
            $session,
            GetGitHubApiKeyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/github/{apiKeyName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{apiKeyName}", $this->request->getApiKeyName() === null|| strlen($this->request->getApiKeyName()) == 0 ? "null" : $this->request->getApiKeyName(), $url);

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

class DeleteGitHubApiKeyTask extends Gs2RestSessionTask {

    /**
     * @var DeleteGitHubApiKeyRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteGitHubApiKeyTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteGitHubApiKeyRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteGitHubApiKeyRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteGitHubApiKeyResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "key", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/{namespaceName}/github/{apiKeyName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() === null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{apiKeyName}", $this->request->getApiKeyName() === null|| strlen($this->request->getApiKeyName()) == 0 ? "null" : $this->request->getApiKeyName(), $url);

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

/**
 * GS2 Key API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2KeyRestClient extends AbstractGs2Client {

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
     * @param DescribeKeysRequest $request
     * @return PromiseInterface
     */
    public function describeKeysAsync(
            DescribeKeysRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeKeysTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeKeysRequest $request
     * @return DescribeKeysResult
     */
    public function describeKeys (
            DescribeKeysRequest $request
    ): DescribeKeysResult {
        return $this->describeKeysAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateKeyRequest $request
     * @return PromiseInterface
     */
    public function createKeyAsync(
            CreateKeyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateKeyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateKeyRequest $request
     * @return CreateKeyResult
     */
    public function createKey (
            CreateKeyRequest $request
    ): CreateKeyResult {
        return $this->createKeyAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateKeyRequest $request
     * @return PromiseInterface
     */
    public function updateKeyAsync(
            UpdateKeyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateKeyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateKeyRequest $request
     * @return UpdateKeyResult
     */
    public function updateKey (
            UpdateKeyRequest $request
    ): UpdateKeyResult {
        return $this->updateKeyAsync(
            $request
        )->wait();
    }

    /**
     * @param GetKeyRequest $request
     * @return PromiseInterface
     */
    public function getKeyAsync(
            GetKeyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetKeyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetKeyRequest $request
     * @return GetKeyResult
     */
    public function getKey (
            GetKeyRequest $request
    ): GetKeyResult {
        return $this->getKeyAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteKeyRequest $request
     * @return PromiseInterface
     */
    public function deleteKeyAsync(
            DeleteKeyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteKeyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteKeyRequest $request
     * @return DeleteKeyResult
     */
    public function deleteKey (
            DeleteKeyRequest $request
    ): DeleteKeyResult {
        return $this->deleteKeyAsync(
            $request
        )->wait();
    }

    /**
     * @param EncryptRequest $request
     * @return PromiseInterface
     */
    public function encryptAsync(
            EncryptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new EncryptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param EncryptRequest $request
     * @return EncryptResult
     */
    public function encrypt (
            EncryptRequest $request
    ): EncryptResult {
        return $this->encryptAsync(
            $request
        )->wait();
    }

    /**
     * @param DecryptRequest $request
     * @return PromiseInterface
     */
    public function decryptAsync(
            DecryptRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DecryptTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DecryptRequest $request
     * @return DecryptResult
     */
    public function decrypt (
            DecryptRequest $request
    ): DecryptResult {
        return $this->decryptAsync(
            $request
        )->wait();
    }

    /**
     * @param DescribeGitHubApiKeysRequest $request
     * @return PromiseInterface
     */
    public function describeGitHubApiKeysAsync(
            DescribeGitHubApiKeysRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeGitHubApiKeysTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DescribeGitHubApiKeysRequest $request
     * @return DescribeGitHubApiKeysResult
     */
    public function describeGitHubApiKeys (
            DescribeGitHubApiKeysRequest $request
    ): DescribeGitHubApiKeysResult {
        return $this->describeGitHubApiKeysAsync(
            $request
        )->wait();
    }

    /**
     * @param CreateGitHubApiKeyRequest $request
     * @return PromiseInterface
     */
    public function createGitHubApiKeyAsync(
            CreateGitHubApiKeyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new CreateGitHubApiKeyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param CreateGitHubApiKeyRequest $request
     * @return CreateGitHubApiKeyResult
     */
    public function createGitHubApiKey (
            CreateGitHubApiKeyRequest $request
    ): CreateGitHubApiKeyResult {
        return $this->createGitHubApiKeyAsync(
            $request
        )->wait();
    }

    /**
     * @param UpdateGitHubApiKeyRequest $request
     * @return PromiseInterface
     */
    public function updateGitHubApiKeyAsync(
            UpdateGitHubApiKeyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new UpdateGitHubApiKeyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param UpdateGitHubApiKeyRequest $request
     * @return UpdateGitHubApiKeyResult
     */
    public function updateGitHubApiKey (
            UpdateGitHubApiKeyRequest $request
    ): UpdateGitHubApiKeyResult {
        return $this->updateGitHubApiKeyAsync(
            $request
        )->wait();
    }

    /**
     * @param GetGitHubApiKeyRequest $request
     * @return PromiseInterface
     */
    public function getGitHubApiKeyAsync(
            GetGitHubApiKeyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetGitHubApiKeyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param GetGitHubApiKeyRequest $request
     * @return GetGitHubApiKeyResult
     */
    public function getGitHubApiKey (
            GetGitHubApiKeyRequest $request
    ): GetGitHubApiKeyResult {
        return $this->getGitHubApiKeyAsync(
            $request
        )->wait();
    }

    /**
     * @param DeleteGitHubApiKeyRequest $request
     * @return PromiseInterface
     */
    public function deleteGitHubApiKeyAsync(
            DeleteGitHubApiKeyRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteGitHubApiKeyTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param DeleteGitHubApiKeyRequest $request
     * @return DeleteGitHubApiKeyResult
     */
    public function deleteGitHubApiKey (
            DeleteGitHubApiKeyRequest $request
    ): DeleteGitHubApiKeyResult {
        return $this->deleteGitHubApiKeyAsync(
            $request
        )->wait();
    }
}