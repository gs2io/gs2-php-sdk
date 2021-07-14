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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Showcase\Model\DisplayItemMaster;

class CreateShowcaseMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var array */
    private $displayItems;
    /** @var string */
    private $salesPeriodEventId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateShowcaseMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateShowcaseMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateShowcaseMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateShowcaseMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}

	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}

	public function withDisplayItems(?array $displayItems): CreateShowcaseMasterRequest {
		$this->displayItems = $displayItems;
		return $this;
	}

	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}

	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}

	public function withSalesPeriodEventId(?string $salesPeriodEventId): CreateShowcaseMasterRequest {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateShowcaseMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateShowcaseMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDisplayItems(array_map(
                function ($item) {
                    return DisplayItemMaster::fromJson($item);
                },
                array_key_exists('displayItems', $data) && $data['displayItems'] !== null ? $data['displayItems'] : []
            ))
            ->withSalesPeriodEventId(empty($data['salesPeriodEventId']) ? null : $data['salesPeriodEventId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "displayItems" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDisplayItems() !== null && $this->getDisplayItems() !== null ? $this->getDisplayItems() : []
            ),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
        );
    }
}