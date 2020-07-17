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
 * バージョンの検証結果
 *
 * @author Game Server Services, Inc.
 *
 */
class Status implements IModel {
	/**
     * @var VersionModel バージョン設定
	 */
	protected $versionModel;

	/**
	 * バージョン設定を取得
	 *
	 * @return VersionModel|null バージョン設定
	 */
	public function getVersionModel(): ?VersionModel {
		return $this->versionModel;
	}

	/**
	 * バージョン設定を設定
	 *
	 * @param VersionModel|null $versionModel バージョン設定
	 */
	public function setVersionModel(?VersionModel $versionModel) {
		$this->versionModel = $versionModel;
	}

	/**
	 * バージョン設定を設定
	 *
	 * @param VersionModel|null $versionModel バージョン設定
	 * @return Status $this
	 */
	public function withVersionModel(?VersionModel $versionModel): Status {
		$this->versionModel = $versionModel;
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
	 * @return Status $this
	 */
	public function withCurrentVersion(?Version $currentVersion): Status {
		$this->currentVersion = $currentVersion;
		return $this;
	}

    public function toJson(): array {
        return array(
            "versionModel" => $this->versionModel->toJson(),
            "currentVersion" => $this->currentVersion->toJson(),
        );
    }

    public static function fromJson(array $data): Status {
        $model = new Status();
        $model->setVersionModel(isset($data["versionModel"]) ? VersionModel::fromJson($data["versionModel"]) : null);
        $model->setCurrentVersion(isset($data["currentVersion"]) ? Version::fromJson($data["currentVersion"]) : null);
        return $model;
    }
}