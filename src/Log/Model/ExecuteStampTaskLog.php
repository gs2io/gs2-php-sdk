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
 * Consume Action Execution Log
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#executestamptasklog
 */
class ExecuteStampTaskLog implements IModel {
	/**
     * @var int Timestamp
	 */
	private $timestamp;
	/**
     * @var string Task ID
	 */
	private $taskId;
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
     * @var string Consume Action
	 */
	private $action;
	/**
     * @var string Arguments
	 */
	private $args;
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
     * @return ExecuteStampTaskLog
     */
	public function withTimestamp(?int $timestamp): ExecuteStampTaskLog {
		$this->timestamp = $timestamp;
		return $this;
	}
    /** @return string|null Task ID */
	public function getTaskId(): ?string {
		return $this->taskId;
	}
    /** @param string|null $taskId Task ID */
	public function setTaskId(?string $taskId) {
		$this->taskId = $taskId;
	}
    /**
     * @param string|null $taskId Task ID
     * @return ExecuteStampTaskLog
     */
	public function withTaskId(?string $taskId): ExecuteStampTaskLog {
		$this->taskId = $taskId;
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
     * @return ExecuteStampTaskLog
     */
	public function withService(?string $service): ExecuteStampTaskLog {
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
     * @return ExecuteStampTaskLog
     */
	public function withMethod(?string $method): ExecuteStampTaskLog {
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
     * @return ExecuteStampTaskLog
     */
	public function withUserId(?string $userId): ExecuteStampTaskLog {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Consume Action */
	public function getAction(): ?string {
		return $this->action;
	}
    /** @param string|null $action Consume Action */
	public function setAction(?string $action) {
		$this->action = $action;
	}
    /**
     * @param string|null $action Consume Action
     * @return ExecuteStampTaskLog
     */
	public function withAction(?string $action): ExecuteStampTaskLog {
		$this->action = $action;
		return $this;
	}
    /** @return string|null Arguments */
	public function getArgs(): ?string {
		return $this->args;
	}
    /** @param string|null $args Arguments */
	public function setArgs(?string $args) {
		$this->args = $args;
	}
    /**
     * @param string|null $args Arguments
     * @return ExecuteStampTaskLog
     */
	public function withArgs(?string $args): ExecuteStampTaskLog {
		$this->args = $args;
		return $this;
	}

    public static function fromJson(?array $data): ?ExecuteStampTaskLog {
        if ($data === null) {
            return null;
        }
        return (new ExecuteStampTaskLog())
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withTaskId(array_key_exists('taskId', $data) && $data['taskId'] !== null ? $data['taskId'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null);
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
            "taskId" => $this->getTaskId(),
            "service" => $this->getService(),
            "method" => $this->getMethod(),
            "userId" => $this->getUserId(),
            "action" => $this->getAction(),
            "args" => $this->getArgs(),
        );
    }
}