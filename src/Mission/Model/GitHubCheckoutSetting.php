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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;

/**
 * GitHubからリソースをチェックアウトしてくる設定
 *
 * @author Game Server Services, Inc.
 *
 */
class GitHubCheckoutSetting implements IModel {
	/**
     * @var string リソースの取得に使用するGitHub のAPIキー のGRN
	 */
	protected $apiKeyId;

	/**
	 * リソースの取得に使用するGitHub のAPIキー のGRNを取得
	 *
	 * @return string|null リソースの取得に使用するGitHub のAPIキー のGRN
	 */
	public function getApiKeyId(): ?string {
		return $this->apiKeyId;
	}

	/**
	 * リソースの取得に使用するGitHub のAPIキー のGRNを設定
	 *
	 * @param string|null $apiKeyId リソースの取得に使用するGitHub のAPIキー のGRN
	 */
	public function setApiKeyId(?string $apiKeyId) {
		$this->apiKeyId = $apiKeyId;
	}

	/**
	 * リソースの取得に使用するGitHub のAPIキー のGRNを設定
	 *
	 * @param string|null $apiKeyId リソースの取得に使用するGitHub のAPIキー のGRN
	 * @return GitHubCheckoutSetting $this
	 */
	public function withApiKeyId(?string $apiKeyId): GitHubCheckoutSetting {
		$this->apiKeyId = $apiKeyId;
		return $this;
	}
	/**
     * @var string リポジトリ名
	 */
	protected $repositoryName;

	/**
	 * リポジトリ名を取得
	 *
	 * @return string|null リポジトリ名
	 */
	public function getRepositoryName(): ?string {
		return $this->repositoryName;
	}

	/**
	 * リポジトリ名を設定
	 *
	 * @param string|null $repositoryName リポジトリ名
	 */
	public function setRepositoryName(?string $repositoryName) {
		$this->repositoryName = $repositoryName;
	}

	/**
	 * リポジトリ名を設定
	 *
	 * @param string|null $repositoryName リポジトリ名
	 * @return GitHubCheckoutSetting $this
	 */
	public function withRepositoryName(?string $repositoryName): GitHubCheckoutSetting {
		$this->repositoryName = $repositoryName;
		return $this;
	}
	/**
     * @var string ソースコードのファイルパス
	 */
	protected $sourcePath;

	/**
	 * ソースコードのファイルパスを取得
	 *
	 * @return string|null ソースコードのファイルパス
	 */
	public function getSourcePath(): ?string {
		return $this->sourcePath;
	}

	/**
	 * ソースコードのファイルパスを設定
	 *
	 * @param string|null $sourcePath ソースコードのファイルパス
	 */
	public function setSourcePath(?string $sourcePath) {
		$this->sourcePath = $sourcePath;
	}

	/**
	 * ソースコードのファイルパスを設定
	 *
	 * @param string|null $sourcePath ソースコードのファイルパス
	 * @return GitHubCheckoutSetting $this
	 */
	public function withSourcePath(?string $sourcePath): GitHubCheckoutSetting {
		$this->sourcePath = $sourcePath;
		return $this;
	}
	/**
     * @var string コードの取得元
	 */
	protected $referenceType;

	/**
	 * コードの取得元を取得
	 *
	 * @return string|null コードの取得元
	 */
	public function getReferenceType(): ?string {
		return $this->referenceType;
	}

	/**
	 * コードの取得元を設定
	 *
	 * @param string|null $referenceType コードの取得元
	 */
	public function setReferenceType(?string $referenceType) {
		$this->referenceType = $referenceType;
	}

	/**
	 * コードの取得元を設定
	 *
	 * @param string|null $referenceType コードの取得元
	 * @return GitHubCheckoutSetting $this
	 */
	public function withReferenceType(?string $referenceType): GitHubCheckoutSetting {
		$this->referenceType = $referenceType;
		return $this;
	}
	/**
     * @var string コミットハッシュ
	 */
	protected $commitHash;

	/**
	 * コミットハッシュを取得
	 *
	 * @return string|null コミットハッシュ
	 */
	public function getCommitHash(): ?string {
		return $this->commitHash;
	}

	/**
	 * コミットハッシュを設定
	 *
	 * @param string|null $commitHash コミットハッシュ
	 */
	public function setCommitHash(?string $commitHash) {
		$this->commitHash = $commitHash;
	}

	/**
	 * コミットハッシュを設定
	 *
	 * @param string|null $commitHash コミットハッシュ
	 * @return GitHubCheckoutSetting $this
	 */
	public function withCommitHash(?string $commitHash): GitHubCheckoutSetting {
		$this->commitHash = $commitHash;
		return $this;
	}
	/**
     * @var string ブランチ名
	 */
	protected $branchName;

	/**
	 * ブランチ名を取得
	 *
	 * @return string|null ブランチ名
	 */
	public function getBranchName(): ?string {
		return $this->branchName;
	}

	/**
	 * ブランチ名を設定
	 *
	 * @param string|null $branchName ブランチ名
	 */
	public function setBranchName(?string $branchName) {
		$this->branchName = $branchName;
	}

	/**
	 * ブランチ名を設定
	 *
	 * @param string|null $branchName ブランチ名
	 * @return GitHubCheckoutSetting $this
	 */
	public function withBranchName(?string $branchName): GitHubCheckoutSetting {
		$this->branchName = $branchName;
		return $this;
	}
	/**
     * @var string タグ名
	 */
	protected $tagName;

	/**
	 * タグ名を取得
	 *
	 * @return string|null タグ名
	 */
	public function getTagName(): ?string {
		return $this->tagName;
	}

	/**
	 * タグ名を設定
	 *
	 * @param string|null $tagName タグ名
	 */
	public function setTagName(?string $tagName) {
		$this->tagName = $tagName;
	}

	/**
	 * タグ名を設定
	 *
	 * @param string|null $tagName タグ名
	 * @return GitHubCheckoutSetting $this
	 */
	public function withTagName(?string $tagName): GitHubCheckoutSetting {
		$this->tagName = $tagName;
		return $this;
	}

    public function toJson(): array {
        return array(
            "apiKeyId" => $this->apiKeyId,
            "repositoryName" => $this->repositoryName,
            "sourcePath" => $this->sourcePath,
            "referenceType" => $this->referenceType,
            "commitHash" => $this->commitHash,
            "branchName" => $this->branchName,
            "tagName" => $this->tagName,
        );
    }

    public static function fromJson(array $data): GitHubCheckoutSetting {
        $model = new GitHubCheckoutSetting();
        $model->setApiKeyId(isset($data["apiKeyId"]) ? $data["apiKeyId"] : null);
        $model->setRepositoryName(isset($data["repositoryName"]) ? $data["repositoryName"] : null);
        $model->setSourcePath(isset($data["sourcePath"]) ? $data["sourcePath"] : null);
        $model->setReferenceType(isset($data["referenceType"]) ? $data["referenceType"] : null);
        $model->setCommitHash(isset($data["commitHash"]) ? $data["commitHash"] : null);
        $model->setBranchName(isset($data["branchName"]) ? $data["branchName"] : null);
        $model->setTagName(isset($data["tagName"]) ? $data["tagName"] : null);
        return $model;
    }
}