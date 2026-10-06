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
 * Unleash Rate Entry Model
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#unleashrateentrymodel
 */
class UnleashRateEntryModel implements IModel {
	/**
     * @var int Target grade
	 */
	private $gradeValue;
	/**
     * @var string Type of material condition
	 */
	private $type;
	/**
     * @var int How many items of the same type to consume
	 */
	private $needCount;
	/**
     * @var array Recipes
	 */
	private $recipes;
    /** @return int|null Target grade */
	public function getGradeValue(): ?int {
		return $this->gradeValue;
	}
    /** @param int|null $gradeValue Target grade */
	public function setGradeValue(?int $gradeValue) {
		$this->gradeValue = $gradeValue;
	}
    /**
     * @param int|null $gradeValue Target grade
     * @return UnleashRateEntryModel
     */
	public function withGradeValue(?int $gradeValue): UnleashRateEntryModel {
		$this->gradeValue = $gradeValue;
		return $this;
	}
    /** @return string|null Type of material condition */
	public function getType(): ?string {
		return $this->type;
	}
    /** @param string|null $type Type of material condition */
	public function setType(?string $type) {
		$this->type = $type;
	}
    /**
     * @param string|null $type Type of material condition
     * @return UnleashRateEntryModel
     */
	public function withType(?string $type): UnleashRateEntryModel {
		$this->type = $type;
		return $this;
	}
    /** @return int|null How many items of the same type to consume */
	public function getNeedCount(): ?int {
		return $this->needCount;
	}
    /** @param int|null $needCount How many items of the same type to consume */
	public function setNeedCount(?int $needCount) {
		$this->needCount = $needCount;
	}
    /**
     * @param int|null $needCount How many items of the same type to consume
     * @return UnleashRateEntryModel
     */
	public function withNeedCount(?int $needCount): UnleashRateEntryModel {
		$this->needCount = $needCount;
		return $this;
	}
    /** @return array|null Recipes */
	public function getRecipes(): ?array {
		return $this->recipes;
	}
    /** @param array|null $recipes Recipes */
	public function setRecipes(?array $recipes) {
		$this->recipes = $recipes;
	}
    /**
     * @param array|null $recipes Recipes
     * @return UnleashRateEntryModel
     */
	public function withRecipes(?array $recipes): UnleashRateEntryModel {
		$this->recipes = $recipes;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashRateEntryModel {
        if ($data === null) {
            return null;
        }
        return (new UnleashRateEntryModel())
            ->withGradeValue(array_key_exists('gradeValue', $data) && $data['gradeValue'] !== null ? $data['gradeValue'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withNeedCount(array_key_exists('needCount', $data) && $data['needCount'] !== null ? $data['needCount'] : null)
            ->withRecipes(!array_key_exists('recipes', $data) || $data['recipes'] === null ? null : array_map(
                function ($item) {
                    return UnleashRecipe::fromJson($item);
                },
                $data['recipes']
            ));
    }

    public function toJson(): array {
        return array(
            "gradeValue" => $this->getGradeValue(),
            "type" => $this->getType(),
            "needCount" => $this->getNeedCount(),
            "recipes" => $this->getRecipes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRecipes()
            ),
        );
    }
}