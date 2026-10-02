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
 * Timeseries Point
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#timeseriespoint
 */
class TimeseriesPoint implements IModel {
	/**
     * @var int Timestamp
	 */
	private $timestamp;
	/**
     * @var array Values for each group at this timestamp
	 */
	private $values;
    /** @return int|null Timestamp */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
    /** @param int|null $timestamp Timestamp */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
    /**
     * @param int|null $timestamp Timestamp
     * @return TimeseriesPoint
     */
	public function withTimestamp(?int $timestamp): TimeseriesPoint {
		$this->timestamp = $timestamp;
		return $this;
	}
    /** @return array|null Values for each group at this timestamp */
	public function getValues(): ?array {
		return $this->values;
	}
    /** @param array|null $values Values for each group at this timestamp */
	public function setValues(?array $values) {
		$this->values = $values;
	}
    /**
     * @param array|null $values Values for each group at this timestamp
     * @return TimeseriesPoint
     */
	public function withValues(?array $values): TimeseriesPoint {
		$this->values = $values;
		return $this;
	}

    public static function fromJson(?array $data): ?TimeseriesPoint {
        if ($data === null) {
            return null;
        }
        return (new TimeseriesPoint())
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withValues(!array_key_exists('values', $data) || $data['values'] === null ? null : array_map(
                function ($item) {
                    return TimeseriesValue::fromJson($item);
                },
                $data['values']
            ));
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
            "values" => $this->getValues() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getValues()
            ),
        );
    }
}