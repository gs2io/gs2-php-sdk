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

namespace Gs2\Showcase\Model;

use Gs2\Core\Model\IModel;


class SalesItemGroup implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $salesItems;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): SalesItemGroup {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): SalesItemGroup {
		$this->metadata = $metadata;
		return $this;
	}
	public function getSalesItems(): ?array {
		return $this->salesItems;
	}
	public function setSalesItems(?array $salesItems) {
		$this->salesItems = $salesItems;
	}
	public function withSalesItems(?array $salesItems): SalesItemGroup {
		$this->salesItems = $salesItems;
		return $this;
	}

    public static function fromJson(?array $data): ?SalesItemGroup {
        if ($data === null) {
            return null;
        }
        return (new SalesItemGroup())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSalesItems(array_map(
                function ($item) {
                    return SalesItem::fromJson($item);
                },
                array_key_exists('salesItems', $data) && $data['salesItems'] !== null ? $data['salesItems'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "salesItems" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSalesItems() !== null && $this->getSalesItems() !== null ? $this->getSalesItems() : []
            ),
        );
    }
}