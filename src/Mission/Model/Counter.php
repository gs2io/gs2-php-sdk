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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;


class Counter implements IModel {
	/**
     * @var string
	 */
	private $counterId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var array
	 */
	private $values;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
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
	public function getValues(): ?array {
		return $this->values;
	}
	public function setValues(?array $values) {
		$this->values = $values;
	}
	public function withValues(?array $values): Counter {
		$this->values = $values;
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
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Counter {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Counter {
        if ($data === null) {
            return null;
        }
        return (new Counter())
            ->withCounterId(array_key_exists('counterId', $data) && $data['counterId'] !== null ? $data['counterId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withValues(!array_key_exists('values', $data) || $data['values'] === null ? null : array_map(
                function ($item) {
                    return ScopedValue::fromJson($item);
                },
                $data['values']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "counterId" => $this->getCounterId(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "values" => $this->getValues() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getValues()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}