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

namespace Gs2\Auth\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class LoginRequest extends Gs2BasicRequest {
    /** @var string */
    private $userId;
    /** @var int */
    private $timeOffset;

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): LoginRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getTimeOffset(): ?int {
		return $this->timeOffset;
	}

	public function setTimeOffset(?int $timeOffset) {
		$this->timeOffset = $timeOffset;
	}

	public function withTimeOffset(?int $timeOffset): LoginRequest {
		$this->timeOffset = $timeOffset;
		return $this;
	}

    public static function fromJson(?array $data): ?LoginRequest {
        if ($data === null) {
            return null;
        }
        return (new LoginRequest())
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withTimeOffset(empty($data['timeOffset']) && $data['timeOffset'] !== 0 ? null : $data['timeOffset']);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "timeOffset" => $this->getTimeOffset(),
        );
    }
}