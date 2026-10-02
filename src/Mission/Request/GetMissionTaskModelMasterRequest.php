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
 * Request for getMissionTaskModelMaster: Get Mission Task Model Master
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#getmissiontaskmodelmaster
 */
class GetMissionTaskModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Mission Group Model name */
    private $missionGroupName;
    /** @var string Mission Task Model name */
    private $missionTaskName;
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
     * @return GetMissionTaskModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetMissionTaskModelMasterRequest {
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
     * @return GetMissionTaskModelMasterRequest
     */
	public function withMissionGroupName(?string $missionGroupName): GetMissionTaskModelMasterRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}
    /** @return string|null Mission Task Model name */
	public function getMissionTaskName(): ?string {
		return $this->missionTaskName;
	}
    /** @param string|null $missionTaskName Mission Task Model name */
	public function setMissionTaskName(?string $missionTaskName) {
		$this->missionTaskName = $missionTaskName;
	}
    /**
     * @param string|null $missionTaskName Mission Task Model name
     * @return GetMissionTaskModelMasterRequest
     */
	public function withMissionTaskName(?string $missionTaskName): GetMissionTaskModelMasterRequest {
		$this->missionTaskName = $missionTaskName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetMissionTaskModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetMissionTaskModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null)
            ->withMissionTaskName(array_key_exists('missionTaskName', $data) && $data['missionTaskName'] !== null ? $data['missionTaskName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "missionGroupName" => $this->getMissionGroupName(),
            "missionTaskName" => $this->getMissionTaskName(),
        );
    }
}