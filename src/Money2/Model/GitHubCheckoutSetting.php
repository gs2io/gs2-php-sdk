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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


/**
 * Setting for checking out master data from GitHub
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#githubcheckoutsetting
 */
class GitHubCheckoutSetting implements IModel {
	/**
     * @var string GitHub API Key GRN
	 */
	private $apiKeyId;
	/**
     * @var string Repository Name
	 */
	private $repositoryName;
	/**
     * @var string Master data (JSON) file path
	 */
	private $sourcePath;
	/**
     * @var string Source of code
	 */
	private $referenceType;
	/**
     * @var string Commit hash
	 */
	private $commitHash;
	/**
     * @var string Branch Name
	 */
	private $branchName;
	/**
     * @var string Tag Name
	 */
	private $tagName;
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
     * @return GitHubCheckoutSetting
     */
	public function withApiKeyId(?string $apiKeyId): GitHubCheckoutSetting {
		$this->apiKeyId = $apiKeyId;
		return $this;
	}
    /** @return string|null Repository Name */
	public function getRepositoryName(): ?string {
		return $this->repositoryName;
	}
    /** @param string|null $repositoryName Repository Name */
	public function setRepositoryName(?string $repositoryName) {
		$this->repositoryName = $repositoryName;
	}
    /**
     * @param string|null $repositoryName Repository Name
     * @return GitHubCheckoutSetting
     */
	public function withRepositoryName(?string $repositoryName): GitHubCheckoutSetting {
		$this->repositoryName = $repositoryName;
		return $this;
	}
    /** @return string|null Master data (JSON) file path */
	public function getSourcePath(): ?string {
		return $this->sourcePath;
	}
    /** @param string|null $sourcePath Master data (JSON) file path */
	public function setSourcePath(?string $sourcePath) {
		$this->sourcePath = $sourcePath;
	}
    /**
     * @param string|null $sourcePath Master data (JSON) file path
     * @return GitHubCheckoutSetting
     */
	public function withSourcePath(?string $sourcePath): GitHubCheckoutSetting {
		$this->sourcePath = $sourcePath;
		return $this;
	}
    /** @return string|null Source of code */
	public function getReferenceType(): ?string {
		return $this->referenceType;
	}
    /** @param string|null $referenceType Source of code */
	public function setReferenceType(?string $referenceType) {
		$this->referenceType = $referenceType;
	}
    /**
     * @param string|null $referenceType Source of code
     * @return GitHubCheckoutSetting
     */
	public function withReferenceType(?string $referenceType): GitHubCheckoutSetting {
		$this->referenceType = $referenceType;
		return $this;
	}
    /** @return string|null Commit hash */
	public function getCommitHash(): ?string {
		return $this->commitHash;
	}
    /** @param string|null $commitHash Commit hash */
	public function setCommitHash(?string $commitHash) {
		$this->commitHash = $commitHash;
	}
    /**
     * @param string|null $commitHash Commit hash
     * @return GitHubCheckoutSetting
     */
	public function withCommitHash(?string $commitHash): GitHubCheckoutSetting {
		$this->commitHash = $commitHash;
		return $this;
	}
    /** @return string|null Branch Name */
	public function getBranchName(): ?string {
		return $this->branchName;
	}
    /** @param string|null $branchName Branch Name */
	public function setBranchName(?string $branchName) {
		$this->branchName = $branchName;
	}
    /**
     * @param string|null $branchName Branch Name
     * @return GitHubCheckoutSetting
     */
	public function withBranchName(?string $branchName): GitHubCheckoutSetting {
		$this->branchName = $branchName;
		return $this;
	}
    /** @return string|null Tag Name */
	public function getTagName(): ?string {
		return $this->tagName;
	}
    /** @param string|null $tagName Tag Name */
	public function setTagName(?string $tagName) {
		$this->tagName = $tagName;
	}
    /**
     * @param string|null $tagName Tag Name
     * @return GitHubCheckoutSetting
     */
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