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


class BonusRate implements IModel {
	/**
     * @var float
	 */
	private $rate;
	/**
     * @var int
	 */
	private $weight;

	public function getRate(): ?float {
		return $this->rate;
	}

	public function setRate(?float $rate) {
		$this->rate = $rate;
	}

	public function withRate(?float $rate): BonusRate {
		$this->rate = $rate;
		return $this;
	}

	public function getWeight(): ?int {
		return $this->weight;
	}

	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}

	public function withWeight(?int $weight): BonusRate {
		$this->weight = $weight;
		return $this;
	}

    public static function fromJson(?array $data): ?BonusRate {
        if ($data === null) {
            return null;
        }
        return (new BonusRate())
            ->withRate(empty($data['rate']) && $data['rate'] !== 0 ? null : $data['rate'])
            ->withWeight(empty($data['weight']) && $data['weight'] !== 0 ? null : $data['weight']);
    }

    public function toJson(): array {
        return array(
            "rate" => $this->getRate(),
            "weight" => $this->getWeight(),
        );
    }
}