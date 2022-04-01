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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;


class Mold implements IModel {
	/**
     * @var string
	 */
	private $moldId;
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
	private $capacity;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getMoldId(): ?string {
		return $this->moldId;
	}

	public function setMoldId(?string $moldId) {
		$this->moldId = $moldId;
	}

	public function withMoldId(?string $moldId): Mold {
		$this->moldId = $moldId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Mold {
		$this->name = $name;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Mold {
		$this->userId = $userId;
		return $this;
	}

	public function getCapacity(): ?int {
		return $this->capacity;
	}

	public function setCapacity(?int $capacity) {
		$this->capacity = $capacity;
	}

	public function withCapacity(?int $capacity): Mold {
		$this->capacity = $capacity;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Mold {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Mold {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Mold {
        if ($data === null) {
            return null;
        }
        return (new Mold())
            ->withMoldId(array_key_exists('moldId', $data) && $data['moldId'] !== null ? $data['moldId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCapacity(array_key_exists('capacity', $data) && $data['capacity'] !== null ? $data['capacity'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "moldId" => $this->getMoldId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "capacity" => $this->getCapacity(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}