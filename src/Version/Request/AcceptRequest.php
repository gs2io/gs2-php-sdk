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

namespace Gs2\Version\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Version\Model\Version;

class AcceptRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $versionName;
    /** @var string */
    private $accessToken;
    /** @var Version */
    private $version;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): AcceptRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getVersionName(): ?string {
		return $this->versionName;
	}
	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}
	public function withVersionName(?string $versionName): AcceptRequest {
		$this->versionName = $versionName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): AcceptRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getVersion(): ?Version {
		return $this->version;
	}
	public function setVersion(?Version $version) {
		$this->version = $version;
	}
	public function withVersion(?Version $version): AcceptRequest {
		$this->version = $version;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcceptRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcceptRequest {
        if ($data === null) {
            return null;
        }
        return (new AcceptRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withVersionName(array_key_exists('versionName', $data) && $data['versionName'] !== null ? $data['versionName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? Version::fromJson($data['version']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "versionName" => $this->getVersionName(),
            "accessToken" => $this->getAccessToken(),
            "version" => $this->getVersion() !== null ? $this->getVersion()->toJson() : null,
        );
    }
}