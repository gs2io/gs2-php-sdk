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


/**
 * Data Owner
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#dataowner
 */
class DataOwner implements IModel {
	/**
     * @var string Data Owner setting GRN
	 */
	private $dataOwnerId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Data Owner ID
	 */
	private $name;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Data Owner setting GRN */
	public function getDataOwnerId(): ?string {
		return $this->dataOwnerId;
	}
    /** @param string|null $dataOwnerId Data Owner setting GRN */
	public function setDataOwnerId(?string $dataOwnerId) {
		$this->dataOwnerId = $dataOwnerId;
	}
    /**
     * @param string|null $dataOwnerId Data Owner setting GRN
     * @return DataOwner
     */
	public function withDataOwnerId(?string $dataOwnerId): DataOwner {
		$this->dataOwnerId = $dataOwnerId;
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
     * @return DataOwner
     */
	public function withUserId(?string $userId): DataOwner {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Data Owner ID */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Data Owner ID */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Data Owner ID
     * @return DataOwner
     */
	public function withName(?string $name): DataOwner {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return DataOwner
     */
	public function withCreatedAt(?int $createdAt): DataOwner {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return DataOwner
     */
	public function withRevision(?int $revision): DataOwner {
		$this->revision = $revision;
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
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "dataOwnerId" => $this->getDataOwnerId(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}