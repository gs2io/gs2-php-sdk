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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;


/**
 * Experience Gain Bonus
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#bonusrate
 */
class BonusRate implements IModel {
	/**
     * @var float Experience bonus multiplier (1.0 = no bonus)
	 */
	private $rate;
	/**
     * @var int Lottery weight
	 */
	private $weight;
    /** @return float|null Experience bonus multiplier (1.0 = no bonus) */
	public function getRate(): ?float {
		return $this->rate;
	}
    /** @param float|null $rate Experience bonus multiplier (1.0 = no bonus) */
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}
    /**
     * @param float|null $rate Experience bonus multiplier (1.0 = no bonus)
     * @return BonusRate
     */
	public function withRate(?float $rate): BonusRate {
		$this->rate = $rate;
		return $this;
	}
    /** @return int|null Lottery weight */
	public function getWeight(): ?int {
		return $this->weight;
	}
    /** @param int|null $weight Lottery weight */
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}
    /**
     * @param int|null $weight Lottery weight
     * @return BonusRate
     */
	public function withWeight(?int $weight): BonusRate {
		$this->weight = $weight;
		return $this;
	}

    public static function fromJson(?array $data): ?BonusRate {
        if ($data === null) {
            return null;
        }
        return (new BonusRate())
            ->withRate(array_key_exists('rate', $data) && $data['rate'] !== null ? $data['rate'] : null)
            ->withWeight(array_key_exists('weight', $data) && $data['weight'] !== null ? $data['weight'] : null);
    }

    public function toJson(): array {
        return array(
            "rate" => $this->getRate(),
            "weight" => $this->getWeight(),
        );
    }
}