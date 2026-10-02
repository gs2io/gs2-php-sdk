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

namespace Gs2\Enchant\Model;

use Gs2\Core\Model\IModel;


/**
 * Rarity Parameter Count Model
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#rarityparametercountmodel
 */
class RarityParameterCountModel implements IModel {
	/**
     * @var int Count
	 */
	private $count;
	/**
     * @var int Draw Weight
	 */
	private $weight;
    /** @return int|null Count */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Count */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Count
     * @return RarityParameterCountModel
     */
	public function withCount(?int $count): RarityParameterCountModel {
		$this->count = $count;
		return $this;
	}
    /** @return int|null Draw Weight */
	public function getWeight(): ?int {
		return $this->weight;
	}
    /** @param int|null $weight Draw Weight */
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}
    /**
     * @param int|null $weight Draw Weight
     * @return RarityParameterCountModel
     */
	public function withWeight(?int $weight): RarityParameterCountModel {
		$this->weight = $weight;
		return $this;
	}

    public static function fromJson(?array $data): ?RarityParameterCountModel {
        if ($data === null) {
            return null;
        }
        return (new RarityParameterCountModel())
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withWeight(array_key_exists('weight', $data) && $data['weight'] !== null ? $data['weight'] : null);
    }

    public function toJson(): array {
        return array(
            "count" => $this->getCount(),
            "weight" => $this->getWeight(),
        );
    }
}