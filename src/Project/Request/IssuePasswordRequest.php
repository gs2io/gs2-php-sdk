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

class IssuePasswordRequest extends Gs2BasicRequest {
    /** @var string */
    private $issuePasswordToken;

	public function getIssuePasswordToken(): ?string {
		return $this->issuePasswordToken;
	}

	public function setIssuePasswordToken(?string $issuePasswordToken) {
		$this->issuePasswordToken = $issuePasswordToken;
	}

	public function withIssuePasswordToken(?string $issuePasswordToken): IssuePasswordRequest {
		$this->issuePasswordToken = $issuePasswordToken;
		return $this;
	}

    public static function fromJson(?array $data): ?IssuePasswordRequest {
        if ($data === null) {
            return null;
        }
        return (new IssuePasswordRequest())
            ->withIssuePasswordToken(empty($data['issuePasswordToken']) ? null : $data['issuePasswordToken']);
    }

    public function toJson(): array {
        return array(
            "issuePasswordToken" => $this->getIssuePasswordToken(),
        );
    }
}