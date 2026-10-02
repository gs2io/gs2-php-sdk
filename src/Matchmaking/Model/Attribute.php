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
 * Attribute
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#attribute
 */
class Attribute implements IModel {
	/**
     * @var string Attribute Name
	 */
	private $name;
	/**
     * @var int Attribute Value
	 */
	private $value;
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
     * @return Attribute
     */
	public function withName(?string $name): Attribute {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Attribute Value */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Attribute Value */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Attribute Value
     * @return Attribute
     */
	public function withValue(?int $value): Attribute {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?Attribute {
        if ($data === null) {
            return null;
        }
        return (new Attribute())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "value" => $this->getValue(),
        );
    }
}