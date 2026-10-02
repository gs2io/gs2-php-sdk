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
 * Version Status
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#status
 */
class Status implements IModel {
	/**
     * @var VersionModel Version Model
	 */
	private $versionModel;
	/**
     * @var Version Current Version
	 */
	private $currentVersion;
    /** @return VersionModel|null Version Model */
	public function getVersionModel(): ?VersionModel {
		return $this->versionModel;
	}
    /** @param VersionModel|null $versionModel Version Model */
	public function setVersionModel(?VersionModel $versionModel) {
		$this->versionModel = $versionModel;
	}
    /**
     * @param VersionModel|null $versionModel Version Model
     * @return Status
     */
	public function withVersionModel(?VersionModel $versionModel): Status {
		$this->versionModel = $versionModel;
		return $this;
	}
    /** @return Version|null Current Version */
	public function getCurrentVersion(): ?Version {
		return $this->currentVersion;
	}
    /** @param Version|null $currentVersion Current Version */
	public function setCurrentVersion(?Version $currentVersion) {
		$this->currentVersion = $currentVersion;
	}
    /**
     * @param Version|null $currentVersion Current Version
     * @return Status
     */
	public function withCurrentVersion(?Version $currentVersion): Status {
		$this->currentVersion = $currentVersion;
		return $this;
	}

    public static function fromJson(?array $data): ?Status {
        if ($data === null) {
            return null;
        }
        return (new Status())
            ->withVersionModel(array_key_exists('versionModel', $data) && $data['versionModel'] !== null ? VersionModel::fromJson($data['versionModel']) : null)
            ->withCurrentVersion(array_key_exists('currentVersion', $data) && $data['currentVersion'] !== null ? Version::fromJson($data['currentVersion']) : null);
    }

    public function toJson(): array {
        return array(
            "versionModel" => $this->getVersionModel() !== null ? $this->getVersionModel()->toJson() : null,
            "currentVersion" => $this->getCurrentVersion() !== null ? $this->getCurrentVersion()->toJson() : null,
        );
    }
}