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
 * Request for verifyGradeUpMaterialByUserId: Verify grade up material by User ID
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#verifygradeupmaterialbyuserid
 */
class VerifyGradeUpMaterialByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Grade Model Name */
    private $gradeName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var string Property ID */
    private $propertyId;
    /** @var string Property ID */
    private $materialPropertyId;
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
     * @return VerifyGradeUpMaterialByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyGradeUpMaterialByUserIdRequest {
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
     * @return VerifyGradeUpMaterialByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyGradeUpMaterialByUserIdRequest {
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
     * @return VerifyGradeUpMaterialByUserIdRequest
     */
	public function withGradeName(?string $gradeName): VerifyGradeUpMaterialByUserIdRequest {
		$this->gradeName = $gradeName;
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
     * @return VerifyGradeUpMaterialByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyGradeUpMaterialByUserIdRequest {
		$this->verifyType = $verifyType;
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
     * @return VerifyGradeUpMaterialByUserIdRequest
     */
	public function withPropertyId(?string $propertyId): VerifyGradeUpMaterialByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return string|null Property ID */
	public function getMaterialPropertyId(): ?string {
		return $this->materialPropertyId;
	}
    /** @param string|null $materialPropertyId Property ID */
	public function setMaterialPropertyId(?string $materialPropertyId) {
		$this->materialPropertyId = $materialPropertyId;
	}
    /**
     * @param string|null $materialPropertyId Property ID
     * @return VerifyGradeUpMaterialByUserIdRequest
     */
	public function withMaterialPropertyId(?string $materialPropertyId): VerifyGradeUpMaterialByUserIdRequest {
		$this->materialPropertyId = $materialPropertyId;
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
     * @return VerifyGradeUpMaterialByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyGradeUpMaterialByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyGradeUpMaterialByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyGradeUpMaterialByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyGradeUpMaterialByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withGradeName(array_key_exists('gradeName', $data) && $data['gradeName'] !== null ? $data['gradeName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withMaterialPropertyId(array_key_exists('materialPropertyId', $data) && $data['materialPropertyId'] !== null ? $data['materialPropertyId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "gradeName" => $this->getGradeName(),
            "verifyType" => $this->getVerifyType(),
            "propertyId" => $this->getPropertyId(),
            "materialPropertyId" => $this->getMaterialPropertyId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}