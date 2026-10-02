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


/**
 * Default Grade Model
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#defaultgrademodel
 */
class DefaultGradeModel implements IModel {
	/**
     * @var string Property ID Regex
	 */
	private $propertyIdRegex;
	/**
     * @var int Default Grade Value
	 */
	private $defaultGradeValue;
    /** @return string|null Property ID Regex */
	public function getPropertyIdRegex(): ?string {
		return $this->propertyIdRegex;
	}
    /** @param string|null $propertyIdRegex Property ID Regex */
	public function setPropertyIdRegex(?string $propertyIdRegex) {
		$this->propertyIdRegex = $propertyIdRegex;
	}
    /**
     * @param string|null $propertyIdRegex Property ID Regex
     * @return DefaultGradeModel
     */
	public function withPropertyIdRegex(?string $propertyIdRegex): DefaultGradeModel {
		$this->propertyIdRegex = $propertyIdRegex;
		return $this;
	}
    /** @return int|null Default Grade Value */
	public function getDefaultGradeValue(): ?int {
		return $this->defaultGradeValue;
	}
    /** @param int|null $defaultGradeValue Default Grade Value */
	public function setDefaultGradeValue(?int $defaultGradeValue) {
		$this->defaultGradeValue = $defaultGradeValue;
	}
    /**
     * @param int|null $defaultGradeValue Default Grade Value
     * @return DefaultGradeModel
     */
	public function withDefaultGradeValue(?int $defaultGradeValue): DefaultGradeModel {
		$this->defaultGradeValue = $defaultGradeValue;
		return $this;
	}

    public static function fromJson(?array $data): ?DefaultGradeModel {
        if ($data === null) {
            return null;
        }
        return (new DefaultGradeModel())
            ->withPropertyIdRegex(array_key_exists('propertyIdRegex', $data) && $data['propertyIdRegex'] !== null ? $data['propertyIdRegex'] : null)
            ->withDefaultGradeValue(array_key_exists('defaultGradeValue', $data) && $data['defaultGradeValue'] !== null ? $data['defaultGradeValue'] : null);
    }

    public function toJson(): array {
        return array(
            "propertyIdRegex" => $this->getPropertyIdRegex(),
            "defaultGradeValue" => $this->getDefaultGradeValue(),
        );
    }
}