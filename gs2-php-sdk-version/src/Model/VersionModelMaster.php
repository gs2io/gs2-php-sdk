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

namespace Gs2\Version\Model;

use Gs2\Core\Model\IModel;

/**
 * バージョンマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class VersionModelMaster implements IModel {
	/**
     * @var string バージョンマスター
	 */
	protected $versionModelId;

	/**
	 * バージョンマスターを取得
	 *
	 * @return string|null バージョンマスター
	 */
	public function getVersionModelId(): ?string {
		return $this->versionModelId;
	}

	/**
	 * バージョンマスターを設定
	 *
	 * @param string|null $versionModelId バージョンマスター
	 */
	public function setVersionModelId(?string $versionModelId) {
		$this->versionModelId = $versionModelId;
	}

	/**
	 * バージョンマスターを設定
	 *
	 * @param string|null $versionModelId バージョンマスター
	 * @return VersionModelMaster $this
	 */
	public function withVersionModelId(?string $versionModelId): VersionModelMaster {
		$this->versionModelId = $versionModelId;
		return $this;
	}
	/**
     * @var string バージョン名
	 */
	protected $name;

	/**
	 * バージョン名を取得
	 *
	 * @return string|null バージョン名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * バージョン名を設定
	 *
	 * @param string|null $name バージョン名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * バージョン名を設定
	 *
	 * @param string|null $name バージョン名
	 * @return VersionModelMaster $this
	 */
	public function withName(?string $name): VersionModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string バージョンマスターの説明
	 */
	protected $description;

	/**
	 * バージョンマスターの説明を取得
	 *
	 * @return string|null バージョンマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * バージョンマスターの説明を設定
	 *
	 * @param string|null $description バージョンマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * バージョンマスターの説明を設定
	 *
	 * @param string|null $description バージョンマスターの説明
	 * @return VersionModelMaster $this
	 */
	public function withDescription(?string $description): VersionModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string バージョンのメタデータ
	 */
	protected $metadata;

	/**
	 * バージョンのメタデータを取得
	 *
	 * @return string|null バージョンのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * バージョンのメタデータを設定
	 *
	 * @param string|null $metadata バージョンのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * バージョンのメタデータを設定
	 *
	 * @param string|null $metadata バージョンのメタデータ
	 * @return VersionModelMaster $this
	 */
	public function withMetadata(?string $metadata): VersionModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var Version バージョンアップを促すバージョン
	 */
	protected $warningVersion;

	/**
	 * バージョンアップを促すバージョンを取得
	 *
	 * @return Version|null バージョンアップを促すバージョン
	 */
	public function getWarningVersion(): ?Version {
		return $this->warningVersion;
	}

	/**
	 * バージョンアップを促すバージョンを設定
	 *
	 * @param Version|null $warningVersion バージョンアップを促すバージョン
	 */
	public function setWarningVersion(?Version $warningVersion) {
		$this->warningVersion = $warningVersion;
	}

	/**
	 * バージョンアップを促すバージョンを設定
	 *
	 * @param Version|null $warningVersion バージョンアップを促すバージョン
	 * @return VersionModelMaster $this
	 */
	public function withWarningVersion(?Version $warningVersion): VersionModelMaster {
		$this->warningVersion = $warningVersion;
		return $this;
	}
	/**
     * @var Version バージョンチェックを蹴るバージョン
	 */
	protected $errorVersion;

	/**
	 * バージョンチェックを蹴るバージョンを取得
	 *
	 * @return Version|null バージョンチェックを蹴るバージョン
	 */
	public function getErrorVersion(): ?Version {
		return $this->errorVersion;
	}

	/**
	 * バージョンチェックを蹴るバージョンを設定
	 *
	 * @param Version|null $errorVersion バージョンチェックを蹴るバージョン
	 */
	public function setErrorVersion(?Version $errorVersion) {
		$this->errorVersion = $errorVersion;
	}

	/**
	 * バージョンチェックを蹴るバージョンを設定
	 *
	 * @param Version|null $errorVersion バージョンチェックを蹴るバージョン
	 * @return VersionModelMaster $this
	 */
	public function withErrorVersion(?Version $errorVersion): VersionModelMaster {
		$this->errorVersion = $errorVersion;
		return $this;
	}
	/**
     * @var string 判定に使用するバージョン値の種類
	 */
	protected $scope;

	/**
	 * 判定に使用するバージョン値の種類を取得
	 *
	 * @return string|null 判定に使用するバージョン値の種類
	 */
	public function getScope(): ?string {
		return $this->scope;
	}

	/**
	 * 判定に使用するバージョン値の種類を設定
	 *
	 * @param string|null $scope 判定に使用するバージョン値の種類
	 */
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}

	/**
	 * 判定に使用するバージョン値の種類を設定
	 *
	 * @param string|null $scope 判定に使用するバージョン値の種類
	 * @return VersionModelMaster $this
	 */
	public function withScope(?string $scope): VersionModelMaster {
		$this->scope = $scope;
		return $this;
	}
	/**
     * @var Version 現在のバージョン
	 */
	protected $currentVersion;

	/**
	 * 現在のバージョンを取得
	 *
	 * @return Version|null 現在のバージョン
	 */
	public function getCurrentVersion(): ?Version {
		return $this->currentVersion;
	}

	/**
	 * 現在のバージョンを設定
	 *
	 * @param Version|null $currentVersion 現在のバージョン
	 */
	public function setCurrentVersion(?Version $currentVersion) {
		$this->currentVersion = $currentVersion;
	}

	/**
	 * 現在のバージョンを設定
	 *
	 * @param Version|null $currentVersion 現在のバージョン
	 * @return VersionModelMaster $this
	 */
	public function withCurrentVersion(?Version $currentVersion): VersionModelMaster {
		$this->currentVersion = $currentVersion;
		return $this;
	}
	/**
     * @var bool 判定するバージョン値に署名検証を必要とするか
	 */
	protected $needSignature;

	/**
	 * 判定するバージョン値に署名検証を必要とするかを取得
	 *
	 * @return bool|null 判定するバージョン値に署名検証を必要とするか
	 */
	public function getNeedSignature(): ?bool {
		return $this->needSignature;
	}

	/**
	 * 判定するバージョン値に署名検証を必要とするかを設定
	 *
	 * @param bool|null $needSignature 判定するバージョン値に署名検証を必要とするか
	 */
	public function setNeedSignature(?bool $needSignature) {
		$this->needSignature = $needSignature;
	}

	/**
	 * 判定するバージョン値に署名検証を必要とするかを設定
	 *
	 * @param bool|null $needSignature 判定するバージョン値に署名検証を必要とするか
	 * @return VersionModelMaster $this
	 */
	public function withNeedSignature(?bool $needSignature): VersionModelMaster {
		$this->needSignature = $needSignature;
		return $this;
	}
	/**
     * @var string 署名検証に使用する暗号鍵 のGRN
	 */
	protected $signatureKeyId;

	/**
	 * 署名検証に使用する暗号鍵 のGRNを取得
	 *
	 * @return string|null 署名検証に使用する暗号鍵 のGRN
	 */
	public function getSignatureKeyId(): ?string {
		return $this->signatureKeyId;
	}

	/**
	 * 署名検証に使用する暗号鍵 のGRNを設定
	 *
	 * @param string|null $signatureKeyId 署名検証に使用する暗号鍵 のGRN
	 */
	public function setSignatureKeyId(?string $signatureKeyId) {
		$this->signatureKeyId = $signatureKeyId;
	}

	/**
	 * 署名検証に使用する暗号鍵 のGRNを設定
	 *
	 * @param string|null $signatureKeyId 署名検証に使用する暗号鍵 のGRN
	 * @return VersionModelMaster $this
	 */
	public function withSignatureKeyId(?string $signatureKeyId): VersionModelMaster {
		$this->signatureKeyId = $signatureKeyId;
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
	 * @return VersionModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): VersionModelMaster {
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
	 * @return VersionModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): VersionModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "versionModelId" => $this->versionModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "warningVersion" => $this->warningVersion->toJson(),
            "errorVersion" => $this->errorVersion->toJson(),
            "scope" => $this->scope,
            "currentVersion" => $this->currentVersion->toJson(),
            "needSignature" => $this->needSignature,
            "signatureKeyId" => $this->signatureKeyId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): VersionModelMaster {
        $model = new VersionModelMaster();
        $model->setVersionModelId(isset($data["versionModelId"]) ? $data["versionModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setWarningVersion(isset($data["warningVersion"]) ? Version::fromJson($data["warningVersion"]) : null);
        $model->setErrorVersion(isset($data["errorVersion"]) ? Version::fromJson($data["errorVersion"]) : null);
        $model->setScope(isset($data["scope"]) ? $data["scope"] : null);
        $model->setCurrentVersion(isset($data["currentVersion"]) ? Version::fromJson($data["currentVersion"]) : null);
        $model->setNeedSignature(isset($data["needSignature"]) ? $data["needSignature"] : null);
        $model->setSignatureKeyId(isset($data["signatureKeyId"]) ? $data["signatureKeyId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}