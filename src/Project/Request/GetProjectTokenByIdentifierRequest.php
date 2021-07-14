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

class GetProjectTokenByIdentifierRequest extends Gs2BasicRequest {
    /** @var string */
    private $accountName;
    /** @var string */
    private $projectName;
    /** @var string */
    private $userName;
    /** @var string */
    private $password;

	public function getAccountName(): ?string {
		return $this->accountName;
	}

	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}

	public function withAccountName(?string $accountName): GetProjectTokenByIdentifierRequest {
		$this->accountName = $accountName;
		return $this;
	}

	public function getProjectName(): ?string {
		return $this->projectName;
	}

	public function setProjectName(?string $projectName) {
		$this->projectName = $projectName;
	}

	public function withProjectName(?string $projectName): GetProjectTokenByIdentifierRequest {
		$this->projectName = $projectName;
		return $this;
	}

	public function getUserName(): ?string {
		return $this->userName;
	}

	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}

	public function withUserName(?string $userName): GetProjectTokenByIdentifierRequest {
		$this->userName = $userName;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): GetProjectTokenByIdentifierRequest {
		$this->password = $password;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProjectTokenByIdentifierRequest {
        if ($data === null) {
            return null;
        }
        return (new GetProjectTokenByIdentifierRequest())
            ->withAccountName(empty($data['accountName']) ? null : $data['accountName'])
            ->withProjectName(empty($data['projectName']) ? null : $data['projectName'])
            ->withUserName(empty($data['userName']) ? null : $data['userName'])
            ->withPassword(empty($data['password']) ? null : $data['password']);
    }

    public function toJson(): array {
        return array(
            "accountName" => $this->getAccountName(),
            "projectName" => $this->getProjectName(),
            "userName" => $this->getUserName(),
            "password" => $this->getPassword(),
        );
    }
}