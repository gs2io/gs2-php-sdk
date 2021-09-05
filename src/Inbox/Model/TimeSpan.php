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

namespace Gs2\Inbox\Model;

use Gs2\Core\Model\IModel;


class TimeSpan implements IModel {
	/**
     * @var int
	 */
	private $days;
	/**
     * @var int
	 */
	private $hours;
	/**
     * @var int
	 */
	private $minutes;

	public function getDays(): ?int {
		return $this->days;
	}

	public function setDays(?int $days) {
		$this->days = $days;
	}

	public function withDays(?int $days): TimeSpan {
		$this->days = $days;
		return $this;
	}

	public function getHours(): ?int {
		return $this->hours;
	}

	public function setHours(?int $hours) {
		$this->hours = $hours;
	}

	public function withHours(?int $hours): TimeSpan {
		$this->hours = $hours;
		return $this;
	}

	public function getMinutes(): ?int {
		return $this->minutes;
	}

	public function setMinutes(?int $minutes) {
		$this->minutes = $minutes;
	}

	public function withMinutes(?int $minutes): TimeSpan {
		$this->minutes = $minutes;
		return $this;
	}

    public static function fromJson(?array $data): ?TimeSpan {
        if ($data === null) {
            return null;
        }
        return (new TimeSpan())
            ->withDays(empty($data['days']) && $data['days'] !== 0 ? null : $data['days'])
            ->withHours(empty($data['hours']) && $data['hours'] !== 0 ? null : $data['hours'])
            ->withMinutes(empty($data['minutes']) && $data['minutes'] !== 0 ? null : $data['minutes']);
    }

    public function toJson(): array {
        return array(
            "days" => $this->getDays(),
            "hours" => $this->getHours(),
            "minutes" => $this->getMinutes(),
        );
    }
}