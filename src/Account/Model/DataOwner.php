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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;


class DataOwner implements IModel {
	/**
     * @var string
	 */
	private $dataOwnerId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var int
	 */
	private $createdAt;
	public function getDataOwnerId(): ?string {
		return $this->dataOwnerId;
	}
	public function setDataOwnerId(?string $dataOwnerId) {
		$this->dataOwnerId = $dataOwnerId;
	}
	public function withDataOwnerId(?string $dataOwnerId): DataOwner {
		$this->dataOwnerId = $dataOwnerId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): DataOwner {
		$this->userId = $userId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): DataOwner {
		$this->name = $name;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): DataOwner {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?DataOwner {
        if ($data === null) {
            return null;
        }
        return (new DataOwner())
            ->withDataOwnerId(array_key_exists('dataOwnerId', $data) && $data['dataOwnerId'] !== null ? $data['dataOwnerId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "dataOwnerId" => $this->getDataOwnerId(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}