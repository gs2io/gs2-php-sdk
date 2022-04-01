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


class Material implements IModel {
	/**
     * @var string
	 */
	private $materialItemSetId;
	/**
     * @var int
	 */
	private $count;

	public function getMaterialItemSetId(): ?string {
		return $this->materialItemSetId;
	}

	public function setMaterialItemSetId(?string $materialItemSetId) {
		$this->materialItemSetId = $materialItemSetId;
	}

	public function withMaterialItemSetId(?string $materialItemSetId): Material {
		$this->materialItemSetId = $materialItemSetId;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

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