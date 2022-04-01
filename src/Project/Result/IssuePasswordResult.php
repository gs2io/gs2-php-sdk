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

namespace Gs2\Project\Result;

use Gs2\Core\Model\IResult;

class IssuePasswordResult implements IResult {
    /** @var string */
    private $newPassword;

	public function getNewPassword(): ?string {
		return $this->newPassword;
	}

	public function setNewPassword(?string $newPassword) {
		$this->newPassword = $newPassword;
	}

	public function withNewPassword(?string $newPassword): IssuePasswordResult {
		$this->newPassword = $newPassword;
		return $this;
	}

    public static function fromJson(?array $data): ?IssuePasswordResult {
        if ($data === null) {
            return null;
        }
        return (new IssuePasswordResult())
            ->withNewPassword(array_key_exists('newPassword', $data) && $data['newPassword'] !== null ? $data['newPassword'] : null);
    }

    public function toJson(): array {
        return array(
            "newPassword" => $this->getNewPassword(),
        );
    }
}