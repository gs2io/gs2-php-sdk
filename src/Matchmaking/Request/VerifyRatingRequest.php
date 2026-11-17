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
 * Request for verifyRating: Verify Rating
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#verifyrating
 */
class VerifyRatingRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Rating name */
    private $ratingName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var float Rate value to be compared */
    private $rateValue;
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
     * @return VerifyRatingRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyRatingRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return VerifyRatingRequest
     */
	public function withAccessToken(?string $accessToken): VerifyRatingRequest {
		$this->accessToken = $accessToken;
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
     * @return VerifyRatingRequest
     */
	public function withRatingName(?string $ratingName): VerifyRatingRequest {
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
     * @return VerifyRatingRequest
     */
	public function withVerifyType(?string $verifyType): VerifyRatingRequest {
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
     * @return VerifyRatingRequest
     */
	public function withRateValue(?float $rateValue): VerifyRatingRequest {
		$this->rateValue = $rateValue;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyRatingRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyRatingRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyRatingRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withRatingName(array_key_exists('ratingName', $data) && $data['ratingName'] !== null ? $data['ratingName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withRateValue(array_key_exists('rateValue', $data) && $data['rateValue'] !== null ? $data['rateValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "ratingName" => $this->getRatingName(),
            "verifyType" => $this->getVerifyType(),
            "rateValue" => $this->getRateValue(),
        );
    }
}