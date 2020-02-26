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
 * GitHub のAPIキー
 *
 * @author Game Server Services, Inc.
 *
 */
class GitHubApiKey implements IModel {
	/**
     * @var string GitHub のAPIキー
	 */
	protected $apiKeyId;

	/**
	 * GitHub のAPIキーを取得
	 *
	 * @return string|null GitHub のAPIキー
	 */
	public function getApiKeyId(): ?string {
		return $this->apiKeyId;
	}

	/**
	 * GitHub のAPIキーを設定
	 *
	 * @param string|null $apiKeyId GitHub のAPIキー
	 */
	public function setApiKeyId(?string $apiKeyId) {
		$this->apiKeyId = $apiKeyId;
	}

	/**
	 * GitHub のAPIキーを設定
	 *
	 * @param string|null $apiKeyId GitHub のAPIキー
	 * @return GitHubApiKey $this
	 */
	public function withApiKeyId(?string $apiKeyId): GitHubApiKey {
		$this->apiKeyId = $apiKeyId;
		return $this;
	}
	/**
     * @var string GitHub APIキー名
	 */
	protected $name;

	/**
	 * GitHub APIキー名を取得
	 *
	 * @return string|null GitHub APIキー名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * GitHub APIキー名を設定
	 *
	 * @param string|null $name GitHub APIキー名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * GitHub APIキー名を設定
	 *
	 * @param string|null $name GitHub APIキー名
	 * @return GitHubApiKey $this
	 */
	public function withName(?string $name): GitHubApiKey {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 説明文
	 */
	protected $description;

	/**
	 * 説明文を取得
	 *
	 * @return string|null 説明文
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 * @return GitHubApiKey $this
	 */
	public function withDescription(?string $description): GitHubApiKey {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string APIキー
	 */
	protected $apiKey;

	/**
	 * APIキーを取得
	 *
	 * @return string|null APIキー
	 */
	public function getApiKey(): ?string {
		return $this->apiKey;
	}

	/**
	 * APIキーを設定
	 *
	 * @param string|null $apiKey APIキー
	 */
	public function setApiKey(?string $apiKey) {
		$this->apiKey = $apiKey;
	}

	/**
	 * APIキーを設定
	 *
	 * @param string|null $apiKey APIキー
	 * @return GitHubApiKey $this
	 */
	public function withApiKey(?string $apiKey): GitHubApiKey {
		$this->apiKey = $apiKey;
		return $this;
	}
	/**
     * @var string APIキーの暗号化に使用する暗号鍵名
	 */
	protected $encryptionKeyName;

	/**
	 * APIキーの暗号化に使用する暗号鍵名を取得
	 *
	 * @return string|null APIキーの暗号化に使用する暗号鍵名
	 */
	public function getEncryptionKeyName(): ?string {
		return $this->encryptionKeyName;
	}

	/**
	 * APIキーの暗号化に使用する暗号鍵名を設定
	 *
	 * @param string|null $encryptionKeyName APIキーの暗号化に使用する暗号鍵名
	 */
	public function setEncryptionKeyName(?string $encryptionKeyName) {
		$this->encryptionKeyName = $encryptionKeyName;
	}

	/**
	 * APIキーの暗号化に使用する暗号鍵名を設定
	 *
	 * @param string|null $encryptionKeyName APIキーの暗号化に使用する暗号鍵名
	 * @return GitHubApiKey $this
	 */
	public function withEncryptionKeyName(?string $encryptionKeyName): GitHubApiKey {
		$this->encryptionKeyName = $encryptionKeyName;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return GitHubApiKey $this
	 */
	public function withCreatedAt(?int $createdAt): GitHubApiKey {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return GitHubApiKey $this
	 */
	public function withUpdatedAt(?int $updatedAt): GitHubApiKey {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "apiKeyId" => $this->apiKeyId,
            "name" => $this->name,
            "description" => $this->description,
            "apiKey" => $this->apiKey,
            "encryptionKeyName" => $this->encryptionKeyName,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): GitHubApiKey {
        $model = new GitHubApiKey();
        $model->setApiKeyId(isset($data["apiKeyId"]) ? $data["apiKeyId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setApiKey(isset($data["apiKey"]) ? $data["apiKey"] : null);
        $model->setEncryptionKeyName(isset($data["encryptionKeyName"]) ? $data["encryptionKeyName"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}