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

namespace Gs2\Limit\Model;

use Gs2\Core\Model\IModel;


class Counter implements IModel {
	/**
     * @var string
	 */
	private $counterId;
	/**
     * @var string
	 */
	private $limitName;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $count;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getCounterId(): ?string {
		return $this->counterId;
	}

	public function setCounterId(?string $counterId) {
		$this->counterId = $counterId;
	}

	public function withCounterId(?string $counterId): Counter {
		$this->counterId = $counterId;
		return $this;
	}

	public function getLimitName(): ?string {
		return $this->limitName;
	}

	public function setLimitName(?string $limitName) {
		$this->limitName = $limitName;
	}

	public function withLimitName(?string $limitName): Counter {
		$this->limitName = $limitName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Counter {
		$this->name = $name;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Counter {
		$this->userId = $userId;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

	public function withCount(?int $count): Counter {
		$this->count = $count;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Counter {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Counter {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Counter {
        if ($data === null) {
            return null;
        }
        return (new Counter())
            ->withCounterId(empty($data['counterId']) ? null : $data['counterId'])
            ->withLimitName(empty($data['limitName']) ? null : $data['limitName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withCount(empty($data['count']) ? null : $data['count'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "counterId" => $this->getCounterId(),
            "limitName" => $this->getLimitName(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "count" => $this->getCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}