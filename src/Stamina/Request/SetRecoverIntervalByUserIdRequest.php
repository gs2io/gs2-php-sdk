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

class SetRecoverIntervalByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $staminaName;
    /** @var string */
    private $userId;
    /** @var int */
    private $recoverIntervalMinutes;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): SetRecoverIntervalByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getStaminaName(): ?string {
		return $this->staminaName;
	}

	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}

	public function withStaminaName(?string $staminaName): SetRecoverIntervalByUserIdRequest {
		$this->staminaName = $staminaName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): SetRecoverIntervalByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}

	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}

	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): SetRecoverIntervalByUserIdRequest {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}

    public static function fromJson(?array $data): ?SetRecoverIntervalByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetRecoverIntervalByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withStaminaName(empty($data['staminaName']) ? null : $data['staminaName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withRecoverIntervalMinutes(empty($data['recoverIntervalMinutes']) ? null : $data['recoverIntervalMinutes']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "userId" => $this->getUserId(),
            "recoverIntervalMinutes" => $this->getRecoverIntervalMinutes(),
        );
    }
}