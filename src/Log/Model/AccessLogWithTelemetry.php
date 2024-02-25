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


class AccessLogWithTelemetry implements IModel {
	/**
     * @var int
	 */
	private $timestamp;
	/**
     * @var string
	 */
	private $sourceRequestId;
	/**
     * @var string
	 */
	private $requestId;
	/**
     * @var int
	 */
	private $duration;
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
	/**
     * @var string
	 */
	private $status;
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
	public function withTimestamp(?int $timestamp): AccessLogWithTelemetry {
		$this->timestamp = $timestamp;
		return $this;
	}
	public function getSourceRequestId(): ?string {
		return $this->sourceRequestId;
	}
	public function setSourceRequestId(?string $sourceRequestId) {
		$this->sourceRequestId = $sourceRequestId;
	}
	public function withSourceRequestId(?string $sourceRequestId): AccessLogWithTelemetry {
		$this->sourceRequestId = $sourceRequestId;
		return $this;
	}
	public function getRequestId(): ?string {
		return $this->requestId;
	}
	public function setRequestId(?string $requestId) {
		$this->requestId = $requestId;
	}
	public function withRequestId(?string $requestId): AccessLogWithTelemetry {
		$this->requestId = $requestId;
		return $this;
	}
	public function getDuration(): ?int {
		return $this->duration;
	}
	public function setDuration(?int $duration) {
		$this->duration = $duration;
	}
	public function withDuration(?int $duration): AccessLogWithTelemetry {
		$this->duration = $duration;
		return $this;
	}
	public function getService(): ?string {
		return $this->service;
	}
	public function setService(?string $service) {
		$this->service = $service;
	}
	public function withService(?string $service): AccessLogWithTelemetry {
		$this->service = $service;
		return $this;
	}
	public function getMethod(): ?string {
		return $this->method;
	}
	public function setMethod(?string $method) {
		$this->method = $method;
	}
	public function withMethod(?string $method): AccessLogWithTelemetry {
		$this->method = $method;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): AccessLogWithTelemetry {
		$this->userId = $userId;
		return $this;
	}
	public function getRequest(): ?string {
		return $this->request;
	}
	public function setRequest(?string $request) {
		$this->request = $request;
	}
	public function withRequest(?string $request): AccessLogWithTelemetry {
		$this->request = $request;
		return $this;
	}
	public function getResult(): ?string {
		return $this->result;
	}
	public function setResult(?string $result) {
		$this->result = $result;
	}
	public function withResult(?string $result): AccessLogWithTelemetry {
		$this->result = $result;
		return $this;
	}
	public function getStatus(): ?string {
		return $this->status;
	}
	public function setStatus(?string $status) {
		$this->status = $status;
	}
	public function withStatus(?string $status): AccessLogWithTelemetry {
		$this->status = $status;
		return $this;
	}

    public static function fromJson(?array $data): ?AccessLogWithTelemetry {
        if ($data === null) {
            return null;
        }
        return (new AccessLogWithTelemetry())
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withSourceRequestId(array_key_exists('sourceRequestId', $data) && $data['sourceRequestId'] !== null ? $data['sourceRequestId'] : null)
            ->withRequestId(array_key_exists('requestId', $data) && $data['requestId'] !== null ? $data['requestId'] : null)
            ->withDuration(array_key_exists('duration', $data) && $data['duration'] !== null ? $data['duration'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRequest(array_key_exists('request', $data) && $data['request'] !== null ? $data['request'] : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null);
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
            "sourceRequestId" => $this->getSourceRequestId(),
            "requestId" => $this->getRequestId(),
            "duration" => $this->getDuration(),
            "service" => $this->getService(),
            "method" => $this->getMethod(),
            "userId" => $this->getUserId(),
            "request" => $this->getRequest(),
            "result" => $this->getResult(),
            "status" => $this->getStatus(),
        );
    }
}