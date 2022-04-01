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


class AttributeRange implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var int
	 */
	private $min;
	/**
     * @var int
	 */
	private $max;

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): AttributeRange {
		$this->name = $name;
		return $this;
	}

	public function getMin(): ?int {
		return $this->min;
	}

	public function setMin(?int $min) {
		$this->min = $min;
	}

	public function withMin(?int $min): AttributeRange {
		$this->min = $min;
		return $this;
	}

	public function getMax(): ?int {
		return $this->max;
	}

	public function setMax(?int $max) {
		$this->max = $max;
	}

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