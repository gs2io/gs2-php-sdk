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
 * Request for getFriendByUserId: Get a friend by User ID
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#getfriendbyuserid
 */
class GetFriendByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string User ID */
    private $targetUserId;
    /** @var bool Whether to include profile information in the result */
    private $withProfile;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetFriendByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetFriendByUserIdRequest {
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
     * @return GetFriendByUserIdRequest
     */
	public function withUserId(?string $userId): GetFriendByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null User ID */
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}
    /** @param string|null $targetUserId User ID */
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}
    /**
     * @param string|null $targetUserId User ID
     * @return GetFriendByUserIdRequest
     */
	public function withTargetUserId(?string $targetUserId): GetFriendByUserIdRequest {
		$this->targetUserId = $targetUserId;
		return $this;
	}
    /** @return bool|null Whether to include profile information in the result */
	public function getWithProfile(): ?bool {
		return $this->withProfile;
	}
    /** @param bool|null $withProfile Whether to include profile information in the result */
	public function setWithProfile(?bool $withProfile) {
		$this->withProfile = $withProfile;
	}
    /**
     * @param bool|null $withProfile Whether to include profile information in the result
     * @return GetFriendByUserIdRequest
     */
	public function withWithProfile(?bool $withProfile): GetFriendByUserIdRequest {
		$this->withProfile = $withProfile;
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
     * @return GetFriendByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetFriendByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetFriendByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetFriendByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetUserId(array_key_exists('targetUserId', $data) && $data['targetUserId'] !== null ? $data['targetUserId'] : null)
            ->withWithProfile(array_key_exists('withProfile', $data) ? $data['withProfile'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "targetUserId" => $this->getTargetUserId(),
            "withProfile" => $this->getWithProfile(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}