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


/**
 * Access log with telemetry information
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#accesslogwithtelemetry
 */
class AccessLogWithTelemetry implements IModel {
	/**
     * @var int Timestamp
	 */
	private $timestamp;
	/**
     * @var string Source Request ID
	 */
	private $sourceRequestId;
	/**
     * @var string Request ID
	 */
	private $requestId;
	/**
     * @var int Duration (ms)
	 */
	private $duration;
	/**
     * @var string Microservice Type
	 */
	private $service;
	/**
     * @var string Microservice Method
	 */
	private $method;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Request Content
	 */
	private $request;
	/**
     * @var string Response Content
	 */
	private $result;
	/**
     * @var string Status
	 */
	private $status;
    /** @return int|null Timestamp */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
    /** @param int|null $timestamp Timestamp */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
    /**
     * @param int|null $timestamp Timestamp
     * @return AccessLogWithTelemetry
     */
	public function withTimestamp(?int $timestamp): AccessLogWithTelemetry {
		$this->timestamp = $timestamp;
		return $this;
	}
    /** @return string|null Source Request ID */
	public function getSourceRequestId(): ?string {
		return $this->sourceRequestId;
	}
    /** @param string|null $sourceRequestId Source Request ID */
	public function setSourceRequestId(?string $sourceRequestId) {
		$this->sourceRequestId = $sourceRequestId;
	}
    /**
     * @param string|null $sourceRequestId Source Request ID
     * @return AccessLogWithTelemetry
     */
	public function withSourceRequestId(?string $sourceRequestId): AccessLogWithTelemetry {
		$this->sourceRequestId = $sourceRequestId;
		return $this;
	}
    /** @return string|null Request ID */
	public function getRequestId(): ?string {
		return $this->requestId;
	}
    /** @param string|null $requestId Request ID */
	public function setRequestId(?string $requestId) {
		$this->requestId = $requestId;
	}
    /**
     * @param string|null $requestId Request ID
     * @return AccessLogWithTelemetry
     */
	public function withRequestId(?string $requestId): AccessLogWithTelemetry {
		$this->requestId = $requestId;
		return $this;
	}
    /** @return int|null Duration (ms) */
	public function getDuration(): ?int {
		return $this->duration;
	}
    /** @param int|null $duration Duration (ms) */
	public function setDuration(?int $duration) {
		$this->duration = $duration;
	}
    /**
     * @param int|null $duration Duration (ms)
     * @return AccessLogWithTelemetry
     */
	public function withDuration(?int $duration): AccessLogWithTelemetry {
		$this->duration = $duration;
		return $this;
	}
    /** @return string|null Microservice Type */
	public function getService(): ?string {
		return $this->service;
	}
    /** @param string|null $service Microservice Type */
	public function setService(?string $service) {
		$this->service = $service;
	}
    /**
     * @param string|null $service Microservice Type
     * @return AccessLogWithTelemetry
     */
	public function withService(?string $service): AccessLogWithTelemetry {
		$this->service = $service;
		return $this;
	}
    /** @return string|null Microservice Method */
	public function getMethod(): ?string {
		return $this->method;
	}
    /** @param string|null $method Microservice Method */
	public function setMethod(?string $method) {
		$this->method = $method;
	}
    /**
     * @param string|null $method Microservice Method
     * @return AccessLogWithTelemetry
     */
	public function withMethod(?string $method): AccessLogWithTelemetry {
		$this->method = $method;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return AccessLogWithTelemetry
     */
	public function withUserId(?string $userId): AccessLogWithTelemetry {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Request Content */
	public function getRequest(): ?string {
		return $this->request;
	}
    /** @param string|null $request Request Content */
	public function setRequest(?string $request) {
		$this->request = $request;
	}
    /**
     * @param string|null $request Request Content
     * @return AccessLogWithTelemetry
     */
	public function withRequest(?string $request): AccessLogWithTelemetry {
		$this->request = $request;
		return $this;
	}
    /** @return string|null Response Content */
	public function getResult(): ?string {
		return $this->result;
	}
    /** @param string|null $result Response Content */
	public function setResult(?string $result) {
		$this->result = $result;
	}
    /**
     * @param string|null $result Response Content
     * @return AccessLogWithTelemetry
     */
	public function withResult(?string $result): AccessLogWithTelemetry {
		$this->result = $result;
		return $this;
	}
    /** @return string|null Status */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Status
     * @return AccessLogWithTelemetry
     */
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