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

namespace Gs2\Grade\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for setGradeByUserId: Set cumulative grade gained
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#setgradebyuserid
 */
class SetGradeByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Grade Model Name */
    private $gradeName;
    /** @var string Property ID */
    private $propertyId;
    /** @var int Current Grade */
    private $gradeValue;
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
     * @return SetGradeByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SetGradeByUserIdRequest {
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
     * @return SetGradeByUserIdRequest
     */
	public function withUserId(?string $userId): SetGradeByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Grade Model Name */
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
    /** @param string|null $gradeName Grade Model Name */
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
    /**
     * @param string|null $gradeName Grade Model Name
     * @return SetGradeByUserIdRequest
     */
	public function withGradeName(?string $gradeName): SetGradeByUserIdRequest {
		$this->gradeName = $gradeName;
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
     * @return SetGradeByUserIdRequest
     */
	public function withPropertyId(?string $propertyId): SetGradeByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return int|null Current Grade */
	public function getGradeValue(): ?int {
		return $this->gradeValue;
	}
    /** @param int|null $gradeValue Current Grade */
	public function setGradeValue(?int $gradeValue) {
		$this->gradeValue = $gradeValue;
	}
    /**
     * @param int|null $gradeValue Current Grade
     * @return SetGradeByUserIdRequest
     */
	public function withGradeValue(?int $gradeValue): SetGradeByUserIdRequest {
		$this->gradeValue = $gradeValue;
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
     * @return SetGradeByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SetGradeByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetGradeByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetGradeByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetGradeByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withGradeName(array_key_exists('gradeName', $data) && $data['gradeName'] !== null ? $data['gradeName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withGradeValue(array_key_exists('gradeValue', $data) && $data['gradeValue'] !== null ? $data['gradeValue'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "gradeName" => $this->getGradeName(),
            "propertyId" => $this->getPropertyId(),
            "gradeValue" => $this->getGradeValue(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}