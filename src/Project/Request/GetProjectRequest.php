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

/** Request for getProject: Get Project */
class GetProjectRequest extends Gs2BasicRequest {
    /** @var string Signed in to the account token. */
    private $accountToken;
    /** @var string Project Name */
    private $projectName;
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
     * @return GetProjectRequest
     */
	public function withAccountToken(?string $accountToken): GetProjectRequest {
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
     * @return GetProjectRequest
     */
	public function withProjectName(?string $projectName): GetProjectRequest {
		$this->projectName = $projectName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProjectRequest {
        if ($data === null) {
            return null;
        }
        return (new GetProjectRequest())
            ->withAccountToken(array_key_exists('accountToken', $data) && $data['accountToken'] !== null ? $data['accountToken'] : null)
            ->withProjectName(array_key_exists('projectName', $data) && $data['projectName'] !== null ? $data['projectName'] : null);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "projectName" => $this->getProjectName(),
        );
    }
}