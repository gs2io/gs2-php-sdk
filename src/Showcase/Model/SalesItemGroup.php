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


/**
 * Sales Item Group
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#salesitemgroup
 */
class SalesItemGroup implements IModel {
	/**
     * @var string Sales Item Group name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array Sales Items included in the Sales Item Group
	 */
	private $salesItems;
    /** @return string|null Sales Item Group name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Sales Item Group name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Sales Item Group name
     * @return SalesItemGroup
     */
	public function withName(?string $name): SalesItemGroup {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return SalesItemGroup
     */
	public function withMetadata(?string $metadata): SalesItemGroup {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null Sales Items included in the Sales Item Group */
	public function getSalesItems(): ?array {
		return $this->salesItems;
	}
    /** @param array|null $salesItems Sales Items included in the Sales Item Group */
	public function setSalesItems(?array $salesItems) {
		$this->salesItems = $salesItems;
	}
    /**
     * @param array|null $salesItems Sales Items included in the Sales Item Group
     * @return SalesItemGroup
     */
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
            ->withSalesItems(!array_key_exists('salesItems', $data) || $data['salesItems'] === null ? null : array_map(
                function ($item) {
                    return SalesItem::fromJson($item);
                },
                $data['salesItems']
            ));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "salesItems" => $this->getSalesItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSalesItems()
            ),
        );
    }
}