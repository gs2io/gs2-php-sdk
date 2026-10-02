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
use Gs2\Version\Model\TargetVersion;

/**
 * Request for checkVersion: Check Version
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#checkversion
 */
class CheckVersionRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var array List of Versions to be verified */
    private $targetVersions;
    /** @var string */
    private $duplicationAvoider;
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
     * @return CheckVersionRequest
     */
	public function withNamespaceName(?string $namespaceName): CheckVersionRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return CheckVersionRequest
     */
	public function withAccessToken(?string $accessToken): CheckVersionRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return array|null List of Versions to be verified */
	public function getTargetVersions(): ?array {
		return $this->targetVersions;
	}
    /** @param array|null $targetVersions List of Versions to be verified */
	public function setTargetVersions(?array $targetVersions) {
		$this->targetVersions = $targetVersions;
	}
    /**
     * @param array|null $targetVersions List of Versions to be verified
     * @return CheckVersionRequest
     */
	public function withTargetVersions(?array $targetVersions): CheckVersionRequest {
		$this->targetVersions = $targetVersions;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CheckVersionRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CheckVersionRequest {
        if ($data === null) {
            return null;
        }
        return (new CheckVersionRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withTargetVersions(!array_key_exists('targetVersions', $data) || $data['targetVersions'] === null ? null : array_map(
                function ($item) {
                    return TargetVersion::fromJson($item);
                },
                $data['targetVersions']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "targetVersions" => $this->getTargetVersions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTargetVersions()
            ),
        );
    }
}