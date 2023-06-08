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

class PredictionByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $lotteryName;
    /** @var string */
    private $userId;
    /** @var int */
    private $randomSeed;
    /** @var int */
    private $count;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): PredictionByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getLotteryName(): ?string {
		return $this->lotteryName;
	}
	public function setLotteryName(?string $lotteryName) {
		$this->lotteryName = $lotteryName;
	}
	public function withLotteryName(?string $lotteryName): PredictionByUserIdRequest {
		$this->lotteryName = $lotteryName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): PredictionByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getRandomSeed(): ?int {
		return $this->randomSeed;
	}
	public function setRandomSeed(?int $randomSeed) {
		$this->randomSeed = $randomSeed;
	}
	public function withRandomSeed(?int $randomSeed): PredictionByUserIdRequest {
		$this->randomSeed = $randomSeed;
		return $this;
	}
	public function getCount(): ?int {
		return $this->count;
	}
	public function setCount(?int $count) {
		$this->count = $count;
	}
	public function withCount(?int $count): PredictionByUserIdRequest {
		$this->count = $count;
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
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "lotteryName" => $this->getLotteryName(),
            "userId" => $this->getUserId(),
            "randomSeed" => $this->getRandomSeed(),
            "count" => $this->getCount(),
        );
    }
}