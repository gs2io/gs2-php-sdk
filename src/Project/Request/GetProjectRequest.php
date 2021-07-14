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

class GetProjectRequest extends Gs2BasicRequest {
    /** @var string */
    private $accountToken;
    /** @var string */
    private $projectName;

	public function getAccountToken(): ?string {
		return $this->accountToken;
	}

	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}

	public function withAccountToken(?string $accountToken): GetProjectRequest {
		$this->accountToken = $accountToken;
		return $this;
	}

	public function getProjectName(): ?string {
		return $this->projectName;
	}

	public function setProjectName(?string $projectName) {
		$this->projectName = $projectName;
	}

	public function withProjectName(?string $projectName): GetProjectRequest {
		$this->projectName = $projectName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProjectRequest {
        if ($data === null) {
            return null;
        }
        return (new GetProjectRequest())
            ->withAccountToken(empty($data['accountToken']) ? null : $data['accountToken'])
            ->withProjectName(empty($data['projectName']) ? null : $data['projectName']);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "projectName" => $this->getProjectName(),
        );
    }
}