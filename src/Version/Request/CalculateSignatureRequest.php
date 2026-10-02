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

/**
 * Request for calculateSignature: Calculate version signature
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#calculatesignature
 */
class CalculateSignatureRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Version Model name */
    private $versionName;
    /** @var Version Version */
    private $version;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CalculateSignatureRequest
     */
	public function withNamespaceName(?string $namespaceName): CalculateSignatureRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Version Model name */
	public function getVersionName(): ?string {
		return $this->versionName;
	}
    /** @param string|null $versionName Version Model name */
	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}
    /**
     * @param string|null $versionName Version Model name
     * @return CalculateSignatureRequest
     */
	public function withVersionName(?string $versionName): CalculateSignatureRequest {
		$this->versionName = $versionName;
		return $this;
	}
    /** @return Version|null Version */
	public function getVersion(): ?Version {
		return $this->version;
	}
    /** @param Version|null $version Version */
	public function setVersion(?Version $version) {
		$this->version = $version;
	}
    /**
     * @param Version|null $version Version
     * @return CalculateSignatureRequest
     */
	public function withVersion(?Version $version): CalculateSignatureRequest {
		$this->version = $version;
		return $this;
	}

    public static function fromJson(?array $data): ?CalculateSignatureRequest {
        if ($data === null) {
            return null;
        }
        return (new CalculateSignatureRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withVersionName(array_key_exists('versionName', $data) && $data['versionName'] !== null ? $data['versionName'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? Version::fromJson($data['version']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "versionName" => $this->getVersionName(),
            "version" => $this->getVersion() !== null ? $this->getVersion()->toJson() : null,
        );
    }
}