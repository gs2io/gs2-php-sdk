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
 * 承認したバージョン
 *
 * @author Game Server Services, Inc.
 *
 */
class AcceptVersion implements IModel {
	/**
     * @var string 承認したバージョン
	 */
	protected $acceptVersionId;

	/**
	 * 承認したバージョンを取得
	 *
	 * @return string|null 承認したバージョン
	 */
	public function getAcceptVersionId(): ?string {
		return $this->acceptVersionId;
	}

	/**
	 * 承認したバージョンを設定
	 *
	 * @param string|null $acceptVersionId 承認したバージョン
	 */
	public function setAcceptVersionId(?string $acceptVersionId) {
		$this->acceptVersionId = $acceptVersionId;
	}

	/**
	 * 承認したバージョンを設定
	 *
	 * @param string|null $acceptVersionId 承認したバージョン
	 * @return AcceptVersion $this
	 */
	public function withAcceptVersionId(?string $acceptVersionId): AcceptVersion {
		$this->acceptVersionId = $acceptVersionId;
		return $this;
	}
	/**
     * @var string 承認したバージョン名
	 */
	protected $versionName;

	/**
	 * 承認したバージョン名を取得
	 *
	 * @return string|null 承認したバージョン名
	 */
	public function getVersionName(): ?string {
		return $this->versionName;
	}

	/**
	 * 承認したバージョン名を設定
	 *
	 * @param string|null $versionName 承認したバージョン名
	 */
	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}

	/**
	 * 承認したバージョン名を設定
	 *
	 * @param string|null $versionName 承認したバージョン名
	 * @return AcceptVersion $this
	 */
	public function withVersionName(?string $versionName): AcceptVersion {
		$this->versionName = $versionName;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return AcceptVersion $this
	 */
	public function withUserId(?string $userId): AcceptVersion {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var Version 承認したバージョン
	 */
	protected $version;

	/**
	 * 承認したバージョンを取得
	 *
	 * @return Version|null 承認したバージョン
	 */
	public function getVersion(): ?Version {
		return $this->version;
	}

	/**
	 * 承認したバージョンを設定
	 *
	 * @param Version|null $version 承認したバージョン
	 */
	public function setVersion(?Version $version) {
		$this->version = $version;
	}

	/**
	 * 承認したバージョンを設定
	 *
	 * @param Version|null $version 承認したバージョン
	 * @return AcceptVersion $this
	 */
	public function withVersion(?Version $version): AcceptVersion {
		$this->version = $version;
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
	 * @return AcceptVersion $this
	 */
	public function withCreatedAt(?int $createdAt): AcceptVersion {
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
	 * @return AcceptVersion $this
	 */
	public function withUpdatedAt(?int $updatedAt): AcceptVersion {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "acceptVersionId" => $this->acceptVersionId,
            "versionName" => $this->versionName,
            "userId" => $this->userId,
            "version" => $this->version->toJson(),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): AcceptVersion {
        $model = new AcceptVersion();
        $model->setAcceptVersionId(isset($data["acceptVersionId"]) ? $data["acceptVersionId"] : null);
        $model->setVersionName(isset($data["versionName"]) ? $data["versionName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setVersion(isset($data["version"]) ? Version::fromJson($data["version"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}