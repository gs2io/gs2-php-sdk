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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class IncreaseCounterByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $counterName;
    /** @var string */
    private $userId;
    /** @var int */
    private $value;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): IncreaseCounterByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getCounterName(): ?string {
		return $this->counterName;
	}

	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}

	public function withCounterName(?string $counterName): IncreaseCounterByUserIdRequest {
		$this->counterName = $counterName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): IncreaseCounterByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getValue(): ?int {
		return $this->value;
	}

	public function setValue(?int $value) {
		$this->value = $value;
	}

	public function withValue(?int $value): IncreaseCounterByUserIdRequest {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?IncreaseCounterByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new IncreaseCounterByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withCounterName(empty($data['counterName']) ? null : $data['counterName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withValue(empty($data['value']) && $data['value'] !== 0 ? null : $data['value']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "counterName" => $this->getCounterName(),
            "userId" => $this->getUserId(),
            "value" => $this->getValue(),
        );
    }
}