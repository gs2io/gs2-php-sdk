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
 * Request for deleteGitHubApiKey: Delete GitHub API Key
 *
 * @see https://docs.gs2.io/api_reference/key/sdk/#deletegithubapikey
 */
class DeleteGitHubApiKeyRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string GitHub API Key name */
    private $apiKeyName;
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
     * @return DeleteGitHubApiKeyRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteGitHubApiKeyRequest {
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
     * @return DeleteGitHubApiKeyRequest
     */
	public function withApiKeyName(?string $apiKeyName): DeleteGitHubApiKeyRequest {
		$this->apiKeyName = $apiKeyName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteGitHubApiKeyRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteGitHubApiKeyRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withApiKeyName(array_key_exists('apiKeyName', $data) && $data['apiKeyName'] !== null ? $data['apiKeyName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "apiKeyName" => $this->getApiKeyName(),
        );
    }
}