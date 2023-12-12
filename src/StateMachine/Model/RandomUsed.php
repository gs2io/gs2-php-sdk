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

namespace Gs2\StateMachine\Model;

use Gs2\Core\Model\IModel;


class RandomUsed implements IModel {
	/**
     * @var int
	 */
	private $category;
	/**
     * @var int
	 */
	private $used;
	public function getCategory(): ?int {
		return $this->category;
	}
	public function setCategory(?int $category) {
		$this->category = $category;
	}
	public function withCategory(?int $category): RandomUsed {
		$this->category = $category;
		return $this;
	}
	public function getUsed(): ?int {
		return $this->used;
	}
	public function setUsed(?int $used) {
		$this->used = $used;
	}
	public function withUsed(?int $used): RandomUsed {
		$this->used = $used;
		return $this;
	}

    public static function fromJson(?array $data): ?RandomUsed {
        if ($data === null) {
            return null;
        }
        return (new RandomUsed())
            ->withCategory(array_key_exists('category', $data) && $data['category'] !== null ? $data['category'] : null)
            ->withUsed(array_key_exists('used', $data) && $data['used'] !== null ? $data['used'] : null);
    }

    public function toJson(): array {
        return array(
            "category" => $this->getCategory(),
            "used" => $this->getUsed(),
        );
    }
}