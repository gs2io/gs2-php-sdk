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
 * 署名検証に使用するバージョン
 *
 * @author Game Server Services, Inc.
 *
 */
class SignTargetVersion implements IModel {
	/**
     * @var string None
	 */
	protected $region;

	/**
	 * Noneを取得
	 *
	 * @return string|null None
	 */
	public function getRegion(): ?string {
		return $this->region;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $region None
	 */
	public function setRegion(?string $region) {
		$this->region = $region;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $region None
	 * @return SignTargetVersion $this
	 */
	public function withRegion(?string $region): SignTargetVersion {
		$this->region = $region;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return SignTargetVersion $this
	 */
	public function withOwnerId(?string $ownerId): SignTargetVersion {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string ネームスペース名
	 */
	protected $namespaceName;

	/**
	 * ネームスペース名を取得
	 *
	 * @return string|null ネームスペース名
	 */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $namespaceName ネームスペース名
	 */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $namespaceName ネームスペース名
	 * @return SignTargetVersion $this
	 */
	public function withNamespaceName(?string $namespaceName): SignTargetVersion {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	/**
     * @var string バージョンの種類名
	 */
	protected $versionName;

	/**
	 * バージョンの種類名を取得
	 *
	 * @return string|null バージョンの種類名
	 */
	public function getVersionName(): ?string {
		return $this->versionName;
	}

	/**
	 * バージョンの種類名を設定
	 *
	 * @param string|null $versionName バージョンの種類名
	 */
	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}

	/**
	 * バージョンの種類名を設定
	 *
	 * @param string|null $versionName バージョンの種類名
	 * @return SignTargetVersion $this
	 */
	public function withVersionName(?string $versionName): SignTargetVersion {
		$this->versionName = $versionName;
		return $this;
	}
	/**
     * @var Version バージョン
	 */
	protected $version;

	/**
	 * バージョンを取得
	 *
	 * @return Version|null バージョン
	 */
	public function getVersion(): ?Version {
		return $this->version;
	}

	/**
	 * バージョンを設定
	 *
	 * @param Version|null $version バージョン
	 */
	public function setVersion(?Version $version) {
		$this->version = $version;
	}

	/**
	 * バージョンを設定
	 *
	 * @param Version|null $version バージョン
	 * @return SignTargetVersion $this
	 */
	public function withVersion(?Version $version): SignTargetVersion {
		$this->version = $version;
		return $this;
	}

    public function toJson(): array {
        return array(
            "region" => $this->region,
            "ownerId" => $this->ownerId,
            "namespaceName" => $this->namespaceName,
            "versionName" => $this->versionName,
            "version" => $this->version->toJson(),
        );
    }

    public static function fromJson(array $data): SignTargetVersion {
        $model = new SignTargetVersion();
        $model->setRegion(isset($data["region"]) ? $data["region"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setNamespaceName(isset($data["namespaceName"]) ? $data["namespaceName"] : null);
        $model->setVersionName(isset($data["versionName"]) ? $data["versionName"] : null);
        $model->setVersion(isset($data["version"]) ? Version::fromJson($data["version"]) : null);
        return $model;
    }
}