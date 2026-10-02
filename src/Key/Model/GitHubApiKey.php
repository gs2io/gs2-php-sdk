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


/**
 * GitHub API Key
 *
 * @see https://docs.gs2.io/api_reference/key/sdk/#githubapikey
 */
class GitHubApiKey implements IModel {
	/**
     * @var string GitHub API Key GRN
	 */
	private $apiKeyId;
	/**
     * @var string GitHub API Key name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string API Key
	 */
	private $apiKey;
	/**
     * @var string Encryption Key name
	 */
	private $encryptionKeyName;
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
    /** @return string|null GitHub API Key GRN */
	public function getApiKeyId(): ?string {
		return $this->apiKeyId;
	}
    /** @param string|null $apiKeyId GitHub API Key GRN */
	public function setApiKeyId(?string $apiKeyId) {
		$this->apiKeyId = $apiKeyId;
	}
    /**
     * @param string|null $apiKeyId GitHub API Key GRN
     * @return GitHubApiKey
     */
	public function withApiKeyId(?string $apiKeyId): GitHubApiKey {
		$this->apiKeyId = $apiKeyId;
		return $this;
	}
    /** @return string|null GitHub API Key name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name GitHub API Key name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name GitHub API Key name
     * @return GitHubApiKey
     */
	public function withName(?string $name): GitHubApiKey {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return GitHubApiKey
     */
	public function withDescription(?string $description): GitHubApiKey {
		$this->description = $description;
		return $this;
	}
    /** @return string|null API Key */
	public function getApiKey(): ?string {
		return $this->apiKey;
	}
    /** @param string|null $apiKey API Key */
	public function setApiKey(?string $apiKey) {
		$this->apiKey = $apiKey;
	}
    /**
     * @param string|null $apiKey API Key
     * @return GitHubApiKey
     */
	public function withApiKey(?string $apiKey): GitHubApiKey {
		$this->apiKey = $apiKey;
		return $this;
	}
    /** @return string|null Encryption Key name */
	public function getEncryptionKeyName(): ?string {
		return $this->encryptionKeyName;
	}
    /** @param string|null $encryptionKeyName Encryption Key name */
	public function setEncryptionKeyName(?string $encryptionKeyName) {
		$this->encryptionKeyName = $encryptionKeyName;
	}
    /**
     * @param string|null $encryptionKeyName Encryption Key name
     * @return GitHubApiKey
     */
	public function withEncryptionKeyName(?string $encryptionKeyName): GitHubApiKey {
		$this->encryptionKeyName = $encryptionKeyName;
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
     * @return GitHubApiKey
     */
	public function withCreatedAt(?int $createdAt): GitHubApiKey {
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
     * @return GitHubApiKey
     */
	public function withUpdatedAt(?int $updatedAt): GitHubApiKey {
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
     * @return GitHubApiKey
     */
	public function withRevision(?int $revision): GitHubApiKey {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?GitHubApiKey {
        if ($data === null) {
            return null;
        }
        return (new GitHubApiKey())
            ->withApiKeyId(array_key_exists('apiKeyId', $data) && $data['apiKeyId'] !== null ? $data['apiKeyId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withApiKey(array_key_exists('apiKey', $data) && $data['apiKey'] !== null ? $data['apiKey'] : null)
            ->withEncryptionKeyName(array_key_exists('encryptionKeyName', $data) && $data['encryptionKeyName'] !== null ? $data['encryptionKeyName'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "apiKeyId" => $this->getApiKeyId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "apiKey" => $this->getApiKey(),
            "encryptionKeyName" => $this->getEncryptionKeyName(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}