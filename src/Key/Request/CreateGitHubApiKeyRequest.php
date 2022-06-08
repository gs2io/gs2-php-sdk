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

class CreateGitHubApiKeyRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $apiKey;
    /** @var string */
    private $encryptionKeyName;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateGitHubApiKeyRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateGitHubApiKeyRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateGitHubApiKeyRequest {
		$this->description = $description;
		return $this;
	}
	public function getApiKey(): ?string {
		return $this->apiKey;
	}
	public function setApiKey(?string $apiKey) {
		$this->apiKey = $apiKey;
	}
	public function withApiKey(?string $apiKey): CreateGitHubApiKeyRequest {
		$this->apiKey = $apiKey;
		return $this;
	}
	public function getEncryptionKeyName(): ?string {
		return $this->encryptionKeyName;
	}
	public function setEncryptionKeyName(?string $encryptionKeyName) {
		$this->encryptionKeyName = $encryptionKeyName;
	}
	public function withEncryptionKeyName(?string $encryptionKeyName): CreateGitHubApiKeyRequest {
		$this->encryptionKeyName = $encryptionKeyName;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGitHubApiKeyRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateGitHubApiKeyRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withApiKey(array_key_exists('apiKey', $data) && $data['apiKey'] !== null ? $data['apiKey'] : null)
            ->withEncryptionKeyName(array_key_exists('encryptionKeyName', $data) && $data['encryptionKeyName'] !== null ? $data['encryptionKeyName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "apiKey" => $this->getApiKey(),
            "encryptionKeyName" => $this->getEncryptionKeyName(),
        );
    }
}