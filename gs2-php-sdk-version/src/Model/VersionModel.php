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
 * バージョン設定
 *
 * @author Game Server Services, Inc.
 *
 */
class VersionModel implements IModel {
	/**
     * @var string バージョン設定
	 */
	protected $versionModelId;

	/**
	 * バージョン設定を取得
	 *
	 * @return string|null バージョン設定
	 */
	public function getVersionModelId(): ?string {
		return $this->versionModelId;
	}

	/**
	 * バージョン設定を設定
	 *
	 * @param string|null $versionModelId バージョン設定
	 */
	public function setVersionModelId(?string $versionModelId) {
		$this->versionModelId = $versionModelId;
	}

	/**
	 * バージョン設定を設定
	 *
	 * @param string|null $versionModelId バージョン設定
	 * @return VersionModel $this
	 */
	public function withVersionModelId(?string $versionModelId): VersionModel {
		$this->versionModelId = $versionModelId;
		return $this;
	}
	/**
     * @var string バージョンの種類名
	 */
	protected $name;

	/**
	 * バージョンの種類名を取得
	 *
	 * @return string|null バージョンの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * バージョンの種類名を設定
	 *
	 * @param string|null $name バージョンの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * バージョンの種類名を設定
	 *
	 * @param string|null $name バージョンの種類名
	 * @return VersionModel $this
	 */
	public function withName(?string $name): VersionModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string バージョンの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * バージョンの種類のメタデータを取得
	 *
	 * @return string|null バージョンの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * バージョンの種類のメタデータを設定
	 *
	 * @param string|null $metadata バージョンの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * バージョンの種類のメタデータを設定
	 *
	 * @param string|null $metadata バージョンの種類のメタデータ
	 * @return VersionModel $this
	 */
	public function withMetadata(?string $metadata): VersionModel {
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
	 * @return VersionModel $this
	 */
	public function withWarningVersion(?Version $warningVersion): VersionModel {
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
	 * @return VersionModel $this
	 */
	public function withErrorVersion(?Version $errorVersion): VersionModel {
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
	 * @return VersionModel $this
	 */
	public function withScope(?string $scope): VersionModel {
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
	 * @return VersionModel $this
	 */
	public function withCurrentVersion(?Version $currentVersion): VersionModel {
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
	 * @return VersionModel $this
	 */
	public function withNeedSignature(?bool $needSignature): VersionModel {
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
	 * @return VersionModel $this
	 */
	public function withSignatureKeyId(?string $signatureKeyId): VersionModel {
		$this->signatureKeyId = $signatureKeyId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "versionModelId" => $this->versionModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "warningVersion" => $this->warningVersion->toJson(),
            "errorVersion" => $this->errorVersion->toJson(),
            "scope" => $this->scope,
            "currentVersion" => $this->currentVersion->toJson(),
            "needSignature" => $this->needSignature,
            "signatureKeyId" => $this->signatureKeyId,
        );
    }

    public static function fromJson(array $data): VersionModel {
        $model = new VersionModel();
        $model->setVersionModelId(isset($data["versionModelId"]) ? $data["versionModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setWarningVersion(isset($data["warningVersion"]) ? Version::fromJson($data["warningVersion"]) : null);
        $model->setErrorVersion(isset($data["errorVersion"]) ? Version::fromJson($data["errorVersion"]) : null);
        $model->setScope(isset($data["scope"]) ? $data["scope"] : null);
        $model->setCurrentVersion(isset($data["currentVersion"]) ? Version::fromJson($data["currentVersion"]) : null);
        $model->setNeedSignature(isset($data["needSignature"]) ? $data["needSignature"] : null);
        $model->setSignatureKeyId(isset($data["signatureKeyId"]) ? $data["signatureKeyId"] : null);
        return $model;
    }
}