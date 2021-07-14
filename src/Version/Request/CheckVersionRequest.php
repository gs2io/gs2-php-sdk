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

class CheckVersionRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var array */
    private $targetVersions;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CheckVersionRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): CheckVersionRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getTargetVersions(): ?array {
		return $this->targetVersions;
	}

	public function setTargetVersions(?array $targetVersions) {
		$this->targetVersions = $targetVersions;
	}

	public function withTargetVersions(?array $targetVersions): CheckVersionRequest {
		$this->targetVersions = $targetVersions;
		return $this;
	}

    public static function fromJson(?array $data): ?CheckVersionRequest {
        if ($data === null) {
            return null;
        }
        return (new CheckVersionRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withTargetVersions(array_map(
                function ($item) {
                    return TargetVersion::fromJson($item);
                },
                array_key_exists('targetVersions', $data) && $data['targetVersions'] !== null ? $data['targetVersions'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "targetVersions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTargetVersions() !== null && $this->getTargetVersions() !== null ? $this->getTargetVersions() : []
            ),
        );
    }
}