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


class SignTargetVersion implements IModel {
	/**
     * @var string
	 */
	private $region;
	/**
     * @var string
	 */
	private $namespaceName;
	/**
     * @var string
	 */
	private $versionName;
	/**
     * @var Version
	 */
	private $version;

	public function getRegion(): ?string {
		return $this->region;
	}

	public function setRegion(?string $region) {
		$this->region = $region;
	}

	public function withRegion(?string $region): SignTargetVersion {
		$this->region = $region;
		return $this;
	}

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): SignTargetVersion {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getVersionName(): ?string {
		return $this->versionName;
	}

	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}

	public function withVersionName(?string $versionName): SignTargetVersion {
		$this->versionName = $versionName;
		return $this;
	}

	public function getVersion(): ?Version {
		return $this->version;
	}

	public function setVersion(?Version $version) {
		$this->version = $version;
	}

	public function withVersion(?Version $version): SignTargetVersion {
		$this->version = $version;
		return $this;
	}

    public static function fromJson(?array $data): ?SignTargetVersion {
        if ($data === null) {
            return null;
        }
        return (new SignTargetVersion())
            ->withRegion(array_key_exists('region', $data) && $data['region'] !== null ? $data['region'] : null)
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withVersionName(array_key_exists('versionName', $data) && $data['versionName'] !== null ? $data['versionName'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? Version::fromJson($data['version']) : null);
    }

    public function toJson(): array {
        return array(
            "region" => $this->getRegion(),
            "namespaceName" => $this->getNamespaceName(),
            "versionName" => $this->getVersionName(),
            "version" => $this->getVersion() !== null ? $this->getVersion()->toJson() : null,
        );
    }
}