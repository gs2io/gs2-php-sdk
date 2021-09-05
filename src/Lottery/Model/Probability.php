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


class Probability implements IModel {
	/**
     * @var DrawnPrize
	 */
	private $prize;
	/**
     * @var float
	 */
	private $rate;

	public function getPrize(): ?DrawnPrize {
		return $this->prize;
	}

	public function setPrize(?DrawnPrize $prize) {
		$this->prize = $prize;
	}

	public function withPrize(?DrawnPrize $prize): Probability {
		$this->prize = $prize;
		return $this;
	}

	public function getRate(): ?float {
		return $this->rate;
	}

	public function setRate(?float $rate) {
		$this->rate = $rate;
	}

	public function withRate(?float $rate): Probability {
		$this->rate = $rate;
		return $this;
	}

    public static function fromJson(?array $data): ?Probability {
        if ($data === null) {
            return null;
        }
        return (new Probability())
            ->withPrize(empty($data['prize']) ? null : DrawnPrize::fromJson($data['prize']))
            ->withRate(empty($data['rate']) && $data['rate'] !== 0 ? null : $data['rate']);
    }

    public function toJson(): array {
        return array(
            "prize" => $this->getPrize() !== null ? $this->getPrize()->toJson() : null,
            "rate" => $this->getRate(),
        );
    }
}