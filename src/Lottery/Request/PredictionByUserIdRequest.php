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
 * Request for predictionByUserId: Get the prediction result of the lottery result by User ID
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#predictionbyuserid
 */
class PredictionByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Lottery Model name */
    private $lotteryName;
    /** @var string User ID */
    private $userId;
    /** @var int Random seed */
    private $randomSeed;
    /** @var int Number of draws */
    private $count;
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
     * @return PredictionByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): PredictionByUserIdRequest {
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
     * @return PredictionByUserIdRequest
     */
	public function withLotteryName(?string $lotteryName): PredictionByUserIdRequest {
		$this->lotteryName = $lotteryName;
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
     * @return PredictionByUserIdRequest
     */
	public function withUserId(?string $userId): PredictionByUserIdRequest {
		$this->userId = $userId;
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
     * @return PredictionByUserIdRequest
     */
	public function withRandomSeed(?int $randomSeed): PredictionByUserIdRequest {
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
     * @return PredictionByUserIdRequest
     */
	public function withCount(?int $count): PredictionByUserIdRequest {
		$this->count = $count;
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
     * @return PredictionByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): PredictionByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PredictionByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PredictionByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PredictionByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withLotteryName(array_key_exists('lotteryName', $data) && $data['lotteryName'] !== null ? $data['lotteryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRandomSeed(array_key_exists('randomSeed', $data) && $data['randomSeed'] !== null ? $data['randomSeed'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "lotteryName" => $this->getLotteryName(),
            "userId" => $this->getUserId(),
            "randomSeed" => $this->getRandomSeed(),
            "count" => $this->getCount(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}