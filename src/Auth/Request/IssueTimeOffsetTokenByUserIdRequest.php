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

class IssueTimeOffsetTokenByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $userId;
    /** @var int */
    private $timeOffset;
    /** @var string */
    private $timeOffsetToken;
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): IssueTimeOffsetTokenByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getTimeOffset(): ?int {
		return $this->timeOffset;
	}
	public function setTimeOffset(?int $timeOffset) {
		$this->timeOffset = $timeOffset;
	}
	public function withTimeOffset(?int $timeOffset): IssueTimeOffsetTokenByUserIdRequest {
		$this->timeOffset = $timeOffset;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): IssueTimeOffsetTokenByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?IssueTimeOffsetTokenByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new IssueTimeOffsetTokenByUserIdRequest())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTimeOffset(array_key_exists('timeOffset', $data) && $data['timeOffset'] !== null ? $data['timeOffset'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "timeOffset" => $this->getTimeOffset(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}