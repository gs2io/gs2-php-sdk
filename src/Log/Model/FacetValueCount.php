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


/**
 * Facet Value Count
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#facetvaluecount
 */
class FacetValueCount implements IModel {
	/**
     * @var string Facet Value
	 */
	private $value;
	/**
     * @var int Count of logs with this value
	 */
	private $count;
    /** @return string|null Facet Value */
	public function getValue(): ?string {
		return $this->value;
	}
    /** @param string|null $value Facet Value */
	public function setValue(?string $value) {
		$this->value = $value;
	}
    /**
     * @param string|null $value Facet Value
     * @return FacetValueCount
     */
	public function withValue(?string $value): FacetValueCount {
		$this->value = $value;
		return $this;
	}
    /** @return int|null Count of logs with this value */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Count of logs with this value */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Count of logs with this value
     * @return FacetValueCount
     */
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