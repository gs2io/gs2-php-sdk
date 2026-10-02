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

namespace Gs2\Dictionary\Model;

use Gs2\Core\Model\IModel;


/**
 * Entry acquired by game player
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#entry
 */
class Entry implements IModel {
	/**
     * @var string Entry GRN
	 */
	private $entryId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Entry Model name
	 */
	private $name;
	/**
     * @var int Date of acquisition
	 */
	private $acquiredAt;
    /** @return string|null Entry GRN */
	public function getEntryId(): ?string {
		return $this->entryId;
	}
    /** @param string|null $entryId Entry GRN */
	public function setEntryId(?string $entryId) {
		$this->entryId = $entryId;
	}
    /**
     * @param string|null $entryId Entry GRN
     * @return Entry
     */
	public function withEntryId(?string $entryId): Entry {
		$this->entryId = $entryId;
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
     * @return Entry
     */
	public function withUserId(?string $userId): Entry {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Entry Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Entry Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Entry Model name
     * @return Entry
     */
	public function withName(?string $name): Entry {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Date of acquisition */
	public function getAcquiredAt(): ?int {
		return $this->acquiredAt;
	}
    /** @param int|null $acquiredAt Date of acquisition */
	public function setAcquiredAt(?int $acquiredAt) {
		$this->acquiredAt = $acquiredAt;
	}
    /**
     * @param int|null $acquiredAt Date of acquisition
     * @return Entry
     */
	public function withAcquiredAt(?int $acquiredAt): Entry {
		$this->acquiredAt = $acquiredAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Entry {
        if ($data === null) {
            return null;
        }
        return (new Entry())
            ->withEntryId(array_key_exists('entryId', $data) && $data['entryId'] !== null ? $data['entryId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withAcquiredAt(array_key_exists('acquiredAt', $data) && $data['acquiredAt'] !== null ? $data['acquiredAt'] : null);
    }

    public function toJson(): array {
        return array(
            "entryId" => $this->getEntryId(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "acquiredAt" => $this->getAcquiredAt(),
        );
    }
}