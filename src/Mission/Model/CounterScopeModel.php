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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;


class CounterScopeModel implements IModel {
	/**
     * @var string
	 */
	private $resetType;
	/**
     * @var int
	 */
	private $resetDayOfMonth;
	/**
     * @var string
	 */
	private $resetDayOfWeek;
	/**
     * @var int
	 */
	private $resetHour;
	public function getResetType(): ?string {
		return $this->resetType;
	}
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
	public function withResetType(?string $resetType): CounterScopeModel {
		$this->resetType = $resetType;
		return $this;
	}
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}
	public function withResetDayOfMonth(?int $resetDayOfMonth): CounterScopeModel {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}
	public function withResetDayOfWeek(?string $resetDayOfWeek): CounterScopeModel {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
	public function withResetHour(?int $resetHour): CounterScopeModel {
		$this->resetHour = $resetHour;
		return $this;
	}

    public static function fromJson(?array $data): ?CounterScopeModel {
        if ($data === null) {
            return null;
        }
        return (new CounterScopeModel())
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withResetDayOfMonth(array_key_exists('resetDayOfMonth', $data) && $data['resetDayOfMonth'] !== null ? $data['resetDayOfMonth'] : null)
            ->withResetDayOfWeek(array_key_exists('resetDayOfWeek', $data) && $data['resetDayOfWeek'] !== null ? $data['resetDayOfWeek'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null);
    }

    public function toJson(): array {
        return array(
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
        );
    }
}