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

namespace Gs2\Limit\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class CountUpByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $limitName;
    /** @var string */
    private $counterName;
    /** @var string */
    private $userId;
    /** @var int */
    private $countUpValue;
    /** @var int */
    private $maxValue;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CountUpByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getLimitName(): ?string {
		return $this->limitName;
	}

	public function setLimitName(?string $limitName) {
		$this->limitName = $limitName;
	}

	public function withLimitName(?string $limitName): CountUpByUserIdRequest {
		$this->limitName = $limitName;
		return $this;
	}

	public function getCounterName(): ?string {
		return $this->counterName;
	}

	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}

	public function withCounterName(?string $counterName): CountUpByUserIdRequest {
		$this->counterName = $counterName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): CountUpByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getCountUpValue(): ?int {
		return $this->countUpValue;
	}

	public function setCountUpValue(?int $countUpValue) {
		$this->countUpValue = $countUpValue;
	}

	public function withCountUpValue(?int $countUpValue): CountUpByUserIdRequest {
		$this->countUpValue = $countUpValue;
		return $this;
	}

	public function getMaxValue(): ?int {
		return $this->maxValue;
	}

	public function setMaxValue(?int $maxValue) {
		$this->maxValue = $maxValue;
	}

	public function withMaxValue(?int $maxValue): CountUpByUserIdRequest {
		$this->maxValue = $maxValue;
		return $this;
	}

    public static function fromJson(?array $data): ?CountUpByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CountUpByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withLimitName(empty($data['limitName']) ? null : $data['limitName'])
            ->withCounterName(empty($data['counterName']) ? null : $data['counterName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withCountUpValue(empty($data['countUpValue']) ? null : $data['countUpValue'])
            ->withMaxValue(empty($data['maxValue']) ? null : $data['maxValue']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "limitName" => $this->getLimitName(),
            "counterName" => $this->getCounterName(),
            "userId" => $this->getUserId(),
            "countUpValue" => $this->getCountUpValue(),
            "maxValue" => $this->getMaxValue(),
        );
    }
}