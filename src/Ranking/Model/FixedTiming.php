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

namespace Gs2\Ranking\Model;

use Gs2\Core\Model\IModel;


class FixedTiming implements IModel {
	/**
     * @var int
	 */
	private $hour;
	/**
     * @var int
	 */
	private $minute;
	public function getHour(): ?int {
		return $this->hour;
	}
	public function setHour(?int $hour) {
		$this->hour = $hour;
	}
	public function withHour(?int $hour): FixedTiming {
		$this->hour = $hour;
		return $this;
	}
	public function getMinute(): ?int {
		return $this->minute;
	}
	public function setMinute(?int $minute) {
		$this->minute = $minute;
	}
	public function withMinute(?int $minute): FixedTiming {
		$this->minute = $minute;
		return $this;
	}

    public static function fromJson(?array $data): ?FixedTiming {
        if ($data === null) {
            return null;
        }
        return (new FixedTiming())
            ->withHour(array_key_exists('hour', $data) && $data['hour'] !== null ? $data['hour'] : null)
            ->withMinute(array_key_exists('minute', $data) && $data['minute'] !== null ? $data['minute'] : null);
    }

    public function toJson(): array {
        return array(
            "hour" => $this->getHour(),
            "minute" => $this->getMinute(),
        );
    }
}