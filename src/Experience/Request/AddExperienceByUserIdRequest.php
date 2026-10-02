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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for addExperienceByUserId: Add experience by User ID
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#addexperiencebyuserid
 */
class AddExperienceByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Experience Model name */
    private $experienceName;
    /** @var string Property ID */
    private $propertyId;
    /** @var int Gained Experience */
    private $experienceValue;
    /** @var bool Whether to truncate the remaining experience when ranking up */
    private $truncateExperienceWhenRankUp;
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
     * @return AddExperienceByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): AddExperienceByUserIdRequest {
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
     * @return AddExperienceByUserIdRequest
     */
	public function withUserId(?string $userId): AddExperienceByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Experience Model name */
	public function getExperienceName(): ?string {
		return $this->experienceName;
	}
    /** @param string|null $experienceName Experience Model name */
	public function setExperienceName(?string $experienceName) {
		$this->experienceName = $experienceName;
	}
    /**
     * @param string|null $experienceName Experience Model name
     * @return AddExperienceByUserIdRequest
     */
	public function withExperienceName(?string $experienceName): AddExperienceByUserIdRequest {
		$this->experienceName = $experienceName;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return AddExperienceByUserIdRequest
     */
	public function withPropertyId(?string $propertyId): AddExperienceByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return int|null Gained Experience */
	public function getExperienceValue(): ?int {
		return $this->experienceValue;
	}
    /** @param int|null $experienceValue Gained Experience */
	public function setExperienceValue(?int $experienceValue) {
		$this->experienceValue = $experienceValue;
	}
    /**
     * @param int|null $experienceValue Gained Experience
     * @return AddExperienceByUserIdRequest
     */
	public function withExperienceValue(?int $experienceValue): AddExperienceByUserIdRequest {
		$this->experienceValue = $experienceValue;
		return $this;
	}
    /** @return bool|null Whether to truncate the remaining experience when ranking up */
	public function getTruncateExperienceWhenRankUp(): ?bool {
		return $this->truncateExperienceWhenRankUp;
	}
    /** @param bool|null $truncateExperienceWhenRankUp Whether to truncate the remaining experience when ranking up */
	public function setTruncateExperienceWhenRankUp(?bool $truncateExperienceWhenRankUp) {
		$this->truncateExperienceWhenRankUp = $truncateExperienceWhenRankUp;
	}
    /**
     * @param bool|null $truncateExperienceWhenRankUp Whether to truncate the remaining experience when ranking up
     * @return AddExperienceByUserIdRequest
     */
	public function withTruncateExperienceWhenRankUp(?bool $truncateExperienceWhenRankUp): AddExperienceByUserIdRequest {
		$this->truncateExperienceWhenRankUp = $truncateExperienceWhenRankUp;
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
     * @return AddExperienceByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AddExperienceByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AddExperienceByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AddExperienceByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AddExperienceByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withExperienceName(array_key_exists('experienceName', $data) && $data['experienceName'] !== null ? $data['experienceName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withExperienceValue(array_key_exists('experienceValue', $data) && $data['experienceValue'] !== null ? $data['experienceValue'] : null)
            ->withTruncateExperienceWhenRankUp(array_key_exists('truncateExperienceWhenRankUp', $data) ? $data['truncateExperienceWhenRankUp'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "experienceName" => $this->getExperienceName(),
            "propertyId" => $this->getPropertyId(),
            "experienceValue" => $this->getExperienceValue(),
            "truncateExperienceWhenRankUp" => $this->getTruncateExperienceWhenRankUp(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}