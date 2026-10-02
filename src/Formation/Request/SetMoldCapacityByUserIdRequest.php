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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for setMoldCapacityByUserId: Set capacity size with specified user ID
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#setmoldcapacitybyuserid
 */
class SetMoldCapacityByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Form Storage Area Model name */
    private $moldModelName;
    /** @var int Current Capacity */
    private $capacity;
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
     * @return SetMoldCapacityByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SetMoldCapacityByUserIdRequest {
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
     * @return SetMoldCapacityByUserIdRequest
     */
	public function withUserId(?string $userId): SetMoldCapacityByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Form Storage Area Model name */
	public function getMoldModelName(): ?string {
		return $this->moldModelName;
	}
    /** @param string|null $moldModelName Form Storage Area Model name */
	public function setMoldModelName(?string $moldModelName) {
		$this->moldModelName = $moldModelName;
	}
    /**
     * @param string|null $moldModelName Form Storage Area Model name
     * @return SetMoldCapacityByUserIdRequest
     */
	public function withMoldModelName(?string $moldModelName): SetMoldCapacityByUserIdRequest {
		$this->moldModelName = $moldModelName;
		return $this;
	}
    /** @return int|null Current Capacity */
	public function getCapacity(): ?int {
		return $this->capacity;
	}
    /** @param int|null $capacity Current Capacity */
	public function setCapacity(?int $capacity) {
		$this->capacity = $capacity;
	}
    /**
     * @param int|null $capacity Current Capacity
     * @return SetMoldCapacityByUserIdRequest
     */
	public function withCapacity(?int $capacity): SetMoldCapacityByUserIdRequest {
		$this->capacity = $capacity;
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
     * @return SetMoldCapacityByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SetMoldCapacityByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetMoldCapacityByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetMoldCapacityByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetMoldCapacityByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMoldModelName(array_key_exists('moldModelName', $data) && $data['moldModelName'] !== null ? $data['moldModelName'] : null)
            ->withCapacity(array_key_exists('capacity', $data) && $data['capacity'] !== null ? $data['capacity'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "moldModelName" => $this->getMoldModelName(),
            "capacity" => $this->getCapacity(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}