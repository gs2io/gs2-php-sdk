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


class ExecuteStampTaskLog implements IModel {
	/**
     * @var int
	 */
	private $timestamp;
	/**
     * @var string
	 */
	private $taskId;
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
	private $action;
	/**
     * @var string
	 */
	private $args;

	public function getTimestamp(): ?int {
		return $this->timestamp;
	}

	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}

	public function withTimestamp(?int $timestamp): ExecuteStampTaskLog {
		$this->timestamp = $timestamp;
		return $this;
	}

	public function getTaskId(): ?string {
		return $this->taskId;
	}

	public function setTaskId(?string $taskId) {
		$this->taskId = $taskId;
	}

	public function withTaskId(?string $taskId): ExecuteStampTaskLog {
		$this->taskId = $taskId;
		return $this;
	}

	public function getService(): ?string {
		return $this->service;
	}

	public function setService(?string $service) {
		$this->service = $service;
	}

	public function withService(?string $service): ExecuteStampTaskLog {
		$this->service = $service;
		return $this;
	}

	public function getMethod(): ?string {
		return $this->method;
	}

	public function setMethod(?string $method) {
		$this->method = $method;
	}

	public function withMethod(?string $method): ExecuteStampTaskLog {
		$this->method = $method;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): ExecuteStampTaskLog {
		$this->userId = $userId;
		return $this;
	}

	public function getAction(): ?string {
		return $this->action;
	}

	public function setAction(?string $action) {
		$this->action = $action;
	}

	public function withAction(?string $action): ExecuteStampTaskLog {
		$this->action = $action;
		return $this;
	}

	public function getArgs(): ?string {
		return $this->args;
	}

	public function setArgs(?string $args) {
		$this->args = $args;
	}

	public function withArgs(?string $args): ExecuteStampTaskLog {
		$this->args = $args;
		return $this;
	}

    public static function fromJson(?array $data): ?ExecuteStampTaskLog {
        if ($data === null) {
            return null;
        }
        return (new ExecuteStampTaskLog())
            ->withTimestamp(empty($data['timestamp']) ? null : $data['timestamp'])
            ->withTaskId(empty($data['taskId']) ? null : $data['taskId'])
            ->withService(empty($data['service']) ? null : $data['service'])
            ->withMethod(empty($data['method']) ? null : $data['method'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withAction(empty($data['action']) ? null : $data['action'])
            ->withArgs(empty($data['args']) ? null : $data['args']);
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