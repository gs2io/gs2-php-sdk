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


class IssueStampSheetLog implements IModel {
	/**
     * @var int
	 */
	private $timestamp;
	/**
     * @var string
	 */
	private $transactionId;
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
	/**
     * @var array
	 */
	private $tasks;

	public function getTimestamp(): ?int {
		return $this->timestamp;
	}

	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}

	public function withTimestamp(?int $timestamp): IssueStampSheetLog {
		$this->timestamp = $timestamp;
		return $this;
	}

	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	public function withTransactionId(?string $transactionId): IssueStampSheetLog {
		$this->transactionId = $transactionId;
		return $this;
	}

	public function getService(): ?string {
		return $this->service;
	}

	public function setService(?string $service) {
		$this->service = $service;
	}

	public function withService(?string $service): IssueStampSheetLog {
		$this->service = $service;
		return $this;
	}

	public function getMethod(): ?string {
		return $this->method;
	}

	public function setMethod(?string $method) {
		$this->method = $method;
	}

	public function withMethod(?string $method): IssueStampSheetLog {
		$this->method = $method;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): IssueStampSheetLog {
		$this->userId = $userId;
		return $this;
	}

	public function getAction(): ?string {
		return $this->action;
	}

	public function setAction(?string $action) {
		$this->action = $action;
	}

	public function withAction(?string $action): IssueStampSheetLog {
		$this->action = $action;
		return $this;
	}

	public function getArgs(): ?string {
		return $this->args;
	}

	public function setArgs(?string $args) {
		$this->args = $args;
	}

	public function withArgs(?string $args): IssueStampSheetLog {
		$this->args = $args;
		return $this;
	}

	public function getTasks(): ?array {
		return $this->tasks;
	}

	public function setTasks(?array $tasks) {
		$this->tasks = $tasks;
	}

	public function withTasks(?array $tasks): IssueStampSheetLog {
		$this->tasks = $tasks;
		return $this;
	}

    public static function fromJson(?array $data): ?IssueStampSheetLog {
        if ($data === null) {
            return null;
        }
        return (new IssueStampSheetLog())
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null)
            ->withTasks(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('tasks', $data) && $data['tasks'] !== null ? $data['tasks'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
            "transactionId" => $this->getTransactionId(),
            "service" => $this->getService(),
            "method" => $this->getMethod(),
            "userId" => $this->getUserId(),
            "action" => $this->getAction(),
            "args" => $this->getArgs(),
            "tasks" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getTasks() !== null && $this->getTasks() !== null ? $this->getTasks() : []
            ),
        );
    }
}