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

namespace Gs2\Friend\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyFriendCountByUserId: Verify the number of friends by User ID
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#verifyfriendcountbyuserid
 */
class VerifyFriendCountByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Value to compare with the number of friends */
    private $count;
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
     * @return VerifyFriendCountByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyFriendCountByUserIdRequest {
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
     * @return VerifyFriendCountByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyFriendCountByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyFriendCountByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyFriendCountByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Value to compare with the number of friends */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Value to compare with the number of friends */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Value to compare with the number of friends
     * @return VerifyFriendCountByUserIdRequest
     */
	public function withCount(?int $count): VerifyFriendCountByUserIdRequest {
		$this->count = $count;
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
     * @return VerifyFriendCountByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyFriendCountByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyFriendCountByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyFriendCountByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyFriendCountByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "verifyType" => $this->getVerifyType(),
            "count" => $this->getCount(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}