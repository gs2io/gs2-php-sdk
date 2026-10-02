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
 * Attribute Range
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#attributerange
 */
class AttributeRange implements IModel {
	/**
     * @var string Attribute Name
	 */
	private $name;
	/**
     * @var int Minimum Attribute Value
	 */
	private $min;
	/**
     * @var int Maximum Attribute Value
	 */
	private $max;
    /** @return string|null Attribute Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Attribute Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Attribute Name
     * @return AttributeRange
     */
	public function withName(?string $name): AttributeRange {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Minimum Attribute Value */
	public function getMin(): ?int {
		return $this->min;
	}
    /** @param int|null $min Minimum Attribute Value */
	public function setMin(?int $min) {
		$this->min = $min;
	}
    /**
     * @param int|null $min Minimum Attribute Value
     * @return AttributeRange
     */
	public function withMin(?int $min): AttributeRange {
		$this->min = $min;
		return $this;
	}
    /** @return int|null Maximum Attribute Value */
	public function getMax(): ?int {
		return $this->max;
	}
    /** @param int|null $max Maximum Attribute Value */
	public function setMax(?int $max) {
		$this->max = $max;
	}
    /**
     * @param int|null $max Maximum Attribute Value
     * @return AttributeRange
     */
	public function withMax(?int $max): AttributeRange {
		$this->max = $max;
		return $this;
	}

    public static function fromJson(?array $data): ?AttributeRange {
        if ($data === null) {
            return null;
        }
        return (new AttributeRange())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMin(array_key_exists('min', $data) && $data['min'] !== null ? $data['min'] : null)
            ->withMax(array_key_exists('max', $data) && $data['max'] !== null ? $data['max'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "min" => $this->getMin(),
            "max" => $this->getMax(),
        );
    }
}