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

class UpdateStaminaByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $staminaName;
    /** @var string */
    private $userId;
    /** @var int */
    private $value;
    /** @var int */
    private $maxValue;
    /** @var int */
    private $recoverIntervalMinutes;
    /** @var int */
    private $recoverValue;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateStaminaByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getStaminaName(): ?string {
		return $this->staminaName;
	}

	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}

	public function withStaminaName(?string $staminaName): UpdateStaminaByUserIdRequest {
		$this->staminaName = $staminaName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): UpdateStaminaByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getValue(): ?int {
		return $this->value;
	}

	public function setValue(?int $value) {
		$this->value = $value;
	}

	public function withValue(?int $value): UpdateStaminaByUserIdRequest {
		$this->value = $value;
		return $this;
	}

	public function getMaxValue(): ?int {
		return $this->maxValue;
	}

	public function setMaxValue(?int $maxValue) {
		$this->maxValue = $maxValue;
	}

	public function withMaxValue(?int $maxValue): UpdateStaminaByUserIdRequest {
		$this->maxValue = $maxValue;
		return $this;
	}

	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}

	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}

	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): UpdateStaminaByUserIdRequest {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}

	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}

	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}

	public function withRecoverValue(?int $recoverValue): UpdateStaminaByUserIdRequest {
		$this->recoverValue = $recoverValue;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateStaminaByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateStaminaByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withStaminaName(empty($data['staminaName']) ? null : $data['staminaName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withValue(empty($data['value']) && $data['value'] !== 0 ? null : $data['value'])
            ->withMaxValue(empty($data['maxValue']) && $data['maxValue'] !== 0 ? null : $data['maxValue'])
            ->withRecoverIntervalMinutes(empty($data['recoverIntervalMinutes']) && $data['recoverIntervalMinutes'] !== 0 ? null : $data['recoverIntervalMinutes'])
            ->withRecoverValue(empty($data['recoverValue']) && $data['recoverValue'] !== 0 ? null : $data['recoverValue']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "userId" => $this->getUserId(),
            "value" => $this->getValue(),
            "maxValue" => $this->getMaxValue(),
            "recoverIntervalMinutes" => $this->getRecoverIntervalMinutes(),
            "recoverValue" => $this->getRecoverValue(),
        );
    }
}