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


class Attribute implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var int
	 */
	private $value;

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Attribute {
		$this->name = $name;
		return $this;
	}

	public function getValue(): ?int {
		return $this->value;
	}

	public function setValue(?int $value) {
		$this->value = $value;
	}

	public function withValue(?int $value): Attribute {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?Attribute {
        if ($data === null) {
            return null;
        }
        return (new Attribute())
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withValue(empty($data['value']) ? null : $data['value']);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "value" => $this->getValue(),
        );
    }
}