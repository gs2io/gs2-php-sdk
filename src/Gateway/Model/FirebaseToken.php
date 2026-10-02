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


/**
 * Firebase Device Token
 *
 * @see https://docs.gs2.io/api_reference/gateway/sdk/#firebasetoken
 */
class FirebaseToken implements IModel {
	/**
     * @var string Firebase Device Token GRN
	 */
	private $firebaseTokenId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Device Token for Firebase Cloud Messaging
	 */
	private $token;
	/**
     * @var string Locale of the notification message
	 */
	private $locale;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Firebase Device Token GRN */
	public function getFirebaseTokenId(): ?string {
		return $this->firebaseTokenId;
	}
    /** @param string|null $firebaseTokenId Firebase Device Token GRN */
	public function setFirebaseTokenId(?string $firebaseTokenId) {
		$this->firebaseTokenId = $firebaseTokenId;
	}
    /**
     * @param string|null $firebaseTokenId Firebase Device Token GRN
     * @return FirebaseToken
     */
	public function withFirebaseTokenId(?string $firebaseTokenId): FirebaseToken {
		$this->firebaseTokenId = $firebaseTokenId;
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
     * @return FirebaseToken
     */
	public function withUserId(?string $userId): FirebaseToken {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Device Token for Firebase Cloud Messaging */
	public function getToken(): ?string {
		return $this->token;
	}
    /** @param string|null $token Device Token for Firebase Cloud Messaging */
	public function setToken(?string $token) {
		$this->token = $token;
	}
    /**
     * @param string|null $token Device Token for Firebase Cloud Messaging
     * @return FirebaseToken
     */
	public function withToken(?string $token): FirebaseToken {
		$this->token = $token;
		return $this;
	}
    /** @return string|null Locale of the notification message */
	public function getLocale(): ?string {
		return $this->locale;
	}
    /** @param string|null $locale Locale of the notification message */
	public function setLocale(?string $locale) {
		$this->locale = $locale;
	}
    /**
     * @param string|null $locale Locale of the notification message
     * @return FirebaseToken
     */
	public function withLocale(?string $locale): FirebaseToken {
		$this->locale = $locale;
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
     * @return FirebaseToken
     */
	public function withCreatedAt(?int $createdAt): FirebaseToken {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return FirebaseToken
     */
	public function withUpdatedAt(?int $updatedAt): FirebaseToken {
		$this->updatedAt = $updatedAt;
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
     * @return FirebaseToken
     */
	public function withRevision(?int $revision): FirebaseToken {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?FirebaseToken {
        if ($data === null) {
            return null;
        }
        return (new FirebaseToken())
            ->withFirebaseTokenId(array_key_exists('firebaseTokenId', $data) && $data['firebaseTokenId'] !== null ? $data['firebaseTokenId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withToken(array_key_exists('token', $data) && $data['token'] !== null ? $data['token'] : null)
            ->withLocale(array_key_exists('locale', $data) && $data['locale'] !== null ? $data['locale'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "firebaseTokenId" => $this->getFirebaseTokenId(),
            "userId" => $this->getUserId(),
            "token" => $this->getToken(),
            "locale" => $this->getLocale(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}