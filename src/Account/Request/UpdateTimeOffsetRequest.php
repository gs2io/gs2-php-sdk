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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateTimeOffset: Update the correction value for the current time of the game player's Account
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#updatetimeoffset
 */
class UpdateTimeOffsetRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var int Time offset from the current time (number of seconds relative to the current time) */
    private $timeOffset;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateTimeOffsetRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateTimeOffsetRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
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
     * @return UpdateTimeOffsetRequest
     */
	public function withUserId(?string $userId): UpdateTimeOffsetRequest {
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
     * @return UpdateTimeOffsetRequest
     */
	public function withTimeOffset(?int $timeOffset): UpdateTimeOffsetRequest {
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
     * @return UpdateTimeOffsetRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): UpdateTimeOffsetRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateTimeOffsetRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateTimeOffsetRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateTimeOffsetRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTimeOffset(array_key_exists('timeOffset', $data) && $data['timeOffset'] !== null ? $data['timeOffset'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "timeOffset" => $this->getTimeOffset(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}