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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for prediction: Get the prediction result of the lottery result
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#prediction
 */
class PredictionRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Lottery Model name */
    private $lotteryName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Random seed */
    private $randomSeed;
    /** @var int Number of draws */
    private $count;
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
     * @return PredictionRequest
     */
	public function withNamespaceName(?string $namespaceName): PredictionRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Lottery Model name */
	public function getLotteryName(): ?string {
		return $this->lotteryName;
	}
    /** @param string|null $lotteryName Lottery Model name */
	public function setLotteryName(?string $lotteryName) {
		$this->lotteryName = $lotteryName;
	}
    /**
     * @param string|null $lotteryName Lottery Model name
     * @return PredictionRequest
     */
	public function withLotteryName(?string $lotteryName): PredictionRequest {
		$this->lotteryName = $lotteryName;
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
     * @return PredictionRequest
     */
	public function withAccessToken(?string $accessToken): PredictionRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return int|null Random seed */
	public function getRandomSeed(): ?int {
		return $this->randomSeed;
	}
    /** @param int|null $randomSeed Random seed */
	public function setRandomSeed(?int $randomSeed) {
		$this->randomSeed = $randomSeed;
	}
    /**
     * @param int|null $randomSeed Random seed
     * @return PredictionRequest
     */
	public function withRandomSeed(?int $randomSeed): PredictionRequest {
		$this->randomSeed = $randomSeed;
		return $this;
	}
    /** @return int|null Number of draws */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Number of draws */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Number of draws
     * @return PredictionRequest
     */
	public function withCount(?int $count): PredictionRequest {
		$this->count = $count;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PredictionRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PredictionRequest {
        if ($data === null) {
            return null;
        }
        return (new PredictionRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withLotteryName(array_key_exists('lotteryName', $data) && $data['lotteryName'] !== null ? $data['lotteryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withRandomSeed(array_key_exists('randomSeed', $data) && $data['randomSeed'] !== null ? $data['randomSeed'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "lotteryName" => $this->getLotteryName(),
            "accessToken" => $this->getAccessToken(),
            "randomSeed" => $this->getRandomSeed(),
            "count" => $this->getCount(),
        );
    }
}