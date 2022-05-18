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

namespace Gs2\Auth;

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


use Gs2\Auth\Request\LoginRequest;
use Gs2\Auth\Result\LoginResult;
use Gs2\Auth\Request\LoginBySignatureRequest;
use Gs2\Auth\Result\LoginBySignatureResult;

class LoginTask extends Gs2RestSessionTask {

    /**
     * @var LoginRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * LoginTask constructor.
     * @param Gs2RestSession $session
     * @param LoginRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        LoginRequest $request
    ) {
        parent::__construct(
            $session,
            LoginResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "auth", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/login";

        $json = [];
        if ($this->request->getUserId() !== null) {
            $json["userId"] = $this->request->getUserId();
        }
        if ($this->request->getTimeOffset() !== null) {
            $json["timeOffset"] = $this->request->getTimeOffset();
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

class LoginBySignatureTask extends Gs2RestSessionTask {

    /**
     * @var LoginBySignatureRequest
     */
    private $request;

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * LoginBySignatureTask constructor.
     * @param Gs2RestSession $session
     * @param LoginBySignatureRequest $request
     */
    public function __construct(
        Gs2RestSession $session,
        LoginBySignatureRequest $request
    ) {
        parent::__construct(
            $session,
            LoginBySignatureResult::class
        );
        $this->session = $session;
        $this->request = $request;
    }

    public function executeImpl(): PromiseInterface {

        $url = str_replace('{service}', "auth", str_replace('{region}', $this->session->getRegion(), Gs2RestSession::$endpointHost)) . "/login/signed";

        $json = [];
        if ($this->request->getKeyId() !== null) {
            $json["keyId"] = $this->request->getKeyId();
        }
        if ($this->request->getBody() !== null) {
            $json["body"] = $this->request->getBody();
        }
        if ($this->request->getSignature() !== null) {
            $json["signature"] = $this->request->getSignature();
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
 * GS2 Auth API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2AuthRestClient extends AbstractGs2Client {

	/**
	 * コンストラクタ。
	 *
	 * @param Gs2RestSession $session セッション
	 */
	public function __construct(Gs2RestSession $session) {
		parent::__construct($session);
	}

    /**
     * @param LoginRequest $request
     * @return PromiseInterface
     */
    public function loginAsync(
            LoginRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new LoginTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param LoginRequest $request
     * @return LoginResult
     */
    public function login (
            LoginRequest $request
    ): LoginResult {
        return $this->loginAsync(
            $request
        )->wait();
    }

    /**
     * @param LoginBySignatureRequest $request
     * @return PromiseInterface
     */
    public function loginBySignatureAsync(
            LoginBySignatureRequest $request
    ): PromiseInterface {
        /** @noinspection PhpParamsInspection */
        $task = new LoginBySignatureTask(
            $this->session,
            $request
        );
        return $this->session->execute($task);
    }

    /**
     * @param LoginBySignatureRequest $request
     * @return LoginBySignatureResult
     */
    public function loginBySignature (
            LoginBySignatureRequest $request
    ): LoginBySignatureResult {
        return $this->loginBySignatureAsync(
            $request
        )->wait();
    }
}