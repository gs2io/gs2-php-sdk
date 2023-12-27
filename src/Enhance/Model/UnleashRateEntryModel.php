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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;


class UnleashRateEntryModel implements IModel {
	/**
     * @var int
	 */
	private $gradeValue;
	/**
     * @var int
	 */
	private $needCount;
	public function getGradeValue(): ?int {
		return $this->gradeValue;
	}
	public function setGradeValue(?int $gradeValue) {
		$this->gradeValue = $gradeValue;
	}
	public function withGradeValue(?int $gradeValue): UnleashRateEntryModel {
		$this->gradeValue = $gradeValue;
		return $this;
	}
	public function getNeedCount(): ?int {
		return $this->needCount;
	}
	public function setNeedCount(?int $needCount) {
		$this->needCount = $needCount;
	}
	public function withNeedCount(?int $needCount): UnleashRateEntryModel {
		$this->needCount = $needCount;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashRateEntryModel {
        if ($data === null) {
            return null;
        }
        return (new UnleashRateEntryModel())
            ->withGradeValue(array_key_exists('gradeValue', $data) && $data['gradeValue'] !== null ? $data['gradeValue'] : null)
            ->withNeedCount(array_key_exists('needCount', $data) && $data['needCount'] !== null ? $data['needCount'] : null);
    }

    public function toJson(): array {
        return array(
            "gradeValue" => $this->getGradeValue(),
            "needCount" => $this->getNeedCount(),
        );
    }
}