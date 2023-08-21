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


class Entry implements IModel {
	/**
     * @var string
	 */
	private $entryId;
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
	private $acquiredAt;
	/**
     * @var int
	 */
	private $revision;
	public function getEntryId(): ?string {
		return $this->entryId;
	}
	public function setEntryId(?string $entryId) {
		$this->entryId = $entryId;
	}
	public function withEntryId(?string $entryId): Entry {
		$this->entryId = $entryId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Entry {
		$this->userId = $userId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Entry {
		$this->name = $name;
		return $this;
	}
	public function getAcquiredAt(): ?int {
		return $this->acquiredAt;
	}
	public function setAcquiredAt(?int $acquiredAt) {
		$this->acquiredAt = $acquiredAt;
	}
	public function withAcquiredAt(?int $acquiredAt): Entry {
		$this->acquiredAt = $acquiredAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Entry {
		$this->revision = $revision;
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
            ->withAcquiredAt(array_key_exists('acquiredAt', $data) && $data['acquiredAt'] !== null ? $data['acquiredAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "entryId" => $this->getEntryId(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "acquiredAt" => $this->getAcquiredAt(),
            "revision" => $this->getRevision(),
        );
    }
}