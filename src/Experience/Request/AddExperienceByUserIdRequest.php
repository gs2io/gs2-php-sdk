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

class AddExperienceByUserIdRequest extends Gs2BasicRequest {
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

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): AddExperienceByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): AddExperienceByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getExperienceName(): ?string {
		return $this->experienceName;
	}

	public function setExperienceName(?string $experienceName) {
		$this->experienceName = $experienceName;
	}

	public function withExperienceName(?string $experienceName): AddExperienceByUserIdRequest {
		$this->experienceName = $experienceName;
		return $this;
	}

	public function getPropertyId(): ?string {
		return $this->propertyId;
	}

	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}

	public function withPropertyId(?string $propertyId): AddExperienceByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}

	public function getExperienceValue(): ?int {
		return $this->experienceValue;
	}

	public function setExperienceValue(?int $experienceValue) {
		$this->experienceValue = $experienceValue;
	}

	public function withExperienceValue(?int $experienceValue): AddExperienceByUserIdRequest {
		$this->experienceValue = $experienceValue;
		return $this;
	}

    public static function fromJson(?array $data): ?AddExperienceByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AddExperienceByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withExperienceName(empty($data['experienceName']) ? null : $data['experienceName'])
            ->withPropertyId(empty($data['propertyId']) ? null : $data['propertyId'])
            ->withExperienceValue(empty($data['experienceValue']) ? null : $data['experienceValue']);
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