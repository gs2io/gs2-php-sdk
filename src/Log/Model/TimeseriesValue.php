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
 * Timeseries Value
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#timeseriesvalue
 */
class TimeseriesValue implements IModel {
	/**
     * @var string Group key (\"count\" if no grouping)
	 */
	private $key;
	/**
     * @var float Aggregated value
	 */
	private $value;
    /** @return string|null Group key (\"count\" if no grouping) */
	public function getKey(): ?string {
		return $this->key;
	}
    /** @param string|null $key Group key (\"count\" if no grouping) */
	public function setKey(?string $key) {
		$this->key = $key;
	}
    /**
     * @param string|null $key Group key (\"count\" if no grouping)
     * @return TimeseriesValue
     */
	public function withKey(?string $key): TimeseriesValue {
		$this->key = $key;
		return $this;
	}
    /** @return float|null Aggregated value */
	public function getValue(): ?float {
		return $this->value;
	}
    /** @param float|null $value Aggregated value */
	public function setValue(?float $value) {
		$this->value = $value;
	}
    /**
     * @param float|null $value Aggregated value
     * @return TimeseriesValue
     */
	public function withValue(?float $value): TimeseriesValue {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?TimeseriesValue {
        if ($data === null) {
            return null;
        }
        return (new TimeseriesValue())
            ->withKey(array_key_exists('key', $data) && $data['key'] !== null ? $data['key'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null);
    }

    public function toJson(): array {
        return array(
            "key" => $this->getKey(),
            "value" => $this->getValue(),
        );
    }
}