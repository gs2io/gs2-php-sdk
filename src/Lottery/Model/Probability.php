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
 * Draw Probability
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#probability
 */
class Probability implements IModel {
	/**
     * @var DrawnPrize Prize
	 */
	private $prize;
	/**
     * @var float Draw Probability (0.0-1.0)
	 */
	private $rate;
    /** @return DrawnPrize|null Prize */
	public function getPrize(): ?DrawnPrize {
		return $this->prize;
	}
    /** @param DrawnPrize|null $prize Prize */
	public function setPrize(?DrawnPrize $prize) {
		$this->prize = $prize;
	}
    /**
     * @param DrawnPrize|null $prize Prize
     * @return Probability
     */
	public function withPrize(?DrawnPrize $prize): Probability {
		$this->prize = $prize;
		return $this;
	}
    /** @return float|null Draw Probability (0.0-1.0) */
	public function getRate(): ?float {
		return $this->rate;
	}
    /** @param float|null $rate Draw Probability (0.0-1.0) */
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}
    /**
     * @param float|null $rate Draw Probability (0.0-1.0)
     * @return Probability
     */
	public function withRate(?float $rate): Probability {
		$this->rate = $rate;
		return $this;
	}

    public static function fromJson(?array $data): ?Probability {
        if ($data === null) {
            return null;
        }
        return (new Probability())
            ->withPrize(array_key_exists('prize', $data) && $data['prize'] !== null ? DrawnPrize::fromJson($data['prize']) : null)
            ->withRate(array_key_exists('rate', $data) && $data['rate'] !== null ? $data['rate'] : null);
    }

    public function toJson(): array {
        return array(
            "prize" => $this->getPrize() !== null ? $this->getPrize()->toJson() : null,
            "rate" => $this->getRate(),
        );
    }
}