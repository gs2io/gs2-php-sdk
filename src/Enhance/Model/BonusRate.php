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
 * 消費アクション
 *
 * @author Game Server Services, Inc.
 *
 */
class BonusRate implements IModel {
	/**
     * @var float 経験値ボーナスの倍率(1.0=ボーナスなし)
	 */
	protected $rate;

	/**
	 * 経験値ボーナスの倍率(1.0=ボーナスなし)を取得
	 *
	 * @return float|null 経験値ボーナスの倍率(1.0=ボーナスなし)
	 */
	public function getRate(): ?float {
		return $this->rate;
	}

	/**
	 * 経験値ボーナスの倍率(1.0=ボーナスなし)を設定
	 *
	 * @param float|null $rate 経験値ボーナスの倍率(1.0=ボーナスなし)
	 */
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}

	/**
	 * 経験値ボーナスの倍率(1.0=ボーナスなし)を設定
	 *
	 * @param float|null $rate 経験値ボーナスの倍率(1.0=ボーナスなし)
	 * @return BonusRate $this
	 */
	public function withRate(?float $rate): BonusRate {
		$this->rate = $rate;
		return $this;
	}
	/**
     * @var int 抽選重み
	 */
	protected $weight;

	/**
	 * 抽選重みを取得
	 *
	 * @return int|null 抽選重み
	 */
	public function getWeight(): ?int {
		return $this->weight;
	}

	/**
	 * 抽選重みを設定
	 *
	 * @param int|null $weight 抽選重み
	 */
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}

	/**
	 * 抽選重みを設定
	 *
	 * @param int|null $weight 抽選重み
	 * @return BonusRate $this
	 */
	public function withWeight(?int $weight): BonusRate {
		$this->weight = $weight;
		return $this;
	}

    public function toJson(): array {
        return array(
            "rate" => $this->rate,
            "weight" => $this->weight,
        );
    }

    public static function fromJson(array $data): BonusRate {
        $model = new BonusRate();
        $model->setRate(isset($data["rate"]) ? $data["rate"] : null);
        $model->setWeight(isset($data["weight"]) ? $data["weight"] : null);
        return $model;
    }
}