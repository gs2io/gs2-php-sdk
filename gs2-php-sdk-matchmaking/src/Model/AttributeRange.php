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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;

/**
 * ギャザリング参加可能な属性値の範囲
 *
 * @author Game Server Services, Inc.
 *
 */
class AttributeRange implements IModel {
	/**
     * @var string 属性名
	 */
	protected $name;

	/**
	 * 属性名を取得
	 *
	 * @return string|null 属性名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 属性名を設定
	 *
	 * @param string|null $name 属性名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 属性名を設定
	 *
	 * @param string|null $name 属性名
	 * @return AttributeRange $this
	 */
	public function withName(?string $name): AttributeRange {
		$this->name = $name;
		return $this;
	}
	/**
     * @var int ギャザリング参加可能な属性値の最小値
	 */
	protected $min;

	/**
	 * ギャザリング参加可能な属性値の最小値を取得
	 *
	 * @return int|null ギャザリング参加可能な属性値の最小値
	 */
	public function getMin(): ?int {
		return $this->min;
	}

	/**
	 * ギャザリング参加可能な属性値の最小値を設定
	 *
	 * @param int|null $min ギャザリング参加可能な属性値の最小値
	 */
	public function setMin(?int $min) {
		$this->min = $min;
	}

	/**
	 * ギャザリング参加可能な属性値の最小値を設定
	 *
	 * @param int|null $min ギャザリング参加可能な属性値の最小値
	 * @return AttributeRange $this
	 */
	public function withMin(?int $min): AttributeRange {
		$this->min = $min;
		return $this;
	}
	/**
     * @var int ギャザリング参加可能な属性値の最大値
	 */
	protected $max;

	/**
	 * ギャザリング参加可能な属性値の最大値を取得
	 *
	 * @return int|null ギャザリング参加可能な属性値の最大値
	 */
	public function getMax(): ?int {
		return $this->max;
	}

	/**
	 * ギャザリング参加可能な属性値の最大値を設定
	 *
	 * @param int|null $max ギャザリング参加可能な属性値の最大値
	 */
	public function setMax(?int $max) {
		$this->max = $max;
	}

	/**
	 * ギャザリング参加可能な属性値の最大値を設定
	 *
	 * @param int|null $max ギャザリング参加可能な属性値の最大値
	 * @return AttributeRange $this
	 */
	public function withMax(?int $max): AttributeRange {
		$this->max = $max;
		return $this;
	}

    public function toJson(): array {
        return array(
            "name" => $this->name,
            "min" => $this->min,
            "max" => $this->max,
        );
    }

    public static function fromJson(array $data): AttributeRange {
        $model = new AttributeRange();
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMin(isset($data["min"]) ? $data["min"] : null);
        $model->setMax(isset($data["max"]) ? $data["max"] : null);
        return $model;
    }
}