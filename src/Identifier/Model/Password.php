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

namespace Gs2\Identifier\Model;

use Gs2\Core\Model\IModel;


class Password implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $userName;
	/**
     * @var int
	 */
	private $createdAt;

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Password {
		$this->userId = $userId;
		return $this;
	}

	public function getUserName(): ?string {
		return $this->userName;
	}

	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}

	public function withUserName(?string $userName): Password {
		$this->userName = $userName;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Password {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Password {
        if ($data === null) {
            return null;
        }
        return (new Password())
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withUserName(empty($data['userName']) ? null : $data['userName'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt']);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "userName" => $this->getUserName(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}