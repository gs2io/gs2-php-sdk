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
 * Material Selection
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#unleashmaterialselection
 */
class UnleashMaterialSelection implements IModel {
	/**
     * @var string Material name
	 */
	private $name;
	/**
     * @var array Item sets to consume as this material
	 */
	private $itemSetIds;
    /** @return string|null Material name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Material name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Material name
     * @return UnleashMaterialSelection
     */
	public function withName(?string $name): UnleashMaterialSelection {
		$this->name = $name;
		return $this;
	}
    /** @return array|null Item sets to consume as this material */
	public function getItemSetIds(): ?array {
		return $this->itemSetIds;
	}
    /** @param array|null $itemSetIds Item sets to consume as this material */
	public function setItemSetIds(?array $itemSetIds) {
		$this->itemSetIds = $itemSetIds;
	}
    /**
     * @param array|null $itemSetIds Item sets to consume as this material
     * @return UnleashMaterialSelection
     */
	public function withItemSetIds(?array $itemSetIds): UnleashMaterialSelection {
		$this->itemSetIds = $itemSetIds;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashMaterialSelection {
        if ($data === null) {
            return null;
        }
        return (new UnleashMaterialSelection())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withItemSetIds(!array_key_exists('itemSetIds', $data) || $data['itemSetIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['itemSetIds']
            ));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "itemSetIds" => $this->getItemSetIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getItemSetIds()
            ),
        );
    }
}