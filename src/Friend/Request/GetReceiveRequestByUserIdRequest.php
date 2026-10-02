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
 * Request for getReceiveRequestByUserId: Get a received friend request by User ID
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#getreceiverequestbyuserid
 */
class GetReceiveRequestByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string User ID */
    private $fromUserId;
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
     * @return GetReceiveRequestByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetReceiveRequestByUserIdRequest {
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
     * @return GetReceiveRequestByUserIdRequest
     */
	public function withUserId(?string $userId): GetReceiveRequestByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null User ID */
	public function getFromUserId(): ?string {
		return $this->fromUserId;
	}
    /** @param string|null $fromUserId User ID */
	public function setFromUserId(?string $fromUserId) {
		$this->fromUserId = $fromUserId;
	}
    /**
     * @param string|null $fromUserId User ID
     * @return GetReceiveRequestByUserIdRequest
     */
	public function withFromUserId(?string $fromUserId): GetReceiveRequestByUserIdRequest {
		$this->fromUserId = $fromUserId;
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
     * @return GetReceiveRequestByUserIdRequest
     */
	public function withWithProfile(?bool $withProfile): GetReceiveRequestByUserIdRequest {
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
     * @return GetReceiveRequestByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetReceiveRequestByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetReceiveRequestByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetReceiveRequestByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withFromUserId(array_key_exists('fromUserId', $data) && $data['fromUserId'] !== null ? $data['fromUserId'] : null)
            ->withWithProfile(array_key_exists('withProfile', $data) ? $data['withProfile'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "fromUserId" => $this->getFromUserId(),
            "withProfile" => $this->getWithProfile(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}