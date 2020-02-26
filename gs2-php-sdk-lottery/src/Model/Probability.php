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

namespace Gs2\Lottery\Model;

use Gs2\Core\Model\IModel;

/**
 * 排出レート
 *
 * @author Game Server Services, Inc.
 *
 */
class Probability implements IModel {
	/**
     * @var DrawnPrize 景品の種類
	 */
	protected $prize;

	/**
	 * 景品の種類を取得
	 *
	 * @return DrawnPrize|null 景品の種類
	 */
	public function getPrize(): ?DrawnPrize {
		return $this->prize;
	}

	/**
	 * 景品の種類を設定
	 *
	 * @param DrawnPrize|null $prize 景品の種類
	 */
	public function setPrize(?DrawnPrize $prize) {
		$this->prize = $prize;
	}

	/**
	 * 景品の種類を設定
	 *
	 * @param DrawnPrize|null $prize 景品の種類
	 * @return Probability $this
	 */
	public function withPrize(?DrawnPrize $prize): Probability {
		$this->prize = $prize;
		return $this;
	}
	/**
     * @var float 排出確率(0.0〜1.0)
	 */
	protected $rate;

	/**
	 * 排出確率(0.0〜1.0)を取得
	 *
	 * @return float|null 排出確率(0.0〜1.0)
	 */
	public function getRate(): ?float {
		return $this->rate;
	}

	/**
	 * 排出確率(0.0〜1.0)を設定
	 *
	 * @param float|null $rate 排出確率(0.0〜1.0)
	 */
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}

	/**
	 * 排出確率(0.0〜1.0)を設定
	 *
	 * @param float|null $rate 排出確率(0.0〜1.0)
	 * @return Probability $this
	 */
	public function withRate(?float $rate): Probability {
		$this->rate = $rate;
		return $this;
	}

    public function toJson(): array {
        return array(
            "prize" => $this->prize->toJson(),
            "rate" => $this->rate,
        );
    }

    public static function fromJson(array $data): Probability {
        $model = new Probability();
        $model->setPrize(isset($data["prize"]) ? DrawnPrize::fromJson($data["prize"]) : null);
        $model->setRate(isset($data["rate"]) ? $data["rate"] : null);
        return $model;
    }
}