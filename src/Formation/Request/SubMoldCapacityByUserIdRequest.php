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

class SubMoldCapacityByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $moldModelName;
    /** @var int */
    private $capacity;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): SubMoldCapacityByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SubMoldCapacityByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getMoldModelName(): ?string {
		return $this->moldModelName;
	}
	public function setMoldModelName(?string $moldModelName) {
		$this->moldModelName = $moldModelName;
	}
	public function withMoldModelName(?string $moldModelName): SubMoldCapacityByUserIdRequest {
		$this->moldModelName = $moldModelName;
		return $this;
	}
	public function getCapacity(): ?int {
		return $this->capacity;
	}
	public function setCapacity(?int $capacity) {
		$this->capacity = $capacity;
	}
	public function withCapacity(?int $capacity): SubMoldCapacityByUserIdRequest {
		$this->capacity = $capacity;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): SubMoldCapacityByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SubMoldCapacityByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SubMoldCapacityByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SubMoldCapacityByUserIdRequest())
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