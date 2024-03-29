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

class CountUpRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $limitName;
    /** @var string */
    private $counterName;
    /** @var string */
    private $accessToken;
    /** @var int */
    private $countUpValue;
    /** @var int */
    private $maxValue;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CountUpRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getLimitName(): ?string {
		return $this->limitName;
	}
	public function setLimitName(?string $limitName) {
		$this->limitName = $limitName;
	}
	public function withLimitName(?string $limitName): CountUpRequest {
		$this->limitName = $limitName;
		return $this;
	}
	public function getCounterName(): ?string {
		return $this->counterName;
	}
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
	public function withCounterName(?string $counterName): CountUpRequest {
		$this->counterName = $counterName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): CountUpRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getCountUpValue(): ?int {
		return $this->countUpValue;
	}
	public function setCountUpValue(?int $countUpValue) {
		$this->countUpValue = $countUpValue;
	}
	public function withCountUpValue(?int $countUpValue): CountUpRequest {
		$this->countUpValue = $countUpValue;
		return $this;
	}
	public function getMaxValue(): ?int {
		return $this->maxValue;
	}
	public function setMaxValue(?int $maxValue) {
		$this->maxValue = $maxValue;
	}
	public function withMaxValue(?int $maxValue): CountUpRequest {
		$this->maxValue = $maxValue;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CountUpRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CountUpRequest {
        if ($data === null) {
            return null;
        }
        return (new CountUpRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withLimitName(array_key_exists('limitName', $data) && $data['limitName'] !== null ? $data['limitName'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withCountUpValue(array_key_exists('countUpValue', $data) && $data['countUpValue'] !== null ? $data['countUpValue'] : null)
            ->withMaxValue(array_key_exists('maxValue', $data) && $data['maxValue'] !== null ? $data['maxValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "limitName" => $this->getLimitName(),
            "counterName" => $this->getCounterName(),
            "accessToken" => $this->getAccessToken(),
            "countUpValue" => $this->getCountUpValue(),
            "maxValue" => $this->getMaxValue(),
        );
    }
}