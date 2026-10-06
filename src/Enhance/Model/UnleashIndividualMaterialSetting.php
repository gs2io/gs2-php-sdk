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


/**
 * Individual Material Setting
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#unleashindividualmaterialsetting
 */
class UnleashIndividualMaterialSetting implements IModel {
	/**
     * @var string How the material is matched against the target
	 */
	private $matchType;
	/**
     * @var string Grade condition of the material
	 */
	private $gradeCondition;
	/**
     * @var int Grade the material must have
	 */
	private $gradeValue;
	/**
     * @var int Number of item sets to consume
	 */
	private $count;
    /** @return string|null How the material is matched against the target */
	public function getMatchType(): ?string {
		return $this->matchType;
	}
    /** @param string|null $matchType How the material is matched against the target */
	public function setMatchType(?string $matchType) {
		$this->matchType = $matchType;
	}
    /**
     * @param string|null $matchType How the material is matched against the target
     * @return UnleashIndividualMaterialSetting
     */
	public function withMatchType(?string $matchType): UnleashIndividualMaterialSetting {
		$this->matchType = $matchType;
		return $this;
	}
    /** @return string|null Grade condition of the material */
	public function getGradeCondition(): ?string {
		return $this->gradeCondition;
	}
    /** @param string|null $gradeCondition Grade condition of the material */
	public function setGradeCondition(?string $gradeCondition) {
		$this->gradeCondition = $gradeCondition;
	}
    /**
     * @param string|null $gradeCondition Grade condition of the material
     * @return UnleashIndividualMaterialSetting
     */
	public function withGradeCondition(?string $gradeCondition): UnleashIndividualMaterialSetting {
		$this->gradeCondition = $gradeCondition;
		return $this;
	}
    /** @return int|null Grade the material must have */
	public function getGradeValue(): ?int {
		return $this->gradeValue;
	}
    /** @param int|null $gradeValue Grade the material must have */
	public function setGradeValue(?int $gradeValue) {
		$this->gradeValue = $gradeValue;
	}
    /**
     * @param int|null $gradeValue Grade the material must have
     * @return UnleashIndividualMaterialSetting
     */
	public function withGradeValue(?int $gradeValue): UnleashIndividualMaterialSetting {
		$this->gradeValue = $gradeValue;
		return $this;
	}
    /** @return int|null Number of item sets to consume */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Number of item sets to consume */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Number of item sets to consume
     * @return UnleashIndividualMaterialSetting
     */
	public function withCount(?int $count): UnleashIndividualMaterialSetting {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashIndividualMaterialSetting {
        if ($data === null) {
            return null;
        }
        return (new UnleashIndividualMaterialSetting())
            ->withMatchType(array_key_exists('matchType', $data) && $data['matchType'] !== null ? $data['matchType'] : null)
            ->withGradeCondition(array_key_exists('gradeCondition', $data) && $data['gradeCondition'] !== null ? $data['gradeCondition'] : null)
            ->withGradeValue(array_key_exists('gradeValue', $data) && $data['gradeValue'] !== null ? $data['gradeValue'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "matchType" => $this->getMatchType(),
            "gradeCondition" => $this->getGradeCondition(),
            "gradeValue" => $this->getGradeValue(),
            "count" => $this->getCount(),
        );
    }
}