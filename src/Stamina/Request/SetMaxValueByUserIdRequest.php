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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class SetMaxValueByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $staminaName;
    /** @var string */
    private $userId;
    /** @var int */
    private $maxValue;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): SetMaxValueByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getStaminaName(): ?string {
		return $this->staminaName;
	}

	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}

	public function withStaminaName(?string $staminaName): SetMaxValueByUserIdRequest {
		$this->staminaName = $staminaName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): SetMaxValueByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getMaxValue(): ?int {
		return $this->maxValue;
	}

	public function setMaxValue(?int $maxValue) {
		$this->maxValue = $maxValue;
	}

	public function withMaxValue(?int $maxValue): SetMaxValueByUserIdRequest {
		$this->maxValue = $maxValue;
		return $this;
	}

    public static function fromJson(?array $data): ?SetMaxValueByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetMaxValueByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withStaminaName(empty($data['staminaName']) ? null : $data['staminaName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withMaxValue(empty($data['maxValue']) ? null : $data['maxValue']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "userId" => $this->getUserId(),
            "maxValue" => $this->getMaxValue(),
        );
    }
}