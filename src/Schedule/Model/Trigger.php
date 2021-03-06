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

namespace Gs2\Schedule\Model;

use Gs2\Core\Model\IModel;


class Trigger implements IModel {
	/**
     * @var string
	 */
	private $triggerId;
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
	private $createdAt;
	/**
     * @var int
	 */
	private $expiresAt;

	public function getTriggerId(): ?string {
		return $this->triggerId;
	}

	public function setTriggerId(?string $triggerId) {
		$this->triggerId = $triggerId;
	}

	public function withTriggerId(?string $triggerId): Trigger {
		$this->triggerId = $triggerId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Trigger {
		$this->name = $name;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Trigger {
		$this->userId = $userId;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Trigger {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}

	public function withExpiresAt(?int $expiresAt): Trigger {
		$this->expiresAt = $expiresAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Trigger {
        if ($data === null) {
            return null;
        }
        return (new Trigger())
            ->withTriggerId(empty($data['triggerId']) ? null : $data['triggerId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withExpiresAt(empty($data['expiresAt']) ? null : $data['expiresAt']);
    }

    public function toJson(): array {
        return array(
            "triggerId" => $this->getTriggerId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "createdAt" => $this->getCreatedAt(),
            "expiresAt" => $this->getExpiresAt(),
        );
    }
}