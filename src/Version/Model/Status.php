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


class Status implements IModel {
	/**
     * @var VersionModel
	 */
	private $versionModel;
	/**
     * @var Version
	 */
	private $currentVersion;

	public function getVersionModel(): ?VersionModel {
		return $this->versionModel;
	}

	public function setVersionModel(?VersionModel $versionModel) {
		$this->versionModel = $versionModel;
	}

	public function withVersionModel(?VersionModel $versionModel): Status {
		$this->versionModel = $versionModel;
		return $this;
	}

	public function getCurrentVersion(): ?Version {
		return $this->currentVersion;
	}

	public function setCurrentVersion(?Version $currentVersion) {
		$this->currentVersion = $currentVersion;
	}

	public function withCurrentVersion(?Version $currentVersion): Status {
		$this->currentVersion = $currentVersion;
		return $this;
	}

    public static function fromJson(?array $data): ?Status {
        if ($data === null) {
            return null;
        }
        return (new Status())
            ->withVersionModel(empty($data['versionModel']) ? null : VersionModel::fromJson($data['versionModel']))
            ->withCurrentVersion(empty($data['currentVersion']) ? null : Version::fromJson($data['currentVersion']));
    }

    public function toJson(): array {
        return array(
            "versionModel" => $this->getVersionModel() !== null ? $this->getVersionModel()->toJson() : null,
            "currentVersion" => $this->getCurrentVersion() !== null ? $this->getCurrentVersion()->toJson() : null,
        );
    }
}