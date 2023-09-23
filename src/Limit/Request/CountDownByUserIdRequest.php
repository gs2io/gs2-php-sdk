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

class CountDownByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $limitName;
    /** @var string */
    private $counterName;
    /** @var string */
    private $userId;
    /** @var int */
    private $countDownValue;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CountDownByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getLimitName(): ?string {
		return $this->limitName;
	}
	public function setLimitName(?string $limitName) {
		$this->limitName = $limitName;
	}
	public function withLimitName(?string $limitName): CountDownByUserIdRequest {
		$this->limitName = $limitName;
		return $this;
	}
	public function getCounterName(): ?string {
		return $this->counterName;
	}
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
	public function withCounterName(?string $counterName): CountDownByUserIdRequest {
		$this->counterName = $counterName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): CountDownByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getCountDownValue(): ?int {
		return $this->countDownValue;
	}
	public function setCountDownValue(?int $countDownValue) {
		$this->countDownValue = $countDownValue;
	}
	public function withCountDownValue(?int $countDownValue): CountDownByUserIdRequest {
		$this->countDownValue = $countDownValue;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CountDownByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CountDownByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CountDownByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withLimitName(array_key_exists('limitName', $data) && $data['limitName'] !== null ? $data['limitName'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCountDownValue(array_key_exists('countDownValue', $data) && $data['countDownValue'] !== null ? $data['countDownValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "limitName" => $this->getLimitName(),
            "counterName" => $this->getCounterName(),
            "userId" => $this->getUserId(),
            "countDownValue" => $this->getCountDownValue(),
        );
    }
}