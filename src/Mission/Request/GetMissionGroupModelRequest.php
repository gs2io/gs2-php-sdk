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
 * Request for getMissionGroupModel: Get Mission Group Model
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#getmissiongroupmodel
 */
class GetMissionGroupModelRequest extends Gs2BasicRequest {
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
     * @return GetMissionGroupModelRequest
     */
	public function withNamespaceName(?string $namespaceName): GetMissionGroupModelRequest {
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
     * @return GetMissionGroupModelRequest
     */
	public function withMissionGroupName(?string $missionGroupName): GetMissionGroupModelRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetMissionGroupModelRequest {
        if ($data === null) {
            return null;
        }
        return (new GetMissionGroupModelRequest())
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