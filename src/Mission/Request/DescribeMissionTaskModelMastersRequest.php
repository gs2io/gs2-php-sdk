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

class DescribeMissionTaskModelMastersRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $missionGroupName;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DescribeMissionTaskModelMastersRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}
	public function withMissionGroupName(?string $missionGroupName): DescribeMissionTaskModelMastersRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): DescribeMissionTaskModelMastersRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): DescribeMissionTaskModelMastersRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeMissionTaskModelMastersRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeMissionTaskModelMastersRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "missionGroupName" => $this->getMissionGroupName(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}