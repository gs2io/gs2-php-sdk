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

namespace Gs2\Grade\Model;

use Gs2\Core\Model\IModel;


class GradeEntryModel implements IModel {
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $rankCapValue;
	/**
     * @var string
	 */
	private $propertyIdRegex;
	/**
     * @var string
	 */
	private $gradeUpPropertyIdRegex;
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): GradeEntryModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getRankCapValue(): ?int {
		return $this->rankCapValue;
	}
	public function setRankCapValue(?int $rankCapValue) {
		$this->rankCapValue = $rankCapValue;
	}
	public function withRankCapValue(?int $rankCapValue): GradeEntryModel {
		$this->rankCapValue = $rankCapValue;
		return $this;
	}
	public function getPropertyIdRegex(): ?string {
		return $this->propertyIdRegex;
	}
	public function setPropertyIdRegex(?string $propertyIdRegex) {
		$this->propertyIdRegex = $propertyIdRegex;
	}
	public function withPropertyIdRegex(?string $propertyIdRegex): GradeEntryModel {
		$this->propertyIdRegex = $propertyIdRegex;
		return $this;
	}
	public function getGradeUpPropertyIdRegex(): ?string {
		return $this->gradeUpPropertyIdRegex;
	}
	public function setGradeUpPropertyIdRegex(?string $gradeUpPropertyIdRegex) {
		$this->gradeUpPropertyIdRegex = $gradeUpPropertyIdRegex;
	}
	public function withGradeUpPropertyIdRegex(?string $gradeUpPropertyIdRegex): GradeEntryModel {
		$this->gradeUpPropertyIdRegex = $gradeUpPropertyIdRegex;
		return $this;
	}

    public static function fromJson(?array $data): ?GradeEntryModel {
        if ($data === null) {
            return null;
        }
        return (new GradeEntryModel())
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withRankCapValue(array_key_exists('rankCapValue', $data) && $data['rankCapValue'] !== null ? $data['rankCapValue'] : null)
            ->withPropertyIdRegex(array_key_exists('propertyIdRegex', $data) && $data['propertyIdRegex'] !== null ? $data['propertyIdRegex'] : null)
            ->withGradeUpPropertyIdRegex(array_key_exists('gradeUpPropertyIdRegex', $data) && $data['gradeUpPropertyIdRegex'] !== null ? $data['gradeUpPropertyIdRegex'] : null);
    }

    public function toJson(): array {
        return array(
            "metadata" => $this->getMetadata(),
            "rankCapValue" => $this->getRankCapValue(),
            "propertyIdRegex" => $this->getPropertyIdRegex(),
            "gradeUpPropertyIdRegex" => $this->getGradeUpPropertyIdRegex(),
        );
    }
}