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

namespace Gs2\Gateway\Model;

use Gs2\Core\Model\IModel;


class FirebaseToken implements IModel {
	/**
     * @var string
	 */
	private $firebaseTokenId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $token;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getFirebaseTokenId(): ?string {
		return $this->firebaseTokenId;
	}

	public function setFirebaseTokenId(?string $firebaseTokenId) {
		$this->firebaseTokenId = $firebaseTokenId;
	}

	public function withFirebaseTokenId(?string $firebaseTokenId): FirebaseToken {
		$this->firebaseTokenId = $firebaseTokenId;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): FirebaseToken {
		$this->userId = $userId;
		return $this;
	}

	public function getToken(): ?string {
		return $this->token;
	}

	public function setToken(?string $token) {
		$this->token = $token;
	}

	public function withToken(?string $token): FirebaseToken {
		$this->token = $token;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): FirebaseToken {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): FirebaseToken {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?FirebaseToken {
        if ($data === null) {
            return null;
        }
        return (new FirebaseToken())
            ->withFirebaseTokenId(empty($data['firebaseTokenId']) ? null : $data['firebaseTokenId'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withToken(empty($data['token']) ? null : $data['token'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "firebaseTokenId" => $this->getFirebaseTokenId(),
            "userId" => $this->getUserId(),
            "token" => $this->getToken(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}