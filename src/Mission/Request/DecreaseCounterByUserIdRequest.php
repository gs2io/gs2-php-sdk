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

/**
 * Request for decreaseCounterByUserId: Decrease counter by User ID
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#decreasecounterbyuserid
 */
class DecreaseCounterByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Counter Model name */
    private $counterName;
    /** @var string User ID */
    private $userId;
    /** @var int Value to be subtracted */
    private $value;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return DecreaseCounterByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DecreaseCounterByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Counter Model name */
	public function getCounterName(): ?string {
		return $this->counterName;
	}
    /** @param string|null $counterName Counter Model name */
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
    /**
     * @param string|null $counterName Counter Model name
     * @return DecreaseCounterByUserIdRequest
     */
	public function withCounterName(?string $counterName): DecreaseCounterByUserIdRequest {
		$this->counterName = $counterName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return DecreaseCounterByUserIdRequest
     */
	public function withUserId(?string $userId): DecreaseCounterByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Value to be subtracted */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Value to be subtracted */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Value to be subtracted
     * @return DecreaseCounterByUserIdRequest
     */
	public function withValue(?int $value): DecreaseCounterByUserIdRequest {
		$this->value = $value;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return DecreaseCounterByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DecreaseCounterByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DecreaseCounterByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DecreaseCounterByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DecreaseCounterByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "counterName" => $this->getCounterName(),
            "userId" => $this->getUserId(),
            "value" => $this->getValue(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}