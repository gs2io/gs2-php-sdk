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

namespace Gs2\Watch\Model;

use Gs2\Core\Model\IModel;


class Chart implements IModel {
	/**
     * @var int
	 */
	private $timestamp;
	/**
     * @var int
	 */
	private $value;
	/**
     * @var array
	 */
	private $groupBys;
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
	public function withTimestamp(?int $timestamp): Chart {
		$this->timestamp = $timestamp;
		return $this;
	}
	public function getValue(): ?int {
		return $this->value;
	}
	public function setValue(?int $value) {
		$this->value = $value;
	}
	public function withValue(?int $value): Chart {
		$this->value = $value;
		return $this;
	}
	public function getGroupBys(): ?array {
		return $this->groupBys;
	}
	public function setGroupBys(?array $groupBys) {
		$this->groupBys = $groupBys;
	}
	public function withGroupBys(?array $groupBys): Chart {
		$this->groupBys = $groupBys;
		return $this;
	}

    public static function fromJson(?array $data): ?Chart {
        if ($data === null) {
            return null;
        }
        return (new Chart())
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withGroupBys(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('groupBys', $data) && $data['groupBys'] !== null ? $data['groupBys'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
            "value" => $this->getValue(),
            "groupBys" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getGroupBys() !== null && $this->getGroupBys() !== null ? $this->getGroupBys() : []
            ),
        );
    }
}