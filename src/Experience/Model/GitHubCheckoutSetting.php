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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;


class GitHubCheckoutSetting implements IModel {
	/**
     * @var string
	 */
	private $apiKeyId;
	/**
     * @var string
	 */
	private $repositoryName;
	/**
     * @var string
	 */
	private $sourcePath;
	/**
     * @var string
	 */
	private $referenceType;
	/**
     * @var string
	 */
	private $commitHash;
	/**
     * @var string
	 */
	private $branchName;
	/**
     * @var string
	 */
	private $tagName;

	public function getApiKeyId(): ?string {
		return $this->apiKeyId;
	}

	public function setApiKeyId(?string $apiKeyId) {
		$this->apiKeyId = $apiKeyId;
	}

	public function withApiKeyId(?string $apiKeyId): GitHubCheckoutSetting {
		$this->apiKeyId = $apiKeyId;
		return $this;
	}

	public function getRepositoryName(): ?string {
		return $this->repositoryName;
	}

	public function setRepositoryName(?string $repositoryName) {
		$this->repositoryName = $repositoryName;
	}

	public function withRepositoryName(?string $repositoryName): GitHubCheckoutSetting {
		$this->repositoryName = $repositoryName;
		return $this;
	}

	public function getSourcePath(): ?string {
		return $this->sourcePath;
	}

	public function setSourcePath(?string $sourcePath) {
		$this->sourcePath = $sourcePath;
	}

	public function withSourcePath(?string $sourcePath): GitHubCheckoutSetting {
		$this->sourcePath = $sourcePath;
		return $this;
	}

	public function getReferenceType(): ?string {
		return $this->referenceType;
	}

	public function setReferenceType(?string $referenceType) {
		$this->referenceType = $referenceType;
	}

	public function withReferenceType(?string $referenceType): GitHubCheckoutSetting {
		$this->referenceType = $referenceType;
		return $this;
	}

	public function getCommitHash(): ?string {
		return $this->commitHash;
	}

	public function setCommitHash(?string $commitHash) {
		$this->commitHash = $commitHash;
	}

	public function withCommitHash(?string $commitHash): GitHubCheckoutSetting {
		$this->commitHash = $commitHash;
		return $this;
	}

	public function getBranchName(): ?string {
		return $this->branchName;
	}

	public function setBranchName(?string $branchName) {
		$this->branchName = $branchName;
	}

	public function withBranchName(?string $branchName): GitHubCheckoutSetting {
		$this->branchName = $branchName;
		return $this;
	}

	public function getTagName(): ?string {
		return $this->tagName;
	}

	public function setTagName(?string $tagName) {
		$this->tagName = $tagName;
	}

	public function withTagName(?string $tagName): GitHubCheckoutSetting {
		$this->tagName = $tagName;
		return $this;
	}

    public static function fromJson(?array $data): ?GitHubCheckoutSetting {
        if ($data === null) {
            return null;
        }
        return (new GitHubCheckoutSetting())
            ->withApiKeyId(array_key_exists('apiKeyId', $data) && $data['apiKeyId'] !== null ? $data['apiKeyId'] : null)
            ->withRepositoryName(array_key_exists('repositoryName', $data) && $data['repositoryName'] !== null ? $data['repositoryName'] : null)
            ->withSourcePath(array_key_exists('sourcePath', $data) && $data['sourcePath'] !== null ? $data['sourcePath'] : null)
            ->withReferenceType(array_key_exists('referenceType', $data) && $data['referenceType'] !== null ? $data['referenceType'] : null)
            ->withCommitHash(array_key_exists('commitHash', $data) && $data['commitHash'] !== null ? $data['commitHash'] : null)
            ->withBranchName(array_key_exists('branchName', $data) && $data['branchName'] !== null ? $data['branchName'] : null)
            ->withTagName(array_key_exists('tagName', $data) && $data['tagName'] !== null ? $data['tagName'] : null);
    }

    public function toJson(): array {
        return array(
            "apiKeyId" => $this->getApiKeyId(),
            "repositoryName" => $this->getRepositoryName(),
            "sourcePath" => $this->getSourcePath(),
            "referenceType" => $this->getReferenceType(),
            "commitHash" => $this->getCommitHash(),
            "branchName" => $this->getBranchName(),
            "tagName" => $this->getTagName(),
        );
    }
}