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
 * Transaction Execution Log
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#executestampsheetlog
 */
class ExecuteStampSheetLog implements IModel {
	/**
     * @var int Timestamp
	 */
	private $timestamp;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
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
     * @var string Acquire Action
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
     * @return ExecuteStampSheetLog
     */
	public function withTimestamp(?int $timestamp): ExecuteStampSheetLog {
		$this->timestamp = $timestamp;
		return $this;
	}
    /** @return string|null Transaction ID */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
    /** @param string|null $transactionId Transaction ID */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
    /**
     * @param string|null $transactionId Transaction ID
     * @return ExecuteStampSheetLog
     */
	public function withTransactionId(?string $transactionId): ExecuteStampSheetLog {
		$this->transactionId = $transactionId;
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
     * @return ExecuteStampSheetLog
     */
	public function withService(?string $service): ExecuteStampSheetLog {
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
     * @return ExecuteStampSheetLog
     */
	public function withMethod(?string $method): ExecuteStampSheetLog {
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
     * @return ExecuteStampSheetLog
     */
	public function withUserId(?string $userId): ExecuteStampSheetLog {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Acquire Action */
	public function getAction(): ?string {
		return $this->action;
	}
    /** @param string|null $action Acquire Action */
	public function setAction(?string $action) {
		$this->action = $action;
	}
    /**
     * @param string|null $action Acquire Action
     * @return ExecuteStampSheetLog
     */
	public function withAction(?string $action): ExecuteStampSheetLog {
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
     * @return ExecuteStampSheetLog
     */
	public function withArgs(?string $args): ExecuteStampSheetLog {
		$this->args = $args;
		return $this;
	}

    public static function fromJson(?array $data): ?ExecuteStampSheetLog {
        if ($data === null) {
            return null;
        }
        return (new ExecuteStampSheetLog())
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null);
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
        );
    }
}