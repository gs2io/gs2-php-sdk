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

/**
 * Request for skipByUserId: Skip Exchange Await by User ID
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#skipbyuserid
 */
class SkipByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Exchange Await name */
    private $awaitName;
    /** @var string Skip type */
    private $skipType;
    /** @var int Minutes to skip */
    private $minutes;
    /** @var float Percentage of time to skip */
    private $rate;
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
     * @return SkipByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SkipByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return SkipByUserIdRequest
     */
	public function withUserId(?string $userId): SkipByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Exchange Await name */
	public function getAwaitName(): ?string {
		return $this->awaitName;
	}
    /** @param string|null $awaitName Exchange Await name */
	public function setAwaitName(?string $awaitName) {
		$this->awaitName = $awaitName;
	}
    /**
     * @param string|null $awaitName Exchange Await name
     * @return SkipByUserIdRequest
     */
	public function withAwaitName(?string $awaitName): SkipByUserIdRequest {
		$this->awaitName = $awaitName;
		return $this;
	}
    /** @return string|null Skip type */
	public function getSkipType(): ?string {
		return $this->skipType;
	}
    /** @param string|null $skipType Skip type */
	public function setSkipType(?string $skipType) {
		$this->skipType = $skipType;
	}
    /**
     * @param string|null $skipType Skip type
     * @return SkipByUserIdRequest
     */
	public function withSkipType(?string $skipType): SkipByUserIdRequest {
		$this->skipType = $skipType;
		return $this;
	}
    /** @return int|null Minutes to skip */
	public function getMinutes(): ?int {
		return $this->minutes;
	}
    /** @param int|null $minutes Minutes to skip */
	public function setMinutes(?int $minutes) {
		$this->minutes = $minutes;
	}
    /**
     * @param int|null $minutes Minutes to skip
     * @return SkipByUserIdRequest
     */
	public function withMinutes(?int $minutes): SkipByUserIdRequest {
		$this->minutes = $minutes;
		return $this;
	}
    /** @return float|null Percentage of time to skip */
	public function getRate(): ?float {
		return $this->rate;
	}
    /** @param float|null $rate Percentage of time to skip */
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}
    /**
     * @param float|null $rate Percentage of time to skip
     * @return SkipByUserIdRequest
     */
	public function withRate(?float $rate): SkipByUserIdRequest {
		$this->rate = $rate;
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
     * @return SkipByUserIdRequest
     */
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