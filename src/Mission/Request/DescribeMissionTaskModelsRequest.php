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

/**
 * Request for describeMissionTaskModels: List Mission Task Models
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#describemissiontaskmodels
 */
class DescribeMissionTaskModelsRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Mission Group Model name */
    private $missionGroupName;
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
     * @return DescribeMissionTaskModelsRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeMissionTaskModelsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Mission Group Model name */
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}
    /** @param string|null $missionGroupName Mission Group Model name */
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}
    /**
     * @param string|null $missionGroupName Mission Group Model name
     * @return DescribeMissionTaskModelsRequest
     */
	public function withMissionGroupName(?string $missionGroupName): DescribeMissionTaskModelsRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeMissionTaskModelsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeMissionTaskModelsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "missionGroupName" => $this->getMissionGroupName(),
        );
    }
}