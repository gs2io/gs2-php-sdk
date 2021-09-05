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

namespace Gs2\Key\Model;

use Gs2\Core\Model\IModel;


class GitHubApiKey implements IModel {
	/**
     * @var string
	 */
	private $apiKeyId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $encryptionKeyName;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getApiKeyId(): ?string {
		return $this->apiKeyId;
	}

	public function setApiKeyId(?string $apiKeyId) {
		$this->apiKeyId = $apiKeyId;
	}

	public function withApiKeyId(?string $apiKeyId): GitHubApiKey {
		$this->apiKeyId = $apiKeyId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): GitHubApiKey {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): GitHubApiKey {
		$this->description = $description;
		return $this;
	}

	public function getEncryptionKeyName(): ?string {
		return $this->encryptionKeyName;
	}

	public function setEncryptionKeyName(?string $encryptionKeyName) {
		$this->encryptionKeyName = $encryptionKeyName;
	}

	public function withEncryptionKeyName(?string $encryptionKeyName): GitHubApiKey {
		$this->encryptionKeyName = $encryptionKeyName;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): GitHubApiKey {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): GitHubApiKey {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?GitHubApiKey {
        if ($data === null) {
            return null;
        }
        return (new GitHubApiKey())
            ->withApiKeyId(empty($data['apiKeyId']) ? null : $data['apiKeyId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withEncryptionKeyName(empty($data['encryptionKeyName']) ? null : $data['encryptionKeyName'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "apiKeyId" => $this->getApiKeyId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "encryptionKeyName" => $this->getEncryptionKeyName(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}