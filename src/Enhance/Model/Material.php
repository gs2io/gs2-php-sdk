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
 * Enhance Material
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#material
 */
class Material implements IModel {
	/**
     * @var string GRN of Item Set that will be used as materials for enhancement
	 */
	private $materialItemSetId;
	/**
     * @var int Number of consumption
	 */
	private $count;
    /** @return string|null GRN of Item Set that will be used as materials for enhancement */
	public function getMaterialItemSetId(): ?string {
		return $this->materialItemSetId;
	}
    /** @param string|null $materialItemSetId GRN of Item Set that will be used as materials for enhancement */
	public function setMaterialItemSetId(?string $materialItemSetId) {
		$this->materialItemSetId = $materialItemSetId;
	}
    /**
     * @param string|null $materialItemSetId GRN of Item Set that will be used as materials for enhancement
     * @return Material
     */
	public function withMaterialItemSetId(?string $materialItemSetId): Material {
		$this->materialItemSetId = $materialItemSetId;
		return $this;
	}
    /** @return int|null Number of consumption */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Number of consumption */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Number of consumption
     * @return Material
     */
	public function withCount(?int $count): Material {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?Material {
        if ($data === null) {
            return null;
        }
        return (new Material())
            ->withMaterialItemSetId(array_key_exists('materialItemSetId', $data) && $data['materialItemSetId'] !== null ? $data['materialItemSetId'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "materialItemSetId" => $this->getMaterialItemSetId(),
            "count" => $this->getCount(),
        );
    }
}