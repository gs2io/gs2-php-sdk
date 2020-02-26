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

namespace Gs2\JobQueue;

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
use Gs2\JobQueue\Request\DescribeNamespacesRequest;
use Gs2\JobQueue\Result\DescribeNamespacesResult;
use Gs2\JobQueue\Request\CreateNamespaceRequest;
use Gs2\JobQueue\Result\CreateNamespaceResult;
use Gs2\JobQueue\Request\GetNamespaceStatusRequest;
use Gs2\JobQueue\Result\GetNamespaceStatusResult;
use Gs2\JobQueue\Request\GetNamespaceRequest;
use Gs2\JobQueue\Result\GetNamespaceResult;
use Gs2\JobQueue\Request\UpdateNamespaceRequest;
use Gs2\JobQueue\Result\UpdateNamespaceResult;
use Gs2\JobQueue\Request\DeleteNamespaceRequest;
use Gs2\JobQueue\Result\DeleteNamespaceResult;
use Gs2\JobQueue\Request\DescribeJobsByUserIdRequest;
use Gs2\JobQueue\Result\DescribeJobsByUserIdResult;
use Gs2\JobQueue\Request\GetJobByUserIdRequest;
use Gs2\JobQueue\Result\GetJobByUserIdResult;
use Gs2\JobQueue\Request\PushByUserIdRequest;
use Gs2\JobQueue\Result\PushByUserIdResult;
use Gs2\JobQueue\Request\RunRequest;
use Gs2\JobQueue\Result\RunResult;
use Gs2\JobQueue\Request\RunByUserIdRequest;
use Gs2\JobQueue\Result\RunByUserIdResult;
use Gs2\JobQueue\Request\DeleteJobByUserIdRequest;
use Gs2\JobQueue\Result\DeleteJobByUserIdResult;
use Gs2\JobQueue\Request\PushByStampSheetRequest;
use Gs2\JobQueue\Result\PushByStampSheetResult;
use Gs2\JobQueue\Request\DescribeDeadLetterJobsByUserIdRequest;
use Gs2\JobQueue\Result\DescribeDeadLetterJobsByUserIdResult;
use Gs2\JobQueue\Request\GetDeadLetterJobByUserIdRequest;
use Gs2\JobQueue\Result\GetDeadLetterJobByUserIdResult;
use Gs2\JobQueue\Request\DeleteDeadLetterJobByUserIdRequest;
use Gs2\JobQueue\Result\DeleteDeadLetterJobByUserIdResult;

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

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

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

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/";

        $json = [];
        if ($this->request->getName() != null) {
            $json["name"] = $this->request->getName();
        }
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPushNotification() != null) {
            $json["pushNotification"] = $this->request->getPushNotification()->toJson();
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

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/status";

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

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
        if ($this->request->getDescription() != null) {
            $json["description"] = $this->request->getDescription();
        }
        if ($this->request->getPushNotification() != null) {
            $json["pushNotification"] = $this->request->getPushNotification()->toJson();
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

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}";

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

class DescribeJobsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeJobsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeJobsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeJobsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeJobsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeJobsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/job";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetJobByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetJobByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetJobByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetJobByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetJobByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetJobByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/job/{jobName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{jobName}", $this->request->getJobName() == null|| strlen($this->request->getJobName()) == 0 ? "null" : $this->request->getJobName(), $url);

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

class PushByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var PushByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PushByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param PushByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PushByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            PushByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/job";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
        if ($this->request->getJobs() != null) {
            $array = [];
            foreach ($this->request->getJobs() as $item)
            {
                array_push($array, $item->toJson());
            }
            $json["jobs"] = $array;
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

class RunTask extends Gs2RestSessionTask {

    /**
     * @var RunRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunTask constructor.
     * @param Gs2RestSession $session
     * @param RunRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunRequest $request
    ) {
        parent::__construct(
            $session,
            RunResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/me/job/run";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);

        $json = [];
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

class RunByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var RunByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * RunByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param RunByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        RunByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            RunByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/job/run";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

        $json = [];
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

class DeleteJobByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteJobByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteJobByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteJobByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteJobByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteJobByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/job/{jobName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{jobName}", $this->request->getJobName() == null|| strlen($this->request->getJobName()) == 0 ? "null" : $this->request->getJobName(), $url);

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

class PushByStampSheetTask extends Gs2RestSessionTask {

    /**
     * @var PushByStampSheetRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * PushByStampSheetTask constructor.
     * @param Gs2RestSession $session
     * @param PushByStampSheetRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        PushByStampSheetRequest $request
    ) {
        parent::__construct(
            $session,
            PushByStampSheetResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/stamp/job";

        $json = [];
        if ($this->request->getStampSheet() != null) {
            $json["stampSheet"] = $this->request->getStampSheet();
        }
        if ($this->request->getKeyId() != null) {
            $json["keyId"] = $this->request->getKeyId();
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

class DescribeDeadLetterJobsByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DescribeDeadLetterJobsByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DescribeDeadLetterJobsByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DescribeDeadLetterJobsByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DescribeDeadLetterJobsByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DescribeDeadLetterJobsByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/dead";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);

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
        if ($this->request->getDuplicationAvoider() != null) {
            $this->builder->setHeader("X-GS2-DUPLICATION-AVOIDER", $this->request->getDuplicationAvoider());
        }

        return parent::executeImpl();
    }
}

class GetDeadLetterJobByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var GetDeadLetterJobByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * GetDeadLetterJobByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param GetDeadLetterJobByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        GetDeadLetterJobByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            GetDeadLetterJobByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/dead/{deadLetterJobName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{deadLetterJobName}", $this->request->getDeadLetterJobName() == null|| strlen($this->request->getDeadLetterJobName()) == 0 ? "null" : $this->request->getDeadLetterJobName(), $url);

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

class DeleteDeadLetterJobByUserIdTask extends Gs2RestSessionTask {

    /**
     * @var DeleteDeadLetterJobByUserIdRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * DeleteDeadLetterJobByUserIdTask constructor.
     * @param Gs2RestSession $session
     * @param DeleteDeadLetterJobByUserIdRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        DeleteDeadLetterJobByUserIdRequest $request
    ) {
        parent::__construct(
            $session,
            DeleteDeadLetterJobByUserIdResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "job-queue", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::EndpointHost)) . "/{namespaceName}/user/{userId}/dead/{deadLetterJobName}";

        $url = str_replace("{namespaceName}", $this->request->getNamespaceName() == null|| strlen($this->request->getNamespaceName()) == 0 ? "null" : $this->request->getNamespaceName(), $url);
        $url = str_replace("{userId}", $this->request->getUserId() == null|| strlen($this->request->getUserId()) == 0 ? "null" : $this->request->getUserId(), $url);
        $url = str_replace("{deadLetterJobName}", $this->request->getDeadLetterJobName() == null|| strlen($this->request->getDeadLetterJobName()) == 0 ? "null" : $this->request->getDeadLetterJobName(), $url);

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

/**
 * GS2 JobQueue API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2JobQueueRestClient extends AbstractGs2Client {

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
     * ジョブの一覧を取得<br>
     *
     * @param DescribeJobsByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeJobsByUserIdAsync(
            DescribeJobsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeJobsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ジョブの一覧を取得<br>
     *
     * @param DescribeJobsByUserIdRequest $request リクエストパラメータ
     * @return DescribeJobsByUserIdResult
     */
    public function describeJobsByUserId (
            DescribeJobsByUserIdRequest $request
    ): DescribeJobsByUserIdResult {

        $resultAsyncResult = [];
        $this->describeJobsByUserIdAsync(
            $request
        )->then(
            function (DescribeJobsByUserIdResult $result) use (&$resultAsyncResult) {
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
     * ジョブを取得<br>
     *
     * @param GetJobByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getJobByUserIdAsync(
            GetJobByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetJobByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ジョブを取得<br>
     *
     * @param GetJobByUserIdRequest $request リクエストパラメータ
     * @return GetJobByUserIdResult
     */
    public function getJobByUserId (
            GetJobByUserIdRequest $request
    ): GetJobByUserIdResult {

        $resultAsyncResult = [];
        $this->getJobByUserIdAsync(
            $request
        )->then(
            function (GetJobByUserIdResult $result) use (&$resultAsyncResult) {
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
     * ユーザIDを指定してジョブを登録<br>
     *
     * @param PushByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function pushByUserIdAsync(
            PushByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PushByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してジョブを登録<br>
     *
     * @param PushByUserIdRequest $request リクエストパラメータ
     * @return PushByUserIdResult
     */
    public function pushByUserId (
            PushByUserIdRequest $request
    ): PushByUserIdResult {

        $resultAsyncResult = [];
        $this->pushByUserIdAsync(
            $request
        )->then(
            function (PushByUserIdResult $result) use (&$resultAsyncResult) {
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
     * ジョブを実行<br>
     *
     * @param RunRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function runAsync(
            RunRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ジョブを実行<br>
     *
     * @param RunRequest $request リクエストパラメータ
     * @return RunResult
     */
    public function run (
            RunRequest $request
    ): RunResult {

        $resultAsyncResult = [];
        $this->runAsync(
            $request
        )->then(
            function (RunResult $result) use (&$resultAsyncResult) {
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
     * ユーザIDを指定してジョブを実行<br>
     *
     * @param RunByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function runByUserIdAsync(
            RunByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new RunByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ユーザIDを指定してジョブを実行<br>
     *
     * @param RunByUserIdRequest $request リクエストパラメータ
     * @return RunByUserIdResult
     */
    public function runByUserId (
            RunByUserIdRequest $request
    ): RunByUserIdResult {

        $resultAsyncResult = [];
        $this->runByUserIdAsync(
            $request
        )->then(
            function (RunByUserIdResult $result) use (&$resultAsyncResult) {
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
     * ジョブを取得<br>
     *
     * @param DeleteJobByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteJobByUserIdAsync(
            DeleteJobByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteJobByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * ジョブを取得<br>
     *
     * @param DeleteJobByUserIdRequest $request リクエストパラメータ
     * @return DeleteJobByUserIdResult
     */
    public function deleteJobByUserId (
            DeleteJobByUserIdRequest $request
    ): DeleteJobByUserIdResult {

        $resultAsyncResult = [];
        $this->deleteJobByUserIdAsync(
            $request
        )->then(
            function (DeleteJobByUserIdResult $result) use (&$resultAsyncResult) {
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
     * スタンプシートでジョブを登録<br>
     *
     * @param PushByStampSheetRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function pushByStampSheetAsync(
            PushByStampSheetRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new PushByStampSheetTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * スタンプシートでジョブを登録<br>
     *
     * @param PushByStampSheetRequest $request リクエストパラメータ
     * @return PushByStampSheetResult
     */
    public function pushByStampSheet (
            PushByStampSheetRequest $request
    ): PushByStampSheetResult {

        $resultAsyncResult = [];
        $this->pushByStampSheetAsync(
            $request
        )->then(
            function (PushByStampSheetResult $result) use (&$resultAsyncResult) {
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
     * デッドレタージョブの一覧を取得<br>
     *
     * @param DescribeDeadLetterJobsByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function describeDeadLetterJobsByUserIdAsync(
            DescribeDeadLetterJobsByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DescribeDeadLetterJobsByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * デッドレタージョブの一覧を取得<br>
     *
     * @param DescribeDeadLetterJobsByUserIdRequest $request リクエストパラメータ
     * @return DescribeDeadLetterJobsByUserIdResult
     */
    public function describeDeadLetterJobsByUserId (
            DescribeDeadLetterJobsByUserIdRequest $request
    ): DescribeDeadLetterJobsByUserIdResult {

        $resultAsyncResult = [];
        $this->describeDeadLetterJobsByUserIdAsync(
            $request
        )->then(
            function (DescribeDeadLetterJobsByUserIdResult $result) use (&$resultAsyncResult) {
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
     * デッドレタージョブを取得<br>
     *
     * @param GetDeadLetterJobByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function getDeadLetterJobByUserIdAsync(
            GetDeadLetterJobByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new GetDeadLetterJobByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * デッドレタージョブを取得<br>
     *
     * @param GetDeadLetterJobByUserIdRequest $request リクエストパラメータ
     * @return GetDeadLetterJobByUserIdResult
     */
    public function getDeadLetterJobByUserId (
            GetDeadLetterJobByUserIdRequest $request
    ): GetDeadLetterJobByUserIdResult {

        $resultAsyncResult = [];
        $this->getDeadLetterJobByUserIdAsync(
            $request
        )->then(
            function (GetDeadLetterJobByUserIdResult $result) use (&$resultAsyncResult) {
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
     * デッドレタージョブを取得<br>
     *
     * @param DeleteDeadLetterJobByUserIdRequest $request リクエストパラメータ
     * @return PromiseInterface
     */
    public function deleteDeadLetterJobByUserIdAsync(
            DeleteDeadLetterJobByUserIdRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new DeleteDeadLetterJobByUserIdTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * デッドレタージョブを取得<br>
     *
     * @param DeleteDeadLetterJobByUserIdRequest $request リクエストパラメータ
     * @return DeleteDeadLetterJobByUserIdResult
     */
    public function deleteDeadLetterJobByUserId (
            DeleteDeadLetterJobByUserIdRequest $request
    ): DeleteDeadLetterJobByUserIdResult {

        $resultAsyncResult = [];
        $this->deleteDeadLetterJobByUserIdAsync(
            $request
        )->then(
            function (DeleteDeadLetterJobByUserIdResult $result) use (&$resultAsyncResult) {
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