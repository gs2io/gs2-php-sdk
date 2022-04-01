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

class AddRankCapByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $experienceName;
    /** @var string */
    private $propertyId;
    /** @var int */
    private $rankCapValue;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): AddRankCapByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): AddRankCapByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getExperienceName(): ?string {
		return $this->experienceName;
	}

	public function setExperienceName(?string $experienceName) {
		$this->experienceName = $experienceName;
	}

	public function withExperienceName(?string $experienceName): AddRankCapByUserIdRequest {
		$this->experienceName = $experienceName;
		return $this;
	}

	public function getPropertyId(): ?string {
		return $this->propertyId;
	}

	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}

	public function withPropertyId(?string $propertyId): AddRankCapByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}

	public function getRankCapValue(): ?int {
		return $this->rankCapValue;
	}

	public function setRankCapValue(?int $rankCapValue) {
		$this->rankCapValue = $rankCapValue;
	}

	public function withRankCapValue(?int $rankCapValue): AddRankCapByUserIdRequest {
		$this->rankCapValue = $rankCapValue;
		return $this;
	}

    public static function fromJson(?array $data): ?AddRankCapByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AddRankCapByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withExperienceName(array_key_exists('experienceName', $data) && $data['experienceName'] !== null ? $data['experienceName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withRankCapValue(array_key_exists('rankCapValue', $data) && $data['rankCapValue'] !== null ? $data['rankCapValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "experienceName" => $this->getExperienceName(),
            "propertyId" => $this->getPropertyId(),
            "rankCapValue" => $this->getRankCapValue(),
        );
    }
}