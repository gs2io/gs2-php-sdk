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

class PredictionRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $lotteryName;
    /** @var string */
    private $accessToken;
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
	public function withNamespaceName(?string $namespaceName): PredictionRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getLotteryName(): ?string {
		return $this->lotteryName;
	}
	public function setLotteryName(?string $lotteryName) {
		$this->lotteryName = $lotteryName;
	}
	public function withLotteryName(?string $lotteryName): PredictionRequest {
		$this->lotteryName = $lotteryName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): PredictionRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getRandomSeed(): ?int {
		return $this->randomSeed;
	}
	public function setRandomSeed(?int $randomSeed) {
		$this->randomSeed = $randomSeed;
	}
	public function withRandomSeed(?int $randomSeed): PredictionRequest {
		$this->randomSeed = $randomSeed;
		return $this;
	}
	public function getCount(): ?int {
		return $this->count;
	}
	public function setCount(?int $count) {
		$this->count = $count;
	}
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