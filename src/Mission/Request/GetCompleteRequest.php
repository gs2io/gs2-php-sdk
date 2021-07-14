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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetCompleteRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $missionGroupName;
    /** @var string */
    private $accessToken;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): GetCompleteRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}

	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}

	public function withMissionGroupName(?string $missionGroupName): GetCompleteRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): GetCompleteRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCompleteRequest {
        if ($data === null) {
            return null;
        }
        return (new GetCompleteRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withMissionGroupName(empty($data['missionGroupName']) ? null : $data['missionGroupName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "missionGroupName" => $this->getMissionGroupName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}