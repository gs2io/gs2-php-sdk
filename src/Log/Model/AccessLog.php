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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;


class AccessLog implements IModel {
	/**
     * @var int
	 */
	private $timestamp;
	/**
     * @var string
	 */
	private $requestId;
	/**
     * @var string
	 */
	private $service;
	/**
     * @var string
	 */
	private $method;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $request;
	/**
     * @var string
	 */
	private $result;

	public function getTimestamp(): ?int {
		return $this->timestamp;
	}

	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}

	public function withTimestamp(?int $timestamp): AccessLog {
		$this->timestamp = $timestamp;
		return $this;
	}

	public function getRequestId(): ?string {
		return $this->requestId;
	}

	public function setRequestId(?string $requestId) {
		$this->requestId = $requestId;
	}

	public function withRequestId(?string $requestId): AccessLog {
		$this->requestId = $requestId;
		return $this;
	}

	public function getService(): ?string {
		return $this->service;
	}

	public function setService(?string $service) {
		$this->service = $service;
	}

	public function withService(?string $service): AccessLog {
		$this->service = $service;
		return $this;
	}

	public function getMethod(): ?string {
		return $this->method;
	}

	public function setMethod(?string $method) {
		$this->method = $method;
	}

	public function withMethod(?string $method): AccessLog {
		$this->method = $method;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): AccessLog {
		$this->userId = $userId;
		return $this;
	}

	public function getRequest(): ?string {
		return $this->request;
	}

	public function setRequest(?string $request) {
		$this->request = $request;
	}

	public function withRequest(?string $request): AccessLog {
		$this->request = $request;
		return $this;
	}

	public function getResult(): ?string {
		return $this->result;
	}

	public function setResult(?string $result) {
		$this->result = $result;
	}

	public function withResult(?string $result): AccessLog {
		$this->result = $result;
		return $this;
	}

    public static function fromJson(?array $data): ?AccessLog {
        if ($data === null) {
            return null;
        }
        return (new AccessLog())
            ->withTimestamp(empty($data['timestamp']) ? null : $data['timestamp'])
            ->withRequestId(empty($data['requestId']) ? null : $data['requestId'])
            ->withService(empty($data['service']) ? null : $data['service'])
            ->withMethod(empty($data['method']) ? null : $data['method'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withRequest(empty($data['request']) ? null : $data['request'])
            ->withResult(empty($data['result']) ? null : $data['result']);
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
            "requestId" => $this->getRequestId(),
            "service" => $this->getService(),
            "method" => $this->getMethod(),
            "userId" => $this->getUserId(),
            "request" => $this->getRequest(),
            "result" => $this->getResult(),
        );
    }
}