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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyRatingByUserId: Verify Rating by User ID
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#verifyratingbyuserid
 */
class VerifyRatingByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Rating name */
    private $ratingName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var float Rate value to be compared */
    private $rateValue;
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
     * @return VerifyRatingByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyRatingByUserIdRequest {
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
     * @return VerifyRatingByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyRatingByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Rating name */
	public function getRatingName(): ?string {
		return $this->ratingName;
	}
    /** @param string|null $ratingName Rating name */
	public function setRatingName(?string $ratingName) {
		$this->ratingName = $ratingName;
	}
    /**
     * @param string|null $ratingName Rating name
     * @return VerifyRatingByUserIdRequest
     */
	public function withRatingName(?string $ratingName): VerifyRatingByUserIdRequest {
		$this->ratingName = $ratingName;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyRatingByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyRatingByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return float|null Rate value to be compared */
	public function getRateValue(): ?float {
		return $this->rateValue;
	}
    /** @param float|null $rateValue Rate value to be compared */
	public function setRateValue(?float $rateValue) {
		$this->rateValue = $rateValue;
	}
    /**
     * @param float|null $rateValue Rate value to be compared
     * @return VerifyRatingByUserIdRequest
     */
	public function withRateValue(?float $rateValue): VerifyRatingByUserIdRequest {
		$this->rateValue = $rateValue;
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
     * @return VerifyRatingByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyRatingByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyRatingByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyRatingByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyRatingByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRatingName(array_key_exists('ratingName', $data) && $data['ratingName'] !== null ? $data['ratingName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withRateValue(array_key_exists('rateValue', $data) && $data['rateValue'] !== null ? $data['rateValue'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "ratingName" => $this->getRatingName(),
            "verifyType" => $this->getVerifyType(),
            "rateValue" => $this->getRateValue(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}