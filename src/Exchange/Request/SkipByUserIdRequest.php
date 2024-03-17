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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class SkipByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $awaitName;
    /** @var string */
    private $skipType;
    /** @var int */
    private $minutes;
    /** @var float */
    private $rate;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): SkipByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SkipByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getAwaitName(): ?string {
		return $this->awaitName;
	}
	public function setAwaitName(?string $awaitName) {
		$this->awaitName = $awaitName;
	}
	public function withAwaitName(?string $awaitName): SkipByUserIdRequest {
		$this->awaitName = $awaitName;
		return $this;
	}
	public function getSkipType(): ?string {
		return $this->skipType;
	}
	public function setSkipType(?string $skipType) {
		$this->skipType = $skipType;
	}
	public function withSkipType(?string $skipType): SkipByUserIdRequest {
		$this->skipType = $skipType;
		return $this;
	}
	public function getMinutes(): ?int {
		return $this->minutes;
	}
	public function setMinutes(?int $minutes) {
		$this->minutes = $minutes;
	}
	public function withMinutes(?int $minutes): SkipByUserIdRequest {
		$this->minutes = $minutes;
		return $this;
	}
	public function getRate(): ?float {
		return $this->rate;
	}
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}
	public function withRate(?float $rate): SkipByUserIdRequest {
		$this->rate = $rate;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): SkipByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SkipByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SkipByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SkipByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAwaitName(array_key_exists('awaitName', $data) && $data['awaitName'] !== null ? $data['awaitName'] : null)
            ->withSkipType(array_key_exists('skipType', $data) && $data['skipType'] !== null ? $data['skipType'] : null)
            ->withMinutes(array_key_exists('minutes', $data) && $data['minutes'] !== null ? $data['minutes'] : null)
            ->withRate(array_key_exists('rate', $data) && $data['rate'] !== null ? $data['rate'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "awaitName" => $this->getAwaitName(),
            "skipType" => $this->getSkipType(),
            "minutes" => $this->getMinutes(),
            "rate" => $this->getRate(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}