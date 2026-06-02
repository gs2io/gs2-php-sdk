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


class FacetValueCount implements IModel {
	/**
     * @var string
	 */
	private $value;
	/**
     * @var int
	 */
	private $count;
	public function getValue(): ?string {
		return $this->value;
	}
	public function setValue(?string $value) {
		$this->value = $value;
	}
	public function withValue(?string $value): FacetValueCount {
		$this->value = $value;
		return $this;
	}
	public function getCount(): ?int {
		return $this->count;
	}
	public function setCount(?int $count) {
		$this->count = $count;
	}
	public function withCount(?int $count): FacetValueCount {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?FacetValueCount {
        if ($data === null) {
            return null;
        }
        return (new FacetValueCount())
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "value" => $this->getValue(),
            "count" => $this->getCount(),
        );
    }
}