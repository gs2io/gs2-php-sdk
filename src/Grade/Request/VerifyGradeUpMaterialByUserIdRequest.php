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

class VerifyGradeUpMaterialByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $gradeName;
    /** @var string */
    private $verifyType;
    /** @var string */
    private $propertyId;
    /** @var string */
    private $materialPropertyId;
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
	public function withNamespaceName(?string $namespaceName): VerifyGradeUpMaterialByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): VerifyGradeUpMaterialByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
	public function withGradeName(?string $gradeName): VerifyGradeUpMaterialByUserIdRequest {
		$this->gradeName = $gradeName;
		return $this;
	}
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
	public function withVerifyType(?string $verifyType): VerifyGradeUpMaterialByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): VerifyGradeUpMaterialByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getMaterialPropertyId(): ?string {
		return $this->materialPropertyId;
	}
	public function setMaterialPropertyId(?string $materialPropertyId) {
		$this->materialPropertyId = $materialPropertyId;
	}
	public function withMaterialPropertyId(?string $materialPropertyId): VerifyGradeUpMaterialByUserIdRequest {
		$this->materialPropertyId = $materialPropertyId;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
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