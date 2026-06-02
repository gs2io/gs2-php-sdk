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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;


class NumericRange implements IModel {
	/**
     * @var float
	 */
	private $min;
	/**
     * @var float
	 */
	private $max;
	public function getMin(): ?float {
		return $this->min;
	}
	public function setMin(?float $min) {
		$this->min = $min;
	}
	public function withMin(?float $min): NumericRange {
		$this->min = $min;
		return $this;
	}
	public function getMax(): ?float {
		return $this->max;
	}
	public function setMax(?float $max) {
		$this->max = $max;
	}
	public function withMax(?float $max): NumericRange {
		$this->max = $max;
		return $this;
	}

    public static function fromJson(?array $data): ?NumericRange {
        if ($data === null) {
            return null;
        }
        return (new NumericRange())
            ->withMin(array_key_exists('min', $data) && $data['min'] !== null ? $data['min'] : null)
            ->withMax(array_key_exists('max', $data) && $data['max'] !== null ? $data['max'] : null);
    }

    public function toJson(): array {
        return array(
            "min" => $this->getMin(),
            "max" => $this->getMax(),
        );
    }
}