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

namespace Gs2\Key\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateGitHubApiKey: Update GitHub API Key
 *
 * @see https://docs.gs2.io/api_reference/key/sdk/#updategithubapikey
 */
class UpdateGitHubApiKeyRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string GitHub API Key name */
    private $apiKeyName;
    /** @var string Description */
    private $description;
    /** @var string API Key */
    private $apiKey;
    /** @var string Encryption Key name */
    private $encryptionKeyName;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateGitHubApiKeyRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateGitHubApiKeyRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null GitHub API Key name */
	public function getApiKeyName(): ?string {
		return $this->apiKeyName;
	}
    /** @param string|null $apiKeyName GitHub API Key name */
	public function setApiKeyName(?string $apiKeyName) {
		$this->apiKeyName = $apiKeyName;
	}
    /**
     * @param string|null $apiKeyName GitHub API Key name
     * @return UpdateGitHubApiKeyRequest
     */
	public function withApiKeyName(?string $apiKeyName): UpdateGitHubApiKeyRequest {
		$this->apiKeyName = $apiKeyName;
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
     * @return UpdateGitHubApiKeyRequest
     */
	public function withDescription(?string $description): UpdateGitHubApiKeyRequest {
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
     * @return UpdateGitHubApiKeyRequest
     */
	public function withApiKey(?string $apiKey): UpdateGitHubApiKeyRequest {
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
     * @return UpdateGitHubApiKeyRequest
     */
	public function withEncryptionKeyName(?string $encryptionKeyName): UpdateGitHubApiKeyRequest {
		$this->encryptionKeyName = $encryptionKeyName;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateGitHubApiKeyRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateGitHubApiKeyRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withApiKeyName(array_key_exists('apiKeyName', $data) && $data['apiKeyName'] !== null ? $data['apiKeyName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withApiKey(array_key_exists('apiKey', $data) && $data['apiKey'] !== null ? $data['apiKey'] : null)
            ->withEncryptionKeyName(array_key_exists('encryptionKeyName', $data) && $data['encryptionKeyName'] !== null ? $data['encryptionKeyName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "apiKeyName" => $this->getApiKeyName(),
            "description" => $this->getDescription(),
            "apiKey" => $this->getApiKey(),
            "encryptionKeyName" => $this->getEncryptionKeyName(),
        );
    }
}