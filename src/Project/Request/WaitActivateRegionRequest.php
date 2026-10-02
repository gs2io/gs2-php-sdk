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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/** Request for waitActivateRegion: Activate region */
class WaitActivateRegionRequest extends Gs2BasicRequest {
    /** @var string Owner ID */
    private $ownerId;
    /** @var string Project Name */
    private $projectName;
    /** @var string Region Name */
    private $regionName;
    /** @return string|null Owner ID */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}
    /** @param string|null $ownerId Owner ID */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}
    /**
     * @param string|null $ownerId Owner ID
     * @return WaitActivateRegionRequest
     */
	public function withOwnerId(?string $ownerId): WaitActivateRegionRequest {
		$this->ownerId = $ownerId;
		return $this;
	}
    /** @return string|null Project Name */
	public function getProjectName(): ?string {
		return $this->projectName;
	}
    /** @param string|null $projectName Project Name */
	public function setProjectName(?string $projectName) {
		$this->projectName = $projectName;
	}
    /**
     * @param string|null $projectName Project Name
     * @return WaitActivateRegionRequest
     */
	public function withProjectName(?string $projectName): WaitActivateRegionRequest {
		$this->projectName = $projectName;
		return $this;
	}
    /** @return string|null Region Name */
	public function getRegionName(): ?string {
		return $this->regionName;
	}
    /** @param string|null $regionName Region Name */
	public function setRegionName(?string $regionName) {
		$this->regionName = $regionName;
	}
    /**
     * @param string|null $regionName Region Name
     * @return WaitActivateRegionRequest
     */
	public function withRegionName(?string $regionName): WaitActivateRegionRequest {
		$this->regionName = $regionName;
		return $this;
	}

    public static function fromJson(?array $data): ?WaitActivateRegionRequest {
        if ($data === null) {
            return null;
        }
        return (new WaitActivateRegionRequest())
            ->withOwnerId(array_key_exists('ownerId', $data) && $data['ownerId'] !== null ? $data['ownerId'] : null)
            ->withProjectName(array_key_exists('projectName', $data) && $data['projectName'] !== null ? $data['projectName'] : null)
            ->withRegionName(array_key_exists('regionName', $data) && $data['regionName'] !== null ? $data['regionName'] : null);
    }

    public function toJson(): array {
        return array(
            "ownerId" => $this->getOwnerId(),
            "projectName" => $this->getProjectName(),
            "regionName" => $this->getRegionName(),
        );
    }
}