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


class ExecuteStampSheetLogCount implements IModel {
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
     * @var int
	 */
	private $count;

	public function getService(): ?string {
		return $this->service;
	}

	public function setService(?string $service) {
		$this->service = $service;
	}

	public function withService(?string $service): ExecuteStampSheetLogCount {
		$this->service = $service;
		return $this;
	}

	public function getMethod(): ?string {
		return $this->method;
	}

	public function setMethod(?string $method) {
		$this->method = $method;
	}

	public function withMethod(?string $method): ExecuteStampSheetLogCount {
		$this->method = $method;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): ExecuteStampSheetLogCount {
		$this->userId = $userId;
		return $this;
	}

	public function getAction(): ?string {
		return $this->action;
	}

	public function setAction(?string $action) {
		$this->action = $action;
	}

	public function withAction(?string $action): ExecuteStampSheetLogCount {
		$this->action = $action;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

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