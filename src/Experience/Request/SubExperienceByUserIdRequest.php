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

class SubExperienceByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $experienceName;
    /** @var string */
    private $propertyId;
    /** @var int */
    private $experienceValue;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): SubExperienceByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SubExperienceByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getExperienceName(): ?string {
		return $this->experienceName;
	}
	public function setExperienceName(?string $experienceName) {
		$this->experienceName = $experienceName;
	}
	public function withExperienceName(?string $experienceName): SubExperienceByUserIdRequest {
		$this->experienceName = $experienceName;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): SubExperienceByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getExperienceValue(): ?int {
		return $this->experienceValue;
	}
	public function setExperienceValue(?int $experienceValue) {
		$this->experienceValue = $experienceValue;
	}
	public function withExperienceValue(?int $experienceValue): SubExperienceByUserIdRequest {
		$this->experienceValue = $experienceValue;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SubExperienceByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SubExperienceByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SubExperienceByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withExperienceName(array_key_exists('experienceName', $data) && $data['experienceName'] !== null ? $data['experienceName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withExperienceValue(array_key_exists('experienceValue', $data) && $data['experienceValue'] !== null ? $data['experienceValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "experienceName" => $this->getExperienceName(),
            "propertyId" => $this->getPropertyId(),
            "experienceValue" => $this->getExperienceValue(),
        );
    }
}