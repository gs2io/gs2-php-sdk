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
 * Acquire Action Execution Log Aggregation
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#executestampsheetlogcount
 */
class ExecuteStampSheetLogCount implements IModel {
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
     * @var int Count
	 */
	private $count;
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
     * @return ExecuteStampSheetLogCount
     */
	public function withService(?string $service): ExecuteStampSheetLogCount {
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
     * @return ExecuteStampSheetLogCount
     */
	public function withMethod(?string $method): ExecuteStampSheetLogCount {
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
     * @return ExecuteStampSheetLogCount
     */
	public function withUserId(?string $userId): ExecuteStampSheetLogCount {
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
     * @return ExecuteStampSheetLogCount
     */
	public function withAction(?string $action): ExecuteStampSheetLogCount {
		$this->action = $action;
		return $this;
	}
    /** @return int|null Count */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Count */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Count
     * @return ExecuteStampSheetLogCount
     */
	public function withCount(?int $count): ExecuteStampSheetLogCount {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?ExecuteStampSheetLogCount {
        if ($data === null) {
            return null;
        }
        return (new ExecuteStampSheetLogCount())
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "service" => $this->getService(),
            "method" => $this->getMethod(),
            "userId" => $this->getUserId(),
            "action" => $this->getAction(),
            "count" => $this->getCount(),
        );
    }
}