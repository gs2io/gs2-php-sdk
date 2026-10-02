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

namespace Gs2\Guild\Model;

use Gs2\Core\Model\IModel;


/**
 * Ignore User
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#ignoreuser
 */
class IgnoreUser implements IModel {
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
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
     * @return IgnoreUser
     */
	public function withUserId(?string $userId): IgnoreUser {
		$this->userId = $userId;
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
     * @return IgnoreUser
     */
	public function withCreatedAt(?int $createdAt): IgnoreUser {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?IgnoreUser {
        if ($data === null) {
            return null;
        }
        return (new IgnoreUser())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}