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


class IssueStampSheetLogCount implements IModel {
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

	public function withService(?string $service): IssueStampSheetLogCount {
		$this->service = $service;
		return $this;
	}

	public function getMethod(): ?string {
		return $this->method;
	}

	public function setMethod(?string $method) {
		$this->method = $method;
	}

	public function withMethod(?string $method): IssueStampSheetLogCount {
		$this->method = $method;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): IssueStampSheetLogCount {
		$this->userId = $userId;
		return $this;
	}

	public function getAction(): ?string {
		return $this->action;
	}

	public function setAction(?string $action) {
		$this->action = $action;
	}

	public function withAction(?string $action): IssueStampSheetLogCount {
		$this->action = $action;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

	public function withCount(?int $count): IssueStampSheetLogCount {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?IssueStampSheetLogCount {
        if ($data === null) {
            return null;
        }
        return (new IssueStampSheetLogCount())
            ->withService(empty($data['service']) ? null : $data['service'])
            ->withMethod(empty($data['method']) ? null : $data['method'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withAction(empty($data['action']) ? null : $data['action'])
            ->withCount(empty($data['count']) ? null : $data['count']);
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