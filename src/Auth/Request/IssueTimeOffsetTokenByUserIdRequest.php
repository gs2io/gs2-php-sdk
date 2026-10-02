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

/**
 * Request for issueTimeOffsetTokenByUserId: Issue a time offset token usable with the specified user ID
 *
 * @see https://docs.gs2.io/api_reference/auth/sdk/#issuetimeoffsettokenbyuserid
 */
class IssueTimeOffsetTokenByUserIdRequest extends Gs2BasicRequest {
    /** @var string User ID */
    private $userId;
    /** @var int Time offset from the current time (number of seconds relative to the current time) */
    private $timeOffset;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return IssueTimeOffsetTokenByUserIdRequest
     */
	public function withUserId(?string $userId): IssueTimeOffsetTokenByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Time offset from the current time (number of seconds relative to the current time) */
	public function getTimeOffset(): ?int {
		return $this->timeOffset;
	}
    /** @param int|null $timeOffset Time offset from the current time (number of seconds relative to the current time) */
	public function setTimeOffset(?int $timeOffset) {
		$this->timeOffset = $timeOffset;
	}
    /**
     * @param int|null $timeOffset Time offset from the current time (number of seconds relative to the current time)
     * @return IssueTimeOffsetTokenByUserIdRequest
     */
	public function withTimeOffset(?int $timeOffset): IssueTimeOffsetTokenByUserIdRequest {
		$this->timeOffset = $timeOffset;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return IssueTimeOffsetTokenByUserIdRequest
     */
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