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


class TimeseriesMetadata implements IModel {
	/**
     * @var array
	 */
	private $keys;
	/**
     * @var array
	 */
	private $groupBy;
	public function getKeys(): ?array {
		return $this->keys;
	}
	public function setKeys(?array $keys) {
		$this->keys = $keys;
	}
	public function withKeys(?array $keys): TimeseriesMetadata {
		$this->keys = $keys;
		return $this;
	}
	public function getGroupBy(): ?array {
		return $this->groupBy;
	}
	public function setGroupBy(?array $groupBy) {
		$this->groupBy = $groupBy;
	}
	public function withGroupBy(?array $groupBy): TimeseriesMetadata {
		$this->groupBy = $groupBy;
		return $this;
	}

    public static function fromJson(?array $data): ?TimeseriesMetadata {
        if ($data === null) {
            return null;
        }
        return (new TimeseriesMetadata())
            ->withKeys(!array_key_exists('keys', $data) || $data['keys'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['keys']
            ))
            ->withGroupBy(!array_key_exists('groupBy', $data) || $data['groupBy'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['groupBy']
            ));
    }

    public function toJson(): array {
        return array(
            "keys" => $this->getKeys() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getKeys()
            ),
            "groupBy" => $this->getGroupBy() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getGroupBy()
            ),
        );
    }
}