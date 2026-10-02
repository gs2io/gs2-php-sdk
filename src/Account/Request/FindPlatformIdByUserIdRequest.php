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
 * Request for findPlatformIdByUserId: Get External Platform Account ID by specifying GS2-Account user ID
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#findplatformidbyuserid
 */
class FindPlatformIdByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string GS2-Account User ID */
    private $userId;
    /** @var int Slot Number */
    private $type;
    /** @var string External Platform User ID */
    private $userIdentifier;
    /** @var bool Disable Data Owner ID resolution when different User IDs are used for login and data retention */
    private $dontResolveDataOwner;
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
     * @return FindPlatformIdByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): FindPlatformIdByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null GS2-Account User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId GS2-Account User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId GS2-Account User ID
     * @return FindPlatformIdByUserIdRequest
     */
	public function withUserId(?string $userId): FindPlatformIdByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getType(): ?int {
		return $this->type;
	}
    /** @param int|null $type Slot Number */
	public function setType(?int $type) {
		$this->type = $type;
	}
    /**
     * @param int|null $type Slot Number
     * @return FindPlatformIdByUserIdRequest
     */
	public function withType(?int $type): FindPlatformIdByUserIdRequest {
		$this->type = $type;
		return $this;
	}
    /** @return string|null External Platform User ID */
	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}
    /** @param string|null $userIdentifier External Platform User ID */
	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}
    /**
     * @param string|null $userIdentifier External Platform User ID
     * @return FindPlatformIdByUserIdRequest
     */
	public function withUserIdentifier(?string $userIdentifier): FindPlatformIdByUserIdRequest {
		$this->userIdentifier = $userIdentifier;
		return $this;
	}
    /** @return bool|null Disable Data Owner ID resolution when different User IDs are used for login and data retention */
	public function getDontResolveDataOwner(): ?bool {
		return $this->dontResolveDataOwner;
	}
    /** @param bool|null $dontResolveDataOwner Disable Data Owner ID resolution when different User IDs are used for login and data retention */
	public function setDontResolveDataOwner(?bool $dontResolveDataOwner) {
		$this->dontResolveDataOwner = $dontResolveDataOwner;
	}
    /**
     * @param bool|null $dontResolveDataOwner Disable Data Owner ID resolution when different User IDs are used for login and data retention
     * @return FindPlatformIdByUserIdRequest
     */
	public function withDontResolveDataOwner(?bool $dontResolveDataOwner): FindPlatformIdByUserIdRequest {
		$this->dontResolveDataOwner = $dontResolveDataOwner;
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
     * @return FindPlatformIdByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): FindPlatformIdByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?FindPlatformIdByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new FindPlatformIdByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withUserIdentifier(array_key_exists('userIdentifier', $data) && $data['userIdentifier'] !== null ? $data['userIdentifier'] : null)
            ->withDontResolveDataOwner(array_key_exists('dontResolveDataOwner', $data) ? $data['dontResolveDataOwner'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "type" => $this->getType(),
            "userIdentifier" => $this->getUserIdentifier(),
            "dontResolveDataOwner" => $this->getDontResolveDataOwner(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}