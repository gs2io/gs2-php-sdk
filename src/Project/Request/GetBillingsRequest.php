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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetBillingsRequest extends Gs2BasicRequest {
    /** @var int */
    private $year;
    /** @var int */
    private $month;
    /** @var string */
    private $service;
	public function getYear(): ?int {
		return $this->year;
	}
	public function setYear(?int $year) {
		$this->year = $year;
	}
	public function withYear(?int $year): GetBillingsRequest {
		$this->year = $year;
		return $this;
	}
	public function getMonth(): ?int {
		return $this->month;
	}
	public function setMonth(?int $month) {
		$this->month = $month;
	}
	public function withMonth(?int $month): GetBillingsRequest {
		$this->month = $month;
		return $this;
	}
	public function getService(): ?string {
		return $this->service;
	}
	public function setService(?string $service) {
		$this->service = $service;
	}
	public function withService(?string $service): GetBillingsRequest {
		$this->service = $service;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBillingsRequest {
        if ($data === null) {
            return null;
        }
        return (new GetBillingsRequest())
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null);
    }

    public function toJson(): array {
        return array(
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "service" => $this->getService(),
        );
    }
}