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
 * Request for deletePlatformIdByUserId: Delete External Platform Account ID by specifying GS2-Account user ID
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#deleteplatformidbyuserid
 */
class DeletePlatformIdByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string GS2-Account User ID */
    private $userId;
    /** @var int Slot Number */
    private $type;
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
     * @return DeletePlatformIdByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DeletePlatformIdByUserIdRequest {
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
     * @return DeletePlatformIdByUserIdRequest
     */
	public function withUserId(?string $userId): DeletePlatformIdByUserIdRequest {
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
     * @return DeletePlatformIdByUserIdRequest
     */
	public function withType(?int $type): DeletePlatformIdByUserIdRequest {
		$this->type = $type;
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
     * @return DeletePlatformIdByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DeletePlatformIdByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DeletePlatformIdByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DeletePlatformIdByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DeletePlatformIdByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "type" => $this->getType(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}