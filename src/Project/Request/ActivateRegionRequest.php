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

/** Request for activateRegion: Activate region */
class ActivateRegionRequest extends Gs2BasicRequest {
    /** @var string Signed in to the account token. */
    private $accountToken;
    /** @var string Project Name */
    private $projectName;
    /** @var string Region Name */
    private $regionName;
    /** @return string|null Signed in to the account token. */
	public function getAccountToken(): ?string {
		return $this->accountToken;
	}
    /** @param string|null $accountToken Signed in to the account token. */
	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}
    /**
     * @param string|null $accountToken Signed in to the account token.
     * @return ActivateRegionRequest
     */
	public function withAccountToken(?string $accountToken): ActivateRegionRequest {
		$this->accountToken = $accountToken;
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
     * @return ActivateRegionRequest
     */
	public function withProjectName(?string $projectName): ActivateRegionRequest {
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
     * @return ActivateRegionRequest
     */
	public function withRegionName(?string $regionName): ActivateRegionRequest {
		$this->regionName = $regionName;
		return $this;
	}

    public static function fromJson(?array $data): ?ActivateRegionRequest {
        if ($data === null) {
            return null;
        }
        return (new ActivateRegionRequest())
            ->withAccountToken(array_key_exists('accountToken', $data) && $data['accountToken'] !== null ? $data['accountToken'] : null)
            ->withProjectName(array_key_exists('projectName', $data) && $data['projectName'] !== null ? $data['projectName'] : null)
            ->withRegionName(array_key_exists('regionName', $data) && $data['regionName'] !== null ? $data['regionName'] : null);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "projectName" => $this->getProjectName(),
            "regionName" => $this->getRegionName(),
        );
    }
}