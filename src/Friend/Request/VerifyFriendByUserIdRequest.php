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
 * Request for verifyFriendByUserId: Verify a friend by User ID
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#verifyfriendbyuserid
 */
class VerifyFriendByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string User ID of the user to verify whether they are a friend */
    private $targetUserId;
    /** @var string Type of verification */
    private $verifyType;
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
     * @return VerifyFriendByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyFriendByUserIdRequest {
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
     * @return VerifyFriendByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyFriendByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null User ID of the user to verify whether they are a friend */
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}
    /** @param string|null $targetUserId User ID of the user to verify whether they are a friend */
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}
    /**
     * @param string|null $targetUserId User ID of the user to verify whether they are a friend
     * @return VerifyFriendByUserIdRequest
     */
	public function withTargetUserId(?string $targetUserId): VerifyFriendByUserIdRequest {
		$this->targetUserId = $targetUserId;
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
     * @return VerifyFriendByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyFriendByUserIdRequest {
		$this->verifyType = $verifyType;
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
     * @return VerifyFriendByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyFriendByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyFriendByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyFriendByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyFriendByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetUserId(array_key_exists('targetUserId', $data) && $data['targetUserId'] !== null ? $data['targetUserId'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "targetUserId" => $this->getTargetUserId(),
            "verifyType" => $this->getVerifyType(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}